<?php
function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
	$source = 'abcdefghijklmnopqrstuvwxyz';
	if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	if($n==1) $source .= '1234567890';
	if($sc==1) $source .= '|@#~$%()=^*+&#91;&#93;{}-_';
	if($length>0){
		$rstr = "";
		$source = str_split($source,1);
		for($i=1; $i<=$length; $i++){
			mt_srand((double)microtime() * 1000000);
			$num = mt_rand(1,count($source));
			$rstr .= $source[$num-1];
		}

	}
	return $rstr;
}
$aleatorio = RandomString(7);
require_once ('PHPMailer/class.phpmailer.php');
require("system/conexion.php");
session_start();

$_SESSION['aleatorio']=$aleatorio;
$Mail = new PHPMailer();
$Mail->IsSMTP();
$Mail->Host = 'smtp.gmail.com';
//$Mail->SMTPDebug = 2; //no olvides quitar el debug
$Mail->SMTPAuth = true;
$Mail->SMTPSecure = 'ssl';
$Mail->Port = 465;
$Mail->Username = 'esteesuncorreo123@gmail.com';
$Mail->Password = 'juan18061996';
$Mail->Priority = 1;
$Mail->CharSet = 'UTF-8';
$Mail->Encoding = '8bit';
$Mail->Subject ="Código de recuperación";
$Mail->ContentType = 'text/html; charset=utf-8\r\n';
$Mail->FromName = 'Código de recuperación';
$Mail->WordWrap = 900;
$Mail->AddAddress($_SESSION['correo']);
$Mail->isHTML(TRUE);
$Mail->Body = "<label>Su código de recuperación es:$aleatorio</label>";
$Mail->Send();
$Mail->SmtpClose();


if ($Mail->IsError()) {
	echo "<h1>Error: consulte al administrador del sistema.<br></h1>";
	echo "<h1><a href='olvidaste.php'>Volver</a></h1>";
} else {
	header("Location: system/nuevo-password.php");
}

?>