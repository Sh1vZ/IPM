-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2021 at 04:00 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `admin_naam` varchar(25) DEFAULT NULL,
  `admin_voornaam` varchar(250) DEFAULT NULL,
  `admin_email` varchar(250) DEFAULT NULL,
  `admin_password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_naam`, `admin_voornaam`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cijfers`
--

DROP TABLE IF EXISTS `cijfers`;
CREATE TABLE IF NOT EXISTS `cijfers` (
  `cijf_ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentKlasID` int(11) DEFAULT NULL,
  `VakID` int(11) DEFAULT NULL,
  `Periode` int(11) DEFAULT NULL,
  `Cijfer` decimal(2,1) DEFAULT NULL,
  PRIMARY KEY (`cijf_ID`),
  KEY `cijfers_ibfk_1` (`StudentKlasID`),
  KEY `cijfers_ibfk_2` (`VakID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `docenten`
--

DROP TABLE IF EXISTS `docenten`;
CREATE TABLE IF NOT EXISTS `docenten` (
  `docent_ID` int(11) NOT NULL AUTO_INCREMENT,
  `docent_naam` varchar(25) DEFAULT NULL,
  `docent_email` varchar(250) DEFAULT NULL,
  `nummer` decimal(12,0) DEFAULT NULL,
  PRIMARY KEY (`docent_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docenten`
--

INSERT INTO `docenten` (`docent_ID`, `docent_naam`, `docent_email`, `nummer`) VALUES
(1, 'Debbie', 'debbie@gmail.com', '531862');

-- --------------------------------------------------------

--
-- Table structure for table `klassen`
--

DROP TABLE IF EXISTS `klassen`;
CREATE TABLE IF NOT EXISTS `klassen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Klas` varchar(50) DEFAULT NULL,
  `RichtingID` int(11) DEFAULT NULL,
  `Klas_docent` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `klassen_ibfk_1` (`RichtingID`),
  KEY `klassen_ibfk_2` (`Klas_docent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) DEFAULT NULL,
  `KlasID` int(11) DEFAULT NULL,
  `Logdatum` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `log_ibfk_1` (`KlasID`),
  KEY `log_ibfk_2` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `richtingen`
--

DROP TABLE IF EXISTS `richtingen`;
CREATE TABLE IF NOT EXISTS `richtingen` (
  `richting_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Richtingnaam` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`richting_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studenten`
--

DROP TABLE IF EXISTS `studenten`;
CREATE TABLE IF NOT EXISTS `studenten` (
  `stud_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Achternaam` varchar(50) DEFAULT NULL,
  `Voornaam` varchar(50) DEFAULT NULL,
  `Geboortedatum` date DEFAULT NULL,
  `Geboorteplaats` varchar(50) DEFAULT NULL,
  `Student_email` varchar(50) DEFAULT NULL,
  `Student_pincode` varchar(50) DEFAULT NULL,
  `Saldo` double(10,2) DEFAULT NULL,
  `img` varchar(240) NOT NULL,
  PRIMARY KEY (`stud_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenten`
--

INSERT INTO `studenten` (`stud_ID`, `Achternaam`, `Voornaam`, `Geboortedatum`, `Geboorteplaats`, `Student_email`, `Student_pincode`, `Saldo`, `img`) VALUES
(16, 'Issi', 'Pinas', '2021-02-17', 'Nickerie', 'issi@g.com', '831583', NULL, 'Pinas_Issi_874711'),
(17, 'Dina', 'Jan', '2021-02-02', 'Paramaribo', 'jan@gmail.com', '180112', NULL, 'Jane_Dina_735310'),
(18, 'Ian', 'Pinas', '2021-02-10', 'Paramaribo', 'ian@g.com', '955119', NULL, 'Pinas_Ian_600094'),
(20, 'Mendes', 'Hannah', '2021-02-17', 'Nickerie', 'hannah@gmail.com', '581382', NULL, 'Hannah_Mendes_423125'),
(23, 'Gilly', 'Jess', '2021-02-09', 'Wanica', 'j@gmail.com', '359453', NULL, 'Jess_Gill_437806');

-- --------------------------------------------------------

--
-- Table structure for table `studentklas`
--

DROP TABLE IF EXISTS `studentklas`;
CREATE TABLE IF NOT EXISTS `studentklas` (
  `st_klas_ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) DEFAULT NULL,
  `KlasID` int(11) DEFAULT NULL,
  `Schooljaar` varchar(50) DEFAULT '2020/2021',
  PRIMARY KEY (`st_klas_ID`),
  KEY `studentklas_ibfk_1` (`KlasID`),
  KEY `studentklas_ibfk_2` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_template`
--

DROP TABLE IF EXISTS `student_template`;
CREATE TABLE IF NOT EXISTS `student_template` (
  `st_temp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentID` int(11) DEFAULT NULL,
  `Type_document` int(11) DEFAULT NULL,
  `Aanvraag_datum` date DEFAULT NULL,
  `verval_datum` date DEFAULT NULL,
  `reden` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`st_temp_ID`),
  KEY `student_template_ibfk_1` (`StudentID`),
  KEY `student_template_ibfk_2` (`Type_document`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
CREATE TABLE IF NOT EXISTS `template` (
  `temp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(255) DEFAULT NULL,
  `naam` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`temp_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`temp_ID`, `Path`, `naam`) VALUES
(14, '6042fa575b7455.86275198.docx', 'ouderochtend'),
(15, '6042fa946ef903.63851850.docx', 'admin'),
(21, '6042fd8d7daf66.39004745.docx', 'Laatbrief'),
(22, '6042fdcf9f9c20.72836880.docx', 'Dispensatiebrief');

-- --------------------------------------------------------

--
-- Table structure for table `vakken`
--

DROP TABLE IF EXISTS `vakken`;
CREATE TABLE IF NOT EXISTS `vakken` (
  `vak_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vaknaam` varchar(50) DEFAULT NULL,
  `Vak_docent` int(11) DEFAULT NULL,
  `Vak_richting` int(11) DEFAULT NULL,
  PRIMARY KEY (`vak_ID`),
  KEY `vakken_ibfk_1` (`Vak_docent`),
  KEY `vakken_ibfk_2` (`Vak_richting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cijfers`
--
ALTER TABLE `cijfers`
  ADD CONSTRAINT `cijfers_ibfk_1` FOREIGN KEY (`StudentKlasID`) REFERENCES `studentklas` (`st_klas_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cijfers_ibfk_2` FOREIGN KEY (`VakID`) REFERENCES `vakken` (`vak_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `klassen`
--
ALTER TABLE `klassen`
  ADD CONSTRAINT `klassen_ibfk_1` FOREIGN KEY (`RichtingID`) REFERENCES `richtingen` (`richting_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `klassen_ibfk_2` FOREIGN KEY (`Klas_docent`) REFERENCES `docenten` (`docent_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`KlasID`) REFERENCES `klassen` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `studenten` (`stud_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentklas`
--
ALTER TABLE `studentklas`
  ADD CONSTRAINT `studentklas_ibfk_1` FOREIGN KEY (`KlasID`) REFERENCES `klassen` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentklas_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `studenten` (`stud_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_template`
--
ALTER TABLE `student_template`
  ADD CONSTRAINT `student_template_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `studenten` (`stud_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_template_ibfk_2` FOREIGN KEY (`Type_document`) REFERENCES `template` (`temp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vakken`
--
ALTER TABLE `vakken`
  ADD CONSTRAINT `vakken_ibfk_1` FOREIGN KEY (`Vak_docent`) REFERENCES `docenten` (`docent_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vakken_ibfk_2` FOREIGN KEY (`Vak_richting`) REFERENCES `richtingen` (`richting_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
