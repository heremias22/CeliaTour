<?php 

		include_once "bd.php";

    class Habilidades{    
        public static function crearHabilidad($id){
            $nombreha = $_REQUEST["nombreha"];
            $descripcion = $_REQUEST["descripcion"];

            $bd = new BD();
            $sql = "INSERT INTO habilidad(nombreha,descripcion,alumnoid ) VALUES('$nombreha','$descripcion','$id')";
            
            if ($bd->ejecutar($sql) == 1)
                $r = true;
            else
				$r =  false;
            return $r;
            
        }    
        
        public static function getHabilidad($id){
            $bd = new BD();
            $sql = "SELECT * FROM habilidad WHERE alumnoid= $id";
            $tabla= $bd->consultar($sql);
            return $tabla;
        }
        
        public static function borrarHabilidad($id, $habilidad){
            $bd = new BD();
            $sql = "DELETE FROM habilidad WHERE alumnoid=$id AND habilidadid=$habilidad";
            $bd->ejecutar($sql);
        }
    }
?>