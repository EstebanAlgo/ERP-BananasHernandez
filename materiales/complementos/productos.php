<?php

require('../../php/conexion.php');
$name = '';
$filas = '';
if ($_POST) {
    # code...
    $fecha = $_POST['fecha'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $unidad = $_POST['unidad'];
    $limite = $_POST['limite'];
    $categoria = $_POST['categoria'];
    $nombre_may = strtoupper($nombre);
    $statement = $conexion->prepare('SELECT  MAX(id_material) FROM material');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
        $max_material = $fila[0] + 1;
    }

    $codigo = "N" . substr($nombre_may, 0, 3) . "IM" . $max_material . "CA" . $categoria;

    $statement = $conexion->prepare("INSERT INTO material (id_material,nombre,id_categoria,unidad,descripcion,limite,fecha_alta,fecha_registro,codigo_producto,usuario) VALUES (NULL,'$nombre','$categoria','$unidad','$descripcion','$limite','$fecha',NULL,'$codigo','$id_usuario')");
    $statement->execute();
}



$statement = $conexion->prepare("SELECT * FROM material");
$statement->execute();
$table = $statement->fetchAll();
foreach ($table as $fila) {

    $fecha = $fila['fecha_alta'];
    $nombre = $fila['nombre'];
    $descripcion = $fila['descripcion'];
    $unidad = $fila['unidad'];
    $limite = $fila['limite'];
    $codigo = $fila['codigo_producto'];
    $categoria = categoria($conexion, $fila['id_categoria']);
    $filas .= "<tr>
			
			
			<th>$fecha</th>
			<th>$nombre</th>
            <th>$descripcion</th>
            <th>$unidad</th>
            <th>$limite</th>
            <th>$codigo</th>
            <th>$categoria</th>
			</tr>";
}

$tabla = "
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                
                                                	<th>fecha</th>
			                                        <th>nombre</th>
                                                    <th>descripcion</th>
                                                    <th>unidad</th>
                                                    <th>limite</th>
                                                    <th>codigo</th>
                                                    <th>categoria</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            $filas
                                        </tbody>
                                    </table>
                                </div>";

echo $tabla;


?>

 <?php
    function categoria($conexion, $id)
    {
        $resultado = "";
        $statement = $conexion->prepare("SELECT * FROM categoria WHERE id_categoria='$id'");
        $statement->execute();
        $resultados = $statement->fetchAll();
        foreach ($resultados as $filas) {
            $resultado = $filas['nombre'];
        }

        return $resultado;
    }



    ?>