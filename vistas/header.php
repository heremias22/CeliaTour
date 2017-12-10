<html>
	<head>
		<meta charset="utf8">
		<title>Practica php</title>
		<link rel="stylesheet" type="text/css" href="vistas/css/css.css">
		<script type="text/javascript" src="vistas/jquery.js"></script>
	</head>
	<body>
        <?php
            if(isset($_SESSION['tipo']) || isset($_SESSION['id'])){
                echo "<div id='barraSuperior'><div class='divDesconectar'><a class='botonesMenu' id='botonDesconectar' href='index.php?accion=desconectar'><span>Desconectar</span></a></div>";
			}
        ?>
