<?php
    require_once('conecta.php');

    $id=$_POST["borrar"];
    $user=$_POST['user'];

    $sql = "UPDATE registroact SET estatus = 0 where idRegistroAct=". $id;

    $resultado = mysqli_query($conexion,$sql);

    header("Location: registroAct.php?user=$user"); 
    mysqli_close( $conexion );

?>