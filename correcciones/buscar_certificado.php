 <?php 
    require('../php/conexion.php');
$buscar="";
$sintaxis="";
$tipo_folio="";
$folio_origen="No encontrado";
$folio_responsiva="No encontrado";
$folio_cloro="No encontrado";
$fecha="Sin Registrar";
$id=0;
$complemento="";
$complemento2="";
$complemento3="";
if($_POST)
{
$buscar=$_POST['buscar'];
$tipo_folio=$_POST['tipo'];
}

    switch ($tipo_folio) {
        case 'origen':
    $statement=$conexion->prepare("SELECT * FROM certificados WHERE folio LIKE '%$buscar%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_origen=$fila['folio'];
    $fecha=$fila['fecha_registro'];
    $id=$fila['id_certificado'];
    $responsable=$fila['id_usuario'];
     }

    $statement=$conexion->prepare("SELECT * FROM responsiva WHERE folio_certificado LIKE '%$buscar%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_responsiva=$fila['id_responsiva'];   
     }

    $statement=$conexion->prepare("SELECT * FROM constancia_clorinacion WHERE folio_certificado LIKE '%$buscar%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_cloro=$fila['id_clorinacion'];   
     }

            break;
         case 'responsiva':

    $statement=$conexion->prepare("SELECT * FROM responsiva WHERE id_responsiva LIKE '%$buscar%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_responsiva=$fila['id_responsiva'];
    $folio_origen=$fila['folio_certificado'];   
     }

    $statement=$conexion->prepare("SELECT * FROM certificados WHERE folio LIKE '%$folio_origen%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_origen=$fila['folio'];
    $fecha=$fila['fecha_registro'];
    $id=$fila['id_certificado'];
    $responsable=$fila['id_usuario'];
     }

    $statement=$conexion->prepare("SELECT * FROM constancia_clorinacion WHERE folio_certificado LIKE '%$folio_origen%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_cloro=$fila['id_clorinacion'];   
     }

            break;
         case 'clorinacion':
    $statement=$conexion->prepare("SELECT * FROM constancia_clorinacion WHERE id_clorinacion LIKE '%$buscar%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_cloro=$fila['id_clorinacion'];
    $folio_origen=$fila['folio_certificado'];

     }

    $statement=$conexion->prepare("SELECT * FROM certificados WHERE folio LIKE '%$folio_origen%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_origen=$fila['folio'];
    $fecha=$fila['fecha_registro'];
    $id=$fila['id_certificado'];
    $responsable=$fila['id_usuario'];
     }

    $statement=$conexion->prepare("SELECT * FROM responsiva WHERE folio_certificado LIKE '%$folio_origen%' LIMIT 3");
    $statement->execute();
    $certificados=$statement->fetchAll();
    foreach ($certificados as $fila) 
    {
    $folio_responsiva=$fila['id_responsiva']; 
     }
            break;
        
        default:
            # code...
            break;
    }
       
    


if($tipo_usuario=="Administrador")
{

  if($folio_origen=="No encontrado")
  {
    $complemento="";
  }

  else
  {
    $complemento=
  "
  <form style='display:inline-block;' action='actualizar.php' method='post'>
          <input type='hidden' value='$folio_origen' name='origen'>
          <input type='hidden' value='$folio_responsiva' name='responsiva'>
          <input type='hidden' value='$folio_cloro' name='cloro'>
          <input type='hidden' value='$tipo_folio' name='tipo'>
          <button title='Editar Folio' class='btn btn-info'><i style='font-size:1.5em;' class='fas fa-list-ol'></i></button>
  </form>";
  }
  
}
if($id>0)
{
  $complemento2=
  "
  <form style='display:inline-block;' action='../certificados/formato_impresion.php' method='post'>
          <input type='hidden' value='$id' name='id_certificado'>
          <button data-toggle='tooltip' title='Imprimir' class='btn btn-dark'><i style='font-size:1.5em;' class='fas fa-print'></i></i></button>
          
  </form>
  <form style='display:inline-block;' action='../certificados/formato_descarga.php' method='post'>
          <input type='hidden' value='$id' name='id_certificado'>
          <button data-toggle='tooltip' title='Descargar' class='btn btn-success'><i style='font-size:1.5em;' class='fas fa-download'></i></button>
          
  </form>
  <form style='display:inline-block;' action='../certificados/formato_sobreescritura.php' method='post'>
          <input type='hidden' value='$id' name='id_certificado'>
          <button data-toggle='tooltip' title='Sobreescribir certificado en blanco' class='btn btn-warning'><i style='font-size:1.5em;' class='fas fa-file'></i></button>
          
  </form>
  ";

  if ($tipo_usuario=="Administrador" OR $id_usuario==$responsable){

  $complemento3=
  "
  <form style='display:inline-block;' action='../certificados/editar_certificado.php' method='post'>
          <input type='hidden' value='$id' name='id_certificado'>
          <button data-toggle='tooltip' title='Editar Certificado' class='btn btn-primary'><i style='font-size:1.5em;' class='fas fa-pen-square'></i></button>
          
  </form>
  <form style='display:inline-block;' action='../views/perfil_capturista.php' method='post'>
          <input type='hidden' value='$responsable' name='responsable'>
          <button data-toggle='tooltip' title='Perfil del Capturista' class='btn btn-inverse'><i style='font-size:1.5em; color:white;' class='fas fa-user'></i></button>
  </form>
  <form style='display:inline-block;' action='../certificados/borrar_certificado.php' method='post'>
          <input type='hidden' value='$id' name='id_certificado'>
          <button onclick='pregunta(event)' data-toggle='tooltip' title='Eliminar certificado' class='btn btn-danger'><i style='font-size:1.5em; color:white;' class='fas fa-trash-alt'></i></button>
  </form>
  ";
  # code...
}

}

$tabla="
<table class='table table-striped table-responsive-md table-sm'>
  <thead>
    <tr class='table-primary'>
      <th scope='col'>Folio Origen</th>
      <th scope='col'>Carta Responsiva</th>
      <th scope='col'>Certificado Cloro</th>
      <th scope='col'>Fecha</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <th scope='row'>$folio_origen</th>
      <td>$folio_responsiva</td>
      <td>$folio_cloro</td>
      <td>$fecha</td>
      <td>
        $complemento
        $complemento2
        $complemento3  
      </td>
    </tr>
  </tbody>
</table>";
echo $tabla;

	  ?>