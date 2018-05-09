<?php 
session_start();
if (isset($_SESSION["correo"])) {
	require("system/enviar-correo.php");
}

?>