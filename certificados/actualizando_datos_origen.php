<?php 
require('../php/conexion.php');	
 ?>

 <?php 
    $finca=$_POST['finca'];
    $estado=$_POST['estado'];
    $municipio=$_POST['municipio'];
    $reg_empacadora=$_POST['reg_empacadora'];
    $id_origen=$_POST['id_origen'];
    $productor=$_POST['productor'];


    $actualizar_finca=$conexion->prepare("UPDATE origen SET nombre_finca='$finca', entidad='$estado', municipio='$municipio',registro_empacadora='$reg_empacadora', id_productor='$productor' WHERE id_origen='$id_origen'");

    $actualizar_finca->execute();
   header('Location: fincas.php');

  ?>