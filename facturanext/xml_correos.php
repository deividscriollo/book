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
    $resultado = $class->consulta("select  COUNT(*) AS count from facturanext.correo as FC where FC.id_usuario = '".$_GET['id']."' and FC.stado = '1' UNION ALL select  COUNT(*) AS count from facturanext.correo as FC where FC.id_usuario = '".$_GET['id']."' and FC.stado = '5'");        
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
        $SQL = "SELECT FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas as FF where FC.id = FF.id_correo and FC.id_usuario = '".$_GET['id']."'  and FC.stado = '1' UNION ALL SELECT  FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas_fisica as FF where FC.id = FF.id_correo and FC.id_usuario = '".$_GET['id']."' and FC.stado = '5' ORDER BY  $sidx $sord offset $start limit $limit";
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
            if($row[1] == '01') {
                $s .= "<cell>" . "FACTURA" . "</cell>";    
            } else {
                if($row[1] == '04') {
                    $s .= "<cell>" . "NOTA DE CRÉDITO" . "</cell>";    
                } else {
                    if($row[1] == '05') {
                        $s .= "<cell>" . "NOTA DE DÉBITO" . "</cell>";    
                    } else {
                        if($row[1] == '06') {
                            $s .= "<cell>" . "GUÍA DE REMISIÓN" . "</cell>";    
                        } else {
                            if($row[1] == '07') {
                                $s .= "<cell>" . "COMPROBANTE DE RETENCIÓN" . "</cell>";    
                            }
                        }
                    }
                }
            }     

            $s .= "<cell>" . $row[2] . "</cell>";
            $s .= "<cell>" . $row[3] . "</cell>";
            
            $mydate = strtotime($row[7]);          
            $s .= "<cell>" . utf8_encode(strftime("%A, %d de %B de %Y", $mydate)) . "</cell>";
            $s .= "<cell>" . $row[5] . "</cell>";                         
            $SQL_1 = "select name_update,extension from facturanext.adjuntos AS FA WHERE FA.id_correo = '".$row[0]."'";
            $resultado_1 = $class->consulta($SQL_1);  
            $ss ='';
            $tt ='';
            $cont =0;

            while ($row_1= $class->fetch_array($resultado_1)) {
                if($cont == 0){
                    if($row_1[1] == 'xml') {
                        $tt .= "<a id=".$row[0]." onclick='reporte_pdf(".'"'.$row_1[0].'"'.",".'"'.$row_1[1].'"'.",".'"'.$row[6].'"'.")' title='Reporte Factura Next'><i class='fa fa-search-plus fa-lg' style='padding: 5px;'></i></a>";                    
                        $cont = 1;
                    }                    
                } 
                               
                if($row_1[1] == 'zip') {
                    $ss .= "<a title='Archivo Comprimido' onclick='descarga_archivos(".'"'.$row_1[0].'"'.",".'"'.$row_1[1].'"'.",".'"'.$row[6].'"'.")'><i class='fa fa-file-archive-o fa-lg' style='padding: 5px;'></i></a>";
                } else {
                    if($row_1[1] == 'xml') {
                        $ss .= "<a title='Documento XML' onclick='descarga_archivos(".'"'.$row_1[0].'"'.",".'"'.$row_1[1].'"'.",".'"'.$row[6].'"'.")'><i class='fa fa-file-code-o fa-lg' style='padding: 5px;'></i></a>";        
                    } else {
                        if($row_1[1] == 'pdf') {
                            $ss .= "<a title='PDF' onclick='descarga_archivos(".'"'.$row_1[0].'"'.",".'"'.$row_1[1].'"'.",".'"'.$row[6].'"'.")'><i class='fa fa-file-pdf-o fa-lg' style='padding: 5px;'></i></a>";
                        } else {
                            $ss .= "<a title='Archivo de datos' onclick='descarga_archivos(".'"'.$row_1[0].'"'.",".'"'.$row_1[1].'"'.",".'"'.$row[6].'"'.")'><i class='fa fa-file-text-o fa-lg' style='padding: 5px;'></i></a>";                            
                        }
                    }
                }                                                                
            }
            
            $ss = $tt . $ss;
            $s .= "<cell> <![CDATA[" . $ss . "]]></cell>";
            $s .= "</row>";
        }
    $s .= "</rows>";
    echo $s;    
?>