jQuery.validator.addMethod("validarCedula",
           function(value, element) {
                   return /^[0-9]{7,8}$/.test(value);
           },
   "Introduce una cedula de válida"
); 
 
jQuery.validator.addMethod("valida_estatura",
           function(value, element) {
                   return /^[0-1]{1}[.][0-9]{1,2}$/.test(value);
           },
   "Introduce una estatura válida (ejm: 0.30)"
);

jQuery.validator.addMethod("valida_caracteres",
           function(value, element) {
                   return /^[a-zA-zñáÁéÉíÍóÓúÚ]{0,}? ?[a-zA-zñáÁéÉíÍóÓúÚ]{0,}? ?[a-zA-zñáÁéÉíÍóÓúÚ]{0,}? ?[a-zA-zñáÁéÉíÍóÓúÚ]{0,}? ?[a-zA-zñáÁéÉíÍóÓúÚ]{0,}?$/.test(value);
           },
   "Sólo se permiten caracteres"
);

jQuery.validator.setDefaults({
  errorContainer: "#messageBox1",
  errorLabelContainer: "#messageBox1",
  debug:false,
});

$( "#nuevo_estudiante").validate({
  rules: {
    nombre1: {
      required: true,
      minlength: 3,
      maxlength: 20,
      valida_caracteres: true
    },
    nombre2: {
      minlength: 3,
      maxlength: 20,
      valida_caracteres: true
    },
    apellido1: {
      required: true,
      minlength: 3,
      maxlength: 20,
      valida_caracteres: true
    },
    apellido2: {
      minlength: 3,
      maxlength: 20,
      valida_caracteres: true
    },
    sexo: {
    	required: true,
    },
    edad: {
      required: true,
    },
    fecha: {
      required: true,
    },
    tsangre: {
      required: true,
    },
    estatura: {
      required: true,
      valida_estatura: true,
      max: 1.90,
      min: 0.10 
    },
    peso: {
      required: true,
      max: 100,
      min: 20
    },
    ln_pais: {
      required: true,
    },
    ln_estado: {
      required: true,
    },
    ln_ciudad: {
      required: true,
      maxlength: 50,
      minlength: 3,
      valida_caracteres: true
    },
    condicion: {
      required: true,
    },
    ci_r: {
      min: 5000000,
      max: 40000000,
      remote: "http://localhost/sinpriec_mvc/includes/get_data.php"
    },
    hermanos: {
      required: true,
    },
    parientes: {
      required: true,
    },
    canaima: {
      required: true,
    }
  },
  messages: {
    nombre1: {
        required: "Este campo es requerido",
        minlength: "Este campo debe tener mínimo {0} caracteres",
        maxlength: "Este campo debe tener máximo {0} caracteres"
    },
    nombre2: {
        minlength: "Este campo debe tener mínimo {0} caracteres",
        maxlength: "Este campo debe tener máximo {0} caracteres"
    },
    apellido1: {
        required: "Este campo es requerido",
        minlength: "Este campo debe tener mínimo {0} caracteres",
        maxlength: "Este campo debe tener máximo {0} caracteres"
    },
    apellido2: {
        minlength: "Este campo debe tener mínimo {0} caracteres",
        maxlength: "Este campo debe tener máximo {0} caracteres"
    },
    sexo: {
        required: "Este campo es requerido",
    },
    edad: {
        required: "Este campo es requerido",
    },
    fecha: {
        required: "Este campo es requerido",
    },
    tsangre: {
        required: "Este campo es requerido",
    },
    estatura: {
        required: "Este campo es requerido",
        max: "La estatura debe ser menor a {0} m",
        min: "La estatura debe ser mayor a {0} m"
    },
    peso: {
        required: "Este campo es requerido",
        max: "El peso debe ser menor a {0} kilogramos",
        min: "El peso debe ser mayor a {0} kilogramos"
    },
    ln_pais: {
        required: "Este campo es requerido",
    },
    ln_estado: {
        required: "Este campo es requerido",
    },
    ln_ciudad: {
        required: "Este campo es requerido",
        minlength: "Este campo debe tener mínimo {0} caracteres",
        maxlength: "Este campo debe tener máximo {0} caracteres"
    },
    condicion: {
        required: "Este campo es requerido",
    },
    ci_r: {
        validaCedula: "Escribe una cedula válida",
        max: "La cedula debe ser menor a 30 millones",
        min: "La cedula debe ser mayor a 5 millones"
    },
    hermanos: {
        required: "Este campo es requerido",
    },
    parientes: {
      required: "Este campo es requerido",
    },
    canaima: {
      required: "Este campo es requerido",
    }
  }
});