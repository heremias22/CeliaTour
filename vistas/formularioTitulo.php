<?php 
    
?>

<form  action="index.php" method="post" >
    Titulo: <input type="text" name="nombreti" required> Centro<input type="text" name="centro" required> Fecha fin:<input type="date" name="fechafin" required> Tipo: <select name="tipo">
        <option>Grado universitario</option>
        <option>C.F.G.S.</option>
        <option>C.F.G.M.</option>
        <option>Bachillerato</option>
        </select>
    <input type="hidden" name="accion" value="insertarTitulo">
    <input type="submit" value="Insertar titulo"><br><br>
</form>