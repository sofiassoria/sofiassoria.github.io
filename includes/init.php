<?php
//controlo la secion de usuario
session_start();
//si no exite secion 
if (!isset($_SESSION["email"])) {
	//lo mando al login
	header("Location: /");
}

// creo la conexion a la base de datos
$conexion = include 'conexion.php';

?>