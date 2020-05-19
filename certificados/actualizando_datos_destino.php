<?php 
require('../php/conexion.php');	
 ?>

 <?php 
    $destino=$_POST['destino'];
    $pais=$_POST['pais'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];
    $id_destino=$_POST['id_destino'];


    $actualizar_destino=$conexion->prepare("UPDATE destinos SET destino='$destino', direccion='$direccion', pais='$pais', ciudad='$ciudad' WHERE id_destino='$id_destino'");

    $actualizar_destino->execute();
   header('Location: destinos.php');


  ?>