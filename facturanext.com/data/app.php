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
	if ($constructor -> methods == 'compartir-correo-xml') {
        $correo = $constructor -> data -> correo;
		$comment = $constructor -> data -> comment;
		$link = $constructor -> data -> link;
		if (compartir_correo_xml($correo,$link,$comment)) {
			print_r(json_encode(array('valid' => 'true' )));
		}else{
			print_r(json_encode(array('valid' => 'false' )));
		}
    }

    if ($constructor -> methods == 'consulta-id-miempresa') {
		print_r(json_encode(array('id_miempresa' => $_SESSION['id_miempresa'])));
	}

	if ($constructor -> methods == 'llenar-tipo-consumo') {
		$result = $class->consulta("SELECT id, tipo FROM facturanext.tipo_consumo WHERE STADO='1';");
		while ($row = $class->fetch_array($result)) {
			$acu[] = array('id' => $row['id'], 'value' => $row['tipo'] );
		}
		print_r(json_encode($acu));
	}

	if ($constructor -> methods == 'llenar-facturas_electronicas') {
		$acu  = array();
		$result = $class->consulta("SELECT FC.id AS id_factura_correos, FC.tipo_consumo AS codigo_consumo,
										CASE WHEN FC.tipo_consumo='01' THEN 'FACTURA'
										WHEN FC.tipo_consumo='04' THEN 'NOTA DE CRÉDITO'
										WHEN FC.tipo_consumo='05' THEN 'NOTA DE DÉBITO'
										WHEN FC.tipo_consumo='06' THEN 'GUÍA DE REMISIÓN'
										ELSE 'no-reconocido' END AS tipo_consumo, 											
										FC.razon_social,FC.fecha_correo,FC.id_usuario,FF.fecha_emision, FF.total_factura, FC.clave_acceso ,
										CASE WHEN FC.tipo = '' THEN 'no-establecido'
										WHEN FC.tipo_consumo != '' THEN (SELECT upper(tipo) FROM facturanext.tipo_consumo WHERE ID = FC.tipo)
										ELSE 'no-reconocido' END AS tipo
									FROM facturanext.correo FC, facturanext.facturas FF
									WHERE FC.id = FF.id_correo AND FC.id_usuario = '$_SESSION[id_miempresa]'  
									AND FC.stado = '1';");
		while ($row = $class->fetch_array($result)) {
			$acu[] = array(	'id_factura_correos' => $row['id_factura_correos'],
							'tipo_documento' => $row['tipo_consumo'],
							'razon_social' => $row['razon_social'],
							'tipo_consumo' => $row['tipo'],
							'total_factura' => $row['total_factura'],
							'clave_acceso' => $row['clave_acceso'],
							'fecha_emision' => $row['fecha_emision']
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
			print_r(json_encode(array('valid' => 'false', 'error' => '3', 'methods' => 'registro-existente-db'))); // ------ ya existe el registro
		}else{
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
						$id_factura = $class->idz();

						$class->consulta("INSERT INTO facturanext.correo values (	'".$id_factura."',
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

						
						$id_adj = $class->idz();		
						$class->consulta("INSERT INTO facturanext.adjuntos values (	'".$class->idz()."',
																					'".$id_factura."',
																					'".$id_adj."',
																					'".$id_adj."',
																					'".$id_adj."',
																					'0',
																					'xml',
																					'0',
																					'".$fecha."')");
						$nombre_fichero = "../archivos/".$id_miempresa."/".$id_factura.".xml";

						$xml = $class->generateValidXmlFromObj($respuesta->autorizaciones);
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
			}else{
				print_r(json_encode(array('valid' => 'false', 'error' => '4', 'methods' => 'registro-no-existente-sri'))); // ------ no disponible sri db
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