 <?php 
     require('../../php/conexion.php');

	                     $statement=$conexion->prepare('SELECT * FROM vehiculos ORDER BY vehiculo ASC');
                         $statement->execute();
                         $lista_vehiculos="";
                         $vehiculos=$statement->fetchAll();
                         foreach ($vehiculos as $fila) {
                              $vehiculo=$fila['vehiculo'];
                              $id=$fila['id_vehiculo'];
                         	$lista_vehiculo.="<option value='$id'>$vehiculo</option>";
                         }

                         echo  $lista_vehiculo;

	  ?>