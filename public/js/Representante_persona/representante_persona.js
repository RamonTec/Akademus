function habilitar() {
  ci = document.getElementById('ci').value
  numero1 = document.getElementById('numero1').value
  pnombre = document.getElementById('pnombre').value
  papellido = document.getElementById('papellido').value
  segnombre = document.getElementById('segnombre').value
  segapellido = document.getElementById('segapellido').value
  nom_po = document.getElementById('nom_po').value
  pto_ref = document.getElementById('pto_ref').value
  nom_pais = document.getElementById('nom_pais').value
  nom_estado = document.getElementById('nom_estado').value
  nombre_muni = document.getElementById('nombre_muni').value
  sexo_p = document.getElementById('sexo_p').value
  nacionalidad = document.getElementById('nacionalidad').value

  val = 0

  if(ci == '' || ci.length < 7 || ci.length > 10) val++
  if(numero1 == '' || numero1.length < 8 || numero1.length > 12) val++
  if(pnombre == '' || pnombre.length < 3 ||  pnombre.length > 10 ) val++
  if(papellido == '' || papellido.length < 3 || 10 ) val++
  if(segnombre == '' || segnombre.length < 3 || 10 ) val++
  if(segapellido == '' ) val++
  if(nom_po == '' || nom_po.length < 3 || nom_po.length > 12 ) val++
  if(pto_ref == '' || pto_ref.length < 3 || pto_ref.length > 12 ) val++
  if(nom_pais == '') val++
  if(nom_estado == '' ) val++
  if(nombre_muni == '' ) val++
  if(sexo_p == '') val++
  if(nacionalidad == '') val++

  if(val == 0) document.getElementById('btn_representante_1').disabled = false
  else document.getElementById('btn_representante_1').disabled = true
}

document.getElementById('ci').addEventListener("keyup", habilitar)