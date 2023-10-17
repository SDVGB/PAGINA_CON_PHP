let formularioProducto = document.getElementById("formularioProducto")
let ruta = "controllers/ProductosControlador.php"
let tbodyProductos = document.getElementById("tbodyProductos")

formularioProducto.addEventListener('submit', GuardarDatosProducto)

function GuardarDatosProducto (evento) {
	evento.preventDefault()
	let datosProducto = new FormData(formularioProducto)
	//esto hace que todos los name se guarden en la variable datosProducto

	let infoDatosProducto = {
		method: 'POST',
		body: datosProducto
	}
//fetch(la ruta de los datos, el contenido del envio)
	fetch(ruta, infoDatosProducto)
	//tipo de respuesta y contenido de la respuesta
	//texto plano
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
			//obtenemos la modal en una instancia de boostrap y la ocultamos
			let modalProducto = document.getElementById('modalProducto')
			modalProducto = bootstrap.Modal.getInstance(modalProducto)
			modalProducto.hide()

			//resetear el formulario (limpiar los campos)
			formularioProducto.reset()
			//llamamos a la función que carga todos los productos en la tabla.
			CargarProductos()

		} else if (data == "errorArchivo") {

			Swal.fire({
 				icon: 'warning',
  				title: 'Error de formato',
  				text: 'Debe seleccionar una imagen de formato jpeg, jpg, png!'
			})

		} else {

			Swal.fire({
 				icon: 'error',
  				title: 'Ocurrió un problema',
  				text: 'Contáctese con el administrador del sistema'
			})

		}
	})

}

function CargarProductos () {

	tbodyProductos.innerHTML = ""
	
	let infoProductos = new FormData()
	infoProductos.append("tipoOperacion", "listarProductos")
	let objetoProductos = {
		method: 'POST',
		body: infoProductos
	}
	fetch(ruta, objetoProductos)
	.then(respuesta => respuesta.json() )
	.then(data => {
		for (let i = 0; i < data.length; i++){
			tbodyProductos.innerHTML += `
			<tr>
				<th>${ data[i]["idProductos"] }</th>
				<th>
				<img class="img-producto" src="${ data[i]["imgProducto"].substr(3) }">
				</th>
				<th>${data[i]["nombreProducto"]}</th>
				<th>${data[i]["precioProducto"]}</th>
				<th>${data[i]["stockProducto"]}</th>
				<th>${data[i]["nombreCategoria"]}</th>

			</tr>

			`
		}

	})

}
CargarProductos()

//función substr = substraer caracteres de una cadena
let texto = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, explicabo ad a iste similique nesciunt inventore aliquid? Corrupti deleniti corporis doloremque illum velit possimus laborum aspernatur. Nulla, cupiditate aliquid cumque. "

console.log(texto.substr(0, 50) + "...")