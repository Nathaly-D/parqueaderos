<?php

require_once '../class/TipoVehiculos.php';
$vehiculoT = Tipo::mostrar();

?>
<!DOCTYPE html>
<html lang="es"><head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/css/styles2.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>    
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tipos de vehiculos</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        foreach($vehiculoT as $item): ?>
            <td> <?php echo $item['id']; ?></td>
            <td> <?php echo $item['vehiculoT']; ?></td>

        </tr>
        <?php endforeach;
        ?>
    </tbody>
</table>
<button id="iniciopag" onclick="window.location.href='../index.html'">Inicio</button>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="../assets/scripts/datatable.js"></script>
</html>