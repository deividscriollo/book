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
	if (isset($_POST['info'])) {
		print_r(json_encode($_SESSION['modelo']));
	}	

	// procesos referentes a angular $htpp
	$postdata = file_get_contents("php://input"); 
	$constructor = json_decode($postdata); 
	
	if ($constructor -> methods == 'info') {
		print_r(json_encode($_SESSION['modelo']));
	}
	// modelo base de datos
	if ($constructor -> methods == 'info2') {
		print_r(json_encode(array('nombre' => 'deivid', 'apellido' => 'esteban')));
	}

?>