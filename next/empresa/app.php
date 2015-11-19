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

 ?>