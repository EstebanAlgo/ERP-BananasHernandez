<?php 
require('../php/conexion.php');	

    $id_usuario=$_POST['id_usuario'];
    $borrar_usuario=$conexion->prepare("DELETE FROM usuarios WHERE id_usuario = '$id_usuario'");
    $borrar_usuario->execute();
   header('Location: usuarios.php');


  ?>