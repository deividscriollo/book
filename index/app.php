<?php  

// informacion session

if(!isset($_SESSION))
	{
		session_start();		
	}
	require('../admin/class.php');
	$class=new constante();
	$array = explode(',', $_POST['array']);
	$fecha_actual =$class->fecha();
	if(isset($_POST['guardar'])) {			
		$resultado = $class->consulta("select ruc from seg.empresa  where ruc = '".$array[1]."'");
		if($class->num_rows($resultado) == 0 ){			
			$id = $class->idz();
			$res=$class->consulta("insert into seg.empresa values ('".$id."','".$array[0]."','".$array[2]."','".$_POST['txt_direccion']."','".$_POST['txt_telefono_1']."','
				".$_POST['txt_telefono_2']."','".$_POST['txt_celular']."','".$_POST['txt_pagina_web']."','".$_POST['txt_correo']."','0','".$fecha_actual."','".$array[1]."','".$array[3]."','".$array[4]."','".$array[5]."','".$array[6]."','".$array[7]."','".$array[8]."','".$array[9]."','".$array[10]."','".$array[11]."')");			
			if(!$res) {
				$respuesta[]=2; ////error al momento de guardar
			}else $respuesta[]=0;////datos guardados correctamento
		}else{
			 $respuesta[]=1; ////el ruc ya existe
		}		
	}	
	/*if(isset($_POST['mostrar_bancos'])) {
		$resultado = $class->consulta("SELECT * FROM");
		while ($row=$class->fetch_array($resultado)) {	
			

	 	} 
	}*/
	print json_encode($respuesta);