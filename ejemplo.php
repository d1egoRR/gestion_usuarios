<?php

require_once "class/Cliente.php";


$cliente = Cliente::obtenerPorId(5);


$cliente->setNombre('Carlos');
$cliente->setApellido('Pare');
$cliente->setNumeroDocumento(123456);
$cliente->setCbu(454545);
$cliente->actualizar();

?>
