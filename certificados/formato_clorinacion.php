<?php 
require('../php/conexion.php');
require('fpdf/fpdf.php');

//Agregamos la libreria para genera códigos QR
     require "phpqrcode/qrlib.php"; 
$no_clorinacion=$_POST['no_clorinacion'];

                         $statement=$conexion->prepare("SELECT MAX(id_clorinacion) FROM constancia_clorinacion");
                         $statement->execute();
                         $constancia=$statement->fetchAll();
                         foreach ($constancia as $fila) 
                         {    
                              $folio_clorinacion=$fila[0]+1;
                         }

$inicio=$folio_clorinacion;
$pdf = new FPDF();

for ($i=0; $i < $no_clorinacion ; $i++) { 

$pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(204,255,255);
//$pdf->Cell(230, 165, '', 1, 0, 'C');//CUADRO FONDO----


$pdf->Image('../images/logo-pagina/logo.png' , 15 ,19, 27 , 20,'PNG', 'www.platanerosoconusco.com');
$pdf->Image('../images/logo-pagina/icono-certificado.png' , 61 ,38, 5 , 5,'PNG');
$pdf->Image('../images/logo-pagina/icono-certificado.png' , 145 ,38, 5 , 5,'PNG');


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
$pdf->Cell(30, 6,utf8_decode('N°.'.$folio_clorinacion), 0 , 1,'C');
$pdf->SetTextColor(0,0,0);


$pdf->SetFont('Arial','B',7);
$pdf->SetXY(168, 41);
$pdf->Cell(35, 4,utf8_decode('DÍA           MES          AÑO'), 0 , 1,'C');
$pdf->SetLineWidth(0.4);
$pdf->Line(170, 41, 202, 41);

 
$pdf->SetFont('Arial','',9);
$pdf->SetXY(170, 34);
$pdf->Cell(32,10,utf8_decode(""),0,1,'C');//LUGAR Y FECHA-----------------------------------------

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

$pdf->SetFont('Arial','',7);
$pdf->SetXY(9, 58);
$pdf->Cell(66,11,utf8_decode(""),0,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(75, 58);
$pdf->Cell(57,11,utf8_decode(""),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 95);
$pdf->Cell(20,6,utf8_decode('Procedimiento empleado:'),0,1);
$pdf->Line(55, 100, 199, 100);

$pdf->SetFont('Arial','',12);
$pdf->SetXY(50, 95);
$pdf->Cell(150,6,utf8_decode(''),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 104);
$pdf->Cell(20,6,utf8_decode('Procedencia:'),0,1);
$pdf->Line(35, 109, 199, 109);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(30, 101);
$pdf->Cell(170,6,utf8_decode(""),0,1,'C');
$pdf->SetXY(30, 104);
$pdf->Cell(170,6,utf8_decode(""),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 113);
$pdf->Cell(20,6,utf8_decode('Destino:'),0,1);
$pdf->Line(28, 118, 199, 118);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 113);
$pdf->Cell(170,6,utf8_decode(""),0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 122);
$pdf->Cell(20,6,utf8_decode('Remitente:'),0,1);
$pdf->Line(32, 127, 199, 127);
$pdf->SetXY(30, 122);
$pdf->Cell(170,6,utf8_decode(""),0,1,'C');


$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 131);
$pdf->Cell(20,6,utf8_decode('Destinatario:'),0,1);
$pdf->Line(35, 136, 199, 136);
$pdf->SetXY(30, 131);
$pdf->Cell(170,6,utf8_decode(""),0,1,'C');


$pdf->SetFont('Arial','B',10);
$pdf->SetXY(12, 139);
$pdf->Cell(40,6,utf8_decode('Vehículo de transporte'),0,1);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(55, 139);
$pdf->Cell(20,6,utf8_decode('Marca:'),0,1);
$pdf->Line(68, 144, 100, 144);

$pdf->SetFont('Arial','',10);
$pdf->SetXY(63, 139);
$pdf->Cell(42,6,utf8_decode(""),0,1,'C');
$pdf->SetXY(110, 139);
$pdf->Cell(20,6,utf8_decode('Modelo:'),0,1);
$pdf->Line(125, 144, 155, 144);
$pdf->SetXY(120, 139);
$pdf->Cell(38,6,utf8_decode(""),0,1,'C');
$pdf->SetXY(160, 139);
$pdf->Cell(20,6,utf8_decode('Placas:'),0,1);
$pdf->Line(175, 144, 199, 144);
$pdf->SetXY(172, 139);
$pdf->Cell(32,6,utf8_decode(""),0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(12, 148);
$pdf->Cell(20,6,utf8_decode('Observaciones:'),0,1);
$pdf->Line(40, 153, 199, 153);
$pdf->Line(12, 161, 199, 161);
$pdf->SetFont('Arial','',12);
$pdf->SetXY(30, 148);
$pdf->Cell(170,6,utf8_decode(''),0,1,'C');
$pdf->SetXY(30, 156);
$pdf->Cell(170,6,utf8_decode(''),0,1,'C');




$info='ASOCIACIÓN AGRÍCOLA DE PRODUCTORES DE PLÁTANO DEL SOCONUSCO,  Folio de constancia de clorinación:'.$folio_clorinacion++;

     
     //Declaramos una carpeta temporal para guardar la imagenes generadas
     
     $dir = 'temp/';
     
     //Si no existe la carpeta la creamos
     if (!file_exists($dir))
        mkdir($dir);
     
        //Declaramos la ruta y nombre del archivo a generar
     $filename = $dir.'test'.$i.'.png';
 
        //Parametros de Configuración
     
     $tamaño = 10; //Tamaño de Pixel
     $level = 'L'; //Precisión Baja
     $framSize = 2; //Tamaño en blanco
     
        //Enviamos los parametros a la Función para generar código QR 
     QRcode::png($info, $filename, $level, $tamaño, $framSize); 
     
        //Mostramos la imagen generada
$pdf->Image($dir.basename($filename),170,180,30,30);
}

$folio_clorinacion=$folio_clorinacion-1;
$registrar_constancia_clorinacion=$conexion->prepare("INSERT INTO constancia_clorinacion(id_clorinacion,grado,folio_certificado)VALUES('$folio_clorinacion','----','0')");
$registrar_constancia_clorinacion->execute();

//Registrar certificados en blanco
$blancos=$conexion2->prepare("INSERT INTO certificadosblancos(id,tipo,inicio,fin,fecha_registro,responsable)VALUES(null,'C','$inicio','$folio_clorinacion',null,'$id_usuario')");
$blancos->execute();

$pdf->Output();



 ?>

