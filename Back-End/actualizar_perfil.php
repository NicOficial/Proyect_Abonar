<?php
session_start();
include 'con_db.php';

header('Content-Type: application/json');

$email = $_SESSION['email'];
$field = $_POST['field'];
$value = $_POST['value'];

// Validate field name to prevent SQL injection
$allowedFields = ['locality' => 'locality', 'street' => 'street', 'snumber' => 'snumber'];

if (!isset($allowedFields[$field])) {
    echo json_encode(['success' => false, 'message' => 'Invalid field']);
    exit;
}

$dbField = $allowedFields[$field];

// Prepare and execute the update query
$stmt = mysqli_prepare($conexion, "UPDATE users SET $dbField = ? WHERE email = ?");
mysqli_stmt_bind_param($stmt, "ss", $value, $email);

$response = ['success' => false];
if (mysqli_stmt_execute($stmt)) {
    $response['success'] = true;
}

echo json_encode($response);

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>