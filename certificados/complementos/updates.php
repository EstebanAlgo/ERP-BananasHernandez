<?php 

require('../../php/conexion.php');
$name='';
$filas='';

if ($_POST) {
    $accion=$_POST['accion'];

    switch ($accion) {
        case 'vehiculos':
            $vehiculo=$_POST['vehiculo'];
            $placas=$_POST['placas'];
            $modelo=$_POST['modelo'];
            $id=$_POST['id'];
        
            $statement=$conexion->prepare("UPDATE vehiculos SET vehiculo='$vehiculo', placas='$placas',modelo='$modelo' WHERE id_vehiculo='$id'");
            $statement->execute();

            header('Location: ../vehiculos.php');
            break;
    }
	
		
}