<?php 

require('../php/conexion.php');

 if ($tipo_usuario!="Administrador") 
 {
 	header('Location: ../index.php');
 }

 if($_POST)
 {
 	
    $tipo_usuario=$_POST['tipo_usuario'];
    $nombre=$_POST['nombre'];
    $p_apellido=$_POST['p_apellido'];
    $s_apellido=$_POST['s_apellido'];
    $rfc=$_POST['rfc'];
    $password=$_POST['password'];
    $password = hash('sha512', $password);

     $statement=$conexion->prepare("SELECT *FROM usuarios WHERE usuario='$nombreUsuario' LIMIT 1");
     $statement->execute();
     $usuarios=$statement->fetchAll();
     $confirmacion=0;
                         foreach ($usuarios as $fila)
                         {
                                $confirmacion=1;
                         } 
    if($confirmacion>0)
    {
            echo "<script>alert('El usuario ya existe');</script>";
    }
    else
    {
     $registrar_usuario=$conexion->prepare("INSERT INTO usuarios(id_usuario,usuario,tipo_usuario,nombre,p_apellido,s_apellido,rfc,password,fecha_registro) VALUES
                                                 (null,'$nombreUsuario','$tipo_usuario','$nombre','$p_apellido','$s_apellido','$rfc','$password',null)");

    $registrar_usuario->execute();
    echo "<script>alert('Usuario Agregado exitosamente');</script>";

    }
    
 }



//------------------------------------------------------------------------------------------------------
 ?>