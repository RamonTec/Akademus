// Variable que obtiene el id del elemento input.
const ci_est = document.getElementById('ci_est');
const btn_enviar = document.getElementById('btn_enviar');

eventListeners();

function eventListeners() {
    
    document.addEventListener('DOMContentLoaded', inicio_comprobacion);
    ci_est.addEventListener('blur', validar_campo_ci_est);
 
}

function inicio_comprobacion(){    
    btn_enviar.disabled = true;
}

function validar_campo_ci_est(){
    validar_longitud(this);    
    let error = document.querySelectorAll('.error');
    if (ci_est.value !== '') {
        if (error.length === 0) {
            btn_enviar.disabled = false;
        } else {
            btn_enviar.disabled = true;
        }
    }
}

function validar_longitud(campo){
    console.log(campo.value.length);
    if (campo.value.length > 0 && campo.value.length <= 10 && campo.value.length >= 6) {
        campo.style.borderColor="green";
        campo.classList.remove('error');
    } else{
        campo.style.borderColor="red";
        campo.classList.add('error');
    }
}