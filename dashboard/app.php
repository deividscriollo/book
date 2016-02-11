<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	if (isset($_POST['time_session'])) {
		$acu[0]='0';
		if(isset($_SESSION["modelo"])) {
			$acu[0]='1';
		}       
    	print_r(json_encode($acu));
	}
	if (isset($_POST['cambio_sucursal'])) {
		$_SESSION["acceso"]['dashboard'] = '0';
		$_SESSION["acceso"]['mibussines'] = '1';
    	print_r(json_encode(array('mibussines')));
	}
	

?>