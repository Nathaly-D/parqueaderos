<?php

require_once '../class/vehiculos.php';

$vehiculo = new Vehiculo($_POST['placa'], $_POST['marca'], $_POST['modelo'], $_POST['altura'], $_POST['ancho'], $_POST['id_cliente'], $_POST['id_tipoVehiculo']);
$vehiculo -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarVehiculos.php");
exit(); // Asegura que el script se detenga después de la redirección
?>