<?php
require('cn.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
 
$consulta="SELECT
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
$datos = $conn->query($consulta);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("Equipo");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Equipo');
$hojaActiva->setCellValue('C1', 'Sistema Operativo');
$hojaActiva->setCellValue('D1', 'DireccionIP');


$Fila = 2;

while($rows = $datos->fetch_assoc())
{
    $hojaActiva->getColumnDimension('A')->setWidth(10);
    $hojaActiva->setCellValue('A'.$Fila, $rows['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(10);
    $hojaActiva->setCellValue('B'.$Fila, $rows['equipo']);
    $hojaActiva->getColumnDimension('C')->setWidth(10);
    $hojaActiva->setCellValue('C'.$Fila, $rows['SistemaOperativo']);
    $hojaActiva->getColumnDimension('D')->setWidth(10);
    $hojaActiva->setCellValue('D'.$Fila, $rows['DireccionIP']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Equipo.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>