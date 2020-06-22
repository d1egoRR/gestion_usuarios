<?php

require_once '../../class/Cliente.php';
require_once '../../class/TipoDocumento.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

$listadoTipoDocumento = TipoDocumento::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Clientes</title>
</head>
<body>

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $cliente->getIdCliente(); ?>">

	        <label>Nombre:</label>
		    <input type="text" name="txtNombre" value="<?php echo $cliente->getNombre(); ?>">
		    <br><br> <!-- Este es un comentario -->

		    <label>Apellido:</label>
		    <input type="text" name="txtApellido" value="<?php echo $cliente->getApellido(); ?>">
		    <br><br>

		    <label>Fecha Nacimiento:</label>
		    <input type="date" name="txtFechaNacimiento" value="<?php echo $cliente->getFechaNacimiento(); ?>">
			<br><br> <!-- Salto de lineas -->

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento">
			    <option value="0">Seleccionar</option>

				<?php
				foreach ($listadoTipoDocumento as $tipoDocumento):
					$selected = '';
					if ($cliente->getIdTipoDocumento() == $tipoDocumento->getIdTipoDocumento()) {
						$selected = "SELECTED";
					}
				?>

					<option value="<?php echo $tipoDocumento->getIdTipoDocumento(); ?>" <?php echo $selected; ?>>
					    <?php echo $tipoDocumento; ?>
					</option>

				<?php endforeach ?>

			</select>
			<br><br> <!-- Salto de lineas -->

		    <label>Numero Documento:</label>
		    <input type="text" name="txtNumeroDocumento" value="<?php echo $cliente->getNumeroDocumento(); ?>">
			<br><br> <!-- Salto de lineas -->

		    <label>CBU:</label>
		    <input type="text" name="txtCbu" value="<?php echo $cliente->getCbu(); ?>">
			<br><br> <!-- Salto de lineas -->

		    <input type="submit" name="btnGuardar" value="Actualizar">			

		</form>

</body>
</html>