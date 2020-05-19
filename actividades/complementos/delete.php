<?php 
require('../../php/conexion.php');
$accion=$_POST['accion'];


switch ($accion) {
	case 'actividades':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM actividad WHERE id_actividad=$id");
	$statement->execute();
    header('Location: ../actividades.php');
		break;

	case 'unidades':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM unidad WHERE id_unidad=$id");
	$statement->execute();
    header('Location: ../unidades.php');
		break;

	case 'empleados':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM empleado WHERE id_empleado=$id");
	$statement->execute();
    header('Location: ../empleados.php');
		break;

	case 'registros':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM registro WHERE id_registro=$id");
	$statement->execute();
	
    header('Location: ../');
		break;
	
	default:
		# code...
		break;
}

 ?>