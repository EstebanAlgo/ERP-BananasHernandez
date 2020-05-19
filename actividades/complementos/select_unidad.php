<?php 
require("../../php/conexion.php");
$opciones="";
$actividad=0;

if ($_POST) {
	$id=$_POST['id'];
  $id_actividad=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
      $statement->execute();
      $origenes=$statement->fetchAll();
      foreach ($origenes as $filas) {
          $nombre=$filas['nombre'];
          $id=$filas['id_unidad'];
          $precio=$filas['coste'];
          $opciones.="<option selected='true' value='$id' >$nombre $$precio M.N.</option>";
          
          
      }
      $statement=$conexion->prepare("SELECT * FROM unidad WHERE id_actividad=$id_actividad ORDER BY nombre ASC");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre=$filas['nombre'];
          $id=$filas['id_unidad'];
          $precio=$filas['coste'];
          $opciones.="<option value='$id'>$nombre $$precio M.N.</option>";
          
      }
}

echo $opciones;
$tipos="";


 ?>