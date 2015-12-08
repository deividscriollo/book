<?php
    include_once('../admin/class.php');     
    $class=new constante();     
    date_default_timezone_set('America/Guayaquil');
    $page = $_GET['page'];
    $limit = $_GET['rows'];
    $sidx = $_GET['sidx'];
    $sord = $_GET['sord'];
    $search = $_GET['_search'];
    if (!$sidx)
        $sidx = 1;
    if($_GET['doc'] == '00'){
        $r = '';
        if($_GET['consumo'] == '0' || $_GET['consumo'] == ''){
            $r = '';
        }else{
            $r = "and FR.tipo_comusmo = '".$_GET['consumo']."'";
        }

        $resultado = $class->consulta("select COUNT(*) AS count from facturanext.facturas_fisica as FR, facturanext.proveedores as PR where PR.id = FR.id_proveedor and FR.stado = '0' and FR.id_cliente ='".$_GET['id']."' and FR.fecha_creacion between '".$_GET['ini']."' and '".$_GET['fin']."' and FR.tipo_documento= '".$_GET['doc']."' $r ");
        $row=$class->fetch_row($resultado);
        $count = $row[0];
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
            $SQL = "select FR.id,FR.num_fac,FR.id_proveedor, PR.nombre_proveedor, FR.subtotal, FR.impuestos, FR.propina, FR.total_fac,FR.fecha_emision,FR.id_cliente,FR.tipo_consumo, FR.tipo_documento from facturanext.facturas_fisica as FR, facturanext.proveedores as PR where PR.id = FR.id_proveedor and FR.stado = '0' and FR.id_cliente ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."'  $r ORDER BY  $sidx $sord offset $start limit $limit";
        } else {
            $campo = $_GET['searchField'];
          
            if ($_GET['searchOper'] == 'eq') {
                $SQL = "select FR.id,FR.num_fac,FR.id_proveedor, PR.nombre_proveedor, FR.subtotal, FR.impuestos, FR.propina, FR.total_fac,FR.fecha_emision,FR.id_cliente,FR.tipo_consumo, FR.tipo_documento from facturanext.facturas_fisica as FR, facturanext.proveedores as PR where PR.id = FR.id_proveedor and FR.stado = '0' and FR.id_cliente ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."'  $r and $campo = '$_GET[searchString]'  ORDER BY $sidx $sord offset $start limit $limit";
            }         
            if ($_GET['searchOper'] == 'cn') {
                $SQL = "select FR.id,FR.num_fac,FR.id_proveedor, PR.nombre_proveedor, FR.subtotal, FR.impuestos, FR.propina, FR.total_fac,FR.fecha_emision,FR.id_cliente,FR.tipo_consumo, FR.tipo_documento from facturanext.facturas_fisica as FR, facturanext.proveedores as PR where PR.id = FR.id_proveedor and FR.stado = '0' and FR.id_cliente ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."'  $r and $campo like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
            }
          
        }    
        $resultado = $class->consulta($SQL);  
    }else{
        $r = '';
        if($_GET['consumo'] == '0' || $_GET['consumo'] == ''){
            $r = '';
        }else{
            $r = "and CO.tipo = '".$_GET['consumo']."'";
        }    
        
        $resultado = $class->consulta("select COUNT(*) AS count from facturanext.facturas as FR, facturanext.proveedores as PR, facturanext.correo as CO where PR.id = FR.id_proveedor and CO.id = FR.id_correo and FR.stado = '1' and CO.id_usuario ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."' and FR.tipo_doc= '".$_GET['doc']."' $r ");
        $row=$class->fetch_row($resultado);
        $count = $row[0];
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
            $SQL = "select FR.id,FR.num_factura,FR.id_proveedor, PR.nombre_proveedor, FR.subtotal, FR.impuestos, FR.propina, FR.total_factura,FR.fecha_emision,CO.id_usuario,CO.tipo_consumo, CO.tipo from facturanext.facturas as FR, facturanext.proveedores as PR, facturanext.correo as CO where PR.id = FR.id_proveedor and CO.id = FR.id_correo and FR.stado = '1' and CO.id_usuario ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."' and FR.tipo_doc= '".$_GET['doc']."' $r ORDER BY  $sidx $sord offset $start limit $limit";
        } else {
            $campo = $_GET['searchField'];
          
            if ($_GET['searchOper'] == 'eq') {
                $SQL = "select FR.id,FR.num_factura,FR.id_proveedor, PR.nombre_proveedor, FR.subtotal, FR.impuestos, FR.propina, FR.total_factura,FR.fecha_emision,CO.id_usuario,CO.tipo_consumo, CO.tipo from facturanext.facturas as FR, facturanext.proveedores as PR, facturanext.correo as CO where PR.id = FR.id_proveedor and CO.id = FR.id_correo and FR.stado = '1' and CO.id_usuario ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."' and FR.tipo_doc= '".$_GET['doc']."' $r and $campo = '$_GET[searchString]'  ORDER BY $sidx $sord offset $start limit $limit";
            }         
            if ($_GET['searchOper'] == 'cn') {
                $SQL = "select FR.id,FR.num_factura,FR.id_proveedor, PR.nombre_proveedor, FR.subtotal, FR.impuestos, FR.propina, FR.total_factura,FR.fecha_emision,CO.id_usuario,CO.tipo_consumo, CO.tipo from facturanext.facturas as FR, facturanext.proveedores as PR, facturanext.correo as CO where PR.id = FR.id_proveedor and CO.id = FR.id_correo and FR.stado = '1' and CO.id_usuario ='".$_GET['id']."' and FR.fecha_emision between '".$_GET['ini']."' and '".$_GET['fin']."' and FR.tipo_doc= '".$_GET['doc']."' $r and $campo like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
            }
          
        }           
    }
    //echo $SQL;
     $resultado = $class->consulta($SQL);  
        
    //header("Content-type: text/xml;charset=utf-8");    
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
            $s .= "<cell>" . $row[6] . "</cell>";
            $s .= "<cell>" . $row[7] . "</cell>";                
            $s .= "<cell>" . $row[8] . "</cell>";
            $s .= "<cell>" . $row[9] . "</cell>";
            $s .= "<cell>" . $row[10] . "</cell>";
            $s .= "<cell>" . $row[11] . "</cell>";
        $s .= "</row>";
        }
    $s .= "</rows>";
    echo $s;    
    
    
?>