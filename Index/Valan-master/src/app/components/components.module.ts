import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FooterComponent } from './footer/footer.component';
import { InversionesComponent } from './inversiones/inversiones.component';
import { PagodeServiciosComponent } from './pagode-servicios/pagode-servicios.component';
import { TransferenciasComponent } from './transferencias/transferencias.component'; 



@NgModule({
  declarations: [
    FooterComponent,
    InversionesComponent,
    PagodeServiciosComponent,
    TransferenciasComponent,
    FooterComponent
  ],
  imports: [
    CommonModule
  ]
})
export class ComponentsModule { }
