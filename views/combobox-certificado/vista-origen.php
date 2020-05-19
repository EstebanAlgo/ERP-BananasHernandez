 <?php 
     require('../../php/conexion.php');

	                     $statement=$conexion->prepare('SELECT *FROM origen ORDER BY nombre_finca ASC');
                         $statement->execute();
                         $lista_origen="<option value='null'>Seleccione una finca</option>";
                         $fincas=$statement->fetchAll();
                         foreach ($fincas as $fila) {
                         	$lista_origen.='<option value='.$fila['id_origen'].'>'.$fila['nombre_finca'].'</option>';
                         }

                         echo  $lista_origen;

	  ?>