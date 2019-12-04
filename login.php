<?php
error_reporting(E_ALL ^ E_NOTICE);
/*$array=[["gabrielbermudez0@gmail.com","12345"],["gabriel@gmail.com","123"]];*/
$contenidoJson= file_get_contents("JSON/base_de_datos.json");
$arrayUsuarios=json_decode($contenidoJson,true);
$email=$_POST["email"];
$password=$_POST["password"];
$emailEncontrado=false;
$contraseñaEncontrada=false;

  if(strlen($email) && strlen($password)){
    if(filter_var("$email", FILTER_VALIDATE_EMAIL)){

      foreach ($arrayUsuarios as $user) {

        foreach ($user as $datos) {
          if($datos==$email){
            $emailEncontrado=true;

            if(password_verify($password, $user["contrasenia"])){
              echo "Entre al if";
              $contraseñaEncontrada=true;
              break;
            }
          }

        }

      }
      if($emailEncontrado && $contraseñaEncontrada){
        header('Location: exito.php');
      }

    }else{
      echo "El email posee un formato erroneo.";
    }
  }






/*
$captcha="";
$verif="";
for ($i=0; $i < 6 ; $i++) {
$captcha=$captcha . rand(0,9);

}
 function verificar(){
  $verif=$_POST["captcha"];
  echo "captcha: $captcha";
  echo "verif: $verif";
  if($verif==$captcha){
    echo "Verificado";
  }else{
    echo "El codigo ingresado es incorrecto";
  }
}*/
 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Ingresar</title>
  </head>
  <body>
    <nav>
      <a class="barraNav" href="home.php">Home |</a>
      <a class="barraNav" href="perfil.php">Perfil de Usuario |</a>
      <a class="barraNav" href="catalogo.php">Catalogo |</a>
      <a class="barraNav" href="contacto.php">Contacto |</a>
      <a class="barraNav" href="faq.php">F.A.Q</a>
    </nav>
    <form class="" action="login.php" method="post">
      <label id="titleIngreso" for="">Ingresar</label> <br>

      <label class="labelInput" for="">Email:</label>
      <input class="input" id="inputEmail" type="email" name="email" value="" required><br>

      <label class="labelInput" for="">Contraseña:</label>
      <input class="input" type="password" name="password" value="" required><br>


      <input id="botonSubmit" type="submit" name="enviar" value="Enviar">

    </form>



  </body>
</html>
