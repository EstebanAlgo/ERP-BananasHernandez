<?php 

require('../php/conexion.php');
//include('plantilla.php');
require('fpdf/fpdf.php');


if($_POST)
      {
            $id_certificado=$_POST['id_certificado'];
                                 
                         $statement=$conexion->prepare('SELECT *FROM certificados WHERE id_certificado=:id');
                         $statement->execute( array(':id' => $id_certificado));
                         $certificado=$statement->fetchAll();
                         foreach ($certificado as $fila) 
                         {    
                              $folio=$fila['folio'];
                              $lugar_registro=$fila['lugar_registro'];
                              $remitente=$fila['remitente'];
                              $producto=$fila['producto'];
                              $variedad=$fila['variedad'];
                              $envase=$fila['envase'];
                              $cantidad=$fila['cantidad'];
                              $peso=$fila['peso'];
                              $volumen=$fila['volumen'];
                              $uso=$fila['uso'];
                              $origen=$fila['origen'];
                              $empacadora=$fila['empacadora'];
                              $municipio=$fila['municipio'];
                              $medio_transporte=$fila['medio_transporte'];
                              $marca_vehiculo=$fila['marca_vehiculo'];
                              $placas=$fila['placas'];
                              $nombre_chofer=$fila['nombre_chofer'];
                              $no_licencia=$fila['no_licencia'];
                              $destino=$fila['destino'];
                              $direccion_destino=$fila['direccion_destino'];
                              $ciudad_destino=$fila['ciudad_destino'];
                              $pais_destino=$fila['pais_destino'];
                              $responsable=$fila['responsable'];
                              $fecha_registro=$fila['fecha_registro'];   
                         }


                         $statement=$conexion->prepare('SELECT *FROM responsiva WHERE folio_certificado=:id');
                         $statement->execute( array(':id' => $folio));
                         $responsiva=$statement->fetchAll();
                         foreach ($responsiva as $fila) 
                         {    
                              $folio_carta=$fila['id_responsiva'];
                              $nombre_chofer=$fila['nombre_chofer'];
                              $direccion_chofer=$fila['direccion'];
                              $estado_chofer=$fila['estado'];
                              $no_licenciar=$fila['no_licencia'];
                              $servicio=$fila['servicio'];
                              $modelo=$fila['modelo'];  
                         }

                         $statement=$conexion->prepare('SELECT *FROM constancia_clorinacion WHERE folio_certificado=:id');
                         $statement->execute( array(':id' => $folio));
                         $constancia=$statement->fetchAll();
                         foreach ($constancia as $fila) 
                         {    
                              $folio_clorinacion=$fila['id_clorinacion'];
                              $grado=$fila['grado'];  
                         }
 
       }
                
$cadena_buscada   = ')';
$cad_variedad="";
$cad_envases="";
$cad_envases2="";
$procedencia_clorinacion="";
$procedencia_clorinacion2="";
$cad_cantidad="";
$cad_cantidad2="";
$cad_pesos_unitario="";
$cad_pesos_unitario2="";
$cad_pesos=0;
$coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
$cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 
$tamaño_variedad=strlen($variedad);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$coincidencia_origen = strpos($origen, $cadena_buscada);//método de búsqueda de caracteres
$cont_origen= substr($origen, 1,$coincidencia_origen-1);//extracción del contador del 
$tamaño_origen=strlen($origen);
$origen=substr($origen,$coincidencia_origen+1,$tamaño_origen); 


for ($i=0; $i <$cont_variedad ; $i++) { //define elk vector que contiene los orígenes
      $cadena_buscada   = ']';
      $coincidencia_variedad = strpos($variedad, $cadena_buscada);
      $coincidencia_envase = strpos($envase, $cadena_buscada);
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $coincidencia_peso = strpos($peso, $cadena_buscada);
      $coincidencia_volumen = strpos($volumen, $cadena_buscada);
      
      $tamaño_variedad=strlen($variedad);
      $tamaño_envase=strlen($envase);
      $tamaño_cantidad=strlen($cantidad);
      $tamaño_peso=strlen($peso);
      $tamaño_volumen=strlen($volumen);
 
      $pivotevariedad= substr($variedad, 1,$coincidencia_variedad-1);
      $pivoteenvase= substr($envase, 1,$coincidencia_envase-1);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $pivotepeso= substr($peso, 1,$coincidencia_peso-1);
      $pivotevolumen= substr($volumen, 1,$coincidencia_volumen-1);
     
      $variedades[$i]=$pivotevariedad;
      $envases[$i]=$pivoteenvase;
      $cantidades[$i]=$pivotecantidad;
      $pesos[$i]=$pivotepeso;
      $volumenes[$i]=$pivotevolumen;
      $cad_pesos=$cad_pesos+$volumenes[$i];//almacena los pesos para la constancia de clorinación
      $variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad);
      $envase=substr($envase,$coincidencia_envase+1,$tamaño_envase);
      $cantidad=substr($cantidad,$coincidencia_cantidad+1,$tamaño_cantidad);
      $peso=substr($peso,$coincidencia_peso+1,$tamaño_peso);
      $volumen=substr($volumen,$coincidencia_volumen+1,$tamaño_volumen);
       $cad_variedad.=$variedades[$i].', ';//almacena los envases para la carta respnsiva

      if($i>4)
       {
            $cad_cantidad2.=$cantidades[$i].' '.$envases[$i].', ';//almacena las cantidades para la carta respnsiva
             $cad_pesos_unitario2.=$pesos[$i].', ';
              $cad_envases2.=$variedades[$i].', ';//almacena los envases para la carta respnsiva
       }
       else
       {
            $cad_cantidad.=$cantidades[$i].' '.$envases[$i].', ';//almacena las cantidades para la carta respnsiva
            $cad_pesos_unitario.=$pesos[$i].', ';
            $cad_envases.=$variedades[$i].', ';//almacena los envases para certificado de clorinacion
       }
}

 
for ($i=0; $i <$cont_origen ; $i++) { //define elk vector que contiene los orígenes
      $cadena_buscada   = ']';
      $coincidencia_origen = strpos($origen, $cadena_buscada);
      $coincidencia_empacadora = strpos($empacadora, $cadena_buscada);
      $coincidencia_municipio = strpos($municipio, $cadena_buscada);
      $tamaño_origen=strlen($origen);
      $tamaño_empacadora=strlen($empacadora);
      $tamaño_municipio=strlen($municipio);
      $pivoteorigen= substr($origen, 1,$coincidencia_origen-1);
      $pivoteempacadora= substr($empacadora, 1,$coincidencia_empacadora-1);
      $pivotemunicipio= substr($municipio, 1,$coincidencia_municipio-1);
      $origenes[$i]=$pivoteorigen;
      $empacadoras[$i]=$pivoteempacadora;
      $municipios[$i]=$pivotemunicipio;
      $origen=substr($origen,$coincidencia_origen+1,$tamaño_origen);
     $empacadora=substr($empacadora,$coincidencia_empacadora+1,$tamaño_empacadora);
     $municipio=substr($municipio,$coincidencia_municipio+1,$tamaño_municipio);
}


