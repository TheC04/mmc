<html>
  <head>
    <meta charset="utf-8" />
    <script src="https://unpkg.com/pdf-lib"></script>
  </head>

  <body>
  <?php
      session_start();
      if(isset($_POST['send'])){
        if(isset($_POST['rs'], $_POST['pe'], $_POST['ai'], $_POST['dv'], $_POST['do'], $_POST['da'], $_POST['pc'], $_POST['fr'], $_POST['dr'])){
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
            $sm=true;
          }else{
            $sm=false;
          }
          require('./../php/getValue.php');
          if(getAI($ai)!=0&&getDV($dv)!=0&&getDO($do)!=0&&getDA($da)!=0&&getPC($pc)!=0&&getFD($fr, $dr)!=0&&getSM($sm)!=0){
            $pef=getAI($ai)*getDV($dv)*getDO($do)*getDA($da)*getPC($pc)*getFD($fr, $dr)*20*getSM($sm);
            $iS=$pe/$pef;
            //require('./../php/connection.php');
            //$conn = connect();
            //$sql = "INSERT INTO `valutazione`(`id`, `operatore`, `cliente`, `data`, `Peso effettivo`, `Altezza iniziale`, `Distanza verticale`, `Distanza orizzontale`, `Dislocazione angolare`, `Presa`, `Frequenza`, `Durata`, `Una mano`, `iSoll`, `documento`, `costo`) VALUES ('','".$_SESSION['id']."','".$_POST['rs']."','',".$_POST['pe'].",".$_POST['ai'].",". $_POST['dv'].",". $_POST['do'].",". $_POST['da'].",'". $_POST['pc']."',". $_POST['fr'].",". $_POST['dr'].",'".$sm."','".$iS."','./../valutazioni".$_POST['rs'].".pdf',". $_POST['cs'].")";
            //$result = $conn->query($sql);
            echo '<h1>Documento movimentazione manuale dei carichi</h1><p>Ragione sociale: '.$rs.'<br>Operatore: '.$_SESSION['nome'].' '.$_SESSION['cognome'].'<br>Costo:'.$cs.'<br>Peso del carico: '.$pe.'<br>Altezza iniziale:'.$ai.'<br>Distanza verticale: '.$dv.'<br>Distanza orizzontale: '.$do.'<br>Dislocazione angolare: '.$da.'<br>Presa: '.$pc.'<br>Frequenza: '.$fr.'<br>Durata: '.$dr.'<br>Indice di sollevamento: '.$iS.'<br>Peso limite raccomandato: '.$pef.'</h1>';
          }else{
            echo '<script>alert("C\'è un errore nei valori inseriti")</script>';
          }
        }
        echo '<script>console.log("Ciao")</script>';
      }
      echo '<script>console.log("a")</script>';
    ?>
    <button onclick="Crea()">Crea pdf</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
  </body>

  <script>
    function Crea(){
      var doc = new jsPDF();

      doc.html(document.body, {
        callback: function (doc) {
          doc.save();
        },
        x: 10,
        y: 10
      });
    }
  </script>
</html>