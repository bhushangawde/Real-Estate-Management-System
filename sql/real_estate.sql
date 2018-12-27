-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2018 at 06:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `room_type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `cust_id`, `sub_id`, `date`, `status`, `room_type`) VALUES
(1, 1, 1, '2016-09-12', '', 1),
(2, 2, 3, '2016-10-10', '', 3),
(3, 1, 2, '2016-10-01', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bhk_1`
--

CREATE TABLE `bhk_1` (
  `bhk1_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `bedroom_pic` varchar(100) NOT NULL,
  `kitchen_pic` varchar(100) NOT NULL,
  `hall_pic` varchar(100) NOT NULL,
  `other_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhk_1`
--

INSERT INTO `bhk_1` (`bhk1_id`, `sub_id`, `bedroom_pic`, `kitchen_pic`, `hall_pic`, `other_pic`) VALUES
(1, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bhk_2`
--

CREATE TABLE `bhk_2` (
  `bhk2_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `bedroom1` varchar(200) NOT NULL,
  `bedroom2` varchar(200) NOT NULL,
  `kitchen` varchar(200) NOT NULL,
  `hall` varchar(200) NOT NULL,
  `other` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhk_2`
--

INSERT INTO `bhk_2` (`bhk2_id`, `sub_id`, `bedroom1`, `bedroom2`, `kitchen`, `hall`, `other`) VALUES
(1, 2, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bhk_3`
--

CREATE TABLE `bhk_3` (
  `bhk3_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `bedroom1` varchar(200) NOT NULL,
  `bedroom2` varchar(200) NOT NULL,
  `bedroom3` varchar(200) NOT NULL,
  `kitchen` varchar(200) NOT NULL,
  `hall` varchar(200) NOT NULL,
  `other` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bhk_3`
--

INSERT INTO `bhk_3` (`bhk3_id`, `sub_id`, `bedroom1`, `bedroom2`, `bedroom3`, `kitchen`, `hall`, `other`) VALUES
(1, 3, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `to_be_paid` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `last_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_no` int(11) NOT NULL,
  `customer_approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `cust_id`, `sub_id`, `date`, `status`, `to_be_paid`, `amount_paid`, `last_paid`, `room_no`, `customer_approval`) VALUES
(1, 1, 2, '2016-10-19', '', 9000000, 1000000, '2016-10-17 18:40:46', 202, 1),
(2, 2, 3, '2016-10-11', '', 50000000, 50000000, '2016-10-17 18:40:37', 301, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_doc`
--

CREATE TABLE `booking_doc` (
  `b_doc_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `doc_1` varchar(200) NOT NULL,
  `doc_2` varchar(200) NOT NULL,
  `doc_3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_doc`
--

INSERT INTO `booking_doc` (`b_doc_id`, `b_id`, `doc_1`, `doc_2`, `doc_3`) VALUES
(1, 1, '', '', ''),
(2, 2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `builder`
--

CREATE TABLE `builder` (
  `b_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `builder`
--

INSERT INTO `builder` (`b_id`, `name`, `email`, `contact`, `address`, `dob`) VALUES
(1, 'Bhushan Gawde', 'bhushangawde32@gmail.com', 1234567890, 'Thane', '1996-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `builder_projects`
--

CREATE TABLE `builder_projects` (
  `mapping_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `builder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `builder_projects`
--

INSERT INTO `builder_projects` (`mapping_id`, `project_id`, `builder_id`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_email` varchar(40) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `yearly_income` int(11) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `c_name`, `c_email`, `contact`, `address`, `occupation`, `yearly_income`, `dob`) VALUES
(1, 'Bhargav Makwana', 'bhargavmak@gmail.com', 987654321, 'Jogeshwari-East', 'Student', 100000, '1997-02-04'),
(2, 'Vishal Giri', 'girivishalk@gmail.com', 907651243, 'Andheri', 'student', 200000, '1996-02-01'),
(5, 'New User', 'newuser@gmail.com', 1234567890, 'abcd1234', '', 0, '1992-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user_id`, `username`, `password`, `user_type`) VALUES
(1, 1, 'bhushan', 'bhushan', 'builder'),
(2, 1, 'bhargav', 'bhargav', 'customer'),
(3, 2, 'vishal', 'vishal', 'customer'),
(6, 5, 'new_user_name', 'e19d5cd5af0378da05f63f891c7467af', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contact1` int(10) NOT NULL,
  `contact2` int(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `layout_plan` varchar(50) NOT NULL,
  `photos` varchar(50) NOT NULL,
  `features` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `start_date`, `end_date`, `contact1`, `contact2`, `address`, `layout_plan`, `photos`, `features`) VALUES
(1, 'Swapna Co-Op housing', '2015-09-12', '2018-06-14', 986742310, 0, 'Sector 1 Dadar East', '', '', ''),
(2, 'Guru Krupa', '2016-01-21', '2019-04-04', 1234658709, 0, 'Sector 2 Dadar East', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_project`
--

CREATE TABLE `sub_project` (
  `sub_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `type_of_room` int(11) NOT NULL,
  `max_floor` int(11) NOT NULL,
  `max_price` int(11) NOT NULL,
  `carpet_area` int(11) NOT NULL,
  `rate_per_sq_feet` int(11) NOT NULL,
  `electricity` varchar(200) NOT NULL,
  `water` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_project`
--

INSERT INTO `sub_project` (`sub_id`, `project_id`, `type_of_room`, `max_floor`, `max_price`, `carpet_area`, `rate_per_sq_feet`, `electricity`, `water`) VALUES
(1, 1, 1, 4, 10000000, 400, 5000, '', ''),
(2, 1, 2, 10, 30000000, 5000, 20000, '', ''),
(3, 2, 3, 20, 50000000, 10000, 20000, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `cust_id` (`cust_id`) USING BTREE,
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `bhk_1`
--
ALTER TABLE `bhk_1`
  ADD PRIMARY KEY (`bhk1_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `bhk_2`
--
ALTER TABLE `bhk_2`
  ADD PRIMARY KEY (`bhk2_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `bhk_3`
--
ALTER TABLE `bhk_3`
  ADD PRIMARY KEY (`bhk3_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `app_id` (`cust_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `booking_doc`
--
ALTER TABLE `booking_doc`
  ADD PRIMARY KEY (`b_doc_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `builder`
--
ALTER TABLE `builder`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `builder_projects`
--
ALTER TABLE `builder_projects`
  ADD PRIMARY KEY (`mapping_id`),
  ADD KEY `project_id` (`project_id`) USING BTREE,
  ADD KEY `builder_id` (`builder_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `sub_project`
--
ALTER TABLE `sub_project`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bhk_1`
--
ALTER TABLE `bhk_1`
  MODIFY `bhk1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bhk_2`
--
ALTER TABLE `bhk_2`
  MODIFY `bhk2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bhk_3`
--
ALTER TABLE `bhk_3`
  MODIFY `bhk3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `booking_doc`
--
ALTER TABLE `booking_doc`
  MODIFY `b_doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `builder`
--
ALTER TABLE `builder`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `builder_projects`
--
ALTER TABLE `builder_projects`
  MODIFY `mapping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_project`
--
ALTER TABLE `sub_project`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `sub_project` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bhk_1`
--
ALTER TABLE `bhk_1`
  ADD CONSTRAINT `bhk_1_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `sub_project` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bhk_2`
--
ALTER TABLE `bhk_2`
  ADD CONSTRAINT `bhk_2_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `sub_project` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bhk_3`
--
ALTER TABLE `bhk_3`
  ADD CONSTRAINT `bhk_3_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `sub_project` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `sub_project` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_doc`
--
ALTER TABLE `booking_doc`
  ADD CONSTRAINT `booking_doc_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `booking` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `builder_projects`
--
ALTER TABLE `builder_projects`
  ADD CONSTRAINT `builder_projects_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `builder_projects_ibfk_2` FOREIGN KEY (`builder_id`) REFERENCES `builder` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_project`
--
ALTER TABLE `sub_project`
  ADD CONSTRAINT `sub_project_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
