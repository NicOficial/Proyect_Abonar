<?php
session_start();

include '../Back-End/con_db.php';

$email = $_SESSION['email'];
if (!isset($email)) {
    header("Location: login.php");
    exit(); 
}

$info_user = mysqli_query($conexion, "SELECT users.id_users, users.name, users.surname, users.email, users.password, users.street, users.snumber, users.locality, users.dni, wallets.id_wallet, wallets.amount FROM users JOIN wallets ON users.id_users = wallets.id_user WHERE users.email = '$email';");

$row = mysqli_fetch_assoc($info_user);

$name = $row['name'];
$surname = $row['surname'];
$password = $row['password'];
$street = $row['street'];
$snumber = $row['snumber'];
$locality = $row['locality'];
$dni = $row['dni'];
$amount = $row['amount'];
$id_wallet_of = $row['id_wallet'];

// Obtener las últimas transacciones
$query = "CALL GetTransactionHistory(?, ?)";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "ii", $id_wallet_of, $limit);
$limit = 10;
mysqli_stmt_execute($stmt);
$resultado_transacciones = mysqli_stmt_get_result($stmt);

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://db.onlinewebfonts.com/c/d05c19ccecf7003d248c60ffd6b5e8f7?family=Binance+PLEX" rel="stylesheet" type="text/css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/abonar.css" />
    <title>Abonar‎ | ‎Hacé más con tu plata</title>
    <link rel="icon" href="../Img/abonar logo nuevo sin fondo.jpg.png" />
</head>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div class="nombre-pagina">
            <span>Abonar</span>
            <img src="../Img/abonar logo nuevo sin fondo.jpg.png" height="50px" alt=""></a>
        </div>

        <nav class="navegacion">
            <ul>
                <div class="tab">
                    <li class="boton1">
                        <a id="boton1" href="#inicio">
                            <ion-icon name="home-outline"></ion-icon>
                            <span>Inicio</span>
                        </a>
                    </li>
                </div>

                <div class="tab">
                    <li>
                        <a href="#perfil" id="mostrar-perfil">
                            <ion-icon name="person-circle-outline"></ion-icon>
                            <span>Perfil</span>
                        </a>
                    </li>
                </div>

                <div class="tab">
                    <li>
                        <a href="#transferencias">
                            <ion-icon name="cash-outline"></ion-icon>
                            <span>Historial</span>
                        </a>
                    </li>
                </div>

                <li>
                    <a href="#soporte">
                        <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                        <span>Soporte</span>
                    </a>
                </li>

            </ul>
        </nav>

        <div class="cerrarsesion">
            <a href="../Back-End/close_session.php">
                <ion-icon name="exit-outline"></ion-icon>

                <span>Cerrar Sesión</span>
            </a>

        </div>

        </li>
        <div>
            <div class="linea"></div>

            <div class="usuario">
                <img src="../Img/unnamed2.jpg" alt="" />
                <div class="info-usuario">
                    <div class="nombre-email">
                        <span class="nombre"><?php echo htmlspecialchars($name); ?></span>
                        <span class="email"><?php echo htmlspecialchars($email); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        <section id="inicio">
            <h1 class="bienvenido">Bienvenido, <span id="nombre-usuario"><?php echo htmlspecialchars($name); ?></span></h1>
            <p id="saldo" class="saldo">
                Saldo: $ <span id="saldo-usuario" data-original-value="<?php echo htmlspecialchars($amount); ?>"><?php echo htmlspecialchars($amount); ?></span>
                <i id="toggle-eye" class="bx bx-show-alt" style="cursor: pointer;"></i>
                <br>
                <br>
                
                <a href="../Front-End/cargardinero.php" class="boton-ingresar">Ingresar</a>
                <a href="../Front-End/transferencias.php" class="boton-transferir">Transferir</a>

<style>
.boton-ingresar, .boton-transferir {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #337ab7;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
  }
  
  .boton-ingresar:hover, .boton-transferir:hover {
    background-color: #23527c;
  }
  
  .boton-ingresar {
    margin-right: 10px;
  }
