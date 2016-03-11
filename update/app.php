<?php

	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../admin/class.php');

	$class=new constante();

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

	if (isset($_POST['llenar_sucursales'])) {
		$resultado = $class->consulta("	SELECT SM.*
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
		}
		print json_encode($acu);		
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
	if (isset($_POST['perfil_sucursal'])) {
		$resultado = $class->consulta("	SELECT * FROM sucursales_empresa WHERE ID='$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu[] =  $row;
		}
		$_SESSION['id_sucursal_activo'] = $_POST['id'];
		print_r(json_encode($acu));
	}
	// edicion directa nombre direccion empresa_categoria
	if (isset($_POST['sucursal_id'])) {
		$_SESSION['sucursal']=$_POST['id'];
		$_SESSION['id_sucursal_activo'] = $_POST['id'];
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
	if (isset($_POST['perfil_usuario'])) {
		$resultado = $class->consulta("	SELECT P.*, C.data 
										FROM colaboradores_perfil P, colaboradores_cargo C 
										WHERE C.id=P.id_colaboradores_cargo AND P.id_sucursal_empresa='$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu =  $row;
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['btn_guardar'])) {
		$_SESSION['sucursal_activo'] = $_POST['availability'];
		$fecha = $class->fecha_hora();
		$acusel = $_POST['sel_categoria2'];
		$acusel = $_POST['sel_categoria2'];
		$id_cargo=$class->idz();
		$id_area=$class->idz();
		$nombre = $_POST['txt_nombre'];
		$apellido= $_POST['txt_apellido'];
		// generando cargo colaborador
		
		$class->consulta("	UPDATE empresa.corporativo 
							SET nombre=upper('$nombre'), apellido=upper('$apellido') WHERE id=(SELECT EC.id FROM acceso.corporativo AC, empresa.corporativo EC WHERE AC.id='$_SESSION[id_usuario]' AND AC.id_empresa_corporativo=EC.id )");
		$class->consulta("INSERT INTO colaboradores_areas VALUES ('$id_area', '$_SESSION[id_usuario]','suscriptor', '1', '$fecha');");
		$class->consulta("INSERT INTO colaboradores_cargo VALUES ('$id_cargo', '$_SESSION[id_usuario]','Administrativo', '1', '$fecha');");
			
		// generando perfil de colaborador
		// $id_colaborador=$class->idz();
		// $id_empresa=$_SESSION['modelo']['empresa_id'];
		// $correo=$_SESSION['modelo']['perfil_correo'];
		// $nombres = json_encode(($nombres));
		// $class->consulta("INSERT INTO colaboradores_perfil VALUES (	
		// 															'$id_colaborador',
		// 															'$_SESSION[id_sucursal_activo]',
		// 															'$id_cargo',
		// 															'$id_area',
		// 															'$nombres',
		// 															'$correo',
		// 															'$fecha',
		// 															'', --telefono
		// 															'', --direccion
		// 															'1', '$fecha');");
		// 	//activando el uso de sucursal
		// 	$class->consulta("UPDATE sucursales_empresa SET stado='1' WHERE id='$_POST[availability]'");
		// 	// actualizando passthru(command)
		// 	$class->consulta("UPDATE seg.accesos SET pass=md5('$_POST[txt_pass]'), stado='CAMBIO' WHERE id_empresa='$id_empresa'");
		// 	// guardar informacion del perfil del sucursal
		// 	for ($i=0; $i < count($acusel) ; $i++) { 
		// 		$id=$class->idz();
		// 		$res = $class->consulta("INSERT INTO sucursal_perfil VALUES ('$id',
		// 																	 '$_POST[availability]','',
		// 																	 '$_POST[sel_categoria1]','$acusel[$i]','$_POST[textarea]','1', '$fecha');");
		// 	}
		// 	if ($res) {
		// 		$res_puesta['respuesta']='1';
		// 		$_SESSION['acceso']['dashboard']=1;
		// 		$_SESSION['acceso']['update']=0;
		// 	}else{
		// 		$res_puesta['respuesta']='0';
		// 	}			
	}
	function to_pg_array($set) {
	    settype($set, 'array'); // can be called with a scalar or array
	    $result = array();
	    foreach ($set as $t) {
	        if (is_array($t)) {
	            $result[] = to_pg_array($t);
	        } else {
	            $t = str_replace('"', '\\"', $t); // escape double quote
	            if (! is_numeric($t)) // quote only non-numeric values
	                $t = '"' . $t . '"';
	            $result[] = $t;
	        }
	    }
	    return '{' . implode(",", $result) . '}'; // format
	}
	function verificacion_datos(){
		$class=new constante();
		$acu=0;
		$id_empresa=$_SESSION['modelo']['empresa_id'];
		$resultado = $class->consulta("	SELECT * FROM seg.accesos WHERE STADO='AUTOMATICO' AND id_empresa='$id_empresa';");
		$acu='';
		while ($row=$class->fetch_array($resultado)) {
			$acu=1;
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