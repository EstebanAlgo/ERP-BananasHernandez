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
$pdf->SetXY(0, 0);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(204,255,255);
$pdf->Cell(230, 276, '', 1, 0, 'C', True);//CUADRO FONDO-----------------------------------------------------------------


$pdf->Image('../assets/images/certificados/logo.png' , 15 ,19, 27 , 20,'PNG', 'www.platanerosoconusco.com');
$pdf->Image('../assets/images/certificados/icono-certificado.png' , 63 ,61, 5 , 5,'PNG');
$pdf->Image('../assets/images/certificados/icono-certificado.png' , 143 ,61, 5 , 5,'PNG');


$pdf->SetXY(7, 10);
$pdf->SetFont('Arial','',20);
$pdf->Cell(197, 8, utf8_decode('Asociación Agrícola de Productores de Plátano del Soconusco'), 0 , 1,'C');//TITULO

$pdf->SetXY(87, 20);
$pdf->SetFont('Arial','',9);
$pdf->Cell(10, 8, utf8_decode('R.F.C.'), 0 , 1);//RFC
$pdf->SetXY(97, 20);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(10, 8, utf8_decode('AAP- 660629-VDA'), 0 , 1);

$pdf->SetXY(7, 25);
$pdf->SetFont('Arial','',9);
$pdf->Cell(197, 8, utf8_decode('17ª Calle Oriente N° 57 Tapachula, Chiapas; México.'), 0 , 1,'C');//DIRECCION

$pdf->SetXY(7, 30);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(197, 8, utf8_decode('Tel. (962) 626-40-13'), 0 , 1,'C');//TELEFONO

$pdf->SetXY(163, 36);
$pdf->SetFont('Arial','',9);
$pdf->Cell(20, 8, utf8_decode('Reg. SAGARPA:'), 0 , 1,'C');//REGISTRO SAGARPA
$pdf->SetXY(185, 36);
$pdf->SetFont('Arial','b',9);
$pdf->Cell(20, 8, utf8_decode('AAL- 4134'), 0 , 1);//DIRECCION

$pdf->SetXY(7, 42);
$pdf->SetLineWidth(0.6);
$pdf->Cell(197, 8, '', 1 , 1);//CUADRO FECHA

$pdf->SetFont('Arial','B',13);
$pdf->SetTextColor(246,26,26);
$pdf->SetXY(7, 52);
$pdf->Cell(40, 14, 'No. '.$folio, 1 , 1,'C');//CUADRO FOLIO----


$pdf->SetTextColor(0,0,0);
$pdf->SetXY(7, 68);
$pdf->Cell(197, 50, '', 1 , 1);//cuadro de cliente---------------------------------------------------


$pdf->SetFont('Arial','',11);
$pdf->SetXY(9, 71);
$pdf->Cell(20, 8, 'AL C.', 0 , 1);
$pdf->SetLineWidth(0.3);
$pdf->Line(20, 77, 115, 77);
$pdf->SetXY(116, 71);
$pdf->Cell(20, 8,utf8_decode('TRANSPORTARÁ:'), 0 , 1);
$pdf->Line(150, 77, 202, 77);


$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 50);
$pdf->Cell(197, 8, 'EXTIENDE EL PRESENTE', 0 , 1,'C');
$pdf->SetFont('Arial','B',16);
$pdf->SetXY(7, 60);
$pdf->Cell(197, 8, 'CERTIFICADO DE ORIGEN', 0 , 1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(7, 80);
$pdf->Cell(35, 8, 'TIPO', 0 , 1,'C');
$pdf->Line(9, 94, 40, 94);
$pdf->Line(9, 101, 40, 101);
$pdf->Line(9, 108, 40, 108);

$pdf->SetXY(46, 80);
$pdf->Cell(35, 8, 'CANTIDAD', 0 , 1,'C');
$pdf->Line(48, 94, 77, 94);
$pdf->Line(48, 101, 77, 101);
$pdf->Line(48, 108, 77, 108);

$pdf->SetXY(84, 80);
$pdf->Cell(35, 8, 'PESO/UNIT', 0 , 1,'C');
$pdf->Line(85, 94, 118, 94);
$pdf->Line(85, 101, 118, 101);
$pdf->Line(85, 108, 118, 108);

$pdf->SetXY(125, 80);
$pdf->Cell(35, 8, 'VOLUMEN', 0 , 1,'C');
$pdf->Line(126, 94, 160, 94);
$pdf->Line(126, 101, 160, 101);
$pdf->Line(126, 108, 160, 108);

$pdf->SetXY(166, 80);
$pdf->Cell(35, 8, 'VARIEDAD', 0 , 1,'C');
$pdf->Line(168, 94, 202, 94);
$pdf->Line(168, 101, 202, 101);
$pdf->Line(168, 108, 202, 108);


$pdf->SetFont('Arial','',6);
$pdf->SetXY(8, 41);
$pdf->Cell(20, 6,utf8_decode('LUGAR DE EXPEDICIÓN Y FECHA:'), 0 , 1);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(70, 41);
$pdf->Cell(40,10,utf8_decode($lugar_registro.', '.$fecha_registro),0,1);//LUGAR Y FECHA-----------------------------------------


$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 70);
$pdf->Cell(100,10,utf8_decode($remitente),0,1,'C');//REMITENTE-----------------------------------------
$pdf->SetXY(150, 70);
$pdf->Cell(57,10,utf8_decode($producto),0,1,'C');//PRODUCTO-----------------------------------------

