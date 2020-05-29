<?php

require_once '../../class/Cliente.php';

const SIN_ACCION = 0;
const CLIENTE_GUARDADO = 1;
const CLIENTE_MODIFICADO = 2;
const CLIENTE_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoClientes = Cliente::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Clientes</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

	<a href="alta.php">Agregar Nuevo</a>
	<br><br>

	<?php if ($mensaje == CLIENTE_GUARDADO): ?>
		<h3>Cliente Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == CLIENTE_MODIFICADO): ?>
		<h3>Cliente Modificado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>CBU</th>
			<th>Acciones</th>
		</tr>

		<?php foreach ($listadoClientes as $cliente): ?>

			<tr>
				<td> <?php echo $cliente->getNombre(); ?> </td>
				<td> <?php echo $cliente->getApellido(); ?> </td>
				<td> <?php echo $cliente->getCbu(); ?> </td>
				<td>
					<a href="detalle.php?id=<?php echo $cliente->getIdCliente(); ?>">Ver Detalle</a>
					- 
					<a href="modificar.php?id=<?php echo $cliente->getIdCliente(); ?>">
						<img src="../../imagenes/iconos/update.png" title="Modificar Cliente">
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>

</body>
</html>