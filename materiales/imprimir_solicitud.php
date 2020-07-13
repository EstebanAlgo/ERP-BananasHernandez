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
$pdf->SetFont('Arial','B',13);
$dia1= substr($fecha, 8,2);
$mes1= substr($fecha, 5,2);
$año1= substr($fecha, 0,4);
$pdf->SetXY(7, 36);
$pdf->Cell(190, 6, utf8_decode("SOLICITUD DE MATERIAL"), 0 , 0,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(10, 40);
$pdf->Cell(63, 6, utf8_decode(empleado($conexion,$solicitante)), 0 , 0,'');
$pdf->SetXY(10, 43);
$pdf->Cell(63, 6, utf8_decode(tipo_usuario($conexion,$solicitante)), 0 , 0,'');
$pdf->SetXY(10, 47);
$pdf->Cell(63, 6, utf8_decode('FINCA: '.finca($conexion,$finca)), 0 , 0,'');

$pdf->SetTextColor(102, 113, 113);
$pdf->SetFont('Arial','B',11);

$pdf->SetXY(150, 44);
$pdf->Cell(50, 6, utf8_decode($dia1.'/'.$mes1.'/'.$año1), 0 , 0,'R');

$pdf->SetFillColor( 254, 254, 254 );
$pdf->SetTextColor(  0, 0, 0);



$pdf->SetXY(10, 59);

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
        $id_solicitud=$key['id_solicitud'];
         $id_material=$key['id_material'];
         $material=material($conexion,$id_material);
         $solicitud=solicitud($conexion,$id_material);
         $cantidad=$key['cantidad'];
         $codigo=codigo($conexion,$id_material);
         $unidad=unidad($conexion,$id_material);
         $descripcion=descripcion($conexion,$id_material);
         $fecha_actividad=$key['fecha'];
     $pdf->SetFont('Arial','',7);
     $pdf->Cell(20,6,'SM'.$id_solicitud,1,0,'C',1);
     $pdf->Cell(30,6,utf8_decode($material),1,0,'C',1);
     $pdf->Cell(16,6,utf8_decode($cantidad),1,0,'C',1);
     $pdf->Cell(16,6,utf8_decode($unidad),1,0,'C',1);
     $pdf->Cell(18,6,utf8_decode($codigo),1,0,'C',1);
     $pdf->Cell(90,6,utf8_decode($descripcion),1,1,'C',1);

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
function solicitud($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['codigo_producto'];
          
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