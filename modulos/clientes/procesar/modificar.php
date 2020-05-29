<?php

require_once "../../../class/Cliente.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$cbu = $_POST['txtCbu'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	exit;
}


//$cliente = new Cliente($nombre, $apellido);
$cliente = Cliente::obtenerPorId($id);
$cliente->setNombre($nombre);
$cliente->setApellido($apellido);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setIdTipoDocumento($tipoDocumento);
$cliente->setNumeroDocumento($numeroDocumento);
$cliente->setCbu($cbu);

$cliente->actualizar();

//highlight_string(var_export($cliente, true));

header('location: ../listado.php?mensaje=2');



?>