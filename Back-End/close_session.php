<?php

    session_start();
    session_destroy();

    header('Location: ../Front-End/index.php');

    exit;
?>