//seccion de productos----------------------------------------------------------------------------------------------
if ($cont_variedad==1) {

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 93);
$pdf->Cell(193,10,utf8_decode('      ---------------              ---------------               ---------------                ---------------                 ---------------'),0,1);


$pdf->SetXY(7, 100);
$pdf->Cell(193,10,utf8_decode('      ---------------              ---------------               ---------------                ---------------                 ---------------'),0,1);
}
if ($cont_variedad==2) {



$pdf->SetXY(7, 100);
$pdf->Cell(193,10,utf8_decode('      ---------------              ---------------               ---------------                ---------------                 ---------------'),0,1);
 
}

if($cont_variedad>5)
{
      if($cont_variedad==10)
{
$pdf->SetFont('Arial','',5);
$pdf->SetXY(6, 82);
$pdf->Cell(36,10,utf8_decode($envases[9]),0,1,'C');//envases
$pdf->SetXY(44, 82);
$pdf->Cell(38,10,$cantidades[9].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 82);
$pdf->Cell(37,10,$pesos[9].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 82);
$pdf->Cell(33,10,$volumenes[9].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 82);
$pdf->Cell(32,10,utf8_decode($variedades[9]),0,1,'C');//variedad

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
$cad_QR_variedad.=$envases[0];
$pdf->SetFont('Arial','',6);
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
$cad_QR_variedad.='_VARIEDAD:'.$envases[1];  
$pdf->SetFont('Arial','',6);  
$pdf->SetXY(6, 91);
$pdf->Cell(36,10,utf8_decode($envases[1]),0,1,'C');//envases
$pdf->SetXY(44, 91);
$pdf->Cell(38,10,$cantidades[1].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 91);
$pdf->Cell(37,10,$pesos[1].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 91);
$pdf->Cell(33,10,$volumenes[1].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 91);
$pdf->Cell(32,10,utf8_decode($variedades[1]),0,1,'C');//variedad
if($cont_variedad>2)
{
$cad_QR_variedad.='_VARIEDAD:'.$envases[2];     
$pdf->SetXY(6, 94);
$pdf->Cell(36,10,utf8_decode($envases[2]),0,1,'C');//envases
$pdf->SetXY(44, 94);
$pdf->Cell(38,10,$cantidades[2].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 94);
$pdf->Cell(37,10,$pesos[2].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 94);
$pdf->Cell(33,10,$volumenes[2].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 94);
$pdf->Cell(32,10,utf8_decode($variedades[2]),0,1,'C');//variedad
if($cont_variedad>3)
      {
$cad_QR_variedad.='_VARIEDAD:'.$envases[3];          
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
if($cont_variedad>4)
{
$cad_QR_variedad.='_VARIEDAD:'.$envases[4];
$pdf->SetXY(6, 101);
$pdf->Cell(36,10,utf8_decode($envases[4]),0,1,'C');//envases
$pdf->SetXY(44, 101);
$pdf->Cell(38,10,$cantidades[4].' unidades',0,1,'C');//pesos
$pdf->SetXY(83, 101);
$pdf->Cell(37,10,$pesos[4].' kg c/u',0,1,'C');//cantidades
$pdf->SetXY(126, 101);
$pdf->Cell(33,10,$volumenes[4].' kg',0,1,'C');//volumenes
$pdf->SetXY(168, 101);
$pdf->Cell(32,10,utf8_decode($variedades[4]),0,1,'C');//variedad
}
      }
 }
}

}
else
{
$cad_QR_variedad.='_VARIEDAD:'.$envases[0];     
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
$cad_QR_variedad.='_VARIEDAD:'.$envases[1];     
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
$cad_QR_variedad.='_VARIEDAD:'.$envases[2];     
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



$pdf->SetFont('Arial','B',11);
$pdf->SetXY(9, 108);
$pdf->Cell(10,10,'USO: ',0,1,'C');//USO
$pdf->Line(19, 115, 202, 115);
$pdf->SetXY(17, 108);
$pdf->SetFont('Arial','',11);
$pdf->Cell(187,10,utf8_decode($uso),0,1,'C');//USO


//SECCION ORÍGENES---------------------------------------------------------------------------------------------------

$pdf->SetXY(7, 123);
$pdf->SetLineWidth(0.6);
$pdf->Cell(197,95,'',1,1);//CUADRO DE ORIGEN
$pdf->SetXY(80, 119);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,8,'PROCEDENCIA',1,1,'C',true);//TITULO PROCEDENCIA

$pdf->SetLineWidth(0.3);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(7, 130);
$pdf->Cell(63,8,'REGISTRO DE EMPACADORA',0,1,'C');
$pdf->Line(9, 144, 70, 144);
$pdf->Line(9, 150, 70, 150);
$pdf->Line(9, 156, 70, 156);
$pdf->Line(9, 162, 70, 162);
$pdf->Line(9, 169, 70, 169);

$pdf->SetXY(85, 130);
$pdf->Cell(63,8,'PREDIO',0,1,'C');
$pdf->Line(88, 144, 145, 144);
$pdf->Line(88, 150, 145, 150);
$pdf->Line(88, 156, 145, 156);
$pdf->Line(88, 162, 145, 162);
$pdf->Line(88, 169, 145, 169);

$pdf->SetXY(160, 130);
$pdf->Cell(40,8,'MUNICIPIO',0,1,'C');
$pdf->Line(160, 144, 202, 144);
$pdf->Line(160, 150, 202, 150);
$pdf->Line(160, 156, 202, 156);
$pdf->Line(160, 162, 202, 162);
$pdf->Line(160, 169, 202, 169);

