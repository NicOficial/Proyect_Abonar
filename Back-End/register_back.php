<?php

session_start();

// if (isset($_SESSION['email'])) {
//     header("Location: abonar.php");
// }

include 'con_db.php';

$name = mysqli_real_escape_string($conexion, $_POST['name']);
$surname = mysqli_real_escape_string($conexion, $_POST['surname']);
$email = mysqli_real_escape_string($conexion, $_POST['email']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);
$street = mysqli_real_escape_string($conexion, $_POST['street']);
$snumber = mysqli_real_escape_string($conexion, $_POST['snumber']);
$locality = mysqli_real_escape_string($conexion, $_POST['locality']);
$dni = mysqli_real_escape_string($conexion, $_POST['dni']);


mysqli_begin_transaction($conexion);

try {
    $query_user = "INSERT INTO users (name, surname, email, password, street, snumber, floor, flat,  locality, dni) VALUES ('$name', '$surname', '$email', '$password', '$street', '$snumber', '$floor', '$flat', '$locality', '$dni')";
    $result_user = mysqli_query($conexion, $query_user);

    if (!$result_user) {
        throw new Exception(mysqli_error($conexion));
    }

    $user_id = mysqli_insert_id($conexion);

    $query_wallet = "INSERT INTO wallets (id_user, amount) VALUES ($user_id, 0)";
    $result_wallet = mysqli_query($conexion, $query_wallet);

    if (!$result_wallet) {
        throw new Exception(mysqli_error($conexion));
    }

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