<?php 
$conx = include "../../includes/conexion.php";
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$password = $_POST["password"];
$id = $_POST["id"];

if ($id == 0) {
	// es un insert

$sql = "INSERT INTO usuarios "; 
$sql.= "(nombre, email, password, telefono) "; 
$sql.= "VALUES ('$nombre', '$email', '$password', '$telefono') ";
} else {

$sql = "UPDATE usuarios SET "; 
$sql.= " nombre = '$nombre',";
$sql.= " email = '$email', ";
$sql.= " telefono = '$telefono', ";
$sql.= " password = '$password' ";
$sql.="WHERE id = $id ";
}

$resultado = mysqli_query($conx,$sql);
if($resultado) {
if (mysqli_affected_rows($conx) > 0) {
	echo json_encode(array("error" => 0));
} else {
    echo json_encode(array("error" => 1, "message" => "No se realizaron cambios en la base de datos."));
}
} else {
	echo json_encode(array("error" => 1, "message" => "hubo un error en la consulya sql:" .mysqli_error($conx)));
}


?>