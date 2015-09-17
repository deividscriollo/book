<?php  

// informacion session

if(!isset($_SESSION)){
		session_start();		
	}
	require('../admin/class.php');
	require('../admin/correo.php');
	$class=new constante();
	if(isset($_POST['guardar'])) {				
		$array = explode(',', $_POST['array']);						
		$fecha_actual =$class->fecha();		
		$resultado = $class->consulta("select ruc from seg.empresa  where ruc = '".$array[1]."'");				
		if($class->num_rows($resultado) == 0 ){						
			$id = $class->idz();			
			$res=$class->consulta("INSERT INTO seg.empresa VALUES ('".$id."','".trim($array[0])."','".trim($array[2])."','".$_POST['txt_direccion']."','".$_POST['txt_telefono_1']."','".$_POST['txt_telefono_2']."','".$_POST['txt_celular']."','".$_POST['txt_pagina_web']."','".$_POST['txt_correo']."','0','".$fecha_actual."','".trim($array[1])."','".trim($array[3])."','".trim($array[4])."','".trim($array[5])."','".trim($array[6])."','".trim($array[7])."','".trim($array[8])."','".trim($array[9])."','".trim($array[10])."','".trim($array[11])."')");			
			if(!$res) {
				$respuesta[]=2; ////error al momento de guardar
			}else {
				$respuesta[]=0;////datos guardados correctamento	
				
				for($i = 12; $i < count($array); $i=$i+11){
					$id_1 = $class->idz();
					$res=$class->consulta("INSERT INTO seg.establecimientos values ('".$id_1."','".trim($array[$i])."','".trim($array[$i + 2])."','".trim($array[$i + 3])."','".trim($array[$i + 6])."','".$id."')");				
				}
			}
		}else{
			 $respuesta[]=1; ////el ruc ya existe
		}
		print json_encode($respuesta);	
	}	
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
		print json_encode($respuesta);

	}
	if (isset($_POST['info_google'])) {
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
			$img=$_POST['pic'];
			$res = $class->consulta("INSERT INTO SEG.PERSONAL VALUES('".$id."','".$_POST['id']."','".$_POST['nom']."','".$_POST['correo']."','".$_POST['genero']."','".$img."','GOOGLE','1','".$fecha."')");
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
		print json_encode($respuesta);

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
	
	if (isset($_POST['g_registro_empresa'])) {			
		$acu = $_POST['acu'];								
		$fecha =$class->fecha_hora();			
		$resultado = $class->consulta("SELECT ruc FROM seg.empresa  WHERE ruc = '".$_POST['ruc']."'");		
		if($class->num_rows($resultado) == 0 ){			
			$id = $class->idz();
			$res=$class->consulta("INSERT INTO seg.empresa VALUES (	'".$id."',
																	'".trim($acu[2])."',
																	'".trim($acu[6])."',
																	'".$_POST['tel1']."',
																	'".$_POST['tel2']."',
																	'".$_POST['tel3']."',
																	'".$_POST['pag']."',
																	'".$_POST['cor']."',
																	'".$_POST['ruc']."',
																	'".trim($acu[8])."',
																	'".trim($acu[10])."',
																	'".trim($acu[12])."',
																	'".trim($acu[14])."',
																	'".trim($acu[16])."',
																	'".trim($acu[18])."',
																	'".trim($acu[20])."',
																	'".trim($acu[22])."',
																	'".trim($acu[24])."',
																	'"."0"."',
																	'".$fecha."')");			
			if(!$res) {
				$respuesta[]=2; ////error al momento de guardar
			}else {
				$respuesta[]=0;////datos guardados correctamento
				envio_correoactivacion_cuenta($_POST['cor'], $_POST['razon'], $id);//---------Envio Correos ---------//
			}
		}else{
			 $respuesta[]=1; ////el ruc ya existe
		}
		print json_encode($respuesta);	
	}
	if (isset($_POST['verificacion_existencia'])) {//--------------verificacion existencia ruc 		
		$resultado = $class->consulta("SELECT ruc FROM seg.empresa  WHERE ruc = '".$_POST['valor']."'");		
		if($class->num_rows($resultado) == 0 ){			
			print 'false'; //el ruc no existe
		}else{
			print 'true'; ////el ruc ya existe
		}
	}
	