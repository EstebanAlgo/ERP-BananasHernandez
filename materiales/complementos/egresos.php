<?php 

require('../../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
	# code...
    $unidad=$_POST['unidad'];
    $producto=$_POST['producto'];
	$cantidad=$_POST['cantidad'];
	$fecha=$_POST['fecha'];
	$finca=$_POST['finca'];
	$statement=$conexion->prepare("INSERT INTO egreso (id_egreso,id_material,cantidad,id_finca,fecha_registro,fecha_egreso,usuario,unidad) VALUES (NULL,'$producto','$cantidad','$finca',NULL,'$fecha','$id_usuario','$unidad')");
	$statement->execute();
	

}



$statement=$conexion->prepare("SELECT * FROM egreso");
	$statement->execute();
	$table=$statement->fetchAll();
	foreach ($table as $fila) {
			$producto=material($conexion,$fila['id_material']);
			$cantidad=$fila['cantidad'];
			$fecha=$fila['fecha_egreso'];
			
			$finca=finca($conexion,$fila['id_finca']);
            $unidad=unidad($conexion,$fila['unidad']);



			$filas.="<tr>
			
			
			<th>$fecha</th>
			<th>$producto</th>
			<th>$cantidad</th>
			<th>$unidad</th>
			<th>$finca</th>
			<th></th>

			</tr>";


			}

$tabla="
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                
                                                <th>Fecha</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>unidad</th>
                                                <th>Finca</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            $filas
                                        </tbody>
                                    </table>
                                </div>
                           
                        

";

echo $tabla;


 ?>

 <?php 
function finca($conexion,$id)
{ $resultado="";
	$statement=$conexion->prepare("SELECT * FROM origen WHERE id_origen='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre_finca'];
          
      }

return $resultado;
}


function material($conexion,$id)
{ $resultado="";
	$statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre'];
          
      }

return $resultado;
}
function  unidad($conexion,$id)
{ $resultado="";
  $statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['unidad'];
          
      }

return $resultado;
}
  ?>