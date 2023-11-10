<?php include "includes/init.php"; 
if (isset($_GET["id"])) {
	//estamos modificando el
	$id = $_GET["id"];
// buscamos el usuario determinado en la base de datos
$sql = "SELECT * FROM usuarios WHERE id = $id";
$query = mysqli_query($conexion,$sql);
if (mysqli_num_rows($query) == 0) {
	//no hubo resultado en la query
	header("Location: usuarios.php");
}
//el usuario ya existe
$usuario = mysqli_fetch_array($query);
} 


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include "includes/scripts.php" ?>
</head>
<body>
	<h1>Mi Panel / Usuario</h1>
	<?php include "includes/menu.php" ?>
	<div>
		<label>Nombre</label>
		<input type="text" id="nombre" value="<?php echo (isset($usuario) ? $usuario["nombre"] : "") ?>">
	</div>
	<div>
		<label>Email</label>
		<input type="text" id="email" value="<?php echo (isset($usuario) ? $usuario["email"] : "") ?>">
	</div>
	<div>
		<label>Telefono</label>
		<input type="text" id="telefono" value="<?php echo (isset($usuario) ? $usuario["telefono"] : "") ?>">
	</div>
	<div>
		<label>Password</label>
		<input type="text" id="password" value="<?php echo (isset($usuario) ? $usuario["password"] : "") ?>">
	</div>
	<button onclick="guardar()">Guardar</button>

<script>
	function guardar() {
		// validar que el usuario complete los datos
		var nombre = $("#nombre").val();
		var email = $("#email").val();
		var telefono = $("#telefono").val();
		var password = $("#password").val();
		 if(nombre == "") {
			alert("Por favor ingrese un nombre");
			return;
		}
		if(email == "") {
			alert("Por favor ingrese un email");
			return;
		}
		if(telefono == "") {
			alert("Por favor ingrese un telefono");
			return;
		}
		if(password == "") {
			alert("Por favor ingrese un password");
			return;
		}

		$.ajax({
			"url":"api/usuarios/guardar.php",
			"dataType": "json",
			"type": "post",
			"data":{
				"id": "<?php echo (isset($usuario) ? $usuario["id"] : 0) ?>",
				"nombre": nombre,
				"email": email,
				"telefono": telefono,
				"password": password,
			},
			"success":function(json) {
				if (json.error == 0) {
					location.href = "usuarios.php";
				} else {
					alert("Hubo un error al ingresar el nuevo usuario");
				}
			}

		})
	}


</script>


</body>



</html>