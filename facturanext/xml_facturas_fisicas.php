<?php
    include_once('../admin2/class.php');     
    $class=new constante();     
    date_default_timezone_set('America/Guayaquil');
    setlocale (LC_TIME,"spanish");

    $page = $_GET['page'];
    $limit = $_GET['rows'];
    $sidx = $_GET['sidx'];
    $sord = $_GET['sord'];
    $search = $_GET['_search'];
    if (!$sidx)
        $sidx = 1;
    
    $count = 0;
    $resultado = $class->consulta("select  COUNT(*) AS count from facturanext.facturas_fisica F where F.id_usuario = '".$_GET['id']."'");        
    //$row=$class->fetch_row($resultado);    
    while ($row = $class->fetch_array($resultado)) {
        $count = $count + $row[0];    
    }    
    if ($count > 0 && $limit > 0) {
        $total_pages = ceil($count / $limit);
    } else {
        $total_pages = 0;
    }
    if ($page > $total_pages)
        $page = $total_pages;
    $start = $limit * $page - $limit;
    if ($start < 0)
        $start = 0;
    
    if ($search == 'false') {
        $SQL = "SELECT F.id, P.ruc_proveedor, P.nombre_proveedor, F.fecha_emision, F.num_fac, F.total_fac FROM facturanext.facturas_fisica  F, facturanext.proveedores P where F.id_proveedor = P.id and F.id_usuario = '20151123120122565346625394d' ORDER BY $sidx $sord offset $start limit $limit";
    } else {
        $campo = $_GET['searchField'];
      
        if ($_GET['searchOper'] == 'eq') {
            $SQL = "SELECT FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas as FF where FC.id = FF.id_correo and FC.id_usuario = '$_GET[id]' and $campo = '$_GET[searchString]'  and FC.stado = '1' UNION ALL SELECT  FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas_fisica as FF where FC.id = FF.id_correo and FC.id_usuario = '".$_GET['id']."' and FC.stado = '5' ORDER BY $sidx $sord offset $start limit $limit";
        }         
        if ($_GET['searchOper'] == 'cn') {
            $SQL = "SELECT FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas as FF where FC.id = FF.id_correo and FC.id_usuario = '$_GET[id]' and $campo like '%$_GET[searchString]%'  and FC.stado = '1' UNION ALL SELECT  FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas_fisica as FF where FC.id = FF.id_correo and FC.id_usuario = '".$_GET['id']."' and FC.stado = '5' ORDER BY $sidx $sord offset $start limit $limit";
        }
    }  

   // echo $SQL;
    $resultado = $class->consulta($SQL);  
    
    header("Content-Type: text/html;charset=utf-8");   
    $s = "<?xml version='1.0' encoding='utf-8'?>";
    $s .= "<rows>";
        $s .= "<page>" . $page . "</page>";
        $s .= "<total>" . $total_pages . "</total>";
        $s .= "<records>" . $count . "</records>";
        while ($row = $class->fetch_array($resultado)) {
            $s .= "<row id='" . $row[0] . "'>";
            $s .= "<cell>" . $row[0] . "</cell>";
            $s .= "<cell>" . $row[1] . "</cell>";
            $s .= "<cell>" . $row[2] . "</cell>";
            $s .= "<cell>" . $row[3] . "</cell>";
            $s .= "<cell>" . $row[4] . "</cell>";
            $s .= "<cell>" . $row[5] . "</cell>";
            $s .= "</row>";
        }
    $s .= "</rows>";
    echo $s;    
?>