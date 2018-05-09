<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Comentarios</title>
	<link rel="stylesheet" href="css/bootstrap">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form method="get" id="comentarios" class="forma-group" action="enviar-comentarios.php">
					
					<label class="form-control">
						<label class="form-control"><h1>Comentarios</h1></label>
					</label>
					<hr>
					<label>Nombre:
						<input type="text" name="nombre" placeholder="Nombre/s">
					</label>
					<label>Apellido:
						<input type="text" name="apellido" placeholder="Apellidos">
					</label>
					<label>Correo:
						<input type="email" name="correo" placeholder="Correo">
					</label>
					<label>Comentario:
						
						<input type="text" name="comentario" class="btn btn.-" placeholder="Escriba sus comentarios aquí.">
					</label>
				</form>
			</div>
		</div>
	</div>
</body>
</html>