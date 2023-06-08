-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 08, 2023 at 11:29 PM
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
-- Database: `city_building`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentName` varchar(50) NOT NULL,
  `location` varchar(45) NOT NULL,
  `employee_employee_id` varchar(20) NOT NULL,
  `employee_departments_departmentName` varchar(50) NOT NULL,
  `employee_requested_items_Item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(15) NOT NULL,
  `employeeNumber` varchar(20) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `projectId` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `fullname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeeNumber`, `firstName`, `projectId`, `lastName`, `phoneNumber`, `email`, `role`, `password`, `user_name`, `fullname`) VALUES
(85, 'MG1', 'Chris', '', 'Pharaoh', '+2659881533682', 'cpharaoh@gmail.com', 'manager', 'e10adc3949ba59abbe56e057f20f883e', 'chrispharaoh', ''),
(89, 'GM2', 'Chimwemwe', '', 'Dangaya pharaoh', '099446120', 'chmz@gmail.com', 'managing director', 'c20ad4d76fe97759aa27a0c99bff6710', 'chimz', ''),
(90, 'MG21', 'Essau', 'MD7', 'Pharaoh', '0992561254', 'essau@gmail.com', 'supervisor', 'e10adc3949ba59abbe56e057f20f883e', 'essau21', ''),
(91, 'MG5', 'Jerald', '', 'John', '0884521469', 'jeral5@cbc.mw', 'supervisor', '827ccb0eea8a706c4c34a16891f84e7b', 'jerald5', ''),
(92, 'MG7', 'Mussah', '', 'Allan', '0884521466', 'mussah@cbc.mw', 'supervisor', '827ccb0eea8a706c4c34a16891f84e7b', 'mussah7', ''),
(93, 'MG8', 'Tapiwa', 'MD7', 'Zimba', '0884521468', 'tapiwa8@cbc.mw', 'foreman', 'c20ad4d76fe97759aa27a0c99bff6710', 'tapiwa8', ''),
(94, 'MG12', 'Ellias', '', 'Njula', '0884521968', 'ellias12@cbc.mw', 'foreman', 'c20ad4d76fe97759aa27a0c99bff6710', 'alias12', ''),
(95, 'MG13', 'McCarthy', '', 'Divala', '0884526968', 'mccarthy13@cbc.mw', 'foreman', 'c20ad4d76fe97759aa27a0c99bff6710', 'maccarthy13', ''),
(96, 'MG14', 'Nollar', '', 'Makina', '0994526968', 'nollar14@cbc.mw', 'foreman', 'c20ad4d76fe97759aa27a0c99bff6710', 'nollar14', ''),
(97, 'MG15', 'Joyce', '', 'Banda', '0964526968', 'joyce15@cbc.mw', 'engineer', 'c20ad4d76fe97759aa27a0c99bff6710', 'joyce15', ''),
(98, 'MG16', 'Don', '', 'Chisale', '0964586968', 'don16@cbc.mw', 'engineer', 'c20ad4d76fe97759aa27a0c99bff6710', 'don16', ''),
(99, 'MG17', 'Hadday', 'MD7', 'Mike', '0964586968', 'haddy17@cbc.mw', 'engineer', 'c20ad4d76fe97759aa27a0c99bff6710', 'haddy17', ''),
(101, 'HGnda', 'elick1', '', 'kjhd', '+26599443856051', 'cpharaoh41cf1@gmail.com', 'engineer', '202cb962ac59075b964b07152d234b70', 'elick12', 'elick1..kjhd'),
(102, 'HGnda1', 'elick12', '', 'kjhd2', '+26599443856051', 'cpharaoh41cf1@gmail.com4', 'foreman', '202cb962ac59075b964b07152d234b70', 'elick123', 'elick12 kjhd2'),
(103, 'chko', 'chikondi', '', 'money', '02588', 'chikondi@gmail.com', 'engineer', '202cb962ac59075b964b07152d234b70', 'chikondi1', 'chikondi.money'),
(104, 'emil', 'Emily1', '', 'nhj', '2510', 'em@gmail.com', 'foreman', '202cb962ac59075b964b07152d234b70', 'em10', 'Emily1||nhj');

-- --------------------------------------------------------

--
-- Table structure for table `employee_has_orders`
--

