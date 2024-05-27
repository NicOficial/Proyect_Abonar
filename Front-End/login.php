<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Img/Abonarlogo.png">
    <link rel="stylesheet" href="../Css/login.css">
    <title>Iniciar sesion | Abonar</title>
    
</head>
<body>
    <header>
        <nav>
            <a href="abonar.html">
            <img src="/Img/highestiqmomento.png" height="69px" width="123px" alt=""  id="abonarlogo">
            </a>
            <img src="/Img/abonar palabra.png" id="abonarpalabra">
        </nav>
     </header>
    <div class="container">
        <form action="../Back-End/login_back.php" method="POST" class="adentro">
            
            <p id="palabramail">Escribí tu mail o documento</p> 
            <!-- mejor h3 y solo documento o mail, no cualquiera -->
            
            <input type="email" required id="ingresarmail" name="email" required>
            <!-- <input type="password" required id="" name="password" required> -->
            <!-- Agregar input contraseña -->
            <input type="submit" id="botoncontinuar" value="Continuar">
        </form>

        <input type="submit" id="botoncreatucuenta" value="Creá tu cuenta">
        <!-- Esto tendria que ser un a con href al registro -->
    </div>   
    
</body>
</html>