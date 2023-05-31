<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
 
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

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("Conexion");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Equipo');
$hojaActiva->setCellValue('C1', 'Fecha de Inicio');
$hojaActiva->setCellValue('D1', 'Fecha de Cierre');


$Fila = 2;

while($rows = $datos->fetch_assoc())
{
    $hojaActiva->getColumnDimension('A')->setWidth(10);
    $hojaActiva->setCellValue('A'.$Fila, $rows['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B'.$Fila, $rows['equipo']);
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C'.$Fila, $rows['FechaInicio']);
    $hojaActiva->getColumnDimension('D')->setWidth(10);
    $hojaActiva->setCellValue('D'.$Fila, $rows['FechaCierre']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Conexion.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>