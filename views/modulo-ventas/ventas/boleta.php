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
include ('../../../App/config.php');

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];


$sql_ventas = "SELECT *, 
                CLI.nombre_cliente as nombre_cliente,
                CLI.rut_cliente as rut_cliente,
                CLI.celular_cliente as celular_cliente
                FROM ventas as VE 
                INNER JOIN clientes as CLI
                ON CLI.id_cliente = VE.id_cliente
                WHERE VE.id_venta = '$id_venta_get' ";

$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$datos_ventas = $query_ventas->fetchAll(PDO::FETCH_ASSOC);


foreach ($datos_ventas as $dato_ventas)
{
    $fecha_hora = $dato_ventas['fecha_creacion'];
    $rut_cliente = $dato_ventas['rut_cliente'];
    $nombre_cliente = $dato_ventas['nombre_cliente'];
    $celular_cliente = $dato_ventas['celular_cliente'];
}

$fecha = date("d/m/y", strtotime($fecha_hora));



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
$pdf->setMargins(15, 15, 15);

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
<table border = "0">
    <tr>
        <td style="width: 50px">
            <img src="../../../public/img/logofarmaciacolor.jpg">
        </td>
        <td style="width: 388px; text-align:center; font-size: 10px;">
            <b>SISTEMA DE VENTAS FARMACIA LOHSE</b> <br>
            Zona alto Salamanca Av. Litoral #2345 <br>
            5289767876 - 5264567876 <br>
            Salamanca - Chile
        </td>
        
        <td style="font-size: 10px; text-align: center; color: red" border = "1"  cellpadding = "5">
            <b>R.U.T 96.760.570-5</b> <br> <br>
            <b>BOLETA ELECTRÓNICA</b> <br> <br>
            <b>N° '.$id_venta_get.' </b>
        </td>
    </tr>
</table>  
<br>
<br>
<br>
<div>
    <table border = "1" style="padding: 10px; font-size: 10px" >
        <tr>
            <td>
            <b>CLIENTE</b>:         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                                    '.$nombre_cliente.' <br>
            <b>CELULAR</b>:         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    '.$celular_cliente.' <br>
            <b>RUT</b>:             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    &nbsp;&nbsp;&nbsp;
                                    '.$rut_cliente.' <br>
            <b>FECHA EMISIÓN</b>:   &nbsp;&nbsp;  '.$fecha.'</td>
        </tr>
    </table>
</div>

<br><br>

<table border = "1" cellpadding = "3">
    <tr style ="text-align: center; background-color: #E1E1E1">
        <th><b>Ítem</b></th>
        <th colspan="2"><b>Código</b></th>
        <th colspan="4"><b>Descripción</b></th>
        <th colspan="2"><b>Cantidad</b></th>
        <th colspan="2"><b>Precio Unitario</b></th>
        <th colspan="2"><b>Precio Valor Total</b></th>
    </tr>

';

$contador_carrito = 0;
$cantidad_total = 0;
$valor_unitario = 0;
$suma_subtotal = 0;
$PRECIO_FINAL = 0;
$sql_carrito = "SELECT *, CAR.cantidad as cantidad_carrito , 
                MAR.nombre_marca as nombre_marca, PRO.precio_venta as precio_venta,
                PRO.stock_producto as stock, PRO.id_producto as id_producto,
                CAR.cantidad as cantidad_carrito
                FROM carrito AS CAR 
                INNER JOIN inventario AS PRO 
                ON CAR.id_producto = PRO.id_producto 
                INNER JOIN marca AS MAR 
                ON MAR.id_marca = PRO.id_marca
                WHERE nro_venta = '$nro_venta_get' ORDER BY id_carrito ASC";
$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->execute();
$datos_carrito = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
foreach ($datos_carrito as $dato_carrito) {
    $id_carrito = $dato_carrito['id_carrito'];
    $contador_carrito = $contador_carrito + 1;
    $cantidad_total = $cantidad_total + $dato_carrito['cantidad_carrito'];
    $valor_unitario = $valor_unitario + floatval($dato_carrito['precio_venta']);

    $cantidad = floatval($dato_carrito['cantidad_carrito']);
    $precio_venta = floatval($dato_carrito['precio_venta']);
    $subtotal = $cantidad * $precio_venta;
    $suma_subtotal = $suma_subtotal + $subtotal;
    $IVA = round($suma_subtotal * 0.19);
    $PRECIO_FINAL = round($suma_subtotal + $IVA);
   

    $html .='
        <tr style ="text-align: center; height:200px">
            <td>'.$contador_carrito.'</td>
            <td colspan="2">'.$dato_carrito['codigo_producto'].'</td>
            <td colspan="4">'.$dato_carrito['nombre_producto'].''.' '.''.'x'.''.$dato_carrito['cantidad'].'
            '.' '.''.$dato_carrito['forma_farmaceutica'].'  
            </td>
            <td colspan="2">'.$dato_carrito['cantidad_carrito'].'</td>
            <td colspan="2">'.'$'.''.$dato_carrito['precio_venta'].'</td>
            <td colspan="2">'.'$'.''.$subtotal.'</td>
        </tr>
    ';
}

$html .='
</table>

<br><br>

<table border = "1" cellpadding = "3">

    <tr>
        <td colspan="7" style="text-align: right"> SubTotal</td>
        <td colspan="2" style="text-align: center">'.$cantidad_total.'</td>
        <td colspan="2" style="text-align: center">'.'$'.''.$subtotal.'</td>
        <td colspan="2" style="text-align: center">'.'$'.''.$suma_subtotal.'</td>
    </tr>

    <tr>
        <th colspan="7" style="text-align: right; background-color: #E1E1E1"> Total + IVA 19%</th>
        <th colspan="2"></th>
        <th colspan="2"></th>
        <th colspan="2"style="text-align: center"><b>'.'$'.''.$PRECIO_FINAL.'</b></th>
    </tr>

</table>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<p style="text-align: center">----------------------------------------------------------------------------------------------------------------------------------</p>

<p style="text-align: center"> <b> MUCHAS GRACIAS POR SU PREFERENCIA </b></p> <br>
<p style="text-align: center"></p>

<div style="text-align: center" >
    <footer>
        <img style="text-align: center" src="../../../public/img/timbre.jpg">
    </footer>
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

$pdf->Output('BOLETA', 'I');


//============================================================+
// END OF FILE
//============================================================+
