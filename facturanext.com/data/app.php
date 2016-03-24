<?php

	if(!isset($_SESSION)) {
        session_start();
    }
    // ------------------------------------------------ Lib requiered ------------------------------------------------------ //
	include_once('../../admin/class.php');
	include_once('../../admin/classcorreos.php');	
	include_once('../../admin/getsri.php');	

	// ----------------------------------------- Herencia contstructor conexion db ----------------------------------------- //
	$class = new constante();
	$getsri = new getsri();		
	

	// procesos referentes a angular $htpp
    $postdata = file_get_contents("php://input"); 
    $constructor = json_decode($postdata); 
    
    if ($constructor -> methods == 'info') {
        print_r(json_encode($_SESSION['modelo']));
    }


	// ---------------------------------------------- Progcesos generales -------------------------------------------------- //
	// $id = $_SESSION['id_usuario'];

	if ($constructor -> methods == 'llenar-tipo-consumo') {
		$result = $class->consulta("SELECT id, tipo FROM facturanext.tipo_consumo WHERE STADO='1';");
		while ($row = $class->fetch_array($result)) {
			$acu[] = array('id' => $row['id'], 'value' => $row['tipo'] );
		}
		print_r(json_encode($acu));
	}
	if ($constructor -> methods == 'llenar-facturas_electronicas') {
		$result = $class->consulta("SELECT FC.id AS id_factura_correos, FC.tipo_consumo AS codigo_consumo,
										CASE WHEN FC.tipo_consumo='01' THEN 'FACTURA'
										WHEN FC.tipo_consumo='04' THEN 'NOTA DE CRÉDITO'
										WHEN FC.tipo_consumo='05' THEN 'NOTA DE DÉBITO'
										WHEN FC.tipo_consumo='06' THEN 'GUÍA DE REMISIÓN'
									        ELSE 'no-reconocido' END AS tipo_consumo,											
									FC.razon_social,FTC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  
									FROM facturanext.correo AS FC, facturanext.facturas AS FF, facturanext.tipo_consumo FTC
									WHERE FC.id = FF.id_correo AND FC.id_usuario = '2016032412220356f4223b8b01f'  
									AND FC.stado = '1'
									AND FTC.ID= FC.TIPO ;");
		while ($row = $class->fetch_array($result)) {
			$acu[] = array(	'id_factura_correos' => $row['id_factura_correos'],
							'tipo_documento' => $row['tipo_consumo'],
							'razon_social' => $row['razon_social'],
							'tipo_consumo' => $row['tipo'],
							'fecha_emision' => $row['fecha_emision'],
							'remitente' => $row['remitente']
						);
		}
		print_r(json_encode($acu));
	}

	

	if ($constructor -> methods == 'save-clave-acceso') {
		$clave_acceso = $constructor -> data -> txt_clave;
		$consumo = $constructor -> data -> slt_consumo;
		$id_miempresa = $_SESSION['id_miempresa'];
		$result = $class->consulta("SELECT id FROM facturanext.correo WHERE clave_acceso = '".$clave_acceso."' and id_usuario = '".$id_miempresa."'");
		if($class->num_rows($result) > 0){
		// if($class->num_rows($result) == 0){
			print_r(json_encode(array('valid' => 'false', 'error' => '3', 'methos' => 'registro-existente-db'))); // ------ ya existe el registro
		}else{
			$respuesta = $getsri->estado_factura_electronica($clave_acceso);
			$estado = $respuesta->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->estado;
			if($estado == 'AUTORIZADO') {				
				$id_fac = $class->idz();					
				$xmlComp = new SimpleXMLElement($respuesta->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->comprobante);
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


					$num_fac = $xmlComp->infoTributaria->estab. '-'.$xmlComp->infoTributaria->ptoEmi. '-'.$xmlComp->infoTributaria->secuencial;
					$var_fe = $xmlComp->infoFactura->fechaEmision;
					$date_fe = str_replace('/', '-', $var_fe);
					$date_fe = date('Y-m-d', strtotime($date_fe));
					$class->consulta("INSERT INTO facturanext.facturas VALUES (	'".$id_fact."',
																				'".$num_fac."',
																				'".$id_prov."',
																				'".$date_fe."',
																				'".$xmlComp->infoFactura->totalSinImpuestos."',
																				'".$xmlComp->infoFactura->totalDescuento."',
																				'".$xmlComp->infoFactura->propina."',
																				'".$xmlComp->infoFactura->importeTotal ."',
																				'".$fecha_adj."',
																				'1',
																				'".$id_fac."',
																				'".$xmlComp->infoTributaria->codDoc."')");

					$class->consulta("INSERT INTO facturanext.correo values (	'".$id_fac."',
																				'".$razon_social."',
																				lower('".$email."'),
																				'".''."','".$fecha."',
																				'".'Docuemnto Generado por el SRI'."',
																				'".''."','1',
																				'".$id_miempresa."',
																				'".$cod_doc."',
																				'".$razon_social."',
																				'".$clave_acceso."',
																				'".$consumo."',
																				'".$fecha_aut."')");	
					$id_adj = $class->idz();		
					$class->consulta("INSERT INTO facturanext.adjuntos values (	'".$id_adj."',
																				'".$id_fac."',
																				'".$id_adj."',
																				'".$id_adj."',
																				'".$id_adj."',
																				'0',
																				'xml',
																				'0',
																				'".$fecha."')");
					$nombre_fichero = "../archivos/".$id_miempresa."/".$id_adj.".xml";

					$xml = $class->generateValidXmlFromObj($respuesta->RespuestaAutorizacionComprobante->autorizaciones);
					$doc= fopen($nombre_fichero,"w+");					
					if(fwrite ($doc,$xml)) {
						fclose($doc);				
						$resp = 1;	
					} else {
						$resp = 0;
					}
					print_r(json_encode(array('valid' => 'true', 'methods' => 'full'))); // ---------- valido y listo para procesar
				}else {
					print_r(json_encode(array('valid' => 'false', 'error' => '1', 'methods' => 'ruc-no-perteneciente'))); // ---------- ruc no perteneciente a esta cuenta
				}				
			}else{
				print_r(json_encode(array('valid' => 'false', 'error' => '2', 'methods' => 'no-autorizado'))); // ------ clave de acceso no autorizado
			}

		}
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