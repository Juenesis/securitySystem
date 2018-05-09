<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname ="empresa";
// Crear conexion
$conn = mysqli_connect($servername, $username, $password,$dbname);
// revisar conexion
if (mysqli_connect_errno()) {
 echo "failed to connect to MySQL: ".mysqli_connect_error();
} 	

$nombre=$_GET['nombre'];
$apellidos=$_GET['apellido'];
$correo=$_GET['correo'];
$comentario=$_GET['comentario'];
$sql="INSERT into comentarios(nombre,apellido,correo,comentario) VALUES ('$nombre','$apellidos','$correo','$comentario')";

$result = mysqli_query($conn,$sql);

if ($result) {
	session_start();
	$_SESSION['mensaje']="Comentario Enviado Correctamente";
	//header("location: comentarios.php");
}

?>
 