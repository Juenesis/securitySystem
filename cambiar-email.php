<?php 
session_start();
require("system/conexion.php");
$usuario=$_SESSION['usuario'];
if (!isset($_POST['enviar'])) {
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<title>Cambiar contraseña</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<section id="content">
				<form action="cambiar-email.php" method="post">
					<h1>Cambiar <br>contraseña</h1>
					<center><h3>Bienvenido <?php echo $_SESSION['usuario']; ?></h3></center>
					<div>
						<input type="password" placeholder="Contraseña" required="" id="contrasena"  name="contrasena" />
					</div>
					<div>
						<input type="password" placeholder="Confirmar Contraseña" required="" id="contrasena1" name="contrasena1" />
					</div>
					<hr>
					<div>
						<input type="submit" value="Cambiar" name="enviar" />
					</div>

				</form>
			</section>
		</div>
	</body>
	<script  src="js/index.js"></script>

	</html>
	<?php }else{
		$contra=$_POST['contrasena'];
		$contra1=$_POST['contrasena1'];
		if ($contra==$contra1) {
			$sql="UPDATE tblusuarios set password='".$contra."' where usuario='".$usuario."'";
			$result = mysqli_query($conn,$sql);
			session_destroy();
			if ($result) {
				$msg="<h1>Se ha cambiado la contraseña</h1>";
			}else{
				$msg="<h1>Error 01</h1>";
			}
		}else{
			$msg="<h1>Error: Consulte al administrador del sistema.</h1>";
		}
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="UTF-8">
			<title>Cambiar contraseña</title>
			<link rel="stylesheet" href="css/style.css">
			<meta http-equiv="Refresh" content="5;URL=login-modular.php">
		</head>
		<body>

			<div class="container">
				<section id="content">
					<form action="">
						<hr>
						<?php echo $msg;
						session_destroy();
						?>
						<h1>En unos segundos será redirigido al inicio de sesión.</h1>
					</form>
				</section>
			</div>
		</body>
		<script  src="js/index.js"></script>

		</html>

		<?php 
	} ?>