<?php 
require_once "../models/CategoriasModelo.php";

$operacion = $_POST["tipoOp"];

switch ($operacion) {
	case 'insertarCategoria':
		$nombre		 = $_POST['nombreCategoria'];
		$idCategoria = $_POST['idCategoria'];

		$resultado = CategoriasModelo::InsertarCategoria($idCategoria, $nombre);

		if ( $resultado == true ){
			echo "ok";

		} else {

			echo "error";
		}

		break;

		case 'TraerCategorias':
			$respuesta = CategoriasModelo::TraerCategorias();
		echo $respuesta;
			break;
	
	default:
		
		break;
}


?>