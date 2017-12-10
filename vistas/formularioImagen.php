<?php 
    
?>

<form  action="index.php" method="post" enctype="multipart/form-data">
   <label for="imagen"> Imagen</label>
    <input type="file" name="imagen" size="40">
      <input type="hidden" name="accion" value="insertarImagen">
    <input type="submit" value="Insertar Idioma">
</form>
