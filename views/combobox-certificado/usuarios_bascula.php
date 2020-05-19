 <?php 
     require('../../php/conexion.php');

                         
	                    $statementusuarios=$conexion->prepare("SELECT * FROM `usuarios` WHERE tipo_usuario = 'Bascula'");
                         $statementusuarios->execute();
                         $lista_usuarios="";
                         $usuarios=$statementusuarios->fetchAll();
                         foreach ($usuarios as $fila) {
                              $nombre=$fila['nombre'];
                              $p_apellido=$fila['p_apellido'];
                              $s_apellido=$fila['s_apellido'];
                         	$lista_usuarios.="<option value='$nombre $p_apellido $s_apellido'>$nombre $p_apellido $s_apellido</option>";
                         }
                         echo $lista_usuarios;

	  ?>