<?php
	require("./connection.php");
    $conn=connect();
	$sql="DELETE FROM `valutazione` WHERE id=".$_GET['id'];
    //$result=$conn->query($sql);
    header('Location: ./../homepage/homepage.php');
?>