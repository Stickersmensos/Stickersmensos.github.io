<?php
	session_start();
	if( isset( $_POST["nombre"] ) ){
     
	 
	 // Guardar a la BD los datos del nuevo usuario
	 
	 // 1. Conectarte a la BD
	 $mysqli = new mysqli('localhost', 'root', '', 'stickersmensos');
	 
	 // 2. Crear el SQL para INSERTAR el nuevo usuario|
	 
	 $res= $mysqli->query(" INSERT INTO cliente VALUES ('',". $_POST["tel"] .",'". $_POST["nombre"] ."','". $_POST["apellidos"] ."','". $_POST["dir"] ."','". $_POST["email"] ."','". $_POST["contra"] ."' ); ");
  }
  
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sty.css">


    <title>REGISTRO EN STICKERSMENSOS</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light NAVBACK">
      <div class="container" width="70%">
        <a class="navbar-brand" href="index.php">
          <img src="img/logoSt.png" width="50%" align="align-middle">
        </a>
    
      </div>
    </nav>
	<br><br><br>
	<div class="d-flex justify-content-center OTROBACK position-absolute top-50 start-50 translate-middle">
	  <div>
	  
	  <?php
		if( ! isset( $_GET["nuevoregistro"] ) ) {
	  ?>
	  
		  <h1 align="center">¡INICIA TU SESION!</h1>
		  <br>

			<form class="row g-3" method="POST" action="login.php" align="center" name="login">
			  <div class="col-md-12">
				<label for="correo" class="form-label">Usuario (Correo electronico)</label>
				<input type="text" class="form-control" name="correo">
			  </div>
			  
			  <div class="col-md-12">
				<label for="contrasena" class="form-label">Contrasena</label>
				<input type="password" class="form-control" name="contrasena">
			  </div>

			  <div class="col-12 d-flex">
					<div class="p-2">
						<button type="submit" class="btn btn-info">ENVIAR</button>
					</div>
					<div class="p-2 ml-auto">
						<a href="?nuevoregistro=1" type="button" class="btn btn-primary">QUIERO REGISTRARME!</a>
					</div>
					<?php
					
						if (isset($_SESSION["usuario"])) {
					
					?>
						<div class="p-2 ml-auto">
							<a href="logout.php" type="button" class="btn btn-danger">ABANDONAR SESIÓN</a>
						</div>
					<?php
						}
					  ?>
			  </div>			  
			  
			</form>
	
	  <?php
	    } else {	 // Verifica que sea el LOGIN  o  REGISTRO
	  ?>
	
		  <h1 align="center">¡PROPORCIONA TUS DATOS PARA REGISTRARTE!</h1>
		  <br>	
		
			<form class="row g-3" method="POST" action="registro_usuario.php" align="center" name="registro">
			  <div class="col-md-6">
				<label for="tel" class="form-label">Número telefónico</label>
				<input class="form-control" id="tel" name="tel" type="text" maxlength="10">
			  </div>
			  
			  <div class="col-md-6">
				<label for="nombre" class="form-label">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre">
			  </div>
			  
			  <div class="col-md-6">
				<label for="apellidos" class="form-label">Apellidos</label>
				<input type="text" class="form-control" id="apellidos" name="apellidos">
			  </div>
			  
			  <div class="col-md-6">
				<label for="dir" class="form-label">Dirección</label>
				<input type="text" class="form-control" id="dir" name="dir">
			  </div>
			  
			  <div class="col-md-6">
				<label for="email" class="form-label">Correo electronico</label>
				<input type="email" class="form-control" id="email"  name="email">
			  </div>
			  
			  <div class="col-md-6">
				<label for="contra" class="form-label">Password</label>
				<input type="password" class="form-control" id="contra"  name="contra">
			  </div>
			  <div class="col-12 d-flex">
					<div class="p-2">
						<button type="submit" class="btn btn-info">ENVIAR</button>
					</div>
					<div class="p-2 ml-auto">
						<a href="?" type="button" class="btn btn-primary">YA ME REGISTRÉ</a>
					</div>
					<?php
					
						if (isset($_SESSION["usuario"])) {
					
					?>
						<div class="p-2 ml-auto">
							<a href="logout.php" type="button" class="btn btn-danger">ABANDONAR SESIÓN</a>
						</div>
					<?php
						}
					  ?>
			  </div>
			</form>
			
	  <?php
	    } // Fin del Verificar que sea el LOGIN  o  REGISTRO
	  ?>
			
	  </div>  
	  
	</div>
  <br><br><br>
  </body>
</html>