<?php 
require("../../php/conexion.php");

$Nombre=""; $P_apellido=""; $S_apellido="";
$Cargo="";
$Fecha="";
$Direccion="";
$Filas="";

if ($_POST) {
    $Nombre=$_POST['Nombre'];
    $P_Apellido=$_POST['P_Apellido'];
    $S_Apellido=$_POST['S_Apellido'];
    $Cargo=$_POST['Cargo'];
    $Nacimiento=$_POST['Fecha'];
    $Telefono=$_POST['Telefono'];
    $Direccion=$_POST['Direccion'];

     $statement=$conexion->prepare("INSERT INTO empleado (id_empleado,cargo,nombre,p_apellido,s_apellido,nacimiento,telefono,direccion,fecha,id_usuario) VALUES (NULL,'$Cargo','$Nombre','$P_Apellido','$S_Apellido','$Nacimiento','$Telefono','$Direccion','$Nacimiento','$id_usuario')");
     $statement->execute();
}

$statement=$conexion->prepare("SELECT * FROM empleado");
$statement->execute();
$cobros=$statement->fetchAll();
foreach ($cobros as $fila) {
  $id_empleado=$fila['id_empleado'];
  $Cargo=$fila['cargo'];
  $Nombre=$fila['nombre'];
  $P_apellido=$fila['p_apellido'];
  $S_apellido=$fila['s_apellido'];
  $Nacimiento=$fila['nacimiento'];
  $Telefono=$fila['telefono'];
  $Direccion=$fila['direccion'];
  $Fecha=$fila['fecha'];


  $Filas.="<tr>
                <td>$Nombre $P_apellido $S_apellido</td>
                <td>$Cargo</td>
                <td>$Telefono</td>
                <td>$Nacimiento</td>
                <td>$Direccion</td>
                <td>
                     <form action='altas_unidad.php' method='POST'>
                     <input type='hidden' name='id_unidad' value='$id_empleado'>
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
                                
                                <div class='table-responsive'>
                                    <table class='table table-sm' style='height: 270px;'>
                                        <thead class='bg-danger text-white'>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cargo</th>
                                                <th>Teléfono</th>
                                                <th>Nacimiento</th>
                                                <th>Dirección</th>
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