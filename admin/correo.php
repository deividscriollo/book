<?php
require 'PHPMailer/PHPMailerAutoload.php';
include("xmlapi.php");        //XMLAPI cpanel client class

/**
* Clase email que se extiende de PHPMailer
*/
class email  extends PHPMailer{
    //datos de remitente
    var $tu_email = 'deividscriollo@gmail.com';
    var $tu_nombre = 'FABRICA IMBABURA';
    var $tu_password ='CROnos_1021';
    /**
 * Constructor de clase
 */
    public function __construct()
    {
      //configuracion general
     $this->IsSMTP(); // protocolo de transferencia de correo
     $this->Host = 'smtp.gmail.com';  // Servidor GMAIL
     $this->Port = 465; //puerto
     $this->SMTPAuth = true; // Habilitar la autenticación SMTP
     $this->Username = $this->tu_email;
     $this->Password = $this->tu_password;
     $this->SMTPSecure = 'ssl';  //habilita la encriptacion SSL
     //remitente
     $this->From = $this->tu_email;
    $this->FromName = $this->tu_nombre;
    }
    /**
 * Metodo encargado del envio del e-mail
 */
    public function enviar( $para, $nombre, $titulo , $contenido)
    {
       $this->AddAddress( $para ,  $nombre );  // Correo y nombre a quien se envia
       $this->WordWrap = 50; // Ajuste de texto
       $this->IsHTML(true); //establece formato HTML para el contenido
       $this->Subject =$titulo;
       $this->Body    =  $contenido; //contenido con etiquetas HTML
       $this->AltBody =  strip_tags($contenido); //Contenido para servidores que no aceptan HTML
       //envio de e-mail y retorno de resultado
       return $this->Send() ;
   }
}//--> fin clase
/* == se emplea la clase email == */
  // nuevo usuario envio correo
  function envio_correoactivacion_cuenta($correo, $nombre, $id_com){
    // $]tabla=$_POST['tabla'];
      $acus='0';
    // $correo=$_POST['correo'];  
    $contenido_html =  '      
            <!doctype html>
             <html xmlns="http://www.w3.org/1999/xhtml">
             <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
              <meta name="viewport" content="initial-scale=1.0" />
              <meta name="format-detection" content="telephone=no" />
              <title></title>
              <style type="text/css">
              body {
                width: 100%;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
              }
              @media only screen and (max-width: 600px) {
                table[class="table-row"] {
                  float: none !important;
                  width: 98% !important;
                  padding-left: 20px !important;
                  padding-right: 20px !important;
                }
                table[class="table-row-fixed"] {
                  float: none !important;
                  width: 98% !important;
                }
                table[class="table-col"], table[class="table-col-border"] {
                  float: none !important;
                  width: 100% !important;
                  padding-left: 0 !important;
                  padding-right: 0 !important;
                  table-layout: fixed;
                }
                td[class="table-col-td"] {
                  width: 100% !important;
                }
                table[class="table-col-border"] + table[class="table-col-border"] {
                  padding-top: 12px;
                  margin-top: 12px;
                  border-top: 1px solid #E8E8E8;
                }
                table[class="table-col"] + table[class="table-col"] {
                  margin-top: 15px;
                }
                td[class="table-row-td"] {
                  padding-left: 0 !important;
                  padding-right: 0 !important;
                }
                table[class="navbar-row"] , td[class="navbar-row-td"] {
                  width: 100% !important;
                }
                img {
                  max-width: 100% !important;
                  display: inline !important;
                }
                img[class="pull-right"] {
                  float: right;
                  margin-left: 11px;
                        max-width: 125px !important;
                  padding-bottom: 0 !important;
                }
                img[class="pull-left"] {
                  float: left;
                  margin-right: 11px;
                  max-width: 125px !important;
                  padding-bottom: 0 !important;
                }
                table[class="table-space"], table[class="header-row"] {
                  float: none !important;
                  width: 98% !important;
                }
                td[class="header-row-td"] {
                  width: 100% !important;
                }
              }
              @media only screen and (max-width: 480px) {
                table[class="table-row"] {
                  padding-left: 16px !important;
                  padding-right: 16px !important;
                }
              }
              @media only screen and (max-width: 320px) {
                table[class="table-row"] {
                  padding-left: 12px !important;
                  padding-right: 12px !important;
                }
              }
              @media only screen and (max-width: 608px) {
                td[class="table-td-wrap"] {
                  width: 100% !important;
                }
              }
              </style>
             </head>
             <body style="font-family: Arial, sans-serif; font-size:13px; color: #444444; min-height: 200px;" bgcolor="#E4E6E9" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
             <table width="100%" height="100%" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0">
             <tr><td width="100%" align="center" valign="top" bgcolor="#E4E6E9" style="background-color:#E4E6E9; min-height: 200px;">
            <table><tr><td class="table-td-wrap" align="center" width="608">

            <table class="table-row" style="table-layout: auto; padding-right: 24px; padding-left: 24px; width: 600px; background-color: #ffffff;" bgcolor="#FFFFFF" width="600" cellspacing="0" cellpadding="0" border="0"><tbody><tr height="55px" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; height: 55px;">
               <td class="table-row-td" style="height: 55px; padding-right: 16px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; vertical-align: middle;" valign="middle" align="left">
                 <a href="#" style="color: #428bca; text-decoration: none; padding: 0px; font-size: 18px; line-height: 20px; height: 50px; background-color: transparent;">
                nextbook.com
               </a>
               </td>
             
               <td class="table-row-td" style="height: 55px; font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; text-align: right; vertical-align: middle;" align="right" valign="middle">
                 <a href="#" style="color: #428bca; text-decoration: none; font-size: 15px; background-color: transparent;">
                 Quienes somos
               </a>
               &nbsp;
               <a href="#" style="color: #428bca; text-decoration: none; font-size: 15px; background-color: transparent;">
                 Contactos
               </a>
               </td>
            </tr></tbody></table>


            <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>

            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 24px; padding-right: 24px;" valign="top" align="left">
             <table class="table-col" align="left" width="552" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="552" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">  
              <div style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; text-align: center;">
                <img src="https://raw.githubusercontent.com/deividscriollo/book/master/dist/img/banner_correo.fw.png" style="border: 0px none #444444; vertical-align: middle; display: block; padding-bottom: 9px;" hspace="0" vspace="0" border="0">
              </div>
             </td></tr></tbody></table>
            </td></tr></tbody></table>

            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
               <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
               <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-size: 28px; margin: 0px; font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #ED3393; padding-bottom: 10px; padding-top: 15px;" valign="top" align="left"><h3>Estimado/a</h3><h4> '.$nombre.' </h4></td></tr></tbody></table>
               <table class="header-row" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="528" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #444444; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">
                 
               <p>Su nueva cuenta ha sido configurada correctamente y este correo contiene toda la información que necesita.</p>
               <p>Para comenzar a usar tu cuenta Por favor confirme su registro para continuar. </p>
                
               </td></tr></tbody></table>
               </td></tr></tbody></table>
            </td></tr></tbody></table>


            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
               <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
               <table width="100%" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td width="100%" bgcolor="#ED3393" style="font-family: Arial, sans-serif; line-height: 19px; color: #FFFFFF; font-size: 14px; font-weight: normal; padding: 15px; border: 1px solid #bce8f1; background-color: #ED3393;" align="center" valign="top" align="left">
                 
                 <br>
                 <a href="http://192.168.1.21:8081/io/book/app.php?id_com='.$id_com.'" style="color: #FFFFFF; text-decoration: none; background-color: transparent; font-size: 20px;">Click Aqui</a>
               </td></tr></tbody></table>
               </td></tr></tbody></table>
            </td></tr></tbody></table>
            <table class="table-space" height="24" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="24" style="height: 24px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>


            <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
            <table class="table-space" height="24" style="height: 24px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="24" style="height: 24px; width: 600px; padding-left: 18px; padding-right: 18px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="center">&nbsp;<table bgcolor="#E8E8E8" height="0" width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td bgcolor="#E8E8E8" height="1" width="100%" style="height: 1px; font-size:0;" valign="top" align="left">&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
              
              

            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
               <table class="table-col" align="left" width="273" style="padding-right: 18px; table-layout: fixed;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-col-td" width="255" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
              <table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="255" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #ED3393; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">Redes Sociales</td></tr></tbody></table>
              
              <div style="font-family: Arial, sans-serif; line-height: 36px; color: #444444; font-size: 13px;">
                <a href="#" style="color: #ffffff; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border: 4px solid #6fb3e0; padding: 4px 9px; font-size: 14px; line-height: 19px; background-color: #6fb3e0;">Twitter</a>
                <a href="#" style="color: #6688a6; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #8aafce; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">Facebook</a>
                <a href="#" style="color: #b7837a; text-decoration: none; margin: 0px; text-align: center; vertical-align: baseline; border-width: 1px 1px 2px; border-style: solid; border-color: #d7a59d; padding: 6px 12px; font-size: 14px; line-height: 20px; background-color: #ffffff;">Google+</a>
              </div>
               </td></tr></tbody></table>
               
               <table class="table-col" align="left" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="255" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
              <table class="header-row" width="255" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="header-row-td" width="255" style="font-family: Arial, sans-serif; font-weight: normal; line-height: 19px; color: #ED3393; margin: 0px; font-size: 18px; padding-bottom: 8px; padding-top: 10px;" valign="top" align="left">Información Contactos</td></tr></tbody></table>
              Phone: 408.341.0600
              <br>
              Email: hseldon@trantor.com
               </td></tr></tbody></table>    
            </td></tr></tbody></table>
            <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 600px; background-color: #ffffff;" width="600" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>


            <table class="table-space" height="6" style="height: 6px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="6" style="height: 6px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table>
            <table class="table-row" width="600" bgcolor="#FFFFFF" style="table-layout: fixed; background-color: #ffffff;" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-row-td" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal; padding-left: 36px; padding-right: 36px;" valign="top" align="left">
             <table class="table-col" align="left" width="528" cellspacing="0" cellpadding="0" border="0" style="table-layout: fixed;"><tbody><tr><td class="table-col-td" width="528" style="font-family: Arial, sans-serif; line-height: 19px; color: #444444; font-size: 13px; font-weight: normal;" valign="top" align="left">
               <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
               <div style="font-family: Arial, sans-serif; line-height: 19px; color: #777777; font-size: 14px; text-align: center;">&copy; Nextbook.com 2015 - 2016</div>
               <table class="table-space" height="12" style="height: 12px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="12" style="height: 12px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
               <div style="font-family: Arial, sans-serif; line-height: 19px; color: #bbbbbb; font-size: 13px; text-align: center;">
                <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">Terminoss</a>
                &nbsp;|&nbsp;
                <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">Privacidad</a>
                &nbsp;|&nbsp;
                <a href="#" style="color: #428bca; text-decoration: none; background-color: transparent;">Mapa</a>
               </div>
               <table class="table-space" height="16" style="height: 16px; font-size: 0px; line-height: 0; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="16" style="height: 16px; width: 528px; background-color: #ffffff;" width="528" bgcolor="#FFFFFF" align="left">&nbsp;</td></tr></tbody></table>
             </td></tr></tbody></table>
            </td></tr></tbody></table>
            <table class="table-space" height="8" style="height: 8px; font-size: 0px; line-height: 0; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="table-space-td" valign="middle" height="8" style="height: 8px; width: 600px; background-color: #e4e6e9;" width="600" bgcolor="#E4E6E9" align="left">&nbsp;</td></tr></tbody></table></td></tr></table>
            </td></tr>
             </table>
             </body>
             </html>



    ';
    $contenido_html=utf8_decode($contenido_html);
    $titulo=utf8_decode('REGISTRO ACTIVACIÓN NEXTbook.com');
    $titulo2=utf8_decode('NExtbook.com');
    $email = new email();
    if ( $email->enviar( $correo , $titulo2 , $titulo ,  $contenido_html ) )
      // mensaje enviado
       $acus='1';
    else
    {
       // echo 'El mensaje no se pudo enviar ';
       $email->ErrorInfo;
       $acus='0';
    }
    return $acus;
  }

  function crear_cuenta_correo($email){
    $ip = IPSERVER;            // should be server IP address or 127.0.0.1 if local server
    $account = ACCOUNT;        // cpanel user account name
    $passwd =PASSWD;          // cpanel user password
    $port =PORTMAIL;                  // cpanel secure authentication port unsecure port# 2082
    $email_domain = DOMAIN;
    $email_user =$email;
    $email_pass =$email;
    $email_quota = 0;             // 0 is no quota, or set a number in mb

    $xmlapi = new xmlapi($ip);
    $xmlapi->set_port($port);     //set port number.
    $xmlapi->password_auth($account, $passwd);
    $xmlapi->set_debug(0);        //output to error file  set to 1 to see error_log.

    //print_r($xmlapi);
    $call = array('domain'=>$email_domain, 'email'=>$email_user, 'password'=>$email_pass, 'quota'=>$email_quota);


    $result = $xmlapi->api2_query($account, "Email", "addpop", $call );
    return $result;
  }

?>