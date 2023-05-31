<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT * FROM vista_registroact WHERE FechaYhora BETWEEN '2023-01-12' AND '2023-04-24'";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('ReportesA.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('idRegistroAct', $row['idRegistroAct']);
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('idConexion', $row['idConexion']);
    $xml->writeElement('FechaYhora', $row['FechaYhora']);
    $xml->writeElement('descAct', $row['descAct']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="ReportesA.xml"');
readfile('ReportesA.xml');
?>