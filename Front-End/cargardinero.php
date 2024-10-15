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
    <title>Abonar‎ |‎ Cuenta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .account-container {
            max-width: 600px; /* Cuadrado más grande */
            margin: 120px auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            background-color: white;
        }
        .account-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-family: 'Binance PLEX', sans-serif;
            font-size: 24px; /* Título más grande */
        }
        .account-info {
            margin-bottom: 25px;
        }
        .account-info span {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 18px; /* Etiquetas más grandes */
        }
        .account-info div {
            font-size: 20px; /* Texto de datos más grande */
            margin-bottom: 20px;
        }
        .button-container {
            text-align: center;
        }
        .button-container button {
            background-color: #1667a8; /* Color del header */
            color: white;
            border: none;
            padding: 15px 25px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
        .button-container button:hover {
            background-color: #06416a;
        }

        .icon-text {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        /* Estilo para centrar el icono con el texto */
        .centered-icon-text {
            display: flex;
            align-items: center; /* Centra verticalmente */
        }

        .centered-icon-text img {
            margin-right: 8px; /* Espacio entre el icono y el texto */
        }

    </style>
</head>

<body>
    <header>
        <nav>
            <a href="abonar.php">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
            </a>
        </nav>
    </header>

    <div class="account-container">
    <h2>Cargar efectivo</h2>
    <div class="account-info">
        <div class="centered-icon-text">
            <img src="../Img/logodinero.png" height="24px" width="24px" alt="Icono dinero" />
            Ingresá el monto a depositar
        </div>
        <div class="centered-icon-text">
            <img src="../Img/hoyjuegalasele.PNG" height="24px" width="24px" alt="Código de carga" />
            Generá tu código de carga
        </div>
        <div class="centered-icon-text">
            <img src="../Img/manoplata.PNG" height="20px" width="28px" alt="Pago Facil" />
            Acercate a un Pago Facil, deciles el código, y ¡Listo!
        </div>
    </div>
    <div class="button-container">
        <button>CONFIRMAR</button>
    </div>
</div>

</body>
</html>
