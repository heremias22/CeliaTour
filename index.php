<?php
    include("vistas.php");
    include("usuarios.php");
    include("titulos.php");
    include("habilidades.php");
    include("idiomas.php");
    include("otros.php");
    session_start();

    if(isset($_REQUEST["accion"]))
        $accion = $_REQUEST["accion"];
    else
        $accion="mostrarLogin";

    switch($accion){
        case 'mostrarLogin':
			//ensaje("hola","franlg.alm@gmail.com");
            if(isset($_SESSION['tipo'])){
                $datos["tipo"]="normal";
                $datos["usuarios"]=Usuarios::usuariosParo();
                Vistas::mostrar("vistaAdministrador",$datos);
            }else if(isset ($_SESSION["id"])){
                mainUsuario();
            }else{
                Vistas::mostrar("login");
            }

            break;

        // Para reconocer que tipo de usuario se loguea
        case 'comprobarLogin':
            $resultado= Usuarios::logueoAdmin($_REQUEST["user"], $_REQUEST["pass"]);
           
            if($resultado){
                $datos["tipo"]="normal";
                $datos["usuarios"]=Usuarios::usuariosParo();
                Vistas::mostrar("vistaAdministrador",$datos);
            }else{
		$resultado= Usuarios::logueoUser($_REQUEST["user"], $_REQUEST["pass"]);
                if($resultado){
                   	mainUsuario();
		}else{
					
                    $datos["tipoMensaje"]="error";
                    $datos["mensaje"]="El usuario no existe o esta a la espera de que un admin lo apruebe";
                    Vistas::mostrar("login",$datos);
		}
            }
            break;

        case 'modificarUsuario':
            if($_SESSION['tipo']=="admin"){
                $_SESSION['id']=$_REQUEST['id'];
                mainUsuarioAdmin($_SESSION['id']);
            }else{
                echo "No tienes permisos para entrar aqui";
            }

            break;

        case 'registro':
            Vistas::mostrar("formularioRegistro");
            break;

        case 'registroUsuario':
            if(Usuarios::comprobarUsuario()){
                $datos["tipoMensaje"]="error";
                $datos["mensaje"]="El usuario ya existe o esta a la espera de que un admin lo apruebe";
                Vistas::mostrar("formularioRegistro",$datos);
            }else{
                $r = Usuarios::crearUsuario();
                if ($r){
			$datos["mensaje"]="Usuario creado con exito, en los proximos dias un admin revisara su solicitud, sera informado en el email proporcionado";
			$datos["tipoMensaje"]="correcto";
        
                    }else{
			$datos["tipoMensaje"]="error";
			$datos["mensaje"]="Error al crear usuario";
			}
                Vistas::mostrar("login",$datos);
            }
        break;
            
        case "seleccionarImagen":
            Vistas::mostrar("formularioImagen");
        break;
            
        case "insertarImagen":
            Usuarios::insertarImagen();
        break;

        case "insertarTitulo":
            if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
                $resultado= Titulos::crearTitulo($_SESSION['id']);
                            if($resultado){
                                    $msj = "Se ha insertado el título correctamente";
                }else{
                    $msj = "se ha insertado el titulo incorrectamente";
                }
                            mainUsuario($msj);
            }else{
                echo "No tiene permisos para acceder a esta zona.";
            }
        break;

        case "insertarHabilidad":
            if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
                $resultado= Habilidades::crearHabilidad($_SESSION['id']);
                if($resultado){
                    $msj = "Se ha insertado el habilidad correctamente";
                }else{
                    $msj = "se ha insertado el habilidad incorrectamente";
                }
                    mainUsuario($msj);
            }else{
                 echo "No tiene permisos para acceder a esta zona.";
             }
        break;

        case "insertarIdioma":
            if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
                $resultado= Idiomas::crearIdioma($_SESSION['id']);
                if($resultado){
                    $msj = "Se ha insertado el idioma correctamente";
                }else{
                    $msj = "se ha insertado el idioma incorrectamente";
                }
                mainUsuario($msj);
            }else{
                echo "No tiene permisos para acceder a esta zona.";
            }
        break;

        case "insertarOtros":
            if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
                $resultado= Otros::modificarOtros($_SESSION['id']);
                if($resultado){
                    $msj = "Otros modificado con exito";
                }
                    mainUsuario($msj);
            }else{
                echo "No tiene permisos para acceder a esta zona.";
            }
        break;
        case "borrarUsuario":
                if($_SESSION['tipo']=="admin"){
                    Usuarios::borrarUsuario();
                    $datos["usuarios"]=Usuarios::usuariosParo();
                    $datos["tipo"]="normal";
                    Vistas::mostrar("vistaAdministrador",$datos);
                }else{
                    echo "No tiene permisos para realizar esta acción.";
                }

        break;
        case "borrarTitulo":
            if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
            Titulos::borrarTitulo($_REQUEST["id"], $_REQUEST["titulo"]);
            $msj="holi";
            mainUsuario($msj);
            }else{
                 echo "No tiene permisos para acceder a esta zona.";
             }
            break;

         case "borrarHabilidad":
             if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
            Habilidades::borrarHabilidad($_REQUEST["id"], $_REQUEST["habilidad"]);
            $msj="holi";
            mainUsuario($msj);
            }else{
                 echo "No tiene permisos para acceder a esta zona.";
             }
            break;

         case "borrarIdioma":
             if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
            Idiomas::borrarIdioma($_REQUEST["id"], $_REQUEST["idioma"]);
            $msj="holi";
            mainUsuario($msj);
             }else{
                 echo "No tiene permisos para acceder a esta zona.";
             }
            break;

        case "vistaAdmin":
            if($_SESSION['tipo']=="admin"){
                $datos["tipo"]="normal";
                $datos["usuarios"]=Usuarios::usuariosParo();
                Vistas::mostrar("vistaAdministrador",$datos);
            }else{
                echo "No tiene permisos para acceder a esta zona.";
            }

            break;
        case "vistaAdmin2":
            if($_SESSION["tipo"]="admin"){
                $datos["tipo"]="trabajando";
                $datos["usuarios"]=Usuarios::usuariosTrabajando();
                Vistas::mostrar("vistaAdministrador",$datos);
            }else{
                echo "No tiene permisos para acceder a esta zona";
            }
            break;

        case "busqueda":
            if($_SESSION['tipo']=="admin"){
                $datos["usuarios"]=Usuarios::busqueda();
                $datos["tipo"]="busqueda";
                Vistas::mostrar("vistaAdministrador", $datos);
            }else{
                echo "No tiene permisos para realizar esta acción";
            }
            break;
        case "validarUsuarios":
            if($_SESSION['tipo']=="admin"){
                $datos["tipo"]="validar";
                $datos["usuarios"]=Usuarios::usuariosSinValidar();
                Vistas::mostrar("vistaAdministrador",$datos);
            }else{
                echo "No tienes permisos para realizar esta acción";
            }
            break;
        case "aceptarUsuario":
            if($_SESSION['tipo']=="admin"){
                Otros::crearOtros($_REQUEST['id']);
                Usuarios::validarUsuario();
                $datos["tipo"]="validar";
                $datos["usuarios"]=Usuarios::usuariosSinValidar();
                $idalumno= Vistas::mostrar("vistaAdministrador",$datos);
            }else{
                echo "No tienes permisos para realizar esta accion";
            }
            break;
        case "modificarInfoPersonal":
            if(isset($_SESSION['tipo']) || isset($_SESSION['id'])){
                $tabla=Usuarios::infoUsuario($_SESSION['id']);
                Vistas::mostrar("modificarInfoPersonal", $tabla);
            }else{
                echo "No tienes permiso o no estas logueado";
            }
            break;
        case "cambiarInfo":
            if($_SESSION['tipo']=="admin" || isset($_SESSION['id'])){
                Usuarios::modificarInfoUsuario();
                mainUsuario();
            }else{
                echo "No tienes permiso o no estas logueado.";
            }
            break;
        case "desconectar":

                $_SESSION["tipo"]=NULL;
                $_SESSION["id"]=NULL;
                Vistas::mostrar("login");

            break;
        case "cambioContra":
            if(isset($_SESSION["tipo"]) || isset($_SESSION["id"])){
                Vistas::mostrar("modificarContra");
            }else{
                echo "No tienes permisos o no estas logueado.";
            }
            break;
        case "cambiarContra":
            if(isset($_SESSION["tipo"]) || isset($_SESSION["id"])){
                if(Usuarios::cambiarContra($_REQUEST["contra"])==1){
                    echo "Cambio de contraseña correcto";
                    mainUsuario();
                }else{
                    echo "Error en el cambio de contraseña";
                    mainUsuario();
                }
            }else{
                echo "No tienes permisos o no estas logueado.";
            }
            break;
        case "recuperarContra":
            Vistas::mostrar("recuperarContra");
            break;
        case "recuperarContra2":
                Usuarios::recuperarContra($_REQUEST["correo"]);
                $datos["mensaje"]="Se ha enviado un mensaje a su cuenta de email con la contraseña.";
                $datos["tipoMensaje"]="correcto";
                Vistas::mostrar("login",$datos);
            break;
        default:
            echo "Error 404, La página solicitada no ha sido encontrada.";
    }



