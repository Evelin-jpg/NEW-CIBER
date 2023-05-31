<?php
    require_once('conecta.php');

    $id=$_POST["borrar"];
    $user=$_POST['user'];

    $sql = "UPDATE conexion SET estatus = 0 where idConexion=". $id;

    $resultado = mysqli_query($conexion,$sql);

    header("Location: cliente.php?user=$user"); 
    mysqli_close( $conexion );

?>