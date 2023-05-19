<?php
	//Incluimos librería y archivo de conexión
	require_once '../config/config.php';
	require_once '../PHPExcel/Classes/PHPExcel.php';			

	$fecha1=$_POST['start_at'];
	$fecha2=$_POST['created_at'];
	$proyecto=$_POST['project_id'];
	$prioridad=$_POST['priority_id'];
	$tipo=$_POST['kind_id'];
	$estado=$_POST['status_id'];		

if(isset($_POST['generar_reporte'])){


	//Consulta
	//$sql = "SELECT id, title, description, created_at FROM ticket";
	//$sql = "SELECT * FROM ticket order by created_at desc";
	$sql =("SELECT *  FROM ticket where kind_id='$tipo' AND project_id='$proyecto' AND status_id='$estado' AND priority_id ='$prioridad' AND created_at BETWEEN '$fecha1' AND '$fecha2' ORDER BY created_at desc");	

	$resultado = $con->query($sql);
	//$query = mysqli_query($con, $sql);
	$fila = 7; //Establecemos en que fila inciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('images/logo.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Carlos Bejarano")->setDescription("Reporte de casos de soporte");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Tickets");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	$objDrawing->setHeight(100);
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));

		
	//Bordes y estilo de las columnas del informe
	$objPHPExcel->getActiveSheet()->getStyle('A1:H4')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A6:H6')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', 'REPORTE DE CASOS');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'TICKET');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', 'ASUNTO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('C6', 'ESTADO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(21);
	$objPHPExcel->getActiveSheet()->setCellValue('D6', 'FECHA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(17);
	$objPHPExcel->getActiveSheet()->setCellValue('E6', 'ASESOR');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
	$objPHPExcel->getActiveSheet()->setCellValue('F6', 'TIPO');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(24);
	$objPHPExcel->getActiveSheet()->setCellValue('G6', 'CATEGORIA');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(11);
	$objPHPExcel->getActiveSheet()->setCellValue('H6', 'PRIORIDAD');	
	//Recorremos los resultados de la consulta y los imprimimos
	
	while($rows = $resultado->fetch_assoc()){

		$asesor_id=$rows['asigned_id'];
		$priority_id=$rows['priority_id'];
        $kind_id=$rows['kind_id'];
        $category_id=$rows['category_id'];
        $status_id=$rows['status_id'];

		//$asesor = mysqli_query($con,"select * from asesor where id=$asesor_id");
			$sql2 = mysqli_query($con, "select * from asesor where id=$asesor_id");
	            if($c=mysqli_fetch_array($sql2)) {
	            $name_asesor=$c['name'];
	        }
	        $sql = mysqli_query($con, "select * from priority where id=$priority_id");
                if($c=mysqli_fetch_array($sql)) {
                $name_priority=$c['priority_name'];
            }
            $sql = mysqli_query($con, "select * from kind where id=$kind_id");
                if($c=mysqli_fetch_array($sql)) {
                $name_kind=$c['kind_name'];
            }
            $sql2 = mysqli_query($con, "select * from category where id=$category_id");
                if($c=mysqli_fetch_array($sql2)) {
                $name_categoria=$c['category_name'];
            }
            $sql2 = mysqli_query($con, "select * from status where id=$status_id");
                if($c=mysqli_fetch_array($sql2)) {
                $name_status=$c['status_name'];
            }
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $rows['id']);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $rows['title']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $name_status);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['created_at']);
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $name_asesor);
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $name_kind);
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $name_categoria);
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $name_priority);
		//$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, '=C'.$fila.'*D'.$fila);
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A7:H".$fila);
	
	$filaGrafica = $fila+2;
	
	// definir origen de los valores
	//$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Productos!$D$7:$D$'.$fila);
	$values = new PHPExcel_Chart_DataSeriesValues('Number', 'Tickets!$A$7:$A$'.$fila);
	
	// definir origen de los rotulos
	$categories = new PHPExcel_Chart_DataSeriesValues('String', 'Tickets!$C$7:$C$'.$fila);
	
	// definir  gráfico
	$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART, // tipo de gráfico
	PHPExcel_Chart_DataSeries::GROUPING_CLUSTERED,
	array(0),
	array(),
	array($categories), // rótulos das columnas
	array($values) // valores
	);
	$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);
	
	// inicializar gráfico
	$layout = new PHPExcel_Chart_Layout();
	$plotarea = new PHPExcel_Chart_PlotArea($layout, array($series));
	
	// inicializar o gráfico
	$chart = new PHPExcel_Chart('exemplo', null, null, $plotarea);
	
	// definir título do gráfico
	$title = new PHPExcel_Chart_Title(null, $layout);
	$title->setCaption('Gráfico PHPExcel Chart Class');
	
	// definir posiciondo gráfico y título
	$chart->setTopLeftPosition('B'.$filaGrafica);
	$filaFinal = $filaGrafica + 10;
	$chart->setBottomRightPosition('H'.$filaFinal);
	$chart->setTitle($title);
	
	// adicionar o gráfico à folha
	$objPHPExcel->getActiveSheet()->addChart($chart);
	
	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	// incluir gráfico
	$writer->setIncludeCharts(TRUE);
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Tickets.xlsx"');
	header('Cache-Control: max-age=0');
	
	//$writer = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$writer->save('php://output');
}
?>