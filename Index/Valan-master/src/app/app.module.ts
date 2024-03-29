import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {  RouterModule} from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

// permite hacer peticiones http 
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { SesionComponent } from './components/sesion/sesion.component';

// importar rutas
import { ROUTES } from './app.routes';
import { RegistroComponent } from './components/registro/registro.component';
import { SomosComponent } from './components/somos/somos.component';
import { AyudaComponent } from './components/ayuda/ayuda.component';
import { FlexLayoutModule } from '@angular/flex-layout';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations'
import { MatSidenavModule } from '@angular/material/sidenav'
import { MatToolbarModule } from '@angular/material/toolbar'
import { MatTabsModule } from '@angular/material/tabs';
import { HeaderComponent } from './components/shared/header/header.component';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { MatListModule } from '@angular/material/list';
import { SidenavListComponent } from './components/shared/sidenav-list/sidenav-list.component'
import { PagesModule } from './pages/pages.module';
///formularios
import {  FormsModule} from '@angular/forms';
import { FooterComponent} from  './components/footer/footer.component'
import {  RegistrosComponent} from './pages/registros/registros.component'






@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    SesionComponent,
    RegistroComponent,
    SomosComponent,
    AyudaComponent,
    HeaderComponent,
    SidenavListComponent,
    FooterComponent,
    RegistrosComponent

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    RouterModule.forRoot( ROUTES, {useHash:true}),
    FlexLayoutModule,
    BrowserAnimationsModule,
    MatSidenavModule,
    MatToolbarModule,
    MatTabsModule,
    MatIconModule,
    MatButtonModule,
    MatListModule,
    PagesModule,
    FormsModule,
    ReactiveFormsModule
      
  ],
  exports: [
    MatSidenavModule,
    MatToolbarModule,
    MatTabsModule,
    MatIconModule,
    MatButtonModule,
    MatListModule
  ],
  providers: [ ],
  bootstrap: [AppComponent]
})
export class AppModule { }
