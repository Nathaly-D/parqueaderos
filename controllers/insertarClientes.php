<?php

require_once '../class/clientes.php';

$cliente = new Cliente($_POST['nombre'], $_POST['apellido'], $_POST['documento'], $_POST['usuario'], $_POST['clave'], $_POST['telefono']);
$cliente -> guardar();
// Redirige a otra_vista.php
header("Location: ../views/mostrarClientes.php");
exit(); // Asegura que el script se detenga después de la redirección
?>


