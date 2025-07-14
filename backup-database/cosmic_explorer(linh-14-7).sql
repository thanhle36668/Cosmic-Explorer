-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 11:33 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Orion', 'Famous hunter constellation, bright stars, visible worldwide, winter sky.', 'orion-constellation.jpg'),
(2, 'Leo', 'Represents a lion in Greek mythology.', 'leo-constellation.jpg'),
(3, 'Ursa Major', 'Contains the Big Dipper, which helps locate the North Star.', 'ursa-major-constellation.jpg'),
(4, 'Scorpius', 'Resembles the shape of a scorpion.', 'scorpius-constellation.jpg'),
(5, 'Cassiopeia', 'Has a distinctive \"W\" shape, visible in the Northern Hemisphere.', 'cassiopeia-constellation.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_07_040611_add_is_admin_to_users_table', 1),
(6, '2025_07_11_033351_create_posts_table', 1),
(7, '2025_07_11_033429_create_comments_table', 1);

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2025_07_13_050629_create_categories_table', 2), 
(10, '2025_07_13_053710_add_category_id_slug_image_is_published_to_posts_table', 3); 


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
  `photo` varchar(255) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  `photo_4` varchar(255) NOT NULL,
  `altitude_meters` varchar(255) NOT NULL,
  `established_year` varchar(255) NOT NULL,
  `managing_organization` varchar(250) NOT NULL,
  `main_instruments` text NOT NULL,
  `primary_research_areas` text NOT NULL,
  `public_access_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `observatories`
--

INSERT INTO `observatories` (`id`, `name`, `location`, `photo`, `photo_2`, `photo_3`, `photo_4`, `altitude_meters`, `established_year`, `managing_organization`, `main_instruments`, `primary_research_areas`, `public_access_info`) VALUES
(1, 'Mauna Kea Observatories (MKO)', 'Mauna Kea summit, Hawaii, USA', 'Mauna-Kea-Observatory.jpg', 'Mauna-Kea-Observatory-2.jpg', 'Mauna-Kea-Observatory-3.jpg', 'Mauna-Kea-Observatory-4.jpg', '4,205 meters. Extremely high, offers excellent infrared observation and very sharp images due to stable atmosphere', 'First telescope began operating in 1970', 'A collection of ~13 observatories from various nations/organizations', 'Collection of giant telescopes (optical, infrared)', 'Broad, from exoplanets to cosmology. Discoveries here help us understand the universe\'s origin, how galaxies develop, and the search for life beyond Earth', 'Has a Visitor Information Station (VIS) at a lower elevation'),
(2, 'Paranal', 'Atacama Desert, Chile', 'Paranal-Observatory.jpg', 'Paranal-Observatory-2.jpg', 'Paranal-Observatory-3.jpg', 'Paranal-Observatory-4.jpg', '2,635 meters. Good height combined with extremely dry climate, ideal for both optical and infrared with nearly cloudless skies', 'Began operations in 1999', 'Run by ESO', 'Very Large Telescope (VLT), 4x 8.2-meter telescopes (can be combined)', 'Exoplanets, black holes, galaxies, cosmology. It\'s especially successful in directly imaging distant planets and tracking stars moving around the supermassive black hole at our galaxy\'s center', 'Offers free guided tours on Saturdays (registration required)'),
(3, 'Las Campanas (LCO)', 'Atacama Desert, Chile', 'Las-Campanas-Observatory(LCO).webp', 'Las-Campanas-Observatory(LCO)-2.jpg', 'Las-Campanas-Observatory(LCO)-3.jpg', 'Las-Campanas-Observatory(LCO)-4.jpg', '2,400 meters. High desert location provides very dark skies and stable image quality', 'Began operating in 1969', 'Belongs to the Carnegie Institution for Science', 'Twin 6.5-meter Magellan Telescopes. Future home of Giant Magellan Telescope (GMT)', 'Galaxy formation, stellar variability, supernovae. They study how galaxies are formed, changes in stars, and powerful star explosions to understand the universe', 'Guided tours available on Saturdays (reservation required)'),
(5, 'Kitt Peak National (KPNO)', 'Arizona, USA', 'Kitt-Peak-National-Observatory(KPNO).webp', 'Kitt-Peak-National-Observatory(KPNO)-2.jpg', 'Kitt-Peak-National-Observatory(KPNO)-3.jpg', 'Kitt-Peak-National-Observatory(KPNO)-4.jpg', '2,096 meters. Reasonable height with many clear nights and clean air, versatile for various observations', 'Founded in 1958', 'First U.S. national optical observatory, now part of NOIRLab', 'Over two dozen telescopes (Mayall 4m, WIYN 3.5m)', 'Near-Earth asteroids, dark matter, distant galaxies. KPNO helps find potentially hazardous objects near Earth and maps large structures in the universe to better understand dark matter distribution', 'Visitor Center open daily, with daytime tours and evening stargazing programs'),
(6, 'Palomar', 'California, USA', 'Palomar-Observatory.jpg', 'Palomar-Observatory-2.jpg', 'Palomar-Observatory-3.jpg', 'Palomar-Observatory-4.jpg', '1,712 meters. Reduces atmospheric blur and was known for good image quality when built', 'Operational since 1949', 'Owned by Caltech', 'Iconic 5.1-meter (200-inch) Hale Telescope', 'Asteroids, outer Solar System objects, supernovae, exoplanets. Palomar continues to explore planets and unusual objects within and beyond our solar system, as well as study bright star explosions', 'Self-guided tours of the 200-inch telescope area, on-site museum'),
(7, 'Cerro Tololo Inter-American (CTIO)', 'Cerro Tololo summit, northern Chile', 'Cerro-Tololo-Inter-American-Observatory(CTIO).jpg', 'Cerro-Tololo-Inter-American-Observatory(CTIO)-2.jpg', 'Cerro-Tololo-Inter-American-Observatory(CTIO)-3.jpg', 'Cerro-Tololo-Inter-American-Observatory(CTIO)-4.jpg', '2,200 meters. Height combined with Chile\'s dry climate provides clear, stable skies, ideal for large surveys', 'Began operations in 1963', 'Part of NOIRLab, managed by the U.S. National Science Foundation (NSF)', '4-meter Victor M. Blanco Telescope, with DECam survey camera', 'Cosmology, dark energy, large-scale galaxy surveys. CTIO is especially crucial for studying \"dark energy\" and mapping galaxies across vast areas to understand the universe\'s expansion', 'Offers guided tours on specific Saturdays (reservations required)');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `photo_extra` varchar(250) NOT NULL,
  `discovery_date` varchar(250) NOT NULL,
  `diameter_km` varchar(250) NOT NULL,
  `avg_distance_to_earth_km` varchar(250) NOT NULL,
  `avg_distance_to_sun_km` varchar(250) NOT NULL,
  `brief_intro_composition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planets`
--

INSERT INTO `planets` (`id`, `name`, `photo`, `photo_2`, `photo_3`, `photo_4`, `photo_extra`, `discovery_date`, `diameter_km`, `avg_distance_to_earth_km`, `avg_distance_to_sun_km`, `brief_intro_composition`) VALUES
(1, 'Earth', 'earth-planet.jpg', 'earth-planet-2.jpg', 'earth-planet-3.jpg', 'earth-planet-4.jpg', 'earth-planet-extra.jpg', 'Known since ancient times', '12,742 km', '0 km (we\'re on it!)', 'Approximately 149.6 million km', 'Earth is truly unique as the only planet known to harbor life. Its existence is supported by a perfectly balanced set of conditions: a breathable atmosphere containing about 78% Nitrogen and 21% Oxygen, and the abundant presence of liquid water across its surface. These elements, combined with its ideal distance from the Sun, create a \"Goldilocks zone\" for life to thrive. Earth\'s surface is dynamic, with oceans, continents, and active geological processes. Its internal structure consists of a silicate crust, a dynamic mantle that causes plate tectonics, a liquid outer core that generates Earth\'s protective magnetic field, and a solid inner core made of iron-nickel'),
(2, 'Mercury', 'mercury-planet.jpg', 'mercury-planet-2.jpg', 'mercury-planet-3.jpg', 'mercury-planet-4.jpg', 'mercury-planet-extra.jpg', 'Known since ancient times.', '4,879 km', 'Approximately 77 million km', 'Approximately 57.9 million km', 'Mercury is the smallest planet in our Solar System and the closest to the Sun. Its highly eccentric orbit takes it very close to the Sun (perihelion) and then much farther away (aphelion). The surface of Mercury, heavily pockmarked with craters resembling our Moon\'s, is a testament to billions of years of impacts. Due to its thin atmosphere, there\'s a dramatic temperature swing, with daytime temperatures soaring to 430°C (800°F) and nighttime temperatures plummeting to -180°C (-290°F). Its primary composition includes a large iron-nickel core, a silicate mantle and crust, and an extremely thin exosphere formed by atoms ejected from its surface by solar wind'),
(3, 'Venus', 'venus-planet.jpg', 'venus-planet-2.jpg', 'venus-planet-3.jpg', 'venus-planet-4.jpg', 'venus-planet-extra.jpg', 'Known since ancient times', '12,104 km', 'Approximately 41 million km', 'Approximately 108.2 million km', 'Often called Earth\'s \"sister planet\" due to their similar size and mass, Venus is anything but hospitable. It holds the title for the hottest planet in our Solar System, primarily because of a runaway greenhouse effect. Its incredibly dense atmosphere, primarily composed of about 96.5% Carbon dioxide and 3.5% Nitrogen, traps heat efficiently. This creates scorching surface temperatures hot enough to melt lead, and a crushing atmospheric pressure more than 90 times that of Earth\'s. Its surface is mainly volcanic rock, covered by vast plains formed by ancient lava flows, and internally, it has an iron-nickel core'),
(4, 'Mars', 'mars-planet.jpg', 'mars-planet-2.jpg', 'mars-planet-3.jpg', 'mars-planet-4.jpg', 'mars-planet-extra.jpg', 'Known since ancient times', '6,779 km', 'Approximately 78.3 million km', 'Approximately 227.9 million km', 'Commonly known as the \"Red Planet\" due to the distinctive rust-red hue of its iron oxide-rich soil, Mars has captivated humanity for centuries. It features polar ice caps, volcanoes, canyons, and evidence of ancient riverbeds, suggesting that liquid water once flowed freely on its surface. Mars has two small, irregularly shaped moons, Phobos and Deimos. Extensive missions have been sent to Mars, making it a primary focus for the search for past or present extraterrestrial life. Its very thin atmosphere is mostly Carbon dioxide, and internally, it has an iron, nickel, and sulfur core, along with a silicate mantle and crust. Water ice and dioxide ​ice are also found at its poles and beneath the surface'),
(5, 'Jupiter', 'jupiter-planet.jpg', 'jupiter-planet-2.jpg', 'jupiter-planet-3.jpg', 'jupiter-planet-4.jpg', 'jupiter-planet-extra.jpg', 'Known since ancient times', '139,820 km', 'Approximately 628.7 million km', 'Approximately 778.5 million km', 'Jupiter is the largest planet in the Solar System, so massive that it accounts for more than 2.5 times the combined mass of all other planets. This gas giant is a spectacular sight with its prominent bands of clouds and the iconic \"Great Red Spot,\" a colossal anticyclonic storm that has raged for at least 350 years and is larger than Earth itself. Jupiter also boasts a complex system of rings and a multitude of moons, including the four Galilean moons (Io, Europa, Ganymede, and Callisto), which are worlds in themselves. It\'s primarily composed of about 90% Hydrogen and 10% Helium. Inside, immense pressure turns hydrogen into a liquid metallic form, and it\'s believed to have a small solid core of rock and metals'),
(6, 'Saturn', 'saturn-planet.jpg', 'saturn-planet-2.jpg', 'saturn-planet-3.jpg', 'saturn-planet-4.jpg', 'saturn-planet-extra.jpg', 'Known since ancient times', '116,460 km', 'Approximately 1.28 billion km', 'Approximately 1.43 billion km', 'Saturn is arguably the most recognizable planet, renowned for its stunning and intricate system of rings. These rings are not solid but are made up of billions of small particles, primarily water ice and rocky debris, ranging in size from specks of dust to mountains. As a gas giant, Saturn is predominantly composed of Hydrogen and Helium. It\'s also known for its many moons, including Titan, which has a dense atmosphere and liquid methane lakes, making it one of the most intriguing celestial bodies for astrobiological research. Internally, it has a relatively small but massive solid core of iron, nickel, and rocky materials. This core is surrounded by a layer of highly compressed liquid metallic hydrogen, followed by a layer of liquid hydrogen and helium. The outermost layer is its atmosphere, mainly composed of hydrogen and helium, with traces of methane and ammonia'),
(7, 'Uranus', 'uranus-planet.jpg', 'uranus-planet-2.webp', 'uranus-planet-3.webp', 'uranus-planet-4.jpg', 'uranus-planet-extra.jpg', ' March 13, 1781 by William Herschel', '50,724 km', 'Approximately 2.72 billion km', ' Approximately 2.88 billion km', 'This distant ice giant stands out due to its extreme axial tilt, causing it to essentially roll on its side as it orbits the Sun. This unique orientation results in peculiar seasons, with each pole experiencing 42 years of continuous sunlight followed by 42 years of darkness. Its distinctive blue-green color comes from the Methane in its atmosphere, which absorbs red light. Uranus has a faint system of rings and a collection of moons with diverse landscapes. Its atmosphere contains Hydrogen, Helium, and Methane. Beneath the atmosphere, Uranus has a thick liquid layer, often called the \"ice\" layer, composed of superheated and super-compressed water, Ammonia, and Methane. At its center, it has a smaller, solid core believed to consist of rock and ice'),
(8, 'Neptune', 'neptune-planet.jpg', 'neptune-planet-2.jpg', 'neptune-planet-3.jpg', 'neptune-planet-4.jpg', 'neptune-planet-extra.jpg', 'September 23, 1846 by Urbain Le Verrier, John Couch Adams, and Johann Gottfried Galle', '49,244 km', 'Approximately 4.34 billion km', 'Approximately 4.5 billion km', 'Neptune is the farthest planet from the Sun and another enigmatic ice giant. Despite its immense distance, it\'s known for having the strongest sustained winds in the Solar System, often reaching supersonic speeds. Its striking deep blue color, even more intense than Uranus\', is attributed to the Methane in its atmosphere along with Hydrogen and Helium. Neptune has a system of faint rings and 14 known moons, with Triton being the largest and most geologically active, exhibiting cryovolcanism. Neptune\'s internal structure includes a thick liquid layer, also known as the \"ice\" layer, primarily composed of superheated and super-compressed water, Ammonia, and Methane. At its center, it has a smaller, solid core believed to consist of rock and ice');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL, 
  `image` varchar(255) DEFAULT NULL, 
  `category_id` bigint(20) UNSIGNED DEFAULT NULL, 
  `is_published` tinyint(1) NOT NULL DEFAULT 0, 
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$tB/LOt7Fi/8bmzMyE0YjnuQUBjSkTs2lpZGzpNNyYZyrlMsafaj/a', NULL, '2025-07-10 21:18:11', '2025-07-10 21:18:11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `constellations`
--
ALTER TABLE `constellations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `planets`
--
ALTER TABLE `planets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `constellations`
--
ALTER TABLE `constellations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



