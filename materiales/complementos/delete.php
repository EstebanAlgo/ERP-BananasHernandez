<?php 
require('../../php/conexion.php');
$accion=$_POST['accion'];


switch ($accion) {
	case 'proveedores':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM proveedor WHERE id_proveedor=$id");
	$statement->execute();
    header('Location: ../solicitud.php');
		break;

	case 'categorias':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM categoria WHERE id_categoria=$id");
	$statement->execute();
    header('Location: ../productos.php');
		break;

	case 'productos':
    $id=$_POST['id'];
    $statement=$conexion->prepare("DELETE FROM material WHERE id_material=$id");
	$statement->execute();
    header('Location: ../productos.php');
		break;
	
	default:
		# code...
		break;
}

 ?>