<?php
	if(!isset($_SESSION)){
	    session_start();        
	}

	include_once('../admin/class.php');
	$class=new constante();
	if (isset($_POST['llenar_pais'])) {
		$resultado = $class->consulta("SELECT id, nom_pais FROM localizacion.pais");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$sum['value']=$row[0];
			$sum['text']=$row[1];
			$acu[]=$sum;
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['llenar_provincia'])) {
		$resultado = $class->consulta("SELECT pro.id, pro.nom_provincia FROM localizacion.provincia pro, localizacion.pais p WHERE id_pais=p.id;");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$sum['value']=$row[0];
			$sum['text']=$row[1];
			$acu[]=$sum;
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['llenar_ciudad'])) {
		$resultado = $class->consulta("SELECT c.id, nom_ciudad FROM localizacion.provincia pro, localizacion.ciudad c WHERE c.id_provincia=pro.id and pro.id='$_POST[id]'");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$sum['value']=$row[0];
			$sum['text']=$row[1];
			$acu[]=$sum;
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['btn_guardar_cargo'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$id_empresa=$_SESSION['m'][3];
		$acu[0]=0;
		$resultado = $class->consulta("INSERT INTO cargo_colaboradores  VALUES ('$id','$id_empresa', '$_POST[txt_0]', '1', '$fecha');");
		if ($resultado) {
			$acu[0]=1; // Info data save ok
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['btn_guardar_data'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$id_empresa=$_SESSION['m'][3];
		$acu[0]=0;
		$resultado = $class->consulta("INSERT INTO perfil_colaboradores(
										    id, id_empresa, nombre, cargo, correo, fecha_n, telefono, tel1, 
										    tel2, website, red1, red2, stado, fecha)
										VALUES ('$id', '$id_empresa', '', '', '', '', '', '', '', '', '', '', '1', '$fecha');");
		if ($resultado) {
			$acu[0]=1; // Info data save ok
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['llenar_data_cargo'])) {
		$id_empresa=$_SESSION['m'][3];
		$acu;
		$resultado = $class->consulta("SELECT id, upper(cargo) as cargo, stado, fecha FROM cargo_colaboradores WHERE ID_EMPRESA='$id_empresa' AND STADO='1'");
		while ($row=$class->fetch_array($resultado)) {
			$acu[]= array($row['id'],$row['cargo'],$row['stado'],$row['fecha']); 
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['verificacion_existencia_cargo'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$acu='true';
		$resultado = $class->consulta("SELECT * FROM cargo_colaboradores WHERE cargo='$_POST[txt_0]';");
		if ($row=$class->fetch_array($resultado)>0) {
			$acu='false'; // Info data save ok
		}
		print $acu;
	}
	if(isset($_POST['cargo_eliminar'])) {
		$acu[0]=0;
		$resultado = $class->consulta("UPDATE cargo_colaboradores SET stado='0' WHERE id='$_POST[id]';");
		if ($resultado) {
			$acu[0]=1; // Info data update ok
		}
		print_r(json_encode($acu));
	}
	if(isset($_POST['llenar_select_cargo'])) {
		$acu[0]=0;
		$id_empresa=$_SESSION['m'][3];
		$resultado = $class->consulta("SELECT id, upper(cargo) as cargo FROM cargo_colaboradores WHERE ID_EMPRESA='$id_empresa' AND STADO='1'");
		while ($row=$class->fetch_array($resultado)) {
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}	
?>