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



$pdf->Image('../assets/images/encabezado.PNG' , 16,10, 181 , 35,'PNG', 'www.bananashernandez.com');
$pdf->Image('../assets/images/logo_transparente.PNG' , 150,4, 35 , 35,'PNG', 'www.bananashernandez.com');
//$pdf->Image('../assets/images/CAMION.JPG' , 142,173, 45 , 25,'JPG', 'www.bananashernandez.com');


$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

//-----------------------Sección para los datos del producto------------------------------------

$pdf->SetXY(16,62);
$pdf->Cell(180, 20, utf8_decode(''), 1 , 1,'C');
$pdf->Line(16, 72, 196, 72);
$pdf->Line(106, 62, 106, 82);

$pdf->SetXY(16,53);
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(3,70,77);
$pdf->Cell(120, 6, utf8_decode('PROCEDENCIA Y ENVÍO'), 0 , 1);
$pdf->SetTextColor(0);

//$pdf->SetXY(88,59);
//$pdf->SetFont('Arial','b',7);
//$pdf->Cell(35, 5, utf8_decode('DATOS DEL PRODUCTO'), 1 , 1,'C',1);
//seccion de origen
$pdf->SetXY(16,61);
$pdf->SetFont('Arial','b',6);
$pdf->Cell(20, 3, utf8_decode('ORIGEN'), 1 , 1,'C',1);
$pdf->SetXY(16,65);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90, 5, utf8_decode($origenes[0]), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de origen
//seccion de  empacadora
$pdf->SetXY(106,61);
$pdf->Cell(20, 3, utf8_decode('EMPACADORA'), 1 , 1,'C',1);
$pdf->SetXY(106,65);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90, 5, utf8_decode($empacadoras[0]), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de empacadora
//Inicio de la sección de clientes
$pdf->SetXY(16,71);
$pdf->Cell(20, 3, utf8_decode('CLIENTE'), 1 , 1,'C',1);
$pdf->SetXY(16,75);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90, 5, utf8_decode($destino), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de clientes
//Inicio de la sección de Dirección de Destino
$pdf->SetXY(106,71);
$pdf->Cell(20, 3, utf8_decode('DESTINO'), 1 , 1,'C',1);
$pdf->SetXY(106,75);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90, 5, utf8_decode($direccion_destino), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Direcciín de Destino
$pdf->SetXY(88,59);
$pdf->SetFont('Arial','b',6);
//$pdf->Cell(35, 5, utf8_decode('DATOS DEL PRODUCTO'), 1 , 1,'C',1);

//---------------INICIA SECCIÓN DE DATOS DE TRANSPORTE--------------------------------------------

$pdf->SetXY(16,93);
$pdf->Cell(180, 20, utf8_decode(''), 1 , 1,'C');
$pdf->Line(16, 103, 196, 103);
$pdf->Line(106, 93, 106, 103);

$pdf->SetXY(16,85);
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(3,70,77);
$pdf->Cell(120, 6, utf8_decode('DATOS DEL TRANSPORTISTA'), 0 , 1);
$pdf->SetTextColor(0);
//Inicia sección del nombre
$pdf->SetXY(16,92);
$pdf->SetFont('Arial','b',6);
$pdf->Cell(20, 3, utf8_decode('NOMBRE'), 1 , 1,'C',1);
$pdf->SetXY(16,96);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90, 5, utf8_decode($nombre_chofer), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion del Nombre
//Inicia sección de Número de Licencia
$pdf->SetXY(106,92);
$pdf->Cell(25, 3, utf8_decode('No. DE LICENCIA'), 1 , 1,'C',1);
$pdf->SetXY(106,96);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90, 5, utf8_decode($no_licencia), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Número de licencia
//Inicia sección de Dirección del Chofer
$pdf->SetXY(16,102);
$pdf->Cell(20, 3, utf8_decode('DIRECCIÓN'), 1 , 1,'C',1);
$pdf->SetXY(16,106);
$pdf->SetFont('Arial','',8);
$pdf->Cell(180, 5, utf8_decode($direccion_chofer), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Dirección del Chofer
//---------------INICIA SECCIÓN DE DATOS DE DATOS DEL VEHÍCULO------------------------------------------

$pdf->SetXY(16,123);
$pdf->Cell(180, 20, utf8_decode(''), 1 , 1,'C');
$pdf->Line(16, 133, 196, 133);
$pdf->Line(106, 123, 106, 143);
$pdf->Line(61, 123, 61, 143);
$pdf->Line(151, 123, 151, 143);

$pdf->SetXY(16,115);
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(3,70,77);
$pdf->Cell(120, 6, utf8_decode('DATOS DEL VEHÍCULO'), 0 , 1);
$pdf->SetTextColor(0);
//Inicia sección de Color de Vehículo
$pdf->SetXY(16,122);
$pdf->SetFont('Arial','b',6);
$pdf->Cell(20, 3, utf8_decode('COLOR'), 1 , 1,'C',1);
$pdf->SetXY(16,126);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($color), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Color de Vehículo
//Inicia seccióin de Modelo
$pdf->SetXY(61,122);
$pdf->Cell(25, 3, utf8_decode('MODELO'), 1 , 1,'C',1);
$pdf->SetXY(61,126);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($modelo), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Modelo
//Inicia sección de placas/caja
$pdf->SetXY(106,122);
$pdf->Cell(20, 3, utf8_decode('PLACAS/CAJA'), 1 , 1,'C',1);
$pdf->SetXY(106,126);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($placas_caja), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Placas/caja
//Inicia sección de Placas/tractor
$pdf->SetXY(151,122);
$pdf->Cell(25, 3, utf8_decode('PLACAS/TRACTOR'), 1 , 1,'C',1);
$pdf->SetXY(151,126);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($placas), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Dirección del Chofer
//Inicia sección de CLASE/TIPO
$pdf->SetXY(16,132);
$pdf->Cell(25, 3, utf8_decode('CLASE/TIPO'), 1 , 1,'C',1);
$pdf->SetXY(16,136);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($clase), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de CLASE/TIPO
//Inicia sección de Línea
$pdf->SetXY(61,132);
$pdf->Cell(25, 3, utf8_decode('LÍNEA'), 1 , 1,'C',1);
$pdf->SetXY(61,136);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($linea), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Linea
//Inicia sección de Fecha
$pdf->SetXY(106,132);
$pdf->Cell(25, 3, utf8_decode('FECHA'), 1 , 1,'C',1);
$pdf->SetXY(106,136);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($dia.'/'.$mes.'/'.$año), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Fecha
//Inicia sección de Hora de salida
$pdf->SetXY(151,132);
$pdf->Cell(25, 3, utf8_decode('HORA DE SALIDA'), 1 , 1,'C',1);
$pdf->SetXY(151,136);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45, 5, utf8_decode($hora), 0 , 1,'');
$pdf->SetFont('Arial','b',6);
//END seccion de Dirección del Chofer

