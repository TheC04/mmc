<?php
	session_start();
    if(!(isset($_SESSION['user']))){
		header('Location: ./index.php');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Valutazione</title>
    <meta charset="utf-8">
    <!--<link rel="stylesheet" href="./new.css">-->
    <script src="./new.js"></script>
  </head>
	<body>
    <form method="POST">
      <h4>Ragione sociale</h4>
      <input id="rs" type="text" required>
      <h4>Costo</h4>
      <input id="cs" type="number" min=1 required>
      <h4>Peso effettivo(kg)</h4>
      <input id="pe" type="number" min=3 max=25 required>
      <h4>Altezza iniziale(cm)</h4>
      <input id="ai" type="number" min=0 required>
      <h4>Distanza verticale(cm)</h4>
      <input id="dv" type="number" min=25 required>
      <h4>Distanza orizzontale(cm)</h4>
      <input id="do" type="number" min=0 required>
      <h4>Dislocazione angolare(°)</h4>
      <input id="da" type="number" min=0 required>
      <h4>Presa sul carico</h4>
      <input id="pc" list="psc" required>
        <datalist id="psc">
      	  <option id="b" value="Buona">
          <option id="s" value="Scarsa">
        </datalist>
      <h4>Frequenza(numero di volte al minuto)</h4>
      <input id="fr" type="number" min=0,20 required>
      <h4>Durata(ore continue)</h4>
      <input id="dr" type="number" min=0,1 max=8 required>
      <h4>Una sola mano</h4>
      <input id="sm" type="checkbox">
      <h4>IS:</h4>
      <h4 id="iSoll"></h4>
      <input id="send" type="submit" id="sub" value="Crea Documento" onclick="calc()">
    </form>
    <?php
    //peso limite raccomandato sempre maggiore di 0
      if(isset($_POST['send'])){
        if(isset($_POST['rs'], $_POST['pe'], $_POST['ai'], $_POST['dv'], $_POST['do'], $_POST['da'], $_POST['pc'], $_POST['fr'], $_POST['dr'], $_POST['sm'])){
          /*require('./../pdfclass/fpdf.php');
          $pdf = new FPDF();
          $pdf->AddPage();
          $pdf->SetFont('Arial', 'B', 18);
          $pdf->Cell(60,20,'Peso effettivo: '.$_POST['pe'].'kg');
          $pdf->Cell(60,20,'Altezza iniziale: '.$_POST['ai'].'cm');
          $pdf->Cell(60,20,'Distanza verticale: '.$_POST['dv'].'cm');
          $pdf->Cell(60,20,'Distanza orizzontale: '.$_POST['do'].'cm');
          $pdf->Cell(60,20,'Dislocazione angolare: '.$_POST['da'].'°');
          $pdf->Cell(60,20,'Presa sul carico: '.$_POST['pc']);
          $pdf->Cell(60,20,'Frequenza: '.$_POST['fr'].' ripetizioni al minuto');
          $pdf->Cell(60,20,'Durata: '.$_POST['dr'].'ore');
          if ($_POST['sm'] == true) {
            $s='Sì';
          } else {
            $s='No';
          }
          $pdf->Cell(60,20,'Una sola mano: '.$s);
          $pdf->Cell(60,20,'Indice di sollevamento(IS): '.$_POST['is']);
          $pdf->Output("./../valutazioni", $_POST['rs'].".pdf");*/
          require('./../php/connection.php');
          $conn = connect();
          $sql = "INSERT INTO valutazione ('id', 'operatore', 'cliente', 'data', 'peso', 'altezza', 'dVerticale', 'dOrizzontale', 'dAngolare', 'presa', 'frequenza', 'durata', 'unaMano', 'iSoll', 'documento', 'costo') VALUES ('', ".$_SESSION['id'].",".$_POST['rs'].", '',".$_POST['pe'].",".$_POST['ai'].",". $_POST['dv'].",". $_POST['do'].",". $_POST['da'].",". $_POST['pc'].",". $_POST['fr'].",". $_POST['dr'].",". $_POST['sm'].",". $_POST['iSoll'].",./../valutazioni".$_POST['rs'].".pdf,". $_POST['cs'].")";
          $result = $conn->query($sql);
          echo $result;
        }
      }
    ?>
    </body>
</html>