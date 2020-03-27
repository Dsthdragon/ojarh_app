-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 27, 2020 at 10:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojarh`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdetails`
--

DROP TABLE IF EXISTS `accountdetails`;
CREATE TABLE IF NOT EXISTS `accountdetails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `accountname` text NOT NULL,
  `accountnumber` text NOT NULL,
  `bankname` text NOT NULL,
  `accounttype` text NOT NULL,
  `status` text NOT NULL,
  `create_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountdetails`
--

INSERT INTO `accountdetails` (`id`, `userid`, `accountname`, `accountnumber`, `bankname`, `accounttype`, `status`, `create_on`) VALUES
(1, '967815', 'Josimar Akpomudia', '3330000408', 'ecobank', 'Current', 'Active', '2020-02-24 17:57:10'),
(2, '825974', 'james', '123456789', 'chase', 'savings', 'Active', '2020-03-25 19:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

DROP TABLE IF EXISTS `account_info`;
CREATE TABLE IF NOT EXISTS `account_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `account_type` text NOT NULL,
  `durate` text,
  `startDate` text,
  `endDate` text,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `userid`, `account_type`, `durate`, `startDate`, `endDate`, `dated`) VALUES
(1, '967815', 'Premium', '1', '2020-03-06', '2020-04-05', '2020-02-24 17:32:54'),
(16, '536361', 'Buyer', NULL, NULL, NULL, '2020-03-26 09:22:18'),
(14, '825974', 'Premium', '1', '2020-03-24', '2020-04-23', '2020-03-24 16:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agentid` text NOT NULL,
  `agentfname` text NOT NULL,
  `agentlname` text NOT NULL,
  `agentphone` text NOT NULL,
  `agentemail` text NOT NULL,
  `agentaddress` text NOT NULL,
  `agentstate` text NOT NULL,
  `agentcountry` text NOT NULL,
  `agentstatus` text NOT NULL,
  `agentfile_name` text NOT NULL,
  `agentpic_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agentid`, `agentfname`, `agentlname`, `agentphone`, `agentemail`, `agentaddress`, `agentstate`, `agentcountry`, `agentstatus`, `agentfile_name`, `agentpic_name`, `created_at`) VALUES
(1, '32961679', 'Sandra', 'Akpomudia', '08048485858', 'renownjosimar@gmail.com', 'abuja', 'abuja', 'Nigeria', 'Activate', '32961679-EMMANUEL OVOME ACCOUNT STATEMENT.xlsx', '23764862-390.jpg', '2020-02-28 12:12:54'),
(2, '49981658', 'Dafe ', 'George', '2938993939', 'dafegeorge19@gmail.com', 'Maitama', 'Abuja', 'Nigeria', 'Activate', '49981658-COURSE OUTLINES FOR WEB DESIGNING.docx', '49981658-18_270x270_crop_center.webp', '2020-03-06 13:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

DROP TABLE IF EXISTS `apps_countries`;
CREATE TABLE IF NOT EXISTS `apps_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `bizname` text NOT NULL,
  `bizphone` text NOT NULL,
  `bizemail` text NOT NULL,
  `bizstate` text NOT NULL,
  `bizmarket` text NOT NULL,
  `bizaddress` text NOT NULL,
  `bizwebsite` text NOT NULL,
  `bizregdate` text NOT NULL,
  `returnpolicy` text,
  `disclaimer` text,
  `timedelivery` text,
  `cardsettings` text,
  `storeimage` text,
  `videolink` text,
  `status` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `userid`, `bizname`, `bizphone`, `bizemail`, `bizstate`, `bizmarket`, `bizaddress`, `bizwebsite`, `bizregdate`, `returnpolicy`, `disclaimer`, `timedelivery`, `cardsettings`, `storeimage`, `videolink`, `status`, `created_date`) VALUES
(1, '967815', 'Fairmountains Inc.', '08048584848', 'info@fairmountains.com', '[\"Abuja\",\"Lagos\"]', '[\"131294\",\"985258\"]', 'Abuja', 'www.fairmountains.com', '02/06/2020', 'this is my Terms and conditions of return policy', 'This is my disclaimer', 'This is my time and delivery', '1', '{\"picture0\":\"967815-IMG-20200201-WA0000.jpg\",\"picture1\":\"\",\"picture2\":\"\",\"picture3\":\"\",\"picture4\":\"\"}', NULL, 'Updated', '2020-02-24 17:38:36'),
(2, '825974', 'lakjfk', '38383888', 'info@asokd.com', 'skafjs', 'Antarctica', 'lkfjaslf kals fl ', 'www.google.com', '03/28/2020', NULL, NULL, NULL, '1', NULL, NULL, 'Updated', '2020-03-25 20:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` text NOT NULL,
  `catname` text NOT NULL,
  `catdescription` text,
  `catImage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catid`, `catname`, `catdescription`, `catImage`, `created_at`) VALUES
