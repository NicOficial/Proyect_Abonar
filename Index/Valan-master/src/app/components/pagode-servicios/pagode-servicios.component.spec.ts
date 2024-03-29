import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PagodeServiciosComponent } from './pagode-servicios.component';

describe('PagodeServiciosComponent', () => {
  let component: PagodeServiciosComponent;
  let fixture: ComponentFixture<PagodeServiciosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PagodeServiciosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(PagodeServiciosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
