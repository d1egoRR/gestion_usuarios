<?php

require_once "../../../class/Cliente.php";

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


$cliente = new Cliente($nombre, $apellido);
$cliente->setFechaNacimiento($fechaNacimiento);
$cliente->setIdTipoDocumento($tipoDocumento);
$cliente->setNumeroDocumento($numeroDocumento);
$cliente->setCbu($cbu);

$cliente->guardar();

//highlight_string(var_export($cliente, true));

header('location: ../listado.php?mensaje=1');


?>