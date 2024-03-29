

// el .toFixed es para convertir el valor a un número entero.
//numero_cuenta.textContent = (Math.random() * 1000000000).toFixed(0);
const presupuesto = document.getElementById('presupuesto');
const saldo = document.getElementById('saldo');
const guardar_saldo = document.getElementById('guardar_saldo');
const img = document.getElementById('img');

const imagen = 'https://acortar.link/UBqlw8';
  
img.setAttribute('src', imagen)

const Validacion = async () => {
  try {
     // Obtengamos los datos del Local.Storage
    const Exportacion = JSON.parse(localStorage.getItem('contrasena'))

    const nombre = document.getElementById('nombre_cuenta');
    const Id = Exportacion.id || 'No disponible';
    const nombrEUsuario = Exportacion.nombre || 'Nombre no disponible';
    const contrasenaUsuario = Exportacion.contrasena || 'Contraseña no disponible';
    const UserInfoHTML = `<p>Contraseña: ${contrasenaUsuario}</p><p>Nombre: ${nombrEUsuario}</p><p>Cuenta: ${Id}</p>`;


    nombre_cuenta.innerHTML = UserInfoHTML;

  } catch (error) {
    console.error('Error al obtener los datos del usuario:', error);
  }
};

Validacion();


guardar_saldo.addEventListener('click' , function(){
  console.log("Saldo Guardado")
  saldo.innerText += presupuesto.value
})
