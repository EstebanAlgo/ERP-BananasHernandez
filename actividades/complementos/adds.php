<?php

$accion = $_POST['accion'];



switch ($accion) {

  case 'registros':
    $statement = $conexion->prepare('SELECT  MAX(id_registro) FROM registro');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
      $id_mayor = $fila[0] + 1;
    }

    //echo "<script>alert('$id_mayor>$id')</script>";
    if ($id == $id_mayor) {
      $statement = $conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id_unidad'");
      $statement->execute();
      $precios = $statement->fetchAll();
      foreach ($precios as $filas) {
        $precio = $filas['coste'];
      }

      $total = $cantidad * $precio;

      $statement = $conexion->prepare("INSERT INTO registro (id_registro,fecha_actividad,id_origen,cantidad,id_unidad,id_actividad,total,empleado,semana,usuario,fecha_registro) VALUES (NULL,'$fecha','$id_finca','$cantidad','$id_unidad','$id_actividad','$total','$id_empleado','$semana','$id_usuario',NULL)");
      $statement->execute();
      echo "<script>swal('HECHO!', 'La actividad ha sido registrada exitósamente', 'success')</script>";
      $cont++;
    }
    break;


  case 'actividades':
    $statement = $conexion->prepare('SELECT  MAX(id_actividad) FROM actividad');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
      $id_mayor = $fila[0] + 1;
    }

    //echo "<script>alert('$id_mayor>$id')</script>";
    if ($id == $id_mayor) {
      $statement = $conexion->prepare("INSERT INTO actividad (id_actividad,nombre,usuario,fecha_regactividad) VALUES (NULL,'$Nombre','$id_usuario',NULL)");
      $statement->execute();
      $cont++;
    }
    break;
  case 'unidades':
    $statement = $conexion->prepare('SELECT  MAX(id_unidad) FROM unidad');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
      $id_mayor = $fila[0] + 1;
    }


    if ($id == $id_mayor) {
      $Nombre = $_POST['Nombre'];
      $Costo = $_POST['Costo'];
      $Actividad = $_POST['Actividad'];

      $statement = $conexion->prepare("INSERT INTO unidad (id_unidad,nombre,coste,id_actividad,fecha,id_usuario) VALUES (NULL,'$Nombre','$Costo','$Actividad',NULL,'$id_usuario')");
      $statement->execute();
      $cont++;
    }
    break;
  case 'empleados':
    $statement = $conexion->prepare('SELECT  MAX(id_empleado) FROM empleado');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
      $id_mayor = $fila[0] + 1;
    }


    if ($id == $id_mayor) {
      $Nombre = $_POST['Nombre'];
      $P_Apellido = $_POST['P_apellido'];
      $S_Apellido = $_POST['S_apellido'];
      $Cargo = $_POST['Cargo'];
      $Nacimiento = $_POST['Nacimiento'];
      $Telefono = $_POST['Telefono'];
      $Direccion = $_POST['Direccion'];
      $identificacion = $_POST['identificacion'];

      $statement = $conexion->prepare("SELECT  * FROM empleado WHERE identificacion='$identificacion'");
      $statement->execute();
      $identificadores = $statement->fetchAll();
      
      if (empty($identificadores)) {
        $statement = $conexion->prepare("INSERT INTO empleado (id_empleado,cargo,nombre,p_apellido,s_apellido,identificacion,nacimiento,telefono,direccion,photo,fecha,id_usuario) VALUES (NULL,'$Cargo','$Nombre','$P_Apellido','$S_Apellido','$identificacion','$Nacimiento','$Telefono','$Direccion','complementos/empleados/user.JPG',null,'$id_usuario')");
        $statement->execute();
        $cont++;
      } else {
        $cont2++;
      }
    }

    break;
}
