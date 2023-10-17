let tituloLogin = document.getElementById("tituloLogin")
let formuLogin = document.getElementById("formuLogin")

formuLogin.addEventListener('submit', IniciarSesion)

function IniciarSesion (evento) {
	event.preventDefault()
	let infoLogin = new FormData(formuLogin)
	//se retrocede 3 veces para poder llegar al controller
	let ruta = 'controllers/Logincontrolador.php'
	let objetoDatos = {
		method: 'POST',
		body: infoLogin
	}

	//sirve para comuncarnos con un archivo al lado del servidor
	fetch(ruta, objetoDatos)
	.then(respuesta => respuesta.text())
	.then(data => {
		if (data == "logeado"){
			window.location.href = "index.php"
		} else {
			tituloLogin.innerHTML = "Datos incorrectos"
			tituloLogin.style.color = "red"
		}
	})
}