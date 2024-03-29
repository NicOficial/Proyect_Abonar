import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ForoComponent } from './foro/foro.component';
import { PortadaComponent } from './portada/portada.component';
import { Portada2Component } from './portada2/portada2.component';
import { Portada3Component } from './portada3/portada3.component';
import { RegistroComponent } from './registro/registro.component';
import { RegistrosComponent } from './registros/registros.component';
import { RouterModule } from '@angular/router';
//formulario
import {FormsModule} from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';











@NgModule({
  declarations: [
    ForoComponent,
    PortadaComponent,
    Portada2Component,
    Portada3Component,
    RegistroComponent
    
  ],
  exports:[
    ForoComponent,
    PortadaComponent,
    Portada2Component,
    Portada3Component
  ],
  imports: [
    CommonModule,
    RouterModule,
    FormsModule,
    HttpClientModule,
    
    
    
    
  ]
})
export class PagesModule { }
