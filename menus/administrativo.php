    <?php require('../php/conexion.php') ?>
   <aside id="menu" class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                  <li><a href="../dashboard/" class=" waves-effect waves-dark" aria-expanded="false"> <i class="fas fa-home"></i><span>  Inicio</span></a></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fab fa-wpforms"></i><span
                                    class="hide-menu">Certificados</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../certificadoss.php"><i class="fas fa-calendar-plus"></i> Nuevo Certificado</a></li>
                                <li><a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-plus"></i> ALTAS</a>
                                    <ul aria-expanded="false" class="collapse">
                                        
                                        <li><a href="../certificados/registro_remitente.php">Nuevo Remitente</a></li>
                                        <li><a href="../certificados/registro_producto.php">Nuevo Producto</a></li>
                                        <li><a href="../certificados/registro_envase.php">Nuevo Envase</a></li>
                                        <li><a href="../certificados/registro_origen.php">Nueva Finca</a></li>
                                        <li><a href="../certificados/registro_vehiculo.php">Nuevo Vehículo</a></li>
                                        <li><a href="../certificados/registro_chofer.php">Nuevo Conductor</a></li>
                                        <li><a href="../certificados/registro_destino.php">Nuevo Destino</a></li>
                                    </ul>
                                </li>
                                <li><a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-book"></i> REGISTROS</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="../certificados/certificados.php">Certificados</a></li>
                                        <li><a href="../certificados/remitentes.php">Remitentes</a></li>
                                        <li><a href="../certificados/productos.php">Productos</a></li>
                                        <li><a href="../certificados/envases.php">Envases</a></li>
                                        <li><a href="../certificados/fincas.php">Fincas</a></li>
                                        <li><a href="../certificados/vehiculos.php">Vehículos</a></li>
                                        <li><a href="../certificados/conductores.php">Conductores</a></li>
                                        <li><a href="../certificados/destinos.php">Destinos</a></li>
                                    </ul>
                                </li>
                                <li><a href="../certificados/busqueda_avanzada.php"><i class="fas fa-calendar-plus"></i> Reportes</a></li>
                                <li><a href="../egresos/"><i class="fas fa-calendar-plus"></i> Egresos</a></li>
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fab fa-leanpub"></i><span
                                    class="hide-menu"> Actividades</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../actividades/">Registro de Costos</a></li>
                                <li><a href="../actividades/actividades.php">Actividades</a></li>
                                <li><a href="../actividades/unidades.php">Unidades de cobro</a></li>
                                <li><a href="../actividades/empleados.php">Empleados</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- End Bottom points-->
        </aside>