-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 06:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelone`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 0, '2023-01-27 06:51:46', '2023-01-27 06:51:46'),
(2, 15, '2022-04-26 04:12:26', '2022-04-26 04:12:26'),
(3, 24, '2022-04-26 05:38:57', '2022-04-26 05:38:57'),
(5, 69, '2022-09-26 03:19:39', '2022-09-26 03:19:39'),
(6, 84, '2022-11-17 04:01:44', '2022-11-17 04:01:44'),
(7, 89, '2022-11-28 00:37:30', '2022-11-28 00:37:30'),
(8, 90, '2022-12-02 22:30:33', '2022-12-02 22:30:33'),
(9, 91, '2022-12-03 03:59:22', '2022-12-03 03:59:22'),
(10, 93, '2022-12-03 05:58:43', '2022-12-03 05:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ishu', 2, 'tally', 1, '2022-04-25 05:51:39', '2022-04-25 05:51:39'),
(2, 'sidd', 2, 'tgkjgj', 1, '2022-04-26 04:42:22', '2022-04-26 04:42:22'),
(3, 'nita', 2, 'fgh fg rtg efgh', 1, '2022-04-30 00:00:20', '2022-04-30 00:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) UNSIGNED NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) DEFAULT NULL,
  `address1` varchar(191) DEFAULT NULL,
  `address2` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `zip` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `owner_id`, `owner_type`, `address1`, `address2`, `city`, `zip`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Doctor', 'devgad', 'devgad', 'thane', '234567', '2022-04-26 03:16:37', '2022-04-26 03:16:37'),
(3, 0, 'App\\Models\\Patient', 'pune', 'pune', 'devgad', '123456', '2022-04-26 03:28:38', '2022-04-26 03:28:38'),
(5, 2, 'App\\Models\\Accountant', 'devgad', 'devgad', 'ojhjk', '234565', '2022-04-26 04:12:27', '2022-04-26 04:12:27'),
(6, 3, 'App\\Models\\Doctor', 'Kalwa', 'Thane', 'Thane', '400605', '2022-04-26 04:31:31', '2022-04-26 04:31:31'),
(7, 4, 'App\\Models\\Doctor', 'devgad', 'devgad', 'pune', '234567', '2022-04-26 05:09:28', '2022-04-26 05:09:28'),
(8, 0, 'App\\Models\\Patient', 'devgad', 'thane', 'thane', '234565', '2022-04-26 05:18:47', '2022-04-26 05:18:47'),
(9, 3, 'App\\Models\\Patient', 'Kalwa', 'Thane', 'thane', '123454', '2022-04-26 05:24:01', '2022-04-26 05:24:01'),
(10, 3, 'App\\Models\\Accountant', 'Kalwa', 'Thane', 'devgad', '123456', '2022-04-26 05:38:57', '2022-04-26 05:38:57'),
(11, 1, 'App\\Models\\LabTechnician', 'devgad', 'thane', 'devgad', '223344', '2022-04-27 00:18:05', '2022-04-27 00:18:05'),
(12, 2, 'App\\Models\\LabTechnician', 'pune', 'thane', 'mumbai', '123456', '2022-04-27 00:20:17', '2022-04-27 00:20:17'),
(13, 1, 'App\\Models\\Nurse', 'thane', 'thane', 'devgad', '234543', '2022-04-27 00:30:41', '2022-04-27 00:30:41'),
(14, 2, 'App\\Models\\Nurse', 'thane', 'pune', 'pune', '234567', '2022-04-27 00:36:11', '2022-04-27 00:36:11'),
(15, 4, 'App\\Models\\Patient', 'thane', 'thane', 'pune', '234567', '2022-04-27 00:37:49', '2022-04-27 00:37:49'),
(16, 1, 'App\\Models\\CaseHandler', 'devgad', 'devgad', 'devgad', '123456', '2022-04-27 00:41:10', '2022-04-27 00:41:10'),
(17, 0, 'App\\Models\\Pharmacist', 'devgad', 'devgad', 'thane', '123456', '2022-04-27 00:47:53', '2022-04-27 00:47:53'),
(18, 2, 'App\\Models\\Pharmacist', 'devgad', 'devgad', 'thane west', '234565', '2022-04-27 00:52:40', '2022-04-27 00:52:40'),
(19, 0, 'App\\Models\\Receptionist', 'devgad', 'devgad', 'mumbai', '123454', '2022-04-27 00:57:52', '2022-04-27 00:57:52'),
(20, 2, 'App\\Models\\Receptionist', 'devgad', 'devgad', 'mumbai', '234565', '2022-04-27 01:01:47', '2022-04-27 01:01:47'),
(22, 2, 'App\\Models\\CaseHandler', 'devgad', 'devgad', 'devgad', '123456', '2022-04-27 23:11:13', '2022-04-27 23:11:13'),
(23, 5, 'App\\Models\\Patient', 'thane', 'thane', 'thane', '234567', '2022-04-27 23:40:31', '2022-04-27 23:40:31'),
(24, 6, 'App\\Models\\Patient', 'devgad', 'devgad', 'pune', '123456', '2022-04-27 23:54:45', '2022-04-27 23:54:45'),
(25, 7, 'App\\Models\\Patient', 'devgad', 'devgad', 'devgad', '234567', '2022-04-28 00:21:11', '2022-04-28 00:21:11'),
(26, 8, 'App\\Models\\Patient', 'thane', 'thane', 'thane', '123456', '2022-04-28 00:47:14', '2022-04-28 00:47:14'),
(27, 9, 'App\\Models\\Patient', 'devgad', 'devgad', 'pune', '123456', '2022-04-28 01:08:52', '2022-04-28 01:08:52'),
(28, 10, 'App\\Models\\Patient', 'thane', 'thane', 'thane', '234567', '2022-04-28 01:15:39', '2022-04-28 01:15:39'),
(29, 11, 'App\\Models\\Patient', 'pune', 'pune', 'pune', '123456', '2022-04-28 03:50:10', '2022-04-28 03:50:10'),
(30, 12, 'App\\Models\\Patient', 'thane', 'thane', 'thane', '123456', '2022-04-29 00:39:33', '2022-04-29 00:39:33'),
(32, 4, 'App\\Models\\Accountant', 'thane', 'thane', 'thane', '234565', '2022-04-29 23:56:26', '2022-04-29 23:56:26'),
(33, 0, 'App\\Models\\Patient', 'asdfg', 'sdfgh', 'sdfg', '234567', '2022-09-13 23:09:59', '2022-09-13 23:09:59'),
(34, 7, 'App\\Models\\Doctor', 'asdfg', 'sdf', 'pune', '345678', '2022-09-13 23:51:26', '2022-09-13 23:51:26'),
(35, 8, 'App\\Models\\Doctor', 'mumbai', 'mumbai', 'ghansoli', '234543', '2022-09-14 01:55:22', '2022-09-14 01:55:22'),
(36, 14, 'App\\Models\\Patient', 'pune', 'pune', 'pune west', '234567', '2022-09-15 00:47:46', '2022-09-15 00:47:46'),
(37, 15, 'App\\Models\\Patient', 'asdfg', 'mumbai', 'sdfg', '234567', '2022-09-15 03:44:47', '2022-09-15 03:44:47'),
(38, 5, 'App\\Models\\Accountant', 'asdfg', 'mumbai', 'sdfg', '345656', '2022-09-26 03:19:39', '2022-09-26 03:19:39'),
(39, 9, 'App\\Models\\Doctor', 'asdfg', 'sdf', 'sdfg', '345676', '2022-09-26 03:31:36', '2022-09-26 03:31:36'),
(40, 25, 'App\\Models\\Patient', 'Insure Eye Institute Thane', 'Insure Eye Institute Thane(mumbai)', 'Mumbai', '234544', '2022-09-26 03:37:32', '2022-11-25 00:39:41'),
(41, 3, 'App\\Models\\Nurse', 'sdfg', 'dfg', 'sdfg', '345654', '2022-09-26 03:43:20', '2022-09-26 03:43:20'),
(42, 3, 'App\\Models\\CaseHandler', 'asdfg', 'dfg', 'sdfg', '345677', '2022-09-26 03:48:35', '2022-09-26 03:48:35'),
(44, 11, 'App\\Models\\Doctor', 'asdfg', 'dfg', 'devgad', '345678', '2022-09-28 01:50:30', '2022-09-28 01:50:30'),
(45, 4, 'App\\Models\\Nurse', 'asdfg', 'sdfgh', 'devgad', '234544', '2022-09-28 04:39:33', '2022-09-28 04:39:33'),
(46, 30, 'App\\Models\\Patient', 'Insure Eye Institute Vashi', 'Insure Eye Institute Vashi(mumbai)', 'Mumbai', '402107', '2022-11-25 00:38:46', '2022-11-25 00:38:46'),
(47, 24, 'App\\Models\\Patient', 'HMS Eye Hospital Sangli', 'HMS Eye Hospital Sangli', 'Sangli', '416416', '2022-11-25 00:41:33', '2022-11-25 00:41:33'),
(48, 31, 'App\\Models\\Patient', 'HMS Eye Hospital Raipur', 'HMS Eye Hospital Raipur', 'Raipur', '234354', '2022-11-25 00:47:21', '2022-11-25 00:47:21'),
(49, 32, 'App\\Models\\Patient', 'Insure Eye Institute Thane', 'Insure Eye Institute Thane', 'mumbai', '456565', '2022-11-25 01:10:30', '2022-11-25 01:10:30'),
(50, 33, 'App\\Models\\Patient', 'Insure Eye Institute Kalhar', 'Insure Eye Institute Kalhar', 'kalhar', '234354', '2022-11-25 02:53:23', '2022-11-25 02:53:23'),
(51, 13, 'App\\Models\\Doctor', 'asdfg', 'sdfgh', 'dfgh', '567676', '2022-12-06 05:43:44', '2022-12-06 05:43:44'),
(52, 0, 'App\\Models\\Receptionist', 'mumbai', 'mumbai', 'ghansoli', '123232', '2022-12-07 04:21:16', '2022-12-07 04:21:16'),
(53, 34, 'App\\Models\\Patient', 'asdfg', 'sdfgh', 'pune west', '345676', '2022-12-07 22:39:22', '2022-12-07 22:39:22'),
(54, 35, 'App\\Models\\Patient', 'devgad', 'pune', 'devgad', '232343', '2022-12-07 22:46:38', '2022-12-07 22:46:38'),
(55, 37, 'App\\Models\\Patient', 'asdfg', 'sdfgh', 'mumbai', '234345', '2022-12-12 05:05:46', '2022-12-12 05:05:46'),
(56, 15, 'App\\Models\\Doctor', 'devgad', 'dfg', 'pune west', '234543', '2023-01-25 01:20:04', '2023-01-25 01:20:04'),
(57, 16, 'App\\Models\\Doctor', 'devgad', 'pune', 'pune', '123456', '2023-01-26 23:51:46', '2023-01-26 23:51:46'),
(58, 0, 'App\\Models\\Patient', 'asdfg', 'sdfgh', 'sdfg', '778898', '2023-02-08 04:05:56', '2023-02-08 04:05:56'),
(59, 17, 'App\\Models\\Doctor', 'mumbai', 'mumbai', 'pune', '768767', '2023-02-08 04:08:11', '2023-02-08 04:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `advanced_payments`
--

CREATE TABLE `advanced_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advanced_payments`
--

INSERT INTO `advanced_payments` (`id`, `patient_id`, `receipt_no`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 2, 'SSF61Y47', 5000, '2022-04-26', '2022-04-26 05:42:57', '2022-04-26 05:42:57'),
(2, 4, 'LJ0AXVLQ', 50000, '2022-04-29', '2022-04-30 00:48:13', '2022-04-30 00:48:13'),
(3, 9, 'LJ0AXVLQ', 5000, '2022-04-29', '2022-04-30 00:48:26', '2022-04-30 00:48:26'),
(4, 24, 'GQ0GKRE7', 23000, '2022-11-12', '2022-11-11 22:56:10', '2022-11-11 22:56:10'),
(5, 36, '7APNJPLC', 2300, '2022-12-10', '2022-12-09 22:53:51', '2022-12-09 22:53:51'),
(6, 35, '7APNJPLC', 20000, '2022-12-10', '2022-12-09 22:56:53', '2022-12-09 22:56:53'),
(7, 24, 'FOZGSPVQ', 20000, '2022-12-16', '2022-12-10 02:11:49', '2022-12-10 02:11:49'),
(8, 30, 'FOZGSPVQ', 20000, '2022-12-16', '2022-12-10 02:12:18', '2022-12-10 02:12:18'),
(9, 30, 'FOZGSPVQ', 20000, '2022-12-16', '2022-12-10 02:12:24', '2022-12-10 02:12:24'),
(10, 30, 'FOZGSPVQ', 20000, '2022-12-16', '2022-12-10 02:12:26', '2022-12-10 02:12:26'),
(11, 36, 'AYJZJ1EY', 20000, '2022-12-12', '2022-12-12 06:30:54', '2022-12-12 06:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_number` varchar(191) NOT NULL,
  `vehicle_model` varchar(191) NOT NULL,
  `year_made` varchar(191) NOT NULL,
  `driver_name` varchar(191) NOT NULL,
  `driver_license` varchar(191) NOT NULL,
  `driver_contact` varchar(191) NOT NULL,
  `note` text DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `vehicle_type` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulances`
--

INSERT INTO `ambulances` (`id`, `vehicle_number`, `vehicle_model`, `year_made`, `driver_name`, `driver_license`, `driver_contact`, `note`, `is_available`, `vehicle_type`, `created_at`, `updated_at`) VALUES
(1, 'MH5678', 'qaqa', '2022', 'gjkgjg', 'dfrfg56789', '+919423456787', 'dfg', 0, 2, '2022-04-27 01:18:34', '2022-04-27 01:20:19'),
(2, 'MH7890', 'dfg345', '2022', 'cvg', '5678fgh', '+919234567834', 'fsdf', 0, 2, '2022-04-27 01:19:33', '2022-04-27 01:20:05'),
(3, 'MH56700', 'kkk78', '2022', 'sdcfg', 'dfrfg56789', '+919345678798', 'sdf dfg', 0, 2, '2022-04-27 01:51:10', '2022-04-27 01:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_calls`
--

CREATE TABLE `ambulance_calls` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `ambulance_id` int(10) UNSIGNED NOT NULL,
  `driver_name` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulance_calls`
--

INSERT INTO `ambulance_calls` (`id`, `patient_id`, `ambulance_id`, `driver_name`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'cvg', '2022-04-20', 234.00, '2022-04-27 01:20:05', '2022-04-27 01:20:05'),
(2, 4, 1, 'gjkgjg', '2022-04-27', 3000.00, '2022-04-27 01:20:19', '2022-04-27 01:20:19'),
(3, 2, 3, 'sdcfg', '2022-04-20', 3000.00, '2022-04-27 01:51:39', '2022-04-27 01:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `opd_date` datetime NOT NULL,
  `problem` text DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fdate` varchar(191) DEFAULT NULL,
  `tdate` varchar(191) DEFAULT NULL,
  `emp_name` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift_start` varchar(191) DEFAULT NULL,
  `shift_end` varchar(191) DEFAULT NULL,
  `tea_break` varchar(191) DEFAULT NULL,
  `tea_break_out` varchar(191) DEFAULT NULL,
  `lunch_break` varchar(191) DEFAULT NULL,
  `lunch_break_out` varchar(191) DEFAULT NULL,
  `meeting_break` varchar(191) DEFAULT NULL,
  `meeting_break_out` varchar(191) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `total_duty_hours` varchar(191) DEFAULT NULL,
  `total_tea_break` varchar(100) DEFAULT NULL,
  `total_lunch_break` varchar(100) DEFAULT NULL,
  `total_meeting_break` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp`, `created_at`, `updated_at`, `fdate`, `tdate`, `emp_name`, `date`, `shift_start`, `shift_end`, `tea_break`, `tea_break_out`, `lunch_break`, `lunch_break_out`, `meeting_break`, `meeting_break_out`, `note`, `total_duty_hours`, `total_tea_break`, `total_lunch_break`, `total_meeting_break`) VALUES
(1, 1, NULL, '2022-11-16 08:46:03', NULL, NULL, '1', '2022-11-17', '22:48:38', '22:49:11', '22:48:41', '22:49:13', '22:48:43', '22:49:14', '22:48:45', '22:49:16', NULL, NULL, NULL, NULL, ''),
(2, 18, '2022-11-16 07:53:04', '2022-11-16 08:46:57', NULL, NULL, '2', '2022-11-16', '18:52', '00:53', '18:53', '18:54', '18:54', '18:56', '18:55', '18:57', 'Test1', '17:59', '00:01', '00:02', '00:02'),
(4, 1, NULL, NULL, NULL, NULL, 'Super Admin', '2022-11-16', '19:48:53', '20:34:44', '20:34:44', '20:34:45', '20:34:45', '20:34:46', '20:34:47', '20:34:52', NULL, NULL, NULL, NULL, ''),
(5, 40, '2022-11-16 09:44:50', '2022-11-16 09:58:30', NULL, NULL, '7', '2022-11-20', '20:44', '02:44', '20:44', '20:47', '20:48', '20:46', '20:50', '20:49', 'test4', '18:00', '00:03', '00:02', '00:01'),
(6, 18, '2022-11-16 22:20:16', '2022-11-16 22:20:16', NULL, NULL, NULL, '2022-11-17', '09:19', '18:19', '09:20', '09:25', '09:20', '09:25', '09:21', '09:23', 'Test', '09:00', '00:05', '00:05', '00:02'),
(7, 18, '2022-11-16 22:25:02', '2022-11-16 22:25:02', NULL, NULL, NULL, '2022-11-18', '09:25', '18:25', '10:24', '09:26', '09:26', '09:28', '09:25', '09:30', 'Test2', '09:00', '00:58', '00:02', '00:05'),
(9, 2, '2022-11-16 22:58:32', '2022-11-16 22:58:32', NULL, NULL, NULL, '2022-11-17', '09:57', '09:02', '09:01', '09:03', '09:58', '09:58', '09:58', '09:58', 'test', '00:55', '00:02', '00:00', '00:00'),
(10, 9, '2022-11-17 03:48:45', '2022-11-17 03:48:45', NULL, NULL, NULL, '2022-11-17', '14:48', '14:50', '14:50', '14:53', '14:52', '14:53', '14:48', '14:54', 'Test1', '00:02', '00:03', '00:01', '00:06'),
(11, 1, '2022-11-17 03:58:00', '2022-11-17 03:58:00', NULL, NULL, NULL, '2022-11-20', '14:57', '14:01', '14:57', '14:59', '14:58', '14:01', '14:58', '14:02', 'Test2', '00:56', '00:02', '00:57', '00:56'),
(19, 5, '2022-11-17 04:48:16', '2022-11-17 04:50:17', NULL, NULL, '2', '2022-11-17', '15:47', '15:51', '15:47', '15:51', '15:47', '15:50', '15:47', '15:55', NULL, NULL, NULL, NULL, ''),
(20, 3, '2022-11-17 12:18:25', '2022-11-17 12:18:25', NULL, NULL, NULL, '2022-11-17', '00:18', '00:20', '12:22', '12:23', '12:24', '12:18', '12:27', '12:24', 'ghjkl', '00:02', '00:01', '00:06', '00:03'),
(21, 47, '2022-11-17 12:20:10', '2022-11-17 12:20:10', NULL, NULL, NULL, '2022-11-23', '23:21', '23:22', '23:23', '23:24', '23:25', '23:26', '23:27', '23:29', 'kkkkkkkkkkkkkkkkkkkkkkkkkk', '00:01', '00:01', '00:01', '00:02'),
(23, 1, NULL, NULL, NULL, NULL, 'Super Admin', '2022-11-29', '17:12:48', '17:12:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` int(10) UNSIGNED NOT NULL,
  `bed_type` int(10) UNSIGNED NOT NULL,
  `bed_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `charge` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `bed_type`, `bed_id`, `name`, `description`, `charge`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 1, 'OEEDVVRB', 'bedone', 'two hundred', 200, 0, '2022-04-25 05:58:36', '2022-04-28 00:53:35'),
(2, 2, 'DVVLSEAJ', 'bedtwo', 'dloj jglkjlj/;', 567, 1, '2022-04-27 23:15:11', '2022-09-06 06:53:52'),
(3, 3, 'Z6R4MSJI', 'bedthree', 'xdcvbh dsf dfgdfg g', 567, 0, '2022-04-27 23:56:06', '2022-04-27 23:56:53'),
(4, 2, 'LLMAXMDP', 'bedfour', 'fghjkl;', 567, 0, '2022-04-28 00:25:06', '2022-04-28 00:27:34'),
(5, 2, 'XHRG0OEK', 'bedfive', 'dfgh dsf sdff', 567, 0, '2022-04-28 00:55:07', '2022-04-28 00:55:48'),
(6, 2, 'IT32KKN4', 'bedsix', 'hdl dgkl m,', 200, 0, '2022-04-28 01:11:15', '2022-04-28 01:11:46'),
(7, 2, 'JEME1IUU', 'bedeight', 'wdf wsdf', 567, 0, '2022-04-28 04:09:31', '2022-04-28 04:37:32'),
(8, 2, '3HCNXB1I', 'bednine', 'sdf df', 567, 1, '2022-04-28 04:13:09', '2022-09-06 06:53:38'),
(9, 2, 'ZTQWKGXO', 'Test', 'NA', 100, 0, '2022-04-28 05:21:45', '2022-09-26 03:50:41'),
(10, 4, 'TXWFDSR5', 'testone', 'sdfvgb', 567, 1, '2022-04-28 05:29:09', '2022-09-06 06:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `bed_assigns`
--

CREATE TABLE `bed_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `bed_id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED DEFAULT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) NOT NULL,
  `assign_date` datetime NOT NULL,
  `discharge_date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_assigns`
--

INSERT INTO `bed_assigns` (`id`, `bed_id`, `ipd_patient_department_id`, `patient_id`, `case_id`, `assign_date`, `discharge_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 3, 'PW3P1DO4', '2022-04-28 10:33:00', '2022-04-29 22:33:00', 'sdf  adsf', 1, '2022-04-27 23:27:49', '2022-04-27 23:33:30'),
(5, 3, NULL, 6, 'LZGZMY1H', '2022-04-28 10:56:00', NULL, 'fsgf', 1, '2022-04-27 23:56:52', '2022-04-27 23:56:52'),
(6, 4, NULL, 7, '6QXWSMPN', '2022-04-28 11:27:00', NULL, 'ghjkl;', 1, '2022-04-28 00:27:34', '2022-04-28 00:27:34'),
(7, 5, NULL, 8, 'DCBVDKCC', '2022-04-28 11:55:00', NULL, 'vb n sdfgh', 1, '2022-04-28 00:55:47', '2022-04-28 00:55:47'),
(8, 6, NULL, 9, 'AUAIHAP0', '2022-04-28 12:11:00', NULL, 'ftghjkl', 1, '2022-04-28 01:11:46', '2022-04-28 01:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `bed_types`
--

CREATE TABLE `bed_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_types`
--

INSERT INTO `bed_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'flate bed', 'size 23', '2022-04-25 05:58:06', '2022-04-25 05:58:06'),
(2, '40 size bed', 'gjkgkgk kkgkkg', '2022-04-26 04:43:11', '2022-04-26 04:43:11'),
(3, '50size bed', 'fvbn', '2022-04-28 01:16:05', '2022-04-28 01:16:05'),
(4, '90size bed', 'fg g egf fr j rhub  u rt jy    yjgh', '2022-04-28 05:28:48', '2022-04-28 05:28:48'),
(5, 'bednine-ggggg', 'dfg sdf sdf', '2022-04-30 00:51:17', '2022-09-06 06:54:41'),
(6, 'fghjkl', NULL, '2022-11-07 06:20:04', '2022-11-07 06:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` varchar(191) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `bill_date` datetime NOT NULL,
  `amount` decimal(16,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_admission_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `bill_id`, `patient_id`, `bill_date`, `amount`, `created_at`, `updated_at`, `patient_admission_id`) VALUES
(1, '4OQF4P', 4, '2022-04-28 11:34:00', '1958910.00', '2022-04-28 00:35:00', '2022-04-28 00:35:00', 'GEYH6VHI'),
(2, 'OMASAW', 8, '2022-04-28 16:52:00', '81075.00', '2022-04-28 05:52:47', '2022-04-28 05:52:47', 'EFJRGE5S'),
(3, '0EEOHU', 8, '2022-04-30 11:49:00', '690.00', '2022-04-30 00:50:30', '2022-04-30 00:50:30', '5NXEBCEX');

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE `bill_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(191) NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`id`, `item_name`, `bill_id`, `qty`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'sdfg', 1, 345, 5678.00, '1958910.00', '2022-04-28 00:35:00', '2022-04-28 00:35:00'),
(2, 'sssss', 2, 235, 345.00, '81075.00', '2022-04-28 05:52:47', '2022-04-28 05:52:47'),
(3, 'sssss', 3, 2, 345.00, '690.00', '2022-04-30 00:50:30', '2022-04-30 00:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `birth_reports`
--

CREATE TABLE `birth_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birth_reports`
--

INSERT INTO `birth_reports` (`id`, `patient_id`, `case_id`, `doctor_id`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'PW3P1DO4', 3, '2022-04-22 12:00:00', 'cdv dfg sdf', '2022-04-27 01:02:25', '2022-04-27 01:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

CREATE TABLE `blood_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `blood_group` varchar(191) NOT NULL,
  `remained_bags` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_banks`
--

INSERT INTO `blood_banks` (`id`, `blood_group`, `remained_bags`, `created_at`, `updated_at`) VALUES
(1, 'A+', 20, '2022-04-25 03:50:44', '2022-04-25 03:52:34'),
(2, 'o+', 24, '2022-04-25 06:00:13', '2022-12-07 03:05:33'),
(5, 'o', 5, '2022-04-29 23:19:45', '2022-10-06 03:43:21'),
(10, 'B+', 3, '2022-12-07 03:04:41', '2022-12-07 03:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donations`
--

CREATE TABLE `blood_donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `blood_donor_id` int(10) UNSIGNED NOT NULL,
  `bags` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_donations`
--

INSERT INTO `blood_donations` (`id`, `blood_donor_id`, `bags`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-25 03:52:33', '2022-04-25 03:52:33'),
(2, 3, 1, '2022-04-26 04:46:50', '2022-04-26 04:46:50'),
(3, 4, 4, '2022-04-30 00:55:04', '2022-04-30 00:55:04'),
(4, 7, 1, '2022-12-07 03:05:33', '2022-12-07 03:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `blood_group` varchar(191) NOT NULL,
  `last_donate_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`id`, `name`, `age`, `gender`, `blood_group`, `last_donate_date`, `created_at`, `updated_at`) VALUES
(1, 'kishori', 23, 1, 'A+', '2022-04-25 09:22:33', '2022-04-25 03:52:01', '2022-04-25 03:52:34'),
(5, 'kavya', 23, 0, 'o', '2022-10-06 14:16:00', '2022-10-06 03:16:54', '2022-10-06 03:16:54'),
(7, 'ruhi', 23, 0, 'o+', '2022-12-07 08:35:33', '2022-10-06 03:42:10', '2022-12-07 03:05:33'),
(8, 'yash', 23, 0, 'B+', '2022-12-07 14:04:00', '2022-12-07 03:05:14', '2022-12-07 03:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `blood_issues`
--

CREATE TABLE `blood_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` datetime NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `donor_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blood_group` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_issues`
--

INSERT INTO `blood_issues` (`id`, `issue_date`, `doctor_id`, `donor_id`, `patient_id`, `amount`, `remarks`, `created_at`, `updated_at`, `blood_group`) VALUES
(1, '2022-04-26 12:00:00', 3, 1, 0, '3000', 'tyhgj hjukk jkkjgj', '2022-04-26 04:47:37', '2022-04-26 04:47:37', '1'),
(2, '2022-04-25 17:01:00', 3, 1, 3, '2000', 'hjvk jfc,d gjfk', '2022-04-26 06:01:49', '2022-04-26 06:01:49', '1'),
(3, '2022-04-29 11:58:00', 4, 4, 4, '5000', 'sdfg', '2022-04-30 00:58:35', '2022-04-30 00:58:35', NULL),
(5, '2022-09-27 15:42:00', 10, 4, 13, '10000', 'bausdhai', '2022-09-27 04:45:45', '2022-09-27 04:45:45', NULL),
(16, '2022-09-02 17:56:00', 10, 4, 15, '5000', 'wkieyfq wKZEFUN', '2022-09-27 06:58:11', '2022-09-27 06:58:11', NULL),
(17, '2022-09-21 18:10:00', 3, 1, 8, '10000', 'bvuyzdhis', '2022-09-27 07:11:28', '2022-09-27 07:11:28', NULL),
(18, '2022-09-21 18:10:00', 3, 1, 8, '10000', 'bvuyzdhis', '2022-09-27 07:13:38', '2022-09-27 07:13:38', NULL),
(19, '2022-09-21 18:10:00', 3, 1, 8, '10000', 'bvuyzdhis', '2022-09-27 07:16:57', '2022-09-27 07:16:57', NULL),
(20, '2022-09-21 18:10:00', 3, 1, 8, '10000', 'bvuyzdhis', '2022-09-27 07:18:11', '2022-09-27 07:18:11', NULL),
(21, '2022-09-26 12:00:00', 1, 4, 14, '9000', 'jhgfd', '2022-09-27 07:35:36', '2022-09-27 07:35:36', NULL),
(22, '2022-09-23 12:00:00', 3, 1, 8, '4000', 'sdcfvgbgb', '2022-09-27 07:40:11', '2022-09-27 07:40:11', NULL),
(45, '2022-09-28 15:00:00', 1, 1, 14, '678', 'kjhg', '2022-09-28 04:02:03', '2022-09-28 04:02:03', NULL),
(46, '2022-09-20 12:00:00', 1, 4, 14, '2000', 'mjnhbgvfc', '2022-09-28 04:11:22', '2022-09-28 04:11:22', NULL),
(47, '2022-09-28 15:19:00', 1, 1, 14, '98765', 'iuytresdcvgbhjk', '2022-09-28 04:19:53', '2022-09-28 04:19:53', NULL),
(48, '2022-09-28 15:19:00', 1, 1, 14, '98765', 'iuytresdcvgbhjk', '2022-09-28 04:20:38', '2022-09-28 04:20:38', NULL),
(49, '2022-09-28 15:23:00', 1, 4, 14, '5000', 'jhygfdsdfgh', '2022-09-28 04:23:48', '2022-09-28 04:23:48', NULL),
(50, '2022-09-28 15:26:00', 1, 1, 8, '2000', 'jnhbgvfcdxz', '2022-09-28 04:26:27', '2022-09-28 04:26:27', NULL),
(51, '2022-09-28 15:30:00', 1, 4, 14, '77778', 'nbhbjh', '2022-09-28 04:34:12', '2022-09-28 04:34:12', NULL),
(52, '2022-09-28 15:30:00', 1, 4, 14, '77778', 'nbhbjh', '2022-09-28 04:35:36', '2022-09-28 04:35:36', NULL),
(53, '2022-09-28 15:43:00', 1, 4, 15, '700', 'jbjh', '2022-09-28 04:44:25', '2022-09-28 04:44:25', NULL),
(54, '2022-09-28 15:43:00', 1, 4, 15, '700', 'jbjh', '2022-09-28 04:47:53', '2022-09-28 04:47:53', NULL),
(55, '2022-09-28 15:43:00', 1, 4, 15, '700', 'jbjh', '2022-09-28 04:53:18', '2022-09-28 04:53:18', NULL),
(56, '2022-09-28 15:43:00', 1, 4, 15, '700', 'jbjh', '2022-09-28 04:54:25', '2022-09-28 04:54:25', NULL),
(57, '2022-09-28 15:43:00', 1, 4, 15, '700', 'jbjh', '2022-09-28 05:04:28', '2022-09-28 05:04:28', NULL),
(58, '2022-09-13 10:03:00', 1, 4, 8, '20000', 'test', '2022-09-28 23:04:20', '2022-09-28 23:04:20', NULL),
(59, '2022-09-07 10:00:00', 3, 3, 8, '9000', 'mghcgjgyjuju', '2022-09-28 23:05:35', '2022-09-28 23:05:35', NULL),
(60, '2022-09-07 11:00:00', 8, 6, 8, '2000', 'test', '2022-09-29 00:35:57', '2022-09-29 00:35:57', NULL),
(61, '2022-09-12 11:00:00', 8, 3, 14, '2000', 'test', '2022-09-29 00:40:25', '2022-09-29 00:40:25', NULL),
(62, '2022-09-12 11:00:00', 8, 3, 14, '2000', 'test', '2022-09-29 00:41:01', '2022-09-29 00:41:01', NULL),
(63, '2022-09-21 11:00:00', 1, 6, 8, '2000', 'test', '2022-09-29 00:50:16', '2022-09-29 00:50:16', NULL),
(64, '2022-09-21 11:00:00', 1, 6, 8, '2000', 'test', '2022-09-29 00:53:17', '2022-09-29 00:53:17', '6'),
(65, '2022-09-21 11:00:00', 1, 6, 8, '2000', 'test', '2022-09-29 00:54:54', '2022-09-29 00:54:54', '6'),
(66, '2022-09-29 11:56:00', 3, 6, 8, '1111', 'www', '2022-09-29 00:59:19', '2022-09-29 00:59:19', '6'),
(67, '2022-09-29 11:56:00', 3, 6, 8, '1111', 'www', '2022-09-29 01:03:24', '2022-09-29 01:03:24', '6'),
(68, '2022-09-29 11:56:00', 3, 6, 8, '1111', 'www', '2022-09-29 01:08:46', '2022-09-29 01:08:46', '6'),
(69, '2022-09-29 11:56:00', 3, 6, 8, '1111', 'www', '2022-09-29 01:13:52', '2022-09-29 01:13:52', '6'),
(70, '2022-09-07 11:00:00', 3, 1, 8, '543', 'ffrr', '2022-09-29 01:14:53', '2022-09-29 01:14:53', '1'),
(71, '2022-09-13 12:15:00', 1, 1, 8, '2000', 'test', '2022-09-29 01:16:03', '2022-09-29 01:16:03', '1'),
(72, '2022-08-31 12:53:00', 1, 6, 14, '3456', 'zsgfdxehtr', '2022-09-29 01:53:44', '2022-09-29 01:53:44', '6'),
(73, '2022-09-07 12:54:00', 1, 6, 15, '6888', 's4tystg', '2022-09-29 01:54:27', '2022-09-29 01:54:27', '6'),
(74, '2022-09-28 17:07:00', 3, 6, 15, '2000', 'gdjtycrjuy', '2022-10-04 06:07:52', '2022-10-04 06:07:52', '6'),
(75, '2022-09-27 14:03:00', 3, 4, 29, '123', 'sdfgh', '2022-10-06 03:03:27', '2022-10-06 03:03:27', '4'),
(76, '2022-09-26 14:04:00', 3, 3, 29, '23', 'sdfgh', '2022-10-06 03:05:02', '2022-10-06 03:05:02', '3'),
(77, '2022-09-26 12:00:00', 3, 3, 24, '34', 'dfghjkl', '2022-10-06 03:05:53', '2022-10-06 03:05:53', '3'),
(78, '2022-09-26 14:06:00', 1, 4, 25, '678', 'fghjkl;', '2022-10-06 03:07:16', '2022-10-06 03:07:16', '4'),
(79, '2022-09-27 14:08:00', 3, 1, 29, '890', 'fghjkl;', '2022-10-06 03:08:39', '2022-10-06 03:08:39', '1'),
(80, '2022-09-27 14:09:00', 9, 4, 25, '89', 'ghjkl;\'', '2022-10-06 03:09:44', '2022-10-06 03:09:44', '4'),
(81, '2022-09-25 14:11:00', 3, 4, 29, '67', 'fghjkl;', '2022-10-06 03:11:47', '2022-10-06 03:11:47', '4'),
(82, '2022-09-28 14:13:00', 3, 3, 29, '56', 'ertyj,', '2022-10-06 03:13:52', '2022-10-06 03:13:52', '3'),
(83, '2022-09-28 14:15:00', 3, 3, 29, '4567', 'sdfghj', '2022-10-06 03:15:50', '2022-10-06 03:15:50', '3'),
(84, '2022-09-27 14:17:00', 3, 5, 24, '34', 'sdfg', '2022-10-06 03:17:34', '2022-10-06 03:17:34', '5'),
(85, '2022-09-25 14:37:00', 3, 6, 25, '2345', 'zxdfgh', '2022-10-06 03:39:27', '2022-10-06 03:39:27', '6'),
(86, '2022-09-26 14:42:00', 3, 7, 29, '2345', 'sxdfgh', '2022-10-06 03:42:46', '2022-10-06 03:42:46', '7'),
(87, '2022-09-26 14:43:00', 3, 5, 29, '4567', 'hiiiiii', '2022-10-06 03:44:19', '2022-10-06 03:44:19', '5'),
(88, '2022-12-07 14:05:00', 12, 8, 33, '20000', 'sdd', '2022-12-07 03:06:22', '2022-12-07 03:06:22', '8');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'z company', 'z@gmail.com', '+919435678798', '2022-04-27 00:26:43', '2022-04-27 00:26:43'),
(2, 'com company', 'com@gmail.com', '+919345678798', '2022-04-27 00:28:33', '2022-04-27 00:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `call_logs`
--

CREATE TABLE `call_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `call_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `call_logs`
--

INSERT INTO `call_logs` (`id`, `name`, `phone`, `date`, `follow_up_date`, `note`, `call_type`, `created_at`, `updated_at`) VALUES
(1, 'gunja', '+919422345676', '2022-04-27', '2022-04-28', 'dedfgs fghjh jgh', 1, '2022-04-25 22:57:39', '2022-04-25 22:57:39'),
(2, 'prasad', '+919423345678', '2022-04-27', '2022-04-28', 'dfgh sdf', 1, '2022-04-26 23:16:19', '2022-04-26 23:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `case_handlers`
--

CREATE TABLE `case_handlers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_handlers`
--

INSERT INTO `case_handlers` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 73, '2022-09-26 03:48:35', '2022-09-26 03:48:35'),
(4, 94, '2022-12-05 01:42:33', '2022-12-05 01:42:33'),
(5, 95, '2022-12-05 02:12:11', '2022-12-05 02:12:11'),
(6, 96, '2022-12-05 04:43:45', '2022-12-05 04:43:45'),
(7, 97, '2022-12-05 23:34:29', '2022-12-05 23:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE `categ` (
  `cat_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categ`
--

INSERT INTO `categ` (`cat_id`, `id`, `cat_name`, `updated_at`, `created_at`) VALUES
(1, 2, 'FRAMES', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(2, 1, 'SUNGLASS', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(3, 3, 'Contact Lenses', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(4, 3, 'CL SOLUTION ', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(5, 15, 'MISCELLANEOUS', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(6, 15, 'READING PENTO', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(7, 15, 'SPECTACLE LENSES', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(8, 15, 'HARD CASE', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(9, 3, 'SELVET', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(10, 2, 'SPECTALES', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(11, 13, 'RX SUNGLASS', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(12, 5, 'OPD/Consultation', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(13, 5, 'Diagnostic', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(14, 1, 'Pharmacy', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(15, 5, 'Surgery', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(16, 1, 'OT Consumables', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(17, 12, 'OPD Procedure', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(18, 2, 'Lab Test', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(19, 0, 'Pharmacy/OT', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(20, 0, 'FRAMES', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(21, 0, 'IOL', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(22, 0, 'SUNGLASS', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(23, 0, 'SPECTACLE LENSES', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(24, 0, 'CL SOLUTION', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(25, 0, 'RX SUNGLASS', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(26, 0, 'SPECTALES', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(27, 0, 'SELVET', '2022-10-27 06:20:18', '2022-10-27 06:20:18'),
(28, 0, 'Cleaning Solutions', '2022-10-27 06:20:18', '2022-10-27 06:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'dolo250', 1, '2022-04-27 00:25:41', '2022-04-27 00:25:41'),
(2, 'paracitemol', 1, '2022-04-27 00:25:50', '2022-04-27 00:25:50'),
(3, 'headache', 1, '2022-04-27 00:26:00', '2022-04-27 00:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `charge_type` int(11) NOT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `standard_charge` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `charge_type`, `charge_category_id`, `code`, `standard_charge`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '45678', '4354656', 'fghjk', '2022-04-28 00:31:43', '2022-04-28 00:31:43'),
(2, 5, 1, '9809', '345678', 'ghjkl', '2022-04-28 00:39:09', '2022-04-28 00:39:09'),
(3, 2, 3, '6787', '345678', 'fghjkl', '2022-04-28 00:41:06', '2022-04-28 00:41:06'),
(4, 4, 4, '4567', '345678', 'fghjkl;', '2022-04-28 00:41:51', '2022-04-28 00:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `charge_categories`
--

CREATE TABLE `charge_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `charge_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charge_categories`
--

INSERT INTO `charge_categories` (`id`, `name`, `description`, `charge_type`, `created_at`, `updated_at`) VALUES
(1, 'sonography', 'thgj hjh ghfj gjgkk jgkfh gjghfj hkkgjhk hjhjgjjgj djjj jjgjjj sjdj', 5, '2022-04-25 23:06:41', '2022-04-25 23:06:41'),
(2, 'ICU', 'dfg df g df', 1, '2022-04-26 23:43:59', '2022-04-26 23:43:59'),
(3, 'xray', 'hjkkfhghk', 2, '2022-04-28 00:40:45', '2022-04-28 00:40:45'),
(4, 'cytyscan', 'ghjkl', 4, '2022-04-28 00:41:32', '2022-04-28 00:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `status`) VALUES
(1, 'Bombuflat', 1, 1),
(2, 'Garacharma', 1, 1),
(3, 'Port Blair', 1, 1),
(4, 'Rangat', 1, 1),
(5, 'Addanki', 2, 1),
(6, 'Adivivaram', 2, 1),
(7, 'Adoni', 2, 1),
(8, 'Aganampudi', 2, 1),
(9, 'Ajjaram', 2, 1),
(10, 'Akividu', 2, 1),
(11, 'Akkarampalle', 2, 1),
(12, 'Akkayapalle', 2, 1),
(13, 'Akkireddipalem', 2, 1),
(14, 'Alampur', 2, 1),
(15, 'Amalapuram', 2, 1),
(16, 'Amudalavalasa', 2, 1),
(17, 'Amur', 2, 1),
(18, 'Anakapalle', 2, 1),
(19, 'Anantapur', 2, 1),
(20, 'Andole', 2, 1),
(21, 'Atmakur', 2, 1),
(22, 'Attili', 2, 1),
(23, 'Avanigadda', 2, 1),
(24, 'Badepalli', 2, 1),
(25, 'Badvel', 2, 1),
(26, 'Balapur', 2, 1),
(27, 'Bandarulanka', 2, 1),
(28, 'Banganapalle', 2, 1),
(29, 'Bapatla', 2, 1),
(30, 'Bapulapadu', 2, 1),
(31, 'Belampalli', 2, 1),
(32, 'Bestavaripeta', 2, 1),
(33, 'Betamcherla', 2, 1),
(34, 'Bhattiprolu', 2, 1),
(35, 'Bhimavaram', 2, 1),
(36, 'Bhimunipatnam', 2, 1),
(37, 'Bobbili', 2, 1),
(38, 'Bombuflat', 2, 1),
(39, 'Bommuru', 2, 1),
(40, 'Bugganipalle', 2, 1),
(41, 'Challapalle', 2, 1),
(42, 'Chandur', 2, 1),
(43, 'Chatakonda', 2, 1),
(44, 'Chemmumiahpet', 2, 1),
(45, 'Chidiga', 2, 1),
(46, 'Chilakaluripet', 2, 1),
(47, 'Chimakurthy', 2, 1),
(48, 'Chinagadila', 2, 1),
(49, 'Chinagantyada', 2, 1),
(50, 'Chinnachawk', 2, 1),
(51, 'Chintalavalasa', 2, 1),
(52, 'Chipurupalle', 2, 1),
(53, 'Chirala', 2, 1),
(54, 'Chittoor', 2, 1),
(55, 'Chodavaram', 2, 1),
(56, 'Choutuppal', 2, 1),
(57, 'Chunchupalle', 2, 1),
(58, 'Cuddapah', 2, 1),
(59, 'Cumbum', 2, 1),
(60, 'Darnakal', 2, 1),
(61, 'Dasnapur', 2, 1),
(62, 'Dauleshwaram', 2, 1),
(63, 'Dharmavaram', 2, 1),
(64, 'Dhone', 2, 1),
(65, 'Dommara Nandyal', 2, 1),
(66, 'Dowlaiswaram', 2, 1),
(67, 'East Godavari Dist.', 2, 1),
(68, 'Eddumailaram', 2, 1),
(69, 'Edulapuram', 2, 1),
(70, 'Ekambara kuppam', 2, 1),
(71, 'Eluru', 2, 1),
(72, 'Enikapadu', 2, 1),
(73, 'Fakirtakya', 2, 1),
(74, 'Farrukhnagar', 2, 1),
(75, 'Gaddiannaram', 2, 1),
(76, 'Gajapathinagaram', 2, 1),
(77, 'Gajularega', 2, 1),
(78, 'Gajuvaka', 2, 1),
(79, 'Gannavaram', 2, 1),
(80, 'Garacharma', 2, 1),
(81, 'Garimellapadu', 2, 1),
(82, 'Giddalur', 2, 1),
(83, 'Godavarikhani', 2, 1),
(84, 'Gopalapatnam', 2, 1),
(85, 'Gopalur', 2, 1),
(86, 'Gorrekunta', 2, 1),
(87, 'Gudivada', 2, 1),
(88, 'Gudur', 2, 1),
(89, 'Guntakal', 2, 1),
(90, 'Guntur', 2, 1),
(91, 'Guti', 2, 1),
(92, 'Hindupur', 2, 1),
(93, 'Hukumpeta', 2, 1),
(94, 'Ichchapuram', 2, 1),
(95, 'Isnapur', 2, 1),
(96, 'Jaggayyapeta', 2, 1),
(97, 'Jallaram Kamanpur', 2, 1),
(98, 'Jammalamadugu', 2, 1),
(99, 'Jangampalli', 2, 1),
(100, 'Jarjapupeta', 2, 1),
(101, 'Kadiri', 2, 1),
(102, 'Kaikalur', 2, 1),
(103, 'Kakinada', 2, 1),
(104, 'Kallur', 2, 1),
(105, 'Kalyandurg', 2, 1),
(106, 'Kamalapuram', 2, 1),
(107, 'Kamareddi', 2, 1),
(108, 'Kanapaka', 2, 1),
(109, 'Kanigiri', 2, 1),
(110, 'Kanithi', 2, 1),
(111, 'Kankipadu', 2, 1),
(112, 'Kantabamsuguda', 2, 1),
(113, 'Kanuru', 2, 1),
(114, 'Karnul', 2, 1),
(115, 'Katheru', 2, 1),
(116, 'Kavali', 2, 1),
(117, 'Kazipet', 2, 1),
(118, 'Khanapuram Haveli', 2, 1),
(119, 'Kodar', 2, 1),
(120, 'Kollapur', 2, 1),
(121, 'Kondapalem', 2, 1),
(122, 'Kondapalle', 2, 1),
(123, 'Kondukur', 2, 1),
(124, 'Kosgi', 2, 1),
(125, 'Kothavalasa', 2, 1),
(126, 'Kottapalli', 2, 1),
(127, 'Kovur', 2, 1),
(128, 'Kovurpalle', 2, 1),
(129, 'Kovvur', 2, 1),
(130, 'Krishna', 2, 1),
(131, 'Kuppam', 2, 1),
(132, 'Kurmannapalem', 2, 1),
(133, 'Kurnool', 2, 1),
(134, 'Lakshettipet', 2, 1),
(135, 'Lalbahadur Nagar', 2, 1),
(136, 'Machavaram', 2, 1),
(137, 'Macherla', 2, 1),
(138, 'Machilipatnam', 2, 1),
(139, 'Madanapalle', 2, 1),
(140, 'Madaram', 2, 1),
(141, 'Madhuravada', 2, 1),
(142, 'Madikonda', 2, 1),
(143, 'Madugule', 2, 1),
(144, 'Mahabubnagar', 2, 1),
(145, 'Mahbubabad', 2, 1),
(146, 'Malkajgiri', 2, 1),
(147, 'Mamilapalle', 2, 1),
(148, 'Mancheral', 2, 1),
(149, 'Mandapeta', 2, 1),
(150, 'Mandasa', 2, 1),
(151, 'Mangalagiri', 2, 1),
(152, 'Manthani', 2, 1),
(153, 'Markapur', 2, 1),
(154, 'Marturu', 2, 1),
(155, 'Metpalli', 2, 1),
(156, 'Mindi', 2, 1),
(157, 'Mirpet', 2, 1),
(158, 'Moragudi', 2, 1),
(159, 'Mothugudam', 2, 1),
(160, 'Nagari', 2, 1),
(161, 'Nagireddipalle', 2, 1),
(162, 'Nandigama', 2, 1),
(163, 'Nandikotkur', 2, 1),
(164, 'Nandyal', 2, 1),
(165, 'Narasannapeta', 2, 1),
(166, 'Narasapur', 2, 1),
(167, 'Narasaraopet', 2, 1),
(168, 'Narayanavanam', 2, 1),
(169, 'Narsapur', 2, 1),
(170, 'Narsingi', 2, 1),
(171, 'Narsipatnam', 2, 1),
(172, 'Naspur', 2, 1),
(173, 'Nathayyapalem', 2, 1),
(174, 'Nayudupeta', 2, 1),
(175, 'Nelimaria', 2, 1),
(176, 'Nellore', 2, 1),
(177, 'Nidadavole', 2, 1),
(178, 'Nuzvid', 2, 1),
(179, 'Omerkhan daira', 2, 1),
(180, 'Ongole', 2, 1),
(181, 'Osmania University', 2, 1),
(182, 'Pakala', 2, 1),
(183, 'Palakole', 2, 1),
(184, 'Palakurthi', 2, 1),
(185, 'Palasa', 2, 1),
(186, 'Palempalle', 2, 1),
(187, 'Palkonda', 2, 1),
(188, 'Palmaner', 2, 1),
(189, 'Pamur', 2, 1),
(190, 'Panjim', 2, 1),
(191, 'Papampeta', 2, 1),
(192, 'Parasamba', 2, 1),
(193, 'Parvatipuram', 2, 1),
(194, 'Patancheru', 2, 1),
(195, 'Payakaraopet', 2, 1),
(196, 'Pedagantyada', 2, 1),
(197, 'Pedana', 2, 1),
(198, 'Peddapuram', 2, 1),
(199, 'Pendurthi', 2, 1),
(200, 'Penugonda', 2, 1),
(201, 'Penukonda', 2, 1),
(202, 'Phirangipuram', 2, 1),
(203, 'Pithapuram', 2, 1),
(204, 'Ponnur', 2, 1),
(205, 'Port Blair', 2, 1),
(206, 'Pothinamallayyapalem', 2, 1),
(207, 'Prakasam', 2, 1),
(208, 'Prasadampadu', 2, 1),
(209, 'Prasantinilayam', 2, 1),
(210, 'Proddatur', 2, 1),
(211, 'Pulivendla', 2, 1),
(212, 'Punganuru', 2, 1),
(213, 'Puttur', 2, 1),
(214, 'Qutubullapur', 2, 1),
(215, 'Rajahmundry', 2, 1),
(216, 'Rajamahendri', 2, 1),
(217, 'Rajampet', 2, 1),
(218, 'Rajendranagar', 2, 1),
(219, 'Rajoli', 2, 1),
(220, 'Ramachandrapuram', 2, 1),
(221, 'Ramanayyapeta', 2, 1),
(222, 'Ramapuram', 2, 1),
(223, 'Ramarajupalli', 2, 1),
(224, 'Ramavarappadu', 2, 1),
(225, 'Rameswaram', 2, 1),
(226, 'Rampachodavaram', 2, 1),
(227, 'Ravulapalam', 2, 1),
(228, 'Rayachoti', 2, 1),
(229, 'Rayadrug', 2, 1),
(230, 'Razam', 2, 1),
(231, 'Razole', 2, 1),
(232, 'Renigunta', 2, 1),
(233, 'Repalle', 2, 1),
(234, 'Rishikonda', 2, 1),
(235, 'Salur', 2, 1),
(236, 'Samalkot', 2, 1),
(237, 'Sattenapalle', 2, 1),
(238, 'Seetharampuram', 2, 1),
(239, 'Serilungampalle', 2, 1),
(240, 'Shankarampet', 2, 1),
(241, 'Shar', 2, 1),
(242, 'Singarayakonda', 2, 1),
(243, 'Sirpur', 2, 1),
(244, 'Sirsilla', 2, 1),
(245, 'Sompeta', 2, 1),
(246, 'Sriharikota', 2, 1),
(247, 'Srikakulam', 2, 1),
(248, 'Srikalahasti', 2, 1),
(249, 'Sriramnagar', 2, 1),
(250, 'Sriramsagar', 2, 1),
(251, 'Srisailam', 2, 1),
(252, 'Srisailamgudem Devasthanam', 2, 1),
(253, 'Sulurpeta', 2, 1),
(254, 'Suriapet', 2, 1),
(255, 'Suryaraopet', 2, 1),
(256, 'Tadepalle', 2, 1),
(257, 'Tadepalligudem', 2, 1),
(258, 'Tadpatri', 2, 1),
(259, 'Tallapalle', 2, 1),
(260, 'Tanuku', 2, 1),
(261, 'Tekkali', 2, 1),
(262, 'Tenali', 2, 1),
(263, 'Tigalapahad', 2, 1),
(264, 'Tiruchanur', 2, 1),
(265, 'Tirumala', 2, 1),
(266, 'Tirupati', 2, 1),
(267, 'Tirvuru', 2, 1),
(268, 'Trimulgherry', 2, 1),
(269, 'Tuni', 2, 1),
(270, 'Turangi', 2, 1),
(271, 'Ukkayapalli', 2, 1),
(272, 'Ukkunagaram', 2, 1),
(273, 'Uppal Kalan', 2, 1),
(274, 'Upper Sileru', 2, 1),
(275, 'Uravakonda', 2, 1),
(276, 'Vadlapudi', 2, 1),
(277, 'Vaparala', 2, 1),
(278, 'Vemalwada', 2, 1),
(279, 'Venkatagiri', 2, 1),
(280, 'Venkatapuram', 2, 1),
(281, 'Vepagunta', 2, 1),
(282, 'Vetapalem', 2, 1),
(283, 'Vijayapuri', 2, 1),
(284, 'Vijayapuri South', 2, 1),
(285, 'Vijayawada', 2, 1),
(286, 'Vinukonda', 2, 1),
(287, 'Visakhapatnam', 2, 1),
(288, 'Vizianagaram', 2, 1),
(289, 'Vuyyuru', 2, 1),
(290, 'Wanparti', 2, 1),
(291, 'West Godavari Dist.', 2, 1),
(292, 'Yadagirigutta', 2, 1),
(293, 'Yarada', 2, 1),
(294, 'Yellamanchili', 2, 1),
(295, 'Yemmiganur', 2, 1),
(296, 'Yenamalakudru', 2, 1),
(297, 'Yendada', 2, 1),
(298, 'Yerraguntla', 2, 1),
(299, 'Along', 3, 1),
(300, 'Basar', 3, 1),
(301, 'Bondila', 3, 1),
(302, 'Changlang', 3, 1),
(303, 'Daporijo', 3, 1),
(304, 'Deomali', 3, 1),
(305, 'Itanagar', 3, 1),
(306, 'Jairampur', 3, 1),
(307, 'Khonsa', 3, 1),
(308, 'Naharlagun', 3, 1),
(309, 'Namsai', 3, 1),
(310, 'Pasighat', 3, 1),
(311, 'Roing', 3, 1),
(312, 'Seppa', 3, 1),
(313, 'Tawang', 3, 1),
(314, 'Tezu', 3, 1),
(315, 'Ziro', 3, 1),
(316, 'Abhayapuri', 4, 1),
(317, 'Ambikapur', 4, 1),
(318, 'Amguri', 4, 1),
(319, 'Anand Nagar', 4, 1),
(320, 'Badarpur', 4, 1),
(321, 'Badarpur Railway Town', 4, 1),
(322, 'Bahbari Gaon', 4, 1),
(323, 'Bamun Sualkuchi', 4, 1),
(324, 'Barbari', 4, 1),
(325, 'Barpathar', 4, 1),
(326, 'Barpeta', 4, 1),
(327, 'Barpeta Road', 4, 1),
(328, 'Basugaon', 4, 1),
(329, 'Bihpuria', 4, 1),
(330, 'Bijni', 4, 1),
(331, 'Bilasipara', 4, 1),
(332, 'Biswanath Chariali', 4, 1),
(333, 'Bohori', 4, 1),
(334, 'Bokajan', 4, 1),
(335, 'Bokokhat', 4, 1),
(336, 'Bongaigaon', 4, 1),
(337, 'Bongaigaon Petro-chemical Town', 4, 1),
(338, 'Borgolai', 4, 1),
(339, 'Chabua', 4, 1),
(340, 'Chandrapur Bagicha', 4, 1),
(341, 'Chapar', 4, 1),
(342, 'Chekonidhara', 4, 1),
(343, 'Choto Haibor', 4, 1),
(344, 'Dergaon', 4, 1),
(345, 'Dharapur', 4, 1),
(346, 'Dhekiajuli', 4, 1),
(347, 'Dhemaji', 4, 1),
(348, 'Dhing', 4, 1),
(349, 'Dhubri', 4, 1),
(350, 'Dhuburi', 4, 1),
(351, 'Dibrugarh', 4, 1),
(352, 'Digboi', 4, 1),
(353, 'Digboi Oil Town', 4, 1),
(354, 'Dimaruguri', 4, 1),
(355, 'Diphu', 4, 1),
(356, 'Dispur', 4, 1),
(357, 'Doboka', 4, 1),
(358, 'Dokmoka', 4, 1),
(359, 'Donkamokan', 4, 1),
(360, 'Duliagaon', 4, 1),
(361, 'Duliajan', 4, 1),
(362, 'Duliajan No.1', 4, 1),
(363, 'Dum Duma', 4, 1),
(364, 'Durga Nagar', 4, 1),
(365, 'Gauripur', 4, 1),
(366, 'Goalpara', 4, 1),
(367, 'Gohpur', 4, 1),
(368, 'Golaghat', 4, 1),
(369, 'Golakganj', 4, 1),
(370, 'Gossaigaon', 4, 1),
(371, 'Guwahati', 4, 1),
(372, 'Haflong', 4, 1),
(373, 'Hailakandi', 4, 1),
(374, 'Hamren', 4, 1),
(375, 'Hauli', 4, 1),
(376, 'Hauraghat', 4, 1),
(377, 'Hojai', 4, 1),
(378, 'Jagiroad', 4, 1),
(379, 'Jagiroad Paper Mill', 4, 1),
(380, 'Jogighopa', 4, 1),
(381, 'Jonai Bazar', 4, 1),
(382, 'Jorhat', 4, 1),
(383, 'Kampur Town', 4, 1),
(384, 'Kamrup', 4, 1),
(385, 'Kanakpur', 4, 1),
(386, 'Karimganj', 4, 1),
(387, 'Kharijapikon', 4, 1),
(388, 'Kharupetia', 4, 1),
(389, 'Kochpara', 4, 1),
(390, 'Kokrajhar', 4, 1),
(391, 'Kumar Kaibarta Gaon', 4, 1),
(392, 'Lakhimpur', 4, 1),
(393, 'Lakhipur', 4, 1),
(394, 'Lala', 4, 1),
(395, 'Lanka', 4, 1),
(396, 'Lido Tikok', 4, 1),
(397, 'Lido Town', 4, 1),
(398, 'Lumding', 4, 1),
(399, 'Lumding Railway Colony', 4, 1),
(400, 'Mahur', 4, 1),
(401, 'Maibong', 4, 1),
(402, 'Majgaon', 4, 1),
(403, 'Makum', 4, 1),
(404, 'Mangaldai', 4, 1),
(405, 'Mankachar', 4, 1),
(406, 'Margherita', 4, 1),
(407, 'Mariani', 4, 1),
(408, 'Marigaon', 4, 1),
(409, 'Moran', 4, 1),
(410, 'Moranhat', 4, 1),
(411, 'Nagaon', 4, 1),
(412, 'Naharkatia', 4, 1),
(413, 'Nalbari', 4, 1),
(414, 'Namrup', 4, 1),
(415, 'Naubaisa Gaon', 4, 1),
(416, 'Nazira', 4, 1),
(417, 'New Bongaigaon Railway Colony', 4, 1),
(418, 'Niz-Hajo', 4, 1),
(419, 'North Guwahati', 4, 1),
(420, 'Numaligarh', 4, 1),
(421, 'Palasbari', 4, 1),
(422, 'Panchgram', 4, 1),
(423, 'Pathsala', 4, 1),
(424, 'Raha', 4, 1),
(425, 'Rangapara', 4, 1),
(426, 'Rangia', 4, 1),
(427, 'Salakati', 4, 1),
(428, 'Sapatgram', 4, 1),
(429, 'Sarthebari', 4, 1),
(430, 'Sarupathar', 4, 1),
(431, 'Sarupathar Bengali', 4, 1),
(432, 'Senchoagaon', 4, 1),
(433, 'Sibsagar', 4, 1),
(434, 'Silapathar', 4, 1),
(435, 'Silchar', 4, 1),
(436, 'Silchar Part-X', 4, 1),
(437, 'Sonari', 4, 1),
(438, 'Sorbhog', 4, 1),
(439, 'Sualkuchi', 4, 1),
(440, 'Tangla', 4, 1),
(441, 'Tezpur', 4, 1),
(442, 'Tihu', 4, 1),
(443, 'Tinsukia', 4, 1),
(444, 'Titabor', 4, 1),
(445, 'Udalguri', 4, 1),
(446, 'Umrangso', 4, 1),
(447, 'Uttar Krishnapur Part-I', 4, 1),
(448, 'Amarpur', 5, 1),
(449, 'Ara', 5, 1),
(450, 'Araria', 5, 1),
(451, 'Areraj', 5, 1),
(452, 'Asarganj', 5, 1),
(453, 'Aurangabad', 5, 1),
(454, 'Bagaha', 5, 1),
(455, 'Bahadurganj', 5, 1),
(456, 'Bairgania', 5, 1),
(457, 'Bakhtiyarpur', 5, 1),
(458, 'Banka', 5, 1),
(459, 'Banmankhi', 5, 1),
(460, 'Bar Bigha', 5, 1),
(461, 'Barauli', 5, 1),
(462, 'Barauni Oil Township', 5, 1),
(463, 'Barh', 5, 1),
(464, 'Barhiya', 5, 1),
(465, 'Bariapur', 5, 1),
(466, 'Baruni', 5, 1),
(467, 'Begusarai', 5, 1),
(468, 'Behea', 5, 1),
(469, 'Belsand', 5, 1),
(470, 'Bettiah', 5, 1),
(471, 'Bhabua', 5, 1),
(472, 'Bhagalpur', 5, 1),
(473, 'Bhimnagar', 5, 1),
(474, 'Bhojpur', 5, 1),
(475, 'Bihar', 5, 1),
(476, 'Bihar Sharif', 5, 1),
(477, 'Bihariganj', 5, 1),
(478, 'Bikramganj', 5, 1),
(479, 'Birpur', 5, 1),
(480, 'Bodh Gaya', 5, 1),
(481, 'Buxar', 5, 1),
(482, 'Chakia', 5, 1),
(483, 'Chanpatia', 5, 1),
(484, 'Chhapra', 5, 1),
(485, 'Chhatapur', 5, 1),
(486, 'Colgong', 5, 1),
(487, 'Dalsingh Sarai', 5, 1),
(488, 'Darbhanga', 5, 1),
(489, 'Daudnagar', 5, 1),
(490, 'Dehri', 5, 1),
(491, 'Dhaka', 5, 1),
(492, 'Dighwara', 5, 1),
(493, 'Dinapur', 5, 1),
(494, 'Dinapur Cantonment', 5, 1),
(495, 'Dumra', 5, 1),
(496, 'Dumraon', 5, 1),
(497, 'Fatwa', 5, 1),
(498, 'Forbesganj', 5, 1),
(499, 'Gaya', 5, 1),
(500, 'Gazipur', 5, 1),
(501, 'Ghoghardiha', 5, 1),
(502, 'Gogri Jamalpur', 5, 1),
(503, 'Gopalganj', 5, 1),
(504, 'Habibpur', 5, 1),
(505, 'Hajipur', 5, 1),
(506, 'Hasanpur', 5, 1),
(507, 'Hazaribagh', 5, 1),
(508, 'Hilsa', 5, 1),
(509, 'Hisua', 5, 1),
(510, 'Islampur', 5, 1),
(511, 'Jagdispur', 5, 1),
(512, 'Jahanabad', 5, 1),
(513, 'Jamalpur', 5, 1),
(514, 'Jamhaur', 5, 1),
(515, 'Jamui', 5, 1),
(516, 'Janakpur Road', 5, 1),
(517, 'Janpur', 5, 1),
(518, 'Jaynagar', 5, 1),
(519, 'Jha Jha', 5, 1),
(520, 'Jhanjharpur', 5, 1),
(521, 'Jogbani', 5, 1),
(522, 'Kanti', 5, 1),
(523, 'Kasba', 5, 1),
(524, 'Kataiya', 5, 1),
(525, 'Katihar', 5, 1),
(526, 'Khagaria', 5, 1),
(527, 'Khagaul', 5, 1),
(528, 'Kharagpur', 5, 1),
(529, 'Khusrupur', 5, 1),
(530, 'Kishanganj', 5, 1),
(531, 'Koath', 5, 1),
(532, 'Koilwar', 5, 1),
(533, 'Lakhisarai', 5, 1),
(534, 'Lalganj', 5, 1),
(535, 'Lauthaha', 5, 1),
(536, 'Madhepura', 5, 1),
(537, 'Madhubani', 5, 1),
(538, 'Maharajganj', 5, 1),
(539, 'Mahnar Bazar', 5, 1),
(540, 'Mairwa', 5, 1),
(541, 'Makhdumpur', 5, 1),
(542, 'Maner', 5, 1),
(543, 'Manihari', 5, 1),
(544, 'Marhaura', 5, 1),
(545, 'Masaurhi', 5, 1),
(546, 'Mirganj', 5, 1),
(547, 'Mohiuddinagar', 5, 1),
(548, 'Mokama', 5, 1),
(549, 'Motihari', 5, 1),
(550, 'Motipur', 5, 1),
(551, 'Munger', 5, 1),
(552, 'Murliganj', 5, 1),
(553, 'Muzaffarpur', 5, 1),
(554, 'Nabinagar', 5, 1),
(555, 'Narkatiaganj', 5, 1),
(556, 'Nasriganj', 5, 1),
(557, 'Natwar', 5, 1),
(558, 'Naugachhia', 5, 1),
(559, 'Nawada', 5, 1),
(560, 'Nirmali', 5, 1),
(561, 'Nokha', 5, 1),
(562, 'Paharpur', 5, 1),
(563, 'Patna', 5, 1),
(564, 'Phulwari', 5, 1),
(565, 'Piro', 5, 1),
(566, 'Purnia', 5, 1),
(567, 'Pusa', 5, 1),
(568, 'Rafiganj', 5, 1),
(569, 'Raghunathpur', 5, 1),
(570, 'Rajgir', 5, 1),
(571, 'Ramnagar', 5, 1),
(572, 'Raxaul', 5, 1),
(573, 'Revelganj', 5, 1),
(574, 'Rusera', 5, 1),
(575, 'Sagauli', 5, 1),
(576, 'Saharsa', 5, 1),
(577, 'Samastipur', 5, 1),
(578, 'Sasaram', 5, 1),
(579, 'Shahpur', 5, 1),
(580, 'Shaikhpura', 5, 1),
(581, 'Sherghati', 5, 1),
(582, 'Shivhar', 5, 1),
(583, 'Silao', 5, 1),
(584, 'Sitamarhi', 5, 1),
(585, 'Siwan', 5, 1),
(586, 'Sonepur', 5, 1),
(587, 'Sultanganj', 5, 1),
(588, 'Supaul', 5, 1),
(589, 'Teghra', 5, 1),
(590, 'Tekari', 5, 1),
(591, 'Thakurganj', 5, 1),
(592, 'Vaishali', 5, 1),
(593, 'Waris Aliganj', 5, 1),
(594, 'Chandigarh', 6, 1),
(595, 'Ahiwara', 7, 1),
(596, 'Akaltara', 7, 1),
(597, 'Ambagarh Chauki', 7, 1),
(598, 'Ambikapur', 7, 1),
(599, 'Arang', 7, 1),
(600, 'Bade Bacheli', 7, 1),
(601, 'Bagbahara', 7, 1),
(602, 'Baikunthpur', 7, 1),
(603, 'Balod', 7, 1),
(604, 'Baloda', 7, 1),
(605, 'Baloda Bazar', 7, 1),
(606, 'Banarsi', 7, 1),
(607, 'Basna', 7, 1),
(608, 'Bemetra', 7, 1),
(609, 'Bhanpuri', 7, 1),
(610, 'Bhatapara', 7, 1),
(611, 'Bhatgaon', 7, 1),
(612, 'Bhilai', 7, 1),
(613, 'Bilaspur', 7, 1),
(614, 'Bilha', 7, 1),
(615, 'Birgaon', 7, 1),
(616, 'Bodri', 7, 1),
(617, 'Champa', 7, 1),
(618, 'Charcha', 7, 1),
(619, 'Charoda', 7, 1),
(620, 'Chhuikhadan', 7, 1),
(621, 'Chirmiri', 7, 1),
(622, 'Dantewada', 7, 1),
(623, 'Deori', 7, 1),
(624, 'Dhamdha', 7, 1),
(625, 'Dhamtari', 7, 1),
(626, 'Dharamjaigarh', 7, 1),
(627, 'Dipka', 7, 1),
(628, 'Doman Hill Colliery', 7, 1),
(629, 'Dongargaon', 7, 1),
(630, 'Dongragarh', 7, 1),
(631, 'Durg', 7, 1),
(632, 'Frezarpur', 7, 1),
(633, 'Gandai', 7, 1),
(634, 'Gariaband', 7, 1),
(635, 'Gaurela', 7, 1),
(636, 'Gelhapani', 7, 1),
(637, 'Gharghoda', 7, 1),
(638, 'Gidam', 7, 1),
(639, 'Gobra Nawapara', 7, 1),
(640, 'Gogaon', 7, 1),
(641, 'Hatkachora', 7, 1),
(642, 'Jagdalpur', 7, 1),
(643, 'Jamui', 7, 1),
(644, 'Jashpurnagar', 7, 1),
(645, 'Jhagrakhand', 7, 1),
(646, 'Kanker', 7, 1),
(647, 'Katghora', 7, 1),
(648, 'Kawardha', 7, 1),
(649, 'Khairagarh', 7, 1),
(650, 'Khamhria', 7, 1),
(651, 'Kharod', 7, 1),
(652, 'Kharsia', 7, 1),
(653, 'Khonga Pani', 7, 1),
(654, 'Kirandu', 7, 1),
(655, 'Kirandul', 7, 1),
(656, 'Kohka', 7, 1),
(657, 'Kondagaon', 7, 1),
(658, 'Korba', 7, 1),
(659, 'Korea', 7, 1),
(660, 'Koria Block', 7, 1),
(661, 'Kota', 7, 1),
(662, 'Kumhari', 7, 1),
(663, 'Kumud Katta', 7, 1),
(664, 'Kurasia', 7, 1),
(665, 'Kurud', 7, 1),
(666, 'Lingiyadih', 7, 1),
(667, 'Lormi', 7, 1),
(668, 'Mahasamund', 7, 1),
(669, 'Mahendragarh', 7, 1),
(670, 'Mehmand', 7, 1),
(671, 'Mongra', 7, 1),
(672, 'Mowa', 7, 1),
(673, 'Mungeli', 7, 1),
(674, 'Nailajanjgir', 7, 1),
(675, 'Namna Kalan', 7, 1),
(676, 'Naya Baradwar', 7, 1),
(677, 'Pandariya', 7, 1),
(678, 'Patan', 7, 1),
(679, 'Pathalgaon', 7, 1),
(680, 'Pendra', 7, 1),
(681, 'Phunderdihari', 7, 1),
(682, 'Pithora', 7, 1),
(683, 'Raigarh', 7, 1),
(684, 'Raipur', 7, 1),
(685, 'Rajgamar', 7, 1),
(686, 'Rajhara', 7, 1),
(687, 'Rajnandgaon', 7, 1),
(688, 'Ramanuj Ganj', 7, 1),
(689, 'Ratanpur', 7, 1),
(690, 'Sakti', 7, 1),
(691, 'Saraipali', 7, 1),
(692, 'Sarajpur', 7, 1),
(693, 'Sarangarh', 7, 1),
(694, 'Shivrinarayan', 7, 1),
(695, 'Simga', 7, 1),
(696, 'Sirgiti', 7, 1),
(697, 'Takhatpur', 7, 1),
(698, 'Telgaon', 7, 1),
(699, 'Tildanewra', 7, 1),
(700, 'Urla', 7, 1),
(701, 'Vishrampur', 7, 1),
(702, 'Amli', 8, 1),
(703, 'Silvassa', 8, 1),
(704, 'Daman', 9, 1),
(705, 'Diu', 9, 1),
(706, 'Delhi', 10, 1),
(707, 'New Delhi', 10, 1),
(708, 'Aldona', 11, 1),
(709, 'Altinho', 11, 1),
(710, 'Aquem', 11, 1),
(711, 'Arpora', 11, 1),
(712, 'Bambolim', 11, 1),
(713, 'Bandora', 11, 1),
(714, 'Bardez', 11, 1),
(715, 'Benaulim', 11, 1),
(716, 'Betora', 11, 1),
(717, 'Bicholim', 11, 1),
(718, 'Calapor', 11, 1),
(719, 'Candolim', 11, 1),
(720, 'Caranzalem', 11, 1),
(721, 'Carapur', 11, 1),
(722, 'Chicalim', 11, 1),
(723, 'Chimbel', 11, 1),
(724, 'Chinchinim', 11, 1),
(725, 'Colvale', 11, 1),
(726, 'Corlim', 11, 1),
(727, 'Cortalim', 11, 1),
(728, 'Cuncolim', 11, 1),
(729, 'Curchorem', 11, 1),
(730, 'Curti', 11, 1),
(731, 'Davorlim', 11, 1),
(732, 'Dona Paula', 11, 1),
(733, 'Goa', 11, 1),
(734, 'Guirim', 11, 1),
(735, 'Jua', 11, 1),
(736, 'Kalangat', 11, 1),
(737, 'Kankon', 11, 1),
(738, 'Kundaim', 11, 1),
(739, 'Loutulim', 11, 1),
(740, 'Madgaon', 11, 1),
(741, 'Mapusa', 11, 1),
(742, 'Margao', 11, 1),
(743, 'Margaon', 11, 1),
(744, 'Miramar', 11, 1),
(745, 'Morjim', 11, 1),
(746, 'Mormugao', 11, 1),
(747, 'Navelim', 11, 1),
(748, 'Pale', 11, 1),
(749, 'Panaji', 11, 1),
(750, 'Parcem', 11, 1),
(751, 'Parra', 11, 1),
(752, 'Penha de Franca', 11, 1),
(753, 'Pernem', 11, 1),
(754, 'Pilerne', 11, 1),
(755, 'Pissurlem', 11, 1),
(756, 'Ponda', 11, 1),
(757, 'Porvorim', 11, 1),
(758, 'Quepem', 11, 1),
(759, 'Queula', 11, 1),
(760, 'Raia', 11, 1),
(761, 'Reis Magos', 11, 1),
(762, 'Salcette', 11, 1),
(763, 'Saligao', 11, 1),
(764, 'Sancoale', 11, 1),
(765, 'Sanguem', 11, 1),
(766, 'Sanquelim', 11, 1),
(767, 'Sanvordem', 11, 1),
(768, 'Sao Jose-de-Areal', 11, 1),
(769, 'Sattari', 11, 1),
(770, 'Serula', 11, 1),
(771, 'Sinquerim', 11, 1),
(772, 'Siolim', 11, 1),
(773, 'Taleigao', 11, 1),
(774, 'Tivim', 11, 1),
(775, 'Valpoi', 11, 1),
(776, 'Varca', 11, 1),
(777, 'Vasco', 11, 1),
(778, 'Verna', 11, 1),
(779, 'Abrama', 12, 1),
(780, 'Adalaj', 12, 1),
(781, 'Adityana', 12, 1),
(782, 'Advana', 12, 1),
(783, 'Ahmedabad', 12, 1),
(784, 'Ahwa', 12, 1),
(785, 'Alang', 12, 1),
(786, 'Ambaji', 12, 1),
(787, 'Ambaliyasan', 12, 1),
(788, 'Amod', 12, 1),
(789, 'Amreli', 12, 1),
(790, 'Amroli', 12, 1),
(791, 'Anand', 12, 1),
(792, 'Andada', 12, 1),
(793, 'Anjar', 12, 1),
(794, 'Anklav', 12, 1),
(795, 'Ankleshwar', 12, 1),
(796, 'Anklesvar INA', 12, 1),
(797, 'Antaliya', 12, 1),
(798, 'Arambhada', 12, 1),
(799, 'Asarma', 12, 1),
(800, 'Atul', 12, 1),
(801, 'Babra', 12, 1),
(802, 'Bag-e-Firdosh', 12, 1),
(803, 'Bagasara', 12, 1),
(804, 'Bahadarpar', 12, 1),
(805, 'Bajipura', 12, 1),
(806, 'Bajva', 12, 1),
(807, 'Balasinor', 12, 1),
(808, 'Banaskantha', 12, 1),
(809, 'Bansda', 12, 1),
(810, 'Bantva', 12, 1),
(811, 'Bardoli', 12, 1),
(812, 'Barwala', 12, 1),
(813, 'Bayad', 12, 1),
(814, 'Bechar', 12, 1),
(815, 'Bedi', 12, 1),
(816, 'Beyt', 12, 1),
(817, 'Bhachau', 12, 1),
(818, 'Bhanvad', 12, 1),
(819, 'Bharuch', 12, 1),
(820, 'Bharuch INA', 12, 1),
(821, 'Bhavnagar', 12, 1),
(822, 'Bhayavadar', 12, 1),
(823, 'Bhestan', 12, 1),
(824, 'Bhuj', 12, 1),
(825, 'Bilimora', 12, 1),
(826, 'Bilkha', 12, 1),
(827, 'Billimora', 12, 1),
(828, 'Bodakdev', 12, 1),
(829, 'Bodeli', 12, 1),
(830, 'Bopal', 12, 1),
(831, 'Boria', 12, 1),
(832, 'Boriavi', 12, 1),
(833, 'Borsad', 12, 1),
(834, 'Botad', 12, 1),
(835, 'Cambay', 12, 1),
(836, 'Chaklasi', 12, 1),
(837, 'Chala', 12, 1),
(838, 'Chalala', 12, 1),
(839, 'Chalthan', 12, 1),
(840, 'Chanasma', 12, 1),
(841, 'Chandisar', 12, 1),
(842, 'Chandkheda', 12, 1),
(843, 'Chanod', 12, 1),
(844, 'Chaya', 12, 1),
(845, 'Chenpur', 12, 1),
(846, 'Chhapi', 12, 1),
(847, 'Chhaprabhatha', 12, 1),
(848, 'Chhatral', 12, 1),
(849, 'Chhota Udepur', 12, 1),
(850, 'Chikhli', 12, 1),
(851, 'Chiloda', 12, 1),
(852, 'Chorvad', 12, 1),
(853, 'Chotila', 12, 1),
(854, 'Dabhoi', 12, 1),
(855, 'Dadara', 12, 1),
(856, 'Dahod', 12, 1),
(857, 'Dakor', 12, 1),
(858, 'Damnagar', 12, 1),
(859, 'Deesa', 12, 1),
(860, 'Delvada', 12, 1),
(861, 'Devgadh Baria', 12, 1),
(862, 'Devsar', 12, 1),
(863, 'Dhandhuka', 12, 1),
(864, 'Dhanera', 12, 1),
(865, 'Dhangdhra', 12, 1),
(866, 'Dhansura', 12, 1),
(867, 'Dharampur', 12, 1),
(868, 'Dhari', 12, 1),
(869, 'Dhola', 12, 1),
(870, 'Dholka', 12, 1),
(871, 'Dholka Rural', 12, 1),
(872, 'Dhoraji', 12, 1),
(873, 'Dhrangadhra', 12, 1),
(874, 'Dhrol', 12, 1),
(875, 'Dhuva', 12, 1),
(876, 'Dhuwaran', 12, 1),
(877, 'Digvijaygram', 12, 1),
(878, 'Disa', 12, 1),
(879, 'Dungar', 12, 1),
(880, 'Dungarpur', 12, 1),
(881, 'Dungra', 12, 1),
(882, 'Dwarka', 12, 1),
(883, 'Flelanganj', 12, 1),
(884, 'GSFC Complex', 12, 1),
(885, 'Gadhda', 12, 1),
(886, 'Gandevi', 12, 1),
(887, 'Gandhidham', 12, 1),
(888, 'Gandhinagar', 12, 1),
(889, 'Gariadhar', 12, 1),
(890, 'Ghogha', 12, 1),
(891, 'Godhra', 12, 1),
(892, 'Gondal', 12, 1),
(893, 'Hajira INA', 12, 1),
(894, 'Halol', 12, 1),
(895, 'Halvad', 12, 1),
(896, 'Hansot', 12, 1),
(897, 'Harij', 12, 1),
(898, 'Himatnagar', 12, 1),
(899, 'Ichchhapor', 12, 1),
(900, 'Idar', 12, 1),
(901, 'Jafrabad', 12, 1),
(902, 'Jalalpore', 12, 1),
(903, 'Jambusar', 12, 1),
(904, 'Jamjodhpur', 12, 1),
(905, 'Jamnagar', 12, 1),
(906, 'Jasdan', 12, 1),
(907, 'Jawaharnagar', 12, 1),
(908, 'Jetalsar', 12, 1),
(909, 'Jetpur', 12, 1),
(910, 'Jodiya', 12, 1),
(911, 'Joshipura', 12, 1),
(912, 'Junagadh', 12, 1),
(913, 'Kadi', 12, 1),
(914, 'Kadodara', 12, 1),
(915, 'Kalavad', 12, 1),
(916, 'Kali', 12, 1),
(917, 'Kaliawadi', 12, 1),
(918, 'Kalol', 12, 1),
(919, 'Kalol INA', 12, 1),
(920, 'Kandla', 12, 1),
(921, 'Kanjari', 12, 1),
(922, 'Kanodar', 12, 1),
(923, 'Kapadwanj', 12, 1),
(924, 'Karachiya', 12, 1),
(925, 'Karamsad', 12, 1),
(926, 'Karjan', 12, 1),
(927, 'Kathial', 12, 1),
(928, 'Kathor', 12, 1),
(929, 'Katpar', 12, 1),
(930, 'Kavant', 12, 1),
(931, 'Keshod', 12, 1),
(932, 'Kevadiya', 12, 1),
(933, 'Khambhaliya', 12, 1),
(934, 'Khambhat', 12, 1),
(935, 'Kharaghoda', 12, 1),
(936, 'Khed Brahma', 12, 1),
(937, 'Kheda', 12, 1),
(938, 'Kheralu', 12, 1),
(939, 'Kodinar', 12, 1),
(940, 'Kosamba', 12, 1),
(941, 'Kundla', 12, 1),
(942, 'Kutch', 12, 1),
(943, 'Kutiyana', 12, 1),
(944, 'Lakhtar', 12, 1),
(945, 'Lalpur', 12, 1),
(946, 'Lambha', 12, 1),
(947, 'Lathi', 12, 1),
(948, 'Limbdi', 12, 1),
(949, 'Limla', 12, 1),
(950, 'Lunavada', 12, 1),
(951, 'Madhapar', 12, 1),
(952, 'Maflipur', 12, 1),
(953, 'Mahemdavad', 12, 1),
(954, 'Mahudha', 12, 1),
(955, 'Mahuva', 12, 1),
(956, 'Mahuvar', 12, 1),
(957, 'Makarba', 12, 1),
(958, 'Makarpura', 12, 1),
(959, 'Makassar', 12, 1),
(960, 'Maktampur', 12, 1),
(961, 'Malia', 12, 1),
(962, 'Malpur', 12, 1),
(963, 'Manavadar', 12, 1),
(964, 'Mandal', 12, 1),
(965, 'Mandvi', 12, 1),
(966, 'Mangrol', 12, 1),
(967, 'Mansa', 12, 1),
(968, 'Meghraj', 12, 1),
(969, 'Mehsana', 12, 1),
(970, 'Mendarla', 12, 1),
(971, 'Mithapur', 12, 1),
(972, 'Modasa', 12, 1),
(973, 'Mogravadi', 12, 1),
(974, 'Morbi', 12, 1),
(975, 'Morvi', 12, 1),
(976, 'Mundra', 12, 1),
(977, 'Nadiad', 12, 1),
(978, 'Naliya', 12, 1),
(979, 'Nanakvada', 12, 1),
(980, 'Nandej', 12, 1),
(981, 'Nandesari', 12, 1),
(982, 'Nandesari INA', 12, 1),
(983, 'Naroda', 12, 1),
(984, 'Navagadh', 12, 1),
(985, 'Navagam Ghed', 12, 1),
(986, 'Navsari', 12, 1),
(987, 'Ode', 12, 1),
(988, 'Okaf', 12, 1),
(989, 'Okha', 12, 1),
(990, 'Olpad', 12, 1),
(991, 'Paddhari', 12, 1),
(992, 'Padra', 12, 1),
(993, 'Palanpur', 12, 1),
(994, 'Palej', 12, 1),
(995, 'Pali', 12, 1),
(996, 'Palitana', 12, 1),
(997, 'Paliyad', 12, 1),
(998, 'Pandesara', 12, 1),
(999, 'Panoli', 12, 1),
(1000, 'Pardi', 12, 1),
(1001, 'Parnera', 12, 1),
(1002, 'Parvat', 12, 1),
(1003, 'Patan', 12, 1),
(1004, 'Patdi', 12, 1),
(1005, 'Petlad', 12, 1),
(1006, 'Petrochemical Complex', 12, 1),
(1007, 'Porbandar', 12, 1),
(1008, 'Prantij', 12, 1),
(1009, 'Radhanpur', 12, 1),
(1010, 'Raiya', 12, 1),
(1011, 'Rajkot', 12, 1),
(1012, 'Rajpipla', 12, 1),
(1013, 'Rajula', 12, 1),
(1014, 'Ramod', 12, 1),
(1015, 'Ranavav', 12, 1),
(1016, 'Ranoli', 12, 1),
(1017, 'Rapar', 12, 1),
(1018, 'Sahij', 12, 1),
(1019, 'Salaya', 12, 1),
(1020, 'Sanand', 12, 1),
(1021, 'Sankheda', 12, 1),
(1022, 'Santrampur', 12, 1),
(1023, 'Saribujrang', 12, 1),
(1024, 'Sarigam INA', 12, 1),
(1025, 'Sayan', 12, 1),
(1026, 'Sayla', 12, 1),
(1027, 'Shahpur', 12, 1),
(1028, 'Shahwadi', 12, 1),
(1029, 'Shapar', 12, 1),
(1030, 'Shivrajpur', 12, 1),
(1031, 'Siddhapur', 12, 1),
(1032, 'Sidhpur', 12, 1),
(1033, 'Sihor', 12, 1),
(1034, 'Sika', 12, 1),
(1035, 'Singarva', 12, 1),
(1036, 'Sinor', 12, 1),
(1037, 'Sojitra', 12, 1),
(1038, 'Sola', 12, 1),
(1039, 'Songadh', 12, 1),
(1040, 'Suraj Karadi', 12, 1),
(1041, 'Surat', 12, 1),
(1042, 'Surendranagar', 12, 1),
(1043, 'Talaja', 12, 1),
(1044, 'Talala', 12, 1),
(1045, 'Talod', 12, 1),
(1046, 'Tankara', 12, 1),
(1047, 'Tarsali', 12, 1),
(1048, 'Thangadh', 12, 1),
(1049, 'Tharad', 12, 1),
(1050, 'Thasra', 12, 1),
(1051, 'Udyognagar', 12, 1),
(1052, 'Ukai', 12, 1),
(1053, 'Umbergaon', 12, 1),
(1054, 'Umbergaon INA', 12, 1),
(1055, 'Umrala', 12, 1),
(1056, 'Umreth', 12, 1),
(1057, 'Un', 12, 1),
(1058, 'Una', 12, 1),
(1059, 'Unjha', 12, 1),
(1060, 'Upleta', 12, 1),
(1061, 'Utran', 12, 1),
(1062, 'Uttarsanda', 12, 1),
(1063, 'V.U. Nagar', 12, 1),
(1064, 'V.V. Nagar', 12, 1),
(1065, 'Vadia', 12, 1),
(1066, 'Vadla', 12, 1),
(1067, 'Vadnagar', 12, 1),
(1068, 'Vadodara', 12, 1),
(1069, 'Vaghodia INA', 12, 1),
(1070, 'Valbhipur', 12, 1),
(1071, 'Vallabh Vidyanagar', 12, 1),
(1072, 'Valsad', 12, 1),
(1073, 'Valsad INA', 12, 1),
(1074, 'Vanthali', 12, 1),
(1075, 'Vapi', 12, 1),
(1076, 'Vapi INA', 12, 1),
(1077, 'Vartej', 12, 1),
(1078, 'Vasad', 12, 1),
(1079, 'Vasna Borsad INA', 12, 1),
(1080, 'Vaso', 12, 1),
(1081, 'Veraval', 12, 1),
(1082, 'Vidyanagar', 12, 1),
(1083, 'Vijalpor', 12, 1),
(1084, 'Vijapur', 12, 1),
(1085, 'Vinchhiya', 12, 1),
(1086, 'Vinzol', 12, 1),
(1087, 'Virpur', 12, 1),
(1088, 'Visavadar', 12, 1),
(1089, 'Visnagar', 12, 1),
(1090, 'Vyara', 12, 1),
(1091, 'Wadhwan', 12, 1),
(1092, 'Waghai', 12, 1),
(1093, 'Waghodia', 12, 1),
(1094, 'Wankaner', 12, 1),
(1095, 'Zalod', 12, 1),
(1096, 'Ambala', 13, 1),
(1097, 'Ambala Cantt', 13, 1),
(1098, 'Asan Khurd', 13, 1),
(1099, 'Asandh', 13, 1),
(1100, 'Ateli', 13, 1),
(1101, 'Babiyal', 13, 1),
(1102, 'Bahadurgarh', 13, 1),
(1103, 'Ballabgarh', 13, 1),
(1104, 'Barwala', 13, 1),
(1105, 'Bawal', 13, 1),
(1106, 'Bawani Khera', 13, 1),
(1107, 'Beri', 13, 1),
(1108, 'Bhiwani', 13, 1),
(1109, 'Bilaspur', 13, 1),
(1110, 'Buria', 13, 1),
(1111, 'Charkhi Dadri', 13, 1),
(1112, 'Chhachhrauli', 13, 1),
(1113, 'Chita', 13, 1),
(1114, 'Dabwali', 13, 1),
(1115, 'Dharuhera', 13, 1),
(1116, 'Dundahera', 13, 1),
(1117, 'Ellenabad', 13, 1),
(1118, 'Farakhpur', 13, 1),
(1119, 'Faridabad', 13, 1),
(1120, 'Farrukhnagar', 13, 1),
(1121, 'Fatehabad', 13, 1),
(1122, 'Firozpur Jhirka', 13, 1),
(1123, 'Gannaur', 13, 1),
(1124, 'Ghraunda', 13, 1),
(1125, 'Gohana', 13, 1),
(1126, 'Gurgaon', 13, 1),
(1127, 'Haileymandi', 13, 1),
(1128, 'Hansi', 13, 1),
(1129, 'Hasanpur', 13, 1),
(1130, 'Hathin', 13, 1),
(1131, 'Hisar', 13, 1),
(1132, 'Hissar', 13, 1),
(1133, 'Hodal', 13, 1),
(1134, 'Indri', 13, 1),
(1135, 'Jagadhri', 13, 1),
(1136, 'Jakhal Mandi', 13, 1),
(1137, 'Jhajjar', 13, 1),
(1138, 'Jind', 13, 1),
(1139, 'Julana', 13, 1),
(1140, 'Kaithal', 13, 1),
(1141, 'Kalanur', 13, 1),
(1142, 'Kalanwali', 13, 1),
(1143, 'Kalayat', 13, 1),
(1144, 'Kalka', 13, 1),
(1145, 'Kanina', 13, 1),
(1146, 'Kansepur', 13, 1),
(1147, 'Kardhan', 13, 1),
(1148, 'Karnal', 13, 1),
(1149, 'Kharkhoda', 13, 1),
(1150, 'Kheri Sampla', 13, 1),
(1151, 'Kundli', 13, 1),
(1152, 'Kurukshetra', 13, 1),
(1153, 'Ladrawan', 13, 1),
(1154, 'Ladwa', 13, 1),
(1155, 'Loharu', 13, 1),
(1156, 'Maham', 13, 1),
(1157, 'Mahendragarh', 13, 1),
(1158, 'Mustafabad', 13, 1),
(1159, 'Nagai Chaudhry', 13, 1),
(1160, 'Narayangarh', 13, 1),
(1161, 'Narnaul', 13, 1),
(1162, 'Narnaund', 13, 1),
(1163, 'Narwana', 13, 1),
(1164, 'Nilokheri', 13, 1),
(1165, 'Nuh', 13, 1),
(1166, 'Palwal', 13, 1),
(1167, 'Panchkula', 13, 1),
(1168, 'Panipat', 13, 1),
(1169, 'Panipat Taraf Ansar', 13, 1),
(1170, 'Panipat Taraf Makhdum Zadgan', 13, 1),
(1171, 'Panipat Taraf Rajputan', 13, 1),
(1172, 'Pehowa', 13, 1),
(1173, 'Pinjaur', 13, 1),
(1174, 'Punahana', 13, 1),
(1175, 'Pundri', 13, 1),
(1176, 'Radaur', 13, 1),
(1177, 'Raipur Rani', 13, 1),
(1178, 'Rania', 13, 1),
(1179, 'Ratiya', 13, 1),
(1180, 'Rewari', 13, 1),
(1181, 'Rohtak', 13, 1),
(1182, 'Ropar', 13, 1),
(1183, 'Sadauri', 13, 1),
(1184, 'Safidon', 13, 1),
(1185, 'Samalkha', 13, 1),
(1186, 'Sankhol', 13, 1),
(1187, 'Sasauli', 13, 1),
(1188, 'Shahabad', 13, 1),
(1189, 'Sirsa', 13, 1),
(1190, 'Siwani', 13, 1),
(1191, 'Sohna', 13, 1),
(1192, 'Sonipat', 13, 1),
(1193, 'Sukhrali', 13, 1),
(1194, 'Taoru', 13, 1),
(1195, 'Taraori', 13, 1),
(1196, 'Tauru', 13, 1),
(1197, 'Thanesar', 13, 1),
(1198, 'Tilpat', 13, 1),
(1199, 'Tohana', 13, 1),
(1200, 'Tosham', 13, 1),
(1201, 'Uchana', 13, 1),
(1202, 'Uklana Mandi', 13, 1),
(1203, 'Uncha Siwana', 13, 1),
(1204, 'Yamunanagar', 13, 1),
(1205, 'Arki', 14, 1),
(1206, 'Baddi', 14, 1),
(1207, 'Bakloh', 14, 1),
(1208, 'Banjar', 14, 1),
(1209, 'Bhota', 14, 1),
(1210, 'Bhuntar', 14, 1),
(1211, 'Bilaspur', 14, 1),
(1212, 'Chamba', 14, 1),
(1213, 'Chaupal', 14, 1),
(1214, 'Chuari Khas', 14, 1),
(1215, 'Dagshai', 14, 1),
(1216, 'Dalhousie', 14, 1),
(1217, 'Dalhousie Cantonment', 14, 1),
(1218, 'Damtal', 14, 1),
(1219, 'Daulatpur', 14, 1),
(1220, 'Dera Gopipur', 14, 1),
(1221, 'Dhalli', 14, 1),
(1222, 'Dharamshala', 14, 1),
(1223, 'Gagret', 14, 1),
(1224, 'Ghamarwin', 14, 1),
(1225, 'Hamirpur', 14, 1),
(1226, 'Jawala Mukhi', 14, 1),
(1227, 'Jogindarnagar', 14, 1),
(1228, 'Jubbal', 14, 1),
(1229, 'Jutogh', 14, 1),
(1230, 'Kala Amb', 14, 1),
(1231, 'Kalpa', 14, 1),
(1232, 'Kangra', 14, 1),
(1233, 'Kasauli', 14, 1),
(1234, 'Kot Khai', 14, 1),
(1235, 'Kullu', 14, 1),
(1236, 'Kulu', 14, 1),
(1237, 'Manali', 14, 1),
(1238, 'Mandi', 14, 1),
(1239, 'Mant Khas', 14, 1),
(1240, 'Mehatpur Basdehra', 14, 1),
(1241, 'Nadaun', 14, 1),
(1242, 'Nagrota', 14, 1),
(1243, 'Nahan', 14, 1),
(1244, 'Naina Devi', 14, 1),
(1245, 'Nalagarh', 14, 1),
(1246, 'Narkanda', 14, 1),
(1247, 'Nurpur', 14, 1),
(1248, 'Palampur', 14, 1),
(1249, 'Pandoh', 14, 1),
(1250, 'Paonta Sahib', 14, 1),
(1251, 'Parwanoo', 14, 1),
(1252, 'Parwanu', 14, 1),
(1253, 'Rajgarh', 14, 1),
(1254, 'Rampur', 14, 1),
(1255, 'Rawalsar', 14, 1),
(1256, 'Rohru', 14, 1),
(1257, 'Sabathu', 14, 1),
(1258, 'Santokhgarh', 14, 1),
(1259, 'Sarahan', 14, 1),
(1260, 'Sarka Ghat', 14, 1),
(1261, 'Seoni', 14, 1),
(1262, 'Shimla', 14, 1),
(1263, 'Sirmaur', 14, 1),
(1264, 'Solan', 14, 1),
(1265, 'Solon', 14, 1),
(1266, 'Sundarnagar', 14, 1),
(1267, 'Sundernagar', 14, 1),
(1268, 'Talai', 14, 1),
(1269, 'Theog', 14, 1),
(1270, 'Tira Sujanpur', 14, 1),
(1271, 'Una', 14, 1),
(1272, 'Yol', 14, 1),
(1273, 'Achabal', 15, 1),
(1274, 'Akhnur', 15, 1),
(1275, 'Anantnag', 15, 1),
(1276, 'Arnia', 15, 1),
(1277, 'Awantipora', 15, 1),
(1278, 'Badami Bagh', 15, 1),
(1279, 'Bandipur', 15, 1),
(1280, 'Banihal', 15, 1),
(1281, 'Baramula', 15, 1),
(1282, 'Baramulla', 15, 1),
(1283, 'Bari Brahmana', 15, 1),
(1284, 'Bashohli', 15, 1),
(1285, 'Batote', 15, 1),
(1286, 'Bhaderwah', 15, 1),
(1287, 'Bijbiara', 15, 1),
(1288, 'Billawar', 15, 1),
(1289, 'Birwah', 15, 1),
(1290, 'Bishna', 15, 1),
(1291, 'Budgam', 15, 1),
(1292, 'Charari Sharief', 15, 1),
(1293, 'Chenani', 15, 1),
(1294, 'Doda', 15, 1),
(1295, 'Duru-Verinag', 15, 1),
(1296, 'Gandarbat', 15, 1),
(1297, 'Gho Manhasan', 15, 1),
(1298, 'Gorah Salathian', 15, 1),
(1299, 'Gulmarg', 15, 1),
(1300, 'Hajan', 15, 1),
(1301, 'Handwara', 15, 1),
(1302, 'Hiranagar', 15, 1),
(1303, 'Jammu', 15, 1),
(1304, 'Jammu Cantonment', 15, 1),
(1305, 'Jammu Tawi', 15, 1),
(1306, 'Jourian', 15, 1),
(1307, 'Kargil', 15, 1),
(1308, 'Kathua', 15, 1),
(1309, 'Katra', 15, 1),
(1310, 'Khan Sahib', 15, 1),
(1311, 'Khour', 15, 1),
(1312, 'Khrew', 15, 1),
(1313, 'Kishtwar', 15, 1),
(1314, 'Kud', 15, 1),
(1315, 'Kukernag', 15, 1),
(1316, 'Kulgam', 15, 1),
(1317, 'Kunzer', 15, 1),
(1318, 'Kupwara', 15, 1),
(1319, 'Lakhenpur', 15, 1),
(1320, 'Leh', 15, 1),
(1321, 'Magam', 15, 1),
(1322, 'Mattan', 15, 1),
(1323, 'Naushehra', 15, 1),
(1324, 'Pahalgam', 15, 1),
(1325, 'Pampore', 15, 1),
(1326, 'Parole', 15, 1),
(1327, 'Pattan', 15, 1),
(1328, 'Pulwama', 15, 1),
(1329, 'Punch', 15, 1),
(1330, 'Qazigund', 15, 1),
(1331, 'Rajauri', 15, 1),
(1332, 'Ramban', 15, 1),
(1333, 'Ramgarh', 15, 1),
(1334, 'Ramnagar', 15, 1),
(1335, 'Ranbirsingh Pora', 15, 1),
(1336, 'Reasi', 15, 1),
(1337, 'Rehambal', 15, 1),
(1338, 'Samba', 15, 1),
(1339, 'Shupiyan', 15, 1),
(1340, 'Sopur', 15, 1),
(1341, 'Srinagar', 15, 1),
(1342, 'Sumbal', 15, 1),
(1343, 'Sunderbani', 15, 1),
(1344, 'Talwara', 15, 1),
(1345, 'Thanamandi', 15, 1),
(1346, 'Tral', 15, 1),
(1347, 'Udhampur', 15, 1),
(1348, 'Uri', 15, 1),
(1349, 'Vijaypur', 15, 1),
(1350, 'Adityapur', 16, 1),
(1351, 'Amlabad', 16, 1),
(1352, 'Angarpathar', 16, 1),
(1353, 'Ara', 16, 1),
(1354, 'Babua Kalan', 16, 1),
(1355, 'Bagbahra', 16, 1),
(1356, 'Baliapur', 16, 1),
(1357, 'Baliari', 16, 1),
(1358, 'Balkundra', 16, 1),
(1359, 'Bandhgora', 16, 1),
(1360, 'Barajamda', 16, 1),
(1361, 'Barhi', 16, 1),
(1362, 'Barka Kana', 16, 1),
(1363, 'Barki Saraiya', 16, 1),
(1364, 'Barughutu', 16, 1),
(1365, 'Barwadih', 16, 1),
(1366, 'Basaria', 16, 1),
(1367, 'Basukinath', 16, 1),
(1368, 'Bermo', 16, 1),
(1369, 'Bhagatdih', 16, 1),
(1370, 'Bhaurah', 16, 1),
(1371, 'Bhojudih', 16, 1),
(1372, 'Bhuli', 16, 1),
(1373, 'Bokaro', 16, 1),
(1374, 'Borio Bazar', 16, 1),
(1375, 'Bundu', 16, 1),
(1376, 'Chaibasa', 16, 1),
(1377, 'Chaitudih', 16, 1),
(1378, 'Chakradharpur', 16, 1),
(1379, 'Chakulia', 16, 1),
(1380, 'Chandaur', 16, 1),
(1381, 'Chandil', 16, 1),
(1382, 'Chandrapura', 16, 1),
(1383, 'Chas', 16, 1),
(1384, 'Chatra', 16, 1),
(1385, 'Chhatatanr', 16, 1),
(1386, 'Chhotaputki', 16, 1),
(1387, 'Chiria', 16, 1),
(1388, 'Chirkunda', 16, 1),
(1389, 'Churi', 16, 1),
(1390, 'Daltenganj', 16, 1),
(1391, 'Danguwapasi', 16, 1),
(1392, 'Dari', 16, 1),
(1393, 'Deoghar', 16, 1),
(1394, 'Deorikalan', 16, 1),
(1395, 'Devghar', 16, 1),
(1396, 'Dhanbad', 16, 1),
(1397, 'Dhanwar', 16, 1),
(1398, 'Dhaunsar', 16, 1),
(1399, 'Dugda', 16, 1),
(1400, 'Dumarkunda', 16, 1),
(1401, 'Dumka', 16, 1),
(1402, 'Egarkunr', 16, 1),
(1403, 'Gadhra', 16, 1),
(1404, 'Garwa', 16, 1),
(1405, 'Ghatsila', 16, 1),
(1406, 'Ghorabandha', 16, 1),
(1407, 'Gidi', 16, 1),
(1408, 'Giridih', 16, 1),
(1409, 'Gobindpur', 16, 1),
(1410, 'Godda', 16, 1),
(1411, 'Godhar', 16, 1),
(1412, 'Golphalbari', 16, 1),
(1413, 'Gomoh', 16, 1),
(1414, 'Gua', 16, 1),
(1415, 'Gumia', 16, 1),
(1416, 'Gumla', 16, 1),
(1417, 'Haludbani', 16, 1),
(1418, 'Hazaribag', 16, 1),
(1419, 'Hesla', 16, 1),
(1420, 'Husainabad', 16, 1),
(1421, 'Isri', 16, 1),
(1422, 'Jadugora', 16, 1),
(1423, 'Jagannathpur', 16, 1),
(1424, 'Jamadoba', 16, 1),
(1425, 'Jamshedpur', 16, 1),
(1426, 'Jamtara', 16, 1),
(1427, 'Jarangdih', 16, 1),
(1428, 'Jaridih', 16, 1),
(1429, 'Jasidih', 16, 1),
(1430, 'Jena', 16, 1),
(1431, 'Jharia', 16, 1),
(1432, 'Jharia Khas', 16, 1),
(1433, 'Jhinkpani', 16, 1),
(1434, 'Jhumri Tilaiya', 16, 1),
(1435, 'Jorapokhar', 16, 1),
(1436, 'Jugsalai', 16, 1),
(1437, 'Kailudih', 16, 1),
(1438, 'Kalikapur', 16, 1),
(1439, 'Kandra', 16, 1),
(1440, 'Kanke', 16, 1),
(1441, 'Katras', 16, 1),
(1442, 'Kedla', 16, 1),
(1443, 'Kenduadih', 16, 1),
(1444, 'Kharkhari', 16, 1),
(1445, 'Kharsawan', 16, 1),
(1446, 'Khelari', 16, 1),
(1447, 'Khunti', 16, 1),
(1448, 'Kiri Buru', 16, 1),
(1449, 'Kiriburu', 16, 1),
(1450, 'Kodarma', 16, 1),
(1451, 'Kuju', 16, 1),
(1452, 'Kurpania', 16, 1),
(1453, 'Kustai', 16, 1),
(1454, 'Lakarka', 16, 1),
(1455, 'Lapanga', 16, 1),
(1456, 'Latehar', 16, 1),
(1457, 'Lohardaga', 16, 1),
(1458, 'Loiya', 16, 1),
(1459, 'Loyabad', 16, 1),
(1460, 'Madhupur', 16, 1),
(1461, 'Mahesh Mundi', 16, 1),
(1462, 'Maithon', 16, 1),
(1463, 'Malkera', 16, 1),
(1464, 'Mango', 16, 1),
(1465, 'Manoharpur', 16, 1),
(1466, 'Marma', 16, 1),
(1467, 'Meghahatuburu Forest village', 16, 1),
(1468, 'Mera', 16, 1),
(1469, 'Meru', 16, 1),
(1470, 'Mihijam', 16, 1),
(1471, 'Mugma', 16, 1),
(1472, 'Muri', 16, 1),
(1473, 'Mushabani', 16, 1),
(1474, 'Nagri Kalan', 16, 1),
(1475, 'Netarhat', 16, 1),
(1476, 'Nirsa', 16, 1),
(1477, 'Noamundi', 16, 1),
(1478, 'Okni', 16, 1),
(1479, 'Orla', 16, 1),
(1480, 'Pakaur', 16, 1),
(1481, 'Palamau', 16, 1),
(1482, 'Palawa', 16, 1),
(1483, 'Panchet', 16, 1),
(1484, 'Panrra', 16, 1),
(1485, 'Paratdih', 16, 1),
(1486, 'Pathardih', 16, 1),
(1487, 'Patratu', 16, 1),
(1488, 'Phusro', 16, 1),
(1489, 'Pondar Kanali', 16, 1),
(1490, 'Rajmahal', 16, 1),
(1491, 'Ramgarh', 16, 1),
(1492, 'Ranchi', 16, 1),
(1493, 'Ray', 16, 1),
(1494, 'Rehla', 16, 1),
(1495, 'Religara', 16, 1),
(1496, 'Rohraband', 16, 1),
(1497, 'Sahibganj', 16, 1),
(1498, 'Sahnidih', 16, 1),
(1499, 'Saraidhela', 16, 1),
(1500, 'Saraikela', 16, 1),
(1501, 'Sarjamda', 16, 1),
(1502, 'Saunda', 16, 1),
(1503, 'Sewai', 16, 1),
(1504, 'Sijhua', 16, 1),
(1505, 'Sijua', 16, 1),
(1506, 'Simdega', 16, 1),
(1507, 'Sindari', 16, 1),
(1508, 'Sinduria', 16, 1),
(1509, 'Sini', 16, 1),
(1510, 'Sirka', 16, 1),
(1511, 'Siuliban', 16, 1),
(1512, 'Surubera', 16, 1),
(1513, 'Tati', 16, 1),
(1514, 'Tenudam', 16, 1),
(1515, 'Tisra', 16, 1),
(1516, 'Topa', 16, 1),
(1517, 'Topchanchi', 16, 1),
(1518, 'Adityanagar', 17, 1),
(1519, 'Adityapatna', 17, 1),
(1520, 'Afzalpur', 17, 1),
(1521, 'Ajjampur', 17, 1),
(1522, 'Aland', 17, 1),
(1523, 'Almatti Sitimani', 17, 1),
(1524, 'Alnavar', 17, 1),
(1525, 'Alur', 17, 1),
(1526, 'Ambikanagara', 17, 1),
(1527, 'Anekal', 17, 1),
(1528, 'Ankola', 17, 1),
(1529, 'Annigeri', 17, 1),
(1530, 'Arkalgud', 17, 1),
(1531, 'Arsikere', 17, 1),
(1532, 'Athni', 17, 1),
(1533, 'Aurad', 17, 1),
(1534, 'Badagavettu', 17, 1),
(1535, 'Badami', 17, 1),
(1536, 'Bagalkot', 17, 1),
(1537, 'Bagepalli', 17, 1),
(1538, 'Bailhongal', 17, 1),
(1539, 'Baindur', 17, 1),
(1540, 'Bajala', 17, 1),
(1541, 'Bajpe', 17, 1),
(1542, 'Banavar', 17, 1),
(1543, 'Bangarapet', 17, 1),
(1544, 'Bankapura', 17, 1),
(1545, 'Bannur', 17, 1),
(1546, 'Bantwal', 17, 1),
(1547, 'Basavakalyan', 17, 1),
(1548, 'Basavana Bagevadi', 17, 1),
(1549, 'Belagula', 17, 1),
(1550, 'Belakavadiq', 17, 1),
(1551, 'Belgaum', 17, 1),
(1552, 'Belgaum Cantonment', 17, 1),
(1553, 'Bellary', 17, 1),
(1554, 'Belluru', 17, 1),
(1555, 'Beltangadi', 17, 1),
(1556, 'Belur', 17, 1),
(1557, 'Belvata', 17, 1),
(1558, 'Bengaluru', 17, 1),
(1559, 'Bhadravati', 17, 1),
(1560, 'Bhalki', 17, 1),
(1561, 'Bhatkal', 17, 1),
(1562, 'Bhimarayanagudi', 17, 1),
(1563, 'Bhogadi', 17, 1),
(1564, 'Bidar', 17, 1),
(1565, 'Bijapur', 17, 1),
(1566, 'Bilgi', 17, 1),
(1567, 'Birur', 17, 1),
(1568, 'Bommanahalli', 17, 1),
(1569, 'Bommasandra', 17, 1),
(1570, 'Byadgi', 17, 1),
(1571, 'Byatarayanapura', 17, 1),
(1572, 'Chakranagar Colony', 17, 1),
(1573, 'Challakere', 17, 1),
(1574, 'Chamrajnagar', 17, 1),
(1575, 'Chamundi Betta', 17, 1),
(1576, 'Channagiri', 17, 1),
(1577, 'Channapatna', 17, 1),
(1578, 'Channarayapatna', 17, 1),
(1579, 'Chickballapur', 17, 1),
(1580, 'Chik Ballapur', 17, 1),
(1581, 'Chikkaballapur', 17, 1),
(1582, 'Chikmagalur', 17, 1),
(1583, 'Chiknayakanhalli', 17, 1),
(1584, 'Chikodi', 17, 1),
(1585, 'Chincholi', 17, 1),
(1586, 'Chintamani', 17, 1),
(1587, 'Chitaguppa', 17, 1),
(1588, 'Chitapur', 17, 1),
(1589, 'Chitradurga', 17, 1),
(1590, 'Coorg', 17, 1),
(1591, 'Dandeli', 17, 1),
(1592, 'Dargajogihalli', 17, 1),
(1593, 'Dasarahalli', 17, 1),
(1594, 'Davangere', 17, 1),
(1595, 'Devadurga', 17, 1),
(1596, 'Devagiri', 17, 1),
(1597, 'Devanhalli', 17, 1),
(1598, 'Dharwar', 17, 1),
(1599, 'Dhupdal', 17, 1),
(1600, 'Dod Ballapur', 17, 1),
(1601, 'Donimalai', 17, 1),
(1602, 'Gadag', 17, 1),
(1603, 'Gajendragarh', 17, 1),
(1604, 'Ganeshgudi', 17, 1),
(1605, 'Gangawati', 17, 1),
(1606, 'Gangoli', 17, 1),
(1607, 'Gauribidanur', 17, 1),
(1608, 'Gokak', 17, 1),
(1609, 'Gokak Falls', 17, 1),
(1610, 'Gonikoppal', 17, 1),
(1611, 'Gorur', 17, 1),
(1612, 'Gottikere', 17, 1),
(1613, 'Gubbi', 17, 1),
(1614, 'Gudibanda', 17, 1),
(1615, 'Gulbarga', 17, 1),
(1616, 'Guledgudda', 17, 1),
(1617, 'Gundlupet', 17, 1),
(1618, 'Gurmatkal', 17, 1),
(1619, 'Haliyal', 17, 1),
(1620, 'Hangal', 17, 1),
(1621, 'Harihar', 17, 1),
(1622, 'Harpanahalli', 17, 1),
(1623, 'Hassan', 17, 1),
(1624, 'Hatti', 17, 1),
(1625, 'Hatti Gold Mines', 17, 1),
(1626, 'Haveri', 17, 1),
(1627, 'Hebbagodi', 17, 1),
(1628, 'Hebbalu', 17, 1),
(1629, 'Hebri', 17, 1),
(1630, 'Heggadadevanakote', 17, 1),
(1631, 'Herohalli', 17, 1),
(1632, 'Hidkal', 17, 1),
(1633, 'Hindalgi', 17, 1),
(1634, 'Hirekerur', 17, 1),
(1635, 'Hiriyur', 17, 1),
(1636, 'Holalkere', 17, 1),
(1637, 'Hole Narsipur', 17, 1),
(1638, 'Homnabad', 17, 1),
(1639, 'Honavar', 17, 1),
(1640, 'Honnali', 17, 1),
(1641, 'Hosakote', 17, 1),
(1642, 'Hosanagara', 17, 1),
(1643, 'Hosangadi', 17, 1),
(1644, 'Hosdurga', 17, 1),
(1645, 'Hoskote', 17, 1),
(1646, 'Hospet', 17, 1),
(1647, 'Hubli', 17, 1),
(1648, 'Hukeri', 17, 1),
(1649, 'Hunasagi', 17, 1),
(1650, 'Hunasamaranahalli', 17, 1),
(1651, 'Hungund', 17, 1),
(1652, 'Hunsur', 17, 1),
(1653, 'Huvina Hadagalli', 17, 1),
(1654, 'Ilkal', 17, 1),
(1655, 'Indi', 17, 1),
(1656, 'Jagalur', 17, 1),
(1657, 'Jamkhandi', 17, 1),
(1658, 'Jevargi', 17, 1),
(1659, 'Jog Falls', 17, 1),
(1660, 'Kabini Colony', 17, 1),
(1661, 'Kadur', 17, 1),
(1662, 'Kalghatgi', 17, 1),
(1663, 'Kamalapuram', 17, 1),
(1664, 'Kampli', 17, 1),
(1665, 'Kanakapura', 17, 1),
(1666, 'Kangrali BK', 17, 1),
(1667, 'Kangrali KH', 17, 1),
(1668, 'Kannur', 17, 1),
(1669, 'Karkala', 17, 1),
(1670, 'Karwar', 17, 1),
(1671, 'Kemminja', 17, 1),
(1672, 'Kengeri', 17, 1),
(1673, 'Kerur', 17, 1),
(1674, 'Khanapur', 17, 1),
(1675, 'Kodigenahalli', 17, 1),
(1676, 'Kodiyal', 17, 1),
(1677, 'Kodlipet', 17, 1),
(1678, 'Kolar', 17, 1),
(1679, 'Kollegal', 17, 1),
(1680, 'Konanakunte', 17, 1),
(1681, 'Konanur', 17, 1),
(1682, 'Konnur', 17, 1),
(1683, 'Koppa', 17, 1),
(1684, 'Koppal', 17, 1),
(1685, 'Koratagere', 17, 1),
(1686, 'Kotekara', 17, 1),
(1687, 'Kothnur', 17, 1),
(1688, 'Kotturu', 17, 1),
(1689, 'Krishnapura', 17, 1),
(1690, 'Krishnarajanagar', 17, 1),
(1691, 'Krishnarajapura', 17, 1),
(1692, 'Krishnarajasagara', 17, 1),
(1693, 'Krishnarajpet', 17, 1),
(1694, 'Kudchi', 17, 1),
(1695, 'Kudligi', 17, 1),
(1696, 'Kudremukh', 17, 1),
(1697, 'Kumsi', 17, 1),
(1698, 'Kumta', 17, 1),
(1699, 'Kundapura', 17, 1),
(1700, 'Kundgol', 17, 1),
(1701, 'Kunigal', 17, 1),
(1702, 'Kurgunta', 17, 1),
(1703, 'Kushalnagar', 17, 1),
(1704, 'Kushtagi', 17, 1),
(1705, 'Kyathanahalli', 17, 1),
(1706, 'Lakshmeshwar', 17, 1),
(1707, 'Lingsugur', 17, 1),
(1708, 'Londa', 17, 1),
(1709, 'Maddur', 17, 1),
(1710, 'Madhugiri', 17, 1),
(1711, 'Madikeri', 17, 1),
(1712, 'Magadi', 17, 1),
(1713, 'Magod Falls', 17, 1),
(1714, 'Mahadeswara Hills', 17, 1),
(1715, 'Mahadevapura', 17, 1),
(1716, 'Mahalingpur', 17, 1),
(1717, 'Maisuru', 17, 1),
(1718, 'Maisuru Cantonment', 17, 1),
(1719, 'Malavalli', 17, 1),
(1720, 'Mallar', 17, 1),
(1721, 'Malpe', 17, 1),
(1722, 'Malur', 17, 1),
(1723, 'Manchenahalli', 17, 1),
(1724, 'Mandya', 17, 1),
(1725, 'Mangalore', 17, 1),
(1726, 'Mangaluru', 17, 1),
(1727, 'Manipal', 17, 1),
(1728, 'Manvi', 17, 1),
(1729, 'Maski', 17, 1),
(1730, 'Mastikatte Colony', 17, 1),
(1731, 'Mayakonda', 17, 1),
(1732, 'Melukote', 17, 1),
(1733, 'Molakalmuru', 17, 1),
(1734, 'Mudalgi', 17, 1),
(1735, 'Mudbidri', 17, 1),
(1736, 'Muddebihal', 17, 1),
(1737, 'Mudgal', 17, 1),
(1738, 'Mudhol', 17, 1),
(1739, 'Mudigere', 17, 1),
(1740, 'Mudushedde', 17, 1),
(1741, 'Mulbagal', 17, 1),
(1742, 'Mulgund', 17, 1),
(1743, 'Mulki', 17, 1),
(1744, 'Mulur', 17, 1),
(1745, 'Mundargi', 17, 1),
(1746, 'Mundgod', 17, 1),
(1747, 'Munirabad', 17, 1),
(1748, 'Munnur', 17, 1),
(1749, 'Murudeshwara', 17, 1),
(1750, 'Mysore', 17, 1),
(1751, 'Nagamangala', 17, 1),
(1752, 'Nanjangud', 17, 1),
(1753, 'Naragund', 17, 1),
(1754, 'Narasimharajapura', 17, 1),
(1755, 'Naravi', 17, 1),
(1756, 'Narayanpur', 17, 1),
(1757, 'Naregal', 17, 1),
(1758, 'Navalgund', 17, 1),
(1759, 'Nelmangala', 17, 1),
(1760, 'Nipani', 17, 1),
(1761, 'Nitte', 17, 1),
(1762, 'Nyamati', 17, 1),
(1763, 'Padu', 17, 1),
(1764, 'Pandavapura', 17, 1),
(1765, 'Pattanagere', 17, 1),
(1766, 'Pavagada', 17, 1),
(1767, 'Piriyapatna', 17, 1),
(1768, 'Ponnampet', 17, 1),
(1769, 'Puttur', 17, 1),
(1770, 'Rabkavi', 17, 1),
(1771, 'Raichur', 17, 1),
(1772, 'Ramanagaram', 17, 1),
(1773, 'Ramdurg', 17, 1),
(1774, 'Ranibennur', 17, 1),
(1775, 'Raybag', 17, 1),
(1776, 'Robertsonpet', 17, 1),
(1777, 'Ron', 17, 1),
(1778, 'Sadalgi', 17, 1),
(1779, 'Sagar', 17, 1),
(1780, 'Sakleshpur', 17, 1),
(1781, 'Saligram', 17, 1),
(1782, 'Sandur', 17, 1),
(1783, 'Sanivarsante', 17, 1),
(1784, 'Sankeshwar', 17, 1),
(1785, 'Sargur', 17, 1),
(1786, 'Sathyamangala', 17, 1),
(1787, 'Saundatti Yellamma', 17, 1),
(1788, 'Savanur', 17, 1),
(1789, 'Sedam', 17, 1),
(1790, 'Shahabad', 17, 1),
(1791, 'Shahabad A.C.C.', 17, 1),
(1792, 'Shahapur', 17, 1),
(1793, 'Shahpur', 17, 1),
(1794, 'Shaktinagar', 17, 1),
(1795, 'Shiggaon', 17, 1),
(1796, 'Shikarpur', 17, 1),
(1797, 'Shimoga', 17, 1),
(1798, 'Shirhatti', 17, 1),
(1799, 'Shorapur', 17, 1),
(1800, 'Shravanabelagola', 17, 1),
(1801, 'Shrirangapattana', 17, 1),
(1802, 'Siddapur', 17, 1),
(1803, 'Sidlaghatta', 17, 1),
(1804, 'Sindgi', 17, 1),
(1805, 'Sindhnur', 17, 1),
(1806, 'Sira', 17, 1),
(1807, 'Sirakoppa', 17, 1),
(1808, 'Sirsi', 17, 1),
(1809, 'Siruguppa', 17, 1),
(1810, 'Someshwar', 17, 1),
(1811, 'Somvarpet', 17, 1),
(1812, 'Sorab', 17, 1),
(1813, 'Sringeri', 17, 1),
(1814, 'Srinivaspur', 17, 1),
(1815, 'Sulya', 17, 1),
(1816, 'Suntikopa', 17, 1),
(1817, 'Talikota', 17, 1),
(1818, 'Tarikera', 17, 1),
(1819, 'Tekkalakota', 17, 1),
(1820, 'Terdal', 17, 1),
(1821, 'Thokur', 17, 1),
(1822, 'Thumbe', 17, 1),
(1823, 'Tiptur', 17, 1),
(1824, 'Tirthahalli', 17, 1),
(1825, 'Tirumakudal Narsipur', 17, 1),
(1826, 'Tonse', 17, 1),
(1827, 'Tumkur', 17, 1),
(1828, 'Turuvekere', 17, 1),
(1829, 'Udupi', 17, 1),
(1830, 'Ullal', 17, 1),
(1831, 'Uttarahalli', 17, 1),
(1832, 'Venkatapura', 17, 1),
(1833, 'Vijayapura', 17, 1),
(1834, 'Virarajendrapet', 17, 1),
(1835, 'Wadi', 17, 1),
(1836, 'Wadi A.C.C.', 17, 1),
(1837, 'Yadgir', 17, 1),
(1838, 'Yelahanka', 17, 1),
(1839, 'Yelandur', 17, 1),
(1840, 'Yelbarga', 17, 1),
(1841, 'Yellapur', 17, 1),
(1842, 'Yenagudde', 17, 1),
(1843, 'Adimaly', 19, 1),
(1844, 'Adoor', 19, 1),
(1845, 'Adur', 19, 1),
(1846, 'Akathiyur', 19, 1),
(1847, 'Alangad', 19, 1),
(1848, 'Alappuzha', 19, 1),
(1849, 'Aluva', 19, 1),
(1850, 'Ancharakandy', 19, 1),
(1851, 'Angamaly', 19, 1),
(1852, 'Aroor', 19, 1),
(1853, 'Arukutti', 19, 1),
(1854, 'Attingal', 19, 1),
(1855, 'Avinissery', 19, 1),
(1856, 'Azhikode North', 19, 1),
(1857, 'Azhikode South', 19, 1),
(1858, 'Azhiyur', 19, 1),
(1859, 'Balussery', 19, 1),
(1860, 'Bangramanjeshwar', 19, 1),
(1861, 'Beypur', 19, 1),
(1862, 'Brahmakulam', 19, 1),
(1863, 'Chala', 19, 1),
(1864, 'Chalakudi', 19, 1),
(1865, 'Changanacheri', 19, 1),
(1866, 'Chauwara', 19, 1),
(1867, 'Chavakkad', 19, 1),
(1868, 'Chelakkara', 19, 1),
(1869, 'Chelora', 19, 1),
(1870, 'Chendamangalam', 19, 1),
(1871, 'Chengamanad', 19, 1),
(1872, 'Chengannur', 19, 1),
(1873, 'Cheranallur', 19, 1),
(1874, 'Cheriyakadavu', 19, 1),
(1875, 'Cherthala', 19, 1),
(1876, 'Cherukunnu', 19, 1),
(1877, 'Cheruthazham', 19, 1),
(1878, 'Cheruvannur', 19, 1),
(1879, 'Cheruvattur', 19, 1),
(1880, 'Chevvur', 19, 1),
(1881, 'Chirakkal', 19, 1),
(1882, 'Chittur', 19, 1),
(1883, 'Chockli', 19, 1),
(1884, 'Churnikkara', 19, 1),
(1885, 'Dharmadam', 19, 1),
(1886, 'Edappal', 19, 1),
(1887, 'Edathala', 19, 1),
(1888, 'Elayavur', 19, 1),
(1889, 'Elur', 19, 1),
(1890, 'Eranholi', 19, 1),
(1891, 'Erattupetta', 19, 1),
(1892, 'Ernakulam', 19, 1),
(1893, 'Eruvatti', 19, 1),
(1894, 'Ettumanoor', 19, 1),
(1895, 'Feroke', 19, 1),
(1896, 'Guruvayur', 19, 1),
(1897, 'Haripad', 19, 1),
(1898, 'Hosabettu', 19, 1),
(1899, 'Idukki', 19, 1),
(1900, 'Iringaprom', 19, 1),
(1901, 'Irinjalakuda', 19, 1),
(1902, 'Iriveri', 19, 1),
(1903, 'Kadachira', 19, 1),
(1904, 'Kadalundi', 19, 1),
(1905, 'Kadamakkudy', 19, 1),
(1906, 'Kadirur', 19, 1),
(1907, 'Kadungallur', 19, 1),
(1908, 'Kakkodi', 19, 1),
(1909, 'Kalady', 19, 1),
(1910, 'Kalamassery', 19, 1),
(1911, 'Kalliasseri', 19, 1),
(1912, 'Kalpetta', 19, 1),
(1913, 'Kanhangad', 19, 1),
(1914, 'Kanhirode', 19, 1),
(1915, 'Kanjikkuzhi', 19, 1),
(1916, 'Kanjikode', 19, 1),
(1917, 'Kanjirappalli', 19, 1),
(1918, 'Kannadiparamba', 19, 1),
(1919, 'Kannangad', 19, 1),
(1920, 'Kannapuram', 19, 1),
(1921, 'Kannur', 19, 1),
(1922, 'Kannur Cantonment', 19, 1),
(1923, 'Karunagappally', 19, 1),
(1924, 'Karuvamyhuruthy', 19, 1),
(1925, 'Kasaragod', 19, 1),
(1926, 'Kasargod', 19, 1),
(1927, 'Kattappana', 19, 1),
(1928, 'Kayamkulam', 19, 1),
(1929, 'Kedamangalam', 19, 1),
(1930, 'Kochi', 19, 1),
(1931, 'Kodamthuruthu', 19, 1),
(1932, 'Kodungallur', 19, 1),
(1933, 'Koduvally', 19, 1),
(1934, 'Koduvayur', 19, 1),
(1935, 'Kokkothamangalam', 19, 1),
(1936, 'Kolazhy', 19, 1),
(1937, 'Kollam', 19, 1),
(1938, 'Komalapuram', 19, 1),
(1939, 'Koothattukulam', 19, 1),
(1940, 'Koratty', 19, 1),
(1941, 'Kothamangalam', 19, 1),
(1942, 'Kottarakkara', 19, 1),
(1943, 'Kottayam', 19, 1),
(1944, 'Kottayam Malabar', 19, 1),
(1945, 'Kottuvally', 19, 1),
(1946, 'Koyilandi', 19, 1),
(1947, 'Kozhikode', 19, 1),
(1948, 'Kudappanakunnu', 19, 1),
(1949, 'Kudlu', 19, 1),
(1950, 'Kumarakom', 19, 1),
(1951, 'Kumily', 19, 1),
(1952, 'Kunnamangalam', 19, 1),
(1953, 'Kunnamkulam', 19, 1),
(1954, 'Kurikkad', 19, 1),
(1955, 'Kurkkanchery', 19, 1),
(1956, 'Kuthuparamba', 19, 1),
(1957, 'Kuttakulam', 19, 1),
(1958, 'Kuttikkattur', 19, 1),
(1959, 'Kuttur', 19, 1),
(1960, 'Malappuram', 19, 1),
(1961, 'Mallappally', 19, 1),
(1962, 'Manjeri', 19, 1),
(1963, 'Manjeshwar', 19, 1),
(1964, 'Mannancherry', 19, 1),
(1965, 'Mannar', 19, 1),
(1966, 'Mannarakkat', 19, 1),
(1967, 'Maradu', 19, 1),
(1968, 'Marathakkara', 19, 1),
(1969, 'Marutharod', 19, 1),
(1970, 'Mattannur', 19, 1),
(1971, 'Mavelikara', 19, 1),
(1972, 'Mavilayi', 19, 1),
(1973, 'Mavur', 19, 1),
(1974, 'Methala', 19, 1),
(1975, 'Muhamma', 19, 1),
(1976, 'Mulavukad', 19, 1),
(1977, 'Mundakayam', 19, 1),
(1978, 'Munderi', 19, 1),
(1979, 'Munnar', 19, 1),
(1980, 'Muthakunnam', 19, 1),
(1981, 'Muvattupuzha', 19, 1),
(1982, 'Muzhappilangad', 19, 1),
(1983, 'Nadapuram', 19, 1),
(1984, 'Nadathara', 19, 1),
(1985, 'Narath', 19, 1),
(1986, 'Nattakam', 19, 1),
(1987, 'Nedumangad', 19, 1),
(1988, 'Nenmenikkara', 19, 1),
(1989, 'New Mahe', 19, 1),
(1990, 'Neyyattinkara', 19, 1),
(1991, 'Nileshwar', 19, 1),
(1992, 'Olavanna', 19, 1),
(1993, 'Ottapalam', 19, 1),
(1994, 'Ottappalam', 19, 1),
(1995, 'Paduvilayi', 19, 1),
(1996, 'Palai', 19, 1),
(1997, 'Palakkad', 19, 1),
(1998, 'Palayad', 19, 1),
(1999, 'Palissery', 19, 1),
(2000, 'Pallikkunnu', 19, 1),
(2001, 'Paluvai', 19, 1),
(2002, 'Panniyannur', 19, 1),
(2003, 'Pantalam', 19, 1),
(2004, 'Panthiramkavu', 19, 1),
(2005, 'Panur', 19, 1),
(2006, 'Pappinisseri', 19, 1),
(2007, 'Parassala', 19, 1),
(2008, 'Paravur', 19, 1),
(2009, 'Pathanamthitta', 19, 1),
(2010, 'Pathanapuram', 19, 1),
(2011, 'Pathiriyad', 19, 1),
(2012, 'Pattambi', 19, 1),
(2013, 'Pattiom', 19, 1),
(2014, 'Pavaratty', 19, 1),
(2015, 'Payyannur', 19, 1),
(2016, 'Peermade', 19, 1),
(2017, 'Perakam', 19, 1),
(2018, 'Peralasseri', 19, 1),
(2019, 'Peringathur', 19, 1),
(2020, 'Perinthalmanna', 19, 1),
(2021, 'Perole', 19, 1),
(2022, 'Perumanna', 19, 1),
(2023, 'Perumbaikadu', 19, 1),
(2024, 'Perumbavoor', 19, 1),
(2025, 'Pinarayi', 19, 1),
(2026, 'Piravam', 19, 1),
(2027, 'Ponnani', 19, 1),
(2028, 'Pottore', 19, 1),
(2029, 'Pudukad', 19, 1),
(2030, 'Punalur', 19, 1),
(2031, 'Puranattukara', 19, 1),
(2032, 'Puthunagaram', 19, 1),
(2033, 'Puthuppariyaram', 19, 1),
(2034, 'Puzhathi', 19, 1),
(2035, 'Ramanattukara', 19, 1),
(2036, 'Shoranur', 19, 1),
(2037, 'Sultans Battery', 19, 1),
(2038, 'Sulthan Bathery', 19, 1),
(2039, 'Talipparamba', 19, 1),
(2040, 'Thaikkad', 19, 1);
INSERT INTO `cities` (`id`, `name`, `state_id`, `status`) VALUES
(2041, 'Thalassery', 19, 1),
(2042, 'Thannirmukkam', 19, 1),
(2043, 'Theyyalingal', 19, 1),
(2044, 'Thiruvalla', 19, 1),
(2045, 'Thiruvananthapuram', 19, 1),
(2046, 'Thiruvankulam', 19, 1),
(2047, 'Thodupuzha', 19, 1),
(2048, 'Thottada', 19, 1),
(2049, 'Thrippunithura', 19, 1),
(2050, 'Thrissur', 19, 1),
(2051, 'Tirur', 19, 1),
(2052, 'Udma', 19, 1),
(2053, 'Vadakara', 19, 1),
(2054, 'Vaikam', 19, 1),
(2055, 'Valapattam', 19, 1),
(2056, 'Vallachira', 19, 1),
(2057, 'Varam', 19, 1),
(2058, 'Varappuzha', 19, 1),
(2059, 'Varkala', 19, 1),
(2060, 'Vayalar', 19, 1),
(2061, 'Vazhakkala', 19, 1),
(2062, 'Venmanad', 19, 1),
(2063, 'Villiappally', 19, 1),
(2064, 'Wayanad', 19, 1),
(2065, 'Agethi', 20, 1),
(2066, 'Amini', 20, 1),
(2067, 'Androth Island', 20, 1),
(2068, 'Kavaratti', 20, 1),
(2069, 'Minicoy', 20, 1),
(2070, 'Agar', 21, 1),
(2071, 'Ajaigarh', 21, 1),
(2072, 'Akoda', 21, 1),
(2073, 'Akodia', 21, 1),
(2074, 'Alampur', 21, 1),
(2075, 'Alirajpur', 21, 1),
(2076, 'Alot', 21, 1),
(2077, 'Amanganj', 21, 1),
(2078, 'Amarkantak', 21, 1),
(2079, 'Amarpatan', 21, 1),
(2080, 'Amarwara', 21, 1),
(2081, 'Ambada', 21, 1),
(2082, 'Ambah', 21, 1),
(2083, 'Amla', 21, 1),
(2084, 'Amlai', 21, 1),
(2085, 'Anjad', 21, 1),
(2086, 'Antri', 21, 1),
(2087, 'Anuppur', 21, 1),
(2088, 'Aron', 21, 1),
(2089, 'Ashoknagar', 21, 1),
(2090, 'Ashta', 21, 1),
(2091, 'Babai', 21, 1),
(2092, 'Bada Malhera', 21, 1),
(2093, 'Badagaon', 21, 1),
(2094, 'Badagoan', 21, 1),
(2095, 'Badarwas', 21, 1),
(2096, 'Badawada', 21, 1),
(2097, 'Badi', 21, 1),
(2098, 'Badkuhi', 21, 1),
(2099, 'Badnagar', 21, 1),
(2100, 'Badnawar', 21, 1),
(2101, 'Badod', 21, 1),
(2102, 'Badoda', 21, 1),
(2103, 'Badra', 21, 1),
(2104, 'Bagh', 21, 1),
(2105, 'Bagli', 21, 1),
(2106, 'Baihar', 21, 1),
(2107, 'Baikunthpur', 21, 1),
(2108, 'Bakswaha', 21, 1),
(2109, 'Balaghat', 21, 1),
(2110, 'Baldeogarh', 21, 1),
(2111, 'Bamaniya', 21, 1),
(2112, 'Bamhani', 21, 1),
(2113, 'Bamor', 21, 1),
(2114, 'Bamora', 21, 1),
(2115, 'Banda', 21, 1),
(2116, 'Bangawan', 21, 1),
(2117, 'Bansatar Kheda', 21, 1),
(2118, 'Baraily', 21, 1),
(2119, 'Barela', 21, 1),
(2120, 'Barghat', 21, 1),
(2121, 'Bargi', 21, 1),
(2122, 'Barhi', 21, 1),
(2123, 'Barigarh', 21, 1),
(2124, 'Barwaha', 21, 1),
(2125, 'Barwani', 21, 1),
(2126, 'Basoda', 21, 1),
(2127, 'Begamganj', 21, 1),
(2128, 'Beohari', 21, 1),
(2129, 'Berasia', 21, 1),
(2130, 'Betma', 21, 1),
(2131, 'Betul', 21, 1),
(2132, 'Betul Bazar', 21, 1),
(2133, 'Bhainsdehi', 21, 1),
(2134, 'Bhamodi', 21, 1),
(2135, 'Bhander', 21, 1),
(2136, 'Bhanpura', 21, 1),
(2137, 'Bharveli', 21, 1),
(2138, 'Bhaurasa', 21, 1),
(2139, 'Bhavra', 21, 1),
(2140, 'Bhedaghat', 21, 1),
(2141, 'Bhikangaon', 21, 1),
(2142, 'Bhilakhedi', 21, 1),
(2143, 'Bhind', 21, 1),
(2144, 'Bhitarwar', 21, 1),
(2145, 'Bhopal', 21, 1),
(2146, 'Bhuibandh', 21, 1),
(2147, 'Biaora', 21, 1),
(2148, 'Bijawar', 21, 1),
(2149, 'Bijeypur', 21, 1),
(2150, 'Bijrauni', 21, 1),
(2151, 'Bijuri', 21, 1),
(2152, 'Bilaua', 21, 1),
(2153, 'Bilpura', 21, 1),
(2154, 'Bina Railway Colony', 21, 1),
(2155, 'Bina-Etawa', 21, 1),
(2156, 'Birsinghpur', 21, 1),
(2157, 'Boda', 21, 1),
(2158, 'Budhni', 21, 1),
(2159, 'Burhanpur', 21, 1),
(2160, 'Burhar', 21, 1),
(2161, 'Chachaura Binaganj', 21, 1),
(2162, 'Chakghat', 21, 1),
(2163, 'Chandameta Butar', 21, 1),
(2164, 'Chanderi', 21, 1),
(2165, 'Chandia', 21, 1),
(2166, 'Chandla', 21, 1),
(2167, 'Chaurai Khas', 21, 1),
(2168, 'Chhatarpur', 21, 1),
(2169, 'Chhindwara', 21, 1),
(2170, 'Chhota Chhindwara', 21, 1),
(2171, 'Chichli', 21, 1),
(2172, 'Chitrakut', 21, 1),
(2173, 'Churhat', 21, 1),
(2174, 'Daboh', 21, 1),
(2175, 'Dabra', 21, 1),
(2176, 'Damoh', 21, 1),
(2177, 'Damua', 21, 1),
(2178, 'Datia', 21, 1),
(2179, 'Deodara', 21, 1),
(2180, 'Deori', 21, 1),
(2181, 'Deori Khas', 21, 1),
(2182, 'Depalpur', 21, 1),
(2183, 'Devendranagar', 21, 1),
(2184, 'Devhara', 21, 1),
(2185, 'Dewas', 21, 1),
(2186, 'Dhamnod', 21, 1),
(2187, 'Dhana', 21, 1),
(2188, 'Dhanpuri', 21, 1),
(2189, 'Dhar', 21, 1),
(2190, 'Dharampuri', 21, 1),
(2191, 'Dighawani', 21, 1),
(2192, 'Diken', 21, 1),
(2193, 'Dindori', 21, 1),
(2194, 'Dola', 21, 1),
(2195, 'Dumar Kachhar', 21, 1),
(2196, 'Dungariya Chhapara', 21, 1),
(2197, 'Gadarwara', 21, 1),
(2198, 'Gairatganj', 21, 1),
(2199, 'Gandhi Sagar Hydel Colony', 21, 1),
(2200, 'Ganjbasoda', 21, 1),
(2201, 'Garhakota', 21, 1),
(2202, 'Garhi Malhara', 21, 1),
(2203, 'Garoth', 21, 1),
(2204, 'Gautapura', 21, 1),
(2205, 'Ghansor', 21, 1),
(2206, 'Ghuwara', 21, 1),
(2207, 'Gogaon', 21, 1),
(2208, 'Gogapur', 21, 1),
(2209, 'Gohad', 21, 1),
(2210, 'Gormi', 21, 1),
(2211, 'Govindgarh', 21, 1),
(2212, 'Guna', 21, 1),
(2213, 'Gurh', 21, 1),
(2214, 'Gwalior', 21, 1),
(2215, 'Hanumana', 21, 1),
(2216, 'Harda', 21, 1),
(2217, 'Harpalpur', 21, 1),
(2218, 'Harrai', 21, 1),
(2219, 'Harsud', 21, 1),
(2220, 'Hatod', 21, 1),
(2221, 'Hatpipalya', 21, 1),
(2222, 'Hatta', 21, 1),
(2223, 'Hindoria', 21, 1),
(2224, 'Hirapur', 21, 1),
(2225, 'Hoshangabad', 21, 1),
(2226, 'Ichhawar', 21, 1),
(2227, 'Iklehra', 21, 1),
(2228, 'Indergarh', 21, 1),
(2229, 'Indore', 21, 1),
(2230, 'Isagarh', 21, 1),
(2231, 'Itarsi', 21, 1),
(2232, 'Jabalpur', 21, 1),
(2233, 'Jabalpur Cantonment', 21, 1),
(2234, 'Jabalpur G.C.F', 21, 1),
(2235, 'Jaisinghnagar', 21, 1),
(2236, 'Jaithari', 21, 1),
(2237, 'Jaitwara', 21, 1),
(2238, 'Jamai', 21, 1),
(2239, 'Jaora', 21, 1),
(2240, 'Jatachhapar', 21, 1),
(2241, 'Jatara', 21, 1),
(2242, 'Jawad', 21, 1),
(2243, 'Jawar', 21, 1),
(2244, 'Jeronkhalsa', 21, 1),
(2245, 'Jhabua', 21, 1),
(2246, 'Jhundpura', 21, 1),
(2247, 'Jiran', 21, 1),
(2248, 'Jirapur', 21, 1),
(2249, 'Jobat', 21, 1),
(2250, 'Joura', 21, 1),
(2251, 'Kailaras', 21, 1),
(2252, 'Kaimur', 21, 1),
(2253, 'Kakarhati', 21, 1),
(2254, 'Kalichhapar', 21, 1),
(2255, 'Kanad', 21, 1),
(2256, 'Kannod', 21, 1),
(2257, 'Kantaphod', 21, 1),
(2258, 'Kareli', 21, 1),
(2259, 'Karera', 21, 1),
(2260, 'Kari', 21, 1),
(2261, 'Karnawad', 21, 1),
(2262, 'Karrapur', 21, 1),
(2263, 'Kasrawad', 21, 1),
(2264, 'Katangi', 21, 1),
(2265, 'Katni', 21, 1),
(2266, 'Kelhauri', 21, 1),
(2267, 'Khachrod', 21, 1),
(2268, 'Khajuraho', 21, 1),
(2269, 'Khamaria', 21, 1),
(2270, 'Khand', 21, 1),
(2271, 'Khandwa', 21, 1),
(2272, 'Khaniyadhana', 21, 1),
(2273, 'Khargapur', 21, 1),
(2274, 'Khargone', 21, 1),
(2275, 'Khategaon', 21, 1),
(2276, 'Khetia', 21, 1),
(2277, 'Khilchipur', 21, 1),
(2278, 'Khirkiya', 21, 1),
(2279, 'Khujner', 21, 1),
(2280, 'Khurai', 21, 1),
(2281, 'Kolaras', 21, 1),
(2282, 'Kotar', 21, 1),
(2283, 'Kothi', 21, 1),
(2284, 'Kotma', 21, 1),
(2285, 'Kukshi', 21, 1),
(2286, 'Kumbhraj', 21, 1),
(2287, 'Kurwai', 21, 1),
(2288, 'Lahar', 21, 1),
(2289, 'Lakhnadon', 21, 1),
(2290, 'Lateri', 21, 1),
(2291, 'Laundi', 21, 1),
(2292, 'Lidhora Khas', 21, 1),
(2293, 'Lodhikheda', 21, 1),
(2294, 'Loharda', 21, 1),
(2295, 'Machalpur', 21, 1),
(2296, 'Madhogarh', 21, 1),
(2297, 'Maharajpur', 21, 1),
(2298, 'Maheshwar', 21, 1),
(2299, 'Mahidpur', 21, 1),
(2300, 'Maihar', 21, 1),
(2301, 'Majholi', 21, 1),
(2302, 'Makronia', 21, 1),
(2303, 'Maksi', 21, 1),
(2304, 'Malaj Khand', 21, 1),
(2305, 'Malanpur', 21, 1),
(2306, 'Malhargarh', 21, 1),
(2307, 'Manasa', 21, 1),
(2308, 'Manawar', 21, 1),
(2309, 'Mandav', 21, 1),
(2310, 'Mandideep', 21, 1),
(2311, 'Mandla', 21, 1),
(2312, 'Mandleshwar', 21, 1),
(2313, 'Mandsaur', 21, 1),
(2314, 'Manegaon', 21, 1),
(2315, 'Mangawan', 21, 1),
(2316, 'Manglaya Sadak', 21, 1),
(2317, 'Manpur', 21, 1),
(2318, 'Mau', 21, 1),
(2319, 'Mauganj', 21, 1),
(2320, 'Meghnagar', 21, 1),
(2321, 'Mehara Gaon', 21, 1),
(2322, 'Mehgaon', 21, 1),
(2323, 'Mhaugaon', 21, 1),
(2324, 'Mhow', 21, 1),
(2325, 'Mihona', 21, 1),
(2326, 'Mohgaon', 21, 1),
(2327, 'Morar', 21, 1),
(2328, 'Morena', 21, 1),
(2329, 'Morwa', 21, 1),
(2330, 'Multai', 21, 1),
(2331, 'Mundi', 21, 1),
(2332, 'Mungaoli', 21, 1),
(2333, 'Murwara', 21, 1),
(2334, 'Nagda', 21, 1),
(2335, 'Nagod', 21, 1),
(2336, 'Nagri', 21, 1),
(2337, 'Naigarhi', 21, 1),
(2338, 'Nainpur', 21, 1),
(2339, 'Nalkheda', 21, 1),
(2340, 'Namli', 21, 1),
(2341, 'Narayangarh', 21, 1),
(2342, 'Narsimhapur', 21, 1),
(2343, 'Narsingarh', 21, 1),
(2344, 'Narsinghpur', 21, 1),
(2345, 'Narwar', 21, 1),
(2346, 'Nasrullaganj', 21, 1),
(2347, 'Naudhia', 21, 1),
(2348, 'Naugaon', 21, 1),
(2349, 'Naurozabad', 21, 1),
(2350, 'Neemuch', 21, 1),
(2351, 'Nepa Nagar', 21, 1),
(2352, 'Neuton Chikhli Kalan', 21, 1),
(2353, 'Nimach', 21, 1),
(2354, 'Niwari', 21, 1),
(2355, 'Obedullaganj', 21, 1),
(2356, 'Omkareshwar', 21, 1),
(2357, 'Orachha', 21, 1),
(2358, 'Ordinance Factory Itarsi', 21, 1),
(2359, 'Pachmarhi', 21, 1),
(2360, 'Pachmarhi Cantonment', 21, 1),
(2361, 'Pachore', 21, 1),
(2362, 'Palchorai', 21, 1),
(2363, 'Palda', 21, 1),
(2364, 'Palera', 21, 1),
(2365, 'Pali', 21, 1),
(2366, 'Panagar', 21, 1),
(2367, 'Panara', 21, 1),
(2368, 'Pandaria', 21, 1),
(2369, 'Pandhana', 21, 1),
(2370, 'Pandhurna', 21, 1),
(2371, 'Panna', 21, 1),
(2372, 'Pansemal', 21, 1),
(2373, 'Parasia', 21, 1),
(2374, 'Pasan', 21, 1),
(2375, 'Patan', 21, 1),
(2376, 'Patharia', 21, 1),
(2377, 'Pawai', 21, 1),
(2378, 'Petlawad', 21, 1),
(2379, 'Phuph Kalan', 21, 1),
(2380, 'Pichhore', 21, 1),
(2381, 'Pipariya', 21, 1),
(2382, 'Pipliya Mandi', 21, 1),
(2383, 'Piploda', 21, 1),
(2384, 'Pithampur', 21, 1),
(2385, 'Polay Kalan', 21, 1),
(2386, 'Porsa', 21, 1),
(2387, 'Prithvipur', 21, 1),
(2388, 'Raghogarh', 21, 1),
(2389, 'Rahatgarh', 21, 1),
(2390, 'Raisen', 21, 1),
(2391, 'Rajakhedi', 21, 1),
(2392, 'Rajgarh', 21, 1),
(2393, 'Rajnagar', 21, 1),
(2394, 'Rajpur', 21, 1),
(2395, 'Rampur Baghelan', 21, 1),
(2396, 'Rampur Naikin', 21, 1),
(2397, 'Rampura', 21, 1),
(2398, 'Ranapur', 21, 1),
(2399, 'Ranipura', 21, 1),
(2400, 'Ratangarh', 21, 1),
(2401, 'Ratlam', 21, 1),
(2402, 'Ratlam Kasba', 21, 1),
(2403, 'Rau', 21, 1),
(2404, 'Rehli', 21, 1),
(2405, 'Rehti', 21, 1),
(2406, 'Rewa', 21, 1),
(2407, 'Sabalgarh', 21, 1),
(2408, 'Sagar', 21, 1),
(2409, 'Sagar Cantonment', 21, 1),
(2410, 'Sailana', 21, 1),
(2411, 'Sanawad', 21, 1),
(2412, 'Sanchi', 21, 1),
(2413, 'Sanwer', 21, 1),
(2414, 'Sarangpur', 21, 1),
(2415, 'Sardarpur', 21, 1),
(2416, 'Sarni', 21, 1),
(2417, 'Satai', 21, 1),
(2418, 'Satna', 21, 1),
(2419, 'Satwas', 21, 1),
(2420, 'Sausar', 21, 1),
(2421, 'Sehore', 21, 1),
(2422, 'Semaria', 21, 1),
(2423, 'Sendhwa', 21, 1),
(2424, 'Seondha', 21, 1),
(2425, 'Seoni', 21, 1),
(2426, 'Seoni Malwa', 21, 1),
(2427, 'Sethia', 21, 1),
(2428, 'Shahdol', 21, 1),
(2429, 'Shahgarh', 21, 1),
(2430, 'Shahpur', 21, 1),
(2431, 'Shahpura', 21, 1),
(2432, 'Shajapur', 21, 1),
(2433, 'Shamgarh', 21, 1),
(2434, 'Sheopur', 21, 1),
(2435, 'Shivpuri', 21, 1),
(2436, 'Shujalpur', 21, 1),
(2437, 'Sidhi', 21, 1),
(2438, 'Sihora', 21, 1),
(2439, 'Singolo', 21, 1),
(2440, 'Singrauli', 21, 1),
(2441, 'Sinhasa', 21, 1),
(2442, 'Sirgora', 21, 1),
(2443, 'Sirmaur', 21, 1),
(2444, 'Sironj', 21, 1),
(2445, 'Sitamau', 21, 1),
(2446, 'Sohagpur', 21, 1),
(2447, 'Sonkatch', 21, 1),
(2448, 'Soyatkalan', 21, 1),
(2449, 'Suhagi', 21, 1),
(2450, 'Sultanpur', 21, 1),
(2451, 'Susner', 21, 1),
(2452, 'Suthaliya', 21, 1),
(2453, 'Tal', 21, 1),
(2454, 'Talen', 21, 1),
(2455, 'Tarana', 21, 1),
(2456, 'Taricharkalan', 21, 1),
(2457, 'Tekanpur', 21, 1),
(2458, 'Tendukheda', 21, 1),
(2459, 'Teonthar', 21, 1),
(2460, 'Thandia', 21, 1),
(2461, 'Tikamgarh', 21, 1),
(2462, 'Timarni', 21, 1),
(2463, 'Tirodi', 21, 1),
(2464, 'Udaipura', 21, 1),
(2465, 'Ujjain', 21, 1),
(2466, 'Ukwa', 21, 1),
(2467, 'Umaria', 21, 1),
(2468, 'Unchahara', 21, 1),
(2469, 'Unhel', 21, 1),
(2470, 'Vehicle Factory Jabalpur', 21, 1),
(2471, 'Vidisha', 21, 1),
(2472, 'Vijayraghavgarh', 21, 1),
(2473, 'Waraseoni', 21, 1),
(2474, 'Achalpur', 22, 1),
(2475, 'Aheri', 22, 1),
(2476, 'Ahmadnagar Cantonment', 22, 1),
(2477, 'Ahmadpur', 22, 1),
(2478, 'Ahmednagar', 22, 1),
(2479, 'Ajra', 22, 1),
(2480, 'Akalkot', 22, 1),
(2481, 'Akkalkuwa', 22, 1),
(2482, 'Akola', 22, 1),
(2483, 'Akot', 22, 1),
(2484, 'Alandi', 22, 1),
(2485, 'Alibag', 22, 1),
(2486, 'Allapalli', 22, 1),
(2487, 'Alore', 22, 1),
(2488, 'Amalner', 22, 1),
(2489, 'Ambad', 22, 1),
(2490, 'Ambajogai', 22, 1),
(2491, 'Ambernath', 22, 1),
(2492, 'Ambivali Tarf Wankhal', 22, 1),
(2493, 'Amgaon', 22, 1),
(2494, 'Amravati', 22, 1),
(2495, 'Anjangaon', 22, 1),
(2496, 'Arvi', 22, 1),
(2497, 'Ashta', 22, 1),
(2498, 'Ashti', 22, 1),
(2499, 'Aurangabad', 22, 1),
(2500, 'Aurangabad Cantonment', 22, 1),
(2501, 'Ausa', 22, 1),
(2502, 'Babhulgaon', 22, 1),
(2503, 'Badlapur', 22, 1),
(2504, 'Balapur', 22, 1),
(2505, 'Ballarpur', 22, 1),
(2506, 'Baramati', 22, 1),
(2507, 'Barshi', 22, 1),
(2508, 'Basmat', 22, 1),
(2509, 'Beed', 22, 1),
(2510, 'Bhadravati', 22, 1),
(2511, 'Bhagur', 22, 1),
(2512, 'Bhandara', 22, 1),
(2513, 'Bhigvan', 22, 1),
(2514, 'Bhingar', 22, 1),
(2515, 'Bhiwandi', 22, 1),
(2516, 'Bhokhardan', 22, 1),
(2517, 'Bhor', 22, 1),
(2518, 'Bhosari', 22, 1),
(2519, 'Bhum', 22, 1),
(2520, 'Bhusawal', 22, 1),
(2521, 'Bid', 22, 1),
(2522, 'Biloli', 22, 1),
(2523, 'Birwadi', 22, 1),
(2524, 'Boisar', 22, 1),
(2525, 'Bop Khel', 22, 1),
(2526, 'Brahmapuri', 22, 1),
(2527, 'Budhgaon', 22, 1),
(2528, 'Buldana', 22, 1),
(2529, 'Buldhana', 22, 1),
(2530, 'Butibori', 22, 1),
(2531, 'Chakan', 22, 1),
(2532, 'Chalisgaon', 22, 1),
(2533, 'Chandrapur', 22, 1),
(2534, 'Chandur', 22, 1),
(2535, 'Chandur Bazar', 22, 1),
(2536, 'Chandvad', 22, 1),
(2537, 'Chicholi', 22, 1),
(2538, 'Chikhala', 22, 1),
(2539, 'Chikhaldara', 22, 1),
(2540, 'Chikhli', 22, 1),
(2541, 'Chinchani', 22, 1),
(2542, 'Chinchwad', 22, 1),
(2543, 'Chiplun', 22, 1),
(2544, 'Chopda', 22, 1),
(2545, 'Dabhol', 22, 1),
(2546, 'Dahance', 22, 1),
(2547, 'Dahanu', 22, 1),
(2548, 'Daharu', 22, 1),
(2549, 'Dapoli Camp', 22, 1),
(2550, 'Darwa', 22, 1),
(2551, 'Daryapur', 22, 1),
(2552, 'Dattapur', 22, 1),
(2553, 'Daund', 22, 1),
(2554, 'Davlameti', 22, 1),
(2555, 'Deglur', 22, 1),
(2556, 'Dehu Road', 22, 1),
(2557, 'Deolali', 22, 1),
(2558, 'Deolali Pravara', 22, 1),
(2559, 'Deoli', 22, 1),
(2560, 'Desaiganj', 22, 1),
(2561, 'Deulgaon Raja', 22, 1),
(2562, 'Dewhadi', 22, 1),
(2563, 'Dharangaon', 22, 1),
(2564, 'Dharmabad', 22, 1),
(2565, 'Dharur', 22, 1),
(2566, 'Dhatau', 22, 1),
(2567, 'Dhule', 22, 1),
(2568, 'Digdoh', 22, 1),
(2569, 'Diglur', 22, 1),
(2570, 'Digras', 22, 1),
(2571, 'Dombivli', 22, 1),
(2572, 'Dondaicha', 22, 1),
(2573, 'Dudhani', 22, 1),
(2574, 'Durgapur', 22, 1),
(2575, 'Dyane', 22, 1),
(2576, 'Edandol', 22, 1),
(2577, 'Eklahare', 22, 1),
(2578, 'Faizpur', 22, 1),
(2579, 'Fekari', 22, 1),
(2580, 'Gadchiroli', 22, 1),
(2581, 'Gadhinghaj', 22, 1),
(2582, 'Gandhi Nagar', 22, 1),
(2583, 'Ganeshpur', 22, 1),
(2584, 'Gangakher', 22, 1),
(2585, 'Gangapur', 22, 1),
(2586, 'Gevrai', 22, 1),
(2587, 'Ghatanji', 22, 1),
(2588, 'Ghoti', 22, 1),
(2589, 'Ghugus', 22, 1),
(2590, 'Ghulewadi', 22, 1),
(2591, 'Godoli', 22, 1),
(2592, 'Gondia', 22, 1),
(2593, 'Guhagar', 22, 1),
(2594, 'Hadgaon', 22, 1),
(2595, 'Harnai Beach', 22, 1),
(2596, 'Hinganghat', 22, 1),
(2597, 'Hingoli', 22, 1),
(2598, 'Hupari', 22, 1),
(2599, 'Ichalkaranji', 22, 1),
(2600, 'Igatpuri', 22, 1),
(2601, 'Indapur', 22, 1),
(2602, 'Jaisinghpur', 22, 1),
(2603, 'Jalgaon', 22, 1),
(2604, 'Jalna', 22, 1),
(2605, 'Jamkhed', 22, 1),
(2606, 'Jawhar', 22, 1),
(2607, 'Jaysingpur', 22, 1),
(2608, 'Jejuri', 22, 1),
(2609, 'Jintur', 22, 1),
(2610, 'Junnar', 22, 1),
(2611, 'Kabnur', 22, 1),
(2612, 'Kagal', 22, 1),
(2613, 'Kalamb', 22, 1),
(2614, 'Kalamnuri', 22, 1),
(2615, 'Kalas', 22, 1),
(2616, 'Kalmeshwar', 22, 1),
(2617, 'Kalundre', 22, 1),
(2618, 'Kalyan', 22, 1),
(2619, 'Kamthi', 22, 1),
(2620, 'Kamthi Cantonment', 22, 1),
(2621, 'Kandari', 22, 1),
(2622, 'Kandhar', 22, 1),
(2623, 'Kandri', 22, 1),
(2624, 'Kandri II', 22, 1),
(2625, 'Kanhan', 22, 1),
(2626, 'Kankavli', 22, 1),
(2627, 'Kannad', 22, 1),
(2628, 'Karad', 22, 1),
(2629, 'Karanja', 22, 1),
(2630, 'Karanje Tarf', 22, 1),
(2631, 'Karivali', 22, 1),
(2632, 'Karjat', 22, 1),
(2633, 'Karmala', 22, 1),
(2634, 'Kasara Budruk', 22, 1),
(2635, 'Katai', 22, 1),
(2636, 'Katkar', 22, 1),
(2637, 'Katol', 22, 1),
(2638, 'Kegaon', 22, 1),
(2639, 'Khadkale', 22, 1),
(2640, 'Khadki', 22, 1),
(2641, 'Khamgaon', 22, 1),
(2642, 'Khapa', 22, 1),
(2643, 'Kharadi', 22, 1),
(2644, 'Kharakvasla', 22, 1),
(2645, 'Khed', 22, 1),
(2646, 'Kherdi', 22, 1),
(2647, 'Khoni', 22, 1),
(2648, 'Khopoli', 22, 1),
(2649, 'Khuldabad', 22, 1),
(2650, 'Kinwat', 22, 1),
(2651, 'Kodoli', 22, 1),
(2652, 'Kolhapur', 22, 1),
(2653, 'Kon', 22, 1),
(2654, 'Kondumal', 22, 1),
(2655, 'Kopargaon', 22, 1),
(2656, 'Kopharad', 22, 1),
(2657, 'Koradi', 22, 1),
(2658, 'Koregaon', 22, 1),
(2659, 'Korochi', 22, 1),
(2660, 'Kudal', 22, 1),
(2661, 'Kundaim', 22, 1),
(2662, 'Kundalwadi', 22, 1),
(2663, 'Kurandvad', 22, 1),
(2664, 'Kurduvadi', 22, 1),
(2665, 'Kusgaon Budruk', 22, 1),
(2666, 'Lanja', 22, 1),
(2667, 'Lasalgaon', 22, 1),
(2668, 'Latur', 22, 1),
(2669, 'Loha', 22, 1),
(2670, 'Lohegaon', 22, 1),
(2671, 'Lonar', 22, 1),
(2672, 'Lonavala', 22, 1),
(2673, 'Madhavnagar', 22, 1),
(2674, 'Mahabaleshwar', 22, 1),
(2675, 'Mahad', 22, 1),
(2676, 'Mahadula', 22, 1),
(2677, 'Maindargi', 22, 1),
(2678, 'Majalgaon', 22, 1),
(2679, 'Malegaon', 22, 1),
(2680, 'Malgaon', 22, 1),
(2681, 'Malkapur', 22, 1),
(2682, 'Malwan', 22, 1),
(2683, 'Manadur', 22, 1),
(2684, 'Manchar', 22, 1),
(2685, 'Mangalvedhe', 22, 1),
(2686, 'Mangrul Pir', 22, 1),
(2687, 'Manmad', 22, 1),
(2688, 'Manor', 22, 1),
(2689, 'Mansar', 22, 1),
(2690, 'Manwath', 22, 1),
(2691, 'Mapuca', 22, 1),
(2692, 'Matheran', 22, 1),
(2693, 'Mehkar', 22, 1),
(2694, 'Mhasla', 22, 1),
(2695, 'Mhaswad', 22, 1),
(2696, 'Mira Bhayandar', 22, 1),
(2697, 'Miraj', 22, 1),
(2698, 'Mohpa', 22, 1),
(2699, 'Mohpada', 22, 1),
(2700, 'Moram', 22, 1),
(2701, 'Morshi', 22, 1),
(2702, 'Mowad', 22, 1),
(2703, 'Mudkhed', 22, 1),
(2704, 'Mukhed', 22, 1),
(2705, 'Mul', 22, 1),
(2706, 'Mulshi', 22, 1),
(2707, 'Mumbai', 22, 1),
(2708, 'Murbad', 22, 1),
(2709, 'Murgud', 22, 1),
(2710, 'Murtijapur', 22, 1),
(2711, 'Murud', 22, 1),
(2712, 'Nachane', 22, 1),
(2713, 'Nagardeole', 22, 1),
(2714, 'Nagothane', 22, 1),
(2715, 'Nagpur', 22, 1),
(2716, 'Nakoda', 22, 1),
(2717, 'Nalasopara', 22, 1),
(2718, 'Naldurg', 22, 1),
(2719, 'Nanded', 22, 1),
(2720, 'Nandgaon', 22, 1),
(2721, 'Nandura', 22, 1),
(2722, 'Nandurbar', 22, 1),
(2723, 'Narkhed', 22, 1),
(2724, 'Nashik', 22, 1),
(2725, 'Navapur', 22, 1),
(2726, 'Navi Mumbai', 22, 1),
(2727, 'Navi Mumbai Panvel', 22, 1),
(2728, 'Neral', 22, 1),
(2729, 'Nigdi', 22, 1),
(2730, 'Nilanga', 22, 1),
(2731, 'Nildoh', 22, 1),
(2732, 'Nimbhore', 22, 1),
(2733, 'Ojhar', 22, 1),
(2734, 'Osmanabad', 22, 1),
(2735, 'Pachgaon', 22, 1),
(2736, 'Pachora', 22, 1),
(2737, 'Padagha', 22, 1),
(2738, 'Paithan', 22, 1),
(2739, 'Palghar', 22, 1),
(2740, 'Pali', 22, 1),
(2741, 'Panchgani', 22, 1),
(2742, 'Pandhakarwada', 22, 1),
(2743, 'Pandharpur', 22, 1),
(2744, 'Panhala', 22, 1),
(2745, 'Panvel', 22, 1),
(2746, 'Paranda', 22, 1),
(2747, 'Parbhani', 22, 1),
(2748, 'Parli', 22, 1),
(2749, 'Parola', 22, 1),
(2750, 'Partur', 22, 1),
(2751, 'Pasthal', 22, 1),
(2752, 'Patan', 22, 1),
(2753, 'Pathardi', 22, 1),
(2754, 'Pathri', 22, 1),
(2755, 'Patur', 22, 1),
(2756, 'Pawni', 22, 1),
(2757, 'Pen', 22, 1),
(2758, 'Pethumri', 22, 1),
(2759, 'Phaltan', 22, 1),
(2760, 'Pimpri', 22, 1),
(2761, 'Poladpur', 22, 1),
(2762, 'Pulgaon', 22, 1),
(2763, 'Pune', 22, 1),
(2764, 'Pune Cantonment', 22, 1),
(2765, 'Purna', 22, 1),
(2766, 'Purushottamnagar', 22, 1),
(2767, 'Pusad', 22, 1),
(2768, 'Rahimatpur', 22, 1),
(2769, 'Rahta Pimplas', 22, 1),
(2770, 'Rahuri', 22, 1),
(2771, 'Raigad', 22, 1),
(2772, 'Rajapur', 22, 1),
(2773, 'Rajgurunagar', 22, 1),
(2774, 'Rajur', 22, 1),
(2775, 'Rajura', 22, 1),
(2776, 'Ramtek', 22, 1),
(2777, 'Ratnagiri', 22, 1),
(2778, 'Ravalgaon', 22, 1),
(2779, 'Raver', 22, 1),
(2780, 'Revadanda', 22, 1),
(2781, 'Risod', 22, 1),
(2782, 'Roha Ashtami', 22, 1),
(2783, 'Sakri', 22, 1),
(2784, 'Sandor', 22, 1),
(2785, 'Sangamner', 22, 1),
(2786, 'Sangli', 22, 1),
(2787, 'Sangole', 22, 1),
(2788, 'Sasti', 22, 1),
(2789, 'Sasvad', 22, 1),
(2790, 'Satana', 22, 1),
(2791, 'Satara', 22, 1),
(2792, 'Savantvadi', 22, 1),
(2793, 'Savda', 22, 1),
(2794, 'Savner', 22, 1),
(2795, 'Sawari Jawharnagar', 22, 1),
(2796, 'Selu', 22, 1),
(2797, 'Shahada', 22, 1),
(2798, 'Shahapur', 22, 1),
(2799, 'Shegaon', 22, 1),
(2800, 'Shelar', 22, 1),
(2801, 'Shendurjana', 22, 1),
(2802, 'Shirdi', 22, 1),
(2803, 'Shirgaon', 22, 1),
(2804, 'Shirpur', 22, 1),
(2805, 'Shirur', 22, 1),
(2806, 'Shirwal', 22, 1),
(2807, 'Shivatkar', 22, 1),
(2808, 'Shrigonda', 22, 1),
(2809, 'Shrirampur', 22, 1),
(2810, 'Shrirampur Rural', 22, 1),
(2811, 'Sillewada', 22, 1),
(2812, 'Sillod', 22, 1),
(2813, 'Sindhudurg', 22, 1),
(2814, 'Sindi', 22, 1),
(2815, 'Sindi Turf Hindnagar', 22, 1),
(2816, 'Sindkhed Raja', 22, 1),
(2817, 'Singnapur', 22, 1),
(2818, 'Sinnar', 22, 1),
(2819, 'Sirur', 22, 1),
(2820, 'Sitasawangi', 22, 1),
(2821, 'Solapur', 22, 1),
(2822, 'Sonai', 22, 1),
(2823, 'Sonegaon', 22, 1),
(2824, 'Soyagaon', 22, 1),
(2825, 'Srivardhan', 22, 1),
(2826, 'Surgana', 22, 1),
(2827, 'Talegaon Dabhade', 22, 1),
(2828, 'Taloda', 22, 1),
(2829, 'Taloja', 22, 1),
(2830, 'Talwade', 22, 1),
(2831, 'Tarapur', 22, 1),
(2832, 'Tasgaon', 22, 1),
(2833, 'Tathavade', 22, 1),
(2834, 'Tekadi', 22, 1),
(2835, 'Telhara', 22, 1),
(2836, 'Thane', 22, 1),
(2837, 'Tirira', 22, 1),
(2838, 'Totaladoh', 22, 1),
(2839, 'Trimbak', 22, 1),
(2840, 'Tuljapur', 22, 1),
(2841, 'Tumsar', 22, 1),
(2842, 'Uchgaon', 22, 1),
(2843, 'Udgir', 22, 1),
(2844, 'Ulhasnagar', 22, 1),
(2845, 'Umarga', 22, 1),
(2846, 'Umarkhed', 22, 1),
(2847, 'Umarsara', 22, 1),
(2848, 'Umbar Pada Nandade', 22, 1),
(2849, 'Umred', 22, 1),
(2850, 'Umri Pragane Balapur', 22, 1),
(2851, 'Uran', 22, 1),
(2852, 'Uran Islampur', 22, 1),
(2853, 'Utekhol', 22, 1),
(2854, 'Vada', 22, 1),
(2855, 'Vadgaon', 22, 1),
(2856, 'Vadgaon Kasba', 22, 1),
(2857, 'Vaijapur', 22, 1),
(2858, 'Vanvadi', 22, 1),
(2859, 'Varangaon', 22, 1),
(2860, 'Vasai', 22, 1),
(2861, 'Vasantnagar', 22, 1),
(2862, 'Vashind', 22, 1),
(2863, 'Vengurla', 22, 1),
(2864, 'Virar', 22, 1),
(2865, 'Visapur', 22, 1),
(2866, 'Vite', 22, 1),
(2867, 'Vithalwadi', 22, 1),
(2868, 'Wadi', 22, 1),
(2869, 'Waghapur', 22, 1),
(2870, 'Wai', 22, 1),
(2871, 'Wajegaon', 22, 1),
(2872, 'Walani', 22, 1),
(2873, 'Wanadongri', 22, 1),
(2874, 'Wani', 22, 1),
(2875, 'Wardha', 22, 1),
(2876, 'Warora', 22, 1),
(2877, 'Warthi', 22, 1),
(2878, 'Warud', 22, 1),
(2879, 'Washim', 22, 1),
(2880, 'Yaval', 22, 1),
(2881, 'Yavatmal', 22, 1),
(2882, 'Yeola', 22, 1),
(2883, 'Yerkheda', 22, 1),
(2884, 'Andro', 23, 1),
(2885, 'Bijoy Govinda', 23, 1),
(2886, 'Bishnupur', 23, 1),
(2887, 'Churachandpur', 23, 1),
(2888, 'Heriok', 23, 1),
(2889, 'Imphal', 23, 1),
(2890, 'Jiribam', 23, 1),
(2891, 'Kakching', 23, 1),
(2892, 'Kakching Khunou', 23, 1),
(2893, 'Khongman', 23, 1),
(2894, 'Kumbi', 23, 1),
(2895, 'Kwakta', 23, 1),
(2896, 'Lamai', 23, 1),
(2897, 'Lamjaotongba', 23, 1),
(2898, 'Lamshang', 23, 1),
(2899, 'Lilong', 23, 1),
(2900, 'Mayang Imphal', 23, 1),
(2901, 'Moirang', 23, 1),
(2902, 'Moreh', 23, 1),
(2903, 'Nambol', 23, 1),
(2904, 'Naoriya Pakhanglakpa', 23, 1),
(2905, 'Ningthoukhong', 23, 1),
(2906, 'Oinam', 23, 1),
(2907, 'Porompat', 23, 1),
(2908, 'Samurou', 23, 1),
(2909, 'Sekmai Bazar', 23, 1),
(2910, 'Senapati', 23, 1),
(2911, 'Sikhong Sekmai', 23, 1),
(2912, 'Sugnu', 23, 1),
(2913, 'Thongkhong Laxmi Bazar', 23, 1),
(2914, 'Thoubal', 23, 1),
(2915, 'Torban', 23, 1),
(2916, 'Wangjing', 23, 1),
(2917, 'Wangoi', 23, 1),
(2918, 'Yairipok', 23, 1),
(2919, 'Baghmara', 24, 1),
(2920, 'Cherrapunji', 24, 1),
(2921, 'Jawai', 24, 1),
(2922, 'Madanrting', 24, 1),
(2923, 'Mairang', 24, 1),
(2924, 'Mawlai', 24, 1),
(2925, 'Nongmynsong', 24, 1),
(2926, 'Nongpoh', 24, 1),
(2927, 'Nongstoin', 24, 1),
(2928, 'Nongthymmai', 24, 1),
(2929, 'Pynthorumkhrah', 24, 1),
(2930, 'Resubelpara', 24, 1),
(2931, 'Shillong', 24, 1),
(2932, 'Shillong Cantonment', 24, 1),
(2933, 'Tura', 24, 1),
(2934, 'Williamnagar', 24, 1),
(2935, 'Aizawl', 25, 1),
(2936, 'Bairabi', 25, 1),
(2937, 'Biate', 25, 1),
(2938, 'Champhai', 25, 1),
(2939, 'Darlawn', 25, 1),
(2940, 'Hnahthial', 25, 1),
(2941, 'Kawnpui', 25, 1),
(2942, 'Khawhai', 25, 1),
(2943, 'Khawzawl', 25, 1),
(2944, 'Kolasib', 25, 1),
(2945, 'Lengpui', 25, 1),
(2946, 'Lunglei', 25, 1),
(2947, 'Mamit', 25, 1),
(2948, 'North Vanlaiphai', 25, 1),
(2949, 'Saiha', 25, 1),
(2950, 'Sairang', 25, 1),
(2951, 'Saitul', 25, 1),
(2952, 'Serchhip', 25, 1),
(2953, 'Thenzawl', 25, 1),
(2954, 'Tlabung', 25, 1),
(2955, 'Vairengte', 25, 1),
(2956, 'Zawlnuam', 25, 1),
(2957, 'Chumukedima', 26, 1),
(2958, 'Dimapur', 26, 1),
(2959, 'Kohima', 26, 1),
(2960, 'Mokokchung', 26, 1),
(2961, 'Mon', 26, 1),
(2962, 'Phek', 26, 1),
(2963, 'Tuensang', 26, 1),
(2964, 'Wokha', 26, 1),
(2965, 'Zunheboto', 26, 1),
(2966, 'Anandapur', 29, 1),
(2967, 'Angul', 29, 1),
(2968, 'Aska', 29, 1),
(2969, 'Athgarh', 29, 1),
(2970, 'Athmallik', 29, 1),
(2971, 'Balagoda', 29, 1),
(2972, 'Balangir', 29, 1),
(2973, 'Balasore', 29, 1),
(2974, 'Baleshwar', 29, 1),
(2975, 'Balimeta', 29, 1),
(2976, 'Balugaon', 29, 1),
(2977, 'Banapur', 29, 1),
(2978, 'Bangura', 29, 1),
(2979, 'Banki', 29, 1),
(2980, 'Banposh', 29, 1),
(2981, 'Barbil', 29, 1),
(2982, 'Bargarh', 29, 1),
(2983, 'Baripada', 29, 1),
(2984, 'Barpali', 29, 1),
(2985, 'Basudebpur', 29, 1),
(2986, 'Baudh', 29, 1),
(2987, 'Belagachhia', 29, 1),
(2988, 'Belaguntha', 29, 1),
(2989, 'Belpahar', 29, 1),
(2990, 'Berhampur', 29, 1),
(2991, 'Bhadrak', 29, 1),
(2992, 'Bhanjanagar', 29, 1),
(2993, 'Bhawanipatna', 29, 1),
(2994, 'Bhuban', 29, 1),
(2995, 'Bhubaneswar', 29, 1),
(2996, 'Binika', 29, 1),
(2997, 'Birmitrapur', 29, 1),
(2998, 'Bishama Katek', 29, 1),
(2999, 'Bolangir', 29, 1),
(3000, 'Brahmapur', 29, 1),
(3001, 'Brajrajnagar', 29, 1),
(3002, 'Buguda', 29, 1),
(3003, 'Burla', 29, 1),
(3004, 'Byasanagar', 29, 1),
(3005, 'Champua', 29, 1),
(3006, 'Chandapur', 29, 1),
(3007, 'Chandbali', 29, 1),
(3008, 'Chandili', 29, 1),
(3009, 'Charibatia', 29, 1),
(3010, 'Chatrapur', 29, 1),
(3011, 'Chikitigarh', 29, 1),
(3012, 'Chitrakonda', 29, 1),
(3013, 'Choudwar', 29, 1),
(3014, 'Cuttack', 29, 1),
(3015, 'Dadhapatna', 29, 1),
(3016, 'Daitari', 29, 1),
(3017, 'Damanjodi', 29, 1),
(3018, 'Deogarh', 29, 1),
(3019, 'Deracolliery', 29, 1),
(3020, 'Dhamanagar', 29, 1),
(3021, 'Dhenkanal', 29, 1),
(3022, 'Digapahandi', 29, 1),
(3023, 'Dungamal', 29, 1),
(3024, 'Fertilizer Corporation of Indi', 29, 1),
(3025, 'Ganjam', 29, 1),
(3026, 'Ghantapada', 29, 1),
(3027, 'Gopalpur', 29, 1),
(3028, 'Gudari', 29, 1),
(3029, 'Gunupur', 29, 1),
(3030, 'Hatibandha', 29, 1),
(3031, 'Hinjilikatu', 29, 1),
(3032, 'Hirakud', 29, 1),
(3033, 'Jagatsinghapur', 29, 1),
(3034, 'Jajpur', 29, 1),
(3035, 'Jalda', 29, 1),
(3036, 'Jaleswar', 29, 1),
(3037, 'Jatni', 29, 1),
(3038, 'Jaypur', 29, 1),
(3039, 'Jeypore', 29, 1),
(3040, 'Jharsuguda', 29, 1),
(3041, 'Jhumpura', 29, 1),
(3042, 'Joda', 29, 1),
(3043, 'Junagarh', 29, 1),
(3044, 'Kamakhyanagar', 29, 1),
(3045, 'Kantabanji', 29, 1),
(3046, 'Kantilo', 29, 1),
(3047, 'Karanja', 29, 1),
(3048, 'Kashinagara', 29, 1),
(3049, 'Kataka', 29, 1),
(3050, 'Kavisuryanagar', 29, 1),
(3051, 'Kendrapara', 29, 1),
(3052, 'Kendujhar', 29, 1),
(3053, 'Keonjhar', 29, 1),
(3054, 'Kesinga', 29, 1),
(3055, 'Khaliapali', 29, 1),
(3056, 'Khalikote', 29, 1),
(3057, 'Khandaparha', 29, 1),
(3058, 'Kharhial', 29, 1),
(3059, 'Kharhial Road', 29, 1),
(3060, 'Khatiguda', 29, 1),
(3061, 'Khurda', 29, 1),
(3062, 'Kochinda', 29, 1),
(3063, 'Kodala', 29, 1),
(3064, 'Konark', 29, 1),
(3065, 'Koraput', 29, 1),
(3066, 'Kotaparh', 29, 1),
(3067, 'Lanjigarh', 29, 1),
(3068, 'Lattikata', 29, 1),
(3069, 'Makundapur', 29, 1),
(3070, 'Malkangiri', 29, 1),
(3071, 'Mukhiguda', 29, 1),
(3072, 'Nabarangpur', 29, 1),
(3073, 'Nalco', 29, 1),
(3074, 'Naurangapur', 29, 1),
(3075, 'Nayagarh', 29, 1),
(3076, 'Nilagiri', 29, 1),
(3077, 'Nimaparha', 29, 1),
(3078, 'Nuapada', 29, 1),
(3079, 'Nuapatna', 29, 1),
(3080, 'OCL Industrialship', 29, 1),
(3081, 'Padampur', 29, 1),
(3082, 'Paradip', 29, 1),
(3083, 'Paradwip', 29, 1),
(3084, 'Parlakimidi', 29, 1),
(3085, 'Patamundai', 29, 1),
(3086, 'Patnagarh', 29, 1),
(3087, 'Phulabani', 29, 1),
(3088, 'Pipili', 29, 1),
(3089, 'Polasara', 29, 1),
(3090, 'Pratapsasan', 29, 1),
(3091, 'Puri', 29, 1),
(3092, 'Purushottampur', 29, 1),
(3093, 'Rairangpur', 29, 1),
(3094, 'Raj Gangpur', 29, 1),
(3095, 'Rambha', 29, 1),
(3096, 'Raurkela', 29, 1),
(3097, 'Raurkela Civil Township', 29, 1),
(3098, 'Rayagada', 29, 1),
(3099, 'Redhakhol', 29, 1),
(3100, 'Remuna', 29, 1),
(3101, 'Rengali', 29, 1),
(3102, 'Rourkela', 29, 1),
(3103, 'Sambalpur', 29, 1),
(3104, 'Sinapali', 29, 1),
(3105, 'Sonepur', 29, 1),
(3106, 'Sorada', 29, 1),
(3107, 'Soro', 29, 1),
(3108, 'Sunabeda', 29, 1),
(3109, 'Sundargarh', 29, 1),
(3110, 'Talcher', 29, 1),
(3111, 'Talcher Thermal Power Station ', 29, 1),
(3112, 'Tarabha', 29, 1),
(3113, 'Tensa', 29, 1),
(3114, 'Titlagarh', 29, 1),
(3115, 'Udala', 29, 1),
(3116, 'Udayagiri', 29, 1),
(3117, 'Umarkot', 29, 1),
(3118, 'Vikrampur', 29, 1),
(3119, 'Ariankuppam', 31, 1),
(3120, 'Karaikal', 31, 1),
(3121, 'Kurumbapet', 31, 1),
(3122, 'Mahe', 31, 1),
(3123, 'Ozhukarai', 31, 1),
(3124, 'Pondicherry', 31, 1),
(3125, 'Villianur', 31, 1),
(3126, 'Yanam', 31, 1),
(3127, 'Abohar', 32, 1),
(3128, 'Adampur', 32, 1),
(3129, 'Ahmedgarh', 32, 1),
(3130, 'Ajnala', 32, 1),
(3131, 'Akalgarh', 32, 1),
(3132, 'Alawalpur', 32, 1),
(3133, 'Amloh', 32, 1),
(3134, 'Amritsar', 32, 1),
(3135, 'Amritsar Cantonment', 32, 1),
(3136, 'Anandpur Sahib', 32, 1),
(3137, 'Badhni Kalan', 32, 1),
(3138, 'Bagh Purana', 32, 1),
(3139, 'Balachaur', 32, 1),
(3140, 'Banaur', 32, 1),
(3141, 'Banga', 32, 1),
(3142, 'Banur', 32, 1),
(3143, 'Baretta', 32, 1),
(3144, 'Bariwala', 32, 1),
(3145, 'Barnala', 32, 1),
(3146, 'Bassi Pathana', 32, 1),
(3147, 'Batala', 32, 1),
(3148, 'Bathinda', 32, 1),
(3149, 'Begowal', 32, 1),
(3150, 'Behrampur', 32, 1),
(3151, 'Bhabat', 32, 1),
(3152, 'Bhadur', 32, 1),
(3153, 'Bhankharpur', 32, 1),
(3154, 'Bharoli Kalan', 32, 1),
(3155, 'Bhawanigarh', 32, 1),
(3156, 'Bhikhi', 32, 1),
(3157, 'Bhikhiwind', 32, 1),
(3158, 'Bhisiana', 32, 1),
(3159, 'Bhogpur', 32, 1),
(3160, 'Bhuch', 32, 1),
(3161, 'Bhulath', 32, 1),
(3162, 'Budha Theh', 32, 1),
(3163, 'Budhlada', 32, 1),
(3164, 'Chima', 32, 1),
(3165, 'Chohal', 32, 1),
(3166, 'Dasuya', 32, 1),
(3167, 'Daulatpur', 32, 1),
(3168, 'Dera Baba Nanak', 32, 1),
(3169, 'Dera Bassi', 32, 1),
(3170, 'Dhanaula', 32, 1),
(3171, 'Dharam Kot', 32, 1),
(3172, 'Dhariwal', 32, 1),
(3173, 'Dhilwan', 32, 1),
(3174, 'Dhuri', 32, 1),
(3175, 'Dinanagar', 32, 1),
(3176, 'Dirba', 32, 1),
(3177, 'Doraha', 32, 1),
(3178, 'Faridkot', 32, 1),
(3179, 'Fateh Nangal', 32, 1),
(3180, 'Fatehgarh Churian', 32, 1),
(3181, 'Fatehgarh Sahib', 32, 1),
(3182, 'Fazilka', 32, 1),
(3183, 'Firozpur', 32, 1),
(3184, 'Firozpur Cantonment', 32, 1),
(3185, 'Gardhiwala', 32, 1),
(3186, 'Garhshankar', 32, 1),
(3187, 'Ghagga', 32, 1),
(3188, 'Ghanaur', 32, 1),
(3189, 'Giddarbaha', 32, 1),
(3190, 'Gobindgarh', 32, 1),
(3191, 'Goniana', 32, 1),
(3192, 'Goraya', 32, 1),
(3193, 'Gurdaspur', 32, 1),
(3194, 'Guru Har Sahai', 32, 1),
(3195, 'Hajipur', 32, 1),
(3196, 'Handiaya', 32, 1),
(3197, 'Hariana', 32, 1),
(3198, 'Hoshiarpur', 32, 1),
(3199, 'Hussainpur', 32, 1),
(3200, 'Jagraon', 32, 1),
(3201, 'Jaitu', 32, 1),
(3202, 'Jalalabad', 32, 1),
(3203, 'Jalandhar', 32, 1),
(3204, 'Jalandhar Cantonment', 32, 1),
(3205, 'Jandiala', 32, 1),
(3206, 'Jugial', 32, 1),
(3207, 'Kalanaur', 32, 1),
(3208, 'Kapurthala', 32, 1),
(3209, 'Karoran', 32, 1),
(3210, 'Kartarpur', 32, 1),
(3211, 'Khamanon', 32, 1),
(3212, 'Khanauri', 32, 1),
(3213, 'Khanna', 32, 1),
(3214, 'Kharar', 32, 1),
(3215, 'Khem Karan', 32, 1),
(3216, 'Kot Fatta', 32, 1),
(3217, 'Kot Isa Khan', 32, 1),
(3218, 'Kot Kapura', 32, 1),
(3219, 'Kotkapura', 32, 1),
(3220, 'Kurali', 32, 1),
(3221, 'Lalru', 32, 1),
(3222, 'Lehra Gaga', 32, 1),
(3223, 'Lodhian Khas', 32, 1),
(3224, 'Longowal', 32, 1),
(3225, 'Ludhiana', 32, 1),
(3226, 'Machhiwara', 32, 1),
(3227, 'Mahilpur', 32, 1),
(3228, 'Majitha', 32, 1),
(3229, 'Makhu', 32, 1),
(3230, 'Malaut', 32, 1),
(3231, 'Malerkotla', 32, 1),
(3232, 'Maloud', 32, 1),
(3233, 'Mandi Gobindgarh', 32, 1),
(3234, 'Mansa', 32, 1),
(3235, 'Maur', 32, 1),
(3236, 'Moga', 32, 1),
(3237, 'Mohali', 32, 1),
(3238, 'Moonak', 32, 1),
(3239, 'Morinda', 32, 1),
(3240, 'Mukerian', 32, 1),
(3241, 'Muktsar', 32, 1),
(3242, 'Mullanpur Dakha', 32, 1),
(3243, 'Mullanpur Garibdas', 32, 1),
(3244, 'Munak', 32, 1),
(3245, 'Muradpura', 32, 1),
(3246, 'Nabha', 32, 1),
(3247, 'Nakodar', 32, 1),
(3248, 'Nangal', 32, 1),
(3249, 'Nawashahr', 32, 1),
(3250, 'Naya Nangal', 32, 1),
(3251, 'Nehon', 32, 1),
(3252, 'Nurmahal', 32, 1),
(3253, 'Pathankot', 32, 1),
(3254, 'Patiala', 32, 1),
(3255, 'Patti', 32, 1),
(3256, 'Pattran', 32, 1),
(3257, 'Payal', 32, 1),
(3258, 'Phagwara', 32, 1),
(3259, 'Phillaur', 32, 1),
(3260, 'Qadian', 32, 1),
(3261, 'Rahon', 32, 1),
(3262, 'Raikot', 32, 1),
(3263, 'Raja Sansi', 32, 1),
(3264, 'Rajpura', 32, 1),
(3265, 'Ram Das', 32, 1),
(3266, 'Raman', 32, 1),
(3267, 'Rampura', 32, 1),
(3268, 'Rayya', 32, 1),
(3269, 'Rupnagar', 32, 1),
(3270, 'Rurki Kasba', 32, 1),
(3271, 'Sahnewal', 32, 1),
(3272, 'Samana', 32, 1),
(3273, 'Samrala', 32, 1),
(3274, 'Sanaur', 32, 1),
(3275, 'Sangat', 32, 1),
(3276, 'Sangrur', 32, 1),
(3277, 'Sansarpur', 32, 1),
(3278, 'Sardulgarh', 32, 1),
(3279, 'Shahkot', 32, 1),
(3280, 'Sham Churasi', 32, 1),
(3281, 'Shekhpura', 32, 1),
(3282, 'Sirhind', 32, 1),
(3283, 'Sri Hargobindpur', 32, 1),
(3284, 'Sujanpur', 32, 1),
(3285, 'Sultanpur Lodhi', 32, 1),
(3286, 'Sunam', 32, 1),
(3287, 'Talwandi Bhai', 32, 1),
(3288, 'Talwara', 32, 1),
(3289, 'Tappa', 32, 1),
(3290, 'Tarn Taran', 32, 1),
(3291, 'Urmar Tanda', 32, 1),
(3292, 'Zira', 32, 1),
(3293, 'Zirakpur', 32, 1),
(3294, 'Abu Road', 33, 1),
(3295, 'Ajmer', 33, 1),
(3296, 'Aklera', 33, 1),
(3297, 'Alwar', 33, 1),
(3298, 'Amet', 33, 1),
(3299, 'Antah', 33, 1),
(3300, 'Anupgarh', 33, 1),
(3301, 'Asind', 33, 1),
(3302, 'Bagar', 33, 1),
(3303, 'Bagru', 33, 1),
(3304, 'Bahror', 33, 1),
(3305, 'Bakani', 33, 1),
(3306, 'Bali', 33, 1),
(3307, 'Balotra', 33, 1),
(3308, 'Bandikui', 33, 1),
(3309, 'Banswara', 33, 1),
(3310, 'Baran', 33, 1),
(3311, 'Bari', 33, 1),
(3312, 'Bari Sadri', 33, 1),
(3313, 'Barmer', 33, 1),
(3314, 'Basi', 33, 1),
(3315, 'Basni Belima', 33, 1),
(3316, 'Baswa', 33, 1),
(3317, 'Bayana', 33, 1),
(3318, 'Beawar', 33, 1),
(3319, 'Begun', 33, 1),
(3320, 'Bhadasar', 33, 1),
(3321, 'Bhadra', 33, 1),
(3322, 'Bhalariya', 33, 1),
(3323, 'Bharatpur', 33, 1),
(3324, 'Bhasawar', 33, 1),
(3325, 'Bhawani Mandi', 33, 1),
(3326, 'Bhawri', 33, 1),
(3327, 'Bhilwara', 33, 1),
(3328, 'Bhindar', 33, 1),
(3329, 'Bhinmal', 33, 1),
(3330, 'Bhiwadi', 33, 1),
(3331, 'Bijoliya Kalan', 33, 1),
(3332, 'Bikaner', 33, 1),
(3333, 'Bilara', 33, 1),
(3334, 'Bissau', 33, 1),
(3335, 'Borkhera', 33, 1),
(3336, 'Budhpura', 33, 1),
(3337, 'Bundi', 33, 1),
(3338, 'Chatsu', 33, 1),
(3339, 'Chechat', 33, 1),
(3340, 'Chhabra', 33, 1),
(3341, 'Chhapar', 33, 1),
(3342, 'Chhipa Barod', 33, 1),
(3343, 'Chhoti Sadri', 33, 1),
(3344, 'Chirawa', 33, 1),
(3345, 'Chittaurgarh', 33, 1),
(3346, 'Chittorgarh', 33, 1),
(3347, 'Chomun', 33, 1),
(3348, 'Churu', 33, 1),
(3349, 'Daosa', 33, 1),
(3350, 'Dariba', 33, 1),
(3351, 'Dausa', 33, 1),
(3352, 'Deoli', 33, 1),
(3353, 'Deshnok', 33, 1),
(3354, 'Devgarh', 33, 1),
(3355, 'Devli', 33, 1),
(3356, 'Dhariawad', 33, 1),
(3357, 'Dhaulpur', 33, 1),
(3358, 'Dholpur', 33, 1),
(3359, 'Didwana', 33, 1),
(3360, 'Dig', 33, 1),
(3361, 'Dungargarh', 33, 1),
(3362, 'Dungarpur', 33, 1),
(3363, 'Falna', 33, 1),
(3364, 'Fatehnagar', 33, 1),
(3365, 'Fatehpur', 33, 1),
(3366, 'Gajsinghpur', 33, 1),
(3367, 'Galiakot', 33, 1),
(3368, 'Ganganagar', 33, 1),
(3369, 'Gangapur', 33, 1),
(3370, 'Goredi Chancha', 33, 1),
(3371, 'Gothra', 33, 1),
(3372, 'Govindgarh', 33, 1),
(3373, 'Gulabpura', 33, 1),
(3374, 'Hanumangarh', 33, 1),
(3375, 'Hindaun', 33, 1),
(3376, 'Indragarh', 33, 1),
(3377, 'Jahazpur', 33, 1),
(3378, 'Jaipur', 33, 1),
(3379, 'Jaisalmer', 33, 1),
(3380, 'Jaiselmer', 33, 1),
(3381, 'Jaitaran', 33, 1),
(3382, 'Jalore', 33, 1),
(3383, 'Jhalawar', 33, 1),
(3384, 'Jhalrapatan', 33, 1),
(3385, 'Jhunjhunun', 33, 1),
(3386, 'Jobner', 33, 1),
(3387, 'Jodhpur', 33, 1),
(3388, 'Kaithun', 33, 1),
(3389, 'Kaman', 33, 1),
(3390, 'Kankroli', 33, 1),
(3391, 'Kanor', 33, 1),
(3392, 'Kapasan', 33, 1),
(3393, 'Kaprain', 33, 1),
(3394, 'Karanpura', 33, 1),
(3395, 'Karauli', 33, 1),
(3396, 'Kekri', 33, 1),
(3397, 'Keshorai Patan', 33, 1),
(3398, 'Kesrisinghpur', 33, 1),
(3399, 'Khairthal', 33, 1),
(3400, 'Khandela', 33, 1),
(3401, 'Khanpur', 33, 1),
(3402, 'Kherli', 33, 1),
(3403, 'Kherliganj', 33, 1),
(3404, 'Kherwara Chhaoni', 33, 1),
(3405, 'Khetri', 33, 1),
(3406, 'Kiranipura', 33, 1),
(3407, 'Kishangarh', 33, 1),
(3408, 'Kishangarh Ranwal', 33, 1),
(3409, 'Kolvi Rajendrapura', 33, 1),
(3410, 'Kot Putli', 33, 1),
(3411, 'Kota', 33, 1),
(3412, 'Kuchaman', 33, 1),
(3413, 'Kuchera', 33, 1),
(3414, 'Kumbhalgarh', 33, 1),
(3415, 'Kumbhkot', 33, 1),
(3416, 'Kumher', 33, 1),
(3417, 'Kushalgarh', 33, 1),
(3418, 'Lachhmangarh', 33, 1),
(3419, 'Ladnun', 33, 1),
(3420, 'Lakheri', 33, 1),
(3421, 'Lalsot', 33, 1),
(3422, 'Losal', 33, 1),
(3423, 'Madanganj', 33, 1),
(3424, 'Mahu Kalan', 33, 1),
(3425, 'Mahwa', 33, 1),
(3426, 'Makrana', 33, 1),
(3427, 'Malpura', 33, 1),
(3428, 'Mandal', 33, 1),
(3429, 'Mandalgarh', 33, 1),
(3430, 'Mandawar', 33, 1),
(3431, 'Mandwa', 33, 1),
(3432, 'Mangrol', 33, 1),
(3433, 'Manohar Thana', 33, 1),
(3434, 'Manoharpur', 33, 1),
(3435, 'Marwar', 33, 1),
(3436, 'Merta', 33, 1),
(3437, 'Modak', 33, 1),
(3438, 'Mount Abu', 33, 1),
(3439, 'Mukandgarh', 33, 1),
(3440, 'Mundwa', 33, 1),
(3441, 'Nadbai', 33, 1),
(3442, 'Naenwa', 33, 1),
(3443, 'Nagar', 33, 1),
(3444, 'Nagaur', 33, 1),
(3445, 'Napasar', 33, 1),
(3446, 'Naraina', 33, 1),
(3447, 'Nasirabad', 33, 1),
(3448, 'Nathdwara', 33, 1),
(3449, 'Nawa', 33, 1),
(3450, 'Nawalgarh', 33, 1),
(3451, 'Neem Ka Thana', 33, 1),
(3452, 'Neemrana', 33, 1),
(3453, 'Newa Talai', 33, 1),
(3454, 'Nimaj', 33, 1),
(3455, 'Nimbahera', 33, 1),
(3456, 'Niwai', 33, 1),
(3457, 'Nohar', 33, 1),
(3458, 'Nokha', 33, 1),
(3459, 'One SGM', 33, 1),
(3460, 'Padampur', 33, 1),
(3461, 'Pali', 33, 1),
(3462, 'Partapur', 33, 1),
(3463, 'Parvatsar', 33, 1),
(3464, 'Pasoond', 33, 1),
(3465, 'Phalna', 33, 1),
(3466, 'Phalodi', 33, 1),
(3467, 'Phulera', 33, 1),
(3468, 'Pilani', 33, 1),
(3469, 'Pilibanga', 33, 1),
(3470, 'Pindwara', 33, 1),
(3471, 'Pipalia Kalan', 33, 1),
(3472, 'Pipar', 33, 1),
(3473, 'Pirawa', 33, 1),
(3474, 'Pokaran', 33, 1),
(3475, 'Pratapgarh', 33, 1),
(3476, 'Pushkar', 33, 1),
(3477, 'Raipur', 33, 1),
(3478, 'Raisinghnagar', 33, 1),
(3479, 'Rajakhera', 33, 1),
(3480, 'Rajaldesar', 33, 1),
(3481, 'Rajgarh', 33, 1),
(3482, 'Rajsamand', 33, 1),
(3483, 'Ramganj Mandi', 33, 1),
(3484, 'Ramgarh', 33, 1),
(3485, 'Rani', 33, 1),
(3486, 'Raniwara', 33, 1),
(3487, 'Ratan Nagar', 33, 1),
(3488, 'Ratangarh', 33, 1),
(3489, 'Rawatbhata', 33, 1),
(3490, 'Rawatsar', 33, 1),
(3491, 'Rikhabdev', 33, 1),
(3492, 'Ringas', 33, 1),
(3493, 'Sadri', 33, 1),
(3494, 'Sadulshahar', 33, 1),
(3495, 'Sagwara', 33, 1),
(3496, 'Salumbar', 33, 1),
(3497, 'Sambhar', 33, 1),
(3498, 'Samdari', 33, 1),
(3499, 'Sanchor', 33, 1),
(3500, 'Sangariya', 33, 1),
(3501, 'Sangod', 33, 1),
(3502, 'Sardarshahr', 33, 1),
(3503, 'Sarwar', 33, 1),
(3504, 'Satal Kheri', 33, 1),
(3505, 'Sawai Madhopur', 33, 1),
(3506, 'Sewan Kalan', 33, 1),
(3507, 'Shahpura', 33, 1),
(3508, 'Sheoganj', 33, 1),
(3509, 'Sikar', 33, 1),
(3510, 'Sirohi', 33, 1),
(3511, 'Siwana', 33, 1),
(3512, 'Sogariya', 33, 1),
(3513, 'Sojat', 33, 1),
(3514, 'Sojat Road', 33, 1),
(3515, 'Sri Madhopur', 33, 1),
(3516, 'Sriganganagar', 33, 1),
(3517, 'Sujangarh', 33, 1),
(3518, 'Suket', 33, 1),
(3519, 'Sumerpur', 33, 1),
(3520, 'Sunel', 33, 1),
(3521, 'Surajgarh', 33, 1),
(3522, 'Suratgarh', 33, 1),
(3523, 'Swaroopganj', 33, 1),
(3524, 'Takhatgarh', 33, 1),
(3525, 'Taranagar', 33, 1),
(3526, 'Three STR', 33, 1),
(3527, 'Tijara', 33, 1),
(3528, 'Toda Bhim', 33, 1),
(3529, 'Toda Raisingh', 33, 1),
(3530, 'Todra', 33, 1),
(3531, 'Tonk', 33, 1),
(3532, 'Udaipur', 33, 1),
(3533, 'Udpura', 33, 1),
(3534, 'Uniara', 33, 1),
(3535, 'Vanasthali', 33, 1),
(3536, 'Vidyavihar', 33, 1),
(3537, 'Vijainagar', 33, 1),
(3538, 'Viratnagar', 33, 1),
(3539, 'Wer', 33, 1),
(3540, 'Gangtok', 34, 1),
(3541, 'Gezing', 34, 1),
(3542, 'Jorethang', 34, 1),
(3543, 'Mangan', 34, 1),
(3544, 'Namchi', 34, 1),
(3545, 'Naya Bazar', 34, 1),
(3546, 'No City', 34, 1),
(3547, 'Rangpo', 34, 1),
(3548, 'Sikkim', 34, 1),
(3549, 'Singtam', 34, 1),
(3550, 'Upper Tadong', 34, 1),
(3551, 'Abiramam', 35, 1),
(3552, 'Achampudur', 35, 1),
(3553, 'Acharapakkam', 35, 1),
(3554, 'Acharipallam', 35, 1),
(3555, 'Achipatti', 35, 1),
(3556, 'Adikaratti', 35, 1),
(3557, 'Adiramapattinam', 35, 1),
(3558, 'Aduturai', 35, 1),
(3559, 'Adyar', 35, 1),
(3560, 'Agaram', 35, 1),
(3561, 'Agasthiswaram', 35, 1),
(3562, 'Akkaraipettai', 35, 1),
(3563, 'Alagappapuram', 35, 1),
(3564, 'Alagapuri', 35, 1),
(3565, 'Alampalayam', 35, 1),
(3566, 'Alandur', 35, 1),
(3567, 'Alanganallur', 35, 1),
(3568, 'Alangayam', 35, 1),
(3569, 'Alangudi', 35, 1),
(3570, 'Alangulam', 35, 1),
(3571, 'Alanthurai', 35, 1),
(3572, 'Alapakkam', 35, 1),
(3573, 'Allapuram', 35, 1),
(3574, 'Alur', 35, 1),
(3575, 'Alwar Tirunagari', 35, 1),
(3576, 'Alwarkurichi', 35, 1),
(3577, 'Ambasamudram', 35, 1),
(3578, 'Ambur', 35, 1),
(3579, 'Ammainaickanur', 35, 1),
(3580, 'Ammaparikuppam', 35, 1),
(3581, 'Ammapettai', 35, 1),
(3582, 'Ammavarikuppam', 35, 1),
(3583, 'Ammur', 35, 1),
(3584, 'Anaimalai', 35, 1),
(3585, 'Anaiyur', 35, 1),
(3586, 'Anakaputhur', 35, 1),
(3587, 'Ananthapuram', 35, 1),
(3588, 'Andanappettai', 35, 1),
(3589, 'Andipalayam', 35, 1),
(3590, 'Andippatti', 35, 1),
(3591, 'Anjugramam', 35, 1),
(3592, 'Annamalainagar', 35, 1),
(3593, 'Annavasal', 35, 1),
(3594, 'Annur', 35, 1),
(3595, 'Anthiyur', 35, 1),
(3596, 'Appakudal', 35, 1),
(3597, 'Arachalur', 35, 1),
(3598, 'Arakandanallur', 35, 1),
(3599, 'Arakonam', 35, 1),
(3600, 'Aralvaimozhi', 35, 1),
(3601, 'Arani', 35, 1),
(3602, 'Arani Road', 35, 1),
(3603, 'Arantangi', 35, 1),
(3604, 'Arasiramani', 35, 1),
(3605, 'Aravakurichi', 35, 1),
(3606, 'Aravankadu', 35, 1),
(3607, 'Arcot', 35, 1),
(3608, 'Arimalam', 35, 1),
(3609, 'Ariyalur', 35, 1),
(3610, 'Ariyappampalayam', 35, 1),
(3611, 'Ariyur', 35, 1),
(3612, 'Arni', 35, 1),
(3613, 'Arulmigu Thirumuruganpundi', 35, 1),
(3614, 'Arumanai', 35, 1),
(3615, 'Arumbavur', 35, 1),
(3616, 'Arumuganeri', 35, 1),
(3617, 'Aruppukkottai', 35, 1),
(3618, 'Ashokapuram', 35, 1),
(3619, 'Athani', 35, 1),
(3620, 'Athanur', 35, 1),
(3621, 'Athimarapatti', 35, 1),
(3622, 'Athipattu', 35, 1),
(3623, 'Athur', 35, 1),
(3624, 'Attayyampatti', 35, 1),
(3625, 'Attur', 35, 1),
(3626, 'Auroville', 35, 1),
(3627, 'Avadattur', 35, 1),
(3628, 'Avadi', 35, 1),
(3629, 'Avalpundurai', 35, 1),
(3630, 'Avaniapuram', 35, 1),
(3631, 'Avinashi', 35, 1),
(3632, 'Ayakudi', 35, 1),
(3633, 'Ayanadaippu', 35, 1),
(3634, 'Aygudi', 35, 1),
(3635, 'Ayothiapattinam', 35, 1),
(3636, 'Ayyalur', 35, 1),
(3637, 'Ayyampalayam', 35, 1),
(3638, 'Ayyampettai', 35, 1),
(3639, 'Azhagiapandiapuram', 35, 1),
(3640, 'Balakrishnampatti', 35, 1),
(3641, 'Balakrishnapuram', 35, 1),
(3642, 'Balapallam', 35, 1),
(3643, 'Balasamudram', 35, 1),
(3644, 'Bargur', 35, 1),
(3645, 'Belur', 35, 1),
(3646, 'Berhatty', 35, 1),
(3647, 'Bhavani', 35, 1),
(3648, 'Bhawanisagar', 35, 1),
(3649, 'Bhuvanagiri', 35, 1),
(3650, 'Bikketti', 35, 1),
(3651, 'Bodinayakkanur', 35, 1),
(3652, 'Brahmana Periya Agraharam', 35, 1),
(3653, 'Buthapandi', 35, 1),
(3654, 'Buthipuram', 35, 1),
(3655, 'Chatrapatti', 35, 1),
(3656, 'Chembarambakkam', 35, 1),
(3657, 'Chengalpattu', 35, 1),
(3658, 'Chengam', 35, 1),
(3659, 'Chennai', 35, 1),
(3660, 'Chennasamudram', 35, 1),
(3661, 'Chennimalai', 35, 1),
(3662, 'Cheranmadevi', 35, 1),
(3663, 'Cheruvanki', 35, 1),
(3664, 'Chetpet', 35, 1),
(3665, 'Chettiarpatti', 35, 1),
(3666, 'Chettipalaiyam', 35, 1),
(3667, 'Chettipalayam Cantonment', 35, 1),
(3668, 'Chettithangal', 35, 1),
(3669, 'Cheyur', 35, 1),
(3670, 'Cheyyar', 35, 1),
(3671, 'Chidambaram', 35, 1),
(3672, 'Chinalapatti', 35, 1),
(3673, 'Chinna Anuppanadi', 35, 1),
(3674, 'Chinna Salem', 35, 1),
(3675, 'Chinnakkampalayam', 35, 1),
(3676, 'Chinnammanur', 35, 1),
(3677, 'Chinnampalaiyam', 35, 1),
(3678, 'Chinnasekkadu', 35, 1),
(3679, 'Chinnavedampatti', 35, 1),
(3680, 'Chitlapakkam', 35, 1),
(3681, 'Chittodu', 35, 1),
(3682, 'Cholapuram', 35, 1),
(3683, 'Coimbatore', 35, 1),
(3684, 'Coonoor', 35, 1),
(3685, 'Courtalam', 35, 1),
(3686, 'Cuddalore', 35, 1),
(3687, 'Dalavaipatti', 35, 1),
(3688, 'Darasuram', 35, 1),
(3689, 'Denkanikottai', 35, 1),
(3690, 'Desur', 35, 1),
(3691, 'Devadanapatti', 35, 1),
(3692, 'Devakkottai', 35, 1),
(3693, 'Devakottai', 35, 1),
(3694, 'Devanangurichi', 35, 1),
(3695, 'Devarshola', 35, 1),
(3696, 'Devasthanam', 35, 1),
(3697, 'Dhalavoipuram', 35, 1),
(3698, 'Dhali', 35, 1),
(3699, 'Dhaliyur', 35, 1),
(3700, 'Dharapadavedu', 35, 1),
(3701, 'Dharapuram', 35, 1),
(3702, 'Dharmapuri', 35, 1),
(3703, 'Dindigul', 35, 1),
(3704, 'Dusi', 35, 1),
(3705, 'Edaganasalai', 35, 1),
(3706, 'Edaikodu', 35, 1),
(3707, 'Edakalinadu', 35, 1),
(3708, 'Elathur', 35, 1),
(3709, 'Elayirampannai', 35, 1),
(3710, 'Elumalai', 35, 1),
(3711, 'Eral', 35, 1),
(3712, 'Eraniel', 35, 1),
(3713, 'Eriodu', 35, 1),
(3714, 'Erode', 35, 1),
(3715, 'Erumaipatti', 35, 1),
(3716, 'Eruvadi', 35, 1),
(3717, 'Ethapur', 35, 1),
(3718, 'Ettaiyapuram', 35, 1),
(3719, 'Ettimadai', 35, 1),
(3720, 'Ezhudesam', 35, 1),
(3721, 'Ganapathipuram', 35, 1),
(3722, 'Gandhi Nagar', 35, 1),
(3723, 'Gangaikondan', 35, 1),
(3724, 'Gangavalli', 35, 1),
(3725, 'Ganguvarpatti', 35, 1),
(3726, 'Gingi', 35, 1),
(3727, 'Gopalasamudram', 35, 1),
(3728, 'Gopichettipalaiyam', 35, 1),
(3729, 'Gudalur', 35, 1),
(3730, 'Gudiyattam', 35, 1),
(3731, 'Guduvanchery', 35, 1),
(3732, 'Gummidipoondi', 35, 1),
(3733, 'Hanumanthampatti', 35, 1),
(3734, 'Harur', 35, 1),
(3735, 'Harveypatti', 35, 1),
(3736, 'Highways', 35, 1),
(3737, 'Hosur', 35, 1),
(3738, 'Hubbathala', 35, 1),
(3739, 'Huligal', 35, 1),
(3740, 'Idappadi', 35, 1),
(3741, 'Idikarai', 35, 1),
(3742, 'Ilampillai', 35, 1),
(3743, 'Ilanji', 35, 1),
(3744, 'Iluppaiyurani', 35, 1),
(3745, 'Iluppur', 35, 1),
(3746, 'Inam Karur', 35, 1),
(3747, 'Injambakkam', 35, 1),
(3748, 'Irugur', 35, 1),
(3749, 'Jaffrabad', 35, 1),
(3750, 'Jagathala', 35, 1),
(3751, 'Jalakandapuram', 35, 1),
(3752, 'Jalladiampet', 35, 1),
(3753, 'Jambai', 35, 1),
(3754, 'Jayankondam', 35, 1),
(3755, 'Jolarpet', 35, 1),
(3756, 'Kadambur', 35, 1),
(3757, 'Kadathur', 35, 1),
(3758, 'Kadayal', 35, 1),
(3759, 'Kadayampatti', 35, 1),
(3760, 'Kadayanallur', 35, 1),
(3761, 'Kadiapatti', 35, 1),
(3762, 'Kalakkad', 35, 1),
(3763, 'Kalambur', 35, 1),
(3764, 'Kalapatti', 35, 1),
(3765, 'Kalappanaickenpatti', 35, 1),
(3766, 'Kalavai', 35, 1),
(3767, 'Kalinjur', 35, 1),
(3768, 'Kaliyakkavilai', 35, 1),
(3769, 'Kallakkurichi', 35, 1),
(3770, 'Kallakudi', 35, 1),
(3771, 'Kallidaikurichchi', 35, 1),
(3772, 'Kallukuttam', 35, 1),
(3773, 'Kallupatti', 35, 1),
(3774, 'Kalpakkam', 35, 1),
(3775, 'Kalugumalai', 35, 1),
(3776, 'Kamayagoundanpatti', 35, 1),
(3777, 'Kambainallur', 35, 1),
(3778, 'Kambam', 35, 1),
(3779, 'Kamuthi', 35, 1),
(3780, 'Kanadukathan', 35, 1),
(3781, 'Kanakkampalayam', 35, 1),
(3782, 'Kanam', 35, 1),
(3783, 'Kanchipuram', 35, 1),
(3784, 'Kandanur', 35, 1),
(3785, 'Kangayam', 35, 1),
(3786, 'Kangayampalayam', 35, 1),
(3787, 'Kangeyanallur', 35, 1),
(3788, 'Kaniyur', 35, 1),
(3789, 'Kanjikoil', 35, 1),
(3790, 'Kannadendal', 35, 1),
(3791, 'Kannamangalam', 35, 1),
(3792, 'Kannampalayam', 35, 1),
(3793, 'Kannankurichi', 35, 1),
(3794, 'Kannapalaiyam', 35, 1),
(3795, 'Kannivadi', 35, 1),
(3796, 'Kanyakumari', 35, 1),
(3797, 'Kappiyarai', 35, 1),
(3798, 'Karaikkudi', 35, 1),
(3799, 'Karamadai', 35, 1),
(3800, 'Karambakkam', 35, 1),
(3801, 'Karambakkudi', 35, 1),
(3802, 'Kariamangalam', 35, 1),
(3803, 'Kariapatti', 35, 1),
(3804, 'Karugampattur', 35, 1),
(3805, 'Karumandi Chellipalayam', 35, 1),
(3806, 'Karumathampatti', 35, 1),
(3807, 'Karumbakkam', 35, 1),
(3808, 'Karungal', 35, 1),
(3809, 'Karunguzhi', 35, 1),
(3810, 'Karuppur', 35, 1),
(3811, 'Karur', 35, 1),
(3812, 'Kasipalaiyam', 35, 1),
(3813, 'Kasipalayam G', 35, 1),
(3814, 'Kathirvedu', 35, 1),
(3815, 'Kathujuganapalli', 35, 1),
(3816, 'Katpadi', 35, 1),
(3817, 'Kattivakkam', 35, 1),
(3818, 'Kattumannarkoil', 35, 1),
(3819, 'Kattupakkam', 35, 1),
(3820, 'Kattuputhur', 35, 1),
(3821, 'Kaveripakkam', 35, 1),
(3822, 'Kaveripattinam', 35, 1),
(3823, 'Kavundampalaiyam', 35, 1),
(3824, 'Kavundampalayam', 35, 1),
(3825, 'Kayalpattinam', 35, 1),
(3826, 'Kayattar', 35, 1),
(3827, 'Kelamangalam', 35, 1),
(3828, 'Kelambakkam', 35, 1),
(3829, 'Kembainaickenpalayam', 35, 1),
(3830, 'Kethi', 35, 1),
(3831, 'Kilakarai', 35, 1),
(3832, 'Kilampadi', 35, 1),
(3833, 'Kilkulam', 35, 1),
(3834, 'Kilkunda', 35, 1),
(3835, 'Killiyur', 35, 1),
(3836, 'Killlai', 35, 1),
(3837, 'Kilpennathur', 35, 1),
(3838, 'Kilvelur', 35, 1),
(3839, 'Kinathukadavu', 35, 1),
(3840, 'Kiramangalam', 35, 1),
(3841, 'Kiranur', 35, 1),
(3842, 'Kiripatti', 35, 1),
(3843, 'Kizhapavur', 35, 1),
(3844, 'Kmarasamipatti', 35, 1),
(3845, 'Kochadai', 35, 1),
(3846, 'Kodaikanal', 35, 1),
(3847, 'Kodambakkam', 35, 1),
(3848, 'Kodavasal', 35, 1),
(3849, 'Kodumudi', 35, 1),
(3850, 'Kolachal', 35, 1),
(3851, 'Kolappalur', 35, 1),
(3852, 'Kolathupalayam', 35, 1),
(3853, 'Kolathur', 35, 1),
(3854, 'Kollankodu', 35, 1),
(3855, 'Kollankoil', 35, 1),
(3856, 'Komaralingam', 35, 1),
(3857, 'Komarapalayam', 35, 1),
(3858, 'Kombai', 35, 1),
(3859, 'Konakkarai', 35, 1),
(3860, 'Konavattam', 35, 1),
(3861, 'Kondalampatti', 35, 1),
(3862, 'Konganapuram', 35, 1),
(3863, 'Koradacheri', 35, 1),
(3864, 'Korampallam', 35, 1),
(3865, 'Kotagiri', 35, 1),
(3866, 'Kothinallur', 35, 1),
(3867, 'Kottaiyur', 35, 1),
(3868, 'Kottakuppam', 35, 1),
(3869, 'Kottaram', 35, 1),
(3870, 'Kottivakkam', 35, 1),
(3871, 'Kottur', 35, 1),
(3872, 'Kovilpatti', 35, 1),
(3873, 'Koyampattur', 35, 1),
(3874, 'Krishnagiri', 35, 1),
(3875, 'Krishnarayapuram', 35, 1),
(3876, 'Krishnasamudram', 35, 1),
(3877, 'Kuchanur', 35, 1),
(3878, 'Kuhalur', 35, 1),
(3879, 'Kulasekarappattinam', 35, 1),
(3880, 'Kulasekarapuram', 35, 1),
(3881, 'Kulithalai', 35, 1),
(3882, 'Kumarapalaiyam', 35, 1),
(3883, 'Kumarapalayam', 35, 1),
(3884, 'Kumarapuram', 35, 1),
(3885, 'Kumbakonam', 35, 1),
(3886, 'Kundrathur', 35, 1),
(3887, 'Kuniyamuthur', 35, 1),
(3888, 'Kunnathur', 35, 1),
(3889, 'Kunur', 35, 1),
(3890, 'Kuraikundu', 35, 1),
(3891, 'Kurichi', 35, 1),
(3892, 'Kurinjippadi', 35, 1),
(3893, 'Kurudampalaiyam', 35, 1),
(3894, 'Kurumbalur', 35, 1),
(3895, 'Kuthalam', 35, 1),
(3896, 'Kuthappar', 35, 1),
(3897, 'Kuttalam', 35, 1),
(3898, 'Kuttanallur', 35, 1),
(3899, 'Kuzhithurai', 35, 1),
(3900, 'Labbaikudikadu', 35, 1),
(3901, 'Lakkampatti', 35, 1),
(3902, 'Lalgudi', 35, 1),
(3903, 'Lalpet', 35, 1),
(3904, 'Llayangudi', 35, 1),
(3905, 'Madambakkam', 35, 1),
(3906, 'Madanur', 35, 1),
(3907, 'Madathukulam', 35, 1),
(3908, 'Madhavaram', 35, 1),
(3909, 'Madippakkam', 35, 1),
(3910, 'Madukkarai', 35, 1),
(3911, 'Madukkur', 35, 1),
(3912, 'Madurai', 35, 1),
(3913, 'Maduranthakam', 35, 1),
(3914, 'Maduravoyal', 35, 1),
(3915, 'Mahabalipuram', 35, 1),
(3916, 'Makkinanpatti', 35, 1),
(3917, 'Mallamuppampatti', 35, 1),
(3918, 'Mallankinaru', 35, 1),
(3919, 'Mallapuram', 35, 1),
(3920, 'Mallasamudram', 35, 1),
(3921, 'Mallur', 35, 1),
(3922, 'Mamallapuram', 35, 1),
(3923, 'Mamsapuram', 35, 1),
(3924, 'Manachanallur', 35, 1),
(3925, 'Manali', 35, 1),
(3926, 'Manalmedu', 35, 1),
(3927, 'Manalurpet', 35, 1),
(3928, 'Manamadurai', 35, 1),
(3929, 'Manapakkam', 35, 1),
(3930, 'Manapparai', 35, 1),
(3931, 'Manavalakurichi', 35, 1),
(3932, 'Mandaikadu', 35, 1),
(3933, 'Mandapam', 35, 1),
(3934, 'Mangadu', 35, 1),
(3935, 'Mangalam', 35, 1),
(3936, 'Mangalampet', 35, 1),
(3937, 'Manimutharu', 35, 1),
(3938, 'Mannargudi', 35, 1),
(3939, 'Mappilaiurani', 35, 1),
(3940, 'Maraimalai Nagar', 35, 1),
(3941, 'Marakkanam', 35, 1),
(3942, 'Maramangalathupatti', 35, 1),
(3943, 'Marandahalli', 35, 1),
(3944, 'Markayankottai', 35, 1),
(3945, 'Marudur', 35, 1),
(3946, 'Marungur', 35, 1),
(3947, 'Masinigudi', 35, 1),
(3948, 'Mathigiri', 35, 1),
(3949, 'Mattur', 35, 1),
(3950, 'Mayiladuthurai', 35, 1),
(3951, 'Mecheri', 35, 1),
(3952, 'Melacheval', 35, 1),
(3953, 'Melachokkanathapuram', 35, 1),
(3954, 'Melagaram', 35, 1),
(3955, 'Melamadai', 35, 1),
(3956, 'Melamaiyur', 35, 1),
(3957, 'Melanattam', 35, 1),
(3958, 'Melathiruppanthuruthi', 35, 1),
(3959, 'Melattur', 35, 1),
(3960, 'Melmananbedu', 35, 1),
(3961, 'Melpattampakkam', 35, 1),
(3962, 'Melur', 35, 1),
(3963, 'Melvisharam', 35, 1),
(3964, 'Mettupalayam', 35, 1),
(3965, 'Mettur', 35, 1),
(3966, 'Meyyanur', 35, 1),
(3967, 'Milavittan', 35, 1),
(3968, 'Minakshipuram', 35, 1),
(3969, 'Minambakkam', 35, 1),
(3970, 'Minjur', 35, 1),
(3971, 'Modakurichi', 35, 1),
(3972, 'Mohanur', 35, 1),
(3973, 'Mopperipalayam', 35, 1),
(3974, 'Mudalur', 35, 1),
(3975, 'Mudichur', 35, 1),
(3976, 'Mudukulathur', 35, 1),
(3977, 'Mukasipidariyur', 35, 1),
(3978, 'Mukkudal', 35, 1),
(3979, 'Mulagumudu', 35, 1),
(3980, 'Mulakaraipatti', 35, 1),
(3981, 'Mulanur', 35, 1),
(3982, 'Mullakkadu', 35, 1),
(3983, 'Muruganpalayam', 35, 1),
(3984, 'Musiri', 35, 1),
(3985, 'Muthupet', 35, 1),
(3986, 'Muthur', 35, 1),
(3987, 'Muttayyapuram', 35, 1),
(3988, 'Muttupet', 35, 1),
(3989, 'Muvarasampettai', 35, 1),
(3990, 'Myladi', 35, 1),
(3991, 'Mylapore', 35, 1),
(3992, 'Nadukkuthagai', 35, 1),
(3993, 'Naduvattam', 35, 1),
(3994, 'Nagapattinam', 35, 1),
(3995, 'Nagavakulam', 35, 1),
(3996, 'Nagercoil', 35, 1);
INSERT INTO `cities` (`id`, `name`, `state_id`, `status`) VALUES
(3997, 'Nagojanahalli', 35, 1),
(3998, 'Nallampatti', 35, 1),
(3999, 'Nallur', 35, 1),
(4000, 'Namagiripettai', 35, 1),
(4001, 'Namakkal', 35, 1),
(4002, 'Nambiyur', 35, 1),
(4003, 'Nambutalai', 35, 1),
(4004, 'Nandambakkam', 35, 1),
(4005, 'Nandivaram', 35, 1),
(4006, 'Nangavalli', 35, 1),
(4007, 'Nangavaram', 35, 1),
(4008, 'Nanguneri', 35, 1),
(4009, 'Nanjikottai', 35, 1),
(4010, 'Nannilam', 35, 1),
(4011, 'Naranammalpuram', 35, 1),
(4012, 'Naranapuram', 35, 1),
(4013, 'Narasimhanaickenpalayam', 35, 1),
(4014, 'Narasingapuram', 35, 1),
(4015, 'Narasojipatti', 35, 1),
(4016, 'Naravarikuppam', 35, 1),
(4017, 'Nasiyanur', 35, 1),
(4018, 'Natham', 35, 1),
(4019, 'Nathampannai', 35, 1),
(4020, 'Natrampalli', 35, 1),
(4021, 'Nattam', 35, 1),
(4022, 'Nattapettai', 35, 1),
(4023, 'Nattarasankottai', 35, 1),
(4024, 'Navalpattu', 35, 1),
(4025, 'Nazarethpettai', 35, 1),
(4026, 'Nazerath', 35, 1),
(4027, 'Neikkarapatti', 35, 1),
(4028, 'Neiyyur', 35, 1),
(4029, 'Nellikkuppam', 35, 1),
(4030, 'Nelliyalam', 35, 1),
(4031, 'Nemili', 35, 1),
(4032, 'Nemilicheri', 35, 1),
(4033, 'Neripperichal', 35, 1),
(4034, 'Nerkunram', 35, 1),
(4035, 'Nerkuppai', 35, 1),
(4036, 'Nerunjipettai', 35, 1),
(4037, 'Neykkarappatti', 35, 1),
(4038, 'Neyveli', 35, 1),
(4039, 'Nidamangalam', 35, 1),
(4040, 'Nilagiri', 35, 1),
(4041, 'Nilakkottai', 35, 1),
(4042, 'Nilankarai', 35, 1),
(4043, 'Odaipatti', 35, 1),
(4044, 'Odaiyakulam', 35, 1),
(4045, 'Oddanchatram', 35, 1),
(4046, 'Odugathur', 35, 1),
(4047, 'Oggiyamduraipakkam', 35, 1),
(4048, 'Olagadam', 35, 1),
(4049, 'Omalur', 35, 1),
(4050, 'Ooty', 35, 1),
(4051, 'Orathanadu', 35, 1),
(4052, 'Othakadai', 35, 1),
(4053, 'Othakalmandapam', 35, 1),
(4054, 'Ottapparai', 35, 1),
(4055, 'Pacode', 35, 1),
(4056, 'Padaividu', 35, 1),
(4057, 'Padianallur', 35, 1),
(4058, 'Padirikuppam', 35, 1),
(4059, 'Padmanabhapuram', 35, 1),
(4060, 'Padririvedu', 35, 1),
(4061, 'Palaganangudy', 35, 1),
(4062, 'Palaimpatti', 35, 1),
(4063, 'Palakkodu', 35, 1),
(4064, 'Palamedu', 35, 1),
(4065, 'Palani', 35, 1),
(4066, 'Palani Chettipatti', 35, 1),
(4067, 'Palavakkam', 35, 1),
(4068, 'Palavansathu', 35, 1),
(4069, 'Palayakayal', 35, 1),
(4070, 'Palayam', 35, 1),
(4071, 'Palayamkottai', 35, 1),
(4072, 'Palladam', 35, 1),
(4073, 'Pallapalayam', 35, 1),
(4074, 'Pallapatti', 35, 1),
(4075, 'Pallattur', 35, 1),
(4076, 'Pallavaram', 35, 1),
(4077, 'Pallikaranai', 35, 1),
(4078, 'Pallikonda', 35, 1),
(4079, 'Pallipalaiyam', 35, 1),
(4080, 'Pallipalaiyam Agraharam', 35, 1),
(4081, 'Pallipattu', 35, 1),
(4082, 'Pammal', 35, 1),
(4083, 'Panagudi', 35, 1),
(4084, 'Panaimarathupatti', 35, 1),
(4085, 'Panapakkam', 35, 1),
(4086, 'Panboli', 35, 1),
(4087, 'Pandamangalam', 35, 1),
(4088, 'Pannaikadu', 35, 1),
(4089, 'Pannaipuram', 35, 1),
(4090, 'Pannuratti', 35, 1),
(4091, 'Panruti', 35, 1),
(4092, 'Papanasam', 35, 1),
(4093, 'Pappankurichi', 35, 1),
(4094, 'Papparapatti', 35, 1),
(4095, 'Pappireddipatti', 35, 1),
(4096, 'Paramakkudi', 35, 1),
(4097, 'Paramankurichi', 35, 1),
(4098, 'Paramathi', 35, 1),
(4099, 'Parangippettai', 35, 1),
(4100, 'Paravai', 35, 1),
(4101, 'Pasur', 35, 1),
(4102, 'Pathamadai', 35, 1),
(4103, 'Pattinam', 35, 1),
(4104, 'Pattiviranpatti', 35, 1),
(4105, 'Pattukkottai', 35, 1),
(4106, 'Pazhugal', 35, 1),
(4107, 'Pennadam', 35, 1),
(4108, 'Pennagaram', 35, 1),
(4109, 'Pennathur', 35, 1),
(4110, 'Peraiyur', 35, 1),
(4111, 'Peralam', 35, 1),
(4112, 'Perambalur', 35, 1),
(4113, 'Peranamallur', 35, 1),
(4114, 'Peravurani', 35, 1),
(4115, 'Periyakodiveri', 35, 1),
(4116, 'Periyakulam', 35, 1),
(4117, 'Periyanayakkanpalaiyam', 35, 1),
(4118, 'Periyanegamam', 35, 1),
(4119, 'Periyapatti', 35, 1),
(4120, 'Periyasemur', 35, 1),
(4121, 'Pernambut', 35, 1),
(4122, 'Perumagalur', 35, 1),
(4123, 'Perumandi', 35, 1),
(4124, 'Perumuchi', 35, 1),
(4125, 'Perundurai', 35, 1),
(4126, 'Perungalathur', 35, 1),
(4127, 'Perungudi', 35, 1),
(4128, 'Perungulam', 35, 1),
(4129, 'Perur', 35, 1),
(4130, 'Perur Chettipalaiyam', 35, 1),
(4131, 'Pethampalayam', 35, 1),
(4132, 'Pethanaickenpalayam', 35, 1),
(4133, 'Pillanallur', 35, 1),
(4134, 'Pirkankaranai', 35, 1),
(4135, 'Polichalur', 35, 1),
(4136, 'Pollachi', 35, 1),
(4137, 'Polur', 35, 1),
(4138, 'Ponmani', 35, 1),
(4139, 'Ponnamaravathi', 35, 1),
(4140, 'Ponnampatti', 35, 1),
(4141, 'Ponneri', 35, 1),
(4142, 'Porur', 35, 1),
(4143, 'Pothanur', 35, 1),
(4144, 'Pothatturpettai', 35, 1),
(4145, 'Pudukadai', 35, 1),
(4146, 'Pudukkottai Cantonment', 35, 1),
(4147, 'Pudukottai', 35, 1),
(4148, 'Pudupalaiyam Aghraharam', 35, 1),
(4149, 'Pudupalayam', 35, 1),
(4150, 'Pudupatti', 35, 1),
(4151, 'Pudupattinam', 35, 1),
(4152, 'Pudur', 35, 1),
(4153, 'Puduvayal', 35, 1),
(4154, 'Pulambadi', 35, 1),
(4155, 'Pulampatti', 35, 1),
(4156, 'Puliyampatti', 35, 1),
(4157, 'Puliyankudi', 35, 1),
(4158, 'Puliyur', 35, 1),
(4159, 'Pullampadi', 35, 1),
(4160, 'Puluvapatti', 35, 1),
(4161, 'Punamalli', 35, 1),
(4162, 'Punjai Puliyampatti', 35, 1),
(4163, 'Punjai Thottakurichi', 35, 1),
(4164, 'Punjaipugalur', 35, 1),
(4165, 'Puthalam', 35, 1),
(4166, 'Putteri', 35, 1),
(4167, 'Puvalur', 35, 1),
(4168, 'Puzhal', 35, 1),
(4169, 'Puzhithivakkam', 35, 1),
(4170, 'Rajapalayam', 35, 1),
(4171, 'Ramanathapuram', 35, 1),
(4172, 'Ramapuram', 35, 1),
(4173, 'Rameswaram', 35, 1),
(4174, 'Ranipet', 35, 1),
(4175, 'Rasipuram', 35, 1),
(4176, 'Rayagiri', 35, 1),
(4177, 'Rithapuram', 35, 1),
(4178, 'Rosalpatti', 35, 1),
(4179, 'Rudravathi', 35, 1),
(4180, 'Sadayankuppam', 35, 1),
(4181, 'Saint Thomas Mount', 35, 1),
(4182, 'Salangapalayam', 35, 1),
(4183, 'Salem', 35, 1),
(4184, 'Samalapuram', 35, 1),
(4185, 'Samathur', 35, 1),
(4186, 'Sambavar Vadagarai', 35, 1),
(4187, 'Sankaramanallur', 35, 1),
(4188, 'Sankarankoil', 35, 1),
(4189, 'Sankarapuram', 35, 1),
(4190, 'Sankari', 35, 1),
(4191, 'Sankarnagar', 35, 1),
(4192, 'Saravanampatti', 35, 1),
(4193, 'Sarcarsamakulam', 35, 1),
(4194, 'Sathiyavijayanagaram', 35, 1),
(4195, 'Sathuvachari', 35, 1),
(4196, 'Sathyamangalam', 35, 1),
(4197, 'Sattankulam', 35, 1),
(4198, 'Sattur', 35, 1),
(4199, 'Sayalgudi', 35, 1),
(4200, 'Sayapuram', 35, 1),
(4201, 'Seithur', 35, 1),
(4202, 'Sembakkam', 35, 1),
(4203, 'Semmipalayam', 35, 1),
(4204, 'Sennirkuppam', 35, 1),
(4205, 'Senthamangalam', 35, 1),
(4206, 'Sentharapatti', 35, 1),
(4207, 'Senur', 35, 1),
(4208, 'Sethiathoppu', 35, 1),
(4209, 'Sevilimedu', 35, 1),
(4210, 'Sevugampatti', 35, 1),
(4211, 'Shenbakkam', 35, 1),
(4212, 'Shencottai', 35, 1),
(4213, 'Shenkottai', 35, 1),
(4214, 'Sholavandan', 35, 1),
(4215, 'Sholinganallur', 35, 1),
(4216, 'Sholingur', 35, 1),
(4217, 'Sholur', 35, 1),
(4218, 'Sikkarayapuram', 35, 1),
(4219, 'Singampuneri', 35, 1),
(4220, 'Singanallur', 35, 1),
(4221, 'Singaperumalkoil', 35, 1),
(4222, 'Sirapalli', 35, 1),
(4223, 'Sirkali', 35, 1),
(4224, 'Sirugamani', 35, 1),
(4225, 'Sirumugai', 35, 1),
(4226, 'Sithayankottai', 35, 1),
(4227, 'Sithurajapuram', 35, 1),
(4228, 'Sivaganga', 35, 1),
(4229, 'Sivagiri', 35, 1),
(4230, 'Sivakasi', 35, 1),
(4231, 'Sivanthipuram', 35, 1),
(4232, 'Sivur', 35, 1),
(4233, 'Soranjeri', 35, 1),
(4234, 'South Kannanur', 35, 1),
(4235, 'South Kodikulam', 35, 1),
(4236, 'Srimushnam', 35, 1),
(4237, 'Sriperumpudur', 35, 1),
(4238, 'Sriramapuram', 35, 1),
(4239, 'Srirangam', 35, 1),
(4240, 'Srivaikuntam', 35, 1),
(4241, 'Srivilliputtur', 35, 1),
(4242, 'Suchindram', 35, 1),
(4243, 'Suliswaranpatti', 35, 1),
(4244, 'Sulur', 35, 1),
(4245, 'Sundarapandiam', 35, 1),
(4246, 'Sundarapandiapuram', 35, 1),
(4247, 'Surampatti', 35, 1),
(4248, 'Surandai', 35, 1),
(4249, 'Suriyampalayam', 35, 1),
(4250, 'Swamimalai', 35, 1),
(4251, 'TNPL Pugalur', 35, 1),
(4252, 'Tambaram', 35, 1),
(4253, 'Taramangalam', 35, 1),
(4254, 'Tattayyangarpettai', 35, 1),
(4255, 'Tayilupatti', 35, 1),
(4256, 'Tenkasi', 35, 1),
(4257, 'Thadikombu', 35, 1),
(4258, 'Thakkolam', 35, 1),
(4259, 'Thalainayar', 35, 1),
(4260, 'Thalakudi', 35, 1),
(4261, 'Thamaraikulam', 35, 1),
(4262, 'Thammampatti', 35, 1),
(4263, 'Thanjavur', 35, 1),
(4264, 'Thanthoni', 35, 1),
(4265, 'Tharangambadi', 35, 1),
(4266, 'Thedavur', 35, 1),
(4267, 'Thenambakkam', 35, 1),
(4268, 'Thengampudur', 35, 1),
(4269, 'Theni', 35, 1),
(4270, 'Theni Allinagaram', 35, 1),
(4271, 'Thenkarai', 35, 1),
(4272, 'Thenthamaraikulam', 35, 1),
(4273, 'Thenthiruperai', 35, 1),
(4274, 'Thesur', 35, 1),
(4275, 'Thevaram', 35, 1),
(4276, 'Thevur', 35, 1),
(4277, 'Thiagadurgam', 35, 1),
(4278, 'Thiagarajar Colony', 35, 1),
(4279, 'Thingalnagar', 35, 1),
(4280, 'Thiruchirapalli', 35, 1),
(4281, 'Thirukarungudi', 35, 1),
(4282, 'Thirukazhukundram', 35, 1),
(4283, 'Thirumalayampalayam', 35, 1),
(4284, 'Thirumazhisai', 35, 1),
(4285, 'Thirunagar', 35, 1),
(4286, 'Thirunageswaram', 35, 1),
(4287, 'Thirunindravur', 35, 1),
(4288, 'Thirunirmalai', 35, 1),
(4289, 'Thiruparankundram', 35, 1),
(4290, 'Thiruparappu', 35, 1),
(4291, 'Thiruporur', 35, 1),
(4292, 'Thiruppanandal', 35, 1),
(4293, 'Thirupuvanam', 35, 1),
(4294, 'Thiruthangal', 35, 1),
(4295, 'Thiruthuraipundi', 35, 1),
(4296, 'Thiruvaivaru', 35, 1),
(4297, 'Thiruvalam', 35, 1),
(4298, 'Thiruvarur', 35, 1),
(4299, 'Thiruvattaru', 35, 1),
(4300, 'Thiruvenkatam', 35, 1),
(4301, 'Thiruvennainallur', 35, 1),
(4302, 'Thiruvithankodu', 35, 1),
(4303, 'Thisayanvilai', 35, 1),
(4304, 'Thittacheri', 35, 1),
(4305, 'Thondamuthur', 35, 1),
(4306, 'Thorapadi', 35, 1),
(4307, 'Thottipalayam', 35, 1),
(4308, 'Thottiyam', 35, 1),
(4309, 'Thudiyalur', 35, 1),
(4310, 'Thuthipattu', 35, 1),
(4311, 'Thuvakudi', 35, 1),
(4312, 'Timiri', 35, 1),
(4313, 'Tindivanam', 35, 1),
(4314, 'Tinnanur', 35, 1),
(4315, 'Tiruchchendur', 35, 1),
(4316, 'Tiruchengode', 35, 1),
(4317, 'Tirukkalukkundram', 35, 1),
(4318, 'Tirukkattuppalli', 35, 1),
(4319, 'Tirukkoyilur', 35, 1),
(4320, 'Tirumangalam', 35, 1),
(4321, 'Tirumullaivasal', 35, 1),
(4322, 'Tirumuruganpundi', 35, 1),
(4323, 'Tirunageswaram', 35, 1),
(4324, 'Tirunelveli', 35, 1),
(4325, 'Tirupathur', 35, 1),
(4326, 'Tirupattur', 35, 1),
(4327, 'Tiruppuvanam', 35, 1),
(4328, 'Tirupur', 35, 1),
(4329, 'Tirusulam', 35, 1),
(4330, 'Tiruttani', 35, 1),
(4331, 'Tiruvallur', 35, 1),
(4332, 'Tiruvannamalai', 35, 1),
(4333, 'Tiruverambur', 35, 1),
(4334, 'Tiruverkadu', 35, 1),
(4335, 'Tiruvethipuram', 35, 1),
(4336, 'Tiruvidaimarudur', 35, 1),
(4337, 'Tiruvottiyur', 35, 1),
(4338, 'Tittakudi', 35, 1),
(4339, 'Tondi', 35, 1),
(4340, 'Turaiyur', 35, 1),
(4341, 'Tuticorin', 35, 1),
(4342, 'Udagamandalam', 35, 1),
(4343, 'Udagamandalam Valley', 35, 1),
(4344, 'Udankudi', 35, 1),
(4345, 'Udayarpalayam', 35, 1),
(4346, 'Udumalaipettai', 35, 1),
(4347, 'Udumalpet', 35, 1),
(4348, 'Ullur', 35, 1),
(4349, 'Ulundurpettai', 35, 1),
(4350, 'Unjalaur', 35, 1),
(4351, 'Unnamalaikadai', 35, 1),
(4352, 'Uppidamangalam', 35, 1),
(4353, 'Uppiliapuram', 35, 1),
(4354, 'Urachikkottai', 35, 1),
(4355, 'Urapakkam', 35, 1),
(4356, 'Usilampatti', 35, 1),
(4357, 'Uthangarai', 35, 1),
(4358, 'Uthayendram', 35, 1),
(4359, 'Uthiramerur', 35, 1),
(4360, 'Uthukkottai', 35, 1),
(4361, 'Uttamapalaiyam', 35, 1),
(4362, 'Uttukkuli', 35, 1),
(4363, 'Vadakarai Kizhpadugai', 35, 1),
(4364, 'Vadakkanandal', 35, 1),
(4365, 'Vadakku Valliyur', 35, 1),
(4366, 'Vadalur', 35, 1),
(4367, 'Vadamadurai', 35, 1),
(4368, 'Vadavalli', 35, 1),
(4369, 'Vadipatti', 35, 1),
(4370, 'Vadugapatti', 35, 1),
(4371, 'Vaithiswarankoil', 35, 1),
(4372, 'Valangaiman', 35, 1),
(4373, 'Valasaravakkam', 35, 1),
(4374, 'Valavanur', 35, 1),
(4375, 'Vallam', 35, 1),
(4376, 'Valparai', 35, 1),
(4377, 'Valvaithankoshtam', 35, 1),
(4378, 'Vanavasi', 35, 1),
(4379, 'Vandalur', 35, 1),
(4380, 'Vandavasi', 35, 1),
(4381, 'Vandiyur', 35, 1),
(4382, 'Vaniputhur', 35, 1),
(4383, 'Vaniyambadi', 35, 1),
(4384, 'Varadarajanpettai', 35, 1),
(4385, 'Varadharajapuram', 35, 1),
(4386, 'Vasudevanallur', 35, 1),
(4387, 'Vathirairuppu', 35, 1),
(4388, 'Vattalkundu', 35, 1),
(4389, 'Vazhapadi', 35, 1),
(4390, 'Vedapatti', 35, 1),
(4391, 'Vedaranniyam', 35, 1),
(4392, 'Vedasandur', 35, 1),
(4393, 'Velampalaiyam', 35, 1),
(4394, 'Velankanni', 35, 1),
(4395, 'Vellakinar', 35, 1),
(4396, 'Vellakoil', 35, 1),
(4397, 'Vellalapatti', 35, 1),
(4398, 'Vellalur', 35, 1),
(4399, 'Vellanur', 35, 1),
(4400, 'Vellimalai', 35, 1),
(4401, 'Vellore', 35, 1),
(4402, 'Vellottamparappu', 35, 1),
(4403, 'Velluru', 35, 1),
(4404, 'Vengampudur', 35, 1),
(4405, 'Vengathur', 35, 1),
(4406, 'Vengavasal', 35, 1),
(4407, 'Venghatur', 35, 1),
(4408, 'Venkarai', 35, 1),
(4409, 'Vennanthur', 35, 1),
(4410, 'Veppathur', 35, 1),
(4411, 'Verkilambi', 35, 1),
(4412, 'Vettaikaranpudur', 35, 1),
(4413, 'Vettavalam', 35, 1),
(4414, 'Vijayapuri', 35, 1),
(4415, 'Vikramasingapuram', 35, 1),
(4416, 'Vikravandi', 35, 1),
(4417, 'Vilangudi', 35, 1),
(4418, 'Vilankurichi', 35, 1),
(4419, 'Vilapakkam', 35, 1),
(4420, 'Vilathikulam', 35, 1),
(4421, 'Vilavur', 35, 1),
(4422, 'Villukuri', 35, 1),
(4423, 'Villupuram', 35, 1),
(4424, 'Viraganur', 35, 1),
(4425, 'Virakeralam', 35, 1),
(4426, 'Virakkalpudur', 35, 1),
(4427, 'Virapandi', 35, 1),
(4428, 'Virapandi Cantonment', 35, 1),
(4429, 'Virappanchatram', 35, 1),
(4430, 'Viravanallur', 35, 1),
(4431, 'Virudambattu', 35, 1),
(4432, 'Virudhachalam', 35, 1),
(4433, 'Virudhunagar', 35, 1),
(4434, 'Virupakshipuram', 35, 1),
(4435, 'Viswanatham', 35, 1),
(4436, 'Vriddhachalam', 35, 1),
(4437, 'Walajabad', 35, 1),
(4438, 'Walajapet', 35, 1),
(4439, 'Wellington', 35, 1),
(4440, 'Yercaud', 35, 1),
(4441, 'Zamin Uthukuli', 35, 1),
(4442, 'Achampet', 36, 1),
(4443, 'Adilabad', 36, 1),
(4444, 'Armoor', 36, 1),
(4445, 'Asifabad', 36, 1),
(4446, 'Badepally', 36, 1),
(4447, 'Banswada', 36, 1),
(4448, 'Bellampalli', 36, 1),
(4449, 'Bhadrachalam', 36, 1),
(4450, 'Bhainsa', 36, 1),
(4451, 'Bhongir', 36, 1),
(4452, 'Bhupalpally', 36, 1),
(4453, 'Bodhan', 36, 1),
(4454, 'Bollaram', 36, 1),
(4455, 'Devarkonda', 36, 1),
(4456, 'Farooqnagar', 36, 1),
(4457, 'Gadwal', 36, 1),
(4458, 'Gajwel', 36, 1),
(4459, 'Ghatkesar', 36, 1),
(4460, 'Hyderabad', 36, 1),
(4461, 'Jagtial', 36, 1),
(4462, 'Jangaon', 36, 1),
(4463, 'Kagaznagar', 36, 1),
(4464, 'Kalwakurthy', 36, 1),
(4465, 'Kamareddy', 36, 1),
(4466, 'Karimnagar', 36, 1),
(4467, 'Khammam', 36, 1),
(4468, 'Kodada', 36, 1),
(4469, 'Koratla', 36, 1),
(4470, 'Kottagudem', 36, 1),
(4471, 'Kyathampalle', 36, 1),
(4472, 'Madhira', 36, 1),
(4473, 'Mahabubabad', 36, 1),
(4474, 'Mahbubnagar', 36, 1),
(4475, 'Mancherial', 36, 1),
(4476, 'Mandamarri', 36, 1),
(4477, 'Manuguru', 36, 1),
(4478, 'Medak', 36, 1),
(4479, 'Medchal', 36, 1),
(4480, 'Miryalaguda', 36, 1),
(4481, 'Nagar Karnul', 36, 1),
(4482, 'Nakrekal', 36, 1),
(4483, 'Nalgonda', 36, 1),
(4484, 'Narayanpet', 36, 1),
(4485, 'Narsampet', 36, 1),
(4486, 'Nirmal', 36, 1),
(4487, 'Nizamabad', 36, 1),
(4488, 'Palwancha', 36, 1),
(4489, 'Peddapalli', 36, 1),
(4490, 'Ramagundam', 36, 1),
(4491, 'Ranga Reddy district', 36, 1),
(4492, 'Sadasivpet', 36, 1),
(4493, 'Sangareddy', 36, 1),
(4494, 'Sarapaka', 36, 1),
(4495, 'Sathupalle', 36, 1),
(4496, 'Secunderabad', 36, 1),
(4497, 'Siddipet', 36, 1),
(4498, 'Singapur', 36, 1),
(4499, 'Sircilla', 36, 1),
(4500, 'Suryapet', 36, 1),
(4501, 'Tandur', 36, 1),
(4502, 'Vemulawada', 36, 1),
(4503, 'Vikarabad', 36, 1),
(4504, 'Wanaparthy', 36, 1),
(4505, 'Warangal', 36, 1),
(4506, 'Yellandu', 36, 1),
(4507, 'Zahirabad', 36, 1),
(4508, 'Agartala', 37, 1),
(4509, 'Amarpur', 37, 1),
(4510, 'Ambassa', 37, 1),
(4511, 'Badharghat', 37, 1),
(4512, 'Belonia', 37, 1),
(4513, 'Dharmanagar', 37, 1),
(4514, 'Gakulnagar', 37, 1),
(4515, 'Gandhigram', 37, 1),
(4516, 'Indranagar', 37, 1),
(4517, 'Jogendranagar', 37, 1),
(4518, 'Kailasahar', 37, 1),
(4519, 'Kamalpur', 37, 1),
(4520, 'Kanchanpur', 37, 1),
(4521, 'Khowai', 37, 1),
(4522, 'Kumarghat', 37, 1),
(4523, 'Kunjaban', 37, 1),
(4524, 'Narsingarh', 37, 1),
(4525, 'Pratapgarh', 37, 1),
(4526, 'Ranir Bazar', 37, 1),
(4527, 'Sabrum', 37, 1),
(4528, 'Sonamura', 37, 1),
(4529, 'Teliamura', 37, 1),
(4530, 'Udaipur', 37, 1),
(4531, 'Achhalda', 38, 1),
(4532, 'Achhnera', 38, 1),
(4533, 'Adari', 38, 1),
(4534, 'Afzalgarh', 38, 1),
(4535, 'Agarwal Mandi', 38, 1),
(4536, 'Agra', 38, 1),
(4537, 'Agra Cantonment', 38, 1),
(4538, 'Ahraura', 38, 1),
(4539, 'Ailum', 38, 1),
(4540, 'Air Force Area', 38, 1),
(4541, 'Ajhuwa', 38, 1),
(4542, 'Akbarpur', 38, 1),
(4543, 'Alapur', 38, 1),
(4544, 'Aliganj', 38, 1),
(4545, 'Aligarh', 38, 1),
(4546, 'Allahabad', 38, 1),
(4547, 'Allahabad Cantonment', 38, 1),
(4548, 'Allahganj', 38, 1),
(4549, 'Amanpur', 38, 1),
(4550, 'Ambahta', 38, 1),
(4551, 'Amethi', 38, 1),
(4552, 'Amila', 38, 1),
(4553, 'Amilo', 38, 1),
(4554, 'Aminagar Sarai', 38, 1),
(4555, 'Aminagar Urf Bhurbaral', 38, 1),
(4556, 'Amraudha', 38, 1),
(4557, 'Amroha', 38, 1),
(4558, 'Anandnagar', 38, 1),
(4559, 'Anpara', 38, 1),
(4560, 'Antu', 38, 1),
(4561, 'Anupshahr', 38, 1),
(4562, 'Aonla', 38, 1),
(4563, 'Armapur Estate', 38, 1),
(4564, 'Ashokpuram', 38, 1),
(4565, 'Ashrafpur Kichhauchha', 38, 1),
(4566, 'Atarra', 38, 1),
(4567, 'Atasu', 38, 1),
(4568, 'Atrauli', 38, 1),
(4569, 'Atraulia', 38, 1),
(4570, 'Auraiya', 38, 1),
(4571, 'Aurangabad', 38, 1),
(4572, 'Aurangabad Bangar', 38, 1),
(4573, 'Auras', 38, 1),
(4574, 'Awagarh', 38, 1),
(4575, 'Ayodhya', 38, 1),
(4576, 'Azamgarh', 38, 1),
(4577, 'Azizpur', 38, 1),
(4578, 'Azmatgarh', 38, 1),
(4579, 'Babarpur Ajitmal', 38, 1),
(4580, 'Baberu', 38, 1),
(4581, 'Babina', 38, 1),
(4582, 'Babrala', 38, 1),
(4583, 'Babugarh', 38, 1),
(4584, 'Bachhiowan', 38, 1),
(4585, 'Bachhraon', 38, 1),
(4586, 'Bad', 38, 1),
(4587, 'Badaun', 38, 1),
(4588, 'Baghpat', 38, 1),
(4589, 'Bah', 38, 1),
(4590, 'Bahadurganj', 38, 1),
(4591, 'Baheri', 38, 1),
(4592, 'Bahjoi', 38, 1),
(4593, 'Bahraich', 38, 1),
(4594, 'Bahsuma', 38, 1),
(4595, 'Bahua', 38, 1),
(4596, 'Bajna', 38, 1),
(4597, 'Bakewar', 38, 1),
(4598, 'Bakiabad', 38, 1),
(4599, 'Baldeo', 38, 1),
(4600, 'Ballia', 38, 1),
(4601, 'Balrampur', 38, 1),
(4602, 'Banat', 38, 1),
(4603, 'Banda', 38, 1),
(4604, 'Bangarmau', 38, 1),
(4605, 'Banki', 38, 1),
(4606, 'Bansdih', 38, 1),
(4607, 'Bansgaon', 38, 1),
(4608, 'Bansi', 38, 1),
(4609, 'Barabanki', 38, 1),
(4610, 'Baragaon', 38, 1),
(4611, 'Baraut', 38, 1),
(4612, 'Bareilly', 38, 1),
(4613, 'Bareilly Cantonment', 38, 1),
(4614, 'Barhalganj', 38, 1),
(4615, 'Barhani', 38, 1),
(4616, 'Barhapur', 38, 1),
(4617, 'Barkhera', 38, 1),
(4618, 'Barsana', 38, 1),
(4619, 'Barva Sagar', 38, 1),
(4620, 'Barwar', 38, 1),
(4621, 'Basti', 38, 1),
(4622, 'Begumabad Budhana', 38, 1),
(4623, 'Behat', 38, 1),
(4624, 'Behta Hajipur', 38, 1),
(4625, 'Bela', 38, 1),
(4626, 'Belthara', 38, 1),
(4627, 'Beniganj', 38, 1),
(4628, 'Beswan', 38, 1),
(4629, 'Bewar', 38, 1),
(4630, 'Bhadarsa', 38, 1),
(4631, 'Bhadohi', 38, 1),
(4632, 'Bhagwantnagar', 38, 1),
(4633, 'Bharatganj', 38, 1),
(4634, 'Bhargain', 38, 1),
(4635, 'Bharthana', 38, 1),
(4636, 'Bharuhana', 38, 1),
(4637, 'Bharwari', 38, 1),
(4638, 'Bhatni Bazar', 38, 1),
(4639, 'Bhatpar Rani', 38, 1),
(4640, 'Bhawan Bahadurnagar', 38, 1),
(4641, 'Bhinga', 38, 1),
(4642, 'Bhojpur Dharampur', 38, 1),
(4643, 'Bhokarhedi', 38, 1),
(4644, 'Bhongaon', 38, 1),
(4645, 'Bhulepur', 38, 1),
(4646, 'Bidhuna', 38, 1),
(4647, 'Bighapur', 38, 1),
(4648, 'Bijnor', 38, 1),
(4649, 'Bijpur', 38, 1),
(4650, 'Bikapur', 38, 1),
(4651, 'Bilari', 38, 1),
(4652, 'Bilaspur', 38, 1),
(4653, 'Bilgram', 38, 1),
(4654, 'Bilhaur', 38, 1),
(4655, 'Bilram', 38, 1),
(4656, 'Bilrayaganj', 38, 1),
(4657, 'Bilsanda', 38, 1),
(4658, 'Bilsi', 38, 1),
(4659, 'Bindki', 38, 1),
(4660, 'Bisalpur', 38, 1),
(4661, 'Bisanda Buzurg', 38, 1),
(4662, 'Bisauli', 38, 1),
(4663, 'Bisharatganj', 38, 1),
(4664, 'Bisokhar', 38, 1),
(4665, 'Biswan', 38, 1),
(4666, 'Bithur', 38, 1),
(4667, 'Budaun', 38, 1),
(4668, 'Bugrasi', 38, 1),
(4669, 'Bulandshahar', 38, 1),
(4670, 'Burhana', 38, 1),
(4671, 'Chail', 38, 1),
(4672, 'Chak Imam Ali', 38, 1),
(4673, 'Chakeri', 38, 1),
(4674, 'Chakia', 38, 1),
(4675, 'Chandauli', 38, 1),
(4676, 'Chandausi', 38, 1),
(4677, 'Chandpur', 38, 1),
(4678, 'Charkhari', 38, 1),
(4679, 'Charthawal', 38, 1),
(4680, 'Chaumuhan', 38, 1),
(4681, 'Chhaprauli', 38, 1),
(4682, 'Chhara Rafatpur', 38, 1),
(4683, 'Chharprauli', 38, 1),
(4684, 'Chhata', 38, 1),
(4685, 'Chhatari', 38, 1),
(4686, 'Chhibramau', 38, 1),
(4687, 'Chhutmalpur', 38, 1),
(4688, 'Chilkana Sultanpur', 38, 1),
(4689, 'Chirgaon', 38, 1),
(4690, 'Chit Baragaon', 38, 1),
(4691, 'Chitrakut Dham', 38, 1),
(4692, 'Chopan', 38, 1),
(4693, 'Choubepur Kalan', 38, 1),
(4694, 'Chunar', 38, 1),
(4695, 'Churk Ghurma', 38, 1),
(4696, 'Colonelganj', 38, 1),
(4697, 'Dadri', 38, 1),
(4698, 'Dalmau', 38, 1),
(4699, 'Dankaur', 38, 1),
(4700, 'Dariyabad', 38, 1),
(4701, 'Dasna', 38, 1),
(4702, 'Dataganj', 38, 1),
(4703, 'Daurala', 38, 1),
(4704, 'Dayal Bagh', 38, 1),
(4705, 'Deoband', 38, 1),
(4706, 'Deoranian', 38, 1),
(4707, 'Deoria', 38, 1),
(4708, 'Dewa', 38, 1),
(4709, 'Dhampur', 38, 1),
(4710, 'Dhanauha', 38, 1),
(4711, 'Dhanauli', 38, 1),
(4712, 'Dhanaura', 38, 1),
(4713, 'Dharoti Khurd', 38, 1),
(4714, 'Dhauratanda', 38, 1),
(4715, 'Dhaurhra', 38, 1),
(4716, 'Dibai', 38, 1),
(4717, 'Dibiyapur', 38, 1),
(4718, 'Dildarnagar Fatehpur', 38, 1),
(4719, 'Do Ghat', 38, 1),
(4720, 'Dohrighat', 38, 1),
(4721, 'Dostpur', 38, 1),
(4722, 'Dudhinagar', 38, 1),
(4723, 'Dulhipur', 38, 1),
(4724, 'Dundwaraganj', 38, 1),
(4725, 'Ekdil', 38, 1),
(4726, 'Erich', 38, 1),
(4727, 'Etah', 38, 1),
(4728, 'Etawah', 38, 1),
(4729, 'Faizabad', 38, 1),
(4730, 'Faizabad Cantonment', 38, 1),
(4731, 'Faizganj', 38, 1),
(4732, 'Farah', 38, 1),
(4733, 'Faridnagar', 38, 1),
(4734, 'Faridpur', 38, 1),
(4735, 'Faridpur Cantonment', 38, 1),
(4736, 'Fariha', 38, 1),
(4737, 'Farrukhabad', 38, 1),
(4738, 'Fatehabad', 38, 1),
(4739, 'Fatehganj Pashchimi', 38, 1),
(4740, 'Fatehganj Purvi', 38, 1),
(4741, 'Fatehgarh', 38, 1),
(4742, 'Fatehpur', 38, 1),
(4743, 'Fatehpur Chaurasi', 38, 1),
(4744, 'Fatehpur Sikri', 38, 1),
(4745, 'Firozabad', 38, 1),
(4746, 'Gajraula', 38, 1),
(4747, 'Ganga Ghat', 38, 1),
(4748, 'Gangapur', 38, 1),
(4749, 'Gangoh', 38, 1),
(4750, 'Ganj Muradabad', 38, 1),
(4751, 'Garautha', 38, 1),
(4752, 'Garhi Pukhta', 38, 1),
(4753, 'Garhmukteshwar', 38, 1),
(4754, 'Gaura Barahaj', 38, 1),
(4755, 'Gauri Bazar', 38, 1),
(4756, 'Gausganj', 38, 1),
(4757, 'Gawan', 38, 1),
(4758, 'Ghatampur', 38, 1),
(4759, 'Ghaziabad', 38, 1),
(4760, 'Ghazipur', 38, 1),
(4761, 'Ghiror', 38, 1),
(4762, 'Ghorawal', 38, 1),
(4763, 'Ghosi', 38, 1),
(4764, 'Ghosia Bazar', 38, 1),
(4765, 'Ghughuli', 38, 1),
(4766, 'Gohand', 38, 1),
(4767, 'Gokul', 38, 1),
(4768, 'Gola Bazar', 38, 1),
(4769, 'Gola Gokarannath', 38, 1),
(4770, 'Gonda', 38, 1),
(4771, 'Gopamau', 38, 1),
(4772, 'Gopiganj', 38, 1),
(4773, 'Gorakhpur', 38, 1),
(4774, 'Gosainganj', 38, 1),
(4775, 'Govardhan', 38, 1),
(4776, 'Greater Noida', 38, 1),
(4777, 'Gulaothi', 38, 1),
(4778, 'Gulariya', 38, 1),
(4779, 'Gulariya Bhindara', 38, 1),
(4780, 'Gunnaur', 38, 1),
(4781, 'Gursahaiganj', 38, 1),
(4782, 'Gursarai', 38, 1),
(4783, 'Gyanpur', 38, 1),
(4784, 'Hafizpur', 38, 1),
(4785, 'Haidergarh', 38, 1),
(4786, 'Haldaur', 38, 1),
(4787, 'Hamirpur', 38, 1),
(4788, 'Handia', 38, 1),
(4789, 'Hapur', 38, 1),
(4790, 'Hardoi', 38, 1),
(4791, 'Harduaganj', 38, 1),
(4792, 'Hargaon', 38, 1),
(4793, 'Hariharpur', 38, 1),
(4794, 'Harraiya', 38, 1),
(4795, 'Hasanpur', 38, 1),
(4796, 'Hasayan', 38, 1),
(4797, 'Hastinapur', 38, 1),
(4798, 'Hata', 38, 1),
(4799, 'Hathras', 38, 1),
(4800, 'Hyderabad', 38, 1),
(4801, 'Ibrahimpur', 38, 1),
(4802, 'Iglas', 38, 1),
(4803, 'Ikauna', 38, 1),
(4804, 'Iltifatganj Bazar', 38, 1),
(4805, 'Indian Telephone Industry Mank', 38, 1),
(4806, 'Islamnagar', 38, 1),
(4807, 'Itaunja', 38, 1),
(4808, 'Itimadpur', 38, 1),
(4809, 'Jagner', 38, 1),
(4810, 'Jahanabad', 38, 1),
(4811, 'Jahangirabad', 38, 1),
(4812, 'Jahangirpur', 38, 1),
(4813, 'Jais', 38, 1),
(4814, 'Jaithara', 38, 1),
(4815, 'Jalalabad', 38, 1),
(4816, 'Jalali', 38, 1),
(4817, 'Jalalpur', 38, 1),
(4818, 'Jalaun', 38, 1),
(4819, 'Jalesar', 38, 1),
(4820, 'Jamshila', 38, 1),
(4821, 'Jangipur', 38, 1),
(4822, 'Jansath', 38, 1),
(4823, 'Jarwal', 38, 1),
(4824, 'Jasrana', 38, 1),
(4825, 'Jaswantnagar', 38, 1),
(4826, 'Jatari', 38, 1),
(4827, 'Jaunpur', 38, 1),
(4828, 'Jewar', 38, 1),
(4829, 'Jhalu', 38, 1),
(4830, 'Jhansi', 38, 1),
(4831, 'Jhansi Cantonment', 38, 1),
(4832, 'Jhansi Railway Settlement', 38, 1),
(4833, 'Jhinjhak', 38, 1),
(4834, 'Jhinjhana', 38, 1),
(4835, 'Jhusi', 38, 1),
(4836, 'Jhusi Kohna', 38, 1),
(4837, 'Jiyanpur', 38, 1),
(4838, 'Joya', 38, 1),
(4839, 'Jyoti Khuria', 38, 1),
(4840, 'Jyotiba Phule Nagar', 38, 1),
(4841, 'Kabrai', 38, 1),
(4842, 'Kachhauna Patseni', 38, 1),
(4843, 'Kachhla', 38, 1),
(4844, 'Kachhwa', 38, 1),
(4845, 'Kadaura', 38, 1),
(4846, 'Kadipur', 38, 1),
(4847, 'Kailashpur', 38, 1),
(4848, 'Kaimganj', 38, 1),
(4849, 'Kairana', 38, 1),
(4850, 'Kakgaina', 38, 1),
(4851, 'Kakod', 38, 1),
(4852, 'Kakori', 38, 1),
(4853, 'Kakrala', 38, 1),
(4854, 'Kalinagar', 38, 1),
(4855, 'Kalpi', 38, 1),
(4856, 'Kamalganj', 38, 1),
(4857, 'Kampil', 38, 1),
(4858, 'Kandhla', 38, 1),
(4859, 'Kandwa', 38, 1),
(4860, 'Kannauj', 38, 1),
(4861, 'Kanpur', 38, 1),
(4862, 'Kant', 38, 1),
(4863, 'Kanth', 38, 1),
(4864, 'Kaptanganj', 38, 1),
(4865, 'Karaon', 38, 1),
(4866, 'Karari', 38, 1),
(4867, 'Karhal', 38, 1),
(4868, 'Karnawal', 38, 1),
(4869, 'Kasganj', 38, 1),
(4870, 'Katariya', 38, 1),
(4871, 'Katghar Lalganj', 38, 1),
(4872, 'Kathera', 38, 1),
(4873, 'Katra', 38, 1),
(4874, 'Katra Medniganj', 38, 1),
(4875, 'Kauriaganj', 38, 1),
(4876, 'Kemri', 38, 1),
(4877, 'Kerakat', 38, 1),
(4878, 'Khadda', 38, 1),
(4879, 'Khaga', 38, 1),
(4880, 'Khailar', 38, 1),
(4881, 'Khair', 38, 1),
(4882, 'Khairabad', 38, 1),
(4883, 'Khairagarh', 38, 1),
(4884, 'Khalilabad', 38, 1),
(4885, 'Khamaria', 38, 1),
(4886, 'Khanpur', 38, 1),
(4887, 'Kharela', 38, 1),
(4888, 'Khargupur', 38, 1),
(4889, 'Khariya', 38, 1),
(4890, 'Kharkhoda', 38, 1),
(4891, 'Khatauli', 38, 1),
(4892, 'Khatauli Rural', 38, 1),
(4893, 'Khekra', 38, 1),
(4894, 'Kheri', 38, 1),
(4895, 'Kheta Sarai', 38, 1),
(4896, 'Khudaganj', 38, 1),
(4897, 'Khurja', 38, 1),
(4898, 'Khutar', 38, 1),
(4899, 'Kiraoli', 38, 1),
(4900, 'Kiratpur', 38, 1),
(4901, 'Kishanpur', 38, 1),
(4902, 'Kishni', 38, 1),
(4903, 'Kithaur', 38, 1),
(4904, 'Koiripur', 38, 1),
(4905, 'Konch', 38, 1),
(4906, 'Kopaganj', 38, 1),
(4907, 'Kora Jahanabad', 38, 1),
(4908, 'Korwa', 38, 1),
(4909, 'Kosi Kalan', 38, 1),
(4910, 'Kota', 38, 1),
(4911, 'Kotra', 38, 1),
(4912, 'Kotwa', 38, 1),
(4913, 'Kulpahar', 38, 1),
(4914, 'Kunda', 38, 1),
(4915, 'Kundarki', 38, 1),
(4916, 'Kunwargaon', 38, 1),
(4917, 'Kurara', 38, 1),
(4918, 'Kurawali', 38, 1),
(4919, 'Kursath', 38, 1),
(4920, 'Kurthi Jafarpur', 38, 1),
(4921, 'Kushinagar', 38, 1),
(4922, 'Kusmara', 38, 1),
(4923, 'Laharpur', 38, 1),
(4924, 'Lakhimpur', 38, 1),
(4925, 'Lakhna', 38, 1),
(4926, 'Lalganj', 38, 1),
(4927, 'Lalitpur', 38, 1),
(4928, 'Lar', 38, 1),
(4929, 'Lawar', 38, 1),
(4930, 'Ledwa Mahuwa', 38, 1),
(4931, 'Lohta', 38, 1),
(4932, 'Loni', 38, 1),
(4933, 'Lucknow', 38, 1),
(4934, 'Machhlishahr', 38, 1),
(4935, 'Madhoganj', 38, 1),
(4936, 'Madhogarh', 38, 1),
(4937, 'Maghar', 38, 1),
(4938, 'Mahaban', 38, 1),
(4939, 'Maharajganj', 38, 1),
(4940, 'Mahmudabad', 38, 1),
(4941, 'Mahoba', 38, 1),
(4942, 'Maholi', 38, 1),
(4943, 'Mahona', 38, 1),
(4944, 'Mahroni', 38, 1),
(4945, 'Mailani', 38, 1),
(4946, 'Mainpuri', 38, 1),
(4947, 'Majhara Pipar Ehatmali', 38, 1),
(4948, 'Majhauli Raj', 38, 1),
(4949, 'Malihabad', 38, 1),
(4950, 'Mallanwam', 38, 1),
(4951, 'Mandawar', 38, 1),
(4952, 'Manikpur', 38, 1),
(4953, 'Maniyar', 38, 1),
(4954, 'Manjhanpur', 38, 1),
(4955, 'Mankapur', 38, 1),
(4956, 'Marehra', 38, 1),
(4957, 'Mariahu', 38, 1),
(4958, 'Maruadih', 38, 1),
(4959, 'Maswasi', 38, 1),
(4960, 'Mataundh', 38, 1),
(4961, 'Mathu', 38, 1),
(4962, 'Mathura', 38, 1),
(4963, 'Mathura Cantonment', 38, 1),
(4964, 'Mau', 38, 1),
(4965, 'Mau Aima', 38, 1),
(4966, 'Maudaha', 38, 1),
(4967, 'Mauranipur', 38, 1),
(4968, 'Maurawan', 38, 1),
(4969, 'Mawana', 38, 1),
(4970, 'Meerut', 38, 1),
(4971, 'Mehnagar', 38, 1),
(4972, 'Mehndawal', 38, 1),
(4973, 'Mendu', 38, 1),
(4974, 'Milak', 38, 1),
(4975, 'Miranpur', 38, 1),
(4976, 'Mirat', 38, 1),
(4977, 'Mirat Cantonment', 38, 1),
(4978, 'Mirganj', 38, 1),
(4979, 'Mirzapur', 38, 1),
(4980, 'Misrikh', 38, 1),
(4981, 'Modinagar', 38, 1),
(4982, 'Mogra Badshahpur', 38, 1),
(4983, 'Mohan', 38, 1),
(4984, 'Mohanpur', 38, 1),
(4985, 'Mohiuddinpur', 38, 1),
(4986, 'Moradabad', 38, 1),
(4987, 'Moth', 38, 1),
(4988, 'Mubarakpur', 38, 1),
(4989, 'Mughal Sarai', 38, 1),
(4990, 'Mughal Sarai Railway Settlemen', 38, 1),
(4991, 'Muhammadabad', 38, 1),
(4992, 'Muhammadi', 38, 1),
(4993, 'Mukrampur Khema', 38, 1),
(4994, 'Mundia', 38, 1),
(4995, 'Mundora', 38, 1),
(4996, 'Muradnagar', 38, 1),
(4997, 'Mursan', 38, 1),
(4998, 'Musafirkhana', 38, 1),
(4999, 'Muzaffarnagar', 38, 1),
(5000, 'Nadigaon', 38, 1),
(5001, 'Nagina', 38, 1),
(5002, 'Nagram', 38, 1),
(5003, 'Nai Bazar', 38, 1),
(5004, 'Nainana Jat', 38, 1),
(5005, 'Najibabad', 38, 1),
(5006, 'Nakur', 38, 1),
(5007, 'Nanaunta', 38, 1),
(5008, 'Nandgaon', 38, 1),
(5009, 'Nanpara', 38, 1),
(5010, 'Naraini', 38, 1),
(5011, 'Narauli', 38, 1),
(5012, 'Naraura', 38, 1),
(5013, 'Naugawan Sadat', 38, 1),
(5014, 'Nautanwa', 38, 1),
(5015, 'Nawabganj', 38, 1),
(5016, 'Nichlaul', 38, 1),
(5017, 'Nidhauli Kalan', 38, 1),
(5018, 'Nihtaur', 38, 1),
(5019, 'Nindaura', 38, 1),
(5020, 'Niwari', 38, 1),
(5021, 'Nizamabad', 38, 1),
(5022, 'Noida', 38, 1),
(5023, 'Northern Railway Colony', 38, 1),
(5024, 'Nurpur', 38, 1),
(5025, 'Nyoria Husenpur', 38, 1),
(5026, 'Nyotini', 38, 1),
(5027, 'Obra', 38, 1),
(5028, 'Oel Dhakwa', 38, 1),
(5029, 'Orai', 38, 1),
(5030, 'Oran', 38, 1),
(5031, 'Ordinance Factory Muradnagar', 38, 1),
(5032, 'Pachperwa', 38, 1),
(5033, 'Padrauna', 38, 1),
(5034, 'Pahasu', 38, 1),
(5035, 'Paintepur', 38, 1),
(5036, 'Pali', 38, 1),
(5037, 'Palia Kalan', 38, 1),
(5038, 'Parasi', 38, 1),
(5039, 'Parichha', 38, 1),
(5040, 'Parichhatgarh', 38, 1),
(5041, 'Parsadepur', 38, 1),
(5042, 'Patala', 38, 1),
(5043, 'Patiyali', 38, 1),
(5044, 'Patti', 38, 1),
(5045, 'Pawayan', 38, 1),
(5046, 'Phalauda', 38, 1),
(5047, 'Phaphund', 38, 1),
(5048, 'Phulpur', 38, 1),
(5049, 'Phulwaria', 38, 1),
(5050, 'Pihani', 38, 1),
(5051, 'Pilibhit', 38, 1),
(5052, 'Pilkana', 38, 1),
(5053, 'Pilkhuwa', 38, 1),
(5054, 'Pinahat', 38, 1),
(5055, 'Pipalsana Chaudhari', 38, 1),
(5056, 'Pipiganj', 38, 1),
(5057, 'Pipraich', 38, 1),
(5058, 'Pipri', 38, 1),
(5059, 'Pratapgarh', 38, 1),
(5060, 'Pukhrayan', 38, 1),
(5061, 'Puranpur', 38, 1),
(5062, 'Purdil Nagar', 38, 1),
(5063, 'Purqazi', 38, 1),
(5064, 'Purwa', 38, 1),
(5065, 'Qasimpur', 38, 1),
(5066, 'Rabupura', 38, 1),
(5067, 'Radha Kund', 38, 1),
(5068, 'Rae Bareilly', 38, 1),
(5069, 'Raja Ka Rampur', 38, 1),
(5070, 'Rajapur', 38, 1),
(5071, 'Ramkola', 38, 1),
(5072, 'Ramnagar', 38, 1),
(5073, 'Rampur', 38, 1),
(5074, 'Rampur Bhawanipur', 38, 1),
(5075, 'Rampur Karkhana', 38, 1),
(5076, 'Rampur Maniharan', 38, 1),
(5077, 'Rampura', 38, 1),
(5078, 'Ranipur', 38, 1),
(5079, 'Rashidpur Garhi', 38, 1),
(5080, 'Rasra', 38, 1),
(5081, 'Rasulabad', 38, 1),
(5082, 'Rath', 38, 1),
(5083, 'Raya', 38, 1),
(5084, 'Renukut', 38, 1),
(5085, 'Reoti', 38, 1),
(5086, 'Richha', 38, 1),
(5087, 'Risia Bazar', 38, 1),
(5088, 'Rithora', 38, 1),
(5089, 'Robertsganj', 38, 1),
(5090, 'Roza', 38, 1),
(5091, 'Rudarpur', 38, 1),
(5092, 'Rudauli', 38, 1),
(5093, 'Rudayan', 38, 1),
(5094, 'Rura', 38, 1),
(5095, 'Rustamnagar Sahaspur', 38, 1),
(5096, 'Sabatwar', 38, 1),
(5097, 'Sadabad', 38, 1),
(5098, 'Sadat', 38, 1),
(5099, 'Safipur', 38, 1),
(5100, 'Sahanpur', 38, 1),
(5101, 'Saharanpur', 38, 1),
(5102, 'Sahaspur', 38, 1),
(5103, 'Sahaswan', 38, 1),
(5104, 'Sahawar', 38, 1),
(5105, 'Sahibabad', 38, 1),
(5106, 'Sahjanwa', 38, 1),
(5107, 'Sahpau', 38, 1),
(5108, 'Saidpur', 38, 1),
(5109, 'Sainthal', 38, 1),
(5110, 'Saiyadraja', 38, 1),
(5111, 'Sakhanu', 38, 1),
(5112, 'Sakit', 38, 1),
(5113, 'Salarpur Khadar', 38, 1),
(5114, 'Salimpur', 38, 1),
(5115, 'Salon', 38, 1),
(5116, 'Sambhal', 38, 1),
(5117, 'Sambhawali', 38, 1),
(5118, 'Samdhan', 38, 1),
(5119, 'Samthar', 38, 1),
(5120, 'Sandi', 38, 1),
(5121, 'Sandila', 38, 1),
(5122, 'Sarai Mir', 38, 1),
(5123, 'Sarai akil', 38, 1),
(5124, 'Sarauli', 38, 1),
(5125, 'Sardhana', 38, 1),
(5126, 'Sarila', 38, 1),
(5127, 'Sarsawan', 38, 1),
(5128, 'Sasni', 38, 1),
(5129, 'Satrikh', 38, 1),
(5130, 'Saunkh', 38, 1),
(5131, 'Saurikh', 38, 1),
(5132, 'Seohara', 38, 1),
(5133, 'Sewal Khas', 38, 1),
(5134, 'Sewarhi', 38, 1),
(5135, 'Shahabad', 38, 1),
(5136, 'Shahganj', 38, 1),
(5137, 'Shahi', 38, 1),
(5138, 'Shahjahanpur', 38, 1),
(5139, 'Shahjahanpur Cantonment', 38, 1),
(5140, 'Shahpur', 38, 1),
(5141, 'Shamli', 38, 1),
(5142, 'Shamsabad', 38, 1),
(5143, 'Shankargarh', 38, 1),
(5144, 'Shergarh', 38, 1),
(5145, 'Sherkot', 38, 1),
(5146, 'Shikarpur', 38, 1),
(5147, 'Shikohabad', 38, 1),
(5148, 'Shisgarh', 38, 1),
(5149, 'Shivdaspur', 38, 1),
(5150, 'Shivli', 38, 1),
(5151, 'Shivrajpur', 38, 1),
(5152, 'Shohratgarh', 38, 1),
(5153, 'Siddhanur', 38, 1),
(5154, 'Siddharthnagar', 38, 1),
(5155, 'Sidhauli', 38, 1),
(5156, 'Sidhpura', 38, 1),
(5157, 'Sikandarabad', 38, 1),
(5158, 'Sikandarpur', 38, 1),
(5159, 'Sikandra', 38, 1),
(5160, 'Sikandra Rao', 38, 1),
(5161, 'Singahi Bhiraura', 38, 1),
(5162, 'Sirathu', 38, 1),
(5163, 'Sirsa', 38, 1),
(5164, 'Sirsaganj', 38, 1),
(5165, 'Sirsi', 38, 1),
(5166, 'Sisauli', 38, 1),
(5167, 'Siswa Bazar', 38, 1),
(5168, 'Sitapur', 38, 1),
(5169, 'Siyana', 38, 1),
(5170, 'Som', 38, 1),
(5171, 'Sonbhadra', 38, 1),
(5172, 'Soron', 38, 1),
(5173, 'Suar', 38, 1),
(5174, 'Sukhmalpur Nizamabad', 38, 1),
(5175, 'Sultanpur', 38, 1),
(5176, 'Sumerpur', 38, 1),
(5177, 'Suriyawan', 38, 1),
(5178, 'Swamibagh', 38, 1),
(5179, 'Tajpur', 38, 1),
(5180, 'Talbahat', 38, 1),
(5181, 'Talgram', 38, 1),
(5182, 'Tambaur', 38, 1),
(5183, 'Tanda', 38, 1),
(5184, 'Tatarpur Lallu', 38, 1),
(5185, 'Tetribazar', 38, 1),
(5186, 'Thakurdwara', 38, 1),
(5187, 'Thana Bhawan', 38, 1),
(5188, 'Thiriya Nizamat Khan', 38, 1),
(5189, 'Tikaitnagar', 38, 1),
(5190, 'Tikri', 38, 1),
(5191, 'Tilhar', 38, 1),
(5192, 'Tindwari', 38, 1),
(5193, 'Tirwaganj', 38, 1),
(5194, 'Titron', 38, 1),
(5195, 'Tori Fatehpur', 38, 1),
(5196, 'Tulsipur', 38, 1),
(5197, 'Tundla', 38, 1),
(5198, 'Tundla Kham', 38, 1),
(5199, 'Tundla Railway Colony', 38, 1),
(5200, 'Ugu', 38, 1),
(5201, 'Ujhani', 38, 1),
(5202, 'Ujhari', 38, 1),
(5203, 'Umri', 38, 1),
(5204, 'Umri Kalan', 38, 1),
(5205, 'Un', 38, 1),
(5206, 'Unchahar', 38, 1),
(5207, 'Unnao', 38, 1),
(5208, 'Usaihat', 38, 1),
(5209, 'Usawan', 38, 1),
(5210, 'Utraula', 38, 1),
(5211, 'Varanasi', 38, 1),
(5212, 'Varanasi Cantonment', 38, 1),
(5213, 'Vijaigarh', 38, 1),
(5214, 'Vrindavan', 38, 1),
(5215, 'Wazirganj', 38, 1),
(5216, 'Zafarabad', 38, 1),
(5217, 'Zaidpur', 38, 1),
(5218, 'Zamania', 38, 1),
(5219, 'Almora', 39, 1),
(5220, 'Almora Cantonment', 39, 1),
(5221, 'Badrinathpuri', 39, 1),
(5222, 'Bageshwar', 39, 1),
(5223, 'Bah Bazar', 39, 1),
(5224, 'Banbasa', 39, 1),
(5225, 'Bandia', 39, 1),
(5226, 'Barkot', 39, 1),
(5227, 'Bazpur', 39, 1),
(5228, 'Bhim Tal', 39, 1),
(5229, 'Bhowali', 39, 1),
(5230, 'Chakrata', 39, 1),
(5231, 'Chamba', 39, 1),
(5232, 'Chamoli and Gopeshwar', 39, 1),
(5233, 'Champawat', 39, 1),
(5234, 'Clement Town', 39, 1),
(5235, 'Dehra Dun Cantonment', 39, 1),
(5236, 'Dehradun', 39, 1),
(5237, 'Dehrakhas', 39, 1),
(5238, 'Devaprayag', 39, 1),
(5239, 'Dhaluwala', 39, 1),
(5240, 'Dhandera', 39, 1),
(5241, 'Dharchula', 39, 1),
(5242, 'Dharchula Dehat', 39, 1),
(5243, 'Didihat', 39, 1),
(5244, 'Dineshpur', 39, 1),
(5245, 'Doiwala', 39, 1),
(5246, 'Dugadda', 39, 1),
(5247, 'Dwarahat', 39, 1),
(5248, 'Gadarpur', 39, 1),
(5249, 'Gangotri', 39, 1),
(5250, 'Gauchar', 39, 1),
(5251, 'Haldwani', 39, 1),
(5252, 'Haridwar', 39, 1),
(5253, 'Herbertpur', 39, 1),
(5254, 'Jaspur', 39, 1),
(5255, 'Jhabrera', 39, 1),
(5256, 'Joshimath', 39, 1),
(5257, 'Kachnal Gosain', 39, 1),
(5258, 'Kaladungi', 39, 1),
(5259, 'Kalagarh', 39, 1),
(5260, 'Karnaprayang', 39, 1),
(5261, 'Kashipur', 39, 1),
(5262, 'Kashirampur', 39, 1),
(5263, 'Kausani', 39, 1),
(5264, 'Kedarnath', 39, 1),
(5265, 'Kelakhera', 39, 1),
(5266, 'Khatima', 39, 1),
(5267, 'Kichha', 39, 1),
(5268, 'Kirtinagar', 39, 1),
(5269, 'Kotdwara', 39, 1),
(5270, 'Laksar', 39, 1),
(5271, 'Lalkuan', 39, 1),
(5272, 'Landaura', 39, 1),
(5273, 'Landhaura Cantonment', 39, 1),
(5274, 'Lensdaun', 39, 1),
(5275, 'Logahat', 39, 1),
(5276, 'Mahua Dabra Haripura', 39, 1),
(5277, 'Mahua Kheraganj', 39, 1),
(5278, 'Manglaur', 39, 1),
(5279, 'Masuri', 39, 1),
(5280, 'Mohanpur Mohammadpur', 39, 1),
(5281, 'Muni Ki Reti', 39, 1),
(5282, 'Nagla', 39, 1),
(5283, 'Nainital', 39, 1),
(5284, 'Nainital Cantonment', 39, 1),
(5285, 'Nandaprayang', 39, 1),
(5286, 'Narendranagar', 39, 1),
(5287, 'Pauri', 39, 1),
(5288, 'Pithoragarh', 39, 1),
(5289, 'Pratitnagar', 39, 1),
(5290, 'Raipur', 39, 1),
(5291, 'Raiwala', 39, 1),
(5292, 'Ramnagar', 39, 1),
(5293, 'Ranikhet', 39, 1),
(5294, 'Ranipur', 39, 1),
(5295, 'Rishikesh', 39, 1),
(5296, 'Rishikesh Cantonment', 39, 1),
(5297, 'Roorkee', 39, 1),
(5298, 'Rudraprayag', 39, 1),
(5299, 'Rudrapur', 39, 1),
(5300, 'Rurki', 39, 1),
(5301, 'Rurki Cantonment', 39, 1),
(5302, 'Shaktigarh', 39, 1),
(5303, 'Sitarganj', 39, 1),
(5304, 'Srinagar', 39, 1),
(5305, 'Sultanpur', 39, 1),
(5306, 'Tanakpur', 39, 1),
(5307, 'Tehri', 39, 1),
(5308, 'Udham Singh Nagar', 39, 1),
(5309, 'Uttarkashi', 39, 1),
(5310, 'Vikasnagar', 39, 1),
(5311, 'Virbhadra', 39, 1),
(5312, '24 Parganas (n)', 41, 1),
(5313, '24 Parganas (s)', 41, 1),
(5314, 'Adra', 41, 1),
(5315, 'Ahmadpur', 41, 1),
(5316, 'Aiho', 41, 1),
(5317, 'Aistala', 41, 1),
(5318, 'Alipur Duar', 41, 1),
(5319, 'Alipur Duar Railway Junction', 41, 1),
(5320, 'Alpur', 41, 1),
(5321, 'Amalhara', 41, 1),
(5322, 'Amkula', 41, 1),
(5323, 'Amlagora', 41, 1),
(5324, 'Amodghata', 41, 1),
(5325, 'Amtala', 41, 1),
(5326, 'Andul', 41, 1),
(5327, 'Anksa', 41, 1),
(5328, 'Ankurhati', 41, 1),
(5329, 'Anup Nagar', 41, 1),
(5330, 'Arambagh', 41, 1),
(5331, 'Argari', 41, 1),
(5332, 'Arsha', 41, 1),
(5333, 'Asansol', 41, 1),
(5334, 'Ashoknagar Kalyangarh', 41, 1),
(5335, 'Aurangabad', 41, 1),
(5336, 'Bablari Dewanganj', 41, 1),
(5337, 'Badhagachhi', 41, 1),
(5338, 'Baduria', 41, 1),
(5339, 'Baghdogra', 41, 1),
(5340, 'Bagnan', 41, 1),
(5341, 'Bagra', 41, 1),
(5342, 'Bagula', 41, 1),
(5343, 'Baharampur', 41, 1),
(5344, 'Bahirgram', 41, 1),
(5345, 'Bahula', 41, 1),
(5346, 'Baidyabati', 41, 1),
(5347, 'Bairatisal', 41, 1),
(5348, 'Baj Baj', 41, 1),
(5349, 'Bakreswar', 41, 1),
(5350, 'Balaram Pota', 41, 1),
(5351, 'Balarampur', 41, 1),
(5352, 'Bali Chak', 41, 1),
(5353, 'Ballavpur', 41, 1),
(5354, 'Bally', 41, 1),
(5355, 'Balurghat', 41, 1),
(5356, 'Bamunari', 41, 1),
(5357, 'Banarhat Tea Garden', 41, 1),
(5358, 'Bandel', 41, 1),
(5359, 'Bangaon', 41, 1),
(5360, 'Bankra', 41, 1),
(5361, 'Bankura', 41, 1),
(5362, 'Bansbaria', 41, 1),
(5363, 'Banshra', 41, 1),
(5364, 'Banupur', 41, 1),
(5365, 'Bara Bamonia', 41, 1),
(5366, 'Barakpur', 41, 1),
(5367, 'Barakpur Cantonment', 41, 1),
(5368, 'Baranagar', 41, 1),
(5369, 'Barasat', 41, 1),
(5370, 'Barddhaman', 41, 1),
(5371, 'Barijhati', 41, 1),
(5372, 'Barjora', 41, 1),
(5373, 'Barrackpore', 41, 1),
(5374, 'Baruihuda', 41, 1),
(5375, 'Baruipur', 41, 1),
(5376, 'Barunda', 41, 1),
(5377, 'Basirhat', 41, 1),
(5378, 'Baska', 41, 1),
(5379, 'Begampur', 41, 1),
(5380, 'Beldanga', 41, 1),
(5381, 'Beldubi', 41, 1),
(5382, 'Belebathan', 41, 1),
(5383, 'Beliator', 41, 1),
(5384, 'Bhadreswar', 41, 1),
(5385, 'Bhandardaha', 41, 1),
(5386, 'Bhangar Raghunathpur', 41, 1),
(5387, 'Bhangri Pratham Khanda', 41, 1),
(5388, 'Bhanowara', 41, 1),
(5389, 'Bhatpara', 41, 1),
(5390, 'Bholar Dabri', 41, 1),
(5391, 'Bidhannagar', 41, 1),
(5392, 'Bidyadharpur', 41, 1),
(5393, 'Biki Hakola', 41, 1),
(5394, 'Bilandapur', 41, 1),
(5395, 'Bilpahari', 41, 1),
(5396, 'Bipra Noapara', 41, 1),
(5397, 'Birlapur', 41, 1),
(5398, 'Birnagar', 41, 1),
(5399, 'Bisarpara', 41, 1),
(5400, 'Bishnupur', 41, 1),
(5401, 'Bolpur', 41, 1),
(5402, 'Bongaon', 41, 1),
(5403, 'Bowali', 41, 1),
(5404, 'Burdwan', 41, 1),
(5405, 'Canning', 41, 1),
(5406, 'Cart Road', 41, 1),
(5407, 'Chachanda', 41, 1),
(5408, 'Chak Bankola', 41, 1),
(5409, 'Chak Enayetnagar', 41, 1),
(5410, 'Chak Kashipur', 41, 1),
(5411, 'Chakalampur', 41, 1),
(5412, 'Chakbansberia', 41, 1),
(5413, 'Chakdaha', 41, 1),
(5414, 'Chakpara', 41, 1),
(5415, 'Champahati', 41, 1),
(5416, 'Champdani', 41, 1),
(5417, 'Chamrail', 41, 1),
(5418, 'Chandannagar', 41, 1),
(5419, 'Chandpur', 41, 1),
(5420, 'Chandrakona', 41, 1),
(5421, 'Chapari', 41, 1),
(5422, 'Chapui', 41, 1),
(5423, 'Char Brahmanagar', 41, 1),
(5424, 'Char Maijdia', 41, 1),
(5425, 'Charka', 41, 1),
(5426, 'Chata Kalikapur', 41, 1),
(5427, 'Chauhati', 41, 1),
(5428, 'Checha Khata', 41, 1),
(5429, 'Chelad', 41, 1),
(5430, 'Chhora', 41, 1),
(5431, 'Chikrand', 41, 1),
(5432, 'Chittaranjan', 41, 1),
(5433, 'Contai', 41, 1),
(5434, 'Cooch Behar', 41, 1),
(5435, 'Dainhat', 41, 1),
(5436, 'Dakshin Baguan', 41, 1),
(5437, 'Dakshin Jhapardaha', 41, 1),
(5438, 'Dakshin Rajyadharpur', 41, 1),
(5439, 'Dakshin Raypur', 41, 1),
(5440, 'Dalkola', 41, 1),
(5441, 'Dalurband', 41, 1),
(5442, 'Darap Pur', 41, 1),
(5443, 'Darjiling', 41, 1),
(5444, 'Daulatpur', 41, 1),
(5445, 'Debipur', 41, 1),
(5446, 'Defahat', 41, 1),
(5447, 'Deora', 41, 1),
(5448, 'Deulia', 41, 1),
(5449, 'Dhakuria', 41, 1),
(5450, 'Dhandadihi', 41, 1),
(5451, 'Dhanyakuria', 41, 1),
(5452, 'Dharmapur', 41, 1),
(5453, 'Dhatri Gram', 41, 1),
(5454, 'Dhuilya', 41, 1),
(5455, 'Dhulagari', 41, 1),
(5456, 'Dhulian', 41, 1),
(5457, 'Dhupgari', 41, 1),
(5458, 'Dhusaripara', 41, 1),
(5459, 'Diamond Harbour', 41, 1),
(5460, 'Digha', 41, 1),
(5461, 'Dignala', 41, 1),
(5462, 'Dinhata', 41, 1),
(5463, 'Dubrajpur', 41, 1),
(5464, 'Dumjor', 41, 1),
(5465, 'Durgapur', 41, 1),
(5466, 'Durllabhganj', 41, 1),
(5467, 'Egra', 41, 1),
(5468, 'Eksara', 41, 1),
(5469, 'Falakata', 41, 1),
(5470, 'Farakka', 41, 1),
(5471, 'Fatellapur', 41, 1),
(5472, 'Fort Gloster', 41, 1),
(5473, 'Gabberia', 41, 1),
(5474, 'Gadigachha', 41, 1),
(5475, 'Gairkata', 41, 1),
(5476, 'Gangarampur', 41, 1),
(5477, 'Garalgachha', 41, 1),
(5478, 'Garbeta Amlagora', 41, 1),
(5479, 'Garhbeta', 41, 1),
(5480, 'Garshyamnagar', 41, 1),
(5481, 'Garui', 41, 1),
(5482, 'Garulia', 41, 1),
(5483, 'Gayespur', 41, 1),
(5484, 'Ghatal', 41, 1),
(5485, 'Ghorsala', 41, 1),
(5486, 'Goaljan', 41, 1),
(5487, 'Goasafat', 41, 1),
(5488, 'Gobardanga', 41, 1),
(5489, 'Gobindapur', 41, 1),
(5490, 'Gopalpur', 41, 1),
(5491, 'Gopinathpur', 41, 1),
(5492, 'Gora Bazar', 41, 1),
(5493, 'Guma', 41, 1),
(5494, 'Gurdaha', 41, 1),
(5495, 'Guriahati', 41, 1),
(5496, 'Guskhara', 41, 1),
(5497, 'Habra', 41, 1),
(5498, 'Haldia', 41, 1),
(5499, 'Haldibari', 41, 1),
(5500, 'Halisahar', 41, 1),
(5501, 'Haora', 41, 1),
(5502, 'Harharia Chak', 41, 1),
(5503, 'Harindanga', 41, 1),
(5504, 'Haringhata', 41, 1),
(5505, 'Haripur', 41, 1),
(5506, 'Harishpur', 41, 1),
(5507, 'Hatgachha', 41, 1),
(5508, 'Hatsimla', 41, 1),
(5509, 'Hijuli', 41, 1),
(5510, 'Hindustan Cables Town', 41, 1),
(5511, 'Hooghly', 41, 1),
(5512, 'Howrah', 41, 1),
(5513, 'Hugli-Chunchura', 41, 1),
(5514, 'Humaipur', 41, 1),
(5515, 'Ichha Pur Defence Estate', 41, 1),
(5516, 'Ingraj Bazar', 41, 1),
(5517, 'Islampur', 41, 1),
(5518, 'Jafarpur', 41, 1),
(5519, 'Jagadanandapur', 41, 1),
(5520, 'Jagdishpur', 41, 1),
(5521, 'Jagtaj', 41, 1),
(5522, 'Jala Kendua', 41, 1),
(5523, 'Jaldhaka', 41, 1),
(5524, 'Jalkhura', 41, 1),
(5525, 'Jalpaiguri', 41, 1),
(5526, 'Jamuria', 41, 1),
(5527, 'Jangipur', 41, 1),
(5528, 'Jaygaon', 41, 1),
(5529, 'Jaynagar-Majilpur', 41, 1),
(5530, 'Jemari', 41, 1),
(5531, 'Jemari Township', 41, 1),
(5532, 'Jetia', 41, 1),
(5533, 'Jhalida', 41, 1),
(5534, 'Jhargram', 41, 1),
(5535, 'Jhorhat', 41, 1),
(5536, 'Jiaganj-Azimganj', 41, 1),
(5537, 'Joka', 41, 1),
(5538, 'Jot Kamal', 41, 1),
(5539, 'Kachu Pukur', 41, 1),
(5540, 'Kajora', 41, 1),
(5541, 'Kakdihi', 41, 1),
(5542, 'Kakdwip', 41, 1),
(5543, 'Kalaikunda', 41, 1),
(5544, 'Kalara', 41, 1),
(5545, 'Kalimpong', 41, 1),
(5546, 'Kaliyaganj', 41, 1),
(5547, 'Kalna', 41, 1),
(5548, 'Kalyani', 41, 1),
(5549, 'Kamarhati', 41, 1),
(5550, 'Kanaipur', 41, 1),
(5551, 'Kanchrapara', 41, 1),
(5552, 'Kandi', 41, 1),
(5553, 'Kanki', 41, 1),
(5554, 'Kankuria', 41, 1),
(5555, 'Kantlia', 41, 1),
(5556, 'Kanyanagar', 41, 1),
(5557, 'Karimpur', 41, 1),
(5558, 'Karsiyang', 41, 1),
(5559, 'Kasba', 41, 1),
(5560, 'Kasimbazar', 41, 1),
(5561, 'Katwa', 41, 1),
(5562, 'Kaugachhi', 41, 1),
(5563, 'Kenda', 41, 1),
(5564, 'Kendra Khottamdi', 41, 1),
(5565, 'Kendua', 41, 1),
(5566, 'Kesabpur', 41, 1),
(5567, 'Khagrabari', 41, 1),
(5568, 'Khalia', 41, 1),
(5569, 'Khalor', 41, 1),
(5570, 'Khandra', 41, 1),
(5571, 'Khantora', 41, 1),
(5572, 'Kharagpur', 41, 1),
(5573, 'Kharagpur Railway Settlement', 41, 1),
(5574, 'Kharar', 41, 1),
(5575, 'Khardaha', 41, 1),
(5576, 'Khari Mala Khagrabari', 41, 1),
(5577, 'Kharsarai', 41, 1),
(5578, 'Khatra', 41, 1),
(5579, 'Khodarampur', 41, 1),
(5580, 'Kodalia', 41, 1),
(5581, 'Kolaghat', 41, 1),
(5582, 'Kolaghat Thermal Power Project', 41, 1),
(5583, 'Kolkata', 41, 1),
(5584, 'Konardihi', 41, 1),
(5585, 'Konnogar', 41, 1),
(5586, 'Krishnanagar', 41, 1),
(5587, 'Krishnapur', 41, 1),
(5588, 'Kshidirpur', 41, 1),
(5589, 'Kshirpai', 41, 1),
(5590, 'Kulihanda', 41, 1),
(5591, 'Kulti', 41, 1),
(5592, 'Kunustara', 41, 1),
(5593, 'Kuperskem', 41, 1),
(5594, 'Madanpur', 41, 1),
(5595, 'Madhusudanpur', 41, 1),
(5596, 'Madhyamgram', 41, 1),
(5597, 'Maheshtala', 41, 1),
(5598, 'Mahiari', 41, 1),
(5599, 'Mahikpur', 41, 1),
(5600, 'Mahira', 41, 1),
(5601, 'Mahishadal', 41, 1),
(5602, 'Mainaguri', 41, 1),
(5603, 'Makardaha', 41, 1),
(5604, 'Mal', 41, 1),
(5605, 'Malda', 41, 1),
(5606, 'Mandarbani', 41, 1),
(5607, 'Mansinhapur', 41, 1),
(5608, 'Masila', 41, 1),
(5609, 'Maslandapur', 41, 1),
(5610, 'Mathabhanga', 41, 1),
(5611, 'Mekliganj', 41, 1),
(5612, 'Memari', 41, 1),
(5613, 'Midnapur', 41, 1),
(5614, 'Mirik', 41, 1),
(5615, 'Monoharpur', 41, 1),
(5616, 'Mrigala', 41, 1),
(5617, 'Muragachha', 41, 1),
(5618, 'Murgathaul', 41, 1),
(5619, 'Murshidabad', 41, 1),
(5620, 'Nabadhai Dutta Pukur', 41, 1),
(5621, 'Nabagram', 41, 1),
(5622, 'Nabgram', 41, 1),
(5623, 'Nachhratpur Katabari', 41, 1),
(5624, 'Nadia', 41, 1),
(5625, 'Naihati', 41, 1),
(5626, 'Nalhati', 41, 1),
(5627, 'Nasra', 41, 1),
(5628, 'Natibpur', 41, 1),
(5629, 'Naupala', 41, 1),
(5630, 'Navadwip', 41, 1),
(5631, 'Nebadhai Duttapukur', 41, 1),
(5632, 'New Barrackpore', 41, 1),
(5633, 'Ni Barakpur', 41, 1),
(5634, 'Nibra', 41, 1),
(5635, 'Noapara', 41, 1),
(5636, 'Nokpul', 41, 1),
(5637, 'North Barakpur', 41, 1),
(5638, 'Odlabari', 41, 1),
(5639, 'Old Maldah', 41, 1),
(5640, 'Ondal', 41, 1),
(5641, 'Pairagachha', 41, 1),
(5642, 'Palashban', 41, 1),
(5643, 'Panchla', 41, 1),
(5644, 'Panchpara', 41, 1),
(5645, 'Pandua', 41, 1),
(5646, 'Pangachhiya', 41, 1),
(5647, 'Paniara', 41, 1),
(5648, 'Panihati', 41, 1),
(5649, 'Panuhat', 41, 1),
(5650, 'Par Beliya', 41, 1),
(5651, 'Parashkol', 41, 1),
(5652, 'Parasia', 41, 1),
(5653, 'Parbbatipur', 41, 1),
(5654, 'Parui', 41, 1),
(5655, 'Paschim Jitpur', 41, 1),
(5656, 'Paschim Punro Para', 41, 1),
(5657, 'Patrasaer', 41, 1),
(5658, 'Pattabong Tea Garden', 41, 1),
(5659, 'Patuli', 41, 1),
(5660, 'Patulia', 41, 1),
(5661, 'Phulia', 41, 1),
(5662, 'Podara', 41, 1),
(5663, 'Port Blair', 41, 1),
(5664, 'Prayagpur', 41, 1),
(5665, 'Pujali', 41, 1),
(5666, 'Purba Medinipur', 41, 1),
(5667, 'Purba Tajpur', 41, 1),
(5668, 'Purulia', 41, 1),
(5669, 'Raghudebbati', 41, 1),
(5670, 'Raghudebpur', 41, 1),
(5671, 'Raghunathchak', 41, 1),
(5672, 'Raghunathpur', 41, 1),
(5673, 'Raghunathpur-Dankuni', 41, 1),
(5674, 'Raghunathpur-Magra', 41, 1),
(5675, 'Raigachhi', 41, 1),
(5676, 'Raiganj', 41, 1),
(5677, 'Raipur', 41, 1),
(5678, 'Rajarhat Gopalpur', 41, 1),
(5679, 'Rajpur', 41, 1),
(5680, 'Ramchandrapur', 41, 1),
(5681, 'Ramjibanpur', 41, 1),
(5682, 'Ramnagar', 41, 1),
(5683, 'Rampur Hat', 41, 1),
(5684, 'Ranaghat', 41, 1),
(5685, 'Raniganj', 41, 1),
(5686, 'Ratibati', 41, 1),
(5687, 'Raypur', 41, 1),
(5688, 'Rishra', 41, 1),
(5689, 'Rishra Cantonment', 41, 1),
(5690, 'Ruiya', 41, 1),
(5691, 'Sahajadpur', 41, 1),
(5692, 'Sahapur', 41, 1),
(5693, 'Sainthia', 41, 1),
(5694, 'Salap', 41, 1),
(5695, 'Sankarpur', 41, 1),
(5696, 'Sankrail', 41, 1),
(5697, 'Santoshpur', 41, 1),
(5698, 'Saontaidih', 41, 1),
(5699, 'Sarenga', 41, 1),
(5700, 'Sarpi', 41, 1),
(5701, 'Satigachha', 41, 1),
(5702, 'Serpur', 41, 1),
(5703, 'Shankhanagar', 41, 1),
(5704, 'Shantipur', 41, 1),
(5705, 'Shrirampur', 41, 1),
(5706, 'Siduli', 41, 1),
(5707, 'Siliguri', 41, 1),
(5708, 'Simla', 41, 1),
(5709, 'Singur', 41, 1),
(5710, 'Sirsha', 41, 1),
(5711, 'Siuri', 41, 1),
(5712, 'Sobhaganj', 41, 1),
(5713, 'Sodpur', 41, 1),
(5714, 'Sonamukhi', 41, 1),
(5715, 'Sonatikiri', 41, 1),
(5716, 'Srikantabati', 41, 1),
(5717, 'Srirampur', 41, 1),
(5718, 'Sukdal', 41, 1),
(5719, 'Taherpur', 41, 1),
(5720, 'Taki', 41, 1),
(5721, 'Talbandha', 41, 1),
(5722, 'Tamluk', 41, 1),
(5723, 'Tarakeswar', 41, 1),
(5724, 'Tentulberia', 41, 1),
(5725, 'Tentulkuli', 41, 1),
(5726, 'Thermal Power Project', 41, 1),
(5727, 'Tinsukia', 41, 1),
(5728, 'Titagarh', 41, 1),
(5729, 'Tufanganj', 41, 1),
(5730, 'Ukhra', 41, 1),
(5731, 'Ula', 41, 1),
(5732, 'Ulubaria', 41, 1),
(5733, 'Uttar Durgapur', 41, 1),
(5734, 'Uttar Goara', 41, 1),
(5735, 'Uttar Kalas', 41, 1),
(5736, 'Uttar Kamakhyaguri', 41, 1),
(5737, 'Uttar Latabari', 41, 1),
(5738, 'Uttar Mahammadpur', 41, 1),
(5739, 'Uttar Pirpur', 41, 1),
(5740, 'Uttar Raypur', 41, 1),
(5741, 'Uttarpara-Kotrung', 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `visitreference` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `appointmenttype` varchar(191) NOT NULL,
  `doctor` varchar(191) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `visitreference`, `name`, `appointmenttype`, `doctor`, `status`) VALUES
(21, '2022-10-18 05:40:12', '2022-10-18 05:40:12', 'Walkin', 'sakshi', 'Old', '56', 'Exit'),
(22, '2022-10-19 05:49:02', '2022-10-19 05:49:02', 'Walkin', 'Gunja', 'New', '8', 'Registration'),
(23, '2022-10-30 22:41:59', '2022-10-30 22:41:59', 'Appointment', 'yash', 'New', '70', 'Registration'),
(24, '2022-11-01 00:21:59', '2022-11-01 00:21:59', 'Walkin', 'sakshi', 'Old', '70', 'Dilation'),
(25, '2022-11-01 04:13:46', '2022-11-01 04:13:46', 'Walkin', 'neha', 'Old', '19', 'Registration'),
(26, '2022-11-07 00:09:43', '2022-11-07 00:09:43', 'Walkin', 'neha', 'Old', '70', 'Exit'),
(27, '2022-11-07 01:32:13', '2022-11-07 01:32:13', 'Walkin', 'ghjkl', 'Old', '79', 'Exit'),
(28, '2022-11-07 01:46:09', '2022-11-07 01:46:09', 'Walkin', 'sakshi', 'Old', '6', 'Exit'),
(29, '2023-02-06 01:38:30', '2023-02-06 01:38:30', 'Walkin', 'kish', 'Old', '2', 'DoctorVisit'),
(30, '2023-02-06 01:41:02', '2023-02-06 01:41:02', 'Walkin', 'neha', 'New', '2', ''),
(31, '2023-02-06 01:43:27', '2023-02-06 01:43:27', 'Walkin', 'ruhi', 'New', '6', ''),
(32, '2023-02-06 02:07:00', '2023-02-06 02:07:00', 'Walkin', 'neha', 'Old', '5', 'Dilation');

-- --------------------------------------------------------

--
-- Table structure for table `counseller_entry`
--

CREATE TABLE `counseller_entry` (
  `id` int(11) NOT NULL,
  `ref_patient_id` varchar(50) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `doctorname` varchar(100) NOT NULL,
  `diagosis` varchar(255) NOT NULL,
  `d_advice` varchar(255) NOT NULL,
  `c_remarks` varchar(255) NOT NULL,
  `sutg_cate` varchar(200) NOT NULL,
  `products` varchar(100) NOT NULL,
  `injection` varchar(80) NOT NULL,
  `pk_price` varchar(100) NOT NULL,
  `payment_paymode` text NOT NULL,
  `p_type` text NOT NULL,
  `bed` text NOT NULL,
  `s_date` text NOT NULL,
  `s_status` text NOT NULL,
  `remark` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counseller_entry`
--

INSERT INTO `counseller_entry` (`id`, `ref_patient_id`, `p_name`, `doctorname`, `diagosis`, `d_advice`, `c_remarks`, `sutg_cate`, `products`, `injection`, `pk_price`, `payment_paymode`, `p_type`, `bed`, `s_date`, `s_status`, `remark`, `created_at`, `updated_at`) VALUES
(0, '29', 'gunja', '3', 'yes', 'ddd', 'eee', '18', '4', '3', '120000', '1', '67', 'PrivateWard', '2023-01-23', 'Confirm', 'yes', '2023-01-23 02:37:12', '2023-01-23 02:37:12'),
(8, '21', 'gunja', '6', 'yess', 'ss', 'ddd', '14,18', '5,4', '5,4', '12000,2345', '11,2', '59,61', 'DoubleBed,', '2022-12-14,2022-12-24', 'Confirm,', 'jjjj,iiii', '2022-12-07 07:24:08', '2022-12-07 07:24:08'),
(10, '24', 'sapna', '4', 'ghhhh', 'hhhh', 'ghghg', '18,14,18', '4,5,4', '5,13,17', '12000,29000,20000', '2,1,2', '61,55,60', 'PrivateWard,DoubleBed,SingleBed', '2022-12-21,2022-12-28,', 'Cancel,Cancel,Pending', 'jj,lllll,iiiiiiiiiiii', '2022-12-07 07:33:02', '2022-12-07 23:21:24'),
(11, '23', 'ishu', '60', 'xx', 'dd', 'dd', '60,18', '13,4', '17,13', '20000,29000', '1,2', '55,68', 'SingleBed,DoubleBed', '2022-12-12,2022-12-14', 'Pending,Confirm', 'heelo3,hello2', '2022-12-07 23:32:47', '2022-12-07 23:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `phonecode`, `status`) VALUES
(1, 'AF', 'Afghanistan', 93, 1),
(2, 'AL', 'Albania', 355, 1),
(3, 'DZ', 'Algeria', 213, 1),
(4, 'AS', 'American Samoa', 1684, 1),
(5, 'AD', 'Andorra', 376, 1),
(6, 'AO', 'Angola', 244, 1),
(7, 'AI', 'Anguilla', 1264, 1),
(8, 'AQ', 'Antarctica', 0, 1),
(9, 'AG', 'Antigua And Barbuda', 1268, 1),
(10, 'AR', 'Argentina', 54, 1),
(11, 'AM', 'Armenia', 374, 1),
(12, 'AW', 'Aruba', 297, 1),
(13, 'AU', 'Australia', 61, 1),
(14, 'AT', 'Austria', 43, 1),
(15, 'AZ', 'Azerbaijan', 994, 1),
(16, 'BS', 'Bahamas The', 1242, 1),
(17, 'BH', 'Bahrain', 973, 1),
(18, 'BD', 'Bangladesh', 880, 1),
(19, 'BB', 'Barbados', 1246, 1),
(20, 'BY', 'Belarus', 375, 1),
(21, 'BE', 'Belgium', 32, 1),
(22, 'BZ', 'Belize', 501, 1),
(23, 'BJ', 'Benin', 229, 1),
(24, 'BM', 'Bermuda', 1441, 1),
(25, 'BT', 'Bhutan', 975, 1),
(26, 'BO', 'Bolivia', 591, 1),
(27, 'BA', 'Bosnia and Herzegovina', 387, 1),
(28, 'BW', 'Botswana', 267, 1),
(29, 'BV', 'Bouvet Island', 0, 1),
(30, 'BR', 'Brazil', 55, 1),
(31, 'IO', 'British Indian Ocean Territory', 246, 1),
(32, 'BN', 'Brunei', 673, 1),
(33, 'BG', 'Bulgaria', 359, 1),
(34, 'BF', 'Burkina Faso', 226, 1),
(35, 'BI', 'Burundi', 257, 1),
(36, 'KH', 'Cambodia', 855, 1),
(37, 'CM', 'Cameroon', 237, 1),
(38, 'CA', 'Canada', 1, 1),
(39, 'CV', 'Cape Verde', 238, 1),
(40, 'KY', 'Cayman Islands', 1345, 1),
(41, 'CF', 'Central African Republic', 236, 1),
(42, 'TD', 'Chad', 235, 1),
(43, 'CL', 'Chile', 56, 1),
(44, 'CN', 'China', 86, 1),
(45, 'CX', 'Christmas Island', 61, 1),
(46, 'CC', 'Cocos (Keeling) Islands', 672, 1),
(47, 'CO', 'Colombia', 57, 1),
(48, 'KM', 'Comoros', 269, 1),
(49, 'CG', 'Congo', 242, 1),
(50, 'CD', 'Congo The Democratic Republic Of The', 242, 1),
(51, 'CK', 'Cook Islands', 682, 1),
(52, 'CR', 'Costa Rica', 506, 1),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225, 1),
(54, 'HR', 'Croatia (Hrvatska)', 385, 1),
(55, 'CU', 'Cuba', 53, 1),
(56, 'CY', 'Cyprus', 357, 1),
(57, 'CZ', 'Czech Republic', 420, 1),
(58, 'DK', 'Denmark', 45, 1),
(59, 'DJ', 'Djibouti', 253, 1),
(60, 'DM', 'Dominica', 1767, 1),
(61, 'DO', 'Dominican Republic', 1809, 1),
(62, 'TP', 'East Timor', 670, 1),
(63, 'EC', 'Ecuador', 593, 1),
(64, 'EG', 'Egypt', 20, 1),
(65, 'SV', 'El Salvador', 503, 1),
(66, 'GQ', 'Equatorial Guinea', 240, 1),
(67, 'ER', 'Eritrea', 291, 1),
(68, 'EE', 'Estonia', 372, 1),
(69, 'ET', 'Ethiopia', 251, 1),
(70, 'XA', 'External Territories of Australia', 61, 1),
(71, 'FK', 'Falkland Islands', 500, 1),
(72, 'FO', 'Faroe Islands', 298, 1),
(73, 'FJ', 'Fiji Islands', 679, 1),
(74, 'FI', 'Finland', 358, 1),
(75, 'FR', 'France', 33, 1),
(76, 'GF', 'French Guiana', 594, 1),
(77, 'PF', 'French Polynesia', 689, 1),
(78, 'TF', 'French Southern Territories', 0, 1),
(79, 'GA', 'Gabon', 241, 1),
(80, 'GM', 'Gambia The', 220, 1),
(81, 'GE', 'Georgia', 995, 1),
(82, 'DE', 'Germany', 49, 1),
(83, 'GH', 'Ghana', 233, 1),
(84, 'GI', 'Gibraltar', 350, 1),
(85, 'GR', 'Greece', 30, 1),
(86, 'GL', 'Greenland', 299, 1),
(87, 'GD', 'Grenada', 1473, 1),
(88, 'GP', 'Guadeloupe', 590, 1),
(89, 'GU', 'Guam', 1671, 1),
(90, 'GT', 'Guatemala', 502, 1),
(91, 'XU', 'Guernsey and Alderney', 44, 1),
(92, 'GN', 'Guinea', 224, 1),
(93, 'GW', 'Guinea-Bissau', 245, 1),
(94, 'GY', 'Guyana', 592, 1),
(95, 'HT', 'Haiti', 509, 1),
(96, 'HM', 'Heard and McDonald Islands', 0, 1),
(97, 'HN', 'Honduras', 504, 1),
(98, 'HK', 'Hong Kong S.A.R.', 852, 1),
(99, 'HU', 'Hungary', 36, 1),
(100, 'IS', 'Iceland', 354, 1),
(101, 'IN', 'India', 91, 1),
(102, 'ID', 'Indonesia', 62, 1),
(103, 'IR', 'Iran', 98, 1),
(104, 'IQ', 'Iraq', 964, 1),
(105, 'IE', 'Ireland', 353, 1),
(106, 'IL', 'Israel', 972, 1),
(107, 'IT', 'Italy', 39, 1),
(108, 'JM', 'Jamaica', 1876, 1),
(109, 'JP', 'Japan', 81, 1),
(110, 'XJ', 'Jersey', 44, 1),
(111, 'JO', 'Jordan', 962, 1),
(112, 'KZ', 'Kazakhstan', 7, 1),
(113, 'KE', 'Kenya', 254, 1),
(114, 'KI', 'Kiribati', 686, 1),
(115, 'KP', 'Korea North', 850, 1),
(116, 'KR', 'Korea South', 82, 1),
(117, 'KW', 'Kuwait', 965, 1),
(118, 'KG', 'Kyrgyzstan', 996, 1),
(119, 'LA', 'Laos', 856, 1),
(120, 'LV', 'Latvia', 371, 1),
(121, 'LB', 'Lebanon', 961, 1),
(122, 'LS', 'Lesotho', 266, 1),
(123, 'LR', 'Liberia', 231, 1),
(124, 'LY', 'Libya', 218, 1),
(125, 'LI', 'Liechtenstein', 423, 1),
(126, 'LT', 'Lithuania', 370, 1),
(127, 'LU', 'Luxembourg', 352, 1),
(128, 'MO', 'Macau S.A.R.', 853, 1),
(129, 'MK', 'Macedonia', 389, 1),
(130, 'MG', 'Madagascar', 261, 1),
(131, 'MW', 'Malawi', 265, 1),
(132, 'MY', 'Malaysia', 60, 1),
(133, 'MV', 'Maldives', 960, 1),
(134, 'ML', 'Mali', 223, 1),
(135, 'MT', 'Malta', 356, 1),
(136, 'XM', 'Man (Isle of)', 44, 1),
(137, 'MH', 'Marshall Islands', 692, 1),
(138, 'MQ', 'Martinique', 596, 1),
(139, 'MR', 'Mauritania', 222, 1),
(140, 'MU', 'Mauritius', 230, 1),
(141, 'YT', 'Mayotte', 269, 1),
(142, 'MX', 'Mexico', 52, 1),
(143, 'FM', 'Micronesia', 691, 1),
(144, 'MD', 'Moldova', 373, 1),
(145, 'MC', 'Monaco', 377, 1),
(146, 'MN', 'Mongolia', 976, 1),
(147, 'MS', 'Montserrat', 1664, 1),
(148, 'MA', 'Morocco', 212, 1),
(149, 'MZ', 'Mozambique', 258, 1),
(150, 'MM', 'Myanmar', 95, 1),
(151, 'NA', 'Namibia', 264, 1),
(152, 'NR', 'Nauru', 674, 1),
(153, 'NP', 'Nepal', 977, 1),
(154, 'AN', 'Netherlands Antilles', 599, 1),
(155, 'NL', 'Netherlands The', 31, 1),
(156, 'NC', 'New Caledonia', 687, 1),
(157, 'NZ', 'New Zealand', 64, 1),
(158, 'NI', 'Nicaragua', 505, 1),
(159, 'NE', 'Niger', 227, 1),
(160, 'NG', 'Nigeria', 234, 1),
(161, 'NU', 'Niue', 683, 1),
(162, 'NF', 'Norfolk Island', 672, 1),
(163, 'MP', 'Northern Mariana Islands', 1670, 1),
(164, 'NO', 'Norway', 47, 1),
(165, 'OM', 'Oman', 968, 1),
(166, 'PK', 'Pakistan', 92, 1),
(167, 'PW', 'Palau', 680, 1),
(168, 'PS', 'Palestinian Territory Occupied', 970, 1),
(169, 'PA', 'Panama', 507, 1),
(170, 'PG', 'Papua new Guinea', 675, 1),
(171, 'PY', 'Paraguay', 595, 1),
(172, 'PE', 'Peru', 51, 1),
(173, 'PH', 'Philippines', 63, 1),
(174, 'PN', 'Pitcairn Island', 0, 1),
(175, 'PL', 'Poland', 48, 1),
(176, 'PT', 'Portugal', 351, 1),
(177, 'PR', 'Puerto Rico', 1787, 1),
(178, 'QA', 'Qatar', 974, 1),
(179, 'RE', 'Reunion', 262, 1),
(180, 'RO', 'Romania', 40, 1),
(181, 'RU', 'Russia', 70, 1),
(182, 'RW', 'Rwanda', 250, 1),
(183, 'SH', 'Saint Helena', 290, 1),
(184, 'KN', 'Saint Kitts And Nevis', 1869, 1),
(185, 'LC', 'Saint Lucia', 1758, 1),
(186, 'PM', 'Saint Pierre and Miquelon', 508, 1),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784, 1),
(188, 'WS', 'Samoa', 684, 1),
(189, 'SM', 'San Marino', 378, 1),
(190, 'ST', 'Sao Tome and Principe', 239, 1),
(191, 'SA', 'Saudi Arabia', 966, 1),
(192, 'SN', 'Senegal', 221, 1),
(193, 'RS', 'Serbia', 381, 1),
(194, 'SC', 'Seychelles', 248, 1),
(195, 'SL', 'Sierra Leone', 232, 1),
(196, 'SG', 'Singapore', 65, 1),
(197, 'SK', 'Slovakia', 421, 1),
(198, 'SI', 'Slovenia', 386, 1),
(199, 'XG', 'Smaller Territories of the UK', 44, 1),
(200, 'SB', 'Solomon Islands', 677, 1),
(201, 'SO', 'Somalia', 252, 1),
(202, 'ZA', 'South Africa', 27, 1),
(203, 'GS', 'South Georgia', 0, 1),
(204, 'SS', 'South Sudan', 211, 1),
(205, 'ES', 'Spain', 34, 1),
(206, 'LK', 'Sri Lanka', 94, 1),
(207, 'SD', 'Sudan', 249, 1),
(208, 'SR', 'Suriname', 597, 1),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47, 1),
(210, 'SZ', 'Swaziland', 268, 1),
(211, 'SE', 'Sweden', 46, 1),
(212, 'CH', 'Switzerland', 41, 1),
(213, 'SY', 'Syria', 963, 1),
(214, 'TW', 'Taiwan', 886, 1),
(215, 'TJ', 'Tajikistan', 992, 1),
(216, 'TZ', 'Tanzania', 255, 1),
(217, 'TH', 'Thailand', 66, 1),
(218, 'TG', 'Togo', 228, 1),
(219, 'TK', 'Tokelau', 690, 1),
(220, 'TO', 'Tonga', 676, 1),
(221, 'TT', 'Trinidad And Tobago', 1868, 1),
(222, 'TN', 'Tunisia', 216, 1),
(223, 'TR', 'Turkey', 90, 1),
(224, 'TM', 'Turkmenistan', 7370, 1),
(225, 'TC', 'Turks And Caicos Islands', 1649, 1),
(226, 'TV', 'Tuvalu', 688, 1),
(227, 'UG', 'Uganda', 256, 1),
(228, 'UA', 'Ukraine', 380, 1),
(229, 'AE', 'United Arab Emirates', 971, 1),
(230, 'GB', 'United Kingdom', 44, 1),
(231, 'US', 'United States', 1, 1),
(232, 'UM', 'United States Minor Outlying Islands', 1, 1),
(233, 'UY', 'Uruguay', 598, 1),
(234, 'UZ', 'Uzbekistan', 998, 1),
(235, 'VU', 'Vanuatu', 678, 1),
(236, 'VA', 'Vatican City State (Holy See)', 39, 1),
(237, 'VE', 'Venezuela', 58, 1),
(238, 'VN', 'Vietnam', 84, 1),
(239, 'VG', 'Virgin Islands (British)', 1284, 1),
(240, 'VI', 'Virgin Islands (US)', 1340, 1),
(241, 'WF', 'Wallis And Futuna Islands', 681, 1),
(242, 'EH', 'Western Sahara', 212, 1),
(243, 'YE', 'Yemen', 967, 1),
(244, 'YU', 'Yugoslavia', 38, 1),
(245, 'ZM', 'Zambia', 260, 1),
(246, 'ZW', 'Zimbabwe', 263, 1);

-- --------------------------------------------------------

--
-- Table structure for table `death_reports`
--

CREATE TABLE `death_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `death_reports`
--

INSERT INTO `death_reports` (`id`, `patient_id`, `case_id`, `doctor_id`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'PW3P1DO4', 1, '2022-04-27 12:00:00', 'df d sdf', '2022-04-27 01:03:06', '2022-04-27 01:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `guard_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `is_active`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(2, 'Doctor', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(3, 'Patient', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(4, 'Nurse', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(5, 'Receptionist', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(6, 'Pharmacist', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(7, 'Accountant', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(8, 'Case Manager', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(9, 'Lab Technician', 1, 'web', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(92, 'jhk', 1, 'web', '2023-01-05 07:32:18', '2023-01-05 07:32:18'),
(93, 'cvvv', 1, 'web', '2023-01-05 22:45:13', '2023-01-05 22:45:13'),
(94, 'kjk', 1, 'web', '2023-01-05 23:41:31', '2023-01-05 23:41:31'),
(95, 'fff', 1, 'web', '2023-01-07 05:26:23', '2023-01-07 05:26:23'),
(96, 'vvv', 1, 'web', '2023-01-13 01:54:25', '2023-01-13 01:54:25'),
(97, 'testing1', 1, 'web', '2023-01-17 01:27:00', '2023-01-17 01:27:00'),
(98, 'testttt', 1, 'web', '2023-01-18 00:09:57', '2023-01-18 00:09:57'),
(99, 'testpre', 1, 'web', '2023-01-18 01:09:59', '2023-01-18 01:09:59'),
(100, 'hjhjjhjh', 1, 'web', '2023-01-18 02:11:15', '2023-01-18 02:11:15'),
(101, 'ffffoooo', 1, 'web', '2023-01-18 02:15:05', '2023-01-18 02:15:05'),
(102, 'khjk', 1, 'web', '2023-01-18 02:31:32', '2023-01-18 02:31:32'),
(103, 'ggggggggggg', 1, 'web', '2023-01-18 03:19:29', '2023-01-18 03:19:29'),
(104, 'fhghhgjgjhkh', 1, 'web', '2023-01-18 04:10:57', '2023-01-18 04:10:57'),
(105, 'saaaaa', 1, 'web', '2023-01-18 23:14:48', '2023-01-18 23:14:48'),
(106, 'jjj', 1, 'web', '2023-01-18 23:15:18', '2023-01-18 23:15:18'),
(107, 'jjjjjjjj-ppppp', 1, 'web', '2023-01-18 23:38:43', '2023-01-18 23:38:43'),
(108, 'ccccccccccc-ppp', 1, 'web', '2023-01-19 00:10:48', '2023-01-19 00:10:48'),
(109, 'xdcfg', 1, 'web', '2023-01-19 00:12:07', '2023-01-19 00:12:07'),
(110, 'sss', 1, 'web', '2023-01-19 00:57:05', '2023-01-19 00:57:05'),
(111, 'ggjgjg', 1, 'web', '2023-01-19 01:13:52', '2023-01-19 01:13:52'),
(112, 'gggg', 1, 'web', '2023-01-19 01:28:17', '2023-01-19 01:28:17'),
(113, 'ddddddd', 1, 'web', '2023-01-19 04:07:58', '2023-01-19 04:07:58'),
(114, 'kujk', 1, 'web', '2023-01-19 06:44:27', '2023-01-19 06:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_categories`
--

CREATE TABLE `diagnosis_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosis_categories`
--

INSERT INTO `diagnosis_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(0, 'sdfghj', 'zsdfghj', '2023-01-28 04:35:21', '2023-01-28 04:35:21'),
(1, 'maleria', 'due to the masquitoes', '2022-04-25 06:03:37', '2022-04-25 06:03:37'),
(2, 'fever', 'hkjg jkj jkj', '2022-04-26 06:05:10', '2022-04-26 06:05:10'),
(3, 'sonography', 'yes', '2022-12-07 03:08:58', '2022-12-07 03:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_department_id` bigint(20) UNSIGNED NOT NULL,
  `specialist` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `doctor_department_id`, `specialist`, `created_at`, `updated_at`) VALUES
(1, 11, 2, 'Dr.khan', '2022-04-26 03:16:36', '2022-04-26 03:16:36'),
(3, 16, 3, 'Orthopedic', '2022-04-26 04:31:31', '2022-04-26 04:31:31'),
(4, 19, 4, 'Dr.khan', '2022-04-26 05:09:28', '2022-04-26 05:09:28'),
(7, 0, 4, 'sdfg', '2022-09-13 23:51:26', '2022-09-13 23:51:26'),
(8, 56, 4, 'sdf', '2022-09-14 01:55:22', '2022-09-14 01:55:22'),
(9, 70, 4, 'sdf', '2022-09-26 03:31:36', '2022-09-26 03:31:36'),
(11, 79, 4, 'sdf', '2022-09-28 01:50:30', '2022-09-28 01:50:30'),
(12, 93, 1, 'Bones', '2022-12-03 05:55:00', '2022-12-03 05:55:00'),
(13, 96, 4, 'sdf', '2022-12-06 05:43:44', '2022-12-06 05:43:44'),
(14, 103, 1, 'Bones', '2022-12-08 23:45:44', '2022-12-08 23:45:44'),
(15, 0, 2, 'sdf', '2023-01-25 01:20:04', '2023-01-25 01:20:04'),
(16, 0, 4, 'thane', '2023-01-26 23:51:46', '2023-01-26 23:51:46'),
(17, 0, 4, 'sdsd', '2023-02-08 04:08:11', '2023-02-08 04:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_departments`
--

CREATE TABLE `doctor_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_departments`
--

INSERT INTO `doctor_departments` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'X-ray', 'left right join', '2022-04-25 04:06:42', '2022-04-25 04:06:42'),
(2, 'ICU', 'Admited patient', '2022-04-25 04:07:07', '2022-04-25 04:07:07'),
(3, 'cytiscan', 'thjj yhjhuk ghjjkhj', '2022-04-26 04:50:23', '2022-04-26 04:50:23'),
(4, '2D echo', 'sdfg dfg fdgvb', '2022-04-29 01:43:04', '2022-04-29 01:43:04'),
(5, 'eye specialist', 'dfg jhklhj hhlhjjhlk kdfkghjfjlj hdfgkdj j', '2022-09-27 23:57:35', '2022-09-27 23:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_opd_charges`
--

CREATE TABLE `doctor_opd_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `standard_charge` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_opd_charges`
--

INSERT INTO `doctor_opd_charges` (`id`, `doctor_id`, `standard_charge`, `created_at`, `updated_at`) VALUES
(1, 3, 233333, '2022-04-26 23:52:13', '2022-04-26 23:52:13'),
(2, 1, 356, '2022-04-26 23:52:38', '2022-04-26 23:52:38'),
(3, 5, 890000, '2022-04-28 00:42:34', '2022-04-28 00:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `uploaded_by` bigint(20) UNSIGNED NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `document_type_id`, `patient_id`, `uploaded_by`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'tyhg', 1, 0, 1, 'tyhgv ghjuk hkjuk', '2022-04-26 04:48:39', '2022-04-26 04:48:39'),
(2, 'tttt', 2, 0, 1, 'gkm hmml mlhm', '2022-04-26 04:49:09', '2022-04-26 04:49:09'),
(3, 'hii', 1, 3, 1, 'vjgjk hgkk', '2022-04-26 06:03:19', '2022-04-26 06:03:19'),
(4, 'Adhar cart document', 2, 24, 1, 'yes-ll', '2022-12-07 03:07:24', '2022-12-07 03:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'adhar card', '2022-04-25 06:01:53', '2022-04-25 06:01:53'),
(2, 'pancard', '2022-04-25 06:02:06', '2022-04-25 06:02:06'),
(3, 'passport', '2022-04-26 04:49:37', '2022-04-26 04:49:37'),
(4, 'ATM', '2022-12-07 03:07:58', '2022-12-07 03:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payrolls`
--

CREATE TABLE `employee_payrolls` (
  `id` int(10) UNSIGNED NOT NULL,
  `sr_no` bigint(20) NOT NULL,
  `payroll_id` varchar(191) NOT NULL,
  `type` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `month` varchar(191) NOT NULL,
  `year` int(11) NOT NULL,
  `net_salary` double NOT NULL,
  `status` int(11) NOT NULL,
  `basic_salary` double NOT NULL,
  `allowance` double NOT NULL,
  `deductions` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_payrolls`
--

INSERT INTO `employee_payrolls` (`id`, `sr_no`, `payroll_id`, `type`, `owner_id`, `owner_type`, `month`, `year`, `net_salary`, `status`, `basic_salary`, `allowance`, `deductions`, `created_at`, `updated_at`) VALUES
(1, 1, 'PR2QXVNJ', 6, 3, 'App\\Models\\Accountant', 'January', 2022, 120080, 0, 120000, 200, 120, '2022-04-28 05:47:01', '2022-04-28 05:47:01'),
(2, 3, '7B8YISMS', 7, 1, 'App\\Models\\CaseHandler', 'January', 2021, 24000, 1, 23000, 1240, 240, '2022-04-28 05:48:02', '2022-04-28 05:48:02'),
(3, 3, 'XRHFQN1L', 6, 4, 'App\\Models\\Accountant', 'February', 2022, 120080, 1, 120000, 200, 120, '2022-04-30 00:27:02', '2022-04-30 00:27:02'),
(4, 4, 'N4IMVB0K', 7, 3, 'App\\Models\\CaseHandler', 'February', 2022, 20877, 0, 23000, 233, 2356, '2022-09-26 03:54:39', '2022-09-26 03:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact_no` varchar(191) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `message` text NOT NULL,
  `viewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `full_name`, `email`, `contact_no`, `type`, `message`, `viewed_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ganu', 'ganu@gmail.com', '+919421263089', 2, 'dfgh adsf', NULL, 0, '2022-05-02 01:46:52', '2022-05-02 01:46:52'),
(2, 'jagruti', 'jagruti@gmail.com', '+919435678798', 2, 'dfgf  fd  dergf', NULL, 0, '2022-05-02 01:49:43', '2022-05-02 01:49:43'),
(3, 'nitashri', 'nitashri@gmail.com', '+919234567687', 2, 'asdf sd dsf', NULL, 0, '2022-05-02 01:51:26', '2022-05-02 01:51:26'),
(4, 'gunja', 'gunjagupta4august1999@gmail.com', '+918689989470', 2, 'sdfgh', 1, 1, '2022-05-02 01:53:34', '2022-12-07 03:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_head` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `invoice_number` varchar(191) DEFAULT NULL,
  `date` datetime NOT NULL,
  `amount` double NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_head`, `name`, `invoice_number`, `date`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'sakshi', '345676', '2022-04-28 00:00:00', 4000, 'dcfvgb fgbh dfgh', '2022-04-26 23:13:44', '2022-04-26 23:13:44'),
(2, 2, 'radha', 'fghjk', '2022-04-27 00:00:00', 200, 'cfvg sdfgh', '2022-04-26 23:14:55', '2022-04-26 23:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) DEFAULT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feedback_id` varchar(191) NOT NULL,
  `patient_name` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `pname_correct` varchar(191) NOT NULL,
  `pnumber_correct` varchar(191) NOT NULL,
  `clinical_remark` varchar(191) NOT NULL,
  `medicine_purchase` varchar(191) NOT NULL,
  `diagnostic_test` varchar(191) NOT NULL,
  `glass_invoice` varchar(191) NOT NULL,
  `treatment_recommended` varchar(191) NOT NULL,
  `medicines_guided` varchar(191) NOT NULL,
  `tests_recommended` varchar(191) NOT NULL,
  `glasses_recommended` varchar(191) NOT NULL,
  `surgery_recommened` varchar(191) NOT NULL,
  `surgery_recommended_product` varchar(191) NOT NULL,
  `understood_surgery_suggested` varchar(191) NOT NULL,
  `counsellor_meet` varchar(191) NOT NULL,
  `surgery_reason` varchar(191) NOT NULL,
  `planning_to_surgery` varchar(191) NOT NULL,
  `rate_receptionist` varchar(10) DEFAULT NULL,
  `rate_optometrist` varchar(10) DEFAULT NULL,
  `rate_doctor` varchar(10) DEFAULT NULL,
  `rate_counsellor` varchar(10) DEFAULT NULL,
  `rate_centre_head` varchar(10) DEFAULT NULL,
  `rate_pharmacist` varchar(10) DEFAULT NULL,
  `rate_optical_person` varchar(10) DEFAULT NULL,
  `rate_time_spent` varchar(10) DEFAULT NULL,
  `rate_cleanliness` varchar(10) DEFAULT NULL,
  `rate_visiting_hospital` varchar(10) DEFAULT NULL,
  `staff_mention` varchar(191) NOT NULL,
  `recommened_us` varchar(191) NOT NULL,
  `next_visit_date` varchar(191) NOT NULL,
  `planning_to` varchar(191) NOT NULL,
  `receipt` varchar(1000) NOT NULL,
  `optpmetrist` varchar(1000) NOT NULL,
  `doctor` varchar(1000) NOT NULL,
  `counsellor` varchar(1000) NOT NULL,
  `centre_head` varchar(1000) NOT NULL,
  `pharmacist` varchar(1000) NOT NULL,
  `optical_person` varchar(1000) NOT NULL,
  `time_spent` varchar(1000) NOT NULL,
  `cleanness` varchar(1000) NOT NULL,
  `visiting` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `created_at`, `updated_at`, `feedback_id`, `patient_name`, `mobile`, `pname_correct`, `pnumber_correct`, `clinical_remark`, `medicine_purchase`, `diagnostic_test`, `glass_invoice`, `treatment_recommended`, `medicines_guided`, `tests_recommended`, `glasses_recommended`, `surgery_recommened`, `surgery_recommended_product`, `understood_surgery_suggested`, `counsellor_meet`, `surgery_reason`, `planning_to_surgery`, `rate_receptionist`, `rate_optometrist`, `rate_doctor`, `rate_counsellor`, `rate_centre_head`, `rate_pharmacist`, `rate_optical_person`, `rate_time_spent`, `rate_cleanliness`, `rate_visiting_hospital`, `staff_mention`, `recommened_us`, `next_visit_date`, `planning_to`, `receipt`, `optpmetrist`, `doctor`, `counsellor`, `centre_head`, `pharmacist`, `optical_person`, `time_spent`, `cleanness`, `visiting`) VALUES
(1, '2022-10-17 03:19:45', '2022-10-17 03:19:45', '401', 'Poonam Gupta', '9892244097', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'lsehrawui', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '4', '4', '4', '2', '3', '2', '2', '2', '3', '2', 'Ujwala Sharma', 'no', '2022-10-30', 'no', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes'),
(2, '2022-10-17 03:23:14', '2022-10-17 04:10:42', '402', 'Heera Thakur', '7738260958', 'no', 'no', 'no', 'no', 'no', 'no', 'mmmm', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '1', '4', '4', '4', '4', '4', '4', '4', '4', '5', 'Gunja Guptaaaa', 'yes', '2022-11-06', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'yes', 'yes'),
(3, '2022-10-17 04:30:33', '2022-10-17 04:31:45', '103', 'preeti  singh', '7738260958', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'bbbbbbbb', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '1', '1', '1', '1', '1', '1', '1', '1', '4', '5', 'Ujwala Sharma', 'yes', '2022-11-06', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'yes', 'yes'),
(5, '2022-11-01 06:13:49', '2022-11-01 06:13:49', '23', 'yash', '5676867874', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'aaaa', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '1', '2', NULL, '4', '3', '5', NULL, NULL, NULL, NULL, 'sarthak', 'yes', '2022-11-01', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'no', 'no'),
(8, '2022-12-07 03:19:41', '2022-12-07 03:19:41', '', '39', '+919435678798', 'no', 'no', 'no', 'no', 'no', 'no', '8', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', 'no', '2022-12-07', 'no', 'yes', 'yes', 'yes', 'select', 'select', 'select', 'select', 'select', 'select', 'select'),
(9, '2022-12-07 04:52:41', '2022-12-07 04:52:41', '', '22', '+919234567623', 'no', 'no', 'no', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '1', NULL, '2', '2', '3', NULL, NULL, '1', NULL, NULL, '17', 'no', '2022-12-07', 'no', 'yes', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'no', 'yes'),
(10, '2022-12-07 04:53:29', '2022-12-07 04:53:29', '', '57', '+919434567867', 'no', 'no', 'no', 'no', 'no', 'no', 'fgh', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', 'no', '2022-12-07', 'no', 'yes', 'yes', 'select', 'select', 'select', 'select', 'select', 'select', 'select', 'select');

-- --------------------------------------------------------

--
-- Table structure for table `front_services`
--

CREATE TABLE `front_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `short_description` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_services`
--

INSERT INTO `front_services` (`id`, `name`, `short_description`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Cardiology', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'cardiology.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(2, 'Orthopedics', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'orthopedics.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(3, 'Pulmonology', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'pulmonology.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(4, 'Dental Care', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'dental-care.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(5, 'Medicine', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'medicine.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(6, 'Ambulance', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'ambulance.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(7, 'Ophthalmology', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'ophthalmology.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(8, 'Neurology', 'image Cardiology Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.', 'neurology.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `front_settings`
--

CREATE TABLE `front_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text NOT NULL,
  `type` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_settings`
--

INSERT INTO `front_settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'about_us_title', 'About For HMS', '1', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(2, 'about_us_description', 'HMS will teach physicians and nurses from around the world the principles of blood management, as well as how to manage their own blood conservation programs. The hospital was chosen based on the reputation its bloodless program has established in the medical community and because of its nationally recognized results.\r\n\r\nWe are a group of creative nerds making awesome stuff for Web and Mobile. We just love to contribute to open source technologies. We always try to build something which helps developers to save their time. so they can spend a bit more time with their friends And family.', '1', '2022-03-02 01:48:42', '2022-04-25 23:05:11'),
(3, 'about_us_mission', 'We are providing advanced emergency services. We have well-equipped emergency and trauma center with facilities.', '1', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(4, 'about_us_image', 'http://localhost/uploads/28/images-(2).jpg', '1', '2022-03-02 01:48:42', '2022-04-26 23:42:04'),
(5, 'home_page_experience', '10', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(6, 'home_page_title', 'Find Local Specialists Best Services', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(7, 'home_page_description', 'Our medical clinic provides quality care for the entire family while maintaining a personable atmosphere best services.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(8, 'home_page_image', 'http://localhost/uploads/26/images-(2).jpg', '2', '2022-03-02 01:48:42', '2022-04-26 23:41:40'),
(9, 'terms_conditions', '\"<p>\\\"</p><p>terms_conditions</p><p>kjkhkk </p><p>\\\"</p>\"', '2', '2022-03-02 01:48:42', '2022-04-26 23:42:50'),
(10, 'privacy_policy', '\"<p>\\\"</p><p>privacy_policy</p><p>hmmhmhm </p><p>\\\"fghgj</p>\"', '2', '2022-03-02 01:48:42', '2022-04-26 23:42:50'),
(11, 'home_page_certified_doctor_image', 'http://localhost/uploads/27/images.jpg', '2', '2022-03-02 01:48:42', '2022-04-26 23:41:40'),
(12, 'home_page_certified_doctor_text', 'Quality Healthcare', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(13, 'home_page_certified_doctor_title', 'Have Certified and High Quality Doctor For You', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(14, 'home_page_certified_doctor_description', 'Our medical clinic provides quality care for the entire family while maintaining a personable atmosphere best services. Our medical clinic provides quality. Our medical clinic provides quality care for the entire family while maintaining lizam a personable atmosphere best services. Our medical clinic provides.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(15, 'home_page_box_title', 'Free Consulting', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(16, 'home_page_box_description', 'Proin gravida nibh vel velit auctor aliquet.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(17, 'home_page_step_1_title', 'Check Doctor Profile', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(18, 'home_page_step_1_description', 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis bibendum auctor nisi elit.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(19, 'home_page_step_2_title', 'Request Consulting', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(20, 'home_page_step_2_description', 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis bibendum auctor nisi elit.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(21, 'home_page_step_3_title', 'Receive Consulting', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(22, 'home_page_step_3_description', 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis bibendum auctor nisi elit.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(23, 'home_page_step_4_title', 'Get Your Solution', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(24, 'home_page_step_4_description', 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis bibendum auctor nisi elit.fg', '2', '2022-03-02 01:48:42', '2022-04-26 23:41:41'),
(25, 'home_page_certified_box_title', 'Certified Doctor', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(26, 'home_page_certified_box_description', 'Proin gravida nibh vel velit auctor aliquet.', '2', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(27, 'appointment_title', 'Contact Now and Get the Best Doctor Service Todayhhhg', '3', '2022-03-02 01:48:42', '2022-04-25 23:05:25'),
(28, 'appointment_description', 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis bibendum auctor nisi elit consequat ipsum nec sagittis', '3', '2022-03-02 01:48:42', '2022-04-26 23:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `hospitalinvoice`
--

CREATE TABLE `hospitalinvoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mr_discharge_date` varchar(191) NOT NULL,
  `payment_amount` varchar(191) NOT NULL,
  `procedure` varchar(191) NOT NULL,
  `details` varchar(191) NOT NULL,
  `mr_admission_date` varchar(191) NOT NULL,
  `selecttype` varchar(191) NOT NULL,
  `roomtype` varchar(191) NOT NULL,
  `paymenttype` varchar(191) NOT NULL,
  `patienttype` varchar(191) NOT NULL,
  `paymenttypeone` varchar(191) NOT NULL,
  `doctorname` varchar(191) NOT NULL,
  `patientname` varchar(191) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `discType` varchar(191) NOT NULL,
  `discRate` varchar(20) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `ttlamt` varchar(20) NOT NULL,
  `category` varchar(191) NOT NULL,
  `subcategory` varchar(191) NOT NULL,
  `productname` varchar(191) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `payment_pay` varchar(191) NOT NULL,
  `payment_paymode` varchar(191) NOT NULL,
  `paymentdate` varchar(191) NOT NULL,
  `paymentremark` varchar(191) NOT NULL,
  `amount` varchar(191) NOT NULL,
  `paidamt` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitalinvoice`
--

INSERT INTO `hospitalinvoice` (`id`, `created_at`, `updated_at`, `mr_discharge_date`, `payment_amount`, `procedure`, `details`, `mr_admission_date`, `selecttype`, `roomtype`, `paymenttype`, `patienttype`, `paymenttypeone`, `doctorname`, `patientname`, `invoice_no`, `discType`, `discRate`, `mrp`, `discount`, `price`, `ttlamt`, `category`, `subcategory`, `productname`, `qty`, `payment_pay`, `payment_paymode`, `paymentdate`, `paymentremark`, `amount`, `paidamt`) VALUES
(0, '2023-02-07 02:39:12', '2023-02-07 02:39:12', '07-02-2023', '23000', 'sdfghj', 'fghj', '07-02-2023', 'New', 'Single bed', 'advance', 'CISF', 'FOC', '2', '13', 'HOSP_INV_014', '%', '2', '150', '3', '150', '147', '19', '281', '8', '1', '62', '2', '07-02-2023', '23', '123456', '123456'),
(10, NULL, NULL, 'cc', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, '2022-11-13 23:03:48', '2022-11-13 23:03:48', '14-11-2022', 'hhhh', 'hjhjhjhj', 'pppppppopo', '14-11-2022', 'New', 'General ward', 'advance', 'RSBY', 'FOC', '2', '18', 'HOSP_INV_011', '%', '2', '120000,200000', '6400', '120000,200000', '313600', '3', '105', '3,5', '1,1', '64,62', '1,2', '14-11-2022,14-11-2022', 'lolollo,iiiii', '100,200', '300'),
(12, '2022-11-13 23:16:56', '2022-11-13 23:16:56', '14-11-2022', 'ggg', 'hjh', 'vhhv', '14-11-2022', 'Others', 'Double bed', 'advance', 'Self', 'Paid', '2', '42', 'HOSP_INV_012', '%', '2', '2345,2345', '93.8', '2345,2345', '4596.2', '3', '13', '4,4', '1,1', '64,66', '1,3', '14-11-2022,14-11-2022', 'kkk,llll', '100,200', '300'),
(13, '2022-11-14 00:32:32', '2022-11-14 00:33:28', '14-11-2022', '40,0000', 'kjghhgkgj kgjkgjk j', 'asdfgh', '14-11-2022', 'Old', 'Single bed', 'advance', 'BSNL', 'Credit', '4', '46', 'HOSP_INV_013', '%', '4', '120000,200000,2345', '21175.2', '120000,400000,9380', '508204.8', '13', '195', '3,5,4', '1,2,4', '64,66,62', '1,3,2', '14-11-2022,14-11-2022,14-11-2022', 'yes,no,yes', '200,200,300', '700');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_schedules`
--

CREATE TABLE `hospital_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_of_week` varchar(191) NOT NULL,
  `start_time` varchar(191) NOT NULL,
  `end_time` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `income_head` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `invoice_number` varchar(191) DEFAULT NULL,
  `date` datetime NOT NULL,
  `amount` double NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `income_head`, `name`, `invoice_number`, `date`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', '234567', '2022-04-06 00:00:00', 30000, 'income chanrges', '2022-04-25 06:04:53', '2022-04-25 06:04:53'),
(2, 3, 'mohit', '234567', '2022-04-06 00:00:00', 30000, 'income chanrges', '2022-04-25 06:05:22', '2022-04-25 06:05:22'),
(3, 1, 'manisha', '234567', '2022-04-28 00:00:00', 60000, 'dfgbnh jmhjk.l dcfvbn', '2022-04-26 23:10:06', '2022-04-26 23:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `service_tax` double NOT NULL,
  `discount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `insurance_no` varchar(191) NOT NULL,
  `insurance_code` varchar(191) NOT NULL,
  `hospital_rate` double NOT NULL,
  `total` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `name`, `service_tax`, `discount`, `remark`, `insurance_no`, `insurance_code`, `hospital_rate`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'wwww', 123, 0.01, 'df', '244', 'ghkj gh', 3456, 27032.2965, 1, '2022-04-27 01:13:41', '2022-04-27 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_diseases`
--

CREATE TABLE `insurance_diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `insurance_id` int(10) UNSIGNED NOT NULL,
  `disease_name` varchar(191) NOT NULL,
  `disease_charge` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_diseases`
--

INSERT INTO `insurance_diseases` (`id`, `insurance_id`, `disease_name`, `disease_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 'drfgt', 23456, '2022-04-27 01:13:41', '2022-04-27 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_reports`
--

CREATE TABLE `investigation_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigation_reports`
--

INSERT INTO `investigation_reports` (`id`, `patient_id`, `date`, `title`, `description`, `doctor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '2022-04-18 12:00:00', 'aaa', 'dfg as s sdf sdf sdf sd f', 1, 1, '2022-04-27 01:03:49', '2022-04-27 01:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `patient_id`, `invoice_date`, `amount`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'R8DNEQ', 3, '2022-04-26', 8787.00, 0.02, 1, '2022-04-26 05:41:49', '2022-04-26 05:41:49'),
(2, 'QZOE19', 9, '2022-04-28', 68000.00, 0.06, 1, '2022-04-28 05:49:15', '2022-04-28 05:49:15'),
(3, 'IBPFAI', 6, '2022-04-30', 13701.00, 0.05, 1, '2022-04-30 00:30:01', '2022-04-30 00:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `account_id`, `invoice_id`, `description`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'fdfghj', 1, 8787.00, 8787.00, '2022-04-26 05:41:49', '2022-04-26 05:41:49'),
(2, 2, 2, 'zsdfghjk', 2, 34000.00, 68000.00, '2022-04-28 05:49:15', '2022-04-28 05:49:15'),
(3, 1, 3, 'fdfghj', 3, 4567.00, 13701.00, '2022-04-30 00:30:01', '2022-04-30 00:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_bills`
--

CREATE TABLE `ipd_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `total_charges` int(11) NOT NULL,
  `total_payments` int(11) NOT NULL,
  `gross_total` int(11) NOT NULL,
  `discount_in_percentage` int(11) NOT NULL,
  `tax_in_percentage` int(11) NOT NULL,
  `other_charges` int(11) NOT NULL,
  `net_payable_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_charges`
--

CREATE TABLE `ipd_charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `charge_type_id` int(11) NOT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `charge_id` int(10) UNSIGNED NOT NULL,
  `standard_charge` int(11) DEFAULT NULL,
  `applied_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_consultant_registers`
--

CREATE TABLE `ipd_consultant_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `applied_date` datetime NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `instruction` text NOT NULL,
  `instruction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_diagnoses`
--

CREATE TABLE `ipd_diagnoses` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `report_type` varchar(191) NOT NULL,
  `report_date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_patient_departments`
--

CREATE TABLE `ipd_patient_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `ipd_number` varchar(191) NOT NULL,
  `height` varchar(191) DEFAULT NULL,
  `weight` varchar(191) DEFAULT NULL,
  `bp` varchar(191) DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `admission_date` datetime NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `is_old_patient` tinyint(1) DEFAULT 0,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bed_type_id` int(10) UNSIGNED DEFAULT NULL,
  `bed_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ipd_patient_departments`
--

INSERT INTO `ipd_patient_departments` (`id`, `patient_id`, `ipd_number`, `height`, `weight`, `bp`, `symptoms`, `notes`, `admission_date`, `case_id`, `is_old_patient`, `doctor_id`, `bed_type_id`, `bed_id`, `created_at`, `updated_at`, `bill_status`) VALUES
(1, 3, 'G8MSII9Z', '0', '0', NULL, 'dfg d', 'fdfg sdg', '2022-04-28 10:21:00', 0, 0, 3, 2, 2, '2022-04-27 23:27:49', '2022-04-27 23:27:49', 0),
(2, 5, 'ZM8LQDPE', '0', '0', 'dsfgf b', 'df', 'dsf', '2022-04-28 10:46:00', 2, 0, 3, 2, 2, '2022-04-27 23:46:38', '2022-04-27 23:46:38', 0),
(3, 10, 'AXBTBOYT', '7', '78', 'NA', 'BASe', 'NA', '2022-04-28 16:20:00', 9, 0, 3, 2, 9, '2022-04-28 05:22:57', '2022-04-28 05:22:57', 0),
(4, 6, '6MCJZZ3D', '0.01', '0', '567', 'sdfgh', 'dfgh', '2022-04-28 16:29:00', 4, 0, 3, 4, 10, '2022-04-28 05:29:51', '2022-04-28 05:29:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ipd_payments`
--

CREATE TABLE `ipd_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_mode` tinyint(4) NOT NULL,
  `notes` text DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_prescriptions`
--

CREATE TABLE `ipd_prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `header_note` text DEFAULT NULL,
  `footer_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_prescription_items`
--

CREATE TABLE `ipd_prescription_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_prescription_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `dosage` varchar(191) NOT NULL,
  `instruction` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_timelines`
--

CREATE TABLE `ipd_timelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `visible_to_person` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issued_items`
--

CREATE TABLE `issued_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `issued_by` varchar(191) NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issued_items`
--

INSERT INTO `issued_items` (`id`, `department_id`, `user_id`, `issued_by`, `issued_date`, `return_date`, `item_category_id`, `item_id`, `quantity`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'wsws', '2022-04-25', '2022-04-26', 1, 2, 4, 'dcfv dsfg fgfh sfdg fdg', 0, '2022-04-27 00:05:28', '2022-04-27 00:05:28'),
(2, 7, 24, 'fgh', '2022-03-30', '2022-04-06', 1, 2, 1, NULL, 0, '2022-04-28 01:05:46', '2022-04-28 01:05:46'),
(3, 2, 2, 'tyu', '2022-04-07', '2022-04-08', 1, 1, 3, 'dfg', 0, '2022-04-28 04:29:43', '2022-04-28 04:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `available_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `item_category_id`, `unit`, `description`, `available_quantity`, `created_at`, `updated_at`) VALUES
(1, 'pooja', 1, '7889', 'tyhj hjhkg jhkmknokli', 4575, '2022-04-25 23:11:03', '2022-04-28 04:29:43'),
(2, 'manoj', 1, '234', 'dfg sdf fd', 4, '2022-04-27 00:01:03', '2022-04-28 01:05:46'),
(3, 'nupur', 3, '34', 'fdr rjh', 6576, '2022-04-28 04:21:31', '2022-04-28 04:22:24'),
(4, 'tanish', 4, '456', 'dfg gt', 0, '2022-04-28 04:26:00', '2022-04-28 04:26:00'),
(5, 'tanishri', 4, '456', 'dfg gt', 0, '2022-04-28 04:27:36', '2022-04-28 04:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'mahesh', '2022-04-25 23:09:40', '2022-04-25 23:09:40'),
(2, 'sushant', '2022-04-27 00:00:36', '2022-04-27 00:00:36'),
(3, 'nisha', '2022-04-28 04:20:32', '2022-04-28 04:20:32'),
(4, 'tinu', '2022-04-28 04:24:56', '2022-04-28 04:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE `item_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) DEFAULT NULL,
  `store_name` varchar(191) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_stocks`
--

INSERT INTO `item_stocks` (`id`, `item_category_id`, `item_id`, `supplier_name`, `store_name`, `quantity`, `purchase_price`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'mansvi', 'jjfkjgjkg', 9, 89089, 'thgj jjmgk hdgfh ,gjhhhlh hjjhjj jl', '2022-04-25 23:12:35', '2022-04-25 23:12:35'),
(2, 1, 2, 'kishori sohani', 'jjfkjgjkg', 9, 89089, 'fgh', '2022-04-27 00:04:23', '2022-04-27 00:04:23'),
(3, 3, 3, 'jaibaq', 'tttgk', 6576, 5678, 'iro', '2022-04-28 04:22:24', '2022-04-28 04:22:24'),
(4, 1, 1, 'tyyty', 'kfjg', 4578, 78, 'fnk', '2022-04-28 04:28:49', '2022-04-28 04:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `lab_technicians`
--

CREATE TABLE `lab_technicians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_technicians`
--

INSERT INTO `lab_technicians` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 25, '2022-04-27 00:18:05', '2022-04-27 00:18:05'),
(2, 26, '2022-04-27 00:20:17', '2022-04-27 00:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `leave_reason` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `leave_from` text NOT NULL,
  `leave_to` text NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `applied_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `name`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`, `updated_at`, `created_at`) VALUES
(1, 'ruhi', 'rrr', 'qwerfg', 'Accept', '2022-11-08', '2022-11-09', '2022-11-07 10:12:40', '2022-11-07 10:12:40', '2022-11-07 04:42:40', '2022-11-07 04:42:40'),
(2, 'ergty', 'ertyu', 'we4r56', 'Reject', '2022-11-08', '2022-11-16', '2022-11-07 10:14:34', '2022-11-07 10:14:34', '2022-11-07 04:44:34', '2022-11-07 04:44:34'),
(3, 'dfghj', 'iuytre', 'ertyu', 'Accept', '2022-11-08', '2022-11-09', '2022-11-07 10:15:03', '2022-11-07 10:15:03', '2022-11-07 04:45:03', '2022-11-07 04:45:03'),
(4, 'kjhg', 'hhh', 'kkkkkkkk', 'Reject', '2022-11-08', '2022-11-09', '2022-11-07 10:27:19', '2022-11-07 10:27:19', '2022-11-07 04:57:19', '2022-11-07 04:57:19'),
(5, 'aaaaaaaaaa', 'dddddddd', 'ssssssssss', 'Reject', '2022-11-07', '2022-11-08', '2022-11-07 10:28:28', '2022-11-07 10:28:28', '2022-11-07 04:58:28', '2022-11-07 04:58:28'),
(6, 'soham', 'headpain', 'yes', '', '2022-11-09', '2022-11-09', '2022-11-09 14:12:59', '2022-11-09 14:12:59', '2022-11-09 08:42:59', '2022-11-09 08:42:59'),
(7, 'gunja', 'headpain', 'dfg', '', '2022-11-09', '2022-11-09', '2022-11-09 14:13:29', '2022-11-09 14:13:29', '2022-11-09 08:43:29', '2022-11-09 08:43:29'),
(8, 'sai', 'headpain', 'on monday', '', '2022-11-09', '2022-11-09', '2022-11-09 14:15:36', '2022-11-09 14:15:36', '2022-11-09 08:45:36', '2022-11-09 08:45:36'),
(9, 'dcfg', 'cfvgh', 'on monday', '', '2022-11-09', '2022-11-09', '2022-11-09 14:16:15', '2022-11-09 14:16:15', '2022-11-09 08:46:15', '2022-11-09 08:46:15'),
(10, 'sahi', 'headache', 'on monday', '', '2022-11-09', '2022-11-09', '2022-11-09 14:17:08', '2022-11-09 14:17:08', '2022-11-09 08:47:08', '2022-11-09 08:47:08'),
(11, 'yasasvi', 'leg pain', 'yes', '', '2022-11-15', '2022-11-15', '2022-11-15 09:43:00', '2022-11-15 09:43:00', '2022-11-15 04:13:00', '2022-11-15 04:13:00'),
(12, 'neha', 'pain', 'hjjkk', '', '2022-11-15', '2022-11-15', '2022-11-15 09:44:21', '2022-11-15 09:44:21', '2022-11-15 04:14:21', '2022-11-15 04:14:21'),
(13, 'neha', 'pain', 'hjjkk', '', '2022-11-15', '2022-11-15', '2022-11-15 09:44:54', '2022-11-15 09:44:54', '2022-11-15 04:14:54', '2022-11-15 04:14:54'),
(14, 'neha', 'pain', 'hjjkk', 'Reject', '2022-11-15', '2022-11-15', '2022-11-15 09:45:09', '2022-11-15 09:45:09', '2022-11-15 04:15:09', '2022-11-15 04:15:09'),
(15, 'rajnigandha', 'painn', 'yes', '', '2022-11-15', '2022-11-15', '2022-11-15 09:48:23', '2022-11-15 09:48:23', '2022-11-15 04:18:23', '2022-11-15 04:18:23'),
(16, 'sakshi', 'headache', 'on monday', 'Reject', '2022-11-15', '2022-11-15', '2022-11-15 09:48:47', '2022-11-15 09:48:47', '2022-11-15 04:18:47', '2022-11-15 04:18:47'),
(17, 'sakshi', 'headache', 'on monday', '', '2022-11-16', '2022-11-16', '2022-11-17 14:44:42', '2022-11-17 14:44:42', '2022-11-17 09:14:42', '2022-11-17 09:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `livepatientstatus`
--

CREATE TABLE `livepatientstatus` (
  `id` int(10) NOT NULL,
  `status_option` varchar(191) NOT NULL,
  `created on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livepatientstatus`
--

INSERT INTO `livepatientstatus` (`id`, `status_option`, `created on`) VALUES
(1, 'Registration', '2022-10-01'),
(2, 'OPD', '2022-10-01'),
(3, 'Dilation', '2022-10-01'),
(4, 'Doctor Visit', '2022-10-01'),
(5, 'Counsellor', '2022-10-01'),
(6, 'Waiting', '2022-10-01'),
(7, 'Pharmacy', '2022-10-01'),
(8, 'Billing', '2022-10-01'),
(9, 'Exit', '2022-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `live_consultations`
--

CREATE TABLE `live_consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `consultation_title` varchar(191) NOT NULL,
  `consultation_date` datetime NOT NULL,
  `host_video` tinyint(1) NOT NULL,
  `participant_video` tinyint(1) NOT NULL,
  `consultation_duration_minutes` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `type_number` varchar(191) NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `meeting_id` varchar(191) NOT NULL,
  `meta` text DEFAULT NULL,
  `time_zone` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_meetings`
--

CREATE TABLE `live_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consultation_title` varchar(191) NOT NULL,
  `consultation_date` datetime NOT NULL,
  `consultation_duration_minutes` varchar(191) NOT NULL,
  `host_video` tinyint(1) NOT NULL,
  `participant_video` tinyint(1) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(191) NOT NULL,
  `meta` text DEFAULT NULL,
  `meeting_id` varchar(191) NOT NULL,
  `time_zone` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_meetings_candidates`
--

CREATE TABLE `live_meetings_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `live_meeting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lname` varchar(191) NOT NULL,
  `alname` varchar(191) NOT NULL,
  `specialization` varchar(191) NOT NULL,
  `constitution` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `fax_no` varchar(191) NOT NULL,
  `building` varchar(191) NOT NULL,
  `street` varchar(191) NOT NULL,
  `suburb` varchar(191) NOT NULL,
  `zip_code` varchar(191) NOT NULL,
  `gst` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `financial_year` varchar(191) NOT NULL,
  `drug_lic_no` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `created_at`, `updated_at`, `lname`, `alname`, `specialization`, `constitution`, `mobile`, `email`, `phone`, `fax_no`, `building`, `street`, `suburb`, `zip_code`, `gst`, `country`, `state`, `city`, `financial_year`, `drug_lic_no`) VALUES
(5, '2022-11-24 05:15:41', '2022-11-24 23:48:00', 'Insure Eye Institute Mulund', 'Insure Eye Institute Mulund', 'Test3', 'Test3', '9421234546', 'test3@gmail.com', '47773643895', 'Test3', 'Test3', 'Test3', 'Test3', 'Test3', '27AAACC6606P1ZD', '101', '10', '707', '2022-2023', 'Test3'),
(6, '2022-11-24 07:00:19', '2022-11-24 23:48:36', 'Insure Eye Institute Kolhapur', 'Insure Eye Institute Kolhapur', 'Testing', 'Testing', '9892244097', 'testing123@gmail.com', '7823413775', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', '27AAACC6606P1ZD', '101', '10', '696', '2022-2023', 'Testing'),
(7, '2022-12-05 01:54:19', '2022-12-05 01:55:15', 'Insure Eye Institute Thane', 'Insure Eye Institute Thane', 'IT', 'IT department', '9878676756', 'thane@gmail.com', '7057263438', '23', '4', '4', '6', '345656', '27AAACC6606P1ZS', '101', '10', '707', '2022-2023', '23'),
(8, '2022-12-05 01:58:37', '2022-12-05 02:02:27', 'Insure Eye Institute Borivali', 'Insure Eye Institute Borivali', 'IT', 'IT', '2345456574', 'borivali@gmail.com', '7057263438', '2', '4', '2', '3', '35675676', '27AAACC6606P1ZC', '101', '10', '706', '2022-2023', '244'),
(9, '2022-12-05 02:04:24', '2022-12-05 02:04:24', 'Insure Eye Institute Ghansoli', 'Insure Eye Institute Ghansoli', 'IT', 'IT', '7867567687', 'ghansoli@gmail.com', '9566756765', '2', '4', '2', '2', '345658', '27AAACC6606P1ZW', '101', '10', '706', '2019-2020', '2'),
(10, '2022-12-05 06:00:08', '2023-01-06 00:37:00', 'Ulhasngar', 'Ulhasngar', 'IT', 'IT department', '9878676756', 'admin@hms.com', '7057263439', '2', '4', '23', '12', '345656', '27AAACC6606P1ZD', '101', '14', '1217', '2022-2023', '244-99'),
(11, '2022-12-09 00:54:00', '2022-12-09 00:54:00', 'Insure Eye Institute vashi', 'Insure Eye Institute Mulund', 'IT', 'IT', '7687678798', 'admin@hms.com', '7057263439', '2', '4', '23', '12', '345656', '27AAACC6606P1ZC', '101', '16', '1367', '2022-2023', '2'),
(12, '2023-02-16 02:14:50', '2023-02-16 02:14:50', 'pune', 'sangli', 'IT one', '3', '9878676756', 'aditya@gmail.com', '7057263439', '2', '3444', '4', '34', '222343', '27AAACC6606P1ZD', '101', '2', '1', '2015-2016', '2');

-- --------------------------------------------------------

--
-- Table structure for table `locationyear`
--

CREATE TABLE `locationyear` (
  `id` int(11) NOT NULL,
  `locationyears` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locationyear`
--

INSERT INTO `locationyear` (`id`, `locationyears`, `created_at`, `updated_at`) VALUES
(3, '2013-2014', '2023-02-15 07:01:33', '2023-02-15 07:01:33'),
(4, '2015-2016', '2023-02-15 07:05:13', '2023-02-15 07:05:13'),
(5, '2012-2013', '2023-02-15 07:05:53', '2023-02-15 07:05:53'),
(6, '2022-2023', '2023-02-15 07:08:29', '2023-02-15 07:08:29'),
(7, '2011-2012', '2023-02-15 07:09:40', '2023-02-15 07:09:40'),
(12, NULL, '2023-02-15 07:18:12', '2023-02-15 07:18:12'),
(13, '2024-2025', '2023-02-16 01:41:23', '2023-02-16 01:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `attachments` varchar(191) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `to`, `subject`, `message`, `attachments`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'kishorisohani4@gmail.com', 'hii', 'hii kgkj kglkj jj jglk khkk', NULL, 1, '2022-04-27 01:56:49', '2022-04-27 01:56:49'),
(2, 'kishorisohani4@gmail.com', 'ghjkl', 'hi njhgfgh ghkjhj', NULL, 1, '2022-04-27 01:59:14', '2022-04-27 01:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `mime_type` varchar(191) DEFAULT NULL,
  `disk` varchar(191) NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` text NOT NULL,
  `custom_properties` text NOT NULL,
  `responsive_images` text NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conversions_disk` varchar(191) DEFAULT NULL,
  `uuid` char(36) DEFAULT NULL,
  `generated_conversions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`, `conversions_disk`, `uuid`, `generated_conversions`) VALUES
(1, 'App\\Models\\FrontService', 1, 'front-services', 'cardiology', 'cardiology.png', 'image/png', 'public', 14945, '[]', '[]', '[]', 1, '2022-03-02 01:48:42', '2022-03-02 01:48:42', 'public', 'af78e92c-7760-406c-a9d8-a300a6995b43', '[]'),
(3, 'App\\Models\\FrontService', 3, 'front-services', 'pulmonology', 'pulmonology.png', 'image/png', 'public', 14513, '[]', '[]', '[]', 3, '2022-03-02 01:48:42', '2022-03-02 01:48:42', 'public', 'c22c8bd1-4ae1-49ca-9006-21ccaf8e5803', '[]'),
(4, 'App\\Models\\FrontService', 4, 'front-services', 'dental-care', 'dental-care.png', 'image/png', 'public', 11787, '[]', '[]', '[]', 4, '2022-03-02 01:48:42', '2022-03-02 01:48:42', 'public', 'cc5535c6-f3f0-4d18-b517-6aacb4835f37', '[]'),
(7, 'App\\Models\\FrontService', 7, 'front-services', 'ophthalmology', 'ophthalmology.png', 'image/png', 'public', 19751, '[]', '[]', '[]', 7, '2022-03-02 01:48:42', '2022-03-02 01:48:42', 'public', 'ef83921e-3e6e-496c-b1f2-685914b0ac47', '[]'),
(8, 'App\\Models\\FrontService', 8, 'front-services', 'neurology', 'neurology.png', 'image/png', 'public', 13907, '[]', '[]', '[]', 8, '2022-03-02 01:48:42', '2022-03-02 01:48:42', 'public', '2d8e4861-48c9-4398-89aa-6de9d7108e3a', '[]'),
(12, 'App\\Models\\ItemStock', 1, 'item_stocks', 'images', 'images.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 12, '2022-04-25 23:12:35', '2022-04-25 23:12:35', 'public', 'dcd87568-29a0-4894-ab1a-f33bdef515cb', '[]'),
(13, 'App\\Models\\Document', 1, 'documents', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 13, '2022-04-26 04:48:40', '2022-04-26 04:48:40', 'public', '93009f98-a6ca-4a9b-a4f7-4207e86112d2', '[]'),
(14, 'App\\Models\\Document', 2, 'documents', 'images', 'images.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 14, '2022-04-26 04:49:09', '2022-04-26 04:49:09', 'public', 'ed4df636-e1cf-4084-bdbe-b774ffab60d9', '[]'),
(15, 'App\\Models\\Document', 3, 'documents', 'images (1)', 'images-(1).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 15, '2022-04-26 06:03:20', '2022-04-26 06:03:20', 'public', '2b829b39-ab5d-465e-8644-4e930ae124a3', '[]'),
(16, 'App\\Models\\Income', 3, 'income', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 16, '2022-04-26 23:10:06', '2022-04-26 23:10:06', 'public', '6e6cf98d-3853-47b3-8874-229bd7d5ce6c', '[]'),
(17, 'App\\Models\\Expense', 1, 'expenses', 'download', 'download.jpg', 'image/jpeg', 'public', 13734, '[]', '[]', '[]', 17, '2022-04-26 23:13:44', '2022-04-26 23:13:44', 'public', '4195cd8c-b72f-4fa7-af4f-2a4725a747e8', '[]'),
(18, 'App\\Models\\Expense', 2, 'expenses', 'download (1)', 'download-(1).jpg', 'image/jpeg', 'public', 4195, '[]', '[]', '[]', 18, '2022-04-26 23:14:55', '2022-04-26 23:14:55', 'public', '5c4d28aa-e560-4b73-9793-3597ad02e73a', '[]'),
(19, 'App\\Models\\Visitor', 0, 'visitors', 'images', 'Visitor-1651034962.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 19, '2022-04-26 23:19:22', '2022-04-26 23:19:22', 'public', '9af2cbde-4b19-4249-8963-133e02dd7708', '[]'),
(20, 'App\\Models\\Visitor', 3, 'visitors', 'images (2)', 'Visitor-1651035142.jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 20, '2022-04-26 23:22:22', '2022-04-26 23:22:22', 'public', '2741fd8a-ecd7-48de-9248-dfa5d916d4a9', '[]'),
(21, 'App\\Models\\Visitor', 4, 'visitors', 'images (2)', 'Visitor-1651035706.jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 21, '2022-04-26 23:31:46', '2022-04-26 23:31:46', 'public', '8530c171-9ec5-4079-829f-0d185a7b599d', '[]'),
(22, 'App\\Models\\Postal', 2, 'postal', 'images (3)', 'Receive-1651036033.jpg', 'image/jpeg', 'public', 6166, '[]', '[]', '[]', 22, '2022-04-26 23:37:13', '2022-04-26 23:37:13', 'public', '836e2e60-7b05-4881-8d0f-d562a4edaeaa', '[]'),
(23, 'App\\Models\\Postal', 1, 'postal', 'images (2)', 'Receive-1651036109.jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 23, '2022-04-26 23:38:29', '2022-04-26 23:38:29', 'public', '757743d3-f5ef-412e-a266-1dfdfda7070b', '[]'),
(24, 'App\\Models\\Postal', 3, 'postal', 'images', 'Dispatch-1651036185.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 24, '2022-04-26 23:39:45', '2022-04-26 23:39:45', 'public', '9a6a3626-93e9-4efa-9cbf-e2d8153c8d98', '[]'),
(25, 'App\\Models\\Postal', 4, 'postal', 'images (3)', 'Dispatch-1651036216.jpg', 'image/jpeg', 'public', 6166, '[]', '[]', '[]', 25, '2022-04-26 23:40:16', '2022-04-26 23:40:16', 'public', '29d9c715-32de-4a2d-b60b-bfd49993bc65', '[]'),
(26, 'App\\Models\\FrontSetting', 8, 'homepage-image', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 26, '2022-04-26 23:41:40', '2022-04-26 23:41:40', 'public', '30ba6d9c-acfc-41fb-8468-202a912fb8af', '[]'),
(27, 'App\\Models\\FrontSetting', 11, 'homepage-image', 'images', 'images.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 27, '2022-04-26 23:41:40', '2022-04-26 23:41:40', 'public', '89e7fb67-d3c1-462e-a1eb-84d3512ad9d5', '[]'),
(28, 'App\\Models\\FrontSetting', 4, 'front-settings', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 28, '2022-04-26 23:42:04', '2022-04-26 23:42:04', 'public', '83b888f8-4d1d-491b-81f1-371e9999d4c7', '[]'),
(29, 'App\\Models\\ItemStock', 2, 'item_stocks', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 29, '2022-04-27 00:04:24', '2022-04-27 00:04:24', 'public', 'bbd3ce12-cc03-4943-a52c-d14ef159bb8e', '[]'),
(30, 'App\\Models\\User', 25, 'profile_photo', 'images', 'images.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 30, '2022-04-27 00:18:05', '2022-04-27 00:18:05', 'public', 'e98dc878-f6c6-4bd5-a5b0-3c521d2d5006', '[]'),
(31, 'App\\Models\\User', 26, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 13734, '[]', '[]', '[]', 31, '2022-04-27 00:20:16', '2022-04-27 00:20:16', 'public', '58ca6221-e9c6-443b-b186-d5877b9d9d05', '[]'),
(32, 'App\\Models\\User', 27, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 13734, '[]', '[]', '[]', 32, '2022-04-27 00:30:41', '2022-04-27 00:30:41', 'public', '0cbb36f8-1129-4d96-980f-bd589575da1b', '[]'),
(33, 'App\\Models\\User', 28, 'profile_photo', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 33, '2022-04-27 00:36:11', '2022-04-27 00:36:11', 'public', 'efbf335e-4838-429e-9fb5-9397f968e468', '[]'),
(34, 'App\\Models\\User', 29, 'profile_photo', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 34, '2022-04-27 00:37:48', '2022-04-27 00:37:48', 'public', 'f00a2fb0-e312-467a-bb39-c14f26af5735', '[]'),
(35, 'App\\Models\\User', 30, 'profile_photo', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 35, '2022-04-27 00:41:10', '2022-04-27 00:41:10', 'public', '6b8b7b45-cf0d-4b1c-8127-d976604988e2', '[]'),
(36, 'App\\Models\\User', 31, 'profile_photo', 'images (3)', 'images-(3).jpg', 'image/jpeg', 'public', 6166, '[]', '[]', '[]', 36, '2022-04-27 00:47:53', '2022-04-27 00:47:53', 'public', 'b7709272-5f65-4696-ad12-9b23d3ab4954', '[]'),
(37, 'App\\Models\\User', 32, 'profile_photo', 'images', 'images.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 37, '2022-04-27 00:48:56', '2022-04-27 00:48:56', 'public', 'c395d3d1-725a-492f-be36-de6197ad7c58', '[]'),
(38, 'App\\Models\\User', 33, 'profile_photo', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 38, '2022-04-27 00:52:40', '2022-04-27 00:52:40', 'public', '65e9956f-6e65-429c-9883-b4b66b097e3e', '[]'),
(39, 'App\\Models\\User', 34, 'profile_photo', 'images (1)', 'images-(1).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 39, '2022-04-27 00:57:52', '2022-04-27 00:57:52', 'public', '6a48265a-f045-4375-8ace-21c28143a697', '[]'),
(40, 'App\\Models\\User', 35, 'profile_photo', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 40, '2022-04-27 00:59:15', '2022-04-27 00:59:15', 'public', '73a95c02-18e5-4f6b-a83d-6f938156eb5a', '[]'),
(41, 'App\\Models\\User', 36, 'profile_photo', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 41, '2022-04-27 01:01:47', '2022-04-27 01:01:47', 'public', '098da943-e5b4-43d9-8557-1d32b429d134', '[]'),
(42, 'App\\Models\\InvestigationReport', 1, 'reports', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 42, '2022-04-27 01:03:49', '2022-04-27 01:03:49', 'public', 'ad40b513-c54c-4cda-8e15-d53ba135dfc7', '[]'),
(43, 'App\\Models\\User', 38, 'profile_photo', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 43, '2022-04-27 23:11:13', '2022-04-27 23:11:13', 'public', 'c1c0628a-e74c-4bfc-96cc-9dc5c4997e81', '[]'),
(44, 'App\\Models\\User', 39, 'profile_photo', 'images (2)', 'images-(2).jpg', 'image/jpeg', 'public', 7128, '[]', '[]', '[]', 44, '2022-04-27 23:40:31', '2022-04-27 23:40:31', 'public', '3e5e2477-0137-4ab8-8b2f-1ada3569cc25', '[]'),
(45, 'App\\Models\\User', 40, 'profile_photo', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 45, '2022-04-27 23:54:44', '2022-04-27 23:54:44', 'public', '11d07db3-7708-4a9f-806a-ae076e158463', '[]'),
(46, 'App\\Models\\User', 41, 'profile_photo', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 46, '2022-04-28 00:21:11', '2022-04-28 00:21:11', 'public', '0e9be7ee-67ef-4d37-84fd-32acece82356', '[]'),
(47, 'App\\Models\\User', 42, 'profile_photo', 'images (1)', 'images-(1).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 47, '2022-04-28 00:47:14', '2022-04-28 00:47:14', 'public', 'b344f84a-41dc-44aa-b9de-a81069a62f7c', '[]'),
(48, 'App\\Models\\User', 46, 'profile_photo', 'images', 'images.jpg', 'image/jpeg', 'public', 9985, '[]', '[]', '[]', 48, '2022-04-28 03:50:10', '2022-04-28 03:50:10', 'public', 'e541d90f-6a1d-4f7a-85c0-3db5cb7b86ae', '[]'),
(49, 'App\\Models\\ItemStock', 3, 'item_stocks', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 49, '2022-04-28 04:22:24', '2022-04-28 04:22:24', 'public', 'e0bad32d-4faa-44f4-87a0-53f1f102618c', '[]'),
(50, 'App\\Models\\ItemStock', 4, 'item_stocks', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 50, '2022-04-28 04:28:50', '2022-04-28 04:28:50', 'public', 'd9fc2f5d-82ae-41d5-bd16-ced8b4aad327', '[]'),
(51, 'App\\Models\\User', 47, 'profile_photo', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 51, '2022-04-29 00:39:33', '2022-04-29 00:39:33', 'public', 'd6fc79ef-abf9-4faf-8eed-b586c29d36a7', '[]'),
(52, 'App\\Models\\User', 48, 'profile_photo', 'images (3)', 'images-(3).jpg', 'image/jpeg', 'public', 6166, '[]', '[]', '[]', 52, '2022-04-29 01:45:25', '2022-04-29 01:45:25', 'public', '3c013c39-d789-442c-86a2-6e89ad8be1bf', '[]'),
(53, 'App\\Models\\User', 50, 'profile_photo', 'images (4)', 'images-(4).jpg', 'image/jpeg', 'public', 5390, '[]', '[]', '[]', 53, '2022-04-29 23:56:26', '2022-04-29 23:56:26', 'public', 'ddfdb431-53ba-4de9-adfd-dc917280808f', '[]'),
(54, 'App\\Models\\FrontService', 5, 'front-services', 'ambulance', 'ambulance.png', 'image/png', 'public', 10350, '[]', '[]', '[]', 54, '2022-09-14 03:45:45', '2022-09-14 03:45:45', 'public', '897bd0ec-b70a-4ee9-9723-79929737d626', '[]'),
(55, 'App\\Models\\FrontService', 6, 'front-services', 'ambulance', 'ambulance.png', 'image/png', 'public', 10350, '[]', '[]', '[]', 55, '2022-09-14 03:46:13', '2022-09-14 03:46:13', 'public', '10b652f5-a216-47ef-89a1-91b7f897e11b', '[]'),
(56, 'App\\Models\\FrontService', 2, 'front-services', 'ambulance', 'ambulance.png', 'image/png', 'public', 10350, '[]', '[]', '[]', 56, '2022-09-14 03:46:32', '2022-09-14 03:46:32', 'public', 'e0d4d10d-40e4-4f46-8a0d-6e7ac9b98933', '[]'),
(57, 'App\\Models\\Testimonial', 2, 'testimonials', 'download', 'Testimonial-1663147254.jpg', 'image/jpeg', 'public', 2771, '[]', '[]', '[]', 57, '2022-09-14 03:50:54', '2022-09-14 03:50:54', 'public', '6c9a82f7-742d-4976-a13a-9981a17fafe1', '[]'),
(59, 'App\\Models\\FrontService', 11, 'front-services', 'dentist-tools-circle-icon-vector-25240687', 'dentist-tools-circle-icon-vector-25240687.jpg', 'image/jpeg', 'public', 97084, '[]', '[]', '[]', 59, '2022-09-14 04:56:17', '2022-09-14 04:56:17', 'public', 'ae85485c-6bcf-4a96-8d2e-d9e688248367', '[]'),
(60, 'App\\Models\\FrontService', 12, 'front-services', 'dentist-tools-circle-icon-vector-25240687', 'dentist-tools-circle-icon-vector-25240687.jpg', 'image/jpeg', 'public', 97084, '[]', '[]', '[]', 60, '2022-09-14 05:19:59', '2022-09-14 05:19:59', 'public', '369524b5-d522-4784-b3e7-51e2471d6487', '[]'),
(65, 'App\\Models\\FrontService', 18, 'front-services', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 63, '2022-09-14 06:46:14', '2022-09-14 06:46:14', 'public', '2dd883bc-bc27-4073-863c-ae2120601633', '[]'),
(69, 'App\\Models\\User', 78, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 64, '2022-09-28 00:00:55', '2022-09-28 00:00:55', 'public', '15ffe997-cfa0-4cb3-8e04-649de82c01e1', '[]'),
(70, 'App\\Models\\User', 79, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 65, '2022-09-28 01:50:29', '2022-09-28 01:50:29', 'public', 'df9b8db3-ae12-4ca8-94db-06261c13daae', '[]'),
(71, 'App\\Models\\User', 80, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 66, '2022-09-28 04:39:33', '2022-09-28 04:39:33', 'public', 'd97824d7-807b-4988-ba54-3830b93b8a0c', '[]'),
(72, 'App\\Models\\User', 81, 'profile_photo', 'cat.jpg', 'User-1667824011.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 67, '2022-11-07 06:56:52', '2022-11-07 06:56:52', 'public', '189c0567-43b9-4ab1-95ca-9403aca60222', '[]'),
(73, 'App\\Models\\User', 82, 'profile_photo', 'download', 'User-1667901932.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 68, '2022-11-08 04:35:34', '2022-11-08 04:35:34', 'public', '1ceacb2b-58c7-47a7-a1d8-2ea7c6b63df1', '[]'),
(74, 'App\\Models\\User', 83, 'profile_photo', 'download', 'User-1668144001.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 69, '2022-11-10 23:50:01', '2022-11-10 23:50:01', 'public', '3f2bc410-7236-4626-a356-616c8877cc2a', '[]'),
(75, 'App\\Models\\User', 84, 'profile_photo', 'download', 'User-1668677504.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 70, '2022-11-17 04:01:44', '2022-11-17 04:01:44', 'public', 'bce62bf0-1f59-45c4-8786-5529a648a0a6', '[]'),
(76, 'App\\Models\\User', 85, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 71, '2022-11-25 00:38:46', '2022-11-25 00:38:46', 'public', '462b5c30-8645-4573-b235-98462f569af7', '[]'),
(77, 'App\\Models\\User', 68, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 72, '2022-11-25 00:41:33', '2022-11-25 00:41:33', 'public', '3e3b5279-4c3d-44da-af6e-3f4dccd10b6b', '[]'),
(78, 'App\\Models\\User', 86, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 73, '2022-11-25 00:47:21', '2022-11-25 00:47:21', 'public', '8cf43dfe-7ac9-4e76-939a-32fb871497b8', '[]'),
(79, 'App\\Models\\User', 89, 'profile_photo', 'download', 'User-1669615639.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 74, '2022-11-28 00:37:30', '2022-11-28 00:37:30', 'public', 'a3a4d87d-c3e8-4779-a9e9-64ac002e2579', '[]'),
(80, 'App\\Models\\User', 91, 'profile_photo', 'download', 'User-1670059760.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 75, '2022-12-03 03:59:22', '2022-12-03 03:59:22', 'public', '961275bb-dcff-420e-afb9-2499c40c3581', '[]'),
(81, 'App\\Models\\User', 92, 'profile_photo', 'cat.jpg', 'User-1670066698.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 76, '2022-12-03 05:54:59', '2022-12-03 05:54:59', 'public', '73214479-7f12-4870-b2ff-78fdd931b26d', '[]'),
(82, 'App\\Models\\User', 93, 'profile_photo', 'cat.jpg', 'User-1670066923.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 77, '2022-12-03 05:58:43', '2022-12-03 05:58:43', 'public', 'bf48206f-4e5b-4486-a379-3f42d4e16658', '[]'),
(83, 'App\\Models\\User', 94, 'profile_photo', 'cat.jpg', 'User-1670224351.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 78, '2022-12-05 01:42:33', '2022-12-05 01:42:33', 'public', '80c0949d-41ee-4896-ba42-f8e5033776f5', '[]'),
(84, 'App\\Models\\User', 95, 'profile_photo', 'cat.jpg', 'User-1670226131.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 79, '2022-12-05 02:12:11', '2022-12-05 02:12:11', 'public', '2def4ceb-de58-470e-990f-19719a51459f', '[]'),
(85, 'App\\Models\\User', 96, 'profile_photo', 'cat.jpg', 'User-1670235224.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 80, '2022-12-05 04:43:44', '2022-12-05 04:43:44', 'public', '76f5b510-5a67-4892-bc2b-c0ae1cb60799', '[]'),
(86, 'App\\Models\\User', 97, 'profile_photo', 'cat.jpg', 'User-1670303068.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 81, '2022-12-05 23:34:29', '2022-12-05 23:34:29', 'public', '3cbfd734-8437-43ad-85df-6085a8b2fc91', '[]'),
(87, 'App\\Models\\User', 98, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 82, '2022-12-06 05:43:44', '2022-12-06 05:43:44', 'public', '7086f3c6-5d69-4398-9e86-ffa3d756974c', '[]'),
(88, 'App\\Models\\Document', 4, 'documents', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 83, '2022-12-07 03:07:26', '2022-12-07 03:07:26', 'public', 'ecd5d29a-44ae-4131-ab0e-f9f0733abcfd', '[]'),
(89, 'App\\Models\\User', 99, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 84, '2022-12-07 04:21:16', '2022-12-07 04:21:16', 'public', '6a858da8-244f-4c52-84ed-52e5fef9088b', '[]'),
(90, 'App\\Models\\User', 100, 'profile_photo', 'cat.jpg', 'User-1670409509.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 85, '2022-12-07 05:08:30', '2022-12-07 05:08:30', 'public', '4619db8b-6fb3-479d-a37b-a42114295e4f', '[]'),
(91, 'App\\Models\\User', 101, 'profile_photo', 'download', 'download.jpg', 'image/jpeg', 'public', 9415, '[]', '[]', '[]', 86, '2022-12-07 22:39:22', '2022-12-07 22:39:22', 'public', '1f883c58-4d01-4fc4-922e-c5dc7adc9685', '[]'),
(92, 'App\\Models\\User', 102, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 87, '2022-12-07 22:46:38', '2022-12-07 22:46:38', 'public', 'd82227e7-8f32-4182-99da-0c0c2ccf3c58', '[]'),
(93, 'App\\Models\\User', 103, 'profile_photo', 'cat.jpg', 'User-1670562943.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 88, '2022-12-08 23:45:44', '2022-12-08 23:45:44', 'public', '19f89dd7-0962-47e3-b6c3-03110ef697ad', '[]'),
(94, 'App\\Models\\User', 104, 'profile_photo', 'cat.jpg', 'User-1670565246.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 89, '2022-12-09 00:24:06', '2022-12-09 00:24:06', 'public', 'b2607394-0a29-4d38-95f5-a9a762107c4f', '[]'),
(95, 'App\\Models\\User', 106, 'profile_photo', 'cat.jpg', 'User-1670567129.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 90, '2022-12-09 00:55:29', '2022-12-09 00:55:29', 'public', '04ce0428-9119-4c4f-a9cf-ab9640be2d45', '[]'),
(96, 'App\\Models\\User', 107, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 91, '2022-12-12 05:05:45', '2022-12-12 05:05:45', 'public', 'a9df8159-835e-4982-b9e5-e029b1ef2d11', '[]'),
(97, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 92, '2023-01-25 00:45:10', '2023-01-25 00:45:10', 'public', '0ca6da28-53bc-42f4-919f-9a0484320d80', '[]'),
(98, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 93, '2023-01-25 00:48:27', '2023-01-25 00:48:27', 'public', 'e36e2c8d-0130-4d93-8135-fad68c981764', '[]'),
(99, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 94, '2023-01-25 00:52:12', '2023-01-25 00:52:12', 'public', 'e021ff23-739d-4de1-a222-dc5615c38ffa', '[]'),
(100, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 95, '2023-01-25 01:06:56', '2023-01-25 01:06:56', 'public', '6e49fe6d-5839-45ab-b8c0-df524f1d3f95', '[]'),
(101, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 96, '2023-01-25 01:08:55', '2023-01-25 01:08:55', 'public', 'bcb2fb5b-e381-424f-aebf-181bb2fcfe3f', '[]'),
(102, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 97, '2023-01-25 01:11:31', '2023-01-25 01:11:31', 'public', '73c400cb-e7f4-481f-bae8-4c4151d50ad8', '[]'),
(103, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 98, '2023-01-25 01:16:03', '2023-01-25 01:16:03', 'public', '5c98bd9e-8049-4b38-a856-19035c15ab06', '[]'),
(104, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 99, '2023-01-25 01:20:04', '2023-01-25 01:20:04', 'public', 'bc7c1425-151f-48b3-ba58-f41e7e3a0ed2', '[]'),
(105, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 100, '2023-01-26 23:51:46', '2023-01-26 23:51:46', 'public', '96e8172c-76c3-4883-85bb-6e8b14a6b961', '[]'),
(106, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'User-1674819362.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 101, '2023-01-27 06:06:02', '2023-01-27 06:06:02', 'public', '2b0af8c9-e2bc-4b1c-8494-5f8328792c4f', '[]'),
(107, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'User-1674822105.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 102, '2023-01-27 06:51:46', '2023-01-27 06:51:46', 'public', 'f0dcc75c-d26a-48a1-9fff-60a52762202f', '[]'),
(108, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 103, '2023-02-08 04:05:55', '2023-02-08 04:05:55', 'public', '0cc9f3f9-a650-448e-a430-ef2525f22c4d', '[]'),
(109, 'App\\Models\\User', 0, 'profile_photo', 'cat.jpg', 'cat.jpg.jpg', 'image/jpeg', 'public', 41643, '[]', '[]', '[]', 104, '2023-02-08 04:08:11', '2023-02-08 04:08:11', 'public', '6b006b1b-20bb-40e4-82d8-f3b45d7bd885', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `selling_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `salt_composition` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `side_effects` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `category_id`, `brand_id`, `name`, `selling_price`, `buying_price`, `salt_composition`, `description`, `side_effects`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'dolo255', 23456, 234, 'fgh', 'sdfg sdf sfdg', 'sdfg wedfgr erg', '2022-04-27 00:27:41', '2022-04-27 00:27:41'),
(2, 2, 2, 'paracit', 3456, 23456, 'fgh', 'adsd dsfg fdg', 'edgf asdf sdf', '2022-04-27 00:29:06', '2022-04-27 00:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_03_000001_create_customer_columns', 1),
(4, '2019_05_03_000002_create_subscriptions_table', 1),
(5, '2019_05_03_000003_create_subscription_items_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_02_06_031618_create_categories_table', 1),
(8, '2020_02_12_053840_create_doctor_departments_table', 1),
(9, '2020_02_12_053932_create_departments_table', 1),
(10, '2020_02_13_042835_create_brands_table', 1),
(11, '2020_02_13_053840_create_doctors_table', 1),
(12, '2020_02_13_054103_create_patients_table', 1),
(13, '2020_02_13_094724_create_bills_table', 1),
(14, '2020_02_13_095024_create_medicines_table', 1),
(15, '2020_02_13_095125_create_bill_items_table', 1),
(16, '2020_02_13_111857_create_nurses_table', 1),
(17, '2020_02_13_125601_create_addresses_table', 1),
(18, '2020_02_13_141104_create_media_table', 1),
(19, '2020_02_14_051650_create_lab_technicians_table', 1),
(20, '2020_02_14_055353_create_appointments_table', 1),
(21, '2020_02_14_091441_create_receptionists_table', 1),
(22, '2020_02_14_093246_create_pharmacists_table', 1),
(23, '2020_02_17_053450_create_accountants_table', 1),
(24, '2020_02_17_080856_create_bed_types_table', 1),
(25, '2020_02_17_092326_create_blood_banks_table', 1),
(26, '2020_02_17_105627_create_beds_table', 1),
(27, '2020_02_17_110620_create_blood_donors_table', 1),
(28, '2020_02_17_135716_create_permission_tables', 1),
(29, '2020_02_18_042327_create_notice_boards_table', 1),
(30, '2020_02_18_042442_create_document_types_table', 1),
(31, '2020_02_18_060222_create_patient_cases_table', 1),
(32, '2020_02_18_060223_create_operation_reports_table', 1),
(33, '2020_02_18_064953_create_bed_assigns_table', 1),
(34, '2020_02_18_092202_create_documents_table', 1),
(35, '2020_02_18_094758_create_birth_reports_table', 1),
(36, '2020_02_18_111020_create_death_reports_table', 1),
(37, '2020_02_19_080336_create_employee_payrolls_table', 1),
(38, '2020_02_19_134502_create_settings_table', 1),
(39, '2020_02_21_090236_create_investigation_reports_table', 1),
(40, '2020_02_21_095439_create_accounts_table', 1),
(41, '2020_02_22_070658_create_payments_table', 1),
(42, '2020_02_22_090112_create_insurances_table', 1),
(43, '2020_02_22_091537_create_insurance_disease_table', 1),
(44, '2020_02_24_055136_create_invoices_table', 1),
(45, '2020_02_24_055518_create_schedules_table', 1),
(46, '2020_02_24_055702_create_invoice_items_table', 1),
(47, '2020_02_25_105042_create_services_table', 1),
(48, '2020_02_25_131030_create_packages_table', 1),
(49, '2020_02_25_131108_create_package_services_table', 1),
(50, '2020_02_27_120948_create_patient_admissions_table', 1),
(51, '2020_02_28_031410_create_case_handlers_table', 1),
(52, '2020_03_02_043813_create_advanced_payments_table', 1),
(53, '2020_03_02_065845_add_patient_admission_id_to_bills', 1),
(54, '2020_03_03_062243_add_patient_id_to_bills', 1),
(55, '2020_03_03_113334_create_schedule_day_table', 1),
(56, '2020_03_26_052336_create_ambulances_table', 1),
(57, '2020_03_26_081157_create_mails_table', 1),
(58, '2020_03_27_061641_create_enquiries_table', 1),
(59, '2020_03_27_063148_create_ambulance_calls_table', 1),
(60, '2020_03_31_122219_create_prescriptions_table', 1),
(61, '2020_04_11_052629_create_charge_categories_table', 1),
(62, '2020_04_11_053929_create_pathology_categories_table', 1),
(63, '2020_04_11_070859_create_radiology_categories_table', 1),
(64, '2020_04_11_090903_create_charges_table', 1),
(65, '2020_04_13_050643_create_radiology_tests_table', 1),
(66, '2020_04_14_093339_create_pathology_tests_table', 1),
(67, '2020_04_24_111205_create_doctor_opd_charge_table', 1),
(68, '2020_04_28_094118_create_expenses_table', 1),
(69, '2020_05_01_055137_create_incomes_table', 1),
(70, '2020_05_11_083050_add_notes_documents_table', 1),
(71, '2020_05_12_075825_create_sms_table', 1),
(72, '2020_06_22_071531_add_index_to_accounts_table', 1),
(73, '2020_06_22_071943_add_index_to_doctor_opd_charges_table', 1),
(74, '2020_06_22_072921_add_index_to_bed_assigns_table', 1),
(75, '2020_06_22_073042_add_index_to_medicines_table', 1),
(76, '2020_06_22_073457_add_index_to_employee_payrolls_table', 1),
(77, '2020_06_22_074937_add_index_to_notice_boards_table', 1),
(78, '2020_06_22_075222_add_index_to_blood_donors_table', 1),
(79, '2020_06_22_075359_add_index_to_packages_table', 1),
(80, '2020_06_22_075506_add_index_to_bed_types_table', 1),
(81, '2020_06_22_075725_add_index_to_services_table', 1),
(82, '2020_06_22_080944_add_index_to_invoices_table', 1),
(83, '2020_06_22_081601_add_index_to_payments_table', 1),
(84, '2020_06_22_081802_add_index_to_advanced_payments_table', 1),
(85, '2020_06_22_081909_add_index_to_bills_table', 1),
(86, '2020_06_22_082548_add_index_to_beds_table', 1),
(87, '2020_06_22_082942_add_index_to_blood_banks_table', 1),
(88, '2020_06_22_083511_add_index_to_users_table', 1),
(89, '2020_06_22_084750_add_index_to_patient_cases_table', 1),
(90, '2020_06_22_084912_add_index_to_patient_admissions_table', 1),
(91, '2020_06_22_085036_add_index_to_document_types_table', 1),
(92, '2020_06_22_085128_add_index_to_insurances_table', 1),
(93, '2020_06_22_085317_add_index_to_ambulances_table', 1),
(94, '2020_06_22_090509_add_index_to_ambulance_calls_table', 1),
(95, '2020_06_22_091253_add_index_to_doctor_departments_table', 1),
(96, '2020_06_22_091455_add_index_to_appointments_table', 1),
(97, '2020_06_22_091617_add_index_to_birth_reports_table', 1),
(98, '2020_06_22_091632_add_index_to_death_reports_table', 1),
(99, '2020_06_22_091651_add_index_to_investigation_reports_table', 1),
(100, '2020_06_22_091828_add_index_to_operation_reports_table', 1),
(101, '2020_06_22_092018_add_index_to_categories_table', 1),
(102, '2020_06_22_092149_add_index_to_brands_table', 1),
(103, '2020_06_22_092324_add_index_to_pathology_tests_table', 1),
(104, '2020_06_22_092338_add_index_to_pathology_categories_table', 1),
(105, '2020_06_22_092347_add_index_to_radiology_tests_table', 1),
(106, '2020_06_22_092357_add_index_to_radiology_categories_table', 1),
(107, '2020_06_22_092651_add_index_to_expenses_table', 1),
(108, '2020_06_22_092702_add_index_to_incomes_table', 1),
(109, '2020_06_22_092855_add_index_to_charges_table', 1),
(110, '2020_06_22_092905_add_index_to_charge_categories_table', 1),
(111, '2020_06_22_093234_add_index_to_enquiries_table', 1),
(112, '2020_06_24_044648_create_diagnosis_categories_table', 1),
(113, '2020_06_25_080242_create_patient_diagnosis_tests_table', 1),
(114, '2020_06_26_054352_create_patient_diagnosis_properties_table', 1),
(115, '2020_07_15_044653_remove_serial_visibility_from_schedules_table', 1),
(116, '2020_07_15_121336_change_ambulances_table_column', 1),
(117, '2020_07_22_052934_change_bed_assigns_table_column', 1),
(118, '2020_07_29_095430_change_invoice_items_table_column', 1),
(119, '2020_08_26_081235_create_item_categories_table', 1),
(120, '2020_08_26_101134_create_items_table', 1),
(121, '2020_08_26_125032_create_item_stocks_table', 1),
(122, '2020_08_27_141547_create_issued_items_table', 1),
(123, '2020_09_08_064222_create_ipd_patient_departments_table', 1),
(124, '2020_09_08_114627_create_ipd_diagnoses_table', 1),
(125, '2020_09_09_065624_create_ipd_consultant_registers_table', 1),
(126, '2020_09_09_135505_create_ipd_charges_table', 1),
(127, '2020_09_10_112306_create_ipd_prescriptions_table', 1),
(128, '2020_09_10_114203_create_ipd_prescription_items_table', 1),
(129, '2020_09_11_045308_create_modules_table', 1),
(130, '2020_09_12_050715_create_ipd_payments_table', 1),
(131, '2020_09_12_071821_create_ipd_timelines_table', 1),
(132, '2020_09_12_103003_create_ipd_bills_table', 1),
(133, '2020_09_14_083759_create_opd_patient_departments_table', 1),
(134, '2020_09_14_144731_add_ipd_patient_department_id_to_bed_assigns_table', 1),
(135, '2020_09_15_064044_create_transactions_table', 1),
(136, '2020_09_16_103204_create_opd_diagnoses_table', 1),
(137, '2020_09_16_114031_create_opd_timelines_table', 1),
(138, '2020_09_23_045100_change_patient_diagnosis_properties_table', 1),
(139, '2020_09_24_053229_add_ipd_bill_column_in_ipd_patient_departments_table', 1),
(140, '2020_10_09_085838_create_call_logs_table', 1),
(141, '2020_10_12_125133_create_visitors_table', 1),
(142, '2020_10_14_044134_create_postals_table', 1),
(143, '2020_10_30_043500_add_route_in_modules_table', 1),
(144, '2020_10_31_062448_add_complete_in_appointments_table', 1),
(145, '2020_11_02_050736_create_testimonials_table', 1),
(146, '2020_11_07_121633_add_region_code_in_sms_table', 1),
(147, '2020_11_19_093810_create_blood_donations_table', 1),
(148, '2020_11_20_113830_create_blood_issues_table', 1),
(149, '2020_11_24_131253_create_notifications_table', 1),
(150, '2020_12_28_131351_create_live_consultations_table', 1),
(151, '2020_12_31_062506_create_live_meetings_table', 1),
(152, '2020_12_31_091242_create_live_meetings_candidates_table', 1),
(153, '2021_01_05_100425_create_user_zoom_credential_table', 1),
(154, '2021_01_06_105407_add_metting_id_to_live_meetings_table', 1),
(155, '2021_02_23_065200_create_vaccinations_table', 1),
(156, '2021_02_23_065252_create_vaccinated_patients_table', 1),
(157, '2021_04_05_085646_create_front_settings_table', 1),
(158, '2021_05_10_000000_add_uuid_to_failed_jobs_table', 1),
(159, '2021_05_29_103036_add_conversions_disk_column_in_media_table', 1),
(160, '2021_06_07_104022_change_patient_foreign_key_type_in_appointments_table', 1),
(161, '2021_06_08_073918_change_department_foreign_key_in_appointments_table', 1),
(162, '2021_06_21_082754_update_amount_datatype_in_bills_table', 1),
(163, '2021_06_21_082845_update_amount_datatype_in_bill_items_table', 1),
(164, '2021_11_11_061443_create_front_services_table', 1),
(165, '2021_11_12_100750_create_hospital_schedules_table', 1),
(166, '2021_11_12_105805_add_social_details_in_users_table', 1),
(167, '2022_02_18_101938_add_darkmode_to_users_table', 1),
(168, '2022_09_30_101108_create_contacts_table', 2),
(169, '2022_10_03_092502_create_hospitalinvoice_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 81),
(1, 'App\\Models\\User', 82),
(3, 'App\\Models\\User', 0),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 39),
(3, 'App\\Models\\User', 40),
(3, 'App\\Models\\User', 41),
(3, 'App\\Models\\User', 42),
(3, 'App\\Models\\User', 43),
(3, 'App\\Models\\User', 44),
(3, 'App\\Models\\User', 46),
(3, 'App\\Models\\User', 47),
(3, 'App\\Models\\User', 49),
(3, 'App\\Models\\User', 58),
(3, 'App\\Models\\User', 59),
(3, 'App\\Models\\User', 60),
(3, 'App\\Models\\User', 61),
(3, 'App\\Models\\User', 62),
(3, 'App\\Models\\User', 63),
(3, 'App\\Models\\User', 64),
(3, 'App\\Models\\User', 65),
(3, 'App\\Models\\User', 66),
(3, 'App\\Models\\User', 67),
(3, 'App\\Models\\User', 68),
(3, 'App\\Models\\User', 71),
(3, 'App\\Models\\User', 74),
(3, 'App\\Models\\User', 75),
(3, 'App\\Models\\User', 76),
(3, 'App\\Models\\User', 85),
(3, 'App\\Models\\User', 86),
(3, 'App\\Models\\User', 87),
(3, 'App\\Models\\User', 88),
(3, 'App\\Models\\User', 101),
(3, 'App\\Models\\User', 102),
(3, 'App\\Models\\User', 104),
(3, 'App\\Models\\User', 107),
(4, 'App\\Models\\User', 27),
(4, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 72),
(4, 'App\\Models\\User', 80),
(4, 'App\\Models\\User', 100),
(4, 'App\\Models\\User', 106),
(5, 'App\\Models\\User', 34),
(5, 'App\\Models\\User', 36),
(5, 'App\\Models\\User', 99),
(6, 'App\\Models\\User', 31),
(6, 'App\\Models\\User', 33),
(6, 'App\\Models\\User', 83),
(7, 'App\\Models\\User', 14),
(7, 'App\\Models\\User', 15),
(7, 'App\\Models\\User', 24),
(7, 'App\\Models\\User', 50),
(7, 'App\\Models\\User', 69),
(7, 'App\\Models\\User', 84),
(7, 'App\\Models\\User', 89),
(7, 'App\\Models\\User', 90),
(7, 'App\\Models\\User', 91),
(7, 'App\\Models\\User', 93),
(8, 'App\\Models\\User', 30),
(8, 'App\\Models\\User', 38),
(8, 'App\\Models\\User', 73),
(8, 'App\\Models\\User', 94),
(8, 'App\\Models\\User', 95),
(8, 'App\\Models\\User', 96),
(8, 'App\\Models\\User', 97),
(9, 'App\\Models\\User', 25),
(9, 'App\\Models\\User', 26),
(10, 'AppModelsUser', 27),
(4, 'App\\Models\\User', 0),
(2, 'App\\Models\\User', 0),
(1, 'App\\Models\\User', 0),
(7, 'App\\Models\\User', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `route` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `is_active`, `route`, `created_at`, `updated_at`) VALUES
(1, 'Patients', 1, 'patients.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(2, 'Doctors', 1, 'doctors.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(3, 'Accountants', 1, 'accountants.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(4, 'Medicines', 0, 'medicines.index', '2022-03-02 01:48:41', '2022-11-18 06:22:09'),
(5, 'Nurses', 1, 'nurses.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(6, 'Receptionists', 1, 'receptionists.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(7, 'Lab Technicians', 1, 'lab-technicians.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(8, 'Pharmacists', 1, 'pharmacists.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(9, 'Birth Reports', 1, 'birth-reports.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(10, 'Death Reports', 1, 'death-reports.index', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(11, 'Investigation Reports', 1, 'investigation-reports.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(12, 'Operation Reports', 1, 'operation-reports.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(13, 'Income', 1, 'incomes.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(14, 'Expense', 1, 'expenses.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(15, 'SMS', 1, 'sms.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(16, 'IPD Patients', 1, 'ipd.patient.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(17, 'OPD Patients', 1, 'opd.patient.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(18, 'Accounts', 0, 'accounts.index', '2022-03-02 01:48:42', '2022-11-21 06:25:19'),
(19, 'Employee Payrolls', 0, 'employee-payrolls.index', '2022-03-02 01:48:42', '2022-11-21 06:25:37'),
(20, 'Invoices', 1, 'invoices.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(21, 'Payments', 1, 'payments.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(22, 'Payment Reports', 1, 'payment.reports', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(23, 'Advance Payments', 1, 'advanced-payments.index', '2022-03-02 01:48:42', '2022-11-11 22:49:27'),
(24, 'Bills', 1, 'bills.index', '2022-03-02 01:48:42', '2022-11-11 22:13:09'),
(25, 'Bed Types', 1, 'bed-types.index', '2022-03-02 01:48:42', '2022-10-27 05:56:24'),
(26, 'Beds', 1, 'beds.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(27, 'Bed Assigns', 1, 'bed-assigns.index', '2022-03-02 01:48:42', '2022-11-25 23:23:47'),
(28, 'Blood Banks', 1, 'blood-banks.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(29, 'Blood Donors', 1, 'blood-donors.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(30, 'Documents', 1, 'documents.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(31, 'Document Types', 1, 'document-types.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(32, 'Services', 1, 'services.index', '2022-03-02 01:48:42', '2022-11-21 06:43:28'),
(33, 'Insurances', 1, 'insurances.index', '2022-03-02 01:48:42', '2022-11-21 06:42:12'),
(34, 'Packages', 1, 'packages.index', '2022-03-02 01:48:42', '2022-11-21 06:43:05'),
(35, 'Ambulances', 1, 'ambulances.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(36, 'Ambulances Calls', 1, 'ambulance-calls.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(37, 'Appointments', 1, 'appointments.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(38, 'Call Logs', 1, 'call_logs.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(39, 'Visitors', 1, 'visitors.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(40, 'Postal Receive', 1, 'receives.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(41, 'Postal Dispatch', 1, 'dispatches.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(42, 'Notice Boards', 1, 'noticeboard', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(43, 'Mail', 1, 'mail', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(44, 'Enquires', 1, 'enquiries', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(45, 'Charge Categories', 1, 'charge-categories.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(46, 'Charges', 1, 'charges.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(47, 'Doctor OPD Charges', 1, 'doctor-opd-charges.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(48, 'Items Categories', 1, 'item-categories.index', '2022-03-02 01:48:42', '2022-11-18 09:23:17'),
(49, 'Items', 1, 'items.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(50, 'Item Stocks', 1, 'item.stock.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(51, 'Issued Items', 1, 'issued.item.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(52, 'Diagnosis Categories', 1, 'diagnosis.category.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(53, 'Diagnosis Tests', 1, 'patient.diagnosis.test.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(54, 'Pathology Categories', 1, 'pathology.category.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(55, 'Pathology Tests', 1, 'pathology.test.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(56, 'Radiology Categories', 1, 'radiology.category.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(57, 'Radiology Tests', 1, 'radiology.test.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(58, 'Medicine Categories', 1, 'categories.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(59, 'Medicine Brands', 1, 'brands.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(60, 'Doctor Departments', 1, 'doctor-departments.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(61, 'Schedules', 1, 'schedules.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(62, 'Prescriptions', 1, 'prescriptions.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(63, 'Cases', 0, 'patient-cases.index', '2022-03-02 01:48:42', '2022-11-18 09:12:58'),
(64, 'Case Handlers', 0, 'case-handlers.index', '2022-03-02 01:48:42', '2022-11-18 09:12:56'),
(65, 'Patient Admissions', 1, 'patient-admissions.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(66, 'My Payrolls', 1, 'payroll', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(67, 'Patient Cases', 1, 'patients.cases', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(68, 'Testimonial', 1, 'testimonials.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(69, 'Blood Donations', 1, 'blood-donations.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(70, 'Blood Issues', 1, 'blood-issues.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(71, 'Live Consultations', 1, 'live.consultation.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(72, 'Live Meetings', 1, 'live.meeting.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(73, 'Vaccinations', 1, 'vaccinations.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(74, 'Vaccinated Patients', 1, 'vaccinated-patients.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(75, 'Products', 1, 'product', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(76, 'Category', 1, 'category.index', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(77, 'Subcategory', 1, 'subcategory', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(79, 'Leave', 1, 'leave', NULL, NULL),
(80, 'Allow Leave', 1, 'allow_leave', NULL, NULL),
(81, 'Vendor Po', 1, 'newvendorpo', NULL, NULL),
(82, 'Product Po', 1, 'productpo_new', NULL, NULL),
(83, 'New Product Po', 1, 'newproduct', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newdoctoranalysis`
--

CREATE TABLE `newdoctoranalysis` (
  `id` int(11) NOT NULL,
  `privious_date` varchar(191) DEFAULT NULL,
  `patient_name` varchar(50) NOT NULL,
  `date_doctoranalysis` text NOT NULL,
  `patient_category` varchar(50) NOT NULL,
  `investigation_for` varchar(50) NOT NULL,
  `investigation` varchar(50) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `no_of_days` varchar(50) NOT NULL,
  `dose` varchar(50) NOT NULL,
  `surgery_category` varchar(50) NOT NULL,
  `products` varchar(50) NOT NULL,
  `injection` varchar(50) NOT NULL,
  `packege_price` varchar(50) NOT NULL,
  `doctor_advice` varchar(50) NOT NULL,
  `clinical_remark` varchar(50) NOT NULL,
  `no_of_followup_days` varchar(50) DEFAULT NULL,
  `followup_date` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `upload_document` varchar(191) NOT NULL,
  `created_by` varchar(191) DEFAULT NULL,
  `timing` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newdoctoranalysis`
--

INSERT INTO `newdoctoranalysis` (`id`, `privious_date`, `patient_name`, `date_doctoranalysis`, `patient_category`, `investigation_for`, `investigation`, `diagnosis`, `medicine`, `quantity`, `no_of_days`, `dose`, `surgery_category`, `products`, `injection`, `packege_price`, `doctor_advice`, `clinical_remark`, `no_of_followup_days`, `followup_date`, `created_at`, `updated_at`, `patient_id`, `upload_document`, `created_by`, `timing`) VALUES
(29, '09-12-2022', 'gunja', '10-12-2022', '1', '2', '2', 'yes', '3,4', '2,3', '2,3', '2,3', '1,1', '7,8', '2,3', '200,300', 'ddd', 'eee', '2', '12-12-2022', '2022-12-09 23:53:37', '2022-12-09 23:53:37', 13, 'cat.jpg.jpg', NULL, NULL),
(30, '09-12-2022', 'nita', '10-12-2022', '1,4,2,3', '2,19', '2,3', 'yes-lll', '3,4', '2,3', '34,45', '235,234', '1,2', '7,5', '8,6', '12000000,230000', 'yess', 'vi', '3', '13-12-2022', '2022-12-10 00:28:25', '2022-12-10 00:49:46', 17, '', NULL, NULL),
(31, '', 'kishori', '10-12-2022', '1', '2', '2', 'trdd', '4', '3', '3', '3', '1', '7', '5', '222', 'tr', 'rt', '9', '19-12-2022', '2022-12-10 01:00:38', '2022-12-10 01:00:38', 18, 'cat.jpg.jpg', NULL, NULL),
(0, NULL, 'chaitali', '31-12-2022', '1', '257', 'Select Product', 'ghjkl', '4', '8', '9', '9', '292', 'Select Product', '3', '12', 'dfghj', 'ghjkl;', '6', '6-1-2023', '2022-12-31 00:37:25', '2022-12-31 00:37:25', 29, 'cat.jpg.jpg', '1', '06:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `new_product_po`
--

CREATE TABLE `new_product_po` (
  `product_po_id` int(12) NOT NULL,
  `po_no` varchar(100) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `po_date` varchar(200) NOT NULL,
  `category` varchar(70) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `products` varchar(100) NOT NULL,
  `product_id` varchar(12) NOT NULL,
  `mrp` varchar(13) NOT NULL,
  `hsn` varchar(12) NOT NULL,
  `size` varchar(14) NOT NULL,
  `current_qty` varchar(15) NOT NULL,
  `minimum_qty` varchar(16) NOT NULL,
  `maximum_qty` varchar(15) NOT NULL,
  `po_qty` varchar(14) NOT NULL,
  `cost` varchar(12) NOT NULL,
  `expected_sale` varchar(12) NOT NULL,
  `last_30_days` varchar(14) NOT NULL,
  `last_90_days` varchar(15) NOT NULL,
  `coating` varchar(15) NOT NULL,
  `vision` varchar(14) NOT NULL,
  `diameter` varchar(14) NOT NULL,
  `fitting_height` varchar(15) NOT NULL,
  `frame_a` varchar(16) NOT NULL,
  `frame_b` varchar(15) NOT NULL,
  `frame_dbl` varchar(14) NOT NULL,
  `price_range` int(15) NOT NULL,
  `make` varchar(15) NOT NULL,
  `material` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `shape` varchar(15) NOT NULL,
  `color` varchar(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model_no` varchar(20) NOT NULL,
  `total_cost` varchar(20) NOT NULL,
  `lens_name` varchar(20) NOT NULL,
  `lens_id` varchar(20) NOT NULL,
  `lens_point` varchar(20) NOT NULL,
  `kr_k1` varchar(20) NOT NULL,
  `kr_k2` varchar(20) NOT NULL,
  `diaopter` varchar(20) NOT NULL,
  `constant` varchar(20) NOT NULL,
  `iol_power` varchar(20) NOT NULL,
  `cyl_value` varchar(20) NOT NULL,
  `supply_date` varchar(20) NOT NULL,
  `cost_price` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_product_po`
--

INSERT INTO `new_product_po` (`product_po_id`, `po_no`, `vendor`, `po_date`, `category`, `subcategory`, `products`, `product_id`, `mrp`, `hsn`, `size`, `current_qty`, `minimum_qty`, `maximum_qty`, `po_qty`, `cost`, `expected_sale`, `last_30_days`, `last_90_days`, `coating`, `vision`, `diameter`, `fitting_height`, `frame_a`, `frame_b`, `frame_dbl`, `price_range`, `make`, `material`, `gender`, `shape`, `color`, `brand`, `model_no`, `total_cost`, `lens_name`, `lens_id`, `lens_point`, `kr_k1`, `kr_k2`, `diaopter`, `constant`, `iol_power`, `cyl_value`, `supply_date`, `cost_price`, `created_at`, `updated_at`, `status`) VALUES
(77, 'NEWP_PO_077', '11', '11-11-2022', '12', '267', 'piouu', '', '566', '786', '', '', '', '', '6', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '3396', '', '', '', '', '', '', '', '', '', '', '', '2022-11-11 13:57:38', '2022-11-11 07:46:06', 'Approve'),
(78, 'NEWP_PO_078', '11', '11-11-2022', '12', '271', 'pro', '', '7', '89', '', '', '', '', '8', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '56', '', '', '', '', '', '', '', '', '', '', '', '2022-11-11 13:58:10', '2022-11-11 07:46:35', 'Deny'),
(79, 'NEWP_PO_079', '11', '11-11-2022', '12', '267', 'product one,product two', '', '2367,234565', '3456,4354', '', '', '', '', '3,2', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '7101,469130', '', '', '', '', '', '', '', '', '', '', '', '2022-11-11 08:21:59', '2022-11-11 08:21:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice_boards`
--

CREATE TABLE `notice_boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_boards`
--

INSERT INTO `notice_boards` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'xaray machine', 'kjj khjhgk kjkgh kgjkjkj', '2022-04-25 23:04:21', '2022-04-25 23:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `notification_for` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `text` text DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notification_for`, `user_id`, `title`, `text`, `meta`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 0, 'New notice board added.', NULL, NULL, NULL, '2022-04-25 23:04:22', '2022-04-25 23:04:22'),
(2, 6, 4, 13, 'Gunja Gupta your prescription has been created.', NULL, NULL, NULL, '2022-04-26 03:30:04', '2022-04-26 03:30:04'),
(3, 6, 4, 13, 'Gunja Gupta your prescription has been created.', NULL, NULL, NULL, '2022-04-26 04:57:12', '2022-04-26 04:57:12'),
(4, 6, 4, 21, 'Ishu Sohani your prescription has been created.', NULL, NULL, NULL, '2022-04-26 05:29:22', '2022-04-26 05:29:22'),
(5, 6, 4, 13, 'Gunja Gupta your prescription has been created.', NULL, NULL, NULL, '2022-04-26 05:33:06', '2022-04-26 05:33:06'),
(6, 6, 4, 23, 'Avu Sohani your prescription has been created.', NULL, NULL, NULL, '2022-04-26 05:35:15', '2022-04-26 05:35:15'),
(7, 6, 4, 21, 'Ishu Sohani your prescription has been created.', NULL, NULL, NULL, '2022-04-26 05:36:24', '2022-04-26 05:36:24'),
(8, 2, 4, 23, 'Avu Sohani your invoice has been Paid', NULL, NULL, NULL, '2022-04-26 05:41:49', '2022-04-26 05:41:49'),
(9, 2, 8, 15, 'Avu Sohani invoice has been Paid', NULL, NULL, NULL, '2022-04-26 05:41:49', '2022-04-26 05:41:49'),
(10, 2, 8, 24, 'Avu Sohani invoice has been Paid', NULL, NULL, NULL, '2022-04-26 05:41:49', '2022-04-26 05:41:49'),
(11, 11, 4, 21, 'Ishu Sohani your advance payment receive successfully.', NULL, NULL, NULL, '2022-04-26 05:42:57', '2022-04-26 05:42:57'),
(12, 19, 8, 15, 'Hospital Charges income added.', NULL, NULL, NULL, '2022-04-26 23:10:07', '2022-04-26 23:10:07'),
(13, 19, 8, 24, 'Hospital Charges income added.', NULL, NULL, NULL, '2022-04-26 23:10:07', '2022-04-26 23:10:07'),
(14, 20, 8, 15, 'Electricity Bill expense added.', NULL, NULL, NULL, '2022-04-26 23:13:44', '2022-04-26 23:13:44'),
(15, 20, 8, 24, 'Electricity Bill expense added.', NULL, NULL, NULL, '2022-04-26 23:13:45', '2022-04-26 23:13:45'),
(16, 20, 8, 15, 'Equipments expense added.', NULL, NULL, NULL, '2022-04-26 23:14:56', '2022-04-26 23:14:56'),
(17, 20, 8, 24, 'Equipments expense added.', NULL, NULL, NULL, '2022-04-26 23:14:56', '2022-04-26 23:14:56'),
(18, 13, 2, 11, 'Chaitali Salaskar case has been created.', NULL, NULL, NULL, '2022-04-27 00:39:44', '2022-04-27 00:39:44'),
(19, 13, 4, 29, 'Chaitali Salaskar your case has been created.', NULL, NULL, NULL, '2022-04-27 00:39:45', '2022-04-27 00:39:45'),
(20, 18, 8, 15, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:14:59', '2022-04-27 01:14:59'),
(21, 18, 8, 24, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:14:59', '2022-04-27 01:14:59'),
(22, 18, 3, 34, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:14:59', '2022-04-27 01:14:59'),
(23, 18, 3, 36, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:14:59', '2022-04-27 01:14:59'),
(24, 18, 8, 15, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:16:27', '2022-04-27 01:16:27'),
(25, 18, 8, 24, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:16:27', '2022-04-27 01:16:27'),
(26, 18, 3, 34, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:16:27', '2022-04-27 01:16:27'),
(27, 18, 3, 36, 'New service has been added.', NULL, NULL, NULL, '2022-04-27 01:16:27', '2022-04-27 01:16:27'),
(28, 17, 6, 30, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:18:34', '2022-04-27 01:18:34'),
(29, 17, 3, 34, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:18:34', '2022-04-27 01:18:34'),
(30, 17, 3, 36, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:18:34', '2022-04-27 01:18:34'),
(31, 17, 6, 30, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:19:33', '2022-04-27 01:19:33'),
(32, 17, 3, 34, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:19:33', '2022-04-27 01:19:33'),
(33, 17, 3, 36, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:19:33', '2022-04-27 01:19:33'),
(34, 17, 6, 30, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:51:11', '2022-04-27 01:51:11'),
(35, 17, 3, 34, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:51:11', '2022-04-27 01:51:11'),
(36, 17, 3, 36, 'New ambulance has been added.', NULL, NULL, NULL, '2022-04-27 01:51:11', '2022-04-27 01:51:11'),
(37, 14, 3, 34, 'New visitor added.', NULL, NULL, NULL, '2022-04-27 02:21:23', '2022-04-27 02:21:23'),
(38, 14, 3, 36, 'New visitor added.', NULL, NULL, NULL, '2022-04-27 02:21:23', '2022-04-27 02:21:23'),
(39, 16, 2, 11, 'Chaitali Salaskar has bed assigned.', NULL, NULL, NULL, '2022-04-27 05:59:46', '2022-04-27 05:59:46'),
(40, 16, 2, 16, 'Chaitali Salaskar has bed assigned.', NULL, NULL, NULL, '2022-04-27 05:59:46', '2022-04-27 05:59:46'),
(41, 16, 2, 19, 'Chaitali Salaskar has bed assigned.', NULL, NULL, NULL, '2022-04-27 05:59:46', '2022-04-27 05:59:46'),
(42, 16, 5, 27, 'Chaitali Salaskar has bed assigned.', NULL, NULL, NULL, '2022-04-27 05:59:46', '2022-04-27 05:59:46'),
(43, 16, 5, 28, 'Chaitali Salaskar has bed assigned.', NULL, NULL, NULL, '2022-04-27 05:59:46', '2022-04-27 05:59:46'),
(44, 16, 2, 37, 'Chaitali Salaskar has bed assigned.', NULL, NULL, NULL, '2022-04-27 05:59:47', '2022-04-27 05:59:47'),
(45, 13, 2, 11, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:11:56', '2022-04-27 23:11:56'),
(46, 13, 4, 23, 'Avu Sohani your case has been created.', NULL, NULL, NULL, '2022-04-27 23:11:57', '2022-04-27 23:11:57'),
(47, 13, 3, 34, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:11:58', '2022-04-27 23:11:58'),
(48, 13, 3, 36, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:11:58', '2022-04-27 23:11:58'),
(49, 13, 6, 30, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:11:58', '2022-04-27 23:11:58'),
(50, 13, 6, 38, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:11:58', '2022-04-27 23:11:58'),
(51, 13, 2, 11, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:12:37', '2022-04-27 23:12:37'),
(52, 13, 4, 23, 'Avu Sohani your case has been created.', NULL, NULL, NULL, '2022-04-27 23:12:37', '2022-04-27 23:12:37'),
(53, 13, 3, 34, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:12:38', '2022-04-27 23:12:38'),
(54, 13, 3, 36, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:12:38', '2022-04-27 23:12:38'),
(55, 13, 6, 30, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:12:38', '2022-04-27 23:12:38'),
(56, 13, 6, 38, 'Avu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:12:38', '2022-04-27 23:12:38'),
(57, 13, 2, 11, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:17:27', '2022-04-27 23:17:27'),
(58, 13, 4, 21, 'Ishu Sohani your case has been created.', NULL, NULL, NULL, '2022-04-27 23:17:27', '2022-04-27 23:17:27'),
(59, 13, 3, 34, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:17:27', '2022-04-27 23:17:27'),
(60, 13, 3, 36, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:17:28', '2022-04-27 23:17:28'),
(61, 13, 6, 30, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:17:28', '2022-04-27 23:17:28'),
(62, 13, 6, 38, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:17:28', '2022-04-27 23:17:28'),
(63, 4, 4, 23, 'Avu Sohani your IPD record has been created.', NULL, NULL, NULL, '2022-04-27 23:27:50', '2022-04-27 23:27:50'),
(64, 13, 2, 11, 'Gunja Gupta case has been created.', NULL, NULL, NULL, '2022-04-27 23:36:04', '2022-04-27 23:36:04'),
(65, 13, 4, 13, 'Gunja Gupta your case has been created.', NULL, NULL, NULL, '2022-04-27 23:36:04', '2022-04-27 23:36:04'),
(66, 13, 3, 34, 'Gunja Gupta case has been created.', NULL, NULL, NULL, '2022-04-27 23:36:04', '2022-04-27 23:36:04'),
(67, 13, 3, 36, 'Gunja Gupta case has been created.', NULL, NULL, NULL, '2022-04-27 23:36:04', '2022-04-27 23:36:04'),
(68, 13, 6, 30, 'Gunja Gupta case has been created.', NULL, NULL, NULL, '2022-04-27 23:36:05', '2022-04-27 23:36:05'),
(69, 13, 6, 38, 'Gunja Gupta case has been created.', NULL, NULL, NULL, '2022-04-27 23:36:05', '2022-04-27 23:36:05'),
(70, 12, 3, 34, 'neha parab added as a patient.', NULL, NULL, NULL, '2022-04-27 23:40:31', '2022-04-27 23:40:31'),
(71, 12, 3, 36, 'neha parab added as a patient.', NULL, NULL, NULL, '2022-04-27 23:40:32', '2022-04-27 23:40:32'),
(72, 13, 2, 16, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:42:14', '2022-04-27 23:42:14'),
(73, 13, 4, 39, 'Neha Parab your case has been created.', NULL, NULL, NULL, '2022-04-27 23:42:14', '2022-04-27 23:42:14'),
(74, 13, 3, 34, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:42:14', '2022-04-27 23:42:14'),
(75, 13, 3, 36, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:42:15', '2022-04-27 23:42:15'),
(76, 13, 6, 30, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:42:15', '2022-04-27 23:42:15'),
(77, 13, 6, 38, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:42:15', '2022-04-27 23:42:15'),
(78, 13, 2, 16, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:44:36', '2022-04-27 23:44:36'),
(79, 13, 4, 39, 'Neha Parab your case has been created.', NULL, NULL, NULL, '2022-04-27 23:44:36', '2022-04-27 23:44:36'),
(80, 13, 3, 34, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:44:36', '2022-04-27 23:44:36'),
(81, 13, 3, 36, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:44:36', '2022-04-27 23:44:36'),
(82, 13, 6, 30, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:44:36', '2022-04-27 23:44:36'),
(83, 13, 6, 38, 'Neha Parab case has been created.', NULL, NULL, NULL, '2022-04-27 23:44:36', '2022-04-27 23:44:36'),
(84, 16, 2, 11, 'Neha Parab has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:45:38', '2022-04-27 23:45:38'),
(85, 16, 2, 16, 'Neha Parab has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:45:38', '2022-04-27 23:45:38'),
(86, 16, 2, 19, 'Neha Parab has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:45:38', '2022-04-27 23:45:38'),
(87, 16, 5, 27, 'Neha Parab has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:45:38', '2022-04-27 23:45:38'),
(88, 16, 5, 28, 'Neha Parab has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:45:38', '2022-04-27 23:45:38'),
(89, 16, 2, 37, 'Neha Parab has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:45:38', '2022-04-27 23:45:38'),
(90, 4, 4, 39, 'Neha Parab your IPD record has been created.', NULL, NULL, NULL, '2022-04-27 23:46:39', '2022-04-27 23:46:39'),
(91, 13, 2, 16, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:51:17', '2022-04-27 23:51:17'),
(92, 13, 4, 21, 'Ishu Sohani your case has been created.', NULL, NULL, NULL, '2022-04-27 23:51:17', '2022-04-27 23:51:17'),
(93, 13, 3, 34, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:51:18', '2022-04-27 23:51:18'),
(94, 13, 3, 36, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:51:18', '2022-04-27 23:51:18'),
(95, 13, 6, 30, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:51:18', '2022-04-27 23:51:18'),
(96, 13, 6, 38, 'Ishu Sohani case has been created.', NULL, NULL, NULL, '2022-04-27 23:51:18', '2022-04-27 23:51:18'),
(97, 12, 3, 34, 'pranjal dhoke added as a patient.', NULL, NULL, NULL, '2022-04-27 23:54:45', '2022-04-27 23:54:45'),
(98, 12, 3, 36, 'pranjal dhoke added as a patient.', NULL, NULL, NULL, '2022-04-27 23:54:45', '2022-04-27 23:54:45'),
(99, 13, 2, 16, 'Pranjal Dhoke case has been created.', NULL, NULL, NULL, '2022-04-27 23:55:29', '2022-04-27 23:55:29'),
(100, 13, 4, 40, 'Pranjal Dhoke your case has been created.', NULL, NULL, NULL, '2022-04-27 23:55:30', '2022-04-27 23:55:30'),
(101, 13, 3, 34, 'Pranjal Dhoke case has been created.', NULL, NULL, NULL, '2022-04-27 23:55:30', '2022-04-27 23:55:30'),
(102, 13, 3, 36, 'Pranjal Dhoke case has been created.', NULL, NULL, NULL, '2022-04-27 23:55:30', '2022-04-27 23:55:30'),
(103, 13, 6, 30, 'Pranjal Dhoke case has been created.', NULL, NULL, NULL, '2022-04-27 23:55:30', '2022-04-27 23:55:30'),
(104, 13, 6, 38, 'Pranjal Dhoke case has been created.', NULL, NULL, NULL, '2022-04-27 23:55:30', '2022-04-27 23:55:30'),
(105, 16, 2, 11, 'Pranjal Dhoke has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:56:53', '2022-04-27 23:56:53'),
(106, 16, 2, 16, 'Pranjal Dhoke has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:56:54', '2022-04-27 23:56:54'),
(107, 16, 2, 19, 'Pranjal Dhoke has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:56:54', '2022-04-27 23:56:54'),
(108, 16, 5, 27, 'Pranjal Dhoke has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:56:54', '2022-04-27 23:56:54'),
(109, 16, 5, 28, 'Pranjal Dhoke has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:56:54', '2022-04-27 23:56:54'),
(110, 16, 2, 37, 'Pranjal Dhoke has bed assigned.', NULL, NULL, NULL, '2022-04-27 23:56:54', '2022-04-27 23:56:54'),
(111, 5, 4, 40, 'Pranjal Dhoke your OPD record has been created.', NULL, NULL, NULL, '2022-04-27 23:58:59', '2022-04-27 23:58:59'),
(112, 12, 3, 34, 'Gayathri Gayakwad added as a patient.', NULL, NULL, NULL, '2022-04-28 00:21:12', '2022-04-28 00:21:12'),
(113, 12, 3, 36, 'Gayathri Gayakwad added as a patient.', NULL, NULL, NULL, '2022-04-28 00:21:12', '2022-04-28 00:21:12'),
(114, 13, 2, 16, 'Gayathri Gayakwad case has been created.', NULL, NULL, NULL, '2022-04-28 00:22:56', '2022-04-28 00:22:56'),
(115, 13, 4, 41, 'Gayathri Gayakwad your case has been created.', NULL, NULL, NULL, '2022-04-28 00:22:56', '2022-04-28 00:22:56'),
(116, 13, 3, 34, 'Gayathri Gayakwad case has been created.', NULL, NULL, NULL, '2022-04-28 00:22:56', '2022-04-28 00:22:56'),
(117, 13, 3, 36, 'Gayathri Gayakwad case has been created.', NULL, NULL, NULL, '2022-04-28 00:22:56', '2022-04-28 00:22:56'),
(118, 13, 6, 30, 'Gayathri Gayakwad case has been created.', NULL, NULL, NULL, '2022-04-28 00:22:57', '2022-04-28 00:22:57'),
(119, 13, 6, 38, 'Gayathri Gayakwad case has been created.', NULL, NULL, NULL, '2022-04-28 00:22:57', '2022-04-28 00:22:57'),
(120, 16, 2, 11, 'Gayathri Gayakwad has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:27:35', '2022-04-28 00:27:35'),
(121, 16, 2, 16, 'Gayathri Gayakwad has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:27:35', '2022-04-28 00:27:35'),
(122, 16, 2, 19, 'Gayathri Gayakwad has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:27:35', '2022-04-28 00:27:35'),
(123, 16, 5, 27, 'Gayathri Gayakwad has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:27:35', '2022-04-28 00:27:35'),
(124, 16, 5, 28, 'Gayathri Gayakwad has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:27:35', '2022-04-28 00:27:35'),
(125, 16, 2, 37, 'Gayathri Gayakwad has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:27:35', '2022-04-28 00:27:35'),
(126, 3, 4, 29, 'Chaitali Salaskar your bills has been created.', NULL, NULL, NULL, '2022-04-28 00:35:01', '2022-04-28 00:35:01'),
(127, 3, 2, 16, 'Chaitali Salaskar bills has been created.', NULL, NULL, NULL, '2022-04-28 00:35:01', '2022-04-28 00:35:01'),
(128, 3, 3, 34, 'Chaitali Salaskar bills has been created.', NULL, NULL, NULL, '2022-04-28 00:35:01', '2022-04-28 00:35:01'),
(129, 3, 3, 36, 'Chaitali Salaskar bills has been created.', NULL, NULL, NULL, '2022-04-28 00:35:01', '2022-04-28 00:35:01'),
(130, 3, 8, 15, 'Chaitali Salaskar bills has been created.', NULL, NULL, NULL, '2022-04-28 00:35:01', '2022-04-28 00:35:01'),
(131, 3, 8, 24, 'Chaitali Salaskar bills has been created.', NULL, NULL, NULL, '2022-04-28 00:35:01', '2022-04-28 00:35:01'),
(132, 12, 3, 34, 'dyani raut added as a patient.', NULL, NULL, NULL, '2022-04-28 00:47:14', '2022-04-28 00:47:14'),
(133, 12, 3, 36, 'dyani raut added as a patient.', NULL, NULL, NULL, '2022-04-28 00:47:14', '2022-04-28 00:47:14'),
(134, 13, 2, 16, 'Dyani Raut case has been created.', NULL, NULL, NULL, '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(135, 13, 4, 42, 'Dyani Raut your case has been created.', NULL, NULL, NULL, '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(136, 13, 3, 34, 'Dyani Raut case has been created.', NULL, NULL, NULL, '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(137, 13, 3, 36, 'Dyani Raut case has been created.', NULL, NULL, NULL, '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(138, 13, 6, 30, 'Dyani Raut case has been created.', NULL, NULL, NULL, '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(139, 13, 6, 38, 'Dyani Raut case has been created.', NULL, NULL, NULL, '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(140, 16, 2, 11, 'Dyani Raut has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:55:48', '2022-04-28 00:55:48'),
(141, 16, 2, 16, 'Dyani Raut has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:55:48', '2022-04-28 00:55:48'),
(142, 16, 2, 19, 'Dyani Raut has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:55:49', '2022-04-28 00:55:49'),
(143, 16, 5, 27, 'Dyani Raut has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:55:49', '2022-04-28 00:55:49'),
(144, 16, 5, 28, 'Dyani Raut has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:55:49', '2022-04-28 00:55:49'),
(145, 16, 2, 37, 'Dyani Raut has bed assigned.', NULL, NULL, NULL, '2022-04-28 00:55:49', '2022-04-28 00:55:49'),
(146, 12, 3, 34, 'Divya sakpal added as a patient.', NULL, NULL, NULL, '2022-04-28 01:08:53', '2022-04-28 01:08:53'),
(147, 12, 3, 36, 'Divya sakpal added as a patient.', NULL, NULL, NULL, '2022-04-28 01:08:53', '2022-04-28 01:08:53'),
(148, 13, 2, 16, 'Divya Sakpal case has been created.', NULL, NULL, NULL, '2022-04-28 01:09:37', '2022-04-28 01:09:37'),
(149, 13, 4, 43, 'Divya Sakpal your case has been created.', NULL, NULL, NULL, '2022-04-28 01:09:37', '2022-04-28 01:09:37'),
(150, 13, 3, 34, 'Divya Sakpal case has been created.', NULL, NULL, NULL, '2022-04-28 01:09:37', '2022-04-28 01:09:37'),
(151, 13, 3, 36, 'Divya Sakpal case has been created.', NULL, NULL, NULL, '2022-04-28 01:09:37', '2022-04-28 01:09:37'),
(152, 13, 6, 30, 'Divya Sakpal case has been created.', NULL, NULL, NULL, '2022-04-28 01:09:38', '2022-04-28 01:09:38'),
(153, 13, 6, 38, 'Divya Sakpal case has been created.', NULL, NULL, NULL, '2022-04-28 01:09:38', '2022-04-28 01:09:38'),
(154, 16, 2, 11, 'Divya Sakpal has bed assigned.', NULL, NULL, NULL, '2022-04-28 01:11:47', '2022-04-28 01:11:47'),
(155, 16, 2, 16, 'Divya Sakpal has bed assigned.', NULL, NULL, NULL, '2022-04-28 01:11:47', '2022-04-28 01:11:47'),
(156, 16, 2, 19, 'Divya Sakpal has bed assigned.', NULL, NULL, NULL, '2022-04-28 01:11:47', '2022-04-28 01:11:47'),
(157, 16, 5, 27, 'Divya Sakpal has bed assigned.', NULL, NULL, NULL, '2022-04-28 01:11:48', '2022-04-28 01:11:48'),
(158, 16, 5, 28, 'Divya Sakpal has bed assigned.', NULL, NULL, NULL, '2022-04-28 01:11:48', '2022-04-28 01:11:48'),
(159, 16, 2, 37, 'Divya Sakpal has bed assigned.', NULL, NULL, NULL, '2022-04-28 01:11:48', '2022-04-28 01:11:48'),
(160, 12, 3, 34, 'om parab added as a patient.', NULL, NULL, NULL, '2022-04-28 01:15:39', '2022-04-28 01:15:39'),
(161, 12, 3, 36, 'om parab added as a patient.', NULL, NULL, NULL, '2022-04-28 01:15:39', '2022-04-28 01:15:39'),
(162, 12, 3, 34, 'kiran patil added as a patient.', NULL, NULL, NULL, '2022-04-28 03:50:11', '2022-04-28 03:50:11'),
(163, 12, 3, 36, 'kiran patil added as a patient.', NULL, NULL, NULL, '2022-04-28 03:50:11', '2022-04-28 03:50:11'),
(164, 13, 2, 16, 'Kiran Patil case has been created.', NULL, NULL, NULL, '2022-04-28 04:07:59', '2022-04-28 04:07:59'),
(165, 13, 4, 46, 'Kiran Patil your case has been created.', NULL, NULL, NULL, '2022-04-28 04:07:59', '2022-04-28 04:07:59'),
(166, 13, 3, 34, 'Kiran Patil case has been created.', NULL, NULL, NULL, '2022-04-28 04:08:00', '2022-04-28 04:08:00'),
(167, 13, 3, 36, 'Kiran Patil case has been created.', NULL, NULL, NULL, '2022-04-28 04:08:00', '2022-04-28 04:08:00'),
(168, 13, 6, 30, 'Kiran Patil case has been created.', NULL, NULL, NULL, '2022-04-28 04:08:00', '2022-04-28 04:08:00'),
(169, 13, 6, 38, 'Kiran Patil case has been created.', NULL, NULL, NULL, '2022-04-28 04:08:00', '2022-04-28 04:08:00'),
(170, 16, 2, 11, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:09:53', '2022-04-28 04:09:53'),
(171, 16, 2, 16, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:09:53', '2022-04-28 04:09:53'),
(172, 16, 2, 19, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:09:53', '2022-04-28 04:09:53'),
(173, 16, 5, 27, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:09:53', '2022-04-28 04:09:53'),
(174, 16, 5, 28, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:09:54', '2022-04-28 04:09:54'),
(175, 16, 2, 37, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:09:54', '2022-04-28 04:09:54'),
(176, 16, 2, 11, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:14:46', '2022-04-28 04:14:46'),
(177, 16, 2, 16, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:14:46', '2022-04-28 04:14:46'),
(178, 16, 2, 19, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:14:46', '2022-04-28 04:14:46'),
(179, 16, 5, 27, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:14:46', '2022-04-28 04:14:46'),
(180, 16, 5, 28, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:14:46', '2022-04-28 04:14:46'),
(181, 16, 2, 37, 'Kiran Patil has bed assigned.', NULL, NULL, NULL, '2022-04-28 04:14:46', '2022-04-28 04:14:46'),
(182, 13, 2, 16, 'Om Parab case has been created.', NULL, NULL, NULL, '2022-04-28 05:18:56', '2022-04-28 05:18:56'),
(183, 13, 4, 44, 'Om Parab your case has been created.', NULL, NULL, NULL, '2022-04-28 05:18:56', '2022-04-28 05:18:56'),
(184, 13, 3, 34, 'Om Parab case has been created.', NULL, NULL, NULL, '2022-04-28 05:18:56', '2022-04-28 05:18:56'),
(185, 13, 3, 36, 'Om Parab case has been created.', NULL, NULL, NULL, '2022-04-28 05:18:56', '2022-04-28 05:18:56'),
(186, 13, 6, 30, 'Om Parab case has been created.', NULL, NULL, NULL, '2022-04-28 05:18:56', '2022-04-28 05:18:56'),
(187, 13, 6, 38, 'Om Parab case has been created.', NULL, NULL, NULL, '2022-04-28 05:18:56', '2022-04-28 05:18:56'),
(188, 4, 4, 44, 'Om Parab your IPD record has been created.', NULL, NULL, NULL, '2022-04-28 05:22:59', '2022-04-28 05:22:59'),
(189, 4, 4, 40, 'Pranjal Dhoke your IPD record has been created.', NULL, NULL, NULL, '2022-04-28 05:29:53', '2022-04-28 05:29:53'),
(190, 10, 8, 24, 'Sayali Parab your employee payroll has been created.', NULL, NULL, NULL, '2022-04-28 05:47:01', '2022-04-28 05:47:01'),
(191, 10, 8, 15, 'Sayali Parab your employee payroll has been created.', NULL, NULL, NULL, '2022-04-28 05:47:01', '2022-04-28 05:47:01'),
(192, 10, 6, 30, 'Pallavi Salaskar your employee payroll has been created.', NULL, NULL, NULL, '2022-04-28 05:48:02', '2022-04-28 05:48:02'),
(193, 10, 8, 15, 'Pallavi Salaskar employee payroll has been created.', NULL, NULL, NULL, '2022-04-28 05:48:02', '2022-04-28 05:48:02'),
(194, 10, 8, 24, 'Pallavi Salaskar employee payroll has been created.', NULL, NULL, NULL, '2022-04-28 05:48:02', '2022-04-28 05:48:02'),
(195, 2, 4, 43, 'Divya Sakpal your invoice has been Paid', NULL, NULL, NULL, '2022-04-28 05:49:16', '2022-04-28 05:49:16'),
(196, 2, 3, 34, 'Divya Sakpal invoice has been Paid', NULL, NULL, NULL, '2022-04-28 05:49:16', '2022-04-28 05:49:16'),
(197, 2, 3, 36, 'Divya Sakpal invoice has been Paid', NULL, NULL, NULL, '2022-04-28 05:49:16', '2022-04-28 05:49:16'),
(198, 2, 8, 15, 'Divya Sakpal invoice has been Paid', NULL, NULL, NULL, '2022-04-28 05:49:16', '2022-04-28 05:49:16'),
(199, 2, 8, 24, 'Divya Sakpal invoice has been Paid', NULL, NULL, NULL, '2022-04-28 05:49:16', '2022-04-28 05:49:16'),
(200, 3, 4, 42, 'Dyani Raut your bills has been created.', NULL, NULL, NULL, '2022-04-28 05:52:48', '2022-04-28 05:52:48'),
(201, 3, 2, 16, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-28 05:52:48', '2022-04-28 05:52:48'),
(202, 3, 3, 34, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-28 05:52:48', '2022-04-28 05:52:48'),
(203, 3, 3, 36, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-28 05:52:48', '2022-04-28 05:52:48'),
(204, 3, 8, 15, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-28 05:52:48', '2022-04-28 05:52:48'),
(205, 3, 8, 24, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-28 05:52:48', '2022-04-28 05:52:48'),
(206, 12, 3, 34, 'sapna khan added as a patient.', NULL, NULL, NULL, '2022-04-29 00:39:34', '2022-04-29 00:39:34'),
(207, 12, 3, 36, 'sapna khan added as a patient.', NULL, NULL, NULL, '2022-04-29 00:39:34', '2022-04-29 00:39:34'),
(208, 13, 2, 16, 'Sapna Khan case has been created.', NULL, NULL, NULL, '2022-04-29 00:47:13', '2022-04-29 00:47:13'),
(209, 13, 4, 47, 'Sapna Khan your case has been created.', NULL, NULL, NULL, '2022-04-29 00:47:13', '2022-04-29 00:47:13'),
(210, 13, 3, 34, 'Sapna Khan case has been created.', NULL, NULL, NULL, '2022-04-29 00:47:13', '2022-04-29 00:47:13'),
(211, 13, 3, 36, 'Sapna Khan case has been created.', NULL, NULL, NULL, '2022-04-29 00:47:13', '2022-04-29 00:47:13'),
(212, 13, 6, 30, 'Sapna Khan case has been created.', NULL, NULL, NULL, '2022-04-29 00:47:13', '2022-04-29 00:47:13'),
(213, 13, 6, 38, 'Sapna Khan case has been created.', NULL, NULL, NULL, '2022-04-29 00:47:13', '2022-04-29 00:47:13'),
(214, 10, 8, 50, 'Shanti Karnik your employee payroll has been created.', NULL, NULL, NULL, '2022-04-30 00:27:02', '2022-04-30 00:27:02'),
(215, 10, 8, 15, 'Shanti Karnik your employee payroll has been created.', NULL, NULL, NULL, '2022-04-30 00:27:02', '2022-04-30 00:27:02'),
(216, 10, 8, 24, 'Shanti Karnik your employee payroll has been created.', NULL, NULL, NULL, '2022-04-30 00:27:02', '2022-04-30 00:27:02'),
(217, 2, 4, 40, 'Pranjal Dhoke your invoice has been Paid', NULL, NULL, NULL, '2022-04-30 00:30:01', '2022-04-30 00:30:01'),
(218, 2, 3, 34, 'Pranjal Dhoke invoice has been Paid', NULL, NULL, NULL, '2022-04-30 00:30:01', '2022-04-30 00:30:01'),
(219, 2, 3, 36, 'Pranjal Dhoke invoice has been Paid', NULL, NULL, NULL, '2022-04-30 00:30:01', '2022-04-30 00:30:01'),
(220, 2, 8, 15, 'Pranjal Dhoke invoice has been Paid', NULL, NULL, NULL, '2022-04-30 00:30:01', '2022-04-30 00:30:01'),
(221, 2, 8, 24, 'Pranjal Dhoke invoice has been Paid', NULL, NULL, NULL, '2022-04-30 00:30:01', '2022-04-30 00:30:01'),
(222, 2, 8, 50, 'Pranjal Dhoke invoice has been Paid', NULL, NULL, NULL, '2022-04-30 00:30:01', '2022-04-30 00:30:01'),
(223, 11, 4, 29, 'Chaitali Salaskar your advance payment receive successfully.', NULL, NULL, NULL, '2022-04-30 00:48:13', '2022-04-30 00:48:13'),
(224, 11, 4, 43, 'Divya Sakpal your advance payment receive successfully.', NULL, NULL, NULL, '2022-04-30 00:48:26', '2022-04-30 00:48:26'),
(225, 3, 4, 42, 'Dyani Raut your bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(226, 3, 2, 16, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(227, 3, 3, 34, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(228, 3, 3, 36, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(229, 3, 8, 15, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(230, 3, 8, 24, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(231, 3, 8, 50, 'Dyani Raut bills has been created.', NULL, NULL, NULL, '2022-04-30 00:50:30', '2022-04-30 00:50:30'),
(232, 12, 3, 34, 'kish sohani added as a patient.', NULL, NULL, NULL, '2022-09-13 23:09:59', '2022-09-13 23:09:59'),
(233, 12, 3, 36, 'kish sohani added as a patient.', NULL, NULL, NULL, '2022-09-13 23:09:59', '2022-09-13 23:09:59'),
(234, 12, 3, 34, 'ganesh pawar added as a patient.', NULL, NULL, NULL, '2022-09-15 00:47:47', '2022-09-15 00:47:47'),
(235, 12, 3, 36, 'ganesh pawar added as a patient.', NULL, NULL, NULL, '2022-09-15 00:47:47', '2022-09-15 00:47:47'),
(236, 12, 3, 34, 'gunja gupta added as a patient.', NULL, NULL, NULL, '2022-09-15 03:44:47', '2022-09-15 03:44:47'),
(237, 12, 3, 36, 'gunja gupta added as a patient.', NULL, NULL, NULL, '2022-09-15 03:44:47', '2022-09-15 03:44:47'),
(238, 14, 3, 34, 'New visitor added.', NULL, NULL, NULL, '2022-09-21 00:35:04', '2022-09-21 00:35:04'),
(239, 14, 3, 36, 'New visitor added.', NULL, NULL, NULL, '2022-09-21 00:35:04', '2022-09-21 00:35:04'),
(240, 12, 3, 34, 'roshu punekar added as a patient.', NULL, NULL, NULL, '2022-09-26 03:37:32', '2022-09-26 03:37:32'),
(241, 12, 3, 36, 'roshu punekar added as a patient.', NULL, NULL, NULL, '2022-09-26 03:37:32', '2022-09-26 03:37:32'),
(242, 6, 4, 71, 'Roshu Punekar your prescription has been created.', NULL, NULL, NULL, '2022-09-26 03:45:53', '2022-09-26 03:45:53'),
(243, 13, 2, 70, 'Roshu Punekar case has been created.', NULL, NULL, NULL, '2022-09-26 03:47:01', '2022-09-26 03:47:01'),
(244, 13, 4, 71, 'Roshu Punekar your case has been created.', NULL, NULL, NULL, '2022-09-26 03:47:01', '2022-09-26 03:47:01'),
(245, 13, 3, 34, 'Roshu Punekar case has been created.', NULL, NULL, NULL, '2022-09-26 03:47:01', '2022-09-26 03:47:01'),
(246, 13, 3, 36, 'Roshu Punekar case has been created.', NULL, NULL, NULL, '2022-09-26 03:47:01', '2022-09-26 03:47:01'),
(247, 13, 6, 30, 'Roshu Punekar case has been created.', NULL, NULL, NULL, '2022-09-26 03:47:01', '2022-09-26 03:47:01'),
(248, 13, 6, 38, 'Roshu Punekar case has been created.', NULL, NULL, NULL, '2022-09-26 03:47:01', '2022-09-26 03:47:01'),
(249, 10, 6, 73, 'Sai Punekar your employee payroll has been created.', NULL, NULL, NULL, '2022-09-26 03:54:39', '2022-09-26 03:54:39'),
(250, 10, 8, 15, 'Sai Punekar employee payroll has been created.', NULL, NULL, NULL, '2022-09-26 03:54:39', '2022-09-26 03:54:39'),
(251, 10, 8, 24, 'Sai Punekar employee payroll has been created.', NULL, NULL, NULL, '2022-09-26 03:54:39', '2022-09-26 03:54:39'),
(252, 10, 8, 69, 'Sai Punekar employee payroll has been created.', NULL, NULL, NULL, '2022-09-26 03:54:39', '2022-09-26 03:54:39'),
(253, 11, 4, 68, 'Kishu Sohanithree your advance payment receive successfully.', NULL, NULL, NULL, '2022-11-11 22:56:10', '2022-11-11 22:56:10'),
(254, 12, 3, 34, 'safa khan added as a patient.', NULL, NULL, NULL, '2022-11-25 00:38:46', '2022-11-25 00:38:46'),
(255, 12, 3, 36, 'safa khan added as a patient.', NULL, NULL, NULL, '2022-11-25 00:38:46', '2022-11-25 00:38:46'),
(256, 12, 3, 34, 'rohit kambli added as a patient.', NULL, NULL, NULL, '2022-11-25 00:47:22', '2022-11-25 00:47:22'),
(257, 12, 3, 36, 'rohit kambli added as a patient.', NULL, NULL, NULL, '2022-11-25 00:47:22', '2022-11-25 00:47:22'),
(258, 12, 3, 34, 'prachiti khan added as a patient.', NULL, NULL, NULL, '2022-11-25 01:10:30', '2022-11-25 01:10:30'),
(259, 12, 3, 36, 'prachiti khan added as a patient.', NULL, NULL, NULL, '2022-11-25 01:10:30', '2022-11-25 01:10:30'),
(260, 12, 3, 34, 'nisha khane added as a patient.', NULL, NULL, NULL, '2022-11-25 02:53:23', '2022-11-25 02:53:23'),
(261, 12, 3, 36, 'nisha khane added as a patient.', NULL, NULL, NULL, '2022-11-25 02:53:23', '2022-11-25 02:53:23'),
(262, 12, 3, 34, 'kunal shide added as a patient.', NULL, NULL, NULL, '2022-12-07 22:39:23', '2022-12-07 22:39:23'),
(263, 12, 3, 36, 'kunal shide added as a patient.', NULL, NULL, NULL, '2022-12-07 22:39:23', '2022-12-07 22:39:23'),
(264, 12, 3, 99, 'kunal shide added as a patient.', NULL, NULL, NULL, '2022-12-07 22:39:24', '2022-12-07 22:39:24'),
(265, 12, 3, 34, 'soham khan added as a patient.', NULL, NULL, NULL, '2022-12-07 22:46:38', '2022-12-07 22:46:38'),
(266, 12, 3, 36, 'soham khan added as a patient.', NULL, NULL, NULL, '2022-12-07 22:46:38', '2022-12-07 22:46:38'),
(267, 12, 3, 99, 'soham khan added as a patient.', NULL, NULL, NULL, '2022-12-07 22:46:38', '2022-12-07 22:46:38'),
(268, 11, 4, 104, 'Kalyani Khan your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-09 22:53:51', '2022-12-09 22:53:51'),
(269, 11, 4, 102, 'Soham Khan your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-09 22:56:54', '2022-12-09 22:56:54'),
(270, 11, 4, 68, 'Kishu Sohanithree your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-10 02:11:49', '2022-12-10 02:11:49'),
(271, 11, 4, 85, 'Safa Khan your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-10 02:12:19', '2022-12-10 02:12:19'),
(272, 11, 4, 85, 'Safa Khan your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-10 02:12:25', '2022-12-10 02:12:25'),
(273, 11, 4, 85, 'Safa Khan your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-10 02:12:26', '2022-12-10 02:12:26'),
(274, 12, 3, 34, 'namrata khan added as a patient.', NULL, NULL, NULL, '2022-12-12 05:05:49', '2022-12-12 05:05:49'),
(275, 12, 3, 36, 'namrata khan added as a patient.', NULL, NULL, NULL, '2022-12-12 05:05:52', '2022-12-12 05:05:52'),
(276, 12, 3, 99, 'namrata khan added as a patient.', NULL, NULL, NULL, '2022-12-12 05:05:56', '2022-12-12 05:05:56'),
(277, 11, 4, 104, 'Kalyani Khan your advance payment receive successfully.', NULL, NULL, NULL, '2022-12-12 06:30:54', '2022-12-12 06:30:54'),
(0, 12, 3, 99, 'sau rane added as a patient.', NULL, NULL, NULL, '2023-02-08 04:05:56', '2023-02-08 04:05:56'),
(0, 12, 3, 34, 'sau rane added as a patient.', NULL, NULL, NULL, '2023-02-08 04:05:56', '2023-02-08 04:05:56'),
(0, 12, 3, 36, 'sau rane added as a patient.', NULL, NULL, NULL, '2023-02-08 04:05:56', '2023-02-08 04:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 72, '2022-09-26 03:43:19', '2022-09-26 03:43:19'),
(4, 80, '2022-09-28 04:39:33', '2022-09-28 04:39:33'),
(5, 100, '2022-12-07 05:08:30', '2022-12-07 05:08:30'),
(6, 105, '2022-12-09 00:50:23', '2022-12-09 00:50:23'),
(7, 106, '2022-12-09 00:55:30', '2022-12-09 00:55:30'),
(0, 0, '2023-01-25 00:52:12', '2023-01-25 00:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `opd_diagnoses`
--

CREATE TABLE `opd_diagnoses` (
  `id` int(10) UNSIGNED NOT NULL,
  `opd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `report_type` varchar(191) NOT NULL,
  `report_date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_patient_departments`
--

CREATE TABLE `opd_patient_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `opd_number` varchar(191) NOT NULL,
  `height` varchar(191) DEFAULT NULL,
  `weight` varchar(191) DEFAULT NULL,
  `bp` varchar(191) DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `appointment_date` datetime NOT NULL,
  `case_id` int(10) UNSIGNED DEFAULT NULL,
  `is_old_patient` tinyint(1) DEFAULT 0,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `standard_charge` double NOT NULL,
  `payment_mode` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opd_patient_departments`
--

INSERT INTO `opd_patient_departments` (`id`, `patient_id`, `opd_number`, `height`, `weight`, `bp`, `symptoms`, `notes`, `appointment_date`, `case_id`, `is_old_patient`, `doctor_id`, `standard_charge`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 6, 'WV1M0TB1', '-0.01', '0.06', '466', 'dfg dsfg fgrtrtfyg srdtfyg', 'fghj sdfg dsfdgf', '2022-04-28 10:57:00', 4, 0, 3, 233333, 2, '2022-04-27 23:58:59', '2022-04-27 23:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `opd_timelines`
--

CREATE TABLE `opd_timelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `opd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `visible_to_person` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation_reports`
--

CREATE TABLE `operation_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_reports`
--

INSERT INTO `operation_reports` (`id`, `patient_id`, `case_id`, `doctor_id`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'PW3P1DO4', 3, '2022-04-24 12:00:00', 'sdf sd sd sdf', '2022-04-27 01:04:13', '2022-04-27 01:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `discount` double NOT NULL,
  `total_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'efr', 'ergt fdgr', 99.98, 0.13800000000003, '2022-04-27 01:17:02', '2022-04-27 01:17:02'),
(2, 'eee', 'dfg sd', 0.02, 689.862, '2022-04-27 01:17:30', '2022-04-27 01:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `package_services`
--

CREATE TABLE `package_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_services`
--

INSERT INTO `package_services` (`id`, `package_id`, `service_id`, `quantity`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 345, 690, '2022-04-27 01:17:02', '2022-04-27 01:17:02'),
(2, 2, 1, 2, 345, 690, '2022-04-27 01:17:30', '2022-04-27 01:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathology_categories`
--

CREATE TABLE `pathology_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_categories`
--

INSERT INTO `pathology_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'kkkkk', '2022-04-27 00:53:27', '2022-04-27 00:53:27'),
(2, 'mmmmm', '2022-04-27 00:53:49', '2022-04-27 00:53:49'),
(3, 'uuuuu', '2022-04-27 00:53:59', '2022-04-27 00:53:59'),
(4, 'aaaaa', '2022-04-27 00:54:05', '2022-04-27 00:54:05'),
(5, 'ppppppppp', '2022-04-28 04:38:23', '2022-04-28 04:38:23'),
(6, 'mnsp', '2022-04-29 23:24:19', '2022-04-29 23:24:19'),
(7, 'uuiuiu', '2022-04-29 23:24:32', '2022-04-29 23:24:32'),
(0, 'ghjhk', '2023-01-26 23:53:50', '2023-01-26 23:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_tests`
--

CREATE TABLE `pathology_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(191) NOT NULL,
  `short_name` varchar(191) NOT NULL,
  `test_type` varchar(191) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `subcategory` varchar(191) DEFAULT NULL,
  `method` varchar(191) DEFAULT NULL,
  `report_days` int(11) DEFAULT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `standard_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_tests`
--

INSERT INTO `pathology_tests` (`id`, `test_name`, `short_name`, `test_type`, `category_id`, `unit`, `subcategory`, `method`, `report_days`, `charge_category_id`, `standard_charge`, `created_at`, `updated_at`) VALUES
(1, 'Xray one', 'ddf', 'aaa', 1, 7889, 'iiii', 'kggk', 1, 1, 345678, '2022-04-28 04:39:49', '2022-04-28 04:39:49'),
(2, 'xraytwo', 'df', 'aaa', 3, 7889, 'df', 'ddd', 1, 2, 4354656, '2022-04-28 04:40:51', '2022-04-28 04:40:51'),
(3, 'aaaaaaaaaaa', 'ttttt', 'df', 4, 1, 'rrrr', 'ssss', 3, 4, 345678, '2022-04-28 04:41:29', '2022-04-28 04:41:29'),
(0, 'testtwo', 'tthree', '12', 1, 6789, 'rtyfhgh', 'yuyjhj', 8, 1, 345678, '2023-01-26 23:54:34', '2023-01-26 23:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `patienthms`
--

CREATE TABLE `patienthms` (
  `id` int(11) NOT NULL,
  `patient` varchar(191) DEFAULT NULL,
  `mobileno` varchar(191) DEFAULT NULL,
  `location` varchar(191) DEFAULT NULL,
  `doctordepartments` varchar(191) DEFAULT NULL,
  `doctor` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patienthms`
--

INSERT INTO `patienthms` (`id`, `patient`, `mobileno`, `location`, `doctordepartments`, `doctor`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdf', '9786786787', 'Contacare Eye Hospital Lucknow', '--select Operating doctor--', 'sdf', 'dfg', NULL, '2023-02-07 06:38:22', '2023-02-07 06:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `patientlive`
--

CREATE TABLE `patientlive` (
  `id` int(10) NOT NULL,
  `visited_reference` varchar(191) DEFAULT NULL,
  `patient_name` varchar(191) NOT NULL,
  `appointment_type` varchar(191) NOT NULL,
  `doctor_name` varchar(191) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 67, '2022-09-22 08:03:43', '2022-09-22 08:03:43'),
(24, 68, '2022-09-22 23:44:22', '2022-09-22 23:44:22'),
(25, 71, '2022-09-26 03:37:32', '2022-09-26 03:37:32'),
(26, 74, '2022-09-27 06:21:17', '2022-09-27 06:21:17'),
(27, 75, '2022-09-27 06:30:19', '2022-09-27 06:30:19'),
(28, 76, '2022-09-27 06:36:44', '2022-09-27 06:36:44'),
(30, 85, '2022-11-25 00:38:46', '2022-11-25 00:38:46'),
(31, 86, '2022-11-25 00:47:21', '2022-11-25 00:47:21'),
(32, 87, '2022-11-25 01:10:30', '2022-11-25 01:10:30'),
(33, 88, '2022-11-25 02:53:23', '2022-11-25 02:53:23'),
(34, 101, '2022-12-07 22:39:22', '2022-12-07 22:39:22'),
(35, 102, '2022-12-07 22:46:38', '2022-12-07 22:46:38'),
(36, 104, '2022-12-09 00:24:06', '2022-12-09 00:24:06'),
(37, 107, '2022-12-12 05:05:45', '2022-12-12 05:05:45'),
(0, 0, '2022-12-24 06:30:28', '2022-12-24 06:30:28'),
(0, 0, '2023-02-08 04:05:56', '2023-02-08 04:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `patient_admissions`
--

CREATE TABLE `patient_admissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_admission_id` varchar(191) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `admission_date` datetime NOT NULL,
  `discharge_date` datetime DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `insurance_id` int(10) UNSIGNED DEFAULT NULL,
  `bed_id` int(10) UNSIGNED DEFAULT NULL,
  `policy_no` varchar(191) DEFAULT NULL,
  `agent_name` varchar(191) DEFAULT NULL,
  `guardian_name` varchar(191) DEFAULT NULL,
  `guardian_relation` varchar(191) DEFAULT NULL,
  `guardian_contact` varchar(191) DEFAULT NULL,
  `guardian_address` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_admissions`
--

INSERT INTO `patient_admissions` (`id`, `patient_admission_id`, `patient_id`, `doctor_id`, `admission_date`, `discharge_date`, `package_id`, `insurance_id`, `bed_id`, `policy_no`, `agent_name`, `guardian_name`, `guardian_relation`, `guardian_contact`, `guardian_address`, `status`, `created_at`, `updated_at`) VALUES
(0, 'HUOZF2RE', 24, 9, '2022-09-26 12:00:00', NULL, 2, 1, 9, '567878', 'sairaj', 'dfg', 'dfg', '+917845678798', 'werty', 1, '2022-09-26 03:50:41', '2022-09-26 03:50:41'),
(1, 'GEYH6VHI', 4, 3, '2022-04-27 00:00:00', '2022-04-28 00:00:00', NULL, NULL, 1, '123456', 'edfg', 'fgh', 'rfgh', '+919423567855', 'pune', 1, '2022-04-27 00:42:30', '2022-04-27 00:44:09'),
(2, 'EFJRGE5S', 8, 3, '2022-04-20 00:00:00', NULL, 2, 1, 1, '34567', 'edfg', 'dfdg', 'fgh', '+919423456723', 'pune', 1, '2022-04-28 00:53:35', '2022-04-28 00:53:35'),
(3, '5NXEBCEX', 8, 3, '2022-04-08 00:00:00', NULL, 2, 1, 7, '123456', 'edfg', 'fgh', 'rfgh', '+919435678798', 'pune', 1, '2022-04-28 04:37:31', '2022-04-28 04:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `patient_cases`
--

CREATE TABLE `patient_cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `fee` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_cases`
--

INSERT INTO `patient_cases` (`id`, `case_id`, `patient_id`, `phone`, `doctor_id`, `date`, `fee`, `status`, `description`, `created_at`, `updated_at`) VALUES
(0, 'RCSEAZYN', 25, '+919432456787', 9, '2022-09-26 14:46:00', 12000, 1, 'sdf dfg fg', '2022-09-26 03:47:00', '2022-09-26 03:47:00'),
(1, 'PW3P1DO4', 3, '+918845678798', 1, '2022-04-28 10:18:00', 23000, 1, 'cdf sdf dfg df', '2022-04-27 00:39:44', '2022-04-27 23:18:05'),
(2, 'ILVBPUNL', 5, '+919456777687', 3, '2022-04-28 10:44:00', 2000, 1, 'cvgb adsf fh', '2022-04-27 23:44:35', '2022-04-27 23:44:35'),
(3, 'SNLOE8ZP', 2, '+919432567898', 3, '2022-04-28 10:50:00', 40000, 1, 'gfghjk gfgjkhhfg dhjhhfgzs', '2022-04-27 23:51:17', '2022-04-27 23:51:17'),
(4, 'LZGZMY1H', 6, '+919456789878', 3, '2022-04-28 10:55:00', 200, 1, 'edef dfgfvgn', '2022-04-27 23:55:29', '2022-04-27 23:55:29'),
(5, '6QXWSMPN', 7, '+919434567687', 3, '2022-04-28 11:22:00', 200, 1, 'cxv', '2022-04-28 00:22:54', '2022-04-28 00:22:54'),
(6, 'DCBVDKCC', 8, '+919423456723', 3, '2022-04-28 11:48:00', 500, 1, 'sdfg', '2022-04-28 00:48:49', '2022-04-28 00:48:49'),
(7, 'AUAIHAP0', 9, '+919421264688', 3, '2022-04-28 12:09:00', 3000, 1, 'fgh sdfg dfg', '2022-04-28 01:09:37', '2022-04-28 01:09:37'),
(8, 'QD3IGWQS', 11, '+919432456789', 3, '2022-04-28 15:07:00', 2000, 1, 'fdgsfd', '2022-04-28 04:07:59', '2022-04-28 04:07:59'),
(9, '2D8VMLX9', 10, '+919809897867', 3, '2022-04-28 16:18:00', 500, 1, 'fghjkl', '2022-04-28 05:18:54', '2022-04-28 05:18:54'),
(10, 'EPAER9AH', 12, '+919345678768', 3, '2022-04-29 11:46:00', 123000, 1, 'dgrtfyg', '2022-04-29 00:47:12', '2022-04-29 00:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis_properties`
--

CREATE TABLE `patient_diagnosis_properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_diagnosis_id` bigint(20) UNSIGNED NOT NULL,
  `property_name` varchar(191) DEFAULT NULL,
  `property_value` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_diagnosis_properties`
--

INSERT INTO `patient_diagnosis_properties` (`id`, `patient_diagnosis_id`, `property_name`, `property_value`, `created_at`, `updated_at`) VALUES
(0, 0, 'age', '1', '2022-12-07 03:10:39', '2022-12-07 03:10:39'),
(3, 1, 'age', '23', '2022-04-26 06:29:55', '2022-04-26 06:29:55'),
(30, 10, 'age', '23', '2022-04-26 23:03:25', '2022-04-26 23:03:25'),
(31, 10, 'height', '6.97', '2022-04-26 23:03:25', '2022-04-26 23:03:25'),
(32, 10, 'weight', '12.8', '2022-04-26 23:03:25', '2022-04-26 23:03:25'),
(33, 10, 'average_glucose', 'erdf', '2022-04-26 23:03:25', '2022-04-26 23:03:25'),
(34, 10, 'fasting_blood_sugar', 'gkjk', '2022-04-26 23:03:25', '2022-04-26 23:03:25'),
(35, 10, 'urine_sugar', 'kgnk', '2022-04-26 23:03:26', '2022-04-26 23:03:26'),
(36, 10, 'blood_pressure', 'gjj', '2022-04-26 23:03:26', '2022-04-26 23:03:26'),
(37, 10, 'diabetes', 'gllgl', '2022-04-26 23:03:26', '2022-04-26 23:03:26'),
(38, 10, 'cholesterol', 'wer', '2022-04-26 23:03:26', '2022-04-26 23:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis_tests`
--

CREATE TABLE `patient_diagnosis_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `report_number` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_diagnosis_tests`
--

INSERT INTO `patient_diagnosis_tests` (`id`, `patient_id`, `doctor_id`, `category_id`, `report_number`, `created_at`, `updated_at`) VALUES
(0, 24, 3, 2, '7PGUHQQR', '2022-12-07 03:10:39', '2022-12-07 03:10:39'),
(10, 3, 3, 2, 'DKT8TXMD', '2022-04-26 23:03:25', '2022-04-26 23:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `paymentadv`
--

CREATE TABLE `paymentadv` (
  `id` int(11) UNSIGNED NOT NULL,
  `patientpaymentadv_name` varchar(200) NOT NULL,
  `receiptpaymentadv_name` varchar(200) NOT NULL,
  `ammount_paymentadv` varchar(200) NOT NULL,
  `date` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(200) NOT NULL,
  `timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentadv`
--

INSERT INTO `paymentadv` (`id`, `patientpaymentadv_name`, `receiptpaymentadv_name`, `ammount_paymentadv`, `date`, `created_at`, `updated_at`, `created_by`, `timing`) VALUES
(4, '', 'Payment_Adv_00', '887', '2022-12-12', '2022-12-22 05:23:10', '2022-12-22 05:28:42', '1', '10:53:10'),
(5, '18', 'Payment_Adv_005', '852', '2022-12-08', '2022-12-22 05:23:55', '2022-12-22 05:23:55', '1', '10:53:55'),
(13, '40', 'Payment_Adv_006', '857', '2022-12-23', '2022-12-22 06:49:23', '2022-12-22 06:49:23', '1', '12:19:23'),
(16, '59', 'Payment_Adv_014', '250', '2022-12-22', '2022-12-22 06:56:33', '2022-12-22 06:56:33', '1', '12:26:33'),
(17, '13', 'Payment_Adv_017', '3400', '2023-01-20', '2023-01-21 05:40:44', '2023-01-21 05:40:44', '1', '11:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `pay_to` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_date`, `account_id`, `pay_to`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, '2022-04-19', 1, '20000', 5000, 'five thousand only', '2022-04-25 05:53:35', '2022-04-25 05:53:35'),
(2, '2022-04-20', 2, '12345', 180000, 'dfgh', '2022-04-28 05:51:49', '2022-04-28 05:51:49'),
(3, '2022-04-29', 3, '20000', 890000, 'dfghbghjklbddfghjk sdfghjkl', '2022-04-30 00:47:21', '2022-04-30 00:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `payment_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_name`) VALUES
(1, 'Cash'),
(2, 'Debit Card'),
(3, 'Credit Card'),
(4, 'Cheque'),
(5, 'CGHS'),
(6, 'RSBY'),
(7, 'TPA'),
(8, 'MJPJAY'),
(9, 'FOC'),
(10, 'PDC'),
(11, 'NEFT'),
(12, 'Railway'),
(13, 'Ayushman Bharat'),
(14, 'ECHS'),
(15, 'Post Office'),
(16, 'ESIC'),
(17, 'Paytm'),
(18, 'Corporate');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sr_no` varchar(191) NOT NULL,
  `payrollno` varchar(30) NOT NULL,
  `payroll_id` varchar(191) DEFAULT NULL,
  `role` varchar(191) NOT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `employee` varchar(191) NOT NULL,
  `employeedepartment` varchar(30) NOT NULL,
  `status` varchar(191) NOT NULL,
  `basic` varchar(191) NOT NULL,
  `hra` varchar(191) NOT NULL,
  `gross_salary` varchar(191) NOT NULL,
  `pf_employee_contro` varchar(191) NOT NULL,
  `esic_employee_contro` varchar(191) NOT NULL,
  `pt` varchar(191) NOT NULL,
  `total_deduction` varchar(191) NOT NULL,
  `net_salary` varchar(191) NOT NULL,
  `employer_contro_pf` varchar(191) NOT NULL,
  `employer_contro_esic` varchar(191) NOT NULL,
  `mediclaim_benefit` varchar(191) NOT NULL,
  `ctc` varchar(191) NOT NULL,
  `ctc_payroll` varchar(30) NOT NULL,
  `month` varchar(191) NOT NULL,
  `total_working_day` varchar(191) NOT NULL,
  `per_day_salary` varchar(191) NOT NULL,
  `total_present_day` varchar(191) NOT NULL,
  `total_absent_day` varchar(191) NOT NULL,
  `salary` varchar(191) NOT NULL,
  `incentive_bonus` varchar(191) NOT NULL,
  `conveyance_allowance` varchar(191) NOT NULL,
  `medical_allowance` varchar(191) NOT NULL,
  `rent_by_company` varchar(191) NOT NULL,
  `net_payable` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `created_at`, `updated_at`, `sr_no`, `payrollno`, `payroll_id`, `role`, `employee_id`, `employee`, `employeedepartment`, `status`, `basic`, `hra`, `gross_salary`, `pf_employee_contro`, `esic_employee_contro`, `pt`, `total_deduction`, `net_salary`, `employer_contro_pf`, `employer_contro_esic`, `mediclaim_benefit`, `ctc`, `ctc_payroll`, `month`, `total_working_day`, `per_day_salary`, `total_present_day`, `total_absent_day`, `salary`, `incentive_bonus`, `conveyance_allowance`, `medical_allowance`, `rent_by_company`, `net_payable`) VALUES
(27, '2022-11-18 00:19:06', '2022-11-18 08:29:24', '', 'PAYROLL_NO_027', NULL, '', '3', 'farid', 'Doctor', 'yes', '864.0000', '336.0000', '1200', '2', '2', '12', '16', '1184', '12', '2', '2', '16', '12006', 'November 2022', '30', '39.80', '2', '4', '79.60', '1111', '1', '1', '1', '1193.00'),
(28, '2022-11-18 00:22:18', '2022-11-18 00:22:40', '', 'PAYROLL_NO_028', NULL, '', '2', 'nihal', '', 'no-yesss', '8640.0000', '3360.0000', '12000', '2', '2', '2', '6', '11994', '3', '3', '3', '9', '', 'November 2022', '30', '400.30', '28', '2', '11208.40', '1', '1', '1', '1', ''),
(29, '2022-11-18 05:49:45', '2023-01-28 05:24:29', '', 'PAYROLL_NO_029', NULL, '', '2', 'nihal', 'Doctor', 'yes', '8640.0000', '3360.0000', '12000', '3', '3', '3', '9', '11991', '3', '3', '3', '9', '12009', 'November 2022', '30', '400.30', '29', '1', '11608.70', '121', '121', '3', '125', '11612.00'),
(30, '2022-11-18 07:23:38', '2023-01-28 05:23:43', '', 'PAYROLL_NO_030', NULL, '', '5', 'prasad', 'Doctor', 'yea', '8640.0000', '3360.0000', '12000', '2', '2', '2', '6', '11994', '2', '2', '2', '6', '12006', 'November 2022', '30', '400.20', '28', '2', '11205.60', '1200', '14', '15', '16', '11209.00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharamacyreturn`
--

CREATE TABLE `pharamacyreturn` (
  `id` int(11) NOT NULL,
  `accdate` varchar(50) NOT NULL,
  `billdate` date NOT NULL,
  `billno` varchar(40) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `products` varchar(100) NOT NULL,
  `packaging` varchar(100) NOT NULL,
  `expire_date` varchar(50) NOT NULL,
  `hsncode` varchar(50) NOT NULL,
  `mrp` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `itemamount` varchar(50) NOT NULL,
  `discType` varchar(100) NOT NULL,
  `discRate` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `ttlamt` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharamacyreturn`
--

INSERT INTO `pharamacyreturn` (`id`, `accdate`, `billdate`, `billno`, `vname`, `products`, `packaging`, `expire_date`, `hsncode`, `mrp`, `qty`, `itemamount`, `discType`, `discRate`, `discount`, `ttlamt`, `created_at`, `updated_at`) VALUES
(28, '2022-11-23', '2022-11-19', '89', 'Kridh', '2,3,5', '1,1,1', ',,', '123,12345,7878', '200000,120000,200000', '1,1,1', '200000,120000,200000', '1', NULL, '0', '520000', '2022-11-08 03:50:00', '2022-11-08 03:50:00'),
(29, '2022-11-02', '2022-11-11', '789', 'Nilesh', '4,3', '1,1', '2022-08-01,2022-08-01', '123456,12345', '2345,120000', '1,1', '2345,120000', 'Lumpsum', '1', '1', '122344', '2022-11-09 10:13:39', '2022-11-09 04:43:39'),
(30, '2022-11-17', '2022-11-18', '10', 'Rahulii', '3,4', '3,6', '2022-09-01,2022-09-12', '12345,123456', '120000,2345', '1,1', '120000,2345', '%', '2', '2446.9', '119898.1', '2022-11-09 11:56:31', '2022-11-09 06:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 83, '2022-11-10 23:50:02', '2022-11-10 23:50:02'),
(1, 31, '2022-04-27 00:47:53', '2022-04-27 00:47:53'),
(2, 33, '2022-04-27 00:52:40', '2022-04-27 00:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacybills`
--

CREATE TABLE `pharmacybills` (
  `id` int(11) UNSIGNED NOT NULL,
  `pname` varchar(200) NOT NULL,
  `billdate` varchar(200) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `patientType` varchar(200) NOT NULL,
  `details` varchar(255) NOT NULL,
  `products` varchar(20) DEFAULT NULL,
  `packaging` varchar(10) DEFAULT NULL,
  `expire_date` varchar(100) NOT NULL,
  `hsncode` varchar(20) DEFAULT NULL,
  `mrp` varchar(100) DEFAULT NULL,
  `qty` varchar(50) DEFAULT NULL,
  `itemamount` varchar(100) DEFAULT NULL,
  `discType` varchar(10) DEFAULT NULL,
  `discRate` int(30) DEFAULT NULL,
  `discount` text DEFAULT NULL,
  `ttlamt` int(11) DEFAULT NULL,
  `payment_paymode` varchar(100) DEFAULT NULL,
  `paymentdate` varchar(100) DEFAULT NULL,
  `paymentremark` varchar(200) DEFAULT NULL,
  `amount` varchar(60) DEFAULT NULL,
  `paidamt` bigint(20) DEFAULT NULL,
  `bill_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacybills`
--

INSERT INTO `pharmacybills` (`id`, `pname`, `billdate`, `dname`, `created_at`, `updated_at`, `user_id`, `patientType`, `details`, `products`, `packaging`, `expire_date`, `hsncode`, `mrp`, `qty`, `itemamount`, `discType`, `discRate`, `discount`, `ttlamt`, `payment_paymode`, `paymentdate`, `paymentremark`, `amount`, `paidamt`, `bill_no`) VALUES
(149, '39', '11-11-2022', '4', '2022-11-11 11:32:42', '2022-11-11 06:02:42', 0, 'old', 'djbfdgfd', '2,5', '1,1', '2022-08-01,2022-08-02', '123,7878', '200000,200000', '1,1', '200000,200000', '%', 1, '4000', 396000, '18,14', '11-11-2022,11-11-2022', 'rrrrrr,vbnm', '90,90', 180, 'PHAR_BILL_149'),
(150, '20', '11-11-2022', '2', '2022-11-11 08:01:40', '2022-11-11 08:01:40', 0, 'Old', 'ghjkl', '2,4', '1,1', '2022-09-01,2022-08-30', '123,123456', '200000,2345', '1,1', '200000,2345', '%', 3, '6070.35', 196275, '16,17', '11-11-2022,11-11-2022', 'uytyu,yu', '78,89', 167, 'PHAR_BILL_150'),
(151, '13', '22-11-2022', '3', '2022-11-22 02:00:46', '2022-11-22 02:00:46', 0, 'Old', 'wdfg', '3', '1', '2022-09-01', '12345', '120000', '1', '120000', '%', 3, '3600', 116400, '18', '22-11-2022', 'sdf', '23000', 23000, 'PHAR_BILL_151'),
(152, '29', '03-12-2022', '2', '2022-12-03 02:50:42', '2022-12-03 02:50:42', 0, 'Old', 'yes', '3', '1', '2022-08-01', '12345', '120000', '1', '120000', '%', 2, '2400', 117600, '16', '03-12-2022', 'yes', '2000', 2000, 'PHAR_BILL_152');

-- --------------------------------------------------------

--
-- Table structure for table `postals`
--

CREATE TABLE `postals` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_title` varchar(191) DEFAULT NULL,
  `to_title` varchar(191) DEFAULT NULL,
  `reference_no` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postals`
--

INSERT INTO `postals` (`id`, `from_title`, `to_title`, `reference_no`, `date`, `address`, `type`, `created_at`, `updated_at`) VALUES
(1, 'full receive', 'thfb ghj uhjg kjhu jbnh', '1234324323', '2022-04-22', 'thane', 1, '2022-04-25 23:00:06', '2022-04-26 23:38:15'),
(2, 'ppp', 'kj kjhk kh khkljl j', '456789', '2022-04-27', NULL, 1, '2022-04-26 23:37:13', '2022-04-26 23:37:13'),
(3, 'abcd', 'soya', '123456', '2022-04-28', 'dfv d fd fd fgr', 2, '2022-04-26 23:39:45', '2022-04-26 23:39:45'),
(4, 'eded', 'mmm', '234567', '2022-04-25', 'dfv fg gf', 2, '2022-04-26 23:40:16', '2022-04-26 23:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `postot`
--

CREATE TABLE `postot` (
  `id` int(11) NOT NULL,
  `post_mr_no` varchar(191) DEFAULT NULL,
  `post_surgeon_name` varchar(191) DEFAULT NULL,
  `post_patient_name` varchar(191) DEFAULT NULL,
  `post_eye` varchar(191) DEFAULT NULL,
  `post_clean_by` varchar(191) DEFAULT NULL,
  `post_date` varchar(191) DEFAULT NULL,
  `post_bp` varchar(191) DEFAULT NULL,
  `post_bp_remark` varchar(191) DEFAULT NULL,
  `post_surger_check` varchar(191) DEFAULT NULL,
  `post_surger_check_remark` varchar(191) DEFAULT NULL,
  `post_spotwo` varchar(191) DEFAULT NULL,
  `post_spotwo_remark` varchar(191) DEFAULT NULL,
  `post_hear_rate` varchar(191) DEFAULT NULL,
  `post_hearrate_remark` varchar(191) DEFAULT NULL,
  `post_patient_cover` varchar(191) DEFAULT NULL,
  `post_patientcover_remark` varchar(191) DEFAULT NULL,
  `post_patient_shoecover` varchar(191) DEFAULT NULL,
  `post_patientshoecover_remark` varchar(191) DEFAULT NULL,
  `post_autoclavedone` varchar(191) DEFAULT NULL,
  `post_autoclavedone_remark` varchar(191) DEFAULT NULL,
  `post_instrumentsterilization` varchar(191) DEFAULT NULL,
  `post_instrumentsterilization_remark` varchar(191) DEFAULT NULL,
  `post_ottable` varchar(191) DEFAULT NULL,
  `post_foot_switch` varchar(191) DEFAULT NULL,
  `post_gamachine` varchar(191) DEFAULT NULL,
  `post_microscope` varchar(191) DEFAULT NULL,
  `post_microscope_footswith` varchar(191) DEFAULT NULL,
  `post_aircondistioner` varchar(191) DEFAULT NULL,
  `post_instruments_autoclave` varchar(191) DEFAULT NULL,
  `post_instruments_autoclave_remark` varchar(191) DEFAULT NULL,
  `post_phaco_machine` varchar(191) DEFAULT NULL,
  `post_fumigation_date` varchar(191) DEFAULT NULL,
  `post_instrument_clean_by` varchar(191) DEFAULT NULL,
  `post_oxygen_cylinderstatus` varchar(191) DEFAULT NULL,
  `post_nurse_name` varchar(191) DEFAULT NULL,
  `post_incident_remark` varchar(191) DEFAULT NULL,
  `post_otconduct_remark` varchar(191) DEFAULT NULL,
  `post_doctornote_remark` varchar(191) DEFAULT NULL,
  `post_bloodpresure` varchar(191) DEFAULT NULL,
  `post_spotwos` varchar(191) DEFAULT NULL,
  `post_heartrate` varchar(191) DEFAULT NULL,
  `post_followupdatecoun` varchar(191) DEFAULT NULL,
  `post_followupdatedoctor` varchar(191) DEFAULT NULL,
  `post_otitemsstock` varchar(191) DEFAULT NULL,
  `post_secondtimeout` varchar(191) DEFAULT NULL,
  `discharge` varchar(191) DEFAULT NULL,
  `doesdonts` varchar(191) DEFAULT NULL,
  `postotmedication` varchar(191) DEFAULT NULL,
  `post_product` varchar(191) DEFAULT NULL,
  `post_quantity` varchar(191) DEFAULT NULL,
  `post_reusable` varchar(191) DEFAULT NULL,
  `post_price` varchar(191) DEFAULT NULL,
  `post_tobebilled` varchar(191) DEFAULT NULL,
  `drug` varchar(191) DEFAULT NULL,
  `drug_remark` varchar(191) DEFAULT NULL,
  `post_detailsrange` varchar(191) DEFAULT NULL,
  `post_details_remark` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postot`
--

INSERT INTO `postot` (`id`, `post_mr_no`, `post_surgeon_name`, `post_patient_name`, `post_eye`, `post_clean_by`, `post_date`, `post_bp`, `post_bp_remark`, `post_surger_check`, `post_surger_check_remark`, `post_spotwo`, `post_spotwo_remark`, `post_hear_rate`, `post_hearrate_remark`, `post_patient_cover`, `post_patientcover_remark`, `post_patient_shoecover`, `post_patientshoecover_remark`, `post_autoclavedone`, `post_autoclavedone_remark`, `post_instrumentsterilization`, `post_instrumentsterilization_remark`, `post_ottable`, `post_foot_switch`, `post_gamachine`, `post_microscope`, `post_microscope_footswith`, `post_aircondistioner`, `post_instruments_autoclave`, `post_instruments_autoclave_remark`, `post_phaco_machine`, `post_fumigation_date`, `post_instrument_clean_by`, `post_oxygen_cylinderstatus`, `post_nurse_name`, `post_incident_remark`, `post_otconduct_remark`, `post_doctornote_remark`, `post_bloodpresure`, `post_spotwos`, `post_heartrate`, `post_followupdatecoun`, `post_followupdatedoctor`, `post_otitemsstock`, `post_secondtimeout`, `discharge`, `doesdonts`, `postotmedication`, `post_product`, `post_quantity`, `post_reusable`, `post_price`, `post_tobebilled`, `drug`, `drug_remark`, `post_detailsrange`, `post_details_remark`, `created_at`, `updated_at`) VALUES
(6, 'Patient_0017', 'Nihal Khan', 'nita barve', NULL, NULL, '2022-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', 'yes', 'no', 'no', '2', '3', '4', '2022-12-19', '2022-12-19', NULL, NULL, 'yes', 'no', 'yes', '2,5', '2,3', '3,3', '4,3', 'No,No', 'Atropine,Adrenine', 'no,yes', 'BP,SPO2', 'yes,no', '2022-12-19 01:19:53', '2022-12-19 01:19:53'),
(7, '18', '4', 'kishori', NULL, NULL, '2022-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', 'y', 'y', 'y', '7', '7', '7', '2022-12-19', '2022-12-19', NULL, NULL, '4', '4', '4', '3', '6', '7', '7', 'No', 'Atropine', 'no', 'BP', 'uy', '2022-12-19 04:29:08', '2022-12-19 04:29:08'),
(8, '13', '2', 'gunja', NULL, NULL, '2022-12-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '27', 'y', 'y', 'y', '4', '4', '4', '2022-12-19', '2022-12-19', NULL, NULL, '5', '6', '6', '7', '4', '4', '4', 'No', 'Atropine', 'yd', 'BP', 'yes', '2022-12-19 04:37:30', '2022-12-19 04:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `postotdetails`
--

CREATE TABLE `postotdetails` (
  `id` int(11) NOT NULL,
  `detail` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postotdetails`
--

INSERT INTO `postotdetails` (`id`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'BP', '2022-12-17 07:06:05', '2022-12-17 07:06:05'),
(2, 'SPO2', '2022-12-17 07:13:48', '2022-12-17 07:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `postotdrug`
--

CREATE TABLE `postotdrug` (
  `id` int(11) NOT NULL,
  `drug` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postotdrug`
--

INSERT INTO `postotdrug` (`id`, `drug`, `created_at`, `updated_at`) VALUES
(2, 'Atropine', '2022-12-19 01:03:36', '2022-12-19 01:03:36'),
(3, 'Adrenine', '2022-12-19 01:04:52', '2022-12-19 01:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `preot`
--

CREATE TABLE `preot` (
  `id` int(11) NOT NULL,
  `patientpre_name` varchar(191) NOT NULL,
  `mobile_pre` varchar(191) NOT NULL,
  `age_pre` varchar(191) NOT NULL,
  `doctor_namepre` varchar(191) NOT NULL,
  `date_pre` text NOT NULL,
  `eye_pre` varchar(191) NOT NULL,
  `surgerycategory_pre` varchar(191) NOT NULL,
  `type_pre` varchar(191) NOT NULL,
  `diabeticstatus_pre` varchar(191) NOT NULL,
  `package_pre` varchar(191) NOT NULL,
  `product_pre` varchar(191) NOT NULL,
  `product_pre_id` text NOT NULL,
  `lens_id` text NOT NULL,
  `lens_pre_name` varchar(191) NOT NULL,
  `lens_focalpoint_pre` varchar(191) NOT NULL,
  `kr_kone_pre` varchar(191) NOT NULL,
  `kr_ktwo_pre` varchar(191) NOT NULL,
  `dioapter_pre` varchar(191) NOT NULL,
  `aconstant_pre` varchar(191) NOT NULL,
  `iolpower_pre` varchar(191) NOT NULL,
  `cylvalue_pre` varchar(191) NOT NULL,
  `test_pre` varchar(191) DEFAULT NULL,
  `uploaed_pre` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preot`
--

INSERT INTO `preot` (`id`, `patientpre_name`, `mobile_pre`, `age_pre`, `doctor_namepre`, `date_pre`, `eye_pre`, `surgerycategory_pre`, `type_pre`, `diabeticstatus_pre`, `package_pre`, `product_pre`, `product_pre_id`, `lens_id`, `lens_pre_name`, `lens_focalpoint_pre`, `kr_kone_pre`, `kr_ktwo_pre`, `dioapter_pre`, `aconstant_pre`, `iolpower_pre`, `cylvalue_pre`, `test_pre`, `uploaed_pre`, `created_at`, `updated_at`, `pre_id`) VALUES
(107, 'gunja', '+919421264600', '23', '2', '2022-12-08', 'LE', 'Retina', 'PHACO', 'yes', '6788', '', '', '', '', '', '', '', '', '', '', '', 'Syringing', 'cat.jpg.jpg', '2022-12-08 03:45:34', '2022-12-08 03:45:34', 13),
(108, 'soham', '+919456565676', '34', '4', '2022-12-08', 'LE', 'Retina', 'PHACO', 'no', '3455', '', '', '', '', '', '', '', '', '', '', '', 'A Scan,APHALab Test Required', ',', '2022-12-08 07:14:51', '2022-12-08 07:34:20', 102),
(0, 'nita', '+919445678734', '56', '4', '2022-12-20', 'LE', 'Cataract', 'PHACO', 'yes', '12000', '', '', '', '', '', '', '', '', '', '', '', 'OCT,ECG', 'cat.jpg.jpg,download.jpg', '2022-12-19 23:11:31', '2022-12-19 23:11:31', 17);

-- --------------------------------------------------------

--
-- Table structure for table `preottest`
--

CREATE TABLE `preottest` (
  `id` int(11) NOT NULL,
  `testpreots` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preottest`
--

INSERT INTO `preottest` (`id`, `testpreots`, `created_at`, `updated_at`) VALUES
(1, 'ECG', '2022-12-19 22:55:16', '2022-12-19 22:55:16'),
(2, 'OCT', '2022-12-19 23:01:20', '2022-12-19 23:01:20'),
(3, 'kkkk', '2022-12-22 06:36:35', '2022-12-22 06:36:35'),
(4, 'lllll-ooooo-kkkkk', '2022-12-30 02:54:15', '2022-12-30 02:54:15'),
(5, 'ssss', '2023-02-15 06:58:24', '2023-02-15 06:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `food_allergies` varchar(191) DEFAULT NULL,
  `tendency_bleed` varchar(191) DEFAULT NULL,
  `heart_disease` varchar(191) DEFAULT NULL,
  `high_blood_pressure` varchar(191) DEFAULT NULL,
  `diabetic` varchar(191) DEFAULT NULL,
  `surgery` varchar(191) DEFAULT NULL,
  `accident` varchar(191) DEFAULT NULL,
  `others` varchar(191) DEFAULT NULL,
  `medical_history` varchar(191) DEFAULT NULL,
  `current_medication` varchar(191) DEFAULT NULL,
  `female_pregnancy` varchar(191) DEFAULT NULL,
  `breast_feeding` varchar(191) DEFAULT NULL,
  `health_insurance` varchar(191) DEFAULT NULL,
  `low_income` varchar(191) DEFAULT NULL,
  `reference` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `doctor_id`, `food_allergies`, `tendency_bleed`, `heart_disease`, `high_blood_pressure`, `diabetic`, `surgery`, `accident`, `others`, `medical_history`, `current_medication`, `female_pregnancy`, `breast_feeding`, `health_insurance`, `low_income`, `reference`, `status`, `created_at`, `updated_at`) VALUES
(0, 25, 9, 'asdf', 'sdf', 'sdf', '34', '45', 'sdfgh', 'sdf', 'dfg', 'sdfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 'dfg', 1, '2022-09-26 03:45:53', '2022-09-26 03:45:53'),
(1, 1, 1, 'eded', 'tgtg', 'edrf', 'fghj', 'sdfvgb', 'zxc', 'xcv', 'xcv', 'xcv', 'xcv', 'cvb', 'xcv', 'xcvb', 'cvb', 'cvgb', 1, '2022-04-26 03:30:04', '2022-04-26 03:30:04'),
(2, 2, 4, 'vgbh', 'gfhj', 'edrf', 'fghj', 'sdfvgb', 'iujkh', 'xcv', 'xcv', 'tgyh', 'xcv', 'cvb', 'xcv', 'xcvb', 'cvb', 'cvgb', 1, '2022-04-26 05:29:22', '2022-04-26 05:29:22'),
(4, 3, 1, 'aa', 'gg', 'll', 'kk', 'cc', 'bb', 'nn', 'vv', 'xx', 'kk', 'ww', 'xx', 'vfvf', 'zszs', 'cvgb', 1, '2022-04-26 05:35:15', '2022-04-26 05:35:15'),
(5, 2, 3, 'dddd', 'ssss', 'tttt', 'qqqq', 'zzzz', 'vvvv', 'hhhh', 'oooo', 'vvvv', 'bgbg', 'hghg', 'kiki', 'rfrf', 'vfvf', 'asas', 1, '2022-04-26 05:36:24', '2022-04-26 05:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(191) NOT NULL,
  `subcategory` varchar(191) NOT NULL,
  `product_name` varchar(191) NOT NULL,
  `hsnno` varchar(191) NOT NULL,
  `min_qty` varchar(191) NOT NULL,
  `max_qty` varchar(191) NOT NULL,
  `discount` varchar(191) NOT NULL,
  `supplier_name` varchar(191) NOT NULL,
  `cp` varchar(191) NOT NULL,
  `mrp` varchar(191) NOT NULL,
  `ref_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `created_at`, `updated_at`, `category`, `subcategory`, `product_name`, `hsnno`, `min_qty`, `max_qty`, `discount`, `supplier_name`, `cp`, `mrp`, `ref_code`) VALUES
(2, '2022-10-06 00:07:50', '2022-10-06 00:07:50', '14', '2', 'wood', '123', '5', '10', '20%', 'ujwala sharma', 'cp', '200000', '111111111111'),
(3, '2022-10-08 06:46:17', '2022-10-08 06:46:43', '12', '19', 'eqp', '12345', '5', '12', '10%', 'Gunja Gupta', 'test', '120000', '3333333'),
(4, '2022-10-08 07:33:54', '2022-10-08 07:33:54', '16', '18', 'dcfv', '123456', '23', '45', '12', 'asdf', '45', '2345', '5656'),
(5, '2022-10-28 04:24:38', '2023-02-08 06:51:28', '2', '60', 'candid', '123456', '23-77', '45-90', '8900', 'supplierone', '56', '200000', '5677'),
(6, '2022-11-17 07:51:04', '2023-02-08 06:24:12', '2', '60', 'pro one', '123456', '2-00', '2', '2', 'kirti', '20', '20000', 'PRO006'),
(7, '2022-11-23 03:20:27', '2022-11-23 03:20:27', '1', '2', 'pro_doctor_analysis', '123456', '23', '45', '2400', 'kishori', '23', '150000', 'PRO007'),
(8, '2022-11-23 04:15:59', '2022-11-23 04:15:59', '1', '19', 'OPD/Consultation Review Paid', '1231', '2', '2', '23', 'yasha', '23', '150', 'PRO008');

-- --------------------------------------------------------

--
-- Table structure for table `product_po`
--

CREATE TABLE `product_po` (
  `id` int(20) NOT NULL,
  `products` varchar(100) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `vendors` varchar(20) DEFAULT NULL,
  `mrp` varchar(30) DEFAULT NULL,
  `hsn` varchar(30) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `current_qty` varchar(30) DEFAULT NULL,
  `minimum_qty` varchar(30) DEFAULT NULL,
  `maximum_qty` varchar(30) DEFAULT NULL,
  `po_qty` varchar(30) DEFAULT NULL,
  `cost` varchar(30) DEFAULT NULL,
  `expected_sale` varchar(30) DEFAULT NULL,
  `last_30_days` varchar(30) DEFAULT NULL,
  `last_90_days` varchar(30) DEFAULT NULL,
  `product_id` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `model_no` varchar(30) DEFAULT NULL,
  `make` varchar(30) DEFAULT NULL,
  `material` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `shape` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `total_cost` varchar(30) NOT NULL,
  `coating` varchar(30) NOT NULL,
  `vision` varchar(30) NOT NULL,
  `diameter` varchar(30) NOT NULL,
  `fitting_height` varchar(30) NOT NULL,
  `frame_a` varchar(30) NOT NULL,
  `frame_b` varchar(30) NOT NULL,
  `frame_dbl` varchar(30) NOT NULL,
  `pack_size` varchar(30) NOT NULL,
  `lens_name` varchar(30) NOT NULL,
  `lens_point` varchar(30) NOT NULL,
  `kr_k1` varchar(30) NOT NULL,
  `kr_k2` varchar(30) NOT NULL,
  `diaopter` varchar(30) NOT NULL,
  `constant` varchar(30) NOT NULL,
  `iol_power` varchar(30) NOT NULL,
  `cyl_value` varchar(30) NOT NULL,
  `supply_date` varchar(30) NOT NULL,
  `product_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '"1" = Appove , "0" = Deny',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_po`
--

INSERT INTO `product_po` (`id`, `products`, `date`, `category`, `vendors`, `mrp`, `hsn`, `size`, `current_qty`, `minimum_qty`, `maximum_qty`, `po_qty`, `cost`, `expected_sale`, `last_30_days`, `last_90_days`, `product_id`, `brand`, `model_no`, `make`, `material`, `gender`, `shape`, `color`, `total_cost`, `coating`, `vision`, `diameter`, `fitting_height`, `frame_a`, `frame_b`, `frame_dbl`, `pack_size`, `lens_name`, `lens_point`, `kr_k1`, `kr_k2`, `diaopter`, `constant`, `iol_power`, `cyl_value`, `supply_date`, `product_status`, `created_at`, `updated_at`) VALUES
(11, '2', '2022-10-27', '14', '11     ', '120000      ', '12345      ', '56 ', 'vvv', '5', '12', '1    ', '120000 ', '9', NULL, '9', 'eqp     ', '', '', ' ', ' ', ' ', ' ', '  ', '  ', '', ' ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2022-10-27 12:43:20', '2022-10-25 07:31:11'),
(13, '2', '2022-10-27', '14', '13     ', '200000      ', '123      ', '0.00 ', '1', 'null', 'null', '1    ', '200000 ', 'bbbb', NULL, '99', 'wood     ', '', '', ' ', ' ', ' ', ' ', '  ', '  ', '', ' ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2022-10-27 12:43:28', '2022-10-26 02:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `radiology_categories`
--

CREATE TABLE `radiology_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiology_categories`
--

INSERT INTO `radiology_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'aaa', '2022-04-27 01:04:39', '2022-04-27 01:04:39'),
(2, 'cvdf', '2022-04-27 01:06:41', '2022-04-27 01:06:41'),
(3, 'ujj', '2022-04-27 01:06:46', '2022-04-27 01:06:46'),
(4, 'msmssmmsmmsmms', '2022-04-28 04:42:00', '2022-04-28 04:42:00'),
(0, 'ghgj', '2023-01-26 23:52:46', '2023-01-26 23:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `radiology_tests`
--

CREATE TABLE `radiology_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_name` varchar(191) NOT NULL,
  `short_name` varchar(191) NOT NULL,
  `test_type` varchar(191) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory` varchar(191) DEFAULT NULL,
  `report_days` int(11) DEFAULT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `standard_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiology_tests`
--

INSERT INTO `radiology_tests` (`id`, `test_name`, `short_name`, `test_type`, `category_id`, `subcategory`, `report_days`, `charge_category_id`, `standard_charge`, `created_at`, `updated_at`) VALUES
(1, 'Xray one', 'HB', 'df', 4, 'df', 2, 4, 345678, '2022-04-28 04:43:00', '2022-04-28 04:43:00'),
(2, 'aazazaz', 'ttttt', 'dffdfffdfd', 2, 'iiii', 2, 3, 345678, '2022-04-28 04:45:10', '2022-04-28 04:45:10'),
(3, 'sdf', 'ddf', 'dffdfffdfd', 3, 'df', 1, 1, 345678, '2022-04-28 04:45:45', '2022-04-28 04:45:45'),
(0, 'fgh', 'gjhkh', '12', 1, 'trffh', 1, 4, 345678, '2023-01-26 23:53:28', '2023-01-26 23:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 99, '2022-12-07 04:21:16', '2022-12-07 04:21:16'),
(1, 34, '2022-04-27 00:57:52', '2022-04-27 00:57:52'),
(2, 36, '2022-04-27 01:01:47', '2022-04-27 01:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `reportdata`
--

CREATE TABLE `reportdata` (
  `transaction_type` varchar(255) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `patient_code` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `select_category` varchar(255) NOT NULL,
  `for_investigation` varchar(255) NOT NULL,
  `investigation` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rolemaster`
--

CREATE TABLE `rolemaster` (
  `id` int(191) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `role_description` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` enum('Y','N') DEFAULT 'N' COMMENT 'Y = Admin, N = Not Admin	',
  `system_list` varchar(191) DEFAULT NULL COMMENT 'system allowed',
  `commonmaster_list` varchar(191) DEFAULT NULL COMMENT 'Master Access allowed',
  `productmaster_list` varchar(191) DEFAULT NULL COMMENT 'Product Master Access allowed',
  `supplychain_list` varchar(191) DEFAULT NULL COMMENT '"Supply chain"',
  `transactionmaster_list` varchar(191) DEFAULT NULL COMMENT 'Transactions Selected	',
  `hrmmaster_list` varchar(191) DEFAULT NULL COMMENT 'Selected HRM',
  `masters_list` varchar(191) DEFAULT NULL COMMENT 'Master Access allowed	',
  `doctor_list` varchar(191) DEFAULT NULL COMMENT 'Selected Doctor',
  `lab_list` varchar(191) DEFAULT NULL COMMENT 'Selected Lab',
  `patient_list` varchar(191) DEFAULT NULL COMMENT 'Selected Patient',
  `bloodbank_list` varchar(191) DEFAULT NULL COMMENT 'Selected Blood Bank',
  `bed_list` text DEFAULT NULL COMMENT 'Selected Bed Management',
  `reports_list` varchar(191) DEFAULT NULL COMMENT 'Reports allowed',
  `services_list` varchar(191) DEFAULT NULL COMMENT 'Services allowed',
  `frontcms_list` varchar(191) DEFAULT NULL COMMENT 'Front CMS allowed',
  `smsmail_list` varchar(191) DEFAULT NULL COMMENT 'SMS Mail allowed',
  `documents_list` varchar(191) DEFAULT NULL COMMENT 'Document allowed',
  `diagnosis_list` varchar(191) DEFAULT NULL COMMENT 'Diagnosis allowed',
  `hospitalcharges_list` varchar(191) DEFAULT NULL COMMENT 'Hospital Charges allowed',
  `finance_list` varchar(191) DEFAULT NULL COMMENT 'finance allowed',
  `frontoffice_list` varchar(191) DEFAULT NULL COMMENT 'Front Office allowed',
  `setting_list` varchar(191) DEFAULT NULL COMMENT 'setting allowed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rolemaster`
--

INSERT INTO `rolemaster` (`id`, `employee_id`, `role_description`, `status`, `created_at`, `updated_at`, `is_admin`, `system_list`, `commonmaster_list`, `productmaster_list`, `supplychain_list`, `transactionmaster_list`, `hrmmaster_list`, `masters_list`, `doctor_list`, `lab_list`, `patient_list`, `bloodbank_list`, `bed_list`, `reports_list`, `services_list`, `frontcms_list`, `smsmail_list`, `documents_list`, `diagnosis_list`, `hospitalcharges_list`, `finance_list`, `frontoffice_list`, `setting_list`) VALUES
(7, 0, 'Patient', 'Enable', '2022-12-26 23:18:51', '2022-12-26 23:18:51', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(8, 0, 'Nurse', 'Enable', '2022-12-26 23:19:11', '2022-12-26 23:19:11', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(9, 0, 'Receptionist', 'Enable', '2022-12-26 23:20:07', '2022-12-26 23:20:07', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(10, 0, 'Pharmacist', 'Enable', '2022-12-26 23:20:27', '2022-12-26 23:20:27', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(11, 0, 'Accountant', 'Enable', '2022-12-26 23:20:58', '2022-12-26 23:20:58', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(12, 0, 'Case Manager', 'Enable', '2022-12-26 23:21:38', '2022-12-26 23:21:38', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(13, 0, 'Lab Technician', 'Enable', '2022-12-26 23:22:02', '2022-12-26 23:22:02', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', NULL, '', NULL, NULL, NULL, NULL),
(138, 0, 'jhk', 'Enable', '2023-01-05 07:32:17', '2023-01-05 07:32:17', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', 'BT,BD', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(139, 0, 'cvvv', 'Enable', '2023-01-05 22:45:13', '2023-01-05 22:45:13', 'N', 'LM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(140, 0, 'kjk-jhkhjhkh', 'Enable', '2023-01-05 23:41:31', '2023-01-06 03:21:28', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', 'BT,BD', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(141, 0, 'fff', 'Enable', '2023-01-07 05:26:23', '2023-01-07 05:26:23', 'N', 'LM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, 0, 'vvv', 'Enable', '2023-01-13 01:54:24', '2023-01-13 01:54:24', 'N', 'LM', 'LP', '', 'VPO,NPPO', 'HI,AP,SD', 'UM,LEM,AL,AM,PM', 'PREOT,DA', '', 'RC,RT,PC', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(143, 0, 'testing1', 'Enable', '2023-01-17 01:26:59', '2023-01-17 01:26:59', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', 'BT,BD', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(144, 0, 'testttt', 'Enable', '2023-01-18 00:09:57', '2023-01-18 00:09:57', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', 'BT,BD', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(146, 0, 'hjhjjhjh', 'Enable', '2023-01-18 02:11:14', '2023-01-18 02:11:14', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(147, 0, 'ffffoooo', 'Enable', '2023-01-18 02:15:05', '2023-01-18 02:15:05', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(148, 0, 'khjk', 'Enable', '2023-01-18 02:31:32', '2023-01-18 02:31:32', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(149, 0, 'ggggggggggg', 'Enable', '2023-01-18 03:19:29', '2023-01-18 03:19:29', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(150, 0, 'fhghhgjgjhkh', 'Enable', '2023-01-18 04:10:57', '2023-01-18 04:10:57', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', NULL, 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(151, 0, 'saaaaa', 'Enable', '2023-01-18 23:14:47', '2023-01-18 23:14:47', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(152, 0, 'jjj', 'Enable', '2023-01-18 23:15:18', '2023-01-18 23:15:18', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(153, 0, 'jjjjjjjj-ppppp', 'Enable', '2023-01-18 23:38:43', '2023-01-18 23:38:43', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(154, 0, 'ccccccccccc-ppp', 'Enable', '2023-01-19 00:10:48', '2023-01-19 00:10:48', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(155, 0, 'xdcfg', 'Enable', '2023-01-19 00:12:07', '2023-01-19 00:12:07', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(156, 0, 'kkkkkkk', 'Enable', '2023-01-19 00:27:15', '2023-01-19 00:27:15', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(157, 0, 'kkkkkkk', 'Enable', '2023-01-19 00:27:54', '2023-01-19 00:27:54', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(158, 0, 'sss', 'Enable', '2023-01-19 00:57:05', '2023-01-19 00:57:05', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 0, 'ggjgjg', 'Enable', '2023-01-19 01:13:51', '2023-01-19 01:13:51', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(160, 0, 'gggg', 'Disable', '2023-01-19 01:28:17', '2023-01-19 01:28:17', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(161, 0, 'ddddddd', 'Enable', '2023-01-19 04:07:57', '2023-01-19 04:07:57', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS'),
(162, 0, 'kujk', 'Enable', '2023-01-19 06:44:27', '2023-01-19 06:44:27', 'Y', 'LM,RM', 'LP,TICKMA,APP,NUR', 'TM,PRO,CATEG,SUBCATEG', 'VPO,NPPO,VR', 'HI,AP,IP,SD,PB', 'UM,LEM,AL,AM,PM', 'CE,PREOT,POSTOT,DA', 'DOCT,DD,SCH', 'RC,RT,PC,PT', 'PF,PATI,PA', 'BB,BDO,BDS,BI', '', 'BR,DR,IR,OR', 'AMBU,AC,LT', 'CM,FCS,NB,TESTI', 'SM,MAI', 'DOC,DT', 'DC,DIAT,ENQ', 'CC,CHA,DOCHARG', 'IN,EX', 'CL,VIS,PR,PD', 'GEN,HS,SS');

-- --------------------------------------------------------

--
-- Table structure for table `roles_master_list`
--

CREATE TABLE `roles_master_list` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `short_form` varchar(56) NOT NULL,
  `type` varchar(250) NOT NULL,
  `created_on` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles_master_list`
--

INSERT INTO `roles_master_list` (`id`, `title`, `short_form`, `type`, `created_on`) VALUES
(1, 'Location Master', 'lm', 'System', 1627708797),
(2, 'Counsellor Entry', 'ce', 'Masters', 1627708797),
(3, 'Pre OT ', 'preot', 'Masters', 1627708797),
(4, 'Post OT ', 'postot', 'Masters', 1627708797),
(5, 'Doctor Analysis', 'da', 'Masters', 1627708797),
(6, 'Radiology Categories ', 'rc', 'Lab', 1627708797),
(7, 'Radiology Tests', 'rt', 'Lab', 1627708797),
(8, 'Pathology Categories', 'pc', 'Lab', 1627708797),
(9, 'Pathology Tests ', 'pt', 'Lab', 1627708797),
(10, 'Live Patients ', 'lp', 'Common Master', 1627708797),
(11, 'TPA Master', 'tm', 'Product Master', 1627708797),
(12, 'User ', 'um', 'HRM', 1627708797),
(13, 'Leave Master', 'lem', 'HRM', 1627708797),
(14, 'Allow Leave', 'al', 'HRM', 1627708797),
(15, 'Attendance Master', 'am', 'HRM', 1627708797),
(16, 'Payroll Master', 'pm', 'HRM', 1627708797),
(17, 'Hospital Invoice', 'hi', 'Transaction Master', 1627708797),
(18, 'Advanced Payment', 'ap', 'Transaction Master', 1627708797),
(19, 'Ipd Patient', 'ip', 'Transaction Master', 1627708797),
(20, 'Security Deposite', 'sd', 'Transaction Master', 1627708797),
(21, 'Vendor PO', 'vpo', 'Supply Chain', 1627708797),
(22, 'New Product PO', 'nppo', 'Supply Chain', 1627708797),
(23, 'Ticket Master', 'tickma', 'Common Master', 1627708797),
(24, 'Pharmacy Bill ', 'pb', 'Transaction Master', 1627708797),
(25, 'Vendor Registration', 'vr', 'Supply Chain', 1627708797),
(26, 'Patient Feedback', 'pf', 'Patient', 1627708797),
(27, 'Appointment', 'app', 'Common Master', 1648709087),
(28, 'Product', 'pro', 'Product Master', 1648709087),
(29, 'Category', 'categ', 'Product Master', 1648709087),
(30, 'Subcategory', 'subcateg', 'Product Master', 1648709087),
(31, 'Bed Type', 'bt', 'Bed Management ', 1648709087),
(34, 'Bed', 'bd', 'Bed Management ', 1648709089),
(35, 'Blood Bank', 'bb', 'Blood Bank', 1648709090),
(36, 'Blood Doners', 'bdo', 'Blood Bank', 0),
(37, 'Blood Donations', 'bds', 'Blood Bank', 0),
(38, 'Blood Ishue', 'bi', 'Blood Bank', 0),
(39, 'Document', 'doc', 'Documents', 0),
(40, 'Document Type', 'dt', 'Documents', 0),
(41, 'Doctor', 'doct', 'Doctor', 0),
(42, 'Doctor Departments', 'dd', 'Doctor', 0),
(44, 'Schedule', 'sch', 'Doctor', 0),
(45, 'Diagnosis Categories', 'dc', 'Diagnosis', 0),
(46, 'Diagnosis Tests', 'diat', 'Diagnosis', 0),
(47, 'Enquiries', 'enq', 'Diagnosis', 0),
(48, 'Incomes', 'in', 'Finance', 0),
(49, 'Expneses', 'ex', 'Finance', 0),
(50, 'Call Logs', 'cl', 'Front Office', 0),
(51, 'Visitors', 'vis', 'Front Office', 0),
(52, 'Postal Receive', 'pr', 'Front Office', 0),
(53, 'Postal Dispatch', 'pd', 'Front Office', 0),
(54, 'CMS', 'cm', 'Front CMS', 0),
(55, 'Front CMS Services', 'fcs', 'Front CMS', 0),
(56, 'Notice Boards', 'nb', 'Front CMS', 0),
(57, 'Testimonials', 'testi', 'Front CMS', 0),
(58, 'Charge Categories', 'cc', 'Hospital Charges', 0),
(59, 'Charges', 'cha', 'Hospital Charges', 0),
(60, 'Doctor OPD Charges', 'docharg', 'Hospital Charges', 0),
(61, 'Nurses', 'nur', 'Common Master', 0),
(62, 'Patients', 'pati', 'Patient', 0),
(65, 'Patient Admissions', 'pa', 'Patient', 0),
(66, 'Birth Reports', 'br', 'Reports', 0),
(67, 'Death Reports', 'dr', 'Reports', 0),
(68, 'Investigation Reports', 'ir', 'Reports', 0),
(69, 'Operation Reports', 'or', 'Reports', 0),
(70, 'Ambulances', 'ambu', 'Services', 0),
(71, 'Ambulance Calls', 'ac', 'Services', 0),
(72, 'Lab Technicians', 'lt', 'Services', 0),
(73, 'Role Master', 'rm', 'System', 0),
(74, 'sms', 'sm', 'SMS/Mail', 0),
(75, 'Mail', 'mai', 'SMS/Mail', 0),
(76, 'General', 'gen', 'Setting', 0),
(77, 'Hospital Schedule', 'hs', 'Setting', 0),
(78, 'Sidebar Setting', 'ss', 'Setting', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_submenu_list`
--

CREATE TABLE `role_submenu_list` (
  `id` int(11) NOT NULL,
  `per_ref_id` int(11) NOT NULL,
  `lm_actions` text DEFAULT NULL,
  `ce_actions` text DEFAULT NULL,
  `preot_actions` text DEFAULT NULL,
  `postot_actions` text DEFAULT NULL,
  `da_actions` text DEFAULT NULL,
  `rc_actions` text DEFAULT NULL,
  `rt_actions` text DEFAULT NULL,
  `pc_actions` text DEFAULT NULL,
  `pt_actions` text DEFAULT NULL,
  `lp_actions` text DEFAULT NULL,
  `tm_actions` text DEFAULT NULL,
  `um_actions` text DEFAULT NULL,
  `lem_actions` text DEFAULT NULL,
  `al_actions` text DEFAULT NULL,
  `am_actions` text DEFAULT NULL,
  `pm_actions` text DEFAULT NULL,
  `hi_actions` text DEFAULT NULL,
  `ap_actions` text DEFAULT NULL,
  `ipp_actions` text DEFAULT NULL,
  `sd_actions` text DEFAULT NULL,
  `vpo_actions` text DEFAULT NULL,
  `nppo_actions` text DEFAULT NULL,
  `tickma_actions` text DEFAULT NULL,
  `pb_actions` text DEFAULT NULL,
  `vr_actions` text DEFAULT NULL,
  `pf_actions` text DEFAULT NULL,
  `app_actions` text DEFAULT NULL,
  `pro_actions` text DEFAULT NULL,
  `categ_actions` text DEFAULT NULL,
  `subcateg_actions` text DEFAULT NULL,
  `bt_actions` text DEFAULT NULL,
  `bd_actions` text DEFAULT NULL,
  `bb_actions` text DEFAULT NULL,
  `bdo_actions` text DEFAULT NULL,
  `bds_actions` text DEFAULT NULL,
  `bi_actions` text DEFAULT NULL,
  `doc_actions` text DEFAULT NULL,
  `dt_actions` text DEFAULT NULL,
  `doct_actions` text DEFAULT NULL,
  `dd_actions` text DEFAULT NULL,
  `sch_actions` text DEFAULT NULL,
  `dc_actions` text DEFAULT NULL,
  `diat_actions` text DEFAULT NULL,
  `enq_actions` text DEFAULT NULL,
  `in_actions` text DEFAULT NULL,
  `ex_actions` text DEFAULT NULL,
  `cl_actions` text DEFAULT NULL,
  `vis_actions` text DEFAULT NULL,
  `pr_actions` text DEFAULT NULL,
  `pd_actions` text DEFAULT NULL,
  `cm_actions` text DEFAULT NULL,
  `fcs_actions` text DEFAULT NULL,
  `nb_actions` text DEFAULT NULL,
  `testi_actions` text DEFAULT NULL,
  `cc_actions` text DEFAULT NULL,
  `cha_actions` text DEFAULT NULL,
  `docharg_actions` text DEFAULT NULL,
  `nur_actions` text DEFAULT NULL,
  `pati_actions` text DEFAULT NULL,
  `pa_actions` text DEFAULT NULL,
  `br_actions` text DEFAULT NULL,
  `dr_actions` text DEFAULT NULL,
  `ir_actions` text DEFAULT NULL,
  `or_actions` text DEFAULT NULL,
  `ambu_actions` text DEFAULT NULL,
  `ac_actions` text DEFAULT NULL,
  `lt_actions` text DEFAULT NULL,
  `rm_actions` text DEFAULT NULL,
  `sm_actions` text DEFAULT NULL,
  `mai_actions` text DEFAULT NULL,
  `gen_actions` text DEFAULT NULL,
  `hs_actions` text DEFAULT NULL,
  `ss_actions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_submenu_list`
--

INSERT INTO `role_submenu_list` (`id`, `per_ref_id`, `lm_actions`, `ce_actions`, `preot_actions`, `postot_actions`, `da_actions`, `rc_actions`, `rt_actions`, `pc_actions`, `pt_actions`, `lp_actions`, `tm_actions`, `um_actions`, `lem_actions`, `al_actions`, `am_actions`, `pm_actions`, `hi_actions`, `ap_actions`, `ipp_actions`, `sd_actions`, `vpo_actions`, `nppo_actions`, `tickma_actions`, `pb_actions`, `vr_actions`, `pf_actions`, `app_actions`, `pro_actions`, `categ_actions`, `subcateg_actions`, `bt_actions`, `bd_actions`, `bb_actions`, `bdo_actions`, `bds_actions`, `bi_actions`, `doc_actions`, `dt_actions`, `doct_actions`, `dd_actions`, `sch_actions`, `dc_actions`, `diat_actions`, `enq_actions`, `in_actions`, `ex_actions`, `cl_actions`, `vis_actions`, `pr_actions`, `pd_actions`, `cm_actions`, `fcs_actions`, `nb_actions`, `testi_actions`, `cc_actions`, `cha_actions`, `docharg_actions`, `nur_actions`, `pati_actions`, `pa_actions`, `br_actions`, `dr_actions`, `ir_actions`, `or_actions`, `ambu_actions`, `ac_actions`, `lt_actions`, `rm_actions`, `sm_actions`, `mai_actions`, `gen_actions`, `hs_actions`, `ss_actions`) VALUES
(1, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(5, 0, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(6, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(8, 135, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(9, 136, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(10, 137, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(11, 138, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(12, 139, 'V,A', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(13, 140, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(14, 141, 'V,A,U', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(15, 142, 'V,A', '0', 'A,U,D', '0', 'A,U', 'D', 'V', 'A,P', '0', 'U,D', '0', 'D,P', 'U', 'U', 'V,A,U', 'A,U,D', 'U,D,P', 'V,A,U,D', 'A,U,D,P', 'A', 'V,A', 'V,A,U', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(16, 143, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(17, 144, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(18, 145, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(19, 146, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(20, 147, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(21, 148, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(22, 149, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(23, 150, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(24, 151, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(25, 152, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(26, 153, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(27, 154, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(28, 155, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(29, 158, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'V,A,U,D,P', NULL, NULL, NULL, NULL, NULL),
(30, 159, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(31, 160, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(32, 161, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P'),
(33, 162, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', NULL, NULL, 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P', 'V,A,U,D,P');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `per_patient_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_days`
--

CREATE TABLE `schedule_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `available_on` varchar(191) NOT NULL,
  `available_from` time NOT NULL,
  `available_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `securitydeposite`
--

CREATE TABLE `securitydeposite` (
  `id` int(11) NOT NULL,
  `patientsecurity_name` varchar(191) NOT NULL,
  `receipt_name` varchar(191) NOT NULL,
  `ammount_security` varchar(191) NOT NULL,
  `date` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `securitydeposite`
--

INSERT INTO `securitydeposite` (`id`, `patientsecurity_name`, `receipt_name`, `ammount_security`, `date`, `created_at`, `updated_at`) VALUES
(2, '17', 'RECEIPT_NO_002', '23', '2022-12-13', '2022-12-13 01:44:17', '2022-12-13 02:04:28'),
(3, '18', 'RECEIPT_NO_003', '240000', '2022-12-13', '2022-12-13 02:04:06', '2022-12-13 02:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `quantity`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sssss', 'dfg sdf sdf', 234, 4567, 1, '2022-04-27 01:14:59', '2022-04-27 01:14:59'),
(2, 'yyyyyy', 'dfg sd sd', 345, 3434, 1, '2022-04-27 01:16:27', '2022-04-27 01:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'HMS', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(2, 'app_logo', 'http://infy-hms.test/web/img/logo.jpg', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(3, 'company_name', 'InfyOmLabs', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(4, 'current_currency', 'inr', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(5, 'hospital_address', '16/A saint Joseph Park', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(6, 'hospital_email', 'cityhospital@gmail.com', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(7, 'hospital_phone', '+919876543210', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(8, 'hospital_from_day', 'Mon to Fri', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(9, 'hospital_from_time', '9 AM to 9 PM', '2022-03-02 01:48:41', '2022-03-02 01:48:41'),
(10, 'favicon', 'http://infy-hms.test/web/img/favicon.png', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(11, 'facebook_url', 'https://www.facebook.com/infyom/', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(12, 'twitter_url', 'https://twitter.com/infyom?lang=en', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(13, 'instagram_url', 'https://www.instagram.com/?hl=en', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(14, 'linkedIn_url', 'https://www.linkedin.com/organization-guest/company/infyom-technologies?challengeId=AQFgQaMxwSxCdAAAAXOA_wosiB2vYdQEoITs6w676AzV8cu8OzhnWEBNUQ7LCG4vds5-A12UIQk1M4aWfKmn6iM58OFJbpoRiA&submissi', '2022-03-02 01:48:42', '2022-03-02 01:48:42'),
(15, 'about_us', 'Over past 10+ years of experience and skills in various technologies, we built great scalable products.\nWhatever technology we worked with, we just not build products for our clients but we a', '2022-03-02 01:48:42', '2022-03-02 01:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_to` bigint(20) UNSIGNED DEFAULT NULL,
  `region_code` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `send_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `statecode_gst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `status`, `statecode_gst`) VALUES
(1, 'Andaman and Nicobar Islands', 101, 1, 35),
(2, 'Andhra Pradesh', 101, 1, 28),
(3, 'Arunachal Pradesh', 101, 1, 12),
(4, 'Assam', 101, 1, 18),
(5, 'Bihar', 101, 1, 10),
(6, 'Chandigarh', 101, 1, 4),
(7, 'Chhattisgarh', 101, 1, 0),
(8, 'Dadra and Nagar Haveli', 101, 1, 26),
(9, 'Daman and Diu', 101, 1, 25),
(10, 'Delhi', 101, 1, 7),
(11, 'Goa', 101, 1, 30),
(12, 'Gujarat', 101, 1, 24),
(13, 'Haryana', 101, 1, 6),
(14, 'Himachal Pradesh', 101, 1, 2),
(15, 'Jammu and Kashmir', 101, 1, 1),
(16, 'Jharkhand', 101, 1, 20),
(17, 'Karnataka', 101, 1, 29),
(18, 'Kenmore', 101, 1, 0),
(19, 'Kerala', 101, 1, 32),
(20, 'Lakshadweep', 101, 1, 0),
(21, 'Madhya Pradesh', 101, 1, 23),
(22, 'Maharashtra', 101, 1, 27),
(23, 'Manipur', 101, 1, 14),
(24, 'Meghalaya', 101, 1, 17),
(25, 'Mizoram', 101, 1, 15),
(26, 'Nagaland', 101, 1, 13),
(27, 'Narora', 101, 1, 0),
(28, 'Natwar', 101, 1, 0),
(29, 'Odisha', 101, 1, 21),
(30, 'Paschim Medinipur', 101, 1, 0),
(31, 'Pondicherry', 101, 1, 34),
(32, 'Punjab', 101, 1, 3),
(33, 'Rajasthan', 101, 1, 8),
(34, 'Sikkim', 101, 1, 11),
(35, 'Tamil Nadu', 101, 1, 33),
(36, 'Telangana', 101, 1, 36),
(37, 'Tripura', 101, 1, 16),
(38, 'Uttar Pradesh', 101, 1, 9),
(39, 'Uttarakhand', 101, 1, 5),
(40, 'Vaishali', 101, 1, 0),
(41, 'West Bengal', 101, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(200) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_name`, `category`, `updated_at`, `created_at`) VALUES
(1, 'SA', 23, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(2, 'BT', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(3, 'LA', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(4, 'LB', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(5, 'LC', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(6, 'LD', 10, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(7, 'LE', 8, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(8, 'LF', 18, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(9, 'LG', 22, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(10, 'LK', 8, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(11, 'LL', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(12, 'LM', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(13, 'LN', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(14, '7L', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(15, '8L', 30, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(16, 'CLY', 9, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(17, 'BD', 18, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(18, 'BF', 21, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(19, 'BN', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(20, 'BO', 28, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(21, 'BQ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(22, 'BT', 32, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(23, 'SB', 34, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(24, 'SD', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(25, 'SI', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(26, 'SJ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(27, 'SO', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(28, 'SP', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(29, 'SQ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(30, 'SR', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(31, 'ST', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(32, 'SU', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(33, 'LA', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(34, 'LB', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(35, 'LC', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(36, 'LD', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(37, 'LE', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(38, 'LF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(39, 'LG', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(40, 'LH', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(41, 'LI', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(42, 'LJ', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(43, 'LK', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(44, 'LL', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(45, 'LM', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(46, 'LN', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(47, 'LAF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(48, 'LBF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(49, 'LCF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(50, 'LEF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(51, 'LFF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(52, 'LFG', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(53, 'LHF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(54, 'LIF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(55, 'LJF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(56, 'LKF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(57, 'LLF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(58, 'LMF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(59, 'LNF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(60, '7E', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(61, '7G', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(62, '7I', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(63, '7J', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(64, '7K', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(65, '7L', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(66, '7V', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(67, '4N', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(68, '4O', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(69, '4O', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(70, '4P', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(71, '4O', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(72, '4Q', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(73, '4R', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(74, '4S', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(75, '4T', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(76, '4U', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(77, '4V', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(78, '4W', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(79, 'AR', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(80, 'AT', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(81, 'AU', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(82, 'AV', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(83, 'AW', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(84, 'AZ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(85, 'BA', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(86, 'BD', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(87, 'BE', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(88, 'BF', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(89, 'BH', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(90, 'BI', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(91, 'BJ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(92, 'BK', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(93, 'BL', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(94, 'BM', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(95, 'BN', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(96, 'BO', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(97, 'BP', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(98, 'BQ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(99, 'BT', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(100, 'SB', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(101, 'SD', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(102, 'ZC', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(103, 'ZV', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(104, '4M', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(105, '8K', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(106, '8L', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(107, '8N', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(108, '8O', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(109, '8P', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(110, '8Q', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(111, '8R', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(112, '8S', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(113, 'LDF', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(114, 'SPW', 5, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(115, '4C', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(116, '4D', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(117, '4E', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(118, '4F', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(119, '4I', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(120, '4J', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(121, '4K', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(122, '7D', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(123, '7F', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(124, '7H', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(125, '7W', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(126, '7X', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(127, '7Y', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(128, 'SN', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(129, 'SP', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(130, 'SU', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(131, 'SV', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(132, '7A', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(133, '7B', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(134, '7C', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(135, '7D', 2, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(136, '8I', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(137, '8M', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(138, '4A', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(139, '4B', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(140, '4C', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(141, '4D', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(142, '4E', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(143, '4F', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(144, '4G', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(145, '4H', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(146, '4I', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(147, '4L', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(148, '4Y', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(149, '4Z', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(150, 'DH', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(151, 'EE', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(152, 'EJ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(153, 'EK', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(154, 'EL', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(155, 'EO', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(156, 'EP', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(157, 'EQ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(158, 'ER', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(159, 'ET', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(160, 'EU', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(161, 'SB', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(162, 'SD', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(163, 'UJ', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(164, 'UL', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(165, 'UN', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(166, 'UO', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(167, 'UP', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(168, 'US', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(169, 'UT', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(170, 'T', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(171, 'X', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(172, 'Y', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(173, 'Q', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(174, 'M', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(175, '9F', 4, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(176, 'CLY', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(177, 'MIC', 4, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(178, '8T', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(179, '9E', 4, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(180, 'DJ', 7, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(181, 'SW', 1, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(182, 'Cataract', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(183, 'Retina', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(184, 'Glaucoma', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(185, 'Lasik', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(186, 'General Eye Checkup', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(187, 'Diagnostic', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(188, 'Refraction', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(189, 'Foreign Body', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(190, 'Injury', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(191, 'Pre Employment', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(192, 'Others', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(193, 'Others', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(194, 'Cornea-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(195, 'Cataract-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(196, 'Retina-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(197, 'Foreign Body-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(198, 'Glaucoma-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(199, 'Lasik-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(200, 'Others-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(201, 'Contact Lens Trial', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(202, 'Eye Drops-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(203, 'Eye Ointment-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(204, 'Tablet-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(205, 'Capsules-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(206, 'Syrup-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(207, 'Lidwipes-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(208, 'Squint-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(209, 'Cataract-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(210, 'Cornea-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(211, 'Glaucoma-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(212, 'IPCL-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(213, 'Lasik-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(214, 'Oculoplasty-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(215, 'Others-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(216, 'Retina-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(217, 'Retinal Injection-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(218, 'Squint-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(219, 'Others-CL', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(220, 'Strips-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(221, 'Spherical-CL', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(222, 'Toric-CL', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(223, 'Color Lens-CL', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(224, 'Multifocal-CL', 3, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(225, 'Injection Solutions-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(226, 'Others-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(227, 'Privilege Card-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(228, 'Lab Test-D', 18, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(229, 'Eyelid-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(230, 'Cornea', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(231, 'Gummies-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(232, 'UVEA-D', 13, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(233, 'SOLUTION-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(234, 'Blades-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(235, 'SUTURES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(236, 'I/V CANNULAS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(237, 'SOLUTIONS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(238, 'INJECTION SOLUTIONS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(239, 'EYE DROPS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(240, 'OILS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(241, 'CASSETTES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(242, 'GOGGLES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(243, 'GASES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(244, 'CARDS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(245, 'DISTILLED WATER-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(246, 'CAPSULES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(247, 'TABLETS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(248, 'DRAPES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(249, 'ET TUBES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(250, 'GLOVES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(251, 'TAPES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(252, 'NEEDLES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(253, 'OINTMENTS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(254, 'SYRINGS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(255, 'TUBES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(256, 'Pterygium', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(257, 'Pterygium-S', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(258, 'EYE WIPES-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(259, 'OPD Minor Procedure', 17, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(260, 'OTHERS-OT', 16, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(261, 'Accessories-P', 14, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(262, 'Glaucoma-OMP', 17, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(263, 'Cornea-OMP', 17, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(264, 'Squint', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(265, 'Registration', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(266, 'Post Operative Follow Up', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(267, 'Review', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(268, 'Saathi', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(269, 'Cataract-SR', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(270, 'Occuloplasty', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(271, 'Pterygium', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(272, 'PCO (Posterior Capsular Opacity)', 12, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(273, 'ddd', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(274, 'ok', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(275, 'kkk', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(276, 'ok', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(277, 'nik', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(278, 'nik', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(279, 'ashwini', 15, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(280, 'nik', 0, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(281, 'EYE DROPS', 19, '2022-10-27 07:22:01', '2022-10-27 07:22:01'),
(284, 'vvvvvvv', 18, '2022-10-27 02:51:33', '2022-10-27 02:51:33'),
(285, 'SA-lllll', 23, '2022-11-05 07:26:27', '2022-11-05 07:26:27'),
(286, 'vvvvvvv-kkkkk', 18, '2022-11-05 07:26:53', '2022-11-05 07:26:53'),
(287, 'SA-oooo', 23, '2022-11-05 07:28:09', '2022-11-05 07:28:09'),
(288, 'SA2', 23, '2022-11-05 07:32:27', '2022-11-05 07:32:27'),
(289, 'SA', 23, '2022-11-05 07:34:26', '2022-11-05 07:34:26'),
(291, 'la', 18, '2022-12-09 02:45:59', '2022-12-09 02:45:59'),
(292, 'SA-lllll-lll', 15, '2022-12-10 01:48:17', '2022-12-10 01:48:17'),
(293, 'hhhhhhh', NULL, '2022-12-10 06:51:28', '2022-12-10 06:51:28'),
(294, 'hhhhhhh', NULL, '2022-12-10 06:51:40', '2022-12-10 06:51:40'),
(295, 'rahul', NULL, '2022-12-10 06:54:43', '2022-12-10 06:54:43'),
(296, 'surah', NULL, '2022-12-10 06:57:16', '2022-12-10 06:57:16'),
(297, 'kakkaka', NULL, '2022-12-10 06:58:26', '2022-12-10 06:58:26'),
(298, 'krish', NULL, '2022-12-10 07:05:48', '2022-12-10 07:05:48'),
(299, 'hhh', NULL, '2022-12-10 07:07:21', '2022-12-10 07:07:21'),
(300, 'hhh', NULL, '2022-12-10 07:09:50', '2022-12-10 07:09:50'),
(301, 'hahhahhah', NULL, '2022-12-10 07:11:20', '2022-12-10 07:11:20'),
(302, 'Stress', NULL, '2022-12-10 08:09:10', '2022-12-10 08:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_status` varchar(191) NOT NULL,
  `stripe_plan` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_plan` varchar(191) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'mansi', 'tyhg yjhjj khjkfj', '2022-04-25 23:04:44', '2022-04-25 23:04:44'),
(2, 'Kishori', 'pojepwjpojep jpoj4po ewj poe e opejkop ej po jop j ropewjm', '2022-09-14 03:50:54', '2022-09-14 03:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ticket_id` varchar(191) NOT NULL,
  `ticket_by` varchar(191) NOT NULL,
  `ticket_for` varchar(191) NOT NULL,
  `manager` varchar(191) NOT NULL,
  `purpose` varchar(191) NOT NULL,
  `start_date` varchar(191) NOT NULL,
  `end_date` varchar(191) NOT NULL,
  `start_time` varchar(191) NOT NULL,
  `end_time` varchar(191) NOT NULL,
  `total_time` varchar(191) NOT NULL,
  `ticket_status` varchar(191) NOT NULL,
  `progress_update` varchar(191) NOT NULL,
  `remarks` varchar(191) NOT NULL,
  `upload` varchar(191) NOT NULL,
  `priority` varchar(1000) NOT NULL,
  `assign` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `created_at`, `updated_at`, `ticket_id`, `ticket_by`, `ticket_for`, `manager`, `purpose`, `start_date`, `end_date`, `start_time`, `end_time`, `total_time`, `ticket_status`, `progress_update`, `remarks`, `upload`, `priority`, `assign`) VALUES
(2, '2023-01-25 03:18:09', '2023-01-25 03:18:09', 'tick_003', 'Super Admin', '3', '5', 'sdfg', '23-01-25', '2023-01-25', '', '', '', '', '', '', 'cat.jpg', 'High', ''),
(3, '2023-01-25 03:18:55', '2023-01-25 03:18:55', 'tick_004', 'Super Admin', '4', '5', 'sdfg', '23-01-25', '2023-01-25', '', '', '', '', '', '', 'cat.jpg', 'High', ''),
(4, '2023-01-31 05:54:39', '2023-01-31 06:32:38', 'tick_005', 'Super Admin', '1', '2', 'dfghjk-llll', '23-01-31', '2023-01-31', '', '', '', '', '', '', '', 'Low', ''),
(5, '2023-01-31 06:10:26', '2023-01-31 06:10:26', 'tick_006', 'Super Admin', '2', '2', 'sdfgh', '23-01-31', '2023-01-31', '', '', '', '', '', '', '', 'Low', '');

-- --------------------------------------------------------

--
-- Table structure for table `tpamaster`
--

CREATE TABLE `tpamaster` (
  `id` int(11) NOT NULL,
  `tpapaymentmode` varchar(191) NOT NULL,
  `tpapaymenttype` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpamaster`
--

INSERT INTO `tpamaster` (`id`, `tpapaymentmode`, `tpapaymenttype`, `created_at`, `updated_at`) VALUES
(62, '2', 'test', '2022-10-13 01:38:44', '2022-10-13 01:38:44'),
(63, '3', 'tpa one', '2022-10-13 01:39:23', '2022-10-13 01:39:23'),
(66, '3', 'fghjkl', '2022-10-18 03:39:33', '2022-10-18 03:39:33'),
(67, '1', 'sdfg', '2022-10-18 03:41:27', '2022-10-18 03:41:27'),
(68, '2', 'cor-two', '2022-11-14 06:13:13', '2022-11-14 06:13:13'),
(70, '4', 'yyyyyyyyyyyyyyyyyyyyyyyy', '2022-11-14 06:14:02', '2022-11-14 06:14:02'),
(71, '1', 'test on-oooo', '2022-11-17 06:52:36', '2022-11-17 06:52:36'),
(0, '1', 'jjjj', '2023-01-27 22:33:49', '2023-01-27 22:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `tpapaymentmode`
--

CREATE TABLE `tpapaymentmode` (
  `id` int(11) NOT NULL,
  `paymentmode` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpapaymentmode`
--

INSERT INTO `tpapaymentmode` (`id`, `paymentmode`) VALUES
(1, 'Corporate'),
(2, 'Govt & PSU'),
(3, 'TPA'),
(4, 'Bank Transfer'),
(5, 'Cash'),
(6, 'FOC'),
(7, 'Debit Card'),
(8, 'Credit Card'),
(9, 'Coupon'),
(10, 'Care Wallet'),
(11, 'Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_transaction_id` varchar(191) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(191) NOT NULL,
  `meta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `qualification` varchar(191) DEFAULT NULL,
  `blood_group` varchar(191) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `language` varchar(191) NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(191) DEFAULT NULL,
  `twitter_url` varchar(191) DEFAULT NULL,
  `instagram_url` varchar(191) DEFAULT NULL,
  `linkedIn_url` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `card_brand` varchar(191) DEFAULT NULL,
  `card_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `thememode` varchar(191) NOT NULL DEFAULT '0',
  `lname` varchar(191) DEFAULT NULL,
  `age` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `first_name`, `last_name`, `email`, `password`, `designation`, `phone`, `gender`, `qualification`, `blood_group`, `dob`, `email_verified_at`, `owner_id`, `owner_type`, `status`, `language`, `remember_token`, `facebook_url`, `twitter_url`, `instagram_url`, `linkedIn_url`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `thememode`, `lname`, `age`) VALUES
(1, 1, 'Super', 'Admin', 'admin@hms.com', '$2y$10$PoOy8eHua/pgg8/cm.36NO5hlxX/l7X1Sxy4rk390L35Dqt8trcme', NULL, '7878454512', 1, NULL, 'B+', '1994-12-12', '2022-03-02 01:48:41', NULL, NULL, 1, 'en', 'sBDx0xCvzi1XE19vkA44870djFBepynu8xKr8PAsYtfkwDb0TwUgZ2AAb5eP', NULL, NULL, NULL, NULL, '2022-03-02 01:48:41', '2022-11-29 06:17:32', NULL, NULL, NULL, NULL, '0', '8', ''),
(2, 2, 'nihal', 'khan', 'nihal@gmail.com', '$2y$10$Y8cX9lRjEU8sxJz7Jcjoa.B4/LXBoceitgYNbvOy1dUpD6X/55O02', 'php developer', '+919345657656', 0, 'bsc IT', 'A+', '2015-04-09', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-25 23:47:01', '2022-04-25 23:47:01', NULL, NULL, NULL, NULL, '0', '', ''),
(3, 2, 'farid', 'khan', 'nihl@gmail.com', '$2y$10$L8mU2U59jtpfKMaBmCC5vO3FeDjoPuMrfjK7uKBm.WyUud9cSaObS', 'php developer', '+919678789878', 0, 'bsc IT', 'A+', '2010-04-15', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 00:06:59', '2022-04-26 00:06:59', NULL, NULL, NULL, NULL, '0', '', ''),
(4, 2, 'krutika', 'patel', 'krutika@gmail.com', '$2y$10$9amLYH48gHId8EtQwZUj6uWPiS.My71hkB61uH9tw.AWiv.wzK/fu', 'developer', '+919421264600', 0, 'bsc IT', 'A+', '2001-04-19', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 00:14:35', '2022-04-26 00:14:35', NULL, NULL, NULL, NULL, '0', '', ''),
(5, 2, 'prasad', 'thanekar', 'prasad@gmail.com', '$2y$10$al2LBDagyo.xmcZTI3S.xejfOWHxu3PU.y9K/KtrJU6vkVh0fdvjq', 'php developer', '+919423456545', 0, 'bsc IT', 'A+', '2000-04-13', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 01:16:03', '2022-04-26 01:16:03', NULL, NULL, NULL, NULL, '0', '', ''),
(6, 2, 'samita', 'parab', 'samita@gmail.com', '$2y$10$UdJfHKYcXpzG/MNBYr9/ZuFHeS7f0.b6gumd2tIquCaUHIc8cYziK', 'php developer', '+919423546576', 0, 'bsc IT', 'o+', '2008-04-18', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 01:20:38', '2022-04-26 01:20:38', NULL, NULL, NULL, NULL, '0', '', ''),
(7, 2, 'kavita', 'khadekar', 'kavita@gmail.com', '$2y$10$ZY2zbTjlGCudep55BNAMHOlpGQ1yYc5ZkXTOGeyo3KxRY/yVqAQby', 'developer', '+919423344566', 0, 'bsc IT', 'o+', '2008-04-03', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 01:26:49', '2022-04-26 01:26:49', NULL, NULL, NULL, NULL, '0', '', ''),
(8, 2, 'minal', 'prabhu', 'minal@gmail.com', '$2y$10$WIMIGdbZm49xW.ZZ0ygwFe3c5izRAkynLkHx65gEL/I/RlwzXZDwa', 'php developer', '+919445676867', 0, 'bsc IT', 'A+', '2006-04-06', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 02:02:10', '2022-04-26 02:02:10', NULL, NULL, NULL, NULL, '0', '', ''),
(9, 2, 'minal', 'prabhu', 'minl@gmail.com', '$2y$10$kBe0xOnEpElGBu3RrEuyO.XsvSceSTi4uETV7zwQ2VgZ70lCmaQtS', 'php developer', '+919421264600', 0, 'bsc IT', 'A+', '2006-04-06', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 02:03:54', '2022-04-26 02:03:54', NULL, NULL, NULL, NULL, '0', '', ''),
(10, 2, 'kiran', 'khan', 'kiran@gmail.com', '$2y$10$rw8uQMGK0CKlCDutAi67/eskWu07TqiBbRVV9gOTHwd8pmkns83h2', 'developer', NULL, 0, 'bsc IT', 'o+', '2007-04-26', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 03:04:19', '2022-04-26 03:04:19', NULL, NULL, NULL, NULL, '0', '', ''),
(11, 2, 'kiran', 'khan', 'kiranm@gmail.com', '$2y$10$aPApOBPzFCoL8iw12y7UH.YkYZROTi4dfN1D6U3MOj/H0dfZaBlSq', 'developer', '+918123456789', 0, 'bsc IT', 'o+', '2007-04-26', NULL, 1, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 03:16:34', '2022-04-26 03:16:37', NULL, NULL, NULL, NULL, '0', '', ''),
(13, 3, 'gunja', 'Gupta', 'gunja@gmail.com', '$2y$10$BERx7iBOIeXZzQ03MWSA9.4MInfibCSj6lSkytZCBMGD0p1jKE1s2', NULL, '+919421264600', 1, NULL, 'o+', '2005-04-07', NULL, 0, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 03:28:36', '2022-04-26 03:28:38', NULL, NULL, NULL, NULL, '0', '', ''),
(15, 7, 'gunja--sdsd', 'gupta', 'gunjan@gmail.com', '$2y$10$vvuPUl6smKqdDKIffdeK0uOazb8I4RVYyiLwa9fqrZhdI9GRPpsO6', 'php developer', '+919421264600', 0, 'bsc IT', 'A+', '2000-04-13', NULL, 2, 'App\\Models\\Accountant', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-26 04:12:23', '2022-04-26 04:13:06', NULL, NULL, NULL, NULL, '0', '', ''),
(16, 2, 'Akash', 'Kshirsagar', 'akash.kshirsagar@gmail.com', '$2y$10$EuGc5Tt8.Vx0CxIU6mR28u5eZXEp7dYmgbDdGtbfDt4rRMzEqmt5.', 'Doctor', '+918655875513', 0, 'MBBS', 'A+', '1995-08-15', '2022-04-28 06:29:26', 3, 'App\\Models\\Doctor', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-26 04:31:28', '2022-04-28 06:29:26', NULL, NULL, NULL, NULL, '0', '', ''),
(17, 3, 'nita', 'barve', 'nita@gmail.com', '$2y$10$IbIaL/p24XkxQNoCyCt9yea3hVeRYDj5bvKFqTGk6PY6W1lFM/sHG', NULL, '+919445678734', 0, NULL, 'o+', '2005-04-07', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:01:22', '2022-04-26 05:01:22', NULL, NULL, NULL, NULL, '0', '', ''),
(18, 3, 'kishori', 'sohani', 'manisha@gmail.com', '$2y$10$v0SLysA//FU3uSbD4/tD6O8yDUu4q6uJlr.XNZqk7Ejmncu7zN0gW', NULL, '+919421253445', 0, NULL, 'A', '2006-04-13', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:06:56', '2022-04-26 05:06:56', NULL, NULL, NULL, NULL, '0', '', ''),
(19, 2, 'yash', 'khan', 'yash12@gmail.com', '$2y$10$4.7PDoNyiok14nCOu1EraedPK8.OZRLkJrXLXemdkewPf6Giy5LEO', 'Doctor', '+919421254566', 0, 'BSC. IT', 'A', '2005-04-15', NULL, 4, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:09:26', '2022-04-26 05:09:28', NULL, NULL, NULL, NULL, '0', '', ''),
(20, 3, 'ishu', 'sohani', 'ishu@gmail.com', '$2y$10$PVyKnzQYJZ1DYiRmH3ADhecEB/oC6GgUqfUoLlaAALL3qBysv3W52', NULL, '+919421234567', 0, NULL, 'o+', '2004-04-15', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:11:11', '2022-04-26 05:11:11', NULL, NULL, NULL, NULL, '0', '', ''),
(21, 3, 'ishu', 'sohani', 'ishu12@gmail.com', '$2y$10$b9pfBgVg24wt50bt4ew3LuK3bJADgMzjBjAp5QZya30Daj42Djo3m', NULL, '+919421264600', 0, NULL, 'o+', '2005-04-14', NULL, 0, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:18:44', '2022-04-26 05:18:47', NULL, NULL, NULL, NULL, '0', '', ''),
(22, 3, 'minal', 'thanekar', 'minal23@gmail.com', '$2y$10$clkYFsv/uoTNJTO9sblPGuwmqHd8nDhSmpcS.JY26i4YkoDnTdBj2', NULL, '+919234567623', 0, NULL, 'o+', '2009-04-16', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:21:06', '2022-04-26 05:21:06', NULL, NULL, NULL, NULL, '0', '', ''),
(23, 3, 'avu', 'sohani', 'avu23@gmail.com', '$2y$10$i7gB2RKFOvg6e//8sPm.m.cxsxdTnuhgk8CIEWzlkl0CSbODOMVvO', NULL, '+919434567687', 0, NULL, 'o+', '2007-04-20', NULL, 3, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-26 05:23:59', '2022-04-26 05:24:01', NULL, NULL, NULL, NULL, '0', '', ''),
(24, 7, 'sayali', 'parab', 'sayali12@gmail.com', '$2y$10$/05RTW2qGsFyDWB.ZrwjfuSHNCBOC66dQ8aOqbga5vw6zWyZGJLSS', 'developer', '+919434567676', 0, 'bsc IT', 'A', '2001-04-11', NULL, 3, 'App\\Models\\Accountant', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-26 05:38:55', '2022-04-26 05:38:57', NULL, NULL, NULL, NULL, '0', '', ''),
(25, 9, 'yamini', 'patil', 'yamini12@hms.com', '$2y$10$GpUenxyHY8bo0YBICgjbXuq/KLSr0bxFMBDebnlIy0ie/v4eMbmAC', 'developer', '+919445676787', 0, 'BSC. IT', 'A+', '2004-04-23', NULL, 1, 'App\\Models\\LabTechnician', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:18:01', '2022-04-27 00:18:06', NULL, NULL, NULL, NULL, '0', '', ''),
(26, 9, 'suhas', 'prabhu', 'suhas@hms.com', '$2y$10$LF/JmD6qguyZUvFEnufM7ezO1lVi7Txfg7FwPy4QqKMkb/0cUV44u', 'Doctor', '+919421278900', 0, 'MBBS', 'A+', '2009-04-22', NULL, 2, 'App\\Models\\LabTechnician', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:20:14', '2022-04-27 00:20:17', NULL, NULL, NULL, NULL, '0', '', ''),
(27, 4, 'rashi', 'khan', 'rashi@hms.com', '$2y$10$xrzoUsVczpzCHu8MlXV5cucoNPvAkcjxPKH3YFIJqZKY5JmT7fM8O', 'Doctor', '+919423456789', 0, 'BSC. IT', 'A+', '2001-04-09', NULL, 1, 'App\\Models\\Nurse', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:30:39', '2022-04-27 00:30:42', NULL, NULL, NULL, NULL, '0', '', ''),
(28, 4, 'mohini', 'kale', 'mohini23@hms.com', '$2y$10$DC24MNJ0FgwEfZBncEcC0.U9QiRLguzHFSv0Zknqf05wMaD6Ye4iK', 'Doctor', '+919423456787', 0, 'bsc IT', 'A+', '2022-04-26', NULL, 2, 'App\\Models\\Nurse', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:36:09', '2022-04-27 00:36:11', NULL, NULL, NULL, NULL, '0', '', ''),
(29, 3, 'chaitali', 'salaskar', 'chaitali@hms.com', '$2y$10$nygKfQE65x76zSlphIN7/e.i0THZ5C/yC8C1vZ5mjxlDhmZy3MuEy', NULL, '+919345678798', 0, NULL, 'B', '2010-04-08', NULL, 4, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-27 00:37:46', '2022-04-27 00:37:49', NULL, NULL, NULL, NULL, '0', '', ''),
(30, 8, 'pallavi', 'salaskar', 'pallavi@hms.com', '$2y$10$JVYXnbEaSlMdCxZctGBECOgQJmktV1np5kDc07400DY0xc7mtJ2/u', 'Doctor', '+919435678798', 1, 'BSC. IT', 'A', '2009-04-16', NULL, 1, 'App\\Models\\CaseHandler', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:41:08', '2022-04-27 00:41:10', NULL, NULL, NULL, NULL, '0', '', ''),
(31, 6, 'renuka', 'aeer', 'renuka@hms.com', '$2y$10$mOTLkFuv4n5wvXzYAkQ4N.fam6SwnNzdRyzCUi0HlTpe5AyRJYoLC', 'Doctor', '+919423456787', 1, 'MBBS', 'A', '2009-04-16', NULL, 0, 'App\\Models\\Pharmacist', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:47:50', '2022-04-27 00:47:53', NULL, NULL, NULL, NULL, '0', '', ''),
(32, 6, 'saba', 'khan', 'saba@hms.com', '$2y$10$Bc9pyjhhtTjAdxRtt47Um..isI5fH9VMh4N4uMB.2Z1/cSxehfRke', 'developer', '+919345678798', 0, 'BSC. IT', 'A', '2008-04-25', NULL, NULL, NULL, 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:48:53', '2022-04-27 00:48:53', NULL, NULL, NULL, NULL, '0', '', ''),
(33, 6, 'akshta', 'sawant', 'akshta@hms.com', '$2y$10$IMqW0NJXTgyj.2RKIrPEauTxOlA9WR/ST/AA6T.nZfDnVrxyGU0du', 'developer', '+919435678723', 0, 'bsc IT', 'A+', '2006-04-14', NULL, 2, 'App\\Models\\Pharmacist', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:52:38', '2022-04-27 00:52:40', NULL, NULL, NULL, NULL, '0', '', ''),
(34, 5, 'sauja', 'hindealekar', 'sauja@hms.com', '$2y$10$AQQo5JhsoUDoENAmHCtTUeqsOCNrZbPmr708HBCp739Vcx2r8V18K', 'Doctor', '+919435456789', 1, 'bsc IT', 'A', '2005-04-21', NULL, 0, 'App\\Models\\Receptionist', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:57:50', '2022-04-27 00:57:52', NULL, NULL, NULL, NULL, '0', '', ''),
(35, 5, 'priyanka', 'kuyba', 'priyanka@hms.com', '$2y$10$TemsUSecu0OSJ23UwGQTcuDiduem4txP3VCcS3eL19bcibg7I0beG', 'developer', '+919234567687', 0, 'bsc IT', 'A', '2006-04-19', NULL, NULL, NULL, 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 00:59:13', '2022-04-27 00:59:13', NULL, NULL, NULL, NULL, '0', '', ''),
(36, 5, 'shyam', 'bhanushali', 'shyam@hms.com', '$2y$10$0ZGnxSqQ2S/yhQvTYEdWK.Gz06CmyWMIDSMmzo7DlnPj/ZmM2H3xq', 'developer', '+919423456523', 0, 'bsc IT', 'A', '2005-04-21', NULL, 2, 'App\\Models\\Receptionist', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 01:01:44', '2022-04-27 01:01:47', NULL, NULL, NULL, NULL, '0', '', ''),
(38, 8, 'avu', 'sohani', 'avu23@hms.com', '$2y$10$.ZeumIqWmV6Q8XTfULI9kemLFHCDLbW/cnxC.fSOt3rehj72KPmO.', 'php developer', '+919345678798', 0, 'bsc IT', 'A', '2003-04-18', NULL, 2, 'App\\Models\\CaseHandler', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-27 23:11:09', '2022-04-27 23:11:14', NULL, NULL, NULL, NULL, '0', '', ''),
(39, 3, 'neha', 'parab', 'neha13@hms.com', '$2y$10$3wONzAAeLBUj3aq0rn8Tuu4PDlTypMD3zvBYPpzHd0ONgQ9FDgVQu', NULL, '+919435678798', 0, NULL, 'A', '2009-04-10', NULL, 5, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-27 23:40:28', '2022-04-27 23:40:31', NULL, NULL, NULL, NULL, '0', '', ''),
(40, 3, 'pranjal', 'dhoke', 'pranjal12@hms.com', '$2y$10$a9dRIq6iN/lnjnwmRf8KOuENfUH/I045ENbCsEQzYdy6Kw620AClC', NULL, '+919456789878', 0, NULL, 'A', '2009-04-23', NULL, 6, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-27 23:54:41', '2022-04-27 23:54:45', NULL, NULL, NULL, NULL, '0', '', ''),
(41, 3, 'Gayathri', 'Gayakwad', 'gayathri3@hms.com', '$2y$10$STMHqbkEJuTZM98ys0lFGenjeXOdMOd6P1LYIbuPzE2hESJahTiIG', NULL, '+919434567687', 0, NULL, 'A', '2018-04-18', NULL, 7, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-28 00:21:07', '2022-04-28 00:21:11', NULL, NULL, NULL, NULL, '0', '', ''),
(42, 3, 'dyani', 'raut', 'dyani3@hms.com', '$2y$10$PAguqGzfEHwNZ7f/TVm8XencUU3dkeKJC4YtgnYXjzgJyjwbhr/Ka', NULL, '+919423456723', 0, NULL, NULL, '2009-04-17', NULL, 8, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-28 00:47:12', '2022-04-28 00:47:14', NULL, NULL, NULL, NULL, '0', '', ''),
(43, 3, 'Divya', 'sakpal', 'divya12@hms.com', '$2y$10$/RpWeaiDHi5Z5Mid29pqaeGQQ3yLflQJ8M/TtXaAMwznRnwDmw4tG', NULL, '+919421264688', 0, NULL, 'B', '2007-04-13', NULL, 9, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-28 01:08:49', '2022-04-28 01:08:52', NULL, NULL, NULL, NULL, '0', '', ''),
(44, 3, 'om', 'parab', 'om@hms.com', '$2y$10$JtW1EJmSSNfDzK4T16LB8uky3MM3nSVRNCJG43iS70VEObJNUfFVe', NULL, '+919421264677', 0, NULL, 'o+', '2009-04-22', NULL, 10, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-28 01:15:37', '2022-04-28 01:15:39', NULL, NULL, NULL, NULL, '0', '', ''),
(45, 3, 'kiran', 'patil', 'kishori3@hms.com', '$2y$10$J61AJjv6WqtTbKh4N19LjOTsMYeuefCNNO7A/yvSEARGGCZlwsIZq', NULL, '+919445678798', 0, NULL, 'B', '2007-04-20', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-28 03:46:07', '2022-04-28 03:46:07', NULL, NULL, NULL, NULL, '0', '', ''),
(46, 3, 'kiran', 'patil', 'kiran3@hms.com', '$2y$10$fh0pCdITo5Idg70KRmbzGuPSHTzsI1mSk4G.1LLcC3cI23VEb/I6K', NULL, '+919423567898', 0, NULL, 'o+', '2012-04-19', NULL, 11, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-28 03:50:01', '2022-04-28 03:50:10', NULL, NULL, NULL, NULL, '0', '', ''),
(47, 3, 'sapna', 'khan', 'sapna@hms.com', '$2y$10$JOZjGXTrgrpjg07QsbuUT.kebBAaCM0PlA5bVnAqFQHoivTqxXn6i', NULL, '+919345678798', 1, NULL, 'o+', '2012-04-20', NULL, 12, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'twitter.com', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-04-29 00:39:29', '2022-04-29 00:39:33', NULL, NULL, NULL, NULL, '0', '', ''),
(49, 3, 'Kishori', 'Sohani', 'kishorisohani@gmail.com', '$2y$10$3Jd2Gi93y0xqm.Pnx9xVhOm9u6jVwgF/JR02ICDBQmeeGpcW8Qw0G', NULL, '7057263439', 0, NULL, NULL, NULL, NULL, 13, 'App\\Models\\Patient', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-29 02:00:12', '2022-04-29 02:00:12', NULL, NULL, NULL, NULL, '0', '', ''),
(50, 7, 'shanti', 'karnik', 'shanti@gmail.com', '$2y$10$DkbKYTaCjKkPlxiFw2zqb.73Sd1SIRIBNSCFdMvj3DSth9CbAkmT2', 'developer', '+919422345678', 0, 'bsc IT', 'A', '2022-04-29', NULL, 4, 'App\\Models\\Accountant', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-04-29 23:56:21', '2022-04-29 23:56:26', NULL, NULL, NULL, NULL, '0', '', ''),
(51, 3, 'kish', 'sohani', 'kish@gmail.com', '$2y$10$pD8cel2eIMkZNI2YV02ok.gOJeXyoDF1mrg55jzbP7tV12QDBH5MO', NULL, '+2259421264600', 1, NULL, 'B', '1999-01-30', NULL, 0, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-13 23:09:40', '2022-09-13 23:09:59', NULL, NULL, NULL, NULL, '0', '', ''),
(56, 2, 'kishorione', 'sohani', 'kishorisohani5@gmail.com', '$2y$10$h70eAi6fXcrXdfe2X3ck..y2/5jjO5MI75Deg6yRXp8qBY1cO/3HO', 'jr.developer', '+22594234567', 0, 'BSC IT', 'A', '1999-01-30', NULL, 8, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-14 01:55:19', '2022-09-14 01:55:22', NULL, NULL, NULL, NULL, '0', '', ''),
(57, 3, 'ganesh', 'pawar', 'ganesh@gmail.com', '$2y$10$kMHGa87LEID8QHWSouwg2OUoxVDbCy6AIFMAO1gVtPN6rn5YDxPV.', NULL, '+919434567867', 0, NULL, 'A+', '1999-01-30', NULL, NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-15 00:46:13', '2022-09-15 00:46:13', NULL, NULL, NULL, NULL, '0', '', ''),
(58, 3, 'ganesh', 'pawar', 'ganeshone@gmail.com', '$2y$10$VE82ySbRIkixV6flX38dMuHDfmU3k1wHadXZyALMP8hAr6Infj7Ha', NULL, '+919456789089', 0, NULL, 'A+', '1999-01-30', NULL, 14, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-15 00:47:43', '2022-09-15 00:47:46', NULL, NULL, NULL, NULL, '0', '', ''),
(59, 3, 'gunja', 'gupta', 'gunjaone@gmail.com', '$2y$10$0z/62X.oWAGljD/b2EWyu.WxAKrDQTICkdw6iElr8z9XHkh.6PnMy', NULL, '+919434567867', 0, NULL, 'B', '1999-08-04', NULL, 15, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-15 03:44:41', '2022-09-15 03:44:47', NULL, NULL, NULL, NULL, '0', '', ''),
(68, 3, 'kishu', 'sohanithree', 'kishori.jamztudioz@gmail.com', '$2y$10$lW1oLm4wyT2NfZNTQFBoYOuRm2Is0VTEAC7mOjY9UucsElFrOvJva', NULL, '+917057263439', 1, NULL, 'A+', '2022-11-08', '2022-09-22 23:44:58', 24, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-22 23:44:22', '2022-11-25 00:41:33', NULL, NULL, NULL, NULL, '0', '', ''),
(69, 7, 'kishori', 'sohani', 'kishoriiii@gmail.com', '$2y$10$7dw0X8T4ySGE2DRHpfEiGejXre7fPZvZeIgM2n9kRk.tusZemHlRy', 'jr.developer', '+919456789807', 0, 'BSC IT', 'A', '1999-01-30', NULL, 5, 'App\\Models\\Accountant', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-09-26 03:19:32', '2022-09-26 03:19:39', NULL, NULL, NULL, NULL, '0', '', ''),
(70, 2, 'kishu', 'sohani', 'kishor@gmail.com', '$2y$10$Xot2Egy7Kf5XPQVmZXWOe.E9ZoL5TA.wDIPhQTPCPlsmRPsq16KQ2', 'jr.developer', '+919432455676', 0, 'BSC IT', 'B', '1999-01-30', NULL, 9, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-26 03:31:33', '2022-09-26 03:31:37', NULL, NULL, NULL, NULL, '0', '', ''),
(71, 3, 'roshu', 'punekar', 'roshu@gmail.com', '$2y$10$FiB5MCbU1nzdfzljbSuSPeNqVaar9f2LcqN6g6I7ErwW6fu8ZwV0C', NULL, '+919423456756', 0, NULL, NULL, '1998-09-24', NULL, 25, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-26 03:37:29', '2022-11-25 00:39:41', NULL, NULL, NULL, NULL, '0', '', ''),
(72, 4, 'kishu', 'sohani', 'kishuu@gmail.com', '$2y$10$KxBKXYHa.GWF6Sg22G0rn.CKDtDnlWN.9eRcBrLglAqfhNqVGSRbS', 'jr.developer', '+919423456787', 0, 'asxc', 'A', '2022-09-21', NULL, 3, 'App\\Models\\Nurse', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-09-26 03:43:16', '2022-09-26 03:43:20', NULL, NULL, NULL, NULL, '0', '', ''),
(73, 8, 'sai', 'punekar', 'sai@gmail.com', '$2y$10$ITnX45xzBaoB.JWRZuX/r.BRWHor.vC/aBMIuz.GhDWbiKIHza6bq', 'jr.developer', '+919435678787', 0, 'BSC IT', 'A', '2022-09-26', NULL, 3, 'App\\Models\\CaseHandler', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-09-26 03:48:32', '2022-09-26 03:48:35', NULL, NULL, NULL, NULL, '0', '', ''),
(79, 2, 'nehajiiii', 'rane', 'nehajiiii@gmail.com', '$2y$10$okslNSn1vYuSeIV1Lql9kuw.6eTpQgMzmKd1udSXPq0.cp0EqzCR2', 'doctor', '+919567876787', 0, 'Graduation', 'A+', '1999-09-30', '2022-09-28 07:20:28', 11, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-09-28 01:50:28', '2022-09-28 01:50:30', NULL, NULL, NULL, NULL, '0', '', ''),
(80, 4, 'latika', 'mishra', 'latika@gmail.com', '$2y$10$frK5ubxvHBt8Vwe1n4ocjeG1fghk7RYqNbqfvVfZ.OjfVO50pAj2e', 'nurse', '+919878678767', 0, 'BSC IT', 'A', '1999-09-30', '2022-09-28 10:09:33', 4, 'App\\Models\\Nurse', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-09-28 04:39:33', '2022-09-28 04:39:33', NULL, NULL, NULL, NULL, '0', '', ''),
(82, 1, 'kisha', 'ssohani', 'kishorisohani4@gmail.com', '$2y$10$D5jlU4CLCyBT.a561iMKjuqZUmZ0sNZrEuCOtUsd2qyb3EsBYmOeO', NULL, '+917057263439', 0, NULL, NULL, '2022-11-08', '2022-11-08 10:05:32', NULL, NULL, 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-08 04:35:32', '2022-11-08 04:35:34', NULL, NULL, NULL, NULL, '0', '', ''),
(83, 6, 'mohammed', 'afzal', 'mohammedafzal110@gmail.com', '$2y$10$nHwlQg300vEpkZi9YqHcreDzmjSdylT9aOJFIHi4Vlh71L.iLNEAW', NULL, '+919435647656', 0, NULL, NULL, '2022-11-10', '2022-11-11 05:20:01', 0, 'App\\Models\\Pharmacist', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-10 23:50:01', '2022-11-10 23:50:02', NULL, NULL, NULL, NULL, '0', '', ''),
(84, 7, 'neha', 'parab', 'neha@gmai.com', '$2y$10$HNDHxZrnV1O0k0PQDC4cHeh9Yxj7ORtMXFnwd7DOXc7iplFtZQKlu', NULL, '+919434546545', 0, NULL, NULL, '2022-11-17', '2022-11-17 09:31:44', 6, 'App\\Models\\Accountant', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-17 04:01:44', '2022-11-17 04:01:44', NULL, NULL, NULL, NULL, '0', '', ''),
(85, 3, 'safa', 'khan', 'safa@gmail.com', '$2y$10$q2DZQWoUpdjv5xEU/6iNLuXAMjz1ps7gOe6UvFax9C8srj6tIFeji', NULL, '+919434456545', 0, NULL, 'A+', '2022-11-09', '2022-11-25 06:08:45', 30, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-25 00:38:45', '2022-11-25 00:38:46', NULL, NULL, NULL, NULL, '0', '', ''),
(86, 3, 'rohit', 'kambli', 'rohit@gmail.com', '$2y$10$cTh.7wnp04w2njhe59Huv.n7tl/SBJsNF.0OWKLiqDM39/x.YWaZK', NULL, '+919434564565', 0, NULL, NULL, '2022-11-08', '2022-11-25 06:17:21', 31, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-25 00:47:21', '2022-11-25 00:47:21', NULL, NULL, NULL, NULL, '0', '', ''),
(87, 3, 'prachiti', 'khan', 'prachiti@gmail.com', '$2y$10$dwgmS7.pXPeQVaWSuOS46.0m9L2AfWLNCm5oCi9GIG8xRFc2gBmoW', NULL, '+919434564565', 0, NULL, 'o', '2022-11-08', '2022-11-25 06:40:30', 32, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-25 01:10:30', '2022-11-25 01:10:30', NULL, NULL, NULL, NULL, '0', '', ''),
(88, 3, 'nisha', 'khane', 'nisha@gmail.com', '$2y$10$.1PvBi5wDPhfzzW4u3C7suNpcAqr59l8.orEWtYSld8LRYKRS3y8G', NULL, '+918909897867', 0, NULL, 'A+', '2022-11-24', '2022-11-25 08:23:22', 33, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-25 02:53:22', '2022-11-25 02:53:23', NULL, NULL, NULL, NULL, '0', '', ''),
(89, 7, 'neha', 'kalyankar', 'neha@gmail.com', '$2y$10$ZVF99idK2nDyMX282w8gb.ITPnBAGLxFsZFuGzBNfzSxANqSzZhqe', NULL, '+917067878798', 0, NULL, NULL, '2022-11-22', '2022-11-28 06:07:18', 7, 'App\\Models\\Accountant', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-11-28 00:37:18', '2022-11-28 00:37:30', NULL, NULL, NULL, NULL, '0', '', ''),
(90, 7, 'gauri', 'dhuri', 'gauri@gmail.com', '$2y$10$I.bimk6G5yIifdzROydec.bDtp0epAXKfzWO.mmU8i.oeNtr4JEhe', NULL, '+919457263439', 1, NULL, NULL, '2022-12-03', '2022-12-03 04:00:33', 8, 'App\\Models\\Accountant', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-02 22:30:33', '2022-12-02 22:30:35', NULL, NULL, NULL, NULL, '0', 'Insure Eye Institute Mulund', ''),
(91, 7, 'nisha', 'kadam', 'nisha33@gmail.com', '$2y$10$zPcf14OMQ3BfcqvHPjeuCuhq5GbYnZt6bMiJhlccpcFapRULsXDSK', NULL, '+919424456549', 0, NULL, NULL, '2022-12-01', '2022-12-03 09:29:20', 9, 'App\\Models\\Accountant', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-03 03:59:20', '2022-12-03 03:59:22', NULL, NULL, NULL, NULL, '0', NULL, ''),
(92, 2, 'john', 'khan', 'john@gamil.com', '$2y$10$aZWwqDJuQAlkzKUfrQdONumKIJq98yDyDNCohHfyp5wwBfYfXFzma', NULL, '+919434545465', 0, NULL, NULL, '2022-12-03', '2022-12-03 11:24:58', 12, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-03 05:54:58', '2022-12-03 05:55:00', NULL, NULL, NULL, NULL, '0', NULL, ''),
(93, 7, 'kavya', 'khan', 'kavya4@gmail.com', '$2y$10$4xbSBEsdVcrzGowi8gZQW.26iPIby..28TKhW3E8FEwXnbBjmztk2', NULL, '+919423456756', 0, NULL, NULL, '2022-12-03', '2022-12-03 11:28:43', 10, 'App\\Models\\Accountant', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-03 05:58:43', '2022-12-03 05:58:43', NULL, NULL, NULL, NULL, '0', '6', ''),
(94, 8, 'roma', 'kavle', 'roma@gmail.com', '$2y$10$5AmCcPPQFW.HJt36FkhFC.oZloy4fJKEi6w8HiyvGOHMLfGkLaWji', NULL, '+917865765676', 0, NULL, NULL, '2022-12-05', '2022-12-05 07:12:31', 4, 'App\\Models\\CaseHandler', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-05 01:42:31', '2022-12-05 01:42:33', NULL, NULL, NULL, NULL, '0', '5', ''),
(95, 8, 'krutika', 'sohani', 'krutika12@gmail.com', '$2y$10$oXUu2Otvum71xZULD.1FBeNECLfGwlB70XtCj3Ref/j587WMnhk3.', NULL, '+919456768765', 0, NULL, NULL, '2022-12-05', '2022-12-05 07:42:11', 5, 'App\\Models\\CaseHandler', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-05 02:12:11', '2022-12-05 02:12:11', NULL, NULL, NULL, NULL, '0', '7', ''),
(96, 8, 'kau', 'khan', 'kau12@gmail.com', '$2y$10$vdkW8RYbaHK3qD.ug9pUeurWnib5KQlD0YIMRAwfbRfmHfCkN9Jc.', NULL, '+917888675676', 0, NULL, NULL, '2022-12-05', '2022-12-05 10:13:44', 6, 'App\\Models\\CaseHandler', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-05 04:43:44', '2022-12-05 04:43:45', NULL, NULL, NULL, NULL, '0', '6', ''),
(97, 8, 'kishu', 'khan', 'kishu@45gmail.com', '$2y$10$IfvsY67T44h7xDTo.elOk.B96K17Z7Bf8j7Ud0iuLruaPOw.Z2I/W', NULL, '+919435465676', 0, NULL, NULL, '2022-12-06', '2022-12-06 05:04:28', 7, 'App\\Models\\CaseHandler', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-05 23:34:28', '2022-12-05 23:34:30', NULL, NULL, NULL, NULL, '0', '5', ''),
(98, 2, 'yasg', 'sohani', 'yash@gmail.com', '$2y$10$jNEHP9ToqWsD8LNDZLPmtOlvVSeYEDMpLr8qnWaqxWAXCPvOlNGQm', 'IT', '+917898786787', 0, 'IT', 'o', '2022-12-05', '2022-12-06 11:13:42', 13, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-06 05:43:42', '2022-12-06 05:43:44', NULL, NULL, NULL, NULL, '0', NULL, ''),
(99, 5, 'kavita', 'khan', 'kavita45@gmail.com', '$2y$10$HhwtmHxlnavwfFDyXlIvAe.T8G5xGL714ABKVrKo/7VXd6lQzt5u6', 'jr.developer', '+916787897898', 0, 'MSC MLT', 'A+', '2022-12-07', '2022-12-07 09:51:13', 0, 'App\\Models\\Receptionist', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2022-12-07 04:21:13', '2022-12-07 04:21:16', NULL, NULL, NULL, NULL, '0', NULL, ''),
(100, 4, 'pravin', 'khan', 'pravin23@gmail.com', '$2y$10$fiyR2Bl8po/Yp3IJx6T5x.eWOXXvungQ/LD8MuKrXjfi8bvQLp1Wu', NULL, '+919878678767', 0, NULL, NULL, '2022-12-07', '2022-12-07 10:38:29', 5, 'App\\Models\\Nurse', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-07 05:08:29', '2022-12-07 05:08:30', NULL, NULL, NULL, NULL, '0', '5', ''),
(101, 3, 'kunal', 'shide', 'kunal@gmail.com', '$2y$10$uWqxX8NV/z9WE13sctaYeey9CaKx3Qdl88t7abITyelpuvVQyE.4y', NULL, '+919434546545', 0, NULL, 'A+', '2022-12-08', '2022-12-08 04:09:21', 34, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-07 22:39:21', '2022-12-07 22:39:23', NULL, NULL, NULL, NULL, '0', NULL, '24'),
(102, 3, 'soham', 'khan', 'soham@gmail.com', '$2y$10$Kkt67S7qKlzVwik6EUrTpewh2vpI4w9iiPlD51TvH2GsQW5S3Czqm', NULL, '+919456565676', 0, NULL, 'B+', '2022-12-08', '2022-12-08 04:16:37', 35, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-07 22:46:37', '2022-12-07 22:46:38', NULL, NULL, NULL, NULL, '0', NULL, '34'),
(103, 2, 'radha', 'sohani', 'radha@gmail.com', '$2y$10$HyJF.1zYJUU/f7ryRxsnY.eC5MyV8Ovg0C1y2muWK/vgl/JTTiVv.', NULL, '+917898789809', 0, NULL, NULL, '2022-12-07', '2022-12-09 05:15:43', 14, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-08 23:45:43', '2022-12-08 23:45:44', NULL, NULL, NULL, NULL, '0', '9', ''),
(104, 3, 'kalyani', 'khan', 'kalyani@gmail.com', '$2y$10$yTBjJRiJD/X6SrCeDVq5NuMnFWr5p3qLkd01aF.nueDp8bOq.Q73i', NULL, '+919434565657', 0, NULL, NULL, '2022-12-09', '2022-12-09 05:54:06', 36, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-09 00:24:06', '2022-12-09 00:24:07', NULL, NULL, NULL, NULL, '0', '10', ''),
(106, 4, 'sarthak', 'sohani', 'sarthak@gmail.com', '$2y$10$vh7V8tmHaf3SvBPOzvGi7uj33y113BNNXwRZ/H47gLHyvzSR2BSHy', NULL, '+919878987898', 0, NULL, NULL, '2022-12-08', '2022-12-09 06:25:29', 7, 'App\\Models\\Nurse', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-09 00:55:29', '2022-12-09 00:55:30', NULL, NULL, NULL, NULL, '0', '11', ''),
(107, 3, 'namrata', 'khan', 'namrata@gmail.com', '$2y$10$LP/RLM7vMVMtIScE5at8k.QFDoY7EqUwfo6CgcNWnnFuaBCukrJre', NULL, '+919456768767', 0, NULL, 'o+', '2022-12-06', '2022-12-12 10:35:33', 37, 'App\\Models\\Patient', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-12 05:05:32', '2022-12-12 05:05:46', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 3, 'abc', 'pqr', 'abc123@gmail.com', '$2y$10$/TTYfbBizH1AQCg3Synb6ec5PHrv3y9m899fnBVVZUTOGbHNQ4F6C', NULL, '+919434565645', 0, NULL, NULL, '2022-11-30', '2022-12-24 12:00:27', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2022-12-24 06:30:27', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', '5', ''),
(0, 4, 'kishori', 'sohani', 'lucifer@gmail.com', '$2y$10$tkG2NXfKhTeru4/oQgqdwOD//bu3JYH.XHfG7EevuGxZhfrjo6cja', 'jr.developer', '+917898789809', 0, 'Fy IT', 'A+', '2023-01-25', '2023-01-25 06:09:38', 17, 'App\\Models\\Doctor', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2023-01-25 00:39:38', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 4, 'yashwint', 'khane', 'luci@gmail.com', '$2y$10$oYPatd5jzP5ptlQfjxAbX.BjtGKVBDIBGzPKiUB/CUnbKJSNjrmbm', 'IT develper', '+919432435434', 0, 'IT', 'B+', '2023-01-24', '2023-01-25 06:15:10', 17, 'App\\Models\\Doctor', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2023-01-25 00:45:10', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 4, 'yashwint', 'khane', 'y123@gmail.com', '$2y$10$RupC4pMhKDBV852z7pGYteUG46oconjKGMr.HpuGAABAYCE0O4ijS', 'IT develper', '+919421345465', 0, 'IT', 'A+', '2023-01-10', '2023-01-25 06:18:27', 17, 'App\\Models\\Doctor', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2023-01-25 00:48:27', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 4, 'nnn', 'kkk', 'n123@gmail.com', '$2y$10$QXucLDKYrblpIXoBiQadYeTBtWPzVb.4oNQOb.L8M6OHw9TfPz8o2', 'IT', '+919423435434', 0, 'asxc-kk', 'A+', '2023-01-24', '2023-01-25 06:22:12', 17, 'App\\Models\\Doctor', 1, 'en', NULL, NULL, NULL, NULL, NULL, '2023-01-25 00:52:12', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'veena', 'khan', 'veena@gmail.com', '$2y$10$PEDmvdzxrHzF3VITd.e5YO0ba5iN9AKtVcnqJZgNUNZTuNK1/ry5q', 'jr.developer', '+919423453454', 0, 'IT', 'A+', '2023-01-25', '2023-01-25 06:36:56', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-25 01:06:56', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'veena-one', 'khan', 'veena12@gmail.com', '$2y$10$BBuiSULjN7d6cfE8fOdF6efW0wUtJqEsTAMC6lGm9cwjgvdkdBi4q', 'jr.developer', '+919423454354', 0, 'IT', 'B+', '2023-01-25', '2023-01-25 06:38:55', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-25 01:08:55', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'veena-one-te', 'khan', 'veena123@gmail.com', '$2y$10$0fW/IbBUvyQnqxjOCQGeo.9V3RuGfyXbP5wJhE6sc3FmLEelfDc5u', 'jr.developer', '+919434546545', 0, 'IT', 'B+', '2023-01-25', '2023-01-25 06:41:31', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-25 01:11:31', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'veena-one-te-kk', 'khan', 'veena1234@gmail.com', '$2y$10$SOJiQVrR9Dkr2vsDr0ahj.WmtAbH/g2x1inA8OIiRDDxf/BIibKlK', 'jr.developer', '+919423434354', 0, 'IT', 'A+', '2023-01-10', '2023-01-25 06:46:03', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-25 01:16:03', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'veena-one-te-kk-m', 'khan', 'veenakhan@gmail.com', '$2y$10$VtZe.NbPLmyMrpzh9rDFCe9ZNVj6AopqbYwmUpqqHFSZ7N/AR1jca', 'jr.developer', '+919467889987', 0, 'IT', 'A+', '2023-01-25', '2023-01-25 06:50:04', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-25 01:20:04', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'kish', 'sohani', 'mmm@gmail.com', '$2y$10$vSSnT7YzaWl6SMJGCLjPvO2dhClGzBLKfJKxcrwNHY1R.0C.SoHGq', 'IT', '+919423454345', 0, 'IT', 'A+', '2023-01-27', '2023-01-27 05:21:45', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-26 23:51:45', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 1, 'neha', 'thanekar', 'nehakana@gmail.com', '$2y$10$xDcEFW3ZqOe..kWKSpBNSuz0rcLUulK8QCF9cX3HkvCx9hjdja8iy', NULL, '+919434545465', 0, NULL, NULL, '2023-01-26', '2023-01-27 11:36:02', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-27 06:06:02', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', '0', ''),
(0, 7, 'kishu', 'holsekar', 'kishue23@gmail.com', '$2y$10$.ZS18UdWnd4OcEuU/G7A7OS7YtnOMWXq8mHaOLjdCUwN17fcOgM2G', NULL, '+919443543454', 0, NULL, NULL, '2023-01-23', '2023-01-27 12:21:45', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-01-27 06:51:45', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', '0', ''),
(0, 3, 'sau', 'rane', 'sau@gmail.com', '$2y$10$ASAiFwT8z7DZypzFHF8qGeIVfF25CtuuiGSb5Rm88y39tmjoy4SXS', NULL, '+919434565676', 0, NULL, 'o+', '2023-02-08', '2023-02-08 09:35:55', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-02-08 04:05:55', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, ''),
(0, 2, 'abhi', 'khan', 'abhi@gmail.com', '$2y$10$5Txrrt8HisOOGTzYa0daaeWJK1VVxlvSvOwvbHYHsiqlxbiS/0X4O', 'jr.developer', '+919345675676', 0, 'Bsc IT', 'o', '2023-02-08', '2023-02-08 09:38:10', 17, 'App\\Models\\Doctor', 1, 'en', NULL, 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '2023-02-08 04:08:10', '2023-02-08 04:08:11', NULL, NULL, NULL, NULL, '0', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_zoom_credential`
--

CREATE TABLE `user_zoom_credential` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `zoom_api_key` varchar(191) NOT NULL,
  `zoom_api_secret` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccinated_patients`
--

CREATE TABLE `vaccinated_patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `vaccination_id` int(10) UNSIGNED NOT NULL,
  `vaccination_serial_number` varchar(191) DEFAULT NULL,
  `dose_number` varchar(191) NOT NULL,
  `dose_given_date` datetime NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccinated_patients`
--

INSERT INTO `vaccinated_patients` (`id`, `patient_id`, `vaccination_id`, `vaccination_serial_number`, `dose_number`, `dose_given_date`, `description`, `created_at`, `updated_at`) VALUES
(2, 24, 3, '1234', '1', '2022-12-07 14:26:00', 'yes', '2022-12-07 03:26:41', '2022-12-07 03:26:41'),
(3, 33, 3, 'ww', '2', '2022-12-26 14:26:00', '2', '2022-12-07 03:27:10', '2022-12-07 03:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `manufactured_by` varchar(191) NOT NULL,
  `brand` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccinations`
--

INSERT INTO `vaccinations` (`id`, `name`, `manufactured_by`, `brand`, `created_at`, `updated_at`) VALUES
(3, 'polio', 'Hospital', 'one', '2022-12-07 03:25:19', '2022-12-07 03:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `vendorpo`
--

CREATE TABLE `vendorpo` (
  `id` int(11) NOT NULL,
  `vendorname` varchar(191) DEFAULT NULL,
  `venpo_no` varchar(200) NOT NULL,
  `date` text DEFAULT NULL,
  `category` varchar(191) DEFAULT NULL,
  `sub_category` varchar(191) DEFAULT NULL,
  `updated_at` varchar(191) NOT NULL DEFAULT current_timestamp(),
  `created_at` varchar(191) NOT NULL DEFAULT current_timestamp(),
  `product` varchar(191) DEFAULT NULL,
  `product_id` text DEFAULT NULL,
  `mrp` varchar(191) DEFAULT NULL,
  `hsn` varchar(191) DEFAULT NULL,
  `size` varchar(191) DEFAULT NULL,
  `current_qty` varchar(191) DEFAULT NULL,
  `minimum_qty` text DEFAULT NULL,
  `maximum_qty` text DEFAULT NULL,
  `po_qty` varchar(191) DEFAULT NULL,
  `cost` varchar(191) DEFAULT NULL,
  `expected_sale` varchar(191) DEFAULT NULL,
  `last_30_days` varchar(191) DEFAULT NULL,
  `last_90_days` varchar(191) DEFAULT NULL,
  `brand` varchar(191) DEFAULT NULL,
  `model_no` varchar(191) DEFAULT NULL,
  `make` varchar(191) DEFAULT NULL,
  `material` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `shape` varchar(191) DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL,
  `total_cost` varchar(191) DEFAULT NULL,
  `vision` varchar(191) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendorpo`
--

INSERT INTO `vendorpo` (`id`, `vendorname`, `venpo_no`, `date`, `category`, `sub_category`, `updated_at`, `created_at`, `product`, `product_id`, `mrp`, `hsn`, `size`, `current_qty`, `minimum_qty`, `maximum_qty`, `po_qty`, `cost`, `expected_sale`, `last_30_days`, `last_90_days`, `brand`, `model_no`, `make`, `material`, `gender`, `shape`, `color`, `total_cost`, `vision`, `status`) VALUES
(21, '12', '', '10-11-2022', '14', '202', '2022-11-10 06:47:18', '2022-11-10 06:47:18', '2,3,4', '2,3,4', '200000,120000,2345', '123,12345,123456', NULL, NULL, NULL, NULL, '2,3,2', '400000,360000,4690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '29', '', '10-11-2022', '12', '266', '2022-11-10 07:02:45', '2022-11-10 07:02:45', '2,3,4,5', '2,3,4,5', '200000,120000,2345,200000', '123,12345,123456,123456', NULL, NULL, NULL, NULL, '2,3,4,3', '400000,360000,9380,600000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Deny'),
(26, '26', '', '10-11-2022', '3', '221', '2022-11-10 07:19:59', '2022-11-10 07:19:59', '2,4,5', '2,4,5', '200000,2345,200000', '123,123456,123456', NULL, NULL, NULL, NULL, '3,3,2', '600000,7035,400000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '10', '', '10-11-2022', '16', 'Select Sub-category', '2022-11-10 13:46:19', '2022-11-10 13:46:19', '3,4', '3,4', '120000,2345', '12345,123456', NULL, NULL, NULL, NULL, '5,10', '600000,23450', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Deny'),
(29, '11', '', '11-11-2022', '12', '183', '2022-11-11 12:41:56', '2022-11-11 12:41:56', '3,2', '3,2', '120000,200000', '12345,123', NULL, NULL, NULL, NULL, '3,4', '360000,800000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '12', 'VEN_PO_030', '11-11-2022', '14', '261', '2022-11-11 12:50:04', '2022-11-11 12:50:04', '2,3,5', '2,3,5', '200000,120000,200000', '123,12345,123456', NULL, NULL, NULL, NULL, '4,3,2', '800000,360000,400000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '11', 'VEN_PO_031', '11-11-2022', '12', '230', '2022-11-11 12:53:15', '2022-11-11 12:53:15', '2,3', '2,3', '200000,120000', '123,12345', NULL, NULL, NULL, NULL, '6,3', '1200000,360000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '12', 'VEN_PO_032', '11-11-2022', '14', '261', '2022-11-11 13:50:38', '2022-11-11 13:50:38', '2,2', '2,2', '200000,200000', '123,123', NULL, NULL, NULL, NULL, '3,4', '600000,800000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '10', 'VEN_PO_033', '11-11-2022', '16', '251', '2022-11-11 14:18:14', '2022-11-11 14:18:14', '2', '2', '200000', '123', NULL, NULL, NULL, NULL, '3', '600000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, 'VEN_PO_034', '11-11-2022', NULL, NULL, '2022-11-11 14:33:35', '2022-11-11 14:33:35', '', '', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '31', 'VEN_PO_035', '07-12-2022', '4', '175', '2022-12-07 10:41:01', '2022-12-07 10:41:01', '7', '7', '150000', '123456', NULL, NULL, NULL, NULL, '2', '300000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `vendorre`
--

CREATE TABLE `vendorre` (
  `id` int(11) NOT NULL,
  `reference_code` varchar(40) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `alternate_mobile` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alternate_vendor_name` varchar(100) NOT NULL,
  `v_perinvocing` varchar(50) NOT NULL,
  `gst_no` varchar(30) NOT NULL,
  `pan_no` varchar(30) NOT NULL,
  `license_no` int(11) NOT NULL,
  `transportation_mode` varchar(50) NOT NULL,
  `buliding` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `suburb` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `register_name` varchar(100) NOT NULL,
  `account_number` varchar(40) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `upload_document` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `vender_category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendorre`
--

INSERT INTO `vendorre` (`id`, `reference_code`, `v_name`, `mobile`, `alternate_mobile`, `email`, `alternate_vendor_name`, `v_perinvocing`, `gst_no`, `pan_no`, `license_no`, `transportation_mode`, `buliding`, `street`, `suburb`, `zipcode`, `country`, `state`, `city`, `bank_name`, `register_name`, `account_number`, `ifsc_code`, `account_type`, `upload_document`, `created_at`, `updated_at`, `vender_category`) VALUES
(10, 'VEN10', 'vaibhav', 8669855979, 9324793574, 'admin@admin.com', 'dgsgsg', 'safkgsfk', 'snngs', 'hhfaf885', 36563756, 'sonya', 'dsgsgs', 'kalyan', 'safn af', 42001, 101, 2, 6, 'dns', 'Rahul', '45963596395', '757657', 'Saving', '1666251375.zip', '2022-10-21 03:55:33', '2022-10-20 02:06:15', '16'),
(11, 'VEN11', 'Virah', 9324793574, 8669855979, 'rahulgangji1989@gmail.com', 'sonu', 'safkgsfk', '18AABCU9603R1ZM', 'hhfaf885', 36563756, 'sonya', 'dsgsgs', 'xcZ', 'dhgsajdga', 0, 101, 12, 791, 'dns', 'Rahul', '45963596395', '82394639', 'Saving', '1666263216.zip', '2022-10-21 03:55:40', '2022-10-20 05:23:36', '12'),
(12, 'VEN12', 'akshuu', 8669855979, 9324793574, 'rahulgangji1989@gmail.com', 'dgsgsg', 'safkgsfk', '18AABCU9603R1ZM', 'hhfaf885', 36563756, 'rahul', 'dsgsgs', 'kalyan', 'dhgsajdga', 0, 101, 13, 1109, 'dns', 'hhhh', '45963596395', '757657', 'Saving', '1666277333.zip', '2022-10-21 03:55:46', '2022-10-20 09:18:53', '14'),
(13, 'VEN13', 'pererna', 8669855970, 9324793574, 'rahulgangji1989@gmail.com', 'sonu', 'safkgsfk', '18AABCU9603R1ZM', 'hhfaf885', 36563756, 'rahul', 'dsgsgs', 'asgdhghsa', 'rfg', 0, 101, 13, 1110, 'dns', 'Rahul', '45963596395', '82394639', 'Current', '1666324709.jpg', '2022-10-21 06:56:18', '2022-10-20 22:28:29', '12'),
(14, 'VEN14', 'karang', 8669855970, 4359346756, 'admin@admin.com', 'dgsgsg', 'safkgsfk', 'snngs', 'hhfaf885', 36563756, 'rahul', 'dsgsgs', '436576', 'fgfhgj', 0, 101, 13, 1112, 'dns', 'hrithik', '11111111111111', '82394639', 'Current', '1666425552.zip', '2022-10-22 07:59:12', '2022-10-22 02:29:12', '12,14'),
(15, 'VEN15', 'sanket', 8669855979, 9324793574, 'admin@admin.com', 'dgsgsg', 'safkgsfk', '18AABCU9603R1ZM', 'hhfaf885', 36563756, 'rahul', 'dsgsgs', 'xcZ', 'dhgsajdga', 42001, 101, 10, 707, 'dns', 'hhhh', '45963596395', '82394639', 'Current', '1666426056.zip', '2022-10-22 08:07:36', '2022-10-22 02:37:36', '12,19'),
(16, 'VEN16', 'kartik', 8669855979, 9324793574, 'admin@admin.com', 'dgsgsg', 'safkgsfk', 'snngs', 'hhfaf885', 36563756, 'rahul', 'dsgsgs', 'xcZ', 'safn af', 42001, 101, 16, 1365, 'dns', 'hhhh', '11111111111111', '82394639', 'Saving', '', '2022-10-22 13:24:10', '2022-10-22 07:54:10', '12,19'),
(17, 'VEN17', 'hrithikaa', 8669855979, 9324793574, 'admin@hms.com', 'dgsgsg', 'safkgsfk', '18AABCU9603R1ZM', 'hhfaf885', 36563756, 'rahul', 'dsgsgs', 'kalyan', 'dhgsajdga', 0, 101, 12, 792, 'dns', 'Rahul', '11111111111111', '82394639', 'Current', '1666447240.zip', '2022-10-22 14:00:40', '2022-10-22 08:30:40', '12,13,16'),
(18, 'VEN18', 'nimesh', 8669855970, 9324793574, 'rahulgangji1989@gmail.com', 'sonu', 'safkgsfk', 'snngs', 'hhfaf885', 36563756, 'sonya', 'dsgsgs', 'xcZ', 'dhgsajdga', 42001, 101, 14, 1219, 'dns', 'hhhh', '45963596395', '82394639', 'Saving', '1666696712.zip', '2022-10-25 11:18:32', '2022-10-25 05:48:32', '16'),
(19, 'VEN19', 'rohit', 3456787878, 3456545676, 'rohit@gmail.com', 'mau', 'yash', '12343456', '4534565676', 2147483647, '2345435435', '1', '2', '3', 445454, 101, 11, 725, 'HDFC', 'sanket', '56767687678', '5678678766', 'Current', '1666863614.jpg', '2022-10-27 09:40:14', '2022-10-27 04:10:14', '14,16,17'),
(20, 'VEN20', 'sai', 8978987898, 5676567687, 'sai@gmail.com', '6787678909', '8978980989', '345678', '564576', 453456, '2345', '1', '3', '5', 7, 101, 10, 706, 'HDFC', 'iiiiii', '789878980989', 'HDFC1234', 'Current', '1666940598.jpg', '2022-10-28 07:03:18', '2022-10-28 01:33:18', '14,16,17'),
(21, 'VEN21', 'yash', 2343543456, 4545657656, 'yash@gmail.com', 'yashi', 'ya', '45654567', '2343543456', 354345656, '3456', '3', '3', '4', 44445, 101, 15, 1290, 'HDFC', 'khushi', '2343234543', 'HDFC1234', 'Saving', 'cat.jpg.jpg', '2023-02-09 09:50:13', '2023-02-09 04:20:13', '1,5,8,13,2'),
(22, 'VEN22', 'nehashri', 9878676756, 2343544565, 'kishorisohani4@gmail.com', 'kishone', 'www', '34344444', '3444444', 44444, '44444', '2', '4', '4', 5555555, 101, 11, 725, 'HDFC', 'nehashrii', 'zasxd', '123456', 'Current', '1667967194.jpg', '2022-11-09 04:13:14', '2022-11-08 22:43:14', '3'),
(23, 'VEN23', 'purva', 1234345465, 2343434545, 'purva@gmail.com', '3456', '3456', '6543', '23432343', 34545, '5555', '5', '5', '5', 5, 101, 11, 724, 'HDFC', 'kish', '2345678790987890', 'sxdf', 'Current', '1667970373.jpg', '2022-11-09 05:06:13', '2022-11-08 23:36:13', '2,13,18'),
(24, 'VEN24', 'ganesh', 5676789899, 5465678767, 'ganes@gmail.com', 'ganu', 'www', '123243', '23456', 3456789, 'asdfg', '4', '4', '4', 4, 101, 13, 1115, 'HDFC', 'yehdkj', '12345678905677', '1234567', 'Saving', '1667971924.jpg', '2022-11-09 05:32:04', '2022-11-09 00:02:04', '18'),
(25, 'VEN25', 'kish', 9878676756, 3454565676, 'neha@gmail.com', 'kishone', '6576567878', '6576678798', '23432343', 2147483647, '234554', '12', '12.76', 'sdfg', 0, 101, 19, 1860, 'ghj', 'ghj', 'tgh', 'gh', 'Current', '1667972115.jpg', '2022-11-09 05:35:15', '2022-11-09 00:05:15', '13'),
(26, 'VEN26', 'sayuja', 5676876789, 4565766787, 'sayuja@gmail.com', 'sayu', 'sayujashriio', '3454345656', '54656565', 45656767, '4565766', '2', '2', '2', 2434455, 101, 19, 1856, 'HDFC', 'ruhi', '1234567890', '5678678766', 'Current', '1667972418.jpg', '2022-11-09 05:40:18', '2022-11-09 00:10:18', '3'),
(27, 'VEN27', 'samita', 6787987898, 9434565465, 'samita@gmail.com', 'kishone', 'www', '123243', 'sedtf', 34543456, 'dfg', '1', '12.76', '4', 0, 101, 12, 790, '67878678798', '7898098909', '1234567878', '4456567687', 'Current', '1667972713.jpg', '2022-11-09 05:45:13', '2022-11-09 00:15:13', '8'),
(28, 'VEN28', 'karuna', 6576567678, 6787678787, 'karuna@gmail.com', 'rashmi', 'pumana', '5656767687', '5656666', 56567676, 'asd', '2', '2', '2', 2, 101, 6, 594, 'HDFC', 'sdfg', 'zasxd', 'HDFC1234', 'Current', '1667973301.jpg', '2022-11-09 05:55:01', '2022-11-09 00:25:01', '1'),
(29, 'VEN29', 'prathmesh', 8987898098, 9434565465, 'prathmesh@gmail.com', 'kishone', 'www', '4567678767', '23432343', 2147483647, '234554', '3', '3', '3', 354565, 101, 17, 1535, 'HDFC', 'kish', 'zasxd', '34567', 'Current', '1667975123.jpg', '2022-11-09 06:25:23', '2022-11-09 00:55:23', '1,5,8,12,14'),
(30, 'VEN30', 'krutika', 6787678789, 9345564565, 'krutika67@gmail.com', 'Krutika', 'kru', '123243', '23432343', 2147483647, '2', '2', '12', '3', 345676, 101, 13, 1113, 'HDFC', 'kish', '4567898767', '1234567', 'Current', '1670409321.jpg', '2022-12-07 10:35:21', '2022-12-07 05:05:21', '4,5'),
(31, 'VEN31', 'pravin', 9878676756, 5678678787, 'pravin23@gmail.com', 'pra', 'p', '232343', '234343', 234343, '234554', '2', '2', '2', 233454, 101, 12, 789, 'asd', 'kishone', '4567898767', 'HDFC1234', 'Current', '1670409598.jpg', '2022-12-07 10:39:58', '2022-12-07 05:09:58', '4,6'),
(0, 'VEN32', 'dd', 4545456545, 7687678767, 'dd@gmail.com', 'dd-pp', 'pp-ss', '5676768767', '23432343', 2147483647, '234554', '2', '12.76', '3', 23435434, 101, 11, 725, 'HDFC', 'sanket', '2345678790987890', 'HDFC0007898', 'Saving', '1675935168.jpg', '2023-02-09 09:32:48', '2023-02-09 04:02:48', '5,6');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `purpose` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `id_card` varchar(191) DEFAULT NULL,
  `no_of_person` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `purpose`, `name`, `phone`, `id_card`, `no_of_person`, `date`, `in_time`, `out_time`, `note`, `created_at`, `updated_at`) VALUES
(0, 1, 'kish', '+919445678798', '1234fgth', '2', '2022-09-21', '11:55:55', '14:13:31', 'sdfvgh', '2022-09-21 00:35:04', '2022-09-21 00:35:04'),
(1, 2, 'pqrs-gggg', '+919421254566', 'yes', '1', '2022-04-27', '00:10:00', '12:00:50', 'drff hhj jjj', '2022-04-25 22:58:54', '2022-04-26 23:32:38'),
(3, 3, 'kavya', '+917056789878', 'yes', '2', '2022-04-28', '08:30:00', '21:30:00', 'sdfg dfgh dgf', '2022-04-26 23:22:22', '2022-04-26 23:22:22'),
(4, 2, 'sarthak', '+919432345676', 'yes', '2', '2022-04-28', '08:30:00', '11:55:00', 'sdfg dfgh dgf', '2022-04-26 23:31:46', '2022-04-26 23:31:46'),
(5, 1, 'test', '+919789890987', 'yes', '2', '2022-04-28', '11:00:00', '13:20:29', 'cvb n', '2022-04-27 02:21:21', '2022-04-27 02:21:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountants_user_id_foreign` (`user_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_name_index` (`name`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advanced_payments`
--
ALTER TABLE `advanced_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advanced_payments_patient_id_foreign` (`patient_id`),
  ADD KEY `advanced_payments_amount_index` (`amount`);

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ambulances_vehicle_number_index` (`vehicle_number`);

--
-- Indexes for table `ambulance_calls`
--
ALTER TABLE `ambulance_calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ambulance_calls_patient_id_foreign` (`patient_id`),
  ADD KEY `ambulance_calls_ambulance_id_foreign` (`ambulance_id`),
  ADD KEY `ambulance_calls_date_index` (`date`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_opd_date_index` (`opd_date`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_department_id_foreign` (`department_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beds_bed_type_foreign` (`bed_type`),
  ADD KEY `beds_is_available_index` (`is_available`);

--
-- Indexes for table `bed_assigns`
--
ALTER TABLE `bed_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bed_assigns_bed_id_foreign` (`bed_id`),
  ADD KEY `bed_assigns_patient_id_foreign` (`patient_id`),
  ADD KEY `bed_assigns_created_at_assign_date_index` (`created_at`,`assign_date`),
  ADD KEY `bed_assigns_ipd_patient_department_id_foreign` (`ipd_patient_department_id`);

--
-- Indexes for table `bed_types`
--
ALTER TABLE `bed_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bed_types_title_index` (`title`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_patient_id_foreign` (`patient_id`),
  ADD KEY `bills_bill_date_index` (`bill_date`);

--
-- Indexes for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_items_bill_id_foreign` (`bill_id`);

--
-- Indexes for table `birth_reports`
--
ALTER TABLE `birth_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `birth_reports_patient_id_foreign` (`patient_id`),
  ADD KEY `birth_reports_doctor_id_foreign` (`doctor_id`),
  ADD KEY `birth_reports_date_index` (`date`);

--
-- Indexes for table `blood_banks`
--
ALTER TABLE `blood_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_banks_remained_bags_index` (`remained_bags`);

--
-- Indexes for table `blood_donations`
--
ALTER TABLE `blood_donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_donations_blood_donor_id_foreign` (`blood_donor_id`);

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_donors_created_at_last_donate_date_index` (`created_at`,`last_donate_date`);

--
-- Indexes for table `blood_issues`
--
ALTER TABLE `blood_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_issues_doctor_id_foreign` (`doctor_id`),
  ADD KEY `blood_issues_donor_id_foreign` (`donor_id`),
  ADD KEY `blood_issues_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_name_index` (`name`);

--
-- Indexes for table `call_logs`
--
ALTER TABLE `call_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_handlers`
--
ALTER TABLE `case_handlers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_handlers_user_id_foreign` (`user_id`);

--
-- Indexes for table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_name_index` (`name`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charges_charge_category_id_foreign` (`charge_category_id`),
  ADD KEY `charges_code_index` (`code`);

--
-- Indexes for table `charge_categories`
--
ALTER TABLE `charge_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charge_categories_name_index` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counseller_entry`
--
ALTER TABLE `counseller_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death_reports`
--
ALTER TABLE `death_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `death_reports_patient_id_foreign` (`patient_id`),
  ADD KEY `death_reports_doctor_id_foreign` (`doctor_id`),
  ADD KEY `death_reports_date_index` (`date`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis_categories`
--
ALTER TABLE `diagnosis_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosis_categories_name_index` (`name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`),
  ADD KEY `doctors_doctor_department_id_foreign` (`doctor_department_id`);

--
-- Indexes for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_departments_title_index` (`title`);

--
-- Indexes for table `doctor_opd_charges`
--
ALTER TABLE `doctor_opd_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_opd_charges_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_opd_charges_created_at_index` (`created_at`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_uploaded_by_foreign` (`uploaded_by`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_types_name_index` (`name`);

--
-- Indexes for table `employee_payrolls`
--
ALTER TABLE `employee_payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_payrolls_id_sr_no_index` (`id`,`sr_no`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_viewed_by_foreign` (`viewed_by`),
  ADD KEY `enquiries_created_at_index` (`created_at`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_date_index` (`date`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_services`
--
ALTER TABLE `front_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_settings`
--
ALTER TABLE `front_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitalinvoice`
--
ALTER TABLE `hospitalinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_schedules`
--
ALTER TABLE `hospital_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_date_index` (`date`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurances_name_index` (`name`);

--
-- Indexes for table `insurance_diseases`
--
ALTER TABLE `insurance_diseases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurance_diseases_insurance_id_foreign` (`insurance_id`);

--
-- Indexes for table `investigation_reports`
--
ALTER TABLE `investigation_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigation_reports_patient_id_foreign` (`patient_id`),
  ADD KEY `investigation_reports_doctor_id_foreign` (`doctor_id`),
  ADD KEY `investigation_reports_date_index` (`date`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `invoices_invoice_date_index` (`invoice_date`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_account_id_foreign` (`account_id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `ipd_bills`
--
ALTER TABLE `ipd_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_bills_ipd_patient_department_id_foreign` (`ipd_patient_department_id`);

--
-- Indexes for table `ipd_charges`
--
ALTER TABLE `ipd_charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_charges_ipd_patient_department_id_foreign` (`ipd_patient_department_id`),
  ADD KEY `ipd_charges_charge_category_id_foreign` (`charge_category_id`),
  ADD KEY `ipd_charges_charge_id_foreign` (`charge_id`);

--
-- Indexes for table `ipd_consultant_registers`
--
ALTER TABLE `ipd_consultant_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_consultant_registers_ipd_patient_department_id_foreign` (`ipd_patient_department_id`),
  ADD KEY `ipd_consultant_registers_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `ipd_diagnoses`
--
ALTER TABLE `ipd_diagnoses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_diagnoses_ipd_patient_department_id_foreign` (`ipd_patient_department_id`);

--
-- Indexes for table `ipd_patient_departments`
--
ALTER TABLE `ipd_patient_departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipd_patient_departments_ipd_number_unique` (`ipd_number`),
  ADD KEY `ipd_patient_departments_patient_id_foreign` (`patient_id`),
  ADD KEY `ipd_patient_departments_case_id_foreign` (`case_id`),
  ADD KEY `ipd_patient_departments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `ipd_patient_departments_bed_type_id_foreign` (`bed_type_id`),
  ADD KEY `ipd_patient_departments_bed_id_foreign` (`bed_id`);

--
-- Indexes for table `ipd_payments`
--
ALTER TABLE `ipd_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_payments_ipd_patient_department_id_foreign` (`ipd_patient_department_id`);

--
-- Indexes for table `ipd_prescriptions`
--
ALTER TABLE `ipd_prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_prescriptions_ipd_patient_department_id_foreign` (`ipd_patient_department_id`);

--
-- Indexes for table `ipd_prescription_items`
--
ALTER TABLE `ipd_prescription_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_prescription_items_ipd_prescription_id_foreign` (`ipd_prescription_id`),
  ADD KEY `ipd_prescription_items_category_id_foreign` (`category_id`),
  ADD KEY `ipd_prescription_items_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `ipd_timelines`
--
ALTER TABLE `ipd_timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipd_timelines_ipd_patient_department_id_foreign` (`ipd_patient_department_id`);

--
-- Indexes for table `issued_items`
--
ALTER TABLE `issued_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issued_items_department_id_foreign` (`department_id`),
  ADD KEY `issued_items_user_id_foreign` (`user_id`),
  ADD KEY `issued_items_item_category_id_foreign` (`item_category_id`),
  ADD KEY `issued_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_item_category_id_foreign` (`item_category_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_categories_name_unique` (`name`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_stocks_item_category_id_foreign` (`item_category_id`),
  ADD KEY `item_stocks_item_id_foreign` (`item_id`);

--
-- Indexes for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lab_technicians_user_id_foreign` (`user_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livepatientstatus`
--
ALTER TABLE `livepatientstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_consultations`
--
ALTER TABLE `live_consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `live_consultations_doctor_id_foreign` (`doctor_id`),
  ADD KEY `live_consultations_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `live_meetings`
--
ALTER TABLE `live_meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_meetings_candidates`
--
ALTER TABLE `live_meetings_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locationyear`
--
ALTER TABLE `locationyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_user_id_foreign` (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicines_category_id_foreign` (`category_id`),
  ADD KEY `medicines_brand_id_foreign` (`brand_id`),
  ADD KEY `medicines_name_index` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patienthms`
--
ALTER TABLE `patienthms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentadv`
--
ALTER TABLE `paymentadv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`) USING HASH;

--
-- Indexes for table `postot`
--
ALTER TABLE `postot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postotdetails`
--
ALTER TABLE `postotdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postotdrug`
--
ALTER TABLE `postotdrug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preottest`
--
ALTER TABLE `preottest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolemaster`
--
ALTER TABLE `rolemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_master_list`
--
ALTER TABLE `roles_master_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_submenu_list`
--
ALTER TABLE `role_submenu_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `locationyear`
--
ALTER TABLE `locationyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `patienthms`
--
ALTER TABLE `patienthms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentadv`
--
ALTER TABLE `paymentadv`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `postot`
--
ALTER TABLE `postot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `postotdetails`
--
ALTER TABLE `postotdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `postotdrug`
--
ALTER TABLE `postotdrug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `preottest`
--
ALTER TABLE `preottest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rolemaster`
--
ALTER TABLE `rolemaster`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `roles_master_list`
--
ALTER TABLE `roles_master_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `role_submenu_list`
--
ALTER TABLE `role_submenu_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
