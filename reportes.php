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
                        <li><a href="reporteIncidentes.php?user='.$user.'"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">ReporteIncidentes</span></a></li>
                        <li><a href="usuario.php?user='.$user.'"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Usuario</span></a></li>
                        <li class="active"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Reportes</span></a></li>
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
                                        <h2 class="text-center" style="flex-basis: 100%;">Reporte de Conexion</h2>
                                        <div style="width: 100%;">
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
                                                <th>Nombre</th>
                                                <th>Equipo</th>
                                                <th>Fecha de Inicio</th>
                                                <th>Fecha de Cierre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('conecta.php');
                                                $query = "SELECT * FROM vista_conexion WHERE FechaInicio BETWEEN '2023-01-01 23:59' AND '2023-05-31'";
                                                $result = mysqli_query($conexion, $query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "
                                                    <tr class='larger-row'>
                                                        <td>".$row['nombre']."</td>
                                                        <td>".$row['equipo']."</td>
                                                        <td>".$row['FechaInicio']."</td>
                                                        <td>".$row['FechaCierre']."</td>
                                                    </tr>
                                                    ";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a href="ReportesC-pdf.php">Exportar PDF</a>
                        <b>|</b>
                        <a href="ReportesC-excel.php">Exportar EXCEL</a>
                        <b>|</b>
                        <a href="ReportesC-csv.php">Exportar CSV</a>
                        <b>|</b>
                        <a href="ReportesC-json.php">Exportar JSON</a>
                        <b>|</b>
                        <a href="ReportesC-xsl.php">Exportar XSL</a>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="display: flex; align-items: center; flex-wrap: wrap;">
                                        <h2 class="text-center" style="flex-basis: 100%;">Reporte de Actividades</h2>
                                        <div style="width: 100%;">
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
                                                <th>Nombre</th>
                                                <th>Conexion</th>
                                                <th>Fecha y Hora</th>
                                                <th>Descripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('conecta.php');
                                                $query = "SELECT * FROM vista_registroact WHERE FechaYhora BETWEEN '2023-01-12' AND '2023-04-24'";
                                                $result = mysqli_query($conexion, $query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "
                                                    <tr class='larger-row'>
                                                        <td>".$row['nombre']."</td>
                                                        <td>".$row['idConexion']."</td>
                                                        <td>".$row['FechaYhora']."</td>
                                                        <td>".$row['descAct']."</td>
                                                    </tr>
                                                    ";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a href="ReportesA-pdf.php">Exportar PDF</a>
                        <b>|</b>
                        <a href="ReportesA-excel.php">Exportar EXCEL</a>
                        <b>|</b>
                        <a href="ReportesA-csv.php">Exportar CSV</a>
                        <b>|</b>
                        <a href="ReportesA-json.php">Exportar JSON</a>
                        <b>|</b>
                        <a href="ReportesA-xsl.php">Exportar XSL</a>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="display: flex; align-items: center; flex-wrap: wrap;">
                                        <h2 class="text-center" style="flex-basis: 100%;">Reporte de Incidentes</h2>
                                        <div style="width: 100%;">
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
                                                $query = "SELECT * FROM vista_reportedeincidentes WHERE FechaYhora BETWEEN '2022-10-31' AND '2023-11-12'";
                                                $result = mysqli_query($conexion, $query);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "
                                                    <tr class='larger-row'>
                                                        <td>".$row['nombre']."</td>
                                                        <td>".$row['FechaYhora']."</td>
                                                        <td>".$row['descripción']."</td>
                                                    </tr>
                                                    ";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a href="ReportesI-pdf.php">Exportar PDF</a>
                        <b>|</b>
                        <a href="ReportesI-excel.php">Exportar EXCEL</a>
                        <b>|</b>
                        <a href="ReportesI-csv.php">Exportar CSV</a>
                        <b>|</b>
                        <a href="ReportesI-json.php">Exportar JSON</a>
                        <b>|</b>
                        <a href="ReportesI-xsl.php">Exportar XSL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="tablasGeneral.js"></script>
</body>
</html>
