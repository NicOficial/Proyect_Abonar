<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
    <link rel="stylesheet" href="../Css/login.css" />
    <link rel="stylesheet" href="../Css/nav.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
    <title>Abonar‎ |‎ Iniciá sesión</title>
</head>

<body>
    <header>
        <nav>
            <a href="abonar.php">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" id="abonarlogo" />
            </a>
            <img src="../Img/unnamed.jpg" height="69px" width="123px" id="abonarpalabra" />
        </nav>
    </header>

    <section class="container">
        <header>
            <bold>Iniciar sesión</bold>
        </header>
        <form action="../Back-End/login_back.php" method="POST" class="form">
            <div class="input-box">
                <label>Correo electrónico</label>
                <input type="email" placeholder="Ingresá tu correo electrónico" name="email" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Contraseña</label>
                    <input type="password" class="pass" id="pass" placeholder="Ingresá tu contraseña" name="password" required />
                </div>
                <i class="bx bx-show-alt"></i>
            </div>
            <button>Iniciar sesión</button>
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