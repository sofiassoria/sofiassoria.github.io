<?php 
$conx = include "../../includes/conexion.php";
$id_codigo = $_POST["id_codigo"];
$descripcion = $_POST["descripcion"];
$precio_costo = $_POST["precio_costo"];
$precio_venta = $_POST["precio_venta"];
$precio_total = $_POST["precio_total"];
$cantidad = $_POST["cantidad"];
$id = $_POST["id"];

if ($id_codigo == 0) {
	// es un insert

$sql = "INSERT INTO productos "; 
$sql.= "(id_codigo, descripcion, precio_costo, precio_venta, precio_total, cantidad) "; 
$sql.= "VALUES ('$id_codigo', '$descripcion', '$precio_costo', '$precio_venta', '$precio_total', '$cantidad') ";
} else {

$sql = "UPDATE productos SET "; 
$sql.= " id_codigo = '$id_codigo',";
$sql.= " descripcion = '$descripcion', ";
$sql.= " precio_costo = '$precio_costo', ";
$sql.= " precio_venta = '$precio_venta' ";
$sql.= " precio_total = '$precio_total' ";
$sql.= " cantidad = '$cantidad' ";
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