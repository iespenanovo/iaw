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


	$provincia=$_GET["provincia"]??"";
	$sexo=$_GET["sexo"]??"";
	$deportes=$_GET['deportes']??array();//si no tenemos parámetro 'deportes[]' crea un array vacío

	$filtro="";
	if($provincia!="") 	{
		$filtro.=" and provincia='$provincia'";
	}
	if($sexo!="") 	{
		$filtro.=" and sexo='$sexo'";
	}

	//solución de filtro deportes, donde han de cumplirse todos los deportes marcados:
	// foreach ($deportes as $codDeporte) {
	// 	$filtro.=" and deportes LIKE '%$codDeporte%'";	
	// }


	//solución de filtro deportes, donde vale que se cumpla cualquier deporte marcado:
	//necesito sentencia SQL como el ste ejemplo:
	//SELECT * FROM alumnos WHERE 1 and provincia='LU' and sexo='H' and (deportes LIKE '%F%' or deportes LIKE '%B%') ORDER BY provincia,nombre	

	if(count($deportes)>0) {
		$filtro.=" and (";
		$or="";
		foreach ($deportes as $codDeporte) {
			$filtro.="$or deportes LIKE '%$codDeporte%'";	
			$or=" or";
		}
		$filtro.=")";
	}


	$SQL="SELECT * FROM alumnos WHERE 1 $filtro ORDER BY provincia,nombre";


	//echo "<p>$SQL</p>";
	$resultado=consultaSQL($c,$SQL);
	$numFilas=mysqli_num_rows($resultado);

	$dDeportes = array('F' => 'Fútbol' , 'B' => 'Baloncesto' , 'N' => 'Natación');
	$dSO = array('W8' => 'Windows 8' , 'W10' => 'Windows 10' , 'W11' => 'Windows 11' , 'LX' => 'Linux' , 'MOS' => 'macOS');


	?>

	<div class="container">
		<div class="row">
			<h1>Listado de alumnos de la BD</h1>
		</div>
		<div class="row">
			<div class="col">
				<form method="GET">
					<label for="provincia">Provincia:</label>
					<select name="provincia" id="provincia">
						<option value=""></option>
						<option value="CO" <?php echo $provincia=="CO"?"selected":"" ?>>A Coruña</option>
						<option value="LU" <?php echo $provincia=="LU"?"selected":"" ?>>Lugo</option>
						<option value="OU" <?php echo $provincia=="OU"?"selected":"" ?>>Ourense</option>
						<option value="PO" <?php echo $provincia=="PO"?"selected":"" ?>>Pontevedra</option>
					</select>

					<label class="ms-3" for="hombre">Hombre </label>
					<input id="hombre" type="radio" name="sexo" value="H" <?php echo $sexo=='H'?'checked':'' ?>   >
					<label class="ms-2" for="mujer"> Mujer </label>
					<input id="mujer" type="radio" name="sexo" value="M" <?php echo $sexo=='M'?'checked':'' ?>  >

					<label class="ms-3" for="futbol">Futbol </label>
					<input id="futbol" type="checkbox" name="deportes[]" value="F" <?php echo in_array("F", $deportes)?'checked':'' ?>>
					<label class="ms-2" for="baloncesto"> Baloncesto </label>
					<input id="baloncesto" type="checkbox" name="deportes[]" value="B" <?php echo in_array("B", $deportes)?'checked':'' ?>>
					<label class="ms-2" for="natacion"> Natación </label>
					<input id="natacion" type="checkbox" name="deportes[]" value="N" <?php echo in_array("N", $deportes)?'checked':'' ?>>



					<input class="ms-3 btn btn-secondary" type="submit" value="Filtrar">
					<a class="ms-3 btn btn-secondary" href="?">Borrar filtro</a>

					
				</form>
				<hr>
			</div>
		</div>
		<div><?php echo $SQL ?><hr> </div>
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
							echo "{$dDeportes[$value]}<br>";
						}
						echo "</td>";
						echo "<td>$provincia</td>";

						$arraySO=explode("*",$so);
						echo "<td>";
						foreach ($arraySO as $value) {
							echo "{$dSO[$value]}<br>";
						}

						echo "</td>";
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