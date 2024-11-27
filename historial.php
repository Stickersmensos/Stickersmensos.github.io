<?php
	session_start(); 	
	$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
	
	$ex = $_SESSION["id_cliente"];
	$resultado = $mysqli->query("SELECT * FROM historial_compras WHERE id_cliente = ".$ex); // WHERE id=4

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sty.css">


    <title>STICKERSMENSOS</title>
  </head>
  <body>
		</nav>
		<nav class="navbar navbar-expand-lg navbar-light NAVBACK">
		  <div class="container" width="60%">
		    <a class="navbar-brand" href="index.php">
		     	<img src="img/logoSt.png" width="100%" align="left">
		    </a>
			<nav class="navbar navbar-light">
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
			<table class="table table-hover">
		  <thead class="MIDBACK">
			<tr>
			  <th scope="col">No. Orden</th>
			  <th scope="col">Descripción del producto</th>
			  <th scope="col">Cantidad</th>
			  <th scope="col">Precio</th>
			  <th scope="col">Fecha</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
				foreach ($resultado as $row) 
				{
					
					$prodinfo = $mysqli->query("SELECT descripcion, precio FROM producto WHERE id = ".$row["id_producto"]);
					$prod = $prodinfo->fetch_assoc();
			?>
			<tr>
			  <th scope="row" width="20%"><?php echo $row["clave_compra"];?></th>
			  <td width="50%"><?php echo $prod["descripcion"];?></td>
			  <td width="10%"><?php echo $row["cantidad"];?></td>
			  <td><?php echo "$".$prod["precio"];?></td>
			  <td><?php echo $row["fecha"];?></td>
			</tr>
			<?php
				}
			?>
		  </tbody>
		</table>
	</body>
</html>
