-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 05:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wmsugcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `addchoice`
--

CREATE TABLE `addchoice` (
  `chid` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addchoice`
--

INSERT INTO `addchoice` (`chid`, `choice_id`, `content`) VALUES
(780, 976, 'New Student'),
(781, 976, 'Old Student'),
(783, 985, 'Male'),
(784, 985, 'Female'),
(785, 986, 'Single'),
(786, 986, 'Widowed'),
(787, 986, 'Married'),
(789, 986, 'New Option'),
(790, 996, 'Father'),
(791, 996, 'Mother'),
(792, 996, 'Spouse'),
(793, 997, 'Parents Living together'),
(794, 997, 'Parents Separated'),
(795, 1007, 'Family Suggestion'),
(796, 1007, 'Friends choice'),
(797, 1007, 'Family Tradition'),
(798, 1007, 'Teachers choice'),
(799, 1007, 'Personal Choice'),
(800, 1007, 'Following vocation of someone i admire'),
(801, 1009, 'Personal Choice'),
(802, 1009, 'Friends Recommendation'),
(803, 1009, 'Parents Choice'),
(807, 1012, 'Very much'),
(808, 1012, 'Very little'),
(809, 1012, 'Much'),
(810, 1012, 'None'),
(811, 1012, 'Enough'),
(812, 1014, 'Family'),
(813, 1014, 'Government Aid'),
(814, 1014, 'Savings'),
(815, 1014, 'Scholarship'),
(816, 1014, 'Part-time Work'),
(817, 1015, 'I barely passed most of my subject'),
(818, 1015, 'I fear I am going to fail this semester'),
(819, 1015, 'I failed most of my subjects'),
(820, 1015, 'I am confident I can finish my course'),
(821, 1015, 'I am having a hard time passing my subjects'),
(822, 1015, 'I am still adjusting to my studies'),
(823, 1015, 'I have difficulty with some of my subjects'),
(824, 1016, 'Height'),
(825, 1016, 'Wearing Glasses'),
(826, 1016, 'Weight'),
(827, 1016, 'Complexion'),
(828, 1016, 'Mole'),
(830, 1017, 'Aerobic fitness'),
(831, 1017, 'Dancing/Gymnastic'),
(832, 1017, 'Weight lifting/Body building'),
(833, 1017, 'Games/Sports'),
(834, 1017, 'Stretching/Swimming'),
(835, 1018, 'Allergies'),
(836, 1018, 'Stomach Ache'),
(837, 1018, 'Asthma'),
(839, 1018, 'Migraine/Dizziness'),
(840, 1020, 'Home'),
(841, 1020, 'Boarding House'),
(842, 1020, 'Renting a Room'),
(843, 1020, 'Living with relatives'),
(844, 1025, 'friendly'),
(845, 1025, 'talented'),
(846, 1025, 'unhappy'),
(847, 1025, 'poor health'),
(848, 1025, 'cheerful'),
(849, 1025, 'anxious'),
(850, 1025, 'reserved'),
(851, 1025, 'quick-tempered'),
(852, 1025, 'pessimistic'),
(853, 1025, 'frequent daydreaming'),
(854, 1025, 'lazy'),
(855, 1025, 'depressed'),
(856, 1025, 'stubborn'),
(857, 1025, 'cynical'),
(858, 1025, 'shy'),
(859, 1025, 'sarcastic'),
(860, 1025, 'submissive'),
(861, 1025, 'nervous'),
(862, 1025, 'capable'),
(863, 1025, 'tactful'),
(864, 1025, 'self-confident'),
(865, 1025, 'lovable'),
(866, 1025, 'excited'),
(867, 1025, 'easily exhausted'),
(868, 1025, 'tolerant'),
(869, 1025, 'consiousness'),
(870, 1025, 'jealous'),
(871, 1025, 'aloof'),
(872, 1025, 'irritable'),
(873, 1025, 'quiet'),
(874, 1025, 'calm'),
(875, 1025, 'talkative'),
(877, 1028, 'Yes'),
(878, 1028, 'No'),
(881, 1032, 'Male'),
(882, 1032, 'Female'),
(883, 1035, 'Main'),
(884, 1035, 'External');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `admin_lname` varchar(60) NOT NULL,
  `admin_fname` varchar(60) NOT NULL,
  `admin_mname` varchar(60) NOT NULL,
  `admin_contactno` text NOT NULL,
  `admin_position` text NOT NULL,
  `admin_effectivedate` date DEFAULT NULL,
  `admin_executiondate` date DEFAULT NULL,
  `rpby` int(11) NOT NULL,
  `admin_dsplyname` varchar(100) NOT NULL,
  `admin_banner` text NOT NULL,
  `admin_sidebarbg` text NOT NULL,
  `admin_photo` text DEFAULT NULL,
  `esign` text NOT NULL,
  `admin_type` varchar(50) NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `vcode` varchar(50) DEFAULT NULL,
  `ft` int(11) NOT NULL,
  `edstat` int(11) NOT NULL,
  `new_gc` int(11) NOT NULL,
  `show_rec` int(11) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_lname`, `admin_fname`, `admin_mname`, `admin_contactno`, `admin_position`, `admin_effectivedate`, `admin_executiondate`, `rpby`, `admin_dsplyname`, `admin_banner`, `admin_sidebarbg`, `admin_photo`, `esign`, `admin_type`, `CollegeId`, `admin_email`, `admin_password`, `vcode`, `ft`, `edstat`, `new_gc`, `show_rec`, `test`) VALUES
(1, 'SuperAdmin', 'GCCDEV', 'Sample', '', '', NULL, NULL, 0, 'Developer || GCC', '', '', NULL, '', 'ADMIN', 0, 'gcc@developer', '26d6b14e675c149c321ed7d79e534ca8', NULL, 0, 0, 0, 0, 0),
(2, 'Admission', 'Account', '', '', '', '0000-00-00', NULL, 0, 'Admission || Office', '', '', NULL, 'admission.png', 'ADMISSION', 0, 'gcc@admission', '0920453b0f77fde8c8632d5454397162', NULL, 1, 0, 0, 0, 1),
(58, 'pass', 'firstadmin', '', '', 'Official', '0000-00-00', NULL, 0, 'GCC Office', 'Guidance Office', '#63a284', NULL, '', 'GCC', 0, 'gcc@admin.com', '9e46c639aa21deaa9a7cd0a7975ae658', NULL, 0, 0, 0, 0, 0),
(157, 'Baluntang', 'Grace', '', '', 'Guidance Counselor', '0000-00-00', NULL, 0, 'admin_Grace', 'GCC ADMIN', '#63a284', NULL, '', 'GCC', 0, 'baluntang.grace@wmsu.edu.ph', '92935f87de26f7b0cd34809b010a32e5', NULL, 0, 0, 0, 0, 0),
(158, 'Felix-Sadiwa', 'Lucy', '', '09917263902', '', '2021-06-01', NULL, 0, 'Lucy Felix', 'GC ADMIN', '#63a284', '235Photo_me1.jpg', '', 'GC', 23, 'felix.lucy@wmsu.edu.ph', 'bff03fe623587bcbc5b4eec3a541d42c', NULL, 0, 0, 1, 0, 0),
(159, 'Toto', 'Sitti Aisha', 'G', '09975681516', '', '2022-05-19', NULL, 0, 'admin_Toto', 'GC ADMIN', '#63a284', NULL, '', 'GC', 8, 'toto.sitti@wmsu.edu.ph', 'ce523a5e4d809de1d1aa893d086006bc', NULL, 1, 0, 1, 0, 0),
(160, 'Ticao', 'Nurmia', 'L', '09350994136', '', '2022-05-19', NULL, 0, 'admin_Ticao', 'GC ADMIN', '#63a284', NULL, '', 'GC', 10, 'kayachin11@gmail.com', '42926482b041c85dfe3a9cc4d5086ba9', NULL, 1, 0, 0, 0, 0),
(161, 'Arabani', 'Jiemar', 'A', '09365971522', '', '2022-05-19', NULL, 0, 'admin_Arabani', 'GC ADMIN', '#63a284', NULL, '', 'GC', 11, 'Jiem.arabani@gmail.com', '49a80e8c18914980288dcd9f29bcebe0', NULL, 1, 0, 0, 0, 0),
(162, 'Falcasantos', 'Catherine', 'D', '09276714409', '', '2022-05-19', NULL, 0, 'admin_Falcasantos', 'GC ADMIN', '#63a284', NULL, '', 'GC', 12, 'catherine.falcasantos@wmsu.edu.ph', '8e4533b616f281909c73e72d74b86f55', NULL, 1, 0, 1, 0, 0),
(163, 'Jalilula', 'Sitti Rasma', 'I', '09554680401', '', '2022-05-19', NULL, 0, 'admin_Jalilula', 'GC ADMIN', '#63a284', NULL, '', 'GC', 13, 'ibrahim.sitti@wmsu.edu.ph', '9719e097e6c1023488589fd4f1d53fb4', NULL, 1, 0, 0, 0, 0),
(164, 'Lim', 'Ruby', 'M', '09555182432', '', '2022-05-19', NULL, 0, 'admin_Lim', 'GC ADMIN', '#63a284', NULL, '', 'GC', 14, 'lim.ruby@wmsu.edu.ph', 'a483824623375c06fbe5811b5e75ff14', NULL, 1, 0, 0, 0, 0),
(165, 'Miranda', 'Clarissa', 'B', '09062261201', '', '2022-05-19', NULL, 0, 'admin_Miranda', 'GC ADMIN', '#63a284', NULL, '', 'GC', 16, 'clarissa.miranda@wmsu.edu.ph', 'd4cd9f16e54e0e4cea0caa9fb32cc29c', NULL, 1, 0, 0, 0, 0),
(166, 'Covarrubias', 'Sandra', 'M', '09362514687', '', '2022-05-19', NULL, 0, 'admin_Covarrubias', 'GC ADMIN', '#63a284', NULL, '', 'GC', 17, 'covarrubias.sandra@wmsu.edu.ph', '6f070efc68b9feb9cbfcdcdc997a7674', NULL, 1, 0, 0, 0, 0),
(167, 'Coros', 'Aurea', 'T', '09678294500', '', '2022-05-19', NULL, 0, 'admin_Coros', 'GC ADMIN', '#63a284', NULL, '', 'GC', 20, 'aurea.coros@wmsu.edu.ph', '81c550b4c6119ea8657cf19c5445257f', NULL, 1, 0, 0, 0, 0),
(168, 'Gutual', 'Lhea Grace', 'V', '09612978081', '', '2022-05-19', NULL, 0, 'admin_Gutual', 'GC ADMIN', '#63a284', NULL, '', 'GC', 21, 'gutual.lhea@wmsu.edu.ph', '2cd8f1aeb7ffd589dec0a16c4618b9d1', NULL, 1, 0, 0, 0, 0),
(169, 'Ucol', 'Arlene', 'B', '09178404662', '', '2022-05-19', NULL, 0, 'admin_Ucol', 'GC ADMIN', '#63a284', NULL, '', 'GC', 19, 'Arlene.ucol@wmsu.edu.ph', '7e2dae142b28bb9cf748638eecf09ed6', NULL, 1, 0, 0, 0, 0),
(170, 'Dickina', 'Carmen Theresa', 'V', '09178776951', '', '2022-05-19', NULL, 0, 'admin_Dickina', 'GC ADMIN', '#63a284', NULL, '', 'GC', 37, 'carmen.dickina@wmsu.edu.ph', '64c6286278b43cf0de8d868fb0d2be4f', NULL, 1, 0, 0, 0, 0),
(171, 'Ramirez', 'Sheryl', 'P', '09054875204', '', '2022-05-19', NULL, 0, 'admin_Ramirez', 'GC ADMIN', '#63a284', NULL, '', 'GC', 38, 'sheryl.ramirez@wmsu.edu.ph', '31db160c309e9edd871446f40092e2b3', NULL, 1, 0, 0, 0, 0),
(172, 'Calahat', 'Alice', 'A', '09555871745', '', '2022-05-19', NULL, 0, 'admin_Calahat', 'GC ADMIN', '#63a284', NULL, '', 'GC', 39, 'alice.calahat@wmsu.edu.ph', 'fbfc90dbf2fa724831bf07cc69b49567', NULL, 1, 0, 0, 0, 0),
(173, 'Astillero', 'Eric', 'L', '09158752599', '', '2022-05-19', NULL, 0, 'admin_Astillero', 'GC ADMIN', '#63a284', NULL, '', 'GC', 40, 'astillero.eric@wmsu.edu.ph', '533b31a3b0f252fb34c4c5bdd39c1f22', NULL, 1, 0, 0, 0, 0),
(174, 'Tendero', 'Kate Claudine', '', '09351108442', '', '2022-05-19', NULL, 0, 'admin_Tendero', 'GC ADMIN', '#63a284', NULL, '', 'GC', 41, 'kate.tendero@wmsu.edu.ph', 'ea1cb6bd10d7dadae1daf7e51c6f0467', NULL, 1, 0, 0, 0, 0),
(175, 'Falcasantos', 'Dianamar', 'R', '09063551506', '', '2022-05-19', NULL, 0, 'admin_Falcasantos', 'GC ADMIN', '#63a284', NULL, '', 'GC', 42, 'dianamar.falcasantos@wmsu.edu.ph', '881b739ddcc342a5348aa9fdf80ef0c3', NULL, 1, 0, 0, 0, 0),
(176, 'Custodio', 'Jessebelle ', 'M', '092761115', '', '2022-05-19', NULL, 0, 'admin_Custodio', 'GC ADMIN', '#63a284', NULL, '', 'GC', 43, 'jessebelle.custodio@wmsu.edu.ph', 'ecf45f8a28f9eedf0ec777c710ac4ebb', NULL, 1, 0, 0, 0, 0),
(177, 'Marchan', 'Katty Dyne', 'J', '09171625288', '', '2022-05-19', NULL, 0, 'admin_Marchan', 'GC ADMIN', '#63a284', NULL, '', 'GC', 44, 'katty.janiola@wmsu.edu.ph', '282bc0197cf8c8e2bbe2eadde3ad6608', NULL, 1, 0, 0, 0, 0),
(178, 'Bihag', 'Cristie', 'D', '096395974', '', '2022-05-19', NULL, 0, 'admin_Bihag', 'GC ADMIN', '#63a284', NULL, '', 'GC', 45, 'cristie.bihag@wmsu.edu.ph', '1ae3a2e8faae9780347e235c08cb4357', NULL, 1, 0, 0, 0, 0),
(179, 'Elechecon', 'Marnelie', 'G', '09277475830', '', '2022-05-19', NULL, 0, 'admin_Elechecon', 'GC ADMIN', '#63a284', NULL, '', 'GC', 46, 'elechecon.marnelie@wmsu.edu.ph', 'a00602a4a494ddf98ac941e8be41eb3b', NULL, 1, 0, 0, 0, 0),
(180, 'Pueblas', 'Amabel', '', '099787026', '', '2022-05-19', NULL, 0, 'admin_Pueblas', 'GC ADMIN', '#63a284', NULL, '', 'GC', 47, 'amabel.pueblas@wmsu.edu.ph', 'eeb19a55d69cc5b929b52f0e9d7b1780', NULL, 1, 0, 0, 0, 0),
(181, 'Laguna', 'Erjorie', 'A', '09364615070', '', '2022-05-19', NULL, 0, 'admin_Laguna', 'GC ADMIN', '#63a284', NULL, '', 'GC', 48, 'erjorie.laguna@wmsu.edu.ph', 'f0ff0a67d9103bb79bd0952ffb5faa01', NULL, 1, 0, 0, 0, 0),
(182, 'Casibual', 'Joseph', 'P', '09774666567', '', '2022-05-19', NULL, 0, 'admin_Casibual', 'GC ADMIN', '#63a284', NULL, '', 'GC', 49, 'joseph.casibual@wmsu.edu.ph', 'd6c64744437f784190d5d4c53fd21992', NULL, 1, 0, 0, 0, 0),
(183, 'Francisco', 'Roalene', 'P', '09190085324', '', '2022-05-19', NULL, 0, 'admin_Francisco', 'GC ADMIN', '#63a284', NULL, '', 'GC', 50, 'roalenefrancisco@wmsu.edu.ph', '89cb5fc32dd14016bb6ce763b640d05d', NULL, 1, 0, 0, 0, 0),
(184, 'Lacao Lacao', 'Lolita', '', '09360837547', '', '2022-05-19', NULL, 0, 'admin_Lacao Lacao', 'GC ADMIN', '#63a284', NULL, '', 'GC', 51, 'Lolita.lacao-lacao@wmsu.edu.ph', 'eeb5e1d1d26ce7f1571f48e3522f7eb2', NULL, 1, 0, 0, 0, 0),
(185, 'Francisco', 'Melodina', 'V', '09164071406', '', '2022-05-19', NULL, 0, 'admin_Francisco', 'GC ADMIN', '#63a284', NULL, '', 'GC', 52, 'francisco.melodina@wmsu.edu.ph', '89cb5fc32dd14016bb6ce763b640d05d', NULL, 1, 0, 0, 0, 0),
(186, 'Natividad', 'Richard Lloyd', 'M', '09151887448', '', '2022-05-19', NULL, 0, 'admin_Natividad', 'GC ADMIN', '#63a284', NULL, '', 'GC', 53, 'natividad.richard@wmsu.edu.ph', 'e4a16caf7ebaed08d11266ae04b1baf2', NULL, 1, 0, 0, 0, 0),
(187, 'Taasin', 'Nosca Bonna Ar', 'D', '09759821127', '', '2022-05-19', NULL, 0, 'admin_Taasin', 'GC ADMIN', '#63a284', NULL, '', 'GC', 54, 'nosca.taasin@wmsu.edu.ph', 'd29e0c01de63e6934779a7ca20e90562', NULL, 1, 0, 0, 0, 0),
(188, 'Buenafe', 'Finijoy', 'P', '', 'Director', '0000-00-00', NULL, 0, 'admin_Buenafe', 'GCC ADMIN', '#63a284', NULL, '', 'GCC', 0, 'buenafe.fini@wmsu.edu.ph', 'fcb480a321f9b37b779fb328dd70cccd', NULL, 1, 0, 0, 0, 0),
(189, 'Acedo', 'Glenda', 'P', '', 'Guidance Counselor', '0000-00-00', NULL, 0, 'admin_Acedo', 'GCC ADMIN', '#63a284', NULL, '', 'GCC', 0, 'acedo.glenda@wmsu.edu.ph', '021433e8b6b5c9c9cecd8aea66a44d4c', NULL, 1, 0, 0, 0, 0),
(190, 'Madroñal', 'Julienne Faye', 'B', '', 'Administrative Aide IV', '0000-00-00', NULL, 0, 'admin_Madroñal', 'GCC ADMIN', '#63a284', NULL, '', 'GCC', 0, 'madronal.julienne@wmsu.edu.ph', '3527ece161a51a448f83f6a9fd6e1b1e', NULL, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `a_id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `datecreated` datetime NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`a_id`, `content`, `datecreated`, `stat`) VALUES
(1, 'Edit Personal Data Sheet:\r\nTo edit Personal Data Sheet Content, click My Forms on the left part under the profile section. Then click Modify on the Personal Data Sheet.\r\n\r\nSend Shifting Request:\r\n\r\nTo send shifting request, click My Forms on the left part under the profile section. Then click Fill up on the Shifting Form.\r\n\r\nNotification:\r\n\r\nClick Notification on the left part under the profile section to view your notification. \r\n\r\n', '2022-03-08 19:54:04', 1),
(51, 'Please be advised that the date for the shifting exam shall be announced later, due to the present restrictions brought about by the pandemic.', '2021-09-01 11:30:26', 0),
(52, ' Guidance and Counseling Center is always open for those who seek help and guidance. Please visit our Facebook Page at WMSU Guidance and Counseling Center.', '2021-09-01 11:30:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `caro_id` int(11) NOT NULL,
  `imagename` longtext NOT NULL,
  `datecreated` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `static` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`caro_id`, `imagename`, `datecreated`, `status`, `static`) VALUES
(1, '922Photo_bg1.png', '2021-10-27 09:54:01', 1, 1),
(2, '749Photo_252518478_426538819122483_748187137360330063_n.jpg', '2021-10-27 09:54:01', 0, 1),
(3, '907Photo_123514578_177936287316072_7714326587914293130_n.jpg', '2021-10-27 09:54:01', 0, 1),
(11, '688Photo_190229864_316694543440245_3221926884789874751_n.jpg', '2021-12-13 08:15:08', 0, 0),
(12, '916Photo_106595488_114074480368920_2641985034434543665_n.jpg', '2021-12-13 08:17:41', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `choice_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `form_id`, `type`, `content`) VALUES
(952, 3309, 'shorttext', NULL),
(976, 3354, 'mpchoice', NULL),
(977, 3356, 'shorttext', NULL),
(978, 3358, 'shorttext', NULL),
(979, 3359, 'shorttext', NULL),
(980, 3360, 'shorttext', NULL),
(981, 3361, 'dates', NULL),
(982, 3362, 'longtext', NULL),
(983, 3363, 'shorttext', NULL),
(985, 3364, 'mpchoice', NULL),
(986, 3365, 'mpchoice', NULL),
(988, 3366, 'shorttext', NULL),
(989, 3367, 'shorttext', NULL),
(990, 3368, 'shorttext', NULL),
(991, 3369, 'longtext', NULL),
(992, 3370, 'shorttext', NULL),
(993, 3371, 'longtext', NULL),
(994, 3372, 'shorttext', NULL),
(995, 3376, 'longtext', NULL),
(996, 3377, 'mpchoice', NULL),
(997, 3378, 'checkbox', NULL),
(1000, 3385, 'shorttext', NULL),
(1001, 3395, 'shorttext', NULL),
(1005, 3401, 'longtext', NULL),
(1006, 3402, 'longtext', NULL),
(1007, 3404, 'checkbox', NULL),
(1008, 3405, 'longtext', NULL),
(1009, 3407, 'checkbox', NULL),
(1012, 3408, 'mpchoice', NULL),
(1013, 3409, 'longtext', NULL),
(1014, 3410, 'checkbox', NULL),
(1015, 3411, 'checkbox', NULL),
(1016, 3414, 'checkbox', NULL),
(1017, 3415, 'checkbox', NULL),
(1018, 3416, 'checkbox', NULL),
(1019, 3417, 'longtext', NULL),
(1020, 3418, 'checkbox', NULL),
(1021, 3419, 'numbers', NULL),
(1022, 3420, 'numbers', NULL),
(1023, 3425, 'longtext', NULL),
(1024, 3426, 'longtext', NULL),
(1025, 3431, 'checkbox', NULL),
(1026, 3434, 'longtext', NULL),
(1028, 3435, 'mpchoice', NULL),
(1029, 3437, 'longtext', NULL),
(1030, 3447, 'shorttext', NULL),
(1032, 3452, 'mpchoice', NULL),
(1033, 3449, 'shorttext', NULL),
(1034, 3453, 'longtext', NULL),
(1035, 3454, 'mpchoice', NULL),
(1036, 3455, 'numbers', NULL),
(1037, 3456, 'longtext', NULL),
(1038, 3457, 'email', NULL),
(1039, 3458, 'longtext', NULL),
(1040, 3462, 'shorttext', NULL),
(1041, 3427, 'longtext', NULL),
(1042, 3448, 'shorttext', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_ip`
--

CREATE TABLE `client_ip` (
  `ipid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ipaddress` text NOT NULL,
  `date_recorded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_ip`
--

INSERT INTO `client_ip` (`ipid`, `user_id`, `ipaddress`, `date_recorded`) VALUES
(61, 0, '::1', '2022-05-20 10:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `CollegeId` int(11) NOT NULL,
  `college` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `bgcolor` text NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`CollegeId`, `college`, `datecreated`, `bgcolor`, `test`) VALUES
(8, 'College of Agriculture', '2022-01-12 13:03:06', '#83e37d', 0),
(10, 'College of Asian and Islamic Studies', '2022-01-12 13:03:47', '', 0),
(11, 'College of Criminal Justice Education', '2022-01-12 13:04:11', '#addfb1', 0),
(12, 'College of Engineering', '2022-01-12 13:04:24', '#671d21', 0),
(13, 'College of Forestry and Environmental Studies', '2022-01-12 13:04:49', '', 0),
(14, 'College of Home Economics', '2022-01-12 13:05:05', '', 0),
(15, 'College of Law', '2022-01-12 13:05:16', '', 0),
(16, 'College of Liberal Arts', '2022-01-12 13:05:30', '#6570bd', 0),
(17, 'College of Nursing', '2022-01-12 13:05:42', '', 0),
(18, 'College of Public Administration and Development Studies', '2022-01-12 13:06:20', '', 0),
(19, 'College of Sports Science and Physical Education', '2022-01-12 13:06:41', '', 0),
(20, 'College of Science and Mathematics', '2022-01-12 13:06:59', '', 0),
(21, 'College of Social Work and Community Development', '2022-01-12 13:07:35', '', 0),
(22, 'College of Teacher Education', '2022-01-12 13:07:52', '', 0),
(23, 'College of Computing Studies', '2022-01-12 13:08:06', '#0d5914', 0),
(37, 'College of Architecture', '2022-05-04 12:16:44', '#e56815', 0),
(38, 'Integrated Laboratory School - Secondary', '2022-05-19 15:18:43', '#17711e', 0),
(39, 'Integrated Laboratory School - Elementary', '2022-05-19 15:20:44', '#17711e', 0),
(40, 'Department of Extension Service and Community Development', '2022-05-19 15:24:07', '#17711e', 0),
(41, 'WMSU Alicia', '2022-05-19 15:27:52', '#17711e', 0),
(42, 'WMSU Aurora', '2022-05-19 15:28:51', '#17711e', 0),
(43, 'WMSU Curuan', '2022-05-19 15:30:02', '#17711e', 0),
(44, 'WMSU Diplahan', '2022-05-19 15:30:16', '#17711e', 0),
(45, 'WMSU Imelda', '2022-05-19 15:30:27', '#17711e', 0),
(46, 'WMSU Ipil', '2022-05-19 15:30:38', '#17711e', 0),
(47, 'WMSU Mabuhay', '2022-05-19 15:30:51', '#17711e', 0),
(48, 'WMSU Malangas', '2022-05-19 15:30:59', '#17711e', 0),
(49, 'WMSU Molave', '2022-05-19 15:31:10', '#17711e', 0),
(50, 'WMSU Naga', '2022-05-19 15:31:19', '#17711e', 0),
(51, 'WMSU Olutanga', '2022-05-19 15:31:51', '#17711e', 0),
(52, 'WMSU Pagadian', '2022-05-19 15:32:00', '#17711e', 0),
(53, 'WMSU Siay', '2022-05-19 15:32:10', '#17711e', 0),
(54, 'WMSU Tungawan', '2022-05-19 15:32:20', '#17711e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `counseling_request`
--

CREATE TABLE `counseling_request` (
  `c_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `datecreated` datetime NOT NULL,
  `remarks` text NOT NULL,
  `sched_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `course` text NOT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `CollegeId`, `course`, `datecreated`) VALUES
(27, 23, 'BS INFORMATION TECHNOLOGY', '2022-01-12 13:09:44'),
(28, 23, 'BS COMPUTER SCIENCE', '2022-01-12 13:09:55'),
(35, 11, 'BS CRIMINOLOGY', '2022-01-12 13:13:12'),
(55, 12, 'BS ELECTRONICS AND COMMUNICATIONS ENGINEERING', '2022-05-19 14:55:19'),
(57, 19, 'BACHELOR OF PHYSICAL EDUCATION', '2022-05-19 15:28:20'),
(58, 19, 'BS IN EXERCISE AND SPORTS SCIENCE', '2022-05-19 15:28:56'),
(59, 20, 'BS BIOLOGY', '2022-05-19 15:29:40'),
(60, 20, 'BS CHEMISTRY', '2022-05-19 15:29:58'),
(61, 20, 'BS MATHEMATICS', '2022-05-19 15:30:15'),
(62, 20, 'BS STATISTICS', '2022-05-19 15:30:36'),
(63, 20, 'BS PHYSICS', '2022-05-19 15:30:55'),
(64, 37, 'BS ARCHITECTURE', '2022-05-19 15:31:20'),
(65, 17, 'BS NURSING', '2022-05-19 15:31:46'),
(66, 10, 'AB ASIAN STUDIES MAJOR IN ASEAN COMMUNITY', '2022-05-19 15:32:18'),
(67, 10, 'AB ASIAN STUDIES MAJOR IN POLITICAL ECONOMY', '2022-05-19 15:33:09'),
(68, 10, 'DIPLOMA IN ARABIC LANGUAGE', '2022-05-19 15:33:29'),
(69, 14, 'BS HOME ECONOMICS', '2022-05-19 15:34:04'),
(70, 14, 'BS HOSPITALITY MANAGEMENT SERVICES', '2022-05-19 15:37:24'),
(71, 14, 'BS NUTRITION AND DIETETICS', '2022-05-19 15:37:57'),
(72, 14, 'ASSOCIATE IN HOSPITALITY MANAGEMENT SERVICES', '2022-05-19 15:38:28'),
(73, 13, 'BS FORESTRY', '2022-05-19 15:45:38'),
(74, 13, 'BS AGROFORESTRY', '2022-05-19 15:46:07'),
(75, 13, 'BS ENVIRONMENTAL SCIENCE', '2022-05-19 15:46:54'),
(76, 16, 'BS ACCOUNTANCY', '2022-05-19 15:48:08'),
(77, 16, 'BS PSYCHOLOGY', '2022-05-19 15:48:33'),
(78, 16, 'BS ECONOMICS', '2022-05-19 15:48:51'),
(79, 16, 'BA POLITICAL SCIENCE', '2022-05-19 15:50:11'),
(80, 16, 'BA ENGLISH LANGUAGE STUDIES', '2022-05-19 15:51:04'),
(81, 16, 'BA HISTORY', '2022-05-19 15:51:27'),
(82, 16, 'BA JOURNALISM', '2022-05-19 15:51:44'),
(83, 16, 'BA BROADCASTING', '2022-05-19 15:52:01'),
(84, 16, 'BATSILYER NG SINING SA FILIPINO', '2022-05-19 15:52:48'),
(85, 12, 'BS INDUSTRIAL ENGINEERING', '2022-05-19 15:53:35'),
(86, 12, 'BS ENVIRONMENTAL ENGINEERING', '2022-05-19 15:53:58'),
(87, 12, 'BS CIVIL ENGINEERING', '2022-05-19 15:54:54'),
(88, 12, 'BS MECHANICAL ENGINEERING', '2022-05-19 15:55:18'),
(89, 12, 'BS ELECTRICAL ENGINEERING', '2022-05-19 15:55:46'),
(90, 12, 'BS COMPUTER ENGINEERING', '2022-05-19 15:56:14'),
(91, 12, 'BS AGRICULTURE AND BIOSYSTEMS ENGINEERING', '2022-05-19 15:56:45'),
(92, 12, 'BS SANITARY ENGINEERING', '2022-05-19 15:57:00'),
(93, 12, 'BS GEODETIC ENGINEERING', '2022-05-19 15:57:56'),
(94, 21, 'BS SOCIAL WORK', '2022-05-19 15:59:56'),
(95, 21, 'BS COMMUNITY DEVELOPMENT', '2022-05-19 16:02:08'),
(96, 22, 'BACHELOR OF SECONDARY EDUCATION MAJOR IN ENGLISH', '2022-05-19 16:04:25'),
(97, 22, 'BACHELOR OF SECONDARY EDUCATION MAJOR IN FILIPINO', '2022-05-19 16:04:51'),
(98, 22, 'BACHELOR OF SECONDARY EDUCATION MAJOR IN MATHEMATICS', '2022-05-19 16:05:15'),
(99, 22, 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SCIENCE', '2022-05-19 16:05:51'),
(100, 22, 'BACHELOR OF SECONDARY EDUCATION MAJOR IN SOCIAL STUDIES', '2022-05-19 16:06:12'),
(101, 22, 'BACHELOR OF SECONDARY EDUCATION MAJOR IN VALUES EDUCATION', '2022-05-19 16:06:33'),
(102, 22, 'BACHELOR OF ELEMENTARY EDUCATION', '2022-05-19 16:07:19'),
(103, 22, 'BACHELOR OF SPECIAL NEEDS EDUCATION', '2022-05-19 16:07:44'),
(104, 22, 'BACHELOR OF EARLY CHILDHOOD EDUCATION', '2022-05-19 16:08:06'),
(105, 22, 'BACHELOR OF CULTURE AND ARTS EDUCATION', '2022-05-19 16:08:29'),
(106, 8, 'BS AGRICULTURE', '2022-05-19 16:11:14'),
(107, 8, 'BS AGRIBUSINESS', '2022-05-19 16:11:31'),
(108, 8, 'BS FOOD TECHNOLOGY', '2022-05-19 16:12:41'),
(109, 8, 'BS AGRICULTURAL TECHNOLOGY', '2022-05-19 16:13:53'),
(110, 38, 'JUNIOR HIGH', '2022-05-19 16:17:00'),
(111, 38, 'SHS-STEM', '2022-05-19 16:17:24'),
(112, 38, 'SHS-HUMS', '2022-05-19 16:17:45'),
(113, 41, 'BACHELOR OF ELEMENTARY EDUCATION', '2022-05-19 16:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `recepient` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_send` datetime NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allday` varchar(100) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `bgcolor` text NOT NULL,
  `brdercolor` text NOT NULL,
  `txtcolor` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `title`, `start`, `end`, `allday`, `URL`, `bgcolor`, `brdercolor`, `txtcolor`, `status`) VALUES
(399, 'All saints Day', '2021-11-01 00:00:00', '2021-11-02 00:00:00', 'true', '', '#e63737', '#e63737', 'rgb(255, 255, 255)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `title_column` int(11) DEFAULT NULL,
  `type` varchar(150) NOT NULL,
  `content` longtext NOT NULL,
  `others` text DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `class_name` int(11) NOT NULL,
  `isrequired` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `bgimage` text DEFAULT NULL,
  `yaxis` text NOT NULL,
  `bgcolor` text NOT NULL,
  `txtcolor` text NOT NULL,
  `isvisible` int(11) NOT NULL,
  `isspecified` int(11) NOT NULL,
  `isset` int(11) NOT NULL,
  `ismodifiable` int(11) NOT NULL,
  `sec_no` int(11) NOT NULL,
  `section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `title_column`, `type`, `content`, `others`, `display_order`, `class_name`, `isrequired`, `status`, `bgimage`, `yaxis`, `bgcolor`, `txtcolor`, `isvisible`, `isspecified`, `isset`, `ismodifiable`, `sec_no`, `section`) VALUES
