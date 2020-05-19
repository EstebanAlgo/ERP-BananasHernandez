 <?php 
 session_start();
 $cont_alerta=0;
 $id_usuario=0;
 $footer="© 2019 Bananas Hernández";
 date_default_timezone_set('Mexico/General');
     try {

	$conexion= new PDO('mysql:host=localhost;dbname=bananashernandez','root','');
	
         } 
     catch (PDOException $e) {
         	echo "Error: ".$e->getMessage();
         }

      ?>

	
	<?php 
				if (isset($_SESSION['usuario'])) //comprobar si existe una sesión abierta
					{
					     $user=$_SESSION['usuario'];
						 $statement=$conexion->prepare('SELECT *FROM usuarios WHERE usuario=:user');
                         $statement->execute( array(':user' => $user));
                         $usuarios=$statement->fetchAll();

                         foreach ($usuarios as $fila) //Obtener datos de usuario-----------------------------------------------------
                         { 
	                         $id_usuario=$fila['id_usuario'];
                             $usuario=$fila['usuario'];
                             $nombre=$fila['nombre'];
                             $p_apellido=$fila['p_apellido'];
                             $s_apellido=$fila['s_apellido'];
                             $tipo_usuario=$fila['tipo_usuario'];
                             $rfc=$fila['rfc'];
                             $fecha_registro=$fila['fecha_registro'];
                             $nacimiento=$fila['nacimiento'];
                             $correo=$fila['correo'];
                             $telefono=$fila['telefono'];
                             $ciudad=$fila['ciudad'];
                             $direccion=$fila['direccion'];
                             $tema=$fila['tema'];
                         }

					}

					else
						{
							$tipo_usuario="null";
						}

                        $statement=$conexion->prepare("SELECT *FROM alertas WHERE destinatario='$id_usuario'");
                         $statement->execute();
                         $alertas=$statement->fetchAll();

                         foreach ($alertas as $fila) //Obtener datos de usuario-----------------------------------------------------
                         { 
                             $id_alerta[$cont_alerta]=$fila['id'];
                             $emisario[$cont_alerta]=$fila['emisario'];
                             $id_emisario[$cont_alerta]=$fila['emisario'];
                             $destinatario[$cont_alerta]=$fila['destinatario'];
                             $mensaje[$cont_alerta]=$fila['mensaje'];
                             $status[$cont_alerta]=$fila['status'];
                             $titulo[$cont_alerta]=$fila['titulo'];
                             $fecha[$cont_alerta]=$fila['fecha'];
                             

                         $statement=$conexion->prepare("SELECT *FROM usuarios WHERE id_usuario='$emisario[$cont_alerta]'");
                         $statement->execute();
                         $usuarios_emisor=$statement->fetchAll();

                         foreach ($usuarios_emisor as $fila) //Obtener datos de usuario-----------------------------------------------------
                         { 
                             
                             $emisario[$cont_alerta]=$fila['empresa'];
                         }
                         $cont_alerta++;
                         }
                         
	 ?>


	