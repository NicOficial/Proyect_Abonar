-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 19:47:36
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abonar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'food'),
(2, 'entertainment'),
(3, 'merket'),
(4, 'services'),
(5, 'donations'),
(6, 'education'),
(7, 'electronics'),
(8, 'taxes'),
(9, 'clothing'),
(10, 'investments'),
(11, 'loans'),
(12, 'health'),
(13, 'subscriptions'),
(14, 'transports'),
(15, 'trips');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_wallet_of` int(11) NOT NULL,
  `id_wallet_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction_categories`
--

CREATE TABLE `transaction_categories` (
  `id_transaction_category` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `street` varchar(200) NOT NULL,
  `snumber` int(11) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `flat` varchar(11) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `dni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `name`, `surname`, `email`, `password`, `street`, `snumber`, `floor`, `flat`, `locality`, `dni`) VALUES
(1, 'Valentin', 'Peluso', 'valentinepeluso@gmail.com', '123', '', 0, '', '0', '', 1234),
(2, 'Bautista', 'Sangineto', 'bautistasangineto@hotmail.com', '123', 'Viamonte', 174, '', '', 'Ramos Mejia', 2512889),
(3, 'Nicolas', 'Primo', 'neque.primo@gmail.com', '123', 'Flora', 984, '', '', 'Haedo', 12345767);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallets`
--

CREATE TABLE `wallets` (
  `id_wallet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `wallets`
--

INSERT INTO `wallets` (`id_wallet`, `id_user`, `amount`) VALUES
(1, 1, 1500),
(2, 2, 1000),
(3, 3, 700);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_wallet_of` (`id_wallet_of`) USING BTREE,
  ADD KEY `id_wallet_to` (`id_wallet_to`);

--
-- Indices de la tabla `transaction_categories`
--
ALTER TABLE `transaction_categories`
  ADD PRIMARY KEY (`id_transaction_category`),
  ADD KEY `id_transaction` (`id_transaction`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `id_users_UNIQUE` (`id_users`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id_wallet`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transaction_categories`
--
ALTER TABLE `transaction_categories`
  MODIFY `id_transaction_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id_wallet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_wallet_of`) REFERENCES `wallets` (`id_wallet`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_wallet_to`) REFERENCES `wallets` (`id_wallet`);

--
-- Filtros para la tabla `transaction_categories`
--
ALTER TABLE `transaction_categories`
  ADD CONSTRAINT `transaction_categories_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id_transaction`),
  ADD CONSTRAINT `transaction_categories_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Filtros para la tabla `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Validacion  de datos

DELIMITER //

-- Procedimiento auxiliar para validar email
CREATE PROCEDURE sp_validar_email(IN email VARCHAR(100))
BEGIN
    IF email NOT REGEXP '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$' THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Formato de email inválido';
    END IF;
END //

-- Procedimiento para realizar transferencias con validaciones
CREATE PROCEDURE sp_realizar_transferencia(
    IN p_wallet_origen INT,
    IN p_wallet_destino INT,
    IN p_monto INT,
    IN p_categoria_id INT
)
BEGIN
    DECLARE v_saldo_origen BIGINT;
    DECLARE v_mismo_usuario BOOLEAN;
    DECLARE v_categoria_existe BOOLEAN;
    
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error en la transacción. Se ha revertido la operación.';
    END;

    -- Validaciones iniciales de tipos de datos
    IF p_wallet_origen IS NULL OR p_wallet_destino IS NULL OR p_monto IS NULL OR p_categoria_id IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Ningún parámetro puede ser NULL';
    END IF;

    IF p_wallet_origen <= 0 OR p_wallet_destino <= 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Los IDs de wallet deben ser positivos';
    END IF;

    -- Validar que las wallets sean diferentes
    IF p_wallet_origen = p_wallet_destino THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'No se puede transferir a la misma wallet';
    END IF;

    -- Verificar que ambas wallets existan
    IF NOT EXISTS (SELECT 1 FROM wallets WHERE id_wallet = p_wallet_origen) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La wallet de origen no existe';
    END IF;

    IF NOT EXISTS (SELECT 1 FROM wallets WHERE id_wallet = p_wallet_destino) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La wallet de destino no existe';
    END IF;

    -- Verificar que no sea una transferencia entre wallets del mismo usuario
    SELECT COUNT(*) = 2 INTO v_mismo_usuario
    FROM wallets w1
    JOIN wallets w2 ON w1.id_user = w2.id_user
    WHERE w1.id_wallet = p_wallet_origen AND w2.id_wallet = p_wallet_destino;

    IF v_mismo_usuario THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'No se puede transferir entre wallets del mismo usuario';
    END IF;

    -- Verificar el monto
    IF p_monto <= 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El monto debe ser mayor que cero';
    END IF;

    -- Verificar saldo suficiente
    SELECT amount INTO v_saldo_origen
    FROM wallets
    WHERE id_wallet = p_wallet_origen;

    IF v_saldo_origen < p_monto THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Saldo insuficiente en la wallet de origen';
    END IF;

    -- Verificar que la categoría exista y sea válida
    SELECT COUNT(*) > 0 INTO v_categoria_existe
    FROM categories
    WHERE id_category = p_categoria_id;

    IF NOT v_categoria_existe THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La categoría especificada no existe';
    END IF;

    -- Si todas las validaciones pasan, iniciar la transacción
    START TRANSACTION;

    -- Actualizar saldo wallet origen
    UPDATE wallets 
    SET amount = amount - p_monto
    WHERE id_wallet = p_wallet_origen;

    -- Actualizar saldo wallet destino
    UPDATE wallets 
    SET amount = amount + p_monto
    WHERE id_wallet = p_wallet_destino;

    -- Registrar la transacción
    INSERT INTO transactions (date, amount, type, id_wallet_of, id_wallet_to)
    VALUES (CURDATE(), p_monto, 'transfer', p_wallet_origen, p_wallet_destino);

    SET @last_transaction_id = LAST_INSERT_ID();

    -- Registrar categoría
    INSERT INTO transaction_categories (id_transaction, id_category)
    VALUES (@last_transaction_id, p_categoria_id);

    COMMIT;

    -- Retornar el ID de la transacción
    SELECT @last_transaction_id AS id_transaction;
