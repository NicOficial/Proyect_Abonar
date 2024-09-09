<?php

session_start();

// if (isset($_SESSION['email'])) {
//     header("Location: abonar.php");
// }

include 'con_db.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$dni = $_POST['dni'];

mysqli_begin_transaction($conexion);

try {
    $query_user = "INSERT INTO users (name, surname, email, password, address, dni) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_user = mysqli_prepare($conexion, $query_user);
    mysqli_stmt_bind_param($stmt_user, 'ssssss', $name, $surname, $email, $password, $address, $dni);
    mysqli_stmt_execute($stmt_user);

    $user_id = mysqli_insert_id($conexion);

    $query_wallet = "INSERT INTO wallets (id_user, amount) VALUES (?, 0)";
    $stmt_wallet = mysqli_prepare($conexion, $query_wallet);
    mysqli_stmt_bind_param($stmt_wallet, 'i', $user_id);
    mysqli_stmt_execute($stmt_wallet);

    mysqli_commit($conexion);

    $_SESSION['email'] = $email;
    echo '
        <script>
            alert("Se ha registrado correctamente");
            window.location.href="../Front-End/abonar.php";
        </script>
    ';
} catch (Exception $e) {
    mysqli_rollback($conexion);
    echo '
        <script>
            alert("Error al registrar: ' . $e->getMessage() . '");
            window.location.href="../Front-End/abonar.php";
        </script>
    ';
}

mysqli_close($conexion);

?>