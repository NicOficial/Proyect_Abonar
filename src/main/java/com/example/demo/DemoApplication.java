package com.example.demo;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.transaction.annotation.EnableTransactionManagement;

@SpringBootApplication
@EnableTransactionManagement
public class MiAplicacion {

    public static void main(String[] args) {
        SpringApplication.run(MiAplicacion.class, args);
    }
}

import javax.persistence.Entity;
import javax.persistence.Id;

@Entity
public class MiEntidad {

	@Id
 	private Long id;
 	private String name;

	// Constructor vacío (necesario para Hibernate)
	public MiEntidad() {}

	// Constructor con parámetros
	public MiEntidad(Long id, String name) {
	    this.id = id;
	    this.name = name;
	}

	// Getters y Setters
	public Long getId() {
	    return id;
	}
	public void setId(Long id) {
	    this.id = id;
	}

	public String getName() {
	    return name;
	}

   	public void setName(String name) {
	    this.name = name;
	}
}

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface MiEntidadRepository extends JpaRepository<MiEntidad, Long> {
    // Aquí puedes agregar métodos adicionales de consulta si es necesario
}

import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

@Service
public class MiServicio {

    @Autowired
    private MiEntidadRepository miEntidadRepository;

	public List<MiEntidad> obtenerTodasLasEntidades() {
        return miEntidadRepository.findAll();
    }

    public MiEntidad guardarMiEntidad(MiEntidad entidad) {
        return miEntidadRepository.save(entidad);
    }
	// Otros métodos de servicio según sea necesario

    @Transactional
    public void realizarOperacionesTransaccionales() {
        // Aquí puedes realizar operaciones CRUD o personalizadas utilizando el repositorio
        // Todas estas operaciones se ejecutarán dentro de una transacción
    }
}