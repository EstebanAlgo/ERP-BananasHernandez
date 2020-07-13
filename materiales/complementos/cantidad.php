<?php
require('../../php/conexion.php');
$material=$_POST['material'];
$finca=$_POST['finca'];
$cantidad=0;
$input="<input class='form-control' type='number' name='cantidad' value='$cantidad' max='$cantidad' required>";

$statement = $conexion->prepare("SELECT * FROM almacen WHERE id_material='$material' AND id_finca='$finca'");
$statement->execute();
$fincas = $statement->fetchAll();
foreach ($fincas as $fila) {
   $cantidad=$fila['stock'];
   $input="<input class='form-control' type='number' name='cantidad' placeholder='Inserta la cantidad a retirar' max='$cantidad' required>";
}
echo $input;
?>

