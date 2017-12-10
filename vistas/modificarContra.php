<form id="formularioRegistro" method="post">
	<input type="hidden" name="accion" value="cambiarContra">
	Escriba su contraseña <input type="password" id="contrasena1"  name="contra"> Escribala otra vez <input type="password" id="contrasena2" required>
	<input type="submit" name="Cambiar">
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