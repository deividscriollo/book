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
		if (verificacion_datos()==1) {
			$id=$class->idz();
			$fecha=$class->fecha_hora();
			if ($_POST['name']=='nom_empresa') {
				// verificacion existencia de campo
				$res = $class->consulta("	SELECT id FROM info_sucursal_empresa 
											WHERE ID_SUCURSAL_EMPRESA='$_POST[pk]' and tipo='nom_sucursal';");
				if ($class->num_rows($res) == 0) {
					$res = $class->consulta("	INSERT INTO 
												info_sucursal_empresa 
											VALUES ('$id', '$_POST[pk]', '$_POST[value]', 'nom_sucursal', '1', '$fecha');");
				}else{
					$res = $class->consulta("	UPDATE info_sucursal_empresa SET data = '$_POST[value]'
											WHERE ID_SUCURSAL_EMPRESA='$_POST[pk]' and tipo='nom_sucursal';");
				}		
				// respondiendo resultado de la consulta
				if ($res) {
					print '1';
				}else{
					print '0';
				}
			};
			if ($_POST['name']=='dir_empresa') {
				// verificacion existencia de campo
				$res = $class->consulta("	SELECT id FROM info_sucursal_empresa 
											WHERE ID_SUCURSAL_EMPRESA='$_POST[pk]' and tipo='dir_sucursal';");
				if ($class->num_rows($res) == 0) {
					$res = $class->consulta("	INSERT INTO 
												info_sucursal_empresa 
											VALUES ('$id', '$_POST[pk]', '$_POST[value]', 'dir_sucursal', '1', '$fecha');");
				}else{
					$res = $class->consulta("	UPDATE info_sucursal_empresa SET data = '$_POST[value]'
											WHERE ID_SUCURSAL_EMPRESA='$_POST[pk]' and tipo='dir_sucursal';");
				}		
				// respondiendo resultado de la consulta
				if ($res) {
					print '1';
				}else{
					print '0';
				}
			};	
		}else{
			print'procesado';
		}
		
	}
	if (isset($_POST['btn_guardar'])) {
		$res_puesta['respuesta'] ='enproceso';
		$_SESSION['id_sucursal_activo'] = $_POST['availability'];
		$fecha=$class->fecha_hora();
		$acusel = $_POST['sel_categoria2'];
		//activando el uso de sucursal
		$class->consulta("UPDATE sucursales_empresa SET stado='1' WHERE id='$_POST[availability]'");	
		// guardar informacion del perfil del sucursal
		for ($i=0; $i < count($acusel) ; $i++) { 
			$id=$class->idz();
			$res = $class->consulta("INSERT INTO perfil_sucursal VALUES ('$id',
																		 '$_POST[availability]','',
																		 '$_POST[sel_categoria1]','$acusel[$i]','$_POST[textarea]','1', '$fecha');");
		}
		if ($res) {
			$res_puesta['respuesta']='1';
			$_SESSION['acceso']['dashboard']=1;
			// $_SESSION['acceso']['mibussines']=0;
		}else{
			$res_puesta['respuesta']='0';
		}
		$res_puesta['perfil']=info_acceso($_SESSION['modelo']['empresa_id']);
		print_r(json_encode($res_puesta));
	}

	
	if (isset($_POST['perfil'])) {
		$res_puesta['perfil']=info_acceso($_SESSION['modelo']['empresa_id']);
		print_r(json_encode($res_puesta));
	}
	if (isset($_POST['perfil_sucursal'])) {
		$resultado = $class->consulta("	SELECT * FROM sucursales_empresa WHERE ID='$_POST[id]'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu[] =  $row;
		}
		print_r(json_encode($acu));
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
	function info_acceso($id){
		$class=new constante();
		$acu='';
		$resultado = $class->consulta("	SELECT P.*, C.cargo FROM perfil_colaboradores P, cargo_colaboradores C WHERE C.id=P.id_cargo AND P.id_empresa='$id'");
		while ($row=$class->fetch_array($resultado)) {				
			$acu =  $row;
		}
		return $acu;
	}
	
?>