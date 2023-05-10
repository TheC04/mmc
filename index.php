<?php
    session_start();
    session_destroy();
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./index/index.css">
        <script src="./index/index.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="screen">
                <div class="screen__content">
                <form method="POST" action="index.php" class="login">
                    <div class="login__field">
                        <input type="text" name="us" class="login__input" placeholder="Nome utente">
                    </div>
                    <div class="login__field">
                        <input type="password" id="pw" name="psw" class="login__input" placeholder="Password">
                     </div>
                        <input type="checkbox" onclick="showP()" class="login__sp"> Mostra password</input>
                    <input type="submit" value="Accedi" class="login__submit">
                </form>
                <?php
                    require('./php/connection.php');
                    $connection=connect();
                    if($connection->connect_error){
                        die('C\è stato un errore: '.$connection->connect_error);
                    }
                    if(isset($_POST['us']) and isset($_POST['psw'])){
                        $user = $_POST['us'];
                        $password = $_POST['psw'];
                        $sql = 'SELECT * FROM operatore WHERE nomeutente="'.$user.'" AND password="'.hash('sha512', $password, false).'";';
                        $response = $connection->query($sql);
                        if ($response->num_rows > 0) {
                            $data = $response->fetch_array();
                            $_SESSION['id']=$data['id'];
                            $_SESSION['nome']=$data['nome'];
                            $_SESSION['cognome']=$data['cognome'];
                            $_SESSION['user']=$data['nomeutente'];
                            $_SESSION['role']=$data['id_ruolo'];
                            header('Location: ./homepage/homepage.php');
                        }
                        else {
                            echo '<div>Credenziali sbagliate</div>';
                        }
                    }
                ?>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>		
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>		
            </div>
        </div>
    </body>
</html>