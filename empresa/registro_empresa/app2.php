
<?php
	if(!isset($_SESSION)){
        session_start();        
    }	
	include_once('../assets/admin/class.php');

	$class=new constante();	
	$usersOn = array();

	$ahora = date('Y-m-d H:i:s');
	$expira = date('Y-m-d H:i:s', strtotime('+1 min'));
	$resultado = $class->consulta("UPDATE seg.fecha_ingresos set fecha_ingreso ='".$ahora."', fecha_limite ='".$expira."', stado = '1' WHERE id_usuario = '".$_POST['id']."'");//actualizo los datos de la session del usuario actual
	if($resultado){		
		$resultado = $class->consulta("SELECT id,id_usuario,fecha_ingreso,fecha_limite FROM seg.fecha_ingresos WHERE id_usuario != '".$_POST['id']."'");	///busco la lista de usuarios por usuarios inactivos
		while ($row=$class->fetch_array($resultado)) {				
			if($ahora >= $row[3]){
				$usersOn[] = array('id' => $row[0], 'id_user' => $row[1],'limite' => $row[3],  'status' => 'off');
			}else{
				$usersOn[] = array('id' => $row[0], 'id_user' => $row[1],'limite' => $row[3],  'status' => 'on');
			}
		}		
	}	else{
		$usersOn[] = 'Error recargue la página';
	}
	echo json_encode($usersOn);
	
?>