<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
    <link rel="stylesheet" href="../Css/login.css" />
    <link rel="stylesheet" href="../Css/nav.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
    <title>Abonar‎ |‎ Iniciá sesión</title>
</head>
<body>

<header>
    <nav>
        <a href="abonar.php">
            <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="69px" width="123px" alt="" id="abonarlogo" />
        </a>
    </nav>
</header>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transferencia - Abonar</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <h2>Ingrese el monto que desea cargar</h2>
  <br>
  <form id="transferForm" action="conf_trans.php" method="GET">
    <!-- Monto requerido -->
    <input type="number" id="amount" placeholder="Monto en $" required>
    <br>
    <!-- Botón que valida y envía -->
    <button type="submit" id="nextButton">Siguiente</button>
    <div id="result"></div>
  </form>
</div>

<script src="script.js"></script>
</body>
</html>

<style>
.container {
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 500px;
  margin-top: 120px;
  margin-left:420px;
}

input {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #1667a8;
  color: white;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #06416a;
}

#result {
  margin-top: 20px;
  font-size: 18px;
  color: #333;
}
</style>
