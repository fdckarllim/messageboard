-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 11:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakemessage`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `login_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `gender` int(2) NOT NULL COMMENT '1:male, 2:female',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `login_id`, `password`, `fname`, `mname`, `lname`, `nickname`, `email_address`, `phone_number`, `birthdate`, `gender`, `created`, `modified`, `last_login_time`) VALUES
(29, 'nivlaado', 'nivlaado', 'Alvin', 'Smith', 'Ado', 'Gwapo', 'nivla@gmail.com', '639324267411', '1987-10-24', 1, '2017-05-01 11:04:27', '2017-05-01 11:04:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_id`, `from_id`, `content`, `created`, `modified`) VALUES
(1, 23, 21, 'hey diddle diddle the cat in the fiddle', '2017-02-15 06:23:25', '2017-02-15 11:39:45'),
(2, 22, 23, 'hey, i was doing just fine before i met you i drink to much and that an issue but im okay', '2017-02-16 07:19:19', '2017-02-16 09:26:29'),
(3, 22, 23, 'the quick brown fox jumps over the lazy dog.', '2017-02-16 13:34:34', '2017-02-16 16:44:52'),
(4, 45, 42, 'Hi', '2017-03-01 00:00:00', '2017-03-01 00:00:00'),
(5, 42, 45, 'Hello', '2017-03-01 02:14:19', '2017-03-01 03:10:16'),
(6, 45, 42, 'I was doin heyhey', '2017-03-01 10:26:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `principals`
--

CREATE TABLE `principals` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `months_to_pay` int(11) NOT NULL,
  `borrow_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `paid_flg` int(2) NOT NULL DEFAULT '0' COMMENT '0:unpaid, 1:paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principals`
--

INSERT INTO `principals` (`id`, `client_id`, `amount`, `months_to_pay`, `borrow_date`, `due_date`, `paid_flg`) VALUES
(1, 0, 25000, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 0, 1000000, 10, '2017-05-01 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `hubby` text,
  `last_login_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_ip` varchar(20) NOT NULL,
  `modified_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `birthdate`, `hubby`, `last_login_time`, `created`, `modified`, `created_ip`, `modified_ip`) VALUES
(37, 'Kaaru', 'kaaru', '370491ef273503875c081fbc0326b4f8dfc02496', NULL, 'M', '1997-06-12', 'Lorem ipsum dolor sit amet, eu graecis fastidii pertinacia mei. Omittam atomorum inimicus id duo, eam ut regione prodesset. Vim feugiat similique an, tamquam habemus adversarium id vel. Et admodum ancillae iracundia vel, eius alienum mel ex. Te quo esse adipiscing, sea no agam dicta, et dolor homero eam. Ius in quot placerat reprehendunt, ex pro affert apeirian.', '0000-00-00 00:00:00', '2017-02-16 09:01:35', '2017-02-17 03:21:49', '', '::1'),
(38, 'Lim', 'lim', '45e68f38a4beb89c507b539eee6205b312e759dc', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-02-16 09:02:09', '2017-02-16 09:02:09', '', ''),
(39, 'rimu', 'rimu', '2da2e576701febac743c42bc7c07a6b798d9fae4', NULL, 'F', '1997-04-03', 'Lorem ipsum dolor sit amet, eu graecis fastidii pertinacia mei. Omittam atomorum inimicus id duo, eam ut regione prodesset. Vim feugiat similique an, tamquam habemus adversarium id vel. Et admodum ancillae iracundia vel, eius alienum mel ex. Te quo esse adipiscing, sea no agam dicta, et dolor homero eam. Ius in quot placerat reprehendunt, ex pro affert apeirian.', '2017-02-16 10:12:17', '2017-02-16 09:37:22', '2017-02-16 10:12:17', '', ''),
(42, 'jin', 'jin@jin.com', '129fb4f232588097b03d5d119218ca995d156d1c', NULL, NULL, NULL, NULL, '2017-02-17 02:17:31', '2017-02-16 10:27:30', '2017-02-17 02:17:31', '::1', ''),
(43, 'test', 'test@test.com', '1ece51e6676e5c3804448616a4507e52fb43a984', NULL, 'M', '2017-02-16', '', '2017-02-16 11:19:20', '2017-02-16 10:32:08', '2017-02-16 11:19:20', '::1', '::1'),
(45, 'Karl Vincent Lim', 'karl@gmail.com', 'ba126ba096444154916c9830626a35398455c2b6', NULL, 'M', '1998-04-01', 'The quick brown fox jumps over the lazy doug\r\n', '2017-05-01 11:26:31', '2017-02-17 02:21:42', '2017-05-01 11:26:31', '::1', '::1'),
(46, 'Alvin', 'alvin@gmail.com', 'f2a84a38f16870603b8661d47a621749062eb718', NULL, NULL, NULL, NULL, '2017-03-20 06:25:53', '2017-03-17 04:03:38', '2017-03-20 06:25:53', '::1', ''),
(47, 'test', 'test@gmail.com', '1ece51e6676e5c3804448616a4507e52fb43a984', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-03-17 04:06:12', '2017-03-17 04:06:12', '::1', ''),
(48, 'jin', 'jin@jin2.com', '129fb4f232588097b03d5d119218ca995d156d1c', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-03-17 04:08:31', '2017-03-17 04:08:31', '::1', ''),
(49, 'yu', 'yu@gmail.com', '9892b1ba55e4571dc994b7ebb013f56c02539542', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-03-17 04:18:16', '2017-03-17 04:18:16', '::1', ''),
(50, 'Fred', 'fred@gmail.com', 'fb7b1cdeb73f3830ca97f24611a241684ad4795c', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-03-20 06:30:57', '2017-03-20 06:30:57', '::1', ''),
(51, 'Jessa Vargas', 'jessa@gmail.com', 'a18cdd11efdf7e3480af62c6b84ef58d1942c0b9', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-03-20 06:32:39', '2017-03-20 06:32:39', '::1', ''),
(52, 'June', 'june@gmail.com', 'e1751a1a4658935f6f65eb01d7bb154aa5b53649', NULL, NULL, NULL, NULL, '2017-03-21 03:07:08', '2017-03-21 02:46:22', '2017-03-21 03:07:08', '::1', ''),
(53, 'May', 'may@gmail.com', '9a755dabfcc13773457c38553b99df12ca9c0701', NULL, '', '1997-04-12', '', '2017-03-21 03:50:04', '2017-03-21 03:29:24', '2017-03-21 03:50:28', '::1', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principals`
--
ALTER TABLE `principals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_uniq` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `principals`
--
ALTER TABLE `principals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
