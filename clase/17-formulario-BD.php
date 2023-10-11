
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularios en PHP</title>
	<link rel="stylesheet" href="css/17-estilo.css">
</head>
<body>
	<div class="contenedor">
		<h1>Formulario BD</h1>
		<h3>Guardamos registros en tabla 'alumnos' de la base de datos iaw-23-24</h3>

		<form action="" method="POST">
			<div class="campo">
				<label for="nombre" class="">Nombre</label>
				<input id="nombre" type="text" name="nombre" value="">
			</div>

			<div class="campo">
				<label for="nif" class="">NIF</label>
				<input id="nif" type="text" name="nif" value="">
			</div>

			<div class="campo">
				<label for='clave' class=''>Contraseña:</label>
				<input id='clave' type='password' name='clave' value=''>				
			</div>

			<div class="campo">
				<label class="">Sexo:<br></label>
				<label for="hombre">Hombre </label>
				<input id="hombre" type="radio" name="sexo" value="H"  >
				<label for="mujer"> Mujer </label>
				<input id="mujer" type="radio" name="sexo" value="M" >
			</div>

			<div class="campo">

				<label class="">Deportes:<br></label>
				<label for="futbol">Futbol </label>
				<input id="futbol" type="checkbox" name="deportes[]" value="F" >
				<label for="baloncesto"> Baloncesto </label>
				<input id="baloncesto" type="checkbox" name="deportes[]" value="B" >
				<label for="natacion"> Natación </label>
				<input id="natacion" type="checkbox" name="deportes[]" value="N" >
			</div>


			<div class="campo">

				<label for="provincia" class="">Provincia:</label>
				<select name="provincia" id="provincia">
					<option value=""></option>
					<option value="CO" >A Coruña</option>
					<option value="LU" >Lugo</option>
					<option value="OU" >Ourense</option>
					<option value="PO" >Pontevedra</option>
				</select>
			</div>

			<div class="campo">

				<label for="so" class="">Sistemas Operativos:<br></label>
				<select name="so[]" id="so" multiple size="5">
					<option value="W8" >Windows 8</option>
					<option value="W10" >Windows 10</option>
					<option value="W11" >Windows 11</option>
					<option value="LX" >Linux</option>
					<option value="MOS" >macOS</option>
				</select>
			</div>


			<div class="campo">
				<label for="comentario">Comentario:<br></label>
				<textarea name="comentario" id="comentario" cols="30" rows="5"></textarea>
			</div>

			<div class="campo">
				<input type="submit" value="Enviar formulario">
			</div>

			

		</form>


	</div>
</body>
</html>