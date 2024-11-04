<?php
session_start();
include '../Back-End/con_db.php';

if (isset($_SESSION['mensaje'])) {
  $mensaje = $_SESSION['mensaje'];
  unset($_SESSION['mensaje']);
}

$email = $_SESSION['email'];
$info_user = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, users.email, users.password, users.street, users.snumber, users.locality, users.dni, wallets.id_wallet, wallets.amount FROM users JOIN wallets ON users.id_users = wallets.id_user WHERE users.email = '$email';");

$row = mysqli_fetch_assoc($info_user);

$name = $row['name'];
$surname = $row['surname'];
$password = $row['password'];
$street = $row['street'];
$snumber = $row['snumber'];
$locality = $row['locality'];
$dni = $row['dni'];
$amount = $row['amount'];
$id_wallet_of = $row['id_wallet'];
?>

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
    <style>
    .mensaje {
        font-size: 20px;
        font-weight: bold;
        color: #d9534f;
        text-align: center;
        margin-top: 15px; /* Cambiado de 35px a 15px */
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

<?php if (!empty($mensaje)): ?>
    <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
<?php endif; ?>

<div class="container">
    <h1>Enviar Dinero</h1>
    <h3>Cantidad disponible: <?php echo htmlspecialchars($amount); ?>$</h3>

    <form id="paymentForm" method="post" action="conf_trans.php">
        <label for="email">Correo Electrónico del destinatario:</label>
        <input type="email" id="email" name="destinatario_email" placeholder="Ingrese el mail de destinatario" required>

        <label for="amount">Monto a enviar:</label>
        <input type="number" id="amount" name="monto_transferencia" placeholder="Monto en $" required>

        <button type="submit">Enviar</button>
    </form>

    <div id="result"></div>
</div>
</body>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 350px;
        text-align: center;
        margin-left: 37%;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #555;
        display: block;
        margin: 15px 0 5px;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    input:focus {
        border-color: #4CAF50;
        outline: none;
    }

    button {
        background-color: #1667a8;
        color: #fff;
        border: none;
        padding: 12px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #06416a;
    }

    #result {
        margin-top: 20px;
        font-size: 18px;
        color: #333;
    }
</style>
</html>
