<?php 

require('../../php/conexion.php');
$name='';
$filas='';
if ($_POST) {
	# code...

	
	
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $estado=$_POST['estado'];
    $localidad=$_POST['localidad'];
    $licencia=$_POST['licencia'];
         
	$statement=$conexion->prepare("INSERT INTO conductor (id_conductor,nombre,direccion,estado,licencia,localidad) VALUES (NULL,'$nombre','$direccion','$estado','$licencia','$localidad')");
	$statement->execute();
	


}



$statement=$conexion->prepare("SELECT * FROM conductor");
	$statement->execute();
	$table=$statement->fetchAll();
	foreach ($table as $fila) {

			
            $nombre=$fila['nombre'];
            $direccion=$fila['direccion'];
            $estado=$fila['estado'];
            $licencia=$fila['licencia'];

            $filas.="<tr>
			
			
			
			<th>$nombre</th>
            <th>$direccion</th>
            <th>$estado</th>
            <th>$licencia</th>
			</tr>";


			}

$tabla="
<div class='table-responsive'>
                                    <table class='table table-striped color-table inverse-table color-bordered-table inverse-bordered-table'>
                                        <thead>
                                            <tr>
                                                
                                                	<th>nombre</th>
                                                    <th>direccion</th>
                                                    <th>estado</th>
                                                    <th>licencia</th>
            
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

