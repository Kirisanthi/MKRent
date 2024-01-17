-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 03:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mktravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'bb6f9cc31bc36ef1d3683e8a7da0fac1', '2024-01-16 18:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `brandsdetails`
--

CREATE TABLE `brandsdetails` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brandsdetails`
--

INSERT INTO `brandsdetails` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2017-06-18 16:24:34', '2017-06-19 06:42:23'),
(2, 'BMW', '2017-06-18 16:24:50', NULL),
(3, 'Audi', '2017-06-18 16:25:03', NULL),
(4, 'Nissan', '2017-06-18 16:25:13', NULL),
(5, 'Toyota', '2017-06-18 16:25:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commonpages`
--

CREATE TABLE `commonpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commonpages`
--

INSERT INTO `commonpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>Terms and Conditions </FONT><BR><BR></STRONG>\r\nWelcome to our MK Travels service! By accessing and using our application, you agree to comply with the following terms and conditions. To rent a vehicle, users must meet eligibility criteria, including minimum age and valid driver\'s license requirements. The booking process, including reservation duration and cancellation policies, is outlined to ensure a seamless experience. During the rental period, users are responsible for the vehicle\'s proper use, compliance with traffic laws, and timely return. Payment terms, insurance coverage, and fuel policies are detailed for transparency. A security deposit may be required, and penalties may apply for late returns or policy violations. Our privacy policy safeguards user data, and users are urged to review it. Any disputes are subject to resolution as outlined herein. We reserve the right to update these terms, and users must explicitly accept them before completing a reservation. Thank you for choosing our MK Travels service. Safe travels! </FONT></P>\r\n'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: left;\">Effective Date: 10.11.2023 &nbsp; <h4>1. Introduction</h4> Welcome to MK Travels. We are committed to protecting your privacy and providing a safe and secure experience while using our car renting services. This privacy policy outlines our practices regarding the collection, use, and protection of your personal information when you use our app and website.&nbsp;\r\nBy using MK Travels , you consent to the practices described in this privacy policy.\r\n\r\n</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">\r\nWelcome to MK Travels, where your journey begins. We understand that every trip is a story waiting to be told, \r\nand we are here to make sure it is an unforgettable one.At MK Travels, we are not just in the business of renting cars; we are in the business of creating experiences. Whether you are a solo \r\nadventurer, a family on a road trip, or a business traveler in need of a smooth ride, we have got the perfect wheels for you. <br/><br/>\r\n\r\nWhat sets us apart? It is not just our fleet of top-notch vehicles, but the commitment to providing you with hassle-free, convenient, \r\nand reliable service. We are not just a car rental app; we are your travel companion, ensuring that every mile you cover is comfortable \r\nand filled with excitement. Our team is driven by a passion for travel and a dedication to customer satisfaction. We believe that the journey should be as enjoyable as the destination, and that is why we go the extra mile to exceed your expectations. <br/><br/>\r\n\r\nSo, whether you are embarking on a spontaneous weekend getaway or planning a meticulously organized cross-country tour, trust MK Travels\r\n to be your partner on the road. Your adventure awaits, and we are here to help you make it extraordinary. <br/> <br/>\r\n\r\nJoin us at MK Travels and let is redefine the way you travel. Because here, it is not just about renting cars; it is about\r\n unlocking a world of possibilities on wheels. </span>'),
(11, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Table structure for table `contactusdetails`
--

CREATE TABLE `contactusdetails` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactusdetails`
--

INSERT INTO `contactusdetails` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Harrow,UK', 'kirisanthiselvanajagam@gmail.com', ' 7423185904');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` float(10,2) NOT NULL,
  `transaction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `createdtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribersdetails`
--

CREATE TABLE `subscribersdetails` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribersdetails`
--

INSERT INTO `subscribersdetails` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'harish@gmail.com', '2020-07-07 09:26:21'),
(5, 'kunal@gmail.com', '2020-07-07 09:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles2`
--

CREATE TABLE `tblvehicles2` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) NOT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonialdetails`
--

CREATE TABLE `testimonialdetails` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonialdetails`
--

