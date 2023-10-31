<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesión</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
	">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col text-center">
				<h2>Inicio de sesión</h2>
			</div>
		</div>
		<div class="row mt-5">
			<div class="offset-3 col-6">
				<form action="autoriza.php" method="POST">
					<div class="mb-3">
						<label for="usuario" class="form-label">Usuario:</label>
						<input type="text" class="form-control" id="usuario" name="usuario">
					</div>
					<div class="mb-3">
						<label for="clave" class="form-label">Contraseña:</label>
						<input type="password" class="form-control" id="clave" name="clave">
					</div>
					<div class="mb-3">
						<input class="btn btn-primary" type="submit" class="form-control" value="Iniciar sesión">
					</div>
				</form>
<?php 
		        $op=$_GET["op"]??"";
		        if($op=="error") {
		            echo "<div class='alert alert-danger' role='alert'>Credenciales incorrectas</div>";
		        }
    
?>   				
			</div>
		</div>
	</div>
</body>
</html>