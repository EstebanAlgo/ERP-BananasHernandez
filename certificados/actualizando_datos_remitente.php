<?php 
require('../php/conexion.php');			
 ?>

 <?php 
    $empresa=$_POST['empresa'];
    $domicilio=$_POST['domicilio'];
    $id_remitente=$_POST['id_remitente'];

    $actualizar_remitente=$conexion->prepare("UPDATE remitente SET empresa='$empresa', domicilio='$domicilio' WHERE id_remitente='$id_remitente'");

    $actualizar_remitente->execute();
   header('Location: remitentes.php');


  ?>