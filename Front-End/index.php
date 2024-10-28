<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonar‎ | ‎Hacé más con tu plata</title>
    <link rel="stylesheet" href="../Css/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />


</head>

<body>
    <header class="header">
        <a href="#" class="logo">Abonar</a>

        <box-icon name='menu' id="menu-icon"></box-icon>
        <nav class="navbar">
            <a href="#home" class="active">Inicial</a>
            <a href="#about">Sobre nosotros</a>
            <a href="#services">Valores</a>
            <a href="#portfolio">Fortalezas</a>
            <a href="#contact">Contactanos</a>



        </nav>
    </header>
    <section class="home" id="home">
        <div class="home-content">
            <h3>Hola, somos</h3>
            <h1>Abonar</h1>
            <h3>Y somos una <span class="multiple-text"></span></h3>
            <p>Te presentamos la mejor Wallet de Argentina, con las mejores interfaces y una funcionalidad para todo publico</p>
            <div class="social-media">
                <a href="https://www.youtube.com/@abonaroficial" target="_blank"><i class="bx bxl-youtube"></i></a>
                <a href="https://x.com/abonaroficial" target="_blank"><i class="bx bxl-twitter" ></i></a>
                <a href="https://www.instagram.com/abonar.oficial/" target="_blank"><i class="bx bxl-instagram-alt"></i></a>

            </div>
            <a href="register.php" class="btn">Crear Cuenta</a>
            <a href="login.php" class="btn">Iniciar sesion</a>

        </div>

        <div class="home-img">
            <img src="../Img/abonar logo nuevo sin fondo.jpg.png" alt="logo">
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-img">
            <img src="/Img/abonar logo nuevo sin fondo.jpg.png" alt="logo">
        </div>
        <div class="about-content">
            <h2 class="heading">Sobre <span>Nosotros</span></h2>
            <h3>Billetera Virtual</h3>
            <p>Somos Abonar, una plataforma de pago digital creada para facilitar transacciones seguras y rápidas a personas que se encuentren en ámbitos escolares. <br>
                Nuestra mision es diseñar interfaces modernas e interactivas; brindar seguridad y facilitar la gestión de dinero de los usuarios. <br>
                Nos vemos como el mejor monedero digital de Argentina, con las mejores reseñas y publico. 
                </p>
            <a href="#services" class="btn" >Leer Mas</a>
        </div>
    </section>

    <section class="services" id="services">
        <h2 class="heading">Nuestros <span>Valores</span></h2>
        <div class="services-container">
            <div class="services-box">
                <i class="bx bx-code-alt"></i>
                <h3>Simplicidad</h3>
                <p>Hacemos que las transferencias digitales sean fáciles para todos.</p>
            </div>
            <div class="services-box">
                <i class="bx bxs-paint"></i>
                <h3>Seguridad</h3>
                <p>Protegemos los datos y dinero de todos nuestros usuarios para que utilicen nuestra plataforma con total tranquilidad.</p>
            </div>
                    <div class="services-box">
                        <i class="bx bx-bar-chart-alt"></i>
                        <h3>Innovacion</h3>
                        <p>Buscamos mejorar nuestra plataforma en base a las reseñas de nuestros usuarios.</p>

            
        </div>
    </section>
    <section class="portfolio" id="portfolio">
        <h2 class="heading">Nuestras <span>Fortalezas</span></h2>
        <div class="portfolio-container">
            <div class="portfolio-box">
                <img src="../Img/portfolio1.jpg" alt="img1">
                <div class="portfolio-layer">
                    <h4>Control y Seguridad</h4>
                    <p>Ofrecemos un seguimiento en tus transacciones.</p>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="../Img/portfolio2.jpg" alt="img2">
                <div class="portfolio-layer">
                    <h4>Conveniencia en la gestion</h4>
                    <p>Te persuadimos ya que nuestra gestion en las transferencias es la mejor.</p>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="../Img/portfolio3.jpg" alt="img3">
                <div class="portfolio-layer">
                    <h4>Chat interactivo</h4>
                    <p>Un bot conectado a nuestra base de datos el cual te permite resolver todas tus dudas.</p>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="../Img/portfolio4.jpg" alt="img4">
                <div class="portfolio-layer">
                    <h4>Confianza</h4>
                    <p>Al ser usuario de Abonar, no debes preocuparte por ningún ciberataque, tu plata estará segura en todo momento.</p>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="../Img/portfolio5.jpg" alt="img5">
                <div class="portfolio-layer">
                    <h4>Comodidad</h4>
                    <p>Ofrecemos servicios cómodos a la vista y fáciles de utilizar para que ningún usuario tenga problemas.</p>
                </div>
            </div>
            <div class="portfolio-box">
                <img src="../Img/portfolio6.jpg" alt="img6">
                <div class="portfolio-layer">
                    <h4>Innovacion tecnologica</h4>
                    <p>Nos adaptamos a la moda ofreciendote una billetera responsiva.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact" id="contact">
        <h2 class="heading">Contacta a <span>Abonar</span></h2>
    
        <form
        action="https://formspree.io/f/xzzpazqy"
        method="POST"
      >
            <div class="input-box">
                <input name="llave" type="hidden" name="access_key" value="29a408d0-2ccb-46c7-89af-f10704e6e58b">
                <input name="Nombre" type="text" id="name" placeholder="Nombre completo" required>
                <input name="Correo" type="email" id="email" placeholder="Correo Electronico" required>
            </div>
            <div class="input-box">
                <input name="Telefono" type="number" id="phone" placeholder="Telefono">
                <input name="Asunto" type="text" id="subject" placeholder="Asunto" required>
            </div>
            <textarea name="Mensaje" id="message" cols="30" rows="10" placeholder="Tu mensaje" required></textarea>
            <input name="Boton" type="submit" value="Enviar" class="btn">
        </form>
    </section>
    

    <footer class="footer">
        <div class="footer-text">
            <p>Copyright &copy; 2024 by Abonar | Todos los derechos reservados.</p>
        </div>

        <div class="footer-iconTop">
            <a href="#home"><i class="bx bx-up-arrow-alt"></i></a>
        </div>

    </footer>

    
   
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
    let menuIcon = document.querySelector('#menu-icon');
    let navbar = document.querySelector('.navbar');

    menuIcon.onclick = () => {
        menuIcon.classList.toggle('bx-x');
        navbar.classList.toggle('active');
    };
});


    let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector('header nav a[href*=' + id + ']').classList.add('active');
        }
    });

    let header = document.querySelector('header');

    header.classList.toggle('sticky', window.scrollY > 100);

    menuIcon.classList.remove('bx-x');
    navbar.classList.remove('active');
};

ScrollReveal({
    reset: true,
    distance: '80px',
    duration: 2000,
    delay: 200, 

});

ScrollReveal().reveal('.home-content, .heading', { origin: 'top' });
ScrollReveal().reveal('.home-img, .services-container, .portfolio-box, .contact form', { origin: 'bottom' });
ScrollReveal().reveal('.home-content h1, .about-img', { origin: 'left' });
ScrollReveal().reveal('.home-content p, .about-content', { origin: 'right' });

const typed = new Typed('.multiple-text', {
    strings: ['Wallet', 'Billetera Virtual', 'Cartera Digital'],
    typeSpeed: 100,
    backSpeed: 100,
    backdelay: 1000,
    loop: true


});




    </script>
</body>

</html>