END //

-- Procedimiento para generar reporte con validaciones
CREATE PROCEDURE sp_generar_reporte_transacciones(
    IN p_fecha_inicio DATE,
    IN p_fecha_fin DATE,
    IN p_id_usuario INT,
    IN p_categoria_id INT
)
BEGIN
    -- Validar fechas
    IF p_fecha_inicio IS NULL OR p_fecha_fin IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Las fechas no pueden ser NULL';
    END IF;

    IF p_fecha_inicio > p_fecha_fin THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La fecha de inicio debe ser anterior o igual a la fecha fin';
    END IF;

    IF p_fecha_inicio > CURDATE() OR p_fecha_fin > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Las fechas no pueden ser futuras';
    END IF;

    -- Validar usuario si se especifica
    IF p_id_usuario IS NOT NULL THEN
        IF NOT EXISTS (SELECT 1 FROM users WHERE id_users = p_id_usuario) THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El usuario especificado no existe';
        END IF;
    END IF;

    -- Validar categoría si se especifica
    IF p_categoria_id IS NOT NULL THEN
        IF NOT EXISTS (SELECT 1 FROM categories WHERE id_category = p_categoria_id) THEN
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'La categoría especificada no existe';
        END IF;
    END IF;

    -- Crear tabla temporal para el reporte
    CREATE TEMPORARY TABLE IF NOT EXISTS temp_reporte_transacciones (
        fecha DATE,
        hora_generacion TIMESTAMP,
        id_transaccion INT,
        remitente VARCHAR(100),
        email_remitente VARCHAR(100),
        destinatario VARCHAR(100),
        email_destinatario VARCHAR(100),
        monto INT,
        categoria VARCHAR(25),
        tipo_operacion VARCHAR(20),
        saldo_remitente_actual BIGINT,
        saldo_destinatario_actual BIGINT
    );

    -- Insertar datos validados en la tabla temporal
    INSERT INTO temp_reporte_transacciones
    SELECT 
        t.date AS fecha,
        NOW() AS hora_generacion,
        t.id_transaction,
        CONCAT(u1.name, ' ', u1.surname) AS remitente,
        u1.email AS email_remitente,
        CONCAT(u2.name, ' ', u2.surname) AS destinatario,
        u2.email AS email_destinatario,
        t.amount AS monto,
        c.name AS categoria,
        t.type AS tipo_operacion,
        w1.amount AS saldo_remitente_actual,
        w2.amount AS saldo_destinatario_actual
    FROM transactions t
    INNER JOIN wallets w1 ON t.id_wallet_of = w1.id_wallet
    INNER JOIN wallets w2 ON t.id_wallet_to = w2.id_wallet
    INNER JOIN users u1 ON w1.id_user = u1.id_users
    INNER JOIN users u2 ON w2.id_user = u2.id_users
    INNER JOIN transaction_categories tc ON t.id_transaction = tc.id_transaction
    INNER JOIN categories c ON tc.id_category = c.id_category
    WHERE t.date BETWEEN p_fecha_inicio AND p_fecha_fin
    AND (p_id_usuario IS NULL OR w1.id_user = p_id_usuario OR w2.id_user = p_id_usuario)
    AND (p_categoria_id IS NULL OR tc.id_category = p_categoria_id)
    ORDER BY t.date DESC, t.id_transaction DESC;

    -- Validar si se encontraron resultados
    IF NOT EXISTS (SELECT 1 FROM temp_reporte_transacciones) THEN
        DROP TEMPORARY TABLE IF EXISTS temp_reporte_transacciones;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'No se encontraron transacciones con los criterios especificados';
    END IF;

    -- Exportar a CSV
    SET @query = CONCAT(
        "SELECT * FROM temp_reporte_transacciones INTO OUTFILE '/tmp/reporte_transacciones_",
        DATE_FORMAT(NOW(), '%Y%m%d_%H%i%s'), 
        .csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n'"
    );
    
    PREPARE stmt FROM @query;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

    -- Mostrar resultados
    SELECT * FROM temp_reporte_transacciones;

    -- Limpiar tabla temporal
    DROP TEMPORARY TABLE IF EXISTS temp_reporte_transacciones;

