-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 10:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `znz`
--

-- --------------------------------------------------------

--
-- Table structure for table `bleaching_process_info`
--

CREATE TABLE `bleaching_process_info` (
  `bleaching_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `absorbency_left` float NOT NULL,
  `absorbency_center` float NOT NULL,
  `absorbency_right` float NOT NULL,
  `size_left` float NOT NULL,
  `size_center` float NOT NULL,
  `size_right` float NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `pilling` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calendering_process_info`
--

CREATE TABLE `calendering_process_info` (
  `calendering_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `machine` varchar(255) NOT NULL,
  `face_back` varchar(255) NOT NULL,
  `cf_rubbing_dry` float NOT NULL,
  `cf_rubbing_wet` float NOT NULL,
  `wash_dry_warp_before_iron` float NOT NULL,
  `wash_dry_weft_before_iron` float NOT NULL,
  `wash_dry_warp_after_iron` float NOT NULL,
  `wash_dry_weft_after_iron` float NOT NULL,
  `dry_cleaning_warp` float NOT NULL,
  `dry_cleaning_weft` float NOT NULL,
  `yarn_count_warp` float NOT NULL,
  `yarn_count_weft` float NOT NULL,
  `number_thread_warp` float NOT NULL,
  `number_thread_weft` float NOT NULL,
  `mass_per_unit_per_area` float NOT NULL,
  `surface_pilling` float NOT NULL,
  `tensile_warp` float NOT NULL,
  `tensile_weft` float NOT NULL,
  `tear_force_warp` float NOT NULL,
  `tear_force_weft` float NOT NULL,
  `seam_strength_warp` float NOT NULL,
  `seam_strength_weft` float NOT NULL,
  `seam_resistance_method1_warp_value` float NOT NULL,
  `seam_resistance_method1_warp_remarks` varchar(20) NOT NULL,
  `seam_resistance_method1_weft_value` float NOT NULL,
  `seam_resistance_method1_weft_remarks` varchar(20) NOT NULL,
  `seam_resistance_method2_warp_value` float NOT NULL,
  `seam_resistance_method2_warp_remarks` varchar(20) NOT NULL,
  `seam_resistance_method2_weft_value` float NOT NULL,
  `seam_resistance_method2_weft_remarks` varchar(20) NOT NULL,
  `hand_feel` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'red 2'),
(2, 'white'),
(3, 'black'),
(4, 'blue'),
(5, 'orange'),
(6, 'light green'),
(7, 'yellow'),
(8, 'green'),
(9, 'pink'),
(10, 'dark blue'),
(11, 'white ash'),
(12, 'fade'),
(13, 'Green Ash'),
(14, 'Beige'),
(15, 'Red'),
(16, 'Light Beige'),
(17, 'Navy');

-- --------------------------------------------------------

--
-- Table structure for table `construction_for_version`
--

CREATE TABLE `construction_for_version` (
  `construction_id` int(11) NOT NULL,
  `warp_yarn_count` int(11) NOT NULL,
  `weft_yarn_count` int(11) NOT NULL,
  `no_of_ply_for_warp_yarn` int(11) NOT NULL,
  `no_of_ply_for_weft_yarn` int(11) NOT NULL,
  `uom_of_warp_yarn` varchar(50) NOT NULL,
  `uom_of_weft_yarn` varchar(50) NOT NULL,
  `no_of_threads_per_inch_in_warp` int(11) NOT NULL,
  `no_of_threads_per_inch_in_weft` int(11) NOT NULL,
  `warp_insertion` int(11) NOT NULL,
  `weft_insertion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `construction_for_version`
--

INSERT INTO `construction_for_version` (`construction_id`, `warp_yarn_count`, `weft_yarn_count`, `no_of_ply_for_warp_yarn`, `no_of_ply_for_weft_yarn`, `uom_of_warp_yarn`, `uom_of_weft_yarn`, `no_of_threads_per_inch_in_warp`, `no_of_threads_per_inch_in_weft`, `warp_insertion`, `weft_insertion`) VALUES
(11, 30, 30, 2, 2, 'Ne', 'Ne', 76, 68, 1, 2),
(12, 20, 40, 1, 1, 'Nm', 'Ne', 60, 60, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `curing_process_info`
--

CREATE TABLE `curing_process_info` (
  `curing_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `total_quantity` varchar(20) NOT NULL,
  `machine` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `temp` varchar(20) NOT NULL,
  `rubbing_dry` float NOT NULL,
  `rubbing_wet` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(250) DEFAULT NULL,
  `country_of_origin` varchar(50) DEFAULT NULL,
  `key_account_manager_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `country_of_origin`, `key_account_manager_id`) VALUES
(34, 'IKEA', '', '', '8'),
(35, 'Walmart', 'London', 'UNITED KINGDOM', '8'),
(38, 'Carrefour', 'France', 'FRANCE', '10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_selection`
--

CREATE TABLE `customer_selection` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `test_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_selection`
--

INSERT INTO `customer_selection` (`customer_id`, `customer_name`, `test_method_id`) VALUES
(33, 'Check', 1),
(44, 'Walmart', 1),
(45, 'IKEA', 1),
(46, 'IKEA', 2),
(47, 'IKEA', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department_info`
--

CREATE TABLE `department_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `department_name` varchar(30) DEFAULT NULL,
  `section_name` varchar(30) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `recording_person_id` varchar(30) DEFAULT NULL,
  `recording_person_name` varchar(30) DEFAULT NULL,
  `recording_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_info`
--

INSERT INTO `department_info` (`id`, `location`, `department_name`, `section_name`, `contact_person_name`, `contact_no`, `email`, `recording_person_id`, `recording_person_name`, `recording_time`) VALUES
(1, '', 'ICT', 'ICT', '', '', '', '', '', '2014-10-28 21:41:59'),
(2, '', 'Store', 'Store', '', '', '', '', '', '2014-12-10 15:06:17'),
(3, '', 'HR & Admin', 'Admin', '', '', '', '', '', '2014-12-10 16:06:17'),
(4, '', 'Import', 'Import', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '', 'Export', 'Export', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '', 'Management', 'Management', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '', 'Marketing', 'Marketing', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '', 'Accounts', 'Accounts', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '', 'Electrical', 'Electrical', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '', 'Audit', 'Audit', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '', 'Purchase', 'Purchase', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '', 'Commercial', 'Commercial', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '', 'Sales', 'Sales', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designation_info`
--

CREATE TABLE `designation_info` (
  `id` int(11) UNSIGNED NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `short_form` varchar(100) DEFAULT NULL,
  `recording_person_id` varchar(30) DEFAULT NULL,
  `recording_person_name` varchar(50) DEFAULT NULL,
  `recording_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation_info`
--

INSERT INTO `designation_info` (`id`, `designation`, `short_form`, `recording_person_id`, `recording_person_name`, `recording_time`) VALUES
(1, 'Officer', 'Officer', NULL, NULL, NULL),
(3, 'Junior Officer', 'Jr. Officer', NULL, NULL, NULL),
(4, 'Senior Officer', 'Sr. Officer', NULL, NULL, NULL),
(22, 'Programmer', 'Programmer', NULL, NULL, NULL),
(23, 'Junior Programmer', 'Jr. Programmer', NULL, NULL, NULL),
(5, 'Executive', 'Executive', NULL, NULL, NULL),
(7, 'Junior Executive', 'Jr. Executive', NULL, NULL, NULL),
(8, 'Senior Executive', 'Sr. Executive', NULL, NULL, NULL),
(9, 'General Manager', 'GM', NULL, NULL, NULL),
(24, 'Assistant Programmer', 'Asst. Programmer', NULL, NULL, NULL),
(25, 'Senior Programmer', 'Sr. Programmer', NULL, NULL, NULL),
(10, 'Assistant General Manager', 'AGM', NULL, NULL, NULL),
(11, 'Deputy General Manager', 'DGM', NULL, NULL, NULL),
(12, 'Manager', 'Manager', NULL, NULL, NULL),
(19, 'Junior Application Developer', 'Jr. App. Developer', NULL, NULL, NULL),
(13, 'Assistant Manager', 'Asst. Manager', NULL, NULL, NULL),
(14, 'Deputy Manager', 'Dept. Manager', NULL, NULL, NULL),
(15, 'Senior Manager', 'Sr. Manager', NULL, NULL, NULL),
(2, 'Assistant Officer', 'Asst. Officer', NULL, NULL, NULL),
(20, 'Assistant Application Developer', 'Asst. App. Developer', NULL, NULL, NULL),
(16, 'Head of Department', 'Head of Dept.', NULL, NULL, NULL),
(17, 'Application Implementer', 'App. Implementer', '', '', '0000-00-00 00:00:00'),
(18, 'Application Developer', 'App. Developer', NULL, NULL, NULL),
(21, 'Senior Application Developer', 'Sr. App. Developer', NULL, NULL, NULL),
(6, 'Assistant Executive', 'Asst. Executive', NULL, NULL, NULL),
(27, 'Junior Engineer', 'Jr. Engineer', NULL, NULL, NULL),
(26, 'Engineer', 'Engineer', NULL, NULL, NULL),
(28, 'Assistant Engineer', 'Asst. Engineer', NULL, NULL, NULL),
(29, 'Senior Engineer', 'Sr. Engineer', NULL, NULL, NULL),
(30, 'System & Network Engineer', 'System & Network Engineer', NULL, NULL, NULL),
(31, 'Junior System & Network Engineer', 'Jr. System Network Engineer', NULL, NULL, NULL),
(32, 'Assistant System & Network Engineer', 'Asst. System & Network Engineer', NULL, NULL, NULL),
(33, 'Senior System & Network Engineer', 'Sr. System & Network Engineer', NULL, NULL, NULL),
(34, 'Functional Co-ordinator', 'Functional Co-ordinator', NULL, NULL, NULL),
(35, 'Senior Functional Co-ordinator', 'Sr. Functional Co-ordinator', NULL, NULL, NULL),
(36, 'Data Co-ordinator', 'Data Co-ordinator', NULL, NULL, NULL),
(37, 'Senior Data Co-ordinator', 'Sr. Data Co-ordinator', NULL, NULL, NULL),
(38, 'NOC Engineer', 'NOC Engineer', NULL, NULL, NULL),
(39, 'Chief Information Officer', 'CIO', NULL, NULL, NULL),
(40, 'Chief Technical Officer', 'CTO', NULL, NULL, NULL),
(41, 'Database Administrator', 'DBA', NULL, NULL, NULL),
(42, 'System Administrator', 'System Admin', NULL, NULL, NULL),
(43, 'System Analyst', 'System Analyst', NULL, NULL, NULL),
(44, 'Team Leader', 'Team Leader', NULL, NULL, NULL),
(45, 'Project Manager', 'PM', NULL, NULL, NULL),
(46, 'Junior NOC Engineer', 'Jr. NOC Engineer', NULL, NULL, NULL),
(47, 'Electrical Engineer', 'ELec. Engr.', NULL, NULL, NULL),
(48, 'Assistant Manufacturing Engineer', 'Asst. Manufacturing Engr.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division_info`
--

CREATE TABLE `division_info` (
  `id` int(11) NOT NULL,
  `division_name` varchar(50) DEFAULT NULL,
  `division_full_name` varchar(100) DEFAULT NULL,
  `division_address` varchar(250) DEFAULT NULL,
  `division_location` varchar(100) DEFAULT NULL,
  `recording_person_id` varchar(30) DEFAULT NULL,
  `recording_person_name` varchar(50) DEFAULT NULL,
  `recording_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division_info`
--

INSERT INTO `division_info` (`id`, `division_name`, `division_full_name`, `division_address`, `division_location`, `recording_person_id`, `recording_person_name`, `recording_time`) VALUES
(1, 'MHO', 'Motijheel Head Office', 'Motijeel, Dhaka', 'Head Office', NULL, NULL, NULL),
(2, 'GHO', 'Gulshan Head Office', 'Gulshan, Dhaka', 'Head Office', NULL, NULL, NULL),
(3, 'YSML', 'Yesmin Spinning Mills Ltd', '', 'Factory', NULL, NULL, NULL),
(4, 'ZSML', 'Zaber Spinning Mills Ltd', '', 'Factory', NULL, NULL, NULL),
(5, 'NSML', 'Noman Spinning Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(6, 'TSML', 'Talha Spinning Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(7, 'ISML', 'Ismail Spinning Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(10, 'SCML', 'Sufia Cotton Mills Ltd.', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(11, 'SCMLW', 'Sufia Cotton Mills Ltd. (Weaving)', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(12, 'NDML', 'Nice Denim Mills Ltd.', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(13, 'NDMLW', 'Nice Denim Mills Ltd (Washing)', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(14, 'NWML', 'Noman Weaving Mills Ltd(Shed-1)', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(15, 'NWML2', 'Noman Weaving Mills Ltd.(Shed-2)', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(16, 'NDSD', 'Nice Denim Solid Dyeing', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(17, 'NTTML', 'Noman Terry Towel Mills Ltd', 'Mirzapur, Gazipur', 'Factory', NULL, NULL, NULL),
(18, 'TFL', 'Talha Fabrics Ltd', '', 'Factory', NULL, NULL, NULL),
(8, 'ZZFL', 'Zaber & Zubair Fabrics Ltd', 'Pagar, Tongi', 'Factory', NULL, NULL, NULL),
(20, 'SSTML', 'Saad Saan Textile Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(21, 'TTPL', 'Talha Texpro Ltd.', '', 'Factory', NULL, NULL, NULL),
(9, 'NHTML', 'Noman Home Textile Mills Ltd.', 'Sreepur, Gazipur', 'Factory', NULL, NULL, NULL),
(23, 'NCTL', 'Noman Composite Textile Ltd', '', 'Factory', NULL, NULL, NULL),
(24, 'ZTML', 'Zarba Textile Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(25, 'ZTML-R', 'Zarba Textile Mills Ltd.(Rotor)', '', 'Factory', NULL, NULL, NULL),
(26, 'ITML', 'Ismail Textile Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(27, 'NTML', 'Noman Textile Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(28, 'IAAFL', 'Ismail Anzuman Ara Fabrics Ltd.', '', 'Factory', NULL, NULL, NULL),
(29, 'NFFL', 'Noman Fashion Fabrics Ltd', '', 'Factory', NULL, NULL, NULL),
(30, 'NFL1', 'Noman Fabrics Ltd-1', '', 'Factory', NULL, NULL, NULL),
(31, 'NFL2', 'Noman Fabrics Ltd-2', '', 'Factory', NULL, NULL, NULL),
(32, 'SFL1', 'Sufia Fabrics Ltd-1', '', 'Factory', NULL, NULL, NULL),
(33, 'SFL2', 'Sufia Fabrics Ltd-2', '', 'Factory', NULL, NULL, NULL),
(34, 'SFL3', 'Sufia Fabrics Ltd-3', '', 'Factory', NULL, NULL, NULL),
(35, 'AFL1', 'Artex Fabrics Ltd-1', '', 'Factory', NULL, NULL, NULL),
(36, 'AFL2', 'Artex Fabrics Ltd-2', '', 'Factory', NULL, NULL, NULL),
(37, 'MTML', 'Marium Textile Mills Ltd', '', 'Factory', NULL, NULL, NULL),
(22, 'ZuSML', 'Zubair Spinning Mills Ltd.', '', 'Factory', NULL, NULL, NULL),
(19, 'SSAL', 'Saad Saan Apparels Ltd.', '', 'Factory', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equalize_process_info`
--

CREATE TABLE `equalize_process_info` (
  `equalize_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `bowing_and_skew` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finishing_process_info`
--

CREATE TABLE `finishing_process_info` (
  `finishing_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `cf_rubbing_dry` float NOT NULL,
  `cf_rubbing_wet` float NOT NULL,
  `wash_dry_warp_before_iron` float NOT NULL,
  `wash_dry_weft_before_iron` float NOT NULL,
  `wash_dry_warp_after_iron` float NOT NULL,
  `wash_dry_weft_after_iron` float NOT NULL,
  `dry_cleaning_warp` float NOT NULL,
  `dry_cleaning_weft` float NOT NULL,
  `yarn_count_warp` float NOT NULL,
  `yarn_count_weft` float NOT NULL,
  `number_thread_warp` float NOT NULL,
  `number_thread_weft` float NOT NULL,
  `mass_per_unit_per_area` float NOT NULL,
  `surface_pilling` float NOT NULL,
  `tensile_warp` float NOT NULL,
  `tensile_weft` float NOT NULL,
  `tear_force_warp` float NOT NULL,
  `tear_force_weft` float NOT NULL,
  `seam_strength_warp` float NOT NULL,
  `seam_strength_weft` float NOT NULL,
  `abrasion_resistance` float NOT NULL,
  `abrasion_resistance_lose` float NOT NULL,
  `washing_ph` float NOT NULL,
  `formaldehyde_content` float NOT NULL,
  `cf_dry_cleaning_c_change` float NOT NULL,
  `cf_dry_cleaning_staining` float NOT NULL,
  `cf_washing_c_change` float NOT NULL,
  `cf_washing_staining` float NOT NULL,
  `cf_perspiration_acis_c_change` float NOT NULL,
  `cf_perspiration_acis_staining` float NOT NULL,
  `cf_perspiration_alkali_c_change` float NOT NULL,
  `cf_perspiration_alkali_staining` float NOT NULL,
  `cf_water_c_change` float NOT NULL,
  `cf_water_staining` float NOT NULL,
  `cf_water_sotting_staining` float NOT NULL,
  `cf_water_wetting_staining` float NOT NULL,
  `cf_hyd_reactive_dyes_c_change` float NOT NULL,
  `cf_hyd_reactive_dyes_staining` float NOT NULL,
  `cf_oidative_damage_c_change` float NOT NULL,
  `cf_phenolic_staining` float NOT NULL,
  `cf_pvc_migration_staining` float NOT NULL,
  `cf_saliva_c_change` float NOT NULL,
  `cf_saliva_staining` float NOT NULL,
  `cf_chlorinated_water_c_change` float NOT NULL,
  `cf_chlorinated_water_staining` float NOT NULL,
  `cf_cholorine_bleach_c_change` float NOT NULL,
  `cf_cholorine_bleach_staining` float NOT NULL,
  `cf_peroxide_bleach_c_change` float NOT NULL,
  `cross_staining` float NOT NULL,
  `water_absorption` float NOT NULL,
  `spirality` float NOT NULL,
  `durable_press` float NOT NULL,
  `ironability` float NOT NULL,
  `cf_artificial_light` float NOT NULL,
  `moisture_content` float NOT NULL,
  `evaporation_rate` float NOT NULL,
  `fiber_total_polyester` float NOT NULL,
  `fiber_total_cotton` float NOT NULL,
  `fiber_total_thired` float NOT NULL,
  `fiber_total_fourth` float NOT NULL,
  `fiber_warp_polyester` float NOT NULL,
  `fiber_warp_cotton` float NOT NULL,
  `fiber_warp_thired` float NOT NULL,
  `fiber_warp_fourth` float NOT NULL,
  `fiber_weft_polyester` float NOT NULL,
  `fiber_weft_cotton` float NOT NULL,
  `fiber_weft_thired` float NOT NULL,
  `fiber_weft_fourth` float NOT NULL,
  `abrasion_resistance_thread_break` varchar(50) NOT NULL,
  `print_durability` varchar(20) NOT NULL,
  `revolution` varchar(20) NOT NULL,
  `seam_resistance_method1_warp_value` float NOT NULL,
  `seam_resistance_method1_warp_remarks` varchar(20) NOT NULL,
  `seam_resistance_method1_weft_value` float NOT NULL,
  `seam_resistance_method1_weft_remarks` varchar(20) NOT NULL,
  `seam_resistance_method2_warp_value` float NOT NULL,
  `seam_resistance_method2_warp_remarks` varchar(20) NOT NULL,
  `seam_resistance_method2_weft_value` float NOT NULL,
  `seam_resistance_method2_weft_remarks` varchar(20) NOT NULL,
  `width_and_length_of_fabric` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `greige_receiving_process_info`
--

CREATE TABLE `greige_receiving_process_info` (
  `id` int(11) NOT NULL,
  `greige_issunce_id` int(11) NOT NULL,
  `pp_no_id` int(11) NOT NULL,
  `pp_details_id` int(11) NOT NULL,
  `custom_date` varchar(30) NOT NULL,
  `received_quantity` double NOT NULL,
  `yarn_warp` double NOT NULL,
  `yarn_weft` double NOT NULL,
  `thread_epi` double NOT NULL,
  `thread_ppi` double NOT NULL,
  `gsm` double NOT NULL,
  `fiber_total_polyester` float NOT NULL,
  `fiber_total_cotton` float NOT NULL,
  `fiber_total_thired` float NOT NULL,
  `fiber_total_fourth` float NOT NULL,
  `fiber_warp_polyester` float NOT NULL,
  `fiber_warp_cotton` float NOT NULL,
  `fiber_warp_thired` float NOT NULL,
  `fiber_warp_fourth` float NOT NULL,
  `fiber_weft_polyester` float NOT NULL,
  `fiber_weft_cotton` float NOT NULL,
  `fiber_weft_thired` float NOT NULL,
  `fiber_weft_fourth` float NOT NULL,
  `width` double NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `active` int(11) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `greige_receiving_process_info`
--

INSERT INTO `greige_receiving_process_info` (`id`, `greige_issunce_id`, `pp_no_id`, `pp_details_id`, `custom_date`, `received_quantity`, `yarn_warp`, `yarn_weft`, `thread_epi`, `thread_ppi`, `gsm`, `fiber_total_polyester`, `fiber_total_cotton`, `fiber_total_thired`, `fiber_total_fourth`, `fiber_warp_polyester`, `fiber_warp_cotton`, `fiber_warp_thired`, `fiber_warp_fourth`, `fiber_weft_polyester`, `fiber_weft_cotton`, `fiber_weft_thired`, `fiber_weft_fourth`, `width`, `status`, `remarks`, `active`, `recording_person_id`, `recording_person_name`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(86, 1, 105, 502, '07.10.2020', 4000, 33, 33, 33, 33, 33, 80, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 500, 1, 'ok', 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(87, 1, 105, 502, '07.10.2020', 4000, 33, 33, 33, 33, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 550, 1, 'ok', 1, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `key_account_manager`
--

CREATE TABLE `key_account_manager` (
  `key_account_manager_id` int(11) NOT NULL,
  `key_account_manager_name` varchar(200) NOT NULL,
  `department` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `key_account_manager`
--

INSERT INTO `key_account_manager` (`key_account_manager_id`, `key_account_manager_name`, `department`, `designation`, `phone_number`) VALUES
(8, 'Rafiq Islam', 1, 10, '9938949888'),
(10, 'Abdullaah Al Razy', 7, 9, '01922120072');

-- --------------------------------------------------------

--
-- Table structure for table `machine_name`
--

CREATE TABLE `machine_name` (
  `machine_id` int(11) NOT NULL,
  `machine_name` varchar(50) NOT NULL,
  `process_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine_name`
--

INSERT INTO `machine_name` (`machine_id`, `machine_name`, `process_id`) VALUES
(3, 'Oasis', 10),
(4, 'Three Roller Rubber', 2),
(6, 'Three Roller4', 2),
(7, 'Three Roller4', 2),
(8, 'Three Roller', 7),
(9, 'Three Roller', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mercerize_process_info`
--

CREATE TABLE `mercerize_process_info` (
  `mercerize_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `absorbency_left` float NOT NULL,
  `absorbency_center` float NOT NULL,
  `absorbency_right` float NOT NULL,
  `size_left` float NOT NULL,
  `size_center` float NOT NULL,
  `size_right` float NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mowgli_trainer`
--

CREATE TABLE `mowgli_trainer` (
  `trainer_id` int(11) NOT NULL,
  `trainer_name` varchar(300) NOT NULL,
  `trainer_contact` varchar(300) NOT NULL,
  `trainer_email` varchar(300) NOT NULL,
  `trainer_designation` varchar(300) NOT NULL,
  `trainer_description` varchar(3000) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `specializing_skill` varchar(300) NOT NULL,
  `batch_enrollment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_courses`
--

CREATE TABLE `m_courses` (
  `m_courses_id` int(11) NOT NULL,
  `course_subject` varchar(300) NOT NULL,
  `about_courses` longtext NOT NULL,
  `courses_price` varchar(200) NOT NULL,
  `courses_image` varchar(20000) NOT NULL,
  `course_duration` varchar(300) NOT NULL,
  `courses_effort` varchar(300) NOT NULL,
  `course_language` varchar(100) NOT NULL,
  `certificate` varchar(200) NOT NULL,
  `total_class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_courses`
--

INSERT INTO `m_courses` (`m_courses_id`, `course_subject`, `about_courses`, `courses_price`, `courses_image`, `course_duration`, `courses_effort`, `course_language`, `certificate`, `total_class`) VALUES
(1, 'Graphics', 'The earliest graphics known to anthropologists studying prehistoric periods are cave paintings and markings on boulders, bone, ivory, and antlers, which were created during the Upper Palaeolithic period from 40,000–10,000 B.C. or earlier. Many of these were found to record astronomical, seasonal, and chronological details. Some of the earliest graphics and drawings are known to the modern world, from almost 6,000 years ago, are that of engraved stone tablets and ceramic cylinder seals, marking the beginning of the historical periods and the keeping of records for accounting and inventory purposes. Records from Egypt predate these and papyrus was used by the Egyptians as a material on which to plan the building of pyramids; they also used slabs of limestone and wood. From 600–250 BC, the Greeks played a major role in geometry. They used graphics to represent their mathematical theories such as the Circle Theorem and the Pythagorean theorem.\r\n\r\nIn art, \"graphics\" is often used to distinguish work in a monotone and made up of lines, as opposed to painting.', '2000Taka', 'No .jpg', '1 Month', 'Four days in a week', 'Bangla', 'No', '23'),
(2, 'Digital Marketing', 'Digital marketing is any form of marketing products or services that involves electronic devices. That\'s the reason it has been around for decades (because electronics have) and why it doesn\'t necessarily have anything to do with content marketing, Google ads, social media or retargeting.', '20000Taka', 'No .jpg', '1 Month', 'Three days in a week', 'Bangla', 'Yes', '7');

-- --------------------------------------------------------

--
-- Table structure for table `printing_process_info`
--

CREATE TABLE `printing_process_info` (
  `printing_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `total_quantity` varchar(20) NOT NULL,
  `rubbing_dry` float NOT NULL,
  `rubbing_wet` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process_name`
--

CREATE TABLE `process_name` (
  `process_id` int(11) NOT NULL,
  `process_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_name`
--

INSERT INTO `process_name` (`process_id`, `process_name`) VALUES
(1, 'Singe & Desize'),
(2, 'Bleaching'),
(3, 'Mercerize'),
(4, 'Ready For Mercerize'),
(5, 'Equalize'),
(6, 'Printing'),
(7, 'Curing'),
(8, 'Dyeing'),
(9, 'Washing'),
(10, 'Finishing'),
(11, 'Calender'),
(12, 'Sanforize'),
(13, 'Raising'),
(15, 'Scouring & Bleaching'),
(16, 'Scouring'),
(17, 'Ready For Print'),
(18, 'Ready For Dyeing'),
(19, 'Ready For Raising'),
(21, 'Steaming');

-- --------------------------------------------------------

--
-- Table structure for table `process_name_define`
--

CREATE TABLE `process_name_define` (
  `id` int(11) NOT NULL,
  `route_issue_main_id` int(11) NOT NULL,
  `pp_no_id` int(11) NOT NULL,
  `pp_details_id` int(11) NOT NULL,
  `route` int(11) NOT NULL,
  `process` varchar(30) NOT NULL,
  `process_number` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_name_define`
--

INSERT INTO `process_name_define` (`id`, `route_issue_main_id`, `pp_no_id`, `pp_details_id`, `route`, `process`, `process_number`, `active`, `complete`, `recording_person_id`, `recording_person_name`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(76, 76, 101, 1, 7, 'process', 4, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(75, 75, 101, 1, 2, 'process', 3, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(74, 1, 101, 1, 5, 'process', 2, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(77, 77, 108, 510, 2, 'process', 2, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(78, 78, 108, 510, 11, 'process', 3, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(79, 79, 108, 510, 7, 'process', 4, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(80, 80, 108, 510, 8, 'process', 5, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(81, 81, 108, 510, 5, 'process', 6, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(82, 82, 108, 510, 10, 'process', 7, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(83, 83, 108, 510, 3, 'process', 8, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(84, 84, 108, 510, 6, 'process', 9, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(85, 85, 108, 510, 13, 'process', 10, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(86, 86, 108, 510, 18, 'process', 11, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(87, 87, 108, 510, 4, 'process', 12, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(88, 88, 108, 510, 17, 'process', 13, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(89, 89, 108, 510, 19, 'process', 14, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(90, 90, 108, 510, 12, 'process', 15, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(91, 91, 108, 510, 16, 'process', 16, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(92, 92, 108, 510, 15, 'process', 17, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(93, 93, 108, 510, 1, 'process', 18, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(94, 94, 108, 510, 20, 'process', 19, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(95, 95, 108, 510, 9, 'process', 20, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-30', 'hriday', '2020-10-30'),
(96, 96, 105, 502, 2, 'process', 2, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(97, 97, 105, 502, 11, 'process', 3, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(98, 98, 105, 502, 7, 'process', 4, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(99, 99, 105, 502, 5, 'process', 5, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(100, 100, 105, 502, 10, 'process', 6, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(101, 101, 105, 502, 3, 'process', 7, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(102, 102, 105, 502, 6, 'process', 8, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(103, 103, 105, 502, 13, 'process', 9, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(104, 104, 105, 502, 18, 'process', 10, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(105, 105, 105, 502, 4, 'process', 11, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(106, 106, 105, 502, 17, 'process', 12, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(107, 107, 105, 502, 19, 'process', 13, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(108, 108, 105, 502, 12, 'process', 14, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(109, 109, 105, 502, 16, 'process', 15, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(110, 110, 105, 502, 15, 'process', 16, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(111, 111, 105, 502, 1, 'process', 17, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(112, 112, 105, 502, 21, 'process', 18, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(113, 113, 105, 502, 9, 'process', 19, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(114, 114, 103, 500, 11, 'process', 2, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(115, 115, 103, 500, 2, 'process', 3, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(116, 116, 103, 500, 4, 'process', 4, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(117, 117, 103, 500, 17, 'process', 5, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(118, 118, 103, 500, 19, 'process', 6, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(119, 119, 103, 500, 12, 'process', 7, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(120, 120, 103, 500, 16, 'process', 8, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(121, 121, 103, 500, 1, 'process', 9, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(122, 122, 103, 500, 13, 'process', 10, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(123, 123, 103, 500, 6, 'process', 11, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `process_name_define_after_greige_receiving`
--

CREATE TABLE `process_name_define_after_greige_receiving` (
  `id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `greige_issunce_id` int(11) NOT NULL,
  `route` int(11) NOT NULL,
  `original` int(11) NOT NULL,
  `process` varchar(30) NOT NULL,
  `process_number` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_name_define_after_greige_receiving`
--

INSERT INTO `process_name_define_after_greige_receiving` (`id`, `route_issue_id`, `greige_issunce_id`, `route`, `original`, `process`, `process_number`, `active`, `complete`, `recording_person_id`, `recording_person_name`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(1862, 1, 1, 2, 0, 'process', 2, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1863, 1863, 1, 11, 0, 'process', 3, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1864, 1864, 1, 7, 0, 'process', 4, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1865, 1865, 1, 5, 0, 'process', 5, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1866, 1866, 1, 10, 0, 'process', 6, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1867, 1867, 1, 3, 0, 'process', 7, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1868, 1868, 1, 6, 0, 'process', 8, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1869, 1869, 1, 13, 0, 'process', 9, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1870, 1870, 1, 18, 0, 'process', 10, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1871, 1871, 1, 4, 0, 'process', 11, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1872, 1872, 1, 17, 0, 'process', 12, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1873, 1873, 1, 19, 0, 'process', 13, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1874, 1874, 1, 12, 0, 'process', 14, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1875, 1875, 1, 16, 0, 'process', 15, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1876, 1876, 1, 15, 0, 'process', 16, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1877, 1877, 1, 1, 0, 'process', 17, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1878, 1878, 1, 21, 0, 'process', 18, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(1879, 1879, 1, 9, 0, 'process', 19, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `process_program_info`
--

CREATE TABLE `process_program_info` (
  `pp_id` int(11) NOT NULL,
  `pp_no` varchar(40) NOT NULL,
  `pp_desc` varchar(200) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `customers` int(11) NOT NULL,
  `greige_demand` varchar(50) NOT NULL,
  `construction` varchar(50) NOT NULL,
  `construction_standard` varchar(50) NOT NULL,
  `fiber_cotton` int(11) NOT NULL,
  `fiber_polyster` int(11) NOT NULL,
  `fiber_others_name` varchar(50) NOT NULL,
  `fiber_others_value` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `design` varchar(50) NOT NULL,
  `process` int(11) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_program_info`
--

INSERT INTO `process_program_info` (`pp_id`, `pp_no`, `pp_desc`, `issue_date`, `customers`, `greige_demand`, `construction`, `construction_standard`, `fiber_cotton`, `fiber_polyster`, `fiber_others_name`, `fiber_others_value`, `week`, `design`, `process`, `recording_person_id`, `recording_person_name`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(101, '5555', 'This needs to be printed', '15.10.2020', 34, '1799', '', '', 0, 0, '', 0, 0, 'Len PWC', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(102, '2332323', 'Test', '29.10.2020', 34, '233', '', '', 0, 0, '', 0, 20, 'Yes', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(103, '223423442222', 'TEXT', '28.10.2020', 34, '233', '', '', 0, 0, '', 0, 20, 'Pillow', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(104, '22342344222222222', 'TEXT', '28.10.2020', 34, '233', '', '', 0, 0, '', 0, 20, 'Pillow', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(105, '23323232', 'TESTING', '30.10.2020', 34, '3', '', '', 0, 0, '', 0, 2, 'Pillow', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(106, '3423423', 'asdadasdas', '19.10.2020', 34, '3', '', '', 0, 0, '', 0, 20, 'Pillow', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(107, '22342344222200', 'hahaha', '27.10.2020', 34, '233', '', '', 0, 0, '', 0, 20, 'Pillow', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(108, '366363', 'METHOD TESTING', '28.10.2020', 34, '233', '', '', 0, 0, '', 0, 20, 'Pillow', 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(109, '56567', 'This is Test PP Description 5', '20.10.2020', 35, '1799', '', '', 0, 0, '', 0, 20, 'Len PWC Update', 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `process_technique_or_program_type`
--

CREATE TABLE `process_technique_or_program_type` (
  `process_id` int(11) NOT NULL,
  `process_technique_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `process_technique_or_program_type`
--

INSERT INTO `process_technique_or_program_type` (`process_id`, `process_technique_name`) VALUES
(1, 'Y/D'),
(2, 'Y/D (Wash)'),
(8, 'Reactive'),
(9, 'White FInish'),
(10, 'Pigment Print'),
(11, 'Reactive Dyed'),
(12, 'Pigment Dyed'),
(14, 'Reactive Printtt');

-- --------------------------------------------------------

--
-- Table structure for table `raising_process_info`
--

CREATE TABLE `raising_process_info` (
  `raising_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `trf_no` float NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` int(11) NOT NULL,
  `machine` varchar(11) NOT NULL,
  `face_back` varchar(11) NOT NULL,
  `tensile_warp` float NOT NULL,
  `tensile_weft` float NOT NULL,
  `tear_force_warp` float NOT NULL,
  `tear_force_weft` int(11) NOT NULL,
  `hand_feel` int(11) NOT NULL,
  `raising_quality` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ready_for_dye_process_info`
--

CREATE TABLE `ready_for_dye_process_info` (
  `ready_for_dye_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `bowing_and_skew` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ready_for_print_process_info`
--

CREATE TABLE `ready_for_print_process_info` (
  `ready_for_print_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `bowing_and_skew` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ready_for_raising_process_info`
--

CREATE TABLE `ready_for_raising_process_info` (
  `ready_for_raising_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `trf_no` float NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` int(11) NOT NULL,
  `machine` varchar(11) NOT NULL,
  `face_back` varchar(11) NOT NULL,
  `tensile_warp` float NOT NULL,
  `tensile_weft` float NOT NULL,
  `tear_force_warp` float NOT NULL,
  `tear_force_weft` int(11) NOT NULL,
  `hand_feel` int(11) NOT NULL,
  `ready_for_raising_quality` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ready_mercerize_process_info`
--

CREATE TABLE `ready_mercerize_process_info` (
  `ready_mercerize_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `bowing_and_skew` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sanforizing_process_info`
--

CREATE TABLE `sanforizing_process_info` (
  `sanforizing_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `machine` varchar(255) NOT NULL,
  `face_back` varchar(255) NOT NULL,
  `cf_rubbing_dry` float NOT NULL,
  `cf_rubbing_wet` float NOT NULL,
  `wash_dry_warp_before_iron` float NOT NULL,
  `wash_dry_weft_before_iron` float NOT NULL,
  `wash_dry_warp_after_iron` float NOT NULL,
  `wash_dry_weft_after_iron` float NOT NULL,
  `dry_cleaning_warp` float NOT NULL,
  `dry_cleaning_weft` float NOT NULL,
  `yarn_count_warp` float NOT NULL,
  `yarn_count_weft` float NOT NULL,
  `number_thread_warp` float NOT NULL,
  `number_thread_weft` float NOT NULL,
  `mass_per_unit_per_area` float NOT NULL,
  `surface_pilling` float NOT NULL,
  `tensile_warp` float NOT NULL,
  `tensile_weft` float NOT NULL,
  `tear_force_warp` float NOT NULL,
  `tear_force_weft` float NOT NULL,
  `seam_strength_warp` float NOT NULL,
  `seam_strength_weft` float NOT NULL,
  `seam_resistance_method1_warp_value` float NOT NULL,
  `seam_resistance_method1_warp_remarks` varchar(20) NOT NULL,
  `seam_resistance_method1_weft_value` float NOT NULL,
  `seam_resistance_method1_weft_remarks` varchar(20) NOT NULL,
  `seam_resistance_method2_warp_value` float NOT NULL,
  `seam_resistance_method2_warp_remarks` varchar(20) NOT NULL,
  `seam_resistance_method2_weft_value` float NOT NULL,
  `seam_resistance_method2_weft_remarks` varchar(20) NOT NULL,
  `hand_feel` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scouring_bleaching_process_info`
--

CREATE TABLE `scouring_bleaching_process_info` (
  `scouring_bleaching_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `absorbency_left` float NOT NULL,
  `absorbency_center` float NOT NULL,
  `absorbency_right` float NOT NULL,
  `size_left` float NOT NULL,
  `size_center` float NOT NULL,
  `size_right` float NOT NULL,
  `whiteness_left` float NOT NULL,
  `whiteness_center` float NOT NULL,
  `whiteness_right` float NOT NULL,
  `pilling` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scouring_process_info`
--

CREATE TABLE `scouring_process_info` (
  `scouring_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `absorbency_left` float NOT NULL,
  `absorbency_center` float NOT NULL,
  `absorbency_right` float NOT NULL,
  `size_left` float NOT NULL,
  `size_center` float NOT NULL,
  `size_right` float NOT NULL,
  `pilling` float NOT NULL,
  `ph_left` float NOT NULL,
  `ph_center` float NOT NULL,
  `ph_right` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `singeing_desizing_process_info`
--

CREATE TABLE `singeing_desizing_process_info` (
  `singe_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `batcher` varchar(20) NOT NULL,
  `p_width` double NOT NULL,
  `p_qty` double NOT NULL,
  `m_c_name` varchar(30) NOT NULL,
  `flame` double NOT NULL,
  `speed` double NOT NULL,
  `temp` double NOT NULL,
  `ph` double NOT NULL,
  `visual_assessment` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `active` int(11) NOT NULL,
  `recording_person_id` varchar(30) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(30) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `steaming_process_info`
--

CREATE TABLE `steaming_process_info` (
  `steaming_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `recording_person_id` varchar(20) NOT NULL,
  `recording_person_name` varchar(20) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(20) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_method_name`
--

CREATE TABLE `test_method_name` (
  `test_name` varchar(255) NOT NULL,
  `test_method_name` varchar(255) NOT NULL,
  `criteria_or_testing_lab` varchar(255) NOT NULL,
  `test_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_method_name`
--

INSERT INTO `test_method_name` (`test_name`, `test_method_name`, `criteria_or_testing_lab`, `test_method_id`) VALUES
('CF of Rubbing', 'ISO-1044', 'Washing_Lab', 1),
('CF of Rubbing', 'ISO 105 X12', 'Physical_Lab', 2),
('Color Fastness to rubbing', 'ISO-1456', 'Chemical_Lab', 3);

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`test_id`, `test_name`) VALUES
(41, 'CF of Rubbing'),
(42, 'Color Fastness to rubbing'),
(43, 'Dimensional Change to Washing & Drying'),
(44, 'Yarn Count'),
(45, 'Number of threads per unit length'),
(46, 'Mass per  unit per area'),
(47, 'Resistance to surface fuzzing & pilling'),
(48, 'Tensile properties of Fabric'),
(49, 'Tear force Using Ballistic Pendulam Method (Elmendorf)'),
(50, 'Tear force of Trouser shaped test specimen (Single Tear)'),
(51, 'Resistance to slipage on Seam'),
(52, 'Seam Tensile Properties of Fabrics'),
(53, 'Abrasion resistance of Fabric on Martindale Method'),
(54, 'Mass Loss in Abrasion test'),
(55, 'pH Value of Aquous Extract'),
(56, 'Determination of Formaldehyde'),
(57, 'Color Fastness to Dry cleaning'),
(58, 'Color Fastness to Washing'),
(59, 'Color Fastness to Perspiration'),
(60, 'Color Fastness to water'),
(61, 'Color Fastness to Water Spotting'),
(62, 'Resistance to surface wetting'),
(63, 'Color Fastness to Hydrolysis of Reactive Dyes'),
(64, 'Color Fastness to Oidative Bleach Damage'),
(66, 'Migration of color into PVC'),
(67, 'Color Fastness to Saliva'),
(68, 'Color Fastness to Chlorinated Water'),
(69, 'Color Fastness to Cholorine Bleach'),
(70, 'Color Fastness to Peroxide Bleach'),
(71, 'Cross Staining'),
(72, 'Color Fastness to Artificial Light'),
(73, 'Water absorption'),
(74, 'Print Durability'),
(75, 'Determination of spirality after laundering'),
(76, 'Appearance After Laudering'),
(77, 'Durable Press/ Smoothness Appearance'),
(78, 'IRONABILITY OF WOVEN FABRIC'),
(79, 'Fiber composition'),
(80, 'Moisture Content'),
(81, 'Evaporation Ratee');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_management`
--

CREATE TABLE `user_access_management` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `users` int(10) DEFAULT NULL,
  `create_user` int(10) DEFAULT NULL,
  `user_list` int(10) DEFAULT NULL,
  `files` int(10) DEFAULT NULL,
  `file_create` int(10) DEFAULT NULL,
  `file_list` int(10) DEFAULT NULL,
  `lc_and_pi` int(10) DEFAULT NULL,
  `lc_and_pi_doc` int(10) DEFAULT NULL,
  `lc_and_pi_acceptance_doc` int(10) DEFAULT NULL,
  `b2b` int(10) DEFAULT NULL,
  `b2b_lc_and_pi_weave_doc` int(10) DEFAULT NULL,
  `b2b_lc_and_pi_spin_doc` int(10) DEFAULT NULL,
  `b2b_doc_weave_doc` int(10) DEFAULT NULL,
  `b2b_doc_spin_doc` int(10) DEFAULT NULL,
  `btma_and_cash` int(10) DEFAULT NULL,
  `btma_weave_doc` int(10) DEFAULT NULL,
  `btma_spin_doc` int(10) DEFAULT NULL,
  `cash_weave_doc` int(10) DEFAULT NULL,
  `banking` int(10) DEFAULT NULL,
  `banking_bank_acceptance_doc` int(10) DEFAULT NULL,
  `prc` int(10) DEFAULT NULL,
  `prc_duration_doc` int(10) DEFAULT NULL,
  `others` int(10) DEFAULT NULL,
  `backup_doc` int(10) DEFAULT NULL,
  `settings` int(10) DEFAULT NULL,
  `recording_person_id` varchar(30) NOT NULL,
  `recording_time` datetime NOT NULL,
  `modifying_person_id` varchar(30) NOT NULL,
  `modification_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_management`
--

INSERT INTO `user_access_management` (`id`, `user_id`, `users`, `create_user`, `user_list`, `files`, `file_create`, `file_list`, `lc_and_pi`, `lc_and_pi_doc`, `lc_and_pi_acceptance_doc`, `b2b`, `b2b_lc_and_pi_weave_doc`, `b2b_lc_and_pi_spin_doc`, `b2b_doc_weave_doc`, `b2b_doc_spin_doc`, `btma_and_cash`, `btma_weave_doc`, `btma_spin_doc`, `cash_weave_doc`, `banking`, `banking_bank_acceptance_doc`, `prc`, `prc_duration_doc`, `others`, `backup_doc`, `settings`, `recording_person_id`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(1, 'shoeb', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '2018-11-25 12:32:03', '', '2019-07-14 16:59:57'),
(2, 'osman', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '2018-11-25 12:32:03', '', '2019-07-14 17:00:28'),
(6, 'hriday', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '2018-11-25 12:32:03', '', '2018-11-25 12:50:49'),
(5, 'anil', 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '', '2018-11-25 12:32:03', '', '2018-11-25 12:50:49'),
(3, 'tanjina', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '2018-11-25 12:32:03', '', '2018-11-26 16:55:04'),
(56, 'qc', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'shoeb', '2020-01-18 16:09:29', 'shoeb', '2020-01-18 16:09:29'),
(57, 'test', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 'shoeb', '2020-01-31 22:43:59', 'shoeb', '2020-01-31 22:43:59'),
(58, 'echo', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'hriday', '2020-12-30 12:44:54', 'hriday', '2020-12-30 12:44:54'),
(59, 'echo', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'echo', '2020-12-30 18:35:05', 'echo', '2020-12-30 18:35:05'),
(60, 'dtest', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 'echo', '2020-12-31 09:16:13', 'echo', '2020-12-31 09:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `department` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image_src` varchar(100) NOT NULL,
  `recording_person_id` varchar(30) NOT NULL,
  `recording_time` datetime NOT NULL,
  `modifying_person_id` varchar(30) NOT NULL,
  `modification_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `first_name`, `last_name`, `middle_name`, `password`, `email`, `contact_no`, `department`, `designation`, `user_type`, `status`, `image_src`, `recording_person_id`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(1, 'echo', 'Nawsish', 'Ahmed', '', 'echo', 'nawsish.cwb@gmail.com', '01729754786', 1, '5', 'Super Admin', 'Active', 'naw.jpg', '', '2020-12-30 18:36:30', 'echo', '2020-12-30 18:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `user_signup_id` int(11) NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `father_name` varchar(300) NOT NULL,
  `mother_name` varchar(300) NOT NULL,
  `subject_area` varchar(255) NOT NULL,
  `running_days` varchar(200) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nid_birth` varchar(200) NOT NULL,
  `present_address` varchar(1000) NOT NULL,
  `permanent_address` varchar(1000) NOT NULL,
  `user_image_p` varchar(1200) NOT NULL,
  `user_signature` varchar(1000) NOT NULL,
  `nid/birth_image` varchar(1000) NOT NULL,
  `registration_number` int(250) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `short_name`) VALUES
(1, 'Super Admin', 'super_admin'),
(2, 'Admin', 'admin'),
(3, 'Senior Officer LC & PI', 'senior_officer_lc_pi'),
(4, 'Senior Officer B2B', 'senior_officer_b2b'),
(5, 'Assistant Manager ', 'assistant_manager'),
(6, 'Assistant Manager Banking', 'assistant_manager_banking'),
(7, 'Officer', 'officer'),
(8, 'Assistant Officer BTMA', 'assistant_officer_btma'),
(9, 'Assistant Officer B2B', 'assistant_officer_b2b'),
(10, 'Manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `version_name`
--

CREATE TABLE `version_name` (
  `version_id` int(11) NOT NULL,
  `version_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `version_name`
--

INSERT INTO `version_name` (`version_id`, `version_name`) VALUES
(8, 'Pilow'),
(7, 'Dyed'),
(9, 'Flatbed');

-- --------------------------------------------------------

--
-- Table structure for table `version_wise_process_program_info`
--

CREATE TABLE `version_wise_process_program_info` (
  `id` int(11) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `pp_no_id` int(11) NOT NULL,
  `version` varchar(50) NOT NULL,
  `color` int(11) NOT NULL,
  `construction` varchar(50) NOT NULL,
  `construction_standard` varchar(50) NOT NULL,
  `fiber_cotton` int(11) NOT NULL,
  `fiber_polyster` int(11) NOT NULL,
  `fiber_others_name` varchar(50) NOT NULL,
  `fiber_others_value` int(11) NOT NULL,
  `gray_width` double NOT NULL,
  `finish_width` double NOT NULL,
  `process_line` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `process_route_status` int(11) NOT NULL,
  `greige_receive_status` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `complete` int(11) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `version_wise_process_program_info`
--

INSERT INTO `version_wise_process_program_info` (`id`, `pp_id`, `pp_no_id`, `version`, `color`, `construction`, `construction_standard`, `fiber_cotton`, `fiber_polyster`, `fiber_others_name`, `fiber_others_value`, `gray_width`, `finish_width`, `process_line`, `quantity`, `process_route_status`, `greige_receive_status`, `active`, `complete`, `recording_person_id`, `recording_person_name`, `recording_time`, `modifying_person_id`, `modification_time`) VALUES
(499, 1, 101, '8', 3, '11', 'spi', 100, 0, '', 0, 88, 86, 11, 12000, 1, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(500, 500, 103, '8', 10, '12', '', 0, 0, '', 0, 60, 60, 13, 10000, 1, 0, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(501, 501, 104, '8', 10, '12', '', 0, 0, '', 0, 60, 60, 13, 10000, 0, 0, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(502, 502, 105, '7', 10, '12', '', 0, 0, '', 0, 60, 60, 0, 10000, 1, 1, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(503, 1, 101, '8', 3, '11', '', 100, 0, '', 0, 88, 86, 11, 12000, 0, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(504, 1, 101, '8', 3, '11', '', 100, 0, '', 0, 88, 86, 11, 12000, 0, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(505, 1, 101, '8', 3, '11', '', 100, 0, '', 0, 88, 86, 11, 12000, 0, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(506, 506, 106, '7', 10, '11', '', 0, 0, '', 0, 60, 60, 11, 1000000, 0, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(507, 506, 106, '7', 10, '11', '', 0, 0, '', 0, 60, 60, 11, 1000000, 0, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(508, 508, 106, '7', 10, '11', '', 80, 20, '', 0, 50, 45, 9, 5555, 0, 0, 0, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-31'),
(509, 509, 107, '7', 10, '12', '', 0, 0, '', 0, 60, 60, 9, 100000, 0, 0, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-29'),
(510, 510, 108, '8', 4, '12', '', 0, 0, '', 0, 60, 60, 10, 100000, 1, 0, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-29', 'hriday', '2020-10-30'),
(511, 508, 106, '7', 10, '11', 'spi', 80, 20, '', 0, 50, 45, 9, 10000, 0, 0, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31'),
(512, 1, 101, '8', 3, '12', 'spi', 100, 0, '', 0, 88, 86, 11, 12000, 0, 0, 1, 0, 'hriday', 'Hriday Ahmed', '2020-10-31', 'hriday', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `washing_process_info`
--

CREATE TABLE `washing_process_info` (
  `washing_id` int(11) NOT NULL,
  `route_issue_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `b_batcher` varchar(20) NOT NULL,
  `a_batcher` varchar(20) NOT NULL,
  `p_width` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `s_or_e` varchar(20) NOT NULL,
  `machine` varchar(20) NOT NULL,
  `machine_temp` varchar(20) NOT NULL,
  `cf_rubbing_dry` float NOT NULL,
  `cf_rubbing_wet` float NOT NULL,
  `washing_ph` float NOT NULL,
  `cf_dry_cleaning_c_change` float NOT NULL,
  `cf_dry_cleaning_staining` float NOT NULL,
  `cf_washing_c_change` float NOT NULL,
  `cf_washing_staining` float NOT NULL,
  `cf_perspiration_acis_c_change` float NOT NULL,
  `cf_perspiration_acis_staining` float NOT NULL,
  `cf_perspiration_alkali_c_change` float NOT NULL,
  `cf_perspiration_alkali_staining` float NOT NULL,
  `cf_water_c_change` float NOT NULL,
  `cf_water_staining` float NOT NULL,
  `cf_water_sotting_staining` float NOT NULL,
  `cf_water_wetting_staining` float NOT NULL,
  `cf_hyd_reactive_dyes_c_change` float NOT NULL,
  `cf_hyd_reactive_dyes_staining` float NOT NULL,
  `cf_oidative_damage_c_change` float NOT NULL,
  `cf_phenolic_staining` float NOT NULL,
  `cf_pvc_migration_staining` float NOT NULL,
  `cf_saliva_c_change` float NOT NULL,
  `cf_saliva_staining` float NOT NULL,
  `cf_chlorinated_water_c_change` float NOT NULL,
  `cf_chlorinated_water_staining` float NOT NULL,
  `cf_cholorine_bleach_c_change` float NOT NULL,
  `cf_cholorine_bleach_staining` float NOT NULL,
  `cf_peroxide_bleach_c_change` float NOT NULL,
  `cross_staining` float NOT NULL,
  `status` int(11) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `recording_person_id` varchar(50) NOT NULL,
  `recording_person_name` varchar(50) NOT NULL,
  `recording_time` date NOT NULL,
  `modifying_person_id` varchar(50) NOT NULL,
  `modification_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bleaching_process_info`
--
ALTER TABLE `bleaching_process_info`
  ADD PRIMARY KEY (`bleaching_id`);

--
-- Indexes for table `calendering_process_info`
--
ALTER TABLE `calendering_process_info`
  ADD PRIMARY KEY (`calendering_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `construction_for_version`
--
ALTER TABLE `construction_for_version`
  ADD PRIMARY KEY (`construction_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curing_process_info`
--
ALTER TABLE `curing_process_info`
  ADD PRIMARY KEY (`curing_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_selection`
--
ALTER TABLE `customer_selection`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `department_info`
--
ALTER TABLE `department_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_info`
--
ALTER TABLE `designation_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_info`
--
ALTER TABLE `division_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equalize_process_info`
--
ALTER TABLE `equalize_process_info`
  ADD PRIMARY KEY (`equalize_id`);

--
-- Indexes for table `finishing_process_info`
--
ALTER TABLE `finishing_process_info`
  ADD PRIMARY KEY (`finishing_id`);

--
-- Indexes for table `greige_receiving_process_info`
--
ALTER TABLE `greige_receiving_process_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_account_manager`
--
ALTER TABLE `key_account_manager`
  ADD PRIMARY KEY (`key_account_manager_id`);

--
-- Indexes for table `machine_name`
--
ALTER TABLE `machine_name`
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table `mercerize_process_info`
--
ALTER TABLE `mercerize_process_info`
  ADD PRIMARY KEY (`mercerize_id`);

--
-- Indexes for table `mowgli_trainer`
--
ALTER TABLE `mowgli_trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- Indexes for table `m_courses`
--
ALTER TABLE `m_courses`
  ADD PRIMARY KEY (`m_courses_id`);

--
-- Indexes for table `printing_process_info`
--
ALTER TABLE `printing_process_info`
  ADD PRIMARY KEY (`printing_id`);

--
-- Indexes for table `process_name`
--
ALTER TABLE `process_name`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `process_name_define`
--
ALTER TABLE `process_name_define`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_name_define_after_greige_receiving`
--
ALTER TABLE `process_name_define_after_greige_receiving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_program_info`
--
ALTER TABLE `process_program_info`
  ADD PRIMARY KEY (`pp_id`,`pp_no`);

--
-- Indexes for table `process_technique_or_program_type`
--
ALTER TABLE `process_technique_or_program_type`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `raising_process_info`
--
ALTER TABLE `raising_process_info`
  ADD PRIMARY KEY (`raising_id`);

--
-- Indexes for table `ready_for_dye_process_info`
--
ALTER TABLE `ready_for_dye_process_info`
  ADD PRIMARY KEY (`ready_for_dye_id`);

--
-- Indexes for table `ready_for_print_process_info`
--
ALTER TABLE `ready_for_print_process_info`
  ADD PRIMARY KEY (`ready_for_print_id`);

--
-- Indexes for table `ready_for_raising_process_info`
--
ALTER TABLE `ready_for_raising_process_info`
  ADD PRIMARY KEY (`ready_for_raising_id`);

--
-- Indexes for table `ready_mercerize_process_info`
--
ALTER TABLE `ready_mercerize_process_info`
  ADD PRIMARY KEY (`ready_mercerize_id`);

--
-- Indexes for table `sanforizing_process_info`
--
ALTER TABLE `sanforizing_process_info`
  ADD PRIMARY KEY (`sanforizing_id`);

--
-- Indexes for table `scouring_bleaching_process_info`
--
ALTER TABLE `scouring_bleaching_process_info`
  ADD PRIMARY KEY (`scouring_bleaching_id`);

--
-- Indexes for table `scouring_process_info`
--
ALTER TABLE `scouring_process_info`
  ADD PRIMARY KEY (`scouring_id`);

--
-- Indexes for table `singeing_desizing_process_info`
--
ALTER TABLE `singeing_desizing_process_info`
  ADD PRIMARY KEY (`singe_id`);

--
-- Indexes for table `steaming_process_info`
--
ALTER TABLE `steaming_process_info`
  ADD PRIMARY KEY (`steaming_id`);

--
-- Indexes for table `test_method_name`
--
ALTER TABLE `test_method_name`
  ADD PRIMARY KEY (`test_method_id`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user_access_management`
--
ALTER TABLE `user_access_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_signup_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `version_name`
--
ALTER TABLE `version_name`
  ADD PRIMARY KEY (`version_id`);

--
-- Indexes for table `version_wise_process_program_info`
--
ALTER TABLE `version_wise_process_program_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `washing_process_info`
--
ALTER TABLE `washing_process_info`
  ADD PRIMARY KEY (`washing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bleaching_process_info`
--
ALTER TABLE `bleaching_process_info`
  MODIFY `bleaching_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `calendering_process_info`
--
ALTER TABLE `calendering_process_info`
  MODIFY `calendering_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `construction_for_version`
--
ALTER TABLE `construction_for_version`
  MODIFY `construction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `curing_process_info`
--
ALTER TABLE `curing_process_info`
  MODIFY `curing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customer_selection`
--
ALTER TABLE `customer_selection`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `department_info`
--
ALTER TABLE `department_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `designation_info`
--
ALTER TABLE `designation_info`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `division_info`
--
ALTER TABLE `division_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `equalize_process_info`
--
ALTER TABLE `equalize_process_info`
  MODIFY `equalize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `finishing_process_info`
--
ALTER TABLE `finishing_process_info`
  MODIFY `finishing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `greige_receiving_process_info`
--
ALTER TABLE `greige_receiving_process_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `key_account_manager`
--
ALTER TABLE `key_account_manager`
  MODIFY `key_account_manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `machine_name`
--
ALTER TABLE `machine_name`
  MODIFY `machine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mercerize_process_info`
--
ALTER TABLE `mercerize_process_info`
  MODIFY `mercerize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mowgli_trainer`
--
ALTER TABLE `mowgli_trainer`
  MODIFY `trainer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_courses`
--
ALTER TABLE `m_courses`
  MODIFY `m_courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `printing_process_info`
--
ALTER TABLE `printing_process_info`
  MODIFY `printing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `process_name`
--
ALTER TABLE `process_name`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `process_name_define`
--
ALTER TABLE `process_name_define`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `process_name_define_after_greige_receiving`
--
ALTER TABLE `process_name_define_after_greige_receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1880;

--
-- AUTO_INCREMENT for table `process_program_info`
--
ALTER TABLE `process_program_info`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `process_technique_or_program_type`
--
ALTER TABLE `process_technique_or_program_type`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `raising_process_info`
--
ALTER TABLE `raising_process_info`
  MODIFY `raising_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ready_for_dye_process_info`
--
ALTER TABLE `ready_for_dye_process_info`
  MODIFY `ready_for_dye_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ready_for_print_process_info`
--
ALTER TABLE `ready_for_print_process_info`
  MODIFY `ready_for_print_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ready_for_raising_process_info`
--
ALTER TABLE `ready_for_raising_process_info`
  MODIFY `ready_for_raising_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ready_mercerize_process_info`
--
ALTER TABLE `ready_mercerize_process_info`
  MODIFY `ready_mercerize_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sanforizing_process_info`
--
ALTER TABLE `sanforizing_process_info`
  MODIFY `sanforizing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scouring_bleaching_process_info`
--
ALTER TABLE `scouring_bleaching_process_info`
  MODIFY `scouring_bleaching_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scouring_process_info`
--
ALTER TABLE `scouring_process_info`
  MODIFY `scouring_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `singeing_desizing_process_info`
--
ALTER TABLE `singeing_desizing_process_info`
  MODIFY `singe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `steaming_process_info`
--
ALTER TABLE `steaming_process_info`
  MODIFY `steaming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_method_name`
--
ALTER TABLE `test_method_name`
  MODIFY `test_method_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user_access_management`
--
ALTER TABLE `user_access_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `user_signup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `version_name`
--
ALTER TABLE `version_name`
  MODIFY `version_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `version_wise_process_program_info`
--
ALTER TABLE `version_wise_process_program_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `washing_process_info`
--
ALTER TABLE `washing_process_info`
  MODIFY `washing_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
