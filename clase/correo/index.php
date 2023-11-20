<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formularios en HTML</title>
	<style>
		#contenedor {
			width: 80%; /* define el ancho del contenedor */
			border: 1px solid grey;
			margin: auto; /*esto centra el contenedor*/
			padding: 20px;
		}
		h1 {
			text-align: center;
		}

		.campo {
			margin-bottom: 10px; /* ponemos 10px de margen inferrior en los campos */
		}
		textarea {
			width: 100%;
		}
		fieldset {
			margin-bottom: 25px;
		}
		legend {
			color: blue;
			font-weight: bold;
			font-style: italic;
		}
	</style>
</head>


<?php 
	$nombre=$_POST['nombre']??"";
	$email=$_POST['email']??"";
	$asunto=$_POST['asunto']??"";
	$texto=$_POST['texto']??"";

	
?>





<body>
	<div id="contenedor">
		<h1>Enviar correo desde PHP</h1>

		<form action="" method="POST">
			<fieldset>
				<legend>Datos correo</legend>
				<div class="campo">
					<label for="cnombre">Nombre 'para':</label>
					<input id="cnombre" type="text" name="nombre" value="" required>
					<!-- required, indica que es un campo obligatorio -->
				</div>

				<div class="campo">
					<label for="cemail">email 'para':</label>
					<input id="cemail" type="email" name="email"  required>
				</div>

				<div class="campo">
					<label for="casunto">Asunto:</label>
					<input id="casunto" type="text" name="asunto" required >
				</div>


				<div class="campo">
					<label for="ctexto">Texto correo:<br></label>
					<textarea name="texto" id="ctexto" cols="30" rows="5" required></textarea>
				</div>


			</fieldset>
			<div class="campo">
				<input type="submit" value="Enviar email">
				<input type="reset" value="Valores por defecto">
			</div>
			

		</form>

<?php 

	if($_POST) {

			$mensaje="<div class='alert alert-success offset-md-3 col-md-6' role='alert'>";
  			$mensaje.="Se ha enviado un correo a <strong>$nombre</strong>";
  			$mensaje.="<br>Correo: <strong>$email</strong>)";
  			$mensaje.="<br>Asunto: <strong>$asunto</strong>)";
  			$mensaje.="<br>Texto:  <strong>$texto</strong>)";
  			$mensaje.="</div>";
  			echo $mensaje;
  			

			$para      = $email;
			$titulo    = $asunto;
			$mensaje   = $texto;

			// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
			$mensaje = wordwrap($mensaje, 70, "\r\n");

		 mail (  // $to =
		         "$para",
		         // $subject =
		         "$titulo",
		         // $message =
		         quoted_printable_encode($mensaje),
				 // $headers =
		         'From: noreply@asir2.iespenanovo.com' . "\r\n" .
		         'Reply-To: noreply@asir2.iespenanovo.com' . "\r\n" .
		         'Content-Type: text/plain; charset=UTF-8' . "\r\n" .
		         'Content-Transfer-Encoding: quoted-printable' . "\r\n" .  // <--- this is THE part.
		         'X-Mailer: PHP/asir2.iespenanovo.com');

	}


 ?>


	</div>
</body>
</html>
