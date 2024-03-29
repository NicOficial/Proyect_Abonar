console.log(".......")

const form = document.getElementById('form')
const nombre = document.getElementById('nombres');
const contrasena = document.getElementById('contrasena');
const codigo_seguridad = document.getElementById('codigo_seguridad');
const correo = document.getElementById('correo');
const guardar = document.getElementById('guardar');

const URL = "http://localhost:3000/user";

guardar.addEventListener('click', async () => {
    try {
      const response = await axios.post(URL, {
        id: crypto.randomUUID(),
        nombre: nombre.value,
        contrasena: contrasena.value,
        c_seguridad: codigo_seguridad.value,
        correo: correo.value
      });
      console.log("Solicitud exitosa:", response.data);
    } catch (error) {
      console.error("Error al realizar la solicitud:", error);
    }
  });
  