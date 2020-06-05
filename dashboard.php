<?php

session_start();

if (!isset($_SESSION['estaLogueado'])) {
	header('location: formulario_login.php');
}


$id_usuario = $_SESSION['id_usuario'];
$username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    BIENVENIDO <?php echo $username ?>

    <br>
    <a href="logout.php">Salir</a>
</body>
</html>