(1, '229936', 'Automobile and Spare Parts', 'This contain the sales of automobile and its spare parts', '544753-4_446623c8-2b13-4ce1-8e53-b29267baf3bb_500x500_crop_center.jpg', '2020-02-24 17:10:18'),
(2, '193357', 'Electrical Appliances', 'This contain the sales of home and outdoor appliances', '544753-4_446623c8-2b13-4ce1-8e53-b29267baf3bb_500x500_crop_center.jpg', '2020-02-24 17:10:55'),
(3, '544753', 'Fashion and Jewery', 'Men, women, children fashion', '544753-4_446623c8-2b13-4ce1-8e53-b29267baf3bb_500x500_crop_center.jpg', '2020-03-03 15:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `disputeresponse`
--

DROP TABLE IF EXISTS `disputeresponse`;
CREATE TABLE IF NOT EXISTS `disputeresponse` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `disputeid` text NOT NULL,
  `senderid` text NOT NULL,
  `againstid` text NOT NULL,
  `messageby` text NOT NULL,
  `responsemessage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disputetbl`
--

DROP TABLE IF EXISTS `disputetbl`;
CREATE TABLE IF NOT EXISTS `disputetbl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `disputeid` text NOT NULL,
  `senderid` text NOT NULL,
  `againstid` text NOT NULL,
  `subject` text NOT NULL,
  `priority` text NOT NULL,
  `details_priority` text NOT NULL,
  `file_name` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `local_governments`
--

DROP TABLE IF EXISTS `local_governments`;
CREATE TABLE IF NOT EXISTS `local_governments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=775 DEFAULT CHARSET=utf32 COMMENT='Local governments in Nigeria.';

--
-- Dumping data for table `local_governments`
--

INSERT INTO `local_governments` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala Ngwa North'),
(7, 1, 'Isiala Ngwa South'),
(8, 1, 'Isuikwuato'),
(9, 1, 'Obi Ngwa'),
(10, 1, 'Ohafia'),
(11, 1, 'Osisioma'),
(12, 1, 'Ugwunagbo'),
(13, 1, 'Ukwa East'),
(14, 1, 'Ukwa West'),
(15, 1, 'Umuahia North'),
(16, 1, 'Umuahia South'),
(17, 1, 'Umu Nneochi'),
(18, 2, 'Demsa'),
(19, 2, 'Fufure'),
(20, 2, 'Ganye'),
(21, 2, 'Gayuk'),
(22, 2, 'Gombi'),
(23, 2, 'Grie'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Larmurde'),
(27, 2, 'Madagali'),
(28, 2, 'Maiha'),
(29, 2, 'Mayo Belwa'),
(30, 2, 'Michika'),
(31, 2, 'Mubi North'),
(32, 2, 'Mubi South'),
(33, 2, 'Numan'),
(34, 2, 'Shelleng'),
(35, 2, 'Song'),
(36, 2, 'Toungo'),
(37, 2, 'Yola North'),
(38, 2, 'Yola South'),
(39, 3, 'Abak'),
(40, 3, 'Eastern Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Esit Eket'),
(43, 3, 'Essien Udim'),
(44, 3, 'Etim Ekpo'),
(45, 3, 'Etinan'),
(46, 3, 'Ibeno'),
(47, 3, 'Ibesikpo Asutan'),
(48, 3, 'Ibiono-Ibom'),
(49, 3, 'Ika'),
(50, 3, 'Ikono'),
(51, 3, 'Ikot Abasi'),
(52, 3, 'Ikot Ekpene'),
(53, 3, 'Ini'),
(54, 3, 'Itu'),
(55, 3, 'Mbo'),
(56, 3, 'Mkpat-Enin'),
(57, 3, 'Nsit-Atai'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oruk Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanafun'),
(67, 3, 'Uruan'),
(68, 3, 'Urue-Offong/Oruko'),
(69, 3, 'Uyo'),
(70, 4, 'Aguata'),
(71, 4, 'Anambra East'),
(72, 4, 'Anambra West'),
(73, 4, 'Anaocha'),
(74, 4, 'Awka North'),
(75, 4, 'Awka South'),
(76, 4, 'Ayamelum'),
(77, 4, 'Dunukofia'),
(78, 4, 'Ekwusigo'),
(79, 4, 'Idemili North'),
(80, 4, 'Idemili South'),
(81, 4, 'Ihiala'),
(82, 4, 'Njikoka'),
(83, 4, 'Nnewi North'),
(84, 4, 'Nnewi South'),
(85, 4, 'Ogbaru'),
(86, 4, 'Onitsha North'),
(87, 4, 'Onitsha South'),
(88, 4, 'Orumba North'),
(89, 4, 'Orumba South'),
(90, 4, 'Oyi'),
(91, 5, 'Alkaleri'),
(92, 5, 'Bauchi'),
(93, 5, 'Bogoro'),
(94, 5, 'Damban'),
(95, 5, 'Darazo'),
(96, 5, 'Dass'),
(97, 5, 'Gamawa'),
(98, 5, 'Ganjuwa'),
(99, 5, 'Giade'),
(100, 5, 'Itas/Gadau'),
(101, 5, 'Jama\'are'),
(102, 5, 'Katagum'),
(103, 5, 'Kirfi'),
(104, 5, 'Misau'),
(105, 5, 'Ningi'),
(106, 5, 'Shira'),
(107, 5, 'Tafawa Balewa'),
(108, 5, 'Toro'),
(109, 5, 'Warji'),
(110, 5, 'Zaki'),
(111, 6, 'Brass'),
(112, 6, 'Ekeremor'),
(113, 6, 'Kolokuma/Opokuma'),
(114, 6, 'Nembe'),
(115, 6, 'Ogbia'),
(116, 6, 'Sagbama'),
(117, 6, 'Southern Ijaw'),
(118, 6, 'Yenagoa'),
(119, 7, 'Agatu'),
(120, 7, 'Apa'),
(121, 7, 'Ado'),
(122, 7, 'Buruku'),
(123, 7, 'Gboko'),
(124, 7, 'Guma'),
(125, 7, 'Gwer East'),
(126, 7, 'Gwer West'),
(127, 7, 'Katsina-Ala'),
(128, 7, 'Konshisha'),
(129, 7, 'Kwande'),
(130, 7, 'Logo'),
(131, 7, 'Makurdi'),
(132, 7, 'Obi'),
(133, 7, 'Ogbadibo'),
(134, 7, 'Ohimini'),
(135, 7, 'Oju'),
(136, 7, 'Okpokwu'),
(137, 7, 'Oturkpo'),
(138, 7, 'Tarka'),
(139, 7, 'Ukum'),
(140, 7, 'Ushongo'),
(141, 7, 'Vandeikya'),
(142, 8, 'Abadam'),
(143, 8, 'Askira/Uba'),
(144, 8, 'Bama'),
(145, 8, 'Bayo'),
(146, 8, 'Biu'),
(147, 8, 'Chibok'),
(148, 8, 'Damboa'),
(149, 8, 'Dikwa'),
(150, 8, 'Gubio'),
(151, 8, 'Guzamala'),
(152, 8, 'Gwoza'),
(153, 8, 'Hawul'),
(154, 8, 'Jere'),
(155, 8, 'Kaga'),
(156, 8, 'Kala/Balge'),
(157, 8, 'Konduga'),
(158, 8, 'Kukawa'),
(159, 8, 'Kwaya Kusar'),
(160, 8, 'Mafa'),
(161, 8, 'Magumeri'),
(162, 8, 'Maiduguri'),
(163, 8, 'Marte'),
(164, 8, 'Mobbar'),
(165, 8, 'Monguno'),
(166, 8, 'Ngala'),
(167, 8, 'Nganzai'),
(168, 8, 'Shani'),
(169, 9, 'Abi'),
(170, 9, 'Akamkpa'),
(171, 9, 'Akpabuyo'),
(172, 9, 'Bakassi'),
(173, 9, 'Bekwarra'),
(174, 9, 'Biase'),
(175, 9, 'Boki'),
(176, 9, 'Calabar Municipal'),
(177, 9, 'Calabar South'),
(178, 9, 'Etung'),
(179, 9, 'Ikom'),
(180, 9, 'Obanliku'),
(181, 9, 'Obubra'),
(182, 9, 'Obudu'),
(183, 9, 'Odukpani'),
(184, 9, 'Ogoja'),
(185, 9, 'Yakuur'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele, Delta'),
(204, 10, 'Udu'),
(205, 10, 'Ughelli North'),
(206, 10, 'Ughelli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri North'),
(210, 10, 'Warri South'),
(211, 10, 'Warri South West'),
(212, 11, 'Abakaliki'),
(213, 11, 'Afikpo North'),
(214, 11, 'Afikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'Ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaozara'),
(223, 11, 'Ohaukwu'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko-Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North-East'),
(229, 12, 'Esan South-East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako Central'),
(232, 12, 'Etsako East'),
(233, 12, 'Etsako West'),
(234, 12, 'Igueben'),
(235, 12, 'Ikpoba Okha'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Oredo'),
(238, 12, 'Ovia North-East'),
(239, 12, 'Ovia South-West'),
(240, 12, 'Owan East'),
(241, 12, 'Owan West'),
(242, 12, 'Uhunmwonde'),
(243, 13, 'Ado Ekiti'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti East'),
(246, 13, 'Ekiti South-West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Gbonyin'),
(250, 13, 'Ido Osi'),
(251, 13, 'Ijero'),
(252, 13, 'Ikere'),
(253, 13, 'Ikole'),
(254, 13, 'Ilejemeje'),
(255, 13, 'Irepodun/Ifelodun'),
(256, 13, 'Ise/Orun'),
(257, 13, 'Moba'),
(258, 13, 'Oye'),
(259, 14, 'Aninri'),
(260, 14, 'Awgu'),
(261, 14, 'Enugu East'),
(262, 14, 'Enugu North'),
(263, 14, 'Enugu South'),
(264, 14, 'Ezeagu'),
(265, 14, 'Igbo Etiti'),
(266, 14, 'Igbo Eze North'),
(267, 14, 'Igbo Eze South'),
(268, 14, 'Isi Uzo'),
(269, 14, 'Nkanu East'),
(270, 14, 'Nkanu West'),
(271, 14, 'Nsukka'),
(272, 14, 'Oji River'),
(273, 14, 'Udenu'),
(274, 14, 'Udi'),
(275, 14, 'Uzo Uwani'),
(276, 15, 'Abaji'),
(277, 15, 'Bwari'),
(278, 15, 'Gwagwalada'),
(279, 15, 'Kuje'),
(280, 15, 'Kwali'),
(281, 15, 'Municipal Area Council'),
(282, 16, 'Akko'),
(283, 16, 'Balanga'),
(284, 16, 'Billiri'),
(285, 16, 'Dukku'),
(286, 16, 'Funakaye'),
(287, 16, 'Gombe'),
(288, 16, 'Kaltungo'),
(289, 16, 'Kwami'),
(290, 16, 'Nafada'),
(291, 16, 'Shongom'),
(292, 16, 'Yamaltu/Deba'),
(293, 17, 'Aboh Mbaise'),
(294, 17, 'Ahiazu Mbaise'),
(295, 17, 'Ehime Mbano'),
(296, 17, 'Ezinihitte'),
(297, 17, 'Ideato North'),
(298, 17, 'Ideato South'),
(299, 17, 'Ihitte/Uboma'),
(300, 17, 'Ikeduru'),
(301, 17, 'Isiala Mbano'),
(302, 17, 'Isu'),
(303, 17, 'Mbaitoli'),
(304, 17, 'Ngor Okpala'),
(305, 17, 'Njaba'),
(306, 17, 'Nkwerre'),
(307, 17, 'Nwangele'),
(308, 17, 'Obowo'),
(309, 17, 'Oguta'),
(310, 17, 'Ohaji/Egbema'),
(311, 17, 'Okigwe'),
(312, 17, 'Orlu'),
(313, 17, 'Orsu'),
(314, 17, 'Oru East'),
(315, 17, 'Oru West'),
(316, 17, 'Owerri Municipal'),
(317, 17, 'Owerri North'),
(318, 17, 'Owerri West'),
(319, 17, 'Unuimo'),
(320, 18, 'Auyo'),
(321, 18, 'Babura'),
(322, 18, 'Biriniwa'),
(323, 18, 'Birnin Kudu'),
(324, 18, 'Buji'),
(325, 18, 'Dutse'),
(326, 18, 'Gagarawa'),
(327, 18, 'Garki'),
(328, 18, 'Gumel'),
(329, 18, 'Guri'),
(330, 18, 'Gwaram'),
(331, 18, 'Gwiwa'),
(332, 18, 'Hadejia'),
(333, 18, 'Jahun'),
(334, 18, 'Kafin Hausa'),
(335, 18, 'Kazaure'),
(336, 18, 'Kiri Kasama'),
(337, 18, 'Kiyawa'),
(338, 18, 'Kaugama'),
(339, 18, 'Maigatari'),
(340, 18, 'Malam Madori'),
(341, 18, 'Miga'),
(342, 18, 'Ringim'),
(343, 18, 'Roni'),
(344, 18, 'Sule Tankarkar'),
(345, 18, 'Taura'),
(346, 18, 'Yankwashi'),
(347, 19, 'Birnin Gwari'),
(348, 19, 'Chikun'),
(349, 19, 'Giwa'),
(350, 19, 'Igabi'),
(351, 19, 'Ikara'),
(352, 19, 'Jaba'),
(353, 19, 'Jema\'a'),
(354, 19, 'Kachia'),
(355, 19, 'Kaduna North'),
(356, 19, 'Kaduna South'),
(357, 19, 'Kagarko'),
(358, 19, 'Kajuru'),
(359, 19, 'Kaura'),
(360, 19, 'Kauru'),
(361, 19, 'Kubau'),
(362, 19, 'Kudan'),
(363, 19, 'Lere'),
(364, 19, 'Makarfi'),
(365, 19, 'Sabon Gari'),
(366, 19, 'Sanga'),
(367, 19, 'Soba'),
(368, 19, 'Zangon Kataf'),
(369, 19, 'Zaria'),
(370, 20, 'Ajingi'),
(371, 20, 'Albasu'),
(372, 20, 'Bagwai'),
(373, 20, 'Bebeji'),
(374, 20, 'Bichi'),
(375, 20, 'Bunkure'),
(376, 20, 'Dala'),
(377, 20, 'Dambatta'),
(378, 20, 'Dawakin Kudu'),
(379, 20, 'Dawakin Tofa'),
(380, 20, 'Doguwa'),
(381, 20, 'Fagge'),
(382, 20, 'Gabasawa'),
(383, 20, 'Garko'),
(384, 20, 'Garun Mallam'),
(385, 20, 'Gaya'),
(386, 20, 'Gezawa'),
(387, 20, 'Gwale'),
(388, 20, 'Gwarzo'),
(389, 20, 'Kabo'),
(390, 20, 'Kano Municipal'),
(391, 20, 'Karaye'),
(392, 20, 'Kibiya'),
(393, 20, 'Kiru'),
(394, 20, 'Kumbotso'),
(395, 20, 'Kunchi'),
(396, 20, 'Kura'),
(397, 20, 'Madobi'),
(398, 20, 'Makoda'),
(399, 20, 'Minjibir'),
(400, 20, 'Nasarawa'),
(401, 20, 'Rano'),
(402, 20, 'Rimin Gado'),
(403, 20, 'Rogo'),
(404, 20, 'Shanono'),
(405, 20, 'Sumaila'),
(406, 20, 'Takai'),
(407, 20, 'Tarauni'),
(408, 20, 'Tofa'),
(409, 20, 'Tsanyawa'),
(410, 20, 'Tudun Wada'),
(411, 20, 'Ungogo'),
(412, 20, 'Warawa'),
(413, 20, 'Wudil'),
(414, 21, 'Bakori'),
(415, 21, 'Batagarawa'),
(416, 21, 'Batsari'),
(417, 21, 'Baure'),
(418, 21, 'Bindawa'),
(419, 21, 'Charanchi'),
(420, 21, 'Dandume'),
(421, 21, 'Danja'),
(422, 21, 'Dan Musa'),
(423, 21, 'Daura'),
(424, 21, 'Dutsi'),
(425, 21, 'Dutsin Ma'),
(426, 21, 'Faskari'),
(427, 21, 'Funtua'),
(428, 21, 'Ingawa'),
(429, 21, 'Jibia'),
(430, 21, 'Kafur'),
(431, 21, 'Kaita'),
(432, 21, 'Kankara'),
(433, 21, 'Kankia'),
(434, 21, 'Katsina'),
(435, 21, 'Kurfi'),
(436, 21, 'Kusada'),
(437, 21, 'Mai\'Adua'),
(438, 21, 'Malumfashi'),
(439, 21, 'Mani'),
(440, 21, 'Mashi'),
(441, 21, 'Matazu'),
(442, 21, 'Musawa'),
(443, 21, 'Rimi'),
(444, 21, 'Sabuwa'),
(445, 21, 'Safana'),
(446, 21, 'Sandamu'),
(447, 21, 'Zango'),
(448, 22, 'Aleiro'),
(449, 22, 'Arewa Dandi'),
(450, 22, 'Argungu'),
(451, 22, 'Augie'),
(452, 22, 'Bagudo'),
(453, 22, 'Birnin Kebbi'),
(454, 22, 'Bunza'),
(455, 22, 'Dandi'),
(456, 22, 'Fakai'),
(457, 22, 'Gwandu'),
(458, 22, 'Jega'),
(459, 22, 'Kalgo'),
(460, 22, 'Koko/Besse'),
(461, 22, 'Maiyama'),
(462, 22, 'Ngaski'),
(463, 22, 'Sakaba'),
(464, 22, 'Shanga'),
(465, 22, 'Suru'),
(466, 22, 'Wasagu/Danko'),
(467, 22, 'Yauri'),
(468, 22, 'Zuru'),
(469, 23, 'Adavi'),
(470, 23, 'Ajaokuta'),
(471, 23, 'Ankpa'),
(472, 23, 'Bassa'),
(473, 23, 'Dekina'),
(474, 23, 'Ibaji'),
(475, 23, 'Idah'),
(476, 23, 'Igalamela Odolu'),
(477, 23, 'Ijumu'),
(478, 23, 'Kabba/Bunu'),
(479, 23, 'Kogi'),
(480, 23, 'Lokoja'),
(481, 23, 'Mopa Muro'),
(482, 23, 'Ofu'),
(483, 23, 'Ogori/Magongo'),
(484, 23, 'Okehi'),
(485, 23, 'Okene'),
(486, 23, 'Olamaboro'),
(487, 23, 'Omala'),
(488, 23, 'Yagba East'),
(489, 23, 'Yagba West'),
(490, 24, 'Asa'),
(491, 24, 'Baruten'),
(492, 24, 'Edu'),
(493, 24, 'Ekiti, Kwara State'),
(494, 24, 'Ifelodun'),
(495, 24, 'Ilorin East'),
(496, 24, 'Ilorin South'),
(497, 24, 'Ilorin West'),
(498, 24, 'Irepodun'),
(499, 24, 'Isin'),
(500, 24, 'Kaiama'),
(501, 24, 'Moro'),
(502, 24, 'Offa'),
(503, 24, 'Oke Ero'),
(504, 24, 'Oyun'),
(505, 24, 'Pategi'),
(506, 25, 'Agege'),
(507, 25, 'Ajeromi-Ifelodun'),
(508, 25, 'Alimosho'),
(509, 25, 'Amuwo-Odofin'),
(510, 25, 'Apapa'),
(511, 25, 'Badagry'),
(512, 25, 'Epe'),
(513, 25, 'Eti Osa'),
(514, 25, 'Ibeju-Lekki'),
(515, 25, 'Ifako-Ijaiye'),
(516, 25, 'Ikeja'),
(517, 25, 'Ikorodu'),
(518, 25, 'Kosofe'),
(519, 25, 'Lagos Island'),
(520, 25, 'Lagos Mainland'),
(521, 25, 'Mushin'),
(522, 25, 'Ojo'),
(523, 25, 'Oshodi-Isolo'),
(524, 25, 'Shomolu'),
(525, 25, 'Surulere, Lagos State'),
(526, 26, 'Akwanga'),
(527, 26, 'Awe'),
(528, 26, 'Doma'),
(529, 26, 'Karu'),
(530, 26, 'Keana'),
(531, 26, 'Keffi'),
(532, 26, 'Kokona'),
(533, 26, 'Lafia'),
(534, 26, 'Nasarawa'),
(535, 26, 'Nasarawa Egon'),
(536, 26, 'Obi'),
(537, 26, 'Toto'),
(538, 26, 'Wamba'),
(539, 27, 'Agaie'),
(540, 27, 'Agwara'),
(541, 27, 'Bida'),
(542, 27, 'Borgu'),
(543, 27, 'Bosso'),
(544, 27, 'Chanchaga'),
(545, 27, 'Edati'),
(546, 27, 'Gbako'),
(547, 27, 'Gurara'),
(548, 27, 'Katcha'),
(549, 27, 'Kontagora'),
(550, 27, 'Lapai'),
(551, 27, 'Lavun'),
(552, 27, 'Magama'),
(553, 27, 'Mariga'),
(554, 27, 'Mashegu'),
(555, 27, 'Mokwa'),
(556, 27, 'Moya'),
(557, 27, 'Paikoro'),
(558, 27, 'Rafi'),
(559, 27, 'Rijau'),
(560, 27, 'Shiroro'),
(561, 27, 'Suleja'),
(562, 27, 'Tafa'),
(563, 27, 'Wushishi'),
(564, 28, 'Abeokuta North'),
(565, 28, 'Abeokuta South'),
(566, 28, 'Ado-Odo/Ota'),
(567, 28, 'Egbado North'),
(568, 28, 'Egbado South'),
(569, 28, 'Ewekoro'),
(570, 28, 'Ifo'),
(571, 28, 'Ijebu East'),
(572, 28, 'Ijebu North'),
(573, 28, 'Ijebu North East'),
(574, 28, 'Ijebu Ode'),
(575, 28, 'Ikenne'),
(576, 28, 'Imeko Afon'),
(577, 28, 'Ipokia'),
(578, 28, 'Obafemi Owode'),
(579, 28, 'Odeda'),
(580, 28, 'Odogbolu'),
(581, 28, 'Ogun Waterside'),
(582, 28, 'Remo North'),
(583, 28, 'Shagamu'),
(584, 29, 'Akoko North-East'),
(585, 29, 'Akoko North-West'),
(586, 29, 'Akoko South-West'),
(587, 29, 'Akoko South-East'),
(588, 29, 'Akure North'),
(589, 29, 'Akure South'),
(590, 29, 'Ese Odo'),
(591, 29, 'Idanre'),
(592, 29, 'Ifedore'),
(593, 29, 'Ilaje'),
(594, 29, 'Ile Oluji/Okeigbo'),
(595, 29, 'Irele'),
(596, 29, 'Odigbo'),
(597, 29, 'Okitipupa'),
(598, 29, 'Ondo East'),
(599, 29, 'Ondo West'),
(600, 29, 'Ose'),
(601, 29, 'Owo'),
(602, 30, 'Atakunmosa East'),
(603, 30, 'Atakunmosa West'),
(604, 30, 'Aiyedaade'),
(605, 30, 'Aiyedire'),
(606, 30, 'Boluwaduro'),
(607, 30, 'Boripe'),
(608, 30, 'Ede North'),
(609, 30, 'Ede South'),
(610, 30, 'Ife Central'),
(611, 30, 'Ife East'),
(612, 30, 'Ife North'),
(613, 30, 'Ife South'),
(614, 30, 'Egbedore'),
(615, 30, 'Ejigbo'),
(616, 30, 'Ifedayo'),
(617, 30, 'Ifelodun'),
(618, 30, 'Ila'),
(619, 30, 'Ilesa East'),
(620, 30, 'Ilesa West'),
(621, 30, 'Irepodun'),
(622, 30, 'Irewole'),
(623, 30, 'Isokan'),
(624, 30, 'Iwo'),
(625, 30, 'Obokun'),
(626, 30, 'Odo Otin'),
(627, 30, 'Ola Oluwa'),
(628, 30, 'Olorunda'),
(629, 30, 'Oriade'),
(630, 30, 'Orolu'),
(631, 30, 'Osogbo'),
(632, 31, 'Afijio'),
(633, 31, 'Akinyele'),
(634, 31, 'Atiba'),
(635, 31, 'Atisbo'),
(636, 31, 'Egbeda'),
(637, 31, 'Ibadan North'),
(638, 31, 'Ibadan North-East'),
(639, 31, 'Ibadan North-West'),
(640, 31, 'Ibadan South-East'),
(641, 31, 'Ibadan South-West'),
(642, 31, 'Ibarapa Central'),
(643, 31, 'Ibarapa East'),
(644, 31, 'Ibarapa North'),
(645, 31, 'Ido'),
(646, 31, 'Irepo'),
(647, 31, 'Iseyin'),
(648, 31, 'Itesiwaju'),
(649, 31, 'Iwajowa'),
(650, 31, 'Kajola'),
(651, 31, 'Lagelu'),
(652, 31, 'Ogbomosho North'),
(653, 31, 'Ogbomosho South'),
(654, 31, 'Ogo Oluwa'),
(655, 31, 'Olorunsogo'),
(656, 31, 'Oluyole'),
(657, 31, 'Ona Ara'),
(658, 31, 'Orelope'),
(659, 31, 'Ori Ire'),
(660, 31, 'Oyo'),
(661, 31, 'Oyo East'),
(662, 31, 'Saki East'),
(663, 31, 'Saki West'),
(664, 31, 'Surulere, Oyo State'),
(665, 32, 'Bokkos'),
(666, 32, 'Barkin Ladi'),
(667, 32, 'Bassa'),
(668, 32, 'Jos East'),
(669, 32, 'Jos North'),
(670, 32, 'Jos South'),
(671, 32, 'Kanam'),
(672, 32, 'Kanke'),
(673, 32, 'Langtang South'),
(674, 32, 'Langtang North'),
(675, 32, 'Mangu'),
(676, 32, 'Mikang'),
(677, 32, 'Pankshin'),
(678, 32, 'Qua\'an Pan'),
(679, 32, 'Riyom'),
(680, 32, 'Shendam'),
(681, 32, 'Wase'),
(682, 33, 'Abua/Odual'),
(683, 33, 'Ahoada East'),
(684, 33, 'Ahoada West'),
(685, 33, 'Akuku-Toru'),
(686, 33, 'Andoni'),
(687, 33, 'Asari-Toru'),
(688, 33, 'Bonny'),
(689, 33, 'Degema'),
(690, 33, 'Eleme'),
(691, 33, 'Emuoha'),
(692, 33, 'Etche'),
(693, 33, 'Gokana'),
(694, 33, 'Ikwerre'),
(695, 33, 'Khana'),
(696, 33, 'Obio/Akpor'),
(697, 33, 'Ogba/Egbema/Ndoni'),
(698, 33, 'Ogu/Bolo'),
(699, 33, 'Okrika'),
(700, 33, 'Omuma'),
(701, 33, 'Opobo/Nkoro'),
(702, 33, 'Oyigbo'),
(703, 33, 'Port Harcourt'),
(704, 33, 'Tai'),
(705, 34, 'Binji'),
(706, 34, 'Bodinga'),
(707, 34, 'Dange Shuni'),
(708, 34, 'Gada'),
(709, 34, 'Goronyo'),
(710, 34, 'Gudu'),
(711, 34, 'Gwadabawa'),
(712, 34, 'Illela'),
(713, 34, 'Isa'),
(714, 34, 'Kebbe'),
(715, 34, 'Kware'),
(716, 34, 'Rabah'),
(717, 34, 'Sabon Birni'),
(718, 34, 'Shagari'),
(719, 34, 'Silame'),
(720, 34, 'Sokoto North'),
(721, 34, 'Sokoto South'),
(722, 34, 'Tambuwal'),
(723, 34, 'Tangaza'),
(724, 34, 'Tureta'),
(725, 34, 'Wamako'),
(726, 34, 'Wurno'),
(727, 34, 'Yabo'),
(728, 35, 'Ardo Kola'),
(729, 35, 'Bali'),
(730, 35, 'Donga'),
(731, 35, 'Gashaka'),
(732, 35, 'Gassol'),
(733, 35, 'Ibi'),
(734, 35, 'Jalingo'),
(735, 35, 'Karim Lamido'),
(736, 35, 'Kumi'),
(737, 35, 'Lau'),
(738, 35, 'Sardauna'),
(739, 35, 'Takum'),
(740, 35, 'Ussa'),
(741, 35, 'Wukari'),
(742, 35, 'Yorro'),
(743, 35, 'Zing'),
(744, 36, 'Bade'),
(745, 36, 'Bursari'),
(746, 36, 'Damaturu'),
(747, 36, 'Fika'),
(748, 36, 'Fune'),
(749, 36, 'Geidam'),
(750, 36, 'Gujba'),
(751, 36, 'Gulani'),
(752, 36, 'Jakusko'),
(753, 36, 'Karasuwa'),
(754, 36, 'Machina'),
(755, 36, 'Nangere'),
(756, 36, 'Nguru'),
(757, 36, 'Potiskum'),
(758, 36, 'Tarmuwa'),
(759, 36, 'Yunusari'),
(760, 36, 'Yusufari'),
(761, 37, 'Anka'),
(762, 37, 'Bakura'),
(763, 37, 'Birnin Magaji/Kiyaw'),
(764, 37, 'Bukkuyum'),
(765, 37, 'Bungudu'),
(766, 37, 'Gummi'),
(767, 37, 'Gusau'),
(768, 37, 'Kaura Namoda'),
(769, 37, 'Maradun'),
(770, 37, 'Maru'),
(771, 37, 'Shinkafi'),
(772, 37, 'Talata Mafara'),
(773, 37, 'Chafe'),
(774, 37, 'Zurmi');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `marketid` text NOT NULL,
  `marketname` text NOT NULL,
  `marketstate` text NOT NULL,
  `marketaddress` text NOT NULL,
  `marketchairman` text NOT NULL,
  `marketimg` text NOT NULL,
  `marketstatus` text NOT NULL,
  `created_by` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `marketid`, `marketname`, `marketstate`, `marketaddress`, `marketchairman`, `marketimg`, `marketstatus`, `created_by`, `created_date`) VALUES
(1, '323474', 'Utako Market', 'Abuja', 'Jabi Utako, abuja', 'Amidu', '323474-avatar.png', 'Active', 'SuperAdmin', '2020-02-24 17:11:46'),
(2, '985258', 'Wuse Market', 'Abuja', 'Wuse zone 2', 'aminu', '985258-avatar.png', 'Active', 'SuperAdmin', '2020-02-24 17:12:21'),
(3, '454373', 'Ojoo Market', 'Lagos', 'lagos', 'james', '454373-avatar.png', 'Active', 'SuperAdmin', '2020-02-24 17:12:52'),
(4, '131294', 'Okota Market', 'Lagos', 'lagos', 'olumide', '131294-avatar.png', 'Active', 'SuperAdmin', '2020-02-24 17:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `marketproductid`
--

DROP TABLE IF EXISTS `marketproductid`;
CREATE TABLE IF NOT EXISTS `marketproductid` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `marketid` text NOT NULL,
  `marketstate` text NOT NULL,
  `categoryid` text NOT NULL,
  `categoryname` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketproductid`
--

INSERT INTO `marketproductid` (`id`, `marketid`, `marketstate`, `categoryid`, `categoryname`) VALUES
(1, '323474', 'Abuja', '229936', 'Automobile &amp; Spare Parts'),
(2, '323474', 'Abuja', '193357', 'Electrical Appliances'),
(3, '985258', 'Abuja', '229936', 'Automobile &amp; Spare Parts'),
(4, '454373', 'Lagos', '229936', 'Automobile &amp; Spare Parts'),
(5, '454373', 'Lagos', '193357', 'Electrical Appliances'),
(6, '131294', 'Lagos', '193357', 'Electrical Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `naija_states`
--

DROP TABLE IF EXISTS `naija_states`;
CREATE TABLE IF NOT EXISTS `naija_states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COMMENT='States in Nigeria.';

--
-- Dumping data for table `naija_states`
--

INSERT INTO `naija_states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `generatedlink` text NOT NULL,
  `happen_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `userid`, `title`, `body`, `generatedlink`, `happen_at`) VALUES
(1, 'all', 'New Category Created!', 'A new category has been created by the Admin. Explore!', 'product_category.php?catid=229936', '2020-02-24 17:10:18'),
(2, 'all', 'New Category Created!', 'A new category has been created by the Admin. Explore!', 'product_category.php?catid=193357', '2020-02-24 17:10:55'),
(3, 'all', 'New Market Created!', 'A new market has been created by the Admin. Explore!', 'market_setting.php?marketid=323474', '2020-02-24 17:11:46'),
(4, 'all', 'New Market Created!', 'A new market has been created by the Admin. Explore!', 'market_setting.php?marketid=985258', '2020-02-24 17:12:21'),
(5, 'all', 'New Market Created!', 'A new market has been created by the Admin. Explore!', 'market_setting.php?marketid=454373', '2020-02-24 17:12:52'),
(6, 'all', 'New Market Created!', 'A new market has been created by the Admin. Explore!', 'market_setting.php?marketid=131294', '2020-02-24 17:13:47'),
(7, '849871', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-24 18:14:27', 'seller_details.php?sellerid=849871', '2020-02-24 17:14:27'),
(8, '610008', 'New Seller Registration', 'This Seller Just Registered - josimar', 'seller_details.php?sellerid=610008', '2020-02-24 17:16:40'),
(9, '610008', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-24 18:17:56', 'seller_details.php?sellerid=610008', '2020-02-24 17:17:56'),
(10, '610008', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-24 18:18:38', 'seller_details.php?sellerid=610008', '2020-02-24 17:18:38'),
(11, '610008', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-24 18:24:22', 'seller_details.php?sellerid=610008', '2020-02-24 17:24:22'),
(12, '967815', 'New Seller Registration', 'This Seller Just Registered - josimar', 'seller_details.php?sellerid=967815', '2020-02-24 17:32:54'),
(13, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-24 18:33:32', 'seller_details.php?sellerid=967815', '2020-02-24 17:33:32'),
(14, '967815', 'New Profile Picture Update', 'A user just update his/her profile picture!', 'user_details?userid=967815', '2020-02-24 17:35:04'),
(15, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Premium', 'seller_details.php?sellerid=967815', '2020-02-24 17:35:59'),
(16, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-24 18:36:16', 'seller_details.php?sellerid=967815', '2020-02-24 17:36:16'),
(17, '967815', 'New Business Information Created', 'A new business information has been created!', 'seller_details.php?sellerid=967815', '2020-02-24 17:38:36'),
(18, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-02-24 18:43:34', 'seller_details.php?sellerid=1111', '2020-02-24 17:43:34'),
(19, '967815', 'A Seller Create a Catalogue', 'A seller just created a Catalogue!', 'seller_details.php?sellerid=967815', '2020-02-24 17:56:21'),
(20, '967815', 'A Seller Create a Catalogue', 'A seller just created a Catalogue!', 'seller_details.php?sellerid=967815', '2020-02-24 17:56:36'),
(21, '967815', 'Seller Added Account Details', 'A seller just updated his/her account details', 'seller_details.php?userid=967815', '2020-02-24 17:57:10'),
(22, '967815', 'New Product Created!', 'A new product has been created by the !967815', 'product_details.php?productid=275995', '2020-02-24 18:00:47'),
(23, '967815', 'Product Approved', 'Your product has been approved!', 'product_details.php?productid=275995', '2020-02-24 18:02:34'),
(24, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-02-26 13:24:37', 'seller_details.php?sellerid=1111', '2020-02-26 12:24:37'),
(25, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-27 17:41:57', 'seller_details.php?sellerid=967815', '2020-02-27 16:41:57'),
(26, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Premium', 'seller_details.php?sellerid=967815', '2020-02-27 16:44:36'),
(27, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-27 17:45:34', 'seller_details.php?sellerid=967815', '2020-02-27 16:45:34'),
(28, '967815', 'New Profile Picture Update', 'A user just update his/her profile picture!', 'user_details?userid=967815', '2020-02-27 16:46:59'),
(29, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Premium', 'seller_details.php?sellerid=967815', '2020-02-27 16:48:37'),
(30, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-27 17:48:57', 'seller_details.php?sellerid=967815', '2020-02-27 16:48:57'),
(31, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-02-28 13:10:22', 'seller_details.php?sellerid=1111', '2020-02-28 12:10:22'),
(32, '', 'New Agent Created', 'A new agent has been created!', 'agent_details.php?sellerid=32961679', '2020-02-28 12:12:54'),
(33, '32961679', 'Agent Activated', 'Your account has been activated!', 'agent_details.php?agentid=32961679', '2020-02-28 12:18:18'),
(34, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-02-28 14:36:48', 'seller_details.php?sellerid=1111', '2020-02-28 13:36:48'),
(35, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-02-29 20:16:03', 'seller_details.php?sellerid=967815', '2020-02-29 19:16:03'),
(36, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-01 13:41:18', 'seller_details.php?sellerid=1111', '2020-03-01 12:41:18'),
(37, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-01 20:26:41', 'seller_details.php?sellerid=967815', '2020-03-01 19:26:41'),
(38, '967815', 'Seller Verification', 'A seller just submitted a ticket for verification!', 'seller_details.php?sellerid=967815', '2020-03-01 19:28:56'),
(39, '967815', 'Seller Verification', 'Your account has been verified!', 'seller_details.php?sellerid=967815', '2020-03-01 19:34:55'),
(40, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-02 19:21:13', 'seller_details.php?sellerid=967815', '2020-03-02 18:21:13'),
(41, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-02 19:24:49', 'seller_details.php?sellerid=1111', '2020-03-02 18:24:49'),
(42, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-02 19:26:58', 'seller_details.php?sellerid=967815', '2020-03-02 18:26:58'),
(43, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-02 19:29:13', 'seller_details.php?sellerid=1111', '2020-03-02 18:29:13'),
(44, '967815', 'Account Disapproved', 'Your account has been Disapproved!', 'seller_details.php?sellerid=967815', '2020-03-02 18:37:08'),
(45, '967815', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=967815', '2020-03-02 18:37:33'),
(46, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-02 19:49:15', 'seller_details.php?sellerid=1111', '2020-03-02 18:49:15'),
(47, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-02 20:10:21', 'seller_details.php?sellerid=1111', '2020-03-02 19:10:21'),
(48, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-02 20:10:35', 'seller_details.php?sellerid=967815', '2020-03-02 19:10:35'),
(49, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Basic', 'seller_details.php?sellerid=967815', '2020-03-02 19:10:57'),
(50, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-02 20:29:22', 'seller_details.php?sellerid=967815', '2020-03-02 19:29:22'),
(51, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Basic', 'seller_details.php?sellerid=967815', '2020-03-02 19:33:02'),
(52, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-02 20:34:30', 'seller_details.php?sellerid=967815', '2020-03-02 19:34:30'),
(53, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Basic', 'seller_details.php?sellerid=967815', '2020-03-02 19:34:44'),
(54, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-03 10:08:03', 'seller_details.php?sellerid=1111', '2020-03-03 09:08:03'),
(55, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-03 15:53:44', 'seller_details.php?sellerid=1111', '2020-03-03 14:53:44'),
(56, 'all', 'New Category Created!', 'A new category has been created by the Admin. Explore!', 'product_category.php?catid=544753', '2020-03-03 15:17:46'),
(57, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-03 18:18:27', 'seller_details.php?sellerid=967815', '2020-03-03 17:18:27'),
(58, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-04 13:07:58', 'seller_details.php?sellerid=967815', '2020-03-04 12:07:58'),
(59, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-04 15:27:08', 'seller_details.php?sellerid=1111', '2020-03-04 14:27:08'),
(60, '', 'New Agent Created', 'A new agent has been created!', 'agent_details.php?sellerid=49981658', '2020-03-06 13:41:54'),
(61, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-06 14:42:13', 'seller_details.php?sellerid=1111', '2020-03-06 13:42:13'),
(62, '49981658', 'Agent Activated', 'Your account has been activated!', 'agent_details.php?agentid=49981658', '2020-03-06 13:43:31'),
(63, '861411', 'New Seller Registration', 'This Seller Just Registered - vicky', 'seller_details.php?sellerid=861411', '2020-03-06 13:46:26'),
(64, '464123', 'New Seller Registration', 'This Seller Just Registered - vicky1', 'seller_details.php?sellerid=464123', '2020-03-06 13:51:22'),
(65, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-06 15:04:30', 'seller_details.php?sellerid=967815', '2020-03-06 14:04:30'),
(66, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-06 15:13:25', 'seller_details.php?sellerid=1111', '2020-03-06 14:13:25'),
(67, '464123', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=464123', '2020-03-06 14:14:55'),
(68, '464123', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=464123', '2020-03-06 14:14:57'),
(69, '464123', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=464123', '2020-03-06 14:14:58'),
(70, '464123', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=464123', '2020-03-06 14:14:58'),
(71, '861411', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=861411', '2020-03-06 14:15:00'),
(72, '861411', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=861411', '2020-03-06 14:15:00'),
(73, '861411', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=861411', '2020-03-06 14:15:01'),
(74, '861411', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=861411', '2020-03-06 14:15:01'),
(75, '861411', 'Account Approved', 'Your account has been activate!', 'seller_details.php?sellerid=861411', '2020-03-06 14:15:01'),
(76, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-06 15:18:15', 'seller_details.php?sellerid=1111', '2020-03-06 14:18:15'),
(77, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-06 15:29:02', 'seller_details.php?sellerid=967815', '2020-03-06 14:29:02'),
(78, '967815', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Premium', 'seller_details.php?sellerid=967815', '2020-03-06 14:33:06'),
(79, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-06 15:35:53', 'seller_details.php?sellerid=1111', '2020-03-06 14:35:53'),
(80, '224633', 'New Seller Registration', 'This Seller Just Registered - dafy', 'seller_details.php?sellerid=224633', '2020-03-06 14:47:59'),
(81, '820977', 'New Seller Registration', 'This Seller Just Registered - ddd', 'seller_details.php?sellerid=820977', '2020-03-06 14:50:33'),
(82, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-09 10:43:01', 'seller_details.php?sellerid=1111', '2020-03-09 09:43:01'),
(83, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-09 10:43:55', 'seller_details.php?sellerid=967815', '2020-03-09 09:43:55'),
(84, '967815', 'New Profile Picture Update', 'A user just update his/her profile picture!', 'user_details?userid=967815', '2020-03-09 09:44:40'),
(85, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-09 10:57:32', 'seller_details.php?sellerid=967815', '2020-03-09 09:57:32'),
(86, '', 'Subscription Created', 'A new subscription has been created!', '', '2020-03-09 11:54:02'),
(87, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-11 14:10:32', 'seller_details.php?sellerid=1111', '2020-03-11 13:10:32'),
(88, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-11 14:15:50', 'seller_details.php?sellerid=967815', '2020-03-11 13:15:50'),
(89, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-11 14:27:51', 'seller_details.php?sellerid=967815', '2020-03-11 13:27:51'),
(90, '422099', 'New Seller Registration', 'This Seller Just Registered - josie', 'seller_details.php?sellerid=422099', '2020-03-12 15:24:12'),
(91, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-12 16:31:50', 'seller_details.php?sellerid=1111', '2020-03-12 15:31:50'),
(92, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-24 14:11:45', 'seller_details.php?sellerid=967815', '2020-03-24 13:11:45'),
(93, '967815', 'New Product Created!', 'A new product has been created by the !967815', 'product_details.php?productid=886071', '2020-03-24 13:51:41'),
(94, '779727', 'New Seller Registration', 'This Seller Just Registered - josie', 'seller_details.php?sellerid=779727', '2020-03-24 13:59:47'),
(95, '133157', 'New Seller Registration', 'This Seller Just Registered - sandra', 'seller_details.php?sellerid=133157', '2020-03-24 15:28:10'),
(96, '133157', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 16:30:18', 'seller_details.php?sellerid=133157', '2020-03-24 15:30:18'),
(97, '133157', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 16:30:44', 'seller_details.php?sellerid=133157', '2020-03-24 15:30:44'),
(98, '744996', 'New Seller Registration', 'This Seller Just Registered - nelson', 'seller_details.php?sellerid=744996', '2020-03-24 15:50:24'),
(99, '432542', 'New Seller Registration', 'This Seller Just Registered - kasjf', 'seller_details.php?sellerid=432542', '2020-03-24 15:55:01'),
(100, '463641', 'New Seller Registration', 'This Seller Just Registered - slfja', 'seller_details.php?sellerid=463641', '2020-03-24 15:56:20'),
(101, '524153', 'New Seller Registration', 'This Seller Just Registered - afsja', 'seller_details.php?sellerid=524153', '2020-03-24 15:59:13'),
(102, '365207', 'New Seller Registration', 'This Seller Just Registered - sandra', 'seller_details.php?sellerid=365207', '2020-03-24 16:02:38'),
(103, '102694', 'New Seller Registration', 'This Seller Just Registered - vivian', 'seller_details.php?sellerid=102694', '2020-03-24 16:12:12'),
(104, '365342', 'New Seller Registration', 'This Seller Just Registered - klafkk', 'seller_details.php?sellerid=365342', '2020-03-24 16:20:53'),
(105, '466526', 'New Seller Registration', 'This Seller Just Registered - klafklajklf', 'seller_details.php?sellerid=466526', '2020-03-24 16:21:27'),
(106, '825974', 'New Seller Registration', 'This Seller Just Registered - sandra', 'seller_details.php?sellerid=825974', '2020-03-24 16:23:38'),
(107, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 17:24:39', 'seller_details.php?sellerid=825974', '2020-03-24 16:24:39'),
(108, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 17:25:09', 'seller_details.php?sellerid=825974', '2020-03-24 16:25:09'),
(109, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 17:29:43', 'seller_details.php?sellerid=825974', '2020-03-24 16:29:43'),
(110, '1111', 'admin just logged in!', 'A Seller Logged in at  - 2020-03-24 17:38:29', 'seller_details.php?sellerid=1111', '2020-03-24 16:38:29'),
(111, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 17:38:47', 'seller_details.php?sellerid=825974', '2020-03-24 16:38:47'),
(112, '825974', 'Seller Account Upgraded', 'A Seller just upgraded his/her account to: Premium', 'seller_details.php?sellerid=825974', '2020-03-24 16:55:57'),
(113, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 17:56:17', 'seller_details.php?sellerid=825974', '2020-03-24 16:56:17'),
(114, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-24 18:06:29', 'seller_details.php?sellerid=967815', '2020-03-24 17:06:29'),
(115, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-24 18:10:54', 'seller_details.php?sellerid=825974', '2020-03-24 17:10:54'),
(116, '825974', 'Seller Added Account Details', 'A seller just updated his/her account details', 'seller_details.php?userid=825974', '2020-03-25 19:28:04'),
(117, '825974', 'New International Business Information Created', 'A new business information has been created!', 'seller_details.php?sellerid=825974', '2020-03-25 20:54:48'),
(118, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-25 22:48:27', 'seller_details.php?sellerid=967815', '2020-03-25 21:48:27'),
(119, '955308', 'New Seller Registration', 'This Seller Just Registered - vivian', 'seller_details.php?sellerid=955308', '2020-03-26 07:34:19'),
(120, '837838', 'New Seller Registration', 'This Seller Just Registered - vivian', 'seller_details.php?sellerid=837838', '2020-03-26 07:36:55'),
(121, '815094', 'New Seller Registration', 'This Seller Just Registered - vivian', 'seller_details.php?sellerid=815094', '2020-03-26 08:24:44'),
(122, '345363', 'New Buyer Registration', 'This Seller Just Registered - vivian', 'seller_details.php?sellerid=345363', '2020-03-26 08:29:29'),
(123, '345363', 'vivian just logged in!', 'A Seller Logged in at  - 2020-03-26 09:30:35', 'seller_details.php?sellerid=345363', '2020-03-26 08:30:35'),
(124, '536361', 'New Buyer Registration', 'This Seller Just Registered - vivian', 'seller_details.php?sellerid=536361', '2020-03-26 09:22:18'),
(125, '536361', 'vivian just logged in!', 'A Seller Logged in at  - 2020-03-26 10:22:57', 'seller_details.php?sellerid=536361', '2020-03-26 09:22:57'),
(126, '536361', 'New Profile Picture Update', 'A user just update his/her profile picture!', 'user_details?userid=536361', '2020-03-26 09:50:29'),
(127, '536361', 'vivian just logged in!', 'A Seller Logged in at  - 2020-03-26 10:50:42', 'seller_details.php?sellerid=536361', '2020-03-26 09:50:42'),
(128, '536361', 'New Profile Picture Update', 'A user just update his/her profile picture!', 'user_details?userid=536361', '2020-03-26 10:08:41'),
(129, '536361', 'New Profile Picture Update', 'A user just update his/her profile picture!', 'user_details?userid=536361', '2020-03-26 10:09:24'),
(130, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-26 11:50:32', 'seller_details.php?sellerid=967815', '2020-03-26 10:50:32'),
(131, '967815', 'josimar just logged in!', 'A Seller Logged in at  - 2020-03-26 12:13:03', 'seller_details.php?sellerid=967815', '2020-03-26 11:13:03'),
(132, '825974', 'sandra just logged in!', 'A Seller Logged in at  - 2020-03-26 12:14:54', 'seller_details.php?sellerid=825974', '2020-03-26 11:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

DROP TABLE IF EXISTS `payment_history`;
CREATE TABLE IF NOT EXISTS `payment_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `transid` text NOT NULL,
  `userid` text NOT NULL,
  `task` text NOT NULL,
  `paymentto` text NOT NULL,
  `startDate` text NOT NULL,
  `endDate` text NOT NULL,
  `ugraded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `transid`, `userid`, `task`, `paymentto`, `startDate`, `endDate`, `ugraded_on`) VALUES
(4, '607883', '967815', 'Account Upgrade', 'Admin', '2020-03-02', '2020-04-01', '2020-03-02 19:33:02'),
(5, '451858', '967815', 'Account Upgrade', 'Admin', '2020-03-02', '2020-04-01', '2020-03-02 19:34:44'),
(6, '371931', '967815', 'Account Upgrade', 'Admin', '2020-03-06', '2020-04-05', '2020-03-06 14:33:06'),
(7, '354431', '825974', 'Account Upgrade', 'Admin', '2020-03-24', '2020-04-23', '2020-03-24 16:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` text NOT NULL,
  `userid` text NOT NULL,
  `product_title` text NOT NULL,
  `market` text NOT NULL,
  `countryorigin` text NOT NULL,
  `expiration` text NOT NULL,
  `performance` text NOT NULL,
  `size` text,
  `color` text,
  `product_category` text NOT NULL,
  `product_description` text NOT NULL,
  `pack0` text NOT NULL,
  `pack1` text NOT NULL,
  `pack2` text NOT NULL,
  `pack3` text NOT NULL,
  `pack4` text NOT NULL,
  `pack5` text NOT NULL,
  `pack6` text NOT NULL,
  `pack7` text NOT NULL,
  `pack8` text NOT NULL,
  `img0` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `img4` text NOT NULL,
  `img5` text NOT NULL,
  `img6` text NOT NULL,
  `status` text NOT NULL,
  `productavailability` text NOT NULL,
  `topCatSetting` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `productid`, `userid`, `product_title`, `market`, `countryorigin`, `expiration`, `performance`, `size`, `color`, `product_category`, `product_description`, `pack0`, `pack1`, `pack2`, `pack3`, `pack4`, `pack5`, `pack6`, `pack7`, `pack8`, `img0`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `status`, `productavailability`, `topCatSetting`, `created_at`) VALUES
(1, '275995', '967815', '41inch Television', '323474', '[\"Canada\",\"China\"]', '12', 'Excellent', '41inch', 'black, grey', 'Electrical Appliances', '&lt;p&gt;&lt;strong&gt;We are here just to provide more&lt;/strong&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;resources to all undergraduates, postgraduates and all tertiary students.We are here just to provide more resources to all undergraduates, postgraduates and all tertiary students.We are here just to provide more resources to all undergraduates, postgraduates and all tertiary students.We are here just to provide more resources to all undergraduates, postgraduates and all tertiary students.We are here just to provide more resources to all undergraduates, postgraduates and all tertiary students.We are here just to provide more resources to all undergraduates, postgraduates and all tertiary students.We are here just to provide more resources to all undergraduates, postgraduates and all tertiary students.&lt;/p&gt;', '3+100000+5', '5+210000+0', '6+350000+2', '0', '0', '0', '0', '0', '0', '275995-gbtstamp.png', '275995-879657bb.jpg', '', '', '', '', '', 'Active', 'In Stock', 1, '2020-02-24 18:00:47'),
(2, '886071', '967815', 'ajsfkj', '985258', '[\"Albania\"]', '3', 'High', '8', 'red', 'Automobile &amp; Spare Parts', '&lt;p&gt;Just checking&lt;/p&gt;', '1+3883838+8', '3+899898+8', '5+8989898989+8', '6+89898989+8', '0', '0', '0', '0', '0', '886071-120X60.jpg', '886071-171270200X200.jpg', '886071-42865300X100.jpg', '886071-470326300X250.jpg', '', '', '', 'Pending', 'In Stock', 0, '2020-03-24 13:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `profilepic`
--

DROP TABLE IF EXISTS `profilepic`;
CREATE TABLE IF NOT EXISTS `profilepic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` text NOT NULL,
  `file_name` text NOT NULL,
  `status` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilepic`
--

INSERT INTO `profilepic` (`id`, `userid`, `file_name`, `status`, `created_on`) VALUES
(6, '825264', '825264-390.jpg', '1', '2020-02-08 16:42:52'),
(5, '590768', '590768-anna.jpg', '1', '2020-02-07 16:31:43'),
(4, '849871', '849871-anna.jpg', '1', '2020-02-06 12:19:57'),
(7, '644448', '644448-anna.jpg', '1', '2020-02-11 17:44:30'),
(8, '967815', '967815-IMG_20191125_181418_691.jpg', '1', '2020-02-24 17:35:04'),
(9, '536361', '536361-390.jpg', '1', '2020-03-26 09:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(10) NOT NULL,
  `store_name` text NOT NULL,
  `store_description` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `title` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phone` text NOT NULL,
  `state` text NOT NULL,
  `market` text NOT NULL,
  `address` text NOT NULL,
  `status` text NOT NULL,
  `confCode` text NOT NULL,
  `role` text NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sn`, `storeid`, `store_name`, `store_description`, `email`, `password`, `title`, `fname`, `lname`, `phone`, `state`, `market`, `address`, `status`, `confCode`, `role`, `date_reg`) VALUES
(3, 688669, 'Josimar Stores', 'Sales of Phones, Computers and Gadgets', 'renownjosimar@gmail.com', '663bdd99acd39fbcc56c7b329eac1a482b3268c663d6acb49847a18f6745932a', 'Mr', 'josimar', 'akpomudia', '08070814814', '1', 'Ojoo Market', 'shop 445, ojoo market', '1', '483203', 'Seller', '2020-01-03 23:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email`) VALUES
(1, 'fklasdjf@gmail.com'),
(2, 'dzle@gmail.com'),
(3, 'hey@gmail.com'),
(4, 'me@gmail.com'),
(5, 'faaa@gmail.com'),
(6, 'ju@gmail.com'),
(7, 'ty@gmail.com'),
(8, 'd@gmail.com'),
(9, 'fklasdjf@gmail.com'),
(10, 'fklasdjf@gmail.com'),
(11, 'angella@gmail.com'),
(15, 'jjj@gmail.com'),
(14, ''),
(16, ''),
(17, 'renownjosimar2@gmail.com'),
(18, 'renownjosimar2@gmail.com'),
(19, 'lkajfs@gmail.com'),
(20, 'lkajfs@gmail.com'),
(21, 'info@ojarh.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `phone` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `address` text NOT NULL,
  `currency` text NOT NULL,
  `status` text NOT NULL,
  `role` text NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogin` text,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `userid`, `username`, `email`, `password`, `fname`, `lname`, `phone`, `country`, `state`, `address`, `currency`, `status`, `role`, `date_reg`, `lastlogin`) VALUES
(1, 967815, 'josimar', 'renownjosimar@gmail.com', '$2y$12$ojGaG.4oK71qHDQO2zID7efcLJBjvGhqTzAMS1z6UyV7wvM7Ur32K', 'josimar', 'akpomudia', '08070838484', 'Nigeria', 'Abuja', 'Apo resettlement', '#', '1', 'Seller', '2020-02-24 17:32:54', '2020-03-26 12:13:03'),
(2, 1111, 'admin', 'admin@ojarh.com', '$2y$12$ojGaG.4oK71qHDQO2zID7efcLJBjvGhqTzAMS1z6UyV7wvM7Ur32K', 'Ojarh', 'Admin', '+1934839', 'Nigeria', 'Abuja', 'Utako', '#', '1', 'Admin', '2020-02-24 17:43:06', '2020-03-24 17:38:29'),
(18, 825974, 'sandra', 'sandra@gmail.com', '$2y$12$aC7nhYvWX7GHnPVzq5Vd.e4AWJHM.iYWY1Tid6WN9EGfgoVdlnsNq', 'sandra', 'akpomudia', '399383838', 'Jamaica', 'kd', 'lkajf', '$', '1', 'International', '2020-03-24 16:23:38', '2020-03-26 12:14:54'),
(23, 536361, 'vivian', 'vivian@gmail.com', '$2y$12$tOu6kefqJ3yA3qAxXbvKTOr1yMgZRYpyB2E2k./HQszz8pE43SLei', 'vivian', 'onome', '08038438482', 'United Arab Emirates', 'Dubai', 'abudabi', '$', '1', 'Buyer', '2020-03-26 09:22:18', '2020-03-26 10:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

DROP TABLE IF EXISTS `user_category`;
CREATE TABLE IF NOT EXISTS `user_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` text NOT NULL,
  `userid` text NOT NULL,
  `catname_u` text NOT NULL,
  `catdescription_u` text NOT NULL,
  `t_product` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `catid`, `userid`, `catname_u`, `catdescription_u`, `t_product`, `created_at`) VALUES
(1, '850413', '967815', 'Automobile and Spare Parts', 'spare parts sales', 0, '2020-02-24 17:56:21'),
(2, '375413', '967815', 'Electrical Appliances', 'Electrical sales', 0, '2020-02-24 17:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
CREATE TABLE IF NOT EXISTS `verification` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `verifyid` text NOT NULL,
  `userid` text NOT NULL,
  `documenttype` text NOT NULL,
  `verifyfile` text NOT NULL,
  `verifystatus` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `verifyid`, `userid`, `documenttype`, `verifyfile`, `verifystatus`, `created_at`) VALUES
(1, '944204', '967815', 'International Passport', '944204-header uba 2.jpg', 'Activate', '2020-03-01 19:28:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
