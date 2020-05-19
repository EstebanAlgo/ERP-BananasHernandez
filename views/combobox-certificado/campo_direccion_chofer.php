<?php 
require('../../php/conexion.php');
                         $nombre_chofer="";
                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM conductor WHERE id_conductor = '$id'");
                         $statement->execute();
                         $direccion="";
                         $conductores=$statement->fetchAll();
                         foreach ($conductores as $fila) {
                              $direccion=$fila['direccion'];
                              $nombre_chofer=$fila['nombre'];
                         }

                         echo "<input class='input_chofer' type='text' placeholder='Dirección' name='direccion_chofer' value='$direccion' required>
                         <input type='hidden' value='$nombre_chofer' name='nombre_chofer'>";
 ?>