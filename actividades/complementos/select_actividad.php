<?php 
require("../../php/conexion.php");
$opciones="";
$actividad=0;

if ($_POST) {
	$id=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM actividad WHERE id_actividad='$id'");
      $statement->execute();
      $origenes=$statement->fetchAll();
      foreach ($origenes as $filas) {
          $nombre=$filas['nombre'];
          $id=$filas['id_actividad'];
          $opciones.="<option selected='true' value='$id' >$nombre</option>";
          
          
      }
      $statement=$conexion->prepare("SELECT * FROM actividad ORDER BY nombre ASC");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre=$filas['nombre'];
          $id=$filas['id_actividad'];
          $opciones.="<option value='$id'>$nombre</option>";
          
      }
}
//echo "<script>alert('$id')</script>";
echo $opciones;
$tipos="";


 ?>