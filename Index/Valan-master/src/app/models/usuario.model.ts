export class UsuarioModel {

apellido:string;
dni:string;
nacimiento:string;
celular:string;
direccion:string;
numeracion:string;
departamento:string;
piso:string;
barrio:string;


edad:string;
provincia:string;
genero:string;
    email:any;
    password:string;
    nombre:string;

    constructor() {
        
        this.email="";
        this.password="";
        this.nombre="";

        this.apellido="";
        this.dni="";
        this.nacimiento="";
        this.celular="";
        this.direccion="";
        this.numeracion="";
        this.departamento="";
        this.piso="";
        this.barrio="";
        this.edad="";
        this.provincia="";
        this.genero="";

           
    }
}