for ($i=0; $i <$cont_variedad ; $i++) { 
     
     //echo $variedades[$i].' / '.$envases[$i].' / '.$cantidades[$i].' / '.$pesos[$i].' / '.$volumenes[$i].'<br>';
}
//echo "<br><br>";
for ($i=0; $i <$cont_origen ; $i++) { 
     
     //echo $origenes[$i].' / '.$empacadoras[$i].' / '.$municipios[$i].'<br>';
     
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->SetXY(70, 39);
$pdf->Cell(40,10,utf8_decode($lugar_registro.', '.$fecha_registro),0,1);//LUGAR Y FECHA-----------------------------------------
$pdf->SetFont('Arial','',8);
$pdf->SetXY(20, 68);
$pdf->Cell(100,10,utf8_decode($remitente),0,1,'C');//REMITENTE-----------------------------------------
$pdf->SetFont('Arial','',10);
$pdf->SetXY(150, 68);
$pdf->Cell(57,10,utf8_decode($producto),0,1,'C');//PRODUCTO-----------------------------------------

//seccion de productos----------------------------------------------------------------------------------------------

if ($cont_variedad==1) {

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 90);
$pdf->Cell(193,10,utf8_decode('      ---------------              ---------------               ---------------                ---------------                 ---------------'),0,1);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 97);
$pdf->Cell(193,10,utf8_decode('      ---------------              ---------------               ---------------                ---------------                 ---------------'),0,1);
}
if ($cont_variedad==2) {


$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 97);
$pdf->Cell(193,10,utf8_decode('      ---------------              ---------------               ---------------                ---------------                 ---------------'),0,1);
 
}

if($cont_variedad>5)
{
      if($cont_variedad==10)
{
$pdf->SetFont('Arial','',5);
$pdf->SetXY(6, 80);
$pdf->Cell(36,10,utf8_decode($envases[9]),0,1,'C');//envases
$pdf->SetXY(44, 80);
$pdf->Cell(38,10,$cantidades[9].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 80);
$pdf->Cell(37,10,$pesos[9].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 80);
$pdf->Cell(33,10,$volumenes[9].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 80);
$pdf->Cell(32,10,utf8_decode($variedades[9]),0,1,'C');//variedad

$pdf->SetXY(6, 82);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 82);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 82);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 82);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 82);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

$pdf->SetXY(6, 84);
$pdf->Cell(36,10,utf8_decode($envases[8]),0,1,'C');//envases
$pdf->SetXY(44, 84);
$pdf->Cell(38,10,$cantidades[8].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 84);
$pdf->Cell(37,10,$pesos[8].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 84);
$pdf->Cell(33,10,$volumenes[8].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 84);
$pdf->Cell(32,10,utf8_decode($variedades[8]),0,1,'C');//variedad

$pdf->SetXY(6, 86);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 86);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 86);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 86);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 86);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad

$pdf->SetXY(6, 89);
$pdf->Cell(36,10,utf8_decode($envases[7]),0,1,'C');//envases
$pdf->SetXY(44, 89);
$pdf->Cell(38,10,$cantidades[7].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 89);
$pdf->Cell(37,10,$pesos[7].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 89);
$pdf->Cell(33,10,$volumenes[7].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 89);
$pdf->Cell(32,10,utf8_decode($variedades[7]),0,1,'C');//variedad

$pdf->SetXY(6, 91);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 91);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 91);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 91);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 91);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad

