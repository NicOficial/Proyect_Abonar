const base = document.getElementById('base');
const nombre = document.getElementById('nombre');
const c_seguridad = document.getElementById('c_seguridad');
const contrasena = document.getElementById('contrasena');
const correo = document.getElementById('correo');
const id = document.getElementById('id');

const refresh_nombre = document.getElementById('refresh_nombre');
const refresh_c_seguridad = document.getElementById('refresh_c_seguridad');
const refresh_correo = document.getElementById('refresh_correo');
const refresh_contrasena = document.getElementById('refresh_contrasena');
const guardar_edicion = document.getElementById('guardar_edicion');

const editar_nombre = document.getElementById('resultados');

console.log(".....");

const fetchData = async () => {
  try {
    const response = await axios.get('http://localhost:3000/user');
    return response.data;
  } catch (error) {
    console.error("Error al obtener los datos:", error);
    throw error;
  }
};

//--------------------CREACION DE LA TABLA DE LA BASE DE JSON-----------------------------------------
// BOTONES DE ELIMINAR Y DE EDITAR. CON UN innerHTML para que envie los datos.

const obtenerDatos = async () => {
  try {
    nombre.innerHTML = ''
    c_seguridad.innerHTML = ''
    correo.innerHTML = ''
    id.innerHTML = ''
    contrasena.innerHTML = ''


    const datosUsuarios = await fetchData();
    for (let i = 0; i < datosUsuarios.length; i++) {
      console.log("Datos: ", datosUsuarios[i]);
      const usuario = datosUsuarios[i];
      nombre.innerHTML += ` ${usuario.nombre} <br>`;
      c_seguridad.innerHTML += ` ${usuario.c_seguridad} <br>`;
      contrasena.innerHTML += `${usuario.contrasena} <br>`;
      correo.innerHTML += ` ${usuario.correo} <br>`;
      id.innerHTML += ` ${usuario.id} <button id="${usuario.id}"class="eliminar_usuario" ">Eliminar</button> <br>`
      id.innerHTML += `<div class="container_edit"><button id="${usuario.id}"class="editar_usuario" ">Editar</button></div><br>`


      if (usuario.contrasena === "") {
        contrasena.innerHTML += `<p style="margin : 0;">No hay Contrasena</p>`
      }
      if (usuario.nombre === "") {
        nombre.innerHTML += `<p class="Contra" style="color:red , margin:0 "> Nombre vacio </p>`
      }
      if (usuario.c_seguridad === "") {

      }
    }
    //El += Es para cocatenar algo que ya existe.
    //El FechData es para procesar los datos y despues mostrarlos

  } catch (error) {
    console.error("Error al procesar los datos:", error);
  }
};

obtenerDatos();


//----------------------------------------------ELIMINAR-----------------------------------
//El target es para q cuando le den click al btn de eliminar me traiga el btn, o como tal la etiqueta.
document.addEventListener('click', async ({ target }) => {
  if (target.classList.contains('eliminar_usuario')) {
    console.log("click")
    try {
      const idUsuario = target.id;
      const response = await axios.delete(
        `http://localhost:3000/user/${idUsuario}`
      );
      console.log(response.data);
      obtenerDatos();
      alert("Usuario eliminado correctamente");
    } catch (error) {
      console.error("Error al procesar los datos:", error);
    }
  }
});


//---------------------------------CREAR Y CONSERVAR EDICCION---------------------------------------
let id_usu;
document.addEventListener('click', async ({ target }) => {

  if (target.classList.contains('editar_usuario')) {
    console.log("click")
    try {
      const idUsuario = target.id;
      id_usu = idUsuario;
      const response = await axios.get(
        `http://localhost:3000/user/${idUsuario}`
      );
      console.log("Hola", response.data);
      obtenerDatos();
      refresh_nombre.value = response.data.nombre || ''
      refresh_c_seguridad.value = response.data.c_seguridad || ''
      refresh_correo.value = response.data.correo || ''
      refresh_contrasena.value = response.data.contrasena || ''
      document.getElementById('container').classList.remove('d-none');
      console.log("Datos Editados Correctamente")
      // console.log("OBtener-Datos" , obtenerDatos());
    } catch (error) {
      console.error("Error a la hora de editar los datos", error)
    }
  }
})


//----------------------GUARDAR EDICCION-----------------------------------------
document.addEventListener('click', async ({ target }) => {
  if (target.classList.contains('guardar_edicion')) {
    console.log("click")
    try {
      if (refresh_nombre.value === "" || refresh_c_seguridad.value === "" || refresh_correo.value === "" || refresh_contrasena.value === "") {
        alert("Debe llenar todos los campos");
      } else {
        event.preventDefault();
        console.log(id_usu)
        const response = await axios.put(
          `http://localhost:3000/user/${id_usu}`,
          {
            nombre: refresh_nombre.value,
            c_seguridad: refresh_c_seguridad.value,
            correo: refresh_correo.value,
            contrasena: refresh_contrasena.value,
          }
        );
        console.log(response);

        obtenerDatos();
        alert("Datos Editados Correctamente");
        document.getElementById('container').classList.add('d-none');
        console.log("Datos Editados Correctamente")
        console.log("OBtener-Datos");

        refresh_c_seguridad.value = ''
        refresh_nombre.value = ''
        refresh_correo.value = ''
        refresh_contrasena.value = ''

      }

      //REFRESF
    } catch {

    }
  }
})


//--------------------------------------BUSCADOR--------------------------------------
document.addEventListener('keyup', e => {
  if (e.target.matches("#buscador")) {
    if (e.key === "Escape") {
      e.target.value = "";
    }
    let resultados = 0;
    let filtroEncontrado = "";

    document.querySelectorAll(".articulo").forEach(fruta => {
      const contieneTexto = fruta.textContent.toLowerCase().includes(e.target.value.toLowerCase());
  
      if (contieneTexto) {
        fruta.parentElement.classList.remove('filtro');
        resultados++;
        filtroEncontrado += `${fruta.textContent}\n`;  // Agrega un salto de línea
      } else {
        fruta.parentElement.classList.add('filtro'); // Caso contrario
      }
    });

    console.log(filtroEncontrado);
    //Me Muestra cuantos resultados hay
    const editar_nombre = document.getElementById("resultados");
    if (editar_nombre) {
      editar_nombre.textContent = `Mostrando ${resultados} resultados`;
    }

    const filtroEncontradoElemento = document.getElementById('filtroEncontrado');
    if (filtroEncontradoElemento) {
      filtroEncontradoElemento.textContent = filtroEncontrado;
    }
  }
});

//const refresh_nombre = document.getElementById('refresh_nombre');
//const refresh_c_seguridad = document.getElementById('refresh_c_seguridad');
//const refresh_correo = document.getElementById('refresh_correo');
//const refresh_contrasena = document.getElementById('refresh_contrasena');
