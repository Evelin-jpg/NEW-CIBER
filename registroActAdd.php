<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registroActTabla.php" method="post">
        <label for="f1">Cliente:</label>
        <select name="cliente" id="cliente">
            <?php
            include('conecta.php');
            $query = "SELECT * FROM `cliente` WHERE `estatus` = 1";
            $result = mysqli_query($conexion, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo'
                <option value="'.$row['idCliente'].'">'.$row['nombre'].'</option>
                ';
            }
            ?>
        </select><br>
        <label for="f1">Conexion:</label>
        <select name="conexion" id="conexion">
            <?php
            include('conecta.php');
            $query = "SELECT * FROM `conexion` WHERE `estatus` = 1";
            $result = mysqli_query($conexion, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo'
                <option value="'.$row['idConexion'].'">'.$row['idConexion'].'</option>
                ';
            }
            ?>
        </select><br>
        <label for="f1">Fecha y Hora:</label>
        <input type="datetime-local" class="form-control" name="fyh" id="fyh"><br>
        <label for="f1">Descripcion de Actividad:</label>
        <input type="text" class="form-control" name="desc" id="desc"><br>
        <?php
        $user = $_GET['user'];
        echo"
        <input type='hidden' name='editar' value='".$user."'>";
        ?>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>