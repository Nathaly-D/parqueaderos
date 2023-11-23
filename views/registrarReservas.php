<?php
require_once '../class/reservas.php';
require_once '../class/vehiculos.php';
require_once '../class/parqueaderos.php';  // Asegúrate de incluir el archivo con la definición de la clase Usuario

// Obtener la lista de clientes
$vehiculos = Vehiculo::mostrar();
$parqueaderos = Parqueadero::mostrar();

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

<h2>Formulario de Registro<br> Reservas</h2>

<form action="../controllers/insertarReservas.php" method="POST">
    <label for="fecha">Fecha del Parqueo:</label>
    <input type="date" id="fecha" name="fecha" required><br>

    <label for="hora">Hora de reserva:</label>
    <input type="time" id="hora" name="hora" required><br>

    <label for="entrada">Hora de entrada:</label>
    <input type="time" id="entrada" name="entrada" required><br>

    <label for="salida">Hora de salida:</label>
    <input type="time" id="salida" name="salida" required><br>

    <label for="id_vehiculo">Vehiculo que Reserva:</label>
    <select id="id_vehiculo" name="id_vehiculo" required>
        <?php
        foreach ($vehiculos as $vehiculo) {
            echo "<option value='" . $vehiculo['id'] . "'>" . $vehiculo['placa'] . "</option>";
        }
        ?>
    </select><br>

    <label for="id_parqueadero">Parqueadero donde se reserva:</label>
    <select id="id_parqueadero" name="id_parqueadero" required>
        <?php
        foreach ($parqueaderos as $parqueadero) {
            echo "<option value='" . $parqueadero['id'] . "'>" . $parqueadero['nombre_parqueadero'] . "</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Enviar">
</form>
<button id="iniciopag" onclick="window.location.href='../index.html'">Inicio</button>

</body>
</html>