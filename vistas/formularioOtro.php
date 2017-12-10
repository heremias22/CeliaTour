<?php 
    echo "<h3>Otros</h3>";

    $tablaOtro = $datos["tablaOtro"];
echo "<form  action='index.php' method='post'>";
    // la idea de esto es que te saque un array de todos los otros que tiene un usuario y luego buscar el correspondiente otro en el array y salga marcao

$otro = $tablaOtro[0];

    if ($otro['asignado']) {
        echo "Carné de conducir <input type='checkbox' name='conducir' checked>  <br>";
    }else{
        echo "Carné de conducir <input type='checkbox' name='conducir' >  <br>";
    }

$otro = $tablaOtro[1];

    if ($otro['asignado']) {
        echo "Incorporación inmediata <input type='checkbox' name='incorporacion' checked><br>";
    }else{
        echo "Incorporación inmediata <input type='checkbox' name='incorporacion'><br>";
    }

$otro = $tablaOtro[2];

    if ($otro['asignado']) {
        echo "vehiculo propio<input type='checkbox' name='vehiculo' checked><br>";
    }else{
        echo "vehiculo propio<input type='checkbox' name='vehiculo'><br>";
    }

$otro = $tablaOtro[3];

    if ($otro['asignado']) {
        echo "Flexibilidad horaria<input type='checkbox' name='flexibilidad' checked><br>";
    }else{
        echo "Flexibilidad horaria<input type='checkbox' name='flexibilidad'><br>";
    }

$otro = $tablaOtro[4];

    if ($otro['asignado']) {
        echo "Disponibilidad geografica <input type='checkbox' name='geografica' checked><br>";
    }else{
        echo "Disponibilidad geografica <input type='checkbox' name='geografica'><br>";
    }
    echo "<div>";

 
    echo "<input type='hidden' name='accion' value='insertarOtros'>";
    echo "<input type='submit' value='Modifica Otros'>";
echo "</form>";
    
?>