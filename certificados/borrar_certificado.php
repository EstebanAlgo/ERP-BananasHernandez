<?php 
require('../php/conexion.php');	

    $id_certificado=$_POST['id_certificado'];

    $statement=$conexion->prepare("SELECT *FROM certificados WHERE id_certificado='$id_certificado'");
    $statement->execute();
    $responsiva=$statement->fetchAll();
     foreach ($responsiva as $fila) 
              {    
              	$certificado=$fila['folio'];
              }
    
                $borrar_certificado=$conexion->prepare("DELETE FROM certificados WHERE id_certificado = '$id_certificado'");
                $borrar_certificado->execute();

                $borrar_certificado2=$conexion->prepare("DELETE FROM responsiva WHERE folio_certificado = '$certificado'");
                $borrar_certificado2->execute(); 
  
                $borrar_certificado3=$conexion->prepare("DELETE FROM constancia_clorinacion WHERE folio_certificado = '$certificado'");
                $borrar_certificado3->execute(); 
       

   header('Location: certificados.php');


  ?>