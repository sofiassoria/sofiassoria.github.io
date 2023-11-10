<?php include "../../includes/init.php"; 
if (isset($_GET["id"])) {
	//estamos modificando el
	$id = $_GET["id"];
// buscamos el usuario determinado en la base de datos
$sql = "SELECT * FROM productos WHERE id = $id";
$query = mysqli_query($conexion,$sql);
if (mysqli_num_rows($query) == 0) {
	//no hubo resultado en la query
	header("Location: productos.php");
}
//el usuario ya existe
$producto = mysqli_fetch_array($query);
} 


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include "../../includes/scripts.php" ?>
</head>
<body>
	<h1>Nuevo Producto</h1>
	<?php include "../../includes/menu.php" ?>
	<div>
		<label class="form-label">Codigo</label>
		<input type="text" id="id_codigo" value="<?php echo (isset($producto) ? $producto["id_codigo"] : "") ?>">
	</div>
	<div>
		<label class="form-label">Descripcion</label>
		<input type="text" id="descripcion" value="<?php echo (isset($producto) ? $producto["descripcion"] : "") ?>">
	</div>
	<div>
		<label class="form-label">Precio Costo</label>
		<input type="text" id="precio_costo" value="<?php echo (isset($producto) ? $producto["precio_costo"] : "") ?>">
	</div>
	<div>
		<label class="form-label">Precio Venta</label>
		<input type="text" id="precio_venta" value="<?php echo (isset($producto) ? $producto["precio_venta"] : "") ?>">
	</div>
	<div>
		<label class="form-label">Precio Total</label>
		<input type="text" id="precio_total" value="<?php echo (isset($producto) ? $producto["prercio_total"] : "") ?>">
	</div>
	<div>
		<label class="form-label">Cantidad</label>
		<input type="text" id="cantidad" value="<?php echo (isset($producto) ? $producto["cantidad"] : "") ?>">
	</div>
	<button onclick="guardar()">Guardar</button>

<script>
	function guardar() {
		// validar que el usuario complete los datos
		var codigo = $("#id_codigo").val();
		var descripcion = $("#descripcion").val();
		var preciocosto = $("#precio_costo").val();
		var precioventa = $("#precio_venta").val();
		var preciototal = $("#precio_total").val();
		var cantidad = $("#cantidad").val();
		 if(codigo == "") {
			alert("Por favor ingrese un codigo");
			return;
		}
		if(descripcion == "") {
			alert("Por favor ingrese una descripcion");
			return;
		}
		if(preciocosto == "") {
			alert("Por favor ingrese un precio costo");
			return;
		}
		if(precioventa == "") {
			alert("Por favor ingrese un precio venta");
			return;
		}

		$.ajax({
			"url":"api/productos/guardar.php",
			"dataType": "json",
			"type": "post",
			"data":{
				"id": "<?php echo (isset($producto) ? $producto["id"] : 0) ?>",
				"id_codigo": id_codigo,
				"descripcion": descripcion,
				"precio_costo": precio_costo,
				"precio_venta": precio_venta,
				"precio_total": precio_total,
				"cantidad": cantidad,
			},
			"success":function(json) {
				if (json.error == 0) {
					location.href = "productos.php";
				} else {
					alert("Hubo un error al ingresar el nuevo producto");
				}
			}

		})
	}


</script>


</body>



</html>