<?php
    require_once('conecta.php');

    $id=$_POST["borrar"];
    $user=$_POST['user'];

    $sql = "UPDATE reportedeincidentes SET estatus = 0 where idReporteDeIncidentes=". $id;

    $resultado = mysqli_query($conexion,$sql);

    header("Location: reportedeincidentes.php?user=$user"); 
    mysqli_close( $conexion );

?>