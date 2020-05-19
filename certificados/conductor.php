<?php 

require('../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
	# code...

	
	
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $estado=$_POST['estado'];
    $licencia=$_POST['licencia'];
         
	$statement=$conexion->prepare("INSERT INTO conductor (id_conductor,nombre,direccion,estado,licencia) VALUES (NULL,'$nombre','$direccion','$estado','$licencia')");
	$statement->execute();
	


}

header("Location: conductores.php")




 ?>

