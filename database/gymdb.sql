-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 08:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` varchar(10) NOT NULL,
  `ann_Announce` varchar(255) DEFAULT NULL,
  `ann_Expire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ann_id`, `ann_Announce`, `ann_Expire`) VALUES
('anncmn0', 'We re now accepting member student with discount! Apply Now!', '2022-05-28'),
('anncmn03', 'Looking for a trainer for your next schedule? Set your schedule now! Ask Admin desk for further details.', '2022-05-29'),
('anncmn04', 'We now have a newbie promo! Hurry Up, limited time only.', '2022-05-28'),
('anncmnt01', 'Hello! We\'ve looking for ten new trainer! Apply Now!', '2022-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `gymacc`
--

CREATE TABLE `gymacc` (
  `unique_id` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT '123',
  `roles` varchar(10) DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymacc`
--

INSERT INTO `gymacc` (`unique_id`, `username`, `password`, `roles`) VALUES
('admin', 'admin', '123', 'admin'),
('member', 'jenica', '123', 'member'),
('member1', 'mika', '123', 'member'),
('trainer', 'trn_robert', '123', 'trainer'),
('trainer1', 'trn_michael', '123', 'trainer');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `unique_id` varchar(10) NOT NULL,
  `mem_id` varchar(10) NOT NULL,
  `mem_FirstName` varchar(50) NOT NULL,
  `mem_MiddleName` varchar(50) NOT NULL,
  `mem_LastName` varchar(50) NOT NULL,
  `mem_Gender` varchar(10) NOT NULL,
  `mem_ContactNum` varchar(20) NOT NULL,
  `mem_Address` varchar(50) NOT NULL,
  `mem_Email` varchar(50) NOT NULL,
  `mem_Height` double NOT NULL,
  `mem_Weight` double NOT NULL,
  `mem_Birthdate` date NOT NULL,
  `mem_JoinedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`unique_id`, `mem_id`, `mem_FirstName`, `mem_MiddleName`, `mem_LastName`, `mem_Gender`, `mem_ContactNum`, `mem_Address`, `mem_Email`, `mem_Height`, `mem_Weight`, `mem_Birthdate`, `mem_JoinedDate`) VALUES
('member', 'member', 'Jenica', 'Angeles', 'Monis', 'Female', '09994530790', '1640 K Int. 4 Zamora St. Paco, Manila', 'ohheyitsjenica@gmail.com', 155, 51, '2001-04-14', '2022-04-27'),
('member1', 'member1', 'Mika', 'Antonella', 'Francisco', 'Female', '09324677865', 'Tondo, Manila', 'mika.antonellaf@gmail.com', 153, 55, '2001-03-22', '2022-05-10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `member_vw`
-- (See below for the actual view)
--
CREATE TABLE `member_vw` (
`ID` varchar(10)
,`MemberFullName` varchar(101)
,`Gender` varchar(10)
,`Age` double(17,0)
,`Address` varchar(50)
,`ContactNum` varchar(20)
,`Height` double
,`Weight` double
,`JoinedDate` date
);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pln_id` varchar(10) NOT NULL,
  `pln_Name` varchar(255) NOT NULL,
  `pln_Description` varchar(255) NOT NULL,
  `pln_Day` int(11) NOT NULL,
  `pln_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pln_id`, `pln_Name`, `pln_Description`, `pln_Day`, `pln_Price`) VALUES
('plan', 'Sweat', 'Sweaty Summer', 30, 50),
('plan03', 'Newbie’s Promo', 'Getting Started Starter Pack', 7, 50),
('plan04', 'Athletes Pack', 'For active athletes only', 14, 50),
('plan05', 'WORKIT Anniversary Promo', 'Good for One month, free use of gym, once a week only with a maximum of 10 body builders,  per 3 hrs.', 4, 50),
('plan06', 'Heavy Launch', 'This promo is only available for those people that has a BMI of 25.0 and above.', 7, 50),
('plan07', 'Tough Students', 'This promo is only available for those students that is 18 years old and above.', 7, 50),
('plan08', 'Muscle Buzz', 'This promo is only available to those body builders, who want to work out for a whole month', 30, 50),
('plan09', 'Holiday Promo', 'This promo is only available from Dec 21 to Dec 31 (Exemption Date: Dec 24 and 25)', 5, 50),
('plan1', 'Fit', 'Upper Body', 25, 40),
('plan10', 'Weekly Promo', 'Going to gym on 5 consecutive days, you will get free 4hrs. This is only available per week.', 1, 50),
('plan11', 'New Years Break', 'This is only available every January 1 to 7 ', 7, 50);

