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

    mysqli_query($conexion, $query);

?>