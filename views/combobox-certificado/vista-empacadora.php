 <?php 
     require('../../php/conexion.php');

                         $contador = $_POST['cont'];  
                         $id = $_POST['id'];
                          $statement=$conexion->prepare("SELECT * FROM `origen` WHERE id_origen = '$id'");
                         $statement->execute();
                         $lista_empacadora="";
                         $empacadoras=$statement->fetchAll();
                         foreach ($empacadoras as $fila) {
                              $empacadora=$fila['registro_empacadora'];
                              $lista_empacadora.="<input id='reg_empacadora' class='input_pro' type='text' name='empacadora".$contador."' value='$empacadora'>";
                         }
                         echo $lista_empacadora;

       ?>