if ($cont_origen==1) {

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 142);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 148);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 154);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 161);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}
if ($cont_origen==2) {

$pdf->SetFont('Arial','',12);
$pdf->SetXY(7, 148);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 154);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 161);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}

if ($cont_origen==3) {

$pdf->SetFont('Arial','',12);

$pdf->SetXY(7, 154);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);
$pdf->SetXY(7, 161);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}
if ($cont_origen==4) {

$pdf->SetFont('Arial','',12);

$pdf->SetXY(7, 161);
$pdf->Cell(193,10,utf8_decode('                  ---------------                                               ---------------                                     ---------------'),0,1);

}


if($cont_origen>5)
{ 
$pdf->SetFont('Arial','',7);
$pdf->SetXY(8, 138);
$pdf->Cell(62,10,$empacadoras[0],0,1,'C');//Registro empacadora
$pdf->SetXY(85, 138);
$pdf->Cell(62,10,utf8_decode($origenes[0]),0,1,'C');//Origen
$pdf->SetXY(159, 138);
$pdf->Cell(41,10,utf8_decode($municipios[0]),0,1,'C');//Municipio

if($cont_origen>1)
{

$pdf->SetXY(8, 144);
$pdf->Cell(62,10,$empacadoras[1],0,1,'C');
$pdf->SetXY(85, 144);
$pdf->Cell(62,10,utf8_decode($origenes[1]),0,1,'C');
$pdf->SetXY(159, 144);
$pdf->Cell(41,10,utf8_decode($municipios[1]),0,1,'C');

if($cont_origen>2)
{
$pdf->SetFont('Arial','',7);	
$pdf->SetXY(8, 150);
$pdf->Cell(62,10,$empacadoras[2],0,1,'C');
$pdf->SetXY(85, 150);
$pdf->Cell(62,10,utf8_decode($origenes[2]),0,1,'C');
$pdf->SetXY(159, 150);
$pdf->Cell(41,10,utf8_decode($municipios[2]),0,1,'C');
if($cont_origen>3)
{
$pdf->SetXY(8, 156);
$pdf->Cell(62,10,$empacadoras[3],0,1,'C');
$pdf->SetXY(85, 156);
$pdf->Cell(62,10,utf8_decode($origenes[3]),0,1,'C');
$pdf->SetXY(159, 156);
$pdf->Cell(41,10,utf8_decode($municipios[3]),0,1,'C');

if($cont_origen>4)
{
$pdf->SetXY(8, 163);
$pdf->Cell(62,10,$empacadoras[4],0,1,'C');
$pdf->SetXY(85, 163);
$pdf->Cell(62,10,utf8_decode($origenes[4]),0,1,'C');
$pdf->SetXY(159, 163);
$pdf->Cell(41,10,utf8_decode($municipios[4]),0,1,'C');
if($cont_origen>5)
{
$pdf->SetXY(8, 161);
$pdf->Cell(62,10,$empacadoras[5],0,1,'C');
$pdf->SetXY(85, 161);
$pdf->Cell(62,10,utf8_decode($origenes[5]),0,1,'C');
$pdf->SetXY(159, 161);
$pdf->Cell(41,10,utf8_decode($municipios[5]),0,1,'C');
if($cont_origen>6)
{
$pdf->SetXY(8, 154);
$pdf->Cell(62,10,$empacadoras[6],0,1,'C');
$pdf->SetXY(85, 154);
$pdf->Cell(62,10,utf8_decode($origenes[6]),0,1,'C');
$pdf->SetXY(159, 154);
$pdf->Cell(41,10,utf8_decode($municipios[6]),0,1,'C');

if($cont_origen>7)
{
$pdf->SetXY(8, 148);
$pdf->Cell(62,10,$empacadoras[7],0,1,'C');
$pdf->SetXY(85, 148);
$pdf->Cell(62,10,utf8_decode($origenes[7]),0,1,'C');
$pdf->SetXY(159, 148);
$pdf->Cell(41,10,utf8_decode($municipios[7]),0,1,'C');

if($cont_origen>8)
{
$pdf->SetXY(8, 142);
$pdf->Cell(62,10,$empacadoras[8],0,1,'C');
$pdf->SetXY(85, 142);
$pdf->Cell(62,10,utf8_decode($origenes[8]),0,1,'C');
$pdf->SetXY(159, 142);
$pdf->Cell(41,10,utf8_decode($municipios[8]),0,1,'C');

if($cont_origen>9)
{
$pdf->SetXY(8, 136);
$pdf->Cell(62,10,$empacadoras[9],0,1,'C');
$pdf->SetXY(85, 136);
$pdf->Cell(62,10,utf8_decode($origenes[9]),0,1,'C');
$pdf->SetXY(159, 136);
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
$pdf->SetXY(8, 135);
$pdf->Cell(62,10,$empacadoras[0],0,1,'C');//Registro empacadora
$pdf->SetXY(85, 135);
$pdf->Cell(62,10,utf8_decode($origenes[0]),0,1,'C');//Origen
$pdf->SetXY(159, 135);
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
$pdf->SetXY(8, 149);
$pdf->Cell(62,10,$empacadoras[2],0,1,'C');
$pdf->SetXY(85, 149);
$pdf->Cell(62,10,utf8_decode($origenes[2]),0,1,'C');
$pdf->SetXY(159, 149);
$pdf->Cell(41,10,utf8_decode($municipios[2]),0,1,'C');
if($cont_origen>3)
{
$pdf->SetXY(8, 155);
$pdf->Cell(62,10,$empacadoras[3],0,1,'C');
$pdf->SetXY(85, 155);
$pdf->Cell(62,10,utf8_decode($origenes[3]),0,1,'C');
$pdf->SetXY(159, 155);
$pdf->Cell(41,10,utf8_decode($municipios[3]),0,1,'C');

if($cont_origen>4)
{
$pdf->SetXY(8, 162);
$pdf->Cell(62,10,$empacadoras[4],0,1,'C');
$pdf->SetXY(85, 162);
$pdf->Cell(62,10,utf8_decode($origenes[4]),0,1,'C');
$pdf->SetXY(159, 162);
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
$pdf->SetXY(8, 177);
$pdf->Cell(62,10,utf8_decode($medio_transporte),0,1,'C');//MEDIO dE de transporte
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(7, 172);
$pdf->Cell(66,6,'MEDIO DE TRANSPORTE',0,1,'C');
$pdf->Line(9, 184, 70, 184);
$pdf->Line(9, 190, 70, 190);
$pdf->Line(9, 196, 70, 196);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(88, 177);
$pdf->Cell(57,10,utf8_decode($marca_vehiculo),0,1,'C');//marca del vehículo
$pdf->SetXY(85, 172);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(66,6,utf8_decode('MARCA DEL CAMIÓN'),0,1,'C');
$pdf->Line(88, 184, 145, 184);
$pdf->Line(88, 190, 145, 190);
$pdf->Line(88, 196, 145, 196);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(160, 177);
$pdf->Cell(42,10,utf8_decode($placas),0,1,'C');//placas
$pdf->SetXY(148, 172);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(66,6,utf8_decode('PLACAS Y/O NÚMEROS'),0,1,'C');
$pdf->Line(160, 184, 202, 184);
$pdf->Line(160, 190, 202, 190);
$pdf->Line(160, 196, 202, 196);


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 200);
$pdf->Cell(30,8,'NOMBRE DEL CHOFER:',0,1);
$pdf->Line(52, 206, 202, 206);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(45, 199);
$pdf->Cell(160,10,utf8_decode($nombre_chofer),0,1,'C');//chofer

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 209);
$pdf->Cell(30,10,utf8_decode('N° DE LICENCIA:'),0,1);
$pdf->Line(39, 216, 202, 216);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(35, 209);
$pdf->Cell(165,10,utf8_decode($no_licencia),0,1,'C');//número de licencia


//SECCION DESTINOS---------------------------------------------------------------------------------------------------

$pdf->SetLineWidth(0.6);
$pdf->SetXY(7, 223);
$pdf->Cell(197,51,'',1,1);//CUADRO DE DESTINO
$pdf->SetXY(80, 219);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,8,'DESTINO',1,1,'C',true);//TITULO DESTINO

$pdf->SetLineWidth(0.3);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 226);
$pdf->Cell(30,10,utf8_decode('NOMBRE:'),0,1);
$pdf->Line(27, 233, 202, 233);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(23, 226);
$pdf->Cell(180,10,utf8_decode($destino),0,1,'C');//DESTINO

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 235);
$pdf->Cell(30,10,utf8_decode('DIRECCIÓN:'),0,1);
$pdf->Line(32, 242, 202, 242);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(30, 235);
$pdf->Cell(175,10,utf8_decode($direccion_destino),0,1,'C');//Dirección de destino

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 243);
$pdf->Cell(30,10,utf8_decode('CIUDAD:'),0,1);
$pdf->Line(26, 250, 70, 250);
$pdf->SetXY(22, 243);
$pdf->SetFont('Arial','',9);
$pdf->Cell(52,10,utf8_decode($ciudad_destino),0,1,'C');//número de licencia

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(75, 243);
$pdf->Cell(20,10,utf8_decode('PAÍS:'),0,1);
$pdf->Line(85, 250, 130, 250);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(85, 243);
$pdf->Cell(41,10,utf8_decode($pais_destino),0,1,'C');//número de licencia


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(10, 259);
$pdf->Cell(90,10,utf8_decode('NOMBRE DEL RESPONSABLE DEL DOCUMENTO'),0,1,'C');
$pdf->Line(13, 261, 98, 261);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(13, 254);
$pdf->Cell(85,10,utf8_decode($responsable),0,1,'C');//número de licencia

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(155, 259);
$pdf->Cell(20,10,utf8_decode('FIRMA'),0,1,'C');
$pdf->Line(140, 261, 190, 261);

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(9, 265);
$pdf->Cell(20,8,utf8_decode('NOTA:'),0,1);
$pdf->SetFont('Arial','',8);
$pdf->SetXY(19, 265);
$pdf->Cell(20,8,utf8_decode('CUALQUIER DECLARACIÓN CON FALSEDAD QUE SE MANIFIESTE EN ESTE CERTIFICADO DE ORIGEN SERÁ RESPONSABILIDAD DEL'),0,1);
$pdf->SetXY(19, 268);
$pdf->Cell(20,8,utf8_decode('SOLICITANTE, ESTE CERTIFICADO AMPARA ÚNICAMENTE LA MOVILIZACIÓN DEL PLÁTANO.'),0,1);

$info='ASOCIACIÓN AGRÍCOLA DE PRODUCTORES DE PLÁTANO DEL SOCONUSCO; Folio:'.$folio.'; Remitente:'.$remitente.
'; Producto:'.$producto.'; DESTINO:'.$ciudad_destino.', '.$pais_destino.'.';

//Agregamos la libreria para genera códigos QR
     require "phpqrcode/qrlib.php";    
     
     //Declaramos una carpeta temporal para guardar la imagenes generadas
     $dir = 'temp/';
     
     //Si no existe la carpeta la creamos
     if (!file_exists($dir))
        mkdir($dir);
     
        //Declaramos la ruta y nombre del archivo a generar
     $filename = $dir.'test.png';
 
        //Parametros de Condiguración
     
     $tamaño = 10; //Tamaño de Pixel
     $level = 'L'; //Precisión Baja
     $framSize = 3; //Tamaño en blanco
     
        //Enviamos los parametros a la Función para generar código QR 
     QRcode::png($info, $filename, $level, $tamaño, $framSize); 
     
        //Mostramos la imagen generada
$pdf->Image($dir.basename($filename),175,17,20,20);


//$pdf->Image('http://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$info.'&.png',175,17,20,20);

//$pdf->Image('http://chart.apis.google.com/chart?cht=qr&chs=500x500&chl='.$info.'',95,170,25,25,'PNG');


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
$pdf->SetFillColor(252, 243, 207);
$pdf->Cell(230, 276, '', 1, 0, 'C', True);//CUADRO FONDO----
$año= substr($fecha_registro, 0,4);
$mes= substr($fecha_registro, 5,2);
$dia= substr($fecha_registro, 8,2);

$pdf->Image('../assets/images/certificados/logo.png' , 18 ,13, 27 , 20,'PNG', 'www.platanerosoconusco.com');

$pdf->SetXY(7, 10);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(196, 8, utf8_decode('CARTA DE INSTRUCCIÓN DE TRANSPORTE DE FRUTA'), 0, 1,'C');//TITULO
$pdf->SetXY(7, 15);
$pdf->Cell(196, 8, utf8_decode('Y RESPONSABILIDAD DEL TRANSPORTISTA'), 0 , 1,'C');//TITULO

$pdf->SetFont('Arial','B',11);
$pdf->SetXY(83, 32);
$pdf->Cell(50, 6, utf8_decode('TAPACHULA, CHIAPAS'), 0 , 1,'C');//TITULO

$pdf->SetFont('Arial','B',13);
$pdf->SetTextColor(246,26,26);
$pdf->SetXY(137, 32);
$pdf->Cell(30, 6,utf8_decode('N°. '.$folio_carta), 0 , 1,'C');
$pdf->SetTextColor(0,0,0);


$pdf->SetFont('Arial','B',7);
$pdf->SetXY(168, 34);
$pdf->Cell(35, 4,utf8_decode('DÍA           MES          AÑO'), 0 , 1,'C');
$pdf->SetLineWidth(0.4);
$pdf->Line(170, 34, 202, 34);

 
$pdf->SetFont('Arial','',9);
$pdf->SetXY(170, 27);
$pdf->Cell(32,10,utf8_decode($dia.'         '.$mes.'         '.$año),0,1,'C');//LUGAR Y FECHA-----------------------------------------

$pdf->SetXY(9,38);
$pdf->SetFont('Arial','B',5);
$pdf->SetFillColor(249, 231, 159);
$pdf->Cell(20, 3, utf8_decode('RECIBÍ DE:'), 1, 0, 'C', True);

$pdf->SetLineWidth(0.8);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(9, 38);
$pdf->Cell(193,11,utf8_decode($remitente),1,1,'C');

$pdf->SetXY(9,51);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(50, 3, utf8_decode('EN LA EMPACADORA DENOMINADA:'), 1, 0, 'C', True);
$pdf->SetLineWidth(0.8);
$pdf->SetFont('Arial','',8);
$pdf->SetXY(9, 51);
$pdf->Cell(193,11,utf8_decode($cad_origen),1,1,'C');

$pdf->SetXY(9, 64);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9,64);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(50, 3, utf8_decode('LOCALIZADA EN EL MUNICIPIO DE:'), 1, 0, 'C', True);
$pdf->SetXY(110,64);
$pdf->Cell(25, 3, utf8_decode('DEL ESTADO DE:'), 1, 0, 'C', True);


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

$pdf->SetLineWidth(0.8);
$pdf->SetXY(9, 77);
$pdf->Cell(193,33,'',1,1);

$pdf->SetLineWidth(0.3);
$pdf->SetXY(9, 77);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9,77);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(30, 3, utf8_decode('LA CANTIDAD DE:'), 1, 0, 'C', True);
$pdf->SetXY(100,77);
$pdf->Cell(10, 3, utf8_decode('CON'), 1, 0, 'C', True);
$pdf->SetXY(150,77);
$pdf->Cell(20, 3, utf8_decode('KG. C/U'), 1, 0, 'C', True);


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


$pdf->SetXY(9,88);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(50, 3, utf8_decode('CONTENIENDO EXCLUSIVAMENTE:'), 1, 0, 'C', True);
$pdf->SetXY(140,88);
$pdf->Cell(30, 3, utf8_decode('DE ORIGEN NACIONAL'), 1, 0, 'C', True);
$pdf->SetXY(9, 88);
$pdf->Cell(193,11,'',1,1);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(9, 89);
$pdf->Cell(193,10,utf8_decode($cad_variedad),0,1,'C');

$pdf->SetXY(9,99);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(50, 3, utf8_decode('SEGÚN EL CERTIFICADO DE ORIGEN NÚMERO:'), 1, 0, 'C', True);
$pdf->SetXY(120,99);
$pdf->Cell(30, 3, utf8_decode('DE FECHA'), 1, 0, 'C', True);
$pdf->SetXY(9, 99);
$pdf->Cell(193,11,'',1,1);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(9, 101);
$pdf->Cell(100,10,utf8_decode($folio),0,1,'C');
$pdf->SetXY(100, 101);
$pdf->Cell(100,10,utf8_decode($fecha_registro),0,1,'C');


$pdf->SetXY(9,112);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(70, 3, utf8_decode('EL PRODUCTO ES TRANSPORTADO EN UN VEHÍCULO MARCA:'), 1, 0, 'C', True);
$pdf->SetXY(9,123);
$pdf->Cell(30, 3, utf8_decode('MODELO:'), 1, 0, 'C', True);
$pdf->SetXY(90,123);
$pdf->Cell(30, 3, utf8_decode('PLACAS:'), 1, 0, 'C', True);
$pdf->SetXY(150,123);
$pdf->Cell(30, 3, utf8_decode('DEL ESTADO DE:'), 1, 0, 'C', True);
$pdf->SetXY(9,134);
$pdf->Cell(30, 3, utf8_decode('CONDUCIDO POR:'), 1, 0, 'C', True);
$pdf->SetXY(9,145);
$pdf->Cell(50, 3, utf8_decode('CON LICENCIA DE OPERADOR N°.:'), 1, 0, 'C', True);
$pdf->SetXY(150,145);
$pdf->Cell(30, 3, utf8_decode('DEL ESTADO DE:'), 1, 0, 'C', True);
$pdf->SetXY(9,156);
$pdf->Cell(30, 3, utf8_decode('QUE ESTÁ AL SERVICIO DE:'), 1, 0, 'C', True);


$pdf->SetXY(9, 112);
$pdf->SetLineWidth(0.8);
$pdf->Cell(193,55,'',1,1);
$pdf->SetLineWidth(0.3);
$pdf->SetFont('Arial','',11);
$pdf->SetXY(9, 112	);
$pdf->Cell(193,11,utf8_decode($marca_vehiculo),1,1,'C');
$pdf->SetXY(9, 123);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9, 125);
$pdf->Cell(60,10,utf8_decode($modelo),0,1,'C');
$pdf->SetXY(75, 125);
$pdf->Cell(60,10,utf8_decode($placas),0,1,'C');
$pdf->SetXY(141, 125);
$pdf->Cell(60,10,utf8_decode($estado_chofer),0,1,'C');

$pdf->SetXY(9, 134);
$pdf->Cell(193,11,utf8_decode($nombre_chofer),1,1,'C');

$pdf->SetXY(9, 145);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9, 147);
$pdf->Cell(100,10,utf8_decode($no_licenciar),0,1,'C');
$pdf->SetXY(150, 147);
$pdf->Cell(50,10,utf8_decode($estado_chofer),0,1,'C');

$pdf->SetXY(9, 156);
$pdf->Cell(193,11,utf8_decode($servicio),1,1,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(9, 172);
$pdf->Cell(193,5,utf8_decode('TRANSPORTO  ESTE PRODUCTO  BAJO  MI  ESTRICTA  RESPONSABILIDAD  Y  HAGO  CONSTAR  PARA  LOS  FINES  QUE  AL  INTERESADO'),0,1,'C');
$pdf->SetXY(9, 175);
$pdf->Cell(193,5,utf8_decode('CONVENGAN  QUE ÚNICAMENTE  TENGO  INSTRUCCIONES   DE   LOS   DUEÑOS  DE  LA  CARGA  DESCRITA  EN  ESTE  DOCUMENTO  PARA'),0,1,'C');
$pdf->SetXY(8, 178);
$pdf->Cell(193,5,utf8_decode('TRANSPORTAR A SU DESTINO FINAL, CONSTITUYÉNDOME COMO ÚNICO RESPONSABLE DEL TRAYECTO:'),0,1);


$pdf->SetXY(9,187);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(30, 3, utf8_decode('DE:(ORIGEN)'), 1, 0, 'C', True);
$pdf->SetXY(150,187);
$pdf->Cell(30, 3, utf8_decode('A: (DESTINO)'), 1, 0, 'C', True);
$pdf->SetLineWidth(0.8);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(9, 187);
$pdf->Cell(193,12,'',1,1);
$pdf->SetLineWidth(0.3);
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


$pdf->SetFont('Arial','B',8);
$pdf->SetXY(9, 202);
$pdf->Cell(193,5,utf8_decode('ASÍ  MISMO,  RATIFICO  CON  MI  FIRMA  AL  CALCE,  QUE  TENGO  ESTRÍCTAMENTE  PROHIBIDO  TRANSPORTAR  OTRA  CARGA  QUE  NO '),0,1,'C');
$pdf->SetXY(9, 205);
$pdf->Cell(193,5,utf8_decode('SEA  LA  DESCRITA  EN ESTE DOCUMENTO O  LLEVAR PASAJEROS;  SI  POR  ALGUNA CIRCUNSTANCIA  LO HAGO,  ES  BAJO  MI ÚNICA Y'),0,1,'C');
$pdf->SetXY(8, 208);
$pdf->Cell(193,5,utf8_decode('ABSOLUTA   RESPONSABILIDAD,   ASUMIENDO   COMPLETAMENTE   LAS    CONSECUÉNCIAS    LEGALES    DE    CARACTER    PENAL   Y/O'),0,1);
$pdf->SetXY(8, 211);
$pdf->Cell(193,5,utf8_decode('PROCESAL QUE LA VIOLACIÓN A ESTAS INSTRUCCIONES REPRESENTE.'),0,1);


$pdf->Line(80, 232, 130, 232);
$pdf->SetXY(9, 232);
$pdf->Cell(193,5,'FIRMA DEL CONDUCTOR',0,1,'C');


$pdf->SetXY(9, 238);
$pdf->SetLineWidth(0.8);
$pdf->Cell(193,35,'',1,1);
$pdf->SetLineWidth(0.3);

$pdf->SetXY(9,239);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10, 3, utf8_decode('NOMBRE:'), 0, 1);
$pdf->SetXY(9,251);
$pdf->Cell(10, 3, utf8_decode('DIRECCIÓN:'), 0, 1);
$pdf->SetXY(9,263);
$pdf->Cell(10, 3, utf8_decode('LICENCIA:'), 0, 1);
$pdf->SetXY(155,263);
$pdf->Cell(47, 3, utf8_decode('HORA DE DOCUMENTACIÓN'), 0, 1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(9, 240);
$pdf->Cell(193,10,utf8_decode($nombre_chofer),0,1,'C');
$pdf->Line(9, 250, 202, 250);

$pdf->SetXY(9, 252);
$pdf->Cell(193,10,utf8_decode($direccion_chofer),0,1,'C');
$pdf->Line(9, 262, 202, 262);

$pdf->SetXY(9, 264);
$pdf->Cell(150,10,utf8_decode($no_licenciar),0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->SetXY(153, 264);
$pdf->Cell(50,10,utf8_decode($fecha_registro),0,1,'C');
$pdf->Line(155, 262, 155, 273);

$info2='ASOCIACIÓN AGRÍCOLA DE PRODUCTORES DE PLÁTANO DEL SOCONUSCO; Folio responsiva:'.$folio_carta.'; Remitente:'.$remitente.
'; Producto:'.$producto.'; Destino:'.$ciudad_destino.', '.$pais_destino.'.' ;

//Declaramos una carpeta temporal para guardar la imagenes generadas
     $dir2 = 'temp/';
     
     //Si no existe la carpeta la creamos
     if (!file_exists($dir2))
        mkdir($dir2);
     
        //Declaramos la ruta y nombre del archivo a generar
     $filename2 = $dir2.'test2.png';
 
        //Parametros de Condiguración
     
     $tamaño2 = 10; //Tamaño de Pixel
     $level2 = 'L'; //Precisión Baja
     $framSize2 = 3; //Tamaño en blanco
     
        //Enviamos los parametros a la Función para generar código QR 
     QRcode::png($info2, $filename2, $level2, $tamaño2, $framSize2); 
     
        //Mostramos la imagen generada
$pdf->Image($dir2.basename($filename2),175,9,20,20);
//$pdf->Image('http://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$info.'&.png',175,9,20,20);


//SECCION DE CONSTANCIA DE CLORINACIÓN-------------------------------------------------------------------------------------------------------------


$pdf->AddPage();

$pdf->SetXY(0, 0);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(204,255,255);
$pdf->Cell(230, 165, '', 1, 0, 'C', True);//CUADRO FONDO----


$pdf->Image('../assets/images/certificados/logo.png' , 15 ,19, 27 , 20,'PNG', 'www.platanerosoconusco.com');
$pdf->Image('../assets/images/certificados/icono-certificado.png' , 61 ,38, 5 , 5,'PNG');
$pdf->Image('../assets/images/certificados/icono-certificado.png' , 145 ,38, 5 , 5,'PNG');


$pdf->SetXY(7, 10);
$pdf->SetFont('Arial','',20);
$pdf->Cell(197, 8, utf8_decode('Asociación Agrícola de Productores de Plátano del Soconusco'), 0 , 1,'C');//TITULO


$pdf->SetXY(9, 20);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(193, 8, utf8_decode('Reg. SAG. AAL - 4134'), 0 , 1, 'C');

$pdf->SetXY(70, 25);
$pdf->SetFont('Arial','',9);
$pdf->Cell(40, 8, utf8_decode('17ª Calle Oriente N° 57'), 0 , 1);
$pdf->SetXY(105, 25);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40, 8, utf8_decode('Tel. (962) 626-40-13 '), 0 , 1);

$pdf->SetXY(7, 30);
$pdf->SetFont('Arial','',9);
$pdf->Cell(197, 8, utf8_decode('Tapachula, Chiapas; México.'), 0 , 1,'C');//TELEFONO

$pdf->SetXY(7, 37);
$pdf->SetFont('Arial','',14);
$pdf->Cell(197, 8, utf8_decode('CONSTANCIA DE CLORINACIÓN'), 0 , 1,'C');//TELEFONO


$pdf->SetFont('Arial','B',13);
$pdf->SetTextColor(246,26,26);
$pdf->SetXY(170, 25);
$pdf->Cell(30, 6,utf8_decode('N°. '.$folio_clorinacion), 0 , 1,'C');
$pdf->SetTextColor(0,0,0);


$pdf->SetFont('Arial','B',7);
$pdf->SetXY(168, 41);
$pdf->Cell(35, 4,utf8_decode('DÍA           MES          AÑO'), 0 , 1,'C');
$pdf->SetLineWidth(0.4);
$pdf->Line(170, 41, 202, 41);

 
$pdf->SetFont('Arial','',9);
$pdf->SetXY(170, 34);
$pdf->Cell(32,10,utf8_decode($dia.'         '.$mes.'         '.$año),0,1,'C');//LUGAR Y FECHA-----------------------------------------

$pdf->SetXY(9, 46);
$pdf->SetLineWidth(0.8);
$pdf->Cell(193,117,'',1,1);
$pdf->SetLineWidth(0.3);


$pdf->SetFont('Arial','B',14);
$pdf->SetXY(9, 47);
$pdf->Cell(66,10,utf8_decode('     Nombre del Producto                Kilogramos'),0,1);
$pdf->Line(9, 58, 202, 58);
$pdf->Line(9, 69, 202, 69);
$pdf->Line(75, 46, 75, 69);
$pdf->Line(132, 46, 132, 69);
$pdf->Line(9, 83, 202, 83);



$pdf->SetFont('Arial','B',12);
$pdf->SetXY(73, 84);
$pdf->SetLineWidth(0.8);
$pdf->Cell(70,6,'DATOS COMPLEMENTARIOS',1,1,'C');
$pdf->SetLineWidth(0.3);

$pdf->SetFont('Arial','',6);
$pdf->SetXY(9, 58);
$pdf->Cell(66,10,utf8_decode($cad_envases),0,1,'C');
$pdf->SetXY(9, 58);
$pdf->Cell(66,14,utf8_decode($cad_envases2),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(75, 58);
$pdf->Cell(57,11,utf8_decode($cad_pesos),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 95);
$pdf->Cell(20,6,utf8_decode('Procedimiento empleado:'),0,1);
$pdf->Line(55, 100, 199, 100);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(50, 95);
$pdf->Cell(150,6,utf8_decode('INMERCIÓN CLORADA AL '.$grado.'%'),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 104);
$pdf->Cell(20,6,utf8_decode('Procedencia:'),0,1);
$pdf->Line(35, 109, 199, 109);
$pdf->SetFont('Arial','',7);
$pdf->SetXY(30, 101);
$pdf->Cell(170,6,utf8_decode($procedencia_clorinacion2),0,1,'C');
$pdf->SetXY(30, 104);
$pdf->Cell(170,6,utf8_decode($procedencia_clorinacion.'; Chiapas.'),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 113);
$pdf->Cell(20,6,utf8_decode('Destino:'),0,1);
$pdf->Line(28, 118, 199, 118);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 113);
$pdf->Cell(170,6,utf8_decode($ciudad_destino),0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 122);
$pdf->Cell(20,6,utf8_decode('Remitente:'),0,1);
$pdf->Line(32, 127, 199, 127);
$pdf->SetXY(30, 122);
$pdf->Cell(170,6,utf8_decode($remitente),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 131);
$pdf->Cell(20,6,utf8_decode('Destinatario:'),0,1);
$pdf->Line(35, 136, 199, 136);
$pdf->SetXY(30, 131);
$pdf->Cell(170,6,utf8_decode($destino),0,1,'C');


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(12, 139);
$pdf->Cell(40,6,utf8_decode('Vehículo de transporte'),0,1);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(55, 139);
$pdf->Cell(20,6,utf8_decode('Marca:'),0,1);
$pdf->Line(68, 144, 100, 144);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(63, 139);
$pdf->Cell(42,6,utf8_decode($marca_vehiculo),0,1,'C');
$pdf->SetXY(110, 139);
$pdf->Cell(20,6,utf8_decode('Modelo:'),0,1);
$pdf->Line(125, 144, 155, 144);
$pdf->SetXY(120, 139);
$pdf->Cell(38,6,utf8_decode($modelo),0,1,'C');
$pdf->SetXY(160, 139);
$pdf->Cell(20,6,utf8_decode('Placas:'),0,1);
$pdf->Line(175, 144, 199, 144);
$pdf->SetFont('Arial','',6);
$pdf->SetXY(172, 139);
$pdf->Cell(32,6,utf8_decode($placas),0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 148);
$pdf->Cell(20,6,utf8_decode('Observaciones:'),0,1);
$pdf->Line(40, 153, 199, 153);
$pdf->Line(12, 161, 199, 161);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 148);
$pdf->Cell(170,6,utf8_decode('OP: '.$nombre_chofer),0,1,'C');
$pdf->SetXY(30, 156);
$pdf->Cell(170,6,utf8_decode('N°. Licencia: '.$no_licenciar),0,1,'C');

$info3='ASOCIACIÓN AGRÍCOLA DE PRODUCTORES DE PLÁTANO DEL SOCONUSCO; Folio clorinación:'.$folio_clorinacion.'; Remitente:'.$remitente.
'; Producto:'.$producto.'; Destino:'.$ciudad_destino.', '.$pais_destino.'.';

//Declaramos una carpeta temporal para guardar la imagenes generadas
     $dir3 = 'temp/';
     
     //Si no existe la carpeta la creamos
     if (!file_exists($dir3))
        mkdir($dir3);
     
        //Declaramos la ruta y nombre del archivo a generar
     $filename3 = $dir3.'test3.png';
 
        //Parametros de Condiguración
     
     $tamaño3 = 10; //Tamaño de Pixel
     $level3 = 'L'; //Precisión Baja
     $framSize3 = 3; //Tamaño en blanco
     
        //Enviamos los parametros a la Función para generar código QR 
     QRcode::png($info3, $filename3, $level3, $tamaño3, $framSize3); 
     
        //Mostramos la imagen generada
$pdf->Image($dir3.basename($filename3),150,17,18,18);
//$pdf->Image('http://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$info.'&.png',150,17,20,20);

$pdf->Output();





 ?>

