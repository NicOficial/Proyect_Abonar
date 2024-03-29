import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-menuPrincipal',
  templateUrl: './menuPrincipal.component.html',
  styleUrls: ['./menuPrincipal.component.css']
})
export class MenuPrincipalComponent {

  constructor(private router:Router) { }

  ngOnInit(): void {
  }
salir(){
  this.router.navigateByUrl('/sesion')
}
}
 
