<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT
u.nombre,
e.equipo,
e.SistemaOperativo,
e.DireccionIP
FROM
equipo e
INNER JOIN usuario u ON
e.idUsuario = u.idUsuario
WHERE
e.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Equipo.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'Equipo', 'Sistema Operativo', 'DireccionIP'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['equipo'],
        $rows['SistemaOperativo'],
        $rows['DireccionIP'],
    ));
}

fclose($output);
exit;

    ?>