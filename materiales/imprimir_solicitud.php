<?php  
require('../php/conexion.php');
include('plantilla.php');

 
$finca=$_POST['finca'];
$fecha=$_POST['fecha'];
$solicitante=$_POST['solicitante'];
$sintaxis="";
$leyenda="";
$texto="";

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();



$pdf->SetXY(122, 38);
$pdf->SetTextColor(  252, 95, 45);
$pdf->SetFont('Arial','B',12);
$dia1= substr($fecha, 8,2);
$mes1= substr($fecha, 5,2);
$año1= substr($fecha, 0,4);

$pdf->SetFont('Arial','B',11);
$pdf->SetXY(33, 62);
$pdf->Cell(63, 6, utf8_decode(empleado($conexion,$solicitante)), 0 , 0,'');
$pdf->SetXY(32, 67);
$pdf->Cell(63, 6, utf8_decode(tipo_usuario($conexion,$solicitante)), 0 , 0,'');
$pdf->SetXY(28, 72);
$pdf->Cell(63, 6, utf8_decode(finca($conexion,$finca)), 0 , 0,'');

$pdf->SetTextColor(252, 95, 45);
$pdf->SetFont('Arial','B',13);
$pdf->SetXY(115, 68);
$pdf->Cell(63, 6, utf8_decode("N° Solicitud:"), 0 , 0,'');
$pdf->SetXY(115, 74);
$pdf->Cell(63, 6, utf8_decode("FECHA: ".$dia1.'/'.$mes1.'/'.$año1), 0 , 0,'');

$pdf->SetFillColor( 254, 254, 254 );
$pdf->SetTextColor(  0, 0, 0);



$pdf->SetXY(10, 91);

    $statement=$conexion->prepare("SELECT * FROM usuarios WHERE id_usuario=$solicitante");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $nombre=$fila['nombre']." ".$fila['p_apellido']." ".$fila['p_apellido'];

    
    $statement=$conexion->prepare("SELECT * FROM `solicitud` WHERE `id_finca` = $finca AND `fecha` = '$fecha' AND `usuario` = $solicitante " );
    $statement->execute();
    $registros=$statement->fetchAll();

    foreach ($registros as $key) 
    { 
         $id_material=$key['id_material'];
         $material=material($conexion,$id_material);
         $cantidad=$key['cantidad'];
         $codigo=codigo($conexion,$id_material);
         $unidad=unidad($conexion,$id_material);
         $descripcion=descripcion($conexion,$id_material);
         $fecha_actividad=$key['fecha'];
     $pdf->SetFont('Arial','',8);
     $pdf->Cell(35,10,utf8_decode($material),1,0,'C',1);
     $pdf->Cell(18,10,utf8_decode($cantidad),1,0,'C',1);
     $pdf->Cell(20,10,utf8_decode($unidad),1,0,'C',1);
     $pdf->Cell(25,10,utf8_decode($codigo),1,0,'C',1);
     $pdf->Cell(93,10,utf8_decode($descripcion),1,1,'C',1);

     }
   
     }



$pdf->SetFont('Arial','B',12);
$pdf->Line(25, 253, 95, 253);
$pdf->SetXY(25, 255);
$pdf->Cell(70, 6, utf8_decode("SOLICITANTE:"), 0 , 0,'C');
$pdf->SetXY(25, 260);
$pdf->Cell(70, 6, utf8_decode(empleado($conexion,$solicitante)), 0 , 0,'C');

$pdf->Line(112, 253, 182, 253);
$pdf->SetXY(112, 255);
$pdf->Cell(70, 6, utf8_decode("AUTORIZÓ:"), 0 , 0,'C');
$pdf->SetXY(112, 260);
$pdf->Cell(70, 6, utf8_decode("Victor Antonio Hernández Hernández"), 0 , 0,'C');


$pdf->SetFillColor( 254, 254, 254 );
$pdf->SetTextColor(  0, 0, 0);


$pdf->Output();


?>
<?php 
function finca($conexion,$id)
{ $resultado="";
    $statement=$conexion->prepare("SELECT * FROM origen WHERE id_origen='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre_finca'];
          
      }

return $resultado;
}
function material($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre'];
          
      }

return $resultado;
}
function actividad($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM actividad WHERE id_actividad='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre'];
          
      }

return $resultado;
}
function empleado($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM usuarios WHERE id_usuario='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre']." ".$filas['p_apellido']." ".$filas['s_apellido'];
          
      }

return $resultado;
}
function tipo_usuario($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM usuarios WHERE id_usuario='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['tipo_usuario'];
          
      }

return $resultado;
}

function codigo($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
      $precios=$statement->fetchAll();
      foreach ($precios as $filas) {
          $resultado=$filas['codigo_producto'];
          
      }

return $resultado;
}

function unidad($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
      $precios=$statement->fetchAll();
      foreach ($precios as $filas) {
          $resultado=$filas['unidad'];
          
      }

return $resultado;
}

function descripcion($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
      $precios=$statement->fetchAll();
      foreach ($precios as $filas) {
          $resultado=$filas['descripcion'];
          
      }

return $resultado;
}

  ?>