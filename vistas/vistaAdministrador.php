



<?php
$contador=2;
    $usuarios=$datos["usuarios"];
    if($datos["tipo"]=="validar"){
        echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=vistaAdmin2'><span>Vista ocupados</span></a></div>";
        echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=vistaAdmin'><span>Vista parados</span></a></div></div>";
        $comprobacion=$usuarios["alumnos"];
        if(empty($comprobacion)){
            ?>
                <div id="noUsuarios">
                    <span id="textoNoUsuarios">No hay solicitudes actualmente</span>
                </div>
            <?php
        }else{
        echo "<div id='todosUsuarios'>";
        echo "<table>";
        foreach($usuarios as $personas){
            foreach($personas as $persona){
                echo "<td><div class='usuario'><div style='width:120px; height:150px; display:inline-block; border: 1px solid black;'>Foto</div>";
                echo "<div class='info'><table class='tablaAdministración'><tr><td colspan='3'><span>".$persona['nombreal']."&nbsp;".$persona['apellido']."</span></td>";
                echo "<td><a id='declinarRegistro' href='index.php?accion=borrarUsuario&id=".$persona['alumnoid']."'><img src='vistas/css/declinar.svg' id='iconodeclinar'></a></td></tr>";
                echo "<tr><td><span>".$persona['correo']."</span></td>";
                echo "<td><span>".$persona['telefono']."</span></td>";
                echo "<tr><td><form action='index.php' method='post' style='margin-top:20px;'>"
                        . "<input type='number' name='puntuacion' required='required' min='0' max='10'>"
                        . "<input type='hidden' name='accion' value='aceptarUsuario'>"
                        . "<input type='hidden' name='id' value=".$persona['alumnoid']."></td>"
                        . "<td><input id='validarImagen' type='image' src='vistas/css/comprobado.svg'>"
                   . "</form></tr></table></div></div></td>";
                if($contador%2!=0){
                echo "</tr>";
                }

                $contador++;                
            }
        }
    }

    }else if($datos["tipo"]=="normal"){
    echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=vistaAdmin2'><span>Vista ocupados</span></a></div>";
?>
        <div class='divsMenu'><a class='botonesMenu' href='index.php?accion=validarUsuarios'><span>Vista Validación</span></a></div>
        <div id="divFormularioBusqueda" ><form class="formularioBusqueda" action='index.php' method="post">
          <input type='hidden' name='accion' value='busqueda' >
          <input type='text' name='buscar' required="required">
          <input type='image' name="imagen" src="vistas/css/lupa.svg" style="width:15px; height: 15px; border:none;">

        </form></div></div>
        
        <?php
        $comprobacion=$usuarios["alumnos"];
        if(empty($comprobacion)){
            ?>
                <div id="noUsuarios">
                    <span id="textoNoUsuarios">No hay usuarios en esta sección</span>
                </div>
            <?php
        }else{
        echo "<div id='todosUsuarios'>";
        echo "<table>";
        foreach($usuarios as $personas){
            foreach($personas as $persona){
                echo "<td><div class='usuario'><div style='width:120px; height:150px; display:inline-block; border: 1px solid black;'>Foto</div>";
                echo "<div class='info'><table class='tablaAdministración'><tr><td colspan='2'><span>".$persona['nombreal']."&nbsp;".$persona['apellido']."</span></td>";
                echo "<td><span>Puntuacion</span></td>";
                echo "<td><a id='borrarVAdmin' href='#' onclick='javascript:Delete(".$persona['alumnoid'].")'><img src='vistas/css/basura.svg' id='iconoBasura'></a></td></tr>";
                echo "<tr><td><span>".$persona['telefono']."</span></td>";
                echo "<td><span>".$persona['correo']."</span></td>";
                echo "<td align='center'><span> ".$persona['puntuacion']."</span></td>";
                echo "<td><a id='modificarVAdmin' href='index.php?accion=modificarUsuario&id=".$persona['alumnoid']."'><img src='vistas/css/contrato.svg' id='iconomodificar'></a></tr></table></div></div></td>";
                if($contador%2!=0){
                echo "</tr>";
                }

                $contador++;
                
            }
        }
        echo "</table>";
    echo "</div>";
}
    }else if($datos["tipo"]=="busqueda"){
        echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=validarUsuarios'><span>Vista Validación</span></a></div>";
        echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=vistaAdmin2'><span>Vista ocupados</span></a></div>";
        echo "<div id='divFormularioBusqueda'><form class='formularioBusqueda' action='index.php' method='post'>";
        echo "<input type='hidden' name='accion' value='busqueda' >";
        echo "<input type='text' name='buscar' required='required'> <input type='image' name='imagen' src='vistas/css/lupa.svg' style='width:15px; height: 15px; border:none;'>";
        echo "</form></div></div>";
        
        $comprobacion=$usuarios;
        if(empty($comprobacion)){
            ?>
                <div id="noUsuarios">
                    <span id="textoNoUsuarios">No hay nada.</span>
                </div>
            <?php
        }else{
        echo "<div id='todosUsuarios'>";
        echo "<table>";
        foreach($usuarios as $personas){
                echo "<td><div class='usuario'><div style='width:120px; height:150px; display:inline-block; border: 1px solid black;'>Foto</div>";
                echo "<div class='info'><table class='tablaAdministración'><tr><td colspan='2'><span>".$personas['nombreal']."&nbsp;".$personas['apellido']."</span></td>";
                echo "<td><span>Puntuacion</span></td>";
                echo "<td><a id='borrarVAdmin' href='#' onclick='javascript:Delete(".$personas['alumnoid'].")'><img src='vistas/css/basura.svg' id='iconoBasura'></a></td></tr>";
                echo "<tr><td><span>".$personas['telefono']."</span></td>";
                echo "<td><span>".$personas['correo']."</span></td>";
                echo "<td align='center'><span> ".$personas['puntuacion']."</span></td>";
                echo "<td><a id='modificarVAdmin' href='index.php?accion=modificarUsuario&id=".$personas['alumnoid']."'><img src='vistas/css/contrato.svg' id='iconomodificar'></a></tr></table></div></div></td>";
                if($contador%2!=0){
                echo "</tr>";
                }

                $contador++;
                
        }

        echo "</div>";
    }
    }else if($datos["tipo"]=="trabajando"){
        echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=validarUsuarios'><span>Vista Validación</span></a></div>";
        echo "<div class='divsMenu'><a class='botonesMenu' href='index.php?accion=vistaAdmin'><span>Vista parados</span></a></div></div>";
        $comprobacion=$usuarios["alumnos"];
        
        if(empty($comprobacion)){
            ?>
                <div id="noUsuarios">
                    <span id="textoNoUsuarios">No hay usuarios en esta sección</span>
                </div>
            <?php
        }else{
            echo "<div id='todosUsuarios'>";
            echo "<table>";
            foreach($usuarios as $personas){
                foreach($personas as $persona){
                    echo "<td><div class='usuario'><div style='width:120px; height:150px; display:inline-block; border: 1px solid black;'>Foto</div>";
                    echo "<div class='info'><table class='tablaAdministración'><tr><td colspan='2'><span>".$persona['nombreal']."&nbsp;".$persona['apellido']."</span></td>";
                    echo "<td><span>Puntuacion</span></td>";
                    echo "<td><a id='borrarVAdmin' href='#' onclick='javascript:Delete(".$persona['alumnoid'].")'><img src='vistas/css/basura.svg' id='iconoBasura'></a></td></tr>";
                    echo "<tr><td><span>".$persona['telefono']."</span></td>";
                    echo "<td><span>".$persona['correo']."</span></td>";
                    echo "<td align='center'><span> ".$persona['puntuacion']."</span></td>";
                    echo "<td><a id='modificarVAdmin' href='index.php?accion=modificarUsuario&id=".$persona['alumnoid']."'><img src='vistas/css/contrato.svg' id='iconomodificar'></a></tr></table></div></div></td>";
                    if($contador%2!=0){
                    echo "</tr>";
                    }

                    $contador++;
                    
                }
            }
            echo "</div>";    
        }
        
    }

?>
<script>
function Delete(id) {
     if (confirm('Estas seguro de Eliminar este registro?')){
        document.location='index.php?accion=borrarUsuario&id='+id+'';
        }
}
</script>

