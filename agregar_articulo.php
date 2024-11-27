<?php
	session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
	$cant = $_GET['canti'];
	$id   = $_GET['id'];
    $_SESSION["carrito"][ $id ] = $cant ;
	echo '<script>window.location.href = "index.php";</script>'; 
?>
