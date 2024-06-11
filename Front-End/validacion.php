<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../Img/Abonarlogo.png" />
    <link rel="stylesheet" href="../Css/validacion.css" />
    <title>Registro | Abonar</title>
  </head>
  <body>
    <header>
      <nav>
        <a href="abonar.html">
          <img
            src="/Img/highestiqmomento.png"
            height="69px"
            width="123px"
            alt=""
            id="abonarlogo"
          />
        </a>
        <img src="/Img/abonar palabra.png" id="abonarpalabra" />
      </nav>
    </header>
    <div class="container">
      <img src="/Img/reloj.png" id="imagencentro" />
      <form class="adentro">
        <p id="palabramail">
          Estamos procesando tus datos. Este proceso puede tomar unos segundos.
        </p>
      </form>
    </div>
    <script>
      // Función para redirigir a otra página después de 2 segundos
      setTimeout(function () {
        window.location.href = "finregistro.html"; // Cambia "otra_pagina.html" por la URL a la que quieres redirigir
      }, 3000); // 2000 milisegundos = 2 segundos
    </script>
  </body>
</html>
