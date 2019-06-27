<?php

if (isset($_GET['id_vinculacion'])) {
	//$datos = $_GET['id_vinculacion'];
	$datos = $_GET['id_vinculacion'];
}
else{
	$datos = "Nada";
}

require_once("../../../model/conexion_model.php");

$conexion_model = new conexion_model();

$cn = $conexion_model->conectar();

$consulta = "SELECT v.id_vin, v.fechaini_prac_vin, v.fechafin_prac_vin, v.fechaini_sem_vin, v.fechafin_sem_vin, v.grupo_vin, a.*, e.*, c.*, cf.*, s.*, m.*, con.* FROM vinculacion v INNER JOIN aprendiz a ON v.id_ap = a.id_ap INNER JOIN empresa e ON e.id_emp = v.id_emp INNER JOIN carrera c ON c.id_carr = v.id_carr INNER JOIN cfp cf ON cf.id_cfp = v.id_cfp INNER JOIN semestre s ON s.id_sem = v.id_sem INNER JOIN monitor m ON m.id_mon = v.id_mon INNER JOIN convenio con ON con.id_conv = v.id_conv WHERE id_vin = '$datos'";

$query = mysqli_query($cn, $consulta);

$datos = mysqli_fetch_assoc($query);

$id_estudiante = $datos['id_senati_ap'];
$apellido_nombre = strtoupper($datos['apellidos_ap'].", ".$datos['nombres_ap']);
$carrera = $datos['descripcion_carr'];
$fecha_ini_prac = $datos['fechaini_prac_vin'];
$fecha_fin_prac = $datos['fechafin_prac_vin'];
$razon_social_emp = $datos['razonsocial_emp'];

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
<div style="text-align:center">CARTA DE FORMALIZACION DE VINCULACION DEL ESTUDIANTE CON LA EMPRESA
<h4>Con Convenio de Colaboracion Mutua.</h4>
</div>
<div style="text-align:right;margin-top:0px;">HUANCAYO,'.$fecha_esp.'</h4>
</div>
<label>Señores: <strong>'.$razon_social_emp.'</strong><br><br>
Presente<br><br>
De mi mayor consideranción.<br><br>
</label>
<span style="text-align:justify;">Nos complace comunicar a Ud. que EL SENATI les agradece   la colaboracion en compartir   la Formacion Profesional de jóvenes al firmar el Convenio de Colaboracion Mutua SENATI - EMPRESA</span><br><br>
<span>Con este Motivo le presentamos a/los estudiante/s:</span><br><br>
<table border="1">
	<tr bgcolor="#FC9C6E" align="center">
		<td>ID</td>
		<td>APELLIDOS Y NOMBRES</td>
		<td>CARRERA</td>
	</tr>
	<tr align="center">
		<td>'.$id_estudiante.'</td>
		<td>'.$apellido_nombre.'</td>
		<td>'.$carrera.'</td>
	</tr>
</table><br><br>
<span style="text-align:justify;">Para que desarrollen/n su formacion práctica en los talleres de su empresa del <strong>'.$fecha_ini_prac.'</strong> al <strong>'.$fecha_fin_prac.'</strong> respetando el proceso de producción/servicio de la EMPRESA.</span><br><br>

<span style="text-align:justify;">Con el fin de garantizar la formación práctica es necesario que nuestro Instructor de Formación Específica y el Monitor de su empresa cuenten con las facilidades necesarias para las supervisiones periódicas y evaluaciones correspondientes</span><br><br>

<span style="text-align:justify;">Cabe señalar que el estudiante del SENATI tiene la obligación de asistir Seis (6) horas por día a la EMPRESA  y  deberá  tener  disponible  el  día ____________ 	, que asistirá al SENATI para desarrollar su formación tecnológica y otras actividades afines a su formación en la carrera</span><br><br>

<span style="text-align:justify;">El/los estudiante/s en referencia cuenta/n con una póliza de seguro contra accidente personales.</span><br><br>

<span style="text-align:justify;">Adjuntamos a la presente un resumen de la hoja de vida del /los estudiante/s mencionados, El Plan Específico de Aprendizaje (PEA), ya desarrollado y lo que falta desarrollar, justamente en su empresa.</span><br><br>

<span style="text-align:justify;">Sin otro particular hacemos propicia la ocasión para renovarle las expresiones de nuestra especial consideración.</span><br><br>

<span>Atentamente.</span><br><br>

<table>
	<tr>
		<td>___________________________</td>
		<td></td>
	</tr>
	<tr>
		<td>JEFE DE CFP/UCP/ESCUELA</td>
		<td style="text-align:right;">CARGO:_______________________________</td>
	</tr>	
</table>


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