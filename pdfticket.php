<?php
//todo el mpdf
//require_once('vendor/autoload.php');
header("Content-type:application/pdf");


require_once('lib/pdf/mpdf.php');
//el HTML
require_once('reporte/ticket.php');

//El CSSS
$css = file_get_contents('reporte/style.css');


//base datos
require ('con_db.php');

if (isset($_GET['id']))
  $IdRegistro = $_GET['id'];

  
//$mpdf = new mPDF('c','A4');
$mpdf = new mPDF('d','A7');
//$mpdf->debug = true;
$plantilla=getPlantilla($conex, $IdRegistro);

$mpdf->writeHtml($css, 1);//, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, 2);//, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output();


?>

