<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT * FROM vista_registroact WHERE FechaYhora BETWEEN '2023-01-12' AND '2023-04-24'";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="ReportesA.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Nombre', 'idConexion', 'Fecha Y hora', 'Descripcion'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['idConexion'],
        $rows['FechaYhora'],
        $rows['descAct'],
    ));
}

fclose($output);
exit;

    ?>