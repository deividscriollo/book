<?php  

// informacion session
if(!isset($_SESSION))
	{
		session_start();		
	}
	require('../admin/class.php');
	$class=new constante();

	if(isset($_POST['guardar'])) {			
		
		$res=$class->consulta("INSERT INTO BANCOS VALUES()");		
		if (!$res) {
			print 1;
		}else print 0;
	}	
	if(isset($_POST['mostrar_bancos'])) {
		$resultado = $class->consulta("SELECT * FROM");
		while ($row=$class->fetch_array($resultado)) {	
			

	 	} 
	}