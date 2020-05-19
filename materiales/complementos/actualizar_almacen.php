<?php 
require('../../php/conexion.php');
    $proveedor="";
    $cantidad=$_POST['cantidad'];
    $id=$_POST['id'];
    $proveedor=$_POST['proveedor'];

    $statement=$conexion->prepare("SELECT * FROM solicitud WHERE id_solicitud=$id");
	$statement->execute();
	$datos=$statement->fetchAll();
	foreach ($datos as $fila) {
			$cantidad_solicitada=$fila['cantidad'];
			$id_finca=$fila['id_finca'];
			$id_material=$fila['id_material'];
			$fecha_alta=$fila['fecha'];
			}

    $statement=$conexion->prepare("SELECT * FROM almacen WHERE id_material=$id_material AND id_finca=$id_finca");
	$statement->execute();
	$producto_almacen=$statement->fetchAll();

     if (count($producto_almacen)>0) {  //verificar si el producto está registrado en almacén

     	foreach ($producto_almacen as $fila) {
			$stock=$fila['stock'];
			$id_almacen=$fila['id_almacen'];
			}
    $suma=$cantidad+$stock;
	$actualizar_almacen=$conexion->prepare("UPDATE almacen SET stock='$suma' WHERE id_almacen='$id_almacen'");
    $actualizar_almacen->execute();
    $agregar_ingreso=$conexion->prepare("INSERT INTO ingreso (id_ingreso,id_material,cantidad,proveedor,id_finca,usuario,fecha_alta,fecha_registro) VALUES (NULL,'$id_material','$cantidad','$proveedor','$id_finca','$id_usuario','$fecha_alta',NULL)");
        $agregar_ingreso->execute();
        
        $actualizar_almacen=$conexion->prepare("UPDATE solicitud SET cantidad='$cantidad',status='APROBADO' WHERE id_solicitud='$id'");
        $actualizar_almacen->execute();
       
    header('Location: ../altas_ingresos.php');
     
     }
     else
     {
        $agregar_ingreso=$conexion->prepare("INSERT INTO ingreso (id_ingreso,id_material,cantidad,proveedor,id_finca,usuario,fecha_alta,fecha_registro) VALUES (NULL,'$id_material','$cantidad','$proveedor','$id_finca','$id_usuario','$fecha_alta'),NULL");
        $agregar_ingreso->execute();

     	$agregar_almacen=$conexion->prepare("INSERT INTO almacen (id_almacen,id_material,id_finca,stock) VALUES (NULL,$id_material,$id_finca,'$cantidad')");
        $agregar_almacen->execute();

        $actualizar_almacen=$conexion->prepare("UPDATE solicitud SET cantidad='$cantidad',status='APROBADO' WHERE id_solicitud='$id'");
        $actualizar_almacen->execute();

        header('Location: ../altas_ingresos.php');
     }
    


 ?>