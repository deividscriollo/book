<?php 
require_once('PHPMailer/class.phpmailer.php');
/**
* correo por david criollo
*/
class constantecorreo
{
	
	function registro_correo($correo,$html,$proceso)
	{
		$mail = new PHPMailer(); // defaults to using php "mail()"
		$body = $html;
		//defino el email y nombre del remitente del mensaje
		$mail->SetFrom('webmaster@nextbook.ec', 'NextBook');
		$mail->AddReplyTo("webmaster@nextbook.ec","NextBook");
		$address = $correo;// adress destinatario
		$mail->AddAddress($address, "Esteban David");// adrees + name destinatario
		//Añado un asunto al mensaje
		$mail->Subject = $proceso;
		//Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
		$mail->AltBody = "una iniciativa de business group";
		//inserto el texto del mensaje en formato HTML
		$mail->MsgHTML($body);
		if(!$mail->Send()) {
			return false;
		} else {
		 	return true;
		}
	}
}


?>