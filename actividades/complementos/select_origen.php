<?php 
require("../../php/conexion.php");
$opciones="";
$actividad=0;

if ($_POST) {
	$id=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM origen WHERE id_origen='$id'");
      $statement->execute();
      $origenes=$statement->fetchAll();
      foreach ($origenes as $filas) {
          $nombre=$filas['nombre_finca'];
          $opciones.="<option selected='true' value='$id' >$nombre</option>";
          
          
      }
      $statement=$conexion->prepare("SELECT * FROM origen ORDER BY nombre_finca ASC");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre=$filas['nombre_finca'];
          $id=$filas['id_origen'];
          $opciones.="<option value='$id'>$nombre</option>";
          
      }
}

echo $opciones;
$tipos="";


 ?>