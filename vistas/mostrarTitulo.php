<?php
    // no hay manera de que se lleve el idusuario al index para modificar por id
    echo "<h3>Formación reglada</h3>";
    $tablaTitulo = $datos["tablaTitulo"];
    echo "<table class='tabla'>";
    echo "<tr><th>Titulo</th><th>Centro</th><th>Fecha fin</th><th>Tipo</th><th>Opciones</th><tr>";
    foreach ($tablaTitulo as $dato){
        echo "<tr><td>".$dato[1]."</td>";
        echo "<td>".$dato[2]."</td> ";
        echo "<td>".$dato[3]."</td>";
		echo "<td>".$dato[4]." </td>";
        echo "<td><a href='index.php?accion=borrarTitulo&id=".$dato['alumnoid']."&titulo=".$dato['tituloid']."'>Borrar</a>";
        echo "</td></tr>";
    }
    echo "</table>";
?>