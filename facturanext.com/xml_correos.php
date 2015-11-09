<?php
    include_once('../admin/class.php'); 
    $class=new constante();     
    
    $page = $_GET['page'];
    $limit = $_GET['rows'];
    $sidx = $_GET['sidx'];
    $sord = $_GET['sord'];
    $search = $_GET['_search'];
    if (!$sidx)
        $sidx = 1;

    $resultado = $class->consulta("select  COUNT(*) AS count from facturanext.correo as FC where FC.id_usuario = '".$_GET['id']."'");        
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
        $SQL = "SELECT id,tipo_consumo,razon_social,clave_acceso,fecha_correo,remitente from facturanext.correo as FC where FC.id_usuario = '".$_GET['id']."' ORDER BY  $sidx $sord offset $start limit $limit";
    } else {
        $campo = $_GET['searchField'];
      
        if ($_GET['searchOper'] == 'eq') {
            $SQL = "SELECT id,tipo_consumo,razon_social,clave_acceso,fecha_correo,remitente from facturanext.correo as FC where FC.id_usuario = '$_GET[id]' WHERE $campo = '$_GET[searchString]' ORDER BY $sidx $sord offset $start limit $limit";
        }         
        if ($_GET['searchOper'] == 'cn') {
            $SQL = "SELECT id,tipo_consumo,razon_social,clave_acceso,fecha_correo,remitente from facturanext.correo as FC where FC.id_usuario = '$_GET[id]' WHERE $campo like '%$_GET[searchString]%' ORDER BY $sidx $sord offset $start limit $limit";
        }
      
    }
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
            $s .= "</row>";
        }
    $s .= "</rows>";
    echo trim($s);
    /*echo "<?xml version='1.0' encoding='utf-8'?><rows><page>1</page><total>1</total><records>7</records><row id='A-000002'><cell>foo</cell><cell>bar yes ok</cell><cell>Y</cell><cell></cell></row><row id='A-000009'><cell>hello</cell><cell>hwq</cell><cell>Y</cell><cell></cell></row><row id='A-000013'><cell>nnnnn</cell><cell>nnnn</cell><cell>n</cell><cell></cell></row><row id='A-000007'><cell>t1</cell><cell>Your appointment for TOken  at  for  will be at </cell><cell>Y</cell><cell></cell></row><row id='A-000008'><cell>t1</cell><cell>Your appointment for TOken  at for  will be at </cell><cell>Y</cell><cell></cell></row><row id='A-000011'><cell>test2</cell><cell>test2</cell><cell>n</cell><cell></cell></row><row id='A-000015'><cell>wwwww</cell><cell>wwwww</cell><cell>g</cell><cell></cell></row></rows>";*/
?>