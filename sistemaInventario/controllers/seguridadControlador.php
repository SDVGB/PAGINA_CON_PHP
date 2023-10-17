<?php 
session_start();

/*métodos para la validación de variables.

isset(Variable): para validar la existencia de una variable, independiente del valor que posea.

empty(variable): para validar la NO existencia de una variable.

*/if ( empty($_SESSION['nombreCompleto']) ) {
	//redireccionar.
echo '<script>
	window.location.href = "login.php"
</script>';
}

?>