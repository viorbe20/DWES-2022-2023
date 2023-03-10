-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 12:52 PM
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
  `id_teacher` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL,
  `ayear` varchar(15) NOT NULL,
  `term` varchar(50) NOT NULL,
  `group_name` varchar(15) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `eval_student` varchar(256) NOT NULL,
  `eval_teacher` varchar(256) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ayears`
--

CREATE TABLE `ayears` (
  `ayear` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ayears`
--

INSERT INTO `ayears` (`ayear`) VALUES
('2020-2021'),
('2021-2022'),
('2022-2023'),
('2023-2024'),
('2024-2025'),
('2025-2026'),
('2026-2027'),
('2027-2028'),
('2028-2029'),
('2029-2030');

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

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ayear` varchar(15) NOT NULL,
  `term` varchar(50) NOT NULL,
  `group_name` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_name`) VALUES
('ASIR'),
('DAM'),
('DAW');

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
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surnames` varchar(100) NOT NULL,
  `nif` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surnames`, `nif`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Francisco José ', 'Aguilera Ruiz', '34195678Z', '957969135', 'joseaguilera@iesgrancapitan.org', 'alta', '2023-03-08', '2023-03-08'),
(2, 'Jaime', 'Rabasco Ronda', '34195678P', '957969135', 'jaimerabasco@iesgrancapitan.org', 'alta', '2023-03-08', '2023-03-08'),
(3, 'Mª Carmen', 'Tripiana Rodríguez', '96768459F', '957315784', 'mctripiana@iesgrancapitan.org ', 'alta', '2023-03-10', '2023-03-10'),
(4, 'Lourdes', 'Magarín Corvillo', '30862950D', '957365294', 'mlmagarin@iesgrancapitan.org ', 'alta', '2023-03-10', '2023-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term`) VALUES
('marzo-junio'),
('septiembre-diciembre');

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
(2, 'user1', 'user1', 'user1', 'user', 'alta', '2023-03-07', '2023-03-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student_id` (`id_student`),
  ADD KEY `fk_employee_id` (`id_employee`),
  ADD KEY `fk_ayear_fk` (`ayear`),
  ADD KEY `fk_teacher_id` (`id_teacher`),
  ADD KEY `fk_group` (`group_name`),
  ADD KEY `fk_assignments_status` (`status`),
  ADD KEY `fk_assignments_terms` (`term`);

--
-- Indexes for table `ayears`
--
ALTER TABLE `ayears`
  ADD PRIMARY KEY (`ayear`);

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
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enrollments_students` (`student_id`),
  ADD KEY `fk_enrollments_ayear` (`ayear`),
  ADD KEY `fk_enrollments_group_name` (`group_name`),
  ADD KEY `fk_enrollments_status` (`status`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_name`);

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
  ADD UNIQUE KEY `nif` (`nif`),
  ADD KEY `fk_students_status` (`status`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_status` (`status`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fk_assignments_status` FOREIGN KEY (`status`) REFERENCES `status_t` (`status`),
  ADD CONSTRAINT `fk_assignments_terms` FOREIGN KEY (`term`) REFERENCES `terms` (`term`),
  ADD CONSTRAINT `fk_ayear_fk` FOREIGN KEY (`ayear`) REFERENCES `ayears` (`ayear`),
  ADD CONSTRAINT `fk_employee_id` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`group_name`) REFERENCES `groups` (`group_name`),
  ADD CONSTRAINT `fk_stauts_fk` FOREIGN KEY (`status`) REFERENCES `status_t` (`status`),
  ADD CONSTRAINT `fk_student_id` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `fk_teacher_id` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `fk_term_fk` FOREIGN KEY (`term`) REFERENCES `terms` (`term`);

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
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `fk_enrollments_ayear` FOREIGN KEY (`ayear`) REFERENCES `ayears` (`ayear`),
  ADD CONSTRAINT `fk_enrollments_group_name` FOREIGN KEY (`group_name`) REFERENCES `groups` (`group_name`),
  ADD CONSTRAINT `fk_enrollments_status` FOREIGN KEY (`status`) REFERENCES `status_t` (`status`),
  ADD CONSTRAINT `fk_enrollments_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_status` FOREIGN KEY (`status`) REFERENCES `status_t` (`status`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `status_t` (`status`);

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
