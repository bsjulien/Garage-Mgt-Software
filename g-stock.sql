-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 02:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g-stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `email` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `date_made` varchar(20) NOT NULL,
  `discription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `message`, `email`, `name`, `phone`, `date_made`, `discription`) VALUES
(1, 'My car tires have been damaged', 'manzithierry001@gmai', 'Manzi Thierry', '78527139', '', 'RESPONDED'),
(2, 'My car tires have been damaged', 'manzithierry001@gmai', 'Manzi Thierry', '078527139', '', 'RESPONDED'),
(3, 'please pick me up at expo ground', 'bangara@gmail.com', 'BANGARA', '+250 788993344', '', 'RESPONDED');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_spair_parts`
--

CREATE TABLE `deleted_spair_parts` (
  `Id` int(11) NOT NULL,
  `deleting_reason` text NOT NULL,
  `deleted_spair_id` int(11) NOT NULL,
  `deleted_spair_name` varchar(100) NOT NULL,
  `spare_type` varchar(100) NOT NULL,
  `spare_categorie` varchar(100) NOT NULL,
  `spare_quantitie` int(6) NOT NULL,
  `spare_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted_spair_parts`
--

INSERT INTO `deleted_spair_parts` (`Id`, `deleting_reason`, `deleted_spair_id`, `deleted_spair_name`, `spare_type`, `spare_categorie`, `spare_quantitie`, `spare_status`) VALUES
(1, 'Wrong Input', 13, 'ROTOROVISERI', 'ROVER', 'ORIGINAL', 15, ''),
(2, 'Because there are expired', 8, 'PARABRIZE', 'VATIRI', 'ORIGINAL', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `garage_car_transactions`
--

CREATE TABLE `garage_car_transactions` (
  `id` int(10) NOT NULL,
  `transaction_id` int(50) NOT NULL,
  `custormer_name` varchar(100) NOT NULL,
  `custormer_phone_no` varchar(30) NOT NULL,
  `custormer_address` varchar(60) NOT NULL,
  `custormer_car_type` varchar(100) NOT NULL,
  `car_plate_no` varchar(10) NOT NULL,
  `date_in` varchar(15) NOT NULL,
  `spare_id_used` int(10) NOT NULL,
  `worker_used` varchar(50) NOT NULL,
  `spare_price` int(6) NOT NULL,
  `worker_price` int(6) NOT NULL,
  `bill` int(10) NOT NULL,
  `date_out` varchar(15) NOT NULL,
  `transaction_status` varchar(15) NOT NULL,
  `spare_quantitie_used` int(10) NOT NULL,
  `payed_amount` int(10) NOT NULL,
  `made_by` varchar(100) NOT NULL,
  `problem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garage_car_transactions`
--

INSERT INTO `garage_car_transactions` (`id`, `transaction_id`, `custormer_name`, `custormer_phone_no`, `custormer_address`, `custormer_car_type`, `car_plate_no`, `date_in`, `spare_id_used`, `worker_used`, `spare_price`, `worker_price`, `bill`, `date_out`, `transaction_status`, `spare_quantitie_used`, `payed_amount`, `made_by`, `problem`) VALUES
(1, 1, 'manzi thierry', '+250 785270139', 'KK450', 'TOYOTA', 'RAD708x', '2018-04-29', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(2, 2, 'Muhizi jackson', '+250 784451454', 'kayonza', 'PRADO', 'RAB408D', '2018-05-03', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(3, 3, 'Mugisha Gideon', '+250 789969782', 'KK450', 'RAV 4', 'RAD 900X', '2018-05-06', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(13, 1, '', '', '', '', 'RAD708x', '2018-04-29', 1, '1', 20000, 10000, 0, '', '', 2, 0, '', ''),
(14, 2, '', '', '', '', 'RAB408D', '2018-05-03', 1, '2', 2000, 10000, 0, '', '', 0, 0, '', ''),
(15, 4, 'Baju', '+250 789969782', 'kicukiro', 'audi', 'rad500x', '2018-05-23', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(16, 2, '', '', '', '', 'RAB408D', '2018-05-03', 1, '2', 30000, 20000, 0, '', '', 1, 0, '', ''),
(17, 2, '', '', '', '', 'RAB408D', '2018-05-03', 1, '', 2000, 0, 0, '', '', 1, 0, '', ''),
(18, 2, '', '', '', '', 'RAB408D', '2018-05-03', 11, '', 2000, 0, 0, '', '', 3, 0, '', ''),
(19, 2, '', '', '', '', 'RAB408D', '2018-05-03', 11, '', 2000, 0, 0, '', '', 2, 0, '', ''),
(20, 5, 'WIYIZIRE OLVIER', '+250 789905678', 'KIMIRONKO', 'RANGE ROVER', 'RAD 700F', '2018-05-25', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(21, 5, '', '', '', '', 'RAD 700F', '2018-05-25', 11, '', 5000, 0, 0, '', '', 1, 0, '', ''),
(27, 6, 'ITEKA LAURE', '+250 7225270139', 'KICUKIRO', 'RAV 4', 'RAD478X', '2018-05-25', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(28, 6, '', '', '', '', 'RAD478X', '2018-05-25', 9, '', 50000, 0, 0, '', '', 1, 0, '', ''),
(29, 2, '', '', '', '', 'RAB408D', '2018-05-03', 67, '', 10000, 0, 0, '', '', 0, 0, '', ''),
(30, 2, '', '', '', '', 'RAB408D', '2018-05-03', 68, '', 1000, 0, 0, '', '', 0, 0, '', ''),
(31, 2, '', '', '', '', 'RAB408D', '2018-05-03', 68, '', 10000, 0, 0, '', '', 0, 0, '', ''),
(32, 2, '', '', '', '', 'RAB408D', '2018-05-03', 68, '', 30000, 0, 0, '', '', 0, 0, '', ''),
(33, 2, '', '', '', '', 'RAB408D', '2018-05-03', 68, '', 30000, 0, 0, '', '', 1, 0, '', ''),
(34, 7, 'BASHIR', '+250 781888879', 'KIMIRONKO', 'MITSUBISHI', 'IT 100', '2018-05-29', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(35, 2, '', '', '', '', 'RAB408D', '2018-05-03', 7, '', 140000, 0, 0, '', '', 1, 0, '', ''),
(36, 7, '', '', '', '', 'IT 100', '2018-05-29', 7, '', 140000, 0, 0, '', '', 1, 0, '', ''),
(37, 8, 'EMMABLE', '+250 788506040', 'KACYIRU', 'TOYOTA', 'RAD 900 F', '2018-06-01', 0, '', 0, 0, 0, '', 'FINISHED', 0, 70000, '', ''),
(38, 8, '', '', '', '', 'RAD 900 F', '2018-06-01', 22, '', 50000, 0, 0, '', '', 2, 0, '', ''),
(39, 9, 'Jeannette', '+250 784451454', 'KAYONZA', 'RAV 4', 'RAD 498 X', '2018-06-02', 0, '', 0, 0, 0, '', 'FINISHED', 0, 0, '', ''),
(40, 9, '', '', '', '', 'RAD 498 X', '2018-06-02', 9, '', 120000, 0, 0, '', '', 1, 0, '', ''),
(41, 10, 'KONTA', '+250 78569456', 'KAYONZA', 'PRADO', 'RAB 100 D', '2018-06-02', 0, '', 0, 0, 0, '', 'FINISHED', 0, 0, '', ''),
(42, 10, '', '', '', '', 'RAB 100 D', '2018-06-02', 30, '', 30000, 0, 0, '', '', 1, 0, '', ''),
(43, 10, '', '', '', '', 'RAB 100 D', '2018-06-02', 21, '7', 25000, 20000, 0, '', '', 2, 0, '', ''),
(44, 11, 'MBONNYI FRANK', '+250 72659632', 'KAGUGU', 'BENZ', 'RAD 300X', '2018-06-27', 0, '', 0, 0, 0, '', 'FINISHED', 0, 0, '', ''),
(45, 11, '', '', '', '', 'RAD 300X', '2018-06-27', 1, '', 15000, 0, 0, '', '', 2, 0, '', ''),
(46, 12, 'KATTY CALINE', '+250 788556699', 'KACYIRU', 'COROLA', 'RAB 356 D', '2018-07-03', 0, '', 0, 0, 0, '', 'FINISHED', 0, 0, '', ''),
(47, 12, '', '', '', '', 'RAB 356 D', '2018-07-03', 16, '', 16000, 0, 0, '', '', 3, 0, '', ''),
(48, 12, '', '', '', '', 'RAB 356 D', '2018-07-03', 18, '', 25000, 0, 0, '', '', 0, 0, '', ''),
(49, 12, '', '', '', '', 'RAB 356 D', '2018-07-03', 17, '', 12000, 0, 0, '', '', 0, 0, '', ''),
(50, 12, '', '', '', '', 'RAB 356 D', '2018-07-03', 21, '', 13000, 0, 0, '', '', 10, 0, '', ''),
(51, 13, 'ISHIMWE ARNOLD', '+250 788502021', 'GIKONDO', 'RANGE ROVER', 'rad 673 l', '2018-07-07', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(52, 13, '', '', '', '', 'rad 673 l', '2018-07-07', 37, '', 4000, 0, 0, '', '', 0, 0, '', ''),
(53, 13, '', '', '', '', 'rad 673 l', '2018-07-07', 19, '', 28000, 0, 0, '', '', 0, 0, '', ''),
(54, 13, '', '', '', '', 'rad 673 l', '2018-07-07', 11, '', 85000, 0, 0, '', '', 0, 0, '', ''),
(55, 13, '', '', '', '', 'rad 673 l', '2018-07-07', 21, '', 12000, 0, 0, '', '', 0, 0, '', ''),
(56, 14, 'FELIX', '+250785656556', 'KACYIRU', 'RANGE ROVER', 'RAD409T', '2018-07-07', 0, '', 0, 0, 0, '', 'FINISHED', 0, 154000, '', ''),
(57, 14, '', '', '', '', 'RAD409T', '2018-07-07', 18, '', 25000, 0, 0, '', '', 0, 0, '', ''),
(58, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '5', 28000, 20000, 0, '', '', 0, 0, '', ''),
(59, 14, '', '', '', '', 'RAD409T', '2018-07-07', 16, '', 16000, 0, 0, '', '', 0, 0, '', ''),
(60, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '', 27000, 0, 0, '', '', 0, 0, '', ''),
(61, 14, '', '', '', '', 'RAD409T', '2018-07-07', 16, '', 16000, 0, 0, '', '', 0, 0, '', ''),
(62, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '', 27000, 0, 0, '', '', 0, 0, '', ''),
(63, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '', 27000, 0, 0, '', '', 0, 0, '', ''),
(64, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '', 27000, 0, 0, '', '', 0, 0, '', ''),
(65, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '', 27000, 0, 0, '', '', 0, 0, '', ''),
(66, 14, '', '', '', '', 'RAD409T', '2018-07-07', 19, '', 27000, 0, 0, '', '', 2, 0, '', ''),
(67, 15, 'JAMES', '+250 785270139', 'IREMERA', 'AUDI', 'RAB 200 F', '2018-07-12', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(68, 16, 'KARARA', '+250 72165896', 'KICUKIRO', 'RAV 4', 'RAD  500E', '2018-07-12', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, '', ''),
(69, 16, '', '', '', '', 'RAD  500E', '2018-07-12', 17, '', 12000, 0, 0, '', '', 2, 0, '', ''),
(70, 15, '', '', '', '', 'RAB 200 F', '2018-07-12', 68, '', 32000, 0, 0, '', '', 0, 0, '', ''),
(71, 16, '', '', '', '', 'RAD  500E', '2018-07-12', 17, '', 12000, 0, 0, '', '', 2, 0, '', ''),
(72, 17, 'ALLY', '+250 788556633', 'KAYONZA KK47', 'BENZ', 'RAD 001 D', '2018-08-03', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, 'Ndayiragije Patrice', ' + irwaye amapine + parablize yaramenetse + '),
(73, 17, '', '', '', '', 'RAD 001 D', '2018-08-03', 68, '', 300000, 0, 0, '', '', 2, 0, 'Ndayiragije Patrice', ''),
(74, 18, 'thierry', '+250 785270195', 'KAYONZA', 'RANGE ROVER', 'rad 600 v', '2018-08-08', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, 'Murengezi Bangar', ''),
(75, 18, '', '', '', '', 'rad 600 v', '2018-08-08', 7, '', 140000, 0, 0, '', '', 2, 0, 'Murengezi Bangar', ''),
(76, 18, '', '', '', '', 'rad 600 v', '2018-08-08', 7, '', 140000, 0, 0, '', '', 0, 0, 'Murengezi Bangar', ''),
(77, 19, 'karenzi', '+250 789969782', 'KIMIRONKO', 'RANGE ROVER', 'rad 600 g', '2018-08-08', 0, '', 0, 0, 0, '', 'IN_PROGRESS', 0, 0, 'Ndayiragije Patrice', ' amapine + parabrize'),
(78, 19, '', '', '', '', 'rad 600 g', '2018-08-08', 19, '', 27000, 0, 0, '', '', 2, 0, 'Ndayiragije Patrice', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_bought_outside`
--

CREATE TABLE `product_bought_outside` (
  `id` int(10) NOT NULL,
  `transaction_id` int(10) NOT NULL,
  `product_bought` varchar(100) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_quantitie` int(10) NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_bought_outside`
--

INSERT INTO `product_bought_outside` (`id`, `transaction_id`, `product_bought`, `product_price`, `product_quantitie`, `reason`) VALUES
(1, 8, 'Super glue', 200, 2, 'iracyenewe						\n								'),
(2, 8, 'Omo', 200, 2, 'Koza imodoka							'),
(3, 8, 'Isabune', 100, 2, 'Koza										');

-- --------------------------------------------------------

--
-- Table structure for table `spair_parts`
--

CREATE TABLE `spair_parts` (
  `spare_part_id` int(11) NOT NULL,
  `spare_part_name` varchar(50) NOT NULL,
  `spare_part_type` varchar(50) NOT NULL,
  `spare_part_categorie` varchar(50) NOT NULL,
  `spare_part_quantitie` int(20) NOT NULL,
  `price_bought_spare` int(100) NOT NULL,
  `spare_minimum_price` int(100) NOT NULL,
  `status` varchar(150) NOT NULL,
  `registration_date` varchar(50) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `spare_quantitie_remaining` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spair_parts`
--

INSERT INTO `spair_parts` (`spare_part_id`, `spare_part_name`, `spare_part_type`, `spare_part_categorie`, `spare_part_quantitie`, `price_bought_spare`, `spare_minimum_price`, `status`, `registration_date`, `buyer_name`, `spare_quantitie_remaining`) VALUES
(1, 'PARISHOKE', '2 HAND', 'SCANIA', 10, 42000, 10000, '', '2018-04-25', 'Manzi Thierry', 8),
(2, 'PARISHOKE', 'SECOND TYPE', 'LANDCRUSER', 20, 100000, 5000, '', '2018-04-25', 'Manzi Thierry', 20),
(3, 'FAN', 'ORIGINAL', 'LANDCRUSER', 10, 100000, 11000, '', '2018-04-25', 'Manzi Thierry', 10),
(4, 'SHAMPOMA', 'ORIGINAL', 'LANDCRUSER', 30, 100000, 0, '', '2018-04-25', 'Manzi Thierry', 30),
(6, 'PARABRIZE', 'ORIGINAL', 'SCANIA', 2, 400000, 240000, '', '2018-04-25', 'Manzi Thierry', 2),
(7, 'PARABRIZE', 'ORIGINAL', 'RANGE ROVER', 5, 550000, 130000, '', '2018-04-25', 'Manzi Thierry', 5),
(9, 'PARABRIZE', 'ORIGINAL', 'RAV4', 3, 250000, 100000, '', '2018-04-25', 'Manzi Thierry', 2),
(10, 'AMAPINE', '3KARE-ORIGINAL', 'SCANIA', 4, 300000, 130000, '', '2018-04-25', 'Manzi Thierry', 4),
(11, 'AMAPINE', 'ORIGINAL', 'ROVER', 11, 300000, 80000, '', '2018-04-25', 'Manzi Thierry', 11),
(12, 'ROTOROVISERI', 'ORIGINAL', 'LAND CRUSER', 15, 100000, 10000, '', '2018-04-25', 'Manzi Thierry', 15),
(14, 'SAMPOMA', '2 TYPE', 'KWASITERI', 5, 50000, 12000, '', '2018-04-25', 'Manzi Thierry', 5),
(16, 'SHAMPOMA', 'ORIGINAL', 'KWASITERI', 5, 70000, 15000, '', '2018-04-25', 'Manzi Thierry', 6),
(17, 'MOROTISERI', 'ORIGINAL', 'RAV4', 30, 150000, 10000, '', '2018-04-25', 'Manzi Thierry', 28),
(18, 'MOROTISERI', 'ORIGINAL', 'KWASITERI', 5, 100000, 23000, '', '2018-04-5', 'Manzi Thierry', 5),
(19, 'MOROTISERI', 'ORIGINAL', 'RANGE ROVER', 5, 100000, 26000, '', '2018-04-5', 'Manzi Thierry', 3),
(20, 'MOROTISERI', 'ORIGINAL', 'FUSO', 5, 10000, 25000, '', '2018-04-5', 'Manzi Thierry', 5),
(21, 'RADIO', 'ORIGINAL', 'LAND CRUSER', 20, 200000, 12000, '', '2018-04-5', 'Manzi Thierry', 20),
(22, 'VIDEO SCREEN', 'SECOND HAND', 'TOYOTA', 2, 70000, 45000, '', '2018-04-5', 'Manzi Thierry', 0),
(24, 'BENZ LOGO', 'ORIGINAL ', 'SILVER', 2, 25000, 20000, '', '2018-04-5', 'Manzi Thierry', 2),
(25, 'WATER SPENSOR', '32-KARE', '2 METER', 4, 22000, 9000, '', '2018-04-5', 'Manzi Thierry', 4),
(26, 'AMAVUTA YA FERI', 'ORIGINAL', 'ALL', 30, 35000, 2000, '', '2018-04-5', 'Manzi Thierry', 30),
(30, 'Ibinyoteri', 'original', 'land cruser', 3, 60000, 25000, '', '2018-04-5', 'Manzi Thierry', 2),
(31, 'radio', '2 hand', 'land cruser', 2, 10000, 0, '', '2018-04-5', 'Manzi Thierry', 2),
(32, 'radio', 'original', 'Rav4', 5, 45000, 12000, '', '2018-04-5', 'Manzi Thierry', 5),
(33, 'Ibinyoteri', 'original', 'kwasiteri', 3, 60000, 26000, '', '2018-04-5', 'Manzi Thierry', 3),
(34, 'radio', 'original', 'SCANIA', 4, 100000, 25000, '', '2018-03-24', 'Manzi Thierry', 4),
(35, 'Ibinyoteri', 'original', 'SCANIA', 3, 100000, 30000, '', '2018-03-24', 'Manzi Thierry', 3),
(36, 'radio', 'original', 'kwasiteri', 5, 50000, 13000, '', '2018-03-24', 'Manzi Thierry', 5),
(37, 'Ibinyoteri', 'original', 'range rover', 6, 180000, 35000, '', '2018-03-23', 'Manzi Thierry', 6),
(39, 'Ibinyoteri', '2 hand', 'range rover', 3, 50000, 20000, '', '2018-03-23', 'Manzi Thierry', 3),
(40, 'Ibinyoteri', 'original', 'SCANIA', 6, 200000, 50000, '', '2018-03-23', 'Manzi Thierry', 6),
(42, 'Ibinyoteri', 'original', 'RIMIZINI', 5, 100000, 26000, '', '2018-03-25', 'Manzi Thierry', 5),
(43, 'KONTERE SHOKE', 'SECOND HAND', 'TOYOTA', 7, 50000, 11000, '', '2018-03-25', 'Manzi Thierry', 7),
(44, 'Ibinyoteri', 'original', 'range rover', 3, 50000, 22000, '', '2018-03-25', 'Manzi Thierry', 3),
(45, 'KONTERE SHOKE', '32 inches', 'scania', 5, 50000, 13000, '', '2018-03-25', 'Manzi Thierry', 5),
(46, 'shampoma', 'pirate', 'scania', 20, 100000, 6000, '', '2018-03-25', 'Manzi Thierry', 20),
(47, 'Ibinyoteri', 'original', 'land cruser', 10, 200000, 23000, '', '2018-03-24', 'Manzi Thierry', 10),
(48, 'KONTERE SHOKE', 'SECOND HAND', 'SCANIA', 15, 10000, 1000, '', '2018-03-25', 'Manzi Thierry', 5),
(49, 'KONTERE SHOKE', 'original', 'range rover', 5, 100000, 25000, '', '2018-03-25', 'Manzi Thierry', 5),
(51, 'BRIQUE', 'original', 'SCANIA', 5, 100000, 21000, '', '2018-03-25', 'Manzi Thierry', 5),
(61, 'KONTERE SHOKE', 'SECOND HAND', 'SCANIA', 5, 100000, 22000, 'Avaliable', '2018-05-25', 'Manzi Thierry', 5),
(62, 'BRIQUE', 'ORIGINAL', 'SCANIA', 3, 25000, 10000, 'Avaliable', '2018-05-26', 'Manzi Thierry', 3),
(68, 'KONTERE SHOKE', '32 KARE', 'OTHERS', 4, 1000000, 300000, 'Avaliable', '2018-05-28', 'Manzi Thierry', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spair_parts_price`
--

CREATE TABLE `spair_parts_price` (
  `spare_part_id` int(11) NOT NULL,
  `price_bought` int(30) NOT NULL,
  `minimum_price_tobe_sold` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(100) NOT NULL,
  `age` int(2) NOT NULL,
  `title` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `age`, `title`, `email`, `password`, `name`) VALUES
(1, 'Bangara', 31, 'MANAGER', 'bangara@gmail.com', 'garage', 'Murengezi Bangar'),
(2, 'Patrice', 40, 'BOSS', 'patrice@gmail.com', 'garage', 'Ndayiragije Patrice');

-- --------------------------------------------------------

--
-- Table structure for table `workers_information`
--

CREATE TABLE `workers_information` (
  `worker_name` text NOT NULL,
  `worker_phone_no` varchar(20) NOT NULL,
  `worker_proffessional` varchar(100) NOT NULL,
  `worker_address` varchar(50) NOT NULL,
  `worker_age` int(3) NOT NULL,
  `worker_salary` varchar(6) NOT NULL,
  `worker_status` int(6) NOT NULL,
  `worker_registration_date` varchar(100) NOT NULL,
  `worker_id` int(100) NOT NULL,
  `worker_country` text NOT NULL,
  `worker_national_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers_information`
--

INSERT INTO `workers_information` (`worker_name`, `worker_phone_no`, `worker_proffessional`, `worker_address`, `worker_age`, `worker_salary`, `worker_status`, `worker_registration_date`, `worker_id`, `worker_country`, `worker_national_id`) VALUES
('Nsenga Gerald', '+250788222222', 'Manager', 'Kimironko', 18, '300000', 120000, 'Mon-09-April-2018', 1, 'Rwanda', '198273038'),
('Niyoneza DieudonnÃ©', '+250788281068', 'Lights', 'Kicukiro', 26, '400000', 100000, 'Mon-09-April-2018', 2, 'Rwanda', '1982730387'),
('MUgisha Loic', '+25078155679', 'Cleaner', 'Remera', 18, '10000', 2000, 'Sat-21-April-2018', 5, 'Rwanda', '1982730387'),
('Sugira Kevin', '+250780646152', 'Cleaner', 'Kicukiro', 18, '500000', 200000, 'Sat-21-April-2018', 6, 'Rwanda', '1982730389'),
('Ngangom  Innocent', '+25078112255', 'Light specalist', 'Kacyiru', 18, '300000', 110000, 'Fri-27-April-2018', 7, 'Rwanda', '1982730321'),
('Kalisa Norbert', '+250 788880099', 'specialist', 'Kimironko', 18, '300000', 70000, 'Wed-02-May-2018', 8, 'Rwanda', '1982730765'),
('ishimwe enock', '+250792891354', 'accountant', 'kimironk', 17, '200000', 0, 'Thu-03-May-2018', 17, 'rwanda', '1276287346876'),
('Mugisha Gideon', '+250792891354', 'Cleaner', 'kimironko', 30, '100000', 0, 'Sun-06-May-2018', 18, 'Rwanda', '12000809878922'),
('gasana jonathan', '+250788898886', 'Engine', 'Kicukiro', 18, '100000', 0, 'Fri-25-May-2018', 19, 'Rwanda', '1200080093529053'),
('ITEKA LAURE', '+250788222222', 'ACCOUNTANT', 'Kicukiro', 18, '400000', 0, 'Fri-25-May-2018', 20, 'BURUNDI', '119992893091285');

-- --------------------------------------------------------

--
-- Table structure for table `worker_salary_info`
--

CREATE TABLE `worker_salary_info` (
  `worker_id` int(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `paid_salary` int(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_salary_info`
--

INSERT INTO `worker_salary_info` (`worker_id`, `year`, `month`, `salary`, `paid_salary`, `payment_date`) VALUES
(1, '2018', 'January', 300000, 10000, 'Mon-28-May-2018'),
(2, '2018', 'January', 400000, 10000, 'Mon-28-May-2018'),
(1, '2018', 'January', 300000, 100000, 'Tue-29-May-2018'),
(1, '2018', 'January', 300000, 20000, 'Tue-29-May-2018'),
(1, '2018', 'January', 300000, 10000, 'Tue-29-May-2018'),
(6, '2018', 'January', 500000, 40000, 'Tue-29-May-2018'),
(1, '2018', 'January', 300000, 10000, 'Tue-29-May-2018'),
(1, '2018', 'January', 300000, 10000, 'Tue-29-May-2018'),
(2, '2018', 'January', 400000, 40000, 'Tue-29-May-2018'),
(1, '2018', 'January', 300000, 40000, 'Tue-29-May-2018'),
(1, '2018', 'January', 300000, 20000, 'Fri-01-June-2018'),
(1, '2018', 'Feb', 300000, 100000, 'Wed-27-June-2018'),
(1, '2018', 'Feb', 300000, 5000, 'Wed-27-June-2018'),
(1, '2018', 'July', 300000, 250000, 'Sat-07-July-2018'),
(1, '2018', 'July', 300000, 50000, 'Sat-07-July-2018');

-- --------------------------------------------------------

--
-- Table structure for table `worker_salary_paid`
--

CREATE TABLE `worker_salary_paid` (
  `worker_name` text NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `transaction_date` varchar(100) NOT NULL,
  `trandaction_id` int(100) NOT NULL,
  `worker_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker_salary_paid`
--

INSERT INTO `worker_salary_paid` (`worker_name`, `amount_paid`, `transaction_date`, `trandaction_id`, `worker_id`) VALUES
('Sugira Kevin', 200000, 'Fri-27-April-2018', 1, 6),
('Nsenga Gerald', 50000, 'Fri-27-April-2018', 2, 1),
('Kalisa Norbert', 50000, 'Wed-02-May-2018', 3, 8),
('Kalisa Norbert', 20000, 'Wed-02-May-2018', 4, 8),
('Niyoneza DieudonnÃ©', 100000, 'Thu-10-May-2018', 5, 2),
('Ngangom  Innocent', 10000, 'Thu-10-May-2018', 8, 7),
('Ngangom  Innocent', 100000, 'Thu-10-May-2018', 9, 7),
('Nsenga Gerald', 50000, 'Fri-25-May-2018', 10, 1),
('Nsenga Gerald', 20000, 'Fri-25-May-2018', 11, 1),
('MUgisha Loic', 2000, 'Fri-25-May-2018', 12, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_spair_parts`
--
ALTER TABLE `deleted_spair_parts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `garage_car_transactions`
--
ALTER TABLE `garage_car_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_bought_outside`
--
ALTER TABLE `product_bought_outside`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spair_parts`
--
ALTER TABLE `spair_parts`
  ADD PRIMARY KEY (`spare_part_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers_information`
--
ALTER TABLE `workers_information`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `worker_salary_paid`
--
ALTER TABLE `worker_salary_paid`
  ADD PRIMARY KEY (`trandaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deleted_spair_parts`
--
ALTER TABLE `deleted_spair_parts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `garage_car_transactions`
--
ALTER TABLE `garage_car_transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `product_bought_outside`
--
ALTER TABLE `product_bought_outside`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spair_parts`
--
ALTER TABLE `spair_parts`
  MODIFY `spare_part_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers_information`
--
ALTER TABLE `workers_information`
  MODIFY `worker_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `worker_salary_paid`
--
ALTER TABLE `worker_salary_paid`
  MODIFY `trandaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
