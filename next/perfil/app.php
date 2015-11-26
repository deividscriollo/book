<?php 
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
?>