<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
	<link rel="stylesheet" type="text/css" href="css/estilopaguno.css">
	<link href='custom.css' rel='stylesheet' type='text/css'>

	<title>Inicio </title>
</head>
<body>
	<div class="contenedor">
		<?php require("header.php"); ?>
		<hr>
		<div class="row">
			<div class="col-xl-9">
				<div  style="margin-left: 20px;">
					<center><h3><p>Ubicación:</p></h3>
						<h3  style="text-align: justify;">Estamos ubicados en Calle Hidalgo s/n, Bobadilla, El Calvario, 48290 Puerto Vallarta, Jalisco, México, a espaldas de la Escuela Secundaria Técnica No.81 a una cuadra panteonera del estadio de la Bobadilla.</h3>
					</center>
					<div id="map"></div>
				</div>
			</div>
			<?php require("sidebar.php"); ?>		
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		function initMap() {
			var uluru = {lat: 20.66293, lng: -105.21598};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 18,
				center: uluru
			});
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
		}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiMFBof01g85NGvrq8dp4lSMMA9O_o8D8&callback=initMap">
</script>
<script src="custom.js"></script>
</body>
</html>