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
	$this->Cell(45,10,'Equipo',1,0,'C',0);
	$this->Cell(45,10,'Fecha de Inicio',1,0,'C',0);
    $this->Cell(45,10,'Fecha de Cierre',1,1,'C',0);
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
$resultado = mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(45,10,$row['nombre'],1,0,'C',0);
	$pdf->Cell(45,10,$row['equipo'],1,0,'C',0);
	$pdf->Cell(45,10,$row['FechaInicio'],1,0,'C',0);
    $pdf->Cell(45,10,$row['FechaCierre'],1,1,'C',0);
} 

$pdf->Output('Conexion.pdf', 'I');
?>



