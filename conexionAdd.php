<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="conexionTabla.php" method="post">
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
        <label for="f1">Equipo:</label>
        <select name="equipo" id="equipo">
            <?php
            include('conecta.php');
            $query = "SELECT * FROM `equipo` WHERE `estatus` = 1";
            $result = mysqli_query($conexion, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo'
                <option value="'.$row['idEquipo'].'">'.$row['equipo'].'</option>
                ';
            }
            ?>
        </select><br>
        <label for="f1">Fecha de Inicio:</label>
        <input type="date" class="form-control" name="fInicio" id="fInicio"><br>
        <label for="f1">Fecha de Cierre:</label>
        <input type="date" class="form-control" name="fCierre" id="fCierre"><br>
        <?php
        $user = $_GET['user'];
        echo"
        <input type='hidden' name='editar' value='".$user."'>";
        ?>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>