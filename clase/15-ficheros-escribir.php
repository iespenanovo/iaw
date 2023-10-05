<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Escritura ficheros PHP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">	
</head>
<body>
	<?php 
	$nombre=$_POST['nombre']??"";
	$edad=$_POST['edad']??"";
	$dni=$_POST['dni']??"";
	$poblacion=$_POST['poblacion']??"";

	?>
	<div class="container">
		<h1 class="text-center">Escritura ficheros en PHP</h1>
		<form method="POST">
			<div class="mb-3">
				<label for="poblacion" class="form-label">Nombre</label>
				<input type="text" class="form-control" id="nombre" required name="nombre" value="<?php echo $nombre ?>">
			</div>
			<div class="mb-3">
				<label for="edad" class="form-label">edad</label>
				<input type="number" class="form-control" id="edad" required name="edad" value="<?php echo $edad ?>">
			</div>
			<div class="mb-3">
				<label for="dni" class="form-label">dni</label>
				<input type="text" class="form-control" id="dni" required name="dni" value="<?php echo $dni ?>">
			</div>
			<div class="mb-3">
				<label for="poblacion" class="form-label">poblacion</label>
				<input type="text" class="form-control" id="poblacion" required name="poblacion" value="<?php echo $poblacion ?>">
			</div>

			<input type="submit" class="btn btn-primary" value="Guardar">
		</form>	

		<?php 
		if($_POST) {
			//hemos recibido datos del formulario


			$fichero="doc/datos1.csv";
			//abrimos fichero para solo escritura, añadiendo, controlando posible error 
			$cursor=@fopen($fichero, 'a') or die ("<p>Error al abrir el $fichero </p>");

			fputs($cursor,"$nombre;$edad;$dni;$poblacion\n");

			fclose($cursor);

			echo "<h3 class='mt-5'>Se almacenanron los datos:</h3>";

			echo "<ul>";
			echo "<li>nombre: $nombre</li>";
			echo "<li>edad: $edad</li>";
			echo "<li>dni: $dni</li>";
			echo "<li>población: $poblacion</li>";
			echo "</ul>";

			echo "<p class='mt-3'><a href='15-ficheros-escribir.php'>Nuevo registro</a></p>";



		}
		?>
	
	</div>
</body>
</html>