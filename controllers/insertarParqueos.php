<?php

require_once '../class/parqueos.php';

$parqueo = new Parqueo($_POST['tarifa'], $_POST['hora'], $_POST['fecha'], $_POST['salida'], $_POST['id_reserva']);
$parqueo -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarParqueos.php");
exit(); // Asegura que el script se detenga después de la redirección
?>