function mainUsuario($msj = null) {
        $tabla["tablaInfo"]=Usuarios::infoUsuario($_SESSION["id"]);
		$tabla["tablaTitulo"]= Titulos::getTitulo($_SESSION['id']);
		$tabla["tablaHabilidad"] = Habilidades::getHabilidad($_SESSION['id']);
		$tabla["mensaje"] = $msj;
		$tabla["tablaIdioma"]=Idiomas::getIdioma($_SESSION['id']);
        $tabla["tablaOtro"] = Otros::getOtros($_SESSION['id']);
	Vistas::mostrar("mostrarInfoPersonal,mostrarTitulo,formularioTitulo,mostrarHabilidad,formularioHabilidad,mostrarIdioma,formularioIdioma,formularioOtro", $tabla);
}

function mainUsuarioAdmin($id) {
        $tabla["tablaInfo"]=Usuarios::infoUsuario($id);
		$tabla["tablaTitulo"]= Titulos::getTitulo($id);
		$tabla["tablaHabilidad"] = Habilidades::getHabilidad($id);
		$tabla["tablaIdioma"]=Idiomas::getIdioma($id);
        $tabla["tablaOtro"] = Otros::getOtros($id);
		Vistas::mostrar("mostrarInfoPersonal,mostrarTitulo,formularioTitulo,mostrarHabilidad,formularioHabilidad,mostrarIdioma,formularioIdioma,formularioOtro", $tabla);
}

/*function mensaje($msj, $email){
    $para =$email;
    $titulo = 'Titulo de prueba';
    $mensaje = '
                <html>
                <head>
                  <title>Lameme los huevos Miguel Ángel</title>
                </head>
                <body>
                  <p>'.$msj.'</p>
                </body>
                </html>
                ';
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'From: I.E.S Celia Viñas <celiacurriculums@gmail.com>' . "\r\n";

 
    
  $resultado=mail($para, $titulo, $mensaje, $cabeceras);
  var_dump($resultado);
}*/

?>
