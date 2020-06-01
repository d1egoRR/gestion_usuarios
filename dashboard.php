<?php

session_start();

$usuario = $_SESSION['usuario'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    BIENVENIDO AL DASHBOARD
    <!--BIENVENIDO <?php echo $usuario->getUsername() ?>-->
</body>
</html>