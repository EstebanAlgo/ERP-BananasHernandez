<?php
require('../php/conexion.php');

$image_perfil = '';
$menu = "";
switch ($tipo_usuario) {
    case 'Administrador':
        $image_perfil = "../assets/images/users/administrador.png";
        $menu = "../menus/administrador.php";
        break;
    case 'Administrativo':
        $image_perfil = "../assets/images/users/administrativo.png";
        $menu = "../menus/administrativo.php";
        break;
}

if ($_POST) {
    $id = $_POST['id'];
    $id_finca = $_POST['finca'];
    $id_actividad = $_POST['actividad'];
    $fecha = $_POST['fecha'];
    $id_empleado = $_POST['empleado'];
    $id_unidad = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $semana = date('W');
    $cont = 0;

    require('complementos/adds.php');
}

if ($_GET) {
    $semana = $_GET['semana'];
    $n_semana = $semana;
    $semana = substr($semana, 6, 2);
} else {
    $semana = date('W');
    $n_semana = date('Y') . '-W' . date('W');
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- DISEÑADOR Y PROGRAMADORES ING. ESTEBAN ALMANZA GONZÁLEZ, GABRIELA RUIZ DE LEÓN
     EMAIL: almanza_1811@hotmail.com, garudele@gmail.com
      -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.ico">
    <title>Registro de actividades</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- page CSS -->
    <link href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="../assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora|Merriweather&display=swap" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="http://bananashernandez.com">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify">
                                    <?php

                                    if ($cont_alerta > 0) {
                                        echo "<span class='heartbit'></span> <span class='point'></span> </div>";
                                    } else {
                                        echo "<span class=''></span> <span class=''></span> </div>";
                                    } ?>

                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">Tienes <?php echo $cont_alerta ?> nuevas notificaciones</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <?php

                                            for ($i = 0; $i < $cont_alerta; $i++) {

                                                $dia = substr($fecha[$i], 8, 2);
                                                $mes = substr($fecha[$i], 5, 2);
                                                $año = substr($fecha[$i], 0, 4);
                                                $hora = substr($fecha[$i], 11, 5);
                                                echo "
                                            <!-- Message -->
                                                <a href='../mensajes/mensaje.php?id_mensaje=$id_alerta[$i]&destinatario=$destinatario[$i]'>
                                                <div class='user-img'> <img src='../assets/images/users/$id_emisario[$i].jpg' alt='user' class='img-circle'> <span class='profile-status online pull-right'></span> </div>
                                                <div class='mail-contnet'>
                                                    <h5>$emisario[$i]</h5> <span class='mail-desc'>$titulo[$i]</span> <span class='time'>$dia/$mes/$año $hora</span> </div>
                                                </a>
                                            <!-- Message -->
                                                      ";
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="../mensajes/"> <strong>Ver Todos</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/<?php echo $id_usuario ?>.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $usuario ?></h4>
                                                <p class="text-muted"><?php echo $nombre . ' ' . $p_apellido ?></p><a href="../views/perfil-usuario.php" class="btn btn-rounded btn-danger btn-sm">Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../views/config.php"><i class="ti-settings"></i> Configuración</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../cerrar.php"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- MENú - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div id="barra_navegacion">
        </div>
        <script type="text/javascript">
            $("#barra_navegacion").load('<?php echo $menu; ?>');
        </script>
        <!-- ============================================================== -->
        <!-- End MENú - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">COSTOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Actividades</a></li>
                            <li class="breadcrumb-item active">Registro de Actividades</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row bg-white">
                    <div class="col-12" style="text-align: right;">
                        <button class="btn btn-sm m-b-20 m-t-20 " style="background:  #2766ae; color: white; font-size: 0.9em; " data-toggle="modal" data-target="#modal-agregar"><i class="fas fa-plus"></i> Registrar Actividad</button>

                    </div>

                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="card-title">REGISTROS</h4>
                                <h6 class="card-subtitle">Actividades registradas para cobro</h6>


                                <div class="col-10 col-md-6 offset-1 offset-md-6">
                                    <form action="index.php" method="GET">
                                        <div class="form-group row">
                                            <label for="semana" class="col-4 col-form-label ">Semana a Consultar</label>
                                            <div class="col-6">
                                                <input class="form-control" type="week" value="<?php echo $n_semana ?>" name="semana">
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-info btn-sm">Consultar</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>

                                <div class="table-responsive" id="resultados">
                                    <?php
                                    $filas_tabla = "";

                                    $statement = $conexion->prepare("SELECT * FROM `registro` WHERE `semana` LIKE '%$semana%'");
                                    $statement->execute();
                                    $actividades = $statement->fetchAll();
                                    foreach ($actividades as $filas) {

                                        $id_registro = $filas['id_registro'];
                                        $fecha_actividad = $filas['fecha_actividad'];
                                        $id_origen = $filas['id_origen'];
                                        $origen = finca($conexion, $id_origen);
                                        $cantidad = $filas['cantidad'];
                                        $id_unidad = $filas['id_unidad'];
                                        $unidad = unidad($conexion, $id_unidad);
                                        $id_actividad = $filas['id_actividad'];
                                        $actividad = actividad($conexion, $id_actividad);
                                        $total = $filas['total'];
                                        $id_empleado = $filas['empleado'];
                                        $empleado = empleado($conexion, $id_empleado);
                                        $fecha_actividad = $filas['fecha_actividad'];

                                        $dia = substr($fecha_actividad, 8, 2);
                                        $mes = substr($fecha_actividad, 5, 2);
                                        $año = substr($fecha_actividad, 0, 4);

                                        $fecha = $dia . "/" . $mes . "/" . $año;
                                        $id_precio = $filas['id_unidad'];
                                        $precio = precio($conexion, $id_precio);
                                        $filas_tabla .= "                   <tr>
                                                <td>$origen</td>
                                                <td>$actividad</td>
                                                <td>$unidad</td>
                                                <td class='text-info'>$empleado</td>
                                                <td>$cantidad</td>
                                                <td>$precio</td>
                                                <td>$total</td>
                                                <td>$fecha</td>
                                                <td>
                                <div class='btn-group dropleft btn-sm'>
                                    <button type='button' class='btn btn-secondary dropdown-toggle btn-sm' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='fas fa-list-ul'></i>
                                    </button>
                                    <div class='dropdown-menu'>
                <form class='dropdown-item' >
                     <input type='hidden' id='id_origen$id_registro' value='$id_origen'>
                     <input type='hidden' id='id_actividad$id_registro' value='$id_actividad'>
                     <input type='hidden' id='fecha$id_registro' value='$fecha_actividad'>
                     <input type='hidden' id='id_empleado$id_registro' value='$id_empleado'>
                     <input type='hidden' id='id_unidad$id_registro' value='$id_unidad'>
                     <input type='hidden' id='cantidad$id_registro' value='$cantidad'>

                     <span onClick='editar(this.id)' class='btn btn-outline-inverse btn-sm btn-block' id='$id_registro' data-toggle='modal' data-target='#modal-actualizar' > <i class='fas fa-pencil-alt'></i> Editar </span>
                </form>
                <form class='dropdown-item' action='complementos/delete.php' method='post' >
                     <input type='hidden' name='id' value='$id_registro'>
                     <input type='hidden' name='accion' value='registros'>
                     <button onclick='eliminar(event)' class='btn btn-outline-inverse btn-sm btn-block' id='Agregar'> <i class='fas fa-trash-alt'></i> Eliminar </button>
                </form>
                                       
                                    </div>
                                </div>
                                                </td>
                                            </tr>";
                                    }
                                    ?>

                                    <table id='tabla' class='display nowrap table table-hover table-striped table-bordered table-sm text-center' cellspacing='0' width='100%'>
                                        <thead style="background: #cae0f9; color:#03114D; font-size: 1em; color:  #424446; font-weight: bold; font-family: ' Merriweather', serif;">
                                            <tr class="text-title">

                                                <th>Finca</th>
                                                <th>Actividad</th>
                                                <th>Unidad de Cobro</th>
                                                <th>Empleado</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>TOTAL</th>
                                                <th>Fecha</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Finca</th>
                                                <th>Actividad</th>
                                                <th>Unidad de Cobro</th>
                                                <th>Empleado</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>TOTAL</th>
                                                <th>Fecha</th>
                                                <th>Acción</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="text-subtitle">
                                            <?php echo $filas_tabla ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- sample modal content -->
        <div id="modal-actualizar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title"> Editar Información</h4>
                    </div>
                    <form action="complementos/updates.php" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">ORIGEN:</label>
                                <select id="select_origen" class="form-control btn btn-outline-inverse" name="id_origen">

                                </select>

                                <label for="recipient-name" class="control-label">ACTIVIDAD:</label>
                                <select id="select_actividad" class="form-control btn btn-outline-inverse" name="id_actividad">

                                </select>

                                <label for="recipient-name" class="control-label">UNIDAD DE COBRO:</label>
                                <select id="select_unidad" class="form-control btn btn-outline-inverse" name="id_unidad">

                                </select>

                                <label for="recipient-name" class="control-label">EMPLEADO:</label>
                                <select id="select_empleados" class="form-control btn btn-outline-inverse" name="id_empleado">

                                </select>

                                <label for="recipient-name" class="control-label">CANTIDAD:</label>
                                <input type="number" class="form-control" id="input_cantidad" name="cantidad">

                                <label for="recipient-name" class="control-label">FECHA:</label>
                                <input type="date" class="form-control" id="input_fecha" name="fecha">

                                <input type="hidden" id="id_elemento" name="id">
                                <input type="hidden" value="registros" name="accion">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-save"> Guardar Cambios</i></button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    }
    <!-- sample modal content -->
    <div id="modal-agregar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; border-radius: 20px;">

        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background: url('../assets/images/gallery/costes.jpeg'); background-repeat: no-repeat; background-size: 100%;">
                <div class="row">
                    <div class="col-10 offset-1 offset-md-1 col-md-5 bg-light m-t-40 m-b-40" style="height: 550px; border-radius: 10px; border: 5px solid rgba(0, 0, 0, 0.1);">

                        <div class="form-group m-t-20">
                            <form action="index.php" method="POST">
                                <h3 class="title h1-responsive text-info">Datos de Actividad</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Finca</label>
                                            <select id="finca" class="btn btn-outline-inverse" style="width: 100%" name="finca">
                                                <?php
                                                $statement = $conexion->prepare("SELECT * FROM origen");
                                                $statement->execute();
                                                $fincas = $statement->fetchAll();
                                                foreach ($fincas as $filas) {
                                                    $nombre_finca = $filas['nombre_finca'];
                                                    $id_finca = $filas['id_origen'];
                                                    echo "<option value='$id_finca'>$nombre_finca</option>";
                                                }
                                                ?>
                                            </select>
                                            <small class="form-control-feedback"> Selecciona tu finca </small> </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Actividad</label>
                                            <select id="actividad" class="btn btn-outline-inverse" style="width: 100%" name="actividad" onchange="rellenado()">
                                                <?php
                                                $statement = $conexion->prepare("SELECT * FROM actividad ORDER BY nombre ASC");
                                                $statement->execute();
                                                $fincas = $statement->fetchAll();
                                                foreach ($fincas as $filas) {
                                                    $nombre_actividad = $filas['nombre'];
                                                    $id_actividad = $filas['id_actividad'];
                                                    echo "<option value='$id_actividad'>$nombre_actividad</option>";
                                                }
                                                ?>
                                            </select>
                                            <small class="form-control-feedback"> Selecciona una actividad </small> </div>
                                    </div>

                                </div>
                                <!--/row-->
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Fecha</label>
                                            <input type="date" id="fecha" class="form-control form-control-danger" value="<?php echo date('Y-m-d'); ?>" name="fecha">
                                            <small class="form-control-feedback"> Define la fecha </small> </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Empleado</label>
                                            <select id="empleado" class="btn btn-outline-inverse" style="width: 100%" name="empleado">
                                                <?php
                                                $statement = $conexion->prepare("SELECT * FROM empleado ORDER BY nombre ASC");
                                                $statement->execute();
                                                $empleado = $statement->fetchAll();
                                                foreach ($empleado as $filas) {
                                                    $nombre_empleado = $filas['nombre'] . " " . $filas['p_apellido'] . " " . $filas['s_apellido'];
                                                    $id_empleado = $filas['id_empleado'];
                                                    echo "<option value='$id_empleado'>$nombre_empleado</option>";
                                                }
                                                ?>
                                            </select>
                                            <small class="form-control-feedback"> Especifica el empleado </small> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Unidad de Cobro</label>
                                            <select name="tipo" id="unidad" class="btn btn-outline-inverse" style="width: 100%">

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="control-label">Cantidad</label>
                                            <input type="number" step="0.1" id="cantidad" class="form-control form-control-danger" placeholder="Cantidad" name="cantidad">

                                        </div>
                                    </div>
                                </div>
                                <?php
                                $statement = $conexion->prepare('SELECT  MAX(id_registro) FROM registro');
                                $statement->execute();
                                $registros = $statement->fetchAll();
                                foreach ($registros as $fila) {
                                    $id_registro = $fila[0] + 1;
                                }
                                ?>
                                <input type="hidden" name="id" value="<?php echo $id_registro ?>">
                                <input type="hidden" value="registros" name="accion">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                            <button type="submit" class="btn btn-outline-info waves-effect waves-light"><i class="fas fa-save"> Registrar</i></button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.modal -->
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        <?php echo $footer ?>
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/popper/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="../assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="../assets/plugins/dff/dff.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="../assets/plugins/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <?php
    if ($cont > 0) {
        echo "<script>swal('HECHO!', 'La actividad ha sido registrada exitósamente', 'success')</script>";
    } ?>
    <!-- end - This is for export functionality only -->
    <script>
        $('#tabla').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!-- This is data table -->
    <script src="../assets/plugins/datatables/datatables.min.js"></script>
    <script>
        function editar(id) {
            var id_origen = $('#id_origen' + id).val()
            var id_actividad = $('#id_actividad' + id).val()
            var fecha = $('#fecha' + id).val()
            var id_empleado = $('#id_empleado' + id).val()
            var id_unidad = $('#id_unidad' + id).val()
            var cantidad = $('#cantidad' + id).val()

            //LLenado de origen------------------------------
            $.ajax({
                    type: 'POST',
                    url: 'complementos/select_origen.php',
                    data: {
                        'id': id_origen
                    }
                })

                .done(function(origen) {

                    $("#select_origen").html(origen)

                })
                .fail(function() {
                    alert('Hubo un error al cargar la unidad de cobro')
                }) //--------------------------------------------------

            //LLenado de actividad------------------------------
            $.ajax({
                    type: 'POST',
                    url: 'complementos/select_actividad.php',
                    data: {
                        'id': id_actividad
                    }
                })

                .done(function(actividad) {

                    $("#select_actividad").html(actividad)

                })
                .fail(function() {
                    alert('Hubo un error al cargar las actividades')
                }) //--------------------------------------------------

            //LLenado de unidad-----------------------------------
            var id_actividad = $('#select_actividad').val()
            $.ajax({
                    type: 'POST',
                    url: 'complementos/select_unidad.php',
                    data: {
                        'id': id_unidad,
                        'id_actividad': id_actividad
                    }
                })

                .done(function(unidad) {

                    $("#select_unidad").html(unidad)


                })
                .fail(function() {
                    alert('Hubo un error al cargar la unidad de cobro')
                }) //--------------------------------------------------

            //LLenado de empleados--------------------------------
            $.ajax({
                    type: 'POST',
                    url: 'complementos/select_empleado.php',
                    data: {
                        'id': id_empleado
                    }
                })

                .done(function(empleados) {

                    $("#select_empleados").html(empleados)


                })
                .fail(function() {
                    alert('Hubo un error al cargar los empleados')
                }) //--------------------------------------------------


            $("#input_cantidad").attr("value", cantidad)
            $("#input_fecha").attr("value", fecha)
            $("#id_elemento").attr("value", id)

            $('#select_actividad').on('change', function() {
                var id_actividad = $('#select_actividad').val()
                $.ajax({
                        type: 'POST',
                        url: 'complementos/tipo.php',
                        data: {
                            'id': id_actividad
                        }
                    })
                    .done(function(tipo) {
                        $('#select_unidad').html(tipo)

                    })
                    .fail(function() {
                        alert('Hubo un error al cargar la unidad de cobro')
                    })

            })

        } //fin del proceso de llenado para edición

        function rellenado() {

            var id_actividad = $('#actividad').val()
            $.ajax({
                    type: 'POST',
                    url: 'complementos/tipo.php',
                    data: {
                        'id': id_actividad
                    }
                })
                .done(function(tipo) {
                    $('#unidad').html(tipo)


                })
                .fail(function() {
                    alert('Hubo un error al cargar la unidad de cobro')
                })
        }
    </script>
    </script>
    <script language="JavaScript">
        function eliminar(e) {
            if (confirm('¿Esta seguro de que desea ELIMINAR el registro seleccionado?')) {
                document.borrar_usuario.submit();
            } else {
                e.preventDefault();
            }
        }
    </script>

</body>

<script>
    var fecha = $('#fecha').val()
    var id_actividad = $('#actividad').val()
    $.ajax({
            type: 'POST',
            url: 'complementos/tipo.php',
            data: {
                'id': id_actividad
            }
        })
        .done(function(tipo) {
            $('#unidad').html(tipo)

        })
        .fail(function() {
            alert('Hubo un error al cargar la unidad de cobro')
        })

    fecha = $('#semana').val()
    fecha = fecha.substr(6, 2);
    $.ajax({
            type: 'POST',
            url: 'complementos/vista_registro.php',
            data: {
                'fecha': fecha
            }
        })
        .done(function(destinos) {
            $('#resultado').html(destinos)
        })
        .fail(function() {
            alert('Hubo un error al cargar los estados')
        })



    $('#guardar').on('click', function() {

        var id_finca = $('#finca').val()
        var id_actividad = $('#actividad').val()
        var fecha = $('#fecha').val()
        var id_empleado = $('#empleado').val()
        var id_unidad = $('#unidad').val()
        var cantidad = $('#cantidad').val()

        if (cantidad == "") {
            swal("ACCESO DENEGADO!", "Define la cantidad para continuar.")
        } else {
            $.ajax({
                    type: 'POST',
                    url: 'complementos/guardar_registro.php',
                    data: {
                        'id_finca': id_finca,
                        'id_actividad': id_actividad,
                        'fecha': fecha,
                        'id_empleado': id_empleado,
                        'id_unidad': id_unidad,
                        'cantidad': cantidad
                    }
                })
                .done(function(destinos) {
                    $('#resultado').html(destinos)
                })
                .fail(function() {
                    alert('Hubo un error al cargar los estados')
                })
        }

    })

    $('#semana').on('change', function() {
        var fecha = $('#semana').val()
        fecha = fecha.substr(6, 2);

        $.ajax({
                type: 'POST',
                url: 'complementos/vista_registro.php',
                data: {
                    'fecha': fecha
                }
            })
            .done(function(destinos) {
                $('#resultado').html(destinos)
            })
            .fail(function() {
                alert('Hubo un error al cargar los estados')
            })

    })
</script>



</html>
<?php
function finca($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM origen WHERE id_origen='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre_finca'];
    }

    return $resultado;
}
function unidad($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre'];
    }

    return $resultado;
}
function actividad($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM actividad WHERE id_actividad='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre'];
    }

    return $resultado;
}
function empleado($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM empleado WHERE id_empleado='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre'] . " " . $filas['p_apellido'] . " " . $filas['s_apellido'];
    }

    return $resultado;
}
function precio($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM unidad WHERE id_unidad='$id'");
    $statement->execute();
    $precios = $statement->fetchAll();
    foreach ($precios as $filas) {
        $resultado = $filas['coste'];
    }

    return $resultado;
}


?>