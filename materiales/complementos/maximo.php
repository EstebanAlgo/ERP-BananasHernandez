<?php
require('../../php/conexion.php');
$material=$_POST['material'];
$finca=$_POST['finca'];
$cantidad=0;

$statement = $conexion->prepare("SELECT * FROM almacen WHERE id_material='$material' AND id_finca='$finca'");
$statement->execute();
$fincas = $statement->fetchAll();
foreach ($fincas as $fila) {
   $cantidad=$fila['stock'];
}
echo $cantidad;
?>

