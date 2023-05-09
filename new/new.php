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
    <form method="POST" class="form" action="./../php/action_index.php">
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
      <input name="do" type="number" min=0 required class="input">
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
      <input name="send" type="submit" value="Crea Documento" onclick="calc()" class="submit">
      <button onclick="esci()">Indietro</button>
    </form>
  </body>
</html>