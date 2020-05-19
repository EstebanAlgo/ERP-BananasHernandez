<?php 
require("../../php/conexion.php");
$actividades="";
$actividad=0;

if ($_POST) {
	$actividad=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM actividad WHERE id_actividad='$actividad'");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre_tipo=$filas['nombre'];
          $id_unidad=$filas['id_actividad'];
          $actividades.="<option selected='true' value='$id_unidad' >$nombre_tipo</option>";
          
          
      }
      $statement=$conexion->prepare("SELECT * FROM actividad");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre_tipo=$filas['nombre'];
          $id_unidad=$filas['id_actividad'];
          $actividades.="<option value='$id_unidad'>$nombre_tipo</option>";
          
      }
}

echo $actividades;
$tipos="";


 ?>