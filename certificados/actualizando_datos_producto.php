<?php 
require('../php/conexion.php');		
 ?>

 <?php 
    $producto=$_POST['producto'];
    $descripcion=$_POST['descripcion'];
    $id_producto=$_POST['id_producto'];


    $actualizar_producto=$conexion->prepare("UPDATE producto SET producto='$producto', descripcion='$descripcion' WHERE id_producto='$id_producto'");

    $actualizar_producto->execute();
   header('Location: productos.php');


  ?>