<?php 
require("../../php/conexion.php");

$Nombre="";
$Costo=0;
$Actividad=0;
$cobros="";
$Filas="";

if ($_POST) {
    $Nombre=$_POST['Nombre'];
    $Costo=$_POST['Costo'];
    $Actividad=$_POST['Actividad'];

     $statement=$conexion->prepare("INSERT INTO unidad (id_unidad,nombre,coste,id_actividad,fecha,id_usuario) VALUES (NULL,'$Nombre','$Costo','$Actividad',NULL,'$id_usuario')");
     $statement->execute();
}

$statement=$conexion->prepare("SELECT * FROM unidad");
$statement->execute();
$cobros=$statement->fetchAll();
foreach ($cobros as $fila) {
  $nombre_unidad=$fila['nombre'];
  $id_unidad=$fila['id_unidad'];
  $Costo=$fila['coste'];
  $Actividad=nombreactividad($conexion,$fila['id_actividad']);

  $Filas.="<tr>
                <td>$nombre_unidad</td>
                <td>$Costo</td>
                <td>$Actividad</td>
                
                <td>
                     <form action='altas_unidad.php' method='POST'>
                     <input type='hidden' name='id_unidad' value='$id_unidad'>
                     <button class='btn btn-outline-info' id='Agregar'> <i class='fas fa-edit'></i> Editar </button>
                     </form>
                </td>



          </tr>";
}

$Tabla="
<div class='col-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>Tabla de unidades de cobro</h4>
                                
                                <div class='table-responsive' style='height: 270px;'>
                                    <table class='table table-sm' style='height: 270px;'>
                                        <thead class='bg-danger text-white'>
                                            <tr>
                                                <th>Unidad de cobro</th>
                                                <th>Costo</th>
                                                <th>Actividad</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            $Filas
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>";

echo $Tabla;


 ?>

 <?php 

 function nombreactividad($conexion,$Actividad)
 {
    $nombre='';
   $statement=$conexion->prepare("SELECT * FROM actividad WHERE id_actividad='$Actividad'");
   $statement->execute();
   $empleado=$statement->fetchAll();
   foreach ($empleado as $filas) {
       $nombre=$filas['nombre'];
    

     }

return $nombre;
 } 

 ?>