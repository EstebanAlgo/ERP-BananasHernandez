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



$pdf->Image('../assets/images/encabezado_salida.png' , 7,5, 197 , 50,'PNG', 'www.bananashernandez.com');
$pdf->Image('../assets/images/CONDUCTOR.jpg' , 50,150, 45 , 45,'JPG', 'www.bananashernandez.com');
$pdf->Image('../assets/images/CAMION.jpg' , 142,166, 45 , 35,'JPG', 'www.bananashernandez.com');


$pdf->SetXY(175, 36);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(20, 8, utf8_decode('Folio:'.$folio), 0 , 1);//DIRECCION

$pdf->SetXY(15, 65);
$pdf->SetFont('Arial','b',12);
$pdf->Cell(197, 8, utf8_decode('Origen:'.$origenes[0]), 0 , 1);//DIRECCION

$pdf->SetXY(15, 70);
$pdf->SetFont('Arial','b',12);
$pdf->Cell(197, 8, utf8_decode('Empacadora:'.$empacadoras[0]), 0 , 1);//DIRECCION

$pdf->SetXY(153,55);
$pdf->SetLineWidth(0.6);
$pdf->Cell(45, 5, 'Fecha', 1 , 1,'C');//CUADRO FECHA
$pdf->SetXY(153,60);
$pdf->Cell(15, 5, '16', 1 , 0,'C');//CUADRO FECHA
$pdf->Cell(15, 5, '01', 1 , 0,'C');//CUADRO FECHA
$pdf->Cell(15, 5, '2020', 1 , 1,'C');//CUADRO FECHA


$pdf->SetFont('Arial','b',11);

$pdf->SetXY(16.5,80);

