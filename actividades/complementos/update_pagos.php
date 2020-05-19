<?php
require("../../php/conexion.php");

$id = "";
$abono = "";
$monto = "";

if ($_POST) {
  $id = $_POST['id'];
  $abono = $_POST['abono'];
  $semana = $_POST['semana'];
  if (strlen($semana) == 1) {
    $semana = "0" . $semana;
  }

  $statement = $conexion->prepare("SELECT * FROM pagos WHERE id_empleado=$id AND semana='$semana'");
  $statement->execute();
  $pagos = $statement->fetchAll();
  foreach ($pagos as $fila) {
    $monto = $fila['monto'];
    $abonoAnterior = $fila['abono'];
  }
  $abono = $abono + $abonoAnterior;
  $pendiente = $monto - $abono;
}
if ($pendiente <= 0) {
  //echo "<script>alert('ABONO:'+ '$abono'+' MONTO:'+'$monto'+' PENDIENTE:'+'$pendiente')</script>";
  $statement = $conexion->prepare("UPDATE pagos SET abono='$abono', pendiente='$pendiente', status='PA',fecha=NULL WHERE id_empleado='$id'  AND semana='$semana'");
  $statement->execute();
} else {
  $statement = $conexion->prepare("UPDATE pagos SET abono='$abono', pendiente='$pendiente', status='A',fecha=NULL WHERE id_empleado='$id'  AND semana='$semana'");
  $statement->execute();
}

$filas = '';
$abono = 0;
$total = 0;
$totalA = 0;
$totalP = 0;
$statement = $conexion->prepare("SELECT * FROM empleado");
$statement->execute();
$empleados = $statement->fetchAll();
foreach ($empleados as $fila) {

  $id_empleado = $fila['id_empleado'];

  $pago = 0;
  $statement = $conexion->prepare("SELECT * FROM registro WHERE empleado='$id_empleado' AND semana='$semana'");
  $statement->execute();
  $registros = $statement->fetchAll();

  foreach ($registros as $fila2) {

    $pago = $pago + $fila2['total'];
  }


  $pendiente = $pago - $abono;
}

$filaa = "";
$statement = $conexion->prepare("SELECT * FROM pagos WHERE semana='$semana' AND id_empleado='$id'");
$statement->execute();
$registros = $statement->fetchAll();
foreach ($registros as $key) {
  $id_empleado = $key['id_empleado'];
  $nombre_empleado = nombre($conexion, $id_empleado);
  $monto = $key['monto'];
  $pendiente = $key['pendiente'];
  $abono = $key['abono'];
  $status = $key['status'];

  if ($status == "P") {
    $status = "<span class='label label-danger'>POR PAGAR</span>";
    $opciones = "
    <input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
    <input id='monto$id_empleado' type='hidden' value='$monto'>
    <input id='abono$id_empleado' type='hidden' value='$abono'>
                      
                    <button data-toggle='modal' data-target='#abono'id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' ><i class='fas fa-donate'></i></button>
                    <button id='$id_empleado' onclick='envio(this.id)' class='btn btn-info btn-sm' title='Pagar' ><i class='fas fa-dollar-sign'></i></button>";
  } elseif ($status == "A") {
    $status = "<span class='label label-warning'>ABONADO</span>";
    $opciones = "
    <input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
    <input id='monto$id_empleado' type='hidden' value='$monto'>
    <input id='abono$id_empleado' type='hidden' value='$abono'>
                      
                    <button data-toggle='modal' data-target='#abono'id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' ><i class='fas fa-donate'></i></button>";
  } else {
    $status = "<span class='label label-info'>PAGADO</span>";
    $opciones = "<i class='fas fa-check-circle text-success'></i>";
  }

  $fecha = $key['fecha'];

  $total = $total + $monto;
  $totalA = $totalA + $abono;
  $totalP = $totalP + $pendiente;

  $filaa = "
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
function nombre($conexion, $id_empleado)
{


  $statement = $conexion->prepare("SELECT * FROM empleado WHERE id_empleado=$id_empleado");
  $statement->execute();
  $empleados = $statement->fetchAll();

  foreach ($empleados as $fila2) {

    $nombre = $fila2['nombre'] . " " . $fila2['p_apellido'] . " " . $fila2['s_apellido'];
  }

  return $nombre;
} ?>