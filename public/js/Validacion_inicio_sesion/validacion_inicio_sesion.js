// Variable que obtiene el id del elemento input.
const nom_u = document.getElementById('nom_u');
const clave = document.getElementById('clave');
const btn_enviar = document.getElementById('btn_enviar');

eventListeners();

function eventListeners() {
    
    document.addEventListener('DOMContentLoaded', inicio_comprobacion);
    nom_u.addEventListener('blur', validar_campo);
    clave.addEventListener('blur', validar_campo)
}

function inicio_comprobacion(){    
    btn_enviar.disabled = true;
}

function validar_campo(){
    validar_longitud_nom_u(this);
    validar_longitud_clave(this);
    let error = document.querySelectorAll('.error_nom_u');
    let error_clave = document.querySelectorAll('.error_clave');
    if (nom_u.value !== '') {
        if (error.length === 0) {
            btn_enviar.disabled = false;
        } else {
            btn_enviar.disabled = true;
        }
    }

    if (clave.value !== '') {
        if (error_clave.length === 0) {
            btn_enviar.disabled = false;
        } else {
            btn_enviar.disabled = true;
        }
    }
}

function validar_longitud_nom_u(campo){    
    if (campo.value.length > 0 ) {
        campo.style.borderColor="green";
        campo.classList.remove('error_nom_u');
    } else{
        campo.style.borderColor="red";
        campo.classList.add('error_nom_u');
    }
}

function validar_longitud_clave(campo){    
    if (campo.value.length > 0 ) {
        campo.style.borderColor="green";
        campo.classList.remove('error_clave');
    } else{
        campo.style.borderColor="red";
        campo.classList.add('error_clave');
    }
}