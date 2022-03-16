<?php  

class Reportes Extends Controlador{

	public function __construct(){
		$this -> reportesModelo = $this -> modelo('Reporte');
	}

	public function reportes(){
		$this -> vista('Sistema/reportes');
	}
 
	public function index(){
		$this -> vista('Reportes/Estudiantes');
	}

	public function ficha_inscripcion() {
		$pdf = new fpdf('P','mm',array(215,200));
		$pdf -> AliasNbPages();
		$pdf -> AddPage('P','A4');
		$pdf -> SetFont('Arial','B',12);
		$pdf -> Cell(0,5, utf8_decode('Republica Bolivariana de Venezuela'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Ministerio del Poder Popular para la Educación'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Unidad Educativa "JOSE RAFAEL POCATERRA"'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5,'El Tigre, Estado Anzoategui',0,0,'C');
		$pdf -> Ln(20);
		$pdf -> SetFont('Arial','B',28);
		$pdf -> Cell(0,5,'FICHA DE INSCRIPCION',0,0,'C');
		$pdf -> Ln(30);
		$pdf -> SetFont('Times','B',12);
		$pdf -> Cell(0,0,'I. DATOS DEL ALUMNO');
		$pdf -> Ln(9);
		$pdf -> Cell(0,0,'Nombres y Apellidos: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Fecha de Nacimiento: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Edad:______');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Escolariddad: _________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Direccion: ____________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Telefonos: ____________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Nombre del representante: ______________________________________________________________');
		$pdf -> Ln(9);
		$pdf -> Cell(0,0,'II. ANTECEDENTES PERSONALES');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Embarazo: ___________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Parto: _______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Hospitalizaciones: _____________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Control Medico: ______________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Observaciones: _______________________________________________________________________');
		$pdf -> Ln(9);
		$pdf -> Cell(0,0,'III. DATOS DE LOS PADRES');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Nombre del Padre: _____________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Oficio o Profesion: _____________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Direccion de Trabajo: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Telefonos: ____________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Nombre de la Madre: ___________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Oficio o Profesion: _____________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Direccion de Trabajo: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Telefonos: ____________________________________________________________________________');
		$pdf -> Ln(9);
		$pdf -> Cell(0,0,'IV. DATOS RESALTANTES');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Obervaciones: _________________________________________________________________________');
		$pdf -> Ln(10);
		$pdf -> Cell(0,0,'Firma Representante: __________________________________________________________________');
		$pdf -> Ln(7);
	
		$pdf -> Output();
	}

	public function	boletin_descriptivo_preescolar() {
		$pdf = new fpdf('P','mm',array(215,200));
		$pdf -> AliasNbPages();
		$pdf -> AddPage('P','A4');
		$pdf -> SetFont('Arial','B',12);
		$pdf -> Cell(0,5, utf8_decode('Republica Bolivariana de Venezuela'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Ministerio del Poder Popular para la Educación'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Unidad Educativa "JOSE RAFAEL POCATERRA"'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5,'El Tigre, Estado Anzoategui',0,0,'C');
		$pdf -> Ln(20);
		$pdf -> Cell(0,5,'BOLETIN DESCRIPTIVO - PREESCOLAR',0,0,'C');
		$pdf -> Ln(30);
		$pdf -> Cell(0,0,'Nombres y Apellidos: ____________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Escolariddad: ___________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Nombre del representante: ________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Obervaciones: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(10);
		$pdf -> Cell(0,0,'Firma Representante: ________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Firma Docente: _______________________________________________');
		$pdf -> Ln(7);
	
		$pdf -> Output();
	}

	public function	boletin_descriptivo_primaria_fase_2() {
		$pdf = new fpdf('P','mm',array(215,200));
		$pdf -> AliasNbPages();
		$pdf -> AddPage('P','A4');
		$pdf -> SetFont('Arial','B',12);
		$pdf -> Cell(0,5, utf8_decode('Republica Bolivariana de Venezuela'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Ministerio del Poder Popular para la Educación'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Unidad Educativa "JOSE RAFAEL POCATERRA"'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5,'El Tigre, Estado Anzoategui',0,0,'C');
		$pdf -> Ln(20);
		$pdf -> Cell(0,5,'BOLETIN DESCRIPTIVO - PRIMARIA FASE II',0,0,'C');
		$pdf -> Ln(30);
		$pdf -> Cell(0,0,'Nombres y Apellidos: ____________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Escolariddad: ___________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Nombre del representante: ________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Obervaciones: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(10);
		$pdf -> Cell(0,0,'Firma Representante: ________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Firma Docente: ______________________________________________');
		$pdf -> Ln(7);
	
		$pdf -> Output();
	}

	public function	boletin_descriptivo_primaria_fase_1() {
		$pdf = new fpdf('P','mm',array(215,200));
		$pdf -> AliasNbPages();
		$pdf -> AddPage('P','A4');
		$pdf -> SetFont('Arial','B',12);
		$pdf -> Cell(0,5, utf8_decode('Republica Bolivariana de Venezuela'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Ministerio del Poder Popular para la Educación'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5, utf8_decode('Unidad Educativa "JOSE RAFAEL POCATERRA"'),0,0,'C');
		$pdf -> Ln(10);
		$pdf -> Cell(0,5,'El Tigre, Estado Anzoategui',0,0,'C');
		$pdf -> Ln(20);
		$pdf -> Cell(0,5,'BOLETIN DESCRIPTIVO - PRIMARIA FASE I',0,0,'C');
		$pdf -> Ln(30);
		$pdf -> Cell(0,0,'Nombres y Apellidos: ____________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Escolariddad: ___________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Nombre del representante: ________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Obervaciones: __________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'_______________________________________________________________________________');
		$pdf -> Ln(10);
		$pdf -> Cell(0,0,'Firma Representante: ________________________________________');
		$pdf -> Ln(7);
		$pdf -> Cell(0,0,'Firma Docente: ______________________________________________');
		$pdf -> Ln(7);
	
		$pdf -> Output();
	}

	public function actaRepresentante(){
		$pdf = new fpdf('P','mm',array(215,200));

		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',12);
		
		#titulo
		$pdf->Cell(0,5,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,1,'C');
		$pdf->Cell(0,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'),0,1,'C');
		$pdf->Cell(0,5,utf8_decode('U.E. "JOSE RAFAEL POCATERRA"'),0,1,'C');
		$pdf->Cell(0,5,utf8_decode('El Tigre - Estado Anzoátegui'),0,0,'C');
		$pdf->Ln(20);


		$pdf->SetFillColor(232,232,232);
		#CELL -> LARGO -> ALTO -> NOMBRE -> BORDE -> SALTO -> ALINEACIÓN
		#ENCABEZADO DEL CONTENIDO
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(0,6, utf8_decode('CONSTANCIA DE INSCRIPCIÓN'),0,1,'C');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,6, utf8_decode('EDUCACION PRIMARIA'),0,1,'C');
		$pdf->ln();

		#CONTENIDO

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(17);
		$pdf->MultiCell(150,8,utf8_decode('Quien suscribe, __________________ , Administrador(a) de la UNIDAD EDUCATIVA "JOSE RAFAEL POCATERRA", certifica que el(la) estudiante: ______________, está legalmente inscrito(a) en este plantel para cursar ____________________ GRADO DE EDUCACION PRIMARIA, durante el año escolar: _________________________________'),0,'L',0);
		$pdf->ln();
		$pdf->Cell(17);
		$pdf->MultiCell(150,8,utf8_decode('Constancia que se expide a solicitud de parte interesada en EL TIGRE, el
		'.date('d').'/'.date('m').'/'.date('Y').'.'),0,'L',0);
		$pdf->ln();
		$pdf->MultiCell(0,5,utf8_decode('_____________________________'),0,'C',0);
		$pdf->MultiCell(0,5,utf8_decode('Firma Director'),0,'C',0);
		$pdf->SetFont('Arial','B',10);
		$pdf->MultiCell(0,5,utf8_decode('Directora'),0,'C',0);
		$pdf->Output();
	}

}
