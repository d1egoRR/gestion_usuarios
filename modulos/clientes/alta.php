<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Cliente</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

	        <label>Nombre:</label>
		    <input type="text" name="txtNombre">
		    <br><br> <!-- Este es un comentario -->

		    <label>Apellido:</label>
		    <input type="text" name="txtApellido">
		    <br><br>

		    <label>Fecha Nacimiento:</label>
		    <input type="date" name="txtFechaNacimiento">
			<br><br> <!-- Salto de lineas -->

			<label>Tipo Documento: </label>
			<select name="cboTipoDocumento">
			    <option value="0">Seleccionar</option>
			</select>
			<br><br> <!-- Salto de lineas -->

		    <label>Numero Documento:</label>
		    <input type="text" name="txtNumeroDocumento">
			<br><br> <!-- Salto de lineas -->

		    <label>CBU:</label>
		    <input type="text" name="txtCbu">
			<br><br> <!-- Salto de lineas -->

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</body>
</html>