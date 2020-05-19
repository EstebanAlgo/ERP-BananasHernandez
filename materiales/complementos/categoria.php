<?php 

require('../../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
	# code...

	$name=$_POST['nombre'];
	$statement=$conexion->prepare("INSERT INTO categoria(id_categoria, nombre) VALUES (NULL,'$name')");
	$statement->execute();

     

}



$statement=$conexion->prepare("SELECT * FROM categoria");
	$statement->execute();
	$table=$statement->fetchAll();
	foreach ($table as $fila) {
			$categoria=$fila['nombre'];
			$id=$fila['id_categoria'];
			$filas.="<tr>
			<th>$categoria</th>
			<th></th>
			</tr>";


			}

$tabla="
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                <th>Nombre de categoria</th>
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
