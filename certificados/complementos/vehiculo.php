<?php 

require('../../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
	# code...

	
	$vehiculo=$_POST['vehiculo'];
    $placas=$_POST['placas'];
    $modelo=$_POST['modelo'];
    
	$statement=$conexion->prepare("INSERT INTO vehiculos (id_vehiculo,vehiculo,placas,modelo) VALUES (NULL,'$vehiculo','$placas','$modelo')");
	$statement->execute();
	


}



$statement=$conexion->prepare("SELECT * FROM vehiculos");
	$statement->execute();
	$table=$statement->fetchAll();
	foreach ($table as $fila) {

			
            $vehiculo=vehiculo($conexion,$fila['id_vehiculo']);
            $placas=$fila['placas'];
            $modelo=$fila['modelo'];
            

            $filas.="<tr>
			
			
			
			<th>$vehiculo</th>
            <th>$placas</th>
            <th>$modelo</th>
            
            
			</tr>";


			}

$tabla="
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                
                                                	<th>vehiculo</th>
                                                    <th>placa</th>
                                                    <th>modelo</th>
            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            $filas
                                        </tbody>
                                    </table>
                                </div>
                           
                        

";

echo $tabla;
function  vehiculo($conexion,$id)
{ $resultado="";
  $statement=$conexion->prepare("SELECT * FROM vehiculos WHERE id_vehiculo='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['vehiculo'];
          
      }

return $resultado;
}


 ?>