$pdf->SetXY(6, 93);
$pdf->Cell(36,10,utf8_decode($envases[6]),0,1,'C');//envases
$pdf->SetXY(44, 93);
$pdf->Cell(38,10,$cantidades[6].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 93);
$pdf->Cell(37,10,$pesos[6].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 93);
$pdf->Cell(33,10,$volumenes[6].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 93);
$pdf->Cell(32,10,utf8_decode($variedades[6]),0,1,'C');//variedad

$pdf->SetXY(6, 96);
$pdf->Cell(36,10,utf8_decode($envases[3]),0,1,'C');//envases
$pdf->SetXY(44, 96);
$pdf->Cell(38,10,$cantidades[3].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 96);
$pdf->Cell(37,10,$pesos[3].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 96);
$pdf->Cell(33,10,$volumenes[3].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 96);
$pdf->Cell(32,10,utf8_decode($variedades[3]),0,1,'C');//variedad

$pdf->SetXY(6, 98);
$pdf->Cell(36,10,utf8_decode($envases[5]),0,1,'C');//envases
$pdf->SetXY(44, 98);
$pdf->Cell(38,10,$cantidades[5].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 98);
$pdf->Cell(37,10,$pesos[5].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 98);
$pdf->Cell(33,10,$volumenes[5].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 98);
$pdf->Cell(32,10,utf8_decode($variedades[5]),0,1,'C');//variedad

$pdf->SetXY(6, 100);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 100);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 100);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 100);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 100);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad
}









if($cont_variedad==9)
{
$pdf->SetFont('Arial','',5);
$pdf->SetXY(6, 84);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 84);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 84);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 84);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 84);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

$pdf->SetXY(6, 86);
$pdf->Cell(36,10,utf8_decode($envases[8]),0,1,'C');//envases
$pdf->SetXY(44, 86);
$pdf->Cell(38,10,$cantidades[8].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 86);
$pdf->Cell(37,10,$pesos[8].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 86);
$pdf->Cell(33,10,$volumenes[8].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 86);
$pdf->Cell(32,10,utf8_decode($variedades[8]),0,1,'C');//variedad

$pdf->SetXY(6, 88);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 88);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 88);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 88);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 88);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad

$pdf->SetXY(6, 91);
$pdf->Cell(36,10,utf8_decode($envases[7]),0,1,'C');//envases
$pdf->SetXY(44, 91);
$pdf->Cell(38,10,$cantidades[7].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 91);
$pdf->Cell(37,10,$pesos[7].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 91);
$pdf->Cell(33,10,$volumenes[7].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 91);
$pdf->Cell(32,10,utf8_decode($variedades[7]),0,1,'C');//variedad

$pdf->SetXY(6, 93);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 93);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 93);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 93);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 93);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad

$pdf->SetXY(6, 95);
$pdf->Cell(36,10,utf8_decode($envases[6]),0,1,'C');//envases
$pdf->SetXY(44, 95);
$pdf->Cell(38,10,$cantidades[6].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 95);
$pdf->Cell(37,10,$pesos[6].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 95);
$pdf->Cell(33,10,$volumenes[6].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 95);
$pdf->Cell(32,10,utf8_decode($variedades[6]),0,1,'C');//variedad

$pdf->SetXY(6, 98);
$pdf->Cell(36,10,utf8_decode($envases[3]),0,1,'C');//envases
$pdf->SetXY(44, 98);
$pdf->Cell(38,10,$cantidades[3].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 98);
$pdf->Cell(37,10,$pesos[3].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 98);
$pdf->Cell(33,10,$volumenes[3].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 98);
$pdf->Cell(32,10,utf8_decode($variedades[3]),0,1,'C');//variedad

$pdf->SetXY(6, 100);
$pdf->Cell(36,10,utf8_decode($envases[5]),0,1,'C');//envases
$pdf->SetXY(44, 100);
$pdf->Cell(38,10,$cantidades[5].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 100);
$pdf->Cell(37,10,$pesos[5].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 100);
$pdf->Cell(33,10,$volumenes[5].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 100);
$pdf->Cell(32,10,utf8_decode($variedades[5]),0,1,'C');//variedad

$pdf->SetXY(6, 102);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 102);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 102);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 102);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 102);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad

}

if($cont_variedad==8)
{
$pdf->SetFont('Arial','',5);
$pdf->SetXY(6, 86);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 86);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 86);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 86);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 86);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

$pdf->SetXY(6, 88);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 88);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 88);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 88);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 88);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad

$pdf->SetXY(6, 91);
$pdf->Cell(36,10,utf8_decode($envases[7]),0,1,'C');//envases
$pdf->SetXY(44, 91);
$pdf->Cell(38,10,$cantidades[7].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 91);
$pdf->Cell(37,10,$pesos[7].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 91);
$pdf->Cell(33,10,$volumenes[7].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 91);
$pdf->Cell(32,10,utf8_decode($variedades[7]),0,1,'C');//variedad

$pdf->SetXY(6, 93);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 93);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 93);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 93);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 93);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad

$pdf->SetXY(6, 95);
$pdf->Cell(36,10,utf8_decode($envases[6]),0,1,'C');//envases
$pdf->SetXY(44, 95);
$pdf->Cell(38,10,$cantidades[6].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 95);
$pdf->Cell(37,10,$pesos[6].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 95);
$pdf->Cell(33,10,$volumenes[6].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 95);
$pdf->Cell(32,10,utf8_decode($variedades[6]),0,1,'C');//variedad

