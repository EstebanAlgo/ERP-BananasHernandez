<?php 
require('../php/conexion.php');
//include('plantilla.php');
require('fpdf/fpdf.php');
//Agregamos la libreria para genera códigos QR
     require "phpqrcode/qrlib.php";  

$folio=3440100;


$pdf = new FPDF();

for ($i=0; $i < 50 ; $i++) { 
   $pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(230, 276, '', 1, 0, 'C');//CUADRO FONDO-----------------------------------------------------------------


$pdf->Image('../images/logo-pagina/logo.png' , 15 ,19, 27 , 20,'PNG', 'www.platanerosoconusco.com');
$pdf->Image('../images/logo-pagina/icono-certificado.png' , 63 ,61, 5 , 5,'PNG');
$pdf->Image('../images/logo-pagina/icono-certificado.png' , 143 ,61, 5 , 5,'PNG');


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
$pdf->Cell(40,10,utf8_decode(""),0,1);//LUGAR Y FECHA-----------------------------------------


$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(20, 70);
$pdf->Cell(100,10,utf8_decode(""),0,1,'C');//REMITENTE-----------------------------------------
$pdf->SetXY(150, 70);
$pdf->Cell(57,10,utf8_decode(""),0,1,'C');//PRODUCTO-----------------------------------------

//seccion de productos----------------------------------------------------------------------------------------------

$pdf->SetFont('Arial','B',11);
$pdf->SetXY(9, 108);
$pdf->Cell(10,10,'USO: ',0,1,'C');//USO
$pdf->Line(19, 115, 202, 115);
$pdf->SetXY(17, 108);
$pdf->SetFont('Arial','',11);
$pdf->Cell(187,10,utf8_decode(""),0,1,'C');//USO


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

$pdf->SetFont('Arial','',10);
$pdf->SetXY(8, 177);
$pdf->Cell(62,10,utf8_decode(""),0,1,'C');//MEDIO dE de transporte
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(7, 172);
$pdf->Cell(66,6,'MEDIO DE TRANSPORTE',0,1,'C');
$pdf->Line(9, 184, 70, 184);
$pdf->Line(9, 190, 70, 190);
$pdf->Line(9, 196, 70, 196);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(88, 177);
$pdf->Cell(57,10,utf8_decode(""),0,1,'C');//marca del vehículo
$pdf->SetXY(85, 172);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(66,6,utf8_decode('MARCA DEL CAMIÓN'),0,1,'C');
$pdf->Line(88, 184, 145, 184);
$pdf->Line(88, 190, 145, 190);
$pdf->Line(88, 196, 145, 196);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(160, 177);
$pdf->Cell(42,10,utf8_decode(""),0,1,'C');//placas
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
$pdf->Cell(160,10,utf8_decode(""),0,1,'C');//chofer

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 209);
$pdf->Cell(30,10,utf8_decode('N° DE LICENCIA:'),0,1);
$pdf->Line(39, 216, 202, 216);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(35, 209);
$pdf->Cell(165,10,utf8_decode(""),0,1,'C');//número de licencia


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
$pdf->Cell(180,10,utf8_decode(""),0,1,'C');//DESTINO

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 235);
$pdf->Cell(30,10,utf8_decode('DIRECCIÓN:'),0,1);
$pdf->Line(32, 242, 202, 242);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(30, 235);
$pdf->Cell(175,10,utf8_decode(""),0,1,'C');//Dirección de destino

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(9, 243);
$pdf->Cell(30,10,utf8_decode('CIUDAD:'),0,1);
$pdf->Line(26, 250, 70, 250);
$pdf->SetXY(22, 243);
$pdf->SetFont('Arial','',9);
$pdf->Cell(52,10,utf8_decode(""),0,1,'C');//número de licencia

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(75, 243);
$pdf->Cell(20,10,utf8_decode('PAÍS:'),0,1);
$pdf->Line(85, 250, 130, 250);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(85, 243);
$pdf->Cell(41,10,utf8_decode(""),0,1,'C');//número de licencia


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(10, 259);
$pdf->Cell(90,10,utf8_decode('NOMBRE DEL RESPONSABLE DEL DOCUMENTO'),0,1,'C');
$pdf->Line(13, 261, 98, 261);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(13, 254);
$pdf->Cell(85,10,utf8_decode(""),0,1,'C');//número de licencia

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


$info='ASOCIACIÓN AGRÍCOLA DE PRODUCTORES DE PLÁTANO DEL SOCONUSCO Folio:'.$folio;

 //Declaramos una carpeta temporal para guardar la imagenes generadas
     
     $dir = 'temp/';
     
     //Si no existe la carpeta la creamos
     if (!file_exists($dir))
        mkdir($dir);
     $num=$i+1;
        //Declaramos la ruta y nombre del archivo a generar
     $filename = $dir.'certificado'.$folio++.'.png';
 
        //Parametros de Configuración
     
     $tamaño = 10; //Tamaño de Pixel
     $level = 'L'; //Precisión Baja
     $framSize = 2; //Tamaño en blanco
     
        //Enviamos los parametros a la Función para generar código QR 
     QRcode::png($info, $filename, $level, $tamaño, $framSize); 
     
$pdf->Image($dir.basename($filename),175,17,20,20);

//$pdf->Image('http://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$info.'&.png',175,17,20,20);

//$pdf->Image('http://chart.apis.google.com/chart?cht=qr&chs=500x500&chl='.$info.'',95,170,25,25,'PNG');
}



$pdf->Output();





 ?>

