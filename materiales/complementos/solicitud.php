<?php 
require('../../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
  # code...
  $producto=$_POST['producto'];
  $cantidad=$_POST['cantidad'];
  $fecha=$_POST['fecha'];
  $finca=$_POST['finca'];

  $statement=$conexion->prepare("INSERT INTO solicitud (id_solicitud,id_material,cantidad,id_finca,status,fecha,usuario) VALUES (NULL,'$producto','$cantidad','$finca','PENDIENTE','$fecha','$id_usuario')");
  $statement->execute();

}

$sintaxis="";

if($tipo_usuario=="Administrador")
{
  $sintaxis="SELECT * FROM solicitud";
}
else
{
  $sintaxis="SELECT * FROM solicitud WHERE usuario=$id_usuario";
}

$statement=$conexion->prepare($sintaxis);
  $statement->execute();
  $table=$statement->fetchAll();
  foreach ($table as $fila) {
      $id_producto=$fila['id_material'];
      $producto=producto($conexion,$id_producto);
      $cantidad=$fila['cantidad'];
      $fecha=$fila['fecha'];

      $dia=substr($fecha, 8,2);
      $mes=substr($fecha, 5,2);
      $año=substr($fecha, 0,4);
      $finca=finca($conexion,$fila['id_finca']);
      $unidad=unidad($conexion,$id_producto);



      $filas.="<tr>
      
      
      
      
      
      <th>$producto</th>
      <th>$cantidad</th>
      <th>$unidad</th>
      <th>$finca</th>
      <th>$dia/$mes,/$año</th>
      <th></th>
      </tr>";


      }

$tabla="
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>unidad</th>
                                                <th>Finca</th>
                                                <th>Fecha</th>
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

function unidad($conexion,$id)
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