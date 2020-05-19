 <?php 
     require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statement=$conexion->prepare("SELECT * FROM `destinos` WHERE id_destino = '$id'");
                         $statement->execute();
                         $lista_destino="";
                         $paises=$statement->fetchAll();
                         foreach ($paises as $fila) {
                              $pais=$fila['pais'];
                         	$lista_destino.="País:<br><input class='input_pro' type='text' name='pais_destino' value='$pais'>";
                         }
                         echo $lista_destino;

	  ?>