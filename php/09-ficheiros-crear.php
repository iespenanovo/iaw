<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularios</title>
	<link rel="stylesheet" href="css/08-formularios.css">

</head>
<body>
<?php
	$nome = $_POST["nome"] ?? "";
	$sexo = $_POST["sexo"] ?? "";
	$condicions = $_POST["condicions"] ?? "";
	$dep = $_POST["dep"] ?? array(); //dep é unha colección de valores
	$provincia = $_POST["provincia"] ?? "";
	$so = $_POST["so"] ?? array(); //so é unha colección de valores
	$comentario = $_POST["comentario"] ?? "";

	//echo "<p>$sexo</p>";
?>	
	<div id="contenedor">
		<h1>Crear ficheiro datos</h1>
		<form action="" method="POST">
			<?php 
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

			<input type="hidden" value="ref123" name="referencia">
			<?php $clase=""; if($_POST && $sexo=="") {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>">Sexo: </label>
				<label for="home">Home </label>
				<input id="home" type="radio" name="sexo" value="H" <?php echo $sexo=='H'?'checked':'' ?> >
				<label for="muller">Muller </label>
				<input id="muller" type="radio" name="sexo" value="M" <?php echo $sexo=='M'?'checked':'' ?>>
			</div>
			<?php $clase=""; if($_POST && $condicions=="") {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label for="cond" class="<?php echo $clase ?>">Acepto as condicións</label>
				<input id="cond" type="checkbox" name="condicions" value="SI" <?php echo $condicions=='SI'?'checked':'' ?>>
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
			<?php $clase=""; if($_POST && count($so)<1) {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>" for="so">Sistemas Operativos:</label>
				<select name="so[]" id="so" multiple size="5">
					<option value="w10" <?php echo in_array("w10",$so)?'selected':''?>>Windows 10</option>
					<option value="w8" <?php echo in_array("w8",$so)?'selected':''?>>Windows 8</option>
					<option value="lx" <?php echo in_array("lx",$so)?'selected':''?>>Linux</option>
					<option value="mac" <?php echo in_array("mac",$so)?'selected':''?>>MACOS</option>
					<option value="ot" <?php echo in_array("ot",$so)?'selected':''?>>Outros</option>
				</select>
			</div>
			<?php $clase=""; if($_POST && $comentario=="") {$faltanCampos++;$clase="fc";} ?>
			<div class="campos">
				<label class="etiqueta <?php echo $clase ?>" for="coment">Comentario:</label>
				<textarea name="comentario" id="coment" rows="4"><?php echo $comentario ?></textarea>
			</div>
			<?php 
				if($faltanCampos>0) {
					echo "<div class='campos fc'>Faltan $faltanCampos campos</div>";
				} elseif($_POST) {
					echo "<div class='campos'>Formulario aceptado</div>";
					$ficheiro=@fopen("datos/datos.csv", "a") or die("<p>Non foi posible abrir o ficheiro datos.csv</p>"); 
					$depCadea=implode("-", $dep);
					$soCadea=implode("-", $so);
					fputs($ficheiro,"$nome;$sexo;$condicions;$depCadea;$provincia;$soCadea;$comentario\n");
					echo "<p>Os datos foron gardados</p>";
					echo "<p><a href='09-ficheiros-crear.php'>Novo rexistro</a></p>";
					fclose($ficheiro);
				}
			?>

			<div class="campos">
				<input type="submit" value="Enviar datos ">
			</div>
		</form>
	</div>
</body>
</html>
