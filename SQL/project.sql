-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2024 at 10:19 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `entrepreneur`
--

CREATE TABLE IF NOT EXISTS `entrepreneur` (
  `cin` char(8) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text,
  `Region` varchar(100) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  PRIMARY KEY (`cin`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrepreneur`
--


-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `cin` char(8) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `Niveau` varchar(50) NOT NULL,
  `Region` varchar(100) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `description` text,
  `tel` varchar(15) NOT NULL,
  `fac` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cin`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--


-- --------------------------------------------------------

--
-- Table structure for table `offresemploi`
--

CREATE TABLE IF NOT EXISTS `offresemploi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEntreprise` varchar(255) NOT NULL,
  `typeEntreprise` varchar(100) DEFAULT NULL,
  `titrePoste` varchar(255) NOT NULL,
  `descriptionPoste` text NOT NULL,
  `salairePropose` decimal(10,2) DEFAULT NULL,
  `adresseEmailContact` varchar(255) NOT NULL,
  `Lieu` varchar(255) NOT NULL,
  `cin` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `offresemploi`
--

