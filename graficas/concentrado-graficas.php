<?php
require('../php/conexion.php');

//Extracción de Cajas---------------------------------------------------------------------------------------------------
                 $statement=$conexion2->prepare('SELECT *FROM preciofruta');
                 $statement->execute();
                 $precios=$statement->fetchAll();

                         foreach ($precios as $fila)
                         { 
                           $primera=$fila['primera'];
                           $segunda=$fila['segunda'];
                           $racimo=$fila['racimo'];
                           $macho=$fila['macho'];
                           $semana=$fila['semana'];

                         }
//FIN Extracción de Cajas----------------------------------------------------------------------------------------------

//Extracción de número de usuarios------------------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from usuarios");
                 $statement->execute();
                 $usuarios=$statement->fetchAll();

                         foreach ($usuarios as $fila)
                         { 
                           $numero_usuarios=$fila[0];
                         }
//FIN Extracción de número de usuarios--------------------------------------------------------------------------------

//Extracción de número de origenes------------------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from origen");
                 $statement->execute();
                 $fincas=$statement->fetchAll();

                         foreach ($fincas as $fila)
                         { 
                           $numero_fincas=$fila[0];
                         }
//FIN Extracción de número de origenes--------------------------------------------------------------------------------

//Extracción de número de destinos------------------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from destinos");
                 $statement->execute();
                 $destinos=$statement->fetchAll();

                         foreach ($destinos as $fila)
                         { 
                           $numero_destinos=$fila[0];
                         }
//FIN Extracción de número de destinos--------------------------------------------------------------------------------

//Extracción de número de productos------------------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from producto");
                 $statement->execute();
                 $productos=$statement->fetchAll();

                         foreach ($productos as $fila)
                         { 
                           $numero_productos=$fila[0];
                         }
//FIN Extracción de número de productos--------------------------------------------------------------------------------


//Extracción de número de certificados------------------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from certificados");
                 $statement->execute();
                 $certificados=$statement->fetchAll();

                         foreach ($certificados as $fila)
                         { 
                           $numero_certificados=$fila[0];
                         }
                $divisor_certificado=$numero_certificados/100;
//FIN Extracción de número de certificados--------------------------------------------------------------------------------

//Extracción de número de certificados en el 2018-------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from certificados WHERE fecha_registro LIKE '%2018%'");
                 $statement->execute();
                 $certificados_2018=$statement->fetchAll();

                         foreach ($certificados_2018 as $fila)
                         { 
                           $numero_certificados2018=$fila[0];
                         }
                $porcentaje_certificados2018=$numero_certificados2018/$divisor_certificado;
                $porcentaje_certificados2018=round($porcentaje_certificados2018);
//FIN Extracción de número de certificados en el 2018---------------------------------------------------------------------

//Extracción de número de certificados en el 2018-------------------------------------------------------------------------
                 $statement=$conexion->prepare("SELECT count(*) from certificados WHERE fecha_registro LIKE '%2019%'");
                 $statement->execute();
                 $certificados_2019=$statement->fetchAll();

                         foreach ($certificados_2019 as $fila)
                         { 
                           $numero_certificados2019=$fila[0];
                         }
                $porcentaje_certificados2019=$numero_certificados2019/$divisor_certificado;
                $porcentaje_certificados2019=round($porcentaje_certificados2019);
//FIN Extracción de número de certificados en el 2018---------------------------------------------------------------------


?>
