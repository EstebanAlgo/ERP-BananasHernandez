<?php
require('../php/conexion.php');

if ($tipo_usuario=="null" OR $tipo_usuario=="Productor") 
 {
  header('Location: http://bananashernandez.com');
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
    <title>Certificados</title>
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
                                    <li><a href="../views/config.php"><i class="ti-settings"></i> Configurar Usuario</a></li>
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
                        <h3 class="text-themecolor">SERVICIOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Certificados</a></li>
                            <li class="breadcrumb-item active">Recientes</li>
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
                                <h4 class="card-title">Certificados</h4>
                                <h6 class="card-subtitle">Últimos</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm " style="text-align: center;" id="myTable">
                                        <thead class="table-success">
                                            <tr>
                                   <th>FOLIO</th>
                                   <th>CLIENTE</th>
                                   <th>DESTINO</th>
                                   <th>FECHA Y HORA</th>
                                   <th>ACCIÓN</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                   <th>FOLIO</th>
                                   <th>CLIENTE</th>
                                   <th>DESTINO</th>
                                   <th>FECHA Y HORA</th>
                                   <th>ACCIÓN</th>
                                        </tfoot>
                                        <tbody>
                         <?php 
    $cont=0;
    $cont_total=0;
    $statement=$conexion->prepare("SELECT count(*) FROM certificados");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
       $cont_total=$fila[0];
       $cont=$cont_total-200;
    }  
    $statement=$conexion->prepare("SELECT *FROM certificados ORDER BY fecha_registro ASC ");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $accion="";    
    $cont++;  
    $responsable=$fila['id_usuario'];
    $id_certificado=$fila['id_certificado'];
    $td="";
    echo "<tr>";
    echo "<td>".$fila['folio']."</td>";
    echo "<td>".$fila['remitente']."</td>";
    echo "<td>".$fila['destino']."</td>";
    echo "<td>".$fila['fecha_registro']."</td>";

    if ($tipo_usuario=="Administrador") {

        $accion="<td><!-- Example single danger button -->
                                <div class='btn-group dropleft'>
                                    <button type='button' class='btn btn-outline-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='fas fa-th-list'></i>
                                    </button>
                                    <div class='dropdown-menu'>
        
     <form  style='display:inline-block;' class='dropdown-item' action='editar_certificado.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-info btn-block' title='Editar'><i class='fas fa-edit editar'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='formato_impresion.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-success btn-block' title='Imprimir'><i class='fas fa-print imprimir'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='formato_descarga.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-primary btn-block' title='Descargar'><i class='fas fa-download descargar'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='reporte_embarque.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-secondary btn-block' title='Reporte de salida'><i class='fas fa-print'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='constancia_origen.php' method='post'>
        <input type='hidden' name='id' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-inverse btn-block' title='Sobreescribir Constancia de Origen'><i class='fas fa-file'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='../views/perfil_capturista.php' method='post'>
        <input type='hidden' name='responsable' value='$responsable'>
           <button data-toggle='tooltip' class=' btn btn-outline-warning btn-block' title='Capturista'><i class='fas fa-id-card-alt'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='borrar_certificado.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-danger btn-block' onclick='pregunta(event)' title='Borrar'><i class='fas fa-trash'></i></button>
    </form>'

    <div class='dropdown-divider'></div>
                                        <span text-info>Elige una acción</span>
                                    </div>
                                </div>
                                <!-- Example single danger button -->
    </td>";
    }
    else{
           $accion.="<td>
                               <!-- Example single danger button -->
                                <div class='btn-group dropleft'>
                                    <button type='button' class='btn btn-outline-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='fas fa-th-list'></i>
                                    </button>
                                    <div class='dropdown-menu'>";
                          if($responsable==$id_usuario)
                           {
                            $accion.="
  <form  style='display:inline-block;' class='dropdown-item' action='editar_certificado.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-info btn-block' title='Editar'><i class='fas fa-edit editar'></i></button>
    </form>";
                           }

                           $accion.="
    <form style='display:inline-block;' class='dropdown-item' action='formato_impresion.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-success btn-block' title='Imprimir'><i class='fas fa-print imprimir'></i></button>
    </form>
    <form style='display:inline-block;' class='dropdown-item' action='formato_descarga.php' method='post'>
        <input type='hidden' name='id_certificado' value='$id_certificado'>
           <button data-toggle='tooltip' class=' btn btn-outline-primary btn-block' title='Descargar'><i class='fas fa-download descargar'></i></button>
    </form>
                                        <div class='dropdown-divider'></div>
                                        <span text-info>Elige una acción</span>
                                    </div>
                                </div>
                                <!-- Example single danger button -->
                                        
                             </td>";

    }

 
                             echo $accion."</tr>"; 




    
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