import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UsersService } from 'src/app/services/users/users.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-sesion',
  templateUrl: './sesion.component.html',
  styleUrls: ['./sesion.component.css']
})
export class SesionComponent implements OnInit {
//Mail!:string;
//Password!: string;

Login(){
  const val = this.Sesion.value;

  if(val.Correo && val.Contraseña){
    this.userService.IngresoUsuario(val.Correo, val.Contraseña)
      .subscribe(
        () => {
          console.log("usuario logeado")
          this.Router.navigateByUrl('/menu')
        }
      )
  }
}

Sesion = this.nombreform.group ({
  Correo: ['', [Validators.required,]],
  Contraseña: ['', [Validators.required]]
})

get Correo(){return this.Sesion.get('Correo')}
get Contraseña(){return this.Sesion.get('Contraseña')}

  constructor(private nombreform:FormBuilder,
              public userService: UsersService,
              private Router: Router) { }

  ngOnInit(): void { }
/*
  Inicio(Mail:string, Password:string){
    Mail= this.Sesion.value.Mail
    Password= this.Sesion.value.Password
    if(this.Sesion.valid){
      console.log('prueba1');
      this.userService.IngresoUsuario(Mail, Password)
      .subscribe(res => {
        if(res == false){
          console.error('Error de ingreso creo');
        }
        if(res == true){
          this.Router.navigateByUrl('/menu')
        }
      })
    }
    if(this.Sesion.invalid){
      console.error('ta todo mal ameo')
      this.Router.navigateByUrl('/')
    }
  }
*/
}








