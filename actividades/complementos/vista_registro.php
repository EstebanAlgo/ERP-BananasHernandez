<?php 
require("../../php/conexion.php");
$tipos="";
$actividad=0;
$precio=0;
$filas_tabla="";
$fecha=$_POST['fecha'];




$statement=$conexion->prepare("SELECT * FROM `registro` WHERE `semana` LIKE '%$fecha%'");
    $statement->execute();
      $actividades=$statement->fetchAll();
      foreach ($actividades as $filas) {

      	$id_registro=$filas['id_registro'];
      	$fecha_actividad=$filas['fecha_actividad'];
        $id_origen=$filas['id_origen'];
      	$origen=finca($conexion,$id_origen);
      	$cantidad=$filas['cantidad'];
        $id_unidad=$filas['id_unidad'];
      	$unidad=unidad($conexion,$id_unidad);
        $id_actividad=$filas['id_actividad'];
      	$actividad=actividad($conexion,$id_actividad);
      	$total=$filas['total'];
        $id_empleado=$filas['empleado'];
      	$empleado=empleado($conexion,$id_empleado);
      	$fecha_actividad=$filas['fecha_actividad'];

      	$dia= substr($fecha_actividad, 8,2);
        $mes= substr($fecha_actividad, 5,2);
        $año= substr($fecha_actividad, 0,4);

        $fecha=$dia."/".$mes."/".$año; 
        $id_precio=$filas['id_unidad'];
      	$precio=precio($conexion,$id_precio);
      	
          $filas_tabla.="                   <tr>
                                                <td>$origen</td>
                                                <td>$actividad</td>
                                                <td>$unidad</td>
                                                <td>$empleado</td>
                                                <td>$cantidad</td>
                                                <td>$precio</td>
                                                <td>$total</td>
                                                <td>$fecha</td>
                                                <td>
                                <div class='btn-group dropleft btn-sm'>
                                    <button type='button' class='btn btn-secondary dropdown-toggle btn-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='fas fa-list-ul'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                <form class='dropdown-item' style='display:inline-block;'>
                     <input type='hidden' id='id_origen$id_registro' value='$id_origen'>
                     <input type='hidden' id='id_actividad$id_registro' value='$id_actividad'>
                     <input type='hidden' id='fecha$id_registro' value='$fecha_actividad'>
                     <input type='hidden' id='id_empleado$id_registro' value='$id_empleado'>
                     <input type='hidden' id='id_unidad$id_registro' value='$id_unidad'>
                     <input type='hidden' id='cantidad$id_registro' value='$cantidad'>

                     <span onClick='editar(this.id)' class='btn btn-outline-inverse btn-sm btn-block' id='$id_registro' data-toggle='modal' data-target='#modal-actualizar' > <i class='fas fa-pencil-alt'></i> Editar </span>
                </form>
                <form class='dropdown-item' action='complementos/delete.php' method='post' style='display:inline-block;'>
                     <input type='hidden' name='id' value='$id_registro'>
                     <input type='hidden' name='accion' value='registros'>
                     <button onclick='eliminar(event)' class='btn btn-outline-inverse btn-sm btn-block' id='Agregar'> <i class='fas fa-trash-alt'></i> Eliminar </button>
                </form>
                                       
                                    </div>
                                </div>
                                                </td>
                                            </tr>";
          
      }


$tabla="
<table id='tabla' class='display nowrap table table-hover table-striped table-bordered table-sm text-center' cellspacing='0' width='100%'>
                                        <thead style='background: #cae0f9; color:#03114D; font-size: 1em; color:  #424446; font-weight: bold; font-family: 'Merriweather', serif;'>
                                            <tr >
                                            
                                                <th>Finca</th>
                                                <th>Actividad</th>
                                                <th>Unidad de Cobro</th>
                                                <th>Empleado</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>TOTAL</th>
                                                <th>Fecha</th>
                                                <th>Acción</th>
                                                

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Finca</th>
                                                <th>Actividad</th>
                                                <th>Unidad de Cobro</th>
                                                <th>Empleado</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>TOTAL</th>
                                                <th>Fecha</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            $filas_tabla
                                        </tbody>
                                    </table>
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
function unidad($conexion,$id)
{$resultado="";
	$statement=$conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre'];
          
      }

return $resultado;
}
function actividad($conexion,$id)
{$resultado="";
	$statement=$conexion->prepare("SELECT * FROM actividad WHERE id_actividad='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre'];
          
      }

return $resultado;
}
function empleado($conexion,$id)
{$resultado="";
	$statement=$conexion->prepare("SELECT * FROM empleado WHERE id_empleado='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre']." ".$filas['p_apellido']." ".$filas['s_apellido'];
          
      }

return $resultado;
}
function precio($conexion,$id)
{$resultado="";
	$statement=$conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
    $statement->execute();
      $precios=$statement->fetchAll();
      foreach ($precios as $filas) {
          $resultado=$filas['coste'];
          
      }

return $resultado;
}


  ?>