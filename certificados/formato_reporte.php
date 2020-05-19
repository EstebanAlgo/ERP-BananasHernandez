<?php  
require('../php/conexion.php');
include('plantilla.php');

 
$tipo=$_POST['reporte'];
$valor=$_POST['buscar'];
$f1=$_POST['fecha1'];
$f2=$_POST['fecha2'];
$sintaxis="";
$leyenda="";
$texto="";

if($tipo=="remitente")
{
    $leyenda='Todos los certificados del remitente <b> "'.$tipo.'"</b> que comprenden de la fecha '.$f1.' hasta ' .$f2; 
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND remitente LIKE '%$valor%'  ORDER BY fecha_registro DESC";
    $texto="REMITENTES";
}

if($tipo=="origen")
{
    $leyenda='Todos los certificados del origen <b> "'.$tipo.'"</b> que comprenden de la fecha '.$f1.' hasta ' .$f2;
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND origen LIKE '%$valor%' ORDER BY fecha_registro DESC";
    $texto="ORIGENES";
}

if($tipo=="destino")
{
    $leyenda='Todos los certificados del destino <b> "'.$tipo.'"</b> que comprenden de la fecha '.$f1.' hasta ' .$f2; 
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND destino LIKE '%$valor%' ORDER BY fecha_registro DESC";
    $texto="DESTINOS";
}


