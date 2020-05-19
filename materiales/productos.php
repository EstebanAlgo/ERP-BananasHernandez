<?php
require('../php/conexion.php');
$image_perfil = '';
$menu = "";
$cont = 0;
$cont2 = 0;
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
    $accion = $_POST['accion'];
    $id = $_POST['id'];

    //echo "<script>alert('$id')</script>";
    require('./complementos/adds.php');
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
    <link rel="icon" sizes="16x16" href="../assets/images/logo.ico">
    <title>PRODUCTOS</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTable Core CSS -->
    <link href="../assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Gotu&display=swap" rel="stylesheet">
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
        <div id="barra_navegacion"></div>
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
                <div class="row page-titles ">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">SISTEMA</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Materiales</a></li>
                            <li class="breadcrumb-item active">Productos</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="container">
                    <div class="row">
                        <div class="col card">
                            <div class="card-header card-info " style="margin-top:1em; ">
                                <h4 class="m-b-0 text-white">PRODUCTOS</h4>
                            </div>
                            <div class="car-body">
                                <div class="row">
                                    <div class="col text-right mt-3">
                                        <button class="btn btn-sm m-b-20 m-t-20 " style="background:  #2766ae; color: white; font-size: 0.9em; " data-toggle="modal" data-target="#modal-categoria"><i class="fas fa-file-medical"></i> Añadir Categoría</button>
                                        <button class="btn btn-sm m-b-20 m-t-20 " style="background:  #2766ae; color: white; font-size: 0.9em; " data-toggle="modal" data-target="#modal-agregar-producto"><i class="fas fa-cube"></i> Registrar Producto</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tabla" class='table'>
                                        <thead class="bg-inverse text-white p-30">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Stock Mínimo</th>
                                                <th>Código</th>
                                                <th>Categoría</th>
                                                <th>Info</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark table-sm" style="font-family: 'Gotu', sans-serif;">
                                            <?php
                                            $filas = "";
                                            $statement = $conexion->prepare("SELECT * FROM material");
                                            $statement->execute();
                                            $table = $statement->fetchAll();
                                            foreach ($table as $fila) {
                                                $id = $fila['id_material'];
                                                $cantidad = cantidad($conexion, $id);
                                                $fecha = $fila['fecha_alta'];
                                                $dia = substr($fecha, 8, 2);
                                                $mes = substr($fecha, 5, 2);
                                                $año = substr($fecha, 0, 4);
                                                $fecha = $dia . '/' . $mes . '/' . $año;
                                                $nombre = $fila['nombre'];
                                                $descripcion = $fila['descripcion'];
                                                $unidad = $fila['unidad'];
                                                $limite = $fila['limite'];
                                                $codigo = $fila['codigo_producto'];
                                                $id_categoria = $fila['id_categoria'];
                                                $categoria = categoria($conexion, $id_categoria);
                                                $filas .= "
                                                <tr style='margin-top:2em;'>                                            
                                                     <th>$nombre</th>
                                                     <th>$cantidad</th>
                                                     <th>$limite</th>
                                                     <th>$codigo</th>
                                                     <th>$categoria</th>
                                                     <th>
                                                     <button class='btn btn-outline-info pt-0 pb-0 mytooltip'> <i class='fas fa-info'></i><span class='tooltip-content5'>
                                                     <span class='tooltip-text3'><span class='tooltip-inner2' style='font-size:0.7em; padding:0px;' >
                                                     <strong>$nombre</strong><br /> 
                                                     <strong>Folio: </strong>$id<br /> 
                                                     <strong>Descripción: </strong>$descripcion<br />
                                                     <strong>Registro: </strong>$fecha<br />  
                                                     <strong>Unidad: </strong>$unidad<br /> 
                                                     </span></span></span>
                                                     </button>
                                                     </th>
                                                     <th>
                                                     <input type='hidden' id='nombre$id' value='$nombre'>
                                                     <input type='hidden' id='id_categoria$id' value='$id_categoria'>
                                                     <input type='hidden' id='descripcion$id' value='$descripcion'>
                                                     <input type='hidden' id='unidad$id' value='$unidad'>
                                                     <input type='hidden' id='limite$id' value='$limite'>
                                                     <div class='btn-group'>
                                                     <button type='button' class='btn btn-outline-dark btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                         <i class='fa fa-list'></i>
                                                     </button>
                                                     <div class='dropdown-menu text-center text-white'>
                                                         <button id='$id' onClick='editar(this.id)'  class='dropdown-item btn btn-info' data-toggle='modal' data-target='#modal-actualizar-producto'><i class='fas fa-edit text-white'> Editar</i></button>
                                                         <div class='dropdown-divider'></div>
                                                         <form action='complementos/delete.php' method='post' style='display:inline-block;'>
                                                             <input type='hidden' name='id' value='$id'>
                                                             <input type='hidden' name='accion' value='productos'>
                                                             <button onclick='eliminar(event)' class='text-white dropdown-item btn btn-danger'> <i class='fas fa-trash-alt'></i> Eliminar </button>
                                                         </form>
                                                         
                                                     </div>
                                                 </div>
                                                     </th>
                                                </tr>";
                                            }
                                            echo $filas;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

            <!-- Modal Agregar Producto -->
            <div id="modal-agregar-producto" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; border-radius: 20px;">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="background: url('../assets/images/gallery/almacen.jpg'); background-repeat: no-repeat; background-size: 100%;">
                        <div class="row">
                            <div class="col-10 offset-1 offset-md-1 col-md-5 bg-light m-t-40 m-b-40" style="height: 450px; border-radius: 10px; border: 5px solid rgba(0, 0, 0, 0.1);">
                                <!-- Form para agregar producto -->
                                <form method="POST" action="productos.php">
                                    <div class="col-12">
                                        <div class="card-outline-info">
                                            <div class="card-header">
                                                <h4 class="text-white">Alta de Material</h4>
                                            </div>
                                        </div>
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="control-label">Nombre</label>
                                                    <input required type="text" class="form-control" placeholder="Inserte nombre del producto" id="nombre" name="nombre">
                                                </div>
                                            </div>
                                            <div class="row m-t-15">
                                                <div class="col">
                                                    <label class="control-label">Fecha</label>
                                                    <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha" name="fecha">
                                                </div>
                                                <div class="col">
                                                    <label class="control-label">Descripción</label>
                                                    <input type="text" class="form-control" placeholder="Inserte descripción del producto" id="descripcion" name="descripcion">
                                                </div>
                                            </div>
                                            <div class="row m-t-15">
                                                <div class="col">
                                                    <label class="control-label">Unidad</label>
                                                    <input required type="text" class="form-control" placeholder="Bolsa,Pieza, etc..." id="unidad" name="unidad">
                                                </div>
                                                <div class="col">
                                                    <label class="control-label">Limite de Stock</label>
                                                    <input required type="number" class="form-control" placeholder="Inserte Limite de Stock" id="limite" name="limite">
                                                </div>
                                            </div>
                                            <div class="row m-t-15 ">
                                                <div class="col text-right">
                                                    <label class="control-label text-right col-md-5 text-info">Categoria:</label>
                                                    <select id="categoria" name="categoria" class="form-control col-md-6 btn btn-outline-dark">
                                                        <?php
                                                        $statement = $conexion->prepare('SELECT *FROM categoria');
                                                        $statement->execute();
                                                        $materiales = $statement->fetchAll();

                                                        foreach ($materiales as $fila) {
                                                            $nombre = $fila['nombre'];
                                                            $id = $fila['id_categoria'];
                                                            echo "<option value='$id'>$nombre</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <?php
                                                    $statement = $conexion->prepare('SELECT  MAX(id_material) FROM material');
                                                    $statement->execute();
                                                    $constancia = $statement->fetchAll();
                                                    foreach ($constancia as $fila) {
                                                        $id_material = $fila[0] + 1;
                                                    }
                                                    ?>
                                                    <input type="hidden" name="id" value="<?php echo $id_material ?>">
                                                    <input type="hidden" value="productos" name="accion">
                                                </div>
                                            </div>
                                            <div class="row text-right m-t-15">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-success" id="agregar"> <i class="fa fa-check"></i> AGREGAR</button>
                                                    <div class="col-8" style="display: inline-block;">
                                                        <a href="vista_productos.php" class="btn btn-lg btn-outline-info mytooltip"><i class="fas fa-people-carry"></i> Productos<span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">Vista de todos los<br /> productos registrados</span></span></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.Modal Agregar Producto -->

            <!-- Modal Actualizar Producto -->
            <div id="modal-actualizar-producto" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content" style="border: 10px solid">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"> Editar Información</h4>
                        </div>
                        <form action="complementos/updates.php" method="post">
                            <div class="modal-body">
                                <h1 class="h1-responsive text-info"><strong>Editar Producto</strong></h1>
                                <div class="form-group">


                                    <label for="recipient-name" class="control-label">Producto:</label>
                                    <input type="text" class="form-control" id="input_producto" name="nombre">

                                    <label for="recipient-name" class="control-label">Categoria:</label>
                                    <select class="form-control" id="select_categoria" name="id_categoria"></select>

                                    <label for="recipient-name" class="control-label">Unidad:</label>
                                    <input type="text" class="form-control" id="input_unidad" name="unidad">

                                    <label for="recipient-name" class="control-label">Descripción:</label>
                                    <input type="text" class="form-control" id="input_descripcion" name="descripcion">

                                    <label for="recipient-name" class="control-label">Cantidad Límite para alerta:</label>
                                    <input type="text" class="form-control" id="input_limite" name="limite">



                                    <input type="hidden" id="id_elemento" name="id">
                                    <input type="hidden" value="materiales" name="accion">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-save"> Guardar Cambios</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.Modal Actualizar Producto -->

            <!--Modal Añadir Categoría -->
            <div id="modal-categoria" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none; border-radius: 20px;">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="background: url('../assets/images/gallery/categoria.jpg'); background-repeat: no-repeat; background-size: 100%;">
                        <div class="row">
                            <div class="col-10 col-md-4 offset-1  m-t-30 bg-light" style="height: 450px; border-radius: 10px; border: 5px solid rgba(0, 0, 0, 0.1);">
                                <div class="form-group m-t-20">
                                    <form action="productos.php" method="POST">
                                        <h3 class="title h1-responsive text-info">Registro de Categoría</h3>
                                        <hr>
                                        <div class="form-group offset-1">
                                            <label class="control-label">Categoría</label>
                                            <input type="text" required id="nombre_categoria" class="form-control form-control-danger" placeholder="Inserta el nombre" name="categoria">
                                            <?php
                                            $statement = $conexion->prepare('SELECT  MAX(id_categoria) FROM categoria');
                                            $statement->execute();
                                            $constancia = $statement->fetchAll();
                                            foreach ($constancia as $fila) {
                                                $id_categoria = $fila[0] + 1;
                                            }
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $id_categoria ?>">
                                            <input type="hidden" name="accion" value="categorias">
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
                                                <th>CATEGORÍAS</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-sm text-dark">
                                            <?php

                                            $statement = $conexion->prepare("SELECT * FROM categoria");
                                            $statement->execute();
                                            $table = $statement->fetchAll();
                                            foreach ($table as $fila) {
                                                $categoria = $fila['nombre'];
                                                $id_categoria = $fila['id_categoria'];
                                                echo "<tr>
			                                                  <td>$categoria</td>
                                                              <td>
                                                                       
                                                                       <input type='hidden' id='nombreCategoria$id_categoria' value='$categoria'>
                                                                       <span onClick='editarCategoria(this.id)' class='btn btn-outline-info' id='$id_categoria' data-toggle='modal' data-target='#modal-actualizar-categoria' > <i class='fas fa-pencil-alt'></i> Editar </span>
                                                                       
                                                                       <form action='complementos/delete.php' method='post' style='display:inline-block;'>
                                                                       <input type='hidden' name='id' value='$id_categoria'>
                                                                       <input type='hidden' name='accion' value='categorias'>
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
            <!-- /.modal Añadir Categoría -->

            <!-- Modal Actualizar Categoria -->
            <div id="modal-actualizar-categoria" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content" style="border: 10px solid">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"> Editar Información</h4>
                        </div>
                        <form action="complementos/updates.php" method="post">
                            <div class="modal-body">
                                <h1 class="h1-responsive text-info"><strong>Editar Categoría</strong></h1>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Nombre de la categoria:</label>
                                    <input type="text" class="form-control" id="input_nombre_categoria" name="nombre">
                                    <input type="hidden" id="id_elemento_categoria" name="id">
                                    <input type="hidden" value="categorias" name="accion">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fas fa-save"> Guardar Cambios</i></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.Modal Actualizar Categoria -->

        </div>
        <!-- /Modal Actualizar Categoria -->
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
    <!-- end - This is for export functionality only -->
    <script>
        $('#tabla').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <?php
    if ($cont > 0) {
        echo "<script>swal('LISTO!', 'Producto Registrado exitosamente', 'success')</script>";
    }
    if ($cont2 > 0) {
        echo "<script>swal('LISTO!', 'Categoria Registrada con éxito', 'success')</script>";
    }
    ?>

    <script>
        $('#agregar').on('click', function() {
            var fecha = $('#fecha').val()
            var nombre = $('#nombre').val()
            var descripcion = $('#descripcion').val()
            var unidad = $('#unidad').val()
            var limite = $('#limite').val()
            var categoria = $('#categoria').val()
            if (nombre == "") {
                swal("DATOS VACIOS!", "Inserta el nombre del producto para continuar.")
            } else if (unidad == "") {
                swal("DATOS VACIOS!", "Inserta la unidad del producto.")
            } else if (limite == "") {
                swal("DATOS VACIOS!", "Inserta limite de productos en Stock.")
            }
        })

        function agregarCategoria() {
            var nombre = $('#nombre_categoria').val();

            if (nombre == "") {
                swal("DATOS VACIOS!", "Inserta el nombre de la categoría para continuar.")
            }
        }
    </script>
    <script>
        function editar(id) {
            var producto = $('#nombre' + id).val()
            var id_categoria = $('#id_categoria' + id).val()
            var unidad = $('#unidad' + id).val()
            var descripcion = $('#descripcion' + id).val()
            var codigo = $('#limite' + id).val()
            //alert(producto)
            $("#input_producto").attr("value", producto)
            $("#input_unidad").attr("value", unidad)
            $("#input_descripcion").attr("value", descripcion)
            $("#input_limite").attr("value", codigo)
            //LLenado de categoria------------------------------
            $.ajax({
                    type: 'POST',
                    url: 'complementos/select_categoria.php',
                    data: {
                        'id': id_categoria
                    }
                })
                .done(function(categoria) {
                    $("#select_categoria").html(categoria)
                })
                .fail(function() {
                    alert('Hubo un error al cargar la unidad de cobro')
                }) //--------------------------------------------------
            $("#id_elemento").attr("value", id)
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
    <script>
        function editarCategoria(id) {
            var nombre = $('#nombreCategoria' + id).val()
            $("#input_nombre_categoria").attr("value", nombre)
            $("#id_elemento_categoria").attr("value", id)

        }
    </script>
</body>

</html>


<?php
function categoria($conexion, $id)
{
    $resultado = "";
    $statement = $conexion->prepare("SELECT * FROM categoria WHERE id_categoria='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $filas['nombre'];
    }

    return $resultado;
}

function cantidad($conexion, $id)
{
    $resultado = 0;
    $statement = $conexion->prepare("SELECT * FROM ingreso WHERE id_material='$id'");
    $statement->execute();
    $resultados = $statement->fetchAll();
    foreach ($resultados as $filas) {
        $resultado = $resultado + $filas['cantidad'];
    }

    return $resultado;
}

?>