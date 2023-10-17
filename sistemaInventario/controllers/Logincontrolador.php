<?php

require_once "../models/UsuariosModelo.php";

$_correo = $_POST['correo'];
$_password = $_POST['password'];
$passwordEncriptada = MD5($_password);

$respuesta = UsuariosModelo::IniciarSesion($_correo, $passwordEncriptada);

if($respuesta->num_rows == 1){
	$fila = $respuesta->fetch_assoc();
	//Uso de sesiones. Inicializar sesión 
	session_start();
	//Crear variables de sesión
	$_SESSION['nombreCompleto'] = $fila['nombreUsuario'] . " " . $fila['Apellidousuario'];
	$_SESSION['idUsuario'] = $fila['idUsuario'];

	echo "logeado";

} else {
	echo "error";
}

?>