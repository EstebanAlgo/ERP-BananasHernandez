<?php
require('../../php/conexion.php');

        $proveedor=$_POST['proveedor'];
        $statement = $conexion->prepare("INSERT INTO proveedor (id_proveedor,nombre) VALUES (NULL,'$proveedor')");
        $statement->execute();
        echo $proveedor;

        header('Location: ../solicitud.php');
?>