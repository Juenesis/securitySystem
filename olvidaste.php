<?php 
require("system/conexion.php");

if (!isset($_GET['enviar'])) {
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Olvidaste tu contraseña</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<section id="content">
				<h1>Recuperación de contraseña:</h1>
				<form method="get" action="olvidaste.php" class="">
					<input type="email" placeholder="Correo Electrónico*" name="email" class="form-control" id="correo">
					<input type="text" placeholder="Usuario*" name="usuario" class="form-control" id="usuario" >
					<hr>
					<center><input type="submit" name="enviar" value="Enviar" class="btn btn-primary"></center>
				</form>
			</section>
		</div>
	</body>
	</html>
	
	<?php
} else if(isset($_GET["enviar"])){
	if ($_GET['email']!='' && $_GET['usuario']!='') {
		$email=$_GET['email'];
		$usuario=$_GET['usuario'];

		$sql="SELECT usuario,correo from tblusuarios inner join tblcorreos on tblcorreos.id=tblusuarios.id where usuario='$usuario' and correo='$email'";


		$result=mysqli_query($conn,$sql);
		if ($result) {
			session_start();
			$_SESSION["correo"]=$email;
			$_SESSION["usuario"]=$usuario;
			header("location:enviar-email.php");
		}
		
		//SI se puso email pero no usuario:
	}else if($_GET['email']!='' and $_GET['usuario']==''){
		$email=$_GET['email'];
		

		$sql="SELECT correo from tblcorreos where correo='$email'";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			session_start();
			$_SESSION["correo"]=$email;
			//$_SESSION["usuario"]=$usuario;
			$sql = "SELECT tblusuarios.id,usuario  from tblcorreos inner join tblusuarios on tblusuarios_id = tblusuarios.id where correo = '$email'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			$_SESSION['usuario'] = $row['usuario'];
			header("location:enviar-email.php");
		}

		//si se puso usuario pero no email

	}else if($_GET['email']=='' and $_GET['usuario']!=''){
		//$email=$_GET['email'];
		$usuario=$_GET['usuario'];

		$sql="SELECT usuario from tblusuarios where usuario='$usuario'";
		$result=mysqli_query($conn,$sql);
		if ($result) {
			session_start();	
			$_SESSION["usuario"]=$usuario;
			$sql = "SELECT tblusuarios.id,correo  from tblcorreos inner join tblusuarios on tblusuarios_id = tblusuarios.id where usuario = '$usuario'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			$_SESSION['correo'] = $row['correo'];
			header("location:enviar-email.php");
		}
	}else if($_GET['email'] == '' and $_GET['usuario']==''){
		?>
			<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">

		<title>Olvidaste tu contraseña</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<section id="content">
				<h1 style="color: red;">Debes llenar almenos un campo</h1>
				<h1>Recuperación de contraseña:</h1>
				<form method="get" action="olvidaste.php" class="">
					<input type="email" placeholder="Correo Electrónico*" name="email" class="form-control" id="correo">
					<input type="text" placeholder="Usuario*" name="usuario" class="form-control" id="usuario" >
					<hr>
					<center><input type="submit" name="enviar" value="Enviar" class="btn btn-primary"></center>
				</form>
			</section>
		</div>
	</body>
	</html>


		<?php
	}
	

} ?>