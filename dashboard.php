<?php

require_once "class/Usuario.php";

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuario = $_SESSION['usuario'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    BIENVENIDO <?php echo $usuario ?>

    <br>
    <a href="logout.php">Salir</a>
</body>
</html>