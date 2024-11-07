<?php
session_start();
include 'con_db.php';

header('Content-Type: application/json');

// Verificar si hay una sesión activa
if (!isset($_SESSION['email'])) {
    echo json_encode([
        'success' => false,
        'message' => 'No hay una sesión activa'
    ]);
    exit;
}

$email = $_SESSION['email'];
$response = ['success' => false, 'message' => ''];

try {
    // Iniciar transacción
    mysqli_begin_transaction($conexion);

    // Preparar y ejecutar el stored procedure
    $stmt = mysqli_prepare($conexion, "CALL DeleteUserAccount(?)");
    mysqli_stmt_bind_param($stmt, "s", $email);
    
    if (mysqli_stmt_execute($stmt)) {
        // Verificar si se afectó algún registro
        if (mysqli_affected_rows($conexion) > 0) {
            // Eliminar todas las variables de sesión
            $_SESSION = array();

            // Destruir la cookie de sesión si existe
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time()-42000, '/');
            }

            // Destruir la sesión
            session_destroy();

            // Confirmar la transacción
            mysqli_commit($conexion);

            $response = [
                'success' => true,
                'message' => 'Cuenta eliminada correctamente'
            ];
        } else {
            throw new Exception('No se encontró la cuenta para eliminar');
        }
    } else {
        throw new Exception('Error al ejecutar el procedimiento almacenado');
    }
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    mysqli_rollback($conexion);
    
    $response = [
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ];
}

// Cerrar la declaración y la conexión
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
mysqli_close($conexion);

// Devolver la respuesta en formato JSON
echo json_encode($response);
?>