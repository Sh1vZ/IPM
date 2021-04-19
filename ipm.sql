-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 10:32 PM
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
-- Database: `ipm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_naam` varchar(25) DEFAULT NULL,
  `admin_voornaam` varchar(250) DEFAULT NULL,
  `admin_email` varchar(250) DEFAULT NULL,
  `admin_password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_naam`, `admin_voornaam`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin', 'admin@sr.d', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cijfers`
--

CREATE TABLE `cijfers` (
  `cijf_ID` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `VakID` int(11) DEFAULT NULL,
  `klas_id` int(11) NOT NULL,
  `Periode` int(11) DEFAULT NULL,
  `Cijfer` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `docenten`
--

CREATE TABLE `docenten` (
  `docent_ID` int(11) NOT NULL,
  `docent_naam` varchar(25) DEFAULT NULL,
  `docent_email` varchar(250) DEFAULT NULL,
  `nummer` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docenten`
--

INSERT INTO `docenten` (`docent_ID`, `docent_naam`, `docent_email`, `nummer`) VALUES
(1, 'Juf wiskunde', 'gicaxu@mailinator.com', '68'),
(2, 'juf engels', 'macun@mailinator.com', '29'),
(3, 'juf ned', 'qifijarubo@mailinator.com', '9');

-- --------------------------------------------------------

--
-- Table structure for table `klassen`
--

CREATE TABLE `klassen` (
  `ID` int(11) NOT NULL,
  `Klas` varchar(50) DEFAULT NULL,
  `RichtingID` int(11) DEFAULT NULL,
  `Klas_docent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klassen`
--

INSERT INTO `klassen` (`ID`, `Klas`, `RichtingID`, `Klas_docent`) VALUES
(1, '2.06', 1, 1),
(2, '3.06', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `KlasID` int(11) DEFAULT NULL,
  `Logdatum` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `richtingen`
--

CREATE TABLE `richtingen` (
  `richting_ID` int(11) NOT NULL,
  `Richtingnaam` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `richtingen`
--

INSERT INTO `richtingen` (`richting_ID`, `Richtingnaam`) VALUES
(1, 'ict'),
(2, 'wtb');

-- --------------------------------------------------------

--
-- Table structure for table `studenten`
--

CREATE TABLE `studenten` (
  `stud_ID` int(11) NOT NULL,
  `Achternaam` varchar(50) DEFAULT NULL,
  `Voornaam` varchar(50) DEFAULT NULL,
  `Geboortedatum` date DEFAULT NULL,
  `Geboorteplaats` varchar(50) DEFAULT NULL,
  `Student_email` varchar(50) DEFAULT NULL,
  `Student_pincode` varchar(50) DEFAULT NULL,
  `Saldo` double(10,2) DEFAULT NULL,
  `img` varchar(240) NOT NULL,
  `IsActive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenten`
--

INSERT INTO `studenten` (`stud_ID`, `Achternaam`, `Voornaam`, `Geboortedatum`, `Geboorteplaats`, `Student_email`, `Student_pincode`, `Saldo`, `img`, `IsActive`) VALUES
(5, 'Kristof', 'Roberto', '2010-11-05', 'Missouri', 'rkristof0@utexas.edu', '506501', 32.00, 'Kristof_Roberto_848438', 0),
(6, 'Smalman', 'Titus', '2013-07-12', 'District of Columbia', 'tsmalman1@imageshack.us', '638978', 5.00, 'Smalman_Titus_898330', 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentklas`
--

CREATE TABLE `studentklas` (
  `st_klas_ID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `KlasID` int(11) DEFAULT NULL,
  `Schooljaar` varchar(50) DEFAULT '2020/2021'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_template`
--

CREATE TABLE `student_template` (
  `st_temp_ID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `Type_document` int(11) DEFAULT NULL,
  `Aanvraag_datum` date DEFAULT NULL,
  `verval_datum` date DEFAULT NULL,
  `reden` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `temp_ID` int(11) NOT NULL,
  `Path` varchar(250) DEFAULT NULL,
  `naam` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`temp_ID`, `Path`, `naam`) VALUES
(1, '6043757fdce060.82060757.docx', 'daaaa');

-- --------------------------------------------------------

--
-- Table structure for table `upreq`
--

CREATE TABLE `upreq` (
  `ID` int(11) NOT NULL,
  `Student_ID` int(5) NOT NULL,
  `Bedrag` double(10,2) NOT NULL,
  `Datum` date NOT NULL,
  `Status` varchar(5) DEFAULT 'False',
  `AccDatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vakken`
--

CREATE TABLE `vakken` (
  `vak_ID` int(11) NOT NULL,
  `Vaknaam` varchar(50) DEFAULT NULL,
  `Vak_docent` int(11) DEFAULT NULL,
  `Vak_richting` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vakken`
--

INSERT INTO `vakken` (`vak_ID`, `Vaknaam`, `Vak_docent`, `Vak_richting`) VALUES
(1, 'wiskunde', 1, 1),
(2, 'engels', 2, 2),
(4, 'nederlands', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `cijfers`
--
ALTER TABLE `cijfers`
  ADD PRIMARY KEY (`cijf_ID`),
  ADD KEY `cijfers_ibfk_2` (`VakID`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `klas_id` (`klas_id`);

--
-- Indexes for table `docenten`
--
ALTER TABLE `docenten`
  ADD PRIMARY KEY (`docent_ID`);

--
-- Indexes for table `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `klassen_ibfk_1` (`RichtingID`),
  ADD KEY `klassen_ibfk_2` (`Klas_docent`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `log_ibfk_1` (`KlasID`),
  ADD KEY `log_ibfk_2` (`StudentID`);

--
-- Indexes for table `richtingen`
--
ALTER TABLE `richtingen`
  ADD PRIMARY KEY (`richting_ID`);

--
-- Indexes for table `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`stud_ID`);

--
-- Indexes for table `studentklas`
--
ALTER TABLE `studentklas`
  ADD PRIMARY KEY (`st_klas_ID`),
  ADD KEY `studentklas_ibfk_1` (`KlasID`),
  ADD KEY `studentklas_ibfk_2` (`StudentID`);

--
-- Indexes for table `student_template`
--
ALTER TABLE `student_template`
  ADD PRIMARY KEY (`st_temp_ID`),
  ADD KEY `student_template_ibfk_1` (`StudentID`),
  ADD KEY `student_template_ibfk_2` (`Type_document`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`temp_ID`);

--
-- Indexes for table `upreq`
--
ALTER TABLE `upreq`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `upreq_ibfk_1` (`Student_ID`);

--
-- Indexes for table `vakken`
--
ALTER TABLE `vakken`
  ADD PRIMARY KEY (`vak_ID`),
  ADD KEY `vakken_ibfk_1` (`Vak_docent`),
  ADD KEY `vakken_ibfk_2` (`Vak_richting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cijfers`
--
ALTER TABLE `cijfers`
  MODIFY `cijf_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docenten`
--
ALTER TABLE `docenten`
  MODIFY `docent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `klassen`
--
ALTER TABLE `klassen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `richtingen`
--
ALTER TABLE `richtingen`
  MODIFY `richting_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studenten`
--
ALTER TABLE `studenten`
  MODIFY `stud_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentklas`
--
ALTER TABLE `studentklas`
  MODIFY `st_klas_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_template`
--
ALTER TABLE `student_template`
  MODIFY `st_temp_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `temp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upreq`
--
ALTER TABLE `upreq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vakken`
--
ALTER TABLE `vakken`
  MODIFY `vak_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cijfers`
--
ALTER TABLE `cijfers`
  ADD CONSTRAINT `cijfers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `studenten` (`stud_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cijfers_ibfk_2` FOREIGN KEY (`VakID`) REFERENCES `vakken` (`vak_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cijfers_ibfk_3` FOREIGN KEY (`klas_id`) REFERENCES `klassen` (`ID`);

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
-- Constraints for table `upreq`
--
ALTER TABLE `upreq`
  ADD CONSTRAINT `upreq_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `studenten` (`stud_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
