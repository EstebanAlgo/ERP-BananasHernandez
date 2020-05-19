<?php
    
    $conexion = new mysqli('localhost','root','','bananashernandez',3306);
	if (mysqli_connect_errno()) {
    	printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
    	exit();
	}


$tipo=$_POST['reporte'];
$valor=$_POST['buscar'];
$f1=$_POST['fecha1'];
$f2=$_POST['fecha2'];
$sintaxis="";
$leyenda="";
$texto="";
     $dia= substr($f1, 8,2);
     $mes= substr($f1, 5,2);
     $año= substr($f1, 0,4);

     $dia2= substr($f2, 8,2);
     $mes2= substr($f2, 5,2);
     $año2= substr($f2, 0,4);
    $periodo='PERIODO '.$dia.'/'.$mes.'/'.$año.' al '.$dia2.'/'.$mes2.'/'.$año2;

if($tipo=="remitente")
{
    $leyenda='Reporte de '.$valor; 
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND remitente LIKE '%$valor%'  ORDER BY fecha_registro DESC";
    $titulosColumnas = array('FOLIO', 'VARIEDAD', 'ENVASE', 'CANTIDAD','P/UNIT','P/TOTAL','ORIGEN','DESTINO','FECHA');
    $reporte='Reporte del remitente "'.$valor.'" '.$periodo;
}

if($tipo=="origen")
{
    $leyenda='Reporte de "'.$valor.'"';
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND origen LIKE '%$valor%' ORDER BY fecha_registro DESC";
    $titulosColumnas = array('FOLIO', 'VARIEDAD', 'ENVASE', 'CANTIDAD','P/UNIT','P/TOTAL','REMITENTE','DESTINO','FECHA');
    $reporte='Reporte de la finca '.$valor.' '.$periodo;
}

