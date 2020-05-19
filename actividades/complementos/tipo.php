<?php 
require("../../php/conexion.php");
$tipos="";
$actividad=0;

if ($_POST) {
	$actividad=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM unidad WHERE id_actividad='$actividad'");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre_tipo=$filas['nombre'];
          $coste=$filas['coste'];
          $id_unidad=$filas['id_unidad'];
          $tipos.="<option value='$id_unidad'>$nombre_tipo $$coste M.N.</option>";
          
      }
}

echo $tipos;
$tipos="";


 ?>