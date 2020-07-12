<?php 
require('../php/conexion.php');
//include('plantilla.php');
require('fpdf/fpdf.php');

if($_POST)
      {
            $id_certificado=$_POST['id'];
                                 
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
                              $dia= substr($fecha_registro, 8,2);
                              $mes= substr($fecha_registro, 5,2);
                              $año= substr($fecha_registro, 0,4);
                              $hora= substr($fecha_registro, 11,5);

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
                              $color=$fila['color'];
                              $placas_caja=$fila['placas_caja'];
                              $clase=$fila['clase'];
                              $linea=$fila['linea'];
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

for ($i=0; $i < 5; $i++) { 
	$variedades[$i]="";
	 $envases[$i]="";
	 $cantidades[$i]="";
	 $pesos[$i]="";
	 $volumenes[$i]="";
}

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

	 $variedades[$i]=' CON '.$pivotevariedad;
	 $envases[$i]=$pivoteenvase;
	 $cantidades[$i]=$pivotecantidad;
      
	 $pesos[$i]=$pivotepeso.' KGS.';
	 $volumenes[$i]=$pivotevolumen;
     $cad_pesos=$cad_pesos+$volumenes[$i];//almacena los pesos para la carta respnsiva
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




$pdf = new FPDF();
$cad_QR_origen="";
$cad_QR_variedad="_VARIEDAD:"; 
$pdf->AddPage();

//$pdf->Image('../assets/images/img002-1.PNG' , 0,0, 210 , 296,'PNG', 'www.bananashernandez.com');
//$pdf->Image('../assets/images/logo_transparente.png' , 150,4, 35 , 35,'PNG', 'www.bananashernandez.com');
//$pdf->Image('../assets/images/CAMION.JPG' , 142,173, 45 , 25,'JPG', 'www.bananashernandez.com');


$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);



$pdf->SetXY(24,44);
$pdf->SetFont('Arial','b',10);
$pdf->Cell(180, 6, utf8_decode('RUFINA HERNÁNDEZ GONZÁLEZ'), 0 , 0,'C');

$pdf->SetXY(24,52);
$pdf->Cell(180, 6, utf8_decode('CANTÓN SAN JOSÉ EL AMATE. HUEHUETÁN, CHIAPAS C.P. 30673'), 0 , 0,'C');

$pdf->SetXY(24,60);
$pdf->Cell(180, 6, utf8_decode('BHE180126FR1'), 0 , 0,'C');

$pdf->SetXY(175,21);
$pdf->Cell(32, 6, $dia.'  /  '.$mes.'  /  '.$año, 0 , 0,'C');

$pdf->SetXY(62,73);
$pdf->Cell(142, 6, $direccion_destino, 0 , 0,'C');

$pdf->SetXY(25,80);
$pdf->Cell(179, 6, $ciudad_destino, 0 , 0,'C');

$pdf->SetXY(25,87);
$pdf->Cell(80, 6, $ciudad_destino, 0 , 0,'C');



//inicio de los campos de llenado para la sección de productos
$pdf->SetFont('Arial','B',11);
//linea1
$pdf->SetXY(7,110);
$pdf->Cell(83, 6, utf8_decode($envases[0].$variedades[0]), 0 , 0,'C');
$pdf->Cell(33, 6, $cantidades[0], 0 , 0,'C');
$pdf->Cell(33, 6, $pesos[0], 0 , 0,'C');
$pdf->Cell(50, 6, $volumenes[0], 0 , 1,'C');
//linea 2
$pdf->SetXY(7,116);
$pdf->Cell(83, 6, utf8_decode($envases[1].$variedades[1]), 0 , 0,'C');
$pdf->Cell(33, 6, $cantidades[1], 0 , 0,'C');
$pdf->Cell(33, 6, $pesos[1], 0 , 0,'C');
$pdf->Cell(50, 6, $volumenes[1], 0 , 1,'C');
//linea 3
$pdf->SetXY(7,122);
$pdf->Cell(83, 6, utf8_decode($envases[2].$variedades[2]), 0 , 0,'C');
$pdf->Cell(33, 6, $cantidades[2], 0 , 0,'C');
$pdf->Cell(33, 6, $pesos[2], 0 , 0,'C');
$pdf->Cell(50, 6, $volumenes[2], 0 , 1,'C');
//linea 4
$pdf->SetXY(7,128);
$pdf->Cell(83, 6, utf8_decode($envases[3].$variedades[3]), 0 , 0,'C');
$pdf->Cell(33, 6, $cantidades[3], 0 , 0,'C');
$pdf->Cell(33, 6, $pesos[3], 0 , 0,'C');
$pdf->Cell(50, 6, $volumenes[3], 0 , 1,'C');
//linea 5
$pdf->SetXY(7,134);
$pdf->Cell(83, 6, utf8_decode($envases[4].$variedades[4]), 0 , 0,'C');
$pdf->Cell(33, 6, $cantidades[4], 0 , 0,'C');
$pdf->Cell(33, 6, $pesos[4], 0 , 0,'C');
$pdf->Cell(50, 6, $volumenes[4], 0 , 1,'C');
//linea de total
$pdf->SetXY(16,172);
$pdf->Cell(189, 6, 'PESO TOTAL:'.array_sum($volumenes).' KGS.', 0 , 0,'R');


$pdf->SetXY(58,213);
$pdf->Cell(5, 4, '4', 0 , 0,'C');


$pdf->Output();





 ?>