if($tipo=="destino")
{
    $leyenda='Reporte de "'.$valor.'"';
    $sintaxis="SELECT * FROM certificados WHERE  fecha_registro BETWEEN '$f1' AND '$f2' AND destino LIKE '%$valor%' ORDER BY fecha_registro DESC";
    $texto="DESTINOS";
    $titulosColumnas = array('FOLIO', 'VARIEDAD', 'ENVASE', 'CANTIDAD','P/UNIT','P/TOTAL','REMITENTE','ORIGEN','FECHA');
    $reporte='Reporte del destino "'.$valor.'" '.$periodo;
}
    


	$resultado = $conexion->query($sintaxis);
	if($resultado->num_rows > 0 )
	{
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'excel/Classes/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();
		$gdImage = imagecreatefrompng('../assets/images/logo.png');//Logotipo
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(116);

	$objDrawing->setCoordinates('A2');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Ing. Esteban Almanza González") //Autor
							 ->setLastModifiedBy("Ing. Esteban Almanza González") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel")
							 ->setSubject("Reporte Excel")
							 ->setDescription("Reporte certificados")
							 ->setKeywords("reporte remitentes fincas")
							 ->setCategory("Reporte excel");
    

		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:I1')
        		    ->mergeCells('A2:B7')
        		    ->mergeCells('C2:I2')
        		    ->mergeCells('C3:I3')
        		    ->mergeCells('C4:F4')
        		    ->mergeCells('G4:I4')
        		    ->mergeCells('C6:I6')
        		    ->mergeCells('C5:I5')//ESPACIO EN BLANCO
        		    ->mergeCells('C7:I7');

						
		// Se agregan los titulos del reporte

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1','BANANAS HERNÁNDEZ')
					->setCellValue('C2',  'R.F.C. BHE180126FR1')
					->setCellValue('C3',  'SAN JOSÉ EL AMATE CALLE S/N HUEHUETÁN, CHIAPAS CP:30673')
					->setCellValue('C4',  'Tel: (962) 626-40-13')
					->setCellValue('G4',  'EMAIL: gerencia@bananashernandez.com')
					->setCellValue('C6',  $leyenda)
					->setCellValue('C7',  $periodo);
       
       $objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A8',  $titulosColumnas[0])
		->getColumnDimension('A')->setWidth(10);

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('B8',  $titulosColumnas[1])
		->getColumnDimension('B')->setWidth(15);

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('C8',  $titulosColumnas[2])
		->getColumnDimension('C')->setWidth(20);

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('D8',  $titulosColumnas[3])
		->getColumnDimension('D')->setWidth(10);

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('E8',  $titulosColumnas[4])
		->getColumnDimension('E')->setWidth(10);

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('F8',  $titulosColumnas[5])
		->getColumnDimension('F')->setWidth(10);

		
    if($tipo=="remitente")
    {
      $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('G8',  $titulosColumnas[6])
    ->getColumnDimension('G')->setWidth(20);
    }
    else
    {
     $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('G8',  $titulosColumnas[6])
    ->getColumnDimension('G')->setWidth(50);
    }

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('H8',  $titulosColumnas[7])
		->getColumnDimension('H')->setWidth(25);

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('I8',  $titulosColumnas[8])
		->getColumnDimension('I')->setWidth(10);

		
		//Se agregan los datos de los alumnos
		$i = 9;
		$x=0;
		while ($fila = $resultado->fetch_array()) {
               
               $remitente=$fila['remitente'];
               $variedad=$fila['variedad'];
               $envase=$fila['envase'];
               $cantidad=$fila['cantidad'];
               $peso=$fila['peso'];
               $volumen=$fila['volumen'];
               $origen=$fila['origen'];
               $destino=$fila['destino'];

     $dia= substr($fila['fecha_registro'], 8,2);
     $mes= substr($fila['fecha_registro'], 5,2);
     $año= substr($fila['fecha_registro'], 0,4);      

     $cadena_buscada=')';
     $coincidencia_variedad = strpos($variedad, $cadena_buscada);//encontrar la coincidencia
     $cont_productos= substr($variedad, 1,$coincidencia_variedad-1);//extraccón del número de iteraciones
     $tamaño_variedad=strlen($variedad);
     $variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad);

     $coincidencia_origen = strpos($origen, $cadena_buscada);//encontrar la coincidencia
     $cont_origen= substr($origen, 1,$coincidencia_origen-1);//extraccón del número de iteraciones
     $tamaño_origen=strlen($origen);
     $origen=substr($origen,$coincidencia_origen+1,$tamaño_origen);
     
     for ($j=0; $j < $cont_productos ; $j++) { 

      $cadena_buscada   = ']';
      $coincidencia_variedad = strpos($variedad, $cadena_buscada);
      $tamaño_variedad=strlen($variedad);
      $pivotevariedad= substr($variedad, 1,$coincidencia_variedad-1);
      $variedad=substr($variedad,$coincidencia_variedad+1,$tamaño_variedad);

      $coincidencia_envase = strpos($envase, $cadena_buscada);
      $tamaño_envase=strlen($envase);
      $pivoteenvase= substr($envase, 1,$coincidencia_envase-1);
      $envase=substr($envase,$coincidencia_envase+1,$tamaño_envase);

      $coincidencia_cantidad = strpos($cantidad, $cadena_buscada);
      $tamaño_cantidad=strlen($cantidad);
      $pivotecantidad= substr($cantidad, 1,$coincidencia_cantidad-1);
      $cantidad=substr($cantidad,$coincidencia_cantidad+1,$tamaño_cantidad);

      $coincidencia_peso = strpos($peso, $cadena_buscada);
      $tamaño_peso=strlen($peso);
      $pivotepeso= substr($peso, 1,$coincidencia_peso-1);
      $peso=substr($peso,$coincidencia_peso+1,$tamaño_peso);

      $coincidencia_volumen = strpos($volumen, $cadena_buscada);
      $tamaño_volumen=strlen($volumen);
      $pivotevolumen= substr($volumen, 1,$coincidencia_volumen-1);
      $volumen=substr($volumen,$coincidencia_volumen+1,$tamaño_volumen);

      $coincidencia_origen = strpos($origen, $cadena_buscada);
      $tamaño_origen=strlen($origen);
      $pivoteorigen= substr($origen, 1,$coincidencia_origen-1);
      $origen=substr($origen,$coincidencia_origen+1,$tamaño_origen);
       
      if($tipo=="remitente"){ 
     	 $objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $fila['folio'])
		            ->setCellValue('B'.$i,  $pivotevariedad)
        		    ->setCellValue('C'.$i,  $pivoteenvase)
        		    ->setCellValue('D'.$i,  $pivotecantidad)
        		    ->setCellValue('E'.$i,  $pivotepeso)
        		    ->setCellValue('F'.$i,  $pivotevolumen)
        		    ->setCellValue('G'.$i,  $pivoteorigen)
        		    ->setCellValue('H'.$i,  $destino)
            		->setCellValue('I'.$i, utf8_encode($dia.'/'.$mes.'/'.$año));
                }
        if($tipo=="origen"){ 
       $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i,  $fila['folio'])
                ->setCellValue('B'.$i,  $pivotevariedad)
                ->setCellValue('C'.$i,  $pivoteenvase)
                ->setCellValue('D'.$i,  $pivotecantidad)
                ->setCellValue('E'.$i,  $pivotepeso)
                ->setCellValue('F'.$i,  $pivotevolumen)
                ->setCellValue('G'.$i,  $remitente)
                ->setCellValue('H'.$i,  $destino)
                ->setCellValue('I'.$i, utf8_encode($dia.'/'.$mes.'/'.$año));
                }

        if($tipo=="destino"){ 
       $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i,  $fila['folio'])
                ->setCellValue('B'.$i,  $pivotevariedad)
                ->setCellValue('C'.$i,  $pivoteenvase)
                ->setCellValue('D'.$i,  $pivotecantidad)
                ->setCellValue('E'.$i,  $pivotepeso)
                ->setCellValue('F'.$i,  $pivotevolumen)
                ->setCellValue('G'.$i,  $remitente)
                ->setCellValue('H'.$i,  $pivoteorigen)
                ->setCellValue('I'.$i, utf8_encode($dia.'/'.$mes.'/'.$año));
                }        
                        
					$i++;
     }

			
		}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>14,
	            	'color'     => array(
    	            	'rgb' => 'ffffff'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => '163870')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

        $estiloencabezado = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>10 	
            ),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
    		)
        );


		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,
                'size' =>7,                          
                'color'     => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => '99BFF9  '
        		),
        		'endcolor'   => array(
            		'argb' => '588AD6  '
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();

		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial', 
               	'size' =>9,              
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'DCE9FF  ')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	),
           	'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
        			
        			
    		)
        ));




		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('C2:I7')->applyFromArray($estiloencabezado);
		$objPHPExcel->getActiveSheet()->getStyle('A8:I8')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A9:I".($i-1));
				
		for($i = 'A'; $i <= 'I'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(false);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('reporte');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,9);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$reporte.'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}


	else{
		print_r('No hay resultados para mostrar');
	}
?>