 <?php 
     require('../../php/conexion.php');

	                     $statement=$conexion->prepare('SELECT *FROM envases ORDER BY envase ASC');
                         $statement->execute();
                         $lista_envases="";
                         $envases=$statement->fetchAll();
                         foreach ($envases as $fila) {
                              $envase=$fila['envase'];
                         	$lista_envases.="<option value='$envase'>$envase</option>";
                         }

                         echo  $lista_envases;

	  ?>