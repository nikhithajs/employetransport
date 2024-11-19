-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 02:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emptransdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `email`, `mobile`, `password`, `create_date`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567890', '202cb962ac59075b964b07152d234b70', '2022-11-19 11:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `DepartmentName`) VALUES
(4, 'Account'),
(6, 'Admin'),
(7, 'Operations'),
(9, 'IT'),
(11, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `department_name` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `date_of_joining` varchar(45) DEFAULT NULL,
  `password` varchar(450) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`id`, `EmpId`, `fname`, `lname`, `department_name`, `email`, `mobile`, `country`, `state`, `city`, `address`, `photo`, `dob`, `date_of_joining`, `password`, `create_date`) VALUES
(1, 'Emp12345', 'Rahul', 'Singh', 4, 'sss@gmail.com', '9999999999', 'India', 'UP', 'Lucknow', 'H324 ABC Apartment\r\n                  ', '../uploads/1668969654-doctor.png', '1998-02-03', '2022-03-26', '5c428d8875d2948607f3e3fe134d71b4', '2022-11-19 17:16:41'),
(2, 'Emp123456', 'badal', 'Kumar', 4, 'badal@gmail.com', '9999999999', 'India', 'UP', 'Noida', 'KKKKKK', '../uploads/1648318541-blog.jpg', '2022-03-26', '2022-03-27', 'f925916e2754e5e03f75dd58a5733251', '2022-11-20 18:15:41'),
(3, '10806121', 'Anuj', 'Kumar', 9, 'ak234@test.com', '1234567891', 'India', 'UP', 'Ghazibad', 'A 123 ABC Aprtment', '../uploads/1669081889-security-guard.png', '1996-06-04', '2022-10-14', 'f925916e2754e5e03f75dd58a5733251', '2022-11-22 01:51:29'),
(4, 'Emp101', 'Sukhdev', 'Singh', 11, 'sukh@gmail.com', '6464646464', 'India', 'Delhi', 'New Delhi', 'L-900, Pushkar Vihar', '../uploads/1699939581-teacher (1).png', '1998-06-01', '2019-01-03', 'f925916e2754e5e03f75dd58a5733251', '2023-10-04 06:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 18px; text-align: center;\">Our employee transportation management system comes with several key advantages that make it suited for diversified client needs.&nbsp;</span><span style=\"color: rgb(51, 51, 51); font-family: Raleway, &quot;Open Sans&quot;, Helvetica, sans-serif; font-size: 17px; text-align: justify;\">The admin panel needs to login into the application, the admin will have many functions by which he/she can modify the pick-ups and drop-offs related services. These functions include adding a driver where he can add the driver, add vehicles where he can add vehicles to the employees, Admin can view bookings and manage time slots. On the other end, the employee first needs to register into the system by filling up basic registration details. After successful registration, an employee can log in by using their login credentials. All these features will provide a hassle-free pick-and-drop management system for an organization. The system is designed to manage all the employees of a company, their transport, and the vehicles that they use.</span>', NULL, NULL, '2023-10-10 11:56:18'),
(2, 'contactus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India.', 'etmsinfo@test.com', 1234567891, '2023-10-10 06:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehbook`
--

CREATE TABLE `tblvehbook` (
  `ID` int(10) NOT NULL,
  `BookingID` int(10) DEFAULT NULL,
  `VehID` int(10) DEFAULT NULL,
  `EmpID` varchar(250) DEFAULT NULL,
  `FromDate` varchar(250) DEFAULT NULL,
  `Todate` varchar(250) DEFAULT NULL,
  `ArrivalTime` varchar(250) DEFAULT NULL,
  `Pickuppoint` varchar(250) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminStatus` varchar(250) DEFAULT NULL,
  `AdminRemarks` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvehbook`
--

INSERT INTO `tblvehbook` (`ID`, `BookingID`, `VehID`, `EmpID`, `FromDate`, `Todate`, `ArrivalTime`, `Pickuppoint`, `Remark`, `BookingDate`, `AdminStatus`, `AdminRemarks`, `UpdationDate`) VALUES
(1, 270314302, 1, 'Emp101', '2023-10-06', '2023-12-05', '18:45', 'F-890, Gauri Apartment', 'Call when reach', '2023-10-06 06:24:52', 'Reject', 'Due to unavailability of seat', '2023-10-09 12:18:37'),
(2, 470314307, 2, 'Emp101', '2023-10-15', '2023-10-21', '10:30', 'J-780, Konark Apartment', 'Call when reach', '2023-10-09 12:14:51', 'Approved', 'Vehicle Booking Request Has been accepted', '2023-10-11 07:18:11'),
(3, 350076238, 4, 'Emp101', '2023-12-01', '2023-12-31', 'ABC Point', 'XYZ Point', 'NA', '2023-11-14 06:11:27', NULL, NULL, NULL),
(4, 256775835, 4, '10806121', '2023-12-01', '2024-04-30', '10 AM', 'T Point', 'NA', '2023-11-14 09:31:51', 'Approved', 'Approved', '2023-11-14 09:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `ID` int(11) NOT NULL,
  `VehicleRegNum` varchar(250) DEFAULT NULL,
  `DriverName` varchar(250) DEFAULT NULL,
  `DriverContactNum` bigint(11) DEFAULT NULL,
  `VehicleType` varchar(50) DEFAULT NULL,
  `TimeSlots` varchar(250) DEFAULT NULL,
  `Source` varchar(250) DEFAULT NULL,
  `Destination` varchar(255) DEFAULT NULL,
  `RouteNumber` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `VehicleRegNum`, `DriverName`, `DriverContactNum`, `VehicleType`, `TimeSlots`, `Source`, `Destination`, `RouteNumber`, `CreationDate`) VALUES
(1, 'DEL234hj546', 'Jackie Singh', 9797979797, 'Car', '18:30', 'abc', 'xyz', 'RT1', '2023-10-04 12:13:31'),
(2, 'DEL10234', 'Harish', 6546464646, 'Van', '09:30', 'Laxmi Nagar', 'Vaishali', 'RT2', '2023-10-04 12:15:42'),
(3, 'UP123456', 'Joy', 4654654564, 'Car', '10 am to 11 amm', 'vanupuram', 'xyz company', 'RT3', '2023-10-09 12:30:52'),
(4, 'UP123457', 'Kaushal Kumar', 9797987987, 'Van', '7:30 am to 8:30 am', 'Gauri kunj', 'vdh pvt ltd', 'RT4', '2023-10-09 12:33:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmpId` (`EmpId`),
  ADD KEY `deptid` (`department_name`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehbook`
--
ALTER TABLE `tblvehbook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `empid` (`EmpID`),
  ADD KEY `vid` (`VehID`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblvehbook`
--
ALTER TABLE `tblvehbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
DELIMITER //

CREATE TRIGGER enforce_unique_vehicle_reg_num
BEFORE INSERT ON tblvehicle
FOR EACH ROW
BEGIN
    IF EXISTS (SELECT 1 FROM tblvehicle WHERE VehicleRegNum = NEW.VehicleRegNum) THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Vehicle registration number must be unique';
    END IF;
END//


DELIMITER ;