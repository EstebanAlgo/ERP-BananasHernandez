 <?php 
     require('../../php/conexion.php');

                         $lista_paises="";

	                     $statementpais=$conexion->prepare("SELECT *FROM paises ORDER BY Pais ASC ");
                         $statementpais->execute();
                         $paises=$statementpais->fetchAll();
                         foreach ($paises as $fila) {
                         	$lista_paises.='<option value='.$fila['Codigo'].'>'.$fila['Pais'].'</option>';
                         }

                         echo  $lista_paises;

	  ?>