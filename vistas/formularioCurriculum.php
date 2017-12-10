<?php 
    
?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function(){
       $('#nuevoTit').click(function(){
          alert($('.titulacion').length); 
       });
    });
</script>

<h3>Tu registro ha sido aceptado, por favor introduce la información que creas oportuna.</h3>
<form method="post">
    <fieldset class="titulacion">
        <h2>Titulación oficial</h2>
        Titulo: <input type="text" name="nombreti"> Centro<input type="text" name="centro"> Fecha fin:<input type="date" name="fechafin"> Tipo: <select name="tipo">
        <option>Grado universitario</option>
        <option>C.F.G.S.</option>
        <option>C.F.G.M.</option>
        <option>Bachillerato</option>
        </select><br>
        <input type="button" id="nuevoTit" value="Añadir titulo">
    </fieldset>
    <fieldset>
        <h2>Habilidades</h2>
        Habilidad: <input type="text" name="nombreha"><br>
        Descripción: <textarea name="descripcion" rows="5" cols="50">Describe tu habilidad/conocimiento (como la conseguiste, como de bueno eres en ello...)</textarea><br>
        <input type="button" id="nuevaHab" value="Añadir habilidad">
    </fieldset>
    <fieldset>
        <h2>Idiomas</h2>
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
        <input type="button" id="nuevoIdi" value="Añadir idioma">
    </fieldset>
    <fieldset>
    <h2>Otros</h2>
    Carné de conducir <input type="checkbox" name="conducir">  <br>
    Incorporación inmediata <input type="checkbox" name="incorporacion"><br>
    vehiculo propio<input type="checkbox" name="vehiculo"><br>
    Flexibilidad horaria<input type="checkbox" name="flexibilidad"><br>
    Disponibilidad geografica <input type="checkbox" name="geografica"><br>
    </fieldset>
</form>

