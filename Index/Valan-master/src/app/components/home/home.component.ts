import { Component } from '@angular/core';
import { BitcoinService } from '../../services/bitcoin.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent{


precioBT : any []=[];

  constructor(private bitcoin: BitcoinService ) { 
  
    this.bitcoin.getNewRelease ()
    .subscribe (data=>{
      console.log(data);
      this.precioBT=data;
    
    
// servicio con operador MAP

    });
}
 

}
