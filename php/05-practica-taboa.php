<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Práctica táboa</title>
	<style>
		* {box-sizing: border-box;}
		#contenedor {
			width: 60%;
			margin: 20px auto;
			padding: 20px;
			border: 1px solid #504949;
		}
		h1,h3 {text-align: center;}
		.campos {
			margin-bottom: 10px;
		}
		table {
			margin: 0 auto;
			border: 1px solid #ddd;
			border-collapse: collapse;
			text-align: center; 
		}
		td {
			padding: 5px;
		}
		.fgris {background-color: #ddd;}
		.erro {color:red;}	

	</style>
</head>
<body>
	<?php 
		$num=$_GET["num"]??""; 
	?>
	<div id="contenedor">
		<h1>Táboa de multiplicar</h1>

		<form action=""  method="GET">
			<div class="campos">
				<label for="num">Número táboa:</label>
				<input type="text" id="num" name="num" value="<?php echo $num ?>">
			</div>
			<div class="campos">
				<input type="submit" value="xerar táboa">
			</div>
		</form>
		<?php 
		if (is_numeric($num)) {
			echo "\n<h3>Táboa do $num</h3>";
			$clase="";
			echo "\n<table>";
			for ($i=0; $i <=10 ; $i++) { 
				echo "\n\t<tr $clase>";
				echo "\n\t\t<td>$num</td>";
				echo "\n\t\t<td>x</td>";
				echo "\n\t\t<td>$i</td>";
				echo "\n\t\t<td>=</td>";
				echo "\n\t\t<td>".$num*$i."</td>";
				echo "\n\t</tr>";
				$clase=$clase=="class='fgris'"?"":"class='fgris'";

			}

			echo "\n</table>";
		} elseif($_GET) {//con esto sabemos se foi enviado o formulario
			echo "\n<h3 class='erro'>Debes indicar un número</h3>";

		}


		?>

	</div>

	

</body>
</html>