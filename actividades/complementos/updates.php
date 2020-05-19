<?php
require('../../php/conexion.php');
$accion = $_POST['accion'];

switch ($accion) {
	case 'actividades':
		$nombre = $_POST['nombre'];
		$id = $_POST['id'];
		$actualizar_actividad = $conexion->prepare("UPDATE actividad SET nombre='$nombre' WHERE id_actividad='$id'");
		$actualizar_actividad->execute();
		header('Location: ../actividades.php');
		break;

	case 'actividades_trabajador':
		$abono = $_POST['abono'];
		$id = $_POST['id'];
		$semana = $_POST['semana'];
		$pago=0;
		$statement = $conexion->prepare("SELECT * FROM registro WHERE empleado='$id' AND semana='$semana'");
		$statement->execute();
		$registros = $statement->fetchAll();
		foreach ($registros as $fila) {

			$pago = $pago + $fila['total'];
		}
		$pendiente=$pago-$abono;

		
		$actualizar_actividad = $conexion->prepare("UPDATE pagos SET monto='$pago',pendiente='$pendiente',status='P'  WHERE id_empleado='$id' AND semana='$semana'");
		$actualizar_actividad->execute();
        $statement = $conexion->prepare("SELECT * FROM pagos WHERE id_empleado='$id' AND semana='$semana' LIMIT 1");
		$statement->execute();
		$registros = $statement->fetchAll();
		$RESULTADO="";
		foreach ($registros as $key) {
			$id_empleado = $key['id_empleado'];
			$nombre_empleado = nombre($conexion, $id_empleado);
			$monto = $key['monto'];
			$pendiente = $key['pendiente'];
			$abono = $key['abono'];
			$status = $key['status'];
			$fecha=$key['fecha'];
			$status = "<span class='label label-danger'>POR PAGAR</span>";
			$opciones = "
			<input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
			<input id='monto$id_empleado' type='hidden' value='$monto'>
			   
			 <button data-toggle='modal' data-target='#abono'id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' ><i class='fas fa-donate'></i></button>
			 <button id='$id_empleado' onclick='envio(this.id,event)' class='btn btn-info btn-sm' title='Pagar' ><i class='fas fa-dollar-sign'></i></button>";

			$RESULTADO="<td>$nombre_empleado</td>
			<td>$monto</td>
			<td>$abono</td>
			<td>$pendiente</td>
			<td>$status</td>
			<td>$fecha</td>
			<td>$opciones <a class='btn btn-inverse btn-sm' target='_blank' href='reporte_actividades.php?id=$id_empleado&semana=$semana'>
			<i class='fas fa-address-book'></i></a>
			</td>";
		}
		echo $RESULTADO;
		//header('Location: ../actividades.php');
		break;

	case 'unidades':
		$nombre = $_POST['unidad'];
		$coste = $_POST['Coste'];
		$id_actividad = $_POST['id_actividad'];
		$id = $_POST['id'];
		$actualizar_unidad = $conexion->prepare("UPDATE unidad SET nombre='$nombre', coste='$coste',id_actividad='$id_actividad' WHERE id_unidad='$id'");
		$actualizar_unidad->execute();
		header('Location: ../unidades.php');
		break;

	case 'empleados':
		$nombre = $_POST['nombre'];
		$p_apellido = $_POST['p_apellido'];
		$s_apellido = $_POST['s_apellido'];
		$cargo = $_POST['cargo'];
		$nacimiento = $_POST['nacimiento'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$id = $_POST['id'];
		$actualizar_empleado = $conexion->prepare("UPDATE empleado SET nombre='$nombre', p_apellido='$p_apellido',s_apellido='$s_apellido',cargo='$cargo',nacimiento='$nacimiento',telefono='$telefono',direccion='$direccion' WHERE id_empleado='$id'");
		$actualizar_empleado->execute();
		header('Location: ../empleados.php');
		break;

	case 'registros':
		$id_origen = $_POST['id_origen'];
		$id_actividad = $_POST['id_actividad'];
		$id_unidad = $_POST['id_unidad'];
		$costo = precio($conexion, $id_unidad);
		$id_empleado = $_POST['id_empleado'];
		$cantidad = $_POST['cantidad'];
		$total = $costo * $cantidad;
		$fecha = $_POST['fecha'];
		$id = $_POST['id'];
		$actualizar_empleado = $conexion->prepare("UPDATE registro SET fecha_actividad='$fecha', id_origen='$id_origen',cantidad='$cantidad',id_unidad='$id_unidad',id_actividad='$id_actividad', total='$total',empleado='$id_empleado' WHERE id_registro='$id'");
		$actualizar_empleado->execute();
		header('Location: ../../actividades/');
		echo $id_origen;
		break;
}


?>

 <?php
	function precio($conexion, $id)
	{
		$resultado = "";
		$statement = $conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
		$statement->execute();
		$precios = $statement->fetchAll();
		foreach ($precios as $filas) {
			$resultado = $filas['coste'];
		}

		return $resultado;
	}
	function nombre($conexion, $id_empleado)
                {


                    $statement = $conexion->prepare("SELECT * FROM empleado WHERE id_empleado=$id_empleado");
                    $statement->execute();
                    $empleados = $statement->fetchAll();

                    foreach ($empleados as $fila2) {

                        $nombre = $fila2['nombre'] . " " . $fila2['p_apellido'] . " " . $fila2['s_apellido'];
                    }

                    return $nombre;
                }
	?>