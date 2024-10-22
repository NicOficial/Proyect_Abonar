<?php
session_start();

include '../Back-End/con_db.php';

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

$mensaje = '';
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
</head>

<body>

<header>
        <nav>
            <a href="abonar.php">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
            </a>
        </nav>
    </header>

    <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transferencia - Abonar</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Enviar Dinero</h1>
    <?php if ($mensaje): ?>
      <div class="mensaje"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <h3>Cantidad disponible: <?php echo htmlspecialchars($amount); ?>$</h3>

    <form id="paymentForm" method="post" action="">

<label for="email">Correo Electrónico del destinatario:</label>
<input type="email" id="email" name="email" placeholder="Ingrese el mail de destinatario " required>

<label for="amount">Monto a enviar:</label>
<input type="number" id="amount" name="amount" placeholder="Monto en $" required>

<!-- Cambiar el botón por un enlace -->
<a href="conf_trans.php" class="enlace-boton">Siguiente</a>
</form>


    <div id="result"></div>
  </div>
</body>

<script>
  // Esperar a que el documento esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Obtener el formulario y el enlace
    const form = document.getElementById('paymentForm');
    const nextButton = form.querySelector('.enlace-boton');
    
    // Agregar evento click al botón de siguiente
    nextButton.addEventListener('click', function(e) {
        e.preventDefault(); // Prevenir la navegación inmediata
        
        // Obtener los valores de los inputs
        const email = document.getElementById('email').value;
        const amount = document.getElementById('amount').value;
        
        // Validar que los campos no estén vacíos
        if(!email || !amount) {
            alert('Por favor, complete todos los campos');
            return;
        }
        
        // Guardar los valores en localStorage
        localStorage.setItem('transferEmail', email);
        localStorage.setItem('transferAmount', amount);
        
        // Redirigir a la página de confirmación
        window.location.href = 'conf_trans.php';
    });
});
</script>

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
  margin-left: 490px;
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


.enlace-boton {
  display: inline-block;
  background-color: #1667a8;
  color: #fff;
  padding: 12px;
  font-size: 16px;
  text-align: center;
  text-decoration: none;
  width: 100%;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.enlace-boton:hover {
  background-color: #06416a;
}


</style>

