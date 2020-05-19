<?php  
require('../php/conexion.php');
include('plantilla2.php');

 
$finca=$_POST['buscar'];
$f1=$_POST['f1'];
$f2=$_POST['f2'];
$sintaxis="";
$leyenda="";
$texto="";

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetXY(174, 18);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20, 6, utf8_decode('PERIODO'), 0 , 0,'C');
$pdf->SetXY(166, 22);
$pdf->SetFont('Arial','',9);
$dia1= substr($f1, 8,2);
$mes1= substr($f1, 5,2);
$año1= substr($f1, 0,4);
$dia2= substr($f2, 8,2);
$mes2= substr($f2, 5,2);
$año2= substr($f2, 0,4);
$pdf->Cell(35, 6, utf8_decode($dia1.'/'.$mes1.'/'.$año1.' - '.$dia2.'/'.$mes2.'/'.$año2) , 0,'C');

$pdf->SetXY(9, 30);
$pdf->SetFont('Arial','',9);
$pdf->Cell(193, 8, utf8_decode('REPORTE DE NÓMINAS'), 0 , 0,'C');
$pdf->SetXY(9, 34);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(193, 8, utf8_decode('"'.finca($conexion,$finca).'"'), 0 , 1,'C');




$pdf->SetXY(10, 47);

    $statement=$conexion->prepare("SELECT * FROM empleado ORDER BY p_apellido ASC");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $nombre=$fila['p_apellido']." ".$fila['s_apellido']." ".$fila['nombre'];
    $empleado=$fila['id_empleado'];
    $cargo=$fila['cargo'];
    $suma=0;

    
    $statement=$conexion->prepare("SELECT * FROM `registro` WHERE `fecha_actividad` BETWEEN '$f1' AND '$f2' AND `id_origen` = $finca AND `empleado` = $empleado  ORDER BY id_unidad ASC" );
    $statement->execute();
    $registros=$statement->fetchAll();

    if (count($registros)>0) {
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetFillColor(77, 167, 211 );
    $pdf->Cell(191,5,utf8_decode($nombre.": ".$cargo),1,1,'L',1);
    $pdf->SetFillColor(0,0,0);
    }

    foreach ($registros as $key) 
    { 
      $id_actividad2=$key['id_actividad'];
         $pdf->SetFont('Arial','',6);
         $actividad=actividad($conexion,$id_actividad2);
         $nombre_finca=finca($conexion,$key['id_origen']);
         $empleado=empleado($conexion,$key['empleado']);
         $unidad=unidad($conexion,$key['id_unidad']);
         $costo=$key['total'];
         $cantidad=$key['cantidad'];
         $precio=precio($conexion,$key['id_unidad']);
         $fecha_actividad=$key['fecha_actividad'];
         $fecha_registro=$key['fecha_registro'];

    
     $pdf->Cell(27,3,utf8_decode($actividad),1,0,'C');
     $pdf->Cell(33,3,utf8_decode($unidad),1,0,'C');
     $pdf->Cell(33,3,utf8_decode($cantidad),1,0,'C');
     $pdf->Cell(33,3,utf8_decode($precio),1,0,'C');
     $pdf->Cell(15,3,utf8_decode("$".$costo),1,0,'C');
     $pdf->Cell(25,3,utf8_decode(substr($fecha_actividad, 8,2)."/".substr($fecha_actividad, 5,2)."/".substr($fecha_actividad, 0,4)),1,0,'C');
     $pdf->Cell(25,3,utf8_decode(substr($fecha_registro, 8,2)."/".substr($fecha_registro, 5,2)."/".substr($fecha_registro, 0,4)),1,1,'C');
     $suma=$suma+$costo;

     }
    if (count($registros)>0) {
     $pdf->Cell(151,5,utf8_decode(""),0,0,'C');
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetFillColor( 211, 154, 77 );
    $pdf->Cell(40,5,utf8_decode("TOTAL:$".$suma),1,1,'R',1);
    $pdf->SetFillColor(0,0,0);
    }

     }

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
function unidad($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
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
    $statement=$conexion->prepare("SELECT * FROM empleado WHERE id_empleado='$id'");
    $statement->execute();
    $resultados=$statement->fetchAll();
      foreach ($resultados as $filas) {
          $resultado=$filas['nombre']." ".$filas['p_apellido']." ".$filas['s_apellido'];
          
      }

return $resultado;
}
function precio($conexion,$id)
{$resultado="";
    $statement=$conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
    $statement->execute();
      $precios=$statement->fetchAll();
      foreach ($precios as $filas) {
          $resultado=$filas['coste'];
          
      }

return $resultado;
}


  ?>