<?php 
	include_once('../admin2/class.php');

	if(!isset($_SESSION)) {
        session_start(); 
    }

	error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
	if($_GET['fn'] == '1') {
		modificar_celda();
	}
	if($_GET['fn'] == '2') {
		descargar_archivo();
	}
	if($_GET['fn'] == '3') {
		agregar_archivo($_GET['id'],$_GET['acceso'],$_GET['consumo']);		
	}
	if($_GET['fn'] == '4') {
		numero_mensajes($_GET['id_user']);		
	}
	if($_GET['fn'] == '5') {
		verificar_session($_SESSION['modelo']['empresa_id']);
	}
	if($_GET['fn'] == '6') {
		$sql = "select id,ruc_proveedor,nombre_proveedor from facturanext.proveedores";		
		cargar_select_pro($sql);
	}
	if($_GET['fn'] == '7') {		
		agregar_proveedor($_GET['ruc'],$_GET['nombre'],$_GET['dir']);
	}
	if($_GET['fn'] == '8') {				
		$cadena = substr($_POST['detalles'], 0, -1);				
		$cadena= '['.$cadena.']';		
		agregar_factura_fisica($cadena);
	}

	if (isset($_POST['object_id'])) {
		$acu = array('id' => $_SESSION['modelo']['empresa_id']);
		print_r(json_encode($acu));
	}
	
	function modificar_celda() {
		$class=new constante();	
		$class->consulta("UPDATE facturanext.correo set tipo ='".$_POST['consumo']."' where id ='".$_POST['id']."'");	
	}
	
	function descargar_archivo() {				
    	
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
		 
		    while( !feof($fp) and (connection_status() == 0) ) {
		        print(fread($fp, 8192));
		        flush();
		    }
		 
		    @fclose($fp);
		    exit;
		}	
	}

	//////////////////////////////////////////////////
	function getMimeType($filename) {
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
	 
	    if(isset($mime_types[$ext])) {
	        return $mime_types[$ext];
	    } else {
	        return 'application/octet-stream';
	    }
	}

	function agregar_archivo($id_user,$clave_acceso,$consumo) {
		$class=new constante();	
		$ruc = '';
		$result = $class->consulta("select id from facturanext.correo where clave_acceso = '".$clave_acceso."' and id_usuario = '".$id_user."'");
		if($class->num_rows($result) > 0){
			$resp = 3;
		} else {
			$resp = 0;
			$estado = '';
			$pAppDbg = "false";			     
			//error_reporting(0);	
			//error_reporting(E_ALL);	
			//error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
			$slRecepWs = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl";
			$slAutorWs = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl";
			$alWsdl = array();
			$glDebug = isset($_GET['pAppDbg'])? $_GET['pAppDbg'] : false;   	 

			$alWsdl [1]= array('recep'=>"https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl",
								  'autor'=>"https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl");
			 
			$alWsdl [2]=array('recep'=>"https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl",
								  'autor'=>"https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl");	 
		    $slUrl = $alWsdl[2]['autor'];	
			$olClient = new SoapClient($slUrl, array('encoding'=>'UTF-8'));				
			$olResp = $olClient->autorizacionComprobante(array('claveAccesoComprobante'=> $clave_acceso));		

			$estado = $olResp->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->estado;						

			if($estado == 'AUTORIZADO') {				
				$comp = $class->consulta("select ruc from seg.empresa where id ='".$id_user."'");
				while ($row_1= $class->fetch_array($comp)) {					
					$ruc = $row_1[0];
				}	

				$id_fac = $class->idz();					
				$email = '';
				$razon_social = '';
				
				$xmlComp = new SimpleXMLElement($olResp->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->comprobante);								
				$fecha_aut = $xmlComp->infoFactura->fechaEmision;										
				$fecha = $class->fecha_hora();
				$razon_social = $xmlComp->infoTributaria->razonSocial;
				$cod_doc = $xmlComp->infoTributaria->codDoc;

				for ($i=0; $i < sizeof($xmlComp->infoAdicional->campoAdicional); $i++) { 	
					if(strtolower($xmlComp->infoAdicional->campoAdicional[$i]->attributes()) == 'email' ) {
						$email = $xmlComp->infoAdicional->campoAdicional[$i];
					}								
				}	

				if($ruc == $xmlComp->infoFactura->identificacionComprador || substr($ruc, 0,10)  == $xmlComp->infoFactura->identificacionComprador) {														
					////////GUARDO FACTURA///////////	

					$id_prov = $class->idz();
					$fecha_adj = $class->fecha_hora();
					$id_fact = $class->idz();
					$res = $class->consulta("select id from facturanext.proveedores where ruc_proveedor = '".$xmlComp->infoTributaria->ruc."'");				
					if($class->num_rows($res) == 0 ){			
						$class->consulta("insert into facturanext.proveedores values ('".$id_prov."','".$xmlComp->infoTributaria->ruc."','".$xmlComp->infoTributaria->nombreComercial."','".$xmlComp->infoTributaria->dirMatriz."','".$fecha_adj."','0')");
					} else {
						while ($row_1=$class->fetch_array($res)) {
							$id_prov = $row_1[0];						
						}					 
					}

					$num_fac = $xmlComp->infoTributaria->estab. '-'.$xmlComp->infoTributaria->ptoEmi. '-'.$xmlComp->infoTributaria->secuencial;
					$var_fe = $xmlComp->infoFactura->fechaEmision;
					$date_fe = str_replace('/', '-', $var_fe);
					$date_fe = date('Y-m-d', strtotime($date_fe));
					$class->consulta("insert into facturanext.facturas values ('".$id_fact."','".$num_fac."','".$id_prov."','".$date_fe."','".$xmlComp->infoFactura->totalSinImpuestos."','".$xmlComp->infoFactura->totalDescuento."','".$xmlComp->infoFactura->propina."','".$xmlComp->infoFactura->importeTotal ."','".$fecha_adj."','1','".$id_fac."','".$xmlComp->infoTributaria->codDoc."')");
					
				} else {
					$resp = 3; ////EL RUC DEL USUARIO NO COINCIDE CON EL DEL PROVEEDOR completar con el else					
				}

				$class->consulta("insert into facturanext.correo values ('".$id_fac."','".$razon_social."','".$email."','".''."','".$fecha."','".'Docuemnto Generado por el SRI'."','".''."','1','".$id_user."','".$cod_doc."','".$razon_social."','".$clave_acceso."','".$consumo."','".$fecha_aut."')");	
				$id_adj = $class->idz();		
				$class->consulta("insert into facturanext.adjuntos values ('".$id_adj."','".$id_fac."','".$id_adj."','".$id_adj."','".$id_adj."','0','xml','0','".$fecha."')");
				$nombre = "archivos/".$id_user."/".$id_adj.".xml";									
				
				//print_r($xmlComp);				
				$xml = $class->generateValidXmlFromObj($olResp->RespuestaAutorizacionComprobante->autorizaciones);			
				
				//$xml = generateValidXmlFromObj($olResp->RespuestaAutorizacionComprobante->autorizaciones);
				$doc= fopen($nombre,"w+");							
				
				if(fwrite ($doc,$xml)){
					fclose($doc);				
					$resp = 1;	

				} else {
					$resp = 0;
				}			
			} else {
				$resp = 2;
			}		
		}
		echo $resp;		
	}

	function numero_mensajes($id_user) {
		$class=new constante();	
		$resultado = $class->consulta("select seg.accesos.login, seg.accesos.pass_origin from seg.accesos,seg.empresa where seg.empresa.id = seg.accesos.id_empresa and seg.empresa.id = '".$id_user."'");
		while ($row=$class->fetch_array($resultado)) {
			$emailAddress = $row[0]; // Full email address
			$emailPassword = $row[1];        // Email password
		}

		$domainURL = 'facturanext.ec';         // Your websites domain
		$useHTTPS = false;      		
		$inbox = imap_open('{facturanext.ec:143/notls}INBOX',$emailAddress,$emailPassword) or die('Cannot connect to domain:' . imap_last_error());			 		
		$arr = array();		
		$emails = imap_search($inbox,'UNSEEN');
		$nEmails = 0;
		if($emails) {
			$nEmails  = count($emails);
		}

		imap_close($inbox);
		echo $nEmails;
	}

	function cargar_select_pro($sql) {
		$lista = array();
	    $data = 0;	    
		$class=new constante();	
		$resultado = $class->consulta($sql);		
		while ($row=$class->fetch_array($resultado)) {			
			print '<option value="'.$row[0].'"  data-foo="'.$row[2].'">'.$row[1].'</option>';   	            	         
		}		
	}

	function agregar_proveedor($ruc,$nombre,$dir) {
		$class=new constante();	
		$data = '0';
		$id_prov = $class->idz();
		$fecha_adj = $class->fecha_hora();
		$res = $class->consulta("select id from facturanext.proveedores where ruc_proveedor = '".$ruc."'");				
		if($class->num_rows($res) == 0 ) {			
			$class->consulta("insert into facturanext.proveedores values ('".$id_prov."','".$ruc."','".$nombre."','".$dir."','".$fecha_adj."','0')");
			$data ='1';
		} else {
			$data ='0';
		}

		echo $data;
	}

	function agregar_factura_fisica($arr) {
		$data = '0';
		$arr = json_decode($arr);		
		$class=new constante();	
		$id_fac_c = $class->idz();		
		$class->consulta("insert into facturanext.correo values ('".$id_fac_c."','".$_POST['razon_social']."','','".''."','".$_POST['f_emi']."','".'Factura Ingresada Manualmente'."','".''."','5','".$_GET['id']."','".$_POST['docu']."','".$_POST['razon_social']."','','".$_POST['tipo']."','".$_POST['f_cre']."')");			///estado 5 documento manual
		$id_fac = $class->idz();		
		$result = $class->consulta("insert into facturanext.facturas_fisica values ('".$id_fac."','".$_POST['prov']."','".$_GET['id']."','".$_SESSION['modelo']['empresa_id']."','".$_POST['tipo']."','".$_POST['docu']."','".$_POST['f_cre']."','".$_POST['f_emi']."','".$_POST['num']."','".$_POST['sub']."','".'0'."','".'0'."','".$_POST['iva0']."','".$_POST['iva12']."','".$_POST['iva']."','".$_POST['descuento']."','".$_POST['tot']."','0','".$id_fac_c."')");
		for($i = 0; $i < count($arr); $i++){
			$id_det = $class->idz();			
			$result = $class->consulta("insert into facturanext.detalles_fisicas values ('".$id_det."','".$id_fac."','".$arr[$i]->codigo_fac."','".$arr[$i]->cantidad_fac."','".$arr[$i]->descripcion_fac."','".$arr[$i]->precio_unitario."','".$arr[$i]->precio_total."','".$arr[$i]->descuento."','".$arr[$i]->iva."')");
		}

		$data = '1';
		echo $data;
	}

	function verificar_session($session) {
		$class=new constante();	
		$data = '0';		
		$ahora = date('Y-m-d H:i:s');
		$limite = date('Y-m-d H:i:s', strtotime('+2 min'));		
		$result = $class->consulta("select  id from seg.fecha_ingresos as FI where id_usuario  = '".$session."' and stado = '1'  and  '".$ahora."' between FI.fecha_ingreso and FI.fecha_limite");
		if($class->num_rows($result) == 0 ) {			
			$resultado = $class->consulta("UPDATE seg.fecha_ingresos set stado='0',tipo_tabla='Usuario offline' where id_usuario = '".$session."'");
			$data = '0'; ////el usuario esta offline
		} else {			
			$resultado = $class->consulta("UPDATE seg.fecha_ingresos set fecha_ingreso='".$ahora."',fecha_limite='".$limite."',stado='1',tipo_tabla='Usuario activo' where id_usuario = '".$session."'");
			$data = '1';
		}

		echo $data;
	}
?>


