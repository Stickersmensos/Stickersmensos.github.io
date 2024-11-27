<?php
  session_start();
  
  if( isset( $_POST["correo"] ) && isset( $_POST["contrasena"] ) ){
	 $correo= $_POST["correo"];
	 $pass  = $_POST["contrasena"];
	 	 
	 $mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
	 	 
	 $res= $mysqli->query("SELECT * FROM cliente WHERE correo='". $correo ."' AND contrasena='". $pass ."' ; ");
	 
	 $row = $res->fetch_assoc();  
	 
	 if ( isset( $row["correo"] ) ) {
	 
		$_SESSION["usuario"]= $row["nombre"] ;  // Depende de quien se logea!!!	    
		$_SESSION["id_cliente"]= $row["id"] ;
		echo '<script>window.location.href = "index.php";</script>'; 
	 } else{
		 echo '<script>window.location.href = "error.html";</script>'; 
	 }
	 
	 
  }
