<?php 
require('../php/conexion.php');	
 ?>

 <?php 
    $envase=$_POST['envase'];
    $tipo_envase=$_POST['tipo_envase'];
    $id_envase=$_POST['id_envase'];


    $actualizar_envase=$conexion->prepare("UPDATE envases SET envase='$envase',grafica='$tipo_envase' WHERE id_envase='$id_envase'");

    $actualizar_envase->execute();
   header('Location: envases.php');


  ?>