if($tipo=="remitente")//FORMATO TIPO REMITENTE-----------------------------------------------------------------------
{
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
$pdf->Cell(193, 8, utf8_decode('REPORTES POR MEDIO DE  '.$texto.' CUANDO ESTE ES'), 0 , 0,'C');
$pdf->SetXY(9, 34);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(193, 8, utf8_decode('"'.$valor.'"'), 0 , 0,'C');


$pdf->SetXY(10, 41);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(12,6,utf8_decode('FOLIO'),1,0,'C',1);
$pdf->Cell(20,6,utf8_decode('VARIEDAD'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('ENVASE'),1,0,'C',1);
$pdf->Cell(19,6,utf8_decode('CANTIDAD'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('P/UNIT'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('P/TOTAL'),1,0,'C',1);
$pdf->Cell(29,6,utf8_decode('ORIGEN'),1,0,'C',1);
$pdf->Cell(35,6,utf8_decode('DESTINO'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('FECHA'),1,1,'C',1);
$pdf->SetXY(10, 45);
$pdf->SetFont('Arial','B',5 );
$pdf->Cell(190,2,utf8_decode('                                                                                                                                    En Unidades              Kg por pieza              En Kg'),0,1,1);


    $pdf->SetFont('Arial','',6);
    $contador=0;
    $statement=$conexion->prepare($sintaxis);
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
       $folio[$contador]=$fila['folio'];
       $cad_variedades[$contador]=$fila['variedad'];
       $cad_envases[$contador]=$fila['envase'];
       $cad_cantidades[$contador]=$fila['cantidad'];
       $cad_pesos[$contador]=$fila['peso'];
       $cad_volumenes[$contador]=$fila['volumen'];
       $cad_destino[$contador]=$fila['destino'];
       $cad_origen[$contador]=$fila['origen'];
       $cad_remitente[$contador]=$fila['remitente'];
       $fecha[$contador]=$fila['fecha_registro'];
       $contador++;
     }


    
     $volumen=0;
     $origenes="";
     for ($i=0; $i < $contador ; $i++) 
     { 
     $cadena_buscada   = ')';
     $coincidencia_variedad = strpos($cad_variedades[$i], $cadena_buscada);//encontrar la coincidencia
     $cont_productos= substr($cad_variedades[$i], 1,$coincidencia_variedad-1);//extraccón del número de iteraciones
     $tamaño_variedad=strlen($cad_variedades[$i]);
     $cad_variedades[$i]=substr($cad_variedades[$i],$coincidencia_variedad+1,$tamaño_variedad);

     $coincidencia_origen = strpos($cad_origen[$i], $cadena_buscada);//encontrar la coincidencia
     $cont_origen= substr($cad_origen[$i], 1,$coincidencia_origen-1);//extraccón del número de iteraciones
     $tamaño_origen=strlen($cad_origen[$i]);
     $cad_origen[$i]=substr($cad_origen[$i],$coincidencia_origen+1,$tamaño_origen);


       
     for ($x=0; $x<$cont_productos; $x++) 
     { 
      $cadena_buscada   = ']';
      $coincidencia_variedad = strpos($cad_variedades[$i], $cadena_buscada);
      $coincidencia_envase = strpos($cad_envases[$i], $cadena_buscada);
      $coincidencia_cantidad = strpos($cad_cantidades[$i], $cadena_buscada);
      $coincidencia_peso = strpos($cad_pesos[$i], $cadena_buscada);
      $coincidencia_volumen = strpos($cad_volumenes[$i], $cadena_buscada);

      $tamaño_variedad=strlen($cad_variedades[$i]);
      $tamaño_envase=strlen($cad_envases[$i]);
      $tamaño_cantidad=strlen($cad_cantidades[$i]);
      $tamaño_peso=strlen($cad_pesos[$i]);
      $tamaño_volumen=strlen($cad_volumenes[$i]);

      $pivotevariedad= substr($cad_variedades[$i], 1,$coincidencia_variedad-1);
      $pivoteenvase= substr($cad_envases[$i], 1,$coincidencia_envase-1);
      $pivotecantidad= substr($cad_cantidades[$i], 1,$coincidencia_cantidad-1);
      $pivotepeso= substr($cad_pesos[$i], 1,$coincidencia_peso-1);
      $pivotevolumen= substr($cad_volumenes[$i], 1,$coincidencia_volumen-1);

      $coincidencia_origen = strpos($cad_origen[$i], $cadena_buscada);
      $tamaño_origen=strlen($cad_origen[$i]);
      $pivoteorigen= substr($cad_origen[$i], 1,$coincidencia_origen-1);
      $cad_origen[$i]=substr($cad_origen[$i],$coincidencia_origen+1,$tamaño_origen);


      $volumen=$volumen+$pivotevolumen;

      $m_variedad[$x]=$pivotevariedad;
      $m_envase[$x]=$pivoteenvase;
      $m_cantidad[$x]=$pivotecantidad;
      $m_peso[$x]=$pivotepeso;
      $m_origenes[$x]=$pivoteorigen;
       
   
      $cad_variedades[$i]=substr($cad_variedades[$i],$coincidencia_variedad+1,$tamaño_variedad);
      $cad_envases[$i]=substr($cad_envases[$i],$coincidencia_envase+1,$tamaño_envase);
      $cad_cantidades[$i]=substr($cad_cantidades[$i],$coincidencia_cantidad+1,$tamaño_cantidad);
      $cad_pesos[$i]=substr($cad_pesos[$i],$coincidencia_peso+1,$tamaño_peso);
      $cad_volumenes[$i]=substr($cad_volumenes[$i],$coincidencia_volumen+1,$tamaño_volumen);
      
     }
    
     $dia= substr($fecha[$i], 8,2);
     $mes= substr($fecha[$i], 5,2);
     $año= substr($fecha[$i], 0,4);
      
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(20,3,utf8_decode($m_variedad[0]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[0]),1,0,'C');
     $pdf->Cell(19,3,utf8_decode($m_cantidad[0]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_peso[0]),1,0,'C');
     $pesototal=$m_cantidad[0]*$m_peso[0];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->Cell(29,3,utf8_decode($m_origenes[0]),1,0,'C');
     $pdf->Cell(35,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
      
     if($cont_productos>1)
     {
     $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(20,3,utf8_decode($m_variedad[1]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[1]),1,0,'C');
     $pdf->Cell(19,3,utf8_decode($m_cantidad[1]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_peso[1]),1,0,'C');
     $pesototal=$m_cantidad[1]*$m_peso[1];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->Cell(29,3,utf8_decode($m_origenes[1]),1,0,'C');
     $pdf->Cell(35,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');

     if($cont_productos>2)
     {
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(20,3,utf8_decode($m_variedad[2]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[2]),1,0,'C');
     $pdf->Cell(19,3,utf8_decode($m_cantidad[2]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_peso[2]),1,0,'C');
     $pesototal=$m_cantidad[2]*$m_peso[2];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->Cell(29,3,utf8_decode($m_origenes[2]),1,0,'C');
     $pdf->Cell(35,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');

         if($cont_productos>3)
            {
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(20,3,utf8_decode($m_variedad[3]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[3]),1,0,'C');
     $pdf->Cell(19,3,utf8_decode($m_cantidad[3]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_peso[3]),1,0,'C');
     $pesototal=$m_cantidad[3]*$m_peso[3];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->Cell(29,3,utf8_decode($m_origenes[3]),1,0,'C');
     $pdf->Cell(35,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
                 if($cont_productos>4)
     {
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(20,3,utf8_decode($m_variedad[4]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[4]),1,0,'C');
     $pdf->Cell(19,3,utf8_decode($m_cantidad[4]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_peso[4]),1,0,'C');
     $pesototal=$m_cantidad[4]*$m_peso[4];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->Cell(29,3,utf8_decode($m_origenes[4]),1,0,'C');
     $pdf->Cell(35,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');    
     }


       }

     }

     }

     $origenes="";
     $volumen=0;

     }


$pdf->Output();

}

if($tipo=="origen")
{
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
$pdf->Cell(193, 8, utf8_decode('REPORTES POR MEDIO DE  '.$texto.' CUANDO ESTE ES'), 0 , 0,'C');
$pdf->SetXY(9, 34);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(193, 8, utf8_decode('"'.$valor.'"'), 0 , 0,'C');


$pdf->SetXY(10, 41);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,utf8_decode('FOLIO'),1,0,'C',1);
$pdf->Cell(17,6,utf8_decode('VARIEDAD'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('ENVASE'),1,0,'C',1);
$pdf->Cell(17,6,utf8_decode('CANTIDAD'),1,0,'C',1);
$pdf->Cell(14,6,utf8_decode('P/UNIT'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('P/TOTAL'),1,0,'C',1);
$pdf->Cell(45,6,utf8_decode('REMITENTE'),1,0,'C',1);
$pdf->Cell(32,6,utf8_decode('DESTINO'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('FECHA'),1,1,'C',1);
$pdf->SetXY(10, 45);
$pdf->SetFont('Arial','B',5 );
$pdf->Cell(190,2,utf8_decode('                                                                                                               En Unidades         Kg por pieza              En Kg'),0,1,1);


    $pdf->SetFont('Arial','',6);
    $contador=0;
    $statement=$conexion->prepare($sintaxis);
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
       $folio[$contador]=$fila['folio'];
       $cad_variedades[$contador]=$fila['variedad'];
       $cad_envases[$contador]=$fila['envase'];
       $cad_cantidades[$contador]=$fila['cantidad'];
       $cad_pesos[$contador]=$fila['peso'];
       $cad_volumenes[$contador]=$fila['volumen'];
       $cad_destino[$contador]=$fila['destino'];
       $cad_origen[$contador]=$fila['origen'];
       $cad_remitente[$contador]=$fila['remitente'];
       $fecha[$contador]=$fila['fecha_registro'];
       $contador++;
     }


    
     $volumen=0;
     $origenes="";
     for ($i=0; $i < $contador ; $i++) 
     { 
     $cadena_buscada   = ')';
     $coincidencia_variedad = strpos($cad_variedades[$i], $cadena_buscada);//encontrar la coincidencia
     $cont_productos= substr($cad_variedades[$i], 1,$coincidencia_variedad-1);//extraccón del número de iteraciones
     $tamaño_variedad=strlen($cad_variedades[$i]);
     $cad_variedades[$i]=substr($cad_variedades[$i],$coincidencia_variedad+1,$tamaño_variedad);

     $coincidencia_origen = strpos($cad_origen[$i], $cadena_buscada);//encontrar la coincidencia
     $cont_origen= substr($cad_origen[$i], 1,$coincidencia_origen-1);//extraccón del número de iteraciones
     $tamaño_origen=strlen($cad_origen[$i]);
     $cad_origen[$i]=substr($cad_origen[$i],$coincidencia_origen+1,$tamaño_origen);


       
     for ($x=0; $x<$cont_productos; $x++) 
     { 
      $cadena_buscada   = ']';
      $coincidencia_variedad = strpos($cad_variedades[$i], $cadena_buscada);
      $coincidencia_envase = strpos($cad_envases[$i], $cadena_buscada);
      $coincidencia_cantidad = strpos($cad_cantidades[$i], $cadena_buscada);
      $coincidencia_peso = strpos($cad_pesos[$i], $cadena_buscada);
      $coincidencia_volumen = strpos($cad_volumenes[$i], $cadena_buscada);

      $tamaño_variedad=strlen($cad_variedades[$i]);
      $tamaño_envase=strlen($cad_envases[$i]);
      $tamaño_cantidad=strlen($cad_cantidades[$i]);
      $tamaño_peso=strlen($cad_pesos[$i]);
      $tamaño_volumen=strlen($cad_volumenes[$i]);

      $pivotevariedad= substr($cad_variedades[$i], 1,$coincidencia_variedad-1);
      $pivoteenvase= substr($cad_envases[$i], 1,$coincidencia_envase-1);
      $pivotecantidad= substr($cad_cantidades[$i], 1,$coincidencia_cantidad-1);
      $pivotepeso= substr($cad_pesos[$i], 1,$coincidencia_peso-1);
      $pivotevolumen= substr($cad_volumenes[$i], 1,$coincidencia_volumen-1);

      $coincidencia_origen = strpos($cad_origen[$i], $cadena_buscada);
      $tamaño_origen=strlen($cad_origen[$i]);
      $pivoteorigen= substr($cad_origen[$i], 1,$coincidencia_origen-1);
      $cad_origen[$i]=substr($cad_origen[$i],$coincidencia_origen+1,$tamaño_origen);


      $volumen=$volumen+$pivotevolumen;

      $m_variedad[$x]=$pivotevariedad;
      $m_envase[$x]=$pivoteenvase;
      $m_cantidad[$x]=$pivotecantidad;
      $m_peso[$x]=$pivotepeso;
      $m_origenes[$x]=$pivoteorigen;
       
   
      $cad_variedades[$i]=substr($cad_variedades[$i],$coincidencia_variedad+1,$tamaño_variedad);
      $cad_envases[$i]=substr($cad_envases[$i],$coincidencia_envase+1,$tamaño_envase);
      $cad_cantidades[$i]=substr($cad_cantidades[$i],$coincidencia_cantidad+1,$tamaño_cantidad);
      $cad_pesos[$i]=substr($cad_pesos[$i],$coincidencia_peso+1,$tamaño_peso);
      $cad_volumenes[$i]=substr($cad_volumenes[$i],$coincidencia_volumen+1,$tamaño_volumen);
      
     }



     

    
     $dia= substr($fecha[$i], 8,2);
     $mes= substr($fecha[$i], 5,2);
     $año= substr($fecha[$i], 0,4);
      
      if($m_origenes[0]==$valor)
      {
     $pdf->Cell(10,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_variedad[0]),1,0,'C');
     $pdf->Cell(25,3,utf8_decode($m_envase[0]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_cantidad[0]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_peso[0]),1,0,'C');
     $pesototal=$m_cantidad[0]*$m_peso[0];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',4.8);
     $pdf->Cell(45,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(32,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');

      }

    
      
     if($cont_productos>1)
     {
          if($m_origenes[1]==$valor){
     $pdf->Cell(10,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_variedad[1]),1,0,'C');
     $pdf->Cell(25,3,utf8_decode($m_envase[1]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_cantidad[1]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_peso[1]),1,0,'C');
     $pesototal=$m_cantidad[1]*$m_peso[1];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',4.8);
     $pdf->Cell(45,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(32,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
     }

     if($cont_productos>2)
     {
          if($m_origenes[2]==$valor){
     $pdf->Cell(10,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_variedad[2]),1,0,'C');
     $pdf->Cell(25,3,utf8_decode($m_envase[2]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_cantidad[2]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_peso[2]),1,0,'C');
     $pesototal=$m_cantidad[2]*$m_peso[2];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',4.8);
     $pdf->Cell(45,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(32,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
       }
         if($cont_productos>3)
            {
               if($m_origenes[3]==$valor){
      $pdf->Cell(10,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_variedad[3]),1,0,'C');
     $pdf->Cell(25,3,utf8_decode($m_envase[3]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_cantidad[3]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_peso[3]),1,0,'C');
     $pesototal=$m_cantidad[3]*$m_peso[3];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',4.8);
     $pdf->Cell(45,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(32,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
      }
                 if($cont_productos>4)
     {
          if($m_origenes[1]==$valor){
      $pdf->Cell(10,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_variedad[4]),1,0,'C');
     $pdf->Cell(25,3,utf8_decode($m_envase[4]),1,0,'C');
     $pdf->Cell(17,3,utf8_decode($m_cantidad[4]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_peso[4]),1,0,'C');
     $pesototal=$m_cantidad[4]*$m_peso[4];
     $pdf->Cell(15,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',4.8);
     $pdf->Cell(45,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(32,3,utf8_decode($cad_destino[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
      }    
     }


       }

     }

     }

     $origenes="";
     $volumen=0;

     }


$pdf->Output();

}

if($tipo=="destino")//FORMATO TIPO REMITENTE-----------------------------------------------------------------------
{
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
$pdf->Cell(193, 8, utf8_decode('REPORTES POR MEDIO DE  '.$texto.' CUANDO ESTE ES'), 0 , 0,'C');
$pdf->SetXY(9, 34);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(193, 8, utf8_decode('"'.$valor.'"'), 0 , 0,'C');


$pdf->SetXY(10, 41);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',7 );
$pdf->Cell(12,6,utf8_decode('FOLIO'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('VARIEDAD'),1,0,'C',1);
$pdf->Cell(30,6,utf8_decode('ENVASE'),1,0,'C',1);
$pdf->Cell(14,6,utf8_decode('CANTIDAD'),1,0,'C',1);
$pdf->Cell(12,6,utf8_decode('P/UNIT'),1,0,'C',1);
$pdf->Cell(12,6,utf8_decode('P/TOTAL'),1,0,'C',1);
$pdf->Cell(55,6,utf8_decode('REMITENTE'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('ORIGEN'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('FECHA'),1,1,'C',1);
$pdf->SetXY(10, 45);
$pdf->SetFont('Arial','B',5 );
$pdf->Cell(190,2,utf8_decode('                                                                                                                      En Unidades     Kg por pieza        En Kg'),0,1,1);


    $pdf->SetFont('Arial','',6);
    $contador=0;
    $statement=$conexion->prepare($sintaxis);
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
       $folio[$contador]=$fila['folio'];
       $cad_variedades[$contador]=$fila['variedad'];
       $cad_envases[$contador]=$fila['envase'];
       $cad_cantidades[$contador]=$fila['cantidad'];
       $cad_pesos[$contador]=$fila['peso'];
       $cad_volumenes[$contador]=$fila['volumen'];
       $cad_destino[$contador]=$fila['destino'];
       $cad_origen[$contador]=$fila['origen'];
       $cad_remitente[$contador]=$fila['remitente'];
       $fecha[$contador]=$fila['fecha_registro'];
       $contador++;
     }


    
     $volumen=0;
     $origenes="";
     for ($i=0; $i < $contador ; $i++) 
     { 
     $cadena_buscada   = ')';
     $coincidencia_variedad = strpos($cad_variedades[$i], $cadena_buscada);//encontrar la coincidencia
     $cont_productos= substr($cad_variedades[$i], 1,$coincidencia_variedad-1);//extraccón del número de iteraciones
     $tamaño_variedad=strlen($cad_variedades[$i]);
     $cad_variedades[$i]=substr($cad_variedades[$i],$coincidencia_variedad+1,$tamaño_variedad);

     $coincidencia_origen = strpos($cad_origen[$i], $cadena_buscada);//encontrar la coincidencia
     $cont_origen= substr($cad_origen[$i], 1,$coincidencia_origen-1);//extraccón del número de iteraciones
     $tamaño_origen=strlen($cad_origen[$i]);
     $cad_origen[$i]=substr($cad_origen[$i],$coincidencia_origen+1,$tamaño_origen);


       
     for ($x=0; $x<$cont_productos; $x++) 
     { 
      $cadena_buscada   = ']';
      $coincidencia_variedad = strpos($cad_variedades[$i], $cadena_buscada);
      $coincidencia_envase = strpos($cad_envases[$i], $cadena_buscada);
      $coincidencia_cantidad = strpos($cad_cantidades[$i], $cadena_buscada);
      $coincidencia_peso = strpos($cad_pesos[$i], $cadena_buscada);
      $coincidencia_volumen = strpos($cad_volumenes[$i], $cadena_buscada);

      $tamaño_variedad=strlen($cad_variedades[$i]);
      $tamaño_envase=strlen($cad_envases[$i]);
      $tamaño_cantidad=strlen($cad_cantidades[$i]);
      $tamaño_peso=strlen($cad_pesos[$i]);
      $tamaño_volumen=strlen($cad_volumenes[$i]);

      $pivotevariedad= substr($cad_variedades[$i], 1,$coincidencia_variedad-1);
      $pivoteenvase= substr($cad_envases[$i], 1,$coincidencia_envase-1);
      $pivotecantidad= substr($cad_cantidades[$i], 1,$coincidencia_cantidad-1);
      $pivotepeso= substr($cad_pesos[$i], 1,$coincidencia_peso-1);
      $pivotevolumen= substr($cad_volumenes[$i], 1,$coincidencia_volumen-1);

      $coincidencia_origen = strpos($cad_origen[$i], $cadena_buscada);
      $tamaño_origen=strlen($cad_origen[$i]);
      $pivoteorigen= substr($cad_origen[$i], 1,$coincidencia_origen-1);
      $cad_origen[$i]=substr($cad_origen[$i],$coincidencia_origen+1,$tamaño_origen);


      $volumen=$volumen+$pivotevolumen;

      $m_variedad[$x]=$pivotevariedad;
      $m_envase[$x]=$pivoteenvase;
      $m_cantidad[$x]=$pivotecantidad;
      $m_peso[$x]=$pivotepeso;
      $m_origenes[$x]=$pivoteorigen;
       
   
      $cad_variedades[$i]=substr($cad_variedades[$i],$coincidencia_variedad+1,$tamaño_variedad);
      $cad_envases[$i]=substr($cad_envases[$i],$coincidencia_envase+1,$tamaño_envase);
      $cad_cantidades[$i]=substr($cad_cantidades[$i],$coincidencia_cantidad+1,$tamaño_cantidad);
      $cad_pesos[$i]=substr($cad_pesos[$i],$coincidencia_peso+1,$tamaño_peso);
      $cad_volumenes[$i]=substr($cad_volumenes[$i],$coincidencia_volumen+1,$tamaño_volumen);
      
     }
    
     $dia= substr($fecha[$i], 8,2);
     $mes= substr($fecha[$i], 5,2);
     $año= substr($fecha[$i], 0,4);
      
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_variedad[0]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[0]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_cantidad[0]),1,0,'C');
     $pdf->Cell(12,3,utf8_decode($m_peso[0]),1,0,'C');
     $pesototal=$m_cantidad[0]*$m_peso[0];
     $pdf->Cell(12,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',5.9);
     $pdf->Cell(55,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(25,3,utf8_decode($m_origenes[0]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
      
     if($cont_productos>1)
     {
     $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_variedad[1]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[1]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_cantidad[1]),1,0,'C');
     $pdf->Cell(12,3,utf8_decode($m_peso[1]),1,0,'C');
     $pesototal=$m_cantidad[1]*$m_peso[1];
     $pdf->Cell(12,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',5.9);
     $pdf->Cell(55,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(25,3,utf8_decode($m_origenes[1]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');

     if($cont_productos>2)
     {
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_variedad[2]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[2]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_cantidad[2]),1,0,'C');
     $pdf->Cell(12,3,utf8_decode($m_peso[2]),1,0,'C');
     $pesototal=$m_cantidad[2]*$m_peso[2];
     $pdf->Cell(12,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',5.9);
     $pdf->Cell(55,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(25,3,utf8_decode($m_origenes[2]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');

         if($cont_productos>3)
            {
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_variedad[3]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[3]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_cantidad[3]),1,0,'C');
     $pdf->Cell(12,3,utf8_decode($m_peso[3]),1,0,'C');
     $pesototal=$m_cantidad[3]*$m_peso[3];
     $pdf->Cell(12,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',5.9);
     $pdf->Cell(55,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(25,3,utf8_decode($m_origenes[3]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');
                 if($cont_productos>4)
     {
      $pdf->Cell(12,3,utf8_decode($folio[$i]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($m_variedad[4]),1,0,'C');
     $pdf->Cell(30,3,utf8_decode($m_envase[4]),1,0,'C');
     $pdf->Cell(14,3,utf8_decode($m_cantidad[4]),1,0,'C');
     $pdf->Cell(12,3,utf8_decode($m_peso[4]),1,0,'C');
     $pesototal=$m_cantidad[4]*$m_peso[4];
     $pdf->Cell(12,3,utf8_decode($pesototal),1,0,'C');
     $pdf->SetFont('Arial','',5.9);
     $pdf->Cell(55,3,utf8_decode($cad_remitente[$i]),1,0,'C');
     $pdf->SetFont('Arial','',6);
     $pdf->Cell(25,3,utf8_decode($m_origenes[4]),1,0,'C');
     $pdf->Cell(15,3,utf8_decode($dia.'/'.$mes.'/'.$año),1,1,'C');    
     }


       }

     }

     }

     $origenes="";
     $volumen=0;

     }


$pdf->Output();

}

?>