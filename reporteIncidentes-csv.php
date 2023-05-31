<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT
c.nombre,
r.FechaYhora,
r.descripción
FROM
reportedeincidentes r
INNER JOIN cliente c ON
r.idCliente = c.idCliente
WHERE
r.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ReporteIncidentes.csv"');

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