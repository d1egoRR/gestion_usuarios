<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

	<?php echo $cliente; ?>
	<br>
	<?php echo $cliente->getNumeroDocumento(); ?>
	<br>
	<?php echo $cliente->getFechaNacimiento(); ?>
	<br>
	<br>
	<br>

	<a href="listado.php">Volver al Listado</a>

</body>
</html>