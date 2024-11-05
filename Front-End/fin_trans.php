<?php
session_start();

// Verificar si existe la información de la transferencia
if (!isset($_SESSION['transferencia_exitosa']) || !$_SESSION['transferencia_exitosa']) {
    header('Location: transferencias.php');
    exit;
}

// Obtener los datos de la transferencia
$monto = $_SESSION['monto_transferido'];
$destinatario = $_SESSION['destinatario_nombre'];

// Limpiar las variables de sesión
unset($_SESSION['transferencia_exitosa']);
unset($_SESSION['monto_transferido']);  
unset($_SESSION['destinatario_nombre']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
    <link rel="stylesheet" href="../Css/login.css" />
    <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../Css/nav.css">
    <title>Abonar‎ |‎ Transferencia Exitosa</title>
</head>
<body>
    <header>
        <nav>
            <a href="abonar.php">
                <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
            </a>
        </nav>
    </header>

    <div class="container">
        <h2>Transferencia Exitosa</h2>
        <div class="transfer-details">
            <p>Se ha transferido $<?php echo htmlspecialchars($monto); ?> a <?php echo htmlspecialchars($destinatario); ?></p>
        </div>
    </div>
</body>
</html>

<!-- <script>
    // Limpiar localStorage
    localStorage.removeItem('transferEmail');
    localStorage.removeItem('transferAmount');

    // Redirigir después de 3 segundos
    setTimeout(() => {
        window.location.href = 'abonar.php';
    }, 000);
</script> -->


<style>
 
    * {
            font-family: 'Binance PLEX', sans-serif;
            font-weight: 500;
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



    #result {
        margin-top: 20px;
        font-size: 18px;
        color: #333;
    }
</style>
