<?php
    $tablaIdioma = $datos["tablaIdioma"];
    echo "<h3>Idiomas</h3>";
    echo "<table class='tabla'>";
    echo "<tr><th>Idioma</th><th>Nivel</th><th>Opción</th><tr>";
    foreach ($tablaIdioma as $idioma){
        echo "<tr><td>".$idioma["nombreid"]." </td><td> ".$idioma["nombreni"]."</td>";  
        echo "<td><a href='index.php?accion=borrarIdioma&id=".$idioma['alumnoid']."&idioma=".$idioma['idiomaid']."'>Borrar</a>";
        echo "</td></tr>";
        
    }
echo "</table>";
 echo "<br>";
?>

