<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calculadora</title>
	<style>
		* {
			box-sizing: border-box;
		}
		#contedor{
			width: 80%;
			max-width: 500px;
			margin: auto;
		}	
		h1 {text-align: center;}	
		input[type="number"] {width: 40%; text-align: center;}
		input[type="submit"] {margin-top: 12px;}
		select {width:20%;}
		form {
			width: 50%;
			max-width: 300px;
			margin:auto;
			display: flex;
			flex-wrap: wrap;
		}
		.erro {
			border:2px solid red;
		}
		.erro2 {
			color: red;
			width: 100%;
			text-align: center;
		}	
		#resultado {
			padding: 20px;
			text-align: center;
			font-size: 1.5rem;
		}	
		.azul {color:blue;}
		.vermello {color: red;}
	</style>
</head>
<body>
	<?php 
	$n1=$_GET["n1"]??"";
	$op=$_GET["op"]??"";
	$n2=$_GET["n2"]??"";


	?>
	<div id="contedor">
		<h1>Calculadora</h1>

		<form action="" method="GET">
			<?php 
			$erro = ($_GET && $n1=="") ? "erro" : "";
			?>
			<input class="<?php echo $erro ?>" type="number" name="n1" value="<?php echo $n1 ?>">
			<select name="op">
				<option value="+" <?php echo $op=="+"?"selected":"" ?>>+</option>
				<option value="-" <?php echo $op=="-"?"selected":"" ?>>-</option>
				<option value="x" <?php echo $op=="x"?"selected":"" ?>>x</option>
				<option value="/" <?php echo $op=="/"?"selected":"" ?>>/</option>
			</select>
			<?php 
			$erro = ($_GET && $n2=="") ? "erro" : "";?>			
			<input class="<?php echo $erro ?>" type="number" name="n2" value="<?php echo $n2 ?>">


			<input type="submit" value="calcular">
		</form>

		<?php 
		if ($_GET) {
			if ($n1=="" || $n2=="")  
				echo "<p class='erro2'>Faltan operandos</p>";
			else {
				echo "<div id='resultado'>";

				switch ($op) {
					case '+':
					$resultado=$n1+$n2;
					break;
					case '-':
					$resultado=$n1-$n2;
					break;
					case 'x':
					$resultado=$n1*$n2;
					break;
					case '/':
					if ($n2!=0) $resultado=$n1/$n2;
					else $resultado="erroDiv";

					break;
				}

				if($resultado==="erroDiv") {
					echo "<span class='vermello'>Erro, non é posible a división por 0</span>";

				} else {
					$colorN1 = $n1>=0 ?"azul":"vermello";
					$colorN2 = $n2>=0 ?"azul":"vermello";
					$colorRes = $resultado>=0 ?"azul":"vermello";

					echo "<span class='$colorN1'>$n1</span> $op <span class='$colorN2'>$n2</span> = <span class='$colorRes'>$resultado</span>";
					
				}

				echo "</div>";

			}
		} ?>


	</div>


	
</body>
</html>