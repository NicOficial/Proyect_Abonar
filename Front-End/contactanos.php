<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Contactos‎ | ‎Abonar</title>
    <link rel="stylesheet" href="../Css/contactanos.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX"
      rel="stylesheet"
      type="text/css"
    />
    
  </head>
  <body>
    <div class="container">
      <div class="text">Contáctanos</div>
      <form action="https://formspree.io/f/mqkrojld" method="POST">
        <div class="form-row">
          <div class="input-data">
            <input type="text" name="nombre" required />
            <div class="underline"></div>
            <label for="">Nombre</label>
          </div>
          <div class="input-data">
            <input type="text" name="apellido" required />
            <div class="underline"></div>
            <label for="">Apellido</label>
          </div>
        </div>
        <div class="form-row">
          <div class="input-data">
            <input type="text" name="correo" required />
            <div class="underline"></div>
            <label for="">Correo Electronico</label>
          </div>
          <div class="input-data textarea">
            <textarea name="mensaje" rows="8" cols="80" required></textarea>
            <br />
            <div class="underline"></div>
            <label for="">Mensaje</label>
          </div>
        </div>
        <div class="form-row submit-btn">
          <div class="input-data">
            <div class="inner"></div>
            <input type="submit" value="Enviar" />
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
