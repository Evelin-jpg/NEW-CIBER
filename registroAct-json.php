<?php
require('cn.php');

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

$resultado = $conn->query($consulta);

// Obtener los datos de la consulta como un array
$cliente = array();
while ($row = $resultado->fetch_assoc()) {
    $cliente[] = $row;
}

// Generar el archivo JSON
$jsonData = json_encode($cliente, JSON_PRETTY_PRINT);

// Establecer los encabezados de la respuesta HTTP
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="RegistroAct.json"');

// Imprimir el contenido JSON
echo $jsonData;

// Cerrar la conexión a la base de datos
$conn->close();
?>