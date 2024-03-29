const usuarios = [
    { id: 1, nombre: "sebas", contrasena: "1414", c_seguridad: "1414", es_administrador: false },
    { id: 2, nombre: "alexandra", contrasena: "1414", c_seguridad: "1414", es_administrador: false },
    { id: 3, nombre: "Admin1", contrasena: "adminpass1", es_administrador: true },
    { id: 4, nombre: "Admin2", contrasena: "adminpass2", es_administrador: true }
];


const login_master = document.getElementById('login-master')

const usuario = document.getElementById('usuario')
console.log(usuario)
const c_seguridad = document.getElementById('c_seguridad')
console.log(c_seguridad)
const contrasena = document.getElementById('contrasena')
console.log(contrasena)
const acceder = document.getElementById('acceder')
const admin = document.getElementById('admin')



const Validacion = async (nombre, contrasena, c_seguridad) => {
    try {

        const data = await axios.get('http://localhost:3000/user') //PIDIENDO DATOS 
        console.log(data)
        const datos_usuarios = data.data;
        for (let i = 0; i < datos_usuarios.length; i++) {
            if (nombre == datos_usuarios[i].nombre) {
                console.log(nombre , datos_usuarios[i].nombre)
                if (contrasena == datos_usuarios[i].contrasena) {
                    console.log(contrasena , datos_usuarios[i].contrasena)
                    if (c_seguridad == datos_usuarios[i].c_seguridad) {
                        console.log(c_seguridad , datos_usuarios[i].c_seguridad)
                        console.log("Paso seguridad")
                        localStorage.setItem("contrasena", JSON.stringify(datos_usuarios[i]))// IMPORTATE!!!
                        acceder.style.backgroundColor ='blue'
                        acceder.addEventListener('click' , function(){
                            window.location.href = "cuenta__local.html"
                            //en el localStorage, a la hora de exportarlos nos va a mostrar
                            //un [Object][Object] ¿Por que?, Por que se manda en JSON y el LocalStorage no 
                            //permite JSON, Asi que toca aplicar los cambios que ves. Volviendolo String, Texto Plan
                        })
                        break // el Break s e activa cuando todos los datos son true
                    }
                }
            } else {
                console.log("No estas en el Sistema")
                acceder.style.background = 'red'
            } 
        } //For
    } catch (error) {
        console.log(error);
    }
}


login_master.addEventListener('click' , () => { // ¿() =>?  se refiere a una función de flecha o función flecha.
Validacion(usuario.value, contrasena.value, c_seguridad.value); // Mando los Datos a la Funcion
})



