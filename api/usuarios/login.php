<?php

session_start();

$email = $_POST["email"];
$password = $_POST["password"];


//creamos una conexion a la base de datos
$conexion = include "../../includes/conexion.php"; 


$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password' ";
$resultado = mysqli_query($conexion, $sql);
$cantidadRegistros = mysqli_num_rows($resultado);

if ($cantidadRegistros == 0) {

	echo json_encode(array(
		"error" => 1
	));
} else {

	//el usuario se logueo por primera vez

	$_SESSION["email"] = $email;

	echo json_encode(array(
	 "error" => 0
	));
}

  ?>