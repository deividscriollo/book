<?php 

	$emailAddress = '1002910345001@facturanext.ec'; // Full email address
	$emailPassword = 'willi123';        // Email password
	$domainURL = 'facturanext.ec';         // Your websites domain
	$useHTTPS = false;      
	///coneccion	
	$inbox = imap_open('{'.$domainURL.':143/notls}INBOX',$emailAddress,$emailPassword) or die('Cannot connect to domain:' . imap_last_error());			 	

	
	$emails = imap_search($inbox,'UNSEEN SINCE 04-11-15');
	 
	/* useful only if the above search is set to 'ALL' */
	$max_emails = 100;
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
			    print_r($header);
			    $sub=imap_mime_header_decode( $header->from[0]->personal);
			    for($j = 0; $j < count($sub); $j++) { 
					$nombre .= $sub[$j]->text; 
				}
			    echo utf8_encode($nombre) . '</br>';		    ///nombre		    

			    //$header->from[0]->mailbox ."@". $header->from[0]->host. '<p></br>';
			    echo $header->from[0]->mailbox ."@". $header->from[0]->host .'</br>';///////////from		   
			    
			    echo $header->to[0]->mailbox ."@". $header->to[0]->host. '</br>';
			    echo $header->date . '</br>';
			    
			    $sub=imap_mime_header_decode($header->subject);
				for($j = 0; $j < count($sub); $j++) { 
					$tema .= $sub[$j]->text; 
				}			
				echo $tema .'</br>' ;//////tema

			}
			
	        /* get mail message */
	        $message = imap_fetchbody($inbox,$email_number,2); 		
	        /* get mail structure */
	        $structure = imap_fetchstructure($inbox, $email_number); 		        
	        $attachments = array(); 	
	        /* if any attachments found... */
	        if(isset($structure->parts) && count($structure->parts)) 
	        {
	            for($i = 0; $i < count($structure->parts); $i++) 
	            {
	                $attachments[$i] = array(
	                    'is_attachment' => false,
	                    'filename' => '',
	                    'name' => '',
	                    'attachment' => ''
	                );
	 
	                if($structure->parts[$i]->ifdparameters) 
	                {
	                    foreach($structure->parts[$i]->dparameters as $object) 
	                    {
	                        if(strtolower($object->attribute) == 'filename') 
	                        {
	                            $attachments[$i]['is_attachment'] = true;
	                            $attachments[$i]['filename'] = $object->value;
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
	        foreach($attachments as $attachment)
	        {            
	            if($attachment['is_attachment'] == 1)
	            {                
	                $filename = $attachment['name'];                
	                if(empty($filename)) $filename = $attachment['filename'];
	 
	                if(empty($filename)) $filename = time() . ".dat";
	 
	                /* prefix the email number to the filename in case two emails
	                 * have the attachment with the same file name.
	                 */
	                $ext = end(explode('.', $filename));                                ///extension                
	                $url_destination = "./documentos/" . $email_number . "-" . $filename;
	                $fp = fopen($url_destination, "wr+");                                
	                fwrite($fp, $attachment['attachment']);
	                fclose($fp);                    
	                /*if($ext == 'zip'){
	                    $zip = new ZipArchive;
	                    $zip->open($email_number . "-" . $filename);
	                    $extraido = $zip->extractTo("./documentos");
	                }*/
	            }
	 
	        }	        
	 		echo '</br>';
	        if($count++ >= $max_emails) break;        	        
	    }
	 
	} 	
	/* close the connection */
	imap_close($inbox);
	 
	echo "Done";	

?>