<?php

$server  = "localhost";
$user = "root";
$password = "";
$db = "abonar";

$conexion = new mysqli($server, $user, $password, $db);

// if ($conexion->connect_errno){
//     die("Conexion fallida" . $conexion->connect_errno);
// } else {
//     echo "Conexion exitosa";
// }
