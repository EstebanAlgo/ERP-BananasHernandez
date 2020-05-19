 <?php 
     require('../../php/conexion.php');

                         $id = $_POST['id'];
	                     $statementmunicipios=$conexion->prepare("SELECT * FROM `municipios` WHERE idEstado = $id ORDER BY municipio ASC");
                         $statementmunicipios->execute();
                         $municipios=$statementmunicipios->fetchAll();
                         foreach ($municipios as $fila) {
                              $municipio=$fila['municipio'];
                         	$lista_municipios.="<option value='$municipio'>$municipio</option>";
                         }
                         echo $lista_municipios;

	  ?>