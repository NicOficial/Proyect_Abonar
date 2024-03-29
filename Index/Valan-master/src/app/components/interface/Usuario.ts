export class Usuario{
    Id_Usuario: number;
    Nombre: string;
    Apellido: string;
    DNI: number;
    Correo: string;
    Calle: string;
    Numeracion: number;
    Contraseña: string;


    
    constructor(){
        this.Id_Usuario=0;
        this.Nombre="";
        this.Apellido="";
        this.DNI=0;
        this.Correo="";
        this.Calle="";
        this.Numeracion=0;
        this.Contraseña="";
    }
}

