<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="equipo-Editar.php" method="post">
        <label for="f1">Usuario:</label>
        <select name="usuario" id="usuario">
            <?php
            include('conecta.php');
            $query = "SELECT * FROM `cliente` WHERE `estatus` = 1";
            $result = mysqli_query($conexion, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo'
                <option value="'.$row["idCliente"].'">'.$row["nombre"].'</option>
                ';
            }
            ?>
        </select><br>
        <label for="f1">Equipo:</label>
        <input type="text" class="form-control" name="equipo" id="equipo"><br>
        <label for="f1">Sistema Operativo:</label>
        <select name="so" id="so">
            <option value="Windows 10">Windows 10</option>
            <option value="Windows 8">Windows 8</option>
            <option value="Windows 7">Windows 7</option>
            <option value="Windows xp">Windows xp</option>
            <option value="Windows vista">Windows vista</option>
            <option value="Ubuntu">Ubuntu</option>
            <option value="Linux Mint">Linux Mint</option>
            <option value="Debian">Debian</option>
            <option value="Fedora">Fedora</option>
            <option value="Arch Linux">Arch Linux</option>
        </select><br>
        <label for="f1">Direccion IP:</label>
        <input type="tel" class="form-control" name="ip" id="ip"><br>
        <?php
        $id = $_POST['editar'];
        $user = $_POST['user'];
        echo '
        <input type="hidden" name="id" id="id" value="'.$id.'">
        <input type="hidden" name="user" id="user" value="'.$user.'">
        ';
        ?>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>