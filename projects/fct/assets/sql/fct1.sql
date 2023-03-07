-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 04:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fct1`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cif` varchar(15) NOT NULL,
  `description` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `status_fk` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `cif`, `description`, `address`, `email`, `phone`, `logo`, `status_fk`, `created_at`, `updated_at`) VALUES
(1, 'Empresa0', 'C21225172', '', 'Calle Ejemplo', 'tt@tt.com', 957854875, 'unknown.png', 'alta', '2023-03-07', '2023-03-07'),
(2, 'Empresa1', 'C21225173', '', '', 'empresa1@gmail.com', 957858585, 'unknown.png', 'alta', '2023-03-07', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `profile_t`
--

CREATE TABLE `profile_t` (
  `profile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_t`
--

INSERT INTO `profile_t` (`profile`) VALUES
('admin'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `status_t`
--

CREATE TABLE `status_t` (
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_t`
--

INSERT INTO `status_t` (`status`) VALUES
('alta'),
('baja');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `profile_fk` varchar(50) NOT NULL,
  `status_fk` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `psw`, `profile_fk`, `status_fk`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin1', 'admin1', 'admin', 'alta', '2023-03-07', '2023-03-07'),
(2, 'admin', 'admin', 'admin', 'admin', 'baja', '2023-03-07', '2023-03-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cif` (`cif`),
  ADD KEY `fk_company_status` (`status_fk`);

--
-- Indexes for table `profile_t`
--
ALTER TABLE `profile_t`
  ADD PRIMARY KEY (`profile`);

--
-- Indexes for table `status_t`
--
ALTER TABLE `status_t`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_status` (`status_fk`),
  ADD KEY `fk_user_profile` (`profile_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `fk_company_status` FOREIGN KEY (`status_fk`) REFERENCES `status_t` (`status`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`profile_fk`) REFERENCES `profile_t` (`profile`),
  ADD CONSTRAINT `fk_user_status` FOREIGN KEY (`status_fk`) REFERENCES `status_t` (`status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
