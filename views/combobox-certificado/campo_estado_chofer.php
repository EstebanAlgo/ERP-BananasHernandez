<?php 
require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM conductor WHERE id_conductor = '$id'");
                         $statement->execute();
                         $estado="";
                         $estados=$statement->fetchAll();
                         foreach ($estados as $fila) {
                              $estado=$fila['estado'];
                         }

                         echo "<input class='input_chofer' type='text' placeholder='Estado' name='estado_chofer' value='$estado' required>";
 ?>