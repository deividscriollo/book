<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
    include_once('../admin/class.php');
    include_once('../admin/xmlapi.php');

	// procesos referentes a angular $htpp
	$postdata = file_get_contents("php://input"); 
	$constructor = json_decode($postdata); 
	
	if ($constructor -> methods == 'cambio_sucursal') {
		$_SESSION["acceso"]['dashboard'] = '0';
		$_SESSION["acceso"]['mibussines'] = '1';
    	print_r(json_encode(array('mibussines')));
	}
	// modelo base de datos
	if ($constructor -> methods == 'info2') {
		print_r(json_encode(array('nombre' => 'deivid', 'apellido' => 'esteban')));
	}

	if ($constructor -> methods == 'informacion_perfil') {
		print_r(json_encode(array('nombre' => 'deivid', 'apellido' => 'esteban')));
	}
	if ($constructor -> methods == 'verificar_existencia_nuevos_correos') {

		// print imap_open("{nextbook.com:143/notls}INBOX", "1090084247001@facturanext.com", "UO4clrWZ2vf5");
		
		$domainURL = 'facturanext.ec';         // Your websites domain
		$useHTTPS = false;
		$inbox = imap_open('{facturanext.com:143/notls}INBOX',$_SESSION['correo'],$_SESSION['pass']) or die('Cannot connect to domain:' . imap_last_error());
		$emails = imap_search($inbox,'UNSEEN');//mensajes no leidos
		$nEmails = 0;
		if($emails) {
			$nEmails  = count($emails);
		}		
		// // cantidad mensajes no leidos
		// $comprobar = imap_mailboxmsginfo($inbox);
		// print($comprobar->Unread);

		// $cabecera = imap_headers($inbox);
		// print_r($cabecera);
		imap_close($inbox);
		print_r(json_encode(array('valid' => 'true', 'correos' => $nEmails)));
	}	

	function perfil_empresa(){
		$class=new constante();
		$id_empresa=$_SESSION['id_empresa_miempresa'];
		$resultado = $class->consulta("	SELECT * FROM empresa.miempresa WHERE id='$id_empresa';");
		while ($row=$class->fetch_array($resultado)) {
			$acu = array(	'razon_social' =>ucwords($row['razon_social']),
						 	'nom_comercial' =>ucwords($row['nom_comercial']),
						 	'ruc' =>$row['ruc'],
						 	'estado_contri' =>ucwords($row['estado_contri']),	
						 	'clase_contri' =>ucwords($row['clase_contri']),
						 	'tipo_contri' =>ucwords($row['tipo_contri']),
						 	'obligado_conta' =>ucwords($row['obligado_conta']),
						 	'actividad_economica' =>ucwords($row['actividad_economica'])
						 );
		}
		return $acu;
	}

	
?>