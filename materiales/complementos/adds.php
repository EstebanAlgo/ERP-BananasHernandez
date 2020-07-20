<?php

switch ($accion) {
  case 'productos':
    $statement = $conexion->prepare('SELECT  MAX(id_material) FROM material');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
      $id_mayor = $fila[0] + 1;
    }
    //echo "<script>alert('$id_mayor>$id')</script>";
    if ($id == $id_mayor) {
      # code...
      $fecha = $_POST['fecha'];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $unidad = $_POST['unidad'];
      $limite = $_POST['limite'];
      $categoria = $_POST['categoria'];
      $nombre_may = strtoupper($nombre);
      $statement = $conexion->prepare('SELECT  MAX(id_material) FROM material');
      $statement->execute();
      $constancia = $statement->fetchAll();
      foreach ($constancia as $fila) {
        $max_material = $fila[0] + 1;
      }
      $codigo = "N" . substr($nombre_may, 0, 3) . "IDM" . $max_material . "CA" . $categoria;
      $statement = $conexion->prepare("INSERT INTO material (id_material,nombre,id_categoria,unidad,descripcion,limite,fecha_alta,fecha_registro,codigo_producto,usuario) VALUES (NULL,'$nombre','$categoria','$unidad','$descripcion','$limite','$fecha',NULL,'$codigo','$id_usuario')");
      $statement->execute();
      $cont++;
    }
    break;

  case 'categorias':
    $id=$_POST['id'];
    $statement = $conexion->prepare('SELECT  MAX(id_categoria) FROM categoria');
    $statement->execute();
    $constancia = $statement->fetchAll();
    foreach ($constancia as $fila) {
      $id_mayor = $fila[0] + 1;
    }
    #echo "<script>alert('$id_mayor==$id')</script>";
    if ($id == $id_mayor) {
      # code...
      $name=$_POST['categoria'];
      $statement=$conexion->prepare("INSERT INTO categoria(id_categoria, nombre) VALUES (NULL,'$name')");
      $statement->execute();
      $cont2++;
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

      $statement = $conexion->prepare("INSERT INTO empleado (id_empleado,cargo,nombre,p_apellido,s_apellido,nacimiento,telefono,direccion,fecha,id_usuario) VALUES (NULL,'$Cargo','$Nombre','$P_Apellido','$S_Apellido','$Nacimiento','$Telefono','$Direccion',null,'$id_usuario')");
      $statement->execute();
      $cont++;
    }

    break;
    case 'proveedor':
       $proveedor=$_POST['nombre'];
        $statement = $conexion->prepare("INSERT INTO empleado (id_empleado,cargo,nombre,p_apellido,s_apellido,nacimiento,telefono,direccion,fecha,id_usuario) VALUES (NULL,'$Cargo','$Nombre','$P_Apellido','$S_Apellido','$Nacimiento','$Telefono','$Direccion',null,'$id_usuario')");
        $statement->execute();
        
      break;
}
