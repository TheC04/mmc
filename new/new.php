<?php
	session_start();
  if(!(isset($_SESSION['user']))){
		header('Location: ./index.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./new.css">
    <script src="./new.js"></script>
  </head>
	<body>
    <h1>Nuovo documento</h1>
    <form method="POST" class="form">
      <h4 style="margin-top: 2px;">Ragione sociale</h4>
      <input name="rs" type="text" required class="input">
      <h4>Costo</h4>
      <input name="cs" type="number" required class="input" step="0.01" min="0.01">
      <h4>Peso effettivo(kg)</h4>
      <input name="pe" type="number" min=3 max=25 required class="input" step="0.1">
      <h4>Altezza iniziale(cm)</h4>
      <input name="ai" type="number" min=0 required class="input">
      <h4>Distanza verticale(cm)</h4>
      <input name="dv" type="number" min=25 required class="input">
      <h4>Distanza orizzontale <p>(tra il baricentro del lavoratore<br> e il peso, espresso in cm)</p></h4>
      <input name="do" type="number" min=25 required class="input">
      <h4>Dislocazione angolare(°)</h4>
      <input name="da" type="number" min=0 required class="input" step="0.1">
      <h4>Presa sul carico</h4>
      <input name="pc" list="psc" required class="input">
        <datalist id="psc">
      	  <option id="b" value="Buona">
          <option id="s" value="Scarsa">
        </datalist>
      <h4>Frequenza(numero di volte al minuto)</h4>
      <input name="fr" type="number" min=0.20 required class="input" step="0.1">
      <h4>Durata(ore continue)</h4>
      <input name="dr" type="number" min=0.1 max=8 required class="input" step="0.1">
      <h4>Una sola mano</h4>
      <input name="sm" type="checkbox" class="cBox">
      <br><br>
      <input name="send" type="submit" value="Crea Documento" class="submit" target="_blank">
      <button onclick="esci()">Indietro</button>
    </form>
    <?php
      if(isset($_POST['fr'])){
        $rs=$_POST['rs'];
        $cs=$_POST['cs'];
        $pe=$_POST['pe'];
        $ai=$_POST['ai'];
        $dv=$_POST['dv'];
        $do=$_POST['do'];
        $da=$_POST['da'];
        $pc=$_POST['pc'];
        $fr=$_POST['fr'];
        $dr=$_POST['dr'];
        if(isset($_POST['sm'])){
          $sm="Vero";
        }else{
          $sm="Falso";
        }
        require('./../php/getValue.php');
        if(getAI($ai)!=0&&getDV($dv)!=0&&getDO($do)!=0&&getDA($da)!=0&&getPC($pc)!=0&&getFD($fr, $dr)!=0&&getSM($sm)!=0){
          $pef=round(getAI($ai)*getDV($dv)*getDO($do)*getDA($da)*getPC($pc)*getFD($fr, $dr)*20*getSM($sm), 2);
          $iS=round($pe/$pef, 2);
          require('./../php/connection.php');
          $conn = connect();
          $sql = "INSERT INTO `valutazione`(`id`, `operatore`, `cliente`, `data`, `Peso effettivo`, `Altezza iniziale`, `Distanza verticale`, `Distanza orizzontale`, `Dislocazione angolare`, `Presa`, `Frequenza`, `Durata`, `Una mano`, `iSoll`, `documento`, `costo`) VALUES ('','".$_SESSION['id']."','".$_POST['rs']."','',".$_POST['pe'].",".$_POST['ai'].",". $_POST['dv'].",". $_POST['do'].",". $_POST['da'].",'". $_POST['pc']."',". $_POST['fr'].",". $_POST['dr'].",'".$sm."','".$iS."','./../valutazioni".$_POST['rs'].".pdf',". $_POST['cs'].")";
          $result = $conn->query($sql);
          ob_start();
          require('./../pdfclass/fpdf.php');
          $pdf = new FPDF();
          $pdf->SetTitle('PDF');
          $pdf->SetAuthor('Creator');
          $pdf->AddPage();
          $pdf->SetFont('Arial','B',22);
          $user_fullname = $_SESSION['nome'] . ' ' . $_SESSION['cognome'];
          $pdf->Cell(0, 20, 'Movimentazione manuale dei carichi', 0, 1, 'C');
          $pdf->Ln(5);
          $pdf->SetFont('Arial','',12);
          $pdf->Cell(40, 10,'Redatto da:',0,0);
          $pdf->Cell(40, 10, $user_fullname, 0, 0);
          $pdf->Ln();
          $pdf->Cell(40,10,'Ragione sociale:',0,0);
          $pdf->Cell(40,10,$rs,0,0);
          $pdf->Ln();
          $pdf->Cell(40,10,'Data:',0,0);
          $pdf->Cell(40,10,date("d/m/Y", time()),0,0);
          $pdf->Ln();
          $pdf->Cell(40,10,'Costo:',0,0);
          $pdf->Cell(40,10,$cs.' euro',0,0);
          $pdf->Ln(15);
          $pdf->SetFont('Arial', 'B', 12);
          $pdf->Cell(0, 10, 'Dettagli valutazione:', 0, 1, 'C');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Peso effettivo', 0, 0, 'L');
          $pdf->Cell(90, 10, $pe.' Kg', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Altezza iniziale', 0, 0, 'L');
          $pdf->Cell(90, 10, $ai.' cm', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Distanza verticale', 0, 0, 'L');
          $pdf->Cell(90, 10, $dv.' cm', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Distanza orizzontale', 0, 0, 'L');
          $pdf->Cell(90, 10, $do.' cm', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Dislocazione angolare', 0, 0, 'L');
          $pdf->Cell(90, 10, $da." gradi", 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Presa', 0, 0, 'L');
          $pdf->Cell(90, 10, $pc, 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Frequenza', 0, 0, 'L');
          $pdf->Cell(90, 10, $fr.' (al minuto)', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Durata', 0, 0, 'L');
          $pdf->Cell(90, 10, $dr.' (ore)', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Una mano', 0, 0, 'L');
          $pdf->Cell(90, 10, $sm, 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Peso raccomandato', 0, 0, 'L');
          $pdf->Cell(90, 10, $pef.' Kg', 0, 0, 'L');
          $pdf->Ln();
          $pdf->Cell(90, 10, 'Indice sollevamento', 0, 0, 'L');
          $pdf->Cell(90, 10, $iS, 0, 0, 'L');
          $pdf->Ln();
          $pdf->Output();
          ob_end_flush(); 
        }else{
          echo '<script>alert("C\'è un errore nei valori inseriti")</script>';
        }
      }
      echo '<script>console.log("a")</script>';
    ?>
  </body>
</html>