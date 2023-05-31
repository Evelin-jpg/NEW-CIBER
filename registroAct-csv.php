<?php
require('cn.php');
require('vendor/autoload.php');
  
$consulta="SELECT
c.nombre,
r.idConexion,
r.FechaYhora,
r.descAct
FROM
registroact r
INNER JOIN cliente c ON
r.idClinete = c.idCliente
WHERE
r.estatus = 1";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="RegistroAct.csv"');

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