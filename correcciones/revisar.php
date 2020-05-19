 <?php 
    require('../php/conexion.php');
$buscar="";
$complemento="";
$tipo_folio="";
$folio_origen="No encontrado";
$folio_responsiva="No encontrado";
$folio_cloro="No encontrado";
$fecha="Sin Registrar";

if($_POST)
{
$update=$_POST['update'];
$tipo_folio=$_POST['tipo'];
$valor2=$_POST['valor2'];
$valor3=$_POST['valor3'];
$piv1=$_POST['piv1'];
$piv2=$_POST['piv2'];
$piv3=$_POST['piv3'];
}

    switch ($tipo_folio) {
        case 'origen':
         $complemento="
     <th scope='row'>$update</th>
      <td>$valor2</td>
      <td>$valor3</td>
      <td>
          <form action='actualizando.php' method='post'>
          <input type='hidden' value='$update' name='origen'>
          <input type='hidden' value='$piv2' name='responsiva'>
          <input type='hidden' value='$piv3' name='cloro'>
          <input type='hidden' value='$tipo_folio' name='tipo'>
          <input type='hidden' value='$piv1' name='piv1'>
          <input type='hidden' value='$piv2' name='piv2'>
          <input type='hidden' value='$piv3' name='piv3'>
             <input type='submit' value='Actualizar' class='btn btn-info'>
          </form>
      </td> 
      <h4>Actualizar el certificado de origen actualiza la relación Responsiva y Clorinación</h4><br>
      Así quedarían los folios.";
            break;
         case 'responsiva':
          $complemento="
     <th scope='row'>$valor2</th>
      <td>$update</td>
      <td>$valor3</td>
      <td>
          <form action='actualizando.php' method='post'>
          <input type='hidden' value='$valor2' name='origen'>
          <input type='hidden' value='$update' name='responsiva'>
          <input type='hidden' value='$valor3' name='cloro'>
          <input type='hidden' value='$tipo_folio' name='tipo'>
          <input type='hidden' value='$piv1' name='piv1'>
          <input type='hidden' value='$piv2' name='piv2'>
          <input type='hidden' value='$piv3' name='piv3'>
             <input type='submit' value='Actualizar' class='btn btn-info'>
          </form>
      </td> 
      <h4>Cambiar el folio de responsiva solo cambia su relación con el certificado de origen</h4><br>
      Así quedarían los folios.";

            break;
         case 'clorinacion':
          $complemento="
     <th scope='row'>$valor2</th>
      <td>$valor3</td>
      <td>$update</td>
      <td>
          <form action='actualizando.php' method='post'>
          <input type='hidden' value='$valor2' name='origen'>
          <input type='hidden' value='$valor3' name='responsiva'>
          <input type='hidden' value='$update' name='cloro'>
          <input type='hidden' value='$tipo_folio' name='tipo'>
          <input type='hidden' value='$piv1' name='piv1'>
          <input type='hidden' value='$piv2' name='piv2'>
          <input type='hidden' value='$piv3' name='piv3'>
             <input type='submit' value='Actualizar' class='btn btn-info'>
          </form>
      </td> 
      <h4>Cambiar el folio de clorinación solo cambia su relación con el certificado de origen</h4><br>
      Así quedarían los folios.";
            break;
        
        default:
            # code...
            break;
    }
       
    


$tabla="
<table class='table table-responsive-md' style='text-align:center;'>
  <thead>
    <tr class='table-primary'>
      <th scope='col'>Folio Origen</th>
      <th scope='col'>Carta Responsiva</th>
      <th scope='col'>Certificado Cloro</th>
      <th></th>
    </tr>
  </thead>
  <tbody style='color:black; background:white;'>
    <tr>
    $complemento
    </tr>
  </tbody>
</table>";
echo $tabla;

	  ?>