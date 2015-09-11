<?php  

// informacion session

if(!isset($_SESSION)){
		session_start();		
	}
	require('../admin/class.php');
	$class=new constante();
	if(isset($_POST['guardar'])) {				
		$array = explode(',', $_POST['array']);						
		$fecha_actual =$class->fecha();		
		$resultado = $class->consulta("select ruc from seg.empresa  where ruc = '".$array[1]."'");		
		if($class->num_rows($resultado) == 0 ){			
			$id = $class->idz();
			$res=$class->consulta("INSERT INTO seg.empresa VALUES ('".$id."','".$array[0]."','".$array[2]."','".$_POST['txt_direccion']."','".$_POST['txt_telefono_1']."','
				".$_POST['txt_telefono_2']."','".$_POST['txt_celular']."','".$_POST['txt_pagina_web']."','".$_POST['txt_correo']."','0','".$fecha_actual."','".$array[1]."','".$array[3]."','".$array[4]."','".$array[5]."','".$array[6]."','".$array[7]."','".$array[8]."','".$array[9]."','".$array[10]."','".$array[11]."')");			
			if(!$res) {
				$respuesta[]=2; ////error al momento de guardar
			}else {
				$respuesta[]=0;////datos guardados correctamento
				for($i = 12; $i = count($array); $i=$i+10){
					$id = $class->idz();
					$res=$class->consulta("INSERT INTO seg.establecimientos values ('".$id."','".$array[$i]."','".$array[$i + 2]."','".$array[$i + 3]."','".$array[$i + 6]."')");				
				}
			}
		}else{
			 $respuesta[]=1; ////el ruc ya existe
		}
		print json_encode($respuesta);	
	}	
<<<<<<< HEAD
	
=======
	/*if(isset($_POST['mostrar_bancos'])) {
		$resultado = $class->consulta("SELECT * FROM");
		while ($row=$class->fetch_array($resultado)) {	
			

	 	} 
	}*/

		//guardando recursos de facebook
>>>>>>> 91e9610d8ee03c774495bdf30f9b1e6e2a8764db
	if (isset($_POST['info_face'])) {
		$acu=0;
		$resultado = $class->consulta("SELECT * FROM SEG.PERSONAL WHERE id_cuenta='".$_POST['id']."'");
		while ($row=$class->fetch_array($resultado)) {	
			$acu=1;
	 	}
	 	if ($acu==0) {
	 		$acu=1;
			$id = $class->idz();
			$fecha=$class->fecha_hora();
			// guardando informacion de usuarios registrados por guardar_facebook_user
			$img='http://graph.facebook.com/'.$_POST['id'].'/picture?type=large';
			$res = $class->consulta("INSERT INTO SEG.PERSONAL VALUES('".$id."','".$_POST['id']."','".$_POST['nom']."','".$_POST['correo']."','".$_POST['genero']."','".$img."','FACEBOOK','1','".$fecha."')");
			if(!$res) {
				$respuesta[]=2; ////error al momento de guardar
			}else $respuesta[]=0;////datos guardados correctamento
	 	}else{
	 		$respuesta[]=0;
	 	}

	 	$resultado = $class->consulta("SELECT * FROM SEG.PERSONAL WHERE id_cuenta='".$_POST['id']."'");
		while ($row=$class->fetch_array($resultado)) {	
			$_SESSION['id']=$row[1];
			$_SESSION['nombre']=$row[2];
			$_SESSION['img']=$row[5];
			$respuesta[]=1;//inicio de session es correcto
		}
		//print json_encode($respuesta);
	}
	// guardando recursos guargar_personal_register
	if (isset($_POST['guargar_personal_register'])) {
		$id = $class->idz();
		$fecha=$class->fecha_hora();
		$res = $class->consulta("INSERT INTO SEG.PERSONAL VALUES('".$id."','','".$_POST['nombre']."','".$_POST['correo']."','".$_POST['genero']."','../../dist/img/favicon.fw.png','REGISTRO','1','".$fecha."')");
		if(!$res) {
			$respuesta[]=2; ////error al momento de guardar
		}else $respuesta[]=0;////datos guardados correctamento
	}
