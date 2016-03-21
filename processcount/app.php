<?php
/* ------------------------------------------------------------ Initialize varibles de session ----------------------------------------------------*/
if(!isset($_SESSION)){
    session_start();        
}
/* ---------------------------------------------------------- Include lib ------------------------------------------------------*/
require_once('../admin/class.php');
require_once('../admin/xmlapi.php');
require_once('../admin/classcorreos.php');
require_once('../admin/getsri.php');

/* -------------------------------------------------------- processes general----------------------------------------------------*/
	/* ----------------------variable global declara uso constructor methodo herencia ------------------*/
	$class=new constante();
	$classgetsri=new getsri();

	/* -----------------------------activacion de la cuenta por primera vez ----------------------------*/
	if (isset($_POST['activ_reg_count'])) {
		$id = $class->idz();	
		$fecha =$class->fecha_hora();
		$sum=0;


		$res = $class->consulta("SELECT * FROM empresa.corporativo WHERE ID='".$_POST['id']."' AND STADO='0'");
		while ($row=$class->fetch_array($res)) {
			$sum=1;			
			$class->consulta("UPDATE empresa.corporativo SET STADO='1' WHERE ID='".$_POST['id']."'");
			$resultado = $class->consulta("SELECT E.id, ruc,correo, razon_social from empresa.miempresa E, empresa.corporativo C WHERE C.id='$_POST[id]'");	
			while ($row = $class->fetch_array($resultado)) {
				$acu = $classgetsri->establecimientoSRI($row['ruc']);
				if ($acu) {
					for ($i=0; $i < count($acu['sucursal']); $i++) {	
						$class->consulta("INSERT INTO sucursales.misucursal VALUES('".$class->idz()."',
																					'".$row['id']."',
																					'".$acu['sucursal'][$i]['codigo']."',
																					'".$acu['sucursal'][$i]['nombre_sucursal']."',
																					'".$acu['sucursal'][$i]['direccion']."',
																					'".$acu['sucursal'][$i]['estado']."',
																					'0','".$fecha."')");
					}
					$email_user = $row['ruc'];
					$email_pass = $class->clave_aleatoria();					
					$class->consulta("INSERT INTO acceso.corporativo VALUES (	'".$id."',
																				'".$_POST['id']."',
																				'".$row['ruc'].'@facturanext.com'."',
																				md5('".$email_pass."'),
																				'".$email_pass."',
																				'AUTOMATICO',
																				'".$fecha."')");

					$email_quota = 0;             // 0 is no quota, or set a number in mb
					$xmlapi = new xmlapi(IPSERVER);
					$xmlapi->set_port(PORTMAIL);     //set port number.
					$xmlapi->password_auth(ACCOUNT, PASSWD);
					$xmlapi->set_debug(0);        //output to error file  set to 1 to see error_log.				
					$call = array('domain'=>DOMAIN, 'email'=>$email_user, 'password'=>$email_pass, 'quota'=>$email_quota);
					$result = $xmlapi->api2_query(ACCOUNT, "Email", "addpop", $call );			
				    activacion_correo($row['correo'],$row['razon_social'],$row['ruc'],'123', $email_user, $email_pass);// funcion envio correos activacion cuenta
				    $result['user']=$email_user;
				    $result['pass']=$email_pass;
				    $result['empresa']=$row['razon_social'];
				    $result['valid']='true';

					$directorio = "../facturanext/archivos/".$_POST['id'];
					if (!file_exists($directorio)) {
						mkdir($directorio, 0777, true);
					}			
				    print_r(json_encode($result));
				}else
					print_r(json_encode(array('valid' => 'false', 'motivo' => 'accion_intentar_tarde')));
			}
		}
		if($sum == 0 ){
			print_r(json_encode(array('valid' => 'false', 'motivo' => 'accion_procesada')));
		}
	}
	/* ------------------------------- activacion de la cuenta colaborador ------------------------------*/
	if (isset($_POST['activ_reg_count_colaborador'])) {
		
	}
?>