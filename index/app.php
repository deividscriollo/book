<?php 
	if(!isset($_SESSION)){
        session_start();        
    }
	include_once('../admin/class.php');	
	// procesos
	if (isset($_POST['time_session'])) {
		$acu[0]='0';
		if(isset($_SESSION["modelo"])) {
			$acu[0]='1';
		}       
    	print_r(json_encode($acu));
	}
?>