$pdf->SetXY(6, 98);
$pdf->Cell(36,10,utf8_decode($envases[3]),0,1,'C');//envases
$pdf->SetXY(44, 98);
$pdf->Cell(38,10,$cantidades[3].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 98);
$pdf->Cell(37,10,$pesos[3].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 98);
$pdf->Cell(33,10,$volumenes[3].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 98);
$pdf->Cell(32,10,utf8_decode($variedades[3]),0,1,'C');//variedad

$pdf->SetXY(6, 100);
$pdf->Cell(36,10,utf8_decode($envases[5]),0,1,'C');//envases
$pdf->SetXY(44, 100);
$pdf->Cell(38,10,$cantidades[5].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 100);
$pdf->Cell(37,10,$pesos[5].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 100);
$pdf->Cell(33,10,$volumenes[5].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 100);
$pdf->Cell(32,10,utf8_decode($variedades[5]),0,1,'C');//variedad

$pdf->SetXY(6, 102);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 102);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 102);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 102);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 102);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad

}

if($cont_variedad==7)
{
$pdf->SetFont('Arial','',5);
$pdf->SetXY(6, 86);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 86);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 86);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 86);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 86);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

$pdf->SetXY(6, 88);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 88);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 88);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 88);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 88);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad

$pdf->SetXY(6, 93);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 93);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 93);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 93);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 93);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad

$pdf->SetXY(6, 95);
$pdf->Cell(36,10,utf8_decode($envases[6]),0,1,'C');//envases
$pdf->SetXY(44, 95);
$pdf->Cell(38,10,$cantidades[6].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 95);
$pdf->Cell(37,10,$pesos[6].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 95);
$pdf->Cell(33,10,$volumenes[6].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 95);
$pdf->Cell(32,10,utf8_decode($variedades[6]),0,1,'C');//variedad

$pdf->SetXY(6, 98);
$pdf->Cell(36,10,utf8_decode($envases[3]),0,1,'C');//envases
$pdf->SetXY(44, 98);
$pdf->Cell(38,10,$cantidades[3].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 98);
$pdf->Cell(37,10,$pesos[3].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 98);
$pdf->Cell(33,10,$volumenes[3].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 98);
$pdf->Cell(32,10,utf8_decode($variedades[3]),0,1,'C');//variedad

$pdf->SetXY(6, 100);
$pdf->Cell(36,10,utf8_decode($envases[5]),0,1,'C');//envases
$pdf->SetXY(44, 100);
$pdf->Cell(38,10,$cantidades[5].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 100);
$pdf->Cell(37,10,$pesos[5].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 100);
$pdf->Cell(33,10,$volumenes[5].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 100);
$pdf->Cell(32,10,utf8_decode($variedades[5]),0,1,'C');//variedad

$pdf->SetXY(6, 102);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 102);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 102);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 102);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 102);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad

}

if($cont_variedad==6)
{
$pdf->SetFont('Arial','',6);
$pdf->SetXY(6, 86);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 86);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 86);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 86);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 86);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

$pdf->SetXY(6, 88);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 88);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 88);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 88);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 88);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad

$pdf->SetXY(6, 93);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 93);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 93);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 93);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 93);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad


$pdf->SetXY(6, 95);
$pdf->Cell(36,10,utf8_decode($envases[3]),0,1,'C');//envases
$pdf->SetXY(44, 95);
$pdf->Cell(38,10,$cantidades[3].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 95);
$pdf->Cell(37,10,$pesos[3].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 95);
$pdf->Cell(33,10,$volumenes[3].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 95);
$pdf->Cell(32,10,utf8_decode($variedades[3]),0,1,'C');//variedad

$pdf->SetXY(6, 100);
$pdf->Cell(36,10,utf8_decode($envases[5]),0,1,'C');//envases
$pdf->SetXY(44, 100);
$pdf->Cell(38,10,$cantidades[5].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 100);
$pdf->Cell(37,10,$pesos[5].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 100);
$pdf->Cell(33,10,$volumenes[5].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 100);
$pdf->Cell(32,10,utf8_decode($variedades[5]),0,1,'C');//variedad

$pdf->SetXY(6, 102);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 102);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 102);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 102);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 102);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad

}

}
else
{
if($cont_variedad>3)
{
$pdf->SetFont('Arial','',6);
$pdf->SetXY(6, 85);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 85);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 85);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 85);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 85);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

 if($cont_variedad>1)
 { 
$pdf->SetFont('Arial','',6);  
$pdf->SetXY(6, 89);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 89);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 89);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 89);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 89);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad
if($cont_variedad>2)
{     
$pdf->SetXY(6, 92);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 92);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 92);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 92);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 92);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad
if($cont_variedad>3)
      {         
$pdf->SetXY(6, 96);
$pdf->Cell(36,10,utf8_decode($envases[3]),0,1,'C');//envases
$pdf->SetXY(44, 96);
$pdf->Cell(38,10,$cantidades[3].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 96);
$pdf->Cell(37,10,$pesos[3].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 96);
$pdf->Cell(33,10,$volumenes[3].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 96);
$pdf->Cell(32,10,utf8_decode($variedades[3]),0,1,'C');//variedad
if($cont_variedad>4)
{
$pdf->SetXY(6, 99);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 99);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 99);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 99);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 99);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad
}
      }
 }
}

}
else
{    
$pdf->SetFont('Arial','',8);
$pdf->SetXY(6, 87);
$pdf->Cell(36,10,utf8_decode($envases[0]),0,1,'C');//envases
$pdf->SetXY(44, 87);
$pdf->Cell(38,10,$cantidades[0].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 87);
$pdf->Cell(37,10,$pesos[0].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 87);
$pdf->Cell(33,10,$volumenes[0].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 87);
$pdf->Cell(32,10,utf8_decode($variedades[0]),0,1,'C');//variedad

 if($cont_variedad>1)
 {    
$pdf->SetXY(6, 94);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 94);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 94);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 94);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 94);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad
if($cont_variedad>2)
{    
$pdf->SetXY(6, 101);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 101);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 101);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 101);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 101);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad
 }
}

}
}




