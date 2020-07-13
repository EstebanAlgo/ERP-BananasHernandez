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
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];
    $finca = $_POST['finca'];
    $id_solicitud = $_POST['mayor'];

    $cont = 0;

    $statement = $conexion->prepare("SELECT MAX(id_solicitud) FROM solicitud");
    $statement->execute();
    $idmax = $statement->fetchAll();
    foreach ($idmax as $fila) {
        $mayor = $fila[0] + 1;
    }
    if ($id_solicitud == $mayor) {
        $statement = $conexion->prepare("INSERT INTO solicitud (id_solicitud,id_material,cantidad,id_finca,status,fecha,usuario) VALUES (NULL,'$producto','$cantidad','$finca','PENDIENTE','$fecha','$id_usuario')");
        $statement->execute();
        $cont++;
    }
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
    <title>Solicitud de Material</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">SISTEMA</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Materiales</a></li>
                            <li class="breadcrumb-item active">Solicitud</li>
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
                $mes = date('m');

                if ($tipo_usuario == "Administrador") {
                    $sintaxis = "SELECT * FROM solicitud WHERE fecha LIKE '%-$mes-%'";
                } else {
                    $sintaxis = "SELECT * FROM solicitud WHERE usuario=$id_usuario AND fecha LIKE '%-$mes-%'";
                }
                $Filas = "";
                $statement = $conexion->prepare($sintaxis);
                $statement->execute();
                $cobros = $statement->fetchAll();
                foreach ($cobros as $fila) {
                    $id_solicitud = $fila['id_solicitud'];
                    $id_material = $fila['id_material'];
                    $material = material($conexion, $id_material);
                    $cantidad = $fila['cantidad'];
                    $id_finca = $fila['id_finca'];
                    $finca = finca($conexion, $id_finca);
                    $status = $fila['status'];
                    $fecha = $fila['fecha'];

                    $dia = substr($fecha, 8, 2);
                    $mes = substr($fecha, 5, 2);
                    $año = substr($fecha, 0, 4);

                    if ($status == "PENDIENTE") {

                        $Filas .= "<tr>
                <td>SM$id_solicitud</td>
                <th>$material</th>
                <th>$cantidad</th>
                <th>$finca</th>
                <th><span class='label label-danger'>$status</span></th>
                <th>$dia/$mes/$año</th>
                <td>
                     
                     <input type='hidden' id='solicitud$id_solicitud' value='$id_solicitud'>
                     <input type='hidden' id='material$id_solicitud' value='$material'>
                     <input type='hidden' id='cantidad$id_solicitud' value='$cantidad'>
                     <input type='hidden' id='finca$id_solicitud' value='$finca'>
                     <input type='hidden' id='fecha$id_solicitud' value='$fecha'> 
                     
                     <span style='display:inline-block;' onClick='editar(this.id)' class='btn btn-outline-info btn-sm' id='$id_solicitud' data-toggle='modal' data-target='#modal-actualizar' > <i class='fas fa-plus'></i> Añadir Ingreso </span> 
                     <form style='display:inline-block;' method='POST' action='complementos/delete.php'>
                     <input type='hidden' value='$id_solicitud' name='id'/>
                     <input type='hidden' value='solicitud' name='accion'/>
                     <button onclick='eliminar(event)' class='btn btn-outline-dark btn-sm'>
                      <i class='fas fa-window-close'></i> Cancelar Pedido 
                      </button>
                     </form>
                     
                </td>
          </tr>";
                    } else if($status=='CANCELADO') {
                        $Filas .= "<tr>
                <td>SM$id_solicitud</td>
                <th>$material</th>
                <th>$cantidad</th>
                <th>$finca</th>
                <th><span class='label label-warning'>$status</span></th>
                <th>$dia/$mes/$año</th>
                <td></td>
          </tr>";
                    }
                    else {
                        $Filas .= "<tr>
                <td>SM$id_solicitud</td>
                <th>$material</th>
                <th>$cantidad</th>
                <th>$finca</th>
                <th><span class='label label-success'>$status</span></th>
                <th>$dia/$mes/$año</th>
                <td></td>
          </tr>";
                    }
                } ?>

                <div class="row">
                    <div class="col-12 ">

                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Solicitudes </h4>
                                <h6 class="card-subtitle">Exportar datos: Copiar, CSV, Excel, PDF e Imprimir</h6>
                                <div class="row">
                                    <div class="col text-right">
                                        <button alt="default" data-toggle="modal" data-target="#agregar-proveedor" class="btn btn-sm btn-info" style="padding: 1px 40px; font-size:1.3em;"><i class=" fas fa-user-plus"></i></button>
                                        <button alt="default" data-toggle="modal" data-target="#agregar-solicitud" class="btn btn-sm btn-info" style="padding: 1px 40px; font-size:1.3em;"><i class="fas fa-shopping-cart"></i></button></div>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class=" text-center display nowrap table table-hover table-striped table-bordered color-bordered-table inverse-bordered-table table-sm" cellspacing="0" width="100%">
                                        <thead class="bg-inverse">
                                            <tr>
                                                <th>SOLICITUD</th>
                                                <th>MATERIAL</th>
                                                <th>CANTIDAD</th>
                                                <th>FINCA</th>
                                                <th>STATUS</th>
                                                <th>FECHA</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>SOLICITUD</th>
                                                <th>MATERIAL</th>
                                                <th>CANTIDAD</th>
                                                <th>FINCA</th>
                                                <th>STATUS</th>
                                                <th>FECHA</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php echo $Filas ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL AGREGAR SOLICITUD -->
                <div id="agregar-solicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <form action="solicitud.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Solicitud de Material</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-10 col-md-6 offset-1 offset-md-6">
                                            <label class="control-label">Fecha</label>
                                            <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" name="fecha">
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-12 col-md-6">
                                            <label class="control-label">Producto:</label>
                                            <select name="producto" class="btn btn-outline-dark  btn-block">
                                                <?php
                                                $statement = $conexion->prepare('SELECT *FROM material');
                                                $statement->execute();
                                                $materiales = $statement->fetchAll();
                                                foreach ($materiales as $fila) {
                                                    $nombre_material = $fila['nombre'];
                                                    $id_material = $fila['id_material'];
                                                    echo "<option value='$id_material'>$nombre_material</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="control-label">Cantidad</label>
                                            <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" required>
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col">
                                            <label class="control-label ">Finca:</label>
                                            <select name="finca" class="btn  btn-outline-dark btn-block">
                                                <?php
                                                $statement = $conexion->prepare('SELECT *FROM origen');
                                                $statement->execute();
                                                $fincas = $statement->fetchAll();

                                                foreach ($fincas as $fila) {
                                                    $nombre_finca = $fila['nombre_finca'];
                                                    $id_finca = $fila['id_origen'];
                                                    echo "<option value='$id_finca'>$nombre_finca</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <?php
                                    $statement = $conexion->prepare("SELECT MAX(id_solicitud) FROM solicitud");
                                    $statement->execute();
                                    $idmax = $statement->fetchAll();
                                    foreach ($idmax as $fila) {
                                        $mayor = $fila[0] + 1;
                                    }
                                    ?>
                                    <input type="hidden" name="mayor" value="<?php echo $mayor; ?>">

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button class="btn btn-danger waves-effect waves-light">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.MODAL AGREGAR SOLICITUD -->
                <!--MODAL APROBAR SOLICITUD -->
                <div id="modal-actualizar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title"> Editar Información</h4>
                            </div>
                            <form action="complementos/actualizar_almacen.php" method="post">
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="social-widget">
                                                    <div class="soc-header box-twitter"><i class="fas fa-cart-plus"></i> <span id="material"></span></div>
                                                    <div class="soc-content">
                                                        <div class="col-4 b-r">
                                                            <h4 class="font-medium"><span id="fincaaprobar"></span></h4>
                                                            <h5 class="text-muted">FINCA</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h4 class="font-medium"><span id="fechaaprobar"></span></h4>
                                                            <h5 class="text-muted">FECHA</h5>
                                                        </div>
                                                        <div class="col-4">
                                                            <h4 class="font-medium"><span id="solicitud"></span></h4>
                                                            <h5 class="text-muted">SOLICITUD</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label for="recipient-name" class="control-label">CANTIDAD A INGRESAR:</label>
                                                <input type="number" step="0.1" class="form-control" id="input_cantidad" name="cantidad">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="recipient-name" class="control-label">PROVEEDOR:</label>
                                                <select name="proveedor" id="input_proveedor" class="form-control" required>
                                                    <option>Selecciona un proveedor</option>
                                                    <?php
                                                    $statement = $conexion->prepare("SELECT * FROM proveedor");
                                                    $statement->execute();
                                                    $proveedores = $statement->fetchAll();
                                                    foreach ($proveedores as $key) {
                                                        $nombre = $key['nombre'];
                                                        echo "<option value='$nombre'>$nombre</option>";
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>

                                        <input type="hidden" id="id_elemento" name="id">
                                        <input type="hidden" value="ingresos" name="accion">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                        <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-notes-medical"> CONFIRMAR</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.MODAL APROBAR SOLICITUD -->
                <!--Modal Añadir PROVEEDOR -->
                <div id="agregar-proveedor" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; border-radius: 20px;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" style="background: url('../assets/images/gallery/categoria.jpg'); background-repeat: no-repeat; background-size: 100%;">
                            <div class="row">
                                <div class="col-10 col-md-4 offset-1  m-t-30 bg-light" style="height: 450px; border-radius: 10px; border: 5px solid rgba(0, 0, 0, 0.1);">
                                    <div class="form-group m-t-20">
                                        <form action="productos.php" method="POST">
                                            <h3 class="title h1-responsive text-info">Registro de Proveedor</h3>
                                            <hr>
                                            <div class="form-group offset-1">
                                                <label class="control-label">Proveedor</label>
                                                <input type="text" required id="nombre_proveedor" class="form-control form-control-danger" placeholder="Inserta el nombre" name="categoria">
                                                <?php
                                                $statement = $conexion->prepare('SELECT  MAX(id_proveedor) FROM proveedor');
                                                $statement->execute();
                                                $constancia = $statement->fetchAll();
                                                foreach ($constancia as $fila) {
                                                    $id_proveedor = $fila[0] + 1;
                                                }
                                                ?>
                                                <input type="hidden" name="id" value="<?php echo $id_proveedor ?>">
                                                <input type="hidden" name="accion" value="proveedores">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                                <button type="submit" class="btn btn-outline-info waves-effect waves-light"><i class="fas fa-save" onclick="agregarCategoria()"> Registrar</i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class='table-responsive bg-light m-t-30' style="height: 450px; border-radius: 10px; border: 5px solid rgba(0, 0, 0, 0.1);">
                                        <table class='table table-bordered table-striped'>
                                            <thead class="bg-inverse">
                                                <tr>
                                                    <th>PROVEEDORES</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-sm text-dark">
                                                <?php

                                                $statement = $conexion->prepare("SELECT * FROM proveedor");
                                                $statement->execute();
                                                $table = $statement->fetchAll();
                                                foreach ($table as $fila) {
                                                    $proveedor = $fila['nombre'];
                                                    $id_proveedor = $fila['id_proveedor'];
                                                    echo "<tr>
			                                                  <td>$proveedor</td>
                                                              <td>
                                                                       <input type='hidden' id='nombreProveedor$id_proveedor' value='$proveedor'>
                                                                       <span  class='btn btn-outline-inverse' id='proveedor$id_proveedor' onClick='editarProveedor(this.id)'  > <i class='fas fa-pencil-alt'></i> Editar</span>
                                                                       
                                                                       <form action='complementos/delete.php' method='post' style='display:inline-block;'>
                                                                       <input type='hidden' name='id' value='$id_proveedor'>
                                                                       <input type='hidden' name='accion' value='proveedores'> 
                                                                       <button onclick='eliminar(event)' class='btn btn-outline-danger' id='Agregar'> <i class='fas fa-edit'></i> Eliminar </button>
                                                                       </form>
                                                                </td>
			                                            </tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-10 offset-1 offset-md-1 col-md-5  m-t-40 m-b-40">


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.modal Añadir PROVEEDOR -->

                <!-- Modal Actualizar PROVEEDOR -->
                <div id="modal-actualizar-proveedor" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content" style="border: 10px solid">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title"> Editar Información</h4>
                            </div>
                            <form action="complementos/updates.php" method="post">
                                <div class="modal-body">
                                    <h1 class="h1-responsive text-info"><strong>Editar Proveedor</strong></h1>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Nombre de la categoria:</label>
                                        <input type="text" class="form-control" id="input_nombre_proveedor" name="nombre">
                                        <input type="hidden" id="id_elemento_proveedor" name="id">
                                        <input type="hidden" value="proveedores" name="accion">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                        <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-save"> Guardar Cambios</i></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.Modal Actualizar PROVEEDOR -->

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
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <?php
    if ($cont > 0) {
        echo "<script>swal('REGISTRO EXITOSO!', 'Solicitud agregada exitosamente','success')</script>";
    }
    ?>
    <script>
        function editar(id) {
            var solicitud = $('#solicitud' + id).val()
            var material = $('#material' + id).val()
            var cantidad = $('#cantidad' + id).val()
            var finca = $('#finca' + id).val()
            var fecha = $('#fecha' + id).val()
            //alert (finca+fecha)
            $("#material").html(material)
            $("#fincaaprobar").html(finca)
            $("#fechaaprobar").html(fecha)
            $("#solicitud").html("SM" + solicitud)

            $("#input_cantidad").attr("value", cantidad)


            $("#id_elemento").attr("value", id)

        }

        function editarProveedor(id) {
            id = id.substr(9, 1);
            var nombre = $('#nombreProveedor' + id).val()

            $("#input_nombre_proveedor").attr("value", nombre)
            $("#id_elemento_proveedor").attr("value", id)

        }
    </script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script language="JavaScript">
        function eliminar(e) {
            if (confirm('¿Esta seguro de que desea CANCELAR el registro seleccionado?')) {
                document.borrar_usuario.submit();
            } else {
                e.preventDefault();
            }
        }
    </script>
</body>

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
function material($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre'];
    }

    return $resultado;
}
function solicitud($conexion, $id)
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
    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre'] . " " . $filas['p_apellido'] . " " . $filas['s_apellido'];
    }

    return $resultado;
}
function tipo_usuario($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['tipo_usuario'];
    }

    return $resultado;
}

function codigo($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $precios = $statement->fetchAll();
    foreach ($precios as $filas) {
        $resultado = $filas['codigo_producto'];
    }

    return $resultado;
}

function unidad($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $precios = $statement->fetchAll();
    foreach ($precios as $filas) {
        $resultado = $filas['unidad'];
    }

    return $resultado;
}

function descripcion($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM material WHERE id_material='$id'");
    $statement->execute();
    $precios = $statement->fetchAll();
    foreach ($precios as $filas) {
        $resultado = $filas['descripcion'];
    }

    return $resultado;
}

?>