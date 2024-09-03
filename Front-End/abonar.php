<?php

session_start();

include '../Back-End/con_db.php';

$email = $_SESSION['email'];
$info_user = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, users.email, users.password, users.address, users.postal, wallets.amount FROM users JOIN wallets ON users.id_users = wallets.id_user WHERE users.email = '$email';");

$row = mysqli_fetch_assoc($info_user);

$name = $row['name'];
$surname = $row['surname'];
$password = $row['password'];
$address = $row['address'];
$postal = $row['postal'];
$amount = $row['amount'];

mysqli_close($conexion);

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
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
        <div class="nombre-pagina">
            <span>Abonar</span>
            <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="50px" alt="">
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
                    <a href="#soporte">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                        <span>Soporte</span>
                    </a>
                </li>

            </ul>
        </nav>

        <div class="cerrarsesion">
        <a href="../Back-End/close_session.php">
            <ion-icon name="exit-outline"></ion-icon>
            <span>Cerrar Sesión</span>
        </a>

            </div>  
        
        </li>
        <div>
            <div class="linea"></div>

            <div class="usuario">
                <img src="../Img/unnamed.jpg" alt="" /> 
                <div class="info-usuario"> 
                    <div class="nombre-email">
                        <span class="nombre"><?php echo htmlspecialchars($name); ?></span>
                        <span class="email"><?php echo htmlspecialchars($email); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
    <section id="inicio">
            <h1 class="bienvenido">Bienvenido, <span id="nombre-usuario"><?php echo htmlspecialchars($name); ?></span></h1>
            <p id="saldo" class="saldo">
    Saldo: $ <span id="saldo-usuario" data-original-value="<?php echo htmlspecialchars($amount); ?>"><?php echo htmlspecialchars($amount); ?></span>
</p>
            <i id="toggle-eye" class="bx bx-show-alt" style="cursor: pointer;"></i>
            <div class="features">
                <div class="feature" id="box1">
                    <ion-icon name="wallet-outline"></ion-icon>
                    <h3>Balance en tiempo real</h3>
                    <p>Consulta tu balance y transacciones al instante</p>
                </div>
                <div class="feature" id="box2">
                    <ion-icon name="swap-horizontal-outline"></ion-icon>
                    <h3>Transferencias rápidas</h3>
                    <p>Envía y recibí dinero rápidamente</p>
                </div>
                <div class="feature" id="box3">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <h3>Seguridad garantizada</h3>
                    <p>Tus datos están protegidos con nosotros</p>
                </div>
            </div>
        
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
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

        // Funcionalidad para ocultar/mostrar saldo
        const saldoUsuario = document.getElementById("saldo-usuario");
        const toggleEye = document.getElementById("toggle-eye");

        toggleEye.addEventListener("click", () => {
    const originalValue = saldoUsuario.getAttribute("data-original-value");

    if (!saldoUsuario.dataset.isHidden) {
        // Cambiar el contenido del saldo a asteriscos
        saldoUsuario.textContent = "******";
        saldoUsuario.dataset.isHidden = "true"; // Marcamos que está oculto
        toggleEye.classList.remove("bx-show-alt");
        toggleEye.classList.add("bx-hide");
    } else {
        // Restaurar el valor original del saldo
        saldoUsuario.textContent = originalValue;
        delete saldoUsuario.dataset.isHidden; // Quitamos la marca de oculto
        toggleEye.classList.remove("bx-hide");
        toggleEye.classList.add("bx-show-alt");
    }
});

    </script>
    </section>
    


        <section id="perfil" style="display:none;">
            <h1>Perfil</h1>
            <p>Aquí puedes visualizar tu información personal y preferencias.</p>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="cuadro-texto">
                      <?php echo htmlspecialchars($name); ?>
                      <?php echo htmlspecialchars($surname); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="cuadro-texto">
                      <?php echo htmlspecialchars($email); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <div class="cuadro-texto">
                      <?php echo htmlspecialchars($address); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="postal" class="form-label">Postal</label>
                    <div class="cuadro-texto">
                      <?php echo htmlspecialchars($postal); ?>
                    </div>
                </div>
            </form>
        </section>
       
        <section id="transferencias" style="display:none;">
            <h1>Transferencias</h1>
            <!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

.container {
  display: flex;
  height: 100vh;
  background-color: #f5f5f5;
}

