 <?php 
     require('../../php/conexion.php');

                         $id = $_POST['id'];
                         $lista="";

                         if($id=="remitente")
                         {
                         $statement=$conexion->prepare("SELECT * FROM remitente ORDER BY empresa ASC");
                         $statement->execute();
                         $lista_valores=$statement->fetchAll();
                         foreach ($lista_valores as $fila) {
                              $valor=$fila['empresa'];
                              $lista.="<option value='$valor'>$valor</option>";
                              
                         }
                         }

                         if($id=="origen")
                         {
                              if ($tipo_usuario=="Productor")
                               {
                                   $statement=$conexion->prepare("SELECT *FROM origen WHERE id_productor='$id_usuario' ORDER BY nombre_finca ASC");
                               }   
                               else
                               {
                                   $statement=$conexion->prepare('SELECT *FROM origen ORDER BY nombre_finca ASC');
                               }

                         $statement->execute();
                         $lista_valores=$statement->fetchAll();
                         foreach ($lista_valores as $fila) {
                              $valor=$fila['nombre_finca'];
                              $lista.="<option value='$valor'>$valor</option>";
                              
                         }
                         }

                         if($id=="destino")
                         {
                         $statement=$conexion->prepare("SELECT * FROM destinos ORDER BY destino ASC");
                         $statement->execute();
                         $lista_valores=$statement->fetchAll();
                         foreach ($lista_valores as $fila) {
                              $valor=$fila['destino'];
                              $lista.="<option value='$valor'>$valor</option>";
                              
                         }
                         }

                         if($id=="null")
                         {
                       
                              $lista.="<option value=''>selecciona el tipo de reporte que deseas</option>";
                              
                         
                         }


	                    



                         echo $lista;

	  ?>