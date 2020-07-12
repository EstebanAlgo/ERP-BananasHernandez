<?php
require('fpdf2/fpdf.php');
/**
 * 
 */
class PDF extends FPDF
{

    function Header()
    {
        $this->Image('../assets/images/encabezado2.png', 0, 0, 211, 35, 'PNG', 'www.bananashernandez.com');
        $this->SetXY(10, 52);
        $this->SetFillColor(232, 232, 232);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(20, 7, utf8_decode('Solicitud'), 1, 0, 'C', 1);
        $this->Cell(30, 7, utf8_decode('Producto'), 1, 0, 'C', 1);
        $this->Cell(16, 7, utf8_decode('Cantidad'), 1, 0, 'C', 1);
        $this->Cell(16, 7, utf8_decode('Unidad'), 1, 0, 'C', 1);
        $this->Cell(18, 7, utf8_decode('Código'), 1, 0, 'C', 1);
        $this->Cell(90, 7, utf8_decode('Descripción'), 1, 0, 'C', 1);

        $this->Ln(10);
    }

    function Footer()
    {
        $this->setY(-23);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }
}
