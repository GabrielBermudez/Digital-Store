
<?php
error_reporting(E_ALL ^ E_NOTICE);

$nombre="";
$apellido="";
$usuario="";
$email="";
$tel="";
$cel="";
$arrayErrores=[];
$contadorValidacion=0;

if(strlen($_POST["nombre"])){
  $nombre=$_POST["nombre"];
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir su nombre";
}


if(strlen($_POST["apellido"])){
  $apellido=$_POST["apellido"];
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir su apellido";
}

if(strlen($_POST["usuario"])){
  $usuario=$_POST["usuario"];
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir un nombre de usuario";
}


if(strlen($_POST["contraseña"])){
  $contraseña=password_hash($_POST["contraseña"],PASSWORD_DEFAULT);
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir su contraseña";
}

if(strlen($_POST["verificarContraseña"])){
  $contraseñaVerif=$_POST["verificarContraseña"];
}else{
  $arrayErrores[]="Debe escribir la verificacion de contraseña";
}
// Comparacion de contraseñas

if(password_verify($contraseñaVerif, $contraseña)){
  $contadorValidacion++;
}else{
    $arrayErrores[]="Las contraseñas no son iguales, no se ha podido validar";
}

if(strlen($_POST["email"])){
  $email=$_POST["email"];
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir su correo electronico";
}


if(strlen($_POST["telefono"]) && is_numeric($_POST["telefono"])){
  $tel=$_POST["telefono"];
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir su telefono";
}


if(strlen($_POST["celular"]) && is_numeric($_POST["telefono"])){
  $cel=$_POST["celular"];
  $contadorValidacion++;
}else{
  $arrayErrores[]="Debe escribir su celular";
}

if($contadorValidacion==8){
  $condicion=true;
}else{
  $condicion=false;
}




echo "<br> <br>";


//Prueba de creacion de usuarios
if($condicion){
$usuarios=[
     "nombre"=>"$nombre","apellido"=>"$apellido","usuario"=>"$usuario",
     "email"=>"$email","contrasenia"=>"$contraseña","telefono"=>"$tel",
     "celular"=>"$cel"
          ];

/*var_dump($usuarios);*/

$contenidoJson= file_get_contents("JSON/base_de_datos.json");
$arrayUsuarios=json_decode($contenidoJson,true);
$condicionJson=true;
if(!empty($arrayUsuarios)){
  foreach ($arrayUsuarios as $user) {
    foreach ($user as $campo => $valor) {
      if($valor==$usuarios["email"]){
        echo "El mail ya se encuentra registrado <br>";
        $condicionJson=false;
        break;
      }else{
        $condicionJson=true;
      }
    }

    if(!$condicionJson){
      break;
    }
  }
}
if($condicionJson){
  $arrayUsuarios[]=$usuarios;
  $baseDatos=json_encode($arrayUsuarios);

file_put_contents("JSON/base_de_datos.json",$baseDatos);
}
}
if(!$condicionJson){
  echo "Fallo el registro";
}








 ?>




<!DOCTYPE html>
<html lang="en" dir="ltr" style="width:900px">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <nav id=barraNavRegistro>
      <a class="barraNav" href="home.php">Home |</a>
      <a class="barraNav" href="perfil.php">Perfil de Usuario |</a>
      <a class="barraNav" href="catalogo.php">Catalogo |</a>
      <a class="barraNav" href="contacto.php">Contacto |</a>
      <a class="barraNav" href="faq.php">F.A.Q</a>
    </nav>

  <form action="registro.php" method="POST">
  <h1 id="titleRegistro">Registrarse</h1>
  <label class="labelInput" for="nombre">Nombre:</label>
  <input class="input" type="text" name="nombre" value="<?=$nombre?>" >

  <label class="labelInput" for="apellido">Apellido:</label>
  <input class="input" type="text" name="apellido" value="<?=$apellido?>" >
  <br>

  <label class="labelInput" for="usuario">Usuario:</label>
  <input class="input" type="text" name="usuario" value="<?=$usuario?>" >

  <label class="labelInput" for="email">E-mail:</label>
  <input class="input" type="email" name="email" value="<?=$email?>" >
  <br>

  <label class="labelInput" for="contraseña">Contraseña:</label >
  <input class="input" type="password" name="contraseña" value="" >

  <label class="labelInput" for="contraseñaConfirmar">Confirmar contraseña:</label >
  <input class="input" type="password" name="verificarContraseña" value="" >
  <br>

  <label class="labelInput" for="telefono">Tel:</label>
  <input class="input" type="number" name="telefono" value="<?=$tel?>">

  <label class="labelInput" for="celular">Cel:</label>
  <input class="input" type="number" name="celular" value="<?=$cel?>">
  <br>

  <label class="labelInput" for="genero">Genero:</label> <br>
  <label class="labelInput"><input type="radio" name="genero" value="">Masculino</label> <br>
  <label class="labelInput"><input type="radio" name="genero" value="">Femenino </label><br>
  <label class="labelInput"><input type="radio" name="genero" value="">Otro</label><br>

<!-- ($_POST ) : checked ? -->


  <select class="paises" name="pais">
    <option value="ar">Argentina</option>
    <option value="cl">Chile</option>
    <option value="cb">Colombia</option>
    <option value="ur">Uruguay</option>
    <option value="br">Brasil</option>
    <option value="pg">Paraguay</option>
  </select>
  <br>


  <input id="botonSubmitRegistro" type="submit">
  </form>
  </body>
</html>
