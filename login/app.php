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
		$usuario=strtolower($_POST['user']);	
		// $usuario=$usuario.'001@facturanext.com';
		// accesando como Colaborador
		$resultado = $class->consulta("	SELECT 
											--perfil usuario
												upper(PC.NOMBRE) as perfil_nombre,
												upper(AC.id) as id_logeo,
												'Colaborador' as acceso,
												CC.DATA as tipo,
												PC.correo as perfil_correo,
											-- perfil empresa
												E.nom_comercial as empresa_nombre,
												E.id as empresa_id,
												SA.stado
										FROM SEG.ACCESO_COLABORADORES AC, colaboradores_perfil PC, SEG.EMPRESA E, SEG.ACCESOS SA, colaboradores_cargo CC
										WHERE PC.id_sucursal_empresa=E.ID AND SA.LOGIN='$usuario' AND AC.PASS=md5('$_POST[pass]') AND SA.ID_EMPRESA = E.ID AND CC.ID=PC.id_colaboradores_cargo");
		if($class->num_rows($resultado) == 0 ) {
			// accediendo como representante principal
			$res = $class->consulta("	SELECT 
											--perfil usuario
												upper(representante_legal) as perfil_nombre,
												upper(A.id) as id_logeo,
												'Gerencia' as acceso,
												'Administrador Master' as tipo,
												E.correo as perfil_correo,
											-- perfil empresa
												E.nom_comercial as empresa_nombre,
												E.id as empresa_id,
												A.stado as _stado
										FROM SEG.EMPRESA E, SEG.ACCESOS A 
										WHERE A.login='$usuario' AND A.pass=md5('$_POST[pass]') AND E.ID=A.ID_EMPRESA");
			if($class->num_rows($res) == 0 ) {
				$acu[0]=0;	
			}else{
				while ($row=$class->fetch_array($res)) {					
					$_SESSION['modelo'] = array(
												'perfil_nombre' => $row['perfil_nombre'],
												'id_logeo' => $row['id_logeo'],
												'acceso' => $row['acceso'],
												'tipo' => $row['tipo'],
												'perfil_correo' => $row['perfil_correo'],
												'empresa_id' => $row['empresa_id'],
												'empresa_nombre' => $row['empresa_nombre']
											   );
					if ($row['_stado']=='AUTOMATICO') {
						$_SESSION['acceso']['update']='1';
						$_SESSION['acceso']['dashboard']='0';
						$_SESSION['acceso']['login']='0';
						$acu['acceso']='update';
					} else {
						$_SESSION['acceso']['mibussines']='1';
						$_SESSION['acceso']['update']='0';
						$_SESSION['acceso']['login']='0';
						$acu['acceso']='mibussines';
					}
				}

				$acu[0]=1;
				$ahora = date('Y-m-d H:i:s');
				$limite = date('Y-m-d H:i:s', strtotime('+2 min'));				
				$resultado = $class->consulta("UPDATE seg.fecha_ingresos set fecha_ingreso='".$ahora."',fecha_limite='".$limite."',stado ='1', tipo_tabla= 'Usuario activo' where id_usuario = '".$_SESSION['modelo']['empresa_id']."'");
				$acu[1]=$_SESSION['modelo']['empresa_id'];					
			}			
		} else {
			while ($row=$class->fetch_array($resultado)) {				
				$_SESSION['modelo']= array(
											'perfil_nombre' => $row['perfil_nombre'],
											'id_logeo' => $row['id_logeo'],
											'acceso' => $row['acceso'],
											'tipo' => $row['tipo'],
											'perfil_correo' => $row['perfil_correo'],
											'empresa_id' => $row['empresa_id'],
											'empresa_nombre' => $row['empresa_nombre']
											);
			}
		}
		print_r(json_encode($acu));
	}
?>