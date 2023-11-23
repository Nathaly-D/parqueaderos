<?php

require_once '../class/vehiculos.php';
$vehiculo = Vehiculo::mostrar();

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
        <th>Placa</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Altura</th>
        <th>Ancho</th>
        <th>Cliente</th>
        <th>Tipo de Vehiculo</th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        foreach($vehiculo as $item): ?>
            <td> <?php echo $item['placa']; ?></td>
            <td> <?php echo $item['marca']; ?></td>
            <td> <?php echo $item['modelo']; ?></td>
            <td> <?php echo $item['altura']; ?></td>
            <td> <?php echo $item['ancho']; ?></td>
            <td> <?php echo $item['id_cliente']; ?></td>
            <td> <?php $item['id_tipoVehiculo'];
            switch ($item['id_tipoVehiculo']) {
                case 1:
                    echo "Moto";
                    break;
                case 2:
                    echo "Carro";
                    break;
                case 3:
                    echo "Bicicleta";
                    break;
                default:
                    echo "No se encontro Vehiculo";
                    break;
            }
            ?></td>

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