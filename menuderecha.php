<style>
      #map {
        width: 200px;
        height: 400px;
        background-color: grey;
        border:2px solid black;
      }
  </style>

<div class="right-menu">
			<ul class="menu_derecha">
				<a href="maquetaciones.php"><li>Inicio</li></a>
				<a href="contacto.php"><li>Contacto</li></a>
				<a href="nosotros.php"><li>Acerca de nosotros</li></a>
				<a href="ubicacion.php"><li>Ubicación</li></a>

			</ul>
			<div id="map"></div>
		</div>

	

	<script>
      function initMap() {
        var uluru = {lat: 20.66293, lng: -105.21598};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
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