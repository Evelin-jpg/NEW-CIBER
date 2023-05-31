<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta="SELECT * FROM vista_registroact WHERE FechaYhora BETWEEN '2023-01-12' AND '2023-04-24'";
$datos = $conn->query($consulta);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("ReportesA");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'idConexion');
$hojaActiva->setCellValue('C1', 'Fecha Y hora');
$hojaActiva->setCellValue('D1', 'Descripcion');


$Fila = 2;

while($rows = $datos->fetch_assoc())
{
    $hojaActiva->getColumnDimension('A')->setWidth(10);
    $hojaActiva->setCellValue('A'.$Fila, $rows['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B'.$Fila, $rows['idConexion']);
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C'.$Fila, $rows['FechaYhora']);
    $hojaActiva->getColumnDimension('D')->setWidth(10);
    $hojaActiva->setCellValue('D'.$Fila, $rows['descAct']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReportesA.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>