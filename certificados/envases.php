<?php
require('../php/conexion.php');
$registro=0;

if ($tipo_usuario=="null" OR $tipo_usuario=="Productor") 
 {
  header('Location: http://platanerosoconusco.com');
 }

 if($_POST)
 {
  //header('Location: http://localhost/p%C3%A1gina/certificados/registro_usuarios.php');
    $envase=$_POST['envase'];
    $tipo_envase=$_POST['tipo_envase'];
    $registrar_envase=$conexion->prepare("INSERT INTO envases(id_envase,envase,grafica) VALUES (null,'$envase','$tipo_envase')");
    $registrar_envase->execute();
 $registro++;

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
    <title>Envases</title>
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
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema; ?>" id="theme" rel="stylesheet">
    <!--Query para llamar el menú -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--alerts CSS -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Información</a></li>
                            <li class="breadcrumb-item active">Envases</li>
                        </ol>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Inicio de contenido de la página -->
                <!-- ============================================================== -->
               
 <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Envases</h4>
                                <h6 class="card-subtitle">Administrador de Envases</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm color-bordered-table info-bordered-table" style="text-align: center;" id="myTable">
                                        <thead class="table-primary">
                                            <tr>
                                   <th>TIPO DE ENVASE</th>
                                   <th>Categoría</th>
                                   <th>ACCIÓN</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                   <th>TIPO DE ENVASE</th>
                                     <th>Categoría</th>
                                   <th>ACCIÓN</th>
                                        </tfoot>
                                        <tbody>
                         <?php 
            //Consultas en mysql------------------------------------------------------------------------------------
                         $statement=$conexion->prepare('SELECT *FROM envases');
                         $statement->execute();
                         $empresa=$statement->fetchAll();

                         foreach ($empresa as $fila) 
                         {
                           //echo $fila['usuario'].' Nombre: '.$fila['nombre'].' Tipo de usuario:'.$fila['tipo_usuario'].'<br>';
                           $accion="";
                           $id_envase=$fila['id_envase'];
                           echo "<tr>";
                           echo '<td>'.$fila['envase'].'</td>';
                           $tipo=$fila['grafica'];
                           

                           switch ($tipo) {
                             case 'C':
                               echo "<td>CAJAS</td>";
                               break;
                            case 'DEDO':
                               echo "<td>DEDO SUELTO</td>";
                               break;
                            case 'RA':
                               echo "<td>RACIMOS</td>";
                               break;
                            case 'RE':
                               echo "<td>REJAS</td>";
                               break;
                            case 'REMA':
                               echo "<td>REJAS DE MADERA</td>";
                               break;
                            case 'REPLAS':
                               echo "<td>REJAS DE PLÁSTICO</td>";
                               break;
                             default:
                               echo "<td>Por definir</td>";
                               break;
                           }
                          
                          $accion.="<td>
                               <!-- Example single danger button -->
                                <div class='btn-group dropleft'>
                                    <button type='button' class='btn btn-outline-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='fas fa-th-list'></i>
                                    </button>
                                    <div class='dropdown-menu'>";

                           $accion.="<form class='dropdown-item' style='display:inline-block;' action='actualizar_envase.php' method='post'>
          <input type='hidden' value='$id_envase' name='id_envase'>
          <button data-toggle='tooltip' title='Editar Información' class=' btn btn-outline-warning btn-block'><i class='fas fa-pencil-alt'></i></button>
          
  </form>

  <form class='dropdown-item' style='display:inline-block;' action='borrar_envase.php' method='post'>
          <input type='hidden' value='$id_envase' name='id_envase'>
          <button onclick='eliminar(event)' data-toggle='tooltip' title='Eliminar Registro' class=' btn btn-outline-danger btn-block'><i style='font-size:1em;' class='fas fa-trash-alt'></i></button>
  </form>
                                        <div class='dropdown-divider'></div>
                                        <span text-info>Elige una acción</span>
                                    </div>
                                </div>
                                <!-- Example single danger button -->
                                        
                             </td></tr>";
                             echo $accion;
                         }


             ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
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
    <!-- Sweet-Alert  -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
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
    <?php 
   if ($registro>0) {
       echo "<script>swal('HECHO!', 'Envase Registrado Exitosamente', 'success')</script>";
   }
     ?>
    
    <script language="JavaScript"> 
function eliminar(e){ 
   if (confirm('¿Esta seguro de que desea ELIMINAR el registro seleccionado?')){ 
    document.borrar_usuario.submit();
}
else{
    e.preventDefault();
}
} 
</script>
    <!-- end - This is for export functionality only -->
<script>
        $('#myTable').DataTable({
            
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
</body>

</html>