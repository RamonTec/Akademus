function habilitar() {
    ci = document.getElementById("ci").value
    val = 0
    if(ci == "") {
      val++
    }

    if(val == 0) {
      alert("hola")
      document.getElementById('btn_representante_1').disabled = false
    } else {
      document.getElementById('btn_representante_1').disabled = true
    }

  }

  document.getElementById("ci").addEventListener("keyup", habilitar)