-- --------------------------------------------------------

--
-- Stand-in structure for view `plan_vw`
-- (See below for the actual view)
--
CREATE TABLE `plan_vw` (
`PlanID` varchar(10)
,`Description` varchar(255)
,`Price` float
);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `ssn_id` varchar(10) NOT NULL,
  `pln_id` varchar(10) NOT NULL,
  `mem_id` varchar(10) NOT NULL,
  `trn_id` varchar(10) NOT NULL,
  `ssn_Category` varchar(255) NOT NULL,
  `ssn_TimeIn` time DEFAULT NULL,
  `ssn_TimeOut` time DEFAULT NULL,
  `ssn_Day` int(11) NOT NULL,
  `ssn_Paid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`ssn_id`, `pln_id`, `mem_id`, `trn_id`, `ssn_Category`, `ssn_TimeIn`, `ssn_TimeOut`, `ssn_Day`, `ssn_Paid`) VALUES
('session01', 'plan03', 'member1', 'trainer', 'Upper Extremeties', '06:08:00', '00:00:00', 1, 'Yes'),
('session04', 'plan03', 'member', 'trainer', 'Lower Extremeties', '05:44:00', '00:00:00', 0, 'No');

-- --------------------------------------------------------

--
-- Stand-in structure for view `session_vw`
-- (See below for the actual view)
--
CREATE TABLE `session_vw` (
`SessionID` varchar(10)
,`memID` varchar(10)
,`trnID` varchar(10)
,`plnID` varchar(10)
,`pln_Description` varchar(255)
,`MemberFullName` varchar(101)
,`TrainerFullName` varchar(101)
,`Category` varchar(255)
,`PlanName` varchar(255)
,`Email` varchar(50)
,`TimeIn` time
,`TimeOut` time
,`sessionDay` int(11)
,`planDay` int(11)
,`Paid` varchar(10)
,`totalDay` bigint(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `unique_id` varchar(10) NOT NULL,
  `trn_id` varchar(10) NOT NULL,
  `trn_FirstName` varchar(50) NOT NULL,
  `trn_MiddleName` varchar(50) NOT NULL,
  `trn_LastName` varchar(50) NOT NULL,
  `trn_Gender` varchar(10) NOT NULL,
  `trn_ContactNum` varchar(20) NOT NULL,
  `trn_Address` varchar(50) NOT NULL,
  `trn_Height` double NOT NULL,
  `trn_Weight` double NOT NULL,
  `trn_Birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`unique_id`, `trn_id`, `trn_FirstName`, `trn_MiddleName`, `trn_LastName`, `trn_Gender`, `trn_ContactNum`, `trn_Address`, `trn_Height`, `trn_Weight`, `trn_Birthdate`) VALUES
