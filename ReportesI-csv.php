<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT * FROM vista_reportedeincidentes WHERE FechaYhora BETWEEN '2022-10-31' AND '2023-11-12'";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ReportesI.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Fecha Y hora', 'Descripcion'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['FechaYhora'],
        $rows['descripción'],
    ));
}

fclose($output);
exit;

    ?>