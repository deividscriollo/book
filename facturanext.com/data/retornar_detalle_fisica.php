<?php

include_once('../admin2/class.php');
$class=new constante();  

error_reporting(0);
$id = $_GET['com'];
$arr_data = array();

$resultado = $class->consulta("select F.id, D.cantidad, D.descripcion, D.codigo, D.v_unitario, D.descuento, D.v_total, D.iva from facturanext.detalles_fisicas  D, facturanext.facturas_fisica F where F.id = D.id_fisica and D.id_fisica = '" . $id . "'");
while ($row = $class->fetch_array($resultado)) {
    $arr_data[] = $row[0];
    $arr_data[] = $row[1];
    $arr_data[] = $row[2];
    $arr_data[] = $row[3];
    $arr_data[] = $row[4];
    $arr_data[] = $row[5];
    $arr_data[] = $row[6];
    $arr_data[] = $row[7];
}
echo json_encode($arr_data);
?>