//--------------INICIA SECCIÓN DE LOS DATOS DEL PRODUCTOS-------------------------------------------
$pdf->SetXY(16,148);
$pdf->SetFont('Arial','',13);
$pdf->SetTextColor(3,70,77);
$pdf->Cell(120, 6, utf8_decode('DATOS DEL PRODUCTO'), 0 , 1,);
$pdf->SetTextColor(0);

$pdf->SetXY(16,155);
$pdf->SetFont('Arial','b',10);
$pdf->Cell(36, 10, utf8_decode('TIPO DE ENVASE'), 1 , 1,'C');


$pdf->SetFont('Arial','b',10);
$pdf->SetXY(52,155);
$pdf->Cell(145, 5, 'C  A  L  I  D  A  D  E  S', 1 , 1,'C');
$pdf->SetFont('Arial','b',8);
$pdf->SetXY(52,160);
$pdf->Cell(26, 5, 'EXPORTACION', 1 , 0,'C');
$pdf->Cell(19, 5, '1RA NAL', 1 , 0,'C');
$pdf->Cell(13, 5, 'R.C', 1 , 0,'C');
$pdf->Cell(19, 5, '2DA NAL', 1 , 0,'C');
$pdf->Cell(13, 5, 'D.S', 1 , 0,'C');
$pdf->Cell(19, 5, 'Peso/U', 1 , 0,'C');
$pdf->Cell(19, 5, 'Cantidad', 1 , 0,'C');
$pdf->Cell(17, 5, 'TOTAL', 1 , 1,'C');

//inicio de los campos de llenado para la sección de productos
$pdf->SetFont('Arial','',7);
//linea1
$pdf->SetXY(16,165);
$pdf->Cell(36, 6, utf8_decode($envases[0]), 1 , 0,'C');
$pdf->Cell(26, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, $pesos[0], 1 , 0,'C');
$pdf->Cell(19, 6, $cantidades[0], 1 , 0,'C');
$pdf->Cell(17, 6, $volumenes[0], 1 , 1,'C');
//linea 2
$pdf->SetXY(16,171);
$pdf->Cell(36, 6, utf8_decode($envases[1]), 1 , 0,'C');
$pdf->Cell(26, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, $pesos[1], 1 , 0,'C');
$pdf->Cell(19, 6, $cantidades[1], 1 , 0,'C');
$pdf->Cell(17, 6, $volumenes[1], 1 , 1,'C');
//linea 3
$pdf->SetXY(16,177);
$pdf->Cell(36, 6, utf8_decode($envases[2]), 1 , 0,'C');
$pdf->Cell(26, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, $pesos[2], 1 , 0,'C');
$pdf->Cell(19, 6, $cantidades[2], 1 , 0,'C');
$pdf->Cell(17, 6, $volumenes[2], 1 , 1,'C');
//linea 4
$pdf->SetXY(16,183);
$pdf->Cell(36, 6, utf8_decode($envases[3]), 1 , 0,'C');
$pdf->Cell(26, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, $pesos[3], 1 , 0,'C');
$pdf->Cell(19, 6, $cantidades[3], 1 , 0,'C');
$pdf->Cell(17, 6, $volumenes[3], 1 , 1,'C');
//linea 5
$pdf->SetXY(16,189);
$pdf->Cell(36, 6, utf8_decode($envases[4]), 1 , 0,'C');
$pdf->Cell(26, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, '', 1 , 0,'C');
$pdf->Cell(13, 6, '', 1 , 0,'C');
$pdf->Cell(19, 6, $pesos[4], 1 , 0,'C');
$pdf->Cell(19, 6, $cantidades[4], 1 , 0,'C');
$pdf->Cell(17, 6, $volumenes[4], 1 , 1,'C');
//linea de total
$pdf->SetXY(16,195);
$pdf->Cell(164, 6, 'PESO TOTAL:', 0 , 0,'R');
$pdf->Cell(17, 6,array_sum($volumenes).' kg', 1 , 1,'C');

$pdf->SetXY(16, 203);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(90.5, 8, utf8_decode('RECIBO  EL TOTAL  DE  CAJAS DETALLADAS  EN  ESTE  CONTROL DE  EMBARQUE, HACIENDOME  RESPONSABLE'), 0 , 1,);

$pdf->SetXY(16, 206);
$pdf->Cell(90.5, 8, utf8_decode('DE  CUALQUIER PERDIDA  O  FALTANTE AL MOMENTO DE LA ENTREGA,ACEPTANDO SE ME HAGA EL DESCUENTO'), 0 , 1,);

$pdf->SetXY(16, 209);
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

