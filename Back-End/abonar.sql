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

SET @start_date = DATE_SUB(CURDATE(), INTERVAL 2 MONTH);
SET @end_date = CURDATE();

-- Establecer el rango de fechas (últimos 2 meses)
SET @start_date = DATE_SUB(CURRENT_DATE(), INTERVAL 2 MONTH);
SET @end_date = CURRENT_DATE();

INSERT INTO `transactions` (`id_transaction`, `date`, `amount`, `type`, `id_wallet_of`, `id_wallet_to`) VALUES
(1, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 578, 'transfer', 1, 4),
(2, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 352, 'transfer', 2, 7),
(3, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 1024, 'transfer', 3, 6),
(4, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 789, 'transfer', 4, 9),
(5, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 465, 'transfer', 5, 2),
(6, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 902, 'transfer', 6, 3),
(7, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 211, 'transfer', 7, 1),
(8, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 683, 'transfer', 8, 5),
(9, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 476, 'transfer', 9, 8),
(10, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 394, 'transfer', 2, 6),
(11, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 654, 'transfer', 7, 3),
(12, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 821, 'transfer', 5, 1),
(13, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 318, 'transfer', 8, 4),
(14, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 972, 'transfer', 6, 9),
(15, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 507, 'transfer', 3, 2),
(16, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 439, 'transfer', 9, 7),
(17, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 771, 'transfer', 1, 6),
(18, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 295, 'transfer', 4, 3),
(19, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 628, 'transfer', 2, 8),
(20, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 413, 'transfer', 7, 5),
(21, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 902, 'transfer', 6, 1),
(22, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 564, 'transfer', 3, 9),
(23, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 710, 'transfer', 8, 2),
(24, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 421, 'transfer', 5, 7),
(25, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 838, 'transfer', 1, 4),
(26, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 359, 'transfer', 9, 6),
(27, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 617, 'transfer', 2, 3),
(28, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 475, 'transfer', 7, 8),
(29, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 782, 'transfer', 4, 5),
(30, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 293, 'transfer', 6, 1),
(31, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 651, 'transfer', 3, 9),
(32, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 446, 'transfer', 8, 2),
(33, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 590, 'transfer', 5, 7),
(34, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 727, 'transfer', 1, 4),
(35, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 384, 'transfer', 9, 6),
(36, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 532, 'transfer', 2, 3),
(37, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 419, 'transfer', 7, 8),
(38, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 694, 'transfer', 4, 5),
(39, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 248, 'transfer', 6, 1),
(40, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 571, 'transfer', 3, 9),
(41, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 403, 'transfer', 8, 2),
(42, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 736, 'transfer', 5, 7),
(43, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 825, 'transfer', 1, 4),
(44, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 312, 'transfer', 9, 6),
(45, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 468, 'transfer', 2, 3),
(46, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 596, 'transfer', 7, 8),
(47, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 459, 'transfer', 4, 5),
(48, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 712, 'transfer', 6, 1),
(49, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 604, 'transfer', 3, 9),
(50, DATE(DATE_ADD(@start_date, INTERVAL FLOOR(RAND() * DATEDIFF(@end_date, @start_date)) DAY)), 380, 'transfer', 8, 2);
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
(1, 'Valentin', 'Peluso', 'valentinepeluso@gmail.com', '56', 'Monseñor de Andrea', 0, '', '0', 'Haedo', 78543649),
(2, 'Bautista', 'Sangineto', 'bautistasangineto@hotmail.com', '123', 'Viamonte', 174, '', '', 'Ramos Mejia', 46389547),
(3, 'Nicolas', 'Primo', 'neque.primo@gmail.com', '123', 'Flora', 984, '', '', 'Haedo', 47399133),
(4, 'Emily', 'Thompson', 'emily@gmail.com', 'pass4', 'Main St', 123, '', '', 'Anytown', 12345678),
(5, 'Michael', 'Anderson', 'michael@gmail.com', 'pass5', 'Oak Ave', 456, '', '', 'Othertown', 87654321),
(6, 'Jessica', 'Hernandez', 'jessica@gmail.com', 'pass6', 'Elm Rd', 789, '', '', 'Somewhere', 13579086),
(7, 'David', 'Gutierrez', 'david@gmail.com', 'pass7', 'Pine Ln', 321, '', '', 'Nowhere', 24680135),
(8, 'Samantha', 'Ramirez', 'samantha@gmail.com', 'pass8', 'Maple Dr', 654, '', '', 'Everywhere', 97531468),
(9, 'Christopher', 'Gonzalez', 'christopher@gmail.com', 'pass9', 'Cedar St', 987, '', '', 'Somewhere Else', 86420135);

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
(3, 3, 1100),
(4, 4, 2000),
(5, 5, 2500),
(6, 6, 3000),
(7, 7, 3500),
(8, 8, 4000),
(9, 9, 4500);

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

DELIMITER //

CREATE PROCEDURE GetTransactionHistory(
    IN p_wallet_id INT,
    IN p_limit INT
)
BEGIN
    -- Esta stored procedure recupera el historial de transacciones para una billetera específica
    -- Muestra tanto las transacciones enviadas como recibidas
    -- Parámetros:
    --   p_wallet_id: ID de la billetera para la cual queremos ver el historial
    --   p_limit: Número máximo de transacciones a retornar
    
    SELECT 
        t.date, 
        t.amount, 
        CASE 
            WHEN t.id_wallet_of = p_wallet_id THEN 'salida'
            ELSE 'entrada'
        END AS tipo,
        CASE 
            WHEN t.id_wallet_of = p_wallet_id THEN u_to.email
            ELSE u_from.email
        END AS otro_usuario
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