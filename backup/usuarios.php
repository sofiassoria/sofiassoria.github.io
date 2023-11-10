<?php 
//creamos la conexion a la base de datos 
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'mibase');

$lista = mysqli_query($con, "SELECT * FROM usuarios");

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
	<h1>Mi Panel / Usuarios</h1>
	<?php include "includes/menu.php" ?>
	<a href="nuevo.php">Agregar nuevo usuario</a>
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Email</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php while ($fila = mysqli_fetch_array($lista)) { ?>
				<tr>
					<td><?php echo $fila ["id"]?></td>
					<td><?php echo $fila ["nombre"]?></td>
					<td><?php echo $fila ["email"]?></td>
					<td><a href="modificar.php?id=<?php echo $fila["id"] ?>">Modificar</td>
					<td><a href="eliminar.php?id=<?php echo $fila["id"] ?>">Eliminar</td>
				</tr>
				<?php } ?>
		</tbody>
	</table>

</body>
</html>