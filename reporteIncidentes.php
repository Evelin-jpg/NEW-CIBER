<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-oXuP+qFtIxf1fn1V8/YsVqGHVBfw0s4LpPpT5RNSWZkakGpC02tqzLZxU4avtVpR" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="tablasGeneral.css">
</head>
<body>
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a href="home.php"><img src="" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                    <?php $user = $_GET['user'];
                    echo '
                        <li><a href="home.php?user='.$user.'"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="cliente.php?user='.$user.'"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cliente</span></a></li>
                        <li><a href="conexion.php?user='.$user.'"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Conexion</span></a></li>
                        <li><a href="equipo.php?user='.$user.'"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Equipo</span></a></li>
                        <li><a href="registroAct.php?user='.$user.'"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">RegistroAct</span></a></li>
                        <li class="active"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">ReporteIncidentes</span></a></li>
                        <li><a href="usuario.php?user='.$user.'"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Usuario</span></a></li>
                    ';
                    ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="user-dashboard">
                    <div class="container col-sm-12">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="display: flex; align-items: center; flex-wrap: wrap;">
                                        <h2 class="text-center" style="flex-basis: 100%;">Reporte de Incidentes</h2>
                                        <div style="width: 100%;">
                                        <?php 
                                        echo "
                                            <button class='btn btn-success' type='button' onclick='window.location.href = `reporteIncidentesAdd.php?user=$user`' style='margin-bottom: 10px';>Agregar</button>";
                                        ?>
                                            <span class="clickable filter pull-right larger-span" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                                                <i class="glyphicon glyphicon-filter larger-icon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                                    </div>
                                    <table class="table table-hover" id="dev-table">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Fecha y Hora</th>
                                                <th>Descripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('conecta.php');
                                                $query = "SELECT `r`.`idReporteDeIncidentes`, `c`.`nombre`, `r`.`FechaYhora`, `r`.`descripción` FROM `reportedeincidentes` `r` INNER JOIN `cliente` `c` ON `r`.`idCliente` = `c`.`idCliente` WHERE `r`.`estatus` = 1";
                                                $result = mysqli_query($conexion, $query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "
                                                    <tr class='larger-row'>
                                                        <td>".$row['nombre']."</td>
                                                        <td>".$row['FechaYhora']."</td>
                                                        <td>".$row['descripción']."</td>
                                                        <td>
                                                            <form action='reporteIncidentesEditar.php' method='post'>
                                                                <input type='hidden' name='editar' id='editar' value='".$row['idReporteDeIncidentes']."'>
                                                                <input type='hidden' name='user' id='user' value='".$user."'>
                                                                <button class='btn btn-link' title='Editar campo'>
                                                                    <i class='bi bi-pencil-square icon-large'></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action='reporteIncidentesEliminar.php' method='post'>
                                                                <input type='hidden' name='borrar' value='".$row['idReporteDeIncidentes']."'>
                                                                <input type='hidden' name='user' id='user' value='".$user."'>
                                                                <button class='btn btn-link' title='Eliminar campo'>
                                                                    <i class='bi bi-trash icon-large text-danger'></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    ";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="tablasGeneral.js"></script>
</body>
</html>
