<?php 
require('../php/concentrado-cajas.php');

$total_enero=0; $total_febrero=0; $total_marzo=0; $total_abril=0; $total_mayo=0; $total_junio=0; 
$total_julio=0; $total_agosto=0; $total_septiembre=0; $total_octubre=0; $total_noviembre=0; $total_diciembre=0;



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-01%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_enero=$total_enero+$pivotecantidad;
    }

}


$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-02%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_febrero=$total_febrero+$pivotecantidad;
    }

}


$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-03%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_marzo=$total_marzo+$pivotecantidad;
    }

}


$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-04%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_abril=$total_abril+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-05%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_mayo=$total_mayo+$pivotecantidad;
    }

}

$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-06%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_junio=$total_junio+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-07%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_julio=$total_julio+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-08%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_agosto=$total_agosto+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-09%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_septiembre=$total_septiembre+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-10%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_octubre=$total_octubre+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-11%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_noviembre=$total_noviembre+$pivotecantidad;
    }

}



$statement=$conexion->prepare("SELECT *FROM certificados WHERE fecha_registro LIKE '%2018-12%'");
$statement->execute();
$certificado=$statement->fetchAll();
foreach ($certificado as $fila) 
{    
  $variedad=$fila['variedad'];
  $cantidad=$fila['cantidad'];

  $cadena_buscada= ')';
  $coincidencia_variedad = strpos($variedad, $cadena_buscada);//método de búsqueda de caracteres
  $cont_variedad= substr($variedad, 1,$coincidencia_variedad-1);//extracción del contador del 

    for ($i=0; $i <$cont_variedad ; $i++) 
    { 
      $cadena_buscada   = ']';
      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $total_diciembre=$total_diciembre+$pivotecantidad;
    }

}

 ?>
