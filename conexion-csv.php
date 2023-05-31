<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT
cl.nombre,
e.equipo,
c.FechaInicio,
c.FechaCierre
FROM
conexion c
JOIN cliente cl ON
c.idClinete = cl.idCliente
JOIN equipo e ON
c.idEquipo = e.idEquipo
WHERE
c.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Conexion.csv"');

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