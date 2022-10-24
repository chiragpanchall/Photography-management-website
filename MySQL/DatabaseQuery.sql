-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 10:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_package`
--

CREATE TABLE `additional_package` (
  `idAdditional_Package` int(11) NOT NULL,
  `Frames` int(11) DEFAULT NULL,
  `Video_MDuration` decimal(4,0) DEFAULT NULL,
  `Price` decimal(6,0) DEFAULT NULL,
  `images` varchar(45) DEFAULT NULL,
  `Drone_Shooting` tinyint(1) DEFAULT NULL,
  `Live_Shooting` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `additional_package`
--

INSERT INTO `additional_package` (`idAdditional_Package`, `Frames`, `Video_MDuration`, `Price`, `images`, `Drone_Shooting`, `Live_Shooting`) VALUES
(1, 10, '150', '4500', '50', 0, 0),
(2, 25, '200', '9500', '100', 0, 0),
(3, 50, '400', '14990', '250', 1, 1),
(4, 500, '1250', '25890', '500', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

CREATE TABLE `album_images` (
  `idAlbum_Images` int(11) NOT NULL,
  `Event_Order_idEvent_Order` int(11) NOT NULL,
  `Album_Images_Path` text,
  `Album_Selection` tinyint(1) DEFAULT '0',
  `Album_Type` varchar(45) DEFAULT '0',
  `InGallery` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album_images`
--

