<?php 

require('../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
	# code...

	
	$vehiculo=$_POST['vehiculo'];
    $placas=$_POST['placas'];
    $modelo=$_POST['modelo'];
    
	$statement=$conexion->prepare("INSERT INTO vehiculos (id_vehiculo,vehiculo,placas,modelo) VALUES (NULL,'$vehiculo','$placas','$modelo')");
	$statement->execute();
	


}



header('Location: vehiculos.php')

 ?>

