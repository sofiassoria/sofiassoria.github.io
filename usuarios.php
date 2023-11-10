<?php include "includes/init.php" ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include "includes/scripts.php" ?>
</head>
<body>
<?php include "includes/menu.php" ?>
<h1>Clientes</h1>
<div class="row">
	<div class="col-3">
		<form action="usuarios.php" method="POST">
		 <input type="text" id="buscar" name="filtro" placeholder="Buscar..." value="<?php echo isset($_POST["filtro"]) ? $_POST["filtro"] : "" ?>">
		 <button class="btn btn-dark">Buscar</button>
		</form>
	</div>
	<div class="col-9">
		<a class="btn btn-primary" href="usuario.php">Agregar Cliente</a>
	</div>
</div>
<table class="table">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM usuarios";
	if (isset($_POST["filtro"])) {
		$filtro = $_POST["filtro"];
		$sql.= " WHERE nombre = '$filtro'";
	}
	$resultado = mysqli_query($conexion, $sql);
	while ( $fila = mysqli_fetch_array($resultado) ) { ?>
		<tr>
			<td><?php echo $fila["nombre"] ?></td>
			<td><?php echo $fila["email"] ?></td>
			<td><?php echo $fila["telefono"] ?></td>
			<td><a class="btn btn-primary" href="usuario.php?id=<?php echo $fila["id"] ?>">Editar</td>
			<td><a class="btn btn-primary" href="javascript:void(0)" onclick="eliminar(<?php echo $fila["id"] ?>)">Eliminar</td>
		</tr>
		<?php } ?>
</tbody>
</table>
<script>
	function eliminar(id) {
		if (!confirm("Realmente desea eliminar el elemento")) return;
		//el usuario confirmo que desea confirmar
		$.ajax({
			"url":"api/usuarios/eliminar.php",
			"dataType":"json",
			"type":"post",
			"data":{
				"id":id,
			},
			"success":function(resultado) {
				if (resultado.error == 0) {
					location.reload();
				} else {
					alert("error al eliminar el elemento");
				}
			}
		});
	}
</script>

</body>
</html>