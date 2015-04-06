-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2015 at 08:42 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pizzaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) DEFAULT NULL,
  `pwd` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pwd`) VALUES
('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `Phone` varchar(14) NOT NULL,
  `CreditCard` varchar(30) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `pizzaID` int(11) DEFAULT NULL,
  `size` varchar(2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  `Email` varchar(60) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `pizzaID` int(11) NOT NULL AUTO_INCREMENT,
  `pizzaName` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `price` decimal(4,2) DEFAULT NULL,
  `imageName` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`pizzaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`pizzaID`, `pizzaName`, `type`, `price`, `imageName`) VALUES
(1, 'Cheese', 'Classic', 6.99, 'cheese.jpg'),
(2, 'Pepperoni', 'Classic', 7.99, 'pepperoni.jpg'),
(3, 'Sausage', 'Classic', 7.99, 'sausage.jpg'),
(4, 'Buffalo Chicken', 'Carnivore', 9.99, 'buffalochicken.jpg'),
(5, 'Philly Cheesesteak', 'Carnivore', 9.99, 'phillycheesesteak.jpg'),
(6, 'Jerk Chicken', 'Carnivore', 9.99, 'jerkchicken.jpg'),
(7, 'Eggplant', 'Veggie', 8.99, 'eggplant.jpg'),
(8, 'Artichoke', 'Veggie', 8.99, 'artichoke.jpg'),
(9, 'Veggie Supreme', 'Veggie', 8.99, 'veggiesupreme.jpg');
