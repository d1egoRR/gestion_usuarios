<?php

require_once "../../../class/Usuario.php";


$username = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];


$x = Usuario::login($username, $password);

if ($x) {
	header("location: ../../../dashboard.php");
} else {
	header("location: ../../../formulario_login.php");
}

/*
if ($x esta logueado) {
	ir al dashboard
} else {
	ir al formulario
}
*/

?>