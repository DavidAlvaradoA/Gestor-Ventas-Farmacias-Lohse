<?php

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('../../../public/templates/TCPDF-main/tcpdf.php');

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];

include ('../../../App/config.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215,279), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Farmacia Lohse');
$pdf->setTitle('Boleta Farmacia Lohse');
$pdf->setSubject('Boleta Farmacia Lohse');
$pdf->setKeywords('Boleta Farmacia Lohse');

// remove default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(5, 5, 5);

// set auto page breaks
$pdf->setAutoPageBreak(true, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// Set font
$pdf->setFont('Helvetica', '', 7);

// Add a page
$pdf->AddPage();

// Set some content to print
$html = '
<div>
    <h1>Hola</h1>
</div>
';

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false,
    'module_width' => 1,
    'module_height' => 1
);

$QR = 'Boleta realizada por sistema de ventas Farmacia Lohse';
$pdf->write2DBarcode($QR, 'QRCODE,L', 22, 105, 35, 35, $style);


$pdf->Output('Example_002.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+
