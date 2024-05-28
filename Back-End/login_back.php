<?php

session_start();

if(isset($_SESSION['email'])){
    header("Location: abonar.php");
}

include 'con_db.php';

$email = $_POST['email'];
$email = $_POST['password'];

$validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['email'] = $email;
    header("location: ../Front-End/abonar.php");
    exit;
} else {
    echo '
            <script>
                alert("Usuario no encontrado, vuelva a intentarlo");
                window.location = "../Front-End/login.php";
            </script>
        ';
}
