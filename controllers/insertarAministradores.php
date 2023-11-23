<?php

require_once '../class/administradores.php';

$Administrador = new Administrador($_POST['nombre'], $_POST['apellido'], $_POST['documento'], $_POST['usuario'], $_POST['clave']);
$Administrador -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarAdministradores.php");
exit(); // Asegura que el script se detenga después de la redirección
?>