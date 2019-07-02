<?php

if (isset($_GET['empresa'])) {
	//$datos = $_GET['id_vinculacion'];
	$datos = $_GET['empresa'];
}
else{
	$datos = "Nada";
}

require_once("../../../model/conexion_model.php");

$conexion_model = new conexion_model();

$cn = $conexion_model->conectar();

$consulta = "SELECT * FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv WHERE e.id_emp = '$datos'";

$query = mysqli_query($cn, $consulta);

$consulta1 = "SELECT * FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv WHERE e.id_emp = '$datos'";

$query1 = mysqli_query($cn, $consulta1);

$datos_empresa = mysqli_fetch_assoc($query1);

//$datos1 = mysqli_fetch_assoc($query);

//$id_estudiante = $datos1['id_senati_ap'];
//$apellido_nombre = strtoupper($datos1['apellidos_ap'].", ".$datos1['nombres_ap']);
//$carrera = $datos1['descripcion_carr'];
//$fecha_ini_prac = $datos1['fechaini_prac_vin'];
//$fecha_fin_prac = $datos1['fechafin_prac_vin'];
//$razon_social_emp = $datos1['razonsocial_emp'];
//$ruc_emp = $datos1['ruc_emp'];



//var_dump($datos);


//$datos = $_POST['id_vinculacion'];

date_default_timezone_set ( "America/Lima" );



setlocale(LC_TIME, 'es_PE.UTF-8');

setlocale(LC_TIME, 'spanish');

$date = date("Y-m-d");

$fecha_esp = utf8_encode(strftime("%A, %d de %B %G", strtotime($date)));

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
//$pdf->SetHeaderData("descarga.jpg", 18);

$pdf->SetHeaderData("descarga.jpg", 18, "", "", array(0,0,0), array(255,255,255)); 

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 11);

// add a page
$pdf->AddPage();

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)



// create some HTML content
$html = '
<div style="text-align:center"><b>'.$datos_empresa['razonsocial_emp'].'</b>

</div>
<div style="text-align:right;margin-top:0px;">HUANCAYO,'.$fecha_esp.'</h4>
</div>
<label>RUC: <strong>'.$datos_empresa['ruc_emp'].'</strong><br><br>

</label>
<table border="1">
	<tr bgcolor="#FC9C6E" align="center">
		<td>DNI</td>
		<td>APELLIDOS Y NOMBRES</td>
		<td>ID Senati</td>
	</tr>';
	while ($datos = mysqli_fetch_assoc($query)) {
		$html .= '<tr align="center">
					<td>'.$datos['dni_ap'].'</td>
					<td>'.$datos['apellidos_ap']." ".$datos['nombres_ap'].'</td>
					<td>'.$datos['id_senati_ap'].'</td>
				 </tr>';
	}
	
	$html .='
	
</table><br><br>


';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


/* 

// output some RTL HTML content
$html = '<div style="text-align:center">The words &#8220;<span dir="rtl">&#1502;&#1494;&#1500; [mazel] &#1496;&#1493;&#1489; [tov]</span>&#8221; mean &#8220;Congratulations!&#8221;</div>';
$pdf->writeHTML($html, true, false, true, false, '');

// test some inline CSS
$html = '<p>This is just an example of html code to demonstrate some supported CSS inline styles.
<span style="font-weight: bold;">bold text</span>
<span style="text-decoration: line-through;">line-trough</span>
<span style="text-decoration: underline line-through;">underline and line-trough</span>
<span style="color: rgb(0, 128, 64);">color</span>
<span style="background-color: rgb(255, 0, 0); color: rgb(255, 255, 255);">background color</span>
<span style="font-weight: bold;">bold</span>
<span style="font-size: xx-small;">xx-small</span>
<span style="font-size: x-small;">x-small</span>
<span style="font-size: small;">small</span>
<span style="font-size: medium;">medium</span>
<span style="font-size: large;">large</span>
<span style="font-size: x-large;">x-large</span>
<span style="font-size: xx-large;">xx-large</span>
</p>';

$pdf->writeHTML($html, true, false, true, false, '');


 */



// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+