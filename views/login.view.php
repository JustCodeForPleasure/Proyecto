<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<script src="https://use.fontawesome.com/5e636349e5.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<title>Iniciar Sesión</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesión</h1>
		
		<hr class=" border">
		
		<form  class="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="login">
			<div class="form-group">
				<i class="icono fa fa-user"></i> <input type="text" name="usuario" class="usuario" placeholder="Usuario">
			</div>

			<div class="form-group">
				<i class="icono fa fa-lock"></i> <input type="password" name="password" class="password_btn" placeholder="Contraseña">
				 <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>
		</form>

		<p class="texto-registrate">
			¿ Aun no tienes cuenta ?
			<a href="registrate.php">Registrate</a>
		</p>
	</div>
</body>
</html>