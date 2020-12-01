<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario</title>
  <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
<h1 class="nombre">Pon aquí tu nombre y apellidos</h1>
<div id="formulario">
  <form action="formulario.php" method="post">
    <h2>Pedido de Pizza</h2>

    <fieldset>
      <legend>Datos envío</legend>
      <div class="datose">
          <label for="nom">Nombre:</label>
          <input type="Text" name="nom" size="40" maxlength="30" id="nom">
      </div>

      <div class="datose">
          <label for="dir">Dirección:</label>
        <input type="text" name="dir" size="50" maxlength="30" id="dir">
      </div>  
    </fieldset>

    <fieldset>
      <legend>Detalles pedido</legend>

      <div class="detallesp">
          <label class="rotulo">Ingredientes</label>
          <label for="queso"> Queso</label>
        <input type="CheckBox" name="ingre[]" value="Q" id="queso"><br>
          <label for="pimiento"> Pimiento</label>
        <input type="CheckBox" name="ingre[]" value="P" id="pimiento"><br>
          <label for="cebolla"> Cebolla</label>
        <input type="CheckBox" name="ingre[]" value="C" id="cebolla"><br>
      </div>

      <div class="detallesp">
        <label class="rotulo">Tamaño</label>
          <label for="peque"> Pequeña</label>
        <input type="Radio" name="tam" value="10" id="peque"><br>
          <label for="med"> Mediana</label>
        <input type="Radio" name="tam" value="12" id="med"><br>
          <label for="grand"> Grande</label>
        <input type="Radio" name="tam" value="16" id="grand"><br>
      </div>

      <div class="detallesp">
        <label for="ins">Instrucciones Especiales</label>
        <textarea name="ins" rows="5" id="ins" placeholder="Escribe aquí"></textarea>       
      </div>

    </fieldset>

    <fieldset>
      <legend>Forma de Pago</legend>

      <div class="datosp">
        <label for="fpago">Datos Pago:</label>
        <select name="fpago" size="1" id="fpago">
          <option value=""></option>
          <option value="1">Contado</option>
          <option value="2">Visa</option>
          <option value="3">Cheque</option>
        </select>
      </div>
        
    </fieldset>

    <p class="botones">
      <input type="submit" name="enviar" value="Enviar" >
        <input type="reset" value="Borrar">
    </p>

  </form>

  <?php 
  $nom=isset($_POST["nom"])?$_POST["nom"]:"";
  $dir=isset($_POST["dir"])?$_POST["dir"]:"";
  $ingre=isset($_POST["ingre"])?$_POST["ingre"]:"";
  $tam=isset($_POST["tam"])?$_POST["tam"]:"";
  $fpago=isset($_POST["fpago"])?$_POST["fpago"]:"";
  $ins=isset($_POST["ins"])?$_POST["ins"]:"";

  $enviado=isset($_POST["enviar"])?true:false;

  /* 
  Introducir aquí código php para grabar los datos del formulario en el archivo formulario.txt.
  cada vez que se acepta un formulario, se añade una fila al final del fichero con los datos de los
  campos separados por el carácter punto y coma (;). 
  Ten en cuenta que el campo 'ingre' es un array, y debemos grabar todos los valores que contenga. 
  Así por ejemplo si el contenido de ingre fuese :
  $ingre[0]='P', $ingre[1]='C'; grabaríamos la cadena 'PC' como contenido para este campo. 
  Al final de cada línea debemos grabar un salto de línea (\n).   
  */     



  ?> 

</div> <!-- fin de div id="formulario" -->
</body>
</html>

