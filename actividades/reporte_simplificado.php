<?php  
require('../php/conexion.php');
include('plantillasimplificada.php');

 
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
$pdf->Cell(193, 8, utf8_decode('REPORTE DE COSTE DE ACTIVIDADES'), 0 , 0,'C');
$pdf->SetXY(9, 34);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(193, 8, utf8_decode('"'.finca($conexion,$finca).'"'), 0 , 0,'C');




$pdf->SetXY(10, 47);

    $statement=$conexion->prepare("SELECT * FROM actividad");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
      $nombre_actividad=$fila['nombre'];
    $id_actividad=$fila['id_actividad'];
    $suma=0;

    
    $statement=$conexion->prepare("SELECT * FROM `registro` WHERE `fecha_actividad` BETWEEN '$f1' AND '$f2' AND `id_origen` = $finca AND `id_actividad` = $id_actividad  ORDER BY empleado ASC" );
    $statement->execute();
    $registros=$statement->fetchAll();

    if (count($registros)>0) {  
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetFillColor(145, 190, 248 );
    $pdf->Cell(151,5,utf8_decode($nombre_actividad),1,0,'C',1);
    $pdf->SetFillColor(0,0,0);
    }

    foreach ($registros as $key) 
    { 

     $costo=$key['total'];
     $suma=$suma+$costo;

     }

    if (count($registros)>0) {
     
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetFillColor( 247, 228, 194 );
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