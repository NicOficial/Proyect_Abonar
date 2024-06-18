<!-- Pagina Oficial de Abonar con la billetera -->
<!-- Pagina de ejemplo -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio ‎ | ‎ Abonar</title>
  <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../Css/abonar.css" />
  <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
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
        <span>Abonar</span>
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

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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


<!-- 
<body>
  <div class="container">
    <div class="text">Contáctanos</div>
    <form action="https://formspree.io/f/mqkrojld" method="POST">
      <div class="form-row">
        <div class="input-data">
          <input type="text" name="nombre" required />
          <div class="underline"></div>
          <label for="">Nombre</label>
        </div>
        <div class="input-data">
          <input type="text" name="apellido" required />
          <div class="underline"></div>
          <label for="">Apellido</label>
        </div>
      </div>
      <div class="form-row">
        <div class="input-data">
          <input type="text" name="correo" required />
          <div class="underline"></div>
          <label for="">Correo Electronico</label>
        </div>
        <div class="input-data textarea">
          <textarea name="mensaje" rows="8" cols="80" required></textarea>
          <br />
          <div class="underline"></div>
          <label for="">Mensaje</label>
        </div>
      </div>
      <div class="form-row submit-btn">
        <div class="input-data">
          <div class="inner"></div>
          <input type="submit" value="Enviar" />
        </div>
      </div>
    </form>
  </div>
</body> -->


<!-- #56d8e4,
#1667a8
);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}
.container form {
padding: 30px 0 0 0;
}
.container form .form-row {
display: flex;
margin: 32px 0;
}
form .form-row .input-data {
width: 100%;
height: 40px;
margin: 0 20px;
position: relative;
}
form .form-row .textarea {
height: 70px;
}
.input-data input,
.textarea textarea {
display: block;
width: 100%;
height: 100%;
border: none;
font-size: 17px;
border-bottom: 2px solid rgba(0, 0, 0, 0.12);
}
.input-data input:focus ~ label,
.textarea textarea:focus ~ label,
.input-data input:valid ~ label,
.textarea textarea:valid ~ label {
transform: translateY(-20px);
font-size: 14px;
color: #3498db;
}
.textarea textarea {
resize: none;
padding-top: 10px;
}
.input-data label {
position: absolute;
pointer-events: none;
bottom: 10px;
font-size: 16px;
transition: all 0.3s ease;
}
.textarea label {
width: 100%;
bottom: 40px;
background: #fff;
}
.input-data .underline {
position: absolute;
bottom: 0;
height: 2px;
width: 100%;
}
.input-data .underline:before {
position: absolute;
content: "";
height: 2px;
width: 100%;
background: #3498db;
transform: scaleX(0);
transform-origin: center;
transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before {
transform: scale(1);
}
.submit-btn .input-data {
overflow: hidden;
height: 45px !important;
width: 25% !important;
}
.submit-btn .input-data .inner {
height: 100%;
width: 300%;
position: absolute;
left: -100%;
background: -webkit-linear-gradient(
right,
#56d8e4,
#1667a8,
#56d8e4,
#1667a8
);
transition: all 0.4s;
}
.submit-btn .input-data:hover .inner {
left: 0;
}
.submit-btn .input-data input {
background: none;
border: none;
color: #fff;
font-size: 17px;
font-weight: 500;
text-transform: uppercase;
letter-spacing: 1px;
cursor: pointer;
position: relative;
z-index: 2;
}
@media (max-width: 700px) {
.container .text {
font-size: 30px;
}
.container form {
padding: 10px 0 0 0;
}
.container form .form-row {
display: block;
}
form .form-row .input-data {
margin: 35px 0 !important;
}
.submit-btn .input-data {
width: 40% !important;
}
}
.textarea {
width: 100%;
} -->