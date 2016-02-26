<?php 
date_default_timezone_set('America/Guayaquil'); 
$fecha = date('Y-m-d H:i:s', time());   
$fecha_larga = date('His', time());

function maxCaracter($texto, $cant){        
    $texto = substr($texto, 0,$cant);
    return $texto;
}	


?>