<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ler táboa de base de datos filtrando a consulta</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<?php 

$nome=$_GET["nome"] ?? "";

$condicion="";
if($nome!="") $condicion="WHERE nome='$nome'";

require 'funcions.php';
$c=conectarBaseDatos();
$sql="SELECT * FROM alumnos $condicion ORDER BY provincia;";
$resultado=sql($c,$sql);
$nFilas=mysqli_num_rows($resultado);

$sexo = array(
	'H' => 'Home',
	'M' => 'Muller'
);

$provincias = array(
	'CO' => 'A Coruña',
	'LU' => 'Lugo',
	'OU' => 'Ourense',
	'PO' => 'Pontevedra'
);


$deportes = array(
	'ft' => 'Fútbol',
	'bl' => 'Baloncesto',
	'tn' => 'Ténis'
);


?>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Consulta táboa alumnos</h1>
				<h4>Filtro:</h4>
				<form method="GET">
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" aria-describedby="nomeAxuda" name="nome" value="<?php echo $nome ?>"	>
						<small id="nomeAxuda" class="form-text text-muted">calquera cadea que forme parte do nome</small>
					</div>
					<button type="submit" class="btn btn-primary">Filtrar resultados</button>
				</form>

			</div>
		</div>

		<div class="row">
			<div class="col">
				<h6>Nº de filas: <?php 	echo $nFilas ?> </h6>	

				<table class="table table-striped table-sm table-responsive ">
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>NIF</th>
						<th>Sexo</th>
						<th>Deportes</th>
						<th>Provincia</th>
						<th>Comentario</th>
					</tr>

					<?php 

					while ($fila=mysqli_fetch_array($resultado)) {
						echo "\n\t<tr>";
						echo "\n\t\t<td>{$fila['id']}</td>";
						echo "\n\t\t<td>{$fila['nome']}</td>";
						echo "\n\t\t<td>{$fila['nif']}</td>";
						echo "\n\t\t<td>{$sexo[$fila['sexo']]}</td>";
						echo "\n\t\t<td>";
			// $fila['deportes'] temos os deportes separados por guións
						$dep=explode("-", $fila['deportes']);
			//$dep=explode("-", "ft-tn");
			//$dep=array('ft', 'tn' );			
						foreach ($dep as $value) {
							echo "$deportes[$value]<br>";
						}

						echo "</td>";
						echo "\n\t\t<td>{$provincias[$fila['provincia']]}</td>";
						echo "\n\t\t<td>{$fila['comentario']}</td>";
						echo "\n\t</tr>";
					}
					mysqli_close($c);
					?>


				</table>
			</div>
		</div>
	</div>
</body>
</html>