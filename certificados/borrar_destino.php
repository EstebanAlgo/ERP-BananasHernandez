<?php 
require('../php/conexion.php');	

    $id_destino=$_POST['id_destino'];
    $borrar_destino=$conexion->prepare("DELETE FROM destinos WHERE id_destino = '$id_destino'");
    $borrar_destino->execute();
   header('Location: destinos.php');


  ?>