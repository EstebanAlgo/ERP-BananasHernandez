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
	$proveedor=$_POST['proveedor'];
	$finca=$_POST['finca'];
	$statement=$conexion->prepare("INSERT INTO ingreso (id_ingreso,id_material,cantidad,fecha_registro,fecha_alta,usuario,id_finca,id_proveedor,unidad) VALUES (NULL,'$producto','$cantidad',NULL,'$fecha','$id_usuario','$finca','$proveedor','$unidad')");
	$statement->execute();

}



$statement=$conexion->prepare("SELECT * FROM ingreso");
	$statement->execute();
	$table=$statement->fetchAll();
	foreach ($table as $fila) {
			$producto=producto($conexion,$fila['id_material']);
			$cantidad=$fila['cantidad'];
			$fecha=$fila['fecha_alta'];
			$proveedor=proveedor($conexion,$fila['id_proveedor']);
			$finca=finca($conexion,$fila['id_finca']);
      $unidad=unidad($conexion,$fila['unidad']);





			$filas.="<tr>
			
			
			
			
			<th>$fecha</th>
			<th>$producto</th>
			<th>$cantidad</th>
      <th>$unidad</th>
			<th>$proveedor</th>
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
                                                <th>Proveedor</th>
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

function proveedor($conexion,$id)
{ $resultado="";
	$statement=$conexion->prepare("SELECT * FROM proveedor WHERE id_proveedor='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre'];
          
      }

return $resultado;
}
function producto($conexion,$id)
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