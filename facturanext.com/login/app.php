<?php 
/* ------------------------------------------------------------ Initialize varibles de session ----------------------------------------------------*/
	if(!isset($_SESSION)){
        session_start();        
    }	
/* ---------------------------------------------------------- Include lib ------------------------------------------------------*/
	include_once('../../admin/class.php');

/* -------------------------------------------------------- processes general----------------------------------------------------*/


	/* ----------------------variable global declara uso constructor methodo herencia ------------------*/
	$class = new constante();

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
			print_r(json_encode(array('valid' => 'true')));
		}else{
			print_r(json_encode(array('valid' => 'false')));
		}
	}
?>