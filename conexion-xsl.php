<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT
c.idConexion,
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

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Conexion.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('idConexion', $row['idConexion']);
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('equipo', $row['equipo']);
    $xml->writeElement('FechaInicio', $row['FechaInicio']);
    $xml->writeElement('FechaCierre', $row['FechaCierre']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();



// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Conexion.xml"');
readfile('Conexion.xml');
?>