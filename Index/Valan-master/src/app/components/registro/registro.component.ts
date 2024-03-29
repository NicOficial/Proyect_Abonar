import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder } from '@angular/forms';
import { UsersService } from '../../services/users/users.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css'],
})
export class RegistroComponent implements OnInit {
   
  constructor(private formB: FormBuilder,
              public userServices: UsersService,
              private Router: Router) {}


  oUsuario = this.formB.group({
    Nombre: ['', [Validators.required, Validators.maxLength(20),Validators.pattern('[a-zA-ZÀ-ÿ ]{2,20}')]],
    Apellido: ['', [Validators.required, Validators.pattern('[a-zA-ZÀ-ÿ ]{2,20}')]],
    DNI: ['', [Validators.required, Validators.pattern('[0-9]{6,8}'),Validators.maxLength(8)]],
    //fechaNacimiento: ['', Validators.required],
    //celular: ['', [Validators.required, Validators.pattern('[0-9]{9,12}')]],
    Calle: ['', Validators.required],
    Numeracion: ['', Validators.required],
    //barrio:['', Validators.required],
    Correo: ['', [Validators.required, Validators.email, Validators.pattern('[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}$')]],
    Contraseña: ['', [Validators.required, Validators.minLength(8), Validators.pattern('^(?=\\w*\\d)(?=\\w*[A-Z])(?=\\w*[a-z])\\S{8,16}$'),Validators.maxLength(16)]],
    //contraseña2: ['', [Validators.required, Validators.minLength(8), Validators.pattern('^(?=\\w*\\d)(?=\\w*[A-Z])(?=\\w*[a-z])\\S{8,16}$'),Validators.maxLength(16)]],
    //provincia: ['', Validators.required],
    //genero: ['', Validators.required],
    // departamento:[''],
    // piso:[''],
  });

  

  ngOnInit(): void {}
  


  get Nombre() {return this.oUsuario.get('Nombre');}
  get Apellido() {return this.oUsuario.get('Apellido');}
  get DNI() {return this.oUsuario.get('DNI');}
  get Calle() {return this.oUsuario.get('Calle');}
  get Numeracion() {return this.oUsuario.get('Numeracion');}
  get Correo() {return this.oUsuario.get('Correo');}
  get Contraseña() {return this.oUsuario.get('Contraseña');}
  hide = true;


  registroNuevo(oUsuario:Event){
    oUsuario.preventDefault();
    if(this.oUsuario.valid){
      const value = this.oUsuario.value;
      console.log("prueba1");
      console.log(value);
      this.userServices.GuardarUsuario(this.oUsuario.value)
      .subscribe(res => {
        console.log(res);
        console.log("prueba2");
        this.Router.navigateByUrl('/sesion')
      })
    }
  }
}

