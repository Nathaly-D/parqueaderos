<?php

require_once '../class/parqueaderos.php';

$parqueadero = new Parqueadero($_POST['nombre_parqueadero'], $_POST['ubicacion_parqueadero'], $_POST['cupos_parqueadero'], $_POST['horario_parqueadero'], $_POST['id_administrador']);
$parqueadero -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarParqueaderos.php");
exit(); // Asegura que el script se detenga después de la redirección
?>