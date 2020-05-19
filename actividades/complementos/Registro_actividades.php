<?php 
require("../../php/conexion.php");

$Nombre="";
$cobros="";
$Costo=0;
$Filas="";

if ($_POST) {
     $Nombre=$_POST['Nombre'];
     $statement=$conexion->prepare("INSERT INTO actividad (id_actividad,nombre,usuario,fecha_regactividad) VALUES (NULL,'$Nombre','$id_usuario',NULL)");
     $statement->execute();
}

$statement=$conexion->prepare("SELECT * FROM actividad ORDER BY nombre ASC");
$statement->execute();
$cobros=$statement->fetchAll();
foreach ($cobros as $fila) {
  $nombre_actividad=$fila['nombre'];
  $id_actividad=$fila['id_actividad'];

  $Filas.="<tr>
                <td>$nombre_actividad</td>
                <td>
                     <form action='altas_actividad.php' method='POST' style='display:inline-block;'>
                     <input type='hidden' name='id_actividad' value='$id_actividad'>
                     <input type='hidden' name='Costo' value=''>
                     <button class='btn btn-outline-info' id='Agregar'> <i class='fas fa-edit'></i> Editar </button>
                     </form>
                     <form action='altas_actividad.php' method='POST' style='display:inline-block;'>
                     <input type='hidden' name='id_actividad' value='$id_actividad'>
                     <input type='hidden' name='Costo' value=''>
                     <button class='btn btn-outline-danger' id='Agregar'> <i class='fas fa-edit'></i> Eliminar </button>
                     </form>
                </td>
          </tr>";
}

$Tabla="
<div class='col-12'>
                        <div class='card'>
                            <div class='card-body'>
                                <h4 class='card-title'>Tabla de unidades de cobro</h4>
                                
                                <div class='table-responsive' style='height: 250px;'>
                                    <table class='table table-sm' >
                                        <thead class='bg-danger text-white'>
                                            <tr>
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