 <?php 
    require('../../php/conexion.php');

                         $codigo = $_POST['id'];
                         $lista_ciudades="";
	                    $statementciudad=$conexion->prepare("SELECT * FROM ciudades WHERE Paises_Codigo = '$codigo' ORDER BY Ciudad ASC");
                         $statementciudad->execute();
                         $ciudades=$statementciudad->fetchAll();
                         foreach ($ciudades as $fila) {
                         	$lista_ciudades.='<option value='.$fila['Ciudad'].'>'.$fila['Ciudad'].'</option>';
                         }
                         echo $lista_ciudades;

	  ?>