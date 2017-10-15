<?php

include_once("conexiondb.php");

if(isset($_POST['idnombre'])){
  $idnombre = $_POST['idnombre'];
} else {
  $idnombre = 0;
}


$sql="SELECT datos.titulo,
datos.imagen,
datos.desBreve,
datos.desLarga
FROM datos WHERE datos.id='$idnombre'";

$result=mysqli_query($conn,$sql);
$contenido=array();
while($row=mysqli_fetch_array($result)){
      $titulo=$row['titulo'];
      $imagen=$row['imagen'];
      $desBreve=$row['desBreve'];
      $desLarga=$row['desLarga'];
      $contenido = array($titulo,$imagen,$desBreve,$desLarga);
   }
     echo json_encode($contenido);
?>
