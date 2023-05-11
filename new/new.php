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
      <input name="cs" type="number" min=1 required class="input" step="0,01">
      <h4>Peso effettivo(kg)</h4>
      <input name="pe" type="number" min=3 max=25 required class="input" step="0,1">
      <h4>Altezza iniziale(cm)</h4>
      <input name="ai" type="number" min=0 required class="input">
      <h4>Distanza verticale(cm)</h4>
      <input name="dv" type="number" min=25 required class="input">
      <h4>Distanza orizzontale <p>(tra il baricentro del lavoratore<br> e il peso, espresso in cm)</p></h4>
      <input name="do" type="number" min=25 required class="input">
      <h4>Dislocazione angolare(°)</h4>
      <input name="da" type="number" min=0 required class="input" step="0,1">
      <h4>Presa sul carico</h4>
      <input name="pc" list="psc" required class="input">
        <datalist id="psc">
      	  <option id="b" value="Buona">
          <option id="s" value="Scarsa">
        </datalist>
      <h4>Frequenza(numero di volte al minuto)</h4>
      <input name="fr" type="number" min=0,20 required class="input" step="0,1">
      <h4>Durata(ore continue)</h4>
      <input name="dr" type="number" min=0,1 max=8 required class="input" step="0,1">
      <h4>Una sola mano</h4>
      <input name="sm" type="checkbox" class="cBox">
      <br><br>
      <input name="send" type="submit" value="Crea Documento" class="submit">
      <button onclick="esci()">Indietro</button>
    </form>
    <?php
      if(isset($_POST['send'])){
        if(isset($_POST['rs'], $_POST['pe'], $_POST['ai'], $_POST['dv'], $_POST['do'], $_POST['da'], $_POST['pc'], $_POST['fr'], $_POST['dr'])){
          $rs=$_POST['rs'];
          $pe=$_POST['pe'];
          $ai=$_POST['ai'];
          $dv=$_POST['dv'];
          $do=$_POST['do'];
          $da=$_POST['da'];
          $pc=$_POST['pc'];
          $fr=$_POST['fr'];
          $dr=$_POST['dr'];
          if(isset($_POST['sm'])){
            $sm=true;
          }else{
            $sm=false;
          }
          require('./../php/getValue.php');
          if(getAI($ai)!=0&&getDV($dv)!=0&&getDO($do)!=0&&getDA($da)!=0&&getPC($pc)!=0&&getFD($fr, $dr)!=0&&getSM($sm)!=0){
            $iS=$pe/(getAI($ai)*getDV($dv)*getDO($do)*getDA($da)*getPC($pc)*getFD($fr, $dr)*getSM($sm)*20);
            //require('./../php/connection.php');
            //$conn = connect();
            //$sql = "INSERT INTO `valutazione`(`id`, `operatore`, `cliente`, `data`, `Peso effettivo`, `Altezza iniziale`, `Distanza verticale`, `Distanza orizzontale`, `Dislocazione angolare`, `Presa`, `Frequenza`, `Durata`, `Una mano`, `iSoll`, `documento`, `costo`) VALUES ('','".$_SESSION['id']."','".$_POST['rs']."','',".$_POST['pe'].",".$_POST['ai'].",". $_POST['dv'].",". $_POST['do'].",". $_POST['da'].",'". $_POST['pc']."',". $_POST['fr'].",". $_POST['dr'].",'".$sm."','".$iS."','./../valutazioni".$_POST['rs'].".pdf',". $_POST['cs'].")";
            //$result = $conn->query($sql);
            echo '<script>alert("Indice di sollevamento: '.$iS.'\nPeso limite raccomandato: '.getAI($ai)*getDV($dv)*getDO($do)*getDA($da)*getPC($pc)*getFD($fr, $dr)*20*getSM($sm).'")>';
          }else{
            echo '<script>alert("C\'è un errore nei valori inseriti")</script>';
          }
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
        }
        echo '<script>alert("Ciao")</script>';
      }
      echo '<script>alert("Ciao")</script>';
    ?>
  </body>
</html>