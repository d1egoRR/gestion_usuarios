<?php

require_once "../../../class/Domicilio.php";;

$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$modulo = $_POST['txtModulo'];
$calle = $_POST['txtCalle'];
$altura = $_POST['txtAltura'];
$piso = $_POST['txtPiso'];
$manzana = $_POST['txtManzana'];


$domicilio = new Domicilio();
$domicilio->setCalle($calle);
$domicilio->setAltura($altura);
$domicilio->setPiso($piso);
$domicilio->setManzana($manzana);
$domicilio->setIdPersona($idPersona);

$domicilio->guardar();

// redireccionar



header("location: /programacion3/usuarios/modulos/$modulo/detalle.php?id=$idLlamada");


?>
