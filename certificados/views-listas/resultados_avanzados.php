<?php 
    require('../../php/conexion.php');

    $tabla_certificados="";
    $f1=$_POST['f1'];
    $f2=$_POST['f2'];
    $valor=$_POST['valor'];
    $tipo=$_POST['tipo'];
    $sintaxis="";
    $leyenda="";

    
if($tipo=="remitente")
{
    $leyenda="<span class='label label-info m-t-10 m-b-10'>Todos los certificados del remitente <b> $valor</b> que comprenden de la fecha $f1 hasta $f2 </span>"; 
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND remitente LIKE '%$valor%'  ORDER BY fecha_registro DESC";
}

if($tipo=="origen")
{
    $leyenda="<span class='label label-info m-t-10 m-b-10'>Todos los certificados del origen <b> $valor </b> que comprenden de la fecha $f1 hasta $f2 </span>";
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND origen LIKE '%$valor%' ORDER BY fecha_registro DESC";
}

if($tipo=="destino")
{
    $leyenda="<span class='label label-info m-t-10 m-b-10'>Todos los certificados del destino <b> $valor </b> que comprenden de la fecha $f1 hasta $f2</span>"; 
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND destino LIKE '%$valor%' ORDER BY fecha_registro DESC";
}



 

                        
    $statement=$conexion->prepare($sintaxis);
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $tabla_certificados.= "<tr>";
    $tabla_certificados.= '<td>'.$fila['folio'].'</td>';
    $tabla_certificados.= '<td>'.$fila['remitente'].'</td>';
    $tabla_certificados.= '<td>'.$fila['destino'].'</td>';
    $tabla_certificados.= '<td>'.$fila['fecha_registro'].'</td>';
    $tabla_certificados.= 
    '<td>'.
"<form style='display:inline-block;' action='formato_impresion.php' method='post'><input type='hidden' name='id_certificado' value=".$fila['id_certificado']."><button class='btn btn-info btn-sm' title='Imprimir'><i class='fas fa-print'></i></button> 
    </form>
    <form style='display:inline-block;' action='formato_descarga.php' method='post'><input type='hidden' name='id_certificado' value=".$fila['id_certificado'].">
        <button class='btn btn-success btn-sm' title='Descargar'><i class='fas fa-download'></i></button> 
    </form>
    </td>

    </tr>";
     }

$tabla="<table class='table table-sm table-hover table-responsive full-color-table full-inverse-table hover-table' style='height: 430px;'>
                        <thead>
                            <tr style='background: #0e569d; color:white;'>
                                   <th>FOLIO</th>
                                   <th>CLIENTE</th>
                                   <th>DESTINO</th>
                                   <th>FECHA Y HORA</th>
                                   <th>ACCIÓN</th>

                            </tr>
                        </thead>
                        <tbody style='color:black; font-size:0.7em;'>
                        $tabla_certificados
                        </tbody>";   

$certificados=$f1.$f2.$valor;
 echo $leyenda."<br>".$tabla;
 $tabla_certificados="";
	  ?>