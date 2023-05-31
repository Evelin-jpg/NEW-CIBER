<?php
    require_once('conecta.php');
    $usuario = $_POST['usuario'];
    $equipo = $_POST['equipo'];
    $so = $_POST['so'];
    $ip = $_POST['ip'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");

    $consulta = "INSERT INTO `equipo`(`idUsuario`, `equipo`, `SistemaOperativo`, `DireccionIP`, `creo`, `fechaCreacion`, `modifico`, `fechaModificacion`) VALUES ('".$usuario."','".$equipo."','".$so."','".$ip."','".$user."','".$fecha."','".$user."','".$fecha."')";

    $resultado = mysqli_query($conexion,$consulta);
    header("Location:equipo.php?user=$user");
    mysqli_close( $conexion );
?>