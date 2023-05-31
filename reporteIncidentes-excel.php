<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta="SELECT
c.nombre,
r.FechaYhora,
r.descripción
FROM
reportedeincidentes r
INNER JOIN cliente c ON
r.idCliente = c.idCliente
WHERE
r.estatus = 1";
$datos = $conn->query($consulta);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("ReporteIncidentes");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Fecha Y hora');
$hojaActiva->setCellValue('C1', 'Descripción');


$Fila = 2;

while($rows = $datos->fetch_assoc())
{
    $hojaActiva->getColumnDimension('A')->setWidth(10);
    $hojaActiva->setCellValue('A'.$Fila, $rows['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B'.$Fila, $rows['FechaYhora']);
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C'.$Fila, $rows['descripción']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReporteIncidentes.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>