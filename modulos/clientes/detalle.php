<?php

require_once '../../class/Cliente.php';

$id = $_GET['id'];

$cliente = Cliente::obtenerPorId($id);

//highlight_string(var_export($cliente, true));
//exit;


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

	    <a href="/programacion3/usuarios/modulos/domicilios/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
	        Agregar Domiclio
	    </a>

	<?php else:?>

		<?php echo $cliente->domicilio; ?>
		<a href="/programacion3/usuarios/modulos/domicilios/modificar.php?idDomicilio=<?php echo $cliente->domicilio->getIdDomicilio(); ?>">
		    Modificar Domicilio
		</a>

	<?php endif ?>

	<br>
	<br>

    <a href="/programacion3/usuarios/modulos/contactos/alta.php?idPersona=<?php echo $cliente->getIdPersona(); ?>&idLlamada=<?php echo $cliente->getIdCliente(); ?>&modulo=clientes">
        Agregar Contacto
    </a>

	<br>
	<br>

	<?php foreach ($cliente->arrContactos as $contacto) : ?>

		<?php echo $contacto; ?>

		<a href="/programacion3/usuarios/modulos/contactos/eliminar.php?idPersonaContacto=<?php echo $contacto->getIdPersonaContacto(); ?>">
		    Eliminar
		</a>

		<br>

	<?php endforeach ?>

	<br>
	<br>

	<a href="listado.php">Volver al Listado</a>

</body>
</html>
