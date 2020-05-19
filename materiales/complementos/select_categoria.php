<?php 
require("../../php/conexion.php");
$respuesta="";
$actividad=0;

if ($_POST) {
	$id=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM categoria WHERE id_actividad='$id'");
      $statement->execute();
      $arrays=$statement->fetchAll();
      foreach ($arrays as $filas) {
          $nombre_tipo=$filas['nombre'];
          $id_categoria=$filas['id_categoria'];
          $respuesta.="<option selected='true' value='$id_categoria' >$nombre_tipo</option>";
          
          
      }
      $statement=$conexion->prepare("SELECT * FROM categoria ORDER BY nombre ASC");
      $statement->execute();
      $arrays=$statement->fetchAll();
      foreach ($arrays as $filas) {
          $nombre_tipo=$filas['nombre'];
          $id_unidad=$filas['id_categoria'];
          $respuesta.="<option value='$id_unidad'>$nombre_tipo</option>";
          
      }
}

echo $respuesta;
$tipos="";


 ?>