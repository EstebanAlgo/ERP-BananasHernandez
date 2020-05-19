 <?php 
     require('../../php/conexion.php');

                         $id = $_POST['id'];
	                    $statementmunicipios=$conexion->prepare("SELECT * FROM `remitente` WHERE id_remitente = '$id'");
                         $statementmunicipios->execute();
                         $lista_municipios="";
                         $municipios=$statementmunicipios->fetchAll();
                         foreach ($municipios as $fila) {
                              $municipio=$fila['empresa'];
                         	$lista_municipios.="<input id='nombre_cliente' class='i_reg_remitente' type='text' name='registrosolicitante' value='$municipio'>";
                         }
                         echo $lista_municipios;

	  ?>