END //

DELIMITER ;



-- Generación de datos

DELIMITER //

CREATE PROCEDURE sp_generar_datos_prueba(
    IN p_cantidad_usuarios INT,
    IN p_meses_transacciones INT
)
BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE j INT DEFAULT 1;
    DECLARE v_wallet_origen INT;
    DECLARE v_wallet_destino INT;
    DECLARE v_monto INT;
    DECLARE v_categoria INT;
    DECLARE v_fecha DATE;
    DECLARE v_ultimo_usuario_id INT;
    
    -- Control de parámetros
    IF p_cantidad_usuarios < 5 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Se requieren al menos 5 usuarios para generar datos de prueba significativos';
    END IF;
    
    IF p_meses_transacciones < 3 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Se requieren al menos 3 meses de transacciones para pruebas significativas';
    END IF;

    -- Iniciar transacción
    START TRANSACTION;
    
    -- Obtener el último ID de usuario para continuar la secuencia
    SELECT COALESCE(MAX(id_users), 0) INTO v_ultimo_usuario_id FROM users;
    
    -- Generar usuarios de prueba
    WHILE i <= p_cantidad_usuarios DO
        INSERT INTO users (name, surname, email, password, street, snumber, floor, flat, locality, dni)
        VALUES (
            CONCAT('TestUser', i),
            CONCAT('Surname', i),
            CONCAT('testuser', i, '@test.com'),
            '123456',
            CONCAT('Street ', i),
            i * 100,
            FLOOR(1 + RAND() * 10),
            CONCAT('A', i),
            CONCAT('City ', i),
            10000000 + (i * 1000)
        );
        
        -- Crear wallet para el usuario con saldo aleatorio entre 1000 y 10000
        INSERT INTO wallets (id_user, amount)
        VALUES (
            LAST_INSERT_ID(),
            1000 + FLOOR(RAND() * 9000)
        );
        
        SET i = i + 1;
    END;
    
    -- Generar transacciones de prueba para los últimos X meses
    SET v_fecha = DATE_SUB(CURDATE(), INTERVAL p_meses_transacciones MONTH);
    
    WHILE v_fecha <= CURDATE() DO
        -- Generar entre 3 y 7 transacciones por día
        SET j = 1;
        SET @transacciones_dia = 3 + FLOOR(RAND() * 5);
        
        WHILE j <= @transacciones_dia DO
            -- Seleccionar wallets aleatorias diferentes
            SELECT id_wallet INTO v_wallet_origen
            FROM wallets 
            WHERE amount >= 100
            ORDER BY RAND() 
            LIMIT 1;
            
            SELECT id_wallet INTO v_wallet_destino
            FROM wallets 
            WHERE id_wallet != v_wallet_origen
            ORDER BY RAND() 
            LIMIT 1;
            
            -- Generar monto aleatorio entre 100 y 1000
            SET v_monto = 100 + FLOOR(RAND() * 900);
            
            -- Seleccionar categoría aleatoria
            SELECT id_category INTO v_categoria
            FROM categories
            ORDER BY RAND()
            LIMIT 1;
            
            -- Insertar transacción
            INSERT INTO transactions (date, amount, type, id_wallet_of, id_wallet_to)
            VALUES (v_fecha, v_monto, 'transfer', v_wallet_origen, v_wallet_destino);
            
            -- Registrar categoría de la transacción
            INSERT INTO transaction_categories (id_transaction, id_category)
            VALUES (LAST_INSERT_ID(), v_categoria);
            
            -- Actualizar saldos
            UPDATE wallets 
            SET amount = amount - v_monto
            WHERE id_wallet = v_wallet_origen;
            
            UPDATE wallets 
            SET amount = amount + v_monto
            WHERE id_wallet = v_wallet_destino;
            
            SET j = j + 1;
        END WHILE;
        
        SET v_fecha = DATE_ADD(v_fecha, INTERVAL 1 DAY);
    END WHILE;
    
    COMMIT;
    
    -- Mostrar resumen de datos generados
    SELECT 
        (SELECT COUNT(*) FROM users WHERE id_users > v_ultimo_usuario_id) as nuevos_usuarios,
        (SELECT COUNT(*) FROM wallets WHERE id_wallet > (SELECT COUNT(*) FROM wallets) - p_cantidad_usuarios) as nuevas_wallets,
        (SELECT COUNT(*) FROM transactions) as total_transacciones,
        (SELECT MIN(date) FROM transactions) as fecha_primera_transaccion,
        (SELECT MAX(date) FROM transactions) as fecha_ultima_transaccion;
        
END //

DELIMITER ;