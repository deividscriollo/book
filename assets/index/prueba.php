<?php
    function conectarse() {
        $conexion = null;
        try {                                      
            $conexion = pg_connect("host=localhost dbname = nextbook_book port = 5432 user = nextbook_root password = WZ_aNTOCg-oX");
            if( $conexion == false )
                throw new Exception( "Error PostgreSQL ".pg_last_error());                 
            else
                echo "asd";
        } catch( Exception $e ){
          throw $e;          
        }
        return $conexion;
    }
    conectarse();
?>