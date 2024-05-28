<?php

include 'con_db.php';

$name = $_POST["nombre"];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$postal = $_POST['postal'];

$query = "INSERT INTO `users` (`name`, `surname`, `email`, `password`, `address`, `phone`, `postal`) VALUES ('$name', '$surname', '$email', '$password', '$address', '$phone', '$postal')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
            <script>
                alert("Se ha registrado correctamente");
                window.location.href="../Front-End/abonar.html";
            </script>
        ';
} else {
    echo '
            <script>
                alert("Error al registrar");
                window.location.href="../Front-End/abonar.html";
            </script>
        ';
}
