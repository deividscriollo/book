<?php 
	include_once('../admin/class.php');		

	if($_GET['fn'] == '1'){
		modificar_celda();
	}
	if($_GET['fn'] == '2'){
		descargar_archivo();
	}
	if($_GET['fn'] == '3'){
		agregar_archivo($_GET['id'],$_GET['acceso'],$_GET['consumo']);		
	}
	if($_GET['fn'] == '4'){
		numero_mensajes($_GET['id_user']);		
	}

	function modificar_celda(){
		$class=new constante();	
		$class->consulta("UPDATE facturanext.correo set tipo ='".$_POST['consumo']."' where id ='".$_POST['id']."'");	
	}
	
	function descargar_archivo(){		
		
    	
	   	$file="../archivos/".$_GET['user']."/".$_GET['id'].".".$_GET['ext']; //file location 
	   	
	   	if (!is_readable($file))
		    die('File is not readable or not exists!');
		 
		$filename = pathinfo($file, PATHINFO_BASENAME);
		 
		// get mime type of file by extension
		$mime_type = getMimeType($filename);
		 
		// set headers
		header('Pragma: public');
		header('Expires: -1');
		header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
		header('Content-Transfer-Encoding: binary');
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Length: " . filesize($file));
		header("Content-Type: $mime_type");
		header("Content-Description: File Transfer");
		 
		// read file as chunk
		if ( $fp = fopen($file, 'rb') ) {
		    ob_end_clean();
		 
		    while( !feof($fp) and (connection_status()==0) ) {
		        print(fread($fp, 8192));
		        flush();
		    }
		 
		    @fclose($fp);
		    exit;
		}

		
	}
	//////////////////////////////////////////////////
	function getMimeType($filename){
	    $ext = pathinfo($filename, PATHINFO_EXTENSION);
	    $ext = strtolower($ext);
	 
	    $mime_types=array(
	        "pdf" => "application/pdf",
	        "txt" => "text/plain",
	        "html" => "text/html",
	        "htm" => "text/html",
	        "exe" => "application/octet-stream",
	        "zip" => "application/zip",
	        "doc" => "application/msword",
	        "xls" => "application/vnd.ms-excel",
	        "ppt" => "application/vnd.ms-powerpoint",
	        "gif" => "image/gif",
	        "png" => "image/png",
	        "jpeg"=> "image/jpg",
	        "jpg" =>  "image/jpg",
	        "php" => "text/plain",
	        "csv" => "text/csv",
	        "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
	        "pptx" => "application/vnd.openxmlformats-officedocument.presentationml.presentation",
	        "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
	    );
	 
	    if(isset($mime_types[$ext])){
	        return $mime_types[$ext];
	    } else {
	        return 'application/octet-stream';
	    }
	}

	function agregar_archivo($id_user,$clave_acceso,$consumo){
		$class=new constante();	

		$result = $class->consulta("select id from facturanext.correo where clave_acceso = '".$clave_acceso."' and id_usuario = '".$id_user."'");
		if($class->num_rows($result) > 0){
			$resp = 3;
		}else{
			$resp = 0;
			$estado = '';
			$pAppDbg = "false";
			error_reporting(E_ALL);	
			$slRecepWs = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl";
			$slAutorWs = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl";
			$alWsdl = array();
			$glDebug = isset($_GET['pAppDbg'])? $_GET['pAppDbg'] : false;   	 
			$alWsdl [1]= array('recep'=>"https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl",
								  'autor'=>"https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl");
			 
			$alWsdl [2]=array('recep'=>"https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl",
								  'autor'=>"https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl");	 
		    $slUrl = $alWsdl[1]['autor'];	
			$olClient = new SoapClient($slUrl, array('encoding'=>'UTF-8'));			
			$olResp = $olClient->autorizacionComprobante(array('claveAccesoComprobante'=> $clave_acceso));		
			$estado = $olResp->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->estado;						

			if($estado == 'AUTORIZADO'){
				$id_fac = $class->idz();					
				$email = '';
				$razon_social = '';
				
				$xmlComp = new SimpleXMLElement($olResp->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->comprobante);								
				
				$fecha = $class->fecha_hora();
				$razon_social = $xmlComp->infoTributaria->razonSocial;
				$cod_doc = $xmlComp->infoTributaria->codDoc;

				for ($i=0; $i < sizeof($xmlComp->infoAdicional->campoAdicional); $i++) { 	
					if(strtolower($xmlComp->infoAdicional->campoAdicional[$i]->attributes()) == 'email' ){
						$email = $xmlComp->infoAdicional->campoAdicional[$i];

					}								
				}	
				$class->consulta("insert into facturanext.correo values ('".$id_fac."','".$razon_social."','".$email."','".''."','".$fecha."','".'Docuemnto Generado por el SRI'."','".''."','0','".$id_user."','".$cod_doc."','".$razon_social."','".$clave_acceso."','".$consumo."')");	
				$id_adj = $class->idz();		
				$class->consulta("insert into facturanext.adjuntos values ('".$id_adj."','".$id_fac."','".$id_adj."','".$id_adj."','".$id_adj."','0','xml','0','".$fecha."')");
				$nombre = "../archivos/".$id_user."/".$id_adj.".xml";									
				$xml = $class->generateValidXmlFromObj($olResp->RespuestaAutorizacionComprobante->autorizaciones);			
				//$xml = generateValidXmlFromObj($olResp->RespuestaAutorizacionComprobante->autorizaciones);
				$doc= fopen($nombre,"w+");							
				
				if(fwrite ($doc,$xml)){
					fclose($doc);				
					$resp = 1;	

				}else{
					$resp = 0;
				}			
			}else{
				$resp = 2;
			}		
		}
		echo $resp;		
	}

	function numero_mensajes($id_user){
		$class=new constante();	
		$resultado = $class->consulta("select seg.accesos.login, seg.accesos.pass_origin from seg.accesos,seg.empresa where seg.empresa.id = seg.accesos.id_empresa and seg.empresa.id = '".$id_user."'");
		while ($row=$class->fetch_array($resultado)) {
			$emailAddress = $row[0]; // Full email address
			$emailPassword = $row[1];        // Email password
		}	
		$domainURL = 'facturanext.ec';         // Your websites domain
		$useHTTPS = false;      		
		$inbox = imap_open('{'.$domainURL.':143/notls}INBOX',$emailAddress,$emailPassword) or die('Cannot connect to domain:' . imap_last_error());			 		
		$arr = array();		
		$emails = imap_search($inbox,'UNSEEN');
		$nEmails = 0;
		if($emails) {
			$nEmails  = count($emails);
		}
		imap_close($inbox);
		echo $nEmails;
	}
?>