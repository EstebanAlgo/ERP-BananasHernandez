<?php
require('../php/conexion.php');

    $usuario="";
    $usuarioV = "";
    $nombre="";
    $p_apellido="";
    $s_apellido="";
    $rfc="";
    $password="";
    $nacimiento="";
    $correo="";
    $telefono="";
    $ciudad="";
    $direccion="";
    $password = "";
    $text="";

if($tipo_usuario!='Administrador')
{
    header('Location: ../certificados/usuarios.php');

}
if($_POST)

    
{  
    $usuario=$_POST['usuario'];
    $usuarioV = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $tipo_nuevo_usuario=$_POST['tipo_usuario'];
    $nombre=$_POST['nombre'];
    $p_apellido=$_POST['p_apellido'];
    $s_apellido=$_POST['s_apellido'];
    $rfc=$_POST['rfc'];
    $password=$_POST['password'];
    $nacimiento=$_POST['nacimiento'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];
    $password = hash('sha512', $password);
    $text=$usuario.'<br>'.$usuarioV.'<br>'.$tipo_nuevo_usuario.'<br>'.$nombre.' '.$p_apellido.' '.$s_apellido.' '.$rfc.'<br>'.$password.'<br>'.$nacimiento.'<br>'.$correo.'<br>'.
                    $telefono.'<br>'.$ciudad.'<br>'.$direccion;
    $statement=$conexion->prepare("SELECT *FROM usuarios WHERE usuario='$usuarioV' LIMIT 1");
    $statement->execute();
     $usuarios=$statement->fetchAll();
     $confirmacion=0;
                         foreach ($usuarios as $fila)
                         {
                                $confirmacion=1;
                         } 
    if($confirmacion>0)
    {
            
    }
    else
    {
     $registrar_usuario=$conexion->prepare("INSERT INTO usuarios(id_usuario,usuario,tipo_usuario,nombre,p_apellido,s_apellido,rfc,password,nacimiento,correo,telefono,ciudad,direccion,tema,fecha_registro) VALUES
                                                 (null,'$usuario','$tipo_nuevo_usuario','$nombre','$p_apellido','$s_apellido','$rfc','$password','$nacimiento','$correo','$telefono','$ciudad','$direccion','',null)");

    $registrar_usuario->execute();
    echo "<script>alert('Usuario Agregado exitosamente');</script>";
    header('usuarios.php');

    }
} 

?>

<!-- DISEÑADOR Y PROGRAMADOR ING. ESTEBAN ALMANZA GONZÁLEZ 
     EMAIL: almanza_1811@hotmail.com -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.ico">
    <title>Registro de usuarios</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="../assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
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

<body class="fix-header fix-sidebar card-no-border">
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
                    <a class="navbar-brand" href="http://platanerosoconusco.com">
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
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                                $image_perfil='';
                                $menu="";
                                switch ($tipo_usuario) {
                                     case 'Administrador':
                                         $image_perfil="../assets/images/users/administrador.png";
                                         $menu="../menus/administrador.php";
                                         break;
                                     case 'Administrativo':
                                         $image_perfil="../assets/images/users/administrativo.png";
                                         $menu="../menus/administrativo.php";
                                         break;
                                    case 'Productor':
                                          $image_perfil="../assets/images/users/productor.jpg";
                                          $menu="../menus/productor.php";
                                         break;
                                    case 'Contabilidad':
                                          $image_perfil="../assets/images/users/contabilidad.jpg";
                                          $menu="../menus/contabilidad.php";
                                         break;
                                    case 'Pista':
                                          $image_perfil="../assets/images/users/empleados.jpg";
                                          $menu="../menus/pista.php";
                                         break;
                                    case 'Bascula':
                                          $image_perfil="../assets/images/users/empleados.jpg";
                                          $menu="../menus/bascula.php";
                                         break;
                                     
                                 } 
                                 ?>
                                <img src="<?php echo $image_perfil; ?>" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo $image_perfil; ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $usuario; ?></h4>
                                                <p class="text-muted"><?php echo $tipo_usuario; ?></p><a href="../views/perfil-usuario.php" class="btn btn-rounded btn-danger btn-sm">Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-email"></i> Correo</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Configurar Usuario</a></li>
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
        <!-- Barra lateral derecha - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
     <div id="barra_navegacion">
           
     </div>

  <script type="text/javascript">
   $("#barra_navegacion").load('<?php echo $menu; ?>');
  </script>
        <!-- ============================================================== -->
        <!-- End Barra lateral derecha - style you can find in sidebar.scss  -->
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
                        <h3 class="text-themecolor">SISTEMA</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a></li>
                            <li class="breadcrumb-item active">Añadir Nuevo usuario</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Inicio de contenido de la página -->
                <!-- ============================================================== -->
               
 <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Añadir Nuevo Usuario</h4>
                            </div>
                            <div class="card-body">
                                <form action="registro_usuarios.php" class="form-horizontal" method="post">
                                    <div class="form-body">
                                        <h3 class="box-title">Información Requerida</h3>
                                        <hr class="m-t-0 m-b-40">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5 text-info">USUARIO:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" placeholder="Inserta el nombre de usuario" name="usuario" required>
                                                        <?php 
                                                            if($_POST){
                                                            if($confirmacion>0)
                                                            { 
                                                                echo "<span class='label label-light-danger label-rounded'> *$usuario ya existe en el sistema</span> <br>";

                                                            } 
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5 text-info">Nombre:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" placeholder="Inserta el Nombre" name="nombre" value="<?php echo $nombre; ?>"required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-5 text-info">Primer Apellido</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" placeholder="Inserta el Apellido" name="p_apellido" value="<?php echo $p_apellido; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6" >
                                                <div class="form-group row ">
                                                    <label class="control-label text-right col-md-5 text-info">Apellido Materno</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" placeholder="Inserta el Apellido" name="s_apellido" value="<?php echo $s_apellido; ?>" required>
                                                    </div>
                                                </div>
                                        
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row ">
                                                    <label class="control-label text-right col-md-5 text-info">RFC:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" placeholder="Inserta el RFC" name="rfc" value="<?php echo $rfc; ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row ">
                                                    <label class="control-label text-right col-md-5 text-info">Contraseña:</label>
                                                    <div class="col-md-7">
                                                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                        <div class="form-group row ">
                                                    <label class="control-label text-right col-md-9 text-purple">Selecciona el tipo de usuario:</label>
                                    <div class="col-md-3 text-right">
                                    <select class="selectpicker" data-style="btn-info btn-outline-primary btn-block" required name="tipo_usuario">
                                            <option data-tokens="Administrativo" value="Administrativo">Administrativo</option>
                                            <option data-tokens="productor" value="Productor">Productor</option>
                                            <option data-tokens="Tecnico" value="Tecnico">Técnico</option>
                                            <option data-tokens="Bascula" value="Bascula">Báscula</option>
                                            <option data-tokens="Contabilidad" value="Contabilidad">Contabilidad</option>
                                            <option data-tokens="Pista" value="Pista">Pista</option>
                                            <option data-tokens="Administrador" value="Administrador">Administrador</option>
                                        </select>
                                    </div>
                                    </div>
                                                

                                            </div>
                                            
    
                                            <!--/span-->
                                        </div>
                                          <!--/row-->
                                        <hr class="m-t-0 m-b-40">
                                        <h3 class="box-title">Información Complementaria</h3>
                                        <!--/row-->
                                        <div class="row">
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row ">
                                                    <label class="control-label text-right col-md-5 text-success">Fecha de Nacimiento:</label>
                                                    <div class="col-md-7">
                                                        <input type="date" class="form-control" placeholder="Inserta el RFC" name="nacimiento" value="<?php echo $nacimiento; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row ">
                                                    <label class="control-label text-right col-md-5 text-success">Email:</label>
                                                    <div class="col-md-7">
                                                        <input type="email" class="form-control" placeholder="Correo Electrónico" name="correo" value="<?php echo $correo; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                          <!--/row-->
                                          <div class="row">
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row has-info">
                                                    <label class="control-label text-right col-md-5 text-success">Télefono:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control phone-inputmask" id="phone-mask" placeholder="Inserta Número telefónico" name="telefono" value="<?php echo $telefono; ?>">
                                                    <small class="text-muted m-l-5">(999) 999-9999</small>
                                                    </div>
                                                    
                                               </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row ">
                                                    <label class="control-label text-right col-md-5 text-success">Ciudad:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" value="<?php echo $ciudad; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                          <!--/row-->

                                          <div class="row align-items-center">
                                            <!--/span-->
                                            <div class="col-md-10">
                                                <div class="form-group row has-info">
                                                    <label class="control-label text-right col-md-2 text-success">Dirección:</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" placeholder="Inserta la Dirección" name="direccion" value="<?php echo $direccion; ?>">
                                                    </div>
                                                    
                                               </div>
                                            </div>
                                            <!--/span-->
                                            <!--/span-->
                                            <div class="col-md-2">
                                                <img class="img-fluid img-thumbnail" src="../images/icos-sistema/nuevousuario.png" alt="Usuario">
                                            </div>
                                            <!--/span-->
                                        </div>
                                          <!--/row-->
                                    </div>
                                    <hr>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <button type="submit" class="btn btn-info"> <i class="far fa-check-circle"></i> Registrar</button>
                                                        <button type="button" class="btn btn-inverse" type="reset" value="Corregir" onClick="history.back()"> <i class="far fa-times-circle"></i> Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> </div>
                                        </div>
                                    </div>
                                </form>
                                <?php echo $text; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- Fin de contenido de la Página -->
                <!-- ============================================================== -->
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
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="../assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="js/mask.init.js"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>