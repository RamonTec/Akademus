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
 
	public function constancia_inscripcion(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 

			$estudiante = $this -> reportesModelo -> constanciaEstudiante($_POST['ci_est']);			

			if ($estudiante == ''){
	
				$datos = array (
					"nav" => 'reportes',
					"mensaje" => 'No hay registros'
				);

				$this->vista('Reportes/Estudiantes',$datos);
			
			} else {
				#Para el numero de paginas

				$pdf = new fpdf('P','mm',array(215,200));

	$pdf -> AliasNbPages();
	$pdf -> AddPage('P','A4');
	$pdf -> SetFont('Arial','B',12);
	$pdf -> Cell(0,5, utf8_decode('Republica Bolivariana de Venezuela'),0,0,'C');
	$pdf -> Ln(10);
	$pdf -> Cell(0,5, utf8_decode('Ministerio del Poder Popular para la Educación'),0,0,'C');
	$pdf -> Ln(10);
	$pdf -> Cell(0,5, utf8_decode('U.E Liceo "Pedro Briceño Mendez"'),0,0,'C');
	$pdf -> Ln(10);
	$pdf -> Cell(0,5,'El Tigre, Estado Anzoategui',0,0,'C');
	$pdf -> Ln(20);
	$pdf -> SetFont('Arial','B',28);
	$pdf -> Cell(0,5,'Constancia de Inscripcion',0,0,'C');
	$pdf -> Ln(30);
	$pdf -> SetFont('Arial','B',12);
	$pdf -> Cell(0,0,'CIUDADANO');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0, utf8_decode('DIRECTOR(a) DEL LICEO "BRICEÑO MENDEZ"'));
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,'SU DESPACHO.');
	$pdf -> Ln(10);
	$pdf -> Cell(0,0, 'Me dirijo a usted, con la finalidad de solicitar la inscripcion para mi representado el');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,utf8_decode( '(la) estudiante: '.$estudiante -> pnom. ' ' .$estudiante -> segnom. ' ' .$estudiante -> pape.' , CI o CE: '.$estudiante -> ci_est. '. Así mismo quiero manifestar'));
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,utf8_decode('que los datos personales para tal inscripcion son exactos y que me comprometo'));
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,'a cumplir y hacer cumplir los deberes y obligaciones emandadas de la autoridades ');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,'del plantel como lo establece la Ley. Los reglamentos vigentes y demas Los reglamentos');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,'vigentes y demas disposiciones, aceptando ademas las sanciones que se');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0,'apliquen a mi representado en caso de incurrir en faltas violatorias a los Acuerdos de');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0, utf8_decode('Convivencia Comunitaria de la Institución ó las Leyes Educativas incluyendo el retiro'));
	$pdf -> Ln(5);
	$pdf -> Cell(0,0, utf8_decode('del estudiante por aplicación de los Artículos que establece la Ley de Educación vigente'));
	$pdf -> Ln(5);
	$pdf -> Cell(0,0, utf8_decode('(Artículos 123 y 124).'));
	$pdf -> Ln(15);
	$pdf -> Cell(0,0, '_____________________                                                   _______________________ ');
	$pdf -> Ln(5);
	$pdf -> Cell(0,0, 'Firma del representante                                                    Firma de quien registra');
	$pdf -> Ln(10);
	$pdf -> Cell(0,0, utf8_decode('C.I: '.$estudiante -> nacionalidad_e.'-'.$estudiante -> ci_est.'                                                                    C.I:'));
	$pdf -> Ln(30);
	$pdf -> Cell(0,0, '');
	$pdf -> Ln(10);
	$pdf -> Output();
			}
		}
	}

	public function actaDeRepresentante(){
		$this -> vista('Reportes/Representantes');
	}

	public function actaRepresentante(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$estudiante = $this -> reportesModelo -> actaDeRepresentante($_POST['ci']);			

			if ($estudiante == ''){
	
				$datos = array (
					"nav" => 'reportes',
					"mensaje" => 'No hay registros'
				);

				$this->vista('Reportes/Representantes',$datos);
			
			} else {
				#Para el numero de paginas

				$pdf = new fpdf('P','mm',array(215,200));

				$pdf->AddPage();
				
				$pdf->SetFont('Arial','B',12);
				
				#titulo
				$pdf->Cell(0,5,utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'),0,1,'C');
				$pdf->Cell(0,5,utf8_decode('MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN'),0,1,'C');
				$pdf->Cell(0,5,utf8_decode('U.E. "Carlos Fragachan"'),0,1,'C');
				$pdf->Cell(0,5,utf8_decode('San José de Guanipa - Estado Anzoátegui'),0,0,'C');
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
				$pdf->MultiCell(150,8,utf8_decode('Quien suscribe, '.$estudiante -> pnombre.', Administrador(a) de la UNIDAD EDUCATIVA "CARLOS FRAGACHÁN", certifica que el(la) estudiante: '.$estudiante -> papellido.' está legalmente inscrito(a) en este plantel para cursar '.$estudiante -> sexo.' GRADO DE EDUCACION PRIMARIA, durante el año escolar: '.$estudiante -> nacionalidad.'-'.$estudiante -> tipo_est.'.'),0,'L',0);
				$pdf->ln();
				$pdf->Cell(17);
				$pdf->MultiCell(150,8,utf8_decode('Constancia que se expide a solicitud de parte interesada en SAN JOSÉ DE GUANIPA, el 
				'.date('d').'/'.date('m').'/'.date('Y').'.'),0,'L',0);
				$pdf->ln();
				$pdf->MultiCell(0,5,utf8_decode('_____________________________'),0,'C',0);
				$pdf->MultiCell(0,5,utf8_decode('Thays Belmonte'),0,'C',0);
				$pdf->SetFont('Arial','B',10);
				$pdf->MultiCell(0,5,utf8_decode('Directora'),0,'C',0);
				$pdf->Output();
			}
		}
	}

}
