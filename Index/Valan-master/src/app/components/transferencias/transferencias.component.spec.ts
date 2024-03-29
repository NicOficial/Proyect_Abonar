import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TranferenciasComponent } from './transferencias.component';

describe('TranferenciasComponent', () => {
  let component: TranferenciasComponent;
  let fixture: ComponentFixture<TranferenciasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TranferenciasComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TranferenciasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
