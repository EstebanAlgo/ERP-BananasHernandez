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
            case 'choferes':
                $nombre=$_POST['nombre'];
                $direccion=$_POST['direccion'];
                $estado=$_POST['estado'];
                $licencia=$_POST['licencia'];
                $id=$_POST['id'];
            
                $statement=$conexion->prepare("UPDATE conductor SET nombre='$nombre', direccion='$direccion',estado='$estado', licencia='$licencia' WHERE id_conductor='$id'");
                $statement->execute();
    
                header('Location: ../conductores.php');

                //echo $nombre.$direccion.$estado.$licencia.$id;
                break;
    }
	
		
}