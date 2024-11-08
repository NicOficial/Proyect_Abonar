<?php
// register_back.php
session_start();

include 'con_db.php';

// Validación básica de datos
function validateData($data) {
    if (empty($data['name']) || empty($data['surname']) || empty($data['email']) || 
        empty($data['password']) || empty($data['street']) || empty($data['snumber']) || 
        empty($data['locality']) || empty($data['dni'])) {
        throw new Exception("Todos los campos son obligatorios");
    }

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("El formato del email no es válido");
    }

    if (strlen($data['password']) < 8) {
        throw new Exception("La contraseña debe tener al menos 8 caracteres");
    }

    if (!preg_match('/^[0-9]{7,8}$/', $data['dni'])) {
        throw new Exception("El DNI debe tener 7 u 8 dígitos");
    }
}

try {
    // Validar los datos recibidos
    validateData($_POST);

    // Verificar si el email ya existe
    $stmt = $conexion->prepare("SELECT id_users FROM users WHERE email = ?");
    $stmt->bind_param("s", $_POST['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        throw new Exception("El email ya está registrado");
    }
    $stmt->close();

    // Iniciar transacción
    mysqli_begin_transaction($conexion);

    // Hash de la contraseña
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Preparar y ejecutar la inserción del usuario
    $stmt = $conexion->prepare("INSERT INTO users (name, surname, email, password, street, snumber, locality, dni) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", 
        $_POST['name'],
        $_POST['surname'],
        $_POST['email'],
        $password_hash,
        $_POST['street'],
        $_POST['snumber'],
        $_POST['locality'],
        $_POST['dni']
    );

    if (!$stmt->execute()) {
        throw new Exception("Error al crear el usuario: " . $stmt->error);
    }

    $user_id = $stmt->insert_id;
    $stmt->close();

    // Crear wallet para el usuario
    $stmt = $conexion->prepare("INSERT INTO wallets (id_user, amount) VALUES (?, 500)");
    $stmt->bind_param("i", $user_id);

    if (!$stmt->execute()) {
        throw new Exception("Error al crear la wallet: " . $stmt->error);
    }

    $stmt->close();
    mysqli_commit($conexion);

    // Limpiar los datos del formulario de la sesión si el registro fue exitoso
    unset($_SESSION['form_data']);

    // Crear sesión y redirigir
    $_SESSION['email'] = $_POST['email'];
    header("Location: ../Front-End/abonar.php");
    exit();

} catch (Exception $e) {
    mysqli_rollback($conexion);
    // Guardar los datos del formulario en la sesión
    $_SESSION['form_data'] = $_POST;
    header("Location: ../Front-End/register.php?error=" . urlencode($e->getMessage()));
    exit();
} finally {
    mysqli_close($conexion);
}

// register.php
?>