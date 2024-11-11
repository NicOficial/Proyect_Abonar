<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../Img/Abonarlogo.png" />
    <link rel="stylesheet" href="../Css/register.css" />
    <link rel="stylesheet" href="../Css/nav.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
    <title>Registro‎ | ‎Abonar</title>
    <style>
        .error-message {
            background-color: #fff;
            border: 1px solid #dc3545;
            color: #dc3545;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
        
        .password-requirements {
            font-size: 0.8em;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
            </a>
        </nav>
    </header>

    <section class="container">
        <header>Registro</header>
        <?php
        session_start();
        if(isset($_GET['error'])) {
            echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
        }
        // Recuperar los datos del formulario de la sesión
        $form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();
        ?>
        <form action="../Back-End/register_back.php" method="POST" class="form" id="registerForm">
            <div class="column">
                <div class="input-box">
                    <label>Nombre</label>
                    <input type="text" placeholder="Ingresá tu nombre" name="name" 
                           value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>" required />
                </div>

                <div class="input-box">
                    <label>Apellido</label>
                    <input type="text" placeholder="Ingresá tu apellido" name="surname" 
                           value="<?php echo htmlspecialchars($form_data['surname'] ?? ''); ?>" required />
                </div>
            </div>
            <div class="input-box">
                <label>Correo electrónico</label>
                <input type="email" placeholder="Ingresá tu correo electrónico" name="email" 
                       value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Contraseña</label>
                    <input type="password" class="pass" id="pass" placeholder="Creá tu contraseña" name="password" 
                           required pattern=".{8,}" title="La contraseña debe tener al menos 8 caracteres"/>
                    <div class="password-requirements">La contraseña debe tener al menos 8 caracteres</div>
                </div>
                <i class="bx bx-show-alt"></i>
            </div>

            <div class="input-box address">
                <div class="input-box">
                    <label>Calle</label>
                    <input type="text" placeholder="Ingresá tu calle" name="street" 
                           value="<?php echo htmlspecialchars($form_data['street'] ?? ''); ?>" required />
                </div>

                <div class="input-box">
                    <label>Numero de calle</label>
                    <input type="number" placeholder="Ingresá tu direccion" name="snumber" 
                           value="<?php echo htmlspecialchars($form_data['snumber'] ?? ''); ?>" required />
                </div>
                <div class="input-box">
                    <label>Localidad</label>
                    <input type="text" placeholder="Ingresá tu localidad" name="locality" 
                           value="<?php echo htmlspecialchars($form_data['locality'] ?? ''); ?>" required />
                </div>

                <div class="input-box">
                    <label>DNI</label>
                    <input type="number" placeholder="Ingresá tu DNI" name="dni" 
                           value="<?php echo htmlspecialchars($form_data['dni'] ?? ''); ?>" 
                           required pattern="[0-9]{7,8}" title="El DNI debe tener 7 u 8 dígitos"/>
                </div>

                <button type="submit">Crear cuenta</button>
            </div>
        </form>
    </section>
    <script>
        const pass = document.getElementById("pass"),
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