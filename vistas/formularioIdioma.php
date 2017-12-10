<?php 
    
?>

<form  action="index.php" method="post" >
   <select name="nombreid">
            <option value="ingles">Inglés</option> 
            <option value="frances">Francés</option> 
            <option value="italiano">Italiano</option>
            <option value="aleman">Alemán</option> 
            <option value="arabe">Arabe</option> 
            <option value="ruso">Ruso</option> 
        </select>
        <select name="nombreni">
           <option value="a1">A1</option> 
           <option value="a2">A2</option> 
           <option value="b1">B1</option> 
           <option value="b2">B2</option>
           <option value="c1">C1</option> 
           <option value="c2">C2</option> 
        </select>
      <input type="hidden" name="accion" value="insertarIdioma">
    <input type="submit" value="Insertar Idioma">
</form>
