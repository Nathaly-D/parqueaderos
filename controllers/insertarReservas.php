<?php

require_once '../class/reservas.php';

$reserva = new Reserva($_POST['fecha'], $_POST['hora'], $_POST['entrada'], $_POST['salida'], $_POST['id_vehiculo'], $_POST['id_parqueadero']);
$reserva -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarReservas.php");
exit(); // Asegura que el script se detenga después de la redirección
?>