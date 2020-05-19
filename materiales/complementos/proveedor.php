<?php 

require('../../php/conexion.php');

$name='';
$filas='';
if ($_POST) {
	# code...

	$name=$_POST['nombre'];
	$statement=$conexion->prepare("INSERT INTO proveedor(id_proveedor, nombre) VALUES (NULL,'$name')");
	$statement->execute();

     

}



$statement=$conexion->prepare("SELECT * FROM proveedor");
	$statement->execute();
	$table=$statement->fetchAll();
	foreach ($table as $fila) {
			$nombre=$fila['nombre'];
			$id_proveedor=$fila['id_proveedor'];
			$filas.="<tr>
			<th>$nombre</th>
			<th></th>
			</tr>";


			}

$tabla="
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                <th>Nombre de proveedor</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            $filas
                                        </tbody>
                                    </table>
                                </div>
                           
                        

";

echo $tabla;


 ?>