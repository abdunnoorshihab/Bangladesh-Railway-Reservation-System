-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 11:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orrsphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `orrs_admin`
--

CREATE TABLE `orrs_admin` (
  `admin_id` int(20) NOT NULL,
  `admin_fname` varchar(200) NOT NULL,
  `admin_lname` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_uname` varchar(200) NOT NULL,
  `admin_pwd` varchar(200) NOT NULL,
  `admin_dpic` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orrs_admin`
--

INSERT INTO `orrs_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_uname`, `admin_pwd`, `admin_dpic`) VALUES
(1, 'System ', 'Admin', 'admin@mail.com', 'Administrator', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', 'admin-icn.png');

-- --------------------------------------------------------

--
-- Table structure for table `orrs_employee`
--

CREATE TABLE `orrs_employee` (
  `emp_id` int(20) NOT NULL,
  `emp_fname` varchar(200) NOT NULL,
  `emp_lname` varchar(200) NOT NULL,
  `emp_nat_idno` varchar(200) NOT NULL,
  `emp_phone` varchar(200) NOT NULL,
  `emp_addr` varchar(200) NOT NULL,
  `emp_uname` varchar(200) NOT NULL,
  `emp_email` varchar(200) NOT NULL,
  `emp_pwd` varchar(200) NOT NULL,
  `emp_dpic` varchar(200) NOT NULL,
  `emp_dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orrs_employee`
--

INSERT INTO `orrs_employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_nat_idno`, `emp_phone`, `emp_addr`, `emp_uname`, `emp_email`, `emp_pwd`, `emp_dpic`, `emp_dept`) VALUES
(2, 'Mr. Tasfiq Ahmed', 'Lion', '1236547', '0123654789', 'uttora', 'Tasfiq', 'amilion123@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', '', 'Jungle'),
(3, 'abdun', 'noor', '1236547', '0123654789', 'uttora', 'shihab', 'amilion123@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'Jungle'),
(4, 'Shawal', 'Binte', '1236547', '0123654789', 'uttora', 'shawal', 'amilion123@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'Jungle'),
(5, 'Toki', 'Tahmid', '1236547', '0123654789', 'uttora', 'toki', 'amilion123@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'Jungle'),
(6, ' Ahmed', 'mohammad', '1236547', '0123654789', 'uttora', 'Ahmed', 'amilion123@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'Jungle');

-- --------------------------------------------------------

--
-- Table structure for table `orrs_passenger`
--

CREATE TABLE `orrs_passenger` (
  `pass_id` int(20) NOT NULL,
  `pass_fname` varchar(200) NOT NULL,
  `pass_lname` varchar(200) NOT NULL,
  `pass_phone` varchar(200) NOT NULL,
  `pass_addr` varchar(200) NOT NULL,
  `pass_email` varchar(200) NOT NULL,
  `pass_pwd` varchar(200) NOT NULL,
  `pass_dpic` varchar(200) NOT NULL,
  `pass_uname` varchar(200) NOT NULL,
  `pass_bday` varchar(200) NOT NULL,
  `pass_bio` longtext NOT NULL,
  `pass_train_number` varchar(200) NOT NULL,
  `pass_train_name` varchar(200) NOT NULL,
  `pass_dep_station` varchar(200) NOT NULL,
  `pass_dep_time` varchar(200) NOT NULL,
  `pass_arr_station` varchar(200) NOT NULL,
  `pass_train_fare` varchar(200) NOT NULL,
  `pass_fare_payment_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orrs_passenger`
--

INSERT INTO `orrs_passenger` (`pass_id`, `pass_fname`, `pass_lname`, `pass_phone`, `pass_addr`, `pass_email`, `pass_pwd`, `pass_dpic`, `pass_uname`, `pass_bday`, `pass_bio`, `pass_train_number`, `pass_train_name`, `pass_dep_station`, `pass_dep_time`, `pass_arr_station`, `pass_train_fare`, `pass_fare_payment_code`) VALUES
(21, 'Abdun Noor', 'Shihab', '01831005011', 'abababa', 'abdunnoorshihab@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'shihab', '', '', '', '', '', '', '', '', ''),
(22, 'Abdun Noor', 'Shihab', '01831005011', 'abababa', 'abdunnoorshihab@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'shihab', '', '', '', '', '', '', '', '', ''),
(23, 'Taslima', 'Tasu', '0123654789', 'abs djun mkncjb', 'taslima@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'Tasu', '', '', '', '', '', '', '', '', ''),
(24, 'Toki ', 'Tahmid', '0123654789', 'asgr hjab njhag', 'tahmid@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'Toki', '', '', '', '', '', '', '', '', ''),
(25, 'Mohammad', 'Ahmed', '012354789', 'and f mansd', 'mohammad@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'mohammad', '', '', '', '', '', '', '', '', ''),
(26, 'Nadira', 'Nipa', '0123456987', 'abs d rmonahg', 'nipa@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'nipa', '', '', '', '', '', '', '', '', ''),
(27, 'Boshir ', 'Ahmed', '0123654789', 'bash bash bash', 'boss@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'boshir', '', '', '', '', '', '', '', '', ''),
(28, 'ahmed', 'shawal', '0123654', 'uttara', 'shawal@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'shawal', '', '', '', '', '', '', '', '', ''),
(29, 'abdun noor', 'shihab', '01831005011', 'basundhara', 'abdunnoorshihab@gmail.com', 'f7f21d3710bbb78cd46e31e8ae32271bdd2fb847', '', 'shihab', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orrs_passwordresets`
--

CREATE TABLE `orrs_passwordresets` (
  `pwd_id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orrs_passwordresets`
--

INSERT INTO `orrs_passwordresets` (`pwd_id`, `email`, `status`) VALUES
(1, 'employee@mail.com', 'Approved'),
(2, 'test21@mail.com', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orrs_train`
--

CREATE TABLE `orrs_train` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `route` varchar(200) NOT NULL,
  `current` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `passengers` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `fare` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orrs_train`
--

INSERT INTO `orrs_train` (`id`, `name`, `route`, `current`, `destination`, `time`, `passengers`, `number`, `fare`) VALUES
(6, 'Suborno Express', 'Chattogram–Dhaka', 'Chattogram', 'Dhaka', '7:00 AM', '195', 'CA-007', '320'),
(10, 'Ekota Express', 'Dhaka–Panchagarh', 'Dhaka', 'Panchagarh', '7:00 PM', '200', 'CA556680', '500'),
(11, 'Tista Express', 'Dhaka–Dewanganj', 'Dewanganj', 'Dhaka', '9:00 AM', '185', 'CA-697', '430'),
(12, 'Parabat Express', 'Dhaka–Sylhet', 'Sylhet', 'Dhaka', '10:45 AM', '255', 'CA-107', '350'),
(13, 'Paharika Express', 'Chattogram–Sylhet', 'Sylhet', 'Chattogram', '1:00 PM', '330', 'CA-777', '388'),
(14, 'Mohanganj Express', 'Dhaka–Mohanganj', 'Mohanganj', 'Dhaka', '10:00 AM', '200', 'CA-707', '128'),
(15, 'Shonar Bangla Express', 'Chattogram–Dhaka–Dhaka', 'Dhaka', 'Chattogram', '8:45 AM', '190', 'CA-107', '1490'),
(16, 'Silkcity Express', 'Dhaka–Rajshahi', 'Dhaka', 'Rajshahi', '6:00 AM', '210', 'CA-778', '1980'),
(17, 'Cox\'s Bazar Express', 'Dhaka–Cox\'s Bazar', 'Cox\'s Bazar', 'Dhaka', '12:45 PM', '195', 'CA-797', '4500');

-- --------------------------------------------------------

--
-- Table structure for table `orrs_train_tickets`
--

CREATE TABLE `orrs_train_tickets` (
  `ticket_id` int(20) NOT NULL,
  `pass_name` varchar(200) NOT NULL,
  `pass_email` varchar(200) NOT NULL,
  `pass_addr` varchar(200) NOT NULL,
  `train_name` varchar(200) NOT NULL,
  `train_no` varchar(200) NOT NULL,
  `train_dep_stat` varchar(200) NOT NULL,
  `train_arr_stat` varchar(200) NOT NULL,
  `train_fare` varchar(200) NOT NULL,
  `fare_payment_code` varchar(200) NOT NULL,
  `confirmation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orrs_train_tickets`
--

INSERT INTO `orrs_train_tickets` (`ticket_id`, `pass_name`, `pass_email`, `pass_addr`, `train_name`, `train_no`, `train_dep_stat`, `train_arr_stat`, `train_fare`, `fare_payment_code`, `confirmation`) VALUES
(5, 'Abdun Noor Shihab', 'abdunnoorshihab@mail.com', '44 Dbasundhaka', 'Tista Express', 'CA556680', 'Dhaka', 'Mymensingh', '65', 'CAS0014587', ''),
(6, 'Toki Tahmid', 'tokitoki@mail.com', '32 uttara ', 'Silk City Express', 'CA-697', 'Rajshahi', 'Dhaka', '43', '102458700041', 'Approved'),
(7, 'Shawal Binte', 'shawal@mail.com', 'Kathalbagan Street', 'Cox\'s Bazar Express', 'CA-777', 'Dhaka', 'Cox\'s Bazar', '38', '102458700041', 'Approved'),
(8, 'Durjoy', 'joyjoy@mail.com', '80 kafrul', 'Subarna Express', 'CA-007', 'Chittagong', 'Dhaka', '33', '107856452120', 'Approved'),
(9, 'Tasfiq', 'jahid@mail.com', '114 uttora', 'Pabna Express', 'CA-778', 'Pabna', 'Dhaka', '198', '100000789640', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orrs_admin`
--
ALTER TABLE `orrs_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orrs_employee`
--
ALTER TABLE `orrs_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `orrs_passenger`
--
ALTER TABLE `orrs_passenger`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `orrs_passwordresets`
--
ALTER TABLE `orrs_passwordresets`
  ADD PRIMARY KEY (`pwd_id`);

--
-- Indexes for table `orrs_train`
--
ALTER TABLE `orrs_train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orrs_train_tickets`
--
ALTER TABLE `orrs_train_tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orrs_admin`
--
ALTER TABLE `orrs_admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orrs_employee`
--
ALTER TABLE `orrs_employee`
  MODIFY `emp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orrs_passenger`
--
ALTER TABLE `orrs_passenger`
  MODIFY `pass_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orrs_passwordresets`
--
ALTER TABLE `orrs_passwordresets`
  MODIFY `pwd_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orrs_train`
--
ALTER TABLE `orrs_train`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orrs_train_tickets`
--
ALTER TABLE `orrs_train_tickets`
  MODIFY `ticket_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
