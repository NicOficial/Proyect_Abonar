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

