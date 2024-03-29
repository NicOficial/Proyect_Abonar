import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ForoModel } from 'src/app/models/foro.models';
import { Respons } from '../models/clientes-response';
import {map, delay}  from 'rxjs/operators'

@Injectable({
  providedIn: 'root'
})

export class ClienteService {
private url=''
  
  

  constructor( private http:HttpClient) {
    console.log("servicio cliente");
    
   }
   getAll():Observable<any>{
    
    return this.http.get<any>('/soporte/ObtenerClientes')
    
    

  }

  //crear

  crearComentario(oCliente:Respons){
    return this.http.post('/soporte/guardarcliente',oCliente)
                .pipe(
                  map ((resp:any)=>{
                    oCliente.idCliente=resp.name;
                    return oCliente;

                  })
                );

  }

  //  getCliente(){
  //   const url ='https://localhost:4200/cliente/ObtenerClientes';
  //   return this.http.get(url)

     
    
  // }

                    //Actualizar
  actualizarClientes(foro:Respons){
    return this.http.put(`${this.url}/cliente/ModificarCliente/${foro.idCliente}`,foro);

  }


              
}
