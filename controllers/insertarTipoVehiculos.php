<?php

require_once '../class/TipoVehiculos.php';

$vehiculo = new Tipo($_POST['vehiculoT']);
$vehiculo -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarTipoVehiculos.php");
exit(); // Asegura que el script se detenga después de la redirección
?>