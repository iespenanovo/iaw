<?php 
require 'base-datos.php';
require 'funciones.php';

$nombre=$_POST['nombre']??"";
$nif=$_POST['nif']??"";
$nif=strtoupper($nif);//lo pasamos a mayúsculas
$clave=$_POST['clave']??"";
$sexo=$_POST['sexo']??"";
$deportes=$_POST['deportes']??array();//si no tenemos parámetro 'deportes[]' crea un array vacío
$provincia=$_POST['provincia']??"";
$so=$_POST['so']??array();//si no tenemos parámetro 'so[]' crea un array vacío
$comentario=$_POST['comentario']??"";


$mensajesError="";

?>
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
				<?php 
				    $clases="";
					if ($nombre=="" and $_POST) {//nombre vacío Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>El campo nombre es obligatorio</p>";
						}	
				?>
				<label for="nombre" class="<?php echo $clases ?>">Nombre</label>
				<input id="nombre" type="text" name="nombre" value="<?php echo $nombre ?>" >
			</div>

			<div class="campo">
				<?php 
				    $clases="";
					if ($nif=="" and $_POST) {//nif vacío Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>El campo NIF es obligatorio</p>";
						} elseif(!validarNIF($nif) and $_POST)	{
							$clases='error';
							$mensajesError.="<p class='error'>El NIF no es válido</p>";
						}
				?>				
				<label for="nif" class="<?php echo $clases ?>">NIF</label>
				<input id="nif" type="text" name="nif" value="<?php echo $nif ?>">
			</div>

			<div class="campo">
				<?php 
				    $clases="";
					if ($clave=="" and $_POST) {//clave vacío Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>El campo contraseña es obligatorio</p>";
						}	
				?>	
				<label for='clave' class='<?php echo $clases ?>'>Contraseña:</label>
				<input id='clave' type='password' name='clave' value='<?php echo $clave ?>'>				
			</div>

			<div class="campo">
				<?php 
				    $clases="";
					if ($sexo=="" and $_POST) {//sexo vacío Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>El campo sexo es obligatorio</p>";
						}	
				?>	

				<label class="<?php echo $clases ?>">Sexo:<br></label>
				<label for="hombre">Hombre </label>
				<input id="hombre" type="radio" name="sexo" value="H" <?php echo $sexo=='H'?'checked':'' ?>   >
				<label for="mujer"> Mujer </label>
				<input id="mujer" type="radio" name="sexo" value="M" <?php echo $sexo=='M'?'checked':'' ?>  >
			</div>

			<div class="campo">
				<?php 
				    $clases="";
					if (count($deportes)<2 and $_POST) {//menos de 2 deportes Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>Es obligatorio marcar al menos 2 deportes</p>";
						}	
				?>	

				<label class="<?php echo $clases ?>">Deportes:<br></label>
				<label for="futbol">Futbol </label>
				<input id="futbol" type="checkbox" name="deportes[]" value="F" <?php echo in_array("F", $deportes)?'checked':'' ?>>
				<label for="baloncesto"> Baloncesto </label>
				<input id="baloncesto" type="checkbox" name="deportes[]" value="B" <?php echo in_array("B", $deportes)?'checked':'' ?>>
				<label for="natacion"> Natación </label>
				<input id="natacion" type="checkbox" name="deportes[]" value="N" <?php echo in_array("N", $deportes)?'checked':'' ?>>
			</div>


			<div class="campo">
				<?php 
				    $clases="";
					if ($provincia=="" and $_POST) {//provincia vacío Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>El campo provincia es obligatorio</p>";
						}	
				?>	

				<label for="provincia" class="<?php echo $clases ?>">Provincia:</label>
				<select name="provincia" id="provincia">
					<option value=""></option>
					<option value="CO" <?php echo $provincia=="CO"?"selected":"" ?>>A Coruña</option>
					<option value="LU" <?php echo $provincia=="LU"?"selected":"" ?>>Lugo</option>
					<option value="OU" <?php echo $provincia=="OU"?"selected":"" ?>>Ourense</option>
					<option value="PO" <?php echo $provincia=="PO"?"selected":"" ?>>Pontevedra</option>
				</select>
			</div>

			<div class="campo">
				<?php 
				    $clases="";
					if (count($so)<1 and $_POST) {//menos de 1 so Y formulario enviado
							$clases='error';
							$mensajesError.="<p class='error'>Es obligatorio marcar al menos un sistema operativo</p>";
						}	
				?>	


				<label for="so" class="<?php echo $clases ?>">Sistemas Operativos:<br></label>
				<select name="so[]" id="so" multiple size="5">
					<option value="W8" <?php echo in_array("W8", $so)?'selected':'' ?>>Windows 8</option>
					<option value="W10" <?php echo in_array("W10", $so)?'selected':'' ?>>Windows 10</option>
					<option value="W11" <?php echo in_array("W11", $so)?'selected':'' ?>>Windows 11</option>
					<option value="LX" <?php echo in_array("LX", $so)?'selected':'' ?>>Linux</option>
					<option value="MOS" <?php echo in_array("MOS", $so)?'selected':'' ?>>macOS</option>
				</select>
			</div>


			<div class="campo">
				<label for="comentario">Comentario:<br></label>
				<textarea name="comentario" id="comentario" cols="30" rows="5"><?php echo $comentario ?></textarea>
			</div>

			<div class="campo">
				<input type="submit" value="Enviar formulario">
			</div>

			<?php 
				echo $mensajesError;

				if($mensajesError=="" and $_POST) {
					//formulario validado sin errores
					//podemos guardar en tabla alumnos 
					//de la base de datos

					$clave=hash('md5', $clave);
					$cadenaDeportes=implode("*", $deportes);
					$cadenaSO=implode("*",$so);
					$SQL="
					INSERT INTO 
					`alumnos` (`nombre`, `nif`, `clave`, `sexo`, `deportes`, `provincia`, `so`, `comentario`) 
					VALUES
					('$nombre','$nif','$clave','$sexo','$cadenaDeportes','$provincia','$cadenaSO','$comentario')";
					@mysqli_query($c,$SQL);

					switch (mysqli_errno($c)) {
						case 0: $mensaje="<p class='aceptado'>Formulario aceptado y registro almacenado en base de datos</p><p><a href='?'>[Nuevo registro]</a></p>";
							// code...
							break;
						case 1062://error de clave duplicada
								$mensaje="<p class='error'>El NIF <strong>$nif</strong> ya existe en la base de datos</p>";
							break;	
						
						default:
								$mensaje="
								<p class='error'>Error en sentencia SQL : <strong>$SQL</strong></p>
								<p class='error'>Error nº: <strong>".mysqli_errno($idCon)."</strong></p>
								<p class='error'>Descripción: <strong>".mysqli_error($idCon)."</strong></p>";
						break;
					}

					echo $mensaje;
				}


				mysqli_close($c);//cerramos conexión con servidor BD
			?>

		</form>


	</div>
</body>
</html>