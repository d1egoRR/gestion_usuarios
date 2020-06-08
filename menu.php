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

	<?php foreach ($usuario->perfil->getModulos() as $modulo): ?>

		<a href="/programacion3/usuarios/modulos/<?php echo $modulo->getDirectorio() ?>/listado.php">
			<?php echo $modulo ?>
		</a>
		|

	<?php endforeach ?>

	<?php echo $usuario ?>
	|
	<a href="logout.php">Salir</a>
 

</body>
</html>