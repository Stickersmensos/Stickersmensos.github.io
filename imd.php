<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');

// SQL Consulta - id, descripcion, categorias, precio, tamano, _color, creador 	



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
    <title>STICKERSMENSOS</title>
  </head>
  <body>
    <div class="container"> 
		<p><a href="carrito.php"><img src = "car.png" width="5%" align="right"></a></p> 
	</div>
	
	<br> <br> 
	
	<!-- menu -->	
    <div class="container"> 
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
			<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#colores" type="button" 
			role="tab" aria-selected="false">Colores</button>
		  </li>
		  <li class="nav-item" role="presentation">
			<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#todos" type="button" 
			role="tab" aria-selected="false">Todos</button>
		  </li>
		</ul>

		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade show active" id="inicio" role="tabpanel" aria-labelledby="home-tab">
		  PAGINA INICIO
		  <?php
			if ($_SESSION["usuario"] != "")
				echo $_SESSION["usuario"] ;
		  ?>
		  </div>
		  
		  <div class="tab-pane fade" id="originales" role="tabpanel" aria-labelledby="profile-tab">
		    
			
			<h2>PAGINA ORIGINALES</h2>
				
  
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
			<div class="card" style="width: 18rem; height: 22rem; ">
			  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; align: center" class="card-img-top" alt="...">
			  <div class="card-body">
				<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
				 <a href="agregar_articulo.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Comprar</a>
				</h5>
				<br>
				<p class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></p>				
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
		  
		  <div class="tab-pane fade" id="colores" role="tabpanel" aria-labelledby="contact-tab">
		   PAGINA COLORES		  
		  </div>
		  <div class="tab-pane fade" id="todos" role="tabpanel" aria-labelledby="contact-tab">
		   PAGINA TODOS		  
				   
						
		  
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
					<div class="card" style="width: 18rem; height: 22rem; ">
					  <img src="arti/<?php echo $row["id"]; ?>.png" style="height:150px; width:150px; align: center" class="card-img-top" alt="...">
					  <div class="card-body">
						<h5 class="card-title" align="center"><?php echo "$".$row["precio"]; ?> 
						 <a href="carrito_compra.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Comprar</a>
						</h5>
						<br>
						<p class="card-text" align="justify"><u>Descripción</u>:<br> <?php echo $row["descripcion"]; ?></p>				
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
		  </div>
		</div>

		
	</div>
	<!-- FIN menu -->
  

    
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