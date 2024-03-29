let btnRegister = document.getElementById('btn-register');
const ImagenHTL = document.getElementById('Imagen');
const Texntbtn = document.getElementById('Nbutton');

const prevButton = document.querySelector('prev');
const nextButton = document.getElementById('next');   


btnRegister.addEventListener('submit' , function() {
    window.location.href = "register.html";
})

//------------------Slider---------------------------
const imagenes = [
    'img/slider/1.png',
    'img/slider/2.png',
    'img/slider/3.png',
    'img/slider/4.png',
    'img/slider/5.png',
    'img/slider/6.png',
  ];
  
    let score = 0;

ImagenHTL.setAttribute("src" , imagenes[0])

nextButton.addEventListener('click', function () {
    if (score < imagenes.length -1) {
      score++;
      ImagenHTL.setAttribute("src", imagenes[score]);
      Texntbtn.innerHTML = nombres[score];
      prevButton.style.background = "rgba(18, 46, 205, 0.83)" //Cambio de Colores
    } 
    
    if (score == 10) {
        nextButton.style.background = "gray"
    }
  });


// Mostrar el pop-up al cargar la página
window.onload = function () {
    showPopup();
};

// Función para mostrar el pop-up
function showPopup() {
    document.getElementById('popup').style.display = 'flex';
}

// Función para cerrar el pop-up
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

//-------------------Botones OPC------------------------

//Revisar el Estado de mi Cuenta
function opc_EstadoCuenta() {
    window.open.href = "register.html"
}

//Comunicarme con el Servicio al Cliente WARNING
function opc_Call_ServicioCliente() {
    document.getElementById('popup-warnig').style.display = 'flex';
}

function closePopup__WARNING() {
    document.getElementById('popup-warnig').style.display = 'none';
}

