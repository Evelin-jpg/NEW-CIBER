<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT * FROM vista_conexion WHERE FechaInicio BETWEEN '2023-01-01 23:59' AND '2023-05-31'";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ReportesC.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Equipo', 'Fecha de Inicio', 'Fecha de Cierre'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['equipo'],
        $rows['FechaInicio'],
        $rows['FechaCierre'],
    ));
}

fclose($output);
exit;

    ?>