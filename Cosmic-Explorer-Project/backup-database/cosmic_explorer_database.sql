-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 09:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmic_explorer`
--

-- --------------------------------------------------------

--
-- Table structure for table `constellations`
--

CREATE TABLE `constellations` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description_short` text NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constellations`
--

INSERT INTO `constellations` (`id`, `name`, `description_short`, `photo`) VALUES
(1, 'Orion Constellation', 'Famous hunter constellation, bright stars, visible worldwide, winter sky.', 'orion-constellation.jpg'),
(2, 'Leo Constellation', 'Represents a lion in Greek mythology.', 'leo-constellation.jpg'),
(3, 'Ursa Major Constellation', 'Contains the Big Dipper, which helps locate the North Star.', 'ursa-major-constellation.jpg'),
(4, 'Scorpius Constellation', 'Resembles the shape of a scorpion.', 'scorpius-constellation.jpg'),
(5, 'Cassiopeia Constellation', 'Has a distinctive \"W\" shape, visible in the Northern Hemisphere.', 'cassiopeia-constellation.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description_short` text NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `title`, `description_short`, `photo`) VALUES
(1, 'Big Bang Theory', 'What is the Big Bang Theory?', 'The Big Bang Theory stands as the most widely accepted explanation for the origin of the universe. According to this theory, the universe began as an infinitely small, hot, and dense point, which rapidly expanded and continued to stretch over 13.7 billion years. This initial period of rapid inflation set the stage for the vast and still-growing cosmos we observe today.', 'bigbang-theory-news.png'),
(2, 'Earth Evolved', 'How Has the Earth Evolved?', 'The Earth was formed about 4.6 billion years ago, that\'s 4,600,000,000 years ago. It was formed by collisions of particles in a large cloud of material. Slowly gravity gathered together all these particles of dust and gas and formed larger clumps. These clumps continued to collide and gradually grew bigger and bigger eventually forming the Earth. The earth at this time was very different to how we know it today.', 'earth-news.avif'),
(3, 'Comet', 'What Is a Comet?', 'Comets are small celestial bodies made primarily of ice, dust, and rocky material. They originate from the outer regions of the solar system, such as the Kuiper Belt and the Oort Cloud. When a comet approaches the Sun, its icy core (called a nucleus) heats up and releases gas and dust, forming a glowing coma and often a long tail that points away from the Sun due to solar wind and radiation pressure.', 'Comets-news.avif');

-- --------------------------------------------------------

--
-- Table structure for table `observatories`
--

CREATE TABLE `observatories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `observatories`
--

INSERT INTO `observatories` (`id`, `name`, `location`, `photo`) VALUES
(1, 'Mauna Kea Observatories (MKO)', 'Mauna Kea, Hawaii, USA', 'Mauna-Kea-Observatory.jpg'),
(2, 'Paranal Observatory', 'Atacama Desert, Chile', 'Paranal-Observatory.jpg'),
(3, 'Las Campanas Observatory (LCO)', 'Atacama Desert, Chile', 'Las-Campanas-Observatory(LCO).webp'),
(4, 'Roque de los Muchachos Observatory (ORM)', 'La Palma Island, Canary Islands, Spain', 'Ro-que-de-los-Muchachos-Observatory(ORM).jpg'),
(5, 'Kitt Peak National Observatory (KPNO)', 'Arizona, USA', 'Kitt-Peak-National-Observatory(KPNO).webp'),
(6, 'Palomar Observatory', 'California, USA', 'Palomar-Observatory.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `planets`
--

CREATE TABLE `planets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `discovery_date` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `atmosphere` varchar(250) NOT NULL,
  `distance_from_sun` varchar(250) NOT NULL,
  `distance_from_earth` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `name`, `photo`, `discovery_date`, `size`, `atmosphere`, `distance_from_sun`, `distance_from_earth`) VALUES
(1, 'Earth', 'earth-planets.jpg', 'In the early 17th century', 'Diameter: Approximately 4,879 km (3,032 miles)', 'Atmosphere: Instead of a true atmosphere, Oxygen, sodium, hydrogen, helium, and potassium, created by solar wind and meteoroid impacts.', 'Average: Approximately 58 million km (36 million miles) or 0.4 AU (Astronomical Units)', 'Closest: Approximately 77 million km (48 million miles)- Farthest: Approximately 222 million km (138 million miles)\r\n\r\n'),
(2, 'Mercury', 'mercury-planets.jpg', '', '', '', '', ''),
(3, 'Venus', 'venus-planets.jpg', '', '', '', '', ''),
(4, 'Mars', 'mars-planets.jpg', '', '', '', '', ''),
(5, 'Jupiter', 'jupiter-planet.jpg', '', '', '', '', ''),
(6, 'Saturn', 'saturn-planet.jpg', '', '', '', '', ''),
(7, 'Uranus', 'uranus-planet.jpg', '', '', '', '', ''),
(8, 'Neptune', 'neptune-planet.jpg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `email_verified_at` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `remenber_token` varchar(100) NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remenber_token`, `is_admin`) VALUES
(1, 'Admin', 'admin@example.com', '', '$2y$12$mxN8vXZ/NsKfbNuNBQwx5enyaRmTGk.lMZtOyh7uxIfP69dA4nPXO', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `constellations`
--
ALTER TABLE `constellations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observatories`
--
ALTER TABLE `observatories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `constellations`
--
ALTER TABLE `constellations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `observatories`
--
ALTER TABLE `observatories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `planets`
--
ALTER TABLE `planets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
