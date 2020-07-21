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
    $cont = 0;
    $cont2=0;
    require('complementos/adds.php');
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
    <title>EMPLEADOS</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/plugins/dropify/dist/css/dropify.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
                    <div class="col-md-5 col-8 align-self-center" >
                        <h3 class="text-themecolor m-b-0 m-t-0">SISTEMA</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">ACTIVIDADES</a></li>
                            <li class="breadcrumb-item active">Empleados</li>
                            
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?php
                $Filas = "";
                $statement = $conexion->prepare("SELECT * FROM empleado");
                $statement->execute();
                $cobros = $statement->fetchAll();
                foreach ($cobros as $fila) {
                    $nombre = $fila['nombre'];
                    $p_apellido = $fila['p_apellido'];
                    $s_apellido = $fila['s_apellido'];
                    $cargo = $fila['cargo'];
                    $nacimiento = $fila['nacimiento'];
                    $telefono = $fila['telefono'];
                    $direccion = $fila['direccion'];
                    $identificacion = $fila['identificacion'];
                    $photo = $fila['photo'];
                    $fecha = $fila['fecha'];
                    $id_empleado = $fila['id_empleado'];

                    if (empty($photo)) {

                        $photo = 'complementos/empleados/user.JPG';
                        //echo "<script>alert('Entra en éste if')</script>";
                    } else {
                        $photo = $photo;
                    }


                    $Filas .= "<tr>
                <td style='color: #1488fc ; font-weight:bold; padding-left:30px;'>$id_empleado</td>
                <td> <a href='perfil.php?id=$id_empleado' target='_blank'><img src='$photo' alt='user' class='img-circle ' style='width:40px; height:40px;' />  $nombre $p_apellido $s_apellido</a>
                <input type='hidden' id='nombre$id_empleado' value='$nombre'>
                <input type='hidden' id='p_apellido$id_empleado' value='$p_apellido'>
                <input type='hidden' id='s_apellido$id_empleado' value='$s_apellido'>
                </td>
                <td>$cargo
                <input type='hidden' id='cargo$id_empleado' value='$cargo'>
                </td>
                <td>$identificacion
                <input type='hidden' id='telefono$id_empleado' value='$telefono'>
                </td>
                <td>$direccion
                <input type='hidden' id='direccion$id_empleado' value='$direccion'>
                </td>
                <td>$nacimiento
                <input type='hidden' id='nacimiento$id_empleado' value='$nacimiento'>
                </td>
                <td>$nacimiento
                <input type='hidden' id='nacimiento$id_empleado' value='$nacimiento'>
                </td>
                <td>
                     <form id='id_empleado' style='display:inline-block;' data-toggle='tooltip' title='Editar'>
                     <input type='hidden' id='nombre$id_empleado' value='$nombre'>
                     <span id='$id_empleado'  onClick='editar(this.id)' class='btn btn-sm btn-outline-secondary p-t-0 p-b-0'  data-toggle='modal' data-target='#modal-actualizar' > <i class='fas fa-pencil-alt'></i></span>
                     </form>
                     <form action='complementos/delete.php' method='post' style='display:inline-block;'>
                     <input type='hidden' name='id' value='$id_empleado'>
                     <input type='hidden' name='accion' value='empleados'>
                     <button data-toggle='tooltip' title='Eliminar Folio $id_empleado' onclick='eliminar(event)' class='btn btn-sm btn-outline-secondary p-t-0 p-b-0' id='Agregar'> <i class='fas fa-trash-alt'></i></button>
                     </form>
                </td>
          </tr>";
                } ?>



                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">

                            </div>
                            <div class="card-body">
                                <div class="col-12" style="text-align: right;">
                                    <button class="btn btn-sm" style="background:  #2766ae; color: white; font-size: 0.9em;" data-toggle="modal" data-target="#modal-agregar"><i class="fas fa-plus"></i> Añadir Empleado</button>

                                </div>
                                <div class="table-responsive">
                                    <table data-paging="true" data-paging-size="7" id="tabla" class="display  table table-hover table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                        <thead style=" background: #cae0f9;">
                                            <tr style="font-size: 1em; color:  #424446; font-weight: bold; font-family: 'Merriweather', serif;">
                                                <th>FOLIO</th>
                                                <th>NOMBRE</th>
                                                <th>CARGO</th>
                                                <th>IDENTIFICACIÓN</th>
                                                <th>DIRECCIÓN</th>
                                                <th>NACIMIENTO</th>
                                                <th>FECHA</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>FOLIO</th>
                                                <th>NOMBRE</th>
                                                <th>CARGO</th>
                                                <th>IDENTIFICACIÓN</th>
                                                <th>DIRECCIÓN</th>
                                                <th>NACIMIENTO</th>
                                                <th>FECHA</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody style="color: black; font-size: 0.8em; font-family: 'Lora', serif; padding:0px;">

                                            <?php echo $Filas ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <?php echo $footer; ?>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
            <!-- sample modal content -->
            <div id="modal-actualizar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content" style="border:10px solid">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"> Editar Información</h4>
                        </div>

                        <div class="modal-body">
                            <h4 class="h1-responsive text-info"><strong>EDITAR REGISTRO</strong></h4>
                            <form action="complementos/updates.php" method="post">
                                <div class="form-group">
                                    <h5 class="h2-responsive product-name m-t-10"><strong>Nombre(es)</strong></h5>
                                    <input type="text" id="input_nombre" class="form-control" name="nombre">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <h5 class="h2-responsive product-name m-t-10"><strong>Primero Apellido</strong></h5>
                                            <input type="text" id="input_p_apellido" class="form-control" name="p_apellido">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <h5 class="h2-responsive product-name m-t-10"><strong>Segundo Apellido</strong></h5>
                                            <input type="text" id="input_s_apellido" class="form-control" name="s_apellido">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                        <h5 class="h2-responsive product-name m-t-10"><strong>Cargo</strong></h5>
                                    <input type="text" id="input_cargo" class="form-control" name="cargo">
                                        </div>
                                        <div class="col-6">
                                        <h5 class="h2-responsive product-name m-t-10"><strong>Identificación</strong></h5>
                                    <input type="text" id="input_identificacion" class="form-control" name="identificacion">
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <h5 class="h2-responsive product-name m-t-10"><strong>Teléfono</strong></h5>
                                            <input type="number" id="input_telefono" class="form-control" name="telefono">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <h5 class="h2-responsive product-name m-t-10"><strong>Nacimiento</strong></h5>
                                            <input type="date" id="input_nacimiento" class="form-control" name="nacimiento">
                                        </div>
                                    </div>
                                    <h5 class="h2-responsive product-name m-t-10"><strong>Dirección</strong></h5>
                                    <input type="text" id="input_direccion" class="form-control" name="direccion">
                                    <input type="hidden" id="id_elemento" name="id">
                                    <input type="hidden" value="empleados" name="accion">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-outline-danger waves-effect waves-light"><i class="fas fa-save"> Guardar Cambios</i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

            <!-- sample modal content -->
            <div id="modal-agregar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; border-radius: 20px;">
                <form action="empleados.php" method="post">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" style="background: url('../assets/images/gallery/empleados.JPG'); background-repeat: no-repeat; background-size: 100%; height: 600px;">
                            <div class="row">
                                <div class="col-10 offset-1 offset-md-1 col-md-5 bg-light m-t-40 m-b-40" style="height: 550px; border-radius: 10px; border: 5px solid rgba(0, 0, 0, 0.1);">

                                    <div class="form-group m-t-20">
                                        <?php
                                        $statement = $conexion->prepare('SELECT  MAX(id_empleado) FROM empleado');
                                        $statement->execute();
                                        $constancia = $statement->fetchAll();
                                        foreach ($constancia as $fila) {
                                            $id_empleado = $fila[0] + 1;
                                        }
                                        ?>
                                        <h3 class="h1-responsive text-info"><strong>REGISTRAR EMPLEADO</strong></h3>

                                        <h5 class="h2-responsive product-name m-t-10"><strong>Nombre</strong></h5>
                                        <input type="text" class="form-control" name="Nombre" placeholder="Inserta el nombre" required>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="h2-responsive product-name m-t-10"><strong>Primer Apellido</strong></h5>
                                                <input type="text" class="form-control" name="P_apellido" placeholder="Primer Apellido" required>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="h2-responsive product-name m-t-10"><strong>Segundo Apellido</strong></h5>
                                                <input type="text" class="form-control" name="S_apellido" placeholder="Segundo Apellido" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="h2-responsive product-name m-t-10"><strong>Fecha de nacimiento</strong></h5>
                                                <input type="date" class="form-control" name="Nacimiento">
                                            </div>
                                            <div class="col-6">
                                                <h5 class="h2-responsive product-name m-t-10"><strong>Teléfono</strong></h5>
                                                <input type="number" class="form-control" name="Telefono" placeholder="(xxx)-xxxxxxx">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                            <h5 class="h2-responsive product-name m-t-10"><strong>Cargo</strong></h5>
                                                        <input type="text" class="form-control" name="Cargo" placeholder="Cargo del empleado" required>
                                            </div>
                                            <div class="col-6">
                                            <h5 class="h2-responsive product-name m-t-10"><strong>No. Identificación</strong></h5>
                                                        <input type="text" class="form-control" name="identificacion" placeholder="CURP, INE, Etc..." required>
                                            </div>
                                        </div>
                                        <h5 class="h2-responsive product-name m-t-10"><strong>Dirección</strong></h5>
                                        <input type="text" class="form-control" name="Direccion" placeholder="Ingresa la dirección" required>

                                        <input type="hidden" name="id" value="<?php echo $id_empleado ?>">
                                        <input type="hidden" value="empleados" name="accion">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                        <button type="submit" class="btn btn-outline-info waves-effect waves-light"><i class="fas fa-save"> Registrar</i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal -->
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
    <!-- This is data table -->
    <script src="../assets/plugins/datatables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <?php
    if ($cont > 0) {
        echo "<script>swal('LISTO!', 'Empleado Registrada exitosamente', 'success')</script>";
    }
    if ($cont2 > 0) {
        echo "<script>swal('Alerta!', 'El empleado ya se encuentra registrado.')</script>";
    }
     ?>

    <script>
        $(function() {});

        $('#tabla').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script>
        function editar(id) {
            var nombre = $('#nombre' + id).val()
            var p_apellido = $('#p_apellido' + id).val()
            var s_apellido = $('#s_apellido' + id).val()
            var direccion = $('#direccion' + id).val()
            var nacimiento = $('#nacimiento' + id).val()
            var cargo = $('#cargo' + id).val()
            var telefono = $('#telefono' + id).val()


            $("#input_nombre").attr("value", nombre)
            $("#input_p_apellido").attr("value", p_apellido)
            $("#input_s_apellido").attr("value", s_apellido)
            $("#input_direccion").attr("value", direccion)
            $("#input_nacimiento").attr("value", nacimiento)
            $("#input_telefono").attr("value", telefono)
            $("#input_cargo").attr("value", cargo)



            $("#id_elemento").attr("value", id)


            $.ajax({
                    type: 'POST',
                    url: 'complementos/select_actividad.php',
                    data: {
                        'id': id_actividad
                    }
                })

                .done(function(actividad) {

                    $("#actividad").html(actividad)

                })
                .fail(function() {
                    alert('Hubo un error al cargar la unidad de cobro')
                })

        }
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- jQuery file upload -->
    <script src="../assets/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
</body>

</html>

<?php

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
} ?>