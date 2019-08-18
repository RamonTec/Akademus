jQuery.validator.addMethod("validarUsuario",
           function(value, element) {
                   return /^[A-Za-z]{5,20}$/.test(value);
           },
   "Escriba un nombre de usuario válido"
);

jQuery.validator.addMethod("validarClave",
           function(value, element) {
                   return /^[A-Za-z0-9]{5,20}$/.test(value);
           },
   "Escriba una contraseña válida"
);

jQuery.validator.setDefaults({
  errorContainer: "#messageBox1",
  errorLabelContainer: "#messageBox1",
  debug:false,
});

$(document).ready(function(){


$("#inicio_sesion").validate({
  rules: {
    nombre_u: {
      required: true,
      minlength: 5,
      validaUsuario: true,
      maxlength: 20,
      remote: "http://localhost/sinpriec_mvc/includes/get_data.php"
    },
    pass: {
      required: true,
      validaPass: true,
      minlength: 5,
      maxlength: 20
    },
    Rpass: {
      required: true,
      equalTo: "#pass"
    },
    tipo: {
      required: true
    },
    estado: {
      required: true
    },
    pregunta: {
      required: true
    },
    respuesta: {
      required: true,
      minlength: 5,
      maxlength: 20
    }
  },
  messages: {
    usuario: {
        required: "Este campo es requerido",
        minlength: "El nombre de usuario debe tener como mínimo {0} caracteres",
        maxlength: "El nombre de usuario debe tener menos de {0} caracteres"
    },
    pass: {
        required: "Este campo es requerido",
        minlength: "La contraseña debe tener como mínimo {0} caracteres",
        maxlength: "El contraseña debe tener menos de {0} caracteres"
    },
    Rpass: {
      required: "Este campo es requerido",
      equalTo: "Las contraseñas no coinciden"
    },
    tipo: {
      required: "Este campo es requerido"
    },
    estado: {
      required: "Este campo es requerido"
    },
    pregunta: {
      required: "Este campo es requerido"
    },
    respuesta: {
      required: "Este campo es requerido",
      minlength: "El nombre de usuario debe tener como mínimo {0} caracteres",
      maxlength: "El nombre de usuario debe tener menos de {0} caracteres"
    }
  }
});

});
