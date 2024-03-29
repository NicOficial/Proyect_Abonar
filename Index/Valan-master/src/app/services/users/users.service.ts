import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Usuario } from '../../components/interface/Usuario';
import { map } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class UsersService {


  constructor(private http: HttpClient) { }

  GuardarUsuario(oUsuario: Usuario){
    return this.http.post('Usuario/GuardarUsuario',oUsuario) 
      .pipe(
        map ((res:any) => {
          oUsuario.Id_Usuario=res.Nombre;
          return oUsuario;
        })
      )
  }
  /*
  IngresoUsuario(usuario){
    return this.http.post('Usuario/Login', usuario)
  }
  */
  IngresoUsuario(Correo:string, Contraseña: string){
    return this.http.post('Usuario/Login', {Correo, Contraseña});
    
  }

}
