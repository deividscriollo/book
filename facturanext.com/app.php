<?php 
	include_once('../admin/class.php');	
	$class=new constante();	

	session_start();	

	$id = "201511091317015640e31dec2ad";

	$resultado = $class->consulta("select seg.accesos.login, seg.accesos.pass_origin from seg.accesos,seg.empresa where seg.empresa.id = seg.accesos.id_empresa and seg.empresa.id = '".$id."'");
	while ($row=$class->fetch_array($resultado)) {
		$emailAddress = $row[0]; // Full email address
		$emailPassword = $row[1];        // Email password
	}
	
	$domainURL = 'facturanext.ec';         // Your websites domain
		
	$useHTTPS = false;      
	///coneccion	
	$inbox = imap_open('{'.$domainURL.':143/notls}INBOX',$emailAddress,$emailPassword) or die('Cannot connect to domain:' . imap_last_error());			 	
	date_default_timezone_set('America/Guayaquil');
	$arr = array();
	//echo $hoy = date("d-m-y");     
	$emails = imap_search($inbox,'UNSEEN');
	//$emails = imap_search($inbox,'ALL');	 
	/* useful only if the above search is set to 'ALL' */
	$max_emails = 10;// correos maximos para no saturar
	$add = 0;
	$y = 0;	
	$cont_adjuntos = 0;
	$adjuntos = array();
	$xml_name = '';
	if($emails) {			 
	    $count = 1;	 	
	    /* put the newest emails on top */
	    rsort($emails);	 	
	    /* for every email... */
	    foreach($emails as $email_number) {
	    	$tema = '';
	    	$nombre = '';
	    	$from = '';
	    	$to = '';	    	 
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
	            if($attachment['is_attachment'] == 1)
	            {               	           	            	
	                $filename = $attachment['name']; 	                
	                if(empty($filename)) $filename = $attachment['filename'];
	 
	                if(empty($filename)) $filename = time() . ".dat";
	 
	                /* prefix the email number to the filename in case two emails
	                 * have the attachment with the same file name.
	                 */
	                $ext = end(explode('.', $filename));                                ///extension                

	                $name_update = $class->idz(); 
	                $url_destination = "../archivos/".$id."/".$name_update.'.'.$ext;
	                $fp = fopen($url_destination, "wr+");                                
	                fwrite($fp, $attachment['attachment']);
	                fclose($fp);        

	                $adjuntos[$cont_adjuntos]['filename'] = $filename;
	                $adjuntos[$cont_adjuntos]['name'] = $attachment['filename'];
	                $adjuntos[$cont_adjuntos]['name_update'] = $name_update;
	                $adjuntos[$cont_adjuntos]['size'] = $size;
	                $adjuntos[$cont_adjuntos]['ext'] = $ext;
	                $adjuntos[$cont_adjuntos]['id_correo'] = $id_mensaje;
	                $cont_adjuntos++;
	                if($ext == 'xml'){
	                	$xml_name = $name_update;
	            	}

	                if($ext == 'zip'){
	                    $zip = new ZipArchive;
	                    $zip->open("../archivos/".$id."/".$name_update.'.'.$ext);
	                    $extraido = $zip->extractTo($url_destination = "../archivos/".$id);
	                    $filname =  $zip->filename;
	                    $ext_zip = end(explode('.', $filname));///extension               

	                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
						$nombre_base = basename($filename, '.'.$extension);  

	                    $adjuntos[$cont_adjuntos]['filename'] = $filename;
		                $adjuntos[$cont_adjuntos]['name'] = $attachment['filename'];
		                $adjuntos[$cont_adjuntos]['name_update'] = $nombre_base;
		                $adjuntos[$cont_adjuntos]['size'] = $size;
		                $adjuntos[$cont_adjuntos]['ext'] = 'xml';
		                $adjuntos[$cont_adjuntos]['id_correo'] = $id_mensaje;
		                $xml_name = $nombre_base;
		                $cont_adjuntos++;
	                }
	            }

	 
	        }	        	 		
	        if($count++ >= $max_emails) break;        	
	        if($add == 1){            	
            	$arr[$y]['id_mensaje'] = $id_mensaje;
	        	$arr[$y]['nombre_remitente'] = $nombre_remitente;
	        	$arr[$y]['remitente'] = $remitente;
	        	$arr[$y]['email_usuario'] = $email_usuario;
	        	$arr[$y]['fecha_correo'] = $fecha_correo;
	        	$arr[$y]['tema'] = $tema;	        		        	
	        	
	        	/////--abro xml --///
				$pFile = "../archivos/".$id."/".$xml_name.'.xml';
				$slPath = $pFile;
				$rlFile = fopen($slPath, 'r');

				$ilLong = filesize($slPath);
				$slData = fread($rlFile, $ilLong);				
				
				$xmlAut = new SimpleXMLElement($slData);										
				
				$xmlData = $class->uncdata($xmlAut->comprobante);	
				

				$xmlData =  new SimpleXMLElement($xmlData);									

				
				//echo json_encode($xmlData);												

				//$xmlData = simplexml_load_string($xmlAut->comprobante,'SimpleXMLElement', LIBXML_NOCDATA);
				$arr[$y]['codDoc'] = $xmlData->infoTributaria->codDoc;
				$arr[$y]['razonSocial'] = $xmlData->infoTributaria->razonSocial;
				$arr[$y]['claveAcceso'] = $xmlData->infoTributaria->claveAcceso;
				////////////////////
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
		$id_fac = $class->idz();		
		$resultado = $class->consulta("insert into facturanext.correo values ('".$id_fac."','".$arr[$i]['nombre_remitente']."','".$arr[$i]['remitente']."','".$arr[$i]['email_usuario']."','".$arr[$i]['fecha_correo']."','".$arr[$i]['tema']."','".$arr[$i]['id_mensaje']."','0','".$id."','".$arr[$i]['codDoc']."','".$arr[$i]['razonSocial']."','".$arr[$i]['claveAcceso']."','0')");	
		///sub vector//
		for($j = 0; $j < count($adjuntos);$j++){
			if($arr[$i]['id_mensaje'] == $adjuntos[$j]['id_correo']){
				$id_adj = $class->idz();		
				$class->consulta("insert into facturanext.adjuntos values ('".$id_adj."','".$id_fac."','".$adjuntos[$j]['filename']."','".$adjuntos[$j]['name']."','".$adjuntos[$j]['name_update']."','".$adjuntos[$j]['size']."','".$adjuntos[$j]['ext']."','0','".$fecha_adj."')");

			}
		}
	}	
	echo '1';
	//////////////////////////////////////////////////


?>