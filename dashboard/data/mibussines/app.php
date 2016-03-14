<?php 
    if(!isset($_SESSION)){
        session_start();        
    }
    include_once('../../../admin/class.php');
    include_once('../../../admin/classcorreos.php');
    $class=new constante();
    
    // while ($row=$class->fetch_array($res)) 

    // procesos referentes a angular $htpp
    $postdata = file_get_contents("php://input"); 
    $constructor = json_decode($postdata); 
    
    if ($constructor -> methods == 'info') {
        print_r(json_encode($_SESSION['modelo']));
    }

    // ---------------------------------------------INICIO proceso colaboradores area -----------------------------------------------//
        // modelo base de datos area
            if ($constructor -> methods == 'save-area') {
                $data = $constructor -> data;
                $id = $class->idz();
                $fecha =$class->fecha_hora();
                $resultado = $class->consulta("INSERT INTO colaboradores_areas VALUES('$id','$_SESSION[sucursal_activo]',upper('$data->txt_0'),'1','$fecha')");
                if ($resultado) {
                    print_r(json_encode(array('valid' => 'true')));// almacenado correctamente
                }else{
                    print_r(json_encode(array('valid' => 'false')));// almacenado incorrecto
                }
            }
            if ($constructor -> methods == 'valid_existencia_area') {
                $data = $constructor -> valor;
                $resultado = $class->consulta("SELECT id FROM colaboradores_areas WHERE data=upper('$data') AND id_sucursales_misucursal='$_SESSION[sucursal_activo]' AND stado='1'");
                if ($class->num_rows($resultado)>0) {
                    print_r(json_encode(array('valid' => 'true')));// almacenado correctamente
                }else{
                    print_r(json_encode(array('valid' => 'false')));// almacenado incorrecto
                }
            }
            if ($constructor -> methods == 'llenar_tabla_area') {
                $acu = array();
                $resultado = $class->consulta("SELECT * FROM colaboradores_areas WHERE id_sucursales_misucursal='$_SESSION[sucursal_activo]' AND stado='1'");
                while ($row=$class->fetch_array($resultado)) {
                    $acu[] = array('area' => ucwords(strtolower($row['data'])), 'id' => $row['id']);
                }
                print_r(json_encode($acu));
            }

        // modelo base de datos cargo
            if ($constructor -> methods == 'save-cargo') {
                $data = $constructor -> data;
                $id = $class->idz();
                $fecha =$class->fecha_hora();
                $resultado = $class->consulta("INSERT INTO colaboradores_cargo VALUES('$id','$_SESSION[sucursal_activo]',upper('$data->txt_0'),'1','$fecha')");
                if ($resultado) {
                    print_r(json_encode(array('valid' => 'true')));// almacenado correctamente
                }else{
                    print_r(json_encode(array('valid' => 'false')));// almacenado incorrecto
                }
            }
            if ($constructor -> methods == 'valid_existencia_cargo') {
                $data = $constructor -> valor;
                $resultado = $class->consulta("SELECT id FROM colaboradores_cargo WHERE data=upper('$data') AND id_sucursales_misucursal='$_SESSION[sucursal_activo]' AND stado='1'");
                if ($class->num_rows($resultado)>0) {
                    print_r(json_encode(array('valid' => 'true')));// almacenado correctamente
                }else{
                    print_r(json_encode(array('valid' => 'false')));// almacenado incorrecto
                }
            }
            if ($constructor -> methods == 'llenar_tabla_cargo') {
                $acu = array();
                $resultado = $class->consulta("SELECT * FROM colaboradores_cargo WHERE id_sucursales_misucursal='$_SESSION[sucursal_activo]' AND stado='1'");
                while ($row=$class->fetch_array($resultado)) {
                    $acu[] = array('cargo' => ucwords(strtolower($row['data'])), 'id' => $row['id']);
                }
                print_r(json_encode($acu));
            }
        // modelo base de datos colaborador
            if ($constructor -> methods == 'save-colaborador') {
                $data = $constructor -> data;
                $id = $class->idz();
                $id_colaborador = $class->idz();
                $fecha = $class->fecha_hora();
                $nombre_sucursal = informacion_sucursal();
                $colaborador_pass =$class->clave_aleatoria();
                // envio correo
                $correo = activacion_cuenta_colaborador($data->txt_x, $nombre_sucursal, $data->txt_0, $id);
                if ($correo) {
                    $resultado = $class->consulta("INSERT INTO colaboradores_perfil VALUES( '$id',
                                                                                            '$_SESSION[sucursal_activo]',
                                                                                            '$data->select_cargo',
                                                                                            '$data->select_area',
                                                                                            upper('$data->txt_0'),
                                                                                            lower('$data->txt_x'),
                                                                                            '$fecha',
                                                                                            '$data->txt_1',
                                                                                            '$data->txt_2',
                                                                                            '1','$fecha')");
                    $resultado = $class->consulta("INSERT INTO seg.acceso_colaboradores VALUES ('$id_colaborador', '$id', '$data->txt_x', '$colaborador_pass', '0', '$fecha');");
                    if ($resultado) {
                        print_r(json_encode(array('valid' => 'true'))); //almacenado incorrecto
                    }
                }else{
                    print_r(json_encode(array('valid' => 'false')));// envio de correo incorreocto -> almacenado incorrecto
                }
            }
            if ($constructor -> methods == 'llenar_tabla_colaboradores') {
                $acu = array();
                $resultado = $class->consulta(" SELECT P.id, P.nombre, C.data as cargo, A.data as area, CASE WHEN P.stado='0' THEN 'No Activo' ELSE 'Activado' END as s
                                                FROM colaboradores_perfil P, colaboradores_areas A, colaboradores_cargo C  
                                                WHERE A.id=P.id_colaboradores_area 
                                                AND C.id=P.id_colaboradores_cargo 
                                                AND P.id_sucursales_misucursal_empresa='$_SESSION[sucursal_activo]' 
                                                AND P.stado!='delete'");
                while ($row=$class->fetch_array($resultado)) {
                    $acu[] = array(
                                    'cargo' => ucwords(strtolower($row['cargo'])), 
                                    'id' => $row['id'], 
                                    'area' => ucwords(strtolower($row['area'])), 
                                    'nombre' => ucwords(strtolower($row['nombre'])),
                                    'stado' => $row['s']
                            );
                }
                print_r(json_encode($acu));
            }
            
            if ($constructor -> methods == 'llenar_select_area') {
                $acu = array();
                $resultado = $class->consulta("SELECT * FROM colaboradores_areas WHERE id_sucursales_misucursal='$_SESSION[sucursal_activo]' AND stado='1'");
                while ($row=$class->fetch_array($resultado)) {
                    $acu[] = array('area' => ucwords(strtolower($row['data'])), 'id' => $row['id']);
                }
                print_r(json_encode($acu));
            }
            if ($constructor -> methods == 'llenar_select_cargo') {
                $acu = array();
                $resultado = $class->consulta("SELECT * FROM colaboradores_cargo WHERE id_sucursales_misucursal='$_SESSION[sucursal_activo]' AND stado='1'");
                while ($row=$class->fetch_array($resultado)) {
                    $acu[] = array('cargo' => ucwords(strtolower($row['data'])), 'id' => $row['id']);
                }
                print_r(json_encode($acu));
            }
            
    // ---------------------------------------------FIN proceso colaboradores area -----------------------------------------------//

    function informacion_sucursal(){
        $class=new constante();
        $resultado = $class->consulta("SELECT nombre_empresa_sucursal FROM sucursales_empresa where id='$_SESSION[sucursal_activo]';");
        while ($row=$class->fetch_array($resultado)) {
            $acu=$row[0];
        }
        return $acu;
    }
?>  