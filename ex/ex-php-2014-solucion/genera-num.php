<html>
<head>
	<title>Generador de números</title>
	<style type="text/css" media="screen">
	.nombre {color:red; text-align: center; border:3px dotted red; width: 50%; margin:50px auto;}
	.titulo {color:blue; text-align: center; width: 50%; margin:auto;}
		
	.rojo {
		color:red;
	}	
	.azul {
		color:blue;
	}

	* { box-sizing: border-box; }
	#contenedor, #volver {
		width: 90%;
		margin: 20px auto;
		overflow: hidden;
		clear: both;
	}
	.numero {
		float: left;
		width: 10%;
		font-size: 1.2rem;
		text-align: center;
		border: 1px solid blue;
		padding: 5px;
	}
	</style>
</head>
<body>
	<h2 class="nombre">Pon aquí tu nombre y apellidos</h2>
	<h3 class="titulo">Lista de Números solicitados</h3>     
<?php
   $desde=$_GET["desde"]??"";
   $hasta=$_GET["hasta"]??"";
   $inc=$_GET["inc"]??"";
//   echo "$desde $hasta $inc";

   if($desde=="" or $hasta=="" or $inc=="") {
   		echo "<h2 class='rojo'>Error: faltan datos</h2>";
   } else {
   	    $color="azul";
   		echo "<div id='contenedor'>";
   		for ($i=$desde; $i <= $hasta ; $i+=$inc) { 
   			echo "<div class='numero $color'>$i</div>";
   			$color = $color=="azul" ? "rojo" : "azul";
   			# code...
   		}

   		echo "</div>";
   }


?>
	<div id='volver'>
		<a href="genera-num.html">[VOLVER]</a>
	</div>

</body>
</html>