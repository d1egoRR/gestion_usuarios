<?php

require_once "../../../class/Usuario.php";


$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];


$x = Usuario::login($username, $password);



if ($x) {
	//session_start();
	header("location: ../../../dashboard.php");
} else {
	header("location: ../../../formulario_login.php");
}



// $usuario = Usuario::login($username, $password);
/*
if ($usuario->estaLogueado()) {
	session_start();
	$_SESSION['usuario'] = $usuario;
	ir al dashboard
} else {
	ir al formulario
}
*/

?>