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
$postal = $_POST['postal'];

$query = "INSERT INTO `users` (`name`, `surname`, `email`, `password`, `address`, `postal`) VALUES ('$name', '$surname', '$email', '$password', '$address', '$postal')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
            <script>
                alert("Se ha registrado correctamente");
                window.location.href="../Front-End/abonar.php";
            </script>
        ';
} else {
    echo '
            <script>
                alert("Error al registrar");
                window.location.href="../Front-End/abonar.php";
            </script>
        ';
}
