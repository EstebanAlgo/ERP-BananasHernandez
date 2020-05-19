<?php 
require('../../php/conexion.php');
$vehiculo="";
                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM vehiculos WHERE id_vehiculo = '$id'");
                         $statement->execute();
                         $placa="";
                         $placas=$statement->fetchAll();
                         foreach ($placas as $fila) {
                              $placa=$fila['placas'];
                              $vehiculo=$fila['vehiculo'];
                         }

                         echo "<input class='input_pro' type='text' name='placas' placeholder='Placas y/o números' value='$placa' required>
                               <input type='hidden' name='vehiculo' value='$vehiculo' required>";
 ?>