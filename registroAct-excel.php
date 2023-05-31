<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("RegistroAct");

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
header('Content-Disposition: attachment;filename="RegistroAct.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>