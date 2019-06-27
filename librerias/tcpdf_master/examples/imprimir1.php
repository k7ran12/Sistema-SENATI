<?php

date_default_timezone_set ( "America/Lima" );



setlocale(LC_TIME, 'es_PE.UTF-8');

setlocale(LC_TIME, 'spanish');

$date = date("Y-m-d");

$fecha_esp = strftime("%A, %d de %B %G", strtotime($date));


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
$direccion_cfp = $datos['direccion_cfp'];
$id_ubi_cfp = $datos['id_ubi'];

$consulta_ubi = "SELECT * FROM ubigeo WHERE id_ubi = '$id_ubi_cfp'";

$query_ubi = mysqli_query($cn, $consulta_ubi);

$datos_ubi = mysqli_fetch_assoc($query_ubi);

$dpd_cfp = $datos_ubi['departamento_ubi']. ", ".$datos_ubi['provincia_ubi']. ", " .$datos_ubi['distrito_ubi'];



// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'descarga.jpg';
        $this->Image($image_file, 10, 10, 23, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 12);
        // Title
        $this->Cell(250, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// set some text to print
$html = '<div style="text-align:right;margin-top:0px;">35PDSDS501-0</h4>
</div>';
$html .= '<div style="text-align:right;margin-top:0px;"><b>ID ALUMNO <label border="1">'.$id_estudiante.'</label></b></h4>
</div>';
$html .= '

<div style="text-align:center"><b>CONVENIO DE COLABORACIÓN MUTUA SENATI -EMPRESA - APRENDIZ PARA LA FORMACIÓN PROFESIONAL DUAL DE TÉCNICOS</b></div><br>

<span style="text-align:justify;">Conste por el presente documento el Convenio de Colaboración Mutua SENATI-EMPRESA-APRENDIZ, que celebran:</span><br>
<ul>
    <li type="square">EL SENATI, con RUC N° 20131376503, con domicilio en <strong>'.$direccion_cfp.', '.$dpd_cfp.',</strong> debidamente representado por Willy Juan Hernández Luján, identificado con DNI N° 22293706 , con poderes inscritos en la Partida Electrónica Nº 11013715 del Registro de Personas Jurídicas de Lima, a quien en adelante se le denominará EL SENATI,</li>
    <li type="square">La empresa <strong>Nombre de la Empresa</strong>, con RUC Nº <strong>RUC Empresa</strong>, con domicilio en <strong>Direccion Empresa</strong><strong>Region, Ciudad, Distritos</strong> debidamente representada por <strong>Nombre Representate Empresa</strong>, identificado con DNI N° <strong>DNI RE EMP</storng> , con poderes inscritos en la Partida Electrónica Nº ………………. del Registro de Personas Jurídicas de ………………. (ciudad), a quien en adelante se le denominará LA EMPRESA, y</li>
    <li type="square">El Aprendiz/ Tutor <strong>Nombre Practicante</strong>, identificado con DNI N° <b>DNI PRAC</b>, con domicilio en <b>Direccion, Referencia, Distrito</b>, a quien en adelante se le denominará EL APRENDIZ.</li>
</ul>

<span style="text-align:justify;">En los términos y condiciones siguientes:</span><br><br>

<span style="text-align:justify;"><b>CLÁUSULA PRIMERA: DECLARACIÓN DE LAS PARTES.</b></span><br><br>

<span style="text-align:justify;"><b>DE EL SENATI</b></span><br><br>

<span style="text-align:justify;">El SENATI, de conformidad con su Ley Nº26272, modificada por la Ley Nº 29672, es una persona jurídica de derecho público, de gestión privada, con autonomía técnica, pedagógica, administrativa, económica y con patrimonio propio, cuya finalidad es proporcionar formación y capacitación profesional para las actividades industriales manufactureras y para las labores de instalación, reparación y mantenimiento, realizadas en otras actividades productivas; asimismo puede desarrollar otras actividades de capacitación para otros sectores productivos distintos y participar en programas de investigación científica y tecnológica relacionadas con el trabajo industrial y conexos</span><br><br>

<span style="text-align:justify;">La Formación Profesional Dual que imparte el SENATI se rige por sus propias normas legales y administrativas, tales como la Ley Nº 26272, modificada por la Ley Nº 29672, el Decreto Ley Nº 20151 y su Reglamento, el Decreto Supremo Nº 012-74-IT/DS, el Reglamento del Sistema de Formación Profesional y la Norma General de Aplicación del Programa de Aprendizaje Dual en el SENATI, aprobados por el Consejo Nacional</span><br><br>

<span style="text-align:justify;">Asimismo, la Sétima Disposición Final y Complementaria del Reglamento de la Ley de Modalidades Formativas, Ley N° 28518, aprobado por Decreto Supremo N° 007-2005-TR, establece que “Los programas de aprendizaje dual regulados por instituciones creadas por ley, se rigen por sus propias normas. Supletoriamente se aplicarán las disposiciones de la Ley y el Reglamento.”. En ese sentido, el Consejo Nacional, en uso de sus atribuciones, mediante Acuerdo N° 129-2005, reguló como modalidad formativa, el Convenio de Colaboración Mutua, cuyo modelo fue actualizado mediante Acuerdos N° 079-2014 y N° 143-2016, respectivamente.</span><br>

';

// print a block of text using Write()
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->AddPage();

$html = '<br><br><br>';

$html .= '
<span style="text-align:justify;">El modelo pedagógico de EL SENATI se caracteriza por promover el aprendizaje de los conocimientos y capacidades para la acción productiva, mediante la aplicación globalizada e interactiva, de todas las informaciones científicas, tecnológicas y humanísticas, así como de las habilidades, actitudes y valores pertinentes a la realización de propósitos laborales concretos, en condiciones reales de trabajo; para lo cual el puesto de trabajo es el medio educativo fundamental.</span><br><br>

<span style="text-align:justify;">De acuerdo a la modalidad operativa de los programas de formación profesional inicial de EL SENATI, todo estudiante debe realizar periodos de aprendizaje práctico en una empresa, en condiciones reales de producción, de acuerdo al Plan Específico de Aprendizaje (PEA) correspondiente a determinada ocupación/carrera.</span><br><br>

<span style="text-align:justify;">Con la aplicación de los principios, técnicas y procedimientos de la Formación Profesional Dual es posible utilizar los talleres, laboratorios e instalaciones productivas de una empresa para fines de aprendizaje práctico, sin interferir sus actividades productivas regulares.</span><br><br>

<b>DE LA EMPRESA</b><br><br>

<span style="text-align:justify;">LA EMPRESA tiene por finalidad la producción y/o prestación de servicios de 6209 - OTRAS ACTIVIDADES DE TECNOLOGIA DE LA INFORMACION Y DE SERVICIOS INFORMATICOS</span><br><br>

<b>DEL APRENDIZ</b><br><br>

<span style="text-align:justify;">EL APRENDIZ, con fecha 16/05/2019 presentó a EL SENATI una solicitud (que forma parte integrante del presente Convenio como Anexo 1), a fin de realizar su formación práctica bajo la modalidad de Convenio de Colaboración Mutua. A la fecha de suscripción del presente Convenio, EL APRENDIZ se encuentra cursando el <b>SIGLO</b> semestre de la carrera de <b>Carrera</b></span><br><br>

<b>DEL SENATI y LA EMPRESA</b><br><br>

<span style="text-align:justify;">Ambas partes reconocen y aceptan que mantienen propósitos y objetivos comunes, que justifican un trabajo conjunto en base a un Programa de Formación Profesional Dual que le permita al APRENDIZ la utilización de los talleres, laboratorios e instalaciones productivas de LA EMPRESA, para el aprendizaje práctico de tareas y funciones productivas.</span><br><br>

<b>CLÁUSULA SEGUNDA: DE LOS OBJETIVOS</b><br><br>

<b>De EL SENATI y EL APRENDIZ</b><br><br>

<span style="text-align:justify;">Obtener acceso a los talleres, laboratorios e instalaciones productivas de la empresa para desarrollar el aprendizaje dual de los estudiantes de EL SENATI, de acuerdo al Plan Específico de Aprendizaje (PEA) determinado por EL SENATI, sin interferir en la producción de LA EMPRESA. Este aprendizaje práctico debe contribuir a la ejecución de trabajos reales según las normas internas de LA EMPRESA, por lo que se utilizará los mismos equipos, herramientas y materiales.</span><br><br>

<b>De La EMPRESA</b><br><br>

<span style="text-align:justify;">Permitir el acceso a sus talleres, laboratorios e instalaciones productivas para el aprendizaje práctico de los estudiantes de EL SENATI, mediante la ejecución de las tareas productivas de la empresa, a fin de asegurar la formación de Recursos Humanos con las cualificaciones requeridas por la realidad productiva. La jornada del aprendizaje práctico tendrá una duración de seis (6) horas por día.</span><br>

';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$html = '<br><br><br>';
$html .= '
    <b>De la Colaboración Mutua</b><br><br>

    <span style="text-align:justify;">Las partes reconocen la importancia de la colaboración SENATI-EMPRESA para complementar la formación práctica de los aprendices de EL SENATI y asegurar una mejor articulación entre las demandas y las ofertas de formación profesional.</span><br>

    <b>CLÁUSULA TERCERA: DE LA COORDINACIÓN</b><br><br>

    <span style="text-align:justify;">Para que el convenio tenga los mejores resultados se requiere lograr una permanente coordinación entre EL SENATI y LA EMPRESA, mediante la designación de los siguientes representantes:</span><br>

    <b>Representante de EL SENATI</b><br><br>

    <span style="text-align:justify;">El representante de EL SENATI será el Director Zonal, el Jefe de Centro o el Jefe de Escuela de Formación Profesional, según el ámbito geográfico de ubicación de LA EMPRESA; su responsabilidad principal es realizar una adecuada programación, supervisión y control del aprendizaje práctico en la empresa.</span><br>

    <b>Representante de LA EMPRESA</b><br><br>

    <span style="text-align:justify;">El representante de LA EMPRESA es RAMOS RODRIGUEZ ALFREDO ISAAC; su responsabilidad principal es definir las actividades que comprenderá el aprendizaje práctico de los estudiantes de EL SENATI.</span><br>

    <span style="text-align:justify;">Es de obligación de las partes documentar las reuniones y/o coordinaciones que se generan con el fin de lograr los objetivos de la colaboración mutua.</span><br><br>

    <b>CLÁUSULA CUARTA: DE LAS RESPONSABILIDADES Y OBLIGACIONES</b><br><br>
    

    <b>4.1  De EL SENATI</b>

    <span style="text-align:justify;">4.1.1   Acreditar a EL APRENDIZ mediante una carta de presentación que contenga los datos personales y los datos del Plan Específico de Aprendizaje (PEA) desarrollado y por desarrollar en la formación práctica en LA EMPRESA.</span><br><br>  

    <span style="text-align:justify;">4.1.2 Garantizar a LA EMPRESA que EL APRENDIZ cuenta con una póliza de seguro contra accidentes personales, que tendrá vigencia durante su tiempo de permanencia en EL SENATI y en LA EMPRESA; asimismo, será responsable de supervisar periódicamente el adecuado desempeño de EL APRENDIZ y del cumplimiento del desarrollo del Plan Específico de Aprendizaje (PEA).</span><br><br>    

    <b>4.2  De LA EMPRESA</b>

    <span style="text-align:justify;">4.2.1   LA EMPRESA permitirá, a EL APRENDIZ, el uso de sus talleres, laboratorios e instalaciones productivas, con los mismos materiales que usa en su producción regular; debiendo velar porque los trabajos reales que ejecute, como parte del aprendizaje práctico, se desarrollen atendiendo a su condición de estudiante, por lo que no les deberá asignar tareas para</span><br><br> 
    

    <span style="text-align:justify;">Adicionalmente, LA EMPRESA queda obligada a:</span><br><br>

';

$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