.sidebar {
  width: 300px;
  background-color: #fff;
  padding: 20px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
  margin-top: 0;
}

.sidebar .add-account {
  display: flex;
  align-items: center;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  cursor: pointer;
}

.sidebar .add-account i {
  margin-right: 10px;
  font-size: 18px;
  color: #337ab7;
}

.sidebar .add-account span {
  font-weight: bold;
}

.sidebar .account-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.sidebar .account-item {
  display: flex;
  align-items: center;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  cursor: pointer;
}

.sidebar .account-item .account-info {
  display: flex;
  flex-direction: column;
  margin-left: 10px;
}

.sidebar .account-item .account-info h3 {
  margin: 0;
  font-size: 16px;
}

.sidebar .account-item .account-info p {
  margin: 0;
  font-size: 12px;
  color: #777;
}

.sidebar .account-item .account-actions {
  display: flex;
  align-items: center;
  margin-left: auto;
}

.sidebar .account-item .account-actions i {
  margin-right: 10px;
  font-size: 16px;
  color: #337ab7;
}

.main {
  flex-grow: 1;
  padding: 20px;
}

.main .tabs {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.main .tabs button {
  background-color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.main .tabs button.active {
  background-color: #337ab7;
  color: #fff;
}

.main .account-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.main .account-item {
  background-color: #fff;
  padding: 15px;
  border-radius: 5px;
  box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.main .account-item h3 {
  margin: 0;
  font-size: 18px;
  font-weight: bold;
}

.main .account-item p {
  margin: 0;
  font-size: 14px;
  color: #777;
}

.main .account-item .account-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}

.main .account-item .account-actions i {
  font-size: 18px;
  color: #337ab7;
}
</style>
</head>
<body>
<div class="container">
  <div class="sidebar">
    <h2>Elegí a qué cuenta transferir</h2>
    <div class="add-account">
      <i class="fas fa-plus"></i>
      <span>Nueva cuenta</span>
    </div>
    <div class="account-list">
      <div class="account-item">
        <div class="account-info">
          <h3>Santiago Luis Minnicucci</h3>
          <p>Abonar</p>
        </div>
        <div class="account-actions">
          <i class="fas fa-star"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
      <div class="account-item">
        <div class="account-info">
          <h3>Valentin Ezequiel Peluso</h3>
          <p>Abonar</p>
        </div>
        <div class="account-actions">
          <i class="fas fa-star"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
      <div class="account-item">
        <div class="account-info">
          <h3>Brian Nahuel Ruejas</h3>
          <p>Abonar</p>
        </div>
        <div class="account-actions">
          <i class="fas fa-star"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="tabs">
      <button class="active">Últimas</button>
      <button>Favoritas</button>
    </div>
    <div class="account-list">
      <div class="account-item">
        <h3>Santiago Luis Minnicucci</h3>
        <p>Abonar</p>
        <div class="account-actions">
          <i class="fas fa-star"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
      <div class="account-item">
        <h3>Valentin Ezequiel Peluso</h3>
        <p>Abonar</p>
        <div class="account-actions">
          <i class="fas fa-star"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
      <div class="account-item">
        <h3>Brian Nahuel Ruejas</h3>
        <p>Abonar</p>
        <div class="account-actions">
          <i class="fas fa-star"></i>
          <i class="fas fa-trash-alt"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
        </section>
        <section id="soporte" style="display:none;">
            <h1>Soporte</h1>
            <p>¿Necesitas ayuda? 
            </p>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Ayuda Mercado Libre</title>
               
            </head>
            <body>
                <div class="container">
                    <h1>¿Con qué podemos ayudarte?</h1>
            
                    <div class="options">
                        <div class="option">    
                            <div class="option-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="option-text">
                                <h3>Seguridad y acceso a la cuenta</h3>
                                <p>Problemas y configuración.</p>
                            </div>
                        </div>
                        <div class="option">
                            <div class="option-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="option-text">
                                <h3>Cuenta Abonar</h3>
                                <p>Ingresos, transferencias.</p>
                            </div>
                        </div>
                        <div class="option">
                            <div class="option-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="option-text">
                                <h3>Pagos</h3>
                                <p>Compras y pagos de servicios. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            </html>        
          
          
        </section>
    </main> 
</body>
</html>
