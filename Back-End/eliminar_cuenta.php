<?php
session_start();
include 'con_db.php';
include 'close_session.php';

header('Content-Type: application/json');

$email = $_SESSION['email'];

$stmt = mysqli_prepare($conexion, "CALL DeleteUserAccount(?)");
mysqli_stmt_bind_param($stmt, "s", $email);

$response = ['success' => false];
if (mysqli_stmt_execute($stmt)) {
    $response['success'] = true;
    session_abort(); // Función de close_session.php para cerrar sesión
}

echo json_encode($response);

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>