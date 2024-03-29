import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { UsuarioModel } from '../models/usuario.model';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  
private url=''


  constructor(private http:HttpClient) { }
  logout(){

  }



  login (oUsuario:UsuarioModel){
    const authData ={
      email:oUsuario.email,
      password:oUsuario.password,
      };
      return this.http.post('/usuario/login',authData);


  };



  nuevoUsuario (usuario:UsuarioModel){
   const authData ={
     nombre:usuario.nombre,
     apellido:usuario.apellido,
     dni:usuario.dni,
     nacimiento:usuario.nacimiento,
     celular:usuario.celular,
     direccion:usuario.direccion,
     numeracion:usuario.numeracion,
     departamento:usuario.departamento,
     piso:usuario.piso,
     barrio:usuario.barrio,
     email:usuario.email,
     password:usuario.password,
     edad:usuario.edad,
     provincia:usuario.provincia,
     genero:usuario.genero,


   
    
   };
  return this.http.post(`${this.url}/usuario/GuardarUsuario`,authData);
  };


  // estaAutenticado():boolean{
  //   return  this.nuevoUsuario >2;

  // }
}
