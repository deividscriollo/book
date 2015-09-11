<?php	
	function establecimientoSRI(){
		$url='https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa';
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0');
		curl_setopt ($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'\cookie.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__).'\cookie.txt');
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

		$sri=curl_exec ($ch);

		$lgnrnd=preg_replace('/^.*name="lgnrnd" value="/s','',$sri);
		$lgnrnd=preg_replace('/".*$/s','',$lgnrnd);

		$lgnjs=preg_replace('/^.*time=/s','',$sri);
		$lgnjs=preg_replace('/&amp.*$/s','',$lgnjs);

		$post = 'accion=siguiente&ruc=1090084247001';

		curl_setopt($ch, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-datos2.jspa');
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
		curl_exec ($ch);

		
		curl_setopt ($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_URL, 'https://declaraciones.sri.gob.ec/facturacion-internet/consultas/publico/ruc-establec.jspa');
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);		
		$res = curl_exec($ch);
		curl_close($ch);		
		
		$filename = "cookie.txt";
		$fa=fopen($filename, "w+");
		fwrite($fa,"");
		fclose($fa);
		return $res;
	}
	print_r(establecimientoSRI());

    
?>