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
    <h2>¡Listo! Ya hiciste tu transferencia.</h2>

    <div class="container" id="arriba">
        <div class="transfer-details">
            <p>Un monto de $<?php echo htmlspecialchars($monto); ?> a <?php echo htmlspecialchars($destinatario); ?></p> <br>
            <p>Gracias por elegirnos.</p>
        </div>
    </div>

    <div class="container" id="abajo">
        <div class="transfer-details" style="display: flex; ">
            <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="65px" width="68px"/>
            <p style="margin-top: 17px; margin-left: 13px;">Con dinero de Abonar.</p>
        </div>
    </div>
</body>
</html>


<script>
    // Limpiar localStorage
    localStorage.removeItem('transferEmail');
    localStorage.removeItem('transferAmount');

    // Redirigir después de 3 segundos
    setTimeout(() => {
        window.location.href = 'abonar.php';
    }, 7000);
</script> 

<style>
    * {
        font-family: 'Binance PLEX', sans-serif;
        font-weight: 500;
        color: #333;

    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 350px;
        margin: 20px auto;

    }

    #abajo{

        margin-top: 30px;
        font-size: 1.3rem;
        font-weight: 700;

    }

    #arriba{


        font-size: 1.1rem;
        font-weight: 700;


    }
    h2 {
        margin-top: 90px;
        text-align: center;
    }

</style>
