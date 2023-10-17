let formularioCategoria = document.getElementById("formularioCategoria")
let ruta = "controllers/CategoriasControlador.php"

formularioCategoria.addEventListener('submit', GuardarDatosCategoria)

function GuardarDatosCategoria (evento) {
	evento.preventDefault()

	let datosCategoria = new FormData(formularioCategoria)

	let infoDatosCategoria = {
		method: 'POST',
		body: datosCategoria
	}

	fetch(ruta, infoDatosCategoria)
	.then( respuesta => respuesta.text() )
	.then( data => {
		if( data == "ok"){

			Swal.fire({
 				icon: 'success',
  				title: 'Productos ingresado',
  				text: 'El productos se subio exitosamente al sistema!',
  				showConfirmButton: false,
  				timer: 3000
			}) 

				let modalCategoria = document.getElementById('modalCategoria')
			modalCategoria = bootstrap.Modal.getInstance(modalCategoria)
			modalCategoria.hide()

			//resetear el formulario (limpiar los campos)
			formularioProducto.reset()
			//llamamos a la función que carga todos los productos en la tabla.
			CargarCategorias()

		} else {

			Swal.fire({
 				icon: 'error',
  				title: 'Ocurrió un problema',
  				text: 'Contáctese con el administrador del sistema'
			})

		}
	} )

}

function CargarCategorias() {

	tbodyCategorias.innerHTML = ""

	let infoCategorias = new FormData()
	infoCategorias.append("tipoOp", "TraerCategorias")
	let objetoCategoria = {
		method: 'POST',
		body: infoCategorias
	}
	fetch(ruta, objetoCategoria)
	.then(respuesta => respuesta.json())
	.then(data => {
		for (let i = 0; i< data.length; i++){
			tbodyCategorias.innerHTML += `
				<tr>
              <th>${ data[i]["idCategorias"] }</th>
              <th>${ data[i]["nombreCategoria"] }</th>
              <th>
              <button type="button" class="btn btn-info btn-sm">Editar</button>
              <button type="button" class="btn btn-warning btn-sm">Eliminar</button>
              </th>
            </tr>
			`
		}
	})
}
CargarCategorias();	