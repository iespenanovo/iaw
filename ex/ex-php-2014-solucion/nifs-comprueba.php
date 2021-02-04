<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>comprueba nifs</title>
  <style type="text/css" media="screen">
   .nombre {color:red; text-align: center; border:3px dotted red; width: 50%; margin:50px auto;}

   table { 
    width: 70%;
    margin: 0 auto;
    
  }
  table, th, td {
    border: 1px solid black;
    text-align: center;

  }
  .rojo {color:red;}
  .verde {color:green;}

</style>
</head>
<body>
  <h2 class="nombre">Pon aquí tu nombre y apellidos</h2>	
  <table >
    <caption><h1>Comprobación NIFS</h1></caption>
    <tr>
     <th>Nº línea</th>
     <th>DNI</th>
     <th>Provincia</th>
     <th>Comprobación</th>
   </tr>
   <?php 
function letranif ($dni){ //esta función devuelve la letra que le corresponde al dni que se pasa como parámetro.
  //       01234567890123456789012 
	$letras="TRWAGMYFPDXBNJZSQVHLCKE";
  $resto=$dni % 23; //resto de la división entera 
  return $letras[$resto];
}

//escribe aquí el código

$nombreFichero="nifs.txt";
$fichero=fopen($nombreFichero, "r"); 
$linea=fgets($fichero); //devuelve la primera línea del fichero.
$num=0;
while (!feof($fichero)) {
  $campos=explode(";", $linea); //paso los campos a un array
  $num++;

  //$partes=explode("-", $campos[0]);
  // en $partes[0] estaría el número de dni
  // en $partes[1] estaría la letra

  $dni=substr($campos[0],0,-2); //tomamos el dni (todos los caracteres menos los dos últimos;
  $letra=substr($campos[0], -1); //tomamos la letra (último carácter)

  $letraCalculada=letranif($dni);

  //$color = ($letra==$letraCalculada) ? "verde" : "rojo";
  //$comprueba = ($letra==$letraCalculada)?"Correcto":"Error ($letraCalculada)";

  $comprueba="Correcto";
  $color="verde";
  if($letra!=$letraCalculada){
    $comprueba="Error ($letraCalculada)";
    $color="rojo";
  } 

  echo "<tr class='$color'>\n";
  echo "\t<td>$num</td>\n";
  echo "\t<td>$campos[0]</td>\n";
  echo "\t<td>$campos[1]</td>\n";
  echo "\t<td>$comprueba</td>\n";
  echo "</tr>\n";
  $linea=fgets($fichero); //devuelve la siguiente línea del fichero.
}


?>    




</table> 
</body>
</html>
