<?php
$file_name="xxx.txt";
if(isset($_POST['btn'])){
    require("fpdf/fpdf.php");

        class PDF extends FPDF
        {
            // Load data
            function LoadData($file)
            {
                // Read file lines
                $lines = file($file);
                $data = array();
                foreach($lines as $line)
                    $data[] = explode(';',trim($line));
                return $data;
            }
            
            function Header()
            {
                // Logo
                $this->Image('1.jpg',10,12,30,0,'','');
                $this->Ln(15);
                $this->Cell(20,10,"sampath"." "."sandaruwan");
                $this->Ln(6);
                $date=date("Y-m-d");
                $this->Cell(20,10,$date);
                // Line break
                $this->Ln(20);
            }
            
            // Colored table
            function FancyTable($header, $data)
            {   
               
               /* $this->Ln(15);
                $this->Cell(20,10,$_SESSION['first_name']." ".$_SESSION['last_name']);
                $this->Ln(6);
                $date=date("Y-m-d");
                $this->Cell(20,10,$date);
                $this->Ln();*/
                
                // Colors, line width and bold font
                $this->SetFillColor(20, 222, 33);
                $this->SetTextColor(255);
                $this->SetDrawColor(128,0,0);
                $this->SetLineWidth(.3);
                $this->SetFont('','B');
                
                
                // Header
                $w = array(20, 20, 20, 20, 20, 20,20, 20);
                for($i=0;$i<count($header);$i++)
                    $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
                $this->Ln();
                // Color and font restoration
                $this->SetFillColor(224,235,255);
                $this->SetTextColor(0);
                $this->SetFont('');
                // Data
                $fill = false;
                foreach($data as $row)
                {
                    $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
                    $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
                    $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
                    $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
                    $this->Cell($w[4],6,$row[4],'LR',0,'R',$fill);
                    $this->Cell($w[5],6,$row[5],'LR',0,'R',$fill);
                    $this->Cell($w[6],6,$row[6],'LR',0,'R',$fill);
                    $this->Cell($w[7],6,$row[7],'LR',0,'R',$fill);
                    $this->Ln();
                    $fill = !$fill;
                }
                // Closing line
                $this->Cell(array_sum($w),0,'','T');
            }
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Page number
                $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
            }
        }

        $pdf = new PDF();
        // Column headings
        $header = array('Number', 'Type', 'Date', 'Amount','Number', 'Type', 'Date', 'Amount ');
        
        //$pdf->Cell(20,10,'sampath sandaruwan!');
        // Data loading
        $data = $pdf->LoadData("$file_name");
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();
        $pdf->FancyTable($header,$data);
        $pdf->Output('statment.pdf','I');
}
?>
<form method="post">
    <input type="submit" name="btn">
    <?php
        $fp=fopen("$file_name","w");
         
        for($i=0;$i<10;$i++){
            fwrite($fp,"sampath".';'."sandaruwan".';'."lahiru".';'."ICT".';'."ICT".';'."ICT".';'."ICT".';'."ICT");
            fwrite($fp,"\n");
        }
//        fwrite($fp,$recode['account_number'].';'.$recode['type'].';'.$recode['date'].';'.$recode['amount']);
//        fwrite($fp,"\n");
    ?>
</form>