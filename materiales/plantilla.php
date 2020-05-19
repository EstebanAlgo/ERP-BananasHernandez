<?php 
require('fpdf2/fpdf.php');
/**
 * 
 */
class PDF extends FPDF
{
	
	function Header()
	{
		$this->Image('../assets/images/reportes/header.png' , 70 ,15,100, 22,'PNG', 'www.bananashernandez.com');
        $this->Image('../assets/images/logo.png' , 15,6,40,40,'PNG', 'www.bananashernandez.com');
		$this->SetFont('Arial','B',17);
		$this->SetFillColor( 252, 95, 45 );
        $this->SetDrawColor(  252, 111, 45  );
        $this->SetTextColor(  252, 95, 45);
		

        $this->SetLineWidth(0.8);
        $this->Line(15, 48, 197, 48);
        $this->SetXY(5, 4);
        $this->Cell(200,271,"",1,0,'C');

        $this->SetLineWidth(0.2);
        $this->SetXY(10, 51);
        $this->Cell(100,30,"",1,0,'C');
        $this->SetXY(113, 51);
        $this->Cell(88,30,"",1,0,'C');

        $this->SetXY(10, 54);
        $this->Cell(100,5,"DATOS DEL SOLICITANTE",0,0,'C');

        $this->SetXY(122, 58);
        $this->SetFont('Arial','B',12);
        $this->SetXY(12, 62);
        $this->Cell(63, 6, utf8_decode("NOMBRE:"), 0 , 0,'');
        $this->SetXY(12, 67);
        $this->Cell(63, 6, utf8_decode("PUESTO:"), 0 , 0,'');
        $this->SetXY(12, 72);
        $this->Cell(63, 6, utf8_decode("FINCA:"), 0 , 0,'');


        $this->SetFont('Arial','B',13);
        $this->SetXY(115, 52);
        $this->Cell(63, 6, utf8_decode("RFC: BHE180126FR1"), 0 , 0,'');
        $this->SetXY(115, 58);
        $this->Cell(63, 6, utf8_decode("SAN JOSÉ EL AMATE CALLE S/N"), 0 , 0,'');
        $this->SetXY(115, 62);
        $this->Cell(63, 6, utf8_decode("HUEHUETÁN, CHIAPAS CP:30673"), 0 , 0,'');



        
       
		
        $this->SetDrawColor(0,0,0);
        $this->SetTextColor(  254, 254, 254  );
        $this->SetXY(10, 84);
        $this->SetFont('Arial','B',9);
        $this->Cell(35,7,utf8_decode('PRODUCTO'),1,0,'C',1);
        $this->Cell(18,7,utf8_decode('CANTIDAD'),1,0,'C',1);
        $this->Cell(20,7,utf8_decode('UNIDAD'),1,0,'C',1);
        $this->Cell(25,7,utf8_decode('CÓDIGO'),1,0,'C',1);
        $this->Cell(93,7,utf8_decode('DESCRIPCIÓN'),1,0,'C',1);

       
        $this->Ln(10);
	}

	function Footer()
	{
		$this->setY(-23);
		$this->SetFont('Arial','I',8);
		$this->Cell(0, 10,utf8_decode( 'Página '.$this->PageNo().'/{nb}'),0,0,'C');
	}
}

?>