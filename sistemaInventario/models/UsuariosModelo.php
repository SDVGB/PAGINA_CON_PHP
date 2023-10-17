<?php 

require_once 'conexion.php';


class UsuariosModelo {
	
	static public function IniciarSesion($correo, $password) {
		//llamando una clase:nombreClase::MétodoAEjecutar()
		$cn = Conexion::conectar();

		$sql = "SELECT * FROM usuarios WHERE correoUsuario = '$correo' AND passwordUsuario = '$password'";
		$resultado = $cn->query($sql);

		return $resultado;

	}
}

?>