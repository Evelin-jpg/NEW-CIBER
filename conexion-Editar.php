<?php
    require_once('conecta.php');
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $equipo = $_POST['equipo'];
    $fInicio = $_POST['fInicio'];
    $fCierre = $_POST['fCierre'];
    $user = $_POST['user'];

    $fecha = date("Y-m-d");
    
    $sql = "UPDATE conexion SET idClinete='$cliente', idEquipo='$equipo', FechaInicio='$fInicio', FechaCierre='$fCierre', modifico = '$user', fechaModificacion= '$fecha' WHERE idConexion =". $id;
    
    $resultado = mysqli_query($conexion,$sql);

    header("Location: cliente.php?user=$user"); 
    mysqli_close( $conexion );
?>