<?php 
/* ------------------------------------------------------------ Initialize varibles de session ----------------------------------------------------*/
	if(!isset($_SESSION)){
        session_start();        
    }	
/* ---------------------------------------------------------- Include lib ------------------------------------------------------*/
	include_once('../admin/class.php');
	include_once('../admin/classcorreos.php');
	include_once('../admin/getsri.php');
	
/* -------------------------------------------------------- processes general----------------------------------------------------*/


	/* ----------------------variable global declara uso constructor methodo herencia ------------------*/
	$class = new constante();
	$classgetsri = new getsri();

	/* --------------------- cosumir servicio sri -> consulta ruc ------------------------- */
	if (isset($_POST['methods_ruc_consumed'])) {		
		$result = $classgetsri->consultar_ruc($_POST['txt_ruc']);
		print_r(json_encode($result));
	}	
	/* ---------------- verificacion existencia registro empresa cod ruc ------------------ */
	if (isset($_POST['registro_existencia_empresa'])) {	
		$resultado = $class->consulta("SELECT RUC FROM empresa.miempresa  WHERE RUC = '".$_POST['txt_ruc']."'");
		if($class->num_rows($resultado) == 0 ) {			
			$respuesta[]=0;// el ruc no existe
		}else{
			$respuesta[]=1; ////el ruc ya existe
		}
		print json_encode($respuesta);
	}
	/* ------------------ verificacion existencia registro correo ------------------------- */
	if (isset($_POST['verific_user_mail'])) {	
		$resultado = $class->consulta("SELECT correo FROM empresa.corporativo  WHERE correo = '".$_POST['txt_correo']."'");
		if($class->num_rows($resultado) == 0 ) {			
			print 'true'; // el ruc no existe
		}else{
			print 'false'; //el ruc ya existe
		}
	}
	/* ------------------------------- registrar nueva empresa ---------------------------- */
	if (isset($_POST['registro_nueva_empresa'])) {	

		$global=json_decode($_POST['global']);
		$adicional=json_decode(stripslashes($_POST['reg_acu']));

		$resultado = $class->consulta("SELECT RUC FROM empresa.miempresa  WHERE RUC = '".$global->ruc."'");
		if($class->num_rows($resultado) == 0 ) {		
			$id_corporativo = $class->idz();
			$id_miempresa = $class->idz();
			$fecha =$class->fecha_hora();			
			$res=$class->consulta("INSERT INTO empresa.corporativo VALUES (	'".$id_corporativo."',
																			'"."nombre"."',
																			'"."apellido"."',
																			'".$adicional->telefono."',
																			'".$adicional->movil."',
																			'".$adicional->correo."',
																			'"."0"."',
																			'".$fecha."')");
			$res=$class->consulta("INSERT INTO empresa.miempresa VALUES (	'".$id_miempresa."',
																			'".$id_corporativo."',																	
																			'".$global->razon_social."',
																			'".$global->nombre_comercial."',
																			'".$global->ruc."',
																			'".$global->estado_contribuyente."',
																			'".$global->clase_contribuyente."',
																			'".$global->tipo_contribuyente."',
																			'".$global->obligado_llevar_contabilidad."',
																			'".$global->actividad_economica."',
																			'".$global->fecha_inicio_actividades."',
																			'".$global->fecha_cese_actividades."',
																			'".$global->fecha_reinicio_actividades."',
																			'".$global->fecha_actualizacion."',
																			'"."0"."',
																			'".$fecha."')");
			if(!$res) {
				$respuesta = array('valid' => 'false', 'error' => 'guardar');//si existe y no se guardo
			} else {
				//---------Envio Correos ---------//
				$correo=activacion_cuenta($adicional->correo, $global->razon_social, $global->ruc, $id_corporativo);//resultado 1 si se envio el correo->cooreo/empres/ruc/id
				if ($correo) {
					$respuesta = array('valid' =>  'true');	// guardado correctamento
				}
			}
		} else {
			$respuesta = array('valid' => 'false', 'error' => 'existencia'); // el registro ya existe
		}
		print json_encode($respuesta);
	}
	/* -------------------------------- verificando acceso -------------------------------- */
	if (isset($_POST['acceder_user'])) {
		$res = $class->consulta("	SELECT A.id as id_usuario, A.stado as empresa_estado, A.correo
									FROM acceso.corporativo A, empresa.corporativo E  
									WHERE A.login=lower('$_POST[user]') AND A.pass=md5('$_POST[pass]') AND E.stado='1'");
		if($class->num_rows($res) == 1 ) {
			$row = $class-> fetch_array($res);
			$_SESSION['id_usuario']=$row['id_usuario'];
			$_SESSION['correo'] = strtolower($_POST['user']);
			$_SESSION['pass'] = $row['correo'];
			if ($row['empresa_estado']=='AUTOMATICO') {
				$acu = array('valid' => 'true', 'directorio' => 'update');
				$_SESSION['acceso']['update']='1';				
				
			}else{
				$acu = array('valid' => 'true', 'directorio' => 'mibussines');
				$_SESSION['acceso']['mibussines']='1';
			}
			print_r(json_encode($acu));
		}else{
			print_r(json_encode(array('valid' => 'false')));
		}
	}
?>