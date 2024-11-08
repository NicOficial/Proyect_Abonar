-- Configuración inicial de zona horaria para Argentina (UTC-3)
SET GLOBAL time_zone = '-03:00';
SET time_zone = '-03:00';

DROP TABLE IF EXISTS transaction_categories;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS wallets;
DROP TABLE IF EXISTS users;

-- Creación de tablas (sin cambios en la estructura)
CREATE TABLE `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `street` varchar(200) NOT NULL,
  `snumber` int(11) NOT NULL,
  `locality` varchar(200) NOT NULL,
  `dni` int(11) NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `wallets` (
  `id_wallet` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  PRIMARY KEY (`id_wallet`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CONVERT_TZ(CURRENT_TIMESTAMP, @@session.time_zone, '-03:00'),
  `amount` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_wallet_of` int(11) NOT NULL,
  `id_wallet_to` int(11) NOT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `id_wallet_of` (`id_wallet_of`),
  KEY `id_wallet_to` (`id_wallet_to`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_wallet_of`) REFERENCES `wallets` (`id_wallet`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_wallet_to`) REFERENCES `wallets` (`id_wallet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `transaction_categories` (
  `id_transaction_category` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_transaction_category`),
  KEY `id_transaction` (`id_transaction`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `transaction_categories_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id_transaction`),
  CONSTRAINT `transaction_categories_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Primero insertamos los users
INSERT INTO `users` (`id_users`, `name`, `surname`, `email`, `password`, `street`, `snumber`, `locality`, `dni`) VALUES
(1, 'Valentin', 'Peluso', 'valentinepeluso@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Juan Florio', 356, 'Villa Luzuriaga', 78543640),
(2, 'Mister', 'Macs', 'mrmacs@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Uruguay', 543, 'Haedo', 78543641),
(3, 'Franco', 'Lopez', 'francolopez@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Agustin de Elia', 933, 'Ramos Mejia', 78543642),
(4, 'Dario', 'Deladed', 'deladed@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Emilio Castro', 41, 'Haedo', 78543643),
(5, 'Lucas', 'Davirro', 'lucasdavirro@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Alegria', 120, 'Haedo', 78543644),
(6, 'Yanfranco', 'Petrone', 'yani@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Jose Murias', 660, 'Haedo', 78543645),
(7, 'Martina', 'Capurro', 'marcapurro@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Rivadavia', 14680, 'Haedo', 78543646),
(8, 'Camila', 'Capurro', 'camicapurro@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Igualdad', 1468, 'Haedo', 78543647),
(9, 'Thiago', 'Galindo', 'thiagogalindo@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Monseñor de Andrea', 55, 'Haedo', 78543648),
(10, 'Ignacio', 'Gerpe', 'ignaciogeroe@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Flora', 984, 'Haedo', 78543649),
(11, 'Nicolas', 'Primo', 'neque.primo@gmail.com', '$2y$10$ldremjo5mvS1AflMDE0.9OCpt4.tDodSt/GUqVvHEm8mauvS4kgHq', 'Flora', 984, 'Haedo', 78543649);

-- Luego insertamos las wallets
INSERT INTO `wallets` (`id_wallet`, `id_user`, `amount`) VALUES
(1, 1, 1500),
(2, 2, 500),
(3, 3, 1500),
(4, 4, 150),
(5, 5, 500),
(6, 6, 100),
(7, 7, 150),
(8, 8, 1900),
(9, 9, 2500),
(10, 10, 4500),
(11, 11, 10000);

-- Primero obtenemos el número total de usuarios con wallets
SET @total_users = (SELECT COUNT(DISTINCT id_user) FROM wallets);
SET @min_user_id = (SELECT MIN(id_user) FROM wallets);
SET @max_user_id = (SELECT MAX(id_user) FROM wallets);

-- Modificación en la inserción de transacciones para usar zona horaria de Argentina
SET @start_date = CONVERT_TZ(DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 2 MONTH), @@session.time_zone, '-03:00');
SET @end_date = CONVERT_TZ(CURRENT_TIMESTAMP, @@session.time_zone, '-03:00');

-- Crear una tabla temporal con los rangos deseados para los montos
SET @min_amount = 100;
SET @max_amount = 1000;

-- Insertamos las transacciones aleatorias asegurando usuarios diferentes
INSERT INTO `transactions` (`date`, `amount`, `type`, `id_wallet_of`, `id_wallet_to`) 
WITH RECURSIVE numbers AS (
    SELECT 1 AS n
    UNION ALL
    SELECT n + 1 FROM numbers WHERE n < 30
),
available_wallets AS (
    -- Obtenemos pares de wallets válidos para transferencias
    SELECT 
        w1.id_wallet as wallet_from,
        w2.id_wallet as wallet_to
    FROM wallets w1
    CROSS JOIN wallets w2
    WHERE w1.id_user != w2.id_user  -- Asegura usuarios diferentes
),
random_transactions AS (
    SELECT 
        CONVERT_TZ(
            TIMESTAMP(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)) + 
            INTERVAL FLOOR(RAND() * 24) HOUR + 
            INTERVAL FLOOR(RAND() * 60) MINUTE + 
            INTERVAL FLOOR(RAND() * 60) SECOND,
            @@session.time_zone,
            '-03:00'
        ) as date,
        FLOOR(@min_amount + RAND() * (@max_amount - @min_amount)) as amount,
        'transfer' as type,
        aw.wallet_from as id_wallet_of,
        aw.wallet_to as id_wallet_to
    FROM numbers n
    JOIN available_wallets aw
    ORDER BY RAND()  -- Ordenamos aleatoriamente los pares de wallets
    LIMIT 30         -- Limitamos a 30 transacciones
)
SELECT * FROM random_transactions;

-- Verificación del número de transacciones insertadas
SELECT COUNT(*) as transactions_inserted FROM transactions
WHERE date BETWEEN @start_date AND @end_date;

-- Insertamos las categorías
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


-- Modificación del Stored Procedure en SQL
DELIMITER //

DROP PROCEDURE IF EXISTS GetTransactionHistory //

CREATE PROCEDURE GetTransactionHistory(
    IN p_wallet_id INT,
    IN p_limit INT
)
BEGIN
    -- Establecer explícitamente la zona horaria para la sesión
    SET time_zone = '-03:00';
    
    SELECT 
        -- Usar CONVERT_TZ para asegurar que las fechas estén en la zona horaria correcta
        DATE(t.date) as transaction_date,
        TIME(t.date) as transaction_time,
        t.amount, 
        CASE 
            WHEN t.id_wallet_of = p_wallet_id THEN 'salida'
            ELSE 'entrada'
        END AS tipo,
        CASE 
            WHEN t.id_wallet_of = p_wallet_id THEN u_to.email
            ELSE u_from.email
        END AS email_usuario,
        CASE 
            WHEN t.id_wallet_of = p_wallet_id THEN CONCAT(u_to.name, ' ', u_to.surname)
            ELSE CONCAT(u_from.name, ' ', u_from.surname)
        END AS nombre_usuario
    FROM 
        transactions t
    JOIN 
        wallets w_from ON t.id_wallet_of = w_from.id_wallet
    JOIN 
        users u_from ON w_from.id_user = u_from.id_users
    JOIN 
        wallets w_to ON t.id_wallet_to = w_to.id_wallet
    JOIN 
        users u_to ON w_to.id_user = u_to.id_users
    WHERE 
        t.id_wallet_of = p_wallet_id 
        OR t.id_wallet_to = p_wallet_id
    ORDER BY 
        t.date DESC
    LIMIT p_limit;
END //

DELIMITER ;

DELIMITER //

-- Procedimiento para obtener la información del usuario y su billetera
CREATE PROCEDURE GetUserWalletInfo(
    IN p_email VARCHAR(100)
)
BEGIN
    SELECT 
        users.id_users,
        users.name,
        users.surname,
        users.email,
        wallets.id_wallet,
        wallets.amount
    FROM users 
    JOIN wallets ON users.id_users = wallets.id_user 
    WHERE users.email = p_email;
END //

DELIMITER //

-- Stored Procedure para actualizar información de usuario
CREATE PROCEDURE UpdateUserProfile(
    IN p_email VARCHAR(100),
    IN p_name VARCHAR(45),
    IN p_surname VARCHAR(45),
    IN p_street VARCHAR(200),
    IN p_snumber INT,
    IN p_locality VARCHAR(200),
    IN p_dni INT
)
BEGIN
    UPDATE users 
    SET 
        name = p_name,
        surname = p_surname,
        street = p_street,
        snumber = p_snumber,
        locality = p_locality,
        dni = p_dni
    WHERE email = p_email;
END //

-- Stored Procedure para eliminar usuario y su wallet
CREATE PROCEDURE DeleteUserAccount(
    IN p_email VARCHAR(100)
)
BEGIN
    DECLARE user_id INT;
    
    -- Obtener el ID del usuario
    SELECT id_users INTO user_id FROM users WHERE email = p_email;
    
    -- Eliminar transacciones relacionadas
    DELETE FROM transactions 
    WHERE id_wallet_of IN (SELECT id_wallet FROM wallets WHERE id_user = user_id)
    OR id_wallet_to IN (SELECT id_wallet FROM wallets WHERE id_user = user_id);
    
    -- Eliminar categorías de transacciones
    DELETE FROM transaction_categories 
    WHERE id_transaction IN (
        SELECT id_transaction FROM transactions 
        WHERE id_wallet_of IN (SELECT id_wallet FROM wallets WHERE id_user = user_id)
        OR id_wallet_to IN (SELECT id_wallet FROM wallets WHERE id_user = user_id)
    );
    
    -- Eliminar wallet del usuario
    DELETE FROM wallets WHERE id_user = user_id;
    
    -- Eliminar usuario
    DELETE FROM users WHERE id_users = user_id;
END //

DELIMITER ;