<?php

session_start();

include 'con_db.php';

$email = $_SESSION['email'];
$info_user = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email'");

$name = $info_user['name'];
$surname = $info_user['surname'];
$password = $info_user['password'];
$address = $info_user['$address'];
$postal = $info_user['$postal'];
$amount = $info_user['$amount'];

?>

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
    <link
      href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/abonar.css" />
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
              <a id="boton1" href="#inicio">
                <ion-icon name="home-outline"></ion-icon>
                <span>Inicio</span>
              </a>
            </li>
          </div>

          <div class="tab">
            <li>
              <a href="#perfil" id="mostrar-perfil">
                <ion-icon name="person-circle-outline"></ion-icon>
                <span>Perfil</span>
              </a>
            </li>
          </div>

          <div class="tab">
            <li>
              <a href="#transferencias">
                <ion-icon name="cash-outline"></ion-icon>
                <span>Transferencias</span>
              </a>
            </li>
          </div>

          <li>
            <a href="#historial">
              <ion-icon name="document-lock-outline"></ion-icon>
              <span>Historial</span>
            </a>
          </li>
          <li></li>
          <li>
            <a href="#soporte">
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
            <span>Modo oscuro</span>
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
              <span class="nombre"><?php echo $name;?></span>
              <span class="email"><?php echo $email;?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

    <main>
      <section id="inicio">
        <h1 class="bienvenido">Bienvenido, <span id="nombre-usuario"><?php echo $name;?></span></h1>
        <p id="saldo">Saldo: $<span id="saldo-usuario"><?php echo $amount;?></span></p>
        <div class="features">
          <div class="feature">
            <ion-icon name="wallet-outline"></ion-icon>
            <h3>Balance en Tiempo Real</h3>
            <p>Consulta tu balance y transacciones al instante</p>
            <a href="../Back-End/close_session.php">Cerrar Sesion</a>
          </div>
          <div class="feature">
            <ion-icon name="swap-horizontal-outline"></ion-icon>
            <h3>Transferencias Rápidas</h3>
            <p>Envía y recibe dinero rápidamente</p>
          </div>
          <div class="feature">
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <h3>Seguridad Garantizada</h3>
            <p>Tus datos están protegidos con nosotros</p>
          </div>
      </section>
      <section id="perfil" style="display:none;">
        <h1>Perfil</h1>
        <p>Aquí puedes visualizar tu información personal y preferencias.</p>
        <form>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <div class="cuadro-texto">
              <?php echo $name;?>
            </div>
          </div>
          <label for="nombre" class="form-label">Correo Electronico</label>
          <div class="cuadro-texto">
            <?php echo $email;?>
          </div>
          
        </form>
      </section>
      <section id="transferencias" style="display:none;">
        <h1>Transferencias</h1>
        <p>Realiza transferencias de dinero de manera rápida y segura.</p>
        <form>
          <div class="mb-3">
            <label for="destinatario" class="form-label">Destinatario</label>
            <input type="text" class="form-control" id="destinatario" placeholder="Nombre del destinatario">
          </div>
          <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <label for="monto" class="form-label">Monto Disponible <?php echo $amount;?></label>
            <input type="number" class="form-control" id="monto" placeholder="Monto a transferir">
          </div>
          <button type="submit" class="btn btn-primary">Transferir</button>
        </form>
      </section>
      <section id="historial" style="display:none;">
        <h1>Historial</h1>
        <ul id="lista-transacciones">
          <li>Compra en Amazon - $50</li>
          <li>Pago de servicio de Internet - $30</li>
          <li>Transferencia recibida - $200</li>
          <li>Compra en MercadoLibre - $75</li>
        </ul>
      </section>
      <section id="soporte" style="display:none;">
        <h1>Soporte</h1>
        <p>¿Necesitas ayuda? Contacta a nuestro equipo de soporte.</p>
        <form>
          <div class="mb-3">
            <label for="consulta" class="form-label">Consulta</label>
            <textarea class="form-control" id="consulta" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </section>
    </main>

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
      // Función para mostrar la sección correspondiente y ocultar las demás
      function mostrarSeccion(id) {
        const secciones = document.querySelectorAll('section');
        secciones.forEach(seccion => {
          seccion.style.display = 'none';
        });
        document.querySelector(id).style.display = 'block';
      }

      // Añadir event listeners a los enlaces de navegación
      document.querySelectorAll('.navegacion a').forEach(enlace => {
        enlace.addEventListener('click', function(event) {
          event.preventDefault();
          const id = this.getAttribute('href');
          mostrarSeccion(id);
        });
      });

      // Inicializar mostrando la sección de inicio
      mostrarSeccion('#inicio');
    </script>
  </body>
</html>