$pdf->Cell(60.5, 5, 'PRODUCTO', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(77,80);
$pdf->Cell(60.5, 5, 'CANTIDAD', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(137.5,80);
$pdf->Cell(60.5, 5, 'DESTINO', 1 , 0,'C');//CUADRO TABLA

$pdf->SetXY(16.5,85);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(77,85);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(137.5,85);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA

$pdf->SetXY(16.5,90);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(77,90);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(137.5,90);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA

$pdf->SetXY(16.5,95);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(77,95);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA
$pdf->SetXY(137.5,95);
$pdf->Cell(60.5, 5, '', 1 , 0,'C');//CUADRO TABLA





$pdf->SetFont('Arial','b',12);
$pdf->SetXY(16.5, 110);
$pdf->Cell(108, 90, utf8_decode(''), 1 , 0);//DATOS DEL CAMION
$pdf->SetXY(15, 115);
$pdf->Cell(90.5, 8, utf8_decode('DATOS DEL CHOFER'), 0 , 0, 'C');//DATOS DEL CHOFER



$pdf->SetFont('Arial','b',10);
$pdf->SetXY(17, 124);
$pdf->Line(66, 130,123, 130);
$pdf->Cell(181, 8, utf8_decode('NOMBRE DE CONDUCTOR: '. $nombre_chofer), 0 , 0,);//NOMBRE DE CONDUCTOR

$pdf->SetFont('Arial','b',10);
$pdf->SetXY(17, 130);
$pdf->Line(48, 136, 64, 136);
$pdf->Cell(181, 8, utf8_decode('N° DE LICENCIA: '. $no_licencia), 0 , 1,);//NUMERO DE LICENCIA

$pdf->SetXY(17, 136);
$pdf->SetFont('Arial','b',10);
$pdf->Line(39, 142,123, 142);
$pdf->Cell(90.5, 8, utf8_decode('DOMICILIO: '.$direccion_chofer), 0 , 1,);//DOMICILIO


$pdf->SetXY(124.5, 110);
$pdf->Cell(73, 90, utf8_decode(''), 1 , 0);//DATOS DEL CAMION
$pdf->SetXY(69, 115);
$pdf->SetFont('Arial','b',12);
$pdf->Cell(182, 8, utf8_decode('DATOS DEL CAMION'), 0 , 1, 'C');//DATOS DEL CAMION

$pdf->SetFont('Arial','b',10);
$pdf->SetXY(127, 124);
$pdf->Line(143, 136,161, 136);
$pdf->Cell(181, 8, utf8_decode('COLOR: AMARILLO'), 0 , 0,);//COLOR

$pdf->SetFont('Arial','b',10);
$pdf->SetXY(165, 124);
$pdf->Line(184, 130, 191, 130);
$pdf->Cell(181, 8, utf8_decode('MODELO: '. $modelo), 0 , 1,);//MODELO

$pdf->SetFont('Arial','b',10);
$pdf->SetXY(127, 130);
$pdf->Line(156, 136, 191, 136);
$pdf->Cell(181, 8, utf8_decode('PLACAS/CAJA: '. $placas), 0 , 1,);//PLACAS

$pdf->SetXY(127, 136);
$pdf->SetFont('Arial','b',10);
$pdf->Line(163, 142,191, 142);
$pdf->Cell(90.5, 8, utf8_decode('PLACAS/TRACTOR: '.$placas), 0 , 1,);//PLACAS TRACTOR

$pdf->SetXY(127, 142);
$pdf->SetFont('Arial','b',10);
$pdf->Line(151, 148,191, 148);
$pdf->Cell(90.5, 8, utf8_decode('CLASE/TIPO: ABCDE'), 0 , 1,);//CLASE TIPO

$pdf->SetXY(127, 148);
$pdf->SetFont('Arial','b',10);
$pdf->Line(141, 154,191, 154);
$pdf->Cell(90.5, 8, utf8_decode('LINEA: ZAMORA'), 0 , 1,);//LINEA

$pdf->SetXY(127, 154);
$pdf->SetFont('Arial','b',10);
$pdf->Line(161, 160,191, 160);
$pdf->Cell(90.5, 8, utf8_decode('HORA DE SALIDA: 9:30 PM'), 0 , 1,);//HORA DE SALIDA

$pdf->SetXY(16, 200);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(90.5, 8, utf8_decode('RECIBO  EL TOTAL  DE  CAJAS DETALLADAS  EN  ESTE  CONTROL DE  EMBARQUE, HACIENDOME  RESPONSABLE'), 0 , 1,);

$pdf->SetXY(16, 203);
$pdf->Cell(90.5, 8, utf8_decode('DE  CUALQUIER PERDIDA  O  FALTANTE AL MOMENTO DE LA ENTREGA,ACEPTANDO SE ME HAGA EL DESCUENTO'), 0 , 1,);

$pdf->SetXY(16, 206);
$pdf->Cell(90.5, 8, utf8_decode('CORRESPONDIENTE DE FLETE Y DE RUTA AL PRECIO QUE CORRA EN EL MERCADO EN EL DESTINO DE LA FRUTA'), 0 , 1,);



$pdf->SetFont('Arial','b',8);
$pdf->SetXY(16, 220);
$pdf->Cell(197, 8, utf8_decode('RECIBO DE CONFORMIDAD'), 0 , 1,'C');

$pdf->SetXY(16, 240);
$pdf->Line(85, 238,145, 238);
$pdf->Cell(197, 8, utf8_decode('NOMBRE Y FIRMA DEL OPERADOR'), 0 , 1,'C');

$pdf->SetXY(18, 265);
$pdf->Line(16, 263,70, 263);
$pdf->Cell(197, 8, utf8_decode('NOMBRE Y FIRMA DEL ESTIBADOR'), 0 , 1,);

$pdf->SetXY(9, 265);
$pdf->Line(74, 263,142, 263);
$pdf->Cell(197, 8, utf8_decode('NOMBRE Y FIRMA DEL JEFE DE EMPAQUE'), 0 , 1,'C');

$pdf->SetXY(75, 265);
$pdf->Line(146, 263,197, 263);
$pdf->Cell(194, 8, utf8_decode('NOMBRE Y FIRMA DEL ENCARGADO'), 0 , 1,'C');
$pdf->Output();





 ?>

