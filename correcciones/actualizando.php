 <?php 
    require('../php/conexion.php');

if($_POST)
{
$origen=$_POST['origen'];
$responsiva=$_POST['responsiva'];
$cloro=$_POST['cloro'];
$tipo=$_POST['tipo'];
$piv1=$_POST['piv1'];
$piv2=$_POST['piv2'];
$piv3=$_POST['piv3'];
}

switch ($tipo) {
  case 'origen':
    $actualizar=$conexion->prepare("UPDATE certificados SET folio='$origen' WHERE folio='$piv1'");
    $actualizar->execute();
    $actualizar=$conexion->prepare("UPDATE responsiva SET folio_certificado='$origen' WHERE id_responsiva='$piv2'");
    $actualizar->execute();
    $actualizar=$conexion->prepare("UPDATE constancia_clorinacion SET folio_certificado='$origen' WHERE id_clorinacion='$piv3'");
    $actualizar->execute();
    break;
  case 'responsiva':
    $actualizar=$conexion->prepare("UPDATE responsiva SET id_responsiva='$responsiva',folio_certificado='$origen' WHERE id_responsiva='$piv2'");
    $actualizar->execute();
    break;
  case 'clorinacion':

    $actualizar=$conexion->prepare("UPDATE constancia_clorinacion SET id_clorinacion='$cloro', folio_certificado='$origen' WHERE id_clorinacion='$piv3'");
    $actualizar->execute();
    break;
  
  default:
    # code...
    break;
}


   header('Location: ../correcciones/');

	  ?>
