 <?php 
     require('../../php/conexion.php');

	                     $statementremitente=$conexion->prepare('SELECT *FROM remitente ORDER BY empresa ASC');
                         $statementremitente->execute();
                         $lista_remitentes="";
                         $remitentes=$statementremitente->fetchAll();
                         foreach ($remitentes as $fila) {
                              $empresa=$fila['empresa'];
                         	$lista_remitentes.="<option value='$empresa'>$empresa</option>";
                         }

                         echo  $lista_remitentes;

	  ?>