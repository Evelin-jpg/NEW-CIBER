<?php
    require_once('conecta.php');
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $fyh = $_POST['fyh'];
    $desc = $_POST['desc'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");
    
    $sql = "UPDATE reportedeincidentes SET idCliente='$cliente', FechaYhora='$fyh', descripción='$desc', modifico = '$user', fechaModificacion= '$fecha' WHERE idReporteDeIncidentes=". $id;
    
    $resultado = mysqli_query($conexion,$sql);

    header("Location: reporteIncidentes.php?user=$user"); 
    mysqli_close( $conexion );
?>