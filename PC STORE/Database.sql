-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 01:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudproject_dp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'john', '$2y$10$WCGYnw8/cOS075crU6jxkeldLW7E7lH.ZmjBMP9O2Us8cFcQ9foVu', 'user', '2025-11-05 07:46:34'),
(2, 'josh', '$2y$10$znYiOowDOWEd0lLDbsj4l.EFUHJCwAwDL1VZxlldGLuVv/hFSA2Bu', 'user', '2025-11-05 08:04:50'),
(3, 'rael', '$2y$10$G7tjl4pxMTBMzyxYIzdjE.HGkftKtVdQjGOa1ijUp3dvtpTBHBU2O', 'user', '2025-11-06 12:28:00'),
(4, 'andrew', '$2y$10$1OvwPlvaHG9nGC1nR61EWuuQmIBLtNT2j8ry5rmPAZJqSW1LqrUJS', 'user', '2025-11-06 12:37:19'),
(5, 'khin', '$2y$10$GFfmDTAJthkfYqdMWsCMk.km6imkwN8xLfDlQ8k7uxGpKHl0Qm3de', 'user', '2025-11-07 06:42:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
