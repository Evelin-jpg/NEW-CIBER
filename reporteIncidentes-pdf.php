<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',9.5);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
   $this->Cell(70,10,' ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->Cell(45,10,'Nombre',1,0,'C',0);
	$this->Cell(45,10,'FechaYhora',1,0,'C',0);
	$this->Cell(100,10,'descripción',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("cn.php");
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
$resultado = mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(45,10,$row['nombre'],1,0,'C',0);
	$pdf->Cell(45,10,$row['FechaYhora'],1,0,'C',0);
    $pdf->Cell(100,10,$row['descripción'],1,1,'C',0);
} 

$pdf->Output('ReporteIncidentes.pdf', 'I');
?>
