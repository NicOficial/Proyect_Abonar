<!DOCTYPE html>
<html>
  <head>
    <title>Terminos y Condiciones‎ | ‎Abonar</title>
    <link rel="stylesheet" type="text/css" href="../Css/Term_Cond.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
  </head>
  <body>
    <div class="wrapper flex_align_justify">
      <div class="tc_wrap">
        <div class="tabs_list">
          <ul>
            <li data-tc="tab_item_1" class="active">Terminos de Uso</li>
            <li data-tc="tab_item_2">Derechos de propiedad intelectual</li>
            <li data-tc="tab_item_3">Actividades prohibidas</li>
            <li data-tc="tab_item_4">Terminos de clausula</li>
            <li data-tc="tab_item_5">Leyes guvernamentales</li>
          </ul>
        </div>
        <div class="tabs_content">
          <div class="tab_head">
            <h2 class="titulo">Términos y Condiciones</h2>
          </div>
          <div class="tab_body">
            <div class="tab_item tab_item_1">
              <h3>Terminos de Uso</h3>
              <p>
                Descripción del Servicio: Nuestra plataforma de pagos facilita
                transacciones monetarias en pesos argentinos, ofreciendo mayor
                control y seguridad de datos a los usuarios, así como comodidad
                en la gestión de transferencias.
              </p>
              <p>
                Transacciones y Apelaciones: En caso de disputas durante una
                transacción, los usuarios pueden apelar utilizando nuestro
                sistema de soporte de inteligencia artificial (IA). Si no se
                llega a un acuerdo, se determinará responsabilidad según
                demostración de negligencia por parte de la empresa.
              </p>
              <p>
                Límites de Transacción: Para cumplir con las normas regulatorias
                del gobierno argentino, imponemos un límite de transacción de
                $600,000 pesos argentinos. Esto se hace para prevenir lavado de
                dinero y cumplir con la legislación nacional.
              </p>
            </div>
            <div class="tab_item tab_item_2" style="display: none">
              <h3>Derechos de propiedad intelectual</h3>
              <p>
                Propiedad de la Plataforma: Todos los derechos de propiedad
                intelectual sobre la plataforma, incluyendo software, diseño y
                contenido, pertenecen a nuestra empresa.
              </p>
              <p>
                Uso Autorizado: Los usuarios tienen derecho a utilizar la
                plataforma según lo estipulado en los términos de uso. Cualquier
                otro uso sin autorización está prohibido.
              </p>
              <p>
                Contenido de los Usuarios: Al utilizar nuestra plataforma, los
                usuarios otorgan a nuestra empresa una licencia no exclusiva
                para utilizar cualquier contenido que compartan en la
                plataforma, como comentarios o imágenes.
              </p>
            </div>
            <div class="tab_item tab_item_3" style="display: none">
              <h3>Actividades Prohibidas</h3>
              <p>
                Lavado de Dinero: Cualquier actividad que pueda estar asociada
                con lavado de dinero está estrictamente prohibida.
              </p>
              <p>
                Fraude: No se permite realizar transacciones fraudulentas o
                engañosas en la plataforma.
              </p>
              <p>
                Violación de Leyes: Los usuarios deben cumplir con todas las
                leyes y regulaciones aplicables al utilizar nuestra plataforma.
              </p>
            </div>
            <div class="tab_item tab_item_4" style="display: none">
              <h3>Terminos de clausura</h3>
              <p>
                Modificaciones: Nos reservamos el derecho de modificar estos
                términos en cualquier momento. Los cambios entrarán en vigencia
                al ser publicados en la plataforma.
                <br />
                Resolución de Disputas: Cualquier disputa relacionada con estos
                términos se resolverá mediante negociación de buena fe. Si no se
                llega a un acuerdo, las partes pueden recurrir a la jurisdicción
                competente.
              </p>
            </div>
            <div class="tab_item tab_item_5" style="display: none">
              <h3>Leyes guvernamentales</h3>
              <p>
                Normas Regulatorias: Cumplimos con las normas regulatorias
                establecidas por el gobierno argentino, incluyendo límites de
                transacción y medidas de seguridad.
              </p>
              <p>
                Protección de Datos: Seguimos las leyes de protección de datos
                argentinas para garantizar la privacidad y seguridad de la
                información de nuestros usuarios.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      var tab_lists = document.querySelectorAll(".tabs_list ul li");
      var tab_items = document.querySelectorAll(".tab_item");

      tab_lists.forEach(function (list) {
        list.addEventListener("click", function () {
          var tab_data = list.getAttribute("data-tc");

          tab_lists.forEach(function (list) {
            list.classList.remove("active");
          });
          list.classList.add("active");

          tab_items.forEach(function (item) {
            var tab_class = item.getAttribute("class").split(" ");
            if (tab_class.includes(tab_data)) {
              item.style.display = "block";
            } else {
              item.style.display = "none";
            }
          });
        });
      });
    </script>
  </body>
</html>
