<?php	
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
		
	// Si el GET ID existe, entonces CONSULTAR a la BD y mostrar informacion
	if ( isset( $_GET["id"] ) ) {
		$res= $mysqli->query("SELECT * FROM producto WHERE id=" . $_GET["id"] );		
        $row = $res->fetch_assoc();  // Usaremos un metodo diferente que el FOREACH, fetch_assoc
		if ( isset( $_SESSION["carrito"][ $_GET["id"] ] ) ) {
		  $canti= $_SESSION["carrito"][ $_GET["id"] ] ;
		} else 
			$canti=1;
		
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sty.css">
  </head>
<body class="NAVBACK">  
	<nav class="navbar navbar-expand-lg navbar-light NAVBACK">
	  <div class="container" width="60%">
	    <a class="navbar-brand" href="index.php">
	     	<img src="img/logoSt.png" width="100%" align="left">
	    </a>
		<nav class="navbar navbar-light">
		  <div class="container-fluid">
			<form class="d-flex" action="buscar.php">
			  <input class="form-control me-2" size="70" type="search" placeholder="Búsqueda"  name="busqueda">
			  <button class="btn btn-outline-Success" type="submit" style="font-weight:bold;">Buscar</button>
			</form>
		  </div>
		</nav>
	    <p>
		<a href="registro_usuario.php" data-bs-toggle="tooltip" data-bs-html="true">
		    <img src = "img/cuenta2.png" width="15%" align="right" class="carrito">
		 </a>				 
		 <a href="carrito.php" data-bs-toggle="tooltip" data-bs-html="true">
		    <img src = "img/car2.png" width="15%" align="right" class="carrito">
		 </a>
		</p>
		
	  </div>
	</nav>

<div class="container w-100 p-5 h-75  centrarc">

	<div class="card mb-3 uwu" style="min-width: 80%;">
	  <div class="row g-0">
			<div class="col-md-4">
			  <img src="arti/<?php echo $row["id"]; ?>.png" class="img-fluid rounded-start" alt="..." width="90%">
			</div>
			<div class="col-md-8">
			  <div class="card-body">
				<h3 class="card-title" style="font-weight: bold;"><u>Descripción:</u></h5>
				<h4 class="card-text"><?php echo $row["descripcion"]; ?></h4><br>
				<p class="card-text"><u>Categorías:</u> <?php echo $row["categorias"]; ?></p>
				<p class="card-text"><u>Creador:</u> <?php echo $row["creador"]; ?></p>
				<h5 class="card-text" style="font-weight: bold;"><u>Cantidad:</u></h5>
				
				<form class="d-flex" action="agregar_articulo.php" method="GET">
					
					<input type="hidden"           name="id" value="<?php echo $row["id"]; ?>">
					<input type="number" id="hola" name="canti" min="1" max="100" 
					       value="<?php echo $canti ; ?>">
					
					&nbsp;&nbsp;&nbsp;
										
					<h3 class="card-text" style="font-weight: bold;"><u>Precio: $</u> <?php echo $row["precio"]; ?></h3>
					
					&nbsp;&nbsp;&nbsp;
										
					<button class="btn btn-primary" type="submit">Comprar</button>
					
				</form>
			  </div>
			</div>
	</div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php		
	} else {
		// Si NO existe, lo mandamos a pagina de ERROR
	    echo '<script>window.location.href = "index.php";</script>'; 	
	  }
?>

