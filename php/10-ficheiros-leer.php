<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leer Ficheiros en php</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<?php 
$ficheiro=@fopen("datos/datos.csv", "r") or die("<p>Non foi posible abrir o ficheiro datos.csv</p>");
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

$so = array(
	'w10' => 'Windows 10',
	'w8' => 'Windows 8',
	'lx' => 'Linux',
	'mac' => 'MAC OS',
	'ot' => 'Outros'
);



?>
<body>
	<div class="container">	
		<div class="row">
			<div class="col">
				<h1>Leer Ficheiros en php</h1>

				<table class="table table-striped table-sm table-responsive ">
					<tr>
						<th>Nome</th>
						<th>Sexo</th>
						<th>Condicións</th>
						<th>Deportes</th>
						<th>Provincia</th>
						<th>Sist. Op.</th>
						<th>Comentario</th>
					</tr>

					<?php 
					$fila=fgets($ficheiro);
					while (!feof($ficheiro)) {
						echo "\n\t<tr>";

						$campos=explode(";", $fila);
		//echo "<br>$contador -> $fila<br>";
		//echo print_r($campos);
						echo "\n\t\t<td>$campos[0]</td>";
						echo "\n\t\t<td class='text-center'>{$sexo[$campos[1]]}</td>";
						echo "\n\t\t<td class='text-center'>$campos[2]</td>";

						echo "\n\t\t<td>";
								// $campos[3] //temos os deportes separados por guións
								$dep=explode("-", $campos[3]);
								foreach ($dep as $value) {
									echo "$deportes[$value]<br>";
								}

						echo "</td>";

						echo "\n\t\t<td>{$provincias[$campos[4]]}</td>";

						echo "\n\t\t<td>$campos[5]</td>";
						
						echo "\n\t\t<td>$campos[6]</td>";


						echo "\n\t</tr>";

						$fila=fgets($ficheiro);
					}


					?>


				</table>
			</div>
		</div>
	</div>
</body>
</html>