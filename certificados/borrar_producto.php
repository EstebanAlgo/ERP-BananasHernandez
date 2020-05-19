<?php 
require('../php/conexion.php');	

    $id=$_POST['id_producto'];
    $borrar=$conexion->prepare("DELETE FROM producto WHERE id_producto = '$id'");
    $borrar->execute();
   header('Location: productos.php');


  ?>