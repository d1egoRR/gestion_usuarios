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


<a href="/programacion3/usuarios/modulos/clientes/listado.php">Clientes</a>
| 
<a href="/programacion3/usuarios/modulos/empleados/listado.php">Empleados</a>
| 
<a href="/programacion3/usuarios/modulos/usuarios/listado.php">Usuarios</a>
|
<?php echo $usuario ?> 
|
<a href="/programacion3/usuarios/logout.php">Salir</a>

</body>
</html>