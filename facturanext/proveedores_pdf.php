<?php 
	require('fpdf/rotation.php');
	require('fpdf/barcode.inc.php');
	include_once('../admin2/class.php');
	include_once('funciones.php');

	if(!isset($_SESSION)) {
        session_start();        
    }

	$class=new constante();	
	date_default_timezone_set('America/Guayaquil');
    setlocale (LC_TIME,"spanish");

	class PDF extends PDF_Rotate {   
        var $widths;
        var $aligns;       
        function SetWidths($w) {            
            $this->widths=$w;
        }  

        function Header() {             
            $this->AddFont('Amble-Regular','','Amble-Regular.php');
            $this->SetFont('Amble-Regular','',10);        
            $fecha = date('Y-m-d', time());           
            //$this->SetX(1);
            $this->SetY(1);
            $this->Cell(20, 5, 'Generado: '.$fecha, 0,0, 'C', 0);                                                             
            $this->Cell(178, 5, 'Factura Next.com', 0,0, 'R', 0);                                                             
            $this->Ln(7);
            $this->SetX(13);
            $this->RotatedImage('fpdf/logo.fw.png', 30, 232, 200, 30, 45);                    
            $this->SetX(0);     


            $this->Cell(190, 8, utf8_decode("LISTADO PROVEEDORES"), 0,1, 'C',0); 
            $this->SetFont('Amble-Regular','',10);      
            $this->Cell(70, 5, utf8_decode("EMPRESA:    ". $_SESSION['id_empresa_miempresa']),0,1, 'C',0);                                                                                      
            $this->SetDrawColor(0,0,0);

            $this->Ln(5);
            $this->SetX(1);
            $this->Cell(30, 5, utf8_decode("IDENTIFICACIÓN"),1,0, 'C',0);
            $this->Cell(80, 5, utf8_decode("RAZÓN SOCIAL"),1,0, 'C',0);       
            $this->Cell(98, 5, utf8_decode("DIRECCIÓN MATRIZ"),1,1, 'C',0);    

        }
        
        function Footer() {            
            $this->SetY(-15);            
            $this->SetFont('Arial','I',8);            
            $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
        } 

        function RotatedImage($file, $x, $y, $w, $h, $angle) {            
            $this->Rotate($angle, $x, $y);
            $this->Image($file, $x, $y, $w, $h);
            $this->Rotate(0);
        }               
    }

    $pdf = new PDF('P','mm','a4');
    $pdf->AddPage();
    $pdf->SetMargins(0,0,0,0);
    $pdf->AliasNbPages();
    $pdf->AddFont('Amble-Regular','','Amble-Regular.php');

    $resultado = $class->consulta("SELECT * FROM facturanext.proveedores");
    $pdf->SetFont('Amble-Regular','',9);
    
    while ($row=$class->fetch_array($resultado)) {
    	$pdf->SetX(1);
        $pdf->Cell(30, 5, utf8_decode($row[1]),0,0, 'C',0);
    	$pdf->Cell(80, 5, maxCaracter(utf8_decode($row[2]),48),0,0, 'L',0);
    	$pdf->Cell(98, 5, maxCaracter(utf8_decode($row[3]),55),0,0, 'L',0);
    	$pdf->Ln(5); 
    	
    }
                                                     
    $pdf->Output();
?>

