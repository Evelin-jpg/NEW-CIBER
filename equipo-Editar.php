<?php
    require_once('conecta.php');
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $equipo = $_POST['equipo'];
    $so = $_POST['so'];
    $ip = $_POST['ip'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");
    
    $sql = "UPDATE equipo SET idUsuario='$usuario', equipo='$equipo', SistemaOperativo='$so', DireccionIP='$ip', modifico = '$user', fechaModificacion= '$fecha' WHERE idEquipo =". $id;
    
    $resultado = mysqli_query($conexion,$sql);

    header("Location: equipo.php?user=$user"); 
    mysqli_close( $conexion );
?>