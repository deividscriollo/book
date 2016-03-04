<?php
if(!isset($_SESSION)){
    session_start();        
}   
require_once('../admin/class.php');
require_once('../admin/xmlapi.php');
require_once('../admin/classcorreos.php');
require_once('../login/app.php');
$class=new constante();
if (isset($_POST['activ_reg_count'])) {
	$id = $class->idz();
	$mdo=0;
	$fecha =$class->fecha_hora();
	$res = $class->consulta("SELECT * FROM SEG.EMPRESA WHERE ID='".$_POST['id']."' AND STADO='0'");
	while ($row=$class->fetch_array($res)) {
		$mdo=1;		
		$class->consulta("UPDATE SEG.EMPRESA SET STADO='1' WHERE ID='".$_POST['id']."'");	
		$resultado = $class->consulta("SELECT ruc,correo,CASE WHEN nom_comercial='' THEN upper(representante_legal) END AS nom_comercial from seg.empresa WHERE id='".$_POST['id']."'");	
		while ($row = $class->fetch_array($resultado)) {
			$ruc = $row[0];	
			$empresa = $row[2];	
			$correo = $row[1];
		}
		$estab = establecimientoSRI($ruc);
		$html = str_get_html($estab);
		$arr_1[]=1;
		foreach($html->find('table tr td') as $e){
			$arr_1[] = utf8_encode(trim($e->innertext));
		}

		for ($i=1; $i < (count($arr_1)); $i=$i+4) {
			if(strlen($arr_1[$i]) == 3 ){
				$id_sucursal = $class->idz();
				$cod=$arr_1[$i+0];
				$emp=$arr_1[$i+1];
				$dir=$arr_1[$i+2];
				$sta=$arr_1[$i+3];
				$class->consulta("INSERT INTO sucursales_empresa VALUES('".$id_sucursal."','".$_POST['id']."','".$cod."','".$emp."','".$dir."','".$sta."','0','".$fecha."')");	
			}
			
		}		
		$email_user =$ruc;
		$email_pass =$class->clave_aleatoria();
		$class->consulta("INSERT INTO seg.accesos VALUES ('".$id."','".$_POST['id']."','".$ruc.'@facturanext.com'."',md5('".$email_pass."'),'".$email_pass."','AUTOMATICO','".$fecha."')");
		$email_quota = 0;             // 0 is no quota, or set a number in mb
		$xmlapi = new xmlapi(IPSERVER);
		$xmlapi->set_port(PORTMAIL);     //set port number.
		$xmlapi->password_auth(ACCOUNT, PASSWD);
		$xmlapi->set_debug(0);        //output to error file  set to 1 to see error_log.				
		$call = array('domain'=>DOMAIN, 'email'=>$email_user, 'password'=>$email_pass, 'quota'=>$email_quota);
		$result = $xmlapi->api2_query(ACCOUNT, "Email", "addpop", $call );			
	    activacion_correo($correo,$empresa,$ruc,'123', $email_user, $email_pass);// funcion envio correos activacion cuenta
	    $result['user']=$email_user;
	    $result['pass']=$email_pass;
	    $result['empresa']=$empresa;
	    print_r(json_encode($result));
	}
	if($mdo==0 ){
		$acus[]=1;
		print_r(json_encode($acus));
	}
}




?>