<?php
require('../php/conexion.php');

$id = $_POST['id'];
$nombre = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamaño = $_FILES['imagen']['size'];

$destino = 'complementos/empleados/';

$tamaño_cadena = strlen($nombre);
$analizar = substr($nombre, $tamaño_cadena - 4, 4);
$extension = pathinfo($nombre, PATHINFO_EXTENSION);



if ($tipo == "image/jpeg") {
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . $id . '.jpeg');
    
    $statement = $conexion->prepare("UPDATE empleado SET photo='$destino$id.jpeg' WHERE id_empleado='$id'");
    $statement->execute();
    echo "Id:" . $id . " Nombre:" . $nombre . " Tipo:" . $tipo . " Tamaño:" . $tamaño;
}
else{
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino . $id . '.jpg');
    $statement = $conexion->prepare("UPDATE empleado SET photo='$destino$id.jpg' WHERE id_empleado='$id'");
    $statement->execute();
}
header('Location: empleados.php');
/*

if ($analizar=="jpeg") {

move_uploaded_file($_FILES['imagen']['tmp_name'],$destino.$id.'.jpeg');

 $statement=$conexion3->prepare("UPDATE pendientes SET img='$destino$id.jpeg',status='Revision' WHERE id_pendiente='$id'");
$statement->execute();
$subir=$conexion3->prepare("UPDATE solicitud SET comprobante='$destino$id.jpeg'  WHERE id_solicitud='$id'");
$subir->execute();
header('Location: pendientes.php');

}
if ($extension=="pdf") {

move_uploaded_file($_FILES['imagen']['tmp_name'],$destino.$id.'.pdf');

 $statement=$conexion3->prepare("UPDATE pendientes SET img='$destino$id.pdf',status='Revision' WHERE id_pendiente='$id'");
$statement->execute();
$subir=$conexion3->prepare("UPDATE solicitud SET comprobante='$destino$id.pdf'  WHERE id_solicitud='$id'");
$subir->execute();

header('Location: pendientes.php');

}
else if ($extension=="jpg"){


move_uploaded_file($_FILES['imagen']['tmp_name'],$destino.$id.'.jpg');

 $statement=$conexion3->prepare("UPDATE pendientes SET img='$destino$id.jpg',status='Revision' WHERE id_pendiente='$id'");
$statement->execute();
$subir=$conexion3->prepare("UPDATE solicitud SET comprobante='$destino$id.jpg'  WHERE id_solicitud='$id'");
$subir->execute();

header('Location: pendientes.php');

}
else {
    echo "<script>javascript: alert('test msgbox')></script>";
    
    header('Location: pendientes.php');
}*/
