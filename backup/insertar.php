<?php 
//creamos la conexion a la base de datos 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mibase');

$nombre = $_POST["nombre"];
$email = $_POST["email"];

$sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email') ";
mysqli_query($con, $sql);

header("Location: index.php");
?>