$pdf->SetFont('Arial','',11);
$pdf->SetXY(17, 108);
$pdf->Cell(187,10,utf8_decode($uso),0,1,'C');//USO


//SECCION ORÍGENES-------------------------------------------------------------
if ($cont_origen==1) {

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 141);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 147);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 153);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 160);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}
if ($cont_origen==2) {

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 147);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 153);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 160);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}

if ($cont_origen==3) {

$pdf->SetFont('Arial','',12);

$pdf->SetXY(7, 153);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 160);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}
if ($cont_origen==4) {

$pdf->SetFont('Arial','',12);

$pdf->SetXY(7, 160);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}


if($cont_origen>5)
{ 
$pdf->SetFont('Arial','',7);
$pdf->SetXY(8, 136);
$pdf->Cell(62,10,$empacadoras[0],0,1,'C');//Registro empacadora
$pdf->SetXY(85, 136);
$pdf->Cell(62,10,utf8_decode($origenes[0]),0,1,'C');//Origen
$pdf->SetXY(159, 136);
$pdf->Cell(41,10,utf8_decode($municipios[0]),0,1,'C');//Municipio

if($cont_origen>1)
{

$pdf->SetXY(8, 142);
$pdf->Cell(62,10,$empacadoras[1],0,1,'C');
$pdf->SetXY(85, 142);
$pdf->Cell(62,10,utf8_decode($origenes[1]),0,1,'C');
$pdf->SetXY(159, 142);
$pdf->Cell(41,10,utf8_decode($municipios[1]),0,1,'C');

if($cont_origen>2)
{
$pdf->SetFont('Arial','',7);  
$pdf->SetXY(8, 148);
$pdf->Cell(62,10,$empacadoras[2],0,1,'C');
$pdf->SetXY(85, 148);
$pdf->Cell(62,10,utf8_decode($origenes[2]),0,1,'C');
$pdf->SetXY(159, 148);
$pdf->Cell(41,10,utf8_decode($municipios[2]),0,1,'C');
if($cont_origen>3)
{
$pdf->SetXY(8, 154);
$pdf->Cell(62,10,$empacadoras[3],0,1,'C');
$pdf->SetXY(85, 154);
$pdf->Cell(62,10,utf8_decode($origenes[3]),0,1,'C');
$pdf->SetXY(159, 154);
$pdf->Cell(41,10,utf8_decode($municipios[3]),0,1,'C');

if($cont_origen>4)
{
$pdf->SetXY(8, 161);
$pdf->Cell(62,10,$empacadoras[4],0,1,'C');
$pdf->SetXY(85, 161);
$pdf->Cell(62,10,utf8_decode($origenes[4]),0,1,'C');
$pdf->SetXY(159, 161);
$pdf->Cell(41,10,utf8_decode($municipios[4]),0,1,'C');
if($cont_origen>5)
{
$pdf->SetXY(8, 159);
$pdf->Cell(62,10,$empacadoras[5],0,1,'C');
$pdf->SetXY(85, 159);
$pdf->Cell(62,10,utf8_decode($origenes[5]),0,1,'C');
$pdf->SetXY(159, 159);
$pdf->Cell(41,10,utf8_decode($municipios[5]),0,1,'C');
if($cont_origen>6)
{
$pdf->SetXY(8, 152);
$pdf->Cell(62,10,$empacadoras[6],0,1,'C');
$pdf->SetXY(85, 152);
$pdf->Cell(62,10,utf8_decode($origenes[6]),0,1,'C');
$pdf->SetXY(159, 152);
$pdf->Cell(41,10,utf8_decode($municipios[6]),0,1,'C');

if($cont_origen>7)
{
$pdf->SetXY(8, 146);
$pdf->Cell(62,10,$empacadoras[7],0,1,'C');
$pdf->SetXY(85, 146);
$pdf->Cell(62,10,utf8_decode($origenes[7]),0,1,'C');
$pdf->SetXY(159, 146);
$pdf->Cell(41,10,utf8_decode($municipios[7]),0,1,'C');

if($cont_origen>8)
{
$pdf->SetXY(8, 140);
$pdf->Cell(62,10,$empacadoras[8],0,1,'C');
$pdf->SetXY(85, 140);
$pdf->Cell(62,10,utf8_decode($origenes[8]),0,1,'C');
$pdf->SetXY(159, 140);
$pdf->Cell(41,10,utf8_decode($municipios[8]),0,1,'C');

if($cont_origen>9)
{
$pdf->SetXY(8, 134);
$pdf->Cell(62,10,$empacadoras[9],0,1,'C');
$pdf->SetXY(85, 134);
$pdf->Cell(62,10,utf8_decode($origenes[9]),0,1,'C');
$pdf->SetXY(159, 134);
$pdf->Cell(41,10,utf8_decode($municipios[9]),0,1,'C');

}

}

}
}
}

}

}

}
}

}

