<?php 
	include_once "bd.php";

    class Idiomas{    
        public static function crearIdioma($id){
            $nombreid = $_REQUEST["nombreid"];
            $nombreni = $_REQUEST["nombreni"];
            
            $ididioma=0;
            $idnivel=0;
            switch($nombreid){
                case "ingles":
                    $idioma=1;
                    break;
                case "frances":
                    $idioma=2;
                    break;
                case "italiano":
                    $idioma=3;
                    break;
                case "aleman":
                    $idioma=4;
                    break;
                case "arabe":
                    $idioma=5;
                    break;
                case "ruso":
                    $idioma=6;                    
            }
            
             switch($nombreni){
                case "a1":
                    $idnivel=1;
                    break;
                case "a2":
                    $idnivel=2;
                    break;
                case "b1":
                    $idnivel=3;
                     break;
                case "b2":
                    $idnivel=4;
                     break;
                case "c1":
                    $idnivel=5;
                     break;
                case "c2":
                    $idnivel=6;
            }
            
            $bd = new BD();
            $sql = "INSERT INTO idiomaalumno(alumnoid,idiomaid,nivelid) VALUES('$id','$idioma','$idnivel')";
            if ($bd->ejecutar($sql) == 1)
                $r = true;
            else
				$r =  false;
            return $r;
            
        }    
        
        public static function getIdioma($id){
            $bd = new BD();
            $sql = "SELECT nombreid, nombreni, alumnoid, idiomaalumno.idiomaid
            FROM idioma INNER JOIN idiomaalumno ON   idioma.idiomaid=idiomaalumno.idiomaid INNER JOIN nivel ON idiomaalumno.nivelid=nivel.nivelid
             WHERE alumnoid=  $id";
            $tabla= $bd->consultar($sql);
            
            return $tabla;
        }
        
          public static function borrarIdioma($id, $idioma){
            $bd = new BD();
            $sql = "DELETE FROM idiomaalumno WHERE alumnoid=$id AND idiomaid=$idioma";
            $bd->ejecutar($sql);
        }
    }
?>