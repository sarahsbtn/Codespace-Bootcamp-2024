 -- phpMyAdmin SQL Dump
            -- version 5.2.1
            -- https://www.phpmyadmin.net/
            --
            -- Host: 127.0.0.1
            -- Generation Time: Sep 14, 2024 at 07:17 PM
            -- Server version: 10.4.32-MariaDB
            -- PHP Version: 8.2.12

            SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
            START TRANSACTION;
            SET time_zone = "+00:00";


            /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
            /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
            /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
            /*!40101 SET NAMES utf8mb4 */;

            --
            -- Database: `college`
            --

            -- --------------------------------------------------------

            --
            -- Table structure for table `enrolment`
            --

            CREATE TABLE `enrolment` (
            `enrolmentID` int(11) NOT NULL,
            `studentID` varchar(50) NOT NULL,
            `moduleID` varchar(50) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `enrolment`
            --

            INSERT INTO `enrolment` (`enrolmentID`, `studentID`, `moduleID`) VALUES
            (1, 'EC123', 'EC101'),
            (2, 'EC123', 'EC201'),
            (3, 'EC234', 'EC101'),
            (4, 'EC345', 'EC301'),
            (5, 'EC456', 'EC401'),
            (6, 'EC456', 'EC201');

            -- --------------------------------------------------------

            --
            -- Table structure for table `module`
            --

            CREATE TABLE `module` (
            `moduleID` varchar(50) NOT NULL,
            `moduleName` varchar(100) NOT NULL,
            `credit` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `module`
            --

            INSERT INTO `module` (`moduleID`, `moduleName`, `credit`) VALUES
            ('EC101', 'Programming Fundamentals', 6),
            ('EC201', 'Relational Databases', 6),
            ('EC301', 'Data Structures and Algorithms', 6),
            ('EC401', 'Artificial Intelligence', 6);

            -- --------------------------------------------------------

            --
            -- Table structure for table `student`
            --

            CREATE TABLE `student` (
            `studentID` varchar(50) NOT NULL,
            `fullName` varchar(100) NOT NULL,
            `email` varchar(50) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Dumping data for table `student`
            --

            INSERT INTO `student` (`studentID`, `fullName`, `email`) VALUES
            ('EC123', 'Fred Flintstone', 'fflintstone@college.ac.uk'),
            ('EC234', 'Barney Rubble', 'brubble@college.ac.uk'),
            ('EC345', 'Wilma Flintstone', 'wflintstone@college.ac.uk'),
            ('EC456', 'Betty Rubble', 'berubble@college.ac.uk');

            --
            -- Indexes for dumped tables
            --

            --
            -- Indexes for table `enrolment`
            --
            ALTER TABLE `enrolment`
            ADD PRIMARY KEY (`enrolmentID`);

            --
            -- Indexes for table `module`
            --
            ALTER TABLE `module`
            ADD PRIMARY KEY (`moduleID`);

            --
            -- Indexes for table `student`
            --
            ALTER TABLE `student`
            ADD PRIMARY KEY (`studentID`);
            COMMIT;

            /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
            /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
            /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;