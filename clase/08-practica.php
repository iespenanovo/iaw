<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generación de números</title>
	<link rel="stylesheet" href="css/08-estilo.css">
</head>
<body>
	<div class="contenedor">
		
		<h1>Genera números del 1 al x</h1>
<?php 
	$hasta=$_GET["hasta"]??"";
?>
		<form action="">
			<div class="campo">
				<label for="hasta">Número final:</label>
				<input id="hasta" type="number" name="hasta" required value="<?php echo $hasta ?>" >
			</div>
			<div class="campo">
				<input type="submit" value="Enviar">
			</div>
		</form>

	</div>


	
</body>
</html>