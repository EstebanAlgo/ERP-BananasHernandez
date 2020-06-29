<?php

require('../../php/conexion.php');

if ($_POST) {
    $accion = $_POST['accion'];
    $id = $_POST['id'];

    switch ($accion) {
        case 'vehiculos':
            $id = $_POST['id'];

            $statement = $conexion->prepare("DELETE FROM vehiculos WHERE id_vehiculo='$id'");
            $statement->execute();

            header('Location: ../vehiculos.php');
            break;
        case 'conductor':
            $id = $_POST['id'];
            $statement = $conexion->prepare("DELETE FROM conductor WHERE id_conductor='$id'");
            $statement->execute();
            header('Location: ../conductores.php');
            break;
    }
}
