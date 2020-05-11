<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
   header("location: index.php");
    exit;
}
include("dbcon.php");

require('tpdf/tfpdf.php');

class myPDF extends tFPDF{
    function header(){
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetTitle('PDF');
        $this->Ln(20);
        $this->SetTextColor( 180, 20, 20 );
        $this->Image('css/adagio.jpg',10,5,60,60);
        $this->SetFont('DejaVu', '', 30);
        $this->Cell(200,20,"Student's Info", 0,0,'C');
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);   
        $this->Ln(20);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page' .$this->PageNo().'/{nb}',0,0,'C');
    }


    function viewTable($db){
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $id=$_SESSION['pdfid'];
        include("dbcon.php");
        $this->SetFont('DejaVu','',12);
        $query="SELECT * FROM Students WHERE ID='$id'";
        $result=mysqli_query($mysqli, $query);
        while($row = mysqli_fetch_array($result))
        {
        $this->SetFont('DejaVu', '', 14);
        $this->setFillColor(255,170,170,0.8); 
        $this->Cell(100,10,'ID',0,0,'C',1);
        $this->Cell(0,10,$row['ID'],0,1,'C',1);
        $this->Ln(10);

        $this->SetFont('DejaVu', '', 14);
        $this->Cell(100,10,'Name',0,0,'C');
        $this->Cell(0,10,$row['NAME'],0,0,'C');
        $this->Ln(15);

        $this->SetFont('DejaVu', '', 14);
        $this->Cell(100,10,'Surname',0,0,'C');
        $this->Cell(0,10,$row['SURNAME'],0,0,'C');
        $this->Ln(15);

        $this->SetFont('DejaVu', '', 14);
        $this->Cell(100,10,'Father Name',0,0,'C');
        $this->Cell(0,10,$row['FATHERNAME'],0,0,'C');
        $this->Ln(15);

        $this->SetFont('DejaVu', '', 14);
        $this->Cell(100,10,'Grage',0,0,'C');
        $this->Cell(0,10,$row['GRADE'],0,0,'C');
        $this->Ln(15);

        $this->SetFont('DejaVu', '', 14);
        $this->Cell(100,10,'Phone Number',0,0,'C');
        $this->Cell(0,10,$row['MOBILENUMBER'],0,0,'C');
        $this->Ln(15);

        $this->SetFont('DejaVu', '', 14);
        $this->Cell(100,10,'Birthday',0,0,'C');
        $this->Cell(0,10,$row['Birthday'],0,0,'C');
        $this->Ln(15);
        }
 
    }

}


$pdf= new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A4',0);
$pdf->viewTable($db);
$pdf->output();



?>
