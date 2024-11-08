<?php
// login_back.php
session_start();

include 'con_db.php';

try {
    // Validar que los campos no estén vacíos
    if (empty($_POST['email']) || empty($_POST['password'])) {
        throw new Exception("Por favor, complete todos los campos");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para obtener el usuario
    $stmt = $conexion->prepare("SELECT id_users, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // No encontramos el email
        throw new Exception("Credenciales incorrectas");
    }

    $user = $result->fetch_assoc();
    $stmt->close();

    // Verificar la contraseña
    if (!password_verify($password, $user['password'])) {
        // Contraseña incorrecta
        throw new Exception("Credenciales incorrectas");
    }

    // Login exitoso
    $_SESSION['email'] = $user['email'];
    $_SESSION['user_id'] = $user['id_users'];
    
    header("Location: ../Front-End/abonar.php");
    exit();

} catch (Exception $e) {
    // Guardar el email en la sesión para mantenerlo en el formulario
    $_SESSION['login_email'] = $email;
    header("Location: ../Front-End/login.php?error=" . urlencode($e->getMessage()));
    exit();
} finally {
    mysqli_close($conexion);
}
?>