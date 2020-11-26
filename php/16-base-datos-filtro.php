<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ler táboa de base de datos filtrando a consulta</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<style>
		.row {
			margin-bottom: 12px;
		}
	</style>
</head>
<?php 

$nome=$_GET["nome"] ?? "";
$csexo=$_GET["sexo"] ?? "";
$prov=$_GET["prov"] ?? array();
$dep=$_GET["dep"] ?? array();
$tfd=$_GET["tfd"] ?? "OR";



$condicion="";
/*
if($nome!="") $condicion="WHERE nome LIKE '%$nome%'";

if($csexo!="") {
	if($condicion=="")
		$condicion="WHERE sexo='$csexo'";
	else
		$condicion.=" and sexo='$csexo'";
}

*/
if($nome!="") $condicion=" AND nome LIKE '%$nome%'";
if($csexo!="") $condicion.=" AND sexo='$csexo'";
//if($prov!="") $condicion.=" and provincia='$prov'";
//
    //AND (provincia='LU' OR provincia='PO' OR provincia='CO');

if(count($prov)>0) {
	$condicion.=" AND ( provincia='$prov[0]'";
	for ($i=1; $i < count($prov) ; $i++) { 
		$condicion.= " OR provincia='$prov[$i]'";
	}
	$condicion.=")";
}

//deportes: 
//AND deportes LIKE '%ft%'
//AND deportes LIKE '%ft%' OR  deportes LIKE  '%bl%'
//AND deportes LIKE '%ft%' OR  deportes LIKE  '%bl%' OR deportes LIKE '%tn%'


if(count($dep)>0) {
	$condicion.=" AND ( deportes LIKE '%$dep[0]%'";
	for ($i=1; $i < count($dep) ; $i++) { 
		$condicion.= " $tfd  deportes LIKE  '%$dep[$i]%'";
	}
	$condicion.=")";
}

//$tfd terá valor OR se non se marca ou AND cando se marca

require 'funcions.php';
$c=conectarBaseDatos();
$sql="SELECT * FROM alumnos WHERE true $condicion ORDER BY provincia;";

echo "<hr>$sql<hr>";

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
					<div class="form-group">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="sexo" id="home" value="H" <?php echo $csexo=="H"?"checked":"" ?> >
							<label class="form-check-label" for="home">Home</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="sexo" id="muller" value="M" <?php echo $csexo=="M"?"checked":"" ?>>
							<label class="form-check-label" for="muller">Muller</label>
						</div>						
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="sexo" id="ind" value="" <?php echo $csexo==""?"checked":"" ?>>
							<label class="form-check-label" for="ind">Indiferente</label>
						</div>						
					</div>
					<div class="form-group">
						<label for="prov">Provincia</label>
						<select class="form-control" id="prov" name="prov[]" multiple>
							<!-- <option value=""></option> -->
							<option value="CO" <?php echo in_array("CO", $prov)?'selected':'' ?>>A Coruña</option>
							<option value="LU" <?php echo in_array("LU", $prov)?'selected':'' ?>>Lugo</option>
							<option value="OU" <?php echo in_array("OU", $prov)?'selected':'' ?>>Ourense</option>
							<option value="PO" <?php echo in_array("PO", $prov)?'selected':'' ?>>Pontevedra</option>
						</select>
					</div>
					<div class="form-group">
						<div class="form-check form-check-inline">
							<input class="form-check-input"  id="ft" type="checkbox" value="ft" name="dep[]" <?php echo in_array("ft",$dep)?'checked':''?>>
							<label class="form-check-label" for="ft">Fútbol</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input"  id="bl" type="checkbox" value="bl" name="dep[]" <?php echo in_array("bl",$dep)?'checked':''?>>
							<label class="form-check-label" for="bl">Baloncesto</label>
						</div>						
						<div class="form-check form-check-inline">
							<input class="form-check-input"  id="tn" type="checkbox" value="tn" name="dep[]" <?php echo in_array("tn",$dep)?'checked':''?>>
							<label class="form-check-label" for="tn">Ténis</label>
						</div>						
					</div>	
					<div class="form-group">
						<div class="form-check form-check-inline">
							<input class="form-check-input"  id="tfd" type="checkbox" value="AND" name="tfd" <?php echo $tfd=="AND"?'checked':''?>>
							<label class="form-check-label" for="tfd">Filtro deportes estricto</label>
						</div>						
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