(3308, NULL, 'section', 'STUDENTS PROFILE FOR SHIFTING REQUEST', 'Other supporting contents', 3, 60, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 0),
(3309, NULL, 'Question', 'Last Name', NULL, 5, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3308),
(3352, NULL, 'section', 'To the Students :', 'The Purpose of this form is to bring together all essential Information that may enable us to assist you in your specific need and difficulties.', 7, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 0),
(3353, NULL, 'Plaintext', 'All information in this form shall be kept confidential .\nPlease fill in the blanks carefully and sincerely.', NULL, 8, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3354, NULL, 'Question', '', NULL, 10, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3355, NULL, 'section', 'PERSONAL INFORMATION', 'Other supporting contents', 11, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 0),
(3356, NULL, 'Question', 'Surname', NULL, 13, 62, 'yes', 'selected', NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3358, NULL, 'Question', 'Firstname', NULL, 14, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3359, NULL, 'Question', 'Middlename', NULL, 15, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3360, NULL, 'Question', 'Course & Year', NULL, 16, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3361, NULL, 'Question', 'Date Of Birth', NULL, 17, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3362, NULL, 'Question', 'Place of Birth', NULL, 18, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3363, NULL, 'Question', 'Age', NULL, 19, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3364, NULL, 'Question', 'Gender', NULL, 20, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3365, NULL, 'Question', 'Civil Status', NULL, 21, 62, 'yes', NULL, NULL, '', '', '', 0, 1, 0, 0, 2, 3355),
(3366, NULL, 'Question', 'Religion', NULL, 22, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3367, NULL, 'Question', 'Nationality', NULL, 23, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3368, NULL, 'Question', 'Language', NULL, 24, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3369, NULL, 'Question', 'City Address', NULL, 25, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3370, NULL, 'Question', 'Tel No /Cellphone No', NULL, 26, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3371, NULL, 'Question', 'Provincial Address', NULL, 27, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3372, NULL, 'Question', 'Ethnicity', NULL, 28, 62, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 2, 3355),
(3373, NULL, 'section', 'FAMILY RECORD', '', 29, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 3, 0),
(3375, NULL, 'list', '', NULL, 31, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 3, 3373),
(3376, NULL, 'Question', 'Which of his/her traits would you like to have?', NULL, 32, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 3, 3373),
(3377, NULL, 'Question', 'With whom would you rather discuss your problem?', NULL, 33, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 3, 3373),
(3378, NULL, 'Question', 'Mental Status of Parents : Check those which are applicable', NULL, 34, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 3, 3373),
(3380, NULL, 'list', 'No. of Person Living at Home ', NULL, 35, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 3, 3373),
(3384, NULL, 'list', 'Guardian if not living with parents.', NULL, 39, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 3, 3373),
(3385, NULL, 'Question', 'Language or Dialect spoken at Home', NULL, 40, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 3, 3373),
(3387, NULL, 'Plaintext', 'List Below , All the children in your family including yourself Starting with the eldest. Put an X opposite to your name ( if married list your own children )', NULL, 43, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 3, 3373),
(3389, NULL, 'list', '', NULL, 44, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 3, 3373),
(3391, NULL, 'section', 'EDUCATIONAL BACKGROUND', 'Name the Schools you have ever attended, ( include grade school , High school and other Colleges )', 46, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 0),
(3392, NULL, 'list', '', NULL, 48, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 4, 3391),
(3393, NULL, 'list', 'H.S Liked', NULL, 49, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 4, 3391),
(3394, NULL, 'list', 'H.S Disliked', NULL, 50, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 4, 3391),
(3395, NULL, 'Question', 'Approximately Highschool Average', NULL, 51, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 3391),
(3397, NULL, 'list', 'Honors Received in High school', NULL, 53, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 4, 3391),
(3400, NULL, 'list', 'Course Currently Enrolled in ,', NULL, 56, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 4, 3391),
(3401, NULL, 'Question', 'Other course previously enrolled in', NULL, 57, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 3391),
(3402, NULL, 'Question', 'Reason for shifting / Transferring', NULL, 58, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 3391),
(3403, NULL, 'list', 'Present Education and Vocational Plans', NULL, 59, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 4, 3391),
(3404, NULL, 'Question', 'What made you choose this school?', NULL, 60, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 4, 3391),
(3405, NULL, 'Question', 'If your choice was not your own, What course would you rather take up?', NULL, 61, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 3391),
(3407, NULL, 'Question', 'How did you come to this school?', NULL, 63, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 4, 3391),
(3408, NULL, 'Question', 'How much information do you have about the requirements of the course  you are taking  up?', NULL, 64, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 3391),
(3409, NULL, 'Question', 'Where did you get this Information? ( specify )', NULL, 65, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 4, 3391),
(3410, NULL, 'Question', 'Source of financial support in College', NULL, 66, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 4, 3391),
(3411, NULL, 'Question', 'Self-evaluation regarding scholastic standing , Check the following  which apply to you', NULL, 67, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 4, 3391),
(3412, NULL, 'section', 'Health Records and Living Conditions', 'Indicate as Required', 69, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 0),
(3414, NULL, 'Question', 'Physical Profile and Identification Marks', NULL, 71, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 5, 3412),
(3415, NULL, 'Question', 'Physical Program Participated', NULL, 72, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 5, 3412),
(3416, NULL, 'Question', 'Suffering from physical ailment', NULL, 73, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 5, 3412),
(3417, NULL, 'Question', 'If above question is answered. What is the Physician Handling?', NULL, 74, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3418, NULL, 'Question', 'Where do you live?', NULL, 75, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 5, 3412),
(3419, NULL, 'Question', 'How many are you in your present place now ?', NULL, 76, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3420, NULL, 'Question', 'How many persons share the room with you?', NULL, 77, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3422, NULL, 'Title', 'LEISURE TIME ACTIVITIES', NULL, 78, 62, '', NULL, '', '', '#8fb58c', '#151414', 0, 0, 0, 0, 5, 3412),
(3423, NULL, 'Plaintext', 'List any social,religious,economic,educational activities.', NULL, 79, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3424, NULL, 'list', 'Membership on Organization', NULL, 80, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 5, 3412),
(3425, NULL, 'Question', 'Awards Received', NULL, 81, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3426, NULL, 'Question', 'Organization', NULL, 82, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3427, NULL, 'Question', 'Hobbies and Interests', NULL, 83, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 5, 3412),
(3429, NULL, 'section', 'GENERAL PERSONALITY MAKE-UP', '', 85, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 6, 0),
(3431, NULL, 'Question', 'Check one or more of the following words which you feel describe your general personality make-up', NULL, 87, 62, 'no', NULL, NULL, '', '', '', 0, 1, 0, 0, 6, 3429),
(3433, NULL, 'list', 'Significant Events in your Life. Explain Briefly', NULL, 88, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 6, 3429),
(3434, NULL, 'Question', 'What things have caused you most humiliation or sense of failure?', NULL, 89, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 6, 3429),
(3435, NULL, 'Question', 'Have you had any counseling previously?', NULL, 90, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 6, 3429),
(3436, NULL, 'list', 'If ( Yes )', NULL, 91, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 6, 3429),
(3437, NULL, 'Question', 'Briefly write what seem so be your particular problems in any area of your life', NULL, 92, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 6, 3429),
(3438, NULL, 'list', 'List three names of persons connected in this university or community, Who  know you personaly', NULL, 93, 62, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 6, 3429),
(3440, NULL, 'section', 'GUIDANCE AND COUNSELING ASSISTANCE', '', 94, 62, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 7, 0),
(3442, NULL, 'list', 'What help do you want to obtain from the Guidance and Counseling Center?', NULL, 96, 62, 'no', NULL, NULL, '', '', '', 0, 0, 2, 0, 7, 3440),
(3447, NULL, 'Question', 'First Name', NULL, 6, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3448, NULL, 'Question', 'Middle Name', NULL, 7, 60, 'yes', 'selected', NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3449, NULL, 'Question', 'ID Number', NULL, 13, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3452, NULL, 'Question', 'Gender', NULL, 12, 60, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3453, NULL, 'Question', 'Address', NULL, 14, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3454, NULL, 'Question', 'Campus', NULL, 15, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3455, NULL, 'Question', 'Contact Number', NULL, 16, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3456, NULL, 'Question', 'Facebook Profile Link', NULL, 17, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3457, NULL, 'Question', 'Email Address', NULL, 18, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3458, NULL, 'Question', 'Present Course', NULL, 19, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3460, NULL, 'list', '', NULL, 21, 60, 'no', NULL, NULL, '', '', '', 0, 0, 1, 0, 1, 3352),
(3462, NULL, 'Question', 'CET Result', NULL, 22, 60, 'yes', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352),
(3463, NULL, 'file', 'Proof of CET Result', NULL, 23, 60, 'no', NULL, NULL, '', '', '', 0, 0, 0, 0, 1, 3352);

-- --------------------------------------------------------

--
-- Table structure for table `form_classification`
--

