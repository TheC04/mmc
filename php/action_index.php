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
        echo getAI($ai), getDV($dv), getDO($do), getDA($da), getPC($pc), getFD($fr, $dr), getSM($sm);
        $iS=$pe/(getAI($ai)*getDV($dv)*getDO($do)*getDA($da)*getPC($pc)*getFD($fr, $dr)*getSM($sm));
        echo $iS;
      }else{
        echo "<h1>C'è un errore nei valori inseriti</h1><button onclick='esci()'>Indietro</button><script>function esci(){ window.location.href=\"./../new/new.php\";}</script>";
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
      /*require('./../php/connection.php');
      $conn = connect();
      $sql = "INSERT INTO valutazione ('id', 'operatore', 'cliente', 'data', 'peso', 'altezza', 'dVerticale', 'dOrizzontale', 'dAngolare', 'presa', 'frequenza', 'durata', 'unaMano', 'iSoll', 'documento', 'costo') VALUES ('', ".$_SESSION['id'].",".$_POST['rs'].", '',".$_POST['pe'].",".$_POST['ai'].",". $_POST['dv'].",". $_POST['do'].",". $_POST['da'].",". $_POST['pc'].",". $_POST['fr'].",". $_POST['dr'].",". $_POST['sm'].",". $_POST['iSoll'].",./../valutazioni".$_POST['rs'].".pdf,". $_POST['cs'].")";
      $result = $conn->query($sql);
      echo $result;*/
    }
  }
?>