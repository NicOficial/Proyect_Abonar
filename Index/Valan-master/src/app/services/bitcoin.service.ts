import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import {map} from 'rxjs/operators';
import { ForoModel } from 'src/app/models/foro.models';




@Injectable({
  providedIn: 'root'
})
export class BitcoinService {
  
  private url = 'https://registro-e18eb-default-rtdb.firebaseio.com';
  private coment='http://localhost:5086';


  constructor( private http: HttpClient) {   }
  

  getNewRelease(){
    return this.http.get('https://coinlib.io/api/v1/coin?key=3b6b849692a12801&pref=USD&symbol=BTC')
     .pipe(map((res:any)=>{
       console.log(res);
       
       return res['markets'];
       
     }));
    
  }

   crearComentario (foro: ForoModel){
     return this.http.post(`${this.url}/registros.json `, foro)
     .pipe (
       map((resp: any)=>{
         foro.id = resp.name;
         console.log(resp);
         
         return foro;
       })
     );
     
   }

   actualizarComentario(foro: ForoModel){
    const registroTemp={
    ...foro
    };
    // delete registroTemp.id;
    return this.http.put(`${this.url}/registros/${foro.id}.json`, registroTemp);
   }

   
  getComentario(){
    return this.http.get(`${this.url}/registros.json`)
                .pipe(
                  map(this.crearArreglo)
                );
  }
  private crearArreglo (comentarioObj:object){
    const comentarios: ForoModel []=[];
    console.log(comentarioObj);
    if (comentarioObj === null) {return[]}
    // Object.keys (comentarioObj ).forEach( key =>{
  
    // const registro: ForoModel = comentarioObj [key];
  
    // registro.id=key;
    // comentarios.push(registro);
    // });
    
    return comentarios;
  }




  //  mostrarClientes (){
  //    this.http.get('https://localhost:7086/cliente/ObtenerClientes')
  //   .pipe(map((data:any)=>{
  //     console.log(data);
      
      
  //   }));

     
    
      
  //     }
   

}

// https://coinlib.io/api/v1/coin?key=3b6b849692a12801&pref=USD&symbol=BTC