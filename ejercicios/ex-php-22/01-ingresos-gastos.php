<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ventas 2019</title>
	<link rel="stylesheet" href="css/00-basico.css">
	<link rel="stylesheet" href="css/01-estilo-ingresos-gastos.css">
</head>
<body>
	<div id="contenedor">	
		<h3 class="ex_nombre">Pon aquí tu nombre</h3>
		<table class="centro">
			<caption><h1>Informe Ingresos/Gastos 2021</h1></caption>
			<tr>
				<th>Nº Línea</th>
				<th>Fecha</th>
				<th>Ingresos</th>
				<th>Gastos</th>
				<th>Provincia</th>
			</tr>
			<?php 
			//aquí va el script que genera los datos del informe para A Coruña y Lugo

			$iProv =  array(
												'A Coruña' => 0 , 
												'Lugo' => 0  
											);
			$gProv =  array(
												'A Coruña' => 0 , 
												'Lugo' => 0  
											);


			$fichero="datos/ingresos-gastos-2021.csv";
			$cursor=@fopen($fichero, "r") or die("<p class='rojo'>No fue posible abrir el fichero $fichero</p>");
			$nLinea=1;
			$linea=fgets($cursor);
			while (!feof($cursor)) { //mientras no llegamos a fin de fichero
				$registro=explode(";", $linea);//pasa al array $registro el contenido de la 				
				//acumulamos gastos e ingresos por provincia usando 2 arrays , necesario para resumen por provincia con 2 arrays


				$color=$registro[3];

				if ($registro[3]=="Lugo" or $registro[3]=="A Coruña" ) {
						$iProv[$registro[3]]+=$registro[1];//acumula ingresos por provincia;
						$gProv[$registro[3]]+=$registro[2];//acumula gastos por provincia
						echo "\n<tr class='$color'>";
						echo "\n\t<td>$nLinea</td>";
						echo "\n\t<td>$registro[0]</td>";
						echo "\n\t<td class='dcha'>$registro[1] €</td>";//ingresos
						echo "\n\t<td class='dcha'>$registro[2] €</td>";//gastos
						echo "\n\t<td>$registro[3]</td>";
						echo "\n</tr>";
						$nLinea++;

				}
				$linea=fgets($cursor);
			}
			fclose($cursor);//cerramos el controlador de fichero
			?>			
		</table>
		<!-- ----------------------------------------------------------------- -->

		<p>&nbsp;</p>
		<table class="centro">
			<caption><h1>Resumen ingresos/gastos 2020 por provincia</h1></caption>
			<tr>
				<th>Provincia</th>
				<th>Ingresos</th>
				<th>Gastos</th>
				<th>Neto</th>
			</tr>
			<?php 
			//aquí va el código que genera los datos del resumen por provincia

			?>
		</table>


	</div> 
</body>
</html>
