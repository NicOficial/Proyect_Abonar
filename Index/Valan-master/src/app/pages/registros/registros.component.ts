import { Component, OnInit } from '@angular/core';
import { ForoModel } from 'src/app/models/foro.models';

import { ClienteService } from 'src/app/services/cliente.service';
import { BitcoinService } from '../../services/bitcoin.service';
import { Respons } from '../../models/clientes-response';


//registro

@Component({
  selector: 'app-registros',
  templateUrl: './registros.component.html',
  styleUrls: ['./registros.component.css'],
  providers: [ClienteService],
})
export class RegistrosComponent implements OnInit {
  
  comentarios: Respons []=[];
  firebase : any []=[];
  cargando =false;

  constructor(private comentarioService:BitcoinService,
               private clienteService:ClienteService) {
  
   
       
  }


  ngOnInit() {
    this.cargando=true;
   //Funciona bien registro backen


    this.clienteService.getAll()
        .subscribe((res)=>{
          console.log('res',res);
          this.comentarios=res;
          this.cargando=false;
        });



    // this.clienteService.getCliente()
    //      .subscribe(resp=>{
           
    //        console.log(resp);
           
    //      });

    
    // servicio comentario
        
    this.comentarioService.getComentario()
        .subscribe (resp=>{
          console.log(resp);
          this.firebase=resp;
         
        });
        
    }
  }


