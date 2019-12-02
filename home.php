<!DOCTYPE html>
<html lang="en" dir="ltr" style="width: 1150px;">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body id="bodyHome">
    <nav id="barraNavHome"> <!-- Barra de navegacion       -->
      <a class="barraNav" href="home.php">Home |</a>
      <a class="barraNav" href="perfil.php">Perfil de Usuario |</a>
      <a class="barraNav" href="catalogo.php">Catalogo |</a>
      <a class="barraNav" href="contacto.php">Contacto |</a>
      <a class="barraNav" href="faq.php">F.A.Q</a>
    </nav>
    <!--Botones de ingreso y registrarse      -->
    <input id="botonIngreso" type="button" name="login" value="Ingresar" onclick = "location='login.php'">
    <input id="botonRegistro" type="button" name="registro" value="Registrarse" onclick = "location='registro.php'">
    <img id="logo" src="images/logo.png" alt="Logo de negocio">
    <h1 id="titleHome"> <b>Hanami</b> </h1>
    <!--Aqui estan contenidas todas las fotos        -->
    <section id="contenedorFotos">
      <div><img src="images/foto1.png" alt=""></div>
      <div><img src="images/foto2.png" alt=""></div>
      <div><img src="images/foto3.png" alt=""></div>
      <div><img src="images/foto4.png" alt=""></div>
      <div><img src="images/foto5.png" alt=""></div>
      <div><img src="images/foto7.png" alt=""></div>
      <div><img src="images/foto6.png" alt=""></div>
      <div><img src="images/foto8.png" alt=""></div>

    </section>




    <!-- Aqui esta los logotipos de redes sociales       -->
    <a href="https://www.facebook.com/"> <img class="logos" src="images/facebook.png" alt="Facebook"> </a>
    <a href="https://www.instagram.com/"> <img class="logos" src="images/instagram.png" alt="Instagram"> </a>
    <a href="https://www.twitter.com/"> <img class="logos" src="images/twitter.png" alt="Twitter"> </a>
  </body>
</html>
