<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Calcular petición</title>
   <link rel="stylesheet" href="css/00-basico.css">
   <link rel="stylesheet" href="css/02-estilo-calculadora.css">
</head>
<body>
   <h3 class="ex_nombre">Pon aquí tu nombre</h3>
   <h2>Resultado de la petición</h2>

   <?php 
   // Este script realiza el cálculo solicitado por el formulario que hay en '02-calculadora.htm'
   // Este formulario nos envía 2 operandos ('n1' y 'n2') 
   // y un operador ('op') que puede ser '+', '-', '*' o '/', 
   // para suma, resta, multiplicación o división respectivamente.
   // para controlar las operaciones puedes usar 
   // una estructura if/elseif ... o una estructura switch/case: ...

   $n1 = $_GET["n1"]??0;//admite número reales, por eso usamos (float) en lugar de int   
   $n2 = $_GET["n2"]??0;//admite número reales, por eso usamos (float) en lugar de int    

   $n1 = (float) $n1;
   $n2 = (float) $n2;

   $op=$_GET["op"]??"";  

   switch ($op) {
      case '+':
         $resultado=$n1+$n2;
         $color="";
         echo "<div>$n1 $op $n2 = <strong class='$color'> $resultado </strong></div>";
         break;
      case '-':
         $resultado=$n1-$n2;
         $color="";
         echo "<div>$n1 $op $n2 = <strong class='$color'> $resultado </strong></div>";
         break;

      default:
         // code...
         break;
   }

  ?>
</body>
</html>
