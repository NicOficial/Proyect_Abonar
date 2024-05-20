<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "Abonar";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connect";
?>