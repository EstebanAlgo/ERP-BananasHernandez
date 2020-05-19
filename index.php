<?php 
require('php/conexion.php');

if (isset($_SESSION['usuario'])) {
	header('Location: dashboard/');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$password = hash('sha512', $password);



	$statement = $conexion->prepare('
		SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password'
	);
	$statement->execute(array(
		':usuario' => $usuario,
		':password' => $password
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: dashboard/');
	} else {
		$errores .= "<br><li class='label label-light-danger'>*Datos Incorrectos</li>";
	}
}

require 'views/login.view.php';

?>