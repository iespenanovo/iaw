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
				<input id="nome" type="text" name="nome" value="<?php echo $nome ?>">
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
				<input id="nif" type="text" name="nif" value="<?php echo $nif ?>">
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
				if($faltanCampos>0 || !$datosCorrectos) {
					echo "<div class='campos fc'>";
					if($faltanCampos>0) echo "Faltan $faltanCampos campos<br>";
					if(!$datosCorrectos) echo "O NIF $nif é incorrecto";
					echo "</div>";

				} elseif($_POST) {
					echo "<div class='campos'>Formulario aceptado</div>";

					//pasar a base datos
				}
			?>

			<div class="campos">
				<input type="submit" value="Enviar datos ">
			</div>
		</form>
	</div>
</body>
</html>
