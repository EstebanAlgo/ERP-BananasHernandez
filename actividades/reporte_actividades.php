<?php  
require('../php/conexion.php');
include('plantilla3.php');

 
$id=$_GET['id'];
$semana=$_GET['semana'];
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


$pdf->SetXY(9, 30);
$pdf->SetFont('Arial','I',9);
$pdf->Cell(193, 8, utf8_decode('REPORTE DE ACTIVIDADES REALIZADAS POR EL TRABAJADOR'), 0 , 0,'C');
$pdf->SetXY(9, 34);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(193, 8, utf8_decode(empleado($conexion,$id)), 0 , 0,'C');




$pdf->SetXY(10, 47);
$suma_total=0;

    $statement=$conexion->prepare("SELECT * FROM origen");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $finca=$fila['nombre_finca'];
    $id_finca=$fila['id_origen'];
    $suma=0;

      
    $statement=$conexion->prepare("SELECT * FROM registro WHERE empleado='$id' AND semana = '$semana' AND id_origen='$id_finca'  ORDER BY fecha_actividad ASC" );
    $statement->execute();
    $registros=$statement->fetchAll();

    if (count($registros)>0) {
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetFillColor(77, 167, 211 );
    $pdf->Cell(191,5,utf8_decode("Finca: ".$finca),1,1,'L',1);
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

    
     $pdf->Cell(92,3,utf8_decode($actividad),1,0,'C');
     $pdf->Cell(20,3,utf8_decode($unidad),1,0,'C');
     $pdf->Cell(22,3,utf8_decode($cantidad),1,0,'C');
     $pdf->Cell(22,3,utf8_decode($precio),1,0,'C');
     $pdf->Cell(15,3,utf8_decode("$".$costo),1,0,'C');
     $pdf->Cell(20,3,utf8_decode(substr($fecha_actividad, 8,2)."/".substr($fecha_actividad, 5,2)."/".substr($fecha_actividad, 0,4)),1,1,'C');
     $suma=$suma+$costo;

     }
    if (count($registros)>0) {
     $pdf->Cell(151,5,utf8_decode(""),0,0,'C');
    $pdf->SetFont('Arial','B',9);   
    $pdf->SetFillColor( 211, 154, 77 );
    $pdf->Cell(40,5,utf8_decode("Total:$".$suma),1,1,'R',1);
    $pdf->SetFillColor(0,0,0);
    $suma_total=$suma_total+$suma;
    }

     }

    $pdf->SetFont('Arial','B',11); 
    $pdf->SetFillColor( 220, 238, 242 );
    $pdf->Cell(90,8,utf8_decode("TOTAL A PAGAR EN LA SEMANA ".$semana.":$ ".$suma_total),0,1,'L',1);

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