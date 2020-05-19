 <?php 
     require('../../php/conexion.php');

	                     $statemententidad=$conexion->prepare('SELECT *FROM estados');
                         $statemententidad->execute();
                         $entidades=$statemententidad->fetchAll();
                         foreach ($entidades as $fila) {
                         	$lista_entidades.='<option value='.$fila['idEstado'].'>'.$fila['estado'].'</option>';
                         }

                         echo  $lista_entidades;

	  ?>