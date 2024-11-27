
<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');

// SQL Consulta - id, descripcion, categorias, precio, tamano, _color, creador 	
	$_SESSION["usuario"]="Lucca";


/* $result = mysqli_execute_query($link, 'SELECT id, descripcion, precio FROM producto WHERE id=?', ['3']);
foreach ($result as $row) {
    printf("%s (%s)\n", $row["descripcion"], $row["precio"]);
} */


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/css.css">


    <title>STICKERSMENSOS</title>
  </head>
  <body>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-light NAVBACK">
		  <div class="container" width="60%">
		    <a class="navbar-brand" href="index.php">
		     	<img src="img/logoSt.png" width="100%" align="left">
		    </a>
			<nav class="navbar navbar-light bg-Dark">
			  <div class="container-fluid">
				<form class="d-flex" action="buscar.php" method="GET">
				  <input class="form-control me-2" size="70" type="search" placeholder="Búsqueda" name="busqueda">
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
					<br>
					<!-- menu -->	
				    <div class="container MIDBACK"> 
						<!-- MENU -->	
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
							<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#inicio" type="button" 
							role="tab"  aria-selected="true">Inicio</button>
						  </li>
						  <li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#originales" type="button" 
							role="tab" aria-selected="false">Originales</button>
						  </li>
						  <li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#robados" type="button" 
							role="tab" aria-selected="false">Robados</button>
						  </li>
						  <li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#todos" type="button" 
							role="tab" aria-selected="false">Todos</button>
						  </li>
						</ul>
		
						<div class="tab-content" id="myTabContent">
		<!-- INICIO -->
						  <div class="tab-pane fade show active" id="inicio" role="tabpanel" aria-labelledby="home-tab">
						  <!-- PAGINA INICIO
						  <?php
							if ($_SESSION["usuario"] != "")
								echo $_SESSION["usuario"] ;
						  ?> -->
													    
							<br>
							<h2 align="center" style="font-size: 40px; font-weight: bold;">¡Bienvenido!</h2>
							<br>	
				  
							<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img src="img/ad1.png" class="d-block w-100" data-bs-interval="2000" width="100%" height="400px" alt="...">
						    </div>
						    <div class="carousel-item">
						      <img src="img/ad2.png" class="d-block w-100" data-bs-interval="2000" width="100%" height="400px" alt="...">
						    </div>
						    <div class="carousel-item">
						      <img src="img/ad3.png" class="d-block w-100" data-bs-interval="2000" width="100%" height="400px" alt="...">
						    </div>
						  </div>
						</div>
							<br>
							<h2 align="center" style="font-weight: bold;">Nuestros top 4</h2>
							<br>	
						<div class="container"> 
						 <div class="row align-items-start">    
						 
						<?php						  
						  $res= $mysqli->query("SELECT * FROM producto WHERE id IN(".implode(",",array(19,300,3,10)).");");
						  $i = 1;
						  foreach ($res as $row) {	    
							//printf("%s (%s) <br>", $row["descripcion"], $row["precio"]);
						?>
							
						  <div class="col">
							<!-- id, descripcion, categorias, precio 	tamano 	_color 	creador 	 -->
							<div class="card" style="width: 15rem; height: 25rem; position-relative">
							  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; vertical-align: middle;" 
							  class="card-img-top position-relative top-0 start-50 translate-middle-x" alt="...">
							  <div class="card-body">
								<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
								 <a href="#?id=<?php echo $row["id"]; ?>" class="btn btn-primary" data-bs-toggle="modal" 
								    data-bs-target="#ITEMCOMPRA"  data-bs-whatever="<?php echo $row["id"]; ?>">Comprar</a>
								</h5>
								<br>
								<h6 class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></h6>				
							  </div>
							</div>
							  </div> <!-- COLUMNA  -->
								
								<?php 
									$i = $i + 1;
									if ($i==5) {  echo "<p>"; $i=1;  } ;
								  }; // Fin del foreach
								?>
								
							 </div>
						</div>
						<br>
							<h2 align="center" style="font-weight: bold;">Selección al azar</h2>
						<br>	
						<div class="container"> 
						 <div class="row align-items-start">    
						 
						<?php						  
						  $cant=0;
						  
						  $ids = range(1, 300); // Genera un arreglo de nuestros 300 IDs
						  shuffle($ids); // reordena todos los numeros de forma aleatoria
						  $ids_12 = array_chunk($ids, 12); // Solo usaremos el 1er bloque de 12 numeros!
						  
						  						  
						  $res= $mysqli->query("SELECT * FROM producto WHERE id IN(".implode(",", $ids_12[1] ).");");
						  $i = 1;
						  foreach ($res as $row) {	    
							//printf("%s (%s) <br>", $row["descripcion"], $row["precio"]);
						?>
							
						  <div class="col">
							<!-- id, descripcion, categorias, precio 	tamano 	_color 	creador 	 -->
							<div class="card" style="width: 15rem; height: 25rem; position-relative">
							  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; vertical-align: middle;" 
							  class="card-img-top position-relative top-0 start-50 translate-middle-x" alt="...">
							  <div class="card-body">
								<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
								 <a href="agregar_articulo.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Comprar</a>
								</h5>
								<br>
								<h6 class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></h6>										
							  </div>
							</div>
							  </div> <!-- COLUMNA  -->
								
								<?php 
									$i = $i + 1;
									if ($i==5) {  echo "<p>"; $i=1;  } ;
								  }; // Fin del foreach
								?>
								
							 </div>
						</div>
						
						
						
						
						  </div>
		<!-- ORIGINALES-->
						  <div class="tab-pane fade" id="originales" role="tabpanel" aria-labelledby="profile-tab">
						    
							<br>
							<h2 align="center">Stickers originales</h2>
							<br>	
				  
						<div class="container"> 
						 <div class="row align-items-start">    
						 
							<?php
							  $resultado = $mysqli->query('SELECT id, descripcion, precio FROM producto WHERE categorias LIKE "%Original%"'); // WHERE id=4
							  $i = 1;
							  foreach ($resultado as $row) {	    
								//printf("%s (%s) <br>", $row["descripcion"], $row["precio"]);
							?>
							
						  <div class="col">
							<!-- id, descripcion, categorias, precio 	tamano 	_color 	creador 	 -->
							<div class="card" style="width: 15rem; height: 25rem; position-relative">
							  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; vertical-align: middle;" 
							  class="card-img-top position-relative top-0 start-50 translate-middle-x" alt="...">
							  <div class="card-body">
								<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
								 <a href="agregar_articulo.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Comprar</a>
								</h5>
								<br>
								<h6 class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></h6>				
							  </div>
							</div>
							  </div> <!-- COLUMNA  -->
								
								<?php 
									$i = $i + 1;
									if ($i==5) {  echo "<p>"; $i=1;  } ;
								  }; // Fin del foreach
								?>
								
							 </div>
						</div>
							

						  </div>
		<!-- NO ORIGINALES -->
						  <div class="tab-pane fade" id="robados" role="tabpanel" aria-labelledby="contact-tab">
						   <br> <h2 align="center">Stickers no originales</h2> <br>
						   <div class="container"> 
						 <div class="row align-items-start">    
						 
							<?php
							  $resultado = $mysqli->query('SELECT id, descripcion, precio FROM producto WHERE categorias LIKE "%robado%"'); // WHERE id=4
							  $i = 1;
							  foreach ($resultado as $row) {	    
								//printf("%s (%s) <br>", $row["descripcion"], $row["precio"]);
							?>
							
						  <div class="col">
							<!-- id, descripcion, categorias, precio 	tamano 	_color 	creador 	 -->
							<div class="card" style="width: 15rem; height: 25rem; position-relative">
							  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; vertical-align: middle;" 
							  class="card-img-top position-relative top-0 start-50 translate-middle-x" alt="...">
							  <div class="card-body">
								<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
								 <a href="agregar_articulo.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Comprar</a>
								</h5>
								<br>
								<h6 class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></h6>				
							  </div>
							</div>
							  </div> <!-- COLUMNA  -->
								
								<?php 
									$i = $i + 1;
									if ($i==5) {  echo "<p>"; $i=1;  } ;
								  }; // Fin del foreach
								?>
								
							 </div>
						</div>
						  </div>
		<!-- TODOS -->
						  <div class="tab-pane fade" id="todos" role="tabpanel" aria-labelledby="contact-tab">
						   <br> <h2 align="center">Todos los stickers</h2> <br>						  
								<div class="container"> 
								 <div class="row align-items-start">    
								 
									<?php
									  $resultado = $mysqli->query('SELECT id, descripcion, precio FROM producto '); // WHERE id=4
									  $i = 1;
									  foreach ($resultado as $row) {	    
										//printf("%s (%s) <br>", $row["descripcion"], $row["precio"]);
									?>
									
								  <div class="col">
									<!-- id, descripcion, categorias, precio 	tamano 	_color 	creador 	 -->
									<div class="card" style="width: 15rem; height: 25rem; position-relative">
									  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; vertical-align: middle;" class="card-img-top position-relative top-0 start-50 translate-middle-x" alt="...">
									  <div class="card-body">
										<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
										 <a href="agregar_articulo.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Comprar</a>
										</h5>
										<br>
										<h6 class="card-text" align="justify" ><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></h6>				
									  </div>
									</div>
								  </div> <!-- COLUMNA  -->
									
									<?php 
										$i = $i + 1;
										if ($i==5) {  echo "<p>"; $i=1;  } ;
									  }; // Fin del foreach
									?>
								 </div>
								</div>				

						  </div>
						  
						  <!-- FIN TODOS-->

						</div>		
				</div>
				<br><br><br>
   <footer class="navbar navbar-expand-lg navbar-light NAVBACK w-100">
                        <div class="footer-links">
                            <br>
                            <a href="Interfaz.html">Términos y condiciones</a>&emsp;
                            <a href="Polipriv.html">Politica y privacidad</a>&emsp;
                            <a href="Polipago.html">Pago</a>&emsp;
                            <a href="Acercade.html">Acerca de nosotros</a>&emsp;
                            <a href="Preg.html">Preguntas frecuentes</a>&emsp;
                              <a href="Gara.html">Garantia</a>&emsp;
                               <a href="Entre.html">Entrega</a>&emsp;
                            <a>Siguenos</a>&emsp;

  <div class="instagram-link">
          <a href="https://www.instagram.com/shopstick_oficial/profilecard/?igsh=N3AwM2s0YTdhZ3gw" target="_blank">
          Instagram
    </a>
  </div>
  

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>

<?php
  $mysqli->close();
?>