</style>
            <div class="features">
                <div class="feature" id="box1">
                    <ion-icon name="wallet-outline"></ion-icon>
                    <h3>Balance en tiempo real</h3>
                    <p>Consulta tu balance y transacciones al instante</p>
                </div>
                <div class="feature" id="box2">
                    <ion-icon name="swap-horizontal-outline"></ion-icon>
                    <h3>Transferencias rápidas</h3>
                    <p>Envía y recibí dinero rápidamente</p>
                </div>
                <div class="feature" id="box3">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                    <h3>Seguridad garantizada</h3>
                    <p>Tus datos están protegidos con nosotros</p>
                </div>
            </div>


            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <script>
                // Función para mostrar la sección correspondiente y ocultar las demás
                function mostrarSeccion(id) {
                    const secciones = document.querySelectorAll('section');
                    secciones.forEach(seccion => {
                        seccion.style.display = 'none';
                    });
                    document.querySelector(id).style.display = 'block';
                }

                // Añadir event listeners a los enlaces de navegación
                document.querySelectorAll('.navegacion a').forEach(enlace => {
                    enlace.addEventListener('click', function(event) {
                        event.preventDefault();
                        const id = this.getAttribute('href');
                        mostrarSeccion(id);
                    });
                });

                // Inicializar mostrando la sección de inicio
                mostrarSeccion('#inicio');

                // Funcionalidad para ocultar/mostrar saldo
                const saldoUsuario = document.getElementById("saldo-usuario");
                const toggleEye = document.getElementById("toggle-eye");

                toggleEye.addEventListener("click", () => {
                    const originalValue = saldoUsuario.getAttribute("data-original-value");

                    if (!saldoUsuario.dataset.isHidden) {
                        // Cambiar el contenido del saldo a asteriscos
                        saldoUsuario.textContent = "******";
                        saldoUsuario.dataset.isHidden = "true"; // Marcamos que está oculto
                        toggleEye.classList.remove("bx-show-alt");
                        toggleEye.classList.add("bx-hide");
                    } else {
                        // Restaurar el valor original del saldo
                        saldoUsuario.textContent = originalValue;
                        delete saldoUsuario.dataset.isHidden; // Quitamos la marca de oculto
                        toggleEye.classList.remove("bx-hide");
                        toggleEye.classList.add("bx-show-alt");
                    }
                });
            </script>
            </p>

        </section>

    <section id="perfil" style="display:none;">
    <h1>Perfil</h1>
    <p>Aquí puedes visualizar tu información personal y preferencias.</p>
    <form>
        <div class="info-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
            <div style="flex: 1 1 48%;">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($name); ?>
                        <?php echo htmlspecialchars($surname); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($email); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">DNI</label>
                    <div class="cuadro-texto">
                        <?php echo htmlspecialchars($dni); ?>
                    </div>
                </div>
            </div>

            <div style="flex: 1 1 48%;">
                <div class="mb-3">
                    <label for="localidad" class="form-label">Localidad</label>
                    <div class="editable-container">
                        <span class="editable-text" id="locality-text"><?php echo htmlspecialchars($locality); ?></span>
                        <input type="text" class="editable-input" id="locality-input" style="display: none;" value="<?php echo htmlspecialchars($locality); ?>">
                        <div class="edit-controls">
                            <i class="fas fa-pencil-alt edit-icon" data-field="locality"></i>
                            <div class="confirm-controls" style="display: none;">
                                <i class="fas fa-check confirm-icon"></i>
                                <i class="fas fa-times cancel-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="calle" class="form-label">Calle</label>
                    <div class="editable-container">
                        <span class="editable-text" id="street-text"><?php echo htmlspecialchars($street); ?></span>
                        <input type="text" class="editable-input" id="street-input" style="display: none;" value="<?php echo htmlspecialchars($street); ?>">
                        <div class="edit-controls">
                            <i class="fas fa-pencil-alt edit-icon" data-field="street"></i>
                            <div class="confirm-controls" style="display: none;">
                                <i class="fas fa-check confirm-icon"></i>
                                <i class="fas fa-times cancel-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <div class="editable-container">
                        <span class="editable-text" id="snumber-text"><?php echo htmlspecialchars($snumber); ?></span>
                        <input type="text" class="editable-input" id="snumber-input" style="display: none;" value="<?php echo htmlspecialchars($snumber); ?>">
                        <div class="edit-controls">
                            <i class="fas fa-pencil-alt edit-icon" data-field="snumber"></i>
                            <div class="confirm-controls" style="display: none;">
                                <i class="fas fa-check confirm-icon"></i>
                                <i class="fas fa-times cancel-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="acciones-perfil">
        <button id="btn-eliminar-cuenta" class="btn btn-danger">Eliminar Cuenta</button>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const editableFields = ['locality', 'street', 'snumber'];
        
        editableFields.forEach(field => {
            const container = document.querySelector(`#${field}-text`).closest('.editable-container');
            const text = container.querySelector('.editable-text');
            const input = container.querySelector('.editable-input');
            const editIcon = container.querySelector('.edit-icon');
            const confirmControls = container.querySelector('.confirm-controls');
            const confirmIcon = container.querySelector('.confirm-icon');
            const cancelIcon = container.querySelector('.cancel-icon');
            
            // Enable editing
            editIcon.addEventListener('click', () => {
                text.style.display = 'none';
                input.style.display = 'block';
                editIcon.style.display = 'none';
                confirmControls.style.display = 'flex';
                input.focus();
                input.select();
            });

            // Confirm changes
            confirmIcon.addEventListener('click', async () => {
                const newValue = input.value.trim();
                if (newValue !== '') {
                    try {
                        const response = await fetch('../Back-End/actualizar_perfil.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `field=${field}&value=${encodeURIComponent(newValue)}`
                        });

                        const data = await response.json();
                        if (data.success) {
                            text.textContent = newValue;
                            exitEditMode();
                        } else {
                            alert('Error al actualizar el campo');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error al actualizar el campo');
                    }
                }
            });

            // Cancel changes
            cancelIcon.addEventListener('click', () => {
                input.value = text.textContent;
                exitEditMode();
            });

            function exitEditMode() {
                text.style.display = 'block';
                input.style.display = 'none';
                editIcon.style.display = 'block';
                confirmControls.style.display = 'none';
            }
        });
    });
    // Obtener el modal
