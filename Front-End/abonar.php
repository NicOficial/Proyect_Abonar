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
        <a href="index.php">
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
            <p id="saldo" class="saldo">Saldo: $ <span id="saldo-usuario"><?php echo htmlspecialchars($amount); ?></span></p>
            <i class="bx bx-show-alt"></i>
            <div class="features">
                <div class="feature" id="box1">
                    <ion-icon name="wallet-outline"></ion-icon>
                    <h3>Balance en Tiempo Real</h3>
                    <p>Consulta tu balance y transacciones al instante</p>
                </div>
                <div class="feature" id="box2">
                    <ion-icon name="swap-horizontal-outline"></ion-icon>
                    <h3>Transferencias Rápidas</h3>
                    <p>Envía y recibe dinero rápidamente</p>
                </div>
                <div class="feature" id="box3">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <h3>Seguridad Garantizada</h3>
                    <p>Tus datos están protegidos con nosotros</p>
                </div>
            </div>
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
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($email); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="direccion-postal" class="form-label">Dirección y Postal</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($address); ?>
                        <?php echo htmlspecialchars($postal); ?>
                    </div>
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
                    <label for="monto" class="form-label">Monto Disponible <?php echo htmlspecialchars($amount); ?></label>
                    <input type="number" class="form-control" id="monto" placeholder="Monto a transferir">
                </div>
                <button type="submit" class="btn btn-primary">Transferir</button>
            </form>
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
            </html>        </section>
    </main>

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

        const pass = document.getElementById("saldo"),
            icon = document.querySelector(".bx");
        icon.addEventListener("click", (e) => {
            if (pass.type === "password") {
                pass.type = "text"; 
                icon.classList.remove("bx-show-alt");
                icon.classList.add("bx-hide");
            } else {
                pass.type = "password";
                icon.classList.add("bx-show-alt");
                icon.classList.remove("bx-hide");
            }
        });
    </script>
</body>
</html>