('trainer', 'trainer', 'Robert', 'Bert', 'Valenzuela', 'Male', '098765432344', 'San Andres, Manila', 160, 65, '2001-07-24'),
('trainer1', 'trainer1', 'Michael', 'Bitoy', 'Espinosa', 'Male', '09248347312', 'Tondo, Manila', 160, 70, '2001-02-28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `trainer_vw`
-- (See below for the actual view)
--
CREATE TABLE `trainer_vw` (
`ID` varchar(10)
,`TrainerFullName` varchar(101)
,`Gender` varchar(10)
,`Age` double(17,0)
,`Address` varchar(50)
,`ContactNum` varchar(20)
,`Height` double
,`Weight` double
);

-- --------------------------------------------------------

--
-- Structure for view `member_vw`
--
DROP TABLE IF EXISTS `member_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `member_vw`  AS  select `mm`.`mem_id` AS `ID`,concat(`mm`.`mem_FirstName`,' ',`mm`.`mem_LastName`) AS `MemberFullName`,`mm`.`mem_Gender` AS `Gender`,date_format(from_days(to_days(current_timestamp()) - to_days(`mm`.`mem_Birthdate`)),'%Y') + 0 AS `Age`,`mm`.`mem_Address` AS `Address`,`mm`.`mem_ContactNum` AS `ContactNum`,`mm`.`mem_Height` AS `Height`,`mm`.`mem_Weight` AS `Weight`,`mm`.`mem_JoinedDate` AS `JoinedDate` from `member` `mm` ;

-- --------------------------------------------------------

--
-- Structure for view `plan_vw`
--
DROP TABLE IF EXISTS `plan_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `plan_vw`  AS  select `pl`.`pln_id` AS `PlanID`,`pl`.`pln_Description` AS `Description`,`pl`.`pln_Price` AS `Price` from `plan` `pl` ;

-- --------------------------------------------------------

--
-- Structure for view `session_vw`
--
DROP TABLE IF EXISTS `session_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `session_vw`  AS  select `sn`.`ssn_id` AS `SessionID`,`mm`.`mem_id` AS `memID`,`tr`.`trn_id` AS `trnID`,`pl`.`pln_id` AS `plnID`,`pl`.`pln_Description` AS `pln_Description`,concat(`mm`.`mem_FirstName`,' ',`mm`.`mem_LastName`) AS `MemberFullName`,concat(`tr`.`trn_FirstName`,' ',`tr`.`trn_LastName`) AS `TrainerFullName`,`sn`.`ssn_Category` AS `Category`,`pl`.`pln_Name` AS `PlanName`,`mm`.`mem_Email` AS `Email`,`sn`.`ssn_TimeIn` AS `TimeIn`,`sn`.`ssn_TimeOut` AS `TimeOut`,`sn`.`ssn_Day` AS `sessionDay`,`pl`.`pln_Day` AS `planDay`,`sn`.`ssn_Paid` AS `Paid`,abs(`sn`.`ssn_Day` - `pl`.`pln_Day`) AS `totalDay` from (((`session` `sn` join `member` `mm` on(`mm`.`mem_id` = `sn`.`mem_id`)) join `trainer` `tr` on(`tr`.`trn_id` = `sn`.`trn_id`)) join `plan` `pl` on(`pl`.`pln_id` = `sn`.`pln_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `trainer_vw`
--
DROP TABLE IF EXISTS `trainer_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trainer_vw`  AS  select `tr`.`trn_id` AS `ID`,concat(`tr`.`trn_FirstName`,' ',`tr`.`trn_LastName`) AS `TrainerFullName`,`tr`.`trn_Gender` AS `Gender`,date_format(from_days(to_days(current_timestamp()) - to_days(`tr`.`trn_Birthdate`)),'%Y') + 0 AS `Age`,`tr`.`trn_Address` AS `Address`,`tr`.`trn_ContactNum` AS `ContactNum`,`tr`.`trn_Height` AS `Height`,`tr`.`trn_Weight` AS `Weight` from `trainer` `tr` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `gymacc`
--
ALTER TABLE `gymacc`
  ADD PRIMARY KEY (`unique_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`),
  ADD KEY `unique_id_fk1` (`unique_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pln_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ssn_id`),
  ADD KEY `pln_id_fk` (`pln_id`),
  ADD KEY `mem_id_fk` (`mem_id`),
  ADD KEY `trn_id_fk` (`trn_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trn_id`),
  ADD KEY `unique_id_fk` (`unique_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `unique_id_fk1` FOREIGN KEY (`unique_id`) REFERENCES `gymacc` (`unique_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `mem_id_fk` FOREIGN KEY (`mem_id`) REFERENCES `member` (`unique_id`),
  ADD CONSTRAINT `pln_id_fk` FOREIGN KEY (`pln_id`) REFERENCES `plan` (`pln_id`),
  ADD CONSTRAINT `trn_id_fk` FOREIGN KEY (`trn_id`) REFERENCES `trainer` (`trn_id`);

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `unique_id_fk` FOREIGN KEY (`unique_id`) REFERENCES `gymacc` (`unique_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
