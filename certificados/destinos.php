<?php
require('../php/conexion.php');
$registro=0;

if ($tipo_usuario=="null" OR $tipo_usuario=="Productor") 
 {
 header('Location: http://bananashernandez.com.com');
 }


 if($_POST)
 {
  
  $destino=$_POST['destino'];
    $cod_pais=$_POST['pais'];
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];

    $busqueda_pais=$conexion->prepare("SELECT * FROM paises WHERE Codigo='$cod_pais'"); 
    $busqueda_pais->execute();
    $pais=$busqueda_pais->fetchAll();
    foreach ($pais as $fila) {
           $nombre_pais=$fila['Pais'];
    }

    $registrar_destino=$conexion->prepare("INSERT INTO destinos(id_destino,destino,direccion,ciudad,pais,fecha_registro,id_usuario) VALUES 
                                               (null,'$destino','$direccion','$ciudad','$nombre_pais',null,'$id_usuario')");
    $registrar_destino->execute();
    $registro++;
 }
?>
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
<!DOCTYPE html>
<html lang="en">
<!-- DISEÑADOR Y PROGRAMADOR ING. ESTEBAN ALMANZA GONZÁLEZ,  EMAIL: almanza_1811@hotmail.com -->
<!-- DISEÑADOR Y PROGRAMADOR ING. GABRIELA RUIZ DE LEÓN,  EMAIL: garudele@gmail.com -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.ico">
    <title>DESTINOS</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo $tema ?>" id="theme" rel="stylesheet">
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

                                     if ($cont_alerta>0) {
                                    echo "<span class='heartbit'></span> <span class='point'></span> </div>";
                                     }
                                     else{
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

                                            for ($i=0; $i < $cont_alerta; $i++) { 

                                                $dia= substr($fecha[$i], 8,2);
                                                $mes= substr($fecha[$i], 5,2);
                                                $año= substr($fecha[$i], 0,4);
                                                $hora= substr($fecha[$i], 11,5);
                                                

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
                                                <p class="text-muted"><?php echo $nombre.' '.$p_apellido ?></p><a href="../views/perfil-usuario.php" class="btn btn-rounded btn-danger btn-sm">Perfil</a></div>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">CERTIFICADOS</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Registros</a></li>
                            <li class="breadcrumb-item active">Destinos</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->


                

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               
<!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Destinos</h4>
                                <h6 class="card-subtitle">Administrador de Destinos</h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm color-bordered-table info-bordered-table" style="text-align: center;" id="myTable">
                                        <thead class="table-primary">
                                            <tr>
                                   <th>DESTINO</th>
                                   <th>PAIS</th>
                                   <th>CIUDAD</th>
                                   <th>DIRECCIÓN</th>           
                                   <th>ACCIÓN</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                   <th>DESTINO</th>
                                   <th>PAIS</th>
                                   <th>CIUDAD</th>
                                   <th>DIRECCIÓN</th>           
                                   <th>ACCIÓN</th>
                                        </tfoot>
                                        <tbody>
                         <?php 
            //Consultas en mysql------------------------------------------------------------------------------------
                         $statement=$conexion->prepare('SELECT *FROM destinos');
                         $statement->execute();
                         $empresa=$statement->fetchAll();

                         foreach ($empresa as $fila) 
                         {
                           //echo $fila['usuario'].' Nombre: '.$fila['nombre'].' Tipo de usuario:'.$fila['tipo_usuario'].'<br>';
                           $accion="";
                           $id_destino=$fila['id_destino'];
                           echo "<tr>";
                           echo '<td>'.$fila['destino'].'</td>';
                           echo '<td>'.$fila['pais'].'</td>';
                           echo '<td>'.$fila['ciudad'].'</td>';
                           echo '<td>'.$fila['direccion'].'</td>';
                                  $responsable=$fila['id_usuario'];
                          
                          $accion.="<td>
                               <!-- Example single danger button -->
                                <div class='btn-group dropleft'>
                                    <button type='button' class='btn btn-outline-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        <i class='fas fa-th-list'></i>
                                    </button>
                                    <div class='dropdown-menu'>";
                          if($tipo_usuario=="Administrador")
                           {
                            $accion.="
  <form class='dropdown-item' style='display:inline-block;' action='../views/perfil_capturista.php' method='post'>
          <input type='hidden' value='$responsable' name='responsable'>
          <button data-toggle='tooltip' title='Capturista' class=' btn btn-outline-info btn-block'><i class='fas fa-address-card'></i></button>
          
  </form>";
                           }

                           $accion.="<form class='dropdown-item' style='display:inline-block;' action='actualizar_destino.php' method='post'>
          <input type='hidden' value='$id_destino' name='id_destino'>
          <button data-toggle='tooltip' title='Editar Información' class=' btn btn-outline-warning btn-block'><i class='fas fa-pencil-alt'></i></button>
          
  </form>

  <form class='dropdown-item' style='display:inline-block;' action='borrar_destino.php' method='post'>
          <input type='hidden' value='$id_destino' name='id_destino'>
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
    <script src="../assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>
    <?php if ($registro>0) {

         echo "<script>swal('HECHO!', 'Destino Registrado Exitosamente', 'success')</script>";
    } ?>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
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
</body>

</html>

