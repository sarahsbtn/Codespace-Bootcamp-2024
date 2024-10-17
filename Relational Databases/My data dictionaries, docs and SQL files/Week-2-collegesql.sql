  -- phpMyAdmin SQL Dump
                -- version 5.2.1
                -- https://www.phpmyadmin.net/
                --
                -- Host: 127.0.0.1
                -- Generation Time: Sep 20, 2024 at 04:55 PM
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
                -- Table structure for table `department`
                --

                CREATE TABLE `department` (
                `departmentID` varchar(50) NOT NULL,
                `departmentName` varchar(100) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                -- --------------------------------------------------------

                --
                -- Table structure for table `enrolment`
                --

                CREATE TABLE `enrolment` (
                `enrolmentID` varchar(50) NOT NULL,
                `studentID` varchar(50) NOT NULL,
                `moduleID` varchar(50) NOT NULL,
                `enrolmentDate` date DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Dumping data for table `enrolment`
                --

                INSERT INTO `enrolment` (`enrolmentID`, `studentID`, `moduleID`, `enrolmentDate`) VALUES
                ('1', 'EC123', 'EC101', NULL),
                ('2', 'EC123', 'EC201', NULL),
                ('3', 'EC234', 'EC101', NULL),
                ('4', 'EC345', 'EC301', NULL),
                ('5', 'EC456', 'EC401', NULL),
                ('6', 'EC456', 'EC201', NULL);

                -- --------------------------------------------------------

                --
                -- Table structure for table `lecturer`
                --

                CREATE TABLE `lecturer` (
                `lecturerID` varchar(50) NOT NULL,
                `lecturerFullName` varchar(100) NOT NULL,
                `lecturerEmail` varchar(100) NOT NULL,
                `departmentID` varchar(50) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                -- --------------------------------------------------------

                --
                -- Table structure for table `lecturer_module`
                --

                CREATE TABLE `lecturer_module` (
                `lecturer_module_ID` varchar(50) NOT NULL,
                `moduleID` varchar(50) NOT NULL,
                `lecturerID` varchar(50) NOT NULL,
                `year_of_delivery` int(11) NOT NULL,
                `semester` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                -- --------------------------------------------------------

                --
                -- Table structure for table `module`
                --

                CREATE TABLE `module` (
                `moduleID` varchar(50) NOT NULL,
                `moduleName` varchar(100) NOT NULL,
                `credit` int(11) NOT NULL,
                `moduleDescription` varchar(200) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                --
                -- Dumping data for table `module`
                --

                INSERT INTO `module` (`moduleID`, `moduleName`, `credit`, `moduleDescription`) VALUES
                ('EC101', 'Programming Fundamentals', 6, ''),
                ('EC201', 'Relational Databases', 6, ''),
                ('EC301', 'Data Structures and Algorithms', 6, ''),
                ('EC401', 'Artificial Intelligence', 6, '');

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
                -- Indexes for table `department`
                --
                ALTER TABLE `department`
                ADD PRIMARY KEY (`departmentID`);

                --
                -- Indexes for table `enrolment`
                --
                ALTER TABLE `enrolment`
                ADD PRIMARY KEY (`enrolmentID`);

                --
                -- Indexes for table `lecturer`
                --
                ALTER TABLE `lecturer`
                ADD PRIMARY KEY (`lecturerID`);

                --
                -- Indexes for table `lecturer_module`
                --
                ALTER TABLE `lecturer_module`
                ADD PRIMARY KEY (`lecturer_module_ID`);

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