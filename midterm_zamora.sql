-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 07:46 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midterm_zamora`
--
CREATE DATABASE IF NOT EXISTS `midterm_zamora` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `midterm_zamora`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(5) NOT NULL,
  `customerFN` varchar(15) NOT NULL,
  `customerLN` varchar(15) NOT NULL,
  `customerAddress` varchar(30) NOT NULL,
  `customerAge` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerFN`, `customerLN`, `customerAddress`, `customerAge`) VALUES
(3, 'Alver', 'Sumampong', 'Batuan', 23),
(4, 'JohnRill', 'Maglupay', 'Valencia', 18),
(5, 'Rad', 'Zamora', 'Inabanga', 22),
(6, 'Jason', 'Asa', 'Dauis', 23),
(7, 'James Cyril', 'Tadena', 'Jagna', 22),
(8, 'GN', 'Lebumfacil', 'Tagbilaran', 21),
(9, 'Valerie', 'Omas-as', 'Tagbilaran', 22),
(10, 'Grace', 'Cabrillos', 'Tagbilaran', 21),
(11, 'Joshua', 'Abug', 'Baclayon', 23),
(12, 'Jerel', 'Cagas', 'Jagna', 23);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodno` int(3) NOT NULL,
  `prodna` varchar(30) NOT NULL,
  `prodcost` float NOT NULL,
  `prodprice` float NOT NULL,
  `prodqty_sold` float NOT NULL,
  `sales` float NOT NULL,
  `netsales` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodno`, `prodna`, `prodcost`, `prodprice`, `prodqty_sold`, `sales`, `netsales`) VALUES
(1, 'Ballpen', 25, 37, 12, 444, 144),
(2, 'Ice Cream', 200, 250, 2, 500, 100);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` int(5) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productPrice` float NOT NULL,
  `productQuantity` int(5) NOT NULL,
  `totalprice` float NOT NULL,
  `customerID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseID`, `productName`, `productPrice`, `productQuantity`, `totalprice`, `customerID`) VALUES
(1, 'Ballpen', 25, 2, 50, 6),
(2, 'Yellow Pad', 42, 3, 126, 3),
(3, 'Keyboard', 1220, 1, 1220, 8),
(4, 'Ambot unsa to', 500, 4, 2000, 11),
(5, 'qweqwe', 50, 1, 50, 4),
(6, 'qweqwe', 50, 1, 50, 4),
(7, 'GTX 750 ti', 4000, 1, 4000, 5),
(8, 'Monitor', 2500, 2, 5000, 9),
(9, 'iPhone', 6000, 2, 12000, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodno`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
