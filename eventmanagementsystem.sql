-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 15, 2025 at 05:54 AM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `eventNo` varchar(15) NOT NULL,
  `organiserNo` varchar(15) NOT NULL,
  `organiserName` char(31) NOT NULL,
  `eventName` varchar(31) NOT NULL,
  `Description` varchar(45) NOT NULL,
  PRIMARY KEY (`eventNo`),
  UNIQUE KEY `organiserNo` (`organiserNo`),
  UNIQUE KEY `organiserName` (`organiserName`),
  UNIQUE KEY `eventName` (`eventName`),
  UNIQUE KEY `Description` (`Description`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

DROP TABLE IF EXISTS `attendees`;
CREATE TABLE IF NOT EXISTS `attendees` (
  `attendeeID` varchar(15) NOT NULL,
  `attendeeName` varchar(31) DEFAULT NULL,
  `contactInfo` varchar(31) DEFAULT NULL,
  `EventNo` varchar(15) DEFAULT NULL,
  `TicketNo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`attendeeID`),
  KEY `attendess_fk1` (`EventNo`),
  KEY `attendess_fk2` (`TicketNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`attendeeID`, `attendeeName`, `contactInfo`, `EventNo`, `TicketNo`) VALUES
('ATT001', 'Nakato Kintu', 'nakato.kintu@mail.com', 'EVT001', 'TKT001'),
('ATT002', 'Kato Mubiru', 'kato.mubiru@work.com', 'EVT001', 'TKT002'),
('ATT003', 'Nansubuga Ssekandi', 'nansubuga.s@yahoo.com', 'EVT002', 'TKT003'),
('ATT004', 'Ocen Patrick', 'ocen.p@gmail.com', 'EVT002', 'TKT004'),
('ATT005', 'Namukasa Juliet', 'juliet.namukasa@mail.com', 'EVT003', 'TKT005'),
('ATT006', 'Mugisha Robert', 'robert.m@outlook.com', 'EVT003', 'TKT006'),
('ATT007', 'Nabukenya Grace', 'grace.nabukenya@mail.com', 'EVT004', 'TKT007'),
('ATT008', 'Okello David', 'dokello@company.org', 'EVT004', 'TKT008'),
('ATT009', 'Nalwoga Sarah', 'sarah.nalwoga@mail.com', 'EVT005', 'TKT009'),
('ATT010', 'Ssempijja Henry', 'henry.ssempijja@mail.com', 'EVT005', 'TKT010'),
('ATT011', 'Kizza Ronald', 'ronald.kizza@mail.com', 'EVT006', 'TK011'),
('ATT012', 'Nabwire Prossy', 'p.nabwire@work.com', 'EVT007', 'TK012'),
('ATT013', 'Otieno Daniel', 'daniel.otieno@co.ug', 'EVT008', 'TK013'),
('ATT014', 'Tumusiime Brenda', 'btumusiime@gmail.com', 'EVT009', 'TK014'),
('ATT015', 'Okot Francis', 'fokot@yahoo.com', 'EVT010', 'TK015'),
('ATT016', 'Nalubega Josephine', 'jnalubega@mail.com', 'EVT011', 'TK016'),
('ATT017', 'Mugerwa Simon', 'simon.mugerwa@ug.com', 'EVT012', 'TK017'),
('ATT018', 'Akello Grace', 'grace.akello@outlook.com', 'EVT003', 'TK018'),
('ATT019', 'Ojok Martin', 'martin.ojok@mail.com', 'EVT001', 'TK019'),
('ATT020', 'Nansamba Harriet', 'hnansamba@company.org', 'EVT010', 'TK020');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `EquipmentNo` varchar(15) NOT NULL,
  `equipmentName` varchar(15) DEFAULT NULL,
  `Ownership` char(15) DEFAULT NULL,
  `eventNo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`EquipmentNo`),
  KEY `equipment_ibfk_1` (`eventNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`EquipmentNo`, `equipmentName`, `Ownership`, `eventNo`) VALUES
