<?php 
require('../php/conexion.php');
require('fpdf/fpdf.php');
//Agregamos la libreria para genera códigos QR
     require "phpqrcode/qrlib.php"; 
$no_responsiva=5;

                     
$folio_responsiva=357275; 
                         

$pdf = new FPDF();

for ($i=0; $i < $no_responsiva ; $i++) {

$pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(252, 243, 207);
//$pdf->Cell(230, 276, '', 1, 0, 'C');//CUADRO FONDO----
$año= substr("", 0,4);
$mes= substr("", 5,2);
$dia= substr("", 8,2);

$pdf->Image('../images/logo-pagina/logo.png' , 18 ,13, 27 , 20,'PNG', 'www.platanerosoconusco.com');

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
$pdf->Cell(30, 6,utf8_decode('N°. '.$folio_responsiva), 0 , 1,'C');
$pdf->SetTextColor(0,0,0);


$pdf->SetFont('Arial','B',7);
$pdf->SetXY(168, 34);
$pdf->Cell(35, 4,utf8_decode('DÍA           MES          AÑO'), 0 , 1,'C');
$pdf->SetLineWidth(0.4);
$pdf->Line(170, 34, 202, 34);

 
$pdf->SetXY(9,38);
$pdf->SetFont('Arial','B',5);
$pdf->SetFillColor(249, 231, 159);
$pdf->Cell(20, 3, utf8_decode('RECIBÍ DE:'), 1, 0, 'C');

$pdf->SetLineWidth(0.8);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(9, 38);
$pdf->Cell(193,11,utf8_decode(""),1,1,'C');

$pdf->SetLineWidth(0.3);
$pdf->SetXY(9,51);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(50, 3, utf8_decode('EN LA EMPACADORA DENOMINADA:'), 1, 0, 'C');
$pdf->SetLineWidth(0.8);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(9, 51);
$pdf->Cell(193,11,utf8_decode(""),1,1,'C');


$pdf->SetXY(9, 64);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9,64);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(50, 3, utf8_decode('LOCALIZADA EN EL MUNICIPIO DE:'), 1, 0, 'C');
$pdf->SetXY(110,64);
$pdf->Cell(25, 3, utf8_decode('DEL ESTADO DE:'), 1, 0, 'C');



$pdf->SetLineWidth(0.8);
$pdf->SetXY(9, 77);
$pdf->Cell(193,33,'',1,1);

$pdf->SetLineWidth(0.3);
$pdf->SetXY(9, 77);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9,77);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(30, 3, utf8_decode('LA CANTIDAD DE:'), 1, 0, 'C');
$pdf->SetXY(100,77);
$pdf->Cell(10, 3, utf8_decode('CON'), 1, 0, 'C');
$pdf->SetXY(150,77);
$pdf->Cell(20, 3, utf8_decode('KG. C/U'), 1, 0, 'C');



$pdf->SetXY(9,88);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(50, 3, utf8_decode('CONTENIENDO EXCLUSIVAMENTE:'), 1, 0, 'C');
$pdf->SetXY(140,88);
$pdf->Cell(30, 3, utf8_decode('DE ORIGEN NACIONAL'), 1, 0, 'C');
$pdf->SetXY(9, 88);
$pdf->Cell(193,11,'',1,1);


$pdf->SetXY(9,99);
$pdf->SetFont('Arial','B',5);
$pdf->Cell(50, 3, utf8_decode('SEGÚN EL CERTIFICADO DE ORIGEN NÚMERO:'), 1, 0, 'C');
$pdf->SetXY(120,99);
$pdf->Cell(30, 3, utf8_decode('DE FECHA'), 1, 0, 'C');



