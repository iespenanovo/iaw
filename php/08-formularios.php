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
	$comentario = $_POST["comentario"] ?? "";

	//echo "<p>$sexo</p>";
?>	
	<div id="contenedor">
		<h1>Formularios</h1>
		<form action="" method="POST">
			<div class="campos">
				<label class="etiqueta" for="nome">Nome: </label>
				<input id="nome" type="text" name="nome" value="<?php echo $nome ?>">
			</div>

			<input type="hidden" value="ref123" name="referencia">

			<div class="campos">
				<label class="etiqueta">Sexo: </label>
				<label for="home">Home </label>
				<input id="home" type="radio" name="sexo" value="H" <?php echo $sexo=='H'?'checked':'' ?> >
				<label for="muller">Muller </label>
				<input id="muller" type="radio" name="sexo" value="M" <?php echo $sexo=='M'?'checked':'' ?>>
			</div>
			<div class="campos">
				<label for="cond">Acepto as condicións</label>
				<input id="cond" type="checkbox" name="condicions" value="SI" <?php echo $condicions=='SI'?'checked':'' ?>>
			</div>

			<div class="campos">
				<label class="etiqueta">Deportes:</label>
				<label for="ft"> Fútbol </label>
				<input id="ft" type="checkbox" value="ft" name="dep[]" <?php echo in_array("ft",$dep)?'checked':''?>>
				<label for="bl"> Baloncesto </label>
				<input id="bl" type="checkbox" value="bl" name="dep[]" <?php echo in_array("bl",$dep)?'checked':''?>>
				<label for="tn"> Ténis </label>
				<input id="tn" type="checkbox" value="tn" name="dep[]" <?php echo in_array("tn",$dep)?'checked':''?>>

			</div>

			<div class="campos">
				<label class="etiqueta" for="prov">Provincia:</label>
				<select name="provincia" id="prov" >
					<option value=""></option>
					<option value="CO" <?php echo $provincia=='CO'?'selected':'' ?>>A Coruña</option>
					<option value="LU" <?php echo $provincia=='LU'?'selected':'' ?>>Lugo</option>
					<option value="OU" <?php echo $provincia=='OU'?'selected':'' ?>>Ourense</option>
					<option value="PO" <?php echo $provincia=='PO'?'selected':'' ?>>Pontevedra</option>
				</select>
			</div>

			<div class="campos">
				<label class="etiqueta" for="so">Sistemas Operativos:</label>
				<select name="so[]" id="so" multiple size="5">
					<option value="w10">Windows 10</option>
					<option value="w8">Windows 8</option>
					<option value="lx">Linux</option>
					<option value="mac">MACOS</option>
					<option value="ot">Outros</option>
				</select>
			</div>

			<div class="campos">
				<label class="etiqueta" for="coment">Comentario:</label>
				<textarea name="comentario" id="coment" rows="4"><?php echo $comentario ?></textarea>
			</div>

			<div class="campos">
				<input type="submit" value="Enviar datos ">
			</div>
		</form>
	</div>
</body>
</html>
