<!DOCTYPE html>
<html lang="gl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Base datos formulario</title>
	<link rel="stylesheet" href="css/08-formularios.css">
</head>
<body>
<?php
	include "funcions.php";
	require "datos-conexion-bd.php";

	$nome = $_POST["nome"] ?? "";
	$sexo = $_POST["sexo"] ?? "";
	$nif = $_POST["nif"] ?? "";
	$dep = $_POST["dep"] ?? array(); //dep é unha colección de valores
	$provincia = $_POST["provincia"] ?? "";
	$comentario = $_POST["comentario"] ?? "";

	//echo "<p>$sexo</p>";
?>	
	<div id="contenedor">
		<h1>Gardar datos en Base Datos</h1>
		<form action="" method="POST">
			<?php 
				$datosCorrectos=true;
				$faltanCampos=0; $clase="";
				if($_POST && $nome=="") {
					$faltanCampos++;
					$clase="fc";
				}
			 ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase?>" for="nome">Nome: </label>
				<input maxlength="40" id="nome" type="text" name="nome" value="<?php echo $nome ?>">
			</div>


			<?php 

				$clase=""; 
				if($_POST) {
					if($nif=="") {
						$faltanCampos++;
						$clase="fc";
					} elseif(!nifCorrecto($nif)) {
						$datosCorrectos=false;
						$clase="di";
					}
				}	

			?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase?>" for="nif">NIF: </label>
				<input maxlength="9" id="nif" type="text" name="nif" value="<?php echo $nif ?>">
			</div>

			<?php $clase=""; if($_POST && $sexo=="") {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>">Sexo: </label>
				<label for="home">Home </label>
				<input id="home" type="radio" name="sexo" value="H" <?php echo $sexo=='H'?'checked':'' ?> >
				<label for="muller">Muller </label>
				<input id="muller" type="radio" name="sexo" value="M" <?php echo $sexo=='M'?'checked':'' ?>>
			</div>

			<?php $clase=""; if($_POST && count($dep)<1) {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>">Deportes:</label>
				<label for="ft"> Fútbol </label>
				<input id="ft" type="checkbox" value="ft" name="dep[]" <?php echo in_array("ft",$dep)?'checked':''?>>
				<label for="bl"> Baloncesto </label>
				<input id="bl" type="checkbox" value="bl" name="dep[]" <?php echo in_array("bl",$dep)?'checked':''?>>
				<label for="tn"> Ténis </label>
				<input id="tn" type="checkbox" value="tn" name="dep[]" <?php echo in_array("tn",$dep)?'checked':''?>>

			</div>
			<?php $clase=""; if($_POST && $provincia=="") {$faltanCampos++;$clase="fc";} ?>

			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>" for="prov">Provincia:</label>
				<select name="provincia" id="prov" >
					<option value=""></option>
					<option value="CO" <?php echo $provincia=='CO'?'selected':'' ?>>A Coruña</option>
					<option value="LU" <?php echo $provincia=='LU'?'selected':'' ?>>Lugo</option>
					<option value="OU" <?php echo $provincia=='OU'?'selected':'' ?>>Ourense</option>
					<option value="PO" <?php echo $provincia=='PO'?'selected':'' ?>>Pontevedra</option>
				</select>
			</div>

			<?php $clase=""; if($_POST && $comentario=="") {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>" for="coment">Comentario:</label>
				<textarea name="comentario" id="coment" rows="4"><?php echo $comentario ?></textarea>
			</div>
			<?php 
			if($_POST) { //formulario enviado
				if($faltanCampos>0 || !$datosCorrectos) {//ou faltan campos ou o nif e incorrecto
					echo "<div class='campos fc'>";
					if($faltanCampos>0) echo "Faltan $faltanCampos campos<br>";
					if(!$datosCorrectos) echo "O NIF $nif é incorrecto";
					echo "</div>";

				} else { //formulario completo, gardamos en BD

					echo "<div class='campos'>Formulario aceptado</div>";
					$c=@mysqli_connect($servidorBD,$usuarioBD,$claveUBD,$nomeBD,$portoBD) or die("<p>Erro ao conectar co servidor de bases de datos $servidorBD<p>");

					$sql="SET NAMES 'utf8';";
					@mysqli_query($c,$sql) or die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");


					$nif=strtoupper($nif);
					$depCadea=implode("-", $dep);  
					$sql="INSERT INTO alumnos VALUES 
					(NULL,'$nome','$nif','$sexo','$depCadea','$provincia','$comentario');";
					@mysqli_query($c,$sql);
					//echo "<hr>".mysqli_errno($c)."<hr>";
					switch (mysqli_errno($c)) {
						case 0:
							echo "<p>Os datos foron gardados na base de datos</p>";
							echo "<p><a href='14-base-datos-formulario.php'>Novo rexistro</a></p>";
							break;
						case 1062:
							echo "<p>Erro: o NIF $nif xa existe</p>";
							break;
/*
						case 1406:
							if(strlen($nif)>9)
								echo "<p>Erro: o NIF non pode superorar 9 caracteres</p>";
							else
								echo "<p>Erro: o nome non pode superar os 40 caracteres</p>";
							break;
*/
						
						default:
							die ("<p>Erro ao executar a sentenza sql: <b>$sql</b>
								   <br> Error número: ".mysqli_errno($c).
								   "<br> Descrición erro: ".mysqli_error($c).
								   "</p>");
							break;
					}

					mysqli_close($c);
				
				}
			}
			?>

			<div class="campos">
				<input type="submit" value="Enviar datos ">
			</div>
		</form>
	</div>
</body>
</html>

