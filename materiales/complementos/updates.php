<?php 
require('../../php/conexion.php');
$accion=$_POST['accion'];

switch ($accion) {
	case 'proveedores':
	$nombre=$_POST['nombre'];
    $id=$_POST['id'];
    $actualizar_proveedor=$conexion->prepare("UPDATE proveedor SET nombre='$nombre' WHERE id_proveedor='$id'");
    $actualizar_proveedor->execute();
    header('Location: ../vista_proveedor.php');
	break;
	
	case 'categorias':
	$nombre=$_POST['nombre'];
    $id=$_POST['id'];
    $actualizar_categoria=$conexion->prepare("UPDATE categoria SET nombre='$nombre' WHERE id_categoria='$id'");
    $actualizar_categoria->execute();
    header('Location: ../productos.php');
	break;

	case 'materiales':
	$nombre=$_POST['nombre'];
	$id_categoria=$_POST['id_categoria'];
	$unidad=$_POST['unidad'];
	$descripcion=$_POST['descripcion'];
	$limite=$_POST['limite'];
    $id=$_POST['id'];
    $actualizar_empleado=$conexion->prepare("UPDATE material SET nombre='$nombre', id_categoria='$id_categoria',unidad='$unidad',descripcion='$descripcion',limite='$limite' WHERE id_material='$id'");
    $actualizar_empleado->execute();
    header('Location: ../productos.php');
	break;
	
	default:
		# code...
		break;
}

 ?>