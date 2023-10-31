<?php 
session_start();

// comprobamos si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location:login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">	
</head>
<body>

	<div class="container">
		<div class="row mt-3">
			<div class="col">
				<h2 class="text-center">Panel usuario</h2>
			</div>
		</div>

		<div class="row mt-5">
			<div class="mt-1 col-sm">
				<a href="#" class="w-100 btn btn-outline-primary">Opción 1</a>
			</div>
			<div class="mt-1 col-sm">
				<a href="#" class="w-100 btn btn-outline-primary">Opción 2</a>
			</div>
			<div class="mt-1 col-sm">
				<a href="logout.php" class="w-100 btn btn-outline-primary">Cerrar Sesión</a>
			</div>
		</div>
		<div class="row">
			<div class="col mt-5">
				<p>
					Bienvenido usuario: <strong><?php echo $_SESSION['usuario'] ?></strong>
				</p>
				<?php echo "<hr>".session_id()."<hr>"; ?>
			</div>
		</div>
			
	</div>
</body>
</html>