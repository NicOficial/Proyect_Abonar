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
<h1>Enviar dinero</h1>
                <?php if ($mensaje): ?>
                <div class="mensaje"><?php echo $mensaje; ?></div>
                <?php endif; ?>
                
                
  <div class="container">
    <h1>Enviar Dinero</h1>
    
    <form id="paymentForm">
      <label for="email">Correo Electrónico del destinatario:</label>
      <input type="email" id="email" placeholder="ejemplo@correo.com" required>
      
      <label for="amount">Monto a enviar:</label>
      <input type="number" id="amount" placeholder="Monto en $" required>
      
      <button type="submit">Enviar</button>
    </form>

    <div id="result"></div>
  </div>
</body>


<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.container {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 350px;
  text-align: center;
}

h1 {
  color: #333;
  margin-bottom: 20px;
}

label {
  font-weight: bold;
  color: #555;
  display: block;
  margin: 15px 0 5px;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  font-size: 16px;
}

input:focus {
  border-color: #4CAF50;
  outline: none;
}

button {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 12px;
  font-size: 16px;
  cursor: pointer;
  width: 100%;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #45a049;
}

#result {
  margin-top: 20px;
  font-size: 18px;
  color: #333;
}

</style>

