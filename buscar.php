<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
$ex = "%".$_GET['busqueda']."%";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sty.css">


    <title>STICKERSMENSOS</title>
  </head>
  <body>
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
</div>
<div class="container">
	<!-- Busqueda-->
		  <div class="" >
			
			<br>
			<h2 align="center">Resultados de "<?php echo $_GET['busqueda']?>"</h2>
			<br>	

		<div class="container"> 
		 <div class="row align-items-start">    
		 
			<?php
			  $resultado = $mysqli->query('SELECT id, descripcion, precio FROM producto WHERE descripcion LIKE "'.$ex.'%"'); // WHERE id=4
			  $i = 1;
			  $chequeo = 0;
			  foreach ($resultado as $row) {	    
			?>
			
		  <div class="col">
			<div class="card" style="width: 15rem; height: 25rem; position-relative">
			  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; vertical-align: middle;" 
			  class="card-img-top position-relative top-0 start-50 translate-middle-x" alt="...">
			  <div class="card-body">
				<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
				 <a href="mostrar_detalle.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Ver más</a>
				</h5>
				<br>
				<h6 class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></h6>				
			  </div>
			</div>
			  </div> <!-- COLUMNA  -->
				
				<?php 
					$i = $i + 1;
					$chequeo = 1;
					if ($i==5) {  echo "<p>"; $i=1;  } ;
				  }; // Fin del foreach

				  if ($chequeo == 0) {
					?>
						<div style="height: 400px;" align="center">
							<img src="img/bigmay.png" style="height: 100%;">
						<div>
						<br>
						<h2 align="center">Como te puedes dar cuenta, ¡No hay resultados!</h2>
						<br>
					<?php
				  }
				?>
				<br><br>
			 </div>
		</div>
	</div>
</div>