('EQP001', 'PA System (JBL)', 'Venue-owned', 'EVT001'),
('EQP002', 'LED Screen 4K', 'Rented (AV Ugan', 'EVT002'),
('EQP003', 'Stage (10x5m)', 'Venue-owned', 'EVT003'),
('EQP004', 'Generator 50kVA', 'Owned (EventCo)', 'EVT004'),
('EQP005', 'Drum Set (Pearl', 'Rented (Kampala', 'EVT005'),
('EQP006', 'Folding Chairs ', 'Venue-owned', 'EVT006'),
('EQP007', 'Canopy Tent (10', 'Rented (Tent Ma', 'EVT007'),
('EQP008', 'Projector (Epso', 'Owned (EventCo)', 'EVT008'),
('EQP009', 'Catering Equipm', 'Venue-owned', 'EVT009'),
('EQP010', 'Security Walkth', 'Rented (SafeTec', 'EVT010');

-- --------------------------------------------------------

--
-- Table structure for table `eventorganiser`
--

DROP TABLE IF EXISTS `eventorganiser`;
CREATE TABLE IF NOT EXISTS `eventorganiser` (
  `OrganiserNo` varchar(15) NOT NULL,
  `OrganiserName` char(31) DEFAULT NULL,
  `ContactInfo` varchar(31) DEFAULT NULL,
  `OrganiserType` char(15) DEFAULT NULL,
  `eventName` varchar(31) DEFAULT NULL,
  PRIMARY KEY (`OrganiserNo`),
  KEY `eventorganiser_ibfk_1` (`eventName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventorganiser`
--

INSERT INTO `eventorganiser` (`OrganiserNo`, `OrganiserName`, `ContactInfo`, `OrganiserType`, `eventName`) VALUES
('ORG001', 'Balaam Events', 'info@balaam.co.ug', 'Corporate', 'Nyege Nyege Festival'),
('ORG002', 'Tumpeco Ltd', 'events@tumpeco.com', 'Corporate', 'Kampala City Festival'),
('ORG003', 'Uganda Arts Trust', 'director@ugandaarts.org', 'Non-profit', 'Pearl of Africa Tourism Expo'),
('ORG004', 'Kampala City Council', 'events@kcca.go.ug', 'Government', 'Bayimba International Festival'),
('ORG005', 'Nyege Nyege Collective', 'bookings@nyegenyege.com', 'Collective', 'Kampala Fashion Week'),
('ORG006', 'Pearl Events', 'contact@pearlevents.ug', 'Private', 'Uganda Golf Open'),
('ORG007', 'Ministry of Tourism', 'tourism.events@gov.ug', 'Government', 'Kampala International Theatre F'),
('ORG008', 'Bayimba Foundation', 'admin@bayimba.org', 'Non-profit', 'Taste of Kampala'),
('ORG009', 'Fenix Events', 'events@fenix.ug', 'Corporate', 'Uganda Marathon'),
('ORG010', 'Javas Events', 'javas@java.co.ug', 'Private', 'Kampala Jazz Festival'),
('ORG722', 'precious mulungi', 'oihu3wd', 'Regular', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventNo` varchar(15) DEFAULT NULL,
  `eventName` char(31) DEFAULT NULL,
  `eventDate` date DEFAULT NULL,
  `eventDescription` char(45) DEFAULT NULL,
  `eventVenue` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_fk1` (`eventVenue`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventNo`, `eventName`, `eventDate`, `eventDescription`, `eventVenue`) VALUES
(1, 'EVT001', 'Nyege Nyege Festival', '2024-12-15', 'East Africa\'s biggest music festival', 'Speke Resort'),
(2, 'EVT002', 'Kampala City Festival', '2023-07-01', 'Annual street carnival', 'kabira '),
(3, 'EVT003', 'Pearl of Africa Tourism Expo', '2024-05-23', 'National tourism exhibition', 'lake victoria'),
(4, 'EVT004', 'Bayimba International Festival', '2024-09-15', 'Arts and culture festival', 'mestil'),
(5, 'EVT005', 'Kampala Fashion Week', '2024-08-05', 'Ugandan designer showcase', 'sports ground'),
(6, 'EVT006', 'Uganda Golf Open', '2023-08-13', 'National championship', 'golf club'),
(7, 'EVT007', 'Kampala International Theatre F', '2025-12-25', 'Drama performances', 'masindi hotel'),
(8, 'EVT008', 'Taste of Kampala', '2025-06-12', 'Food and drink festival', 'tapas gastro'),
(9, 'EVT009', 'Uganda Marathon', '2025-07-15', 'Charity running event', 'noni vie'),
(10, 'EVT010', 'Kampala Jazz Festival', '2025-11-24', 'Live jazz performances', 'sheraton'),
(11, 'EVT2025-001', 'Uganda Dance Nights', '2025-03-22', 'Traditional and contemporary dance performanc', 'zimbali'),
(12, 'EVT2025-002', 'The EastSide Tour', '2025-04-05', 'Cultural music and dance showcase', 'isu arts'),
(13, 'EVT2025-003', 'Old School SoirÃ©e Vol. 18', '2025-04-05', 'Retro music party', 'jinja nile'),
(14, 'EVT2025-004', 'Girls Just Wanna Have Fun - 3rd', '2025-04-12', 'Women\'s social networking event', 'mbale resort'),
(15, 'EVT2025-005', 'Rise & Brunch', '2025-04-27', 'Sunday brunch with live music', 'kabira '),
(16, 'EVT2025-006', 'The FEM Effect S03', '2025-04-30', 'Women empowerment forum', 'gaddafi'),
(17, 'EVT2025-007', 'The Comedy Grill with Kansiime', '2025-05-09', 'Stand-up comedy show', 'lake victoria'),
(18, 'EVT2025-008', 'The Ice Cream Social', '2025-05-24', 'Dessert tasting event', 'mestil'),
(19, 'EVT2025-009', 'Smirnoff Fiesta', '2025-05-31', 'Vodka brand launch party', 'kampala kk'),
(20, 'EVT2025-010', 'Kirya Live - 2025', '2025-08-08', 'Live music concert', 'cricket oval'),
(21, 'EVT2025-011', 'Fik Fameica Live in Concert', '2025-09-05', 'Hip-hop concert', 'cricket oval'),
(22, 'EVT2025-012', 'Tales of Kenneth Mugabi Live Co', '2025-09-19', 'Soulful acoustic performance', 'noni vie'),
(23, 'EVT2025-013', 'Uganda Buildcon International E', '2025-08-07', 'Construction industry exhibition (Aug 7-9)', 'gaddafi'),
(24, 'EVT2025-014', 'Pearl of Africa Tourism Expo 20', '2025-05-21', 'National tourism showcase (May 21-24)', 'mandela');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `paymentID` varchar(15) DEFAULT NULL,
  `paymentsmade` char(15) DEFAULT NULL,
  `Totalcost` decimal(10,2) DEFAULT NULL,
  `eventName` char(15) DEFAULT NULL,
  KEY `payments_fk2` (`eventName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentID`, `paymentsmade`, `Totalcost`, `eventName`) VALUES
('PAY001', 'Ticket Purchase', 150000.00, 'Nyege Nyege Fes'),
('PAY002', 'VIP Upgrade', 250000.00, 'Kampala City Fe'),
('PAY003', 'Early Bird Tick', 80000.00, 'Pearl of Africa'),
('PAY004', 'Group Booking', 450000.00, 'Bayimba Interna'),
('PAY005', 'Sponsorship', 5000000.00, 'Kampala Fashion'),
('PAY001', 'Early Bird Tick', 80000.00, 'Nyege Nyege Fes'),
('PAY002', 'VIP Ticket', 250000.00, 'Kampala City Fe'),
('PAY003', 'Group Booking (', 320000.00, 'Pearl of Africa'),
('PAY004', 'Sponsorship', 5000000.00, 'Bayimba Interna'),
('PAY005', 'Food & Beverage', 120000.00, 'Kampala Fashion'),
('PAY006', 'Merchandise', 45000.00, 'Uganda Golf Ope'),
('PAY007', 'Late Ticket', 100000.00, 'Kampala Interna'),
('PAY008', 'Donation', 150000.00, 'Taste of Kampal'),
('PAY009', 'Exhibition Boot', 750000.00, 'Uganda Marathon'),
('PAY010', 'Parking Pass', 20000.00, 'Kampala Jazz Fe');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `promotionNo` varchar(15) NOT NULL,
  `PromoterName` char(31) DEFAULT NULL,
  `Category` char(31) DEFAULT NULL,
  `Form` char(31) DEFAULT NULL,
  `ValueOfPromotion` varchar(15) DEFAULT NULL,
  `eventName` char(31) DEFAULT NULL,
  PRIMARY KEY (`promotionNo`),
  KEY `promotions_ibfk_1` (`eventName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotionNo`, `PromoterName`, `Category`, `Form`, `ValueOfPromotion`, `eventName`) VALUES
('PRO001', 'MTN Uganda', 'Telecom', 'Social Media', '10,000,000 UGX', 'Nyege Nyege Festival'),
('PRO002', 'Nile Breweries', 'Beverage', 'On-ground Branding', '8,500,000 UGX', 'Kampala City Festival'),
('PRO003', 'Stanbic Bank', 'Banking', 'VIP Lounge', '15,000,000 UGX', 'Pearl of Africa Tourism Expo'),
('PRO004', 'Uganda Tourism Board', 'Government', 'Print Media', '5,000,000 UGX', 'Bayimba International Festival'),
('PRO005', 'Safaricom', 'Telecom', 'Radio Ads', '7,200,000 UGX', 'Kampala Fashion Week'),
('PRO006', 'Coca-Cola', 'Beverage', 'Free Samples', '3,500,000 UGX', 'Uganda Golf Open'),
('PRO007', 'Centenary Bank', 'Banking', 'Mobile App Push', '6,000,000 UGX', 'Kampala International Theatre F'),
('PRO008', 'Roke Telkom', 'Telecom', 'Email Campaign', '4,800,000 UGX', 'Taste of Kampala'),
('PRO009', 'Uganda Airlines', 'Transport', 'Travel Packages', '9,000,000 UGX', 'Uganda Marathon'),
('PRO010', 'Airtel Uganda', 'Telecom', 'SMS Blast', '5,500,000 UGX', 'Kampala Jazz Festival');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` varchar(15) NOT NULL,
  `staffName` char(31) DEFAULT NULL,
  `Role` char(15) DEFAULT NULL,
  `ContactInfo` varchar(31) DEFAULT NULL,
  `EventNo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`staffID`),
  KEY `staff_ibfk_1` (`EventNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `Role`, `ContactInfo`, `EventNo`) VALUES
('STF001', 'Kato Joseph', 'Security Manage', '766898598', 'EVT001'),
('STF002', 'Nakiganda Sarah', 'Event Coordinat', '788454511', 'EVT001'),
('STF003', 'Ocen David', 'Stage Technicia', '775149811', 'EVT002'),
('STF004', 'Tumwesigye Alex', 'Catering Head', '779512675', 'EVT002'),
('STF005', 'Namutebi Grace', 'Registration De', '757394282', 'EVT003'),
('STF006', 'Mugisha Robert', 'Audio Engineer', '419394784', 'EVT003'),
('STF007', 'Atim Brenda', 'First Aid Offic', '790252502', 'EVT004'),
('STF008', 'Okello Denis', 'Parking Attenda', '789134124', 'EVT004'),
('STF009', 'Nabukenya Juliet', 'VIP Hostess', '758383138', 'EVT005'),
('STF010', 'Ssempijja Henry', 'Photographer', '776232482', 'EVT005');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `TicketNo` varchar(15) NOT NULL,
  `eventNo` varchar(15) DEFAULT NULL,
  `AttendeeID` varchar(15) DEFAULT NULL,
  `DateOfPurchase` date DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`TicketNo`),
  KEY `tickets_ibfk_1` (`eventNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`TicketNo`, `eventNo`, `AttendeeID`, `DateOfPurchase`, `Price`) VALUES
('TKT001', 'EVT001', 'ATT001', '2023-09-10', 80000.00),
('TKT002', 'EVT001', 'ATT002', '2023-09-12', 100000.00),
('TKT003', 'EVT001', 'ATT003', '2023-09-15', 100000.00),
('TKT004', 'EVT002', 'ATT003', '2023-08-20', 120000.00),
('TKT005', 'EVT002', 'ATT004', '2023-08-25', 120000.00),
('TKT006', 'EVT002', 'ATT012', '2023-08-28', 80000.00),
('TKT007', 'EVT003', 'ATT005', '2023-10-01', 50000.00),
('TKT008', 'EVT003', 'ATT006', '2023-10-05', 70000.00),
('TKT009', 'EVT004', 'ATT007', '2023-07-15', 150000.00),
('TKT010', 'EVT004', 'ATT008', '2023-07-20', 90000.00),
('TKT2025-001', 'EVT2025-001', 'ATT009', '2025-01-15', 100000.00),
('TKT2025-002', 'EVT2025-002', 'ATT010', '2025-02-01', 50000.00),
('TKT2025-003', 'EVT2025-014', 'ATT011', '2025-03-10', 52433.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(31) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(31) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'mulungi prrecious', '$2y$10$7iIM7XiBY8iL/Pxk8b.mvenrcsip4sObXw17OUlKOhSQC7.sL1TLS', 'mulungiopabire112@GMAIL', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

DROP TABLE IF EXISTS `venue`;
CREATE TABLE IF NOT EXISTS `venue` (
  `venueNo` varchar(15) NOT NULL,
  `venueName` char(15) DEFAULT NULL,
  `Address` varchar(31) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `ContactInfo` varchar(31) DEFAULT NULL,
  `BookingFee` int(11) DEFAULT NULL,
  `AdditionalServices` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`venueNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venueNo`, `venueName`, `Address`, `capacity`, `ContactInfo`, `BookingFee`, `AdditionalServices`) VALUES
('VEN001', 'Sheraton Kampal', 'Ternan Avenue, Kampala', 1500, 'events@sheratonkampala.com', 12000000, 'VIP Lounge, Catering'),
('VEN002', 'Uganda National', 'De Winton Road, Kampala', 500, 'bookings@nationaltheatre.go.ug', 5000000, 'Sound System'),
('VEN003', 'Lugogo Cricket', 'Lugogo Bypass, Kampala', 5000, 'info@ugandacricket.com', 8000000, 'Outdoor Seating'),
('VEN004', 'Kampala Serena', 'Kintu Road, Kampala', 1000, 'serenaevents@serenahotels.com', 15000000, 'Ballroom'),
('VEN005', 'Ndere Cultural', 'Ntinda, Kampala', 800, 'ndere@ndere.com', 3000000, 'Traditional Stage'),
('VEN006', 'UMA Showgrounds', 'Lugogo, Kampala', 10000, 'events@uma.co.ug', 20000000, 'Exhibition Space'),
('VEN007', 'Hotel Africana', 'Wampewo Avenue, Kampala', 1200, 'africanaevents@hotelafricana.co', 9000000, 'Poolside Venue'),
('VEN008', 'National Mosque', 'Old Kampala Hill', 600, 'info@nationalmosque.org', 4000000, 'Audio Equipment'),
('VEN009', 'Victoria Hall', 'Jinja Road, Kampala', 700, 'victoriaevents@gmail.com', 3500000, 'Projector Screen'),
('VEN010', 'Uganda Museum G', 'Kira Road, Kampala', 300, 'museumevents@ugandamuseum.go.ug', 2000000, 'Cultural Performances'),
('VEN011', 'Speke Resort Mu', 'Munyonyo, Kampala', 2500, 'events@spekeresort.com', 18000000, 'Lakeview, Conference Halls'),
('VEN012', 'Jinja Nile Reso', 'Njeru, Jinja', 800, 'bookings@nileresort.ug', 6000000, 'Swimming Pool'),
('VEN013', 'Mbale Resort Ho', 'Mbale Town', 500, 'info@mbaleresort.com', 4000000, 'Mountain Views'),
('VEN014', 'Kabira Country', 'Bukoto, Kampala', 600, 'events@kabiraclub.com', 8000000, 'Golf Course'),
('VEN015', 'Gaddafi Nationa', 'Old Kampala', 1200, 'tours@gaddafimosque.com', 3000000, 'Islamic Architecture'),
('VEN016', 'Lake Victoria S', 'Lweza, Entebbe', 900, 'reservations@serenahotels.com', 12000000, 'Beachfront'),
('VEN017', 'Mestil Hotel', 'Nsambya, Kampala', 700, 'mestilevents@mestil.com', 7000000, 'Rooftop Terrace'),
('VEN018', 'Soroti Sports G', 'Soroti Town', 3000, 'sport@tesouganda.com', 5000000, 'Athletics Track'),
('VEN019', 'Kasese Golf Clu', 'Kasese Town', 400, 'kasesegolf@ugandagolf.com', 2500000, 'Rwenzori Views'),
('VEN020', 'Masindi Hotel', 'Masindi Town', 300, 'masindihotel@yahoo.com', 2000000, 'Colonial-Era Building'),
('VEN021', 'Noni Vie', 'Kampala', 500, 'nonivie@gmail.com', 2003000, 'Lounge'),
('VEN022', 'Sheraton Garden', 'Ternan Avenue, Kampala', 1500, 'sheratongarden@gmail.com', 4010400, 'Outdoor events'),
('VEN023', 'Zimbali Bistro', 'Kampala', 880, 'zimbalibistro@gmail.com', 1000000, 'VIP area'),
('VEN024', 'ISU Arts Center', 'Lubowa, Kampala', 500, 'isuartscentre@gmail.com', 2340000, 'Theatrical equipment');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
