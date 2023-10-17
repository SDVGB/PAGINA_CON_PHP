<?php 
require_once "conexion.php";

class CategoriasModelo{

	static public function ListarCategorias() {

		$conexion = conexion::Conectar();
		$sql = "SELECT * FROM categorias WHERE estadoCategoria = 1";
		$resultado = $conexion->query($sql);

		return $resultado;

	}

	static public function TraerCategorias() {

		$conexion = Conexion::Conectar();
		$sql = "SELECT idCategorias, nombreCategoria FROM categorias";
		$resultado = $conexion->query($sql);

		$arreglo = [];
		//contador iniciador en cero
		$i = 0;

		while ( $fila = $resultado->fetch_assoc() ) {
			$arreglo[$i] = $fila;
			$i++;
		}

		return json_encode($arreglo);
	}

	static public function InsertarCategoria($idCategoria, $nombre) {
		$cn = Conexion::Conectar();

		$sql = "INSERT INTO categorias VALUES(null, '$nombre', 1 )";

		$resultado = $cn->query($sql);
		return $resultado;
	}

}

?>