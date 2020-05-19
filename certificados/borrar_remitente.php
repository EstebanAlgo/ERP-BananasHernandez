<?php 
require('../php/conexion.php');	

    $id=$_POST['id_remitente'];
    $borrar=$conexion->prepare("DELETE FROM remitente WHERE id_remitente = '$id'");
    $borrar->execute();
   header('Location: remitentes.php');


  ?>