else
{
      $pdf->SetFont('Arial','',9);
$pdf->SetXY(8, 133);
$pdf->Cell(62,10,$empacadoras[0],0,1,'C');//Registro empacadora
$pdf->SetXY(85, 133);
$pdf->Cell(62,10,utf8_decode($origenes[0]),0,1,'C');//Origen
$pdf->SetXY(159, 133);
$pdf->Cell(41,10,utf8_decode($municipios[0]),0,1,'C');//Municipio

if($cont_origen>1)
{
$pdf->SetXY(8, 140);
$pdf->Cell(62,10,$empacadoras[1],0,1,'C');
$pdf->SetXY(85, 140);
$pdf->Cell(62,10,utf8_decode($origenes[1]),0,1,'C');
$pdf->SetXY(159, 140);
$pdf->Cell(41,10,utf8_decode($municipios[1]),0,1,'C');

if($cont_origen>2)
{
$pdf->SetXY(8, 147);
$pdf->Cell(62,10,$empacadoras[2],0,1,'C');
$pdf->SetXY(85, 147);
$pdf->Cell(62,10,utf8_decode($origenes[2]),0,1,'C');
$pdf->SetXY(159, 147);
$pdf->Cell(41,10,utf8_decode($municipios[2]),0,1,'C');
if($cont_origen>3)
{
$pdf->SetXY(8, 153);
$pdf->Cell(62,10,$empacadoras[3],0,1,'C');
$pdf->SetXY(85, 153);
$pdf->Cell(62,10,utf8_decode($origenes[3]),0,1,'C');
$pdf->SetXY(159, 153);
$pdf->Cell(41,10,utf8_decode($municipios[3]),0,1,'C');

if($cont_origen>4)
{
$pdf->SetXY(8, 161);
$pdf->Cell(62,10,$empacadoras[4],0,1,'C');
$pdf->SetXY(85, 161);
$pdf->Cell(62,10,utf8_decode($origenes[4]),0,1,'C');
$pdf->SetXY(159, 161);
$pdf->Cell(41,10,utf8_decode($municipios[4]),0,1,'C');


}

}

}
}
}

$pdf->SetFont('Arial','',12);

$pdf->SetXY(7, 182);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 188);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(8, 175);
$pdf->Cell(62,10,utf8_decode($medio_transporte),0,1,'C');//MEDIO dE de transporte
$pdf->SetXY(80, 175);
$pdf->Cell(62,10,utf8_decode($marca_vehiculo),0,1,'C');//marca del vehículo
$pdf->SetXY(159, 175);
$pdf->Cell(41,10,utf8_decode($placas),0,1,'C');//placas

$pdf->SetFont('Arial','',12);
$pdf->SetXY(45, 197);
$pdf->Cell(160,10,utf8_decode($nombre_chofer),0,1,'C');//chofer
$pdf->SetXY(35, 207);
$pdf->Cell(165,10,utf8_decode($no_licencia),0,1,'C');//número de licencia


$pdf->SetXY(23, 226);
$pdf->Cell(180,10,utf8_decode($destino),0,1,'C');//DESTINO
$pdf->SetFont('Arial','',9);
$pdf->SetXY(30, 234);
$pdf->Cell(175,10,utf8_decode($direccion_destino),0,1,'C');//Dirección de destino
$pdf->SetXY(22, 243);
$pdf->SetFont('Arial','',9);
$pdf->Cell(52,10,utf8_decode($ciudad_destino),0,1,'C');//número de licencia
$pdf->SetXY(85, 243);
$pdf->Cell(41,10,utf8_decode($pais_destino),0,1,'C');//número de licencia

$pdf->SetFont('Arial','',11);
$pdf->SetXY(15, 251);
$pdf->Cell(83,10,utf8_decode($responsable),0,1,'C');//número de licencia



