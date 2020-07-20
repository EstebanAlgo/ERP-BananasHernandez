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
    <title>Pagos</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Page plugins css -->
    <!-- page CSS -->
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

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
                        <h3 class="text-themecolor m-b-0 m-t-0">SISTEMA</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">ACTIVIDADES</a></li>
                            <li class="breadcrumb-item active">Pagos</li>
                        </ol>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->


                <?php
                $filas = '';
                $abono = 0;
                $total = 0;
                $totalA = 0;
                $totalP = 0;
                $statement = $conexion->prepare("SELECT * FROM empleado");
                $statement->execute();
                $empleados = $statement->fetchAll();
                foreach ($empleados as $fila) {

                    $id_empleado = $fila['id_empleado'];

                    $pago = 0;
                    $statement = $conexion->prepare("SELECT * FROM registro WHERE empleado='$id_empleado' AND semana='$semana'");
                    $statement->execute();
                    $registros = $statement->fetchAll();

                    foreach ($registros as $fila2) {

                        $pago = $pago + $fila2['total'];
                    }
                    $pendiente = $pago - $abono;
                    $statement = $conexion->prepare("SELECT * FROM pagos WHERE semana='$semana'  AND id_empleado=$id_empleado");
                    $statement->execute();
                    $semanas = $statement->fetchAll();

                    if (empty($semanas) == true) {

                        if ($pago > 0) {
                            $statement = $conexion->prepare("INSERT INTO pagos (id, id_empleado,semana, monto, abono, pendiente, status, responsable,fecha) VALUES (NULL, '$id_empleado', '$semana', '$pago', '$abono', '$pendiente', 'P','$id_usuario',NULL)");
                            $statement->execute();
                        }
                    }

                    foreach ($semanas as $fila) {
                        $status = $fila['status'];
                        $abono = $fila['abono'];
                        $pendiente = $pago - $abono;
                        if ($status == "P") {
                            $statement = $conexion->prepare("UPDATE pagos SET abono='0', pendiente='$pago',monto='$pago', status='P',fecha=NULL WHERE id_empleado='$id_empleado' AND semana='$semana'");
                            $statement->execute();
                        } elseif ($status == "A") {
                            // echo "<script>alert('PAGO:' +'$pago '+' ABONO:'+ '$abono'+' PENDIENTE:'+'$pendiente')</script>";
                            $statement = $conexion->prepare("UPDATE pagos SET abono='$abono', pendiente='$pendiente',monto='$pago', status='A',fecha=NULL WHERE id_empleado='$id_empleado' AND semana='$semana'");
                            $statement->execute();
                        }
                    }
                }


                $statement = $conexion->prepare("SELECT * FROM pagos WHERE semana='$semana'");
                $statement->execute();
                $registros = $statement->fetchAll();
                foreach ($registros as $key) {
                    $id_empleado = $key['id_empleado'];
                    $nombre_empleado = nombre($conexion, $id_empleado);
                    $monto = $key['monto'];
                    $pendiente = $key['pendiente'];
                    $abono = $key['abono'];
                    $status = $key['status'];

                    if ($status == "P") {
                        $status = "<span class='label label-danger'>POR PAGAR</span>";
                        $opciones = "
                   <input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
                   <input id='monto$id_empleado' type='hidden' value='$monto'>
                   <input id='abono$id_empleado' type='hidden' value='$abono'>
                      
                    <button data-toggle='modal' data-target='#abono'id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' ><i class='fas fa-donate'></i></button>
                    <button id='$id_empleado' onclick='envio(this.id,event)' class='btn btn-info btn-sm' title='Pagar' ><i class='fas fa-dollar-sign'></i></button>";
                    } elseif ($status == "A") {
                        $status = "<span class='label label-warning'>ABONADO</span>";
                        $opciones = "
                   <input id='empleado$id_empleado' type='hidden' value='$nombre_empleado'>
                   <input id='monto$id_empleado' type='hidden' value='$monto'>
                   <input id='abono$id_empleado' type='hidden' value='$abono'>
                     
                    <button data-toggle='modal' data-target='#abono' id='$id_empleado' onclick='llenado(this.id)' class='btn btn-success btn-sm' title='Abono' >
                    <i class='fas fa-donate'></i>
                    </button>";
                    } else {
                        $status = "<span class='label label-info'>PAGADO</span>";
                        $opciones = "<i class='fas fa-check-circle text-success'></i>";
                    }

                    $fecha = $key['fecha'];

                    $total = $total + $monto;
                    $totalA = $totalA + $abono;
                    $totalP = $totalP + $pendiente;

                    $filas .= "<tr id='fila$id_empleado'>
                      <td>$nombre_empleado</td>
                      <td>$monto</td>
                      <td>$abono</td>
                      <td>$pendiente</td>
                      <td>$status</td>
                      <td>$fecha</td>
                      <td>$opciones <a class='btn btn-inverse btn-sm' target='_blank' href='reporte_actividades.php?id=$id_empleado&semana=$semana'>
                      <i class='fas fa-address-book'></i></a>
                      </td>

                  </tr>";
                }


                ?>
                <?php

                function nombre($conexion, $id_empleado)
                {


                    $statement = $conexion->prepare("SELECT * FROM empleado WHERE id_empleado=$id_empleado");
                    $statement->execute();
                    $empleados = $statement->fetchAll();

                    foreach ($empleados as $fila2) {

                        $nombre = $fila2['nombre'] . " " . $fila2['p_apellido'] . " " . $fila2['s_apellido'];
                    }

                    return $nombre;
                }

                ?>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Relacion de pago a empleados semana <?php echo $semana ?></h4>
                            <h6 class="card-subtitle">Bananas Hernandez</h6>

                            <div class="col-12 col-md-6 offset-0 offset-md-6">
                                <form action="pagos.php" method="GET">
                                    <div class="form-group row">
                                        <label for="semana" class="col-12 col-md-4 col-form-label ">Semana a Consultar</label>
                                        <div class="col-12 col-md-6">


                                            <input class="form-control" type="week" value="<?php echo $n_semana ?>" name="semana">
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-info btn-sm mt-2">Consultar</button>
                                        </div>
                                    </div>
                                </form>


                            </div>

                            <div class="table-responsive" id="resultado">
                                <table id='example23' class='display nowrap table table-hover table-striped table-bordered  table-sm' cellspacing='0' width='100%'>
                                    <thead>
                                        <tr>
                                            <th>Empleado</th>
                                            <th>Monto</th>
                                            <th>Abono</th>
                                            <th>Pendiente</th>
                                            <th>Status</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>TOTAL</th>
                                            <th>$<?php echo $total ?></th>
                                            <th>$<?php echo $totalA  ?></th>
                                            <th>$<?php echo $totalP ?></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php echo $filas; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- sample modal content -->
                <div id="abono" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="vcenter">Registro de abono</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id="myCarousel3" class="carousel slide" data-ride="carousel" style="border: 2px solid #3FC3E3; padding: 1em;">
                                                <!-- Carousel items -->
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active flex-column">

                                                        <p class="text-info text-center"><i class="fas fa-user fa-2x text-info"></i>
                                                            <span id="id_nombreempleado"></span>
                                                        </p>
                                                        <h3 class="text-info"> Máximo a pagar $ <span id="id_pagoempleado" class="font-bold"></span></h3>
                                                        <div>
                                                            <input id="idabono" type="hidden">
                                                            <input id="abonar" type="number" class="form-control form-control-line" placeholder="Cantidad para abonar" required>
                                                        </div>
                                                        <div>
                                                            <button onclick="input()" id="id_continuar" class="btn btn-info btn-sm m-t-10" data-dismiss="modal">Continuar</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
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
    <script>
        function llenado(id) {
            var nombre = $('#empleado' + id).val(); //recuperar un valor
            var monto = $('#monto' + id).val();
            var abono = $('#abono' + id).val();

          
            monto=monto-abono;

            $('#id_nombreempleado').html(nombre); //asignar valor
            $('#id_pagoempleado').html(monto);
            $('#idabono').attr('value', id);
            $('#abonar').attr('value', monto);
            $('#abonar').attr('max', monto);
            $('#abonar').attr('min', 0);
        }
    </script>

    <script>
        function input() {
            var id = $('#idabono').val();
            var abono = $('#abonar').val();

            if (abono == "") {
                alert('por favor inserte la cantidada abonar')
            } else {

                $.ajax({
                        type: 'POST',
                        url: 'complementos/update_pagos.php',
                        data: {
                            'id': id,
                            'abono': abono,
                            'semana': <?php echo $semana ?>
                        }
                    })

                    .done(function(fila) {

                        $("#fila" + id).html(fila)
                        swal("ABONO REALIZADO!", "Se ha abonado exitosamente la cantidad de $" + abono + " al pago del trabajador.")

                    })
                    .fail(function() {
                        alert('Hubo un error al cargar los registros')
                    })
            }

        }


        function envio(id, e) {
            if (confirm('¿Esta seguro de que desea realizar el pago completo del trabajador?')) {
                var monto = $('#monto' + id).val();
                $.ajax({
                        type: 'POST',
                        url: 'complementos/status.php',
                        data: {
                            'id': id,
                            'monto': monto,
                            'semana': <?php echo $semana ?>
                        }
                    })
                    .done(function(fila) {
                        $("#fila" + id).html(fila)
                        swal("PAGO EXITOSO!", "Se ha realizado el pago completo al trabajador.", "success")
                    })
                    .fail(function() {
                        alert('Hubo un error al cargar la unidad de cobro')
                    })
            } else {
                e.preventDefault();
            }
        }
    </script>
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
    <script>
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script language="JavaScript">
        function pagar(e) {
            if (confirm('¿Esta seguro de que desea Realizar el pago completo del empleado?')) {
                document.borrar_usuario.submit();
            } else {
                e.preventDefault();
            }
        }
    </script>


</body>

</html>