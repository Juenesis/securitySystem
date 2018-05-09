<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Inicio de sesión</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="system/inicio.php" method="post">
				<h1>Inicio de sesión</h1>
				<div>
					<input type="text" placeholder="Usuario" required="" id="username"  name="user" />
				</div>
				<div>
					<input type="password" placeholder="Contraseña" required="" id="password" name="pass" />
				</div>
				<hr>
				<div>
					<input type="submit" value="Iniciar sesión" name="enviar" />
				</div>
				<div>
					<a href="olvidaste.php">Olvidaste tu contraseña?</a>
				</div>
			</form>
		</section>
	</div>
</body>
<script  src="js/index.js"></script>

</html>
