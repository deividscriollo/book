<?php 
if(!isset($_SESSION)){
    session_start();        
}
include_once('../admin/class.php');
$class=new constante();

if (isset($_POST['info_sucursal'])) {
	$resultado = $class->consulta("SELECT *  FROM sucursales_empresa WHERE id='".$_SESSION['idsucursal']."'");
	while ($row=$class->fetch_array($resultado)) {
		$_SESSION['sucursal']=$row;
	}
}
if (isset($_POST['customValue'])) {
	// extrayendo extension
	$vecnom = explode('.', $_POST['name']);
	$limitgimg=count($vecnom);
	$extension = $vecnom[$limitgimg-1];
	// existencia carpeta
	if (!file_exists('img')) {
	    mkdir('img', 0777, true);
	}
	if (!file_exists('img/'.$_SESSION['idsucursal'])) {
	    mkdir('img/'.$_SESSION['idsucursal'], 0777, true);
	}
	$nom=$class->idz();
	$id=$class->idz();
	$fecha =$class->fecha_hora();
	$archivo=$nom.'.'.$extension;
	$data=$_POST['data'];
	$data = str_replace('data:image/png;base64,', '', $data);
	$data = str_replace('data:image/jpg;base64,', '', $data);
	$data = str_replace('data:image/jpeg;base64,', '', $data);
	$data = str_replace(' ', '+', $data);
	$data = base64_decode($data);
	$url='img/'.$_SESSION['idsucursal'].'/'.$archivo;
	file_put_contents($url, $data);
	$acu['filename']=$archivo;
	$acu['status']='success';
	$acu['url']='next/empresa/'.$url;
	$class->consulta("INSERT INTO img_perfil_empresa   VALUES ('$id', '$_SESSION[idsucursal]', '$url', 'logo', '1', '$fecha');");
	print_r(json_encode($acu));

}

if (isset($_POST['buscar_imagen'])) {
	$acu;
	$resultado = $class->consulta("SELECT img FROM img_perfil_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]'");
	while ($row=$class->fetch_array($resultado)) {
		$acu[0]=$row[0];
	}
	print_r(json_encode($acu));
}
if (isset($_POST['info_sucursal_data'])) {
	$acu;
	$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]'");
	while ($row=$class->fetch_array($resultado)) {
		$acu[]=$row;


	}
	print_r(json_encode($acu));
}

if (isset($_POST['name'])) {
	if ($_POST['name']=='editable_web_site') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='website'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='website'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'website', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
	if ($_POST['name']=='editable_cor1') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='correo1'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='correo1'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'correo1', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
	if ($_POST['name']=='editable_cor2') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='correo2'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='correo2'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'correo2', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
	if ($_POST['name']=='editable_cor3') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='correo3'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='correo3'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'correo3', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}	
	if ($_POST['name']=='editable_tel1') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='tel1'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='tel1'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'tel1', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
	if ($_POST['name']=='editable_tel2') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='tel2'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='tel2'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'tel2', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
	if ($_POST['name']=='editable_tel3') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='tel3'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='tel3'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'tel3', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
	if ($_POST['name']=='editable_descripcion') {
		$sum=0;
		$acu[0]=0;
		$id=$class->idz();
		$fecha =$class->fecha_hora();
		$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='descripcion'");
		while ($row=$class->fetch_array($resultado)) {
			$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]' WHERE id_sucursal_empresa='$_SESSION[idsucursal]' AND tipo='descripcion'");
			$sum=1;
			$acu[1]=1;//actualizado
		}
		if ($sum==0) {
			$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'descripcion', '1', '$fecha');");
			$acu[1]=2;//actualizado
		}
		print_r(json_encode($acu));
	}
}

if (isset($_POST['guardar_posicion_mapa'])) {
	$sum=0;
	$acu[0]=0;
	$id=$class->idz();
	$fecha =$class->fecha_hora();
	$resultado = $class->consulta("SELECT * FROM info_sucursal_empresa WHERE id_sucursal_empresa='$_SESSION[idsucursal]' and tipo='map'");
	while ($row=$class->fetch_array($resultado)) {
		$class->consulta("UPDATE info_sucursal_empresa SET data='$_POST[value]', tipo='map' WHERE id_sucursal_empresa='$_SESSION[idsucursal]'");
		$sum=1;
		$acu[1]=1;//actualizado
	}
	if ($sum==0) {
		$class->consulta("INSERT INTO info_sucursal_empresa  VALUES ('$id', '$_SESSION[idsucursal]', '$_POST[value]', 'map', '1', '$fecha');");
		$acu[1]=2;//actualizado
	}
	print_r(json_encode($acu));
	
}

?>