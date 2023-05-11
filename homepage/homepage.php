<?php
    session_start();
    if(!(isset($_SESSION['user']))){
		header('Location: ./../index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./homepage.css">
        <script src="./homepage.js"></script>
    </head>
    <body>
        <header>
            <button onclick="window.location.href='./../new/new.php';">Nuovo</button>
            <div class="user">
                <p>Nome utente:
                    <?php
                        echo $_SESSION['user'];
                    ?>
                </p>
                <p>Ruolo:
                    <?php
                        if($_SESSION['role']==1){
                            echo "visualizzatore";
                        }else{
                            if($_SESSION['user']=='admin'){
                                echo "amministratore";
                            }else{
                                echo "editor";
                            }
                        }
                    ?>
                </p>
                <a href="./../index.php">Disconnettiti</a>
            </div>
        </header>
        <div style="overflow-x:auto;">
            <table id="tb">
            	<tr>
                	<th onclick="sortTable(0)">Ragione sociale</th>
                    <th onclick="sortTable(1)">Data</th>
                    <th onclick="sortTable(2)">Peso effettivo</th>
                    <th onclick="sortTable(3)">Altezza iniziale</th>
                    <th onclick="sortTable(4)">Distanza verticale</th>
                    <th onclick="sortTable(5)">Distanza orizzontale</th>
                    <th onclick="sortTable(6)">Dislocazione angolare</th>
                    <th onclick="sortTable(7)">Presa</th>
                    <th onclick="sortTable(8)">Frequenza</th>
                    <th onclick="sortTable(9)">Durata</th>
                    <th onclick="sortTable(10)">Una sola mano</th>
                    <th onclick="sortTable(11)">Indice di sollevamento</th>
                    <th onclick="sortTable(13)">Costo</th>
                    <th>Documento</th>
                    <?php
                        if($_SESSION['user']=='admin' || $_SESSION['role']==0){
                            echo '<th></th>';
                        }
                    ?>
                </tr>
                <?php
                    require('./../php/connection.php');
                    $connection=connect();
                    if($connection->connect_error){
                        die('C\è stato un errore: '.$connection->connect_error);
                    }
                    if($_SESSION['user']=='admin' || $_SESSION['role']==1){
                        $sql = 'SELECT * FROM valutazione';
                    }else{
                        $sql = 'SELECT * FROM valutazione WHERE operatore="'.$user.'"';
                    }
                    $response = $connection->query($sql);
                    if ($response->num_rows > 0) {
                        while($row=$response->fetch_assoc()){
		    				echo '<tr><td>'.$row["cliente"].'</td>
                            <td>'.$row["data"].'</td>
                            <td>'.$row["Peso effettivo"].'</td>
                            <td>'.$row["Altezza iniziale"].'</td>
                            <td>'.$row["Distanza verticale"].'</td>
                            <td>'.$row["Distanza orizzontale"].'</td>
                            <td>'.$row["Dislocazione angolare"].'</td>
                            <td>'.$row["Presa"].'</td>
                            <td>'.$row["Frequenza"].'</td>
                            <td>'.$row["Durata"].'</td>
                            <td>'.$row["Una mano"].'</td>
                            <td>'.$row["iSoll"].'</td>
                            <td>'.$row["costo"].'</td>
                            <td><a href="'.$row["documento"].'">PDF</a></td>';
                            if($_SESSION['user']=='admin' || $_SESSION['role']==0){
                                echo '<td><button>Modifica</button></td></tr>';
                            }
		    			}
                    }
                ?>
            </table>
        </div>
    </body>
</html>