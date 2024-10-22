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
$destinatario = null;

// Procesar la transferencia si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'confirmar') {
            $destinatario_email = $_POST['email'] ?? '';
            $monto_transferencia = floatval($_POST['amount'] ?? 0);

            // Validaciones
            if ($destinatario_email === $email) {
                $mensaje = "No puedes transferir dinero a tu propia cuenta.";
            } elseif ($monto_transferencia <= 0) {
                $mensaje = "El monto debe ser mayor a 0.";
            } elseif ($monto_transferencia > $amount) {
                $mensaje = "Saldo insuficiente.";
            } else {
                // Verificar si el destinatario existe
                $check_destinatario = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, wallets.id_wallet 
                                                             FROM users 
                                                             JOIN wallets ON users.id_users = wallets.id_user 
                                                             WHERE users.email = '$destinatario_email'");
                
                $id_wallet_to = $destinatario_row['id_wallet'];
                $destinatario_name = $destinatario_row['name'];
                $destinatario_surname =  $destinatario_row['surname'];
                $destinatario_dni =  $destinatario_row['dni'];
                
                if (mysqli_num_rows($check_destinatario) > 0) {
                    $destinatario_row = mysqli_fetch_assoc($check_destinatario);

                    mysqli_begin_transaction($conexion);

                    try {
                        // Actualizar saldo del remitente
                        mysqli_query($conexion, "UPDATE wallets SET amount = amount - $monto_transferencia WHERE id_wallet = $id_wallet_of");

                        // Actualizar saldo del destinatario
                        mysqli_query($conexion, "UPDATE wallets SET amount = amount + $monto_transferencia WHERE id_wallet = $id_wallet_to");

                        // Registrar la transacción
                        $fecha_actual = date('Y-m-d H:i:s');
                        $insertar_transaccion = mysqli_query($conexion, "INSERT INTO transactions (date, amount, id_wallet_of, id_wallet_to) 
                                                                        VALUES ('$fecha_actual', $monto_transferencia, $id_wallet_of, $id_wallet_to)");

                        if (!$insertar_transaccion) {
                            throw new Exception("Error al registrar la transacción");
                        }

                        mysqli_commit($conexion);
                        
                        // Guardar datos para la página final y redirigir
                        $_SESSION['transferencia_exitosa'] = true;
                        $_SESSION['monto_transferido'] = $monto_transferencia;
                        $_SESSION['destinatario_nombre'] = $destinatario_row['name'] . ' ' . $destinatario_row['surname'];
                        
                        header('Location: fin_trans.php');
                        exit;
                    } catch (Exception $e) {
                        mysqli_rollback($conexion);
                        $mensaje = "Error en la transferencia: " . $e->getMessage();
                    }
                } else {
                    $mensaje = "El destinatario no existe en nuestro sistema.";
                }
            }
        } elseif ($_POST['action'] === 'cancelar') {
            header('Location: transferencias.php');
            exit;
        }
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
            <!-- Los datos se llenarán via JavaScript -->
            <span>Nombre</span>
            <div><?php echo htmlspecialchars($destinatario_name); ?></div>
            
            <span>Nombre</span>
            <div><?php echo htmlspecialchars($destinatario_surname); ?></div>

            <span>DNI</span>
            <div><?php echo htmlspecialchars($destinatario_dni); ?></div>

            <span>Correo electrónico</span>
            <div><?php echo htmlspecialchars($destinatario_email); ?></div>

            <span>Monto a transferir</span>
            <div id="montoTransferencia"></div>
        </div>

        <form method="POST" id="confirmForm">
            <input type="hidden" name="email" id="emailHidden">
            <input type="hidden" name="amount" id="amountHidden">
            
            <div class="button-container">
                <button type="submit" name="action" value="confirmar" class="enlace-boton">Confirmar transferencia</button>
                <button type="submit" name="action" value="cancelar" class="enlace-boton">Cancelar transferencia</button>
            </div>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtener datos del localStorage
        const emailDestinatario = localStorage.getItem('transferEmail');
        const montoTransferencia = localStorage.getItem('transferAmount');

        if (!emailDestinatario || !montoTransferencia) {
            window.location.href = 'transferencias.php';
            return;
        }

        // Llenar los campos ocultos del formulario
        document.getElementById('emailHidden').value = emailDestinatario;
        document.getElementById('amountHidden').value = montoTransferencia;

        // Realizar consulta AJAX para obtener datos del destinatario
        fetch('?email=' + encodeURIComponent(emailDestinatario), {
            method: 'GET'
        })
        .then(response => response.text())
        .then(html => {
            // Mostrar los datos en la página
            document.getElementById('emailDestinatario').textContent = emailDestinatario;
            document.getElementById('montoTransferencia').textContent = '$' + montoTransferencia;
        });

        // Manejar el envío del formulario
        document.getElementById('confirmForm').addEventListener('submit', function(e) {
            // Si es cancelar, limpiar localStorage antes de enviar
            if (e.submitter.value === 'cancelar') {
                localStorage.removeItem('transferEmail');
                localStorage.removeItem('transferAmount');
            }
        });
    });
    </script>
</body>
</html>