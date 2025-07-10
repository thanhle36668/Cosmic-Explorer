-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 10:42 AM
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
  `photo` varchar(250) NOT NULL,
  `photo_2` varchar(250) NOT NULL,
  `photo_3` varchar(250) NOT NULL,
  `photo_4` varchar(250) NOT NULL,
  `discovery_date` varchar(250) NOT NULL,
  `diameter_km` varchar(250) NOT NULL,
  `avg_distance_to_earth_km` varchar(250) NOT NULL,
  `avg_distance_to_sun_km` varchar(250) NOT NULL,
  `brief_intro_composition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `name`, `photo`, `photo_2`, `photo_3`, `photo_4`, `discovery_date`, `diameter_km`, `avg_distance_to_earth_km`, `avg_distance_to_sun_km`, `brief_intro_composition`) VALUES
(1, 'Earth', 'earth-planet.jpg', 'earth-planet-2.jpg', 'earth-planet-3.jpg', 'earth-planet-4.jpg', 'Known since ancient times', '12,742 km', '0 km (we\'re on it!)', 'Approximately 149.6 million km', 'Earth is truly unique as the only planet known to harbor life. Its existence is supported by a perfectly balanced set of conditions: a breathable atmosphere containing about 78% Nitrogen (N \r\n2\r\n ) and 21% Oxygen (O \r\n2\r\n ), and the abundant presence of liquid water across its surface. These elements, combined with its ideal distance from the Sun, create a \"Goldilocks zone\" for life to thrive. Earth\'s surface is dynamic, with oceans, continents, and active geological processes. Its internal structure consists of a silicate crust, a dynamic mantle that causes plate tectonics, a liquid outer core that generates Earth\'s protective magnetic field, and a solid inner core made of iron-nickel'),
(2, 'Mercury', 'mercury-planet.jpg', 'mercury-planet-2.jpg', 'mercury-planet-3.jpg', 'mercury-planet-4.jpg', 'Known since ancient times.', '4,879 km', 'Approximately 77 million km', 'Approximately 57.9 million km', 'Mercury is the smallest planet in our Solar System and the closest to the Sun. Its highly eccentric orbit takes it very close to the Sun (perihelion) and then much farther away (aphelion). The surface of Mercury, heavily pockmarked with craters resembling our Moon\'s, is a testament to billions of years of impacts. Due to its thin atmosphere, there\'s a dramatic temperature swing, with daytime temperatures soaring to 430°C (800°F) and nighttime temperatures plummeting to -180°C (-290°F). Its primary composition includes a large iron-nickel core, a silicate mantle and crust, and an extremely thin exosphere formed by atoms ejected from its surface by solar wind'),
(3, 'Venus', 'venus-planet.jpg', 'venus-planet-2.jpg', 'venus-planet-3.jpg', 'venus-planet-4.jpg', 'Known since ancient times', '12,104 km', 'Approximately 41 million km', 'Approximately 108.2 million km', 'Often called Earth\'s \"sister planet\" due to their similar size and mass, Venus is anything but hospitable. It holds the title for the hottest planet in our Solar System, primarily because of a runaway greenhouse effect. Its incredibly dense atmosphere, primarily composed of about 96.5% Carbon dioxide (CO  2 ​  ) and 3.5% Nitrogen (N  2 ​  ), traps heat efficiently. This creates scorching surface temperatures hot enough to melt lead, and a crushing atmospheric pressure more than 90 times that of Earth\'s. Its surface is mainly volcanic rock, covered by vast plains formed by ancient lava flows, and internally, it has an iron-nickel core'),
(4, 'Mars', 'mars-planet.jpg', 'mars-planet-2.jpg', 'mars-planet-3.jpg', 'mars-planet-4.jpg', 'Known since ancient times', '6,779 km', 'Approximately 78.3 million km', 'Approximately 227.9 million km', 'Commonly known as the \"Red Planet\" due to the distinctive rust-red hue of its iron oxide-rich soil, Mars has captivated humanity for centuries. It features polar ice caps, volcanoes, canyons, and evidence of ancient riverbeds, suggesting that liquid water once flowed freely on its surface. Mars has two small, irregularly shaped moons, Phobos and Deimos. Extensive missions have been sent to Mars, making it a primary focus for the search for past or present extraterrestrial life. Its very thin atmosphere is mostly Carbon dioxide (CO  2 ​  ), and internally, it has an iron, nickel, and sulfur core, along with a silicate mantle and crust. Water ice and CO  2 ​   ice are also found at its poles and beneath the surface'),
(5, 'Jupiter', 'jupiter-planet.jpg', 'jupiter-planet-2.jpg', 'jupiter-planet-3.jpg', 'jupiter-planet-4.jpg', 'Known since ancient times', '139,820 km', 'Approximately 628.7 million km', 'Approximately 778.5 million km', 'Jupiter is the largest planet in the Solar System, so massive that it accounts for more than 2.5 times the combined mass of all other planets. This gas giant is a spectacular sight with its prominent bands of clouds and the iconic \"Great Red Spot,\" a colossal anticyclonic storm that has raged for at least 350 years and is larger than Earth itself. Jupiter also boasts a complex system of rings and a multitude of moons, including the four Galilean moons (Io, Europa, Ganymede, and Callisto), which are worlds in themselves. It\'s primarily composed of about 90% Hydrogen (H  2 ​  ) and 10% Helium (He). Inside, immense pressure turns hydrogen into a liquid metallic form, and it\'s believed to have a small solid core of rock and metals'),
(6, 'Saturn', 'saturn-planet.jpg', 'saturn-planet-2.jpg', 'saturn-planet-3.jpg', 'saturn-planet-4.jpg', 'Known since ancient times', '116,460 km', 'Approximately 1.28 billion km', 'Approximately 1.43 billion km', 'Brief Introduction: Saturn is arguably the most recognizable planet, renowned for its stunning and intricate system of rings. These rings are not solid but are made up of billions of small particles, primarily water ice and rocky debris, ranging in size from specks of dust to mountains. As a gas giant, Saturn is predominantly composed of Hydrogen (H  2 ​  ) and Helium (He). It\'s also known for its many moons, including Titan, which has a dense atmosphere and liquid methane lakes, making it one of the most intriguing celestial bodies for astrobiological research. Internally, it has a relatively small but massive solid core of iron, nickel, and rocky materials. This core is surrounded by a layer of highly compressed liquid metallic hydrogen, followed by a layer of liquid hydrogen and helium. The outermost layer is its atmosphere, mainly composed of hydrogen and helium, with traces of methane and ammonia'),
(7, 'Uranus', 'uranus-planet.jpg', 'uranus-planet-2.webp', 'uranus-planet-3.webp', 'uranus-planet-4.webp', ' March 13, 1781 by William Herschel', '50,724 km', 'Approximately 2.72 billion km', ' Approximately 2.88 billion km', 'This distant ice giant stands out due to its extreme axial tilt, causing it to essentially roll on its side as it orbits the Sun. This unique orientation results in peculiar seasons, with each pole experiencing 42 years of continuous sunlight followed by 42 years of darkness. Its distinctive blue-green color comes from the Methane (CH  4 ​  ) in its atmosphere, which absorbs red light. Uranus has a faint system of rings and a collection of moons with diverse landscapes. Its atmosphere contains Hydrogen (H  2 ​  ), Helium (He), and Methane (CH  4 ​  ). Beneath the atmosphere, Uranus has a thick liquid layer, often called the \"ice\" layer, composed of superheated and super-compressed water (H  2 ​  O), Ammonia (NH  3 ​  ), and Methane (CH  4 ​  ). At its center, it has a smaller, solid core believed to consist of rock and ice'),
(8, 'Neptune', 'neptune-planet.jpg', 'neptune-planet-2.jpg', 'neptune-planet-3.jpg', 'neptune-planet-4.jpg', 'September 23, 1846 by Urbain Le Verrier, John Couch Adams, and Johann Gottfried Galle', '49,244 km', 'Approximately 4.34 billion km', 'Approximately 4.5 billion km', 'Neptune is the farthest planet from the Sun and another enigmatic ice giant. Despite its immense distance, it\'s known for having the strongest sustained winds in the Solar System, often reaching supersonic speeds. Its striking deep blue color, even more intense than Uranus\', is attributed to the Methane (CH  4 ​  ) in its atmosphere along with Hydrogen (H  2 ​  ) and Helium (He). Neptune has a system of faint rings and 14 known moons, with Triton being the largest and most geologically active, exhibiting cryovolcanism. Neptune\'s internal structure includes a thick liquid layer, also known as the \"ice\" layer, primarily composed of superheated and super-compressed water (H  2 ​  O), Ammonia (NH  3 ​  ), and Methane (CH  4 ​  ). At its center, it has a smaller, solid core believed to consist of rock and ice');

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
