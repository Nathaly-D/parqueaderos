<?php
require_once '../class/administradores.php'; 
// Obtener la lista de clientes
$administradores = Administrador::mostrar();

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

<h2>Formulario de Registro<br>Parqueaderos</h2>

<form action="../controllers/insertarParqueaderos.php" method="POST">
    <label for="nombre_parqueadero">Nombre del parqueadero:</label>
    <input type="text" id="nombre_parqueadero" name="nombre_parqueadero" required><br>

    <label for="ubicacion_parqueadero">Ubicación del Parqueadero:</label>
    <input type="text" id="ubicacion_parqueadero" name="ubicacion_parqueadero" required><br>

    <label for="cupos_parqueadero">Cupos Disponibles:</label>
    <input type="text" id="cupos_parqueadero" name="cupos_parqueadero" required><br>

    <label for="horario_parqueadero">Horario del Parqueadero:</label>
    <input type="text" id="horario_parqueadero" name="horario_parqueadero" required><br>

    <label for="id_administrador">Dueño de Parqueadero:</label>
    <select id="id_administrador" name="id_administrador" required>
        <?php
        foreach ($administradores as $administrador) {
            echo "<option value='" . $administrador['id'] . "'>" . $administrador['nombre'] . "</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Enviar">
</form>
<button id="iniciopag" onclick="window.location.href='../index.html'">Inicio</button>

</body>
</html>