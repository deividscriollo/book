<?php
if(!isset($_SESSION)){
    session_start();        
}   
require_once('../admin/class.php');
require_once('../admin/xmlapi.php');
require_once('../admin/correo-web.php');
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
			/*if(utf8_encode(trim($e->innertext)) == '' || utf8_encode(trim($e->innertext)) == '&nbsp;'){
		    	//$arr_1[] = utf8_encode(trim($e->innertext));
			}else{
				$arr_1[] = utf8_encode(trim($e->innertext));
			}*/			
			$arr_1[] = utf8_encode(trim($e->innertext));
		}

		for ($i=1; $i < (count($arr_1)); $i=$i+4) {
			if(strlen($arr_1[$i]) == 3 ){
				$id_sucursal = $class->idz();
				$cod=$arr_1[$i+0];
				$emp=$arr_1[$i+1];
				$dir=$arr_1[$i+2];
				$sta=$arr_1[$i+3];
				$resultado = $class->consulta("INSERT INTO sucursales_empresa VALUES('".$id_sucursal."','".$ruc."','".$cod."','".$emp."','".$dir."','".$sta."','0','".$fecha."')");				
			}
			
		}		
		$email_user =$ruc;
		$email_pass =$class->clave_aleatoria();
		$resultado = $class->consulta("INSERT INTO seg.accesos VALUES ('".$id."','".$_POST['id']."','".$ruc.'@facturanext.com'."',md5('".$email_pass."'),'".$email_pass."','AUTOMATICO','".$fecha."')");
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
if (isset($_POST['mostrar_seleccion_empresa'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$acu[0]=1;
	if (isset($_SESSION['SUCURSAL_EMPRESA'])) {
		$acu[0]=$_SESSION['SUCURSAL_EMPRESA'];
	}
	print_r(json_encode($acu));
}
if (isset($_POST['verificacion_seleccion_empresa'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$acu[0]=1;
	if (isset($_SESSION['SUCURSAL_EMPRESA'])) {
		$acu[0]=0;
	}
	print_r(json_encode($acu));
}
if (isset($_POST['verificacion_acceso'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$acu[0]=1;
	$resultado = $class->consulta("SELECT * from seg.accesos WHERE login ='".$_SESSION['login']."' AND STADO='AUTOMATICO'");	
	while ($row = $class->fetch_array($resultado)) {
		$acu[0]=0;
	}
	print_r(json_encode($acu));
}
if (isset($_POST['buscar_categoria'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$resultado = $class->consulta("SELECT EC.ID, EC.CATEGORIA FROM EMPRESA_CATEGORIA EC WHERE EC.STADO='1' order by CATEGORIA");	
	while ($row = $class->fetch_array($resultado)) {
		$acu[]=$row[0];
		$acu[]=$row[1];
	}
	print_r(json_encode($acu));
}
if (isset($_POST['buscar_tipo'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$resultado = $class->consulta("SELECT ET.ID, upper(ET.TIPO) FROM EMPRESA_TIPO ET WHERE ET.STADO='1' AND ET.ID_EMPRESA_CATEGORIA='$_POST[id]' order by tipo");	
	while ($row = $class->fetch_array($resultado)) {
		$acu[]=$row[0];
		$acu[]=$row[1];
	}
	print_r(json_encode($acu));
}

if (isset($_POST['buscar_actividad'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$resultado = $class->consulta("SELECT ET.ID, upper(ET.TIPO) FROM EMPRESA_TIPO ET WHERE ET.STADO='1' AND ET.ID_EMPRESA_CATEGORIA='$_POST[id]' order by tipo");	
	while ($row = $class->fetch_array($resultado)) {
		$acu[]=$row[0];
		$acu[]=$row[1];
	}
	print_r(json_encode($acu));
}
if (isset($_POST['actualizando_info'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$acu[0]=0;//NO actualizado
	$resultado = $class->consulta("UPDATE seg.accesos SET pass='$_POST[valor]', stado='passmin' WHERE login='".$_SESSION['login']."'");	
	if($class->num_rows($resultado) == 0 ){
		$acu[0]=1;//SI se actualizo
	}
	print_r(json_encode($acu));
}
if (isset($_POST['seleccionar_empresa'])) {
	// verficiacion si hay cambio en el perfil del usuario
	$acu[0]=0;//NO actualizado
	$resultado = $class->consulta("SELECT * FROM SUCURSALES_EMPRESA WHERE id='".$_POST['empresa']."'");	
	while ($row = $class->fetch_array($resultado)) {
		$_SESSION['SUCURSAL_EMPRESA']=$row;
		$acu[]=$row[0];
		$acu[]=$row[1];
		$acu[]=$row[2];
		$acu[]=$row[3];
		$acu[]=$row[4];
		$acu[]=$row[5];
		$acu[]=$row[6];
	}
	print_r(json_encode($acu));
}
if (isset($_POST['obj_grup_empresas'])) {
	// $resultado = $class->consulta("UPDATE SUCURSALES_EMPRESA SET ID_EMPRESA='1090084247001'");	

	// verficiacion si hay cambio en el perfil del usuario
	$resultado = $class->consulta("SELECT * FROM sucursales_empresa S, SEG.EMPRESA E WHERE id_empresa=E.ruc AND E.ID='".$_SESSION['id']."'");
	while ($row = $class->fetch_array($resultado)) {
		if ($row[5]=='Abierto') {
			print'<div class="alert alert-success alert-sm">
                    <span class="fw-semi-bold" >
                    	<i class="fa fa-database"></i> '.$row[3].':
                    </span> <small data-toggle="tooltip" data-placement="top" title="'.$row[4].'"><span class="label label-primary">Dirección</span></small>
                	<span class="btn btn-success btn-xs pull-right mr-xs btn_empresa_select" id="'.$row[0].'">
                    	Seleccionar
                    </span>
                 </div>';
		}else{
			print'<div class="alert alert-danger alert-sm">
                    <span class="fw-semi-bold">
                    	<i class="fa fa-database"></i> '.$row[3].'
                    </span> <small data-toggle="tooltip" data-placement="top" title="'.$row[4].'"><span class="label label-primary">Dirección</span></small>
                    <span class="btn btn-default btn-xs pull-right mr disabled">'.$row[5].'</span>
                </div>';
		}
	}
}



?>