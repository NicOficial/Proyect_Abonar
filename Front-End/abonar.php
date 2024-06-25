<!-- Pagina Oficial de Abonar con la billetera -->
<!-- Pagina de ejemplo -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../Css/abonar.css" />
    <link
      href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX"
      rel="stylesheet"
      type="text/css"
    />
    <title>Abonar‎ | ‎Hacé más con tu plata</title>
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
    
  </head>
  <body>
    <div class="menu">
      <ion-icon name="menu-outline"></ion-icon>
      <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
      <div>
        <div class="nombre-pagina">
          <ion-icon id="cloud" name="filter-outline"></ion-icon>
          <span>‎ ‎ Abonar</span>
        </div>
      </div>

      <nav class="navegacion">
        <ul>
          <div class="tab">
            <li class="boton1">
              <a id="boton1" href="#">
                <ion-icon name="home-outline"></ion-icon>
                <span>Inicio</span>
              </a>
            </li>
          </div>

          <div class="tab">
            <li>
              <a href="#" id="mostrar-perfil">
                <ion-icon name="person-circle-outline"></ion-icon>
                <span>Perfil</span>
              </a>
            </li>
          </div>

          <div class="tab">
            <li>
              <a href="#">
                <ion-icon name="cash-outline"></ion-icon>
                <span>Transferencias</span>
              </a>
            </li>
          </div>

          <li>
            <a href="#">
              <ion-icon name="document-lock-outline"></ion-icon>
              <span>Terminos y Condiciones</span>
            </a>
          </li>
          <li></li>
          <li>
            <a href="#">
              <ion-icon name="chatbox-ellipses-outline"></ion-icon>
              <span>Soporte</span>
            </a>
          </li>

          <li class="cerrar-sesion">
            <a href="#">
              <ion-icon name="exit-outline"></ion-icon>
              <span>Cerrar Sesion</span>
            </a>
          </li>
        </ul>
      </nav>

      <div>
        <div class="linea"></div>

        <div class="modo-oscuro">
          <div class="info">
            <ion-icon name="moon-outline"></ion-icon>
            <span>Dark Mode</span>
          </div>
          <div class="switch">
            <div class="base">
              <div class="circulo"></div>
            </div>
          </div>
        </div>

        <div class="usuario">
          <img src="../Img/unnamed.jpg" alt="" />
          <div class="info-usuario">
            <div class="nombre-email">
              <span class="nombre">Jhampier</span>
              <span class="email">jhampier@gmail.com</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script>
      const cloud = document.getElementById("cloud");
      const barraLateral = document.querySelector(".barra-lateral");
      const spans = document.querySelectorAll("span");
      const palanca = document.querySelector(".switch");
      const circulo = document.querySelector(".circulo");
      const menu = document.querySelector(".menu");
      const main = document.querySelector("main");

      menu.addEventListener("click", () => {
        barraLateral.classList.toggle("max-barra-lateral");
        if (barraLateral.classList.contains("max-barra-lateral")) {
          menu.children[0].style.display = "none";
          menu.children[1].style.display = "block";
        } else {
          menu.children[0].style.display = "block";
          menu.children[1].style.display = "none";
        }
        if (window.innerWidth <= 320) {
          barraLateral.classList.add("mini-barra-lateral");
          main.classList.add("min-main");
          spans.forEach((span) => {
            span.classList.add("oculto");
          });
        }
      });

      palanca.addEventListener("click", () => {
        let body = document.body;
        body.classList.toggle("dark-mode");

        circulo.classList.toggle("prendido");
      });

      cloud.addEventListener("click", () => {
        barraLateral.classList.toggle("mini-barra-lateral");
        main.classList.toggle("min-main");
        spans.forEach((span) => {
          span.classList.toggle("oculto");
        });
      });
    </script>
  </body>
</html>