 <?php 
    require('../../php/conexion.php');


$pagina = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1 ;
$paginaa=$pagina;

$postPorPagina = 20;

$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

$articulos = $conexion->prepare("
    SELECT SQL_CALC_FOUND_ROWS * FROM certificados 
    LIMIT $inicio, $postPorPagina
");

$articulos->execute();
$articulos = $articulos->fetchAll();

if (!$articulos) {
    header('Location: index.php');
}

$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

$numeroPaginas = ceil($totalArticulos / $postPorPagina);





$tabla_certificados="";



    $sintaxis="SELECT SQL_CALC_FOUND_ROWS *FROM certificados ORDER BY fecha_registro DESC LIMIT $inicio, $postPorPagina";

    
if($_POST)
{
    $b = isset($_POST['buscar']) ? (int)$_POST['buscar'] : "" ;
    $sintaxis="SELECT * FROM certificados WHERE folio LIKE '%$b%' OR remitente LIKE '%$b%' OR destino LIKE '%$b%' OR origen LIKE '%$b%' OR
               fecha_registro LIKE '%$b%' ORDER BY fecha_registro DESC";
               
}


 $tabla_certificados.="<table class='table table-info'>

                            <tr>
                                   <th>FOLIO</th>
                                   <th>CLIENTE</th>
                                   <th>DESTINO</th>
                                   <th>FECHA Y HORA</th>
                                   <th>ACCIÓN</th>

                            </tr>";

                        
    $statement=$conexion->prepare($sintaxis);
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $responsable=$fila['id_usuario'];   
    $tabla_certificados.= "<tr>";
    $tabla_certificados.= '<td>'.$fila['folio'].'</td>';
    $tabla_certificados.= '<td>'.$fila['remitente'].'</td>';
    $tabla_certificados.= '<td>'.$fila['destino'].'</td>';
    $tabla_certificados.= '<td>'.$fila['fecha_registro'].'</td>';

    if($tipo_usuario=='Administrador')
    {
         $tabla_certificados.= 
    '<td>'.
    '<form  class='.'boton_envio'.' action="editar_certificado.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button title='.'Editar'.'><i class="fas fa-edit editar"></i></button></form>
     <form class='.'boton_envio'.' action="formato_impresion.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button title='.'Imprimir'.'><i class="fas fa-print imprimir"></i></button></form>
    <form class='.'boton_envio'.' action="formato_descarga.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button title='.'Descargar'.'><i class="fas fa-download descargar"></i></button></form>
    <form class='.'boton_envio'.' action="../views/perfil_capturista.php" method="post"><input type="hidden" name="responsable" value='.$responsable.'><button title='.'Capturista'.'><i class="fas fa-user-edit"></i></button></form>
    <form class='.'boton_envio'.' action="borrar_certificado.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button onclick="pregunta(event)" title="Borrar"><i class="fas fa-trash"></i></button></form>'.
    '</td>';

    }

    else
    {    
        if($responsable==$id_usuario)
              {
                $complemento='<form class='.'boton_envio'.' action="editar_certificado.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button title='.'Editar'.'><i class="fas fa-edit editar"></i></button> </form>  ';
              }
              else{$complemento="";}

         $tabla_certificados.= 
    '<td>'.$complemento.
    '<form class='.'boton_envio'.' action="formato_impresion.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button title='.'Imprimir'.'><i class="fas fa-print imprimir"></i></button> </form>
    <form class='.'boton_envio'.' action="formato_descarga.php" method="post"><input type="hidden" name="id_certificado" value='.$fila['id_certificado'].'><button title='.'Descargar'.'><i class="fas fa-download descargar"></i></button> </form>'.
    '</td>';

    }

   
     }

$tabla_certificados.= "</tr>";

$paginada="<section class='paginacion'>
            <ul>
                <!-- Establecemos cuando el boton de 'Anterior' estara desabilitado -->"; 
                  if ($pagina == 1): 
                    $paginada.="<li class='disabled'>&laquo;</li>";
                   else:
                    $paginada.="<li><a href='?pagina=$pagina - 1'>&laquo;</a></li>";
                   endif; 

                $paginada.="<!-- Ejecutamos un ciclo para mostrar las paginas -->";
                 
                for ($i=1; $i <= $numeroPaginas ; $i++) { 
                    if ($pagina == $i) {
                        $paginada.="<li class='active'><a href='?pagina=$i'>$i</a></li>";
                    } else {
                        $paginada.="<li><a href='?pagina=$i'>$i</a></li>";
                    }
                }
                

                $paginada.="<!-- Establecemos cuando el boton de 'Siguiente' estara desabilitado -->";
                 if ($pagina == $numeroPaginas): 
                    $paginada.="<li class='disabled'>&raquo;</li>";
                 else: 
                    $paginada.="<li><a href='?pagina=$pagina + 1'>&raquo;</a></li>";
                 endif; 
            $paginada.="</ul>
        </section>";

   


 echo $paginaa.$tabla_certificados.'</table>'.$paginada;
 $tabla_certificados="";
     
                         

	  ?>