<?php 
require_once "../models/ProductosModelo.php";

$operacion = $_POST["tipoOperacion"];

switch ($operacion) {
	case 'insertarProducto':

		$nombre		 = $_POST['nombreProducto'];
		$precio 	 = $_POST['precioProducto'];
		$stock 		 = $_POST['stockProducto'];
		$estado 	 = $_POST['estadoProducto'];
		$categoria 	 = $_POST['categoriaProducto'];
		/*la imagen no es un dato plano como los anteriores, ya que es tipo "archivo" hiria el nombre, la ruta temporal,
		el tamaño, el tipo de archivo y si es que existe algún error.
		*/
		$imagen 	 = $_FILES['imgProducto'];
		$idUsuario 	 = $_POST['idUsuario'];

		//Al imprimir la imagen sale un error de conversion de array a string, por que es un arreglo y un arreglo es un conjunto de valores $arreglo =['valor1','valor2',etc], puede ser unidimensional o bidimensional

		//$arreglo = ["valor", true, 1] esto es un arreglo unidimiensional
		/* esto se uso para ver que era un arreglo Bidimensional
		foreach ($imagen as $key => $value) {
			echo $key ." = ".$value."<br>";
			//el <br> es un salto de linea y el $key imprime el nombre clave
		}*/

		if ($imagen["type"] == "image/jpeg" ||
			$imagen["type"] == "image/jpg"	||
			$imagen["type"] == "image/png"  ) {

			$rutaTemporal = $imagen['tmp_name'];
			$rutaDestino  = "../views/imagenesProductos/".md5($imagen["tmp_name"]).".jpg";
			//recuerda que el md5 es para Encriptar

			$resultado = move_uploaded_file($rutaTemporal, $rutaDestino);

			if ($resultado == true) {
				$respuesta = ProductosModelo::InsertarNuevoProducto($nombre, $precio, $stock, $estado, $categoria, $idUsuario, $rutaDestino);

				if ($respuesta == true){
					echo "ok";
				} else {
					echo "error";
					unlink($rutaDestino);
					//unlink elimina una ruta
				}
			} else {
				echo "errorSubida";
			}

		} else {
			echo "errorArchivo";
		}


		break;
	case "listarProductos":
		$respuesta = ProductosModelo::ListarProductos();
		echo $respuesta;
		break;
	
	default:
		
		break;
}

?>