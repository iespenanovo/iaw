<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xerar números dende ata</title>
	<style>
		* {
			box-sizing: border-box;
		}
		#contedor{
			width: 80%;
			max-width: 500px;
			margin: auto;
		}
		.campos {
			margin-bottom: 10px;
		}
		label {
			width: 110px;
			display: inline-block;
		}
		input[type='number'] {
			width: 50px;
		}
		#numeros {
			display: flex;
			flex-wrap: wrap;
			text-align: center;
		}
		#numeros div, td{
			border: 1px solid grey;
			padding: 5px;
			width: 10%;
		}
		.invertido {
			color:white;
			background-color: grey;
		}
		/*
		#numeros div:nth-child(2n){
			color:white;
			background-color: grey;
		}
		*/
		table {
			width: 100%;
			border-collapse: collapse;
			text-align: center;
		}
		.erro {
			color:red;
		}

	</style>
</head>
<body>
	<?php
	$ni = $_GET["ni"] ?? "";
	$nf = $_GET["nf"] ?? "";
	?>
	<div id="contedor">
		<h3>Xeración de números dende 'inicial' ata 'final'</h3>
		<form method="GET">
			<div class="campos">
				<?php $erro = ($_GET && $ni=="") ? "erro" : ""; ?>
				<label for="ni" class="<?php echo $erro ?>">Número inicial:</label>
				<input id="ni" type="number" name="ni" value="<?php echo $ni ?>">
			</div>
			<div class="campos">
				<?php $erro = ($_GET && $nf=="") ? "erro" : ""; ?>
				<label for="nf" class="<?php echo $erro ?>">Número final:</label>
				<input id="nf" type="number" name="nf" value="<?php echo $nf ?>">
			</div>
			<div class="campos">
				<input type="submit" value="Xerar números">
			</div>
		</form>

<!-- mostrar os números con  flexbox, en filas de 10 columnas -->
		<div id="numeros">
		<?php 
			$aspecto="";
			for ($i = $ni; $i <= $nf; $i++) { 
				echo "\n<div class='$aspecto' >$i</div>";
				$aspecto = $aspecto=="invertido"? "" : "invertido";
			}

		 ?>
		 </div>

		 <hr>
<!-- mostrar os números con táboas de 10 columnas -->

		<table>
			<?php 
			$ncol=0;$aspecto="";

			for ($i = $ni; $i <= $nf; $i++) { 
				$ncol++;
				if($ncol==1) echo "\n<tr>";
				echo "\n\t<td class='$aspecto'>$i</td>";
				$aspecto = $aspecto=="invertido"? "" : "invertido";
				if($ncol==10) {
					echo "\n</tr>";
					$ncol=0;
				}
			}
			if($ncol!=0) echo "\n</tr>"; 


			?>


		</table>

	</div>


</body>
</html>