<?php
    function connect(){
        $ip = '127.0.0.1';
        $user='root';
        $pwd='';
        $database='my_salvimarco';
        $connection = new mysqli($ip, $user, $pwd, $database);
        return $connection;
    }
?>