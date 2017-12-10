<div id="divRegistro">
  <div id="textoRegistro">
    <span><p>Tras presentar su solicitud de acceso un administrador comprobara que obtuviste el titulo en este centro, se te notificara mediante correo y podras rellenar tu curriculum.</p></span>
    <?php
        if(isset($datos["mensaje"])){
            echo "<span style='color: red;'><p>".$datos['mensaje']."</p></span>";
        }
    ?>
  </div>
  <div id="divRegistroInterior">
    <form id="formularioRegistro"  action="index.php" method="post">
      <table id="tablaRegistro">
        <tr>
          <td><span>Nombre:</span></td>
          <td><input type="text" maxlength="100" name="nombreal" required></td>
          <td><span>Apellidos:</span></td>
          <td><input type="text" maxlength="100" name="apellido" required></td>
        </tr>
        <tr>
          <td><span>DNI:</span></td>
          <td><input type="text" maxlength="9" name="dni" required></td>
          <td><span>Contraseña:</span></td>
          <td><input type="password" name="passal" id="contrasena1" required></td>
            
        </tr>
        <tr>
          <td><span>Telefono:</span></td>
          <td><input type="text" name="telefono" required></td>
          <td></td>
          <td><input type="password" id="contrasena2" required placeholder="Confirmar contraseña."></td>
        </tr>
        <tr>
          <td><span>Provincia:</span></td>
          <td><input type="text" name="provincia" maxlength="100" required></td>
          <td><span>Email:</span></td>
          <td><input type="email" name="correo" maxlength="100" required></td>
        </tr>
        <tr>
          <td><span>Dirección</span></td>
          <td><input type="text" name="direccion" maxlength="100" required></td>
          <td><span>Localidad:</span></td>
          <td><input type="text" name="localidad" maxlength="100" required></td>
        </tr>
        <tr>
          <td class="centrado"><input type="hidden" name="accion" value="registroUsuario"><input class="botonSubmit" type="submit" value="Enviar"></td>
          <td></td>
          <td><span>Activo:</span></td>
          <td><span>Si </span><input type="radio" name="activo" value="1"> <span>No </span><input type="radio" name="activo" value="0" checked></td>
        </tr>
        <tr>
          <td class="centrado"><a class="enlaces" id="registroVolverAtras" href="index.php?accion=mostrarLogin"><span>Volver atras</span></a></td>
        </tr>

      </table>


    </form>
     
      <script>
          $("#formularioRegistro").submit(function() {
                var c1 = document.getElementById("contrasena1").value;
                var c2 = document.getElementById("contrasena2").value;
                var espacios = false;
                var cont = 0;

                while (!espacios && (cont < c1.length)) {
                  if (c1.charAt(cont) == " ")
                    espacios = true;
                    cont++;
                }

                if (espacios) {
                  alert ("La contraseña no puede contener espacios en blanco");
                  return false;
                }else if (c1.length == 0 || c2.length == 0) {
                    alert("Los campos de la password no pueden quedar vacios");
                    return false;
                } else if (c1 != c2) {
                    alert("Las passwords deben de coincidir");
                    return false;
                } else {
                    return true; 
                }
          }
         );  
      </script>

  </div>
</div>
