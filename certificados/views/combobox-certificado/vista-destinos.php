 <?php 
     require('../../php/conexion.php');

	                     $statement=$conexion->prepare('SELECT *FROM destinos');
                         $statement->execute();
                         $lista_destinos="";
                         $destinos=$statement->fetchAll();
                         foreach ($destinos as $fila) {
                         	$lista_destinos.='<option value='.$fila['id_destino'].'>'.$fila['destino'].'</option>';
                         }

                         echo  $lista_destinos;

	  ?>