CREATE TABLE `form_classification` (
  `csform_id` int(11) NOT NULL,
  `form_name` varchar(1000) NOT NULL,
  `datecreated` datetime NOT NULL,
  `modifiedby` varchar(100) NOT NULL,
  `lastmodified` datetime DEFAULT NULL,
  `bodybg` varchar(50) NOT NULL,
  `titlebg` varchar(50) NOT NULL,
  `questionbg` varchar(50) NOT NULL,
  `bodytext` varchar(50) NOT NULL,
  `textcolortitle` varchar(50) NOT NULL,
  `textcolorquestion` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `static` int(11) NOT NULL,
  `isenabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_classification`
--

INSERT INTO `form_classification` (`csform_id`, `form_name`, `datecreated`, `modifiedby`, `lastmodified`, `bodybg`, `titlebg`, `questionbg`, `bodytext`, `textcolortitle`, `textcolorquestion`, `status`, `static`, `isenabled`) VALUES
(60, 'Shifting Form', '2021-09-10 13:13:28', '58', '2022-05-18 22:33:16', '#dedede', '', '#8e2525', '#0a2a3f', '', '#020307', 0, 1, 1),
(62, 'Personal Data Sheets', '2021-09-09 11:40:36', '58', '2022-05-15 21:25:22', '#ebefec', '', '#90ad7f', '#274c68', '', '#000000', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_response`
--

CREATE TABLE `form_response` (
  `pds_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `custom_user` varchar(100) DEFAULT NULL,
  `sec_no` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `csformid` int(11) NOT NULL,
  `tble_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `tcontent_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `datemodified` datetime DEFAULT NULL,
  `dateapproved` date DEFAULT NULL,
  `tble` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `course` text NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `approvestat` int(11) NOT NULL,
  `freed` int(11) NOT NULL,
  `custom` int(11) NOT NULL,
  `adm` int(11) NOT NULL,
  `toshift` text DEFAULT NULL,
  `fromwhere` text NOT NULL,
  `shifting_history` int(11) NOT NULL,
  `semester` text NOT NULL,
  `semester_upt` text NOT NULL,
  `coordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gui`
--

CREATE TABLE `gui` (
  `id` int(11) NOT NULL,
  `GUI_type` varchar(50) NOT NULL,
  `sidebar_color` varchar(50) NOT NULL,
  `sidebar_textcolor` varchar(50) NOT NULL,
  `sidebar_logo` text NOT NULL,
  `sidebar_banner` text NOT NULL,
  `advancesearch` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gui`
--

INSERT INTO `gui` (`id`, `GUI_type`, `sidebar_color`, `sidebar_textcolor`, `sidebar_logo`, `sidebar_banner`, `advancesearch`, `email`, `password`) VALUES
(1, 'GCC admin', '#63a284', '#deebe8', '', 'GCC ADMIN', 'enabled', 'hantechsupprt@gmail.com', '09557653775'),
(2, 'GC admin', '#63a284', '#deebe8', '', 'GC ADMIN', 'enabled', 'hantechsupprt@gmail.com', '09557653775'),
(3, 'homepage', 'bg-danger', '', '', 'Guidance and Counseling Center', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logs_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_type` text NOT NULL,
  `content` text NOT NULL,
  `datemodified` datetime NOT NULL,
  `manage_fields` text NOT NULL,
  `courses` text NOT NULL,
  `coordinator` text NOT NULL,
  `semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `stud_id` int(11) NOT NULL,
  `adm` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `send` int(11) NOT NULL,
  `receive` int(11) NOT NULL,
  `datecreated` datetime NOT NULL,
  `student` int(11) NOT NULL,
  `gcc` int(11) NOT NULL,
  `gc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `mid` int(11) NOT NULL,
  `month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`mid`, `month`) VALUES
(1, 'January'),
(2, 'mid-January'),
(3, 'February'),
(4, 'mid-February'),
(5, 'March'),
(6, 'mid-March'),
(7, 'April'),
(8, 'mid-April'),
(9, 'May'),
(10, 'mid-May'),
(11, 'June'),
(12, 'mid-June'),
(13, 'July'),
(14, 'mid-July'),
(15, 'August'),
(16, 'mid-August'),
(17, 'September'),
(18, 'mid-September'),
(19, 'October'),
(20, 'mid-October'),
(21, 'November'),
(22, 'mid-November'),
(23, 'December'),
(24, 'mid-December');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE `newsfeed` (
  `n_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `link` longtext DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `datecreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`n_id`, `title`, `content`, `link`, `picture`, `datecreated`) VALUES
(35, 'Link for the Shifting Registration 2021', 'Hello there Crimsons!\r\n\r\nFor more updates, you may visit our Facebook Page at WMSU Guidance and Counseling Center. Like the page so you will get notified. Thank you and stay safe always.\r\n \r\n\r\nHere is the link for the online registration for Career Tele-Counseling and Shifting.', 'https://forms.gle/Tnsx47tiU6prsgf1A', '956Photo_newspic8.png', '2021-09-06 17:23:50');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `noti_id` int(11) NOT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_notified` datetime NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `adminsender` int(11) NOT NULL,
  `studenttaker_id` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `ccontent` text DEFAULT NULL,
  `cdetails` text DEFAULT NULL,
  `creplaced_details` text DEFAULT NULL,
  `course` text NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `action` varchar(50) DEFAULT NULL,
  `toshiftcid` int(11) NOT NULL,
  `modifyonly` int(11) NOT NULL,
  `mp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `oidd` int(11) NOT NULL,
  `title` text NOT NULL,
  `feature` text NOT NULL,
  `btnname` text NOT NULL,
  `btnlink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`oidd`, `title`, `feature`, `btnname`, `btnlink`) VALUES
(1, 'Follow us at Facebook', 'Facebook.com ', 'www.facebook.com/wmsugcc', 'https://www.facebook.com/wmsugcc'),
(2, 'Follow us at Instagram', 'Instagram', 'GCC@instagram.com', 'https://instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageid` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `photo` text DEFAULT NULL,
  `fullname` text NOT NULL,
  `pos` text NOT NULL,
  `type` int(11) NOT NULL,
  `display_order` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageid`, `title`, `content`, `photo`, `fullname`, `pos`, `type`, `display_order`, `active`) VALUES
(1, 'Rationale', 'Guidance is the sum total of the helping services purposely created to facilitate or show the way for the realization of optimum human growth and development of all individuals. Its main goal is to help students, benefit fully from their educational experiences and ultimately develop to the maximum of their personalities. \n\nIn consonance with the vision and mission of the Western Mindanao State University, the Guidance Program aspires to be comprehensive in scope, preventative in design and developmental in nature. With this, the guidance program intends to provide opportunities for individuals to learn about themselves and others, explore their needs, aptitudes, abilities interests and skills and make full use of such, in enabling him/her to achieve at his/her goals.\n\nThe guidance staff is professionally trained in the field of Guidance & Counseling, as well as other related areas who as a team is available to meet a variety of students concerns.\n\nAt the Guidance and Counseling Center, students, faculty and other personnel may discuss and explore in confidence, any concerns or feelings that are important to them. Professional guidance and counseling services are provided for a wide range of concerns, particularly in three areas namely educational/academic, vocational/occupational, personal/social or community involvement. The main responsibility of counselors is to help students organize their needs, think through their concerns and help them make their own decisions and to be accountable to it. The professional counselors offer friendly and understanding atmosphere for students and other clients. Any student(s) may seek individual counseling with the assurance of complete confidentiality.', NULL, '', '', 0, 0, 0),
(2, 'Vision', 'The University of Choice for higher learning with strong research orientation that produces professionals who are socially responsive to and responsible for human development, ecological sustainability; and, peace and security within and beyond the region.', NULL, '', '', 0, 0, 0),
(3, 'Mission', 'Guided by the vision and mission of the Western Mindanao State University, the Guidance & Counseling Center is committed to provide the highest professional standards in guidance services so that the client it serves will continue to grow and develop to become economically self-sufficient, psychological stable, morally, spiritually upright and contributing citizens in society.', NULL, '', '', 0, 0, 0),
(4, 'Objectives', '1. To assist the individual in making maximum use of his educational opportunities so as to enable him to develop competencies in his chosen career and thus contribute in improving the quality of life for the growth and progress of the region and nation as a whole.\n\n2. To help the individual in understanding himself and his environment so that he will grow in self-direction with the end in view of attaining greater personal satisfaction and adjustment in life.\n\n3. To enable the individual to make full use of his resources and become a fully functioning person, capable of maintaining a psychologically, socially, spiritually, morally and economically balanced life; thereby becoming not only a responsible member of the community; but above all capable of contributing to a larger society.', NULL, '', '', 0, 0, 0),
(7, '', '', NULL, 'Glenda P. Acedo, LPT, RPm, RGC', 'Guidance Counselor / Psychometrician', 1, 2, 0),
(8, '', '', NULL, 'Melva A. Villarta, LPT, RPm, RGC ', 'Guidance Facilitator / Psychometrician', 1, 3, 0),
(9, '', '', NULL, 'Nicco Raymond B. Mendoza, RPm ', 'Psychometrician', 1, 4, 0),
(10, '', '', NULL, 'Marnelie G. Elechecon, RPm', 'Psychometrician', 1, 5, 0),
(11, '', '', NULL, 'Grace Ann A. Baluntang, RPm', 'Psychometrician', 1, 6, 0),
(48, '', '', '', 'Dr. Fini Joy P. Buenafe, LPT, RGC, Ph.D ', 'OIC Director', 1, 1, 0),
(49, '', '', '', 'Mr. Jiemar A. Arabani', 'Guidance Coordinator (College of Criminal Justice Education)', 1, 7, 0),
(50, '', '', '', 'Engr. Catherine D. Falcasantos', 'Guidance Coordinator (College of Engineering)', 1, 8, 0),
(51, '', '', '', 'Ms. Renalyn B. Ebol', 'Guidance Coordinator (College of Agriculture)', 1, 9, 0),
(52, '', '', '', 'Ms. Arlene B. Ucol', 'Guidance Coordinator (College of Physical Education, Recreation and Sports)', 1, 10, 0),
(54, '', '', '', 'Prof. Clarissa B. Miranda', 'Guidance Coordinator (College of Liberal Arts)', 1, 11, 0),
(55, '', '', '', 'Ms. Lhea Grace V. Gutual, RSW, MSW', 'Guidance Coordinator (College of Social Work and Community Development)', 1, 12, 0),
(56, '', '', '', 'Asso. Prof. Delia C. Timosan', 'Guidance Coordinator (College of Teacher Education)', 1, 13, 0),
(57, '', '', '', 'Ms. Ruby M. Lim', 'Guidance Coordinator (College of Home Economics)', 1, 14, 0),
(58, '', '', '', 'Prof. Josefa Andrea C. Pizarro', 'Guidance Coordinator (College of Nursing)', 1, 15, 0),
(59, '', '', '', 'Prof. Aurea T. Coros', 'Guidance Coordinator (College of Science and Mathematics)', 1, 16, 0),
(60, '', '', '', 'Arch. Carmen Theresa V. Dickina', 'Guidance Coordinator (College of Architecture)', 1, 17, 0),
(61, '', '', '', 'Ms. Lucy Felix-Sadiwa', 'Guidance Coordinator (College of Computer Studies)', 1, 18, 0),
(62, '', '', '', 'Ms. Gretchen O. Quimson', 'Guidance Coordinator (College of Forestry and Environmental Studies)', 1, 19, 0),
(63, '', '', '', 'Ms. Nurmia L. Ticao', 'Guidance Coordinator (College of Asian and Islamic Studies)', 1, 20, 0),
(64, '', '', '', 'Asst. Prof. Olga T. Victorio', 'Guidance Coordinator (Integrated Laboratory School - Secondary)', 1, 21, 0),
(65, '', '', '', 'Ms. Alice A. Calahat', 'Guidance Coordinator (Integrated Laboratory School - Elementary)', 1, 22, 0),
(66, 'Individual Inventory', 'The Guidance Program keeps an organized record of each student. Data about each student are recorded in the Personal Data Sheet. Information about the educational, family background, test results and interview are accomplished in the respective college guidance offices. These files are updated yearly and serve to help monitor the development of the student. All data are kept strictly confidential.', NULL, '', '', 2, 0, 0),
(67, 'Information Service', 'This service provides the students with information on the following: academic, educational, personal, career and occupational facts and data that may help students in decision making and goal setting.', NULL, '', '', 2, 0, 0),
(68, 'Psychological Testing and Assessment', 'The strengths and weaknesses in the areas of personality, aptitudes, interest, motivation and job skills are assessed through the use if standardized tests. These test results are interpreted for students self-awareness, growth and development. For these reasons a number of standardized test and inventories for surveying individual concerns and problems are utilized. Testing follows strictly, rules on accreditation and ethical standards for counselors and psychologists. Releasing of results follows strictly the rules of confidentiality.', NULL, '', '', 2, 0, 0),
(69, 'Counseling Service', 'Individual or group counseling are available to client who have academic, personal, interpersonal, career, or spiritual concerns.', NULL, '', '', 2, 0, 0),
(70, 'Consultation', 'The mutual sharing and analysis of information and ideas with the faculty, parents administration/management, to facilitate decision-making, action plans and strategies for helping the counselee', NULL, '', '', 2, 0, 0),
(71, 'Referral', 'The tapping of agencies, organizations or individuals that may be of better assistance in the counselees resolution of problems and attainment of full potential of the student.', NULL, '', '', 2, 0, 0),
(72, 'Follow up', 'The appraisal of how counselees who have been counseled, placed, or referred or have graduated are doing, to determine whether further assistance is needed.', NULL, '', '', 2, 0, 0),
(73, 'Program Development', 'The assessment of needs, planning, and provision of a systematic program for the delivery of services.', NULL, '', '', 2, 0, 0),
(74, 'Wellness and Other Enrichment Program', 'In response to the needs of each person for a healthy mind, body, and spirit, this program is intended to achieve the total development of person through methods such as lecturers, seminars, workshops, small group discussion and film viewing.', NULL, '', '', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `peer_facilitator`
--

CREATE TABLE `peer_facilitator` (
  `pf_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `extname` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `yearinschool` varchar(50) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photoalbum`
--

CREATE TABLE `photoalbum` (
  `paid` int(11) NOT NULL,
  `photo` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photoalbum`
--

INSERT INTO `photoalbum` (`paid`, `photo`, `datecreated`, `status`) VALUES
(1, 'wmsuimg.jfif', '2021-10-30 13:24:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `ref_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `ref_hist` int(11) NOT NULL,
  `yrsec` text NOT NULL,
  `class` text NOT NULL,
  `parent` text NOT NULL,
  `celtel_no` varchar(50) NOT NULL,
  `prob` text NOT NULL,
  `frequency` text NOT NULL,
  `remarks` text NOT NULL,
  `refby` text NOT NULL,
  `action_taken` text NOT NULL,
  `date_set` date NOT NULL,
  `type` text NOT NULL,
  `status` int(11) NOT NULL,
  `cs` int(11) NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`ref_id`, `stud_id`, `ref_hist`, `yrsec`, `class`, `parent`, `celtel_no`, `prob`, `frequency`, `remarks`, `refby`, `action_taken`, `date_set`, `type`, `status`, `cs`, `CollegeId`, `semester`) VALUES
(7, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'class', 5, 0, 0, '0'),
(8, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'yearsec', 5, 0, 0, '0'),
(9, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'parent', 5, 0, 0, '0'),
(10, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'telno', 5, 0, 0, '0'),
(11, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'dateset', 5, 0, 0, '0'),
(12, 0, 0, '', '', '', '', 'Absences', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(13, 0, 0, '', '', '', '', 'Failing Grades', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(14, 0, 0, '', '', '', '', 'Poor Study Habits', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(15, 0, 0, '', '', '', '', 'Mental or Physical Health Problems', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(16, 0, 0, '', '', '', '', 'Evidence of Emotional Disturbance', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(17, 0, 0, '', '', '', '', 'Deviant Behavior (Specify)', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(18, 0, 0, '', '', '', '', 'Career/Course Choice Problem', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(19, 0, 0, '', '', '', '', 'Scholarship/Students Asst. Problem', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(20, 0, 0, '', '', '', '', 'Social Relationship', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(21, 0, 0, '', '', '', '', 'Others', '', '', '', '', '2022-02-10', 'table', 5, 0, 0, '0'),
(22, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'referredby', 5, 0, 0, '0'),
(23, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-10', 'actiontaken', 5, 0, 0, '0'),
(145, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'father', 5, 1, 0, '0'),
(146, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'mother', 5, 1, 0, '0'),
(147, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'guardian', 5, 1, 0, '0'),
(148, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'noofbrother', 5, 1, 0, '0'),
(149, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'noofsister', 5, 1, 0, '0'),
(150, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'ordinalposition', 5, 1, 0, '0'),
(151, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'referredby', 5, 1, 0, '0'),
(152, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'sotp', 5, 1, 0, '0'),
(153, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'evaluation', 5, 1, 0, '0'),
(154, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'actiontaken', 5, 1, 0, '0'),
(155, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'followup', 5, 1, 0, '0'),
(996, 0, 0, '', '', '', '', '', '', '', '', '', '2022-02-11', 'gcsignature', 5, 1, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `referral_history`
--

CREATE TABLE `referral_history` (
  `rh_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `datecreated` date NOT NULL,
  `subject` text NOT NULL,
  `CollegeId` int(11) NOT NULL,
  `referred_by` text NOT NULL,
  `status` int(11) NOT NULL,
  `semester` text NOT NULL,
  `coordinator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduler`
--

CREATE TABLE `scheduler` (
  `sched_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date_valid` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sem_year`
--

CREATE TABLE `sem_year` (
  `sy_id` int(11) NOT NULL,
  `sy_type` varchar(50) NOT NULL,
  `month_start` varchar(50) NOT NULL,
  `month_end` varchar(50) NOT NULL,
  `m_start` int(11) NOT NULL,
  `m_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem_year`
--

INSERT INTO `sem_year` (`sy_id`, `sy_type`, `month_start`, `month_end`, `m_start`, `m_end`) VALUES
(1, 'summer', 'mid-May', 'mid-July', 10, 14),
(2, 'first semester', 'August', 'December', 15, 23),
(3, 'second semester', 'January', 'May', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sf_content`
--

CREATE TABLE `sf_content` (
  `sfid` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `type` text NOT NULL,
  `datecreated` date NOT NULL,
  `status` int(11) NOT NULL,
  `sfs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sf_content`
--

INSERT INTO `sf_content` (`sfid`, `stud_id`, `content`, `type`, `datecreated`, `status`, `sfs`) VALUES
(1, 0, '', 'cet', '2022-02-15', 0, 0),
(2, 0, '', 'aptitude', '2022-02-15', 0, 0),
(4, 0, '', 'date', '2022-02-15', 0, 0),
(5, 0, '', 'dean_s', '2022-02-15', 0, 0),
(7, 0, '', 'dean_s3', '2022-02-15', 0, 0),
(9, 0, '', '1', '2022-02-15', 0, 0),
(10, 0, '', '2', '2022-02-15', 0, 0),
(11, 0, '', '3', '2022-02-15', 0, 0),
(12, 0, '', '4', '2022-02-15', 0, 0),
(13, 0, '', '5', '2022-02-15', 0, 0),
(14, 0, '', 'date2', '2022-02-16', 0, 0),
(15, 0, '', 'date3', '2022-02-19', 0, 0),
(16, 0, '', 'dean', '2022-02-18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shifting_history`
--

CREATE TABLE `shifting_history` (
  `sh_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `from_college` text NOT NULL,
  `to_college` text NOT NULL,
  `from_course` int(11) NOT NULL,
  `to_course` int(11) NOT NULL,
  `from_` int(11) NOT NULL,
  `to_` int(11) NOT NULL,
  `datecreated` date NOT NULL,
  `dateapproved` date DEFAULT NULL,
  `shiftcount` int(11) NOT NULL,
  `status` text NOT NULL,
  `semester` text NOT NULL,
  `coordinator` int(11) NOT NULL,
  `choice_course1` int(11) NOT NULL,
  `choice_course2` int(11) NOT NULL,
  `choice_course3` int(11) NOT NULL,
  `r1` text NOT NULL,
  `r2` text NOT NULL,
  `r3` text NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `reason` text NOT NULL,
  `suggestion_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_lname` varchar(50) NOT NULL,
  `stud_fname` varchar(50) NOT NULL,
  `stud_mname` varchar(50) NOT NULL,
  `stud_email` varchar(100) NOT NULL,
  `age` text NOT NULL,
  `gender` text NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `status` text NOT NULL,
  `contact_no` text NOT NULL,
  `street` text NOT NULL,
  `barangay` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `zipcode` text NOT NULL,
  `stud_course` int(11) NOT NULL,
  `stud_college` int(11) NOT NULL,
  `photo` text DEFAULT NULL,
  `fl` int(11) NOT NULL,
  `pds_filled` int(11) NOT NULL,
  `pds_filledsem` text NOT NULL,
  `pdsfilleddate` date DEFAULT NULL,
  `pdsmodified` date DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `isverified` int(11) NOT NULL,
  `shiftcount` int(11) NOT NULL,
  `referral_subj` text NOT NULL,
  `retake` int(11) NOT NULL,
  `modify` int(11) NOT NULL,
  `upt` int(11) NOT NULL,
  `lg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tablechoices`
--

CREATE TABLE `tablechoices` (
  `tble_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablechoices`
--

INSERT INTO `tablechoices` (`tble_id`, `tc_id`, `form_id`, `content`) VALUES
(471, 461, 2119, 'Untitled table header'),
(472, 461, 2119, 'Untitled table header'),
(473, 461, 2119, 'Untitled table header'),
(510, 483, 2565, 'Untitled table header'),
(511, 483, 2565, 'Untitled table header'),
(512, 483, 2565, 'Untitled table header'),
(513, 487, 2685, 'Untitled table header'),
(514, 487, 2685, 'Untitled table header'),
(515, 487, 2685, 'Untitled table header'),
(516, 489, 2670, 'Untitled table header'),
(517, 489, 2670, 'Untitled table header'),
(518, 489, 2670, 'Untitled table header'),
(543, 509, 2764, 'Untitled table header'),
(544, 509, 2764, 'Untitled table header'),
(545, 509, 2764, 'Untitled table header'),
(546, 511, 2846, 'Member of Family'),
(547, 511, 2846, 'Children'),
(548, 511, 2846, 'Relatives'),
(549, 511, 2846, 'House Helpers'),
(550, 511, 2846, 'Guardian if not leaving with parents'),
(551, 511, 2846, 'Relatives'),
(552, 513, 2849, 'Name'),
(553, 513, 2849, 'Sex'),
(554, 513, 2849, 'Age'),
(555, 513, 2849, 'Civil Status'),
(556, 513, 2849, 'School/Occupation'),
(557, 513, 2849, 'Grade/year/Company/Firm'),
(558, 520, 2851, 'School'),
(559, 520, 2851, 'Date of Attendance'),
(560, 520, 2851, 'Grade/Year Level'),
(561, 520, 2851, 'Honors/ Award Received'),
(562, 525, 2852, 'H.S Subjects liked'),
(563, 525, 2852, 'Grade'),
(564, 525, 2852, 'Subjects Disliked'),
(565, 525, 2852, 'Grade'),
(566, 529, 2881, 'On Campus'),
(567, 529, 2881, 'Off Campus'),
(569, 531, 2891, 'when?'),
(570, 531, 2891, 'whom?'),
(572, 533, 2894, 'NAME'),
(573, 533, 2894, 'OCCUPATION'),
(575, 533, 2894, 'ADDRESS'),
(576, 537, 3022, 'Members of  family'),
(577, 537, 3022, 'Relatives'),
(578, 537, 3022, 'Children'),
(579, 537, 3022, 'House helpers'),
(580, 541, 3025, 'Name'),
(581, 541, 3025, 'Sex'),
(582, 541, 3025, 'Age'),
(583, 541, 3025, 'Civil Status'),
(584, 541, 3025, 'School/Occupation'),
(585, 541, 3025, 'Grade or Year/Company or firm'),
(586, 548, 3028, 'School'),
(587, 548, 3028, 'Date of Attendance'),
(588, 548, 3028, 'Grade/Year Level'),
(589, 548, 3028, 'Honors/Awards Received'),
(590, 554, 3029, 'H.S. Subjects liked'),
(591, 554, 3029, 'Grade'),
(592, 554, 3029, 'Subjects Disliked'),
(593, 554, 3029, 'Grade'),
(594, 558, 3073, 'Name'),
(595, 558, 3073, 'Occupation'),
(596, 558, 3073, 'Address'),
(601, 565, 3157, 'Untitled table header'),
(602, 565, 3157, 'Untitled table header'),
(603, 565, 3157, 'Untitled table header'),
(604, 567, 3228, ''),
(605, 567, 3228, 'Father'),
(606, 567, 3228, 'Mother'),
(607, 567, 3228, 'Spouse(if married)'),
(609, 580, 3232, 'Members of family'),
(610, 580, 3232, 'Relatives'),
(611, 580, 3232, 'Children'),
(612, 580, 3232, 'House Helpers'),
(613, 582, 3235, 'Name'),
(614, 582, 3235, 'Sex'),
(615, 582, 3235, 'Age'),
(616, 582, 3235, 'Civil Status'),
(617, 582, 3235, 'School/Occupation'),
(618, 582, 3235, 'Grade or Year/Company or Firm'),
(619, 589, 3237, 'School'),
(620, 589, 3237, 'Date of Attendance'),
(622, 589, 3237, 'Grade/Year Level'),
(623, 589, 3237, 'Honors/Awards Received'),
(626, 594, 3238, 'High School Subjects Liked'),
(627, 594, 3238, 'Grade'),
(628, 594, 3238, 'Subjects Disliked'),
(629, 594, 3238, 'Grade'),
(630, 598, 3280, 'Name'),
(631, 598, 3280, 'Occupation'),
(632, 598, 3280, 'Address'),
(639, 606, 3339, ''),
(640, 606, 3339, 'Father'),
(641, 606, 3339, 'Mother'),
(642, 606, 3339, 'Spouse (If Married)'),
(643, 611, 3375, ''),
(644, 611, 3375, 'Father'),
(645, 611, 3375, 'Mother'),
(646, 611, 3375, 'Spouse ( if Married )'),
(650, 623, 3384, 'Name'),
(651, 623, 3384, 'Relation'),
(653, 625, 3389, 'Name'),
(654, 625, 3389, 'Sex'),
(655, 625, 3389, 'Age'),
(656, 625, 3389, 'Civil Status'),
(657, 625, 3389, 'School/Occupation'),
(658, 625, 3389, 'Grade or year Company or Firm'),
(659, 632, 3392, 'School'),
(660, 632, 3392, 'Date of Attendance'),
(661, 632, 3392, 'Grade/Year Level'),
(662, 632, 3392, 'Honors Award Received'),
(663, 637, 3393, 'Subject'),
(664, 637, 3393, 'Grade'),
(667, 641, 3394, 'Subject'),
(668, 641, 3394, 'Grade'),
(670, 643, 3400, 'Course'),
(671, 643, 3400, 'Major'),
(673, 645, 3438, 'NAME'),
(674, 645, 3438, 'OCCUPATION'),
(675, 645, 3438, 'ADDRESS'),
(676, 650, 3460, 'College'),
(677, 650, 3460, 'Department');

-- --------------------------------------------------------

--
-- Table structure for table `tablecolumn_content`
--

CREATE TABLE `tablecolumn_content` (
  `tcontent_id` int(11) NOT NULL,
  `tble_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `content` text NOT NULL,
  `typ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablecolumn_content`
--

INSERT INTO `tablecolumn_content` (`tcontent_id`, `tble_id`, `tc_id`, `formid`, `content`, `typ`) VALUES
(1397, 471, 462, 2119, 'Supporting Contents', 0),
(1398, 472, 462, 2119, 'Supporting Contents', 0),
(1399, 473, 462, 2119, 'Supporting Contents', 0),
(1429, 0, 0, 2570, 'Untitle list', 1),
(1430, 0, 0, 2570, 'Untitle list', 1),
(1431, 0, 0, 2570, 'Untitle list', 1),
(1469, 510, 462, 2565, 'Supporting Contents', 0),
(1470, 510, 484, 2565, 'Supporting Contents', 0),
(1471, 510, 485, 2565, 'Supporting Contents', 0),
(1472, 510, 486, 2565, 'Supporting Contents', 0),
(1473, 511, 462, 2565, 'Supporting Contents', 0),
(1474, 511, 484, 2565, 'Supporting Contents', 0),
(1475, 511, 485, 2565, 'Supporting Contents', 0),
(1476, 511, 486, 2565, 'Supporting Contents', 0),
(1477, 512, 462, 2565, 'Supporting Contents', 0),
(1478, 512, 484, 2565, 'Supporting Contents', 0),
(1479, 512, 485, 2565, 'Supporting Contents', 0),
(1480, 512, 486, 2565, 'Supporting Contents', 0),
(1481, 513, 488, 2685, 'Supporting Contents', 0),
(1482, 514, 488, 2685, 'Supporting Contents', 0),
(1483, 515, 488, 2685, 'Supporting Contents', 0),
(1484, 516, 490, 2670, 'Supporting Contents', 0),
(1485, 517, 490, 2670, 'Supporting Contents', 0),
(1486, 518, 490, 2670, 'Supporting Contents', 0),
(1523, 543, 510, 2764, 'Supporting Contents', 0),
(1524, 544, 510, 2764, 'Supporting Contents', 0),
(1525, 545, 510, 2764, 'Supporting Contents', 0),
(1526, 0, 0, 2734, 'Untitle list', 1),
(1527, 0, 0, 2734, 'Untitle list', 1),
(1528, 0, 0, 2734, 'Untitle list', 1),
(1529, 546, 512, 2846, 'Supporting Contents', 0),
(1530, 547, 512, 2846, 'Supporting Contents', 0),
(1531, 548, 512, 2846, 'Supporting Contents', 0),
(1532, 549, 462, 2846, 'Supporting Contents', 0),
(1533, 549, 484, 2846, 'Supporting Contents', 0),
(1534, 549, 485, 2846, 'Supporting Contents', 0),
(1535, 549, 486, 2846, 'Supporting Contents', 0),
(1536, 549, 488, 2846, 'Supporting Contents', 0),
(1537, 549, 490, 2846, 'Supporting Contents', 0),
(1538, 549, 510, 2846, 'Supporting Contents', 0),
(1539, 549, 512, 2846, 'Supporting Contents', 0),
(1540, 550, 462, 2846, 'Supporting Contents', 0),
(1541, 550, 484, 2846, 'Supporting Contents', 0),
(1542, 550, 485, 2846, 'Supporting Contents', 0),
(1543, 550, 486, 2846, 'Supporting Contents', 0),
(1544, 550, 488, 2846, 'Supporting Contents', 0),
(1545, 550, 490, 2846, 'Supporting Contents', 0),
(1546, 550, 510, 2846, 'Supporting Contents', 0),
(1547, 550, 512, 2846, 'Supporting Contents', 0),
(1548, 551, 462, 2846, 'Supporting Contents', 0),
(1549, 551, 484, 2846, 'Supporting Contents', 0),
(1550, 551, 485, 2846, 'Supporting Contents', 0),
(1551, 551, 486, 2846, 'Supporting Contents', 0),
(1552, 551, 488, 2846, 'Supporting Contents', 0),
(1553, 551, 490, 2846, 'Supporting Contents', 0),
(1554, 551, 510, 2846, 'Supporting Contents', 0),
(1555, 551, 512, 2846, 'Supporting Contents', 0),
(1556, 552, 514, 2849, 'Supporting Contents', 0),
(1557, 553, 514, 2849, 'Supporting Contents', 0),
(1558, 554, 514, 2849, 'Supporting Contents', 0),
(1559, 555, 462, 2849, 'Supporting Contents', 0),
(1560, 555, 484, 2849, 'Supporting Contents', 0),
(1561, 555, 485, 2849, 'Supporting Contents', 0),
(1562, 555, 486, 2849, 'Supporting Contents', 0),
(1563, 555, 488, 2849, 'Supporting Contents', 0),
(1564, 555, 490, 2849, 'Supporting Contents', 0),
(1565, 555, 510, 2849, 'Supporting Contents', 0),
(1566, 555, 512, 2849, 'Supporting Contents', 0),
(1567, 555, 514, 2849, 'Supporting Contents', 0),
(1568, 556, 462, 2849, 'Supporting Contents', 0),
(1569, 556, 484, 2849, 'Supporting Contents', 0),
(1570, 556, 485, 2849, 'Supporting Contents', 0),
(1571, 556, 486, 2849, 'Supporting Contents', 0),
(1572, 556, 488, 2849, 'Supporting Contents', 0),
(1573, 556, 490, 2849, 'Supporting Contents', 0),
(1574, 556, 510, 2849, 'Supporting Contents', 0),
(1575, 556, 512, 2849, 'Supporting Contents', 0),
(1576, 556, 514, 2849, 'Supporting Contents', 0),
(1577, 557, 462, 2849, 'Supporting Contents', 0),
(1578, 557, 484, 2849, 'Supporting Contents', 0),
(1579, 557, 485, 2849, 'Supporting Contents', 0),
(1580, 557, 486, 2849, 'Supporting Contents', 0),
(1581, 557, 488, 2849, 'Supporting Contents', 0),
(1582, 557, 490, 2849, 'Supporting Contents', 0),
(1583, 557, 510, 2849, 'Supporting Contents', 0),
(1584, 557, 512, 2849, 'Supporting Contents', 0),
(1585, 557, 514, 2849, 'Supporting Contents', 0),
(1586, 552, 515, 2849, 'Supporting Contents', 0),
(1587, 553, 515, 2849, 'Supporting Contents', 0),
(1588, 554, 515, 2849, 'Supporting Contents', 0),
(1589, 555, 515, 2849, 'Supporting Contents', 0),
(1590, 556, 515, 2849, 'Supporting Contents', 0),
(1591, 557, 515, 2849, 'Supporting Contents', 0),
(1592, 552, 516, 2849, 'Supporting Contents', 0),
(1593, 553, 516, 2849, 'Supporting Contents', 0),
(1594, 554, 516, 2849, 'Supporting Contents', 0),
(1595, 555, 516, 2849, 'Supporting Contents', 0),
(1596, 556, 516, 2849, 'Supporting Contents', 0),
(1597, 557, 516, 2849, 'Supporting Contents', 0),
(1598, 552, 517, 2849, 'Supporting Contents', 0),
(1599, 553, 517, 2849, 'Supporting Contents', 0),
(1600, 554, 517, 2849, 'Supporting Contents', 0),
(1601, 555, 517, 2849, 'Supporting Contents', 0),
(1602, 556, 517, 2849, 'Supporting Contents', 0),
(1603, 557, 517, 2849, 'Supporting Contents', 0),
(1604, 552, 518, 2849, 'Supporting Contents', 0),
(1605, 553, 518, 2849, 'Supporting Contents', 0),
(1606, 554, 518, 2849, 'Supporting Contents', 0),
(1607, 555, 518, 2849, 'Supporting Contents', 0),
(1608, 556, 518, 2849, 'Supporting Contents', 0),
(1609, 557, 518, 2849, 'Supporting Contents', 0),
(1610, 552, 519, 2849, 'Supporting Contents', 0),
(1611, 553, 519, 2849, 'Supporting Contents', 0),
(1612, 554, 519, 2849, 'Supporting Contents', 0),
(1613, 555, 519, 2849, 'Supporting Contents', 0),
(1614, 556, 519, 2849, 'Supporting Contents', 0),
(1615, 557, 519, 2849, 'Supporting Contents', 0),
(1616, 558, 521, 2851, 'Supporting Contents', 0),
(1617, 559, 521, 2851, 'Supporting Contents', 0),
(1618, 560, 521, 2851, 'Supporting Contents', 0),
(1619, 561, 462, 2851, 'Supporting Contents', 0),
(1620, 561, 484, 2851, 'Supporting Contents', 0),
(1621, 561, 485, 2851, 'Supporting Contents', 0),
(1622, 561, 486, 2851, 'Supporting Contents', 0),
(1623, 561, 488, 2851, 'Supporting Contents', 0),
(1624, 561, 490, 2851, 'Supporting Contents', 0),
(1625, 561, 510, 2851, 'Supporting Contents', 0),
(1626, 561, 512, 2851, 'Supporting Contents', 0),
(1627, 561, 514, 2851, 'Supporting Contents', 0),
(1628, 561, 515, 2851, 'Supporting Contents', 0),
(1629, 561, 516, 2851, 'Supporting Contents', 0),
(1630, 561, 517, 2851, 'Supporting Contents', 0),
(1631, 561, 518, 2851, 'Supporting Contents', 0),
(1632, 561, 519, 2851, 'Supporting Contents', 0),
(1633, 561, 521, 2851, 'Supporting Contents', 0),
(1634, 558, 522, 2851, 'Supporting Contents', 0),
(1635, 559, 522, 2851, 'Supporting Contents', 0),
(1636, 560, 522, 2851, 'Supporting Contents', 0),
(1637, 561, 522, 2851, 'Supporting Contents', 0),
(1638, 558, 523, 2851, 'Supporting Contents', 0),
(1639, 559, 523, 2851, 'Supporting Contents', 0),
(1640, 560, 523, 2851, 'Supporting Contents', 0),
(1641, 561, 523, 2851, 'Supporting Contents', 0),
(1642, 558, 524, 2851, 'Supporting Contents', 0),
(1643, 559, 524, 2851, 'Supporting Contents', 0),
(1644, 560, 524, 2851, 'Supporting Contents', 0),
(1645, 561, 524, 2851, 'Supporting Contents', 0),
(1646, 562, 526, 2852, 'Supporting Contents', 0),
(1647, 563, 526, 2852, 'Supporting Contents', 0),
(1648, 564, 526, 2852, 'Supporting Contents', 0),
(1649, 565, 462, 2852, 'Supporting Contents', 0),
(1650, 565, 484, 2852, 'Supporting Contents', 0),
(1651, 565, 485, 2852, 'Supporting Contents', 0),
(1652, 565, 486, 2852, 'Supporting Contents', 0),
(1653, 565, 488, 2852, 'Supporting Contents', 0),
(1654, 565, 490, 2852, 'Supporting Contents', 0),
(1655, 565, 510, 2852, 'Supporting Contents', 0),
(1656, 565, 512, 2852, 'Supporting Contents', 0),
(1657, 565, 514, 2852, 'Supporting Contents', 0),
(1658, 565, 515, 2852, 'Supporting Contents', 0),
(1659, 565, 516, 2852, 'Supporting Contents', 0),
(1660, 565, 517, 2852, 'Supporting Contents', 0),
(1661, 565, 518, 2852, 'Supporting Contents', 0),
(1662, 565, 519, 2852, 'Supporting Contents', 0),
(1663, 565, 521, 2852, 'Supporting Contents', 0),
(1664, 565, 522, 2852, 'Supporting Contents', 0),
(1665, 565, 523, 2852, 'Supporting Contents', 0),
(1666, 565, 524, 2852, 'Supporting Contents', 0),
(1667, 565, 526, 2852, 'Supporting Contents', 0),
(1668, 562, 527, 2852, 'Supporting Contents', 0),
(1669, 563, 527, 2852, 'Supporting Contents', 0),
(1670, 564, 527, 2852, 'Supporting Contents', 0),
(1671, 565, 527, 2852, 'Supporting Contents', 0),
(1672, 562, 528, 2852, 'Supporting Contents', 0),
(1673, 563, 528, 2852, 'Supporting Contents', 0),
(1674, 564, 528, 2852, 'Supporting Contents', 0),
(1675, 565, 528, 2852, 'Supporting Contents', 0),
(1676, 0, 0, 2855, 'Untitle list', 1),
(1677, 0, 0, 2855, 'Untitle list', 1),
(1678, 0, 0, 2855, 'Untitle list', 1),
(1679, 0, 0, 2860, 'Untitle list', 1),
(1680, 0, 0, 2860, 'Untitle list', 1),
(1681, 0, 0, 2860, 'Untitle list', 1),
(1682, 566, 530, 2881, 'Supporting Contents', 0),
(1683, 567, 530, 2881, 'Supporting Contents', 0),
(1685, 569, 532, 2891, 'Supporting Contents', 0),
(1686, 570, 532, 2891, 'Supporting Contents', 0),
(1688, 0, 0, 2892, 'Untitle list', 1),
(1689, 0, 0, 2892, 'Untitle list', 1),
(1690, 0, 0, 2892, 'Untitle list', 1),
(1691, 572, 534, 2894, 'Supporting Contents', 0),
(1692, 573, 534, 2894, 'Supporting Contents', 0),
(1694, 575, 462, 2894, 'Supporting Contents', 0),
(1695, 575, 484, 2894, 'Supporting Contents', 0),
(1696, 575, 485, 2894, 'Supporting Contents', 0),
(1697, 575, 486, 2894, 'Supporting Contents', 0),
(1698, 575, 488, 2894, 'Supporting Contents', 0),
(1699, 575, 490, 2894, 'Supporting Contents', 0),
(1700, 575, 510, 2894, 'Supporting Contents', 0),
(1701, 575, 512, 2894, 'Supporting Contents', 0),
(1702, 575, 514, 2894, 'Supporting Contents', 0),
(1703, 575, 515, 2894, 'Supporting Contents', 0),
(1704, 575, 516, 2894, 'Supporting Contents', 0),
(1705, 575, 517, 2894, 'Supporting Contents', 0),
(1706, 575, 518, 2894, 'Supporting Contents', 0),
(1707, 575, 519, 2894, 'Supporting Contents', 0),
(1708, 575, 521, 2894, 'Supporting Contents', 0),
(1709, 575, 522, 2894, 'Supporting Contents', 0),
(1710, 575, 523, 2894, 'Supporting Contents', 0),
(1711, 575, 524, 2894, 'Supporting Contents', 0),
(1712, 575, 526, 2894, 'Supporting Contents', 0),
(1713, 575, 527, 2894, 'Supporting Contents', 0),
(1714, 575, 528, 2894, 'Supporting Contents', 0),
(1715, 575, 530, 2894, 'Supporting Contents', 0),
(1716, 575, 532, 2894, 'Supporting Contents', 0),
(1717, 575, 534, 2894, 'Supporting Contents', 0),
(1718, 572, 535, 2894, 'Supporting Contents', 0),
(1719, 573, 535, 2894, 'Supporting Contents', 0),
(1720, 575, 535, 2894, 'Supporting Contents', 0),
(1721, 572, 536, 2894, 'Supporting Contents', 0),
(1722, 573, 536, 2894, 'Supporting Contents', 0),
(1723, 575, 536, 2894, 'Supporting Contents', 0),
(1733, 579, 462, 3022, 'Supporting Contents', 0),
(1734, 579, 484, 3022, 'Supporting Contents', 0),
(1735, 579, 485, 3022, 'Supporting Contents', 0),
(1736, 579, 486, 3022, 'Supporting Contents', 0),
(1737, 579, 488, 3022, 'Supporting Contents', 0),
(1738, 579, 490, 3022, 'Supporting Contents', 0),
(1739, 579, 510, 3022, 'Supporting Contents', 0),
(1740, 579, 512, 3022, 'Supporting Contents', 0),
(1741, 579, 514, 3022, 'Supporting Contents', 0),
(1742, 579, 515, 3022, 'Supporting Contents', 0),
(1743, 579, 516, 3022, 'Supporting Contents', 0),
(1744, 579, 517, 3022, 'Supporting Contents', 0),
(1745, 579, 518, 3022, 'Supporting Contents', 0),
(1746, 579, 519, 3022, 'Supporting Contents', 0),
(1747, 579, 521, 3022, 'Supporting Contents', 0),
(1748, 579, 522, 3022, 'Supporting Contents', 0),
(1749, 579, 523, 3022, 'Supporting Contents', 0),
(1750, 579, 524, 3022, 'Supporting Contents', 0),
(1751, 579, 526, 3022, 'Supporting Contents', 0),
(1752, 579, 527, 3022, 'Supporting Contents', 0),
(1753, 579, 528, 3022, 'Supporting Contents', 0),
(1754, 579, 530, 3022, 'Supporting Contents', 0),
(1755, 579, 532, 3022, 'Supporting Contents', 0),
(1756, 579, 534, 3022, 'Supporting Contents', 0),
(1757, 579, 535, 3022, 'Supporting Contents', 0),
(1758, 579, 536, 3022, 'Supporting Contents', 0),
(1760, 576, 540, 3022, 'Supporting Contents', 0),
(1761, 577, 540, 3022, 'Supporting Contents', 0),
(1762, 578, 540, 3022, 'Supporting Contents', 0),
(1763, 579, 540, 3022, 'Supporting Contents', 0),
(1764, 580, 542, 3025, 'Supporting Contents', 0),
(1765, 581, 542, 3025, 'Supporting Contents', 0),
(1766, 582, 542, 3025, 'Supporting Contents', 0),
(1767, 583, 462, 3025, 'Supporting Contents', 0),
(1768, 583, 484, 3025, 'Supporting Contents', 0),
(1769, 583, 485, 3025, 'Supporting Contents', 0),
(1770, 583, 486, 3025, 'Supporting Contents', 0),
(1771, 583, 488, 3025, 'Supporting Contents', 0),
(1772, 583, 490, 3025, 'Supporting Contents', 0),
(1773, 583, 510, 3025, 'Supporting Contents', 0),
(1774, 583, 512, 3025, 'Supporting Contents', 0),
(1775, 583, 514, 3025, 'Supporting Contents', 0),
(1776, 583, 515, 3025, 'Supporting Contents', 0),
(1777, 583, 516, 3025, 'Supporting Contents', 0),
(1778, 583, 517, 3025, 'Supporting Contents', 0),
(1779, 583, 518, 3025, 'Supporting Contents', 0),
(1780, 583, 519, 3025, 'Supporting Contents', 0),
(1781, 583, 521, 3025, 'Supporting Contents', 0),
(1782, 583, 522, 3025, 'Supporting Contents', 0),
(1783, 583, 523, 3025, 'Supporting Contents', 0),
(1784, 583, 524, 3025, 'Supporting Contents', 0),
(1785, 583, 526, 3025, 'Supporting Contents', 0),
(1786, 583, 527, 3025, 'Supporting Contents', 0),
(1787, 583, 528, 3025, 'Supporting Contents', 0),
(1788, 583, 530, 3025, 'Supporting Contents', 0),
(1789, 583, 532, 3025, 'Supporting Contents', 0),
(1790, 583, 534, 3025, 'Supporting Contents', 0),
(1791, 583, 535, 3025, 'Supporting Contents', 0),
(1792, 583, 536, 3025, 'Supporting Contents', 0),
(1793, 583, 540, 3025, 'Supporting Contents', 0),
(1794, 583, 542, 3025, 'Supporting Contents', 0),
(1795, 584, 462, 3025, 'Supporting Contents', 0),
(1796, 584, 484, 3025, 'Supporting Contents', 0),
(1797, 584, 485, 3025, 'Supporting Contents', 0),
(1798, 584, 486, 3025, 'Supporting Contents', 0),
(1799, 584, 488, 3025, 'Supporting Contents', 0),
(1800, 584, 490, 3025, 'Supporting Contents', 0),
(1801, 584, 510, 3025, 'Supporting Contents', 0),
(1802, 584, 512, 3025, 'Supporting Contents', 0),
(1803, 584, 514, 3025, 'Supporting Contents', 0),
(1804, 584, 515, 3025, 'Supporting Contents', 0),
(1805, 584, 516, 3025, 'Supporting Contents', 0),
(1806, 584, 517, 3025, 'Supporting Contents', 0),
(1807, 584, 518, 3025, 'Supporting Contents', 0),
(1808, 584, 519, 3025, 'Supporting Contents', 0),
(1809, 584, 521, 3025, 'Supporting Contents', 0),
(1810, 584, 522, 3025, 'Supporting Contents', 0),
(1811, 584, 523, 3025, 'Supporting Contents', 0),
(1812, 584, 524, 3025, 'Supporting Contents', 0),
(1813, 584, 526, 3025, 'Supporting Contents', 0),
(1814, 584, 527, 3025, 'Supporting Contents', 0),
(1815, 584, 528, 3025, 'Supporting Contents', 0),
(1816, 584, 530, 3025, 'Supporting Contents', 0),
(1817, 584, 532, 3025, 'Supporting Contents', 0),
(1818, 584, 534, 3025, 'Supporting Contents', 0),
(1819, 584, 535, 3025, 'Supporting Contents', 0),
(1820, 584, 536, 3025, 'Supporting Contents', 0),
(1821, 584, 540, 3025, 'Supporting Contents', 0),
(1822, 584, 542, 3025, 'Supporting Contents', 0),
(1823, 585, 462, 3025, 'Supporting Contents', 0),
(1824, 585, 484, 3025, 'Supporting Contents', 0),
(1825, 585, 485, 3025, 'Supporting Contents', 0),
(1826, 585, 486, 3025, 'Supporting Contents', 0),
(1827, 585, 488, 3025, 'Supporting Contents', 0),
(1828, 585, 490, 3025, 'Supporting Contents', 0),
(1829, 585, 510, 3025, 'Supporting Contents', 0),
(1830, 585, 512, 3025, 'Supporting Contents', 0),
(1831, 585, 514, 3025, 'Supporting Contents', 0),
(1832, 585, 515, 3025, 'Supporting Contents', 0),
(1833, 585, 516, 3025, 'Supporting Contents', 0),
(1834, 585, 517, 3025, 'Supporting Contents', 0),
(1835, 585, 518, 3025, 'Supporting Contents', 0),
(1836, 585, 519, 3025, 'Supporting Contents', 0),
(1837, 585, 521, 3025, 'Supporting Contents', 0),
(1838, 585, 522, 3025, 'Supporting Contents', 0),
(1839, 585, 523, 3025, 'Supporting Contents', 0),
(1840, 585, 524, 3025, 'Supporting Contents', 0),
(1841, 585, 526, 3025, 'Supporting Contents', 0),
(1842, 585, 527, 3025, 'Supporting Contents', 0),
(1843, 585, 528, 3025, 'Supporting Contents', 0),
(1844, 585, 530, 3025, 'Supporting Contents', 0),
(1845, 585, 532, 3025, 'Supporting Contents', 0),
(1846, 585, 534, 3025, 'Supporting Contents', 0),
(1847, 585, 535, 3025, 'Supporting Contents', 0),
(1848, 585, 536, 3025, 'Supporting Contents', 0),
(1849, 585, 540, 3025, 'Supporting Contents', 0),
(1850, 585, 542, 3025, 'Supporting Contents', 0),
(1851, 580, 543, 3025, 'Supporting Contents', 0),
(1852, 581, 543, 3025, 'Supporting Contents', 0),
(1853, 582, 543, 3025, 'Supporting Contents', 0),
(1854, 583, 543, 3025, 'Supporting Contents', 0),
(1855, 584, 543, 3025, 'Supporting Contents', 0),
(1856, 585, 543, 3025, 'Supporting Contents', 0),
(1857, 580, 544, 3025, 'Supporting Contents', 0),
(1858, 581, 544, 3025, 'Supporting Contents', 0),
(1859, 582, 544, 3025, 'Supporting Contents', 0),
(1860, 583, 544, 3025, 'Supporting Contents', 0),
(1861, 584, 544, 3025, 'Supporting Contents', 0),
(1862, 585, 544, 3025, 'Supporting Contents', 0),
(1863, 580, 545, 3025, 'Supporting Contents', 0),
(1864, 581, 545, 3025, 'Supporting Contents', 0),
(1865, 582, 545, 3025, 'Supporting Contents', 0),
(1866, 583, 545, 3025, 'Supporting Contents', 0),
(1867, 584, 545, 3025, 'Supporting Contents', 0),
(1868, 585, 545, 3025, 'Supporting Contents', 0),
(1869, 580, 546, 3025, 'Supporting Contents', 0),
(1870, 581, 546, 3025, 'Supporting Contents', 0),
(1871, 582, 546, 3025, 'Supporting Contents', 0),
(1872, 583, 546, 3025, 'Supporting Contents', 0),
(1873, 584, 546, 3025, 'Supporting Contents', 0),
(1874, 585, 546, 3025, 'Supporting Contents', 0),
(1875, 580, 547, 3025, 'Supporting Contents', 0),
(1876, 581, 547, 3025, 'Supporting Contents', 0),
(1877, 582, 547, 3025, 'Supporting Contents', 0),
(1878, 583, 547, 3025, 'Supporting Contents', 0),
(1879, 584, 547, 3025, 'Supporting Contents', 0),
(1880, 585, 547, 3025, 'Supporting Contents', 0),
(1881, 586, 549, 3028, 'Supporting Contents', 0),
(1882, 587, 549, 3028, 'Supporting Contents', 0),
(1883, 588, 549, 3028, 'Supporting Contents', 0),
(1884, 589, 462, 3028, 'Supporting Contents', 0),
(1885, 589, 484, 3028, 'Supporting Contents', 0),
(1886, 589, 485, 3028, 'Supporting Contents', 0),
(1887, 589, 486, 3028, 'Supporting Contents', 0),
(1888, 589, 488, 3028, 'Supporting Contents', 0),
(1889, 589, 490, 3028, 'Supporting Contents', 0),
(1890, 589, 510, 3028, 'Supporting Contents', 0),
(1891, 589, 512, 3028, 'Supporting Contents', 0),
(1892, 589, 514, 3028, 'Supporting Contents', 0),
(1893, 589, 515, 3028, 'Supporting Contents', 0),
(1894, 589, 516, 3028, 'Supporting Contents', 0),
(1895, 589, 517, 3028, 'Supporting Contents', 0),
(1896, 589, 518, 3028, 'Supporting Contents', 0),
(1897, 589, 519, 3028, 'Supporting Contents', 0),
(1898, 589, 521, 3028, 'Supporting Contents', 0),
(1899, 589, 522, 3028, 'Supporting Contents', 0),
(1900, 589, 523, 3028, 'Supporting Contents', 0),
(1901, 589, 524, 3028, 'Supporting Contents', 0),
(1902, 589, 526, 3028, 'Supporting Contents', 0),
(1903, 589, 527, 3028, 'Supporting Contents', 0),
(1904, 589, 528, 3028, 'Supporting Contents', 0),
(1905, 589, 530, 3028, 'Supporting Contents', 0),
(1906, 589, 532, 3028, 'Supporting Contents', 0),
(1907, 589, 534, 3028, 'Supporting Contents', 0),
(1908, 589, 535, 3028, 'Supporting Contents', 0),
(1909, 589, 536, 3028, 'Supporting Contents', 0),
(1910, 589, 540, 3028, 'Supporting Contents', 0),
(1911, 589, 542, 3028, 'Supporting Contents', 0),
(1912, 589, 543, 3028, 'Supporting Contents', 0),
(1913, 589, 544, 3028, 'Supporting Contents', 0),
(1914, 589, 545, 3028, 'Supporting Contents', 0),
(1915, 589, 546, 3028, 'Supporting Contents', 0),
(1916, 589, 547, 3028, 'Supporting Contents', 0),
(1917, 589, 549, 3028, 'Supporting Contents', 0),
(1918, 586, 550, 3028, 'Supporting Contents', 0),
(1919, 587, 550, 3028, 'Supporting Contents', 0),
(1920, 588, 550, 3028, 'Supporting Contents', 0),
(1921, 589, 550, 3028, 'Supporting Contents', 0),
(1922, 586, 551, 3028, 'Supporting Contents', 0),
(1923, 587, 551, 3028, 'Supporting Contents', 0),
(1924, 588, 551, 3028, 'Supporting Contents', 0),
(1925, 589, 551, 3028, 'Supporting Contents', 0),
(1926, 586, 552, 3028, 'Supporting Contents', 0),
(1927, 587, 552, 3028, 'Supporting Contents', 0),
(1928, 588, 552, 3028, 'Supporting Contents', 0),
(1929, 589, 552, 3028, 'Supporting Contents', 0),
(1930, 586, 553, 3028, 'Supporting Contents', 0),
(1931, 587, 553, 3028, 'Supporting Contents', 0),
(1932, 588, 553, 3028, 'Supporting Contents', 0),
(1933, 589, 553, 3028, 'Supporting Contents', 0),
(1934, 590, 555, 3029, 'Supporting Contents', 0),
(1935, 591, 555, 3029, 'Supporting Contents', 0),
(1936, 592, 555, 3029, 'Supporting Contents', 0),
(1937, 593, 462, 3029, 'Supporting Contents', 0),
(1938, 593, 484, 3029, 'Supporting Contents', 0),
(1939, 593, 485, 3029, 'Supporting Contents', 0),
(1940, 593, 486, 3029, 'Supporting Contents', 0),
(1941, 593, 488, 3029, 'Supporting Contents', 0),
(1942, 593, 490, 3029, 'Supporting Contents', 0),
(1943, 593, 510, 3029, 'Supporting Contents', 0),
(1944, 593, 512, 3029, 'Supporting Contents', 0),
(1945, 593, 514, 3029, 'Supporting Contents', 0),
(1946, 593, 515, 3029, 'Supporting Contents', 0),
(1947, 593, 516, 3029, 'Supporting Contents', 0),
(1948, 593, 517, 3029, 'Supporting Contents', 0),
(1949, 593, 518, 3029, 'Supporting Contents', 0),
(1950, 593, 519, 3029, 'Supporting Contents', 0),
(1951, 593, 521, 3029, 'Supporting Contents', 0),
(1952, 593, 522, 3029, 'Supporting Contents', 0),
(1953, 593, 523, 3029, 'Supporting Contents', 0),
(1954, 593, 524, 3029, 'Supporting Contents', 0),
(1955, 593, 526, 3029, 'Supporting Contents', 0),
(1956, 593, 527, 3029, 'Supporting Contents', 0),
(1957, 593, 528, 3029, 'Supporting Contents', 0),
(1958, 593, 530, 3029, 'Supporting Contents', 0),
(1959, 593, 532, 3029, 'Supporting Contents', 0),
(1960, 593, 534, 3029, 'Supporting Contents', 0),
(1961, 593, 535, 3029, 'Supporting Contents', 0),
(1962, 593, 536, 3029, 'Supporting Contents', 0),
(1963, 593, 540, 3029, 'Supporting Contents', 0),
(1964, 593, 542, 3029, 'Supporting Contents', 0),
(1965, 593, 543, 3029, 'Supporting Contents', 0),
(1966, 593, 544, 3029, 'Supporting Contents', 0),
(1967, 593, 545, 3029, 'Supporting Contents', 0),
(1968, 593, 546, 3029, 'Supporting Contents', 0),
(1969, 593, 547, 3029, 'Supporting Contents', 0),
(1970, 593, 549, 3029, 'Supporting Contents', 0),
(1971, 593, 550, 3029, 'Supporting Contents', 0),
(1972, 593, 551, 3029, 'Supporting Contents', 0),
(1973, 593, 552, 3029, 'Supporting Contents', 0),
(1974, 593, 553, 3029, 'Supporting Contents', 0),
(1975, 593, 555, 3029, 'Supporting Contents', 0),
(1976, 590, 556, 3029, 'Supporting Contents', 0),
(1977, 591, 556, 3029, 'Supporting Contents', 0),
(1978, 592, 556, 3029, 'Supporting Contents', 0),
(1979, 593, 556, 3029, 'Supporting Contents', 0),
(1980, 590, 557, 3029, 'Supporting Contents', 0),
(1981, 591, 557, 3029, 'Supporting Contents', 0),
(1982, 592, 557, 3029, 'Supporting Contents', 0),
(1983, 593, 557, 3029, 'Supporting Contents', 0),
(1987, 594, 559, 3073, 'Supporting Contents', 0),
(1988, 595, 559, 3073, 'Supporting Contents', 0),
(1989, 596, 559, 3073, 'Supporting Contents', 0),
(1990, 594, 560, 3073, 'Supporting Contents', 0),
(1991, 595, 560, 3073, 'Supporting Contents', 0),
(1992, 596, 560, 3073, 'Supporting Contents', 0),
(1993, 594, 561, 3073, 'Supporting Contents', 0),
(1994, 595, 561, 3073, 'Supporting Contents', 0),
(1995, 596, 561, 3073, 'Supporting Contents', 0),
(2048, 601, 566, 3157, 'Supporting Contents', 0),
(2049, 602, 566, 3157, 'Supporting Contents', 0),
(2050, 603, 566, 3157, 'Supporting Contents', 0),
(2054, 604, 568, 3228, 'Name', 0),
(2055, 605, 568, 3228, 'Supporting Contents', 0),
(2056, 606, 568, 3228, 'Supporting Contents', 0),
(2057, 607, 462, 3228, 'Supporting Contents', 0),
(2058, 607, 484, 3228, 'Supporting Contents', 0),
(2059, 607, 485, 3228, 'Supporting Contents', 0),
(2060, 607, 486, 3228, 'Supporting Contents', 0),
(2061, 607, 488, 3228, 'Supporting Contents', 0),
(2062, 607, 490, 3228, 'Supporting Contents', 0),
(2063, 607, 510, 3228, 'Supporting Contents', 0),
(2064, 607, 512, 3228, 'Supporting Contents', 0),
(2065, 607, 514, 3228, 'Supporting Contents', 0),
(2066, 607, 515, 3228, 'Supporting Contents', 0),
(2067, 607, 516, 3228, 'Supporting Contents', 0),
(2068, 607, 517, 3228, 'Supporting Contents', 0),
(2069, 607, 518, 3228, 'Supporting Contents', 0),
(2070, 607, 519, 3228, 'Supporting Contents', 0),
(2071, 607, 521, 3228, 'Supporting Contents', 0),
(2072, 607, 522, 3228, 'Supporting Contents', 0),
(2073, 607, 523, 3228, 'Supporting Contents', 0),
(2074, 607, 524, 3228, 'Supporting Contents', 0),
(2075, 607, 526, 3228, 'Supporting Contents', 0),
(2076, 607, 527, 3228, 'Supporting Contents', 0),
(2077, 607, 528, 3228, 'Supporting Contents', 0),
(2078, 607, 530, 3228, 'Supporting Contents', 0),
(2079, 607, 532, 3228, 'Supporting Contents', 0),
(2080, 607, 534, 3228, 'Supporting Contents', 0),
(2081, 607, 535, 3228, 'Supporting Contents', 0),
(2082, 607, 536, 3228, 'Supporting Contents', 0),
(2083, 607, 540, 3228, 'Supporting Contents', 0),
(2084, 607, 542, 3228, 'Supporting Contents', 0),
(2085, 607, 543, 3228, 'Supporting Contents', 0),
(2086, 607, 544, 3228, 'Supporting Contents', 0),
(2087, 607, 545, 3228, 'Supporting Contents', 0),
(2088, 607, 546, 3228, 'Supporting Contents', 0),
(2089, 607, 547, 3228, 'Supporting Contents', 0),
(2090, 607, 549, 3228, 'Supporting Contents', 0),
(2091, 607, 550, 3228, 'Supporting Contents', 0),
(2092, 607, 551, 3228, 'Supporting Contents', 0),
(2093, 607, 552, 3228, 'Supporting Contents', 0),
(2094, 607, 553, 3228, 'Supporting Contents', 0),
(2095, 607, 555, 3228, 'Supporting Contents', 0),
(2096, 607, 556, 3228, 'Supporting Contents', 0),
(2097, 607, 557, 3228, 'Supporting Contents', 0),
(2098, 607, 559, 3228, 'Supporting Contents', 0),
(2099, 607, 560, 3228, 'Supporting Contents', 0),
(2100, 607, 561, 3228, 'Supporting Contents', 0),
(2101, 607, 566, 3228, 'Supporting Contents', 0),
(2102, 607, 568, 3228, 'Supporting Contents', 0),
(2149, 604, 569, 3228, 'Place of Birth', 0),
(2150, 605, 569, 3228, 'Supporting Contents', 0),
(2151, 606, 569, 3228, 'Supporting Contents', 0),
(2152, 607, 569, 3228, 'Supporting Contents', 0),
(2153, 604, 570, 3228, 'Age', 0),
(2154, 605, 570, 3228, 'Supporting Contents', 0),
(2155, 606, 570, 3228, 'Supporting Contents', 0),
(2156, 607, 570, 3228, 'Supporting Contents', 0),
(2157, 604, 571, 3228, 'Address', 0),
(2158, 605, 571, 3228, 'Supporting Contents', 0),
(2159, 606, 571, 3228, 'Supporting Contents', 0),
(2160, 607, 571, 3228, 'Supporting Contents', 0),
(2161, 604, 572, 3228, 'Tel. No.', 0),
(2162, 605, 572, 3228, 'Supporting Contents', 0),
(2163, 606, 572, 3228, 'Supporting Contents', 0),
(2164, 607, 572, 3228, 'Supporting Contents', 0),
(2165, 604, 573, 3228, 'Religion', 0),
(2166, 605, 573, 3228, 'Supporting Contents', 0),
(2167, 606, 573, 3228, 'Supporting Contents', 0),
(2168, 607, 573, 3228, 'Supporting Contents', 0),
(2169, 604, 574, 3228, 'Nationality', 0),
(2170, 605, 574, 3228, 'Supporting Contents', 0),
(2171, 606, 574, 3228, 'Supporting Contents', 0),
(2172, 607, 574, 3228, 'Supporting Contents', 0),
(2173, 604, 575, 3228, 'Occupation', 0),
(2174, 605, 575, 3228, 'Supporting Contents', 0),
(2175, 606, 575, 3228, 'Supporting Contents', 0),
(2176, 607, 575, 3228, 'Supporting Contents', 0),
(2177, 604, 576, 3228, 'Name of Firm/Employer', 0),
(2178, 605, 576, 3228, 'Supporting Contents', 0),
(2179, 606, 576, 3228, 'Supporting Contents', 0),
(2180, 607, 576, 3228, 'Supporting Contents', 0),
(2181, 604, 577, 3228, 'Highest Degree/Grade', 0),
(2182, 605, 577, 3228, 'Supporting Contents', 0),
(2183, 606, 577, 3228, 'Supporting Contents', 0),
(2184, 607, 577, 3228, 'Supporting Contents', 0),
(2185, 604, 578, 3228, 'Schools Attended', 0),
(2186, 605, 578, 3228, 'Supporting Contents', 0),
(2187, 606, 578, 3228, 'Supporting Contents', 0),
(2188, 607, 578, 3228, 'Supporting Contents', 0),
(2189, 604, 579, 3228, 'Hobbies & Interest', 0),
(2190, 605, 579, 3228, 'Supporting Contents', 0),
(2191, 606, 579, 3228, 'Supporting Contents', 0),
(2192, 607, 579, 3228, 'Supporting Contents', 0),
(2193, 609, 581, 3232, 'Supporting Contents', 0),
(2194, 610, 581, 3232, 'Supporting Contents', 0),
(2195, 611, 581, 3232, 'Supporting Contents', 0),
(2196, 612, 462, 3232, 'Supporting Contents', 0),
(2197, 612, 484, 3232, 'Supporting Contents', 0),
(2198, 612, 485, 3232, 'Supporting Contents', 0),
(2199, 612, 486, 3232, 'Supporting Contents', 0),
(2200, 612, 488, 3232, 'Supporting Contents', 0),
(2201, 612, 490, 3232, 'Supporting Contents', 0),
(2202, 612, 510, 3232, 'Supporting Contents', 0),
(2203, 612, 512, 3232, 'Supporting Contents', 0),
(2204, 612, 514, 3232, 'Supporting Contents', 0),
(2205, 612, 515, 3232, 'Supporting Contents', 0),
(2206, 612, 516, 3232, 'Supporting Contents', 0),
(2207, 612, 517, 3232, 'Supporting Contents', 0),
(2208, 612, 518, 3232, 'Supporting Contents', 0),
(2209, 612, 519, 3232, 'Supporting Contents', 0),
(2210, 612, 521, 3232, 'Supporting Contents', 0),
(2211, 612, 522, 3232, 'Supporting Contents', 0),
(2212, 612, 523, 3232, 'Supporting Contents', 0),
(2213, 612, 524, 3232, 'Supporting Contents', 0),
(2214, 612, 526, 3232, 'Supporting Contents', 0),
(2215, 612, 527, 3232, 'Supporting Contents', 0),
(2216, 612, 528, 3232, 'Supporting Contents', 0),
(2217, 612, 530, 3232, 'Supporting Contents', 0),
(2218, 612, 532, 3232, 'Supporting Contents', 0),
(2219, 612, 534, 3232, 'Supporting Contents', 0),
(2220, 612, 535, 3232, 'Supporting Contents', 0),
(2221, 612, 536, 3232, 'Supporting Contents', 0),
(2222, 612, 540, 3232, 'Supporting Contents', 0),
(2223, 612, 542, 3232, 'Supporting Contents', 0),
(2224, 612, 543, 3232, 'Supporting Contents', 0),
(2225, 612, 544, 3232, 'Supporting Contents', 0),
(2226, 612, 545, 3232, 'Supporting Contents', 0),
(2227, 612, 546, 3232, 'Supporting Contents', 0),
(2228, 612, 547, 3232, 'Supporting Contents', 0),
(2229, 612, 549, 3232, 'Supporting Contents', 0),
(2230, 612, 550, 3232, 'Supporting Contents', 0),
(2231, 612, 551, 3232, 'Supporting Contents', 0),
(2232, 612, 552, 3232, 'Supporting Contents', 0),
(2233, 612, 553, 3232, 'Supporting Contents', 0),
(2234, 612, 555, 3232, 'Supporting Contents', 0),
(2235, 612, 556, 3232, 'Supporting Contents', 0),
(2236, 612, 557, 3232, 'Supporting Contents', 0),
(2237, 612, 559, 3232, 'Supporting Contents', 0),
(2238, 612, 560, 3232, 'Supporting Contents', 0),
(2239, 612, 561, 3232, 'Supporting Contents', 0),
(2240, 612, 566, 3232, 'Supporting Contents', 0),
(2241, 612, 568, 3232, 'Supporting Contents', 0),
(2242, 612, 569, 3232, 'Supporting Contents', 0),
(2243, 612, 570, 3232, 'Supporting Contents', 0),
(2244, 612, 571, 3232, 'Supporting Contents', 0),
(2245, 612, 572, 3232, 'Supporting Contents', 0),
(2246, 612, 573, 3232, 'Supporting Contents', 0),
(2247, 612, 574, 3232, 'Supporting Contents', 0),
(2248, 612, 575, 3232, 'Supporting Contents', 0),
(2249, 612, 576, 3232, 'Supporting Contents', 0),
(2250, 612, 577, 3232, 'Supporting Contents', 0),
(2251, 612, 578, 3232, 'Supporting Contents', 0),
(2252, 612, 579, 3232, 'Supporting Contents', 0),
(2253, 612, 581, 3232, 'Supporting Contents', 0),
(2254, 613, 583, 3235, 'Supporting Contents', 0),
(2255, 614, 583, 3235, 'Supporting Contents', 0),
(2256, 615, 583, 3235, 'Supporting Contents', 0),
(2257, 616, 462, 3235, 'Supporting Contents', 0),
(2258, 616, 484, 3235, 'Supporting Contents', 0),
(2259, 616, 485, 3235, 'Supporting Contents', 0),
(2260, 616, 486, 3235, 'Supporting Contents', 0),
(2261, 616, 488, 3235, 'Supporting Contents', 0),
(2262, 616, 490, 3235, 'Supporting Contents', 0),
(2263, 616, 510, 3235, 'Supporting Contents', 0),
(2264, 616, 512, 3235, 'Supporting Contents', 0),
(2265, 616, 514, 3235, 'Supporting Contents', 0),
(2266, 616, 515, 3235, 'Supporting Contents', 0),
(2267, 616, 516, 3235, 'Supporting Contents', 0),
(2268, 616, 517, 3235, 'Supporting Contents', 0),
(2269, 616, 518, 3235, 'Supporting Contents', 0),
(2270, 616, 519, 3235, 'Supporting Contents', 0),
(2271, 616, 521, 3235, 'Supporting Contents', 0),
(2272, 616, 522, 3235, 'Supporting Contents', 0),
(2273, 616, 523, 3235, 'Supporting Contents', 0),
(2274, 616, 524, 3235, 'Supporting Contents', 0),
(2275, 616, 526, 3235, 'Supporting Contents', 0),
(2276, 616, 527, 3235, 'Supporting Contents', 0),
(2277, 616, 528, 3235, 'Supporting Contents', 0),
(2278, 616, 530, 3235, 'Supporting Contents', 0),
(2279, 616, 532, 3235, 'Supporting Contents', 0),
(2280, 616, 534, 3235, 'Supporting Contents', 0),
(2281, 616, 535, 3235, 'Supporting Contents', 0),
(2282, 616, 536, 3235, 'Supporting Contents', 0),
(2283, 616, 540, 3235, 'Supporting Contents', 0),
(2284, 616, 542, 3235, 'Supporting Contents', 0),
(2285, 616, 543, 3235, 'Supporting Contents', 0),
(2286, 616, 544, 3235, 'Supporting Contents', 0),
(2287, 616, 545, 3235, 'Supporting Contents', 0),
(2288, 616, 546, 3235, 'Supporting Contents', 0),
(2289, 616, 547, 3235, 'Supporting Contents', 0),
(2290, 616, 549, 3235, 'Supporting Contents', 0),
(2291, 616, 550, 3235, 'Supporting Contents', 0),
(2292, 616, 551, 3235, 'Supporting Contents', 0),
(2293, 616, 552, 3235, 'Supporting Contents', 0),
(2294, 616, 553, 3235, 'Supporting Contents', 0),
(2295, 616, 555, 3235, 'Supporting Contents', 0),
(2296, 616, 556, 3235, 'Supporting Contents', 0),
(2297, 616, 557, 3235, 'Supporting Contents', 0),
(2298, 616, 559, 3235, 'Supporting Contents', 0),
(2299, 616, 560, 3235, 'Supporting Contents', 0),
(2300, 616, 561, 3235, 'Supporting Contents', 0),
(2301, 616, 566, 3235, 'Supporting Contents', 0),
(2302, 616, 568, 3235, 'Supporting Contents', 0),
(2303, 616, 569, 3235, 'Supporting Contents', 0),
(2304, 616, 570, 3235, 'Supporting Contents', 0),
(2305, 616, 571, 3235, 'Supporting Contents', 0),
(2306, 616, 572, 3235, 'Supporting Contents', 0),
(2307, 616, 573, 3235, 'Supporting Contents', 0),
(2308, 616, 574, 3235, 'Supporting Contents', 0),
(2309, 616, 575, 3235, 'Supporting Contents', 0),
(2310, 616, 576, 3235, 'Supporting Contents', 0),
(2311, 616, 577, 3235, 'Supporting Contents', 0),
(2312, 616, 578, 3235, 'Supporting Contents', 0),
(2313, 616, 579, 3235, 'Supporting Contents', 0),
(2314, 616, 581, 3235, 'Supporting Contents', 0),
(2315, 616, 583, 3235, 'Supporting Contents', 0),
(2316, 617, 462, 3235, 'Supporting Contents', 0),
(2317, 617, 484, 3235, 'Supporting Contents', 0),
(2318, 617, 485, 3235, 'Supporting Contents', 0),
(2319, 617, 486, 3235, 'Supporting Contents', 0),
(2320, 617, 488, 3235, 'Supporting Contents', 0),
(2321, 617, 490, 3235, 'Supporting Contents', 0),
(2322, 617, 510, 3235, 'Supporting Contents', 0),
(2323, 617, 512, 3235, 'Supporting Contents', 0),
(2324, 617, 514, 3235, 'Supporting Contents', 0),
(2325, 617, 515, 3235, 'Supporting Contents', 0),
(2326, 617, 516, 3235, 'Supporting Contents', 0),
(2327, 617, 517, 3235, 'Supporting Contents', 0),
(2328, 617, 518, 3235, 'Supporting Contents', 0),
(2329, 617, 519, 3235, 'Supporting Contents', 0),
(2330, 617, 521, 3235, 'Supporting Contents', 0),
(2331, 617, 522, 3235, 'Supporting Contents', 0),
(2332, 617, 523, 3235, 'Supporting Contents', 0),
(2333, 617, 524, 3235, 'Supporting Contents', 0),
(2334, 617, 526, 3235, 'Supporting Contents', 0),
(2335, 617, 527, 3235, 'Supporting Contents', 0),
(2336, 617, 528, 3235, 'Supporting Contents', 0),
(2337, 617, 530, 3235, 'Supporting Contents', 0),
(2338, 617, 532, 3235, 'Supporting Contents', 0),
(2339, 617, 534, 3235, 'Supporting Contents', 0),
(2340, 617, 535, 3235, 'Supporting Contents', 0),
(2341, 617, 536, 3235, 'Supporting Contents', 0),
(2342, 617, 540, 3235, 'Supporting Contents', 0),
(2343, 617, 542, 3235, 'Supporting Contents', 0),
(2344, 617, 543, 3235, 'Supporting Contents', 0),
(2345, 617, 544, 3235, 'Supporting Contents', 0),
(2346, 617, 545, 3235, 'Supporting Contents', 0),
(2347, 617, 546, 3235, 'Supporting Contents', 0),
(2348, 617, 547, 3235, 'Supporting Contents', 0),
(2349, 617, 549, 3235, 'Supporting Contents', 0),
(2350, 617, 550, 3235, 'Supporting Contents', 0),
(2351, 617, 551, 3235, 'Supporting Contents', 0),
(2352, 617, 552, 3235, 'Supporting Contents', 0),
(2353, 617, 553, 3235, 'Supporting Contents', 0),
(2354, 617, 555, 3235, 'Supporting Contents', 0),
(2355, 617, 556, 3235, 'Supporting Contents', 0),
(2356, 617, 557, 3235, 'Supporting Contents', 0),
(2357, 617, 559, 3235, 'Supporting Contents', 0),
(2358, 617, 560, 3235, 'Supporting Contents', 0),
(2359, 617, 561, 3235, 'Supporting Contents', 0),
(2360, 617, 566, 3235, 'Supporting Contents', 0),
(2361, 617, 568, 3235, 'Supporting Contents', 0),
(2362, 617, 569, 3235, 'Supporting Contents', 0),
(2363, 617, 570, 3235, 'Supporting Contents', 0),
(2364, 617, 571, 3235, 'Supporting Contents', 0),
(2365, 617, 572, 3235, 'Supporting Contents', 0),
(2366, 617, 573, 3235, 'Supporting Contents', 0),
(2367, 617, 574, 3235, 'Supporting Contents', 0),
(2368, 617, 575, 3235, 'Supporting Contents', 0),
(2369, 617, 576, 3235, 'Supporting Contents', 0),
(2370, 617, 577, 3235, 'Supporting Contents', 0),
(2371, 617, 578, 3235, 'Supporting Contents', 0),
(2372, 617, 579, 3235, 'Supporting Contents', 0),
(2373, 617, 581, 3235, 'Supporting Contents', 0),
(2374, 617, 583, 3235, 'Supporting Contents', 0),
(2375, 618, 462, 3235, 'Supporting Contents', 0),
(2376, 618, 484, 3235, 'Supporting Contents', 0),
(2377, 618, 485, 3235, 'Supporting Contents', 0),
(2378, 618, 486, 3235, 'Supporting Contents', 0),
(2379, 618, 488, 3235, 'Supporting Contents', 0),
(2380, 618, 490, 3235, 'Supporting Contents', 0),
(2381, 618, 510, 3235, 'Supporting Contents', 0),
(2382, 618, 512, 3235, 'Supporting Contents', 0),
(2383, 618, 514, 3235, 'Supporting Contents', 0),
(2384, 618, 515, 3235, 'Supporting Contents', 0),
(2385, 618, 516, 3235, 'Supporting Contents', 0),
(2386, 618, 517, 3235, 'Supporting Contents', 0),
(2387, 618, 518, 3235, 'Supporting Contents', 0),
(2388, 618, 519, 3235, 'Supporting Contents', 0),
(2389, 618, 521, 3235, 'Supporting Contents', 0),
(2390, 618, 522, 3235, 'Supporting Contents', 0),
(2391, 618, 523, 3235, 'Supporting Contents', 0),
(2392, 618, 524, 3235, 'Supporting Contents', 0),
(2393, 618, 526, 3235, 'Supporting Contents', 0),
(2394, 618, 527, 3235, 'Supporting Contents', 0),
(2395, 618, 528, 3235, 'Supporting Contents', 0),
(2396, 618, 530, 3235, 'Supporting Contents', 0),
(2397, 618, 532, 3235, 'Supporting Contents', 0),
(2398, 618, 534, 3235, 'Supporting Contents', 0),
(2399, 618, 535, 3235, 'Supporting Contents', 0),
(2400, 618, 536, 3235, 'Supporting Contents', 0),
(2401, 618, 540, 3235, 'Supporting Contents', 0),
(2402, 618, 542, 3235, 'Supporting Contents', 0),
(2403, 618, 543, 3235, 'Supporting Contents', 0),
(2404, 618, 544, 3235, 'Supporting Contents', 0),
(2405, 618, 545, 3235, 'Supporting Contents', 0),
(2406, 618, 546, 3235, 'Supporting Contents', 0),
(2407, 618, 547, 3235, 'Supporting Contents', 0),
(2408, 618, 549, 3235, 'Supporting Contents', 0),
(2409, 618, 550, 3235, 'Supporting Contents', 0),
(2410, 618, 551, 3235, 'Supporting Contents', 0),
(2411, 618, 552, 3235, 'Supporting Contents', 0),
(2412, 618, 553, 3235, 'Supporting Contents', 0),
(2413, 618, 555, 3235, 'Supporting Contents', 0),
(2414, 618, 556, 3235, 'Supporting Contents', 0),
(2415, 618, 557, 3235, 'Supporting Contents', 0),
(2416, 618, 559, 3235, 'Supporting Contents', 0),
(2417, 618, 560, 3235, 'Supporting Contents', 0),
(2418, 618, 561, 3235, 'Supporting Contents', 0),
(2419, 618, 566, 3235, 'Supporting Contents', 0),
(2420, 618, 568, 3235, 'Supporting Contents', 0),
(2421, 618, 569, 3235, 'Supporting Contents', 0),
(2422, 618, 570, 3235, 'Supporting Contents', 0),
(2423, 618, 571, 3235, 'Supporting Contents', 0),
(2424, 618, 572, 3235, 'Supporting Contents', 0),
(2425, 618, 573, 3235, 'Supporting Contents', 0),
(2426, 618, 574, 3235, 'Supporting Contents', 0),
(2427, 618, 575, 3235, 'Supporting Contents', 0),
(2428, 618, 576, 3235, 'Supporting Contents', 0),
(2429, 618, 577, 3235, 'Supporting Contents', 0),
(2430, 618, 578, 3235, 'Supporting Contents', 0),
(2431, 618, 579, 3235, 'Supporting Contents', 0),
(2432, 618, 581, 3235, 'Supporting Contents', 0),
(2433, 618, 583, 3235, 'Supporting Contents', 0),
(2434, 613, 584, 3235, 'Supporting Contents', 0),
(2435, 614, 584, 3235, 'Supporting Contents', 0),
(2436, 615, 584, 3235, 'Supporting Contents', 0),
(2437, 616, 584, 3235, 'Supporting Contents', 0),
(2438, 617, 584, 3235, 'Supporting Contents', 0),
(2439, 618, 584, 3235, 'Supporting Contents', 0),
(2440, 613, 585, 3235, 'Supporting Contents', 0),
(2441, 614, 585, 3235, 'Supporting Contents', 0),
(2442, 615, 585, 3235, 'Supporting Contents', 0),
(2443, 616, 585, 3235, 'Supporting Contents', 0),
(2444, 617, 585, 3235, 'Supporting Contents', 0),
(2445, 618, 585, 3235, 'Supporting Contents', 0),
(2446, 613, 586, 3235, 'Supporting Contents', 0),
(2447, 614, 586, 3235, 'Supporting Contents', 0),
(2448, 615, 586, 3235, 'Supporting Contents', 0),
(2449, 616, 586, 3235, 'Supporting Contents', 0),
(2450, 617, 586, 3235, 'Supporting Contents', 0),
(2451, 618, 586, 3235, 'Supporting Contents', 0),
(2452, 613, 587, 3235, 'Supporting Contents', 0),
(2453, 614, 587, 3235, 'Supporting Contents', 0),
(2454, 615, 587, 3235, 'Supporting Contents', 0),
(2455, 616, 587, 3235, 'Supporting Contents', 0),
(2456, 617, 587, 3235, 'Supporting Contents', 0),
(2457, 618, 587, 3235, 'Supporting Contents', 0),
(2458, 613, 588, 3235, 'Supporting Contents', 0),
(2459, 614, 588, 3235, 'Supporting Contents', 0),
(2460, 615, 588, 3235, 'Supporting Contents', 0),
(2461, 616, 588, 3235, 'Supporting Contents', 0),
(2462, 617, 588, 3235, 'Supporting Contents', 0),
(2463, 618, 588, 3235, 'Supporting Contents', 0),
(2464, 619, 590, 3237, 'Supporting Contents', 0),
(2465, 620, 590, 3237, 'Supporting Contents', 0),
(2467, 622, 462, 3237, 'Supporting Contents', 0),
(2468, 622, 484, 3237, 'Supporting Contents', 0),
(2469, 622, 485, 3237, 'Supporting Contents', 0),
(2470, 622, 486, 3237, 'Supporting Contents', 0),
(2471, 622, 488, 3237, 'Supporting Contents', 0),
(2472, 622, 490, 3237, 'Supporting Contents', 0),
(2473, 622, 510, 3237, 'Supporting Contents', 0),
(2474, 622, 512, 3237, 'Supporting Contents', 0),
(2475, 622, 514, 3237, 'Supporting Contents', 0),
(2476, 622, 515, 3237, 'Supporting Contents', 0),
(2477, 622, 516, 3237, 'Supporting Contents', 0),
(2478, 622, 517, 3237, 'Supporting Contents', 0),
(2479, 622, 518, 3237, 'Supporting Contents', 0),
(2480, 622, 519, 3237, 'Supporting Contents', 0),
(2481, 622, 521, 3237, 'Supporting Contents', 0),
(2482, 622, 522, 3237, 'Supporting Contents', 0),
(2483, 622, 523, 3237, 'Supporting Contents', 0),
(2484, 622, 524, 3237, 'Supporting Contents', 0),
(2485, 622, 526, 3237, 'Supporting Contents', 0),
(2486, 622, 527, 3237, 'Supporting Contents', 0),
(2487, 622, 528, 3237, 'Supporting Contents', 0),
(2488, 622, 530, 3237, 'Supporting Contents', 0),
(2489, 622, 532, 3237, 'Supporting Contents', 0),
(2490, 622, 534, 3237, 'Supporting Contents', 0),
(2491, 622, 535, 3237, 'Supporting Contents', 0),
(2492, 622, 536, 3237, 'Supporting Contents', 0),
(2493, 622, 540, 3237, 'Supporting Contents', 0),
(2494, 622, 542, 3237, 'Supporting Contents', 0),
(2495, 622, 543, 3237, 'Supporting Contents', 0),
(2496, 622, 544, 3237, 'Supporting Contents', 0),
(2497, 622, 545, 3237, 'Supporting Contents', 0),
(2498, 622, 546, 3237, 'Supporting Contents', 0),
(2499, 622, 547, 3237, 'Supporting Contents', 0),
(2500, 622, 549, 3237, 'Supporting Contents', 0),
(2501, 622, 550, 3237, 'Supporting Contents', 0),
(2502, 622, 551, 3237, 'Supporting Contents', 0),
(2503, 622, 552, 3237, 'Supporting Contents', 0),
(2504, 622, 553, 3237, 'Supporting Contents', 0),
(2505, 622, 555, 3237, 'Supporting Contents', 0),
(2506, 622, 556, 3237, 'Supporting Contents', 0),
(2507, 622, 557, 3237, 'Supporting Contents', 0),
(2508, 622, 559, 3237, 'Supporting Contents', 0),
(2509, 622, 560, 3237, 'Supporting Contents', 0),
(2510, 622, 561, 3237, 'Supporting Contents', 0),
(2511, 622, 566, 3237, 'Supporting Contents', 0),
(2512, 622, 568, 3237, 'Supporting Contents', 0),
(2513, 622, 569, 3237, 'Supporting Contents', 0),
(2514, 622, 570, 3237, 'Supporting Contents', 0),
(2515, 622, 571, 3237, 'Supporting Contents', 0),
(2516, 622, 572, 3237, 'Supporting Contents', 0),
(2517, 622, 573, 3237, 'Supporting Contents', 0),
(2518, 622, 574, 3237, 'Supporting Contents', 0),
(2519, 622, 575, 3237, 'Supporting Contents', 0),
(2520, 622, 576, 3237, 'Supporting Contents', 0),
(2521, 622, 577, 3237, 'Supporting Contents', 0),
(2522, 622, 578, 3237, 'Supporting Contents', 0),
(2523, 622, 579, 3237, 'Supporting Contents', 0),
(2524, 622, 581, 3237, 'Supporting Contents', 0),
(2525, 622, 583, 3237, 'Supporting Contents', 0),
(2526, 622, 584, 3237, 'Supporting Contents', 0),
(2527, 622, 585, 3237, 'Supporting Contents', 0),
(2528, 622, 586, 3237, 'Supporting Contents', 0),
(2529, 622, 587, 3237, 'Supporting Contents', 0),
(2530, 622, 588, 3237, 'Supporting Contents', 0),
(2531, 622, 590, 3237, 'Supporting Contents', 0),
(2532, 623, 462, 3237, 'Supporting Contents', 0),
(2533, 623, 484, 3237, 'Supporting Contents', 0),
(2534, 623, 485, 3237, 'Supporting Contents', 0),
(2535, 623, 486, 3237, 'Supporting Contents', 0),
(2536, 623, 488, 3237, 'Supporting Contents', 0),
(2537, 623, 490, 3237, 'Supporting Contents', 0),
(2538, 623, 510, 3237, 'Supporting Contents', 0),
(2539, 623, 512, 3237, 'Supporting Contents', 0),
(2540, 623, 514, 3237, 'Supporting Contents', 0),
(2541, 623, 515, 3237, 'Supporting Contents', 0),
(2542, 623, 516, 3237, 'Supporting Contents', 0),
(2543, 623, 517, 3237, 'Supporting Contents', 0),
(2544, 623, 518, 3237, 'Supporting Contents', 0),
(2545, 623, 519, 3237, 'Supporting Contents', 0),
(2546, 623, 521, 3237, 'Supporting Contents', 0),
(2547, 623, 522, 3237, 'Supporting Contents', 0),
(2548, 623, 523, 3237, 'Supporting Contents', 0),
(2549, 623, 524, 3237, 'Supporting Contents', 0),
(2550, 623, 526, 3237, 'Supporting Contents', 0),
(2551, 623, 527, 3237, 'Supporting Contents', 0),
(2552, 623, 528, 3237, 'Supporting Contents', 0),
(2553, 623, 530, 3237, 'Supporting Contents', 0),
(2554, 623, 532, 3237, 'Supporting Contents', 0),
(2555, 623, 534, 3237, 'Supporting Contents', 0),
(2556, 623, 535, 3237, 'Supporting Contents', 0),
(2557, 623, 536, 3237, 'Supporting Contents', 0),
(2558, 623, 540, 3237, 'Supporting Contents', 0),
(2559, 623, 542, 3237, 'Supporting Contents', 0),
(2560, 623, 543, 3237, 'Supporting Contents', 0),
(2561, 623, 544, 3237, 'Supporting Contents', 0),
(2562, 623, 545, 3237, 'Supporting Contents', 0),
(2563, 623, 546, 3237, 'Supporting Contents', 0),
(2564, 623, 547, 3237, 'Supporting Contents', 0),
(2565, 623, 549, 3237, 'Supporting Contents', 0),
(2566, 623, 550, 3237, 'Supporting Contents', 0),
(2567, 623, 551, 3237, 'Supporting Contents', 0),
(2568, 623, 552, 3237, 'Supporting Contents', 0),
(2569, 623, 553, 3237, 'Supporting Contents', 0),
(2570, 623, 555, 3237, 'Supporting Contents', 0),
(2571, 623, 556, 3237, 'Supporting Contents', 0),
(2572, 623, 557, 3237, 'Supporting Contents', 0),
(2573, 623, 559, 3237, 'Supporting Contents', 0),
(2574, 623, 560, 3237, 'Supporting Contents', 0),
(2575, 623, 561, 3237, 'Supporting Contents', 0),
(2576, 623, 566, 3237, 'Supporting Contents', 0),
(2577, 623, 568, 3237, 'Supporting Contents', 0),
(2578, 623, 569, 3237, 'Supporting Contents', 0),
(2579, 623, 570, 3237, 'Supporting Contents', 0),
(2580, 623, 571, 3237, 'Supporting Contents', 0),
(2581, 623, 572, 3237, 'Supporting Contents', 0),
(2582, 623, 573, 3237, 'Supporting Contents', 0),
(2583, 623, 574, 3237, 'Supporting Contents', 0),
(2584, 623, 575, 3237, 'Supporting Contents', 0),
(2585, 623, 576, 3237, 'Supporting Contents', 0),
(2586, 623, 577, 3237, 'Supporting Contents', 0),
(2587, 623, 578, 3237, 'Supporting Contents', 0),
(2588, 623, 579, 3237, 'Supporting Contents', 0),
(2589, 623, 581, 3237, 'Supporting Contents', 0),
(2590, 623, 583, 3237, 'Supporting Contents', 0),
(2591, 623, 584, 3237, 'Supporting Contents', 0),
(2592, 623, 585, 3237, 'Supporting Contents', 0),
(2593, 623, 586, 3237, 'Supporting Contents', 0),
(2594, 623, 587, 3237, 'Supporting Contents', 0),
(2595, 623, 588, 3237, 'Supporting Contents', 0),
(2596, 623, 590, 3237, 'Supporting Contents', 0),
(2727, 619, 591, 3237, 'Supporting Contents', 0),
(2728, 620, 591, 3237, 'Supporting Contents', 0),
(2730, 622, 591, 3237, 'Supporting Contents', 0),
(2731, 623, 591, 3237, 'Supporting Contents', 0),
(2734, 619, 592, 3237, 'Supporting Contents', 0),
(2735, 620, 592, 3237, 'Supporting Contents', 0),
(2736, 622, 592, 3237, 'Supporting Contents', 0),
(2737, 623, 592, 3237, 'Supporting Contents', 0),
(2738, 619, 593, 3237, 'Supporting Contents', 0),
(2739, 620, 593, 3237, 'Supporting Contents', 0),
(2740, 622, 593, 3237, 'Supporting Contents', 0),
(2741, 623, 593, 3237, 'Supporting Contents', 0),
(2742, 626, 595, 3238, 'Supporting Contents', 0),
(2743, 627, 595, 3238, 'Supporting Contents', 0),
(2744, 628, 595, 3238, 'Supporting Contents', 0),
(2745, 629, 462, 3238, 'Supporting Contents', 0),
(2746, 629, 484, 3238, 'Supporting Contents', 0),
(2747, 629, 485, 3238, 'Supporting Contents', 0),
(2748, 629, 486, 3238, 'Supporting Contents', 0),
(2749, 629, 488, 3238, 'Supporting Contents', 0),
(2750, 629, 490, 3238, 'Supporting Contents', 0),
(2751, 629, 510, 3238, 'Supporting Contents', 0),
(2752, 629, 512, 3238, 'Supporting Contents', 0),
(2753, 629, 514, 3238, 'Supporting Contents', 0),
(2754, 629, 515, 3238, 'Supporting Contents', 0),
(2755, 629, 516, 3238, 'Supporting Contents', 0),
(2756, 629, 517, 3238, 'Supporting Contents', 0),
(2757, 629, 518, 3238, 'Supporting Contents', 0),
(2758, 629, 519, 3238, 'Supporting Contents', 0),
(2759, 629, 521, 3238, 'Supporting Contents', 0),
(2760, 629, 522, 3238, 'Supporting Contents', 0),
(2761, 629, 523, 3238, 'Supporting Contents', 0),
(2762, 629, 524, 3238, 'Supporting Contents', 0),
(2763, 629, 526, 3238, 'Supporting Contents', 0),
(2764, 629, 527, 3238, 'Supporting Contents', 0),
(2765, 629, 528, 3238, 'Supporting Contents', 0),
(2766, 629, 530, 3238, 'Supporting Contents', 0),
(2767, 629, 532, 3238, 'Supporting Contents', 0),
(2768, 629, 534, 3238, 'Supporting Contents', 0),
(2769, 629, 535, 3238, 'Supporting Contents', 0),
(2770, 629, 536, 3238, 'Supporting Contents', 0),
(2771, 629, 540, 3238, 'Supporting Contents', 0),
(2772, 629, 542, 3238, 'Supporting Contents', 0),
(2773, 629, 543, 3238, 'Supporting Contents', 0),
(2774, 629, 544, 3238, 'Supporting Contents', 0),
(2775, 629, 545, 3238, 'Supporting Contents', 0),
(2776, 629, 546, 3238, 'Supporting Contents', 0),
(2777, 629, 547, 3238, 'Supporting Contents', 0),
(2778, 629, 549, 3238, 'Supporting Contents', 0),
(2779, 629, 550, 3238, 'Supporting Contents', 0),
(2780, 629, 551, 3238, 'Supporting Contents', 0),
(2781, 629, 552, 3238, 'Supporting Contents', 0),
(2782, 629, 553, 3238, 'Supporting Contents', 0),
(2783, 629, 555, 3238, 'Supporting Contents', 0),
(2784, 629, 556, 3238, 'Supporting Contents', 0),
(2785, 629, 557, 3238, 'Supporting Contents', 0),
(2786, 629, 559, 3238, 'Supporting Contents', 0),
(2787, 629, 560, 3238, 'Supporting Contents', 0),
(2788, 629, 561, 3238, 'Supporting Contents', 0),
(2789, 629, 566, 3238, 'Supporting Contents', 0),
(2790, 629, 568, 3238, 'Supporting Contents', 0),
(2791, 629, 569, 3238, 'Supporting Contents', 0),
(2792, 629, 570, 3238, 'Supporting Contents', 0),
(2793, 629, 571, 3238, 'Supporting Contents', 0);
INSERT INTO `tablecolumn_content` (`tcontent_id`, `tble_id`, `tc_id`, `formid`, `content`, `typ`) VALUES
(2794, 629, 572, 3238, 'Supporting Contents', 0),
(2795, 629, 573, 3238, 'Supporting Contents', 0),
(2796, 629, 574, 3238, 'Supporting Contents', 0),
(2797, 629, 575, 3238, 'Supporting Contents', 0),
(2798, 629, 576, 3238, 'Supporting Contents', 0),
(2799, 629, 577, 3238, 'Supporting Contents', 0),
(2800, 629, 578, 3238, 'Supporting Contents', 0),
(2801, 629, 579, 3238, 'Supporting Contents', 0),
(2802, 629, 581, 3238, 'Supporting Contents', 0),
(2803, 629, 583, 3238, 'Supporting Contents', 0),
(2804, 629, 584, 3238, 'Supporting Contents', 0),
(2805, 629, 585, 3238, 'Supporting Contents', 0),
(2806, 629, 586, 3238, 'Supporting Contents', 0),
(2807, 629, 587, 3238, 'Supporting Contents', 0),
(2808, 629, 588, 3238, 'Supporting Contents', 0),
(2809, 629, 590, 3238, 'Supporting Contents', 0),
(2810, 629, 591, 3238, 'Supporting Contents', 0),
(2811, 629, 592, 3238, 'Supporting Contents', 0),
(2812, 629, 593, 3238, 'Supporting Contents', 0),
(2813, 629, 595, 3238, 'Supporting Contents', 0),
(2814, 626, 596, 3238, 'Supporting Contents', 0),
(2815, 627, 596, 3238, 'Supporting Contents', 0),
(2816, 628, 596, 3238, 'Supporting Contents', 0),
(2817, 629, 596, 3238, 'Supporting Contents', 0),
(2818, 626, 597, 3238, 'Supporting Contents', 0),
(2819, 627, 597, 3238, 'Supporting Contents', 0),
(2820, 628, 597, 3238, 'Supporting Contents', 0),
(2821, 629, 597, 3238, 'Supporting Contents', 0),
(2822, 630, 599, 3280, 'Supporting Contents', 0),
(2823, 631, 599, 3280, 'Supporting Contents', 0),
(2824, 632, 599, 3280, 'Supporting Contents', 0),
(2825, 630, 600, 3280, 'Supporting Contents', 0),
(2826, 631, 600, 3280, 'Supporting Contents', 0),
(2827, 632, 600, 3280, 'Supporting Contents', 0),
(2828, 630, 601, 3280, 'Supporting Contents', 0),
(2829, 631, 601, 3280, 'Supporting Contents', 0),
(2830, 632, 601, 3280, 'Supporting Contents', 0),
(2837, 639, 607, 3339, 'Name', 0),
(2838, 640, 607, 3339, 'Supporting Contents', 0),
(2839, 641, 607, 3339, 'Supporting Contents', 0),
(2840, 639, 608, 3339, 'Place of Birth', 0),
(2841, 640, 608, 3339, 'Supporting Contents', 0),
(2842, 641, 608, 3339, 'Supporting Contents', 0),
(2843, 642, 462, 3339, 'Supporting Contents', 0),
(2844, 642, 484, 3339, 'Supporting Contents', 0),
(2845, 642, 485, 3339, 'Supporting Contents', 0),
(2846, 642, 486, 3339, 'Supporting Contents', 0),
(2847, 642, 488, 3339, 'Supporting Contents', 0),
(2848, 642, 490, 3339, 'Supporting Contents', 0),
(2849, 642, 510, 3339, 'Supporting Contents', 0),
(2850, 642, 512, 3339, 'Supporting Contents', 0),
(2851, 642, 514, 3339, 'Supporting Contents', 0),
(2852, 642, 515, 3339, 'Supporting Contents', 0),
(2853, 642, 516, 3339, 'Supporting Contents', 0),
(2854, 642, 517, 3339, 'Supporting Contents', 0),
(2855, 642, 518, 3339, 'Supporting Contents', 0),
(2856, 642, 519, 3339, 'Supporting Contents', 0),
(2857, 642, 521, 3339, 'Supporting Contents', 0),
(2858, 642, 522, 3339, 'Supporting Contents', 0),
(2859, 642, 523, 3339, 'Supporting Contents', 0),
(2860, 642, 524, 3339, 'Supporting Contents', 0),
(2861, 642, 526, 3339, 'Supporting Contents', 0),
(2862, 642, 527, 3339, 'Supporting Contents', 0),
(2863, 642, 528, 3339, 'Supporting Contents', 0),
(2864, 642, 530, 3339, 'Supporting Contents', 0),
(2865, 642, 532, 3339, 'Supporting Contents', 0),
(2866, 642, 534, 3339, 'Supporting Contents', 0),
(2867, 642, 535, 3339, 'Supporting Contents', 0),
(2868, 642, 536, 3339, 'Supporting Contents', 0),
(2869, 642, 540, 3339, 'Supporting Contents', 0),
(2870, 642, 542, 3339, 'Supporting Contents', 0),
(2871, 642, 543, 3339, 'Supporting Contents', 0),
(2872, 642, 544, 3339, 'Supporting Contents', 0),
(2873, 642, 545, 3339, 'Supporting Contents', 0),
(2874, 642, 546, 3339, 'Supporting Contents', 0),
(2875, 642, 547, 3339, 'Supporting Contents', 0),
(2876, 642, 549, 3339, 'Supporting Contents', 0),
(2877, 642, 550, 3339, 'Supporting Contents', 0),
(2878, 642, 551, 3339, 'Supporting Contents', 0),
(2879, 642, 552, 3339, 'Supporting Contents', 0),
(2880, 642, 553, 3339, 'Supporting Contents', 0),
(2881, 642, 555, 3339, 'Supporting Contents', 0),
(2882, 642, 556, 3339, 'Supporting Contents', 0),
(2883, 642, 557, 3339, 'Supporting Contents', 0),
(2884, 642, 559, 3339, 'Supporting Contents', 0),
(2885, 642, 560, 3339, 'Supporting Contents', 0),
(2886, 642, 561, 3339, 'Supporting Contents', 0),
(2887, 642, 566, 3339, 'Supporting Contents', 0),
(2888, 642, 568, 3339, 'Supporting Contents', 0),
(2889, 642, 569, 3339, 'Supporting Contents', 0),
(2890, 642, 570, 3339, 'Supporting Contents', 0),
(2891, 642, 571, 3339, 'Supporting Contents', 0),
(2892, 642, 572, 3339, 'Supporting Contents', 0),
(2893, 642, 573, 3339, 'Supporting Contents', 0),
(2894, 642, 574, 3339, 'Supporting Contents', 0),
(2895, 642, 575, 3339, 'Supporting Contents', 0),
(2896, 642, 576, 3339, 'Supporting Contents', 0),
(2897, 642, 577, 3339, 'Supporting Contents', 0),
(2898, 642, 578, 3339, 'Supporting Contents', 0),
(2899, 642, 579, 3339, 'Supporting Contents', 0),
(2900, 642, 581, 3339, 'Supporting Contents', 0),
(2901, 642, 583, 3339, 'Supporting Contents', 0),
(2902, 642, 584, 3339, 'Supporting Contents', 0),
(2903, 642, 585, 3339, 'Supporting Contents', 0),
(2904, 642, 586, 3339, 'Supporting Contents', 0),
(2905, 642, 587, 3339, 'Supporting Contents', 0),
(2906, 642, 588, 3339, 'Supporting Contents', 0),
(2907, 642, 590, 3339, 'Supporting Contents', 0),
(2908, 642, 591, 3339, 'Supporting Contents', 0),
(2909, 642, 592, 3339, 'Supporting Contents', 0),
(2910, 642, 593, 3339, 'Supporting Contents', 0),
(2911, 642, 595, 3339, 'Supporting Contents', 0),
(2912, 642, 596, 3339, 'Supporting Contents', 0),
(2913, 642, 597, 3339, 'Supporting Contents', 0),
(2914, 642, 599, 3339, 'Supporting Contents', 0),
(2915, 642, 600, 3339, 'Supporting Contents', 0),
(2916, 642, 601, 3339, 'Supporting Contents', 0),
(2917, 642, 607, 3339, 'Supporting Contents', 0),
(2918, 642, 608, 3339, 'Supporting Contents', 0),
(2919, 639, 609, 3339, 'Age', 0),
(2920, 640, 609, 3339, 'Supporting Contents', 0),
(2921, 641, 609, 3339, 'Supporting Contents', 0),
(2922, 642, 609, 3339, 'Supporting Contents', 0),
(2923, 639, 610, 3339, 'Address', 0),
(2924, 640, 610, 3339, 'Supporting Contents', 0),
(2925, 641, 610, 3339, 'Supporting Contents', 0),
(2926, 642, 610, 3339, 'Supporting Contents', 0),
(2927, 0, 0, 3340, 'Untitle list', 1),
(2928, 0, 0, 3340, 'Untitle list', 1),
(2929, 0, 0, 3340, 'Untitle list', 1),
(2930, 643, 612, 3375, 'Name', 0),
(2931, 644, 612, 3375, 'Supporting Contents', 0),
(2932, 645, 612, 3375, 'Supporting Contents', 0),
(2933, 643, 613, 3375, 'Place of Birth', 0),
(2934, 644, 613, 3375, 'Supporting Contents', 0),
(2935, 645, 613, 3375, 'Supporting Contents', 0),
(2939, 646, 462, 3375, 'Supporting Contents', 0),
(2940, 646, 484, 3375, 'Supporting Contents', 0),
(2941, 646, 485, 3375, 'Supporting Contents', 0),
(2942, 646, 486, 3375, 'Supporting Contents', 0),
(2943, 646, 488, 3375, 'Supporting Contents', 0),
(2944, 646, 490, 3375, 'Supporting Contents', 0),
(2945, 646, 510, 3375, 'Supporting Contents', 0),
(2946, 646, 512, 3375, 'Supporting Contents', 0),
(2947, 646, 514, 3375, 'Supporting Contents', 0),
(2948, 646, 515, 3375, 'Supporting Contents', 0),
(2949, 646, 516, 3375, 'Supporting Contents', 0),
(2950, 646, 517, 3375, 'Supporting Contents', 0),
(2951, 646, 518, 3375, 'Supporting Contents', 0),
(2952, 646, 519, 3375, 'Supporting Contents', 0),
(2953, 646, 521, 3375, 'Supporting Contents', 0),
(2954, 646, 522, 3375, 'Supporting Contents', 0),
(2955, 646, 523, 3375, 'Supporting Contents', 0),
(2956, 646, 524, 3375, 'Supporting Contents', 0),
(2957, 646, 526, 3375, 'Supporting Contents', 0),
(2958, 646, 527, 3375, 'Supporting Contents', 0),
(2959, 646, 528, 3375, 'Supporting Contents', 0),
(2960, 646, 530, 3375, 'Supporting Contents', 0),
(2961, 646, 532, 3375, 'Supporting Contents', 0),
(2962, 646, 534, 3375, 'Supporting Contents', 0),
(2963, 646, 535, 3375, 'Supporting Contents', 0),
(2964, 646, 536, 3375, 'Supporting Contents', 0),
(2965, 646, 540, 3375, 'Supporting Contents', 0),
(2966, 646, 542, 3375, 'Supporting Contents', 0),
(2967, 646, 543, 3375, 'Supporting Contents', 0),
(2968, 646, 544, 3375, 'Supporting Contents', 0),
(2969, 646, 545, 3375, 'Supporting Contents', 0),
(2970, 646, 546, 3375, 'Supporting Contents', 0),
(2971, 646, 547, 3375, 'Supporting Contents', 0),
(2972, 646, 549, 3375, 'Supporting Contents', 0),
(2973, 646, 550, 3375, 'Supporting Contents', 0),
(2974, 646, 551, 3375, 'Supporting Contents', 0),
(2975, 646, 552, 3375, 'Supporting Contents', 0),
(2976, 646, 553, 3375, 'Supporting Contents', 0),
(2977, 646, 555, 3375, 'Supporting Contents', 0),
(2978, 646, 556, 3375, 'Supporting Contents', 0),
(2979, 646, 557, 3375, 'Supporting Contents', 0),
(2980, 646, 559, 3375, 'Supporting Contents', 0),
(2981, 646, 560, 3375, 'Supporting Contents', 0),
(2982, 646, 561, 3375, 'Supporting Contents', 0),
(2983, 646, 566, 3375, 'Supporting Contents', 0),
(2984, 646, 568, 3375, 'Supporting Contents', 0),
(2985, 646, 569, 3375, 'Supporting Contents', 0),
(2986, 646, 570, 3375, 'Supporting Contents', 0),
(2987, 646, 571, 3375, 'Supporting Contents', 0),
(2988, 646, 572, 3375, 'Supporting Contents', 0),
(2989, 646, 573, 3375, 'Supporting Contents', 0),
(2990, 646, 574, 3375, 'Supporting Contents', 0),
(2991, 646, 575, 3375, 'Supporting Contents', 0),
(2992, 646, 576, 3375, 'Supporting Contents', 0),
(2993, 646, 577, 3375, 'Supporting Contents', 0),
(2994, 646, 578, 3375, 'Supporting Contents', 0),
(2995, 646, 579, 3375, 'Supporting Contents', 0),
(2996, 646, 581, 3375, 'Supporting Contents', 0),
(2997, 646, 583, 3375, 'Supporting Contents', 0),
(2998, 646, 584, 3375, 'Supporting Contents', 0),
(2999, 646, 585, 3375, 'Supporting Contents', 0),
(3000, 646, 586, 3375, 'Supporting Contents', 0),
(3001, 646, 587, 3375, 'Supporting Contents', 0),
(3002, 646, 588, 3375, 'Supporting Contents', 0),
(3003, 646, 590, 3375, 'Supporting Contents', 0),
(3004, 646, 591, 3375, 'Supporting Contents', 0),
(3005, 646, 592, 3375, 'Supporting Contents', 0),
(3006, 646, 593, 3375, 'Supporting Contents', 0),
(3007, 646, 595, 3375, 'Supporting Contents', 0),
(3008, 646, 596, 3375, 'Supporting Contents', 0),
(3009, 646, 597, 3375, 'Supporting Contents', 0),
(3010, 646, 599, 3375, 'Supporting Contents', 0),
(3011, 646, 600, 3375, 'Supporting Contents', 0),
(3012, 646, 601, 3375, 'Supporting Contents', 0),
(3013, 646, 607, 3375, 'Supporting Contents', 0),
(3014, 646, 608, 3375, 'Supporting Contents', 0),
(3015, 646, 609, 3375, 'Supporting Contents', 0),
(3016, 646, 610, 3375, 'Supporting Contents', 0),
(3017, 646, 612, 3375, 'Supporting Contents', 0),
(3018, 646, 613, 3375, 'Supporting Contents', 0),
(3099, 643, 615, 3375, 'Age', 0),
(3100, 644, 615, 3375, 'Supporting Contents', 0),
(3101, 645, 615, 3375, 'Supporting Contents', 0),
(3102, 646, 615, 3375, 'Supporting Contents', 0),
(3103, 643, 616, 3375, 'Address', 0),
(3104, 644, 616, 3375, 'Supporting Contents', 0),
(3105, 645, 616, 3375, 'Supporting Contents', 0),
(3106, 646, 616, 3375, 'Supporting Contents', 0),
(3275, 643, 618, 3375, 'Tel No', 0),
(3276, 644, 618, 3375, 'Supporting Contents', 0),
(3277, 645, 618, 3375, 'Supporting Contents', 0),
(3278, 646, 618, 3375, 'Supporting Contents', 0),
(3279, 643, 619, 3375, 'Religion', 0),
(3280, 644, 619, 3375, 'Supporting Contents', 0),
(3281, 645, 619, 3375, 'Supporting Contents', 0),
(3282, 646, 619, 3375, 'Supporting Contents', 0),
(3283, 643, 620, 3375, 'Nationality', 0),
(3284, 644, 620, 3375, 'Supporting Contents', 0),
(3285, 645, 620, 3375, 'Supporting Contents', 0),
(3286, 646, 620, 3375, 'Supporting Contents', 0),
(3287, 643, 621, 3375, 'Occupation', 0),
(3288, 644, 621, 3375, 'Supporting Contents', 0),
(3289, 645, 621, 3375, 'Supporting Contents', 0),
(3290, 646, 621, 3375, 'Supporting Contents', 0),
(3291, 643, 622, 3375, 'Name of Firm or Employer', 0),
(3292, 644, 622, 3375, 'Supporting Contents', 0),
(3293, 645, 622, 3375, 'Supporting Contents', 0),
(3294, 646, 622, 3375, 'Supporting Contents', 0),
(3295, 0, 0, 3380, 'Members of Family :', 1),
(3296, 0, 0, 3380, 'Untitle list', 1),
(3297, 0, 0, 3380, 'Children :', 1),
(3298, 0, 0, 3380, 'Untitle list', 1),
(3299, 0, 0, 3380, 'Relatives :', 1),
(3300, 0, 0, 3380, 'Untitle list', 1),
(3301, 0, 0, 3380, 'House Helpers :', 1),
(3302, 0, 0, 3380, 'Untitle list', 1),
(3303, 650, 624, 3384, 'Supporting Contents', 0),
(3304, 651, 624, 3384, 'Supporting Contents', 0),
(3306, 653, 626, 3389, 'Supporting Contents', 0),
(3307, 654, 626, 3389, 'Supporting Contents', 0),
(3308, 655, 626, 3389, 'Supporting Contents', 0),
(3309, 656, 462, 3389, 'Supporting Contents', 0),
(3310, 656, 484, 3389, 'Supporting Contents', 0),
(3311, 656, 485, 3389, 'Supporting Contents', 0),
(3312, 656, 486, 3389, 'Supporting Contents', 0),
(3313, 656, 488, 3389, 'Supporting Contents', 0),
(3314, 656, 490, 3389, 'Supporting Contents', 0),
(3315, 656, 510, 3389, 'Supporting Contents', 0),
(3316, 656, 512, 3389, 'Supporting Contents', 0),
(3317, 656, 514, 3389, 'Supporting Contents', 0),
(3318, 656, 515, 3389, 'Supporting Contents', 0),
(3319, 656, 516, 3389, 'Supporting Contents', 0),
(3320, 656, 517, 3389, 'Supporting Contents', 0),
(3321, 656, 518, 3389, 'Supporting Contents', 0),
(3322, 656, 519, 3389, 'Supporting Contents', 0),
(3323, 656, 521, 3389, 'Supporting Contents', 0),
(3324, 656, 522, 3389, 'Supporting Contents', 0),
(3325, 656, 523, 3389, 'Supporting Contents', 0),
(3326, 656, 524, 3389, 'Supporting Contents', 0),
(3327, 656, 526, 3389, 'Supporting Contents', 0),
(3328, 656, 527, 3389, 'Supporting Contents', 0),
(3329, 656, 528, 3389, 'Supporting Contents', 0),
(3330, 656, 530, 3389, 'Supporting Contents', 0),
(3331, 656, 532, 3389, 'Supporting Contents', 0),
(3332, 656, 534, 3389, 'Supporting Contents', 0),
(3333, 656, 535, 3389, 'Supporting Contents', 0),
(3334, 656, 536, 3389, 'Supporting Contents', 0),
(3335, 656, 540, 3389, 'Supporting Contents', 0),
(3336, 656, 542, 3389, 'Supporting Contents', 0),
(3337, 656, 543, 3389, 'Supporting Contents', 0),
(3338, 656, 544, 3389, 'Supporting Contents', 0),
(3339, 656, 545, 3389, 'Supporting Contents', 0),
(3340, 656, 546, 3389, 'Supporting Contents', 0),
(3341, 656, 547, 3389, 'Supporting Contents', 0),
(3342, 656, 549, 3389, 'Supporting Contents', 0),
(3343, 656, 550, 3389, 'Supporting Contents', 0),
(3344, 656, 551, 3389, 'Supporting Contents', 0),
(3345, 656, 552, 3389, 'Supporting Contents', 0),
(3346, 656, 553, 3389, 'Supporting Contents', 0),
(3347, 656, 555, 3389, 'Supporting Contents', 0),
(3348, 656, 556, 3389, 'Supporting Contents', 0),
(3349, 656, 557, 3389, 'Supporting Contents', 0),
(3350, 656, 559, 3389, 'Supporting Contents', 0),
(3351, 656, 560, 3389, 'Supporting Contents', 0),
(3352, 656, 561, 3389, 'Supporting Contents', 0),
(3353, 656, 566, 3389, 'Supporting Contents', 0),
(3354, 656, 568, 3389, 'Supporting Contents', 0),
(3355, 656, 569, 3389, 'Supporting Contents', 0),
(3356, 656, 570, 3389, 'Supporting Contents', 0),
(3357, 656, 571, 3389, 'Supporting Contents', 0),
(3358, 656, 572, 3389, 'Supporting Contents', 0),
(3359, 656, 573, 3389, 'Supporting Contents', 0),
(3360, 656, 574, 3389, 'Supporting Contents', 0),
(3361, 656, 575, 3389, 'Supporting Contents', 0),
(3362, 656, 576, 3389, 'Supporting Contents', 0),
(3363, 656, 577, 3389, 'Supporting Contents', 0),
(3364, 656, 578, 3389, 'Supporting Contents', 0),
(3365, 656, 579, 3389, 'Supporting Contents', 0),
(3366, 656, 581, 3389, 'Supporting Contents', 0),
(3367, 656, 583, 3389, 'Supporting Contents', 0),
(3368, 656, 584, 3389, 'Supporting Contents', 0),
(3369, 656, 585, 3389, 'Supporting Contents', 0),
(3370, 656, 586, 3389, 'Supporting Contents', 0),
(3371, 656, 587, 3389, 'Supporting Contents', 0),
(3372, 656, 588, 3389, 'Supporting Contents', 0),
(3373, 656, 590, 3389, 'Supporting Contents', 0),
(3374, 656, 591, 3389, 'Supporting Contents', 0),
(3375, 656, 592, 3389, 'Supporting Contents', 0),
(3376, 656, 593, 3389, 'Supporting Contents', 0),
(3377, 656, 595, 3389, 'Supporting Contents', 0),
(3378, 656, 596, 3389, 'Supporting Contents', 0),
(3379, 656, 597, 3389, 'Supporting Contents', 0),
(3380, 656, 599, 3389, 'Supporting Contents', 0),
(3381, 656, 600, 3389, 'Supporting Contents', 0),
(3382, 656, 601, 3389, 'Supporting Contents', 0),
(3383, 656, 607, 3389, 'Supporting Contents', 0),
(3384, 656, 608, 3389, 'Supporting Contents', 0),
(3385, 656, 609, 3389, 'Supporting Contents', 0),
(3386, 656, 610, 3389, 'Supporting Contents', 0),
(3387, 656, 612, 3389, 'Supporting Contents', 0),
(3388, 656, 613, 3389, 'Supporting Contents', 0),
(3389, 656, 615, 3389, 'Supporting Contents', 0),
(3390, 656, 616, 3389, 'Supporting Contents', 0),
(3391, 656, 618, 3389, 'Supporting Contents', 0),
(3392, 656, 619, 3389, 'Supporting Contents', 0),
(3393, 656, 620, 3389, 'Supporting Contents', 0),
(3394, 656, 621, 3389, 'Supporting Contents', 0),
(3395, 656, 622, 3389, 'Supporting Contents', 0),
(3396, 656, 624, 3389, 'Supporting Contents', 0),
(3397, 656, 626, 3389, 'Supporting Contents', 0),
(3398, 657, 462, 3389, 'Supporting Contents', 0),
(3399, 657, 484, 3389, 'Supporting Contents', 0),
(3400, 657, 485, 3389, 'Supporting Contents', 0),
(3401, 657, 486, 3389, 'Supporting Contents', 0),
(3402, 657, 488, 3389, 'Supporting Contents', 0),
(3403, 657, 490, 3389, 'Supporting Contents', 0),
(3404, 657, 510, 3389, 'Supporting Contents', 0),
(3405, 657, 512, 3389, 'Supporting Contents', 0),
(3406, 657, 514, 3389, 'Supporting Contents', 0),
(3407, 657, 515, 3389, 'Supporting Contents', 0),
(3408, 657, 516, 3389, 'Supporting Contents', 0),
(3409, 657, 517, 3389, 'Supporting Contents', 0),
(3410, 657, 518, 3389, 'Supporting Contents', 0),
(3411, 657, 519, 3389, 'Supporting Contents', 0),
(3412, 657, 521, 3389, 'Supporting Contents', 0),
(3413, 657, 522, 3389, 'Supporting Contents', 0),
(3414, 657, 523, 3389, 'Supporting Contents', 0),
(3415, 657, 524, 3389, 'Supporting Contents', 0),
(3416, 657, 526, 3389, 'Supporting Contents', 0),
(3417, 657, 527, 3389, 'Supporting Contents', 0),
(3418, 657, 528, 3389, 'Supporting Contents', 0),
(3419, 657, 530, 3389, 'Supporting Contents', 0),
(3420, 657, 532, 3389, 'Supporting Contents', 0),
(3421, 657, 534, 3389, 'Supporting Contents', 0),
(3422, 657, 535, 3389, 'Supporting Contents', 0),
(3423, 657, 536, 3389, 'Supporting Contents', 0),
(3424, 657, 540, 3389, 'Supporting Contents', 0),
(3425, 657, 542, 3389, 'Supporting Contents', 0),
(3426, 657, 543, 3389, 'Supporting Contents', 0),
(3427, 657, 544, 3389, 'Supporting Contents', 0),
(3428, 657, 545, 3389, 'Supporting Contents', 0),
(3429, 657, 546, 3389, 'Supporting Contents', 0),
(3430, 657, 547, 3389, 'Supporting Contents', 0),
(3431, 657, 549, 3389, 'Supporting Contents', 0),
(3432, 657, 550, 3389, 'Supporting Contents', 0),
(3433, 657, 551, 3389, 'Supporting Contents', 0),
(3434, 657, 552, 3389, 'Supporting Contents', 0),
(3435, 657, 553, 3389, 'Supporting Contents', 0),
(3436, 657, 555, 3389, 'Supporting Contents', 0),
(3437, 657, 556, 3389, 'Supporting Contents', 0),
(3438, 657, 557, 3389, 'Supporting Contents', 0),
(3439, 657, 559, 3389, 'Supporting Contents', 0),
(3440, 657, 560, 3389, 'Supporting Contents', 0),
(3441, 657, 561, 3389, 'Supporting Contents', 0),
(3442, 657, 566, 3389, 'Supporting Contents', 0),
(3443, 657, 568, 3389, 'Supporting Contents', 0),
(3444, 657, 569, 3389, 'Supporting Contents', 0),
(3445, 657, 570, 3389, 'Supporting Contents', 0),
(3446, 657, 571, 3389, 'Supporting Contents', 0),
(3447, 657, 572, 3389, 'Supporting Contents', 0),
(3448, 657, 573, 3389, 'Supporting Contents', 0),
(3449, 657, 574, 3389, 'Supporting Contents', 0),
(3450, 657, 575, 3389, 'Supporting Contents', 0),
(3451, 657, 576, 3389, 'Supporting Contents', 0),
(3452, 657, 577, 3389, 'Supporting Contents', 0),
(3453, 657, 578, 3389, 'Supporting Contents', 0),
(3454, 657, 579, 3389, 'Supporting Contents', 0),
(3455, 657, 581, 3389, 'Supporting Contents', 0),
(3456, 657, 583, 3389, 'Supporting Contents', 0),
(3457, 657, 584, 3389, 'Supporting Contents', 0),
(3458, 657, 585, 3389, 'Supporting Contents', 0),
(3459, 657, 586, 3389, 'Supporting Contents', 0),
(3460, 657, 587, 3389, 'Supporting Contents', 0),
(3461, 657, 588, 3389, 'Supporting Contents', 0),
(3462, 657, 590, 3389, 'Supporting Contents', 0),
(3463, 657, 591, 3389, 'Supporting Contents', 0),
(3464, 657, 592, 3389, 'Supporting Contents', 0),
(3465, 657, 593, 3389, 'Supporting Contents', 0),
(3466, 657, 595, 3389, 'Supporting Contents', 0),
(3467, 657, 596, 3389, 'Supporting Contents', 0),
(3468, 657, 597, 3389, 'Supporting Contents', 0),
(3469, 657, 599, 3389, 'Supporting Contents', 0),
(3470, 657, 600, 3389, 'Supporting Contents', 0),
(3471, 657, 601, 3389, 'Supporting Contents', 0),
(3472, 657, 607, 3389, 'Supporting Contents', 0),
(3473, 657, 608, 3389, 'Supporting Contents', 0),
(3474, 657, 609, 3389, 'Supporting Contents', 0),
(3475, 657, 610, 3389, 'Supporting Contents', 0),
(3476, 657, 612, 3389, 'Supporting Contents', 0),
(3477, 657, 613, 3389, 'Supporting Contents', 0),
(3478, 657, 615, 3389, 'Supporting Contents', 0),
(3479, 657, 616, 3389, 'Supporting Contents', 0),
(3480, 657, 618, 3389, 'Supporting Contents', 0),
(3481, 657, 619, 3389, 'Supporting Contents', 0),
(3482, 657, 620, 3389, 'Supporting Contents', 0),
(3483, 657, 621, 3389, 'Supporting Contents', 0),
(3484, 657, 622, 3389, 'Supporting Contents', 0),
(3485, 657, 624, 3389, 'Supporting Contents', 0),
(3486, 657, 626, 3389, 'Supporting Contents', 0),
(3487, 658, 462, 3389, 'Supporting Contents', 0),
(3488, 658, 484, 3389, 'Supporting Contents', 0),
(3489, 658, 485, 3389, 'Supporting Contents', 0),
(3490, 658, 486, 3389, 'Supporting Contents', 0),
(3491, 658, 488, 3389, 'Supporting Contents', 0),
(3492, 658, 490, 3389, 'Supporting Contents', 0),
(3493, 658, 510, 3389, 'Supporting Contents', 0),
(3494, 658, 512, 3389, 'Supporting Contents', 0),
(3495, 658, 514, 3389, 'Supporting Contents', 0),
(3496, 658, 515, 3389, 'Supporting Contents', 0),
(3497, 658, 516, 3389, 'Supporting Contents', 0),
(3498, 658, 517, 3389, 'Supporting Contents', 0),
(3499, 658, 518, 3389, 'Supporting Contents', 0),
(3500, 658, 519, 3389, 'Supporting Contents', 0),
(3501, 658, 521, 3389, 'Supporting Contents', 0),
(3502, 658, 522, 3389, 'Supporting Contents', 0),
(3503, 658, 523, 3389, 'Supporting Contents', 0),
(3504, 658, 524, 3389, 'Supporting Contents', 0),
(3505, 658, 526, 3389, 'Supporting Contents', 0),
(3506, 658, 527, 3389, 'Supporting Contents', 0),
(3507, 658, 528, 3389, 'Supporting Contents', 0),
(3508, 658, 530, 3389, 'Supporting Contents', 0),
(3509, 658, 532, 3389, 'Supporting Contents', 0),
(3510, 658, 534, 3389, 'Supporting Contents', 0),
(3511, 658, 535, 3389, 'Supporting Contents', 0),
(3512, 658, 536, 3389, 'Supporting Contents', 0),
(3513, 658, 540, 3389, 'Supporting Contents', 0),
(3514, 658, 542, 3389, 'Supporting Contents', 0),
(3515, 658, 543, 3389, 'Supporting Contents', 0),
(3516, 658, 544, 3389, 'Supporting Contents', 0),
(3517, 658, 545, 3389, 'Supporting Contents', 0),
(3518, 658, 546, 3389, 'Supporting Contents', 0),
(3519, 658, 547, 3389, 'Supporting Contents', 0),
(3520, 658, 549, 3389, 'Supporting Contents', 0),
(3521, 658, 550, 3389, 'Supporting Contents', 0),
(3522, 658, 551, 3389, 'Supporting Contents', 0),
(3523, 658, 552, 3389, 'Supporting Contents', 0),
(3524, 658, 553, 3389, 'Supporting Contents', 0),
(3525, 658, 555, 3389, 'Supporting Contents', 0),
(3526, 658, 556, 3389, 'Supporting Contents', 0),
(3527, 658, 557, 3389, 'Supporting Contents', 0),
(3528, 658, 559, 3389, 'Supporting Contents', 0),
(3529, 658, 560, 3389, 'Supporting Contents', 0),
(3530, 658, 561, 3389, 'Supporting Contents', 0),
(3531, 658, 566, 3389, 'Supporting Contents', 0),
(3532, 658, 568, 3389, 'Supporting Contents', 0),
(3533, 658, 569, 3389, 'Supporting Contents', 0),
(3534, 658, 570, 3389, 'Supporting Contents', 0),
(3535, 658, 571, 3389, 'Supporting Contents', 0),
(3536, 658, 572, 3389, 'Supporting Contents', 0),
(3537, 658, 573, 3389, 'Supporting Contents', 0),
(3538, 658, 574, 3389, 'Supporting Contents', 0),
(3539, 658, 575, 3389, 'Supporting Contents', 0),
(3540, 658, 576, 3389, 'Supporting Contents', 0),
(3541, 658, 577, 3389, 'Supporting Contents', 0),
(3542, 658, 578, 3389, 'Supporting Contents', 0),
(3543, 658, 579, 3389, 'Supporting Contents', 0),
(3544, 658, 581, 3389, 'Supporting Contents', 0),
(3545, 658, 583, 3389, 'Supporting Contents', 0),
(3546, 658, 584, 3389, 'Supporting Contents', 0),
(3547, 658, 585, 3389, 'Supporting Contents', 0),
(3548, 658, 586, 3389, 'Supporting Contents', 0),
(3549, 658, 587, 3389, 'Supporting Contents', 0),
(3550, 658, 588, 3389, 'Supporting Contents', 0),
(3551, 658, 590, 3389, 'Supporting Contents', 0),
(3552, 658, 591, 3389, 'Supporting Contents', 0),
(3553, 658, 592, 3389, 'Supporting Contents', 0),
(3554, 658, 593, 3389, 'Supporting Contents', 0),
(3555, 658, 595, 3389, 'Supporting Contents', 0),
(3556, 658, 596, 3389, 'Supporting Contents', 0),
(3557, 658, 597, 3389, 'Supporting Contents', 0),
(3558, 658, 599, 3389, 'Supporting Contents', 0),
(3559, 658, 600, 3389, 'Supporting Contents', 0),
(3560, 658, 601, 3389, 'Supporting Contents', 0),
(3561, 658, 607, 3389, 'Supporting Contents', 0),
(3562, 658, 608, 3389, 'Supporting Contents', 0),
(3563, 658, 609, 3389, 'Supporting Contents', 0),
(3564, 658, 610, 3389, 'Supporting Contents', 0),
(3565, 658, 612, 3389, 'Supporting Contents', 0),
(3566, 658, 613, 3389, 'Supporting Contents', 0),
(3567, 658, 615, 3389, 'Supporting Contents', 0),
(3568, 658, 616, 3389, 'Supporting Contents', 0),
(3569, 658, 618, 3389, 'Supporting Contents', 0),
(3570, 658, 619, 3389, 'Supporting Contents', 0),
(3571, 658, 620, 3389, 'Supporting Contents', 0),
(3572, 658, 621, 3389, 'Supporting Contents', 0),
(3573, 658, 622, 3389, 'Supporting Contents', 0),
(3574, 658, 624, 3389, 'Supporting Contents', 0),
(3575, 658, 626, 3389, 'Supporting Contents', 0),
(3576, 653, 627, 3389, 'Supporting Contents', 0),
(3577, 654, 627, 3389, 'Supporting Contents', 0),
(3578, 655, 627, 3389, 'Supporting Contents', 0),
(3579, 656, 627, 3389, 'Supporting Contents', 0),
(3580, 657, 627, 3389, 'Supporting Contents', 0),
(3581, 658, 627, 3389, 'Supporting Contents', 0),
(3582, 653, 628, 3389, 'Supporting Contents', 0),
(3583, 654, 628, 3389, 'Supporting Contents', 0),
(3584, 655, 628, 3389, 'Supporting Contents', 0),
(3585, 656, 628, 3389, 'Supporting Contents', 0),
(3586, 657, 628, 3389, 'Supporting Contents', 0),
(3587, 658, 628, 3389, 'Supporting Contents', 0),
(3588, 653, 629, 3389, 'Supporting Contents', 0),
(3589, 654, 629, 3389, 'Supporting Contents', 0),
(3590, 655, 629, 3389, 'Supporting Contents', 0),
(3591, 656, 629, 3389, 'Supporting Contents', 0),
(3592, 657, 629, 3389, 'Supporting Contents', 0),
(3593, 658, 629, 3389, 'Supporting Contents', 0),
(3594, 653, 630, 3389, 'Supporting Contents', 0),
(3595, 654, 630, 3389, 'Supporting Contents', 0),
(3596, 655, 630, 3389, 'Supporting Contents', 0),
(3597, 656, 630, 3389, 'Supporting Contents', 0),
(3598, 657, 630, 3389, 'Supporting Contents', 0),
(3599, 658, 630, 3389, 'Supporting Contents', 0),
(3600, 653, 631, 3389, 'Supporting Contents', 0),
(3601, 654, 631, 3389, 'Supporting Contents', 0),
(3602, 655, 631, 3389, 'Supporting Contents', 0),
(3603, 656, 631, 3389, 'Supporting Contents', 0),
(3604, 657, 631, 3389, 'Supporting Contents', 0),
(3605, 658, 631, 3389, 'Supporting Contents', 0),
(3606, 659, 633, 3392, 'Supporting Contents', 0),
(3607, 660, 633, 3392, 'Supporting Contents', 0),
(3608, 661, 633, 3392, 'Supporting Contents', 0),
(3609, 662, 462, 3392, 'Supporting Contents', 0),
(3610, 662, 484, 3392, 'Supporting Contents', 0),
(3611, 662, 485, 3392, 'Supporting Contents', 0),
(3612, 662, 486, 3392, 'Supporting Contents', 0),
(3613, 662, 488, 3392, 'Supporting Contents', 0),
(3614, 662, 490, 3392, 'Supporting Contents', 0),
(3615, 662, 510, 3392, 'Supporting Contents', 0),
(3616, 662, 512, 3392, 'Supporting Contents', 0),
(3617, 662, 514, 3392, 'Supporting Contents', 0),
(3618, 662, 515, 3392, 'Supporting Contents', 0),
(3619, 662, 516, 3392, 'Supporting Contents', 0),
(3620, 662, 517, 3392, 'Supporting Contents', 0),
(3621, 662, 518, 3392, 'Supporting Contents', 0),
(3622, 662, 519, 3392, 'Supporting Contents', 0),
(3623, 662, 521, 3392, 'Supporting Contents', 0),
(3624, 662, 522, 3392, 'Supporting Contents', 0),
(3625, 662, 523, 3392, 'Supporting Contents', 0),
(3626, 662, 524, 3392, 'Supporting Contents', 0),
(3627, 662, 526, 3392, 'Supporting Contents', 0),
(3628, 662, 527, 3392, 'Supporting Contents', 0),
(3629, 662, 528, 3392, 'Supporting Contents', 0),
(3630, 662, 530, 3392, 'Supporting Contents', 0),
(3631, 662, 532, 3392, 'Supporting Contents', 0),
(3632, 662, 534, 3392, 'Supporting Contents', 0),
(3633, 662, 535, 3392, 'Supporting Contents', 0),
(3634, 662, 536, 3392, 'Supporting Contents', 0),
(3635, 662, 540, 3392, 'Supporting Contents', 0),
(3636, 662, 542, 3392, 'Supporting Contents', 0),
(3637, 662, 543, 3392, 'Supporting Contents', 0),
(3638, 662, 544, 3392, 'Supporting Contents', 0),
(3639, 662, 545, 3392, 'Supporting Contents', 0),
(3640, 662, 546, 3392, 'Supporting Contents', 0),
(3641, 662, 547, 3392, 'Supporting Contents', 0),
(3642, 662, 549, 3392, 'Supporting Contents', 0),
(3643, 662, 550, 3392, 'Supporting Contents', 0),
(3644, 662, 551, 3392, 'Supporting Contents', 0),
(3645, 662, 552, 3392, 'Supporting Contents', 0),
(3646, 662, 553, 3392, 'Supporting Contents', 0),
(3647, 662, 555, 3392, 'Supporting Contents', 0),
(3648, 662, 556, 3392, 'Supporting Contents', 0),
(3649, 662, 557, 3392, 'Supporting Contents', 0),
(3650, 662, 559, 3392, 'Supporting Contents', 0),
(3651, 662, 560, 3392, 'Supporting Contents', 0),
(3652, 662, 561, 3392, 'Supporting Contents', 0),
(3653, 662, 566, 3392, 'Supporting Contents', 0),
(3654, 662, 568, 3392, 'Supporting Contents', 0),
(3655, 662, 569, 3392, 'Supporting Contents', 0),
(3656, 662, 570, 3392, 'Supporting Contents', 0),
(3657, 662, 571, 3392, 'Supporting Contents', 0),
(3658, 662, 572, 3392, 'Supporting Contents', 0),
(3659, 662, 573, 3392, 'Supporting Contents', 0),
(3660, 662, 574, 3392, 'Supporting Contents', 0),
(3661, 662, 575, 3392, 'Supporting Contents', 0),
(3662, 662, 576, 3392, 'Supporting Contents', 0),
(3663, 662, 577, 3392, 'Supporting Contents', 0),
(3664, 662, 578, 3392, 'Supporting Contents', 0),
(3665, 662, 579, 3392, 'Supporting Contents', 0),
(3666, 662, 581, 3392, 'Supporting Contents', 0),
(3667, 662, 583, 3392, 'Supporting Contents', 0),
(3668, 662, 584, 3392, 'Supporting Contents', 0),
(3669, 662, 585, 3392, 'Supporting Contents', 0),
(3670, 662, 586, 3392, 'Supporting Contents', 0),
(3671, 662, 587, 3392, 'Supporting Contents', 0),
(3672, 662, 588, 3392, 'Supporting Contents', 0),
(3673, 662, 590, 3392, 'Supporting Contents', 0),
(3674, 662, 591, 3392, 'Supporting Contents', 0),
(3675, 662, 592, 3392, 'Supporting Contents', 0),
(3676, 662, 593, 3392, 'Supporting Contents', 0),
(3677, 662, 595, 3392, 'Supporting Contents', 0),
(3678, 662, 596, 3392, 'Supporting Contents', 0),
(3679, 662, 597, 3392, 'Supporting Contents', 0),
(3680, 662, 599, 3392, 'Supporting Contents', 0),
(3681, 662, 600, 3392, 'Supporting Contents', 0),
(3682, 662, 601, 3392, 'Supporting Contents', 0),
(3683, 662, 607, 3392, 'Supporting Contents', 0),
(3684, 662, 608, 3392, 'Supporting Contents', 0),
(3685, 662, 609, 3392, 'Supporting Contents', 0),
(3686, 662, 610, 3392, 'Supporting Contents', 0),
(3687, 662, 612, 3392, 'Supporting Contents', 0),
(3688, 662, 613, 3392, 'Supporting Contents', 0),
(3689, 662, 615, 3392, 'Supporting Contents', 0),
(3690, 662, 616, 3392, 'Supporting Contents', 0),
(3691, 662, 618, 3392, 'Supporting Contents', 0),
(3692, 662, 619, 3392, 'Supporting Contents', 0),
(3693, 662, 620, 3392, 'Supporting Contents', 0),
(3694, 662, 621, 3392, 'Supporting Contents', 0),
(3695, 662, 622, 3392, 'Supporting Contents', 0),
(3696, 662, 624, 3392, 'Supporting Contents', 0),
(3697, 662, 626, 3392, 'Supporting Contents', 0),
(3698, 662, 627, 3392, 'Supporting Contents', 0),
(3699, 662, 628, 3392, 'Supporting Contents', 0),
(3700, 662, 629, 3392, 'Supporting Contents', 0),
(3701, 662, 630, 3392, 'Supporting Contents', 0),
(3702, 662, 631, 3392, 'Supporting Contents', 0),
(3703, 662, 633, 3392, 'Supporting Contents', 0),
(3704, 659, 634, 3392, 'Supporting Contents', 0),
(3705, 660, 634, 3392, 'Supporting Contents', 0),
(3706, 661, 634, 3392, 'Supporting Contents', 0),
(3707, 662, 634, 3392, 'Supporting Contents', 0),
(3708, 659, 635, 3392, 'Supporting Contents', 0),
(3709, 660, 635, 3392, 'Supporting Contents', 0),
(3710, 661, 635, 3392, 'Supporting Contents', 0),
(3711, 662, 635, 3392, 'Supporting Contents', 0),
(3712, 659, 636, 3392, 'Supporting Contents', 0),
(3713, 660, 636, 3392, 'Supporting Contents', 0),
(3714, 661, 636, 3392, 'Supporting Contents', 0),
(3715, 662, 636, 3392, 'Supporting Contents', 0),
(3716, 663, 638, 3393, 'Supporting Contents', 0),
(3717, 664, 638, 3393, 'Supporting Contents', 0),
(3818, 663, 639, 3393, 'Supporting Contents', 0),
(3819, 664, 639, 3393, 'Supporting Contents', 0),
(3822, 663, 640, 3393, 'Supporting Contents', 0),
(3823, 664, 640, 3393, 'Supporting Contents', 0),
(3826, 667, 642, 3394, 'Supporting Contents', 0),
(3827, 668, 642, 3394, 'Supporting Contents', 0),
(3829, 0, 0, 3397, 'Untitle list', 1),
(3830, 0, 0, 3397, 'Untitle list', 1),
(3832, 670, 644, 3400, 'Supporting Contents', 0),
(3833, 671, 644, 3400, 'Supporting Contents', 0),
(3835, 0, 0, 3403, 'Untitle list', 1),
(3836, 0, 0, 3403, 'Untitle list', 1),
(3837, 0, 0, 3403, 'Untitle list', 1),
(3838, 0, 0, 3424, 'On-Campus:', 1),
(3839, 0, 0, 3424, 'Untitle list', 1),
(3840, 0, 0, 3424, 'Off-Campus', 1),
(3841, 0, 0, 3424, 'Untitle list', 1),
(3842, 0, 0, 3433, 'Untitle list', 1),
(3843, 0, 0, 3433, 'Untitle list', 1),
(3844, 0, 0, 3433, 'Untitle list', 1),
(3845, 0, 0, 3433, 'Untitle list', 1),
(3846, 0, 0, 3436, 'When ?', 1),
(3847, 0, 0, 3436, 'Untitle list', 1),
(3848, 0, 0, 3436, 'With Whom?', 1),
(3849, 0, 0, 3436, 'Untitle list', 1),
(3850, 673, 646, 3438, 'Supporting Contents', 0),
(3851, 674, 646, 3438, 'Supporting Contents', 0),
(3852, 675, 646, 3438, 'Supporting Contents', 0),
(3853, 673, 647, 3438, 'Supporting Contents', 0),
(3854, 674, 647, 3438, 'Supporting Contents', 0),
(3855, 675, 647, 3438, 'Supporting Contents', 0),
(3856, 673, 648, 3438, 'Supporting Contents', 0),
(3857, 674, 648, 3438, 'Supporting Contents', 0),
(3858, 675, 648, 3438, 'Supporting Contents', 0),
(3859, 673, 649, 3438, 'Supporting Contents', 0),
(3860, 674, 649, 3438, 'Supporting Contents', 0),
(3861, 675, 649, 3438, 'Supporting Contents', 0),
(3862, 0, 0, 3442, 'Untitle list', 1),
(3863, 0, 0, 3442, 'Untitle list', 1),
(3864, 0, 0, 3442, 'Untitle list', 1),
(3865, 676, 651, 3460, 'Supporting Contents', 0),
(3866, 677, 651, 3460, 'Supporting Contents', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tablecolumn_number`
--

CREATE TABLE `tablecolumn_number` (
  `tc_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `formid` int(11) NOT NULL,
  `bg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablecolumn_number`
--

INSERT INTO `tablecolumn_number` (`tc_id`, `type`, `formid`, `bg`) VALUES
(461, 'header', 2119, 'table-secondary'),
(462, 'content', 2119, ''),
(483, 'header', 2565, 'table-secondary'),
(484, 'content', 2565, ''),
(485, 'content', 2565, ''),
(486, 'content', 2565, ''),
(487, 'header', 2685, 'table-secondary'),
(488, 'content', 2685, ''),
(489, 'header', 2670, 'table-secondary'),
(490, 'content', 2670, ''),
(509, 'header', 2764, 'table-secondary'),
(510, 'content', 2764, ''),
(511, 'header', 2846, 'table-secondary'),
(512, 'content', 2846, ''),
(513, 'header', 2849, 'table-secondary'),
(514, 'content', 2849, ''),
(515, 'content', 2849, ''),
(516, 'content', 2849, ''),
(517, 'content', 2849, ''),
(518, 'content', 2849, ''),
(519, 'content', 2849, ''),
(520, 'header', 2851, 'table-secondary'),
(521, 'content', 2851, ''),
(522, 'content', 2851, ''),
(523, 'content', 2851, ''),
(524, 'content', 2851, ''),
(525, 'header', 2852, 'table-secondary'),
(526, 'content', 2852, ''),
(527, 'content', 2852, ''),
(528, 'content', 2852, ''),
(529, 'header', 2881, 'table-secondary'),
(530, 'content', 2881, ''),
(531, 'header', 2891, 'table-secondary'),
(532, 'content', 2891, ''),
(533, 'header', 2894, 'table-secondary'),
(534, 'content', 2894, ''),
(535, 'content', 2894, ''),
(536, 'content', 2894, ''),
(537, 'header', 3022, 'table-secondary'),
(540, 'content', 3022, ''),
(541, 'header', 3025, 'table-secondary'),
(542, 'content', 3025, ''),
(543, 'content', 3025, ''),
(544, 'content', 3025, ''),
(545, 'content', 3025, ''),
(546, 'content', 3025, ''),
(547, 'content', 3025, ''),
(548, 'header', 3028, 'table-secondary'),
(549, 'content', 3028, ''),
(550, 'content', 3028, ''),
(551, 'content', 3028, ''),
(552, 'content', 3028, ''),
(553, 'content', 3028, ''),
(554, 'header', 3029, 'table-secondary'),
(555, 'content', 3029, ''),
(556, 'content', 3029, ''),
(557, 'content', 3029, ''),
(558, 'header', 3073, 'table-secondary'),
(559, 'content', 3073, ''),
(560, 'content', 3073, ''),
(561, 'content', 3073, ''),
(565, 'header', 3157, 'table-secondary'),
(566, 'content', 3157, ''),
(567, 'header', 3228, 'table-secondary'),
(568, 'content', 3228, ''),
(569, 'content', 3228, ''),
(570, 'content', 3228, ''),
(571, 'content', 3228, ''),
(572, 'content', 3228, ''),
(573, 'content', 3228, ''),
(574, 'content', 3228, ''),
(575, 'content', 3228, ''),
(576, 'content', 3228, ''),
(577, 'content', 3228, ''),
(578, 'content', 3228, ''),
(579, 'content', 3228, ''),
(580, 'header', 3232, 'table-secondary'),
(581, 'content', 3232, ''),
(582, 'header', 3235, 'table-secondary'),
(583, 'content', 3235, ''),
(584, 'content', 3235, ''),
(585, 'content', 3235, ''),
(586, 'content', 3235, ''),
(587, 'content', 3235, ''),
(588, 'content', 3235, ''),
(589, 'header', 3237, 'table-secondary'),
(590, 'content', 3237, ''),
(591, 'content', 3237, ''),
(592, 'content', 3237, ''),
(593, 'content', 3237, ''),
(594, 'header', 3238, 'table-secondary'),
(595, 'content', 3238, ''),
(596, 'content', 3238, ''),
(597, 'content', 3238, ''),
(598, 'header', 3280, 'table-secondary'),
(599, 'content', 3280, ''),
(600, 'content', 3280, ''),
(601, 'content', 3280, ''),
(606, 'header', 3339, 'table-secondary'),
(607, 'content', 3339, ''),
(608, 'content', 3339, ''),
(609, 'content', 3339, ''),
(610, 'content', 3339, ''),
(611, 'header', 3375, 'table-secondary'),
(612, 'content', 3375, ''),
(613, 'content', 3375, ''),
(615, 'content', 3375, ''),
(616, 'content', 3375, ''),
(618, 'content', 3375, ''),
(619, 'content', 3375, ''),
(620, 'content', 3375, ''),
(621, 'content', 3375, ''),
(622, 'content', 3375, ''),
(623, 'header', 3384, 'table-secondary'),
(624, 'content', 3384, ''),
(625, 'header', 3389, 'table-success'),
(626, 'content', 3389, ''),
(627, 'content', 3389, ''),
(628, 'content', 3389, ''),
(629, 'content', 3389, ''),
(630, 'content', 3389, ''),
(631, 'content', 3389, ''),
(632, 'header', 3392, 'table-secondary'),
(633, 'content', 3392, ''),
(634, 'content', 3392, ''),
(635, 'content', 3392, ''),
(636, 'content', 3392, ''),
(637, 'header', 3393, 'table-info'),
(638, 'content', 3393, ''),
(639, 'content', 3393, ''),
(640, 'content', 3393, ''),
(641, 'header', 3394, 'table-danger'),
(642, 'content', 3394, ''),
(643, 'header', 3400, 'table-secondary'),
(644, 'content', 3400, ''),
(645, 'header', 3438, 'table-success'),
(646, 'content', 3438, ''),
(647, 'content', 3438, ''),
(648, 'content', 3438, ''),
(649, 'content', 3438, ''),
(650, 'header', 3460, 'table-secondary'),
(651, 'content', 3460, '');

-- --------------------------------------------------------

--
-- Table structure for table `tempstorage`
--

CREATE TABLE `tempstorage` (
  `resid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `details` text NOT NULL,
  `replaced_details` text NOT NULL,
  `datecreated` date NOT NULL,
  `tempid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_answers`
--

CREATE TABLE `temp_answers` (
  `tid` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `sec_no` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `csformid` int(11) NOT NULL,
  `tble_id` int(11) NOT NULL,
  `tc_id` int(11) NOT NULL,
  `tcontent_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `datecreated` datetime NOT NULL,
  `tble` int(11) NOT NULL,
  `list` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `userid` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mname` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `ipaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `updte`
--

CREATE TABLE `updte` (
  `upt_id` int(11) NOT NULL,
  `updateonly` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `updte_pages`
--

CREATE TABLE `updte_pages` (
  `pageID` int(11) NOT NULL,
  `upt_id` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `videocontent`
--

CREATE TABLE `videocontent` (
  `vid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `video` longtext NOT NULL,
  `thumbnail` mediumtext NOT NULL,
  `datecreated` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videocontent`
--

INSERT INTO `videocontent` (`vid`, `title`, `video`, `thumbnail`, `datecreated`, `status`) VALUES
(1, 'video1', '', '628video_gcc.png', '2021-10-27 10:29:16', 1),
(2, 'video 2', '', '628video_gcc.png', '2021-10-27 10:29:16', 0),
(3, 'video3', '', '628video_gcc.png', '2021-10-27 10:29:16', 0),
(4, 'video4', '', '628video_gcc.png', '2021-10-27 10:29:51', 0),
(5, 'video5', '', '628video_gcc.png', '2021-10-27 10:29:51', 0),
(6, 'video6', '', '628video_gcc.png', '2021-10-27 10:29:51', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addchoice`
--
ALTER TABLE `addchoice`
  ADD PRIMARY KEY (`chid`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`caro_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `client_ip`
--
ALTER TABLE `client_ip`
  ADD PRIMARY KEY (`ipid`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`CollegeId`);

--
-- Indexes for table `counseling_request`
--
ALTER TABLE `counseling_request`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `form_classification`
--
ALTER TABLE `form_classification`
  ADD PRIMARY KEY (`csform_id`);

--
-- Indexes for table `form_response`
--
ALTER TABLE `form_response`
  ADD PRIMARY KEY (`pds_id`);

--
-- Indexes for table `gui`
--
ALTER TABLE `gui`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logs_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `newsfeed`
--
ALTER TABLE `newsfeed`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`oidd`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageid`);

--
-- Indexes for table `peer_facilitator`
--
ALTER TABLE `peer_facilitator`
  ADD PRIMARY KEY (`pf_id`);

--
-- Indexes for table `photoalbum`
--
ALTER TABLE `photoalbum`
  ADD PRIMARY KEY (`paid`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `referral_history`
--
ALTER TABLE `referral_history`
  ADD PRIMARY KEY (`rh_id`);

--
-- Indexes for table `scheduler`
--
ALTER TABLE `scheduler`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `sem_year`
--
ALTER TABLE `sem_year`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `sf_content`
--
ALTER TABLE `sf_content`
  ADD PRIMARY KEY (`sfid`);

--
-- Indexes for table `shifting_history`
--
ALTER TABLE `shifting_history`
  ADD PRIMARY KEY (`sh_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `tablechoices`
--
ALTER TABLE `tablechoices`
  ADD PRIMARY KEY (`tble_id`);

--
-- Indexes for table `tablecolumn_content`
--
ALTER TABLE `tablecolumn_content`
  ADD PRIMARY KEY (`tcontent_id`);

--
-- Indexes for table `tablecolumn_number`
--
ALTER TABLE `tablecolumn_number`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indexes for table `tempstorage`
--
ALTER TABLE `tempstorage`
  ADD PRIMARY KEY (`resid`);

--
-- Indexes for table `temp_answers`
--
ALTER TABLE `temp_answers`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `updte`
--
ALTER TABLE `updte`
  ADD PRIMARY KEY (`upt_id`);

--
-- Indexes for table `updte_pages`
--
ALTER TABLE `updte_pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indexes for table `videocontent`
--
ALTER TABLE `videocontent`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addchoice`
--
ALTER TABLE `addchoice`
  MODIFY `chid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=885;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `caro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1043;

--
-- AUTO_INCREMENT for table `client_ip`
--
ALTER TABLE `client_ip`
  MODIFY `ipid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `CollegeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `counseling_request`
--
ALTER TABLE `counseling_request`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=442;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3485;

--
-- AUTO_INCREMENT for table `form_classification`
--
ALTER TABLE `form_classification`
  MODIFY `csform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `form_response`
--
ALTER TABLE `form_response`
  MODIFY `pds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4695;

--
-- AUTO_INCREMENT for table `gui`
--
ALTER TABLE `gui`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `newsfeed`
--
ALTER TABLE `newsfeed`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2613;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `oidd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `peer_facilitator`
--
ALTER TABLE `peer_facilitator`
  MODIFY `pf_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `photoalbum`
--
ALTER TABLE `photoalbum`
  MODIFY `paid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1403;

--
-- AUTO_INCREMENT for table `referral_history`
--
ALTER TABLE `referral_history`
  MODIFY `rh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `scheduler`
--
ALTER TABLE `scheduler`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sem_year`
--
ALTER TABLE `sem_year`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sf_content`
--
ALTER TABLE `sf_content`
  MODIFY `sfid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1370;

--
-- AUTO_INCREMENT for table `shifting_history`
--
ALTER TABLE `shifting_history`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tablechoices`
--
ALTER TABLE `tablechoices`
  MODIFY `tble_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=688;

--
-- AUTO_INCREMENT for table `tablecolumn_content`
--
ALTER TABLE `tablecolumn_content`
  MODIFY `tcontent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3895;

--
-- AUTO_INCREMENT for table `tablecolumn_number`
--
ALTER TABLE `tablecolumn_number`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=658;

--
-- AUTO_INCREMENT for table `tempstorage`
--
ALTER TABLE `tempstorage`
  MODIFY `resid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320213554;

--
-- AUTO_INCREMENT for table `temp_answers`
--
ALTER TABLE `temp_answers`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6298;

--
-- AUTO_INCREMENT for table `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `updte`
--
ALTER TABLE `updte`
  MODIFY `upt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `updte_pages`
--
ALTER TABLE `updte_pages`
  MODIFY `pageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `videocontent`
--
ALTER TABLE `videocontent`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
