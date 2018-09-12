<?php
defined('BASEPATH') or header('location: '.FOLDER_PATH.'/erroraccess');

require_once ROOT . FOLDER_PATH . '/fpdf/fpdf.php';
require_once ROOT . FOLDER_PATH . '/app/models/Estudiante/EstudianteModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Certificado/CertificadoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/EstudianteDiscapacidad/EstudianteDiscapacidadModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/EstudianteRequerimiento/EstudianteRequerimientoModel.php';
require_once ROOT . FOLDER_PATH . '/app/models/Discapacidad/DiscapacidadModel.php';



/**
 * 
 */
class EstudiantePDFController extends Controller
{
	
  private $estudiante;
  private $estudiante_discapacidad;
  private $estudiante_requerimiento;  
  private $discapacidad;
  private $certificado;
  private $pdf;

  private $registros;

  public function __construct()
  {
      
    $this->estudiante = new EstudianteModel();
    $this->estudiante_discapacidad = new EstudianteDiscapacidadModel();
    $this->estudiante_requerimiento = new EstudianteRequerimientoModel();
    $this->discapacidad = new DiscapacidadModel();
    $this->certificado = new CertificadoModel();
    $this->pdf = new FPDF();
    
 }



  public function exec()
  {


 	$this->estudiante_requerimiento->setCedula($_POST['e_cedula']);
 	$this->discapacidad->setCedula($_POST['e_cedula']);

 	$req = $this->estudiante_requerimiento->consultar_requerimiento_estudiante();
 	$disc = $this->discapacidad->consultar_discapacidad();
 	$pdf = $this->pdf;
	$pdf->SetMargins(15,15);
	$pdf->SetTopMargin(15);
	$pdf->SetLeftMargin(15); 	
 	$pdf->AddPage();
 	$pdf->SetFont('Times','B',10);
	$pdf->Image('LOGOUCLA3.jpeg',10,10,30,30,'JPEG');
	$pdf->Cell(0,4,'UNIVERSIDAD CENTROCCIDENTAL LISANDRO ALVARADO',0,1,'C',0);
	$pdf->Cell(0,4,'DIRECCION DE DESARROLLO ESTUDIANTIL',0,1,'C',0);
	$pdf->Cell(0,4,'DEPARTAMENTO DE ORIENTACIÓN',0,1,'C',0);
	$pdf->Cell(0,4,'UNIDAD DE ATENCIÓN PARA LOS ESTUDIANTES',0,1,'C',0);
	$pdf->Cell(0,4,'CON DISCAPACIDAD',0,1,'C',0);
	$pdf->Image('logo_unidad.png',160,10,30,30,'PNG');
	$pdf->Cell(0,6,'',0,1,'C',0);
	$pdf->Cell(0,6,'',0,1,'C',0);
	$pdf->Cell(0,6,'',0,1,'C',0);
	$pdf->SetFont('Times','B',14);
	$pdf->Cell(0,8,'INFORMACIÓN DEL ESTUDIANTE CON DISCAPACIDAD',0,1,'C',0);
	$pdf->Cell(0,6,'',0,1,'C',0);
	$pdf->Cell(0,6,'',0,1,'C',0);
	$pdf->SetFillColor(179,217,255);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,8,'DATOS PERSONALES',1,1,'C',1);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(40,6,'CEDULA',1,0,'C',1);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,6,$_POST["e_cedula"],1,1,'C',0);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(40,6,'NOMBRES',1,0,'C',1);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(0,6,$_POST["e_nombre"],1,1,'C',0);
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(40,6,'APELLIDOS',1,0,'C',1);	
	$pdf->SetFont('Times','',12);
 	$pdf->Cell(0,6,$_POST["e_apellido"],1,1,'C',0);
 	$pdf->Cell(0,6,'',0,1,'C',0);	
 	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,8,'DATOS ACADEMICOS',1,1,'C',1);
 	$pdf->Cell(40,6,'DECANATO',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(60,6,$_POST["e_decanato"],1,0,'C',0);
 	$pdf->SetFont('Times','B',12);
 	$pdf->Cell(30,6,'LAPSO',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(0,6,$_POST["e_lapso"],1,1,'C',0);
 	$pdf->SetFont('Times','B',12);
 	$pdf->Cell(40,6,'CARRERA',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(60,6,$_POST["e_carrera"],1,0,'C',0);
 	$pdf->SetFont('Times','B',12);
 	$pdf->Cell(30,6,'SEMESTRE',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(0,6,$_POST["e_semestre"],1,1,'C',0);
 	$pdf->Cell(0,6,'',0,1,'C',0);	
 	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,8,'DATOS DISCAPACIDAD',1,1,'C',1);
 	$pdf->Cell(40,6,'CERTIFICADO',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(0,6,$_POST["c_codigo"],1,1,'C',0);
 	$pdf->SetFont('Times','B',12);
 	$pdf->Cell(40,6,'EMISION',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(55,6,$_POST["c_emision"],1,0,'C',0);
 	$pdf->SetFont('Times','B',12);
 	$pdf->Cell(40,6,'VENCIMIENTO',1,0,'C',1);
 	$pdf->SetFont('Times','',12);
 	$pdf->Cell(0,6,$_POST["c_vencimiento"],1,1,'C',0);
 	$pdf->Cell(0,6,'',0,1,'C',0);	
 	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,8,'DISCAPACIDADES',1,1,'C',1);
	$pdf->Cell(55,6,'TIPO',1,0,'C',1);
	$pdf->Cell(45,6,'GRADO',1,0,'C',1);
	$pdf->Cell(45,6,'REGIMEN',1,0,'C',1);
	$pdf->Cell(0,6,'DURACION',1,1,'C',1);
	foreach($disc as $d)
	{
		$pdf->Cell(55,6,$d['td_nombre'],1,0,'C',0);
		$pdf->Cell(45,6,$d['g_nombre'],1,0,'C',0);
		$pdf->Cell(45,6,$d['rg_nombre'],1,0,'C',0);
		$pdf->Cell(0,6,$d['d_duracion'],1,1,'C',0);		

	}

	$pdf->Cell(0,6,'',0,1,'C',0);	
 	$pdf->SetFont('Times','B',12);
	$pdf->Cell(0,8,'REQUERIMIENTOS DE AULA',1,1,'C',1);
	$pdf->Cell(45,6,'REQUERIMIENTO:',0,1,'C',0);	
	foreach($req as $r)
	{
		$pdf->Cell(45,6,'',0,0,'C',0);
		$pdf->Cell(45,6,$r['r_nombre'],0,1,'C',0);

	}


    $pdf->Output(); 	
  } 

}
 

