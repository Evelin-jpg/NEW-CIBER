<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT
`e`.`idEquipo`,
`u`.`nombre`,
`e`.`equipo`,
`e`.`SistemaOperativo`,
`e`.`DireccionIP`
FROM
`equipo` `e`
INNER JOIN `usuario` `u` ON
`e`.`idUsuario` = `u`.`idUsuario`
WHERE
`e`.`estatus` = 1";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Equipo.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('idEquipo', $row['idEquipo']);
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('equipo', $row['equipo']);
    $xml->writeElement('SistemaOperativo', $row['SistemaOperativo']);
    $xml->writeElement('DireccionIP', $row['DireccionIP']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Equipo.xml"');
readfile('Equipo.xml');
?>