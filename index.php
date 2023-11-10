<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include "includes/scripts.php" ?>
</head>
<body>
	<div class="container" class="container text-center">
<div class="row">
	<div class="col-md-3">
	</div>
		<div class="col-md-4 border-radius-xl">
			<header>
	<h1>Punto de Venta</h1>
	<button class="btn btn-primary" onclick="registrateAqui()">REGISTRATE AQUI</button>
</header>

	<h2>Inicia Sesion</h2>
	<form id="login-form">
	<div>
		<label class="form-label">Correo Electronico</label>
		<input  class="form-control" type="text" id="email" name="email" placeholder="Ingresa tu email" />
	</div>
	<div>
		<label class="form-label">Contraseña</label>
		<input class="form-control" type="password" id="password" name="password" autocomplete="username" placeholder="Ingresa tu contraseña" />
	</div>
	<button class="btn btn-primary" class="form-label" type="button" onclick="enviar_login()">Ingresar</button>
</form>
</div>
</div>
</div>

	<script>
		function enviar_login() {
			var email = $("#email").val();
			var password = $("#password").val();
			if (email == "") {
				alert("por favor ingrese un email");
				return;
			}
			if (password == "") {
				alert("por favor ingrese una contraseña");
				return;
			}
			$.ajax({
				"url":"api/usuarios/login.php",
				"dataType":"json",
				"type":"post",
				"data": $("#login-form").serialize(),
				"success":function(resultado) {
					if (resultado.error == 0) {
						location.href = "panel.php";
					} else {
						alert("usuario o contraseña incorrectos");
					}
				}
			})
			
		}
	</script>

</body>
</html>