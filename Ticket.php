<?php 
   require('rounded_rect.php');
   setlocale(LC_TIME, "Spanish_Mexican");

   //Logo y Encabezados
   $pdf = new PDF();
   $pdf->AddPage();
   $pdf->SetFont('Courier','B',20);
   $pdf->Cell(285,8,'',0,1,'C');

   $pdf->SetFont('Courier','B',16);
   $pdf->Cell(285,4,'Bueno por:',0,1,'C');
   $pdf->Image('../Ticket.png',10,5,180,300);
 if(file_exists('../carritodecompras.txt')){
      $content = trim(file_get_contents('../carritodecompras.txt'), PHP_EOL);
      $lineas = explode(PHP_EOL, $content);
      $total = 0;
      $pdf->Cell(30,120,' ', 0,1, 'R');

      foreach($lineas as $linea){
         list($productoE, $precioE) = explode(',', $linea);
         $pdf->Cell(120,10,"    1     " . $productoE, 0,1, 'L');
         $pdf->Cell(160,-10,"$ " . $precioE, 0,1, 'R');
         $pdf->Cell(30,10,' ', 0,1, 'R');
         $total = $total + $precioE;
      }
   }
   $pdf->Output();
?>