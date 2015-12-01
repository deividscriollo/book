<?php 
	
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../admin/class.php');
	$class=new constante();
	
	if (isset($_POST['verificar_seleccion'])) {
		$resultado = $class->consulta("SELECT *  FROM sucursales_empresa WHERE id_empresa='".$_SESSION['m'][5]."' AND STADO_SUCURSAL='Abierto';");	
		$acu[0]=1;
		while ($row=$class->fetch_array($resultado)) {
			if ($row['stado']=='1') {
				$acu[0]=0;
				$_SESSION['idsucursal']=$row[0];
				break;
			}
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['update_pass'])) {
		$acu[0]=1;
		$resultado = $class->consulta("UPDATE seg.accesos SET pass=md5('".$_POST['txt']."') WHERE ID_EMPRESA='".$_SESSION['m']['id_empresa']."';");	
		if ($resultado) {
			$acu[0]=0;
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['llenaselect_empresa'])) {
		$resultado = $class->consulta("SELECT *  FROM sucursales_empresa WHERE id_empresa='".$_SESSION['m'][5]."' AND STADO_SUCURSAL='Abierto';");	
		while ($row=$class->fetch_array($resultado)) {
			print '<option value="'.$row[0].'">'.$row[3].'-'.$row[4].'</option>';
		}
	}
	if (isset($_POST['llenaselect_tipo_empresa'])) {
		$resultado = $class->consulta("SELECT * FROM empresa_tipo;");	
		while ($row=$class->fetch_array($resultado)) {
			print '<option value="'.$row[0].'">'.strtoupper($row[1]).'</option>';
		}
	}
	if (isset($_POST['llenaselect_categoria_empresa'])) {
		$resultado = $class->consulta("SELECT * FROM empresa_categoria WHERE id_empresa_categoria='".$_POST['id']."';");	
		while ($row=$class->fetch_array($resultado)) {
			print '<option value="'.$row[0].'">'. strtoupper($row[2]).'</option>';
		}
	}
	
	if (isset($_POST['buscar_nombre_empresa'])) {
		$resultado = $class->consulta("SELECT *  FROM sucursales_empresa WHERE id='".$_POST['id']."'");
		while ($row=$class->fetch_array($resultado)) {
			$acu[]=$row[3];
			$acu[]=$row[4];
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['save_data'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$acu[0]=1;
		$_SESSION['idsucursal']=$_POST['txt_1'];
		$resultado = $class->consulta("INSERT INTO perfil_empresa VALUES ('$id', '$_POST[txt_1]', '$_POST[txt_2]', '$_POST[txt_3]', '$_POST[txt_4]','1', '$fecha');");	
		if ($resultado) {
			$acu[0]=0;
		}
		$resultado = $class->consulta("UPDATE sucursales_empresa SET stado='1' WHERE ID='".$_POST['txt_1']."';");	
		print_r(json_encode($acu));
	}
	if (isset($_POST['info_perfil_sucursal'])) {
		$acu['usuario']= array('nombre' => $_SESSION['m']['6'], 'img'=>'next/' );
		$acu['empresa']= array('nombre' => $_SESSION['m']['nom_comercial'], 'img'=>'next/' );
		print_r(json_encode($acu));
	}
	if (isset($_POST['llenar_mis_empresa'])) {
		$acu;
		$resultado = $class->consulta("SELECT * FROM sucursales_empresa WHERE ID_EMPRESA='".$_SESSION['m']['razon_social']."';");
		while ($row=$class->fetch_array($resultado)) {
			$acu[]= array(
							'codigo' => $row['codigo'],
							'nombre_empresa_sucursal' => $row['nombre_empresa_sucursal'],
							'direccion' => $row['direccion'],
							'stado_sucursal' => $row['stado_sucursal']
							);
		}
		print_r(json_encode($acu));
	}
	
	

?>