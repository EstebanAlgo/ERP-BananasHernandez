<?php 
require('../php/conexion.php');	

   $certificado=329001;
    
for ($i=0; $i <350 ; $i++) { 
 //echo  $certificado++."<br>";
 $borrar_certificado2=$conexion->prepare("DELETE FROM responsiva WHERE id_responsiva = '$certificado'");
 $borrar_certificado2->execute();
 $certificado++;
}

  // header('Location: certificados.php');

  ?>