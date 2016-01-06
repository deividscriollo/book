<?php 
	include_once('../admin/class.php');
	include_once('../admin/classcorreos.php');	
	$class=new constante();		

	//$id = "201511091317015640e31dec2ad";
	$id = $_POST['id'];
	$ruc = '';
	$data = '0';
	$stado = 0;
	error_reporting(0);	
	
	$resultado = $class->consulta("select seg.accesos.login, seg.accesos.pass_origin, seg.empresa.ruc from seg.accesos,seg.empresa where seg.empresa.id = seg.accesos.id_empresa and seg.empresa.id = '".$id."'");
	while ($row=$class->fetch_array($resultado)) {
		$emailAddress = $row[0]; // Full email address
		$emailPassword = $row[1];        // Email password
		$ruc = $row[2];
	}
	/*$ruc = '';
	$comp = $class->consulta("select ruc from seg.empresa where id ='".$id."'");
		while ($row_1= $class->fetch_array($comp)) {					
			$ruc = $row_1[0];
		}	
		*/
	$domainURL = 'facturanext.ec';         // Your websites domain
		
	$useHTTPS = false;      
	///conexion	
	$inbox = imap_open('{'.$domainURL.':143/notls}INBOX',$emailAddress,$emailPassword) or die('Cannot connect to domain:' . imap_last_error());			 	
	date_default_timezone_set('America/Guayaquil');	
	//echo $hoy = date("d-m-y");     
	
	$emails = imap_search($inbox,'UNSEEN');
	//$emails = imap_search($inbox,'ALL');	 
	/* useful only if the above search is set to 'ALL' */
	$max_emails = 10;// correos maximos para no saturar	
	if($emails) {			 
	    $count = 1;	 	
	    $add = 0;
		$y = 0;	
		$xml = 0;			
		$cont_adjuntos = 0;
		$adjuntos = array();
		$arr = array();
		$proveedores = array();
		$facturas = array();
	    /* put the newest emails on top */
	    rsort($emails);	 	
	    /* for every email... */
	    foreach($emails as $email_number) {
	    	$tema = '';
	    	$nombre = '';
	    	$from = '';
	    	$to = '';	    	 	    	
	    	$xml_name = '';
	        /* get information specific to this email */
	        $overview = imap_fetch_overview($inbox,$email_number,0);                	          	        	        
	        $size=sizeof($overview);
			for($i=$size-1;$i>=0;$i--){
			    $val=$overview[$i];
			    $msg=$val->msgno;
			    $header = imap_headerinfo ( $inbox, $msg);				    
			    $id_mensaje = htmlentities($header->message_id);
			    $sub=imap_mime_header_decode( $header->from[0]->personal);
			    for($j = 0; $j < count($sub); $j++) { 
					$nombre .= $sub[$j]->text; 
				}				
			    $nombre_remitente = utf8_encode($nombre);		    ///nombre		    

			    //$header->from[0]->mailbox ."@". $header->from[0]->host. '<p></br>';
			    $remitente = $header->from[0]->mailbox ."@". $header->from[0]->host;///////////from		   
			    if($nombre_remitente == ''){
						$nombre_remitente = $remitente;
				}
			    $email_usuario= $header->to[0]->mailbox ."@". $header->to[0]->host;
			    $fecha_correo = $header->date;			    			    
			    $sub=imap_mime_header_decode($header->subject);
				for($j = 0; $j < count($sub); $j++) { 
					$tema .= $sub[$j]->text; 
				}							

			}
			
	        /* get mail message */
	        $message = imap_fetchbody($inbox,$email_number,2); 			        
	        /* get mail structure */
	        $structure = imap_fetchstructure($inbox, $email_number); 		        
	        $attachments = array(); 		        
	        /* if any attachments found... */
	        if(isset($structure->parts) && count($structure->parts)){	 	
 				$add = 0;
	            for($i = 0; $i < count($structure->parts); $i++) {
	                $attachments[$i] = array(
	                    'is_attachment' => false,
	                    'filename' => '',
	                    'name' => '',
	                    'attachment' => '',
	                    'size' => '',	  	                                      
	                );	  	               
	                if(isset($structure->parts[$i]->bytes)){
	                    $attachments[$i]['size'] = $structure->parts[$i]->bytes;	                    
	                    
	                }
	                if($structure->parts[$i]->ifdparameters) 
	                {	                		                	
	                    foreach($structure->parts[$i]->dparameters as $object) 
	                    {	                    		                    	
	                        if(strtolower($object->attribute) == 'filename') 
	                        {
	                            $attachments[$i]['is_attachment'] = true;	                            	                            
	                            $add = 1;
	                        }
	                    }
	                }
	 				
	                if($structure->parts[$i]->ifparameters) 
	                {
	                    foreach($structure->parts[$i]->parameters as $object) 
	                    {	                    	
	                        if(strtolower($object->attribute) == 'name') 
	                        {
	                            $attachments[$i]['is_attachment'] = true;
	                            $attachments[$i]['name'] = $object->value;	                            
	                            $add = 1;
	                        }
	                    }
	                }

	                if($attachments[$i]['is_attachment']) 
	                {	                		                	

	                    $attachments[$i]['attachment'] = imap_fetchbody($inbox, $email_number, $i+1);
	 
	                    /* 4 = QUOTED-PRINTABLE encoding */
	                    if($structure->parts[$i]->encoding == 3) 
	                    { 
	                        $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
	                    }
	                    /* 3 = BASE64 encoding */
	                    elseif($structure->parts[$i]->encoding == 4) 
	                    { 
	                        $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
	                    }
	                }	                	                	                
	            }
	        }
	 
	        /* iterate through each attachment and save it */	               	
	        foreach($attachments as $attachment){ 	 	        	
	            if($attachment['is_attachment'] == 1){  	              	            	
	                $filename = $attachment['name']; 	                
	                if(empty($filename)) $filename = $attachment['filename'];
	 
	                if(empty($filename)) $filename = time() . ".dat";	 	                

	                $ext = explode('.', $filename);
	                $ext = array_pop($ext);	                	                	                
	                $name_update = $class->idz(); 		                                
	                $url_destination = "../archivos/".$id."/".$name_update.'.'.$ext;	                
	                $fp = fopen($url_destination, "wr+");                                
	                fwrite($fp, $attachment['attachment']);
	                fclose($fp);        	                
	                if($ext == 'xml'){
	                	$xml_name = $name_update;	                		                	

	            	}
	                $adjuntos[$cont_adjuntos]['filename'] = $filename;	                
	                $adjuntos[$cont_adjuntos]['name'] = $attachment['filename'];
	                $adjuntos[$cont_adjuntos]['name_update'] = $name_update;
	                $adjuntos[$cont_adjuntos]['size'] = $size;
	                $adjuntos[$cont_adjuntos]['ext'] = $ext;
	                $adjuntos[$cont_adjuntos]['id_correo'] = $id_mensaje;	                	                	                       	                

	                if($ext == 'zip'){
	                    $zip = new ZipArchive;
	                    $zip->open("../archivos/".$id."/".$name_update.'.'.$ext);
	                    $extraido = $zip->extractTo($url_destination = "../archivos/".$id);
	                    $filname =  $zip->filename;
	                    //$ext_zip = end(explode('.', $filname));///extension               

	                    $ext_zip = explode('.', $filename);
	                	$ext_zip = array_pop($ext_zip);	             

	                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
						$nombre_base = basename($filename, '.'.$extension);  
						
	                    $adjuntos[$cont_adjuntos]['filename'] = $filename;
		                $adjuntos[$cont_adjuntos]['name'] = $attachment['filename'];
		                $adjuntos[$cont_adjuntos]['name_update'] = $nombre_base;
		                $adjuntos[$cont_adjuntos]['size'] = $size;
		                $adjuntos[$cont_adjuntos]['ext'] = 'xml';
		                $adjuntos[$cont_adjuntos]['id_correo'] = $id_mensaje;		                
		                $xml_name = $nombre_base;		                
	                }	                	                
	                $cont_adjuntos++;
	            }	            	            
	        }	   	        
	        if($count++ >= $max_emails) break;     	        
        	$stado	= 0;	        	
        	$respuesta	= 0;	        	
        	$arr[$y]['id_mensaje'] = $id_mensaje;
        	$arr[$y]['nombre_remitente'] = $nombre_remitente;
        	$arr[$y]['remitente'] = $remitente;
        	$arr[$y]['email_usuario'] = $email_usuario;
        	$arr[$y]['fecha_correo'] = $fecha_correo;        	
        	$arr[$y]['tema'] = $tema;        	  
        	if($add == 1){// hay adjuntos           	        		
	        	/////--abro xml --///	   	        	
        		$arr[$y]['respuesta'] = '1';///el correo tiene adjuntos        		
				$pFile = "../archivos/".$id."/".$xml_name.'.xml';				
				$slPath = $pFile;
				$xmlData = '';
				try{
					$rlFile = fopen($slPath, 'r');

					$ilLong = filesize($slPath);
					$slData = fread($rlFile, $ilLong);																					
				
					$xmlAut = new SimpleXMLElement($slData);															
					if($xmlAut == ''){						
						$xmlString = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $slData);
						$xmlAut = new SimpleXMLElement($xmlString);												
						$xmlData = $xmlAut->soapBody->ns2autorizacionComprobanteResponse->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->comprobante;						
					}else{					
						$xmlData = $class->uncdata($xmlAut->comprobante);	
					}	
				}catch(Exception $e){										
					$arr[$y]['xml'] = '0';											
				}	

				//si el data del xml no corresponde												
				if ($xmlData == ''){	
					$arr[$y]['xml'] = '0';	///xml no corresponde o no existe											
				}else{					
					$xmlData_sub = '';     					
					$arr[$y]['xml'] = '1';	//si hay estrctura xml																			
					try{												   	
						$xmlData_sub = new SimpleXMLElement($xmlData);															
						$arr[$y]['codDoc'] = $xmlData_sub->infoTributaria->codDoc;
						$arr[$y]['razonSocial'] = $xmlData_sub->infoTributaria->razonSocial;
						$arr[$y]['claveAcceso'] = $xmlData_sub->infoTributaria->claveAcceso;
						$arr[$y]['tipo'] = $xmlData_sub->infoFactura->identificacionComprador;
						$arr[$y]['fecha_aut'] = $xmlData_sub->infoFactura->fechaEmision;

						$proveedores[$y]['razon_social'] = $xmlData_sub->infoTributaria->razonSocial;
						$proveedores[$y]['nombre_comercial'] = $xmlData_sub->infoTributaria->nombreComercial;
						$proveedores[$y]['ruc_prov'] = $xmlData_sub->infoTributaria->ruc;
						$proveedores[$y]['dir_matriz'] = $xmlData_sub->infoTributaria->dirMatriz;					

						$facturas[$y]['num_factura'] = $xmlData_sub->infoTributaria->estab. '-'.$xmlData_sub->infoTributaria->ptoEmi. '-'.$xmlData_sub->infoTributaria->secuencial;					
						$var_fe = $xmlData_sub->infoFactura->fechaEmision;
						$date_fe = str_replace('/', '-', $var_fe);
						$facturas[$y]['fecha_emision'] = date('Y-m-d', strtotime($date_fe));

						$facturas[$y]['subtotal'] = $xmlData_sub->infoFactura->totalSinImpuestos;												
						$facturas[$y]['impuestos'] = $xmlData_sub->infoFactura->totalDescuento;										
						$facturas[$y]['propina'] = $xmlData_sub->infoFactura->propina;										
						$facturas[$y]['total_fac'] = $xmlData_sub->infoFactura->importeTotal;															

						if($ruc == $xmlData_sub->infoFactura->identificacionComprador || substr($ruc, 0,10)  == $xmlData_sub->infoFactura->identificacionComprador){						
							$stado = '1';//// corresponde al usuario de la cuenta						
						}else{						
							$stado = '0';///no correspoden al usuario de la cuenta
						}	
					}catch(Exception $e){
						$arr[$y]['xml'] = '0';											
					}
					//si el data del xml no corresponde					
					if (!is_object($xmlData_sub)){				
						$arr[$y]['xml'] = '0';	///xml no corresponde o no existe					
					}else{
						$arr[$y]['xml'] = '1';	//si hay estrctura xml					
					}
				}								

				$arr[$y]['stado'] = $stado;
				////////////////////
				$add = 0;
	        	$y++;      	
   			}else{
   				$arr[$y]['respuesta'] = '0';//no tiene adjuntos   				
				$add = 0;
				$y++;

   			}
	    }	    		
		//imap_clearflag_full($inbox, $email_number, "\\Seen");
	 	//  imap_setflag_full($inbox, $email_number, "\\Seen");   

	} 	
	/* close the connection */
	imap_close($inbox, CL_EXPUNGE);
	//print_r($arr) ;
	//print_r($adjuntos) ;
	$fecha_adj = $class->fecha_hora();
	///////////*--proceso de guardado--*//////////////
	for($i = 0; $i < count($arr);$i++){				
		if($arr[$i]['respuesta'] == '0' ){
			$msg = "El correo enviado debe contener documentos adjuntos de facturas electrónicas válidas.";		
			//respuesta($remitente,$nombre_remitente,$msg);						
			$data = ' 1';
			////no corresponde a este tipo de email
		}else{
			if($arr[$i]['xml'] == '1' ){
				$id_fac = $class->idz();		
				$id_prov = $class->idz();		
				$id_fact = $class->idz();		
				$resultado = $class->consulta("insert into facturanext.correo values ('".$id_fac."','".$arr[$i]['nombre_remitente']."','".$arr[$i]['remitente']."','".$arr[$i]['email_usuario']."','".$arr[$i]['fecha_correo']."','".$arr[$i]['tema']."','".$arr[$i]['id_mensaje']."','".$arr[$i]['stado']."','".$id."','".$arr[$i]['codDoc']."','".$arr[$i]['razonSocial']."','".$arr[$i]['claveAcceso']."','0','".$arr[$i]['fecha_aut']."')");	
				////proveedor///////
				$res = 0;
				$res = $class->consulta("select id from facturanext.proveedores where ruc_proveedor = '".$proveedores[$i]['ruc_prov']."'");				
				if($class->num_rows($res) == 0 ){			
					$class->consulta("insert into facturanext.proveedores values ('".$id_prov."','".$proveedores[$i]['ruc_prov']."','".$proveedores[$i]['nombre_comercial']."','".$proveedores[$i]['dir_matriz']."','".$fecha_adj."','0')");																																																								
				}else{
					while ($row_1=$class->fetch_array($res)) {
						$id_prov = $row_1[0];						
					}					 
				}
				$class->consulta("insert into facturanext.facturas values ('".$id_fact."','".$facturas[$i]['num_factura']."','".$id_prov."','".$facturas[$i]['fecha_emision']."','".$facturas[$i]['subtotal']."','".$facturas[$i]['impuestos']."','".$facturas[$i]['propina']."','".$facturas[$i]['total_fac'] ."','".$fecha_adj."','".$arr[$i]['stado']."','".$id_fac."','".$arr[$i]['codDoc']."')");
				///sub vector//
				for($j = 0; $j < count($adjuntos);$j++){
					if($arr[$i]['id_mensaje'] == $adjuntos[$j]['id_correo']){				
						$id_adj = $class->idz();		
						$class->consulta("insert into facturanext.adjuntos values ('".$id_adj."','".$id_fac."','".$adjuntos[$j]['filename']."','".$adjuntos[$j]['name']."','".$adjuntos[$j]['name_update']."','".$adjuntos[$j]['size']."','".$adjuntos[$j]['ext']."','0','".$fecha_adj."')");
					}
				}
				if($arr[$i]['stado'] == '0')	{
					$msg = "La factura enviada no corresponde al propietario de la cuenta.";		
					//respuesta($remitente,$nombre_remitente,$msg);
					$data = ' 1';
					////el xml no pertenece al usuario
				}
			}else{			
				$msg = "Los documentos adjuntos enviados no son válidos de una Factura electrónica.";		
				//respuesta($remitente,$nombre_remitente,$msg);
				$data = ' 1';
			}				
		}		
	}	
	echo $data;
	//////////////////////////////////////////////////
?>