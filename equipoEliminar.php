<?php
    require_once('conecta.php');

    $id=$_POST["borrar"];
    $user=$_POST['user'];

    $sql = "UPDATE equipo SET estatus = 0 where idEquipo=". $id;

    $resultado = mysqli_query($conexion,$sql);

    header("Location: cliente.php?user=$user"); 
    mysqli_close( $conexion );

?>