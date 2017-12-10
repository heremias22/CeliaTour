<?php

		include_once "bd.php";

    class Usuarios{
        public static function comprobarUsuario(){
            $dni = $_REQUEST["dni"];

            $bd = new BD();
            $sql = "SELECT * FROM alumno WHERE dni='$dni'";
            $resultado = $bd->consultar($sql);


            if(count($resultado) > 0){
              return true;
            }else{
              return false;
            }
        }

        public static function crearUsuario(){
            $dni = $_REQUEST["dni"];
            $nombreal = $_REQUEST["nombreal"];
            $apellido = $_REQUEST["apellido"];
            $passal = $_REQUEST["passal"];
            $telefono = $_REQUEST["telefono"];
            $correo = $_REQUEST["correo"];
            $provincia = $_REQUEST["provincia"];
            $localidad = $_REQUEST["localidad"];
            $direccion = $_REQUEST["direccion"];
            $activo = $_REQUEST["activo"];

            $bd = new BD();
            $sql = "INSERT INTO alumno(dni,nombreal,apellido,telefono,correo,direccion,localidad,provincia,activo,passal, validado) VALUES ('$dni','$nombreal','$apellido','$telefono','$correo','$direccion','$localidad','$provincia','$activo',MD5('$passal'), 0)";

            if ($bd->ejecutar($sql) == 1)
				$r = true;
			else
				$r =  false;

            $msj="Un usuario ha solicitado un registro, cuanto antes lo aceptes antes podra completar su curriculum";
            $titulo="Nuevo solicitud de usuario";
            $para="frankiemlg@gmail.com";
			Usuarios::mensajeCorreo($msj,$titulo,$para);
            return $r;
        }

        public static function logueoAdmin($dni, $contra){
            $bd= new BD();
            // primero comprobamos que si es un administrador
            $sql= "SELECT * FROM admin WHERE username='$dni' AND passad='$contra'";
            //echo $sql;
            $resultado = $bd->consultar($sql);
            if(count($resultado) > 0){
                $_SESSION['tipo']="admin";
                return true;
            }else{
                return false;
            }
        }

	public static function logueoUser($dni, $contra){
            $bd= new BD();
            // primero comprobamos que si es un administrador
            $sql= "SELECT * FROM alumno WHERE dni='$dni' AND passal=MD5('$contra') ";
            //echo $sql;
            $resultado = $bd->consultar($sql);

            if(count($resultado) > 0){

                $sql = "SELECT validado FROM alumno WHERE dni='$dni'";
                $resultado = $bd->consultar($sql);
                $resultado=$resultado[0];
                if($resultado['validado']==0){
                    return false;

                }else{
                    $sql = "SELECT alumnoid FROM alumno WHERE dni='$dni' ";
                    $resultado = $bd->consultar($sql);

                    $resultado = $resultado["0"];
                    $_SESSION['id']=$resultado["0"];
                    return true;
                }

            }else{
                return false;
            }
        }
        
        public static function usuariosParo(){
                $bd = new BD();

                $sql = "SELECT * FROM alumno WHERE activo=0 and validado=1 ORDER BY puntuacion desc";
                $tabla["alumnos"]= $bd->consultar($sql);

                return $tabla;
        }
        public static function usuariosTrabajando(){
                $bd = new BD();

                $sql = "SELECT * FROM alumno WHERE activo=1 and validado=1 ORDER BY puntuacion desc";
                $tabla["alumnos"]= $bd->consultar($sql);

                return $tabla;
        }
        public static function usuariosSinValidar(){
            $bd = new BD();

                $sql = "SELECT * FROM alumno WHERE validado=0 order by alumnoid";
                $tabla["alumnos"]= $bd->consultar($sql);

                return $tabla;
        }

        public static function validarUsuario(){
            $bd = new BD();
            $id=$_REQUEST["id"];
            $puntuacion = $_REQUEST["puntuacion"];
            $sql = "UPDATE alumno SET validado='1', puntuacion='$puntuacion' WHERE alumnoid='$id'";
            $bd->ejecutar($sql);
            $msj="un administrador ha validado tu registro ya puedes acceder para completar tu información";
            $titulo="Registro aceptado";
            Usuarios::mensajeId($msj,$titulo,$id);


           
        }

        public static function borrarUsuario(){
            $bd = new BD();
            $id=$_REQUEST["id"];
            $sql = "DELETE FROM alumno WHERE alumnoid=$id";
            $bd->ejecutar($sql);
            $sql = "DELETE FROM habilidad WHERE alumnoid=$id";
            $bd->ejecutar($sql);
            $sql = "DELETE FROM idiomaalumno WHERE alumnoid=$id";
            $bd->ejecutar($sql);
            $sql = "DELETE FROM otrosalumno WHERE alumnoid=$id";
            $bd->ejecutar($sql);
            $sql = "DELETE FROM titulo WHERE alumnoid=$id";
            $bd->ejecutar($sql);

        }
        public static function busqueda(){

            $bd = new BD();
            $busqueda=$_REQUEST["buscar"];

            $sql = "SELECT DISTINCT alumno.alumnoid, alumno.nombreal, alumno.apellido, alumno.telefono, alumno.correo, alumno.puntuacion FROM "
						 ."alumno LEFT JOIN habilidad ON alumno.alumnoid=habilidad.alumnoid "
						 ."LEFT JOIN titulo ON alumno.alumnoid=titulo.alumnoid "
						 ."LEFT JOIN idiomaalumno ON alumno.alumnoid=idiomaalumno.alumnoid "
						 ."LEFT JOIN idioma ON idiomaalumno.idiomaid=idioma.idiomaid "
						 ."LEFT JOIN nivel ON idiomaalumno.nivelid=nivel.nivelid "
                         ."LEFT JOIN otrosalumno ON alumno.alumnoid=otrosalumno.alumnoid "
						 ."WHERE alumno.activo='0' "
                         ."AND (alumno.nombreal LIKE '%$busqueda%' "
						 ."OR alumno.apellido LIKE '%$busqueda%' "
						 ."OR alumno.provincia LIKE '%$busqueda%' "
						 ."OR alumno.localidad LIKE '%$busqueda%' "
						 ."OR habilidad.nombreha LIKE '%$busqueda%' "
						 ."OR habilidad.descripcion LIKE '%$busqueda%' "
						 ."OR titulo.nombreti LIKE '%$busqueda%' "
						 ."OR titulo.centro LIKE '%$busqueda%') ";
						
            $tabla=$bd->consultar($sql);
            return $tabla;
        }
		public static function infoUsuario($id){
            $bd = new BD();

            $sql = "SELECT * FROM alumno WHERE alumnoid='$id'";

            $resultado = $bd->consultar($sql);

            return $resultado;
        }
        public static function modificarInfoUsuario(){
            $bd = new BD();
			if(isset($_REQUEST["puntuacion"])){
				$sql = "UPDATE alumno SET nombreal='".$_REQUEST['nombreal']."',"
                    . "apellido='".$_REQUEST['apellido']."',"
                    . "telefono='".$_REQUEST['telefono']."',"
                    . "correo='".$_REQUEST['correo']."',"
                    . "direccion='".$_REQUEST['direccion']."',"
                    . "localidad='".$_REQUEST['localidad']."',"
                    . "provincia='".$_REQUEST['provincia']."',"
                    . "dni='".$_REQUEST['dni']."',"
                    . "activo='".$_REQUEST['activo']."', "
                    . "puntuacion='".$_REQUEST['puntuacion']."'"
                    . "WHERE alumnoid='".$_REQUEST['id']."'";
			}else{
				$sql = "UPDATE alumno SET nombreal='".$_REQUEST['nombreal']."',"
                    . "apellido='".$_REQUEST['apellido']."',"
                    . "telefono='".$_REQUEST['telefono']."',"
                    . "correo='".$_REQUEST['correo']."',"
                    . "direccion='".$_REQUEST['direccion']."',"
                    . "localidad='".$_REQUEST['localidad']."',"
                    . "provincia='".$_REQUEST['provincia']."',"
                    . "dni='".$_REQUEST['dni']."',"
                    . "activo='".$_REQUEST['activo']."'"
                    . "WHERE alumnoid='".$_REQUEST['id']."'";
			}
            $bd->ejecutar($sql);
        }
        
       
        public static function insertarImagen(){
            //var_dump($_FILES['imagen']);
            //$documento = $_FILES['imagen'];
            
            echo $_SESSION['id'];
            
            $nombre_imagen=$_FILES['imagen']['name'];
            $tipo_imagen=$_FILES['imagen']['type'];
            $tamano_imagen=$_FILES['imagen']['size'];
            
            if (($nombre_imagen == !NULL) && ($_FILES['imagen']['size'] <= 1500000)){
                if (($_FILES["imagen"]["type"] == "image/jpeg")
               || ($_FILES["imagen"]["type"] == "image/jpg"))
               {
            $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/curriculum-master/imagenes/';
   
            move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$_SESSION['id'].".jpg");
                    
              }else{
                   //si no cumple con el formato
                   echo "Solo puedes imagenes con formato jpg";
                }
            }else{
               //si existe la variable pero se pasa del tamaño permitido
               if($nombre_imagen == !NULL) 
                   echo "La imagen es demasiado grande"; 
            }       
           
        }
        public static function cambiarContra($contra){
            $bd = new BD();

            $sql = "UPDATE alumno SET passal=MD5('$contra') WHERE alumnoid='".$_SESSION["id"]."'";

            $resultado=$bd->ejecutar($sql);

            return $resultado;
        }
        public static function mensajeCorreo($msj,$titulo,$correo){
            $bd = new BD();
            $para=$correo; 
                        
            $mensaje = '
                        <html>
                        <head>
                          <title></title>
                        </head>
                        <body>
                          <p>'.$msj.'</p>
                        </body>
                        </html>
                        ';
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $cabeceras .= 'From: I.E.S Celia Viñas <iesceliaciclos.org>' . "\r\n";

            
    
            mail($para, $titulo, $mensaje, $cabeceras);
        }
        public static function mensajeId($msj,$titulo,$id){
            $bd = new BD();
            
            
                $sql = "SELECT correo FROM alumno WHERE alumnoid='$id'";

                $resultado = $bd->consultar($sql);
                $resultado= $resultado[0];
                $resultado= $resultado["correo"];
                $para=$resultado; 
            
            

            
            $titulo = 'Mensaje automatico de I.E.S. Celia viñas';
            $mensaje = '
                        <html>
                        <head>
                          <title></title>
                        </head>
                        <body>
                          <p>'.$msj.'</p>
                          <a href="iesceliaciclos.org/curriculum">Ir a la web</a>
                        </body>
                        </html>
                        ';
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $cabeceras .= 'From: I.E.S Celia Viñas <iesceliaciclos.org>' . "\r\n";

            
    
            $resultado=mail($para, $titulo, $mensaje, $cabeceras);
        }
        public static function mensajeRecuperacion($msj, $correo){
            $bd = new BD();
            $para=$correo;
            $titulo = 'Contraseña Olvidada I.E.S. Celia Viñas';
            $mensaje = '
                        <html>
                        <head>
                          <title>$msj</title>
                        </head>
                        <body>
                          <p>'.$msj.'</p>
                          <a href="iesceliaciclos.org/curriculum">Ir a la web</a>
                        </body>
                        </html>
                        ';
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $cabeceras .= 'From: I.E.S Celia Viñas <celiacurriculums@gmail.com>' . "\r\n";

            
    
            mail($para, $titulo, $mensaje, $cabeceras);

        }
        public static function recuperarContra($correo){

            $bd = new BD();

            $contra=Usuarios::contraRandom();

            $sql= " UPDATE alumno SET passal = '".$contra['encriptada']."' WHERE correo = '$correo'";

            $bd->ejecutar($sql);

            $sql = "SELECT passal FROM alumno WHERE correo='$correo'";

            $resultado=$bd->consultar($sql);
            $resultado=$resultado[0];
            $resultado=$resultado[0];

            $msj="Se ha cambiado su contraseña la nueva es:'".$contra['contra']."'. Le recomendamos que cambie la contraseña lo antes posible.";
            Usuarios::mensajeRecuperacion($msj,$correo);

        }
        public static function contraRandom(){
            $nuevaContra="";
            $cadena ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            for($i = 0 ; $i <= 10 ; $i++ ){
                $aleatorio=rand(0,62);
                $nuevaContra.=$cadena[$aleatorio];
            }
            $datos["encriptada"]=MD5($nuevaContra);
            $datos["contra"]=$nuevaContra;            
            return $datos; 
        } 
        
    }
