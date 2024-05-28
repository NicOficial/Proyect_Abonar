<?php

    session_start();

    if (!isset($_SESSION['email'])) {
        echo'
            <script>
                alert("Please login first");
                window.location.href = "login.php";
            </script>
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creadores | Abonar</title>
    <link rel="stylesheet" href="../Css/creadores.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
          <a href="abonar.html"><img src="/Img/highestiqmomento.png" height="69px" width="123px" alt=""  id="abonarlogo"></a>
          <img src="/Img/abonar palabra.png" id="abonarpalabra">
        </nav>
    </header>
    <h2>
        <?php
            echo '$email';
        ?>
    </h2>
</body>
</html>