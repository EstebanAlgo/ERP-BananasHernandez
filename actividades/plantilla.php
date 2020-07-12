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
                
                $this->SetXY(10, 46);
                $this->SetFillColor(232, 232, 232);
                $this->SetFont('Arial', 'B', 9);
                $this->Cell(30, 6, utf8_decode('Finca'), 1, 0, 'C', 1);
                $this->Cell(45, 6, utf8_decode('Empleado'), 1, 0, 'C', 1);
                $this->Cell(22, 6, utf8_decode('Elaboración'), 1, 0, 'C', 1);
                $this->Cell(22, 6, utf8_decode('Registro'), 1, 0, 'C', 1);
                $this->Cell(17, 6, utf8_decode('U/Cobro'), 1, 0, 'C', 1);
                $this->Cell(17, 6, utf8_decode('Precio'), 1, 0, 'C', 1);
                $this->Cell(19, 6, utf8_decode('Cantidad'), 1, 0, 'C', 1);
                $this->Cell(19, 6, utf8_decode('Costo'), 1, 0, 'C', 1);
                


                $this->Ln(10);
        }

        function Footer()
        {
                $this->setY(-23);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, utf8_decode('Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
        }
}
