<?php 
require_once "conexion.php";

class ProductosModelo {

	static public function InsertarNuevoProducto ($nombre, $precio, $stock, $estado, $categoria, $idUsuario, $rutaDestino) {

		$cn = Conexion::Conectar();

		$sql = "INSERT INTO productos VALUES(null, '$nombre', $precio, $stock, '$rutaDestino', $estado, $idUsuario, $categoria)";

		$resultado = $cn->query($sql) or die ("Error al ejecutar sql");

		return $resultado;

	}

	static public function ListarProductos() {

		$cn = Conexion::Conectar();

		$sql = "SELECT p.idProductos, p.nombreProducto, p.precioProducto, p.stockProducto, p.imgProducto, c.nombreCategoria 
		FROM productos p INNER JOIN categorias c 
		ON p.idCategorias = c.idCategorias
		ORDER BY nombreProducto ASC";

		$resultado = $cn->query($sql);

		$arreglo = [];
		//contador iniciador en cero
		$i = 0;

		while ( $fila = $resultado->fetch_assoc() ) {
			$arreglo[$i] = $fila;
			$i++;
		}

		return json_encode($arreglo);


	}

}

?>