<?php 
require('../php/conexion.php');			
 ?>

 <?php 
    $nombre=$_POST['nombre'];
    $p_apellido=$_POST['p_apellido'];
    $s_apellido=$_POST['s_apellido'];
    $rfc=$_POST['rfc'];
    $nacimiento=$_POST['nacimiento'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];
    $tema=$_POST['tema'];

    $actualizar=$conexion->prepare("UPDATE usuarios SET nombre='$nombre', p_apellido='$p_apellido', s_apellido='$s_apellido', rfc='$rfc', nacimiento='$nacimiento', telefono='$telefono', correo='$correo', direccion='$direccion', tema='$tema' WHERE id_usuario='$id_usuario'");

    $actualizar->execute();
    header('Location: perfil-usuario.php');


  ?>