package com.example.demo;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.transaction.annotation.EnableTransactionManagement;

@SpringBootApplication
public class MiAplicacion {

    public static void main(String[] args) {
        SpringApplication.run(MiAplicacion.class, args);
    }
}

@Entity
public class User {
	@Id
	@GeneratedValue(strategy=GenerationType.AUTO)
	private Long id;
	private String username;
	private String password;

	// Constructores, getters, and setters
}

@Repository
public interface UserRepository extends JpaRepository<User, Long>  {
	User findByUsername(String username);
}

@Service
public class UserService {
	@Autowired
	private UserRepository userRepository;

	public User findByUsername(String  username) {
		return userRepository.findByUsername(username);
}

public User saveUser(User user) {
	return userRepository.save(user);
}

//aditional methods for password encoding, etc

@RestController
public class UserController {
	@Autowired
	private UserService userService;

	@PostMapping("/login")
	public ResponseEntity<?> login(@RequestBody Credentials credentials) {
		User user = userService.findByUsername(credentials.getUsername());

		if (user == null)
			return ResponseEntity.notFound().build();
	}

	//Compare the provided password with the stored one, e.g. using BCrypt

	//Password comparison
	if (BCrypt.checkpw(credentials.getPassword(), user.getPassword())) {
		// Autenticate user
		// Return JWT token or other authentication artifact
		return ResponseEntity.ok().build();
	}

	return ResponseEntity.status(HttpStatus.UNAUTHORIZED).build();
}

public class Credentials {
	private String username;
	private String password;

	// Constructor, getters and setters...
}

	// import javax.persistence.Entity;
	// import javax.persistence.Id;

	// @Entity
	// public class MiEntidad {

	// 	@Id
	// 	@Column(name  = "id")
	// 	private Long id;

	// 	@Column(name = "nombre")
	// 	private String nombre;

	// 	// Constructor vacío (necesario para Hibernate)
	// 	public MiEntidad() {}

	// 	// Constructor con parámetros
	// 	public MiEntidad(Long id, String name) {
	// 		this.id = id;
	// 		this.name = name;
	// 	}

	// 	// Getters y Setters
	// 	public Long getId() {
	// 		return id;
	// 	}
	// 	public void setId(Long id) {
	// 		this.id = id;
	// 	}

	// 	public String getName() {
	// 		return name;
	// 	}

	// 	public void setName(String name) {
	// 		this.name = name;
	// 	}
	// }

	// import org.springframework.data.jpa.repository.JpaRepository;
	// import org.springframework.stereotype.Repository;

	// @Repository
	// public interface MiEntidadRepository extends JpaRepository<MiEntidad, Long> {
	// 	// Aquí puedes agregar métodos adicionales de consulta si es necesario
	// }

	// import org.springframework.stereotype.Service;
	// import org.springframework.transaction.annotation.Transactional;

	// @Service
	// public class MiServicio {

	// 	@Autowired
	// 	private MiEntidadRepository miEntidadRepository;

	// 	public List<MiEntidad> obtenerTodasLasEntidades() {
	// 		return miEntidadRepository.findAll();
	// 	}

	// 	public MiEntidad guardarMiEntidad(MiEntidad entidad) {
	// 		return miEntidadRepository.save(entidad);
	// 	}
	// Otros métodos de servicio según sea necesario

    // @Transactional
    // public void realizarOperacionesTransaccionales() {
    //     Aquí puedes realizar operaciones CRUD o personalizadas utilizando el repositorio
    //     Todas estas operaciones se ejecutarán dentro de una transacción
    // }