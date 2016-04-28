<?php

	if(!isset($_SESSION)) {
        session_start();
    }
    // ------------------------------------------------ Lib requiered ------------------------------------------------------ //
	include_once('../../admin/class.php');
	include_once('../../admin/classcorreos.php');	
	include_once('../../admin/getsri.php');	
	include_once('../../admin/xmlapi.php');

	// ----------------------------------------- Herencia contstructor conexion db ----------------------------------------- //
	$class = new constante();
	$getsri = new getsri();		
	

	// procesos referentes a angular $htpp
    $postdata = file_get_contents("php://input"); 
    $constructor = json_decode($postdata);

	// ---------------------------------------------- Progcesos generales -------------------------------------------------- //
    if ($constructor -> methods == 'consulta-id-miempresa') {
		print_r(json_encode(array('id_miempresa' => $_SESSION['id_miempresa'])));
	}

	if ($constructor -> methods == 'verificar_correo_facturas_electronicas'){
		$imbox = imap_open('{facturanext.com:143/notls}INBOX',$_SESSION['correo'],$_SESSION['pass'])
					or die('Cannot connect to domain:'.imap_last_error());
		// --------------------------------------------------- verificar mensajes enviados ------------------------------------------- //
		$emails = imap_search($imbox,'UNSEEN');
		$max_emails = 10;// correos maximos para no saturar	
		$arr = array();

		if($emails) {
			$cont_adjuntos = 0;
			rsort($emails);
			foreach ( $emails as $email ) {
				$structure = imap_fetchstructure($imbox, $email );
				$overview = imap_fetch_overview($imbox,$email,0);
		        $size=sizeof($overview);
				// $structure = imap_fetchstructure($imbox, $email );
				$attachments = array ();
                if(isset($structure->parts) && count($structure->parts)) {
                	for($i = 0; $i < count($structure->parts); $i++) {
                		$attachments[$i] = array(
							'is_attachment' => false,
							'filename' => '',
							'name' => '',
							'attachment' => ''
						);
						if($structure->parts[$i]->ifdparameters) {
							foreach($structure->parts[$i]->dparameters as $object) {

								if(strtolower($object->attribute) == 'filename') {
									$attachments[$i]['is_attachment'] = true;
									$attachments[$i]['filename'] = $object->value;
								}
							}
						}
						
						if($structure->parts[$i]->ifparameters) {
							foreach($structure->parts[$i]->parameters as $object) {
								if(strtolower($object->attribute) == 'name') {
									$attachments[$i]['is_attachment'] = true;
									$attachments[$i]['name'] = $object->value;
								}
							}
						}						
						if ($attachments [$i] ['is_attachment']) {
                            $attachments [$i] ['attachment'] = imap_fetchbody ( $imbox, $email, $i + 1 );
                            if ($structure->parts [$i]->encoding == 3) { // 3 = BASE64
                                $attachments [$i] ['attachment'] = base64_decode ( $attachments [$i] ['attachment'] );
                            } elseif ($structure->parts [$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                                $attachments [$i] ['attachment'] = quoted_printable_decode ( $attachments [$i] ['attachment'] );
                            }
                        }
                	}
                	foreach($attachments as $attachment){ 
                		$id_mensaje = '1021'; 	 	        	
			            if($attachment['is_attachment'] == 1){  	              	            	
			                $filename = $attachment['name'];
			                $file_ext = explode('.', $filename);			                
			                if ($file_ext[1] == 'xml') {
			                	$res = save_xml_mail($attachment['attachment']);
			                	print_r($res);
			                }
			                if ($file_ext[1] == 'zip') {
			                	$res = save_zip_mail($attachment['attachment']);
			                }
			                $cont_adjuntos++;
			            }	            	            
			        }	
                }
			}
		}
		/* cerrar conexion */
		imap_close($imbox, CL_EXPUNGE);		
	}

	function save_xml_mail($xmlmaster){
		$class = new constante();
		$getsri = new getsri();
    	$xmlData_sub = new SimpleXMLElement($xmlmaster);
    	$xmlDatamaster = $class->uncdata($xmlData_sub->comprobante);
    	$file_xml = new SimpleXMLElement($xmlDatamaster);
    	$clave_acceso = $file_xml->infoTributaria->claveAcceso;
    	$respuesta = $getsri->estado_factura_electronica($clave_acceso);		
		if (count((array)$respuesta->autorizaciones) != 0) {
			$estado = $respuesta->autorizaciones->autorizacion->estado;
			if($estado == 'AUTORIZADO') {
				$id_fac = $class->idz();					
				$xmlComp = new SimpleXMLElement($respuesta->autorizaciones->autorizacion->comprobante);
				$email = getmail($xmlComp);
				$fecha_aut = $xmlComp->infoFactura->fechaEmision;										
				$fecha = $class->fecha_hora();
				$razon_social = $xmlComp->infoTributaria->razonSocial;
				$cod_doc = $xmlComp->infoTributaria->codDoc;
				$ruc = getruc();

				if($ruc != $xmlComp->infoFactura->identificacionComprador || substr($ruc, 0,10)  != $xmlComp->infoFactura->identificacionComprador) {
				// if($ruc == $xmlComp->infoFactura->identificacionComprador || substr($ruc, 0,10)  == $xmlComp->infoFactura->identificacionComprador) {
					$id_prov = $class->idz();
					$fecha_adj = $class->fecha_hora();
					$id_fact = $class->idz();
					$res = $class->consulta("SELECT id FROM facturanext.proveedores WHERE ruc_proveedor = '".$xmlComp->infoTributaria->ruc."'");
					if($class->num_rows($res) == 0 ){			
						$class->consulta("INSERT INTO facturanext.proveedores VALUES ('".$id_prov."','".$xmlComp->infoTributaria->ruc."','".$xmlComp->infoTributaria->nombreComercial."','".$xmlComp->infoTributaria->dirMatriz."','".$fecha_adj."','0')");
					} else {
						while ($row_1=$class->fetch_array($res)) {
							$id_prov = $row_1[0];
						}
					}
					$res = $class->consulta("SELECT id FROM facturanext.correo WHERE clave_acceso = '$clave_acceso'");
					if($class->num_rows($res) == 0 ){
						$num_fac = $xmlComp->infoTributaria->estab. '-'.$xmlComp->infoTributaria->ptoEmi. '-'.$xmlComp->infoTributaria->secuencial;
						$var_fe = $xmlComp->infoFactura->fechaEmision;
						$date_fe = str_replace('/', '-', $var_fe);
						$date_fe = date('Y-m-d', strtotime($date_fe));
						$id_factura = $class->idz();

						$class->consulta("INSERT INTO facturanext.correo values (	'".$id_factura."',
																					'".$razon_social."',
																					lower('".$email."'),
																					'".''."','".$fecha."',
																					'".'Docuemnto Generado por el SRI'."',
																					'".''."','1',
																					'".$_SESSION['id_miempresa']."',
																					'".$cod_doc."',
																					'".$razon_social."',
																					'".$clave_acceso."',
																					'".''."',
																					'".$fecha_aut."')");

						$class->consulta("INSERT INTO facturanext.facturas VALUES (	'".$class->idz()."',
																					'".$num_fac."',
																					'".$id_prov."',
																					'".$date_fe."',
																					'".$xmlComp->infoFactura->totalSinImpuestos."',
																					'".$xmlComp->infoFactura->totalDescuento."',
																					'".$xmlComp->infoFactura->propina."',
																					'".$xmlComp->infoFactura->importeTotal ."',
																					'".$fecha_adj."',
																					'1',
																					'".$id_factura."',
																					'".$xmlComp->infoTributaria->codDoc."')");

							
						
						$class->consulta("INSERT INTO facturanext.adjuntos values (	'".$class->idz()."',
																					'".$id_factura."',
																					'".$id_factura.".xml',
																					'".$id_factura.".xml',
																					'".$id_factura.".xml',
																					'0',
																					'xml',
																					'0',
																					'".$fecha."')");
						 $url_destination = "../archivos/".$_SESSION['id_miempresa']."/".$id_factura.'.xml';	                
					     $fp = fopen($url_destination, "wr+");   
					     $xml = $class->generateValidXmlFromObj($respuesta->autorizaciones);                             
					     fwrite($fp, $xml);
					     fclose($fp);
					    return array('valid' => 'true', 'methods' => 'full'); // ---------- valido y listo para procesar
					}else
						return array('valid' => 'false', 'error' => '5','methods' => 'cla-acc-existente'); // ---------- valido y listo para procesar		
				}else 
					return array('valid' => 'false', 'error' => '1', 'methods' => 'ruc-no-perteneciente'); // ---------- ruc no perteneciente a esta cuenta
			}else
				return array('valid' => 'false', 'error' => '2', 'methods' => 'no-autorizado'); // ------ clave de acceso no autorizado
		}else
			return array('valid' => 'false', 'error' => '4', 'methods' => 'registro-no-existente-sri'); // ------ no disponible 
	}
	function save_zip_mail($xmlmaster){
		$class = new constante();
		$getsri = new getsri();		
		$id=$class->idz();
		$url_destination = "../archivos/".$_SESSION['id_miempresa']."/".$id.'.zip';	                
		$fp = fopen($url_destination, "wr+");
		fwrite($fp, $xmlmaster);

		$zip = zip_open($url_destination);
		if ($zip) {
			while ($zip_entry = zip_read($zip)) {
				$fp = fopen("../archivos/".$_SESSION['id_miempresa']."/".zip_entry_name($zip_entry), "w");
				if (zip_entry_open($zip, $zip_entry, "r")) {
				$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
				$xmlData_sub = new SimpleXMLElement($buf);
				$xmlDatamaster = $xmlData_sub->comprobante;
				$file_xml = new SimpleXMLElement($xmlDatamaster);
    			$clave_acceso = $file_xml->infoTributaria->claveAcceso;
    			$respuesta = $getsri->estado_factura_electronica($clave_acceso);
    			if (count((array)$respuesta->autorizaciones) != 0) {
					$estado = $respuesta->autorizaciones->autorizacion->estado;
					if($estado == 'AUTORIZADO') {
						$id_fac = $class->idz();					
						$xmlComp = new SimpleXMLElement($respuesta->autorizaciones->autorizacion->comprobante);
						$email = getmail($xmlComp);
						$fecha_aut = $xmlComp->infoFactura->fechaEmision;										
						$fecha = $class->fecha_hora();
						$razon_social = $xmlComp->infoTributaria->razonSocial;
						$cod_doc = $xmlComp->infoTributaria->codDoc;
						$ruc = getruc();

						if($ruc != $xmlComp->infoFactura->identificacionComprador || substr($ruc, 0,10)  != $xmlComp->infoFactura->identificacionComprador) {
						// if($ruc == $xmlComp->infoFactura->identificacionComprador || substr($ruc, 0,10)  == $xmlComp->infoFactura->identificacionComprador) {
							$id_prov = $class->idz();
							$fecha_adj = $class->fecha_hora();
							$id_fact = $class->idz();
							$res = $class->consulta("SELECT id FROM facturanext.proveedores WHERE ruc_proveedor = '".$xmlComp->infoTributaria->ruc."'");
							if($class->num_rows($res) == 0 ){			
								$class->consulta("INSERT INTO facturanext.proveedores VALUES ('".$id_prov."','".$xmlComp->infoTributaria->ruc."','".$xmlComp->infoTributaria->nombreComercial."','".$xmlComp->infoTributaria->dirMatriz."','".$fecha_adj."','0')");
							} else {
								while ($row_1=$class->fetch_array($res)) {
									$id_prov = $row_1[0];
								}
							}
							$res = $class->consulta("SELECT id FROM facturanext.correo WHERE clave_acceso = '$clave_acceso'");
							if($class->num_rows($res) == 0 ){
								$num_fac = $xmlComp->infoTributaria->estab. '-'.$xmlComp->infoTributaria->ptoEmi. '-'.$xmlComp->infoTributaria->secuencial;
								$var_fe = $xmlComp->infoFactura->fechaEmision;
								$date_fe = str_replace('/', '-', $var_fe);
								$date_fe = date('Y-m-d', strtotime($date_fe));
								$id_factura = $class->idz();

								$class->consulta("INSERT INTO facturanext.correo values (	'".$id_factura."',
																							'".$razon_social."',
																							lower('".$email."'),
																							'".''."','".$fecha."',
																							'".'Docuemnto Generado por el SRI'."',
																							'".''."','1',
																							'".$_SESSION['id_miempresa']."',
																							'".$cod_doc."',
																							'".$razon_social."',
																							'".$clave_acceso."',
																							'".''."',
																							'".$fecha_aut."')");

								$class->consulta("INSERT INTO facturanext.facturas VALUES (	'".$class->idz()."',
																							'".$num_fac."',
																							'".$id_prov."',
																							'".$date_fe."',
																							'".$xmlComp->infoFactura->totalSinImpuestos."',
																							'".$xmlComp->infoFactura->totalDescuento."',
																							'".$xmlComp->infoFactura->propina."',
																							'".$xmlComp->infoFactura->importeTotal ."',
																							'".$fecha_adj."',
																							'1',
																							'".$id_factura."',
																							'".$xmlComp->infoTributaria->codDoc."')");

									
								
								$class->consulta("INSERT INTO facturanext.adjuntos values (	'".$class->idz()."',
																							'".$id_factura."',
																							'".$id_factura.".xml',
																							'".$id_factura.".xml',
																							'".$id_factura.".xml',
																							'0',
																							'xml',
																							'0',
																							'".$fecha."')");
								 $url_destination = "../archivos/".$_SESSION['id_miempresa']."/".$id_factura.'.xml';	                
							     $fp = fopen($url_destination, "wr+");   
							     $xml = $class->generateValidXmlFromObj($respuesta->autorizaciones);                             
							     fwrite($fp, $xml);
							     fclose($fp);
							    return array('valid' => 'true', 'methods' => 'full'); // ---------- valido y listo para procesar
							}else
								return array('valid' => 'false', 'error' => '5','methods' => 'cla-acc-existente'); // ---------- valido y listo para procesar		
						}else 
							return array('valid' => 'false', 'error' => '1', 'methods' => 'ruc-no-perteneciente'); // ---------- ruc no perteneciente a esta cuenta
					}else
						return array('valid' => 'false', 'error' => '2', 'methods' => 'no-autorizado'); // ------ clave de acceso no autorizado
				}else
					return array('valid' => 'false', 'error' => '4', 'methods' => 'registro-no-existente-sri'); // ------ no disponible 
				
				// fwrite($fp,"$buf");
				// zip_entry_close($zip_entry);
				fclose($fp);
				
				// print_r($xmlData_sub);
				}
			}
		}
		zip_close($zip);
	}

	function getmail($xml){
		$email = '';
		for ($i=0; $i < sizeof($xml->infoAdicional->campoAdicional); $i++) { 	
			if(strtolower($xml->infoAdicional->campoAdicional[$i]->attributes()) == 'email' ) {
				$email = $xml->infoAdicional->campoAdicional[$i];
			}
		}
		return $email;
	}
	function getruc(){
		$class = new constante();
		$respuesta = $class->consulta("SELECT ruc FROM empresa.miempresa WHERE id ='$_SESSION[id_miempresa]'");
		while ($row= $class->fetch_array($respuesta)) {
			$ruc = $row[0];
		}
		return $ruc;
	}
?>