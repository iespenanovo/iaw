<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lectura tabla alumnos de la BD</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
	">
</head>
<body>

<?php 
	require "base-datos.php";
	$SQL="SELECT * FROM alumnos ORDER BY provincia,nombre";
	//echo "<p>$SQL</p>";
	$resultado=consultaSQL($c,$SQL);
	$numFilas=mysqli_num_rows($resultado);

	$Ddeportes = array('F' => "Fútbol" , 'B' => "Baloncesto" , 'N' => "Natación");
?>

	<div class="container">
		<div class="row">
			<h1>Listado de alumnos de la BD</h1>
		</div>

		<div class="row">
			<div class="col">
				<table class="table table-responsive table-striped">
					<caption>
						<?php echo "Total: $numFilas alumnos/as"; ?>
					</caption>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>NIF</th>
						<th>Sexo</th>
						<th>Deportes</th>
						<th>Provincia</th>
						<th>Sist.Op.</th>
						<th>Comentario</th>
					</tr>
<?php 
while ($alumno=mysqli_fetch_row($resultado)) {
		list($id,$nombre,$nif,$clave,$sexo,$deportes,$provincia,$so,$comentario)=$alumno;

		echo "<tr>";
			echo "<td>$id</td>";  
			echo "<td>$nombre</td>";
			echo "<td>$nif</td>";
			$Dsexo=$sexo=="H"?"Hombre":"Mujer";
			echo "<td>$Dsexo</td>";
			$arrayDeportes=explode("*",$deportes);

			echo "<td>";
				foreach ($arrayDeportes as $value) {
					echo "{$Ddeportes[$value]}<br>";
				}
			echo "</td>";
			echo "<td>$provincia</td>";
			echo "<td>$so</td>";
			echo "<td>$comentario</td>";
		echo "</tr>";

	}

?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>