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
</head>

<body>
    <header>
        <nav>
            <a href="index.php">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
            </a>
            <!-- <img src="../Img/abonar palabra.png" id="abonarpalabra" /> -->
        </nav>
    </header>

    <section class="container">
        <header>Registro</header>
        <form action="../Back-End/register_back.php" method="POST" class="form">
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

            <div class="input-box address">
                <div class="input-box">
                    <label>Calle</label>
                    <input type="text" placeholder="Ingresá tu calle" name="street" required />
                </div>

                <div class="input-box">
                    <label>Numero</label>
                    <input type="number" placeholder="Ingresá tu direccion" name="snumber" required />
                </div>
                <!-- <div class="input-box">
                <label>Piso</label>
                <input type="text" placeholder="Ingresá tu piso (opcional)" name="floor" required />
            </div>
                
            <div class="input-box">
                <label>Departamento</label>
                <input type="text" placeholder="Ingresá tu departamento (opcional)" name="flat" required />
            </div> -->

                <div class="input-box">
                    <label>Localidad</label>
                    <input type="text" placeholder="Ingresá tu localidad" name="locality" required />
                </div>

                <div class="input-box">
                    <label>DNI</label>
                    <input type="number" placeholder="Ingresá tu DNI" name="dni" required />
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