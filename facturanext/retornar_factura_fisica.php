<?php

include_once('../admin2/class.php');
$class=new constante();  

error_reporting(0);
$id = $_GET['com'];
$arr_data = array();

$resultado = $class->consulta("select F.id, P.id, P.nombre_proveedor, P.ruc_proveedor, F.num_fac, F.fecha_emision, F.fecha_creacion, F.tipo_consumo, F.tipo_documento, F.iva0, F.iva12, F.subtotal, F.iva, F.descuento, F.total_fac from facturanext.facturas_fisica F, facturanext.proveedores P where P.id = F.id_proveedor and F.id = '" . $id . "'");
while ($row = $class->fetch_array($resultado)) {
    $arr_data[] = $row[0];
    $arr_data[] = $row[1];
    $arr_data[] = $row[2];
    $arr_data[] = $row[3];
    $arr_data[] = $row[4];
    $arr_data[] = $row[5];
    $arr_data[] = $row[6];
    $arr_data[] = $row[7];
    $arr_data[] = $row[8];
    $arr_data[] = $row[9];
    $arr_data[] = $row[10];
    $arr_data[] = $row[11];
    $arr_data[] = $row[12];
    $arr_data[] = $row[13];
    $arr_data[] = $row[14];
}
echo json_encode($arr_data);
?>
