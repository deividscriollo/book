<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../admin/simplehtmldom.php');
	include_once('../admin/class.php');
	include_once('../admin/classcorreos.php');
	class RespuestaSRI {
		public $mensaje;
		public $existe = false;
		public $razonSocial;
		public $nombreComercial;
		public $ruc;

		function __construct($ruc){
			$this->ruc = $ruc;
		}

		function encontrado($razon, $nombre) {
			$this->razonSocial = $razon;
			$this->nombreComercial = $nombre;
			$this->existe = true;
			return $this;
		}
		
		function noEncontrado($mensaje){
			$this->mensaje = $mensaje;
			$this->existe = false;
			return $this;
		}
	}
	/**
	 * Servicio web remoto que consulta al SRI por datos sobre un ruc utilizando
	 * "screen scrapping", simulando ser un navegador. Depende de CURL
	 */
	class ServicioSRI {
		var $user_agent = array();
		var $url;
		var $url_1;
		var $proxy;
		function __construct(){
			$this->url = "https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa";			
			$this->url_1 = "https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-establec.jspa";			
			$user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322; FDM)";
			$user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; Avant Browser [avantbrowser.com]; Hotbar 4.4.5.0)";
			$user_agent[] = "Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en; rv:1.8.1.14) Gecko/20080409 Camino/1.6 (like Firefox/2.0.0.14)";
			$user_agent[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Version/3.1 Safari/525.13";
			$user_agent[] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; NeosBrowser; .NET CLR 1.1.4322; .NET CLR 2.0.50727)";
			$user_agent[] = "Mozilla/5.0 (Windows; U; Windows NT 5.1; es-ES; rv:1.8.1) Gecko/20061010 Firefox/2.0";
			$this->user_agent = $user_agent;
		}
		function rawRUC($ruc){
			$rnd = rand(0, count($this->user_agent)-1);
			$agent = $this->user_agent[$rnd];
			//define('POSTVARS', 'pagina=resultado&opcion=1&texto='. $ruc );
			$post = 'accion=siguiente&ruc='. $ruc;
			//$ch = curl_init("https://declaraciones.sri.gov.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa");
			$ch = curl_init($this->url);			
			//print_r($ch);
			curl_setopt($ch, CURLOPT_POST      ,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				
			//curl_setopt($ch, CURLOPT_POSTFIELDS    , POSTVARS);
			curl_setopt($ch, CURLOPT_POSTFIELDS    , $post);
			curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
			curl_setopt($ch, CURLOPT_HEADER      ,0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);			

			/// PROXY
			//Si tiene salida a Internet por Proxy, debe poner ip y puerto
			if($this->proxy) {
				curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
				curl_setopt($ch, CURLOPT_PROXY, $this->proxy['url']);  // '172.20.18.6:8080'
				if(isset($this->proxy['user']) && isset($this->proxy['password'])){
					$cred = $this->proxy['user'].':'.$this->proxy['password'];
					curl_setopt($ch, CURLOPT_PROXYUSERPWD, $cred);
				}
				//curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'user:password');
			}
			$res = curl_exec($ch);
			curl_close($ch);
			return $res;
		}				
		public function datosRUC($ruc) {
			$html = $this->rawRUC($ruc);				
			$res = new RespuestaSRI($ruc);					
			if(stripos($html, 'El RUC no se encuentra registrado en nuestra base de datos') !== false)
				return $res->noEncontrado('No se encuentra');
			//return array('RazonSocial' => 'NO SE ENCUENTRA', 'NombreComercial' => 'NO SE ENCUENTRA');
			if(stripos($html, 'Error en el Sistema') !== false)
				return $res->noEncontrado('Error en el sistema remoto');
			//return array('RazonSocial' => 'Error en el Sistema Remoto', 'NombreComercial' => '');
			$startString  = '<table class="formulario">';
			$endString    = '</table>';	
			$startColumn = stripos($html, $startString) + strlen($startString);
			$endColumn   = stripos($html, $endString, $startColumn);
			$razon = substr($html, $startColumn, $endColumn-$startColumn);			
			$razon = str_replace('<tr><td colspan="2">&nbsp;</td></tr>', "", $razon);
			$razon = str_replace('<tr><td colspan="2" class="lineaSep" /></tr>', "", $razon);
			$razon = str_replace(',', "", $razon);
			$razon = str_replace('<th>', "<td>", $razon);
			$razon = str_replace('</th>', "</td>", $razon);

			$razon = '<table>'.$razon.'</table>';	
		
			return $razon;		
		}
	}

	function getdata($table){//obtnemos la informacion de la tabla obtenida
		$resp='';
	    $contents = $table;
	    $DOM = new DOMDocument;
	    $DOM->loadHTML($contents);

	    $items = $DOM->getElementsByTagName('tr');	    

	    foreach ($items as $node) {	    	
	    	$v = utf8_decode(str_replace(',', "", tdrows($node->childNodes)));	    	
	        $resp[] = $v;
	    }	    
	    return $resp;
	}

	function tdrows($elements){////descomponemos las filas de la tabla
	    $str = "";
	    foreach ($elements as $element) {
	        $str .= $element->nodeValue . ", ";
	    }

	    return $str;
	}

	function establecimientoSRI($d_ruc) {
		$url='https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa';
		$ch_1 = curl_init();

		curl_setopt($ch_1, CURLOPT_URL, $url);
		curl_setopt($ch_1, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch_1, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch_1, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0');
		curl_setopt($ch_1, CURLOPT_COOKIEJAR, dirname(__FILE__).'\cookie.txt');
		curl_setopt($ch_1, CURLOPT_COOKIEFILE, dirname(__FILE__).'\cookie.txt');
		curl_setopt($ch_1, CURLOPT_RETURNTRANSFER, 1);

		$sri=curl_exec ($ch_1);

		$lgnrnd=preg_replace('/^.*name="lgnrnd" value="/s','',$sri);
		$lgnrnd=preg_replace('/".*$/s','',$lgnrnd);

		$lgnjs=preg_replace('/^.*time=/s','',$sri);
		$lgnjs=preg_replace('/&amp.*$/s','',$lgnjs);

		
		$post = 'accion=siguiente&ruc='.$d_ruc;
		$post_1 = 'pagina=regresar&ruc='.$d_ruc;

		curl_setopt($ch_1, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa');
		curl_setopt($ch_1, CURLOPT_POST, 1);
		curl_setopt($ch_1, CURLOPT_POSTFIELDS, $post);
		curl_exec($ch_1);

		curl_setopt($ch_1, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos3.jspa');
		curl_setopt($ch_1, CURLOPT_POST, 1);
		curl_setopt($ch_1, CURLOPT_POSTFIELDS, $post_1);
		$repre = curl_exec ($ch_1);

		$startString  = '<div id="contenido">';
		$endString    =  '</div>';			
		$startColumn = stripos($repre, $startString) + strlen($startString);
		$endColumn   = stripos($repre, $endString, $startColumn);
		$dat = substr($repre, $startColumn, $endColumn - $startColumn);									
		$startString  = '<table width="100%" class="formulario">';						 		
		$endString    =  '</table>';			
		$startColumn = 50;//stripos($dat, $startString) + strlen($startString);
		$endColumn   = stripos($dat, $endString, $startColumn);
		$dat = substr($dat, $startColumn, $endColumn - $startColumn);									

		curl_setopt ($ch_1, CURLOPT_POST, 0);
		curl_setopt($ch_1, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-establec.jspa');
		curl_setopt ($ch_1, CURLOPT_RETURNTRANSFER, 1);		
		$res = curl_exec($ch_1);
		curl_close($ch_1);		
		
		$filename = "cookie.txt";
		$fa=fopen($filename, "w+");
		fwrite($fa,"");
		fclose($fa);

		$startString  = ' <div align="center"><b>Establecimiento Matriz</b></div>';
		$endString    = '</table><br/>';	
		$startColumn = stripos($res, $startString) + strlen($startString);
		$endColumn   = stripos($res, $endString, $startColumn);

		$establecimientos = substr($res, $startColumn, $endColumn-$startColumn);		

		$startString_1  = ' <div align="center"><b>Establecimientos Adicionales</b></div>';
		$endString_1    = '</table><br/>';	
		$startColumn_1 = stripos($res, $startString_1) + strlen($startString_1);
		$endColumn_1   = stripos($res, $endString_1, $startColumn_1);

		$establecimientos_1 = substr($res, $startColumn_1, $endColumn_1 - $startColumn_1);
		
		$establecimientos = $establecimientos . " " .$establecimientos_1 . " ". $dat ;		
		$establecimientos = str_replace('<table class="reporte" cellspacing="0">', "", $establecimientos);
		$establecimientos = str_replace('</table>', "", $establecimientos);				

		$establecimientos = '<table>'.$establecimientos.'</table>';				
		
		return $establecimientos;
	}

	// restructurando informacion de procesos sri migracion
	if (isset($_POST['txt_ruc_consumed'])) {
		$ruc=$_POST['txt_ruc'];
		$ff = new ServicioSRI();///creamos nuevo objeto de servicios SRI
		$datos = $ff->datosRUC($ruc); ////accedemos a la funcion datosSRI		
		$total = array();///creamos un array para almacenar la informacion
		$t_e='';
		
		$estab = establecimientoSRI($ruc);		
		if(property_exists ($datos,'mensaje')){//verificacios si existe el ruc ingresado
			$total = json_encode($datos->mensaje);//respuesta de error
			$acu[]=0;
			print_r(json_encode($acu));
		} else {			
			$html = str_get_html($datos);
			$arr[]=1;
			foreach($html->find('table tr td') as $e){
			    $arr[] =utf8_encode(trim($e->innertext));
			}
			//print_r(json_encode($arr));

			$html = str_get_html($estab);
			$arr_1[]=1;
			foreach($html->find('table tr td') as $e){
				if(utf8_encode(trim($e->innertext)) == '' || utf8_encode(trim($e->innertext)) == '&nbsp;'){
			    	//$arr_1[] = utf8_encode(trim($e->innertext));
				}else{
					$arr_1[] = utf8_encode(trim($e->innertext));
				}
			}
			print_r(json_encode(array($arr,$arr_1)));
		}
	}

	//----------------------variable global declara uso clase en general db------------------//
	$class=new constante();
	// verificacion existencia registro empresa cod ruc
	if (isset($_POST['registro_existencia_empresa'])) {	
		$resultado = $class->consulta("SELECT RUC FROM seg.empresa  WHERE RUC = '".$_POST['txt_ruc']."'");
		if($class->num_rows($resultado) == 0 ){			
			$respuesta[]=0;// el ruc no existe
		}else{
			$respuesta[]=1; ////el ruc ya existe
		}
		print json_encode($respuesta);
	}

	if (isset($_POST['verific_user_mail'])) {	
		$resultado = $class->consulta("SELECT RUC FROM seg.empresa  WHERE correo = '".$_POST['txt_correo']."'");
		if($class->num_rows($resultado) == 0 ){			
			print 'true'; // el ruc no existe
		}else{
			print 'false'; //el ruc ya existe
		}
	}

	// procesando informacion guardar
	if (isset($_POST['registro_nueva_empresa'])) {	
		$global=json_decode($_POST['global']);
		$adi=json_decode(stripslashes($_POST['reg_acu']));
		$i=count($global[1]);
		$html = str_get_html($global[0][12]);
		$arr_1[0]=1;		
		if($html->find('a')){
			foreach($html->find('a') as $e){
				$arr_1[0] = utf8_encode(trim($e->innertext));
			}	
		} else {
			$arr_1[0] = utf8_encode($global[0][12]);
		}

		$resultado = $class->consulta("SELECT RUC FROM seg.empresa  WHERE RUC = '".$global[0][4]."'");
		if($class->num_rows($resultado) == 0 ) {		
			$id = $class->idz();
			$fecha =$class->fecha_hora();
			$ced_ruc=$global[1][$i-1];
			if (strlen($ced_ruc)>10) {
				$ced_ruc=substr($global[1][$i-1], 0, -3);
			}

			$res=$class->consulta("INSERT INTO seg.empresa VALUES (	'".$id."',
																	'".$global[0][4]."',
																	'".$global[1][$i-2]."',
																	'".$ced_ruc."',
																	'".$global[0][6]."',
																	'".$adi[0]."',
																	'".''."',
																	'".$adi[1]."',
																	'".''."',
																	'".$adi[2]."',
																	'".$global[0][4]."',
																	'".$global[0][8]."',
																	'".$global[0][10]."',
																	'".$arr_1[0]."',
																	'".$global[0][14]."',
																	'".$global[0][16]."',
																	'".$global[0][18]."',
																	'".$global[0][20]."',
																	'".$global[0][22]."',
																	'".$global[0][24]."',
																	'"."0"."',
																	'".$fecha."')");
			if(!$res) {
				$respuesta[]=0; ////error al momento de guardar
			} else {
				$respuesta[]=1;////datos guardados correctamento
				$emp=$global[0][6];
				$directorio = "../../archivos/".$id;
				if (!file_exists($directorio)) {
					mkdir($directorio, 0777, true);
				}

				$id_ing = $class->idz();
				$ahora = date('Y-m-d H:i:s');
				$expira = date('Y-m-d H:i:s', strtotime('+1 min'));				
				$class->consulta("INSERT INTO seg.fecha_ingresos VALUES ('".$id_ing."','".$id."','".$ahora."','".$expira."','0','Creacion de la empresa')");

				if ($emp=='') {
					$emp=$global[1][$i-2];//id
				}

				//---------Envio Correos ---------//
				$respuesta[]=activacion_cuenta($adi[2],$emp, $global[0][4], $id);//resultado 1 si se envio el correo
			}
		} else {
			$respuesta[]=2;//si existe y no se guardo
		}
		print json_encode($respuesta);
	}
	// verificando acceso
	if (isset($_POST['acceder_user'])) {
		$usuario=strtolower($_POST['user']);	
		$usuario=$usuario.'001@facturanext.com';
		$resultado = $class->consulta("	SELECT 
											--perfil usuario
												upper(PC.NOMBRE) as perfil_nombre,
												upper(AC.id) as id_logeo,
												'Colaborador' as acceso,
												CC.CARGO as tipo,
												PC.correo as perfil_correo,
											-- perfil empresa
												E.nom_comercial as empresa_nombre,
												E.id as empresa_id
										FROM SEG.ACCESO_COLABORADORES AC, PERFIL_COLABORADORES PC, SEG.EMPRESA E, SEG.ACCESOS SA, CARGO_COLABORADORES CC
										WHERE PC.ID_EMPRESA=E.ID AND SA.LOGIN='$usuario' AND AC.PASS=md5('$_POST[pass]') AND SA.ID_EMPRESA= E.ID AND CC.ID=PC.ID_CARGO");
		if($class->num_rows($resultado) == 0 ) {
			$res = $class->consulta("	SELECT 
											--perfil usuario
												upper(representante_legal) as perfil_nombre,
												upper(A.id) as id_logeo,
												'Gerencia' as acceso,
												'Administrador Master' as tipo,
												E.correo as perfil_correo,
											-- perfil empresa
												E.nom_comercial as empresa_nombre,
												E.id as empresa_id
										FROM SEG.EMPRESA E, SEG.ACCESOS A 
										WHERE A.login='$usuario' AND A.pass=md5('$_POST[pass]') AND E.ID=A.ID_EMPRESA");
			if($class->num_rows($res) == 0 ) {
				$acu[0]=0;	
			}else{
				while ($row=$class->fetch_array($res)) {				
					$_SESSION['modelo'] = array(
												'perfil_nombre' => $row['perfil_nombre'],
												'id_logeo' => $row['id_logeo'],
												'acceso' => $row['acceso'],
												'tipo' => $row['tipo'],
												'perfil_correo' => $row['perfil_correo'],
												'empresa_id' => $row['empresa_id'],
												'empresa_nombre' => $row['empresa_nombre']
												
												);					
				}
				$acu[0]=1;
				$ahora = date('Y-m-d H:i:s');
				$limite = date('Y-m-d H:i:s', strtotime('+2 min'));				
				$resultado = $class->consulta("UPDATE seg.fecha_ingresos set fecha_ingreso='".$ahora."',fecha_limite='".$limite."',stado ='1', tipo_tabla= 'Usuario activo' where id_usuario = '".$_SESSION['modelo']['empresa_id']."'");
				$acu[1]=$_SESSION['modelo']['empresa_id'];					
			}			
		} else {
			while ($row=$class->fetch_array($resultado)) {				
				$_SESSION['modelo']= array(
											'perfil_nombre' => $row['perfil_nombre'],
											'id_logeo' => $row['id_logeo'],
											'acceso' => $row['acceso'],
											'tipo' => $row['tipo'],
											'perfil_correo' => $row['perfil_correo'],
											'empresa_id' => $row['empresa_id'],
											'empresa_nombre' => $row['empresa_nombre']
											
											);;
			}

			$acu[0]=1;
			$ahora = date('Y-m-d H:i:s');
			$limite = date('Y-m-d H:i:s', strtotime('+2 min'));
			
			$resultado = $class->consulta("UPDATE seg.fecha_ingresos set fecha_ingreso='".$ahora."',fecha_limite='".$limite."',stado ='1', tipo_tabla= 'Usuario activo' where id_usuario = '".$_SESSION['modelo']['empresa_id']."'");
			$acu[1]=$_SESSION['modelo']['empresa_id'];
		}
		print_r(json_encode($acu));
	}
	if (isset($_POST['time_session'])) {
		$acu[0]='0';
		if(isset($_SESSION["modelo"])) {
			$acu[0]='1';
		}       
    	print_r(json_encode($acu));
	}
	if (isset($_POST['buscar_info'])) {
		$acu['general']=$_SESSION['modelo'];
		$acu['sucursal']=info_sucursal($_SESSION['modelo']['empresa_id']);   
    	print_r(json_encode($acu));
	}
	function info_sucursal($id) {
		$class=new constante();
		$retorno='';
		$resultado = $class->consulta("	SELECT 
												S_E.id as id, id_empresa, codigo, nombre_empresa_sucursal, direccion, stado_sucursal, 
										    	S_E.stado, S_E.fecha,E.ruc
										FROM sucursales_empresa S_E, SEG.EMPRESA E 
										WHERE E.ID='$id' AND E.ruc=id_empresa AND STADO_SUCURSAL='Abierto';");
		while ($row=$class->fetch_array($resultado)) {				
			$acu =  array(   'id' => $row['id'],
							'codigo' => $row['codigo'],
							'nombre_sucursal' => ucwords(strtolower($row['nombre_empresa_sucursal'])),
							'direccion' => ucwords(strtolower($row['direccion']))
						);
			$retorno[]=$acu;
		}
		return $retorno;
	}
	
?>