$pdf->SetXY(9,112);
$pdf->SetFont('Arial','B',5);
$pdf->SetLineWidth(0.3);
$pdf->Cell(70, 3, utf8_decode('EL PRODUCTO ES TRANSPORTADO EN UN VEHÍCULO MARCA:'), 1, 0, 'C');
$pdf->SetXY(9,123);
$pdf->Cell(30, 3, utf8_decode('MODELO:'), 1, 0, 'C');
$pdf->SetXY(90,123);
$pdf->Cell(30, 3, utf8_decode('PLACAS:'), 1, 0, 'C');
$pdf->SetXY(150,123);
$pdf->Cell(30, 3, utf8_decode('DEL ESTADO DE:'), 1, 0, 'C');
$pdf->SetXY(9,134);
$pdf->Cell(30, 3, utf8_decode('CONDUCIDO POR:'), 1, 0, 'C');
$pdf->SetXY(9,145);
$pdf->Cell(50, 3, utf8_decode('CON LICENCIA DE OPERADOR N°.:'), 1, 0, 'C');
$pdf->SetXY(150,145);
$pdf->Cell(30, 3, utf8_decode('DEL ESTADO DE:'), 1, 0, 'C');
$pdf->SetXY(9,156);
$pdf->Cell(30, 3, utf8_decode('QUE ESTÁ AL SERVICIO DE:'), 1, 0, 'C');


$pdf->SetXY(9, 112);
$pdf->SetLineWidth(0.8);
$pdf->Cell(193,55,'',1,1);
$pdf->SetLineWidth(0.3);
$pdf->SetFont('Arial','',11);
$pdf->SetXY(9, 112  );
$pdf->Cell(193,11,utf8_decode(""),1,1,'C');
$pdf->SetXY(9, 123);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9, 125);
$pdf->Cell(60,10,utf8_decode(""),0,1,'C');
$pdf->SetXY(75, 125);
$pdf->Cell(60,10,utf8_decode(""),0,1,'C');
$pdf->SetXY(141, 125);
$pdf->Cell(60,10,utf8_decode(""),0,1,'C');

$pdf->SetXY(9, 134);
$pdf->Cell(193,11,utf8_decode(""),1,1,'C');

$pdf->SetXY(9, 145);
$pdf->Cell(193,11,'',1,1);
$pdf->SetXY(9, 147);
$pdf->Cell(100,10,utf8_decode(""),0,1,'C');
$pdf->SetXY(150, 147);
$pdf->Cell(50,10,utf8_decode(""),0,1,'C');

$pdf->SetXY(9, 156);
$pdf->Cell(193,11,utf8_decode(""),1,1,'C');

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
$pdf->Cell(30, 3, utf8_decode('DE:(ORIGEN)'), 1, 0, 'C');
$pdf->SetXY(150,187);
$pdf->Cell(30, 3, utf8_decode('A: (DESTINO)'), 1, 0, 'C');
$pdf->SetLineWidth(0.8);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(9, 187);
$pdf->Cell(193,12,'',1,1);
$pdf->SetLineWidth(0.3);


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


$pdf->Line(9, 250, 202, 250);

$pdf->Line(9, 262, 202, 262);

$pdf->Line(155, 262, 155, 273);


$info='ASOCIACIÓN AGRÍCOLA DE PRODUCTORES DE PLÁTANO DEL SOCONUSCO,  Folio de carta responsiva:'.$folio_responsiva;

   
     
     //Declaramos una carpeta temporal para guardar la imagenes generadas
     
     $dir = 'temp/';
     
     //Si no existe la carpeta la creamos
     if (!file_exists($dir))
        mkdir($dir);
     $num=$i+1;
        //Declaramos la ruta y nombre del archivo a generar
     $filename = $dir.'responsiva'.$folio_responsiva++.'.png';
 
        //Parametros de Configuración
     
     $tamaño = 10; //Tamaño de Pixel
     $level = 'L'; //Precisión Baja
     $framSize = 2; //Tamaño en blanco
     
        //Enviamos los parametros a la Función para generar código QR 
     QRcode::png($info, $filename, $level, $tamaño, $framSize); 
     
        //Mostramos la imagen generada
$pdf->Image($dir.basename($filename),175,6,23,23);


}


$pdf->Output();



 ?>

