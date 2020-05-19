<?php 
require('fpdf2/fpdf.php');
/**
 * 
 */
class PDF extends FPDF
{
	
	function Header()
	{
		$this->Image('../assets/images/logo.png' , 15 ,19, 22 , 21,'PNG', 'www.bananashernandez.com');
		$this->SetFont('Arial','B',17);
		$this->SetFillColor(0, 102, 217);
		$this-> SetTextColor(248, 251, 255 );
		$this->Cell(191,8, utf8_decode('BANANAS HERNÁNDEZ'),1,0,'C',1);
         $this->SetXY(87, 17);
        $this->SetFont('Arial','',9);
        $this-> SetTextColor(0, 0, 0 );
        $this->Cell(10, 8, utf8_decode('R.F.C.'), 0 , 1);//RFC
        $this->SetXY(97, 17);
        $this->SetFont('Arial','B',9);
        $this->Cell(10, 8, utf8_decode('AAP- 660629-VDA'), 0 , 1);

        $this->SetXY(7, 20);
        $this->SetFont('Arial','',9);
        $this->Cell(197, 8, utf8_decode('CARRETERA TEOLOYUCAN HUEHUETOCA SN BARRIO '), 0 , 1,'C');//DIRECCION

        $this->SetXY(73, 23);
        $this->SetFont('Arial','B',9);
        $this->Cell(50, 8, utf8_decode('Tel. (962) 626-40-13'), 0 , 1);//TELEFONO

        $this->SetXY(105, 23);
        $this->SetFont('Arial','',9);
        $this->Cell(50, 8, utf8_decode('SAGARPA:'), 0 , 1);
         $this->SetXY(122, 23);
        $this->SetFont('Arial','B',9);
        $this->Cell(50, 8, utf8_decode('AAL- 4134'), 0 , 1);//TELEFONO
        $this->SetXY(10, 41);
        $this->SetFillColor(232,232,232);
        $this->SetFont('Arial','B',9);
        
        $this->Cell(92,6,utf8_decode('ACTIVIDAD'),1,0,'C',1);
        $this->Cell(20,6,utf8_decode('U/COBRO'),1,0,'C',1);
        $this->Cell(22,6,utf8_decode('CANTIDAD'),1,0,'C',1);
        $this->Cell(22,6,utf8_decode('PRECIO'),1,0,'C',1);
        $this->Cell(15,6,utf8_decode('COSTO'),1,0,'C',1);
        $this->Cell(20,6,utf8_decode('FECHA'),1,0,'C',1);

       
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