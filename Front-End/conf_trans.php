<?php
session_start();
include '../Back-End/con_db.php';

// Obtener información del usuario que envía (sesión actual)
$email = $_SESSION['email'];
$info_user = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, users.email, wallets.id_wallet, wallets.amount 
                                     FROM users 
                                     JOIN wallets ON users.id_users = wallets.id_user 
                                     WHERE users.email = '$email'");
$row = mysqli_fetch_assoc($info_user);
$amount = $row['amount'];
$id_wallet_of = $row['id_wallet'];

$mensaje = '';

// Obtener los valores en PHP
$destinatario_email = isset($_POST['destinatario_email']) ? mysqli_real_escape_string($conexion, $_POST['destinatario_email']) : '';
$monto_transferencia = isset($_POST['monto_transferencia']) ? floatval($_POST['monto_transferencia']) : 0;

// Procesamiento inicial de la transferencia
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {
    // Validaciones iniciales
    if ($destinatario_email === $email) {
        $_SESSION['mensaje'] = "No puedes transferir dinero a tu propia cuenta.";
        header('Location: transferencias.php');
        exit;
    } elseif ($monto_transferencia <= 0) {
        $_SESSION['mensaje'] = "El monto debe ser mayor a 0.";
        header('Location: transferencias.php');
        exit;
    } elseif ($monto_transferencia > $amount) {
        $_SESSION['mensaje'] = "Saldo insuficiente.";
        header('Location: transferencias.php');
        exit;
    }

    // Verificar destinatario
    $check_destinatario = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, users.dni, wallets.id_wallet 
                                                 FROM users 
                                                 JOIN wallets ON users.id_users = wallets.id_user 
                                                 WHERE users.email = '$destinatario_email'");
    
    if (mysqli_num_rows($check_destinatario) > 0) {
        $destinatario_row = mysqli_fetch_assoc($check_destinatario);
        $id_wallet_to = $destinatario_row['id_wallet'];
        $destinatario_name = $destinatario_row['name'];
        $destinatario_surname = $destinatario_row['surname'];
        $destinatario_dni = $destinatario_row['dni'];
        
        $mostrar_confirmacion = true;
    } else {
        $_SESSION['mensaje'] = "El destinatario no existe en nuestro sistema.";
        header('Location: transferencias.php');
        exit;
    }
} 
// Procesamiento de la confirmación
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'confirmar') {
        // Volver a obtener y verificar los datos del destinatario
        $destinatario_email = mysqli_real_escape_string($conexion, $_POST['destinatario_email']);
        $monto_transferencia = floatval($_POST['monto_transferencia']);
        
        $check_destinatario = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, wallets.id_wallet 
                                                     FROM users 
                                                     JOIN wallets ON users.id_users = wallets.id_user 
                                                     WHERE users.email = '$destinatario_email'");
        
        if (mysqli_num_rows($check_destinatario) > 0) {
            $destinatario_row = mysqli_fetch_assoc($check_destinatario);
            $id_wallet_to = $destinatario_row['id_wallet'];
            $destinatario_name = $destinatario_row['name'];
            $destinatario_surname = $destinatario_row['surname'];

            mysqli_begin_transaction($conexion);

            try {
                // Actualizar saldo del remitente
                $query_remitente = "UPDATE wallets SET amount = amount - $monto_transferencia WHERE id_wallet = $id_wallet_of";
                $update_remitente = mysqli_query($conexion, $query_remitente);

                // Actualizar saldo del destinatario
                $query_destinatario = "UPDATE wallets SET amount = amount + $monto_transferencia WHERE id_wallet = $id_wallet_to";
                $update_destinatario = mysqli_query($conexion, $query_destinatario);

                // Registrar la transacción
                $fecha_actual = date('Y-m-d H:i:s');
                $query_transaccion = "INSERT INTO transactions (date, amount, id_wallet_of, id_wallet_to) 
                                    VALUES ('$fecha_actual', $monto_transferencia, $id_wallet_of, $id_wallet_to)";
                $insertar_transaccion = mysqli_query($conexion, $query_transaccion);

                if (!$update_remitente || !$update_destinatario || !$insertar_transaccion) {
                    throw new Exception("Error en la operación de base de datos");
                }

                mysqli_commit($conexion);
                
                // Guardar datos para fin_trans.php
                $_SESSION['transferencia_exitosa'] = true;
                $_SESSION['monto_transferido'] = $monto_transferencia;
                $_SESSION['destinatario_nombre'] = $destinatario_name . ' ' . $destinatario_surname;
                
                header('Location: fin_trans.php');
                exit;
            } catch (Exception $e) {
                mysqli_rollback($conexion);
                $_SESSION['mensaje'] = "Error en la transferencia: " . mysqli_error($conexion);
                header('Location: transferencias.php');
                exit;
            }
        } else {
            $_SESSION['mensaje'] = "Error: No se encontró el destinatario.";
            header('Location: transferencias.php');
            exit;
        }
    } elseif ($_POST['action'] === 'cancelar') {
        $_SESSION['mensaje'] = "La transferencia ha sido cancelada.";
        header('Location: transferencias.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
    <link rel="stylesheet" href="../Css/login.css" />
    <link rel="stylesheet" href="../Css/nav.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Abonar‎ |‎ Confirmar Transferencia</title>
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
        <?php if ($mensaje): ?>
            <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <h2>Confirmar Transferencia</h2>
        <div class="account-info" id="recipientInfo">
            <span>Nombre</span>
            <div><?php echo htmlspecialchars($destinatario_name); ?></div>
            
            <span>Apellido</span>
            <div><?php echo htmlspecialchars($destinatario_surname); ?></div>

            <span>DNI</span>
            <div><?php echo htmlspecialchars($destinatario_dni); ?></div>

            <span>Correo electrónico</span>
            <div><?php echo htmlspecialchars($destinatario_email); ?></div>

            <span>Monto a transferir</span>
            <div><?php echo htmlspecialchars($monto_transferencia); ?></div>
        </div>

        <form method="POST" id="confirmForm">
            <input type="hidden" name="destinatario_email" value="<?php echo htmlspecialchars($destinatario_email); ?>">
            <input type="hidden" name="monto_transferencia" value="<?php echo htmlspecialchars($monto_transferencia); ?>">
            
            <div class="button-container">
                <button type="submit" name="action" value="confirmar" class="enlace-boton">Confirmar transferencia</button>
                <button type="submit" name="action" value="cancelar" class="enlace-boton">Cancelar transferencia</button>
            </div>
        </form>
    </div>
</body>
</html>