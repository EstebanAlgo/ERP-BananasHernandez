 <?php 
     require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM `destinos` WHERE id_destino = '$id'");
                         $statement->execute();
                         $lista_destino="";
                         $destinos=$statement->fetchAll();
                         foreach ($destinos as $fila) {
                              $ciudad=$fila['ciudad'].', '.$fila['pais'];

                         	$lista_destino.="Ciudad: <br> <input id='direccion_destino' class='input_pro' type='text' name='ciudad_destino' value='$ciudad'>";
                         }
                         echo $lista_destino;

	  ?>