CREATE TABLE `employee_has_orders` (
  `employee_employee_id` varchar(20) NOT NULL,
  `employee_departments_departmentName` varchar(50) NOT NULL,
  `orders_orderId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uploaded_date` date NOT NULL,
  `uploaded_time` time NOT NULL,
  `status` int(11) NOT NULL,
  `job_number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `requisition_number` int(15) NOT NULL DEFAULT 17644,
  `orderId` int(15) NOT NULL,
  `order_date` date NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `order_time` time NOT NULL,
  `status` int(5) NOT NULL,
  `delivery_note` varchar(250) DEFAULT NULL,
  `contract_number` varchar(45) NOT NULL,
  `place_of_delivery` varchar(200) NOT NULL,
  `issued_by` varchar(100) NOT NULL,
  `date_required` date NOT NULL,
  `collected_by` varchar(100) DEFAULT NULL,
  `recieved_by` varchar(100) DEFAULT NULL,
  `collected_date` date DEFAULT NULL,
  `recieved_date` date DEFAULT NULL,
  `vehicle_number` varchar(45) DEFAULT NULL,
  `suppliers` varchar(200) DEFAULT NULL,
  `requested_items_remarks` varchar(100) NOT NULL,
  `requested_items_Description` varchar(255) NOT NULL,
  `step2` varchar(55) NOT NULL,
  `projectID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`requisition_number`, `orderId`, `order_date`, `employee_id`, `order_time`, `status`, `delivery_note`, `contract_number`, `place_of_delivery`, `issued_by`, `date_required`, `collected_by`, `recieved_by`, `collected_date`, `recieved_date`, `vehicle_number`, `suppliers`, `requested_items_remarks`, `requested_items_Description`, `step2`, `projectID`) VALUES
