<?php
//
session_start();


//leemos los parámetros del login
$usuario=$_POST['usuario']??"";
$clave=$_POST['clave']??"";


//definimos las credenciales correctas (lo usual es consultar a la BD)
// $claveBD=hash('md5', 'Abc123..');
// echo "<hr>$claveBD<hr>";
// $claveBD=@crypt('Abc123..');
// echo "$claveBD<hr>";


$usuarioBD="ana";
$claveBD='$1$DOAFK4wZ$vmD2K6K3WVUkjAUBEfIE.0';

$credenciales=true;

if ($usuario==$usuarioBD) {
	//el usuario existe
	if(password_verify(password, hash))
}






?>