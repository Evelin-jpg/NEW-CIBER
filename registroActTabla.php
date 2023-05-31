<?php
    require_once('conecta.php');
    $cliente = $_POST['cliente'];
    $fyh = $_POST['fyh'];
    $desc = $_POST['desc'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");

    $consulta = "INSERT INTO `registroact`(`idClinete`, `idConexion`, `FechaYhora`, `descAct`, `creo`, `fechaCreacion`, `modifico`, `fechaModificacion`) VALUES ('".$cliente."','".$conexion."','".$fyh."','".$desc."','".$user."','".$fecha."','".$user."','".$fecha."')";

    $resultado = mysqli_query($conexion,$consulta);
    header("Location:registroAct.php?user=$user");
    mysqli_close( $conexion );
?>