const deleteModal = document.getElementById('deleteAccountModal');
const deleteAccountBtn = document.getElementById('btn-eliminar-cuenta');

// Mostrar el modal cuando se hace clic en el botón de eliminar cuenta
deleteAccountBtn.addEventListener('click', function() {
    deleteModal.style.display = 'block';
});

// Función para cerrar el modal
function closeDeleteModal() {
    deleteModal.style.display = 'none';
}

// Función para confirmar y eliminar la cuenta
function confirmDeleteAccount() {
    fetch('../Back-End/eliminar_cuenta.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = '../index.php';
        } else {
            alert('Error al eliminar la cuenta. Por favor, inténtalo de nuevo.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al eliminar la cuenta. Por favor, inténtalo de nuevo.');
    });
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function(event) {
    if (event.target == deleteModal) {
        closeDeleteModal();
    }
}
    </script>
</section>
</section>




    <section id="transferencias" style="display:none;">

    <div class="container">
        <h2>Últimas Transferencias</h2>
        <table>
            <tr>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Monto</th>
            </tr>
            <?php while ($transaccion = mysqli_fetch_assoc($resultado_transacciones)): ?>
                <tr>
                    <td><?php echo $transaccion['date']; ?></td>
                    <td><?php echo $transaccion['otro_usuario']; ?></td>
                    <td class="<?php echo $transaccion['tipo'] == 'entrada' ? 'monto-verde' : 'monto-rojo'; ?>">
                        <?php echo ($transaccion['tipo'] == 'entrada' ? '+' : '-') . '$' . number_format($transaccion['amount'], 2); ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    </section>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ayuda Mercado Libre</title>
            <style>
                .option {
                    cursor: pointer;
                    margin: 10px 0;
                }

                .additional-content {
                    display: none;
                    padding: 10px;
                    background-color: #f9f9f9;
                    border: 1px solid #ccc;
                }

                .arrow {
                    display: inline-block;
                    margin-left: 10px;
                    transition: transform 0.3s;
                }

                .expanded .arrow {
                    transform: rotate(90deg);
                }
            </style>
        </head>

        <body>
            <section id="soporte" style="display:none;">
                <h1>Soporte</h1>
                <p>¿Necesitas ayuda?</p>

                <div class="container">
                    <h1>¿Con qué podemos ayudarte?</h1>
                    <div class="options">
                        <div class="option" onclick="toggleContent(this)">
                            <div class="option-icon">
                            <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="option-text">
                                <h3>Cuenta</h3>
                                <p>Ingresos, transferencias.</p>
                            </div>
                            <span class="arrow">→</span>
                            <div class="additional-content">
                                <p>Al registrarte en Abonar, te recibirán un panel de control intuitivo y amigable. 
                                   Acá encontrarás un resumen de tu saldo actual. Utilizamos medidas de seguridad 
                                   avanzadas para garantizar que tus datos estén siempre protegidos.</p>
                            </div>
                        </div>

                        <div class="option" onclick="toggleContent(this)">
                            <div class="option-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="option-text">
                                <h3>Seguridad</h3>
                                <p>Problemas y configuracion.</p>
                            </div>
                            <span class="arrow">→</span>
                            <div class="additional-content">
                                <p>
                                En Abonar, la confianza es fundamental en cualquier relación financiera. 
                                Por eso, cada medida de seguridad que implementamos está diseñada para proporcionarte 
                                una experiencia de pago segura y confiable. 
                                </p>
                            </div>
                        </div>

                        <div class="option" onclick="toggleContent(this)">
                            <div class="option-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div class="option-text">
                                <h3>Pagos</h3>
                                <p>Compras y transferencias.</p>
                            </div>
                            <span class="arrow">→</span>
                            <div class="additional-content">
                                <p>Ya sea para pagar un servicio, enviar dinero o realizar un pago comercial, Abonar te ofrece
                                     una experiencia ágil y sin complicaciones.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                function toggleContent(element) {
                    const content = element.querySelector('.additional-content');
                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                    element.classList.toggle('expanded');
                }
            </script>
        </body>

        </html>

    </main>

    <div id="deleteAccountModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Confirmar eliminación</h4>
        </div>
        <div class="modal-body">
            <p>¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancelar</button>
            <button class="btn btn-danger" onclick="confirmDeleteAccount()">Eliminar cuenta</button>
        </div>
    </div>
</div>

</body>

</html>

<style>
    .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.modal-content {
    position: relative;
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    width: 80%;
    max-width: 500px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.modal-header {
    margin-bottom: 20px;
}

.modal-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.modal-body {
    margin-bottom: 20px;
}

.modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>