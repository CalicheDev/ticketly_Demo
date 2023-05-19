<?php
include 'config/config.php';
require './vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

//Llamando el contenido del fichero Print_View.php
try{
ob_start();
require_once 'Print_View.php';
$html = ob_get_clean();


 $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');


 $html2pdf -> writeHTML ($html);
 //$html2pdf -> writeHTML ('<h1> Más opción # </h1>'); 
 		
 $html2pdf -> output('Reporte_Casos.pdf');

 	

}catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

?>


