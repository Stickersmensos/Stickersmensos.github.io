<?php
	session_start();
	
	
	// Si el GET ID existe en el carrito, entonces LO ELIMINAMOS
	if ( isset( $_SESSION["carrito"][$_GET["id"]] ) ) {
	   unset($_SESSION["carrito"][$_GET["id"]]);
	} 
	echo '<script>window.location.href = "carrito.php?articulo_elim=1";</script>'; 
?>