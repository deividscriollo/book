<?php
  require('admin/class.php');    
  require('admin/correo.php');    
  $class=new constante();

  $id = $_GET['id_com'];
  $resultado = $class->consulta("select ruc from seg.empresa where id='".$id."'");
  while ($row=$class->fetch_array($resultado)) {  
    $res = $row[0];
  }
  $resultado = $class->consulta("update seg.empresa set stado = '1' where id='".$id."'");////cambios estado de la empresa a 1
  print_r(crear_cuenta_correo($res));
  
?>