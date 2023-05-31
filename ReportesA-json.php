<?php
require('cn.php');

$consulta="SELECT * FROM vista_registroact WHERE FechaYhora BETWEEN '2023-01-12' AND '2023-04-24'";

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
header('Content-Disposition: attachment; filename="ReportesA.json"');

// Imprimir el contenido JSON
echo $jsonData;

// Cerrar la conexión a la base de datos
$conn->close();
?>