-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 07:01 PM
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
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `status_fk` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `id_student`, `id_employee`, `status_fk`, `created_at`, `updated_at`) VALUES
(4, 1, 2, 'alta', '2023-03-07', '2023-03-07'),
(6, 1, 2, 'baja', '2023-03-07', '2023-03-07');

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
(2, 'Empresa1', 'C21225173', '', '', 'empresa1@gmail.com', 957858585, 'unknown.png', 'alta', '2023-03-07', '2023-03-07'),
(8, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', 0, '[value-8]', 'alta', '2023-03-07', '2023-03-07'),
(9, 'test', 'A25587684', 'test', 'test', 'vir@gmail.com\r\n', 666666666, '666666666', 'alta', '2023-03-07', '2023-03-07'),
(11, 'test', 'A25583684', 'test', 'test2', 'vir@gmail.com\r\n', 666666666, '666666666', 'alta', '2023-03-07', '2023-03-07'),
(12, 'Virginia Ordoño Bernier', 'C98480973', '', 'C/ Asín Palacios 35', 'vobernier@gmail.com', 620791662, 'logo.png', 'baja', '2023-03-07', '2023-03-07'),
(16, 'Wordpress', 'Q4077476S', '', 'C/ Asín Palacios 35', 'vobernier@gmail.com', 620791662, 'unknown.png', 'alta', '2023-03-07', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surnames` varchar(50) NOT NULL,
  `nif` varchar(10) NOT NULL,
  `job` varchar(50) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  `status_fk` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `surnames`, `nif`, `job`, `company_id_fk`, `status_fk`, `created_at`, `updated_at`) VALUES
(1, 'Pedro', 'Cantos Suárez', '44355467P', 'Desarrollador', 16, 'alta', '2023-03-07', '2023-03-07'),
(2, 'Ana', 'Vázquez Jiménez', '44352467P', 'Diseñadora', 16, 'alta', '2023-03-07', '0000-00-00');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surnames` varchar(50) NOT NULL,
  `nif` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surnames`, `nif`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'Ayala Cantador', '44352467P', '2023-03-07', '2023-03-07');

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
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_id` (`id_student`),
  ADD KEY `fk_employee_id` (`id_employee`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cif` (`cif`),
  ADD KEY `fk_company_status` (`status_fk`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nif` (`nif`),
  ADD KEY `fk_company_id` (`company_id_fk`),
  ADD KEY `fk_status_fk` (`status_fk`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nif` (`nif`);

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
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
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
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `fk_employee_id` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `fk_company_status` FOREIGN KEY (`status_fk`) REFERENCES `status_t` (`status`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_company_id` FOREIGN KEY (`company_id_fk`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `fk_status_fk` FOREIGN KEY (`status_fk`) REFERENCES `status_t` (`status`);

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
