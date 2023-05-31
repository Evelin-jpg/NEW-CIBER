<?php
    require_once('conecta.php');
    $cliente = $_POST['cliente'];
    $conexion = $_POST['conexion'];
    $fyh = $_POST['fyh'];
    $desc = $_POST['desc'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");

    $consulta = "INSERT INTO `reportedeincidentes`(`idCliente`, `FechaYhora`, `descripción`, `creo`, `fechaCreacion`, `modifico`, `fechaModificacion`) VALUES ('".$cliente."','".$fyh."','".$desc."','".$user."','".$fecha."','".$user."','".$fecha."')";

    $resultado = mysqli_query($conexion,$consulta);
    header("Location:reporteIncidentes.php?user=$user");
    mysqli_close( $conexion );
?>