<?php
    require_once('conecta.php');
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $conexion = $_POST['conexion'];
    $fyh = $_POST['fyh'];
    $desc = $_POST['desc'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");
    
    $sql = "UPDATE registroact SET idClinete='$cliente', idConexion='$conexion', FechaYhora='$fyh', descAct='$desc', modifico = '$user', fechaModificacion= '$fecha' WHERE idRegistroAct=". $id;
    
    $resultado = mysqli_query($conexion,$sql);

    header("Location: registroAct.php?user=$user"); 
    mysqli_close( $conexion );
?>