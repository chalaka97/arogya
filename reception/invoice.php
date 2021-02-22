<?php
session_start();
require('fpdf/fpdf.php');

include('../connection/connection.php');
//include('../reception/Dashboard.php');




$query=mysqli_query($con,"select * from invoice where invoice_id ='". 2 . "'");
$invoice = mysqli_fetch_array($query);



//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'AROGYA HOSPITAL',0,0);
$pdf->Cell(59	,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Buttala',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Monaragala ',0,0);
$pdf->Cell(25	,5,'Date',0,0);
//$pdf->Cell(34	,5,'$invoice['']',0,1);//end of line

$pdf->Cell(130	,5,'Phone [0719488988]',0,0);
$pdf->Cell(25	,5,'Invoice #',0,0);
$pdf->Cell(34	,5,$invoice['invoice_id'],0,1);//end of line

//$pdf->Cell(130	,5,'Fax [+12345678]',0,0);
$pdf->Cell(25	,5,'[Patient ID]',0,0);
$pdf->Cell(34	,5,$invoice['patient_id'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,['name'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,['address'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,['mobile'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Taxable',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130	,5,$invoice['description'],1,0);
$pdf->Cell(25	,5,'-',1,0);
$pdf->Cell(34	,5,$invoice['amount'],1,1,'R');//end of line

$pdf->Cell(130	,5,$invoice['description'],1,0);
$pdf->Cell(25	,5,'-',1,0);
$pdf->Cell(34	,5,$invoice['amount'],1,1,'R');//end of line


//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'4,450',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Taxable',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'0',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'10%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'4,450',1,1,'R');//end of line


$pdf->Output();
?>