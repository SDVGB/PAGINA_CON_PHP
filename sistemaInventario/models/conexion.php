<?php 

const SERVER 	= "localhost";
const USER 		= "root";
const PASSWORD  = "";
const BD 		= "bdinventario";


class Conexion{
	
	static public function Conectar(){

		$cn = new mysqli(SERVER, USER, PASSWORD, BD);

		return $cn;
	} 
}

?>