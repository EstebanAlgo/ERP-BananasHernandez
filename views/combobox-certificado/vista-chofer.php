 <?php 
     require('../../php/conexion.php');

	                     $statement=$conexion->prepare('SELECT * FROM conductor ORDER BY nombre ASC');
                         $statement->execute();
                         $lista_choferes="";
                         $choferes=$statement->fetchAll();
                         foreach ($choferes as $fila) {
                         $nombre_conductor=$fila['nombre'];
                         $id_conductor=$fila['id_conductor'];
                         $lista_choferes.= "<option value='$id_conductor'>$nombre_conductor</option>";
                         }

                         echo  $lista_choferes;

	  ?>