INSERT INTO `testimonialdetails` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(15, 'kiri@gmail.com', 'Your Services very Excellent', '2023-12-31 21:52:24', 1),
(20, 'kirisanthiselvanajagam@gmail.com', 'I am satisfied with their service. Great job... ', '2024-01-10 18:29:20', 1),
(23, 'kirisanthiselvanajagam@gmail.com', 'Effortless booking, clean vehicles, prompt service—great experience as a driver. Highly recommend for convenient and reliable online rentals.', '2024-01-10 18:57:01', 1),
(25, 'kirisanthi@gmail.com', 'Your service good', '2024-01-13 21:26:48', 1),
(26, 'kirisanthiselvanajagam@gmail.com', 'test', '2024-01-14 15:02:39', NULL),
(27, 'kirisanthi@gmail.com', 'cfv', '2024-01-17 11:56:52', NULL),
(28, 'kirisanthi@gmail.com', 'cfv', '2024-01-17 12:33:16', NULL),
(29, 'kirisanthi@gmail.com', 'xx', '2024-01-17 12:34:47', NULL),
(30, 'kirisanthi@gmail.com', 'xx', '2024-01-17 13:25:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'usd',
  `buyer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usercontactus`
--

CREATE TABLE `usercontactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercontactus`
--

INSERT INTO `usercontactus` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(7, 'Kiru', 'kirisanthiselvanajagam@gmail.com', '745253514', 'I need your support', '2024-01-13 21:19:00', 1),
(8, 'Kiru', 'kirisanthiselvanajagam@gmail.com', '745253514', 'I need your support', '2024-01-13 21:24:46', NULL),
(9, 'Kir', 'kirisanthiselvanajagam@gmail.com', '745253514', 'test', '2024-01-14 14:39:02', NULL),
(11, 'Kiru', 'kirisanthiselvanajagam@gmail.com', '745253514', 'f', '2024-01-16 21:38:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersdetails`
--

CREATE TABLE `usersdetails` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `Roles` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `verification_code` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersdetails`
--

INSERT INTO `usersdetails` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Roles`, `Address`, `Country`, `RegDate`, `UpdationDate`, `verification_code`, `email_verified_at`) VALUES
(69, 'Kiru', 'kirisanthiselvanajagam@gmail.com', 'bb6f9cc31bc36ef1d3683e8a7da0fac1', '7452535140', 'owner', NULL, NULL, '2024-01-14 17:19:05', NULL, NULL, NULL),
(70, 'Kiru', 'kirisanthi@gmail.com', 'bb6f9cc31bc36ef1d3683e8a7da0fac1', '7452535140', 'driver', NULL, NULL, '2024-01-14 17:20:20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `roles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`, `roles`) VALUES
(2, 'kirisanthi', 'kirisanthiselvanajagam@gmail.com', '$2y$10$MHjGaFhZ02ziPxjW7mE5oeiLpqMa3GUwTgnQIJpqyrKEEBCtWCLlu', 0, 'verified', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `vechiclebooking`
--

CREATE TABLE `vechiclebooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ownerEmail` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vechiclebooking`
--

INSERT INTO `vechiclebooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`, `ownerEmail`) VALUES
(52, 553811031, 'kirisanthi@gmail.com', 2, '2024-01-17', '2024-01-18', 'test', NULL, '2024-01-16 20:50:19', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclesdetails`
--

CREATE TABLE `vehiclesdetails` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ownerEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclesdetails`
--

INSERT INTO `vehiclesdetails` (`id`, `VehiclesTitle`, `VehiclesBrand`, `Location`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `RegDate`, `UpdationDate`, `ownerEmail`) VALUES
(2, 'BMW 5 Series', 2, 'Harrow', 'This car is a luxurious and dynamic sedan, blending cutting-edge technology with elegant design. With powerful engines, advanced features, and a comfortable interior, it exemplifies driving excellence and sophistication.', 25, 'Petrol', 2018, 5, 'BMW-5-Series-Exterior-102005.jpg', 'BMW-5-Series-New-Exterior-89729.jpg', 'BMW-5-Series-Exterior-102006.jpg', 'BMW-5-Series-Interior-102021.jpg', '2024-01-02 08:12:02', '2024-01-16 18:35:42', 'kirisanthiselvanajagam@gmail.com'),
(3, 'Audi Q8', 3, 'Wembley', 'This is a sleek and powerful luxury SUV, featuring a distinctive coupe-like design. With advanced technology, a spacious interior, and a commanding presence on the road, it epitomizes sophistication and performance.', 25, 'Petrol', 2017, 5, 'audi-q8-front-view4.jpg', '1920x1080_MTC_XL_framed_Audi-Odessa-Armaturen_Spiegelung_CC_v05.jpg', 'audi1.jpg', '1audiq8.jpg', '2024-01-02 08:19:21', '2024-01-16 18:35:46', 'kirisanthiselvanajagam@gmail.com'),
(5, 'Nissan GT-R', 4, 'LiverPool', ' The GT-R packs a 3.8-litre V6 twin-turbocharged petrol, which puts out 570PS of max power at 6800rpm and 637Nm of peak torque. The engine is mated to a 6-speed dual-clutch transmission in an all-wheel-drive setup. The 2+2 seater GT-R sprints from 0-100kmph in less than 3', 20, 'Petrol', 2019, 5, 'Nissan-GTR-Right-Front-Three-Quarter-84895.jpg', 'Best-Nissan-Cars-in-India-New-and-Used-1.jpg', '2bb3bc938e734f462e45ed83be05165d.jpg', '2020-nissan-gtr-rakuda-tan-semi-aniline-leather-interior.jpg', '2024-01-03 08:34:17', '2024-01-16 18:35:49', 'kirisanthiselvanajagam@gmail.com'),
(6, 'Nissan Sunny 2020', 4, 'Wembley', 'Value for money product and it was so good It is more spacious than other sedans It looks like a luxurious car.', 18, 'CNG', 2018, 5, 'Nissan-Sunny-Right-Front-Three-Quarter-48975_ol.jpg', 'images (1).jpg', 'Nissan-Sunny-Interior-114977.jpg', 'nissan-sunny-8a29f53-500x375.jpg', '2024-01-05 10:12:49', '2024-01-16 18:35:51', 'kirisanthiselvanajagam@gmail.com'),
(45, 'BMW ', 2, 'harrow', 'ff', 20, 'Petrol', 2021, 4, 'Untitled Diagram.drawio (6).png', 'Untitled Diagram.drawio (7).png', 'Untitled Diagram-Page-1.drawio.png', 'Untitled Diagram-Page-17.drawio.png', '2024-01-17 13:26:39', NULL, 'kirisanthiselvanajagam@gmail.com'),
(46, 'BMW ', 2, 'harrow', 'ff', 20, 'Petrol', 2021, 4, 'Untitled Diagram.drawio (6).png', 'Untitled Diagram.drawio (7).png', 'Untitled Diagram-Page-1.drawio.png', 'Untitled Diagram-Page-17.drawio.png', '2024-01-17 13:32:50', NULL, 'kirisanthiselvanajagam@gmail.com'),
(47, 'sc', 1, 'harrow', 'gf', 40, 'Petrol', 2020, 0, 'Untitled Diagram.drawio (6).png', 'Untitled Diagram.drawio (6).png', 'Untitled Diagram.drawio (5).png', 'Untitled Diagram.drawio (7).png', '2024-01-17 13:47:41', NULL, 'kirisanthiselvanajagam@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brandsdetails`
--
ALTER TABLE `brandsdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commonpages`
--
ALTER TABLE `commonpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactusdetails`
--
ALTER TABLE `contactusdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribersdetails`
--
ALTER TABLE `subscribersdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles2`
--
ALTER TABLE `tblvehicles2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonialdetails`
--
ALTER TABLE `testimonialdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercontactus`
--
ALTER TABLE `usercontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersdetails`
--
ALTER TABLE `usersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vechiclebooking`
--
ALTER TABLE `vechiclebooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiclesdetails`
--
ALTER TABLE `vehiclesdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brandsdetails`
--
ALTER TABLE `brandsdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `commonpages`
--
ALTER TABLE `commonpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contactusdetails`
--
ALTER TABLE `contactusdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribersdetails`
--
ALTER TABLE `subscribersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblvehicles2`
--
ALTER TABLE `tblvehicles2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonialdetails`
--
ALTER TABLE `testimonialdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usercontactus`
--
ALTER TABLE `usercontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usersdetails`
--
ALTER TABLE `usersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vechiclebooking`
--
ALTER TABLE `vechiclebooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vehiclesdetails`
--
ALTER TABLE `vehiclesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
