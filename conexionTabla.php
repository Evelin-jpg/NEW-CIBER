<?php
    require_once('conecta.php');
    $cliente = $_POST['cliente'];
    $equipo = $_POST['equipo'];
    $fInicio = $_POST['fInicio'];
    $fCierre = $_POST['fCierre'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");

    $consulta = "INSERT INTO `conexion`(`idClinete`, `idEquipo`, `FechaInicio`, `FechaCierre`, `creo`, `fechaCreacion`, `modifico`, `fechaModificacion`) VALUES ('".$cliente."','".$equipo."','".$fInicio."','".$fCierre."','".$user."','".$fecha."','".$user."','".$fecha."')";

    $resultado = mysqli_query($conexion,$consulta);
    header("Location:cliente.php?user=$user");
    mysqli_close( $conexion );
?>