<?php
session_start();
require('./../pdfclass/fpdf.php');

$user_fullname = $_SESSION['nome'] . ' ' . $_SESSION['cognome'];

    
$pdf = new FPDF();
$pdf->SetTitle('PDF');
$pdf->SetAuthor('Creator');
$pdf->AddPage();
$pdf->SetFont('Arial','B',22);

$pdf->Cell(0, 20, 'Movimentazione manuale dei carichi', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,'Redatto da:',0,0);
$pdf->Cell(40, 10, $user_fullname, 0, 0);

$pdf->Ln();
$pdf->Cell(40,10,'Ragione sociale:',0,0);
$pdf->Cell(40,10,$_POST['rs'],0,0);

$pdf->Ln();
$pdf->Cell(40,10,'Data:',0,0);
$pdf->Cell(40,10,$row['data_'],0,0);

    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Dettagli valutazione:', 0, 1, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12,);

    $descrizioni = array(
        'Peso effettivo: '.$row['peso'].' Kg',
        'Altezza iniziale: '.$row['altezza_iniziale'].' cm',
        'Distanza verticale: '.$row['distanza_verticale'].' cm',
        'Distanza orizzontale: '.$row['distanza_orizzontale'].' cm',
        'Dislocazione angolare: '.$row['distanza_angolare'],
        'Presa: '.$row['presa'],
        'Frequenza '.$row['frequenza'].' (al minuto)',
        'Tempo: '.$row['durata'].' (ore)',
        'Validità: '.$row['validità'],
        'Peso raccomandato: '.$row['peso_raccomandato'].' Kg',
        'Indice sollevamento: '.$row['indice_sollevamento'],
        'Esito: '.$row['esito'],
        'Prezzo: '.$row['prezzo'].'€'
    );


/*$col_width = 80;
$row_height = 16;
$count = 0;
for($i=1; $i<14; $i++) {
  for($j=1; $j<2; $j++) {
    $pdf->Cell(95, 10, $descrizioni[$count], 1, 0, 'C');
    $count++;
}
  $pdf->Ln();
  
}

$cellWidth = $pdf->GetPageWidth() / 2;
$count = 0;

// Crea la griglia
for ($i = 1; $i <= 13; $i++) {
    // Crea una nuova riga
    for($f = 0; $f <= 2; $f++){
    $pdf->Cell(95, 10, $descrizioni[$count], 1, 0, 'C');
    $count++;
}
    $pdf->Ln();
}*/

$max_rows = 8;
$col_width = $pdf->GetPageWidth() / 2 - 5;
$row_height = 10;

for ($row = 0; $row < $max_rows; $row++) {
    for ($col = 0; $col < 2; $col++) {
        $index = $row * 2 + $col;
        if ($index >= count($descrizioni)) {
            break;
        }
        $x = $col * $col_width + 5;
        $y = $pdf->GetY();
        $pdf->SetXY($x, $y);
        $pdf->SetFillColor(200, 230, 255);
        $pdf->MultiCell($col_width, $row_height, $descrizioni[$index], 1, 'C', true);
    }
}
        $pdf->Output();
?>