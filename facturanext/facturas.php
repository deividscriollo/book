<?php 
	require('fpdf/rotation.php');
	require('fpdf/barcode.inc.php');
	include_once('../admin2/class.php');
	include_once('funciones.php');

	if(!isset($_SESSION)){
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
            //$this->RotatedText('fgdfgsdfdgsdfsdfgsdfgsdf', 30, 100, 30, 45); 
            $this->SetX(0);                                                    

            $this->Cell(190, 8, utf8_decode("FACTURAS ELECTRÓNICAS"), 0,1, 'C',0); 
            $this->SetFont('Amble-Regular','',10);      
            $this->Cell(70, 5, utf8_decode("EMPRESA:    ". $_SESSION['modelo']['empresa_nombre']),0,1, 'C',0);                                                                                      
            $this->SetDrawColor(0,0,0);

            $this->Ln(5);
            $this->SetX(1);
            $this->Cell(30, 5, utf8_decode("DOCUMENTO"),1,0, 'C',0);
            $this->Cell(90, 5, utf8_decode("RAZÓN SOCIAL"),1,0, 'C',0);       
            $this->Cell(35, 5, utf8_decode("FECHA EMISIÓN"),1,0, 'C',0);    
            $this->Cell(53, 5, utf8_decode("CORREO"),1,1, 'C',0);   
        }
        
        function Footer() {            
            $this->SetY(-15);            
            $this->SetFont('Arial','I',8);            
            $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
        } 

        function RotatedText($x, $y, $txt, $angle){
		    //Text rotated around its origin
		    $this->Rotate($angle,$x,$y);
		    $this->Text($x,$y,$txt);
		    $this->Rotate(0);
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

    $resultado = $class->consulta("SELECT FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision from facturanext.correo as FC, facturanext.facturas as FF where FC.id = FF.id_correo and FC.id_usuario = '".$_SESSION['modelo']['empresa_id']."'  and FC.stado = '1' UNION ALL SELECT  FC.id,FC.tipo_consumo,FC.razon_social,FC.tipo,FC.fecha_correo,FC.remitente,FC.id_usuario,FF.fecha_emision  from facturanext.correo as FC, facturanext.facturas_fisica as FF where FC.id = FF.id_correo and FC.id_usuario = '".$_SESSION['modelo']['empresa_id']."' and FC.stado = '5'");
    $pdf->SetFont('Amble-Regular','',9);
    
    while ($row=$class->fetch_array($resultado)) {
    	$pdf->SetX(1);
    	if($row[1] == '01'){
    		$docu = 'FACTURA';
    		$pdf->Cell(30, 5, utf8_decode($docu),0,0, 'L',0);
    	}
    	$pdf->Cell(90, 5, maxCaracter(utf8_decode($row[2]),48),0,0, 'L',0);
    	$pdf->Cell(35, 5, utf8_decode($row[4]),0,0, 'C',0);
    	$pdf->Cell(53, 5, utf8_decode($row[5]),0,0, 'C',0);
    	$pdf->Ln(5); 
    	
    }
                                                     
    $pdf->Output();
?>

