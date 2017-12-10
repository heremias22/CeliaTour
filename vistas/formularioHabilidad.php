<?php 
    
?>

<form  action="index.php" method="post" >
    Habilidad: <input type="text" name="nombreha" required>
        Descripción: <textarea name="descripcion" rows="5" cols="50" required placeholder="escribe tu habilidad/conocimiento (como la conseguiste, como de bueno eres en ello...)"></textarea>
      <input type="hidden" name="accion" value="insertarHabilidad" >
    <input type="submit" value="Insertar Habilidad"><br>
</form>
