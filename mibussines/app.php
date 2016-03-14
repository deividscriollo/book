<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../admin/class.php');
	$class=new constante();
	// print_r($_SESSION);
	if (isset($_POST['llenar_categoria'])) {
		$resultado = $class->consulta("	SELECT id, categoria  FROM empresa_tipo WHERE STADO='1';");
		$acu='';
		while ($row=$class->fetch_array($resultado)) {
			$acu[] = array('id' => $row['id'],'categoria' => $row['categoria']);
		}
		print json_encode($acu);		
	}
	if (isset($_POST['llenar_item_categoria'])) {
		$resultado = $class->consulta("	SELECT id, tipo FROM empresa_categoria WHERE ID_EMPRESA_CATEGORIA='$_POST[id]';");
		$acu='';
		while ($row=$class->fetch_array($resultado)) {				
			$acu[] = array('id' => $row['id'],'tipo' => $row['tipo']);
		}
		print json_encode($acu);		
	}
	if (isset($_POST['verificar_existencia_sucursal'])) {
		$resultado = $class->consulta("	SELECT id FROM sucursales_empresa WHERE id='$_POST[id]' AND STADO='1';");
		$acu='';
		if($class->num_rows($resultado)==0) {				
			$acu[0]='false';
		}else{
			$acu[0]='true';
			$_SESSION['acceso']['mibussines']=0;
			$_SESSION['acceso']['dashboard']=1;
		}
		$acu['perfil']=info_acceso($_SESSION['modelo']['empresa_id']);
		print json_encode($acu);		
	}	
	// edicion directa nombre direccion empresa_categoria
	if (isset($_POST['sucursal_id'])) {
		$_SESSION['sucursal']=$_POST['id'];
	}
	if (isset($_POST['name'])) {
			$id=$class->idz();
			$fecha=$class->fecha_hora();
			if ($_POST['name']=='nom_empresa') {
				// verificacion existencia de campo
				$res = $class->consulta("	UPDATE sucursales.misucursal 
											SET nombre_sucursal = upper('$_POST[value]')
											WHERE ID='$_POST[pk]';");
				// respondiendo resultado de la consulta
				if ($res) {
					print_r(json_encode(array('valid' => 'true'))); // informacion actualizada
				}else{
					print_r(json_encode(array('valid' => 'false'))); // informacion no actualizada
				}
			}			
			if ($_POST['name']=='dir_empresa') {
				// verificacion existencia de campo
				$res = $class->consulta("	UPDATE sucursales.misucursal
											SET direccion = upper('$_POST[value]')
											WHERE ID='$_POST[pk]';");
				// respondiendo resultado de la consulta
				if ($res) {
					print_r(json_encode(array('valid' => 'true'))); // informacion actualizada
				}else{
					print_r(json_encode(array('valid' => 'false'))); // informacion no actualizada
				}
			}
		
	}
	if (isset($_POST['llenar_sucursales_perfil'])) {
		$resultado = $class->consulta("	SELECT * FROM sucursales.misucursal WHERE id = '$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu = array(	'id' => $row['id'],
							'codigo' => $row['codigo'],
							'nombre_sucursal' => $row['nombre_sucursal'],
							'direccion' => $row['direccion'],
							'estado_sri' => $row['estado_sri']
						);
		}
		print json_encode($acu);		
	}
	if (isset($_POST['llenar_sucursales'])) {
		$resultado = $class->consulta("	SELECT SM.*, SM.id_empresa_miempresa
										FROM acceso.corporativo AC, empresa.corporativo EC, empresa.miempresa EM, sucursales.misucursal SM 
										WHERE AC.id='$_SESSION[id_usuario]' 
										AND AC.id_empresa_corporativo=EC.id 
										AND EC.id = EM.id_corporativo 
										AND EM.id = SM.id_empresa_miempresa
										AND SM.estado_sri = 'Abierto'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu[] = array(	'id' => $row['id'],
							'codigo' => $row['codigo'],
							'nombre_sucursal' => $row['nombre_sucursal'],
							'direccion' => $row['direccion'],
							'estado_sri' => $row['estado_sri']
						);
			$_SESSION['id_empresa_miempresa']=$row['id_empresa_miempresa'];
		}
		print json_encode($acu);		
	}
	if (isset($_POST['btn_guardar'])) {
		$_SESSION['sucursal_activo'] = $_POST['availability'];
		$fecha = $class->fecha_hora();
		$acusel = $_POST['sel_categoria2'];
		$acusel = $_POST['sel_categoria2'];
		$id_cargo=$class->idz();
		$id_area=$class->idz();
		
		//activando el uso de sucursal
		$class->consulta("UPDATE sucursales.misucursal SET stado='1' WHERE id='$_POST[availability]'");
		// actualizando pass
		$_SESSION['acceso']['dashboard']=1;
		$_SESSION['acceso']['update']=0;
		print_r(json_encode(array(	'valid' => 'true',
									'directorio' => 'dashboard',
									'perfil_usuario'=>perfil_usuario(),
									'perfil_sucursal'=>perfil_sucursal(),
									'perfil_empresa'=>perfil_empresa()
								)
							)
				);
	}
	
	if (isset($_POST['perfil_usuario'])) {
		$resultado = $class->consulta("	SELECT P.*, C.data 
										FROM colaboradores_perfil P, colaboradores_cargo C 
										WHERE C.id=P.id_colaboradores_cargo AND P.id_sucursal_empresa='$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu =  $row;
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['perfil_sucursal'])) {
		$resultado = $class->consulta("	SELECT * FROM sucursales_empresa WHERE ID='$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu[] =  $row;
		}
		$_SESSION['id_sucursal_activo'] = $_POST['id'];
		print_r(json_encode($acu));
	}


	function perfil_usuario(){
		$class=new constante();
		$id_usuario=$_SESSION['id_usuario'];
		$resultado = $class->consulta("	SELECT nombre ,apellido, telefono1, telefono1, EC.correo 
										FROM empresa.corporativo EC, acceso.corporativo AC 
										WHERE EC.id=AC.id_empresa_corporativo and AC.id='$id_usuario';");
		while ($row=$class->fetch_array($resultado)) {
			$acu = array(
							'nombre' => ucwords($row['nombre']),
							'apellido' => ucwords($row['apellido']),
							'telefono1' => $row['telefono1'],
							'correo' => $row['correo']
						 );
		}
		return $acu;
	}
	function perfil_sucursal(){
		$class=new constante();
		$id_sucursal=$_SESSION['sucursal_activo'];
		$resultado = $class->consulta("	SELECT * FROM sucursales.misucursal WHERE  id='$id_sucursal';");
		while ($row=$class->fetch_array($resultado)) {
			$acu = array(	'codigo' =>$row['codigo'],
						 	'nombre_sucursal' => ucwords($row['nombre_sucursal']),
						 	'direccion' => ucwords($row['direccion']),
						 	'estado_sri' => ucwords($row['estado_sri']),	
						 	'estado_sri' => ucwords($row['estado_sri'])
						 );
		}
		return $acu;
	}
	function perfil_empresa(){
		$class=new constante();
		$id_empresa=$_SESSION['id_empresa_miempresa'];
		$resultado = $class->consulta("	SELECT * FROM empresa.miempresa WHERE id='$id_empresa';");
		while ($row=$class->fetch_array($resultado)) {
			$acu = array(	'razon_social' =>ucwords($row['razon_social']),
						 	'nom_comercial' =>ucwords($row['nom_comercial']),
						 	'ruc' =>$row['ruc'],
						 	'estado_contri' =>ucwords($row['estado_contri']),	
						 	'clase_contri' =>ucwords($row['clase_contri']),
						 	'tipo_contri' =>ucwords($row['tipo_contri']),
						 	'obligado_conta' =>ucwords($row['obligado_conta']),
						 	'actividad_economica' =>ucwords($row['actividad_economica'])
						 );
		}
		return $acu;
	}
	function info_acceso($id){
		$class=new constante();
		$acu='';
		$resultado = $class->consulta("	SELECT P.*, C.data FROM colaboradores_perfil P, colaboradores_cargo C WHERE C.id=P.id_colaboradores_cargo AND P.id_sucursal_empresa='$id'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu =  $row;
		}
		return $acu;
	}
	
?>