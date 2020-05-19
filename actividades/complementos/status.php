<?php 
require("../../php/conexion.php");


if (  $_POST) {
  
  $id=$_POST['id'];
  $monto=$_POST['monto'];
  $semana=$_POST['semana'];
  if (strlen($semana)==1) {
    $semana="0".$semana;
  }
}


$statement=$conexion->prepare("UPDATE pagos SET abono='$monto', pendiente='0', status='PA',fecha=NULL WHERE id_empleado='$id' AND semana='$semana'");
$statement->execute();


                 
                $filaa=""; 
                $statement=$conexion->prepare("SELECT * FROM pagos WHERE semana='$semana' AND id_empleado='$id'");
                $statement->execute();
                $registros=$statement->fetchAll();
                foreach ($registros as $key) {
                 $id_empleado= $key['id_empleado'];
                 $nombre_empleado=nombre($conexion,$id_empleado);
                 $monto= $key['monto'];
                 $pendiente= $key['pendiente'];
                 $abono= $key['abono'];
                 $status= $key['status'];

                if ($status=="P") {
                   $status="<span class='label label-danger'>POR PAGAR</span>";
                   $opciones="
                   <input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
                   <input id='monto$id_empleado' type='hidden' value='$monto'>
                      
                    <button data-toggle='modal' data-target='#abono'id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' ><i class='fas fa-donate'></i></button>
                    <button id='$id_empleado' onclick='envio(this.id)' class='btn btn-info btn-sm' title='Pagar' ><i class='fas fa-dollar-sign'></i></button>";
                 }
                 elseif($status=="A")
                  {
                    $status="<span class='label label-warning'>ABONADO</span>";
                    $opciones="
                   <input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
                   <input id='monto$id_empleado' type='hidden' value='$monto'>
                      
                    <button data-toggle='modal' data-target='#abono'id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' ><i class='fas fa-donate'></i></button>";
                  }
                 else{
                 	$status="<span class='label label-info'>PAGADO</span>";
                 	$opciones="<i class='fas fa-check-circle text-success'></i>";
                 }

                 $fecha= $key['fecha'];


                  $filaa="
                      <td>$nombre_empleado</td>
                      <td>$monto</td>
                      <td>$abono</td>
                      <td>$pendiente</td>
                      <td>$status</td>
                      <td>$fecha</td>
                      <td>$opciones <a class='btn btn-inverse btn-sm' target='_blank' href='reporte_actividades.php?id=$id_empleado&semana=$semana'>
                      <i class='fas fa-address-book'></i></a>
                      </td>

                  ";
                }


echo $filaa;
               
?>

<?php 
 function nombre($conexion,$id_empleado){


                   $statement=$conexion->prepare("SELECT * FROM empleado WHERE id_empleado=$id_empleado");
                   $statement->execute();
                   $empleados=$statement->fetchAll();

                     foreach ($empleados as $fila2) {
                      
                    $nombre=$fila2['nombre']. " " . $fila2['p_apellido']. " ".$fila2['s_apellido'];

                  }

                    return $nombre;

                     } ?>