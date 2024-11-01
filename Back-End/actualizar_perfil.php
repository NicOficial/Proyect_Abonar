<?php
session_start();
include 'con_db.php';

header('Content-Type: application/json');

$email = $_SESSION['email'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$localidad = $_POST['localidad'];
$dni = $_POST['dni'];

$stmt = mysqli_prepare($conexion, "CALL UpdateUserProfile(?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssssssi", $email, $nombre, $apellido, $calle, $numero, $localidad, $dni);

$response = ['success' => false];
if (mysqli_stmt_execute($stmt)) {
    $response['success'] = true;
}

echo json_encode($response);

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>