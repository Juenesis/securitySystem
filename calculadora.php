<?php 

	if (isset($_GET['enviar'])) {
		if ($_GET['valuno']!="" and $_GET['valdos']!="") {
			$operador=$_GET['operador'];
			$valuno=$_GET['valuno'];
			$valdos=$_GET['valdos'];

			if ($operador=="suma") {
				$resultado=$valuno+$valdos;
			}else if ($operador=="resta") {
				$resultado=$valuno-$valdos;
			}else if($operador=="multiplicacion"){
				$resultado=$valuno*$valdos;
			}else if ($operador=="division") {
				$resultado=$valuno/$valdos;
			}
			$msg="<br>El resultado es: ".$resultado;

		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php print($msg) ?></h1>
				<form class="form" action="calculadora.php" method="get">
					<select name="operador">

						<option value="suma">Suma</option>
						<option value="resta">Resta</option>
						<option value="multiplicacion">Multiplicación</option>
						<option value="division">División</option>
					</select>
					<br>
					Ingresa el primer valor: 
					<input type="number" min="0" name="valuno">
					<br>
					Ingresa el segundo valor: 
					<input type="number" min="0" name="valdos">
					<br>
					<input type="submit" name="enviar" value="Calcular">
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php  		

	}else{
		?>
		<!DOCTYPE html>
<html>
<head>
	<title>Calculadora</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="form" action="calculadora.php" method="get">
					<select name="operador">
						<option value="suma">Suma</option>
						<option value="resta">Resta</option>
						<option value="multiplicacion">Multiplicación</option>
						<option value="division">División</option>
					</select>
					<br>
					Ingresa el primer valor: 
					<input type="number" min="0" name="valuno">
					<br>
					Ingresa el segundo valor: 
					<input type="number" min="0" name="valdos">
					<br>
					<input type="submit" name="enviar" value="Calcular">
				</form>
			</div>
		</div>
	</div>
</body>
</html>

		<?php
	}


 ?>