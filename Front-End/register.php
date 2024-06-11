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

    <title>Registro | Abonar</title>
</head>

<body>
    <header>
        <nav>
            <a href="abonar.html">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
            </a>
            <!-- <img src="../Img/abonar palabra.png" id="abonarpalabra" /> -->
        </nav>
    </header>

    <section class="container">
        <header>Registro</header>
        <form action="../Back-End/registrar_back.php" method="POST" class="form">
            <div class="column">
                <div class="input-box">
                    <label>Nombre</label>
                    <input type="text" placeholder="Ingresá tu nombre" name="name" required />
                </div>

                <div class="input-box">
                    <label>Apellido</label>
                    <input type="text" placeholder="Ingresá tu apellido" name="surname" required />
                </div>
            </div>
            <div class="input-box">
                <label>Correo electrónico</label>
                <input type="email" placeholder="Ingresá tu correo electrónico" name="email" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Contraseña</label>
                    <input type="password" class="pass" id="pass" placeholder="Creá tu contraseña" name="password" required />
                </div>
                <i class="bx bx-show-alt"></i>
            </div>

            <div class="input-box address" id=" mipene">
                <label>Domicilio</label>
                <input type="text" placeholder="Ingresá tu domicilio" name="address" required />
                <div class="input-box">
                    <label>Código postal</label>
                    <input type="number" placeholder="Ingresá tu código Postal" name="postal" required />
                </div>
            </div>
            <button>Crear cuenta</button>
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