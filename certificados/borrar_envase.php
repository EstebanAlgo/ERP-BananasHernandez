<?php 
require('../php/conexion.php');	

    $id_envase=$_POST['id_envase'];
    $borrar_envase=$conexion->prepare("DELETE FROM envases WHERE id_envase = '$id_envase'");
    $borrar_envase->execute();
   header('Location: envases.php');


  ?>