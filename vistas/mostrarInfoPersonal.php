<?php

    $info = $datos["tablaInfo"];
    $info = $info[0];
    if(isset($_SESSION["tipo"])){
       echo "<a href='index.php?accion=vistaAdmin'>Volver a vista administrador</a>";
    } echo "</div>";
    echo " <div id='vistausuario'><h3>Información personal</h3>"
            . "Nombre: ".$info['nombreal']." ".$info['apellido']."<br>"
            . "Telefono: ".$info['telefono']."<br>"
            . "Email: ".$info['correo']."<br>"
            . "Direccion: ".$info['direccion']."<br>"
            . "Localidad: ".$info['localidad']."<br>"
            . "Provincia: ".$info['provincia']."<br>"
            . "DNI: ".$info['dni']."<br>";
    if($info["activo"]==1){
        echo "activo";
    }else{
        echo "en paro";
    }
        echo "<form action='index.php'>"
            . "<input type='hidden' name='accion' value='cambioContra'>"
            . "<input type='submit' value='Cambiar Contraseña'>"
            . "</form>";

        echo "<form action='index.php'>"
            . "<input type='hidden' name='accion' value='modificarInfoPersonal'>"
            . "<input type='submit' value='Modificar Información'>"
            . "</form>";

        echo "<form action='index.php'>"
                . "<input type='hidden' name='accion' value='seleccionarImagen'>"
                . "<input type='submit' value='Añadir o cambiar imagen'>"
            . "</form>";