INSERT INTO `album_images` (`idAlbum_Images`, `Event_Order_idEvent_Order`, `Album_Images_Path`, `Album_Selection`, `Album_Type`, `InGallery`) VALUES
(1, 52, '1.png', 0, '0', 0),
(2, 52, '2.png', 0, '0', 0),
(3, 52, '3.png', 0, '0', 0),
(4, 52, '4.png', 0, '0', 0),
(5, 52, '5.png', 0, '0', 0),
(6, 52, '6.png', 0, '0', 0),
(7, 52, '7.png', 1, '1', 0),
(8, 52, '7.png', 1, '1', 0),
(9, 52, '8.JPEG', 0, '0', 0),
(10, 52, '10.jpg', 1, '1', 0),
(11, 1, '11.png', 0, '0', 0),
(12, 1, '12.jpg', 0, '0', 0),
(13, 1, '13.png', 0, '0', 0),
(14, 1, '14.png', 0, '0', 0),
(15, 1, '15.png', 0, '0', 0),
(16, 1, '16.png', 0, '0', 0),
(26, 1, '162194989721519223860acfdc9941e2.png', 0, NULL, 0),
(32, 54, '162195191075516604260ad05a63c275.png', 1, '1', 0),
(33, 54, '1621951910178034422260ad05a6636d0.png', 0, NULL, 0),
(34, 54, '1621951910133791369560ad05a66ee44.png', 0, NULL, 0),
(35, 54, '162195191049097233160ad05a67a600.png', 1, '1', 0),
(36, 54, '1621951910153699243860ad05a68890b.png', 1, '1', 0),
(40, 54, '162195293311396063860ad09a5b3c23.png', 0, NULL, 0),
(41, 54, '1621952933130322707260ad09a5c24e9.png', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `idArea` int(11) NOT NULL,
  `Area_Name` varchar(45) DEFAULT NULL,
  `City_idCity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`idArea`, `Area_Name`, `City_idCity`) VALUES
(1, '8601 Nullam St. Near Bank of amerika', 3),
(2, '9601 Nullam St.', 6),
(3, 'Maninagar', 1),
(4, '151-2058 Elementum Rd.', 5),
(5, 'Ap #420-9165 Rutrum Ave', 1),
(6, '3137 Sapien St.', 7),
(7, '8956 Nunc St.', 2),
(8, 'Ap #345-2380 Nulla Rd.', 10),
(9, '582-4815 Pellentesque Avenue', 6),
(10, 'P.O. Box 787, 2532 Mus. St.', 5),
(11, '8747 Dolor. Street', 1),
(12, 'P.O. Box 344, 7906 Libero. Avenue', 5),
(13, '1815 Magnis Rd.', 15),
(14, 'Ap #332-3514 Et Avenue', 10),
(15, '453-2878 A, Av.', 10),
(16, 'P.O. Box 499, 766 Metus. St.', 3),
(17, 'P.O. Box 942, 6512 Elit, Street', 5),
(18, '586-8459 Pellentesque Avenue', 2),
(19, 'P.O. Box 365, 5965 Quisque Av.', 11),
(20, '666-8936 Risus, Rd.', 8),
(21, 'Ap #732-2900 Erat Av.', 2),
(22, '530-2129 Pellentesque Ave', 3),
(23, 'Ap #217-2081 Orci. Ave', 1),
(24, 'Patan Railway Station', 4),
(25, 'Palika Bazar', 4),
(26, 'City Point', 4),
(27, 'Balaji Agora Mall', 9),
(28, ' Gir National Park Entrance', 9),
(29, 'Sqaure Floor New Rem Estate', 16),
(30, 'kamdhenu Circle Floor New Rem Estate', 17),
(31, 'Tanvi Sqaure Jodhpur', 12),
(32, 'Sanu Sqaure Kota', 13),
(33, 'New Market Bhilwara', 14);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_employee_order`
--

CREATE TABLE `assigned_employee_order` (
  `Event_Order_idEvent_Order` int(11) NOT NULL,
  `Employee_idEmployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `idCity` int(11) NOT NULL,
  `City_Name` varchar(45) DEFAULT NULL,
  `State_idState` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`idCity`, `City_Name`, `State_idState`) VALUES
(1, 'Ahmedabad', 1),
(2, 'Vadodara', 1),
(3, 'Anand', 1),
(4, 'Patan', 1),
(5, 'Gandhinangar', 1),
(6, 'Surat', 1),
(7, 'Kutch', 1),
(8, 'Rajkot', 1),
(9, 'Jamnagar', 1),
(10, 'Jaipur', 2),
(11, 'Tonk', 2),
(12, 'Jodhpur', 2),
(13, 'Kota', 2),
(14, 'Bhilwara', 2),
(15, 'Udaipur', 2),
(16, 'East Mumbai', 3),
(17, 'West Mumbai', 3),
(18, 'Qatar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `idCompany` int(11) NOT NULL,
  `CompanyName` varchar(45) DEFAULT NULL,
  `CompanyAddress` varchar(100) DEFAULT NULL,
  `CompanyMobileNumber` decimal(10,0) DEFAULT NULL,
  `Company_Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`idCompany`, `CompanyName`, `CompanyAddress`, `CompanyMobileNumber`, `Company_Email`) VALUES
(1, 'SP Photography', 'Nikol,Ahmedabad', '9898920056', 'aasdd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `idEmployee` int(11) NOT NULL,
  `Employee_FName` varchar(45) DEFAULT NULL,
  `Employee_Lname` varchar(45) DEFAULT NULL,
  `Employee_Address` varchar(45) DEFAULT NULL,
  `Employee_Mob` decimal(10,0) DEFAULT NULL,
  `Employee_Salary` varchar(45) DEFAULT NULL,
  `Company_idCompany` int(11) NOT NULL DEFAULT '1',
  `Employee_Age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`idEmployee`, `Employee_FName`, `Employee_Lname`, `Employee_Address`, `Employee_Mob`, `Employee_Salary`, `Company_idCompany`, `Employee_Age`) VALUES
(1, 'Ramesh ', 'Patel', 'Maninagar ahmedabad', '7878787878', '25000', 1, 22),
(2, 'Gamesh ', 'Patel', 'Narol ahmedabad', '9898787878', '20000', 1, 18),
(3, 'Jaymin ', 'Lohiya', 'Gota ahmedabad', '8181787878', '18000', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `idEvent_Category` int(11) NOT NULL,
  `Event_Type` varchar(45) DEFAULT NULL,
  `Event_Image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`idEvent_Category`, `Event_Type`, `Event_Image`) VALUES
(1, 'Merriage', NULL),
(2, 'Birthday', NULL),
(3, 'Pre-Wedding', NULL),
(4, 'Engagement', ''),
(7, 'Viva', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_order`
--

CREATE TABLE `event_order` (
  `idEvent_Order` int(11) NOT NULL,
  `Event_Order_Date` date DEFAULT NULL,
  `Event_Address` varchar(100) DEFAULT NULL,
  `Event_Date` date DEFAULT NULL,
  `Last_Date_Event` date DEFAULT NULL,
  `Album_Delivery_Address` varchar(100) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `User_ID_idUser` int(11) NOT NULL,
  `Additional_Package_idAdditional_Package` int(11) DEFAULT NULL,
  `Event_Category_idEvent_Category` int(11) NOT NULL,
  `Package_idPackage` int(11) NOT NULL,
  `Area_idArea` int(11) NOT NULL,
  `Price` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_order`
--

INSERT INTO `event_order` (`idEvent_Order`, `Event_Order_Date`, `Event_Address`, `Event_Date`, `Last_Date_Event`, `Album_Delivery_Address`, `Status`, `User_ID_idUser`, `Additional_Package_idAdditional_Package`, `Event_Category_idEvent_Category`, `Package_idPackage`, `Area_idArea`, `Price`) VALUES
(1, '2021-03-21', 'Bechtelar and Sons  Event Venue', '2021-03-23', '2021-03-31', 'Chirag panchal', 0, 2, 3, 1, 3, 25, '89990'),
(2, '2021-03-22', 'West BAngal MH', '2021-03-23', '2021-03-24', 'West BAngal', 1, 2, NULL, 2, 2, 2, '75000'),
(49, '2021-03-21', 'Stokes-Green  Event Venue', '2021-03-23', '2021-03-24', 'Ahmedabad', 1, 2, NULL, 1, 2, 3, '75000'),
(51, '2021-03-21', 'Stokes-Green  Event Venue', '2021-03-23', '2021-03-24', 'Purani haveli,chacha ki chaay me west mumbai', 1, 2, 3, 3, 1, 3, '64990'),
(52, '2021-04-10', 'Flatley Inc  Event Venue', '2021-04-16', '2021-04-27', 'Ahmedabad', 3, 1, 4, 2, 2, 18, '75890'),
(53, '2021-05-20', 'Flatley, Gutkowski and Rice  Event Venue', '2021-05-23', '2021-05-26', 'ratangadh panchal chiraga panchal', 3, 1, NULL, 3, 1, 15, '75000'),
(54, '2021-05-23', 'Stokes-Green  Event Venue', '2021-05-25', '2021-05-26', 'raabbaba ba ab aba ba', 3, 1, NULL, 1, 3, 3, '75000'),
(55, '2021-05-27', 'Stokes-Green  Event Venue', '2021-06-05', '2021-06-03', 'maninagar Ahmedabad', 0, 2, NULL, 4, 3, 3, '99999');

-- --------------------------------------------------------

--
-- Table structure for table `event_venue`
--

CREATE TABLE `event_venue` (
  `idEvent_Venue` int(11) NOT NULL,
  `Venue_Name` varchar(45) DEFAULT NULL,
  `Venue_Price` decimal(6,0) DEFAULT NULL,
  `Venue_Contact` varchar(45) DEFAULT NULL,
  `Area_idArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_venue`
--

INSERT INTO `event_venue` (`idEvent_Venue`, `Venue_Name`, `Venue_Price`, `Venue_Contact`, `Area_idArea`) VALUES
(1, 'Pfeffer-Lesch  Event Venue', '36601', '7589149525', 2),
(2, 'Sporer-Mante  Event Venue', '38851', '9048887909', 2),
(3, 'Stokes-Green  Event Venue', '43200', '1259455351', 3),
(4, 'Parker Inc  Event Venue', '228602', '1232510433', 3),
(5, 'Schmitt and Sons  Event Venue', '216072', '8324970026', 4),
(6, 'Weimann, McClure and Fay  Event Venue', '25620', '5599856315', 4),
(7, 'OlKeefe, Lindgren and Effertz  Event Venue', '53246', '7221671212', 5),
(8, 'Yundt-Hagenes  Event Venue', '169513', '4941210827', 5),
(9, 'Ebert-Marquardt  Event Venue', '153698', '5756357108', 6),
(10, 'Hansen Group  Event Venue', '149260', '4551372437', 6),
(11, 'Murray-Jast  Event Venue', '242066', '4255500213', 7),
(12, 'Torphy-Auer  Event Venue', '33948', '8099278615', 7),
(13, 'Effertz, Boyle and Simonis  Event Venue', '26902', '4612650702', 8),
(14, 'Huels, Bergstrom and Schmitt  Event Venue', '232909', '3766384440', 8),
(15, 'Schroeder, Ullrich and Hansen  Event Venue', '41078', '4107421079', 9),
(16, 'Watsica-Vandervort  Event Venue', '74397', '5324777793', 9),
(17, 'Sauer, Torphy and Runolfsdottir  Event Venue', '98593', '8105608649', 10),
(18, 'Kirlin and Sons  Event Venue', '196305', '2627744911', 10),
(19, 'Weissnat-Luettgen  Event Venue', '123500', '3386218344', 11),
(20, 'Morar, Romaguera and Botsford  Event Venue', '35252', '5056083495', 11),
(21, 'Ullrich-McGlynn  Event Venue', '32268', '3938931731', 12),
(22, 'Bashirian and Sons  Event Venue', '163536', '9531460469', 12),
(23, 'Keeling, Roob and Schmidt  Event Venue', '98389', '9374832763', 13),
(24, 'Casper-Wintheiser  Event Venue', '222119', '7554691662', 13),
(25, 'Simonis LLC  Event Venue', '169907', '9084531901', 14),
(26, 'Buckridge, Crist and Prohaska  Event Venue', '171452', '4434119143', 14),
(27, 'Turcotte-Lesch  Event Venue', '197162', '6503158295', 15),
(28, 'Flatley, Gutkowski and Rice  Event Venue', '38902', '3055513000', 15),
(29, 'Koss-Crooks  Event Venue', '146807', '1196990000', 16),
(30, 'Quigley and Sons  Event Venue', '241395', '4641480221', 16),
(31, 'Waters, Gleason and Schmitt  Event Venue', '177050', '7874818207', 17),
(32, 'Dooley Group  Event Venue', '152955', '8749373401', 17),
(33, 'Flatley Inc  Event Venue', '30966', '6274544426', 18),
(34, 'Kovacek, Koch and Herzog  Event Venue', '163805', '7293640270', 18),
(35, 'Kerluke LLC  Event Venue', '72943', '6728438581', 19),
(36, 'Douglas-Champlin  Event Venue', '239339', '1614288482', 19),
(37, 'Volkman-Johns  Event Venue', '60221', '4861847986', 20),
(38, 'Bayer-Considine  Event Venue', '111773', '5691280055', 20),
(39, 'Bartell, Mohr and Jacobi  Event Venue', '38653', '6147013212', 21),
(40, 'Shields and Sons  Event Venue', '184180', '4736241764', 21),
(41, 'Kessler and Sons  Event Venue', '38324', '5778165107', 22),
(42, 'Beier, Cremin and Becker  Event Venue', '128281', '8484627829', 22),
(43, 'Bernhard LLC  Event Venue', '81943', '2398341153', 23),
(44, 'Deckow, Morissette and Glover  Event Venue', '182646', '9944561651', 23),
(45, 'Becker-Flatley  Event Venue', '214284', '5545815929', 24),
(46, 'Steuber Group  Event Venue', '198213', '5695824008', 24),
(47, 'Bechtelar and Sons  Event Venue', '25360', '7598199949', 25),
(48, 'Bashirian, Vandervort and MacGyver  Event Ven', '229173', '6752004810', 25),
(49, 'Boyle-Larson  Event Venue', '243575', '8195580169', 26),
(50, 'Wehner-Hessel  Event Venue', '59948', '7622132929', 26);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `idFeedback` int(11) NOT NULL,
  `Feedback_Date` date DEFAULT NULL,
  `Feedback_Content` text,
  `Printing_Order_idPrinting_Order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`idFeedback`, `Feedback_Date`, `Feedback_Content`, `Printing_Order_idPrinting_Order`) VALUES
(2, '2021-03-09', 'I love this product Super good service providede by them.Thank uou so much 1', 1),
(3, '2021-04-13', 'We love ', 1),
(4, '2021-04-13', 'i love this product 3', 1),
(5, '2021-04-13', 'good product', 1),
(6, '2021-04-13', 'fast service 5', 1),
(7, '2021-04-06', 'excellent', 2),
(9, '2021-05-23', 'good product 7 ', 75),
(10, '2021-05-23', 'fast service', 75),
(11, '2021-05-23', 'Great product 9', 75),
(12, '2021-05-24', 'This is nice tshirt', 76),
(13, '2021-05-24', 'great productt 11', 76),
(16, '2021-05-25', 'WOw fast delivery and amazing product', 76),
(17, '2021-05-26', 'chirag pacnhla', 80);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `idOffer` int(11) NOT NULL,
  `Offercode` varchar(10) DEFAULT NULL,
  `Offer_Details` varchar(200) DEFAULT NULL,
  `Product_Off_Percentage` decimal(10,0) NOT NULL,
  `Offer_Begins` date DEFAULT NULL,
  `Offer_Ending` date DEFAULT NULL,
  `Company_idCompany` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`idOffer`, `Offercode`, `Offer_Details`, `Product_Off_Percentage`, `Offer_Begins`, `Offer_Ending`, `Company_idCompany`) VALUES
(1, '-1', 'NO OFFER ', '0', '2021-05-01', '2021-05-01', 1),
(2, '260125', '20% off on any primted product ', '20', '2021-03-10', '2021-03-24', 1),
(3, '1000', '50% off on any printed products ', '50', '2021-04-08', '2021-04-21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `idPackage` int(11) NOT NULL,
  `Package_name` varchar(50) DEFAULT NULL,
  `Package_NumberOfImages` decimal(5,0) DEFAULT NULL,
  `Package_MinsOfVideos` decimal(5,0) DEFAULT NULL,
  `Number_Of_Frame` int(11) NOT NULL,
  `Live_Reception` tinyint(1) NOT NULL,
  `Drone_Shoot` tinyint(1) NOT NULL,
  `Package_Price` decimal(5,0) DEFAULT NULL,
  `Company_idCompany` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`idPackage`, `Package_name`, `Package_NumberOfImages`, `Package_MinsOfVideos`, `Number_Of_Frame`, `Live_Reception`, `Drone_Shoot`, `Package_Price`, `Company_idCompany`) VALUES
(1, 'Silver', '400', '1200', 5, 0, 0, '50000', 1),
(2, 'Golden', '600', '1400', 10, 1, 1, '75000', 1),
(3, 'Platinum', '800', '1800', 25, 1, 1, '99999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `idPayment` int(11) NOT NULL,
  `Transaction_ID` text,
  `Payment_Date` datetime DEFAULT CURRENT_TIMESTAMP,
  `Event_Order_idEvent_Order` int(11) DEFAULT '0',
  `Printing_Order_idPrinting_Order` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`idPayment`, `Transaction_ID`, `Payment_Date`, `Event_Order_idEvent_Order`, `Printing_Order_idPrinting_Order`) VALUES
(2, '45685222666', '2021-04-06 00:00:00', 1, NULL),
(8, '465nbmn545', '2021-05-23 16:10:02', 52, NULL),
(11, '4ad6sd6s6d', '2021-05-23 16:14:26', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `printing_order`
--

CREATE TABLE `printing_order` (
  `idPrinting_Order` int(11) NOT NULL,
  `Printing_Order_Date` date DEFAULT NULL,
  `Delivery_Address` varchar(100) DEFAULT NULL,
  `Total_Amount` decimal(6,0) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `Offer_idOffer` int(11) DEFAULT NULL,
  `Area_idArea` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `printing_order`
--

INSERT INTO `printing_order` (`idPrinting_Order`, `Printing_Order_Date`, `Delivery_Address`, `Total_Amount`, `Status`, `Offer_idOffer`, `Area_idArea`, `User_idUser`) VALUES
(1, '2021-03-10', 'Maninagar Ahmedabd', '250', 3, 3, 4, 1),
(2, '2021-04-07', 'Bombay', '2500', 3, 3, 13, 2),
(66, '2021-05-19', 'akd ajdkad bambe bo', '700', 2, 1, 3, 2),
(75, '2021-05-23', 'at hiil station rtaha', '600', 3, 1, 19, 1),
(76, '2021-05-24', 'Ratatat tatat atayaya', '400', 3, 1, 8, 1),
(77, '2021-05-25', 'Ratana ha ha ha ;alks  anska', '850', 1, 1, 26, 1),
(80, '2021-05-26', 'Maningar', '2550', 3, 1, 3, 1),
(81, '2021-05-26', 'Maninaar', '2550', 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `printing_order_details`
--

CREATE TABLE `printing_order_details` (
  `Printing_Order_idPrinting_Order_Details` int(11) NOT NULL,
  `Print_Type_idPrint_Type` int(11) NOT NULL,
  `Print_Type_Product_idProduct_Id` int(11) NOT NULL,
  `Printing_Order_Quantity` decimal(5,0) DEFAULT NULL,
  `Printing_Order_Image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `printing_order_details`
--

INSERT INTO `printing_order_details` (`Printing_Order_idPrinting_Order_Details`, `Print_Type_idPrint_Type`, `Print_Type_Product_idProduct_Id`, `Printing_Order_Quantity`, `Printing_Order_Image`) VALUES
(1, 6, 3, '5', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg'),
(2, 6, 3, '25', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg'),
(66, 7, 3, '2', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg'),
(75, 6, 3, '4', '5d1814eb2a5bee2087e7ef1dff41e6c7.jpg'),
(76, 6, 3, '10', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg'),
(77, 5, 2, '1', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg'),
(80, 5, 2, '3', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg'),
(81, 5, 2, '3', 'c8a4caf320b3a56b775b4b2fae39f6ec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `print_type`
--

CREATE TABLE `print_type` (
  `idPrint_Type` int(11) NOT NULL,
  `Product_idProduct_Id` int(11) NOT NULL,
  `Print_Size` varchar(20) DEFAULT NULL,
  `Print_Price` decimal(6,0) DEFAULT NULL,
  `Company_idCompany` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `print_type`
--

INSERT INTO `print_type` (`idPrint_Type`, `Product_idProduct_Id`, `Print_Size`, `Print_Price`, `Company_idCompany`) VALUES
(1, 1, 'S', '200', 1),
(2, 1, 'M', '300', 1),
(3, 1, 'L', '400', 1),
(4, 2, 'Baby', '450', 1),
(5, 2, 'ADULT', '850', 1),
(6, 3, '150 ML', '150', 1),
(7, 3, '250 ML', '350', 1),
(8, 3, '350 ML', '450', 1),
(9, 4, 'Long', '550', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `Product_Name` varchar(45) DEFAULT NULL,
  `Product_Type` varchar(45) DEFAULT NULL,
  `Product_MaterialType` varchar(45) DEFAULT NULL,
  `Product_Image1` text,
  `Product_Image2` text,
  `Product_Image3` text,
  `Product_Image4` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `Product_Name`, `Product_Type`, `Product_MaterialType`, `Product_Image1`, `Product_Image2`, `Product_Image3`, `Product_Image4`) VALUES
(1, 'T-shirt', 'Clothes', 'Silk', 'tshirt1.jpg', 'tshirt2.jpg', 'tshirt3.jpg', 'tshirt4.jpg'),
(2, 'Cushion', 'Clothes', 'Silk', 'c1.jpg', 'c2.jpg', 'c3.jpg', 'c4.jpg'),
(3, 'Cup', 'Plastic', 'Plastic', 'cup1.jpg', 'cup2.jpg', 'cup3.jpg', 'cup4.jpg'),
(4, 'Banner', 'Plastic', 'stretchble', 'tshirt2.jpg', 'tshirt2.jpg', 'tshirt3.jpg', 'tshirt4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `idState` int(11) NOT NULL,
  `State_Name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`idState`, `State_Name`) VALUES
(1, 'Gujrat'),
(2, 'Rajsthan'),
(3, 'Maharastra'),
(4, 'Dubai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `User_Fname` varchar(20) DEFAULT NULL,
  `User_Lname` varchar(20) DEFAULT NULL,
  `User_MobileNo` decimal(10,0) DEFAULT NULL,
  `User_Email` varchar(55) DEFAULT NULL,
  `User_Photo_Path` text,
  `User_Password` text,
  `Company_idCompany` int(11) NOT NULL DEFAULT '1',
  `IsAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `User_Fname`, `User_Lname`, `User_MobileNo`, `User_Email`, `User_Photo_Path`, `User_Password`, `Company_idCompany`, `IsAdmin`) VALUES
(1, 'Chirag', 'Panchal1008', '7878352525', 'cpanchal1008@gmail.com', 'aef72a8e0ad7fcb4b98d43dc5786a08d.png', '$2y$10$nJiInWH4VfCKroAxRtMxq.OYB5FX6qzeeQIOE7tpCaLQlpryel722', 1, 0),
(2, 'Chirag', 'Panchal1009', '9874563210', 'cpanchal1009@gmail.com', '974528d349f0746162918bbef315db9a.jpg', '$2y$10$nJiInWH4VfCKroAxRtMxq.OYB5FX6qzeeQIOE7tpCaLQlpryel722', 1, 1),
(3, 'John', 'Martin', '9874563210', 'metpatel52@gmail.com', '974528d349f0746162918bbef315db9a.jpg', '$2y$10$gSaslRG5zlKmIQ3d8lPv8e5DIgRKyBmAgROdvDbOou/CQwWfPIzMy', 1, 0),
(4, 'Rahul', 'Panchal', '9874563210', 'rahul70966@gmail.com', '7fdc1a630c238af0815181f9faa190f5.jpg', '$2y$10$GXLKfBqQkoCkxtuw5bHi.eQcQbrFtmhafIlPb951wf837.TR/d4/q', 1, 0),
(5, 'Yogesh', 'Panchal', '9874563210', 'yogesh@gmail.com', '974528d349f0746162918bbef315db9a.jpg', '$2y$10$nJiInWH4VfCKroAxRtMxq.OYB5FX6qzeeQIOE7tpCaLQlpryel722', 1, 0),
(25, 'Admin', 'Admin', '7894561230', 'Admin@gmail.com', '0e6c23ec367a64248d8c2f05a4257bec.jpg', '$2y$10$Ui1J65Zzm7pufyPxBcVBYu2EKvQCC4sNHa0yCvIBzupj40fR8ZPNS', 1, 1),
(26, 'windows', 'windows', '9876543210', 'windows@gmail.com', 'd18e234d3e1326a0c9d8403bef20f10b.png', '$2y$10$nJiInWH4VfCKroAxRtMxq.OYB5FX6qzeeQIOE7tpCaLQlpryel722', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_package`
--
ALTER TABLE `additional_package`
  ADD PRIMARY KEY (`idAdditional_Package`);

--
-- Indexes for table `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`idAlbum_Images`,`Event_Order_idEvent_Order`),
  ADD KEY `fk_Album_Images_Event_Order1_idx` (`Event_Order_idEvent_Order`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idArea`),
  ADD KEY `fk_Area_City1_idx` (`City_idCity`);

--
-- Indexes for table `assigned_employee_order`
--
ALTER TABLE `assigned_employee_order`
  ADD PRIMARY KEY (`Event_Order_idEvent_Order`,`Employee_idEmployee`),
  ADD KEY `fk_Assigned_Employee_Event_Order1_idx` (`Event_Order_idEvent_Order`),
  ADD KEY `fk_Assigned_Employee_Employee1_idx` (`Employee_idEmployee`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`),
  ADD KEY `fk_City_State1_idx` (`State_idState`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idCompany`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`idEmployee`),
  ADD KEY `fk_Employee_Company1_idx` (`Company_idCompany`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`idEvent_Category`);

--
-- Indexes for table `event_order`
--
ALTER TABLE `event_order`
  ADD PRIMARY KEY (`idEvent_Order`),
  ADD KEY `fk_Event_Order_Details_User_Details1_idx` (`User_ID_idUser`),
  ADD KEY `fk_Event_Order_Additional_Package_Details1_idx` (`Additional_Package_idAdditional_Package`),
  ADD KEY `fk_Event_Order_Package1_idx` (`Package_idPackage`),
  ADD KEY `fk_Event_Order_Event_Category1_idx` (`Event_Category_idEvent_Category`),
  ADD KEY `fk_Event_Order_Area1_idx` (`Area_idArea`);

--
-- Indexes for table `event_venue`
--
ALTER TABLE `event_venue`
  ADD PRIMARY KEY (`idEvent_Venue`),
  ADD KEY `fk_Event_Venue_Area1_idx` (`Area_idArea`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`idFeedback`),
  ADD KEY `fk_Feedback_Printing_Order1_idx` (`Printing_Order_idPrinting_Order`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`idOffer`),
  ADD KEY `fk_Offer_Company1_idx` (`Company_idCompany`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`idPackage`),
  ADD UNIQUE KEY `idPackage_UNIQUE` (`idPackage`),
  ADD KEY `fk_Package_Company1_idx` (`Company_idCompany`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idPayment`),
  ADD KEY `fk_Payment_Event_Order1_idx` (`Event_Order_idEvent_Order`),
  ADD KEY `fk_Payment_Printing_Order1_idx` (`Printing_Order_idPrinting_Order`);

--
-- Indexes for table `printing_order`
--
ALTER TABLE `printing_order`
  ADD PRIMARY KEY (`idPrinting_Order`),
  ADD KEY `fk_Product_Order_Offer1_idx` (`Offer_idOffer`),
  ADD KEY `fk_Printing_Order_Area1_idx` (`Area_idArea`),
  ADD KEY `fk_Printing_Order_User1_idx` (`User_idUser`);

--
-- Indexes for table `printing_order_details`
--
ALTER TABLE `printing_order_details`
  ADD PRIMARY KEY (`Printing_Order_idPrinting_Order_Details`,`Print_Type_Product_idProduct_Id`,`Print_Type_idPrint_Type`),
  ADD KEY `fk_Product_has_Product_Order_Product_Order1_idx` (`Printing_Order_idPrinting_Order_Details`),
  ADD KEY `fk_Printing_Order_Details_Print_Type1_idx` (`Print_Type_idPrint_Type`,`Print_Type_Product_idProduct_Id`);

--
-- Indexes for table `print_type`
--
ALTER TABLE `print_type`
  ADD PRIMARY KEY (`idPrint_Type`,`Product_idProduct_Id`),
  ADD KEY `fk_Image_Printing_Product1_idx` (`Product_idProduct_Id`),
  ADD KEY `fk_Print_Type_Company1_idx` (`Company_idCompany`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`idState`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fk_User_Company1_idx` (`Company_idCompany`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_package`
--
ALTER TABLE `additional_package`
  MODIFY `idAdditional_Package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `idAlbum_Images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `assigned_employee_order`
--
ALTER TABLE `assigned_employee_order`
  MODIFY `Event_Order_idEvent_Order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `idCompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `idEmployee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `idEvent_Category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_order`
--
ALTER TABLE `event_order`
  MODIFY `idEvent_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `event_venue`
--
ALTER TABLE `event_venue`
  MODIFY `idEvent_Venue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `idFeedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `idOffer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `idPackage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `idPayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `printing_order`
--
ALTER TABLE `printing_order`
  MODIFY `idPrinting_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `printing_order_details`
--
ALTER TABLE `printing_order_details`
  MODIFY `Printing_Order_idPrinting_Order_Details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `print_type`
--
ALTER TABLE `print_type`
  MODIFY `idPrint_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `idState` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_images`
--
ALTER TABLE `album_images`
  ADD CONSTRAINT `fk_Album_Images_Event_Order1` FOREIGN KEY (`Event_Order_idEvent_Order`) REFERENCES `event_order` (`idEvent_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_Area_City1` FOREIGN KEY (`City_idCity`) REFERENCES `city` (`idCity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assigned_employee_order`
--
ALTER TABLE `assigned_employee_order`
  ADD CONSTRAINT `fk_Assigned_Employee_Employee1` FOREIGN KEY (`Employee_idEmployee`) REFERENCES `employee` (`idEmployee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Assigned_Employee_Event_Order1` FOREIGN KEY (`Event_Order_idEvent_Order`) REFERENCES `event_order` (`idEvent_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_City_State1` FOREIGN KEY (`State_idState`) REFERENCES `state` (`idState`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_Employee_Company1` FOREIGN KEY (`Company_idCompany`) REFERENCES `company` (`idCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_order`
--
ALTER TABLE `event_order`
  ADD CONSTRAINT `fk_Event_Order_Additional_Package_Details1` FOREIGN KEY (`Additional_Package_idAdditional_Package`) REFERENCES `additional_package` (`idAdditional_Package`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Event_Order_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Event_Order_Details_User_Details1` FOREIGN KEY (`User_ID_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Event_Order_Event_Category1` FOREIGN KEY (`Event_Category_idEvent_Category`) REFERENCES `event_category` (`idEvent_Category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Event_Order_Package1` FOREIGN KEY (`Package_idPackage`) REFERENCES `package` (`idPackage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event_venue`
--
ALTER TABLE `event_venue`
  ADD CONSTRAINT `fk_Event_Venue_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_Feedback_Printing_Order1` FOREIGN KEY (`Printing_Order_idPrinting_Order`) REFERENCES `printing_order` (`idPrinting_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `fk_Offer_Company1` FOREIGN KEY (`Company_idCompany`) REFERENCES `company` (`idCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `fk_Package_Company1` FOREIGN KEY (`Company_idCompany`) REFERENCES `company` (`idCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_Payment_Event_Order1` FOREIGN KEY (`Event_Order_idEvent_Order`) REFERENCES `event_order` (`idEvent_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Payment_Printing_Order1` FOREIGN KEY (`Printing_Order_idPrinting_Order`) REFERENCES `printing_order` (`idPrinting_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `printing_order`
--
ALTER TABLE `printing_order`
  ADD CONSTRAINT `fk_Printing_Order_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Printing_Order_User1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Order_Offer1` FOREIGN KEY (`Offer_idOffer`) REFERENCES `offer` (`idOffer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `printing_order_details`
--
ALTER TABLE `printing_order_details`
  ADD CONSTRAINT `fk_Printing_Order_Details_Print_Type1` FOREIGN KEY (`Print_Type_idPrint_Type`,`Print_Type_Product_idProduct_Id`) REFERENCES `print_type` (`idPrint_Type`, `Product_idProduct_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_has_Product_Order_Product_Order1` FOREIGN KEY (`Printing_Order_idPrinting_Order_Details`) REFERENCES `printing_order` (`idPrinting_Order`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `print_type`
--
ALTER TABLE `print_type`
  ADD CONSTRAINT `fk_Image_Printing_Product1` FOREIGN KEY (`Product_idProduct_Id`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Print_Type_Company1` FOREIGN KEY (`Company_idCompany`) REFERENCES `company` (`idCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Company1` FOREIGN KEY (`Company_idCompany`) REFERENCES `company` (`idCompany`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
