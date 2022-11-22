-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 08:28:26
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fct_management`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `c_id` int(11) NOT NULL,
  `c_cif` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_description` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_phone` int(11) NOT NULL,
  `c_logo` varchar(255) NOT NULL,
  `c_created_at` date NOT NULL DEFAULT current_timestamp(),
  `c_updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`c_id`, `c_cif`, `c_name`, `c_description`, `c_address`, `c_email`, `c_phone`, `c_logo`, `c_created_at`, `c_updated_at`) VALUES
(3, 'B-12345678', 'Editada', 'Empresa de prueba', 'Calle de prueba', 'email@gmail.com', 957456789, 'logo.png', '2022-10-11', '2022-10-13'),
(4, 'B-12345678', 'Compañía Editada', 'Descripción 4', 'Address 4', 'rmail2@gmail.com', 957123456, 'logo.png', '2022-10-11', '2022-10-13'),
(5, 'B-12345678', 'Company 1', 'Company 1 description', 'Company 1 address', 'company1@gmail.com', 957456789, 'company1.png', '2022-10-11', '2022-10-11'),
(6, 'B-12345678', 'Compañía Editada', 'Descripción 4', 'Address 4', 'rmail2@gmail.com', 957123456, 'logo.png', '2022-10-11', '2022-10-13'),
(7, 'B-12345678', 'Compañía Editada', 'Descripción 4', 'Address 4', 'rmail2@gmail.com', 957123456, 'logo.png', '2022-10-11', '2022-10-13'),
(8, 'B-12345678', 'Compañía Editada', 'Descripción 4', 'Address 4', 'rmail2@gmail.com', 957123456, 'logo.png', '2022-10-11', '2022-10-13'),
(9, 'B-12345678', 'Company 2', 'Company 2 description', 'Address 2', 'rmail2@gmail.com', 957123456, 'logo.png', '2022-10-13', '2022-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_nif` varchar(9) NOT NULL,
  `emp_job` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `type_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_user` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_profile` varchar(255) NOT NULL,
  `u_created_at` date NOT NULL DEFAULT current_timestamp(),
  `u_updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`u_id`, `u_user`, `u_password`, `u_email`, `u_name`, `u_profile`, `u_created_at`, `u_updated_at`) VALUES
(1, 'admin1', 'admin1', 'admin1@iesgrancapitan.org', 'admin1', 'admin', '2022-10-14', '2022-10-14'),
(2, 'admin2', 'admin2', 'admin2@iesgrancapitan.org', 'admin2', 'admin', '2022-10-14', '2022-10-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `company_id_2` (`company_id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
