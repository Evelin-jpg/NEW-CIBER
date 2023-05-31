<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT * FROM vista_reportedeincidentes WHERE FechaYhora BETWEEN '2022-10-31' AND '2023-11-12'";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('ReportesI.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('idReporteDeIncidentes', $row['idReporteDeIncidentes']);
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('FechaYhora', $row['FechaYhora']);
    $xml->writeElement('descripción', $row['descripción']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="ReportesI.xml"');
readfile('ReportesI.xml');
?>