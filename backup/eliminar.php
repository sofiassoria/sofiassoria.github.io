<?php
$id = $_GET["id"];
 
//creamos la conexion a la base de datos 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mibase');

$sql = "DELETE FROM usuarios WHERE id = $id";
mysqli_query($con, $sql);

header("Location: index.php");

?>