//SECCION DE CARTA RESPONSIVA--------------------------------------------------------------------------------------------------------------------
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[0], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[0], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[0]);
$piv_estado=substr($municipios[0],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 


$cad_origen=$origenes[0].', ';
$cad_municipio=$piv_municipio.', ';
$cad_estado=$piv_estado.', ';
$procedencia_clorinacion.=$origenes[0].':'.$piv_municipio.', ';

$cad_municipio2='';
$cad_estado2='';

if($cont_origen>1)
{  
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[1], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[1], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[1]);
$piv_estado=substr($municipios[1],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[1].', ';
$cad_municipio.=$piv_municipio.', ';
$cad_estado.=$piv_estado.', ';
$procedencia_clorinacion.=$origenes[1].':'.$piv_municipio.', ';

   if($cont_origen>2)
   {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[2], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[2], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[2]);
$piv_estado=substr($municipios[2],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[2].', ';
$cad_municipio.=$piv_municipio.', ';
$cad_estado.=$piv_estado.', ';
$procedencia_clorinacion.=$origenes[2].':'.$piv_municipio.', ';


    if($cont_origen>3)
    {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[3], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[3], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[3]);
$piv_estado=substr($municipios[3],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[3].', ';
$cad_municipio.=$piv_municipio.', ';
$cad_estado.=$piv_estado.', ';
$procedencia_clorinacion.=$origenes[3].':'.$piv_municipio.', ';
      if($cont_origen>4)
      {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[4], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[4], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[4]);
$piv_estado=substr($municipios[4],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[4].', ';
$cad_municipio.=$piv_municipio.', ';
$cad_estado.=$piv_estado.', ';
$procedencia_clorinacion.=$origenes[4].':'.$piv_municipio.', ';
            if ($cont_origen>5) 
            {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[5], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[5], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[5]);
$piv_estado=substr($municipios[5],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[5].', ';
$cad_municipio2.=$piv_municipio.', ';
$cad_estado2.=$piv_estado.', ';
$procedencia_clorinacion2.=$origenes[5].':'.$piv_municipio.', ';

                  if ($cont_origen>6) 
            {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[6], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[6], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[6]);
$piv_estado=substr($municipios[6],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[6].', ';
$cad_municipio2.=$piv_municipio.', ';
$cad_estado2.=$piv_estado.', ';
$procedencia_clorinacion2.=$origenes[6].':'.$piv_municipio.', ';
                  if ($cont_origen>7) 
            {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[7], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[7], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[7]);
$piv_estado=substr($municipios[7],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[7].', ';
$cad_municipio2.=$piv_municipio.', ';
$cad_estado2.=$piv_estado.', ';
$procedencia_clorinacion2.=$origenes[7].':'.$piv_municipio;

if ($cont_origen>8) 
            {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[8], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[8], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[8]);
$piv_estado=substr($municipios[8],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[8].', ';
$cad_municipio2.=$piv_municipio.', ';
$cad_estado2.=$piv_estado.', ';
$procedencia_clorinacion2.=$origenes[8].':'.$piv_municipio;

if ($cont_origen>9) 
            {
$cadena_buscada   = ',';
$coincidencia_municipio = strpos($municipios[9], $cadena_buscada);//método de búsqueda de caracteres
$piv_municipio= substr($municipios[9], 0,$coincidencia_municipio);//extracción del contador del 
$tamaño_municipio=strlen($municipios[9]);
$piv_estado=substr($municipios[9],$coincidencia_municipio+1,$tamaño_municipio);
$variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad); 

$cad_origen.=$origenes[9].', ';
$cad_municipio2.=$piv_municipio.', ';
$cad_estado2.=$piv_estado.', ';
$procedencia_clorinacion2.=$origenes[9].':'.$piv_municipio;
    
            }
    
            }
                  
            }
            }

            }

      }

    }
   }
}




$pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->SetFont('Arial','',10);
//$pdf->SetFillColor(252, 243, 207);
//$pdf->Cell(230, 276, '', 1, 0, 'C', True);//CUADRO FONDO----
$año= substr($fecha_registro, 0,4);
$mes= substr($fecha_registro, 5,2);
$dia= substr($fecha_registro, 8,2);




$pdf->SetTextColor(0,0,0);


 
$pdf->SetFont('Arial','',9);
$pdf->SetXY(170, 27);
$pdf->Cell(32,10,utf8_decode($dia.'         '.$mes.'         '.$año),0,1,'C');//LUGAR Y FECHA-----------------------------------------



$pdf->SetLineWidth(0.8);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(9, 38);
$pdf->Cell(193,11,utf8_decode($remitente),0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetXY(9, 51);
$pdf->Cell(193,11,utf8_decode($cad_origen),0,1,'C');




if($cont_origen>4)
{
      
$pdf->SetXY(9, 65);
$pdf->SetFont('Arial','',9);
$pdf->Cell(100,8,utf8_decode($cad_municipio),0,1,'C');
$pdf->SetXY(109, 65);
$pdf->Cell(100,8,utf8_decode($cad_estado),0,1,'C');
$pdf->SetXY(9, 68);
$pdf->Cell(100,8,utf8_decode($cad_municipio2),0,1,'C');
$pdf->SetXY(109, 68);
$pdf->Cell(100,8,utf8_decode($cad_estado2),0,1,'C');

}

else
{     
$pdf->SetXY(9, 66);
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,10,utf8_decode($cad_municipio),0,1,'C');//PRODUCTO-----------------------------------------
$pdf->SetXY(109, 66);
$pdf->Cell(100,10,utf8_decode($cad_estado),0,1,'C');//PRODUCTO-----------------------------------------
}





if($cont_origen>4)
{
$pdf->SetFont('Arial','',7);      
$pdf->SetXY(9, 78);
$pdf->Cell(150,10,utf8_decode($cad_cantidad),0,1,'C');
$pdf->SetXY(160, 78);
$pdf->Cell(40,10,utf8_decode($cad_pesos_unitario),0,1,'C');
$pdf->SetXY(9, 81);
$pdf->Cell(150,10,utf8_decode($cad_cantidad2),0,1,'C');
$pdf->SetXY(160, 81);
$pdf->Cell(40,10,utf8_decode($cad_pesos_unitario2),0,1,'C');     

}

else
{
$pdf->SetFont('Arial','',9);      
$pdf->SetXY(9, 79);
$pdf->Cell(150,10,utf8_decode($cad_cantidad),0,1,'C');
$pdf->SetXY(160, 79);
$pdf->Cell(40,10,utf8_decode($cad_pesos_unitario),0,1,'C');     

}



