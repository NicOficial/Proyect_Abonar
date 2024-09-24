<?php

session_start();

include '../Back-End/con_db.php';

$email = $_SESSION['email'];
$info_user = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, users.email, users.password, users.street, users.snumber, users.floor, users.flat, users.locality, users.dni, wallets.amount FROM users JOIN wallets ON users.id_users = wallets.id_user WHERE users.email = '$email';");

$row = mysqli_fetch_assoc($info_user);

$name = $row['name'];
$surname = $row['surname'];
$password = $row['password'];
$street = $row['street'];
$snumber = $row['snumber'];
$floor = $row['floor'];
$flat = $row['flat'];
$locality = $row['locality'];
$dni = $row['dni'];
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
           <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="50px" alt=""></a>
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
            <h1 class="bienvenido">Bienvenido, <span id="nombre-usuario"><?php echo htmlspecialchars($name);?></span></h1>
            <p id="saldo" class="saldo">
    Saldo: $ <span id="saldo-usuario" data-original-value="<?php echo htmlspecialchars($amount); ?>"><?php echo htmlspecialchars($amount); ?></span>
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
  </p>
            
    </section>
    

    <section id="perfil" style="display:none;">
    <h1>Perfil</h1>
    <p>Aquí puedes visualizar tu información personal y preferencias.</p>
    <form>
        <div class="info-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <div style="flex: 1 1 48%;">
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
                    <label for="direccion" class="form-label">DNI</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($dni); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">Número</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($snumber); ?>
                    </div>
                </div>
            </div>

            <div style="flex: 1 1 48%;">
                <div class="mb-3">
                    <label for="piso" class="form-label">Piso</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($floor); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($flat); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="localidad" class="form-label">Localidad</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($locality); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="dni" class="form-label">Calle</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($street); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>





       
        <section id="transferencias" style="display:none;">
            <h1>Transferencias</h1>
            <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Transferencia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Sistema de Transferencia</h1>
        
        <!-- Información del Usuario 1 -->
        <div class="user" id="user1">
            <h2>Usuario 1</h2>
            <p>Saldo: $<span id="balanceUser1">1000</span></p>
        </div>

        <!-- Información del Usuario 2 -->
        <div class="user" id="user2">
            <h2>Usuario 2</h2>
            <p>Saldo: $<span id="balanceUser2">500</span></p>
        </div>

        <!-- Sección de transferencia -->
        <div class="transfer-section">
            <h3>Realizar una transferencia</h3>
            <label for="transferAmount">Monto a transferir:</label>
            <input type="number" id="transferAmount" min="1" step="1" required>
            <button id="transferButton">Transferir</button>
            <p id="transferMessage"></p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
<!-- 
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 300px;
}

h1 {
    margin-bottom: 20px;
    font-size: 24px;
}

.user {
    margin-bottom: 20px;
}

.user h2 {
    margin-bottom: 10px;
}

p {
    font-size: 18px;
    margin-bottom: 10px;
}

.transfer-section {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

#transferMessage {
    margin-top: 10px;
    font-weight: bold;
}

</style> -->

<script>

// Obtener los elementos del DOM
const balanceUser1 = document.getElementById('balanceUser1');
const balanceUser2 = document.getElementById('balanceUser2');
const transferAmount = document.getElementById('transferAmount');
const transferButton = document.getElementById('transferButton');
const transferMessage = document.getElementById('transferMessage');

// Añadir el evento click al botón de transferencia
transferButton.addEventListener('click', () => {
    const amount = parseFloat(transferAmount.value); // Obtener el valor ingresado

    if (isNaN(amount) || amount <= 0) {
        transferMessage.textContent = "Por favor, ingresa un monto válido.";
        transferMessage.style.color = 'red';
        return;
    }

    const currentBalanceUser1 = parseFloat(balanceUser1.textContent);
    const currentBalanceUser2 = parseFloat(balanceUser2.textContent);

    // Verificar si el Usuario 1 tiene suficiente saldo
    if (amount > currentBalanceUser1) {
        transferMessage.textContent = "Saldo insuficiente en el Usuario 1.";
        transferMessage.style.color = 'red';
    } else {
        // Restar del saldo del Usuario 1 y sumar al saldo del Usuario 2
        balanceUser1.textContent = (currentBalanceUser1 - amount).toFixed(2);
        balanceUser2.textContent = (currentBalanceUser2 + amount).toFixed(2);

        // Mostrar un mensaje de éxito
        transferMessage.textContent = `Se han transferido $${amount} de Usuario 1 a Usuario 2.`;
        transferMessage.style.color = 'green';
    }

    // Limpiar el campo de monto después de la transferencia
    transferAmount.value = '';
});


</script>
        </section>
        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda Mercado Libre</title>
    <style>
        .option {
            cursor: pointer;
            margin: 10px 0;
        }
        .additional-content {
            display: none;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
        }
        .arrow {
            display: inline-block;
            margin-left: 10px;
            transition: transform 0.3s;
        }
        .expanded .arrow {
            transform: rotate(90deg);
        }
    </style>
</head>
<body>
    <section id="soporte" style="display:none;">
        <h1>Soporte</h1>
        <p>¿Necesitas ayuda?</p>
        
        <div class="container">
            <h1>¿Con qué podemos ayudarte?</h1>
            <div class="options">
                <div class="option" onclick="toggleContent(this)">    
                    <div class="option-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="option-text">
                        <h3>Seguridad y acceso a la cuenta</h3>
                        <p>Problemas y configuración.</p>
                    </div>
                    <span class="arrow">→</span>
                    <div class="additional-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae elit libero, a pharetra augue.</p>
                    </div>
                </div>

                <div class="option" onclick="toggleContent(this)">
                    <div class="option-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="option-text">
                        <h3>Cuenta Abonar</h3>
                        <p>Ingresos, transferencias.</p>
                    </div>
                    <span class="arrow">→</span>
                    <div class="additional-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae elit libero, a pharetra augue.</p>
                    </div>
                </div>

                <div class="option" onclick="toggleContent(this)">
                    <div class="option-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="option-text">
                        <h3>Pagos</h3>
                        <p>Compras y pagos de servicios.</p>
                    </div>
                    <span class="arrow">→</span>
                    <div class="additional-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae elit libero, a pharetra augue.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleContent(element) {
            const content = element.querySelector('.additional-content');
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
            element.classList.toggle('expanded');
        }
    </script>
</body>
</html>

    </main> 
</body>
</html>
