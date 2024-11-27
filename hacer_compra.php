<?php
	session_start(); 	
	$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
	
	// Creamos primero la clave y la fecha
	$ids = range(1, 99); // Genera un arreglo de los valores 1 - 99
	shuffle($ids); // reordena todos los numeros de forma aleatoria
	$ids_12 = array_chunk($ids, 10); // Solo usaremos el 1er bloque de 10 elementos!
	
	$Ccompra = implode($ids_12[1] );
	$fecha = date("Y-m-d");		
	$id_cliente= $_SESSION["id_cliente"];
	
	$articulos= array_keys( $_SESSION["carrito"] ); 
		
	foreach ($articulos as $id_producto) {
		// conseguir el PRECIO del producto
		$cantidad = $_SESSION["carrito"][ $id_producto ];
		
		// Agregar cada articulo a su CLAVE de COMPRA 
		$mysqli->query(" INSERT INTO historial_compras VALUES (". $Ccompra .",'". $id_cliente ."','". $id_producto ."','". $cantidad ."','". $fecha ."' ); ");
		unset($_SESSION["carrito"][ $id_producto ]);
	}
	

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sty.css">


    <title>ERROR EN STICKERSMENSOS</title>
  </head>
  <body>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light NAVBACK">
      <div class="container" width="70%">
        <a class="navbar-brand" href="index.php">
          <img src="img/logoSt.png" width="50%" align="center">
        </a>
    
      </div>
    </nav>
	  <br>
		<h1 align="center">¡Gracias por tu compra!</h1>
		<div style="height: 400px;" align="center">
			<img src="img/bigmay.png" style="height: 100%;">
	  <div>
		<br>
		<h2 align="center">¡Vuelve a la página principal pulsando en el logotipo!</h2>
		<br>
	  </div>  
  </body>
</html>