$pdf->SetFont('Arial','',10);
$pdf->SetXY(9, 89);
$pdf->Cell(193,10,utf8_decode($cad_variedad),0,1,'C');


$pdf->SetFont('Arial','',12);
$pdf->SetXY(9, 101);
$pdf->Cell(100,10,utf8_decode($folio),0,1,'C');
$pdf->SetXY(100, 101);
$pdf->Cell(100,10,utf8_decode($fecha_registro),0,1,'C');






$pdf->SetFont('Arial','',11);
$pdf->SetXY(9, 112);
$pdf->Cell(193,11,utf8_decode($marca_vehiculo),0,1,'C');
$pdf->SetXY(9, 125);
$pdf->Cell(60,10,utf8_decode($modelo),0,1,'C');
$pdf->SetXY(75, 125);
$pdf->Cell(60,10,utf8_decode($placas),0,1,'C');
$pdf->SetXY(141, 125);
$pdf->Cell(60,10,utf8_decode($estado_chofer),0,1,'C');

$pdf->SetXY(9, 134);
$pdf->Cell(193,11,utf8_decode($nombre_chofer),0,1,'C');

$pdf->SetXY(9, 147);
$pdf->Cell(100,10,utf8_decode($no_licenciar),0,1,'C');
$pdf->SetXY(150, 147);
$pdf->Cell(50,10,utf8_decode($estado_chofer),0,1,'C');

$pdf->SetXY(9, 156);
$pdf->Cell(193,11,utf8_decode($servicio),0,1,'C');


$pdf->SetFont('Arial','',9);
$pdf->SetXY(9, 187);
if($cont_origen>4)
{
$pdf->SetXY(9, 188);
$pdf->Cell(140,10,utf8_decode($cad_municipio),0,1,'C');      
$pdf->SetXY(9, 191);
$pdf->Cell(140,10,utf8_decode($cad_municipio2.'; Chiapas'),0,1,'C');
$pdf->SetXY(150, 189);
$pdf->Cell(53,10,utf8_decode($ciudad_destino),0,1,'C');

}
else
{
$pdf->SetXY(9, 189);
$pdf->Cell(140,10,utf8_decode($cad_municipio.'; Chiapas'),0,1,'C');
$pdf->SetXY(150, 189);
$pdf->Cell(53,10,utf8_decode($ciudad_destino),0,1,'C');
}




$pdf->SetFont('Arial','',10);
$pdf->SetXY(9, 240);
$pdf->Cell(193,10,utf8_decode($nombre_chofer),0,1,'C');


$pdf->SetXY(9, 252);
$pdf->Cell(193,10,utf8_decode($direccion_chofer),0,1,'C');


$pdf->SetXY(9, 264);
$pdf->Cell(150,10,utf8_decode($no_licenciar),0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->SetXY(153, 264);
$pdf->Cell(50,10,utf8_decode($fecha_registro),0,1,'C');





//SECCION DE CONSTANCIA DE CLORINACIÓN-------------------------------------------------------------------------------------------------------------

$pdf->AddPage();





$pdf->SetTextColor(0,0,0);

 
$pdf->SetFont('Arial','',9);
$pdf->SetXY(170, 34);
$pdf->Cell(32,10,utf8_decode($dia.'         '.$mes.'         '.$año),0,1,'C');//LUGAR Y FECHA-----------------------------------------




$pdf->SetFont('Arial','',6);
$pdf->SetXY(9, 58);
$pdf->Cell(66,10,utf8_decode($cad_envases),0,1,'C');
$pdf->SetXY(9, 58);
$pdf->Cell(66,14,utf8_decode($cad_envases2),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(75, 58);
$pdf->Cell(57,11,utf8_decode($cad_pesos),0,1,'C');




$pdf->SetFont('Arial','',12);
$pdf->SetXY(50, 95);
$pdf->Cell(150,6,utf8_decode('INMERSIÓN CLORADA AL '.$grado.'%'),0,1,'C');



$pdf->SetFont('Arial','',7);
$pdf->SetXY(30, 101);
$pdf->Cell(170,6,utf8_decode($procedencia_clorinacion2),0,1,'C');
$pdf->SetXY(30, 104);
$pdf->Cell(170,6,utf8_decode($procedencia_clorinacion.'; Chiapas.'),0,1,'C');



$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 113);
$pdf->Cell(170,6,utf8_decode($ciudad_destino),0,1,'C');


$pdf->SetXY(30, 122);
$pdf->Cell(170,6,utf8_decode($remitente),0,1,'C');


$pdf->SetXY(30, 131);
$pdf->Cell(170,6,utf8_decode($destino),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(63, 139);
$pdf->Cell(42,6,utf8_decode($marca_vehiculo),0,1,'C');

$pdf->SetXY(120, 139);
$pdf->Cell(38,6,utf8_decode($modelo),0,1,'C');

$pdf->SetFont('Arial','',6);
$pdf->SetXY(172, 139);
$pdf->Cell(32,6,utf8_decode($placas),0,1,'C');


$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 148);
$pdf->Cell(170,6,utf8_decode('OP: '.$nombre_chofer),0,1,'C');
$pdf->SetXY(30, 156);
$pdf->Cell(170,6,utf8_decode('N°. Licencia: '.$no_licenciar),0,1,'C');



$pdf->Output();



 ?>