<?php
require_once '../class/parqueos.php';
require_once '../class/reservas.php';  // Asegúrate de incluir el archivo con la definición de la clase Usuario

// Obtener la lista de clientes
$reservas = Reserva::mostrar();

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

<h2>Formulario de Registro<br> Parqueos</h2>

<form action="../controllers/insertarParqueos.php" method="POST">
    <label for="tarifa">Tarifa:</label>
    <input type="text" id="tarifa" name="tarifa" required><br>

    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora" required><br>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required><br>

    <label for="salida">Salida:</label>
    <input type="time" id="salida" name="salida" required><br>

    <label for="id_reserva">Reserva:</label>
    <select id="id_reserva" name="id_reserva" required>
        <?php
        foreach ($reservas as $reserva) {
            echo "<option value='" . $reserva['id'] . "'>" . $reserva['id_vehiculo'] . "</option>";
        }
        ?>
    </select><br>   

    <input type="submit" value="Enviar">
</form>
<button id="iniciopag" onclick="window.location.href='../index.html'">Inicio</button>

</body>
</html>