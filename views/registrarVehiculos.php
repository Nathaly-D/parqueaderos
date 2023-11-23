<?php
require_once '../class/clientes.php';
require_once '../class/tipoVehiculos.php';  // Asegúrate de incluir el archivo con la definición de la clase Usuario

// Obtener la lista de clientes
$clientes = Cliente::mostrar();
$vehiculosT = Tipo::mostrar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<h2>Formulario de Registro <br> Vehiculos</h2>

<form action="../controllers/insertarVehiculos.php" method="POST">
    <label for="placa">Placa:</label>
    <input type="text" id="placa" name="placa" required><br>

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca" required><br>

    <label for="modelo">Modelo:</label>
    <input type="text" id="modelo" name="modelo" required><br>

    <label for="altura">Altura:</label>
    <input type="text" id="altura" name="altura" required><br>

    <label for="ancho">Ancho:</label>
    <input type="text" id="ancho" name="ancho" required><br>

    <label for="id_cliente">Cliente:</label>
    <select id="id_cliente" name="id_cliente" required>
        <?php
        foreach ($clientes as $cliente) {
            echo "<option value='" . $cliente['id'] . "'>" . $cliente['nombre'] . "</option>";
        }
        ?>
    </select><br>

    <label for="id_tipoVehiculo">Tipo de Vehiculo:</label>
    <select id="id_tipoVehiculo" name="id_tipoVehiculo" required>
        <?php
        foreach ($vehiculosT as $vehiculoT) {
            echo "<option value='" . $vehiculoT['id'] . "'>" . $vehiculoT['vehiculoT'] . "</option>";
        }
        ?>
    </select><br>
    

    <input type="submit" value="Enviar">
</form>

<button id="iniciopag" onclick="window.location.href='../index.html'">Inicio</button>

</body>
</html>