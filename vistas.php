<?php
    class Vistas {
        public static function mostrar($nombreVista, $datos = null){
            include_once("vistas/header.php");
			$arrayVistas = explode(",", $nombreVista);
			foreach ($arrayVistas as $vista) include_once("vistas/$vista.php");

            if(in_array("mostrarLogin",$arrayVistas)) include_once("vistas/footer.php");
        }
    }
?>
