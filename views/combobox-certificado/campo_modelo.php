<?php 
require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM vehiculos WHERE id_vehiculo = '$id'");
                         $statement->execute();
                         $modelo="";
                         $modelos=$statement->fetchAll();
                         foreach ($modelos as $fila) {
                              $modelo=$fila['modelo'];
                         }

                         echo "<input class='input_pro' type='text' name='modelo' placeholder='Modelo' value='$modelo' required>";
 ?>