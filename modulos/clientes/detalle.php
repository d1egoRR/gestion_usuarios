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
	<br><br>

	<?php

	/*
	si cliente no tiene domicilio
	   permitir agregar nuevo domicilio
	sino
	   mostrar lo que ya tiene
	   permitir modificar
	fin si
	*/

	if (is_null($cliente->domicilio)) : ?>
	    <a href="/programacion3/usuarios/modulos/domicilios/alta.php?id_persona=<?php echo $cliente->getIdPersona(); ?>">
	        Agregar Domiclio
	    </a>

	<?php else:?>

		<?php echo $cliente->domicilio; ?>
		<a href="/programacion3/usuarios/modulos/domicilios/modificar.php?id_domicilio=<?php echo $cliente->domicilio->getIdDomicilio(); ?>">
		    Modificar Domicilio
		</a>

	<?php endif ?>

	<br>
	<br>
	<br>

	<a href="listado.php">Volver al Listado</a>

</body>
</html>