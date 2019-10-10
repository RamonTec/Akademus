// Validaciones en javascript.

var id_form_ci = document.getElementById("ci").onkeyup = function() { validar_ci() };
var id_form_pnombre = document.getElementById("pnombre").onkeyup = function() { validar_pnombre() };

function validar_ci(newValue, oldValue) {
    var validar_ci = document.getElementById("ci");
    if (/^(\d{1,12}\.?(\d{0,8})?)$/.test(validar_ci.value) || validar_ci.value === "" ) {
        
    } else {
        
    }
  }

function validar_pnombre() {
    var validar_pnombre = document.getElementById("pnombre");
    if(/^[a-zA-Z]+$/.test(validar_pnombre.value) == true){
        document.getElementById("pnombre").focus();
        document.getElementById("pnombre").style.borderColor="green";
    } else {
        validar_pnombre.value = validar_pnombre.value.replace(" ");
        document.getElementById("pnombre").focus();
        document.getElementById("pnombre").style.borderColor="red";
        document.getElementById("pnombre_mensaje").innerHTML = "Solo se aceptan letras.";
    }
}

