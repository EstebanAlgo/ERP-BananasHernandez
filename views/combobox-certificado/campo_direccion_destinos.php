 <?php 
     require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM `destinos` WHERE id_destino = '$id'");
                         $statement->execute();
                         $lista_destino="";
                         $destinos=$statement->fetchAll();
                         foreach ($destinos as $fila) {
                              $destino=$fila['direccion'];
                         	$lista_destino.="Dirección:<br><input id='direccion_destino' class='input_pro' type='text' name='direccion_destino' value='$destino'>";
                         }
                         echo $lista_destino;

	  ?>