<?php
//lo usamos en cualquier script que vaya a trabajar con la base de datos 'iaw-23-24', hace la conexión y también selecciona esta base de datos, con codificación utf8
function consultaSQL($idCon,$SQL) {
	$resultado=mysqli_query($idCon,$SQL) or die("
		<p class='error'>Error en sentencia SQL : <strong>$SQL</strong></p>
		<p class='error'>Error nº: <strong>".mysqli_errno($idCon)."</strong></p>
		<p class='error'>Descripción: <strong>".mysqli_error($idCon)."</strong></p>");

	return $resultado;
}

$BD_servidor="localhost";
$BD_usuario="root";
$BD_clave="";//password del usuario $DB_usuario
$BD_baseDatos="iaw-23-24";
$BD_puerto=3306;

$c=@mysqli_connect($BD_servidor,$BD_usuario,$BD_clave,$BD_baseDatos,$BD_puerto) or die("<p>Error conectando con el servidor de bases de datos $BD_servidor</p>");

$SQL="SET NAMES 'utf8'";
consultaSQL($c,$SQL);

?>