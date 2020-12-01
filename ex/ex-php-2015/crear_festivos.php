<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear festivos</title>
</head>
<body>
<?php 

require("datos-conexion.php");
$baseDatos="iaw2015";
/* Establecemos conexi?n con el servidor de base de datos: */
$c=@mysqli_connect($servidor,$usuario,$clave)
  or die ("<p>Error al conectar con el servidor de base de datos $servidor</p>");

echo "<p>Se ha establecido conexión con servidor de base de datos $servidor</p>";


/* Creamos la base de datos $baseDatos en caso de no existir  */
$sql="CREATE DATABASE IF NOT EXISTS $baseDatos DEFAULT CHARSET=utf8;";
$result=@mysqli_query($c, $sql)
    or die ("<p>Error al crear la base de datos $baseDatos</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<p>Se ha creado la base de datos $baseDatos (si no existía)<p>";

/* Seleccionamos la base de datos con la que queremos trabajar */
@mysqli_select_db($c,"$baseDatos")
    or die ("<p>Error al seleccionar la base de datos $baseDatos</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<p>Se ha seleccionado la base de datos $baseDatos en el servidor $servidor</p>";

$sql ="DROP TABLE IF EXISTS festivos"; //borramos si ya existe la tabla.
$result=@mysqli_query($c, $sql)
    or die ("<p>Error al ejecutar la sentencia SQL: $sql</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");
echo "<br>Tabla festivos eliminada (si existía antes)";

$sql = "CREATE TABLE festivos
            (ano_mes CHAR(7) NOT NULL,
             dias_festivos INT,
             KEY (ano_mes) );";
             
$result=@mysqli_query($c, $sql)
    or die ("<p>Error al crear la tabla 'festivos': $sql</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<br>Tabla festivos creada";

$sql = "INSERT INTO festivos VALUES

                    ('2015-1',1),
                    ('2015-1',6),
                    ('2015-2',15),
                    ('2015-3',19),
                    ('2015-4',2),
                    ('2015-4',3),
                    ('2015-5',1),
                    ('2015-5',17),
                    ('2015-6',3),
                    ('2015-7',25),
                    ('2015-10',12),
                    ('2015-11',1),
                    ('2015-12',6),
                    ('2015-12',8),
                    ('2015-12',25),

                    ('2016-1',1),
                    ('2016-1',6),
                    ('2016-2',7),
                    ('2016-3',24),
                    ('2016-3',25),
                    ('2016-4',23),
                    ('2016-5',2),
                    ('2016-6',3),
                    ('2016-7',25),
                    ('2016-8',15),
                    ('2016-10',12),
                    ('2016-11',1),
                    ('2016-12',6),
                    ('2016-12',8),
                    ('2016-12',25);";

$result=@mysqli_query($c, $sql)
    or die ("<p>Error al ejecutar la sentencia SQL: $sql</p>
        <p>Error número:".mysqli_errno($c)."</p>
        <p>".mysqli_error($c)."</p>");

echo "<h2>los días festivos del 2015 y 2016 fueron añadidos a tabla festivos</h2>";
                    

mysqli_close($c);
      
 ?> 

 
</body>
</html>
