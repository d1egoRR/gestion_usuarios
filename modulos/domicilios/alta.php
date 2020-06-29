<?php

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de Domicilio</title>
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<br>
	<br>

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

		    <input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
		    <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
		    <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>

	        <label>Calle:</label>
		    <input type="text" name="txtCalle">
		    <br><br> <!-- Este es un comentario -->

		    <label>Altura:</label>
		    <input type="number" name="txtAltura">
		    <br><br>

		    <label>Piso:</label>
		    <input type="text" name="txtPiso">
			<br><br> <!-- Salto de lineas -->

		    <label>Manzana:</label>
		    <input type="text" name="txtManzana">
			<br><br> <!-- Salto de lineas -->

		    <input type="submit" name="btnGuardar" value="Guardar">			

		</form>

</body>
</html>