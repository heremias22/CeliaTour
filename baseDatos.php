<?php

include_once("conexiondb.php");

if(isset($_POST['idnombre'])){
  $idnombre = $_POST['idnombre'];
} else {
  $idnombre = 0;
}


$sql="SELECT datos.titulo,
datos.imagen,
datos.imagen2,
datos.imagen3,
datos.desLarga
FROM datos WHERE datos.id='$idnombre'";

$result=mysqli_query($conn,$sql);
$contenido=array();
while($row=mysqli_fetch_array($result)){
      $titulo=$row['titulo'];
      $imagen=$row['imagen'];
      $imagen2=$row['imagen2'];
      $imagen3=$row['imagen3'];
      $desLarga=$row['desLarga'];
      $contenido = array($titulo,$imagen,$imagen2,$imagen3,$desLarga);
   }
     echo json_encode($contenido);
?>
