<?php 

		include_once "bd.php";

    class Titulos{    
        public static function crearTitulo($id){
            $nombreti = $_REQUEST["nombreti"];
            $centro = $_REQUEST["centro"];
            $fechafin = $_REQUEST["fechafin"];
            $tipo = $_REQUEST["tipo"];

            $bd = new BD();
            $sql = "INSERT INTO titulo(nombreti,centro,fechafin,tipo,alumnoid ) VALUES('$nombreti','$centro','$fechafin','$tipo', '$id')";
            
            if ($bd->ejecutar($sql) == 1)
                $r = true;
            else
				$r =  false;
            return $r;
        }    
        
        public static function getTitulo($id){
            $bd = new BD();
            $sql = "SELECT * FROM titulo WHERE alumnoid= $id";
            $tabla= $bd->consultar($sql);
            return $tabla;
        }
        
         public static function borrarTitulo($id, $titulo){
            $bd = new BD();
            $sql = "DELETE FROM titulo WHERE alumnoid=$id AND tituloid=$titulo";
            $bd->ejecutar($sql);
        }
    }
?>