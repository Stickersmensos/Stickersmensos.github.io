<?php
	session_start(); 
	
	$mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
	
	// Verifica si existe el CARRITO, sino redirecciona a ERROR
	if ( ! isset( $_SESSION["carrito"] ) ) {
		echo '<script>window.location.href = "error2.html";</script>';
		exit;
	}
	if ( ! isset( $_SESSION["id_cliente"] ) ) {
		echo '<script>window.location.href = "error3.php";</script>';
		exit;
	}
	// Sacamos IDs / Keys almacenados en el Carrito de compras	 
	$articulos= array_keys( $_SESSION["carrito"] ); //
	    
	if( count($articulos) == 0) {
		echo '<script>window.location.href = "error2.html";</script>';
	} else {
		// CORRECTO, hay elementos en la sesion
			    
	    // Generar la consulta con los IDs como conjunto 
	    $art_carrito= "SELECT * FROM producto WHERE id IN( ". implode(",",$articulos ) ." );"; 
	
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
	  <br>
	  <div class="containter d-flex flex-column bd-highlight mb-3"> 
	  
	  </div>
	  <div class="container px-3 my-5 clearfix">
    <div class="card">
        <div class="card-header NAVBACK">
            <h2>Mi carrito</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0" style="width:100% ; table-layout: fixed;">
                <thead>
                  <tr>
					<th class="text-center py-3 px-4" style="min-width: 10px;"></th>
                    <th class="text-center py-3 px-4" style="min-width: 350px;">Stickers en el carrito</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Precio</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Cantidad</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
				
				<?php 
					// Imprime detalles de todos los articulos almacenados en la sesion			
					$resultado = $mysqli->query( $art_carrito ); 
					$i = 1;
					$TOT = 0;
					foreach ($resultado as $row) {
				?>
				<tr>
					<td class="text-right font-weight-semibold align-middle p-4" >
					  <img src="arti/<?php echo $row['id']; ?>.png" style="height:50%; width:50%;">
					</td>
                    <td class="p-4" >
                      <div class="media align-items-center " >
                        <div class="media-body ">
                          <a class="d-block text-dark"><?php echo $row['descripcion']; ?></a>
                          <small>
                            <span class="text-muted">Categorías: <?php echo $row['categorias']; ?></span>
                            <span class="text-muted">Creador: <?php echo $row['creador']; ?> </span>&nbsp;
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4"> <?php echo $row['precio']; ?> </td>
                    <td class="align-middle p-4">
						<input type="text" class="form-control text-center" value="<?php echo $_SESSION["carrito"][$row['id']];?>">
					</td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo round($_SESSION["carrito"][$row['id']]*$row['precio']); ?></td>
                    <td class="text-center align-middle px-0">
						<a href="eliminar_carrito.php?id=<?php echo $row["id"]; ?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a>
					</td>
                  </tr>
				  <?php 
				  $TOT = round($_SESSION["carrito"][$row['id']]*$row['precio']) + $TOT; 
				  ?>
				<?php 
					}
				?>
                </tbody>
              </table>
            </div>        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">

              </div>
              <div class="d-flex">

                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Precio total</label>
                  <div class="text-large"><strong><?php echo "$".$TOT;?></strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3"><a href="index.php" style="text-decoration: none;">Volver</a></button>
              <a href="hacer_compra.php" class="btn btn-lg btn-primary mt-2">Comprar</a>
			  <a href="historial.php" class="btn btn-lg btn-secondary mt-2">Ver mi historial de compras</a>
            </div>
        
          </div>
      </div>
  </div>

	  </body>

</html>
  
  <?php
	} // Verifica que hay articulos en la SESSION
  ?>
  
