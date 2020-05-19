 <?php 
     require('../../php/conexion.php');
                         $cont = $_POST['cont'];
                         $id = $_POST['id'];
                          $statement=$conexion->prepare("SELECT * FROM `origen` WHERE id_origen = '$id'");
                         $statement->execute();
                         $direccion="";
                         $direcciones=$statement->fetchAll();
                         foreach ($direcciones as $fila) {
                              $municipio=$fila['municipio'];
                              $entidad=$fila['entidad'];
                              $ubicacion=$municipio.', '.$entidad;
                              $direccion.="<input id='direccion' class='input_pro' type='text' name='direccion".$cont."' value='$ubicacion'>";
                         }
                         echo $direccion;

       ?>