(17644, 512, '2023-05-15', 'jmf', '22:42:44', 4, 'OK sir', '', 'HGY', 'HGY', '2023-05-15', 'JHB', 'hhn', '2023-05-25', '2023-05-29', '4151', 'cjhd', 'akkid', 'xscd', '', 0),
(17645, 513, '0000-00-00', ' Chris', '11:40:10', 2, NULL, '4781', 'Chikanda', '', '2023-05-31', NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'step-wizard-item current-item', 0),
(17646, 514, '0000-00-00', ' Chris', '02:12:02', 1, NULL, '5284', 'Zomba', '', '2023-05-30', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 16),
(17647, 515, '0000-00-00', ' Chris', '02:56:55', 5, NULL, '5214', 'Blantyre', '', '2023-05-30', 'John', 'Nick Minaj', '2023-06-15', '2023-06-16', NULL, NULL, '', '', '', 16),
(17648, 516, '0000-00-00', ' Chris', '10:46:30', 1, NULL, '57', 'Chikanda', '', '2023-05-13', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 11),
(17649, 517, '0000-00-00', '85', '04:12:13', 3, NULL, '456', 'Chilupsa', '', '2023-06-14', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `plant_&_machinery_on_site`
--

CREATE TABLE `plant_&_machinery_on_site` (
  `equipment_name` varchar(200) NOT NULL,
  `job_number` varchar(200) NOT NULL,
  `number_of_equipments` int(11) NOT NULL,
  `in_use` tinyint(4) DEFAULT NULL,
  `idle` tinyint(4) DEFAULT NULL,
  `under_repair` varchar(100) DEFAULT NULL,
  `hrs` varchar(45) DEFAULT NULL,
  `delivered_items` varchar(45) DEFAULT NULL,
  `delivered_items_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(15) NOT NULL,
  `projectName` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `startDate` date NOT NULL,
  `duration` varchar(200) NOT NULL,
  `location` varchar(250) NOT NULL,
  `foreman` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `engineer` varchar(250) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectName`, `description`, `code`, `startDate`, `duration`, `location`, `foreman`, `supervisor`, `engineer`, `status`) VALUES
(5, 'Salima shoping mall', 'Shoping mall in salima', 'C1', '2023-06-10', '2 Months', 'Salima', '94', '92', '1', 1),
(6, 'Machinga District Hall', 'one story', 'Z1', '2023-06-06', '2 Months', 'Machinga', '96', '91', '1', 1),
(8, 'Chilomoni Ground', 'Wall bulding', 'BA', '2023-06-14', '2 Months', 'Chilomoni, Blantyre', 'Tapiwa Zimba', 'Chris Pharaoh', '1', 1),
(9, 'Phalombe Tor plaza', 'torget', 'C2', '2023-06-09', 'fcv', 'Phalombe', 'Ellias Njula', 'Mussah Allan', '1', 1),
(10, 'Malawi housing', '3 houses', 'DA', '2023-06-10', '2 Months', 'Chikwawa', 'Tapiwa Zimba', 'Chris Pharaoh', 'Essau Pharaoh', 1),
(11, 'Kholowa school bulding', 'mbatata primary', 'bnfh', '2023-06-08', '5 months', 'chigumu', 'Tapiwa.Zimba', 'Essau.Pharaoh', 'Don.Chisale', 1),
(12, 'Khobwe mix', 'Short project 5', 'C56', '2023-06-08', '2 Months', 'Chikwawa', 'Tapiwa.Zimba', 'Essau.Pharaoh', 'chikondi.money', 1),
(13, 'soya', 'kjh', 'C n.2', '2023-06-04', 'fcv', 'bvg', 'Tapiwa.Zimba', 'Essau.Pharaoh', 'chikondi.money', 1),
(14, 'ufa', 'kjhj', 'C n.23', '2023-06-04', 'fcv', 'bvg', 'Tapiwa.Zimba', 'Essau.Pharaoh', 'chikondi.money', 1),
(15, 'ufa2', 'kjhj', 'C n.3', '2023-06-04', 'fcv', 'bvg', 'Tapiwa.Zimba', 'Essau.Pharaoh', 'chikondi.money', 1),
(16, 'Mbwanda', 'kjd', 'MD7', '2023-06-02', 'fcv', 'Chikwawa', 'Tapiwa', 'Essau', 'Hadday', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `project_number` varchar(20) NOT NULL,
  `job_number` varchar(200) NOT NULL,
  `date` varchar(200) DEFAULT NULL,
  `sheet_number` varchar(100) DEFAULT NULL,
  `shift` varchar(20) DEFAULT NULL,
  `project_name` varchar(200) NOT NULL,
  `client` varchar(200) NOT NULL,
  `sunny` varchar(45) DEFAULT NULL,
  `cloudy` varchar(45) DEFAULT NULL,
  `rainy` varchar(45) DEFAULT NULL,
  `hours_lost` varchar(45) DEFAULT NULL,
  `vistors` varchar(240) DEFAULT NULL,
  `mainContractor_projectManager` int(11) DEFAULT NULL,
  `mainContractor_projectEngeneer` int(11) DEFAULT NULL,
  `mainContractor_foremen` int(11) DEFAULT NULL,
  `mainContractor_storeIncharge` int(11) DEFAULT NULL,
  `mainContractor_savayor` int(11) DEFAULT NULL,
  `mainContractor_safetyIncharge` int(11) DEFAULT NULL,
  `mainContractor_OS` int(11) DEFAULT NULL,
  `mainContractor_clerk` int(11) DEFAULT NULL,
  `mainContractor_receptionists` int(11) DEFAULT NULL,
  `mainContractor_brickLayers` int(11) DEFAULT NULL,
  `mainContractor_capenters` int(11) DEFAULT NULL,
  `mainContractor_steelFixers` int(11) DEFAULT NULL,
  `mainContractor_scafolder` int(11) DEFAULT NULL,
  `mainContractor_panters` int(11) DEFAULT NULL,
  `mainContractor_generalLabor` int(11) DEFAULT NULL,
  `mainContractor_securityGuards` int(11) DEFAULT NULL,
  `mainContractor_operators` int(11) DEFAULT NULL,
  `mainContractor_plumbers` int(11) DEFAULT NULL,
  `mainContractor_remarks` varchar(240) DEFAULT NULL,
  `subContractor_projectManage` int(11) DEFAULT NULL,
  `subContractor_projectEngineer` int(11) DEFAULT NULL,
  `subContractor_foremen` int(11) DEFAULT NULL,
  `subContractor_storeIncharge` int(11) DEFAULT NULL,
  `subContractor_survayor` int(11) DEFAULT NULL,
  `subContractor_safetyIncharge` int(11) DEFAULT NULL,
  `subContractor_OS` int(11) DEFAULT NULL,
  `subContractor_clerk` int(11) DEFAULT NULL,
  `subContractor_receptionist` int(11) DEFAULT NULL,
  `subContractor_brickLayers` int(11) DEFAULT NULL,
  `subContractor_capenters` int(11) DEFAULT NULL,
  `subContractor_steelFixers` int(11) DEFAULT NULL,
  `subContractor_scafolders` int(11) DEFAULT NULL,
  `subContractor_painters` int(11) DEFAULT NULL,
  `subContractor_generalLabours` int(11) DEFAULT NULL,
  `subContractor_securityGuards` int(11) DEFAULT NULL,
  `subContractor_operators` int(11) DEFAULT NULL,
  `subContractor_plumbers` int(11) DEFAULT NULL,
  `subContractor_total` int(11) DEFAULT NULL,
  `subContractor_remarks` varchar(40) DEFAULT NULL,
  `mainContractor_total` int(11) DEFAULT NULL,
  `total_projectManager` int(11) DEFAULT NULL,
  `total_projectEngeneers` int(11) DEFAULT NULL,
  `total_foremen` int(11) DEFAULT NULL,
  `total_storeIncharge` int(11) DEFAULT NULL,
  `total_surveyor` int(11) DEFAULT NULL,
  `total_safetyIncharge` int(11) DEFAULT NULL,
  `total_os` int(11) DEFAULT NULL,
  `total_clerk` int(11) DEFAULT NULL,
  `total_receptionist` int(11) DEFAULT NULL,
  `total_brickLayers` int(11) DEFAULT NULL,
  `total_capenters` int(11) DEFAULT NULL,
  `total_steelFixers` int(11) DEFAULT NULL,
  `total_scafolders` int(11) DEFAULT NULL,
  `total_painters` int(11) DEFAULT NULL,
  `total_generalLabours` int(11) DEFAULT NULL,
  `total_securityGuards` int(11) DEFAULT NULL,
  `total_operators` int(11) DEFAULT NULL,
  `total_plumbers` int(11) DEFAULT NULL,
  `total_total` int(11) DEFAULT NULL,
  `total_Remarks` varchar(240) DEFAULT NULL,
  `plant_&_machinery_on_site_equipment_name` varchar(200) NOT NULL,
  `plant_&_machinery_on_site_job_number` varchar(200) NOT NULL,
  `work_done_work_done_today` varchar(240) NOT NULL,
  `work_done_date` date NOT NULL,
  `images_id` int(11) NOT NULL,
  `Signatures_other_info_onsite` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `requested_items`
--

CREATE TABLE `requested_items` (
  `id` int(15) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `description1` varchar(255) NOT NULL,
  `status1` varchar(45) NOT NULL,
  `employee_id` varchar(45) NOT NULL,
  `L.P.O. No` bigint(20) DEFAULT NULL,
  `D/NOTE No.` bigint(20) DEFAULT NULL,
  `requisition_number` int(15) DEFAULT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requested_items`
--

INSERT INTO `requested_items` (`id`, `remarks`, `quantity`, `description1`, `status1`, `employee_id`, `L.P.O. No`, `D/NOTE No.`, `requisition_number`, `unit`) VALUES
(28, 'white', 25, 'Jag', '2', 'Chris', 0, 0, 17645, ''),
(29, 'yes', 4, 'shovel', '2', 'Chris', 0, 0, 17645, ''),
(30, 'zoona', 6, 'Sweet Jim', '2', 'Chris', 0, 0, 17645, ''),
(31, 'Kumanga', 6, 'Cement', '2', 'Chris', 0, 0, 17646, ''),
(42, 'mawamnngg', 8, 'mvchenga', '2', 'Chris', 0, 0, 17647, ''),
(44, 'mkjh', 5, 'vbgfd', '2', 'Chris', 0, 0, 17648, ''),
(51, 'gfds', 5, 'njerwa', '2', '92', 0, 0, 17649, 'cm'),
(52, 'good', 5, 'Chimanga 2', '2', '91', 0, 0, 17649, 'kg'),
(53, '500kg', 200, 'Miyala', '2', '85', 0, 0, 17649, 'kg'),
(54, 'uuujjhgfd', 5, 'malata and mapick', '2', '90', 0, 0, 17649, 'cm'),
(55, 'as', 8, 'swmab', '1', '85', 0, 0, NULL, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` bigint(20) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `employee_employee_id` varchar(20) NOT NULL,
  `employee_departments_departmentName` varchar(50) NOT NULL,
  `employee_requested_items_Item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `other_info_onsite` varchar(240) NOT NULL,
  `foreman_signature` varchar(200) DEFAULT NULL,
  `project_eng_signature` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `work_done`
--

CREATE TABLE `work_done` (
  `work_done_today` varchar(240) NOT NULL,
  `date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentName`,`employee_employee_id`,`employee_departments_departmentName`,`employee_requested_items_Item_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employeeNumber` (`employeeNumber`),
  ADD UNIQUE KEY `firstName` (`firstName`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`,`requested_items_remarks`,`requested_items_Description`);

--
-- Indexes for table `plant_&_machinery_on_site`
--
ALTER TABLE `plant_&_machinery_on_site`
  ADD PRIMARY KEY (`equipment_name`,`job_number`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`project_number`,`job_number`);

--
-- Indexes for table `requested_items`
--
ALTER TABLE `requested_items`
  ADD UNIQUE KEY `ANY` (`id`),
  ADD UNIQUE KEY `description1` (`description1`),
  ADD KEY `remarks` (`remarks`,`description1`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`,`employee_employee_id`,`employee_departments_departmentName`,`employee_requested_items_Item_name`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`other_info_onsite`);

--
-- Indexes for table `work_done`
--
ALTER TABLE `work_done`
  ADD PRIMARY KEY (`work_done_today`,`date1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `requested_items`
--
ALTER TABLE `requested_items`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
