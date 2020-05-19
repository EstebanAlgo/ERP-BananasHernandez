<?php 
require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM conductor WHERE id_conductor = '$id'");
                         $statement->execute();
                         $licencia="";
                         $licencias=$statement->fetchAll();
                         foreach ($licencias as $fila) {
                              $licencia=$fila['licencia'];
                         }

                         echo "<input class='input_chofer' type='text' placeholder='Número de licencia' name='no_licencia' value='$licencia' required>";
 ?>