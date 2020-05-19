<?php 
require('../php/conexion.php');	

    $id=$_POST['id_origen'];
    $borrar=$conexion->prepare("DELETE FROM origen WHERE id_origen = '$id'");
    $borrar->execute();
   header('Location: fincas.php');


  ?>