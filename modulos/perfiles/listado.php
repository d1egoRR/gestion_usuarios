<?php

require_once '../../class/Perfil.php';

$listadoPerfiles = Perfil::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Perfiles</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Descripcion</th>
			<th>Acciones</th>
		</tr>

		<?php foreach ($listadoPerfiles as $perfil): ?>

			<tr>
				<td> <?php echo $perfil->getIdPerfil(); ?> </td>
				<td> <?php echo $perfil->getDescripcion(); ?> </td>
				<td>
					<a href="detalle.php?id=<?php echo $perfil->getIdPerfil(); ?>">Ver Detalle</a>
					- 
					<a href="modificar.php?id=<?php echo $perfil->getIdPerfil(); ?>">
						Modificar
					</a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>

</body>
</html>