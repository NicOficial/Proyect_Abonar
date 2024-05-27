<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Img/Abonarlogo.png">
    <link rel="stylesheet" href="../Css/Registro.css">
    <title>Registro | Abonar</title>
</head>

<body>
    <div class="content">
        <div class="contenido">
            <div class="margen">
                <h2>Registrarse</h2>
                <h3>Crea tu cuenta</h3>
                <form action="registrar_back.php" method="POST">          
                    <input type="text" placeholder="Nombre" name="nombre" required>
                    <input type="text" placeholder="Apellido" name="surname" required>
                    <input type="email" placeholder="Correo electrónico" name="email" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <input type="text" placeholder="Domicilio" name="address" required>
                    <input type="tel" placeholder="Teléfono" name="phone" required>
                    <input type="text" placeholder="Codigo Postal" name="postal" required>
                    <!-- <div id="checkbox">
                        <input id="checkbox" type="checkbox">
                        <p class="checkeo">Al crear tu cuenta, acepta <a href="Term_Cond.html" class="term" target="_blank">los terminos de servicio</a> y <a href="privacidad.html" class="term" target="_blank">las politicas de privacidad</a> de Abonar</p>
                    </div> -->
                    <button type="submit">Crear cuenta</button>
                </form>

                <a href="Login.html">¿Ya tienes una cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>
</body>

</html>