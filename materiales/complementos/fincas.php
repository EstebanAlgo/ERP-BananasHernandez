<?php
require('../../php/conexion.php');
$id=$_POST['id'];
$opciones="";

$statement = $conexion->prepare("SELECT * FROM almacen WHERE id_material='$id'");
$statement->execute();
$fincas = $statement->fetchAll();
foreach ($fincas as $fila) {
   $id_finca=$fila['id_finca'];
   $nombre=finca($conexion,$id_finca);
   $opciones.="<option value='$id_finca'>$nombre</option>";
}
echo $opciones;
?>

<?php
function finca($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM origen WHERE id_origen='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre_finca'];
    }

    return $resultado;
}?>