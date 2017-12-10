
<div id="divLogin">
  <div id="divImagenLogin"></div>
  <form method="post">
    <table id="tablaLogin">
      <tbody>
      <tr>
        <td><span>Usuario:</span></td>
        <td><input type="text" maxlength="9" name="user" required></td>
      </tr>
      <input type="hidden" name="accion" value="comprobarLogin">
      <tr>
        <td><span>Contraseña: </span></td>
        <td><input type="password" name="pass" required></td>
      </tr>
      <tr>
          <td id="tdAlta" colspan="2"><input class="botonSubmit" type="submit" value="Entrar"></td>
      </tr>
      <tr>
        <td id="tdAlta"><a class="enlaces" href="index.php?accion=registro"><span>&#187Darse de alta</span></a></td>
        <td><a class="enlaces" href="index.php?accion=recuperarContra"><span>&#187Recuperar contraseña</span></a></td>
      </tr>
    </tbody>
  </table>
  </form>
  <?php
      if(isset($datos["mensaje"])){
        echo "<div id='mensajeLogin'";
        if($datos["tipoMensaje"]=="error"){
          echo "<div><span style='color:red;'>".$datos['mensaje']."</span></div>";
        }else if ($datos["tipoMensaje"]=="correcto"){
          echo "<div><span>".$datos['mensaje']."</span></div>";
        }
        echo "</echo>";
      }
    ?>
</div>
  

