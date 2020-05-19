 <?php 
     require('../../php/conexion.php');

	                     $statement=$conexion->prepare('SELECT *FROM producto');
                         $statement->execute();
                         $lista_productos="";
                         $productos=$statement->fetchAll();
                         foreach ($productos as $fila) {
                              $producto=$fila['producto'];
                         	$lista_productos.="<option value='$producto'>$producto</option>";
                         }

                         echo  $lista_productos;

	  ?>