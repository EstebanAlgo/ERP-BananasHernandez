<?php 
require("../../php/conexion.php");
$opciones="";
$actividad=0;

if ($_POST) {
	$id=$_POST['id'];


      $statement=$conexion->prepare("SELECT * FROM empleado WHERE id_empleado='$id'");
      $statement->execute();
      $origenes=$statement->fetchAll();
      foreach ($origenes as $filas) {
          $nombre=$filas['nombre']." ".$filas['p_apellido']." ".$filas['s_apellido'];
          $id=$filas['id_empleado'];
          $opciones.="<option selected='true' value='$id' >$nombre</option>";
          
          
      }
      $statement=$conexion->prepare("SELECT * FROM empleado ORDER BY nombre ASC");
      $statement->execute();
      $tipos=$statement->fetchAll();
      foreach ($tipos as $filas) {
          $nombre=$filas['nombre']." ".$filas['p_apellido']." ".$filas['s_apellido'];
          $id=$filas['id_empleado'];
          $opciones.="<option value='$id'>$nombre</option>";
          
      }
}

echo $opciones;
$tipos="";


 ?>