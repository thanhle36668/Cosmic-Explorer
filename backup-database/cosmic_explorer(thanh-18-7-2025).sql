-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 08:20 PM
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name_book` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publication_year` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `main_title` text NOT NULL,
  `main_content` text NOT NULL,
  `main_content_1` text NOT NULL,
  `main_content_2` text NOT NULL,
  `photo_book` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name_book`, `slug`, `author`, `publication_year`, `genre`, `description`, `main_title`, `main_content`, `main_content_1`, `main_content_2`, `photo_book`) VALUES
(1, 'Cosmos', 'Cosmos', 'Carl Sagan', '1980', 'Non-fiction, Science, Astronomy, Philosophy, History', '\"Cosmos\" is a classic science book that takes readers on a journey through 15 billion years of cosmic evolution, from the origins of everything to humanity\'s place in the universe. Written in a captivating style, Sagan blends science with philosophy, fostering curiosity and wonder about the vast cosmos', 'The Cosmos: A Grand Symphony of Science and Wonder', 'This book explores the immense scale of space and time, from tiny subatomic particles to billions of galaxies, while delving into humanity\'s historical understanding of the cosmos, from ancient myths to groundbreaking scientific discoveries by great thinkers. Author Carl Sagan emphasizes the importance of scientific thought, skepticism, and empirical evidence. The book also investigates the origins of life on Earth, the development of consciousness, and discusses the possibility of extraterrestrial life, situating humanity\'s brief existence within the vast \"Cosmic Calendar.\" A recurring theme is the profound interconnectedness of everything, asserting that we are made of \"star-stuff.\" Sagan passionately advocates for science as an essential tool to understand the universe and ourselves, fostering curiosity and responsibility towards our planet, and highlighting the importance of preserving knowledge. Finally, the Voyager missions and their messages symbolize humanity\'s desire to explore and connect with the universe.', 'A central theme woven throughout the book is the profound interconnectedness of everything, encapsulated in Sagan\'s famous declaration, \"The Cosmos is all that is or ever was or ever will be.\" He points out that we are literally made of \"star-stuff\" and that our existence is deeply tied to the cosmic processes that have unfolded throughout the universe\'s history. Sagan passionately advocates for science as a powerful and indispensable tool for understanding the universe and ourselves. He cultivates a sense of continuous wonder, insatiable curiosity, and a deep responsibility toward our planet and the ceaseless pursuit of knowledge. The book also highlights the historical importance of great intellectual centers like the Library of Alexandria, illustrating its significance as a beacon of ancient knowledge and the tragic loss when it was destroyed, thereby emphasizing the fragility and vital importance of preserving human knowledge and intellectual endeavor. Finally, Sagan discusses the Voyager missions and their golden records, carrying a message from humanity to potential alien civilizations, symbolizing our innate desire to explore, communicate, and connect with the universe beyond our own world', '', 'Cosmos-Carl-Sagan-book.jpg'),
(2, 'A Brief History of Time: From the Big Bang to Black Holes', 'A-Brief-History-of-Time-From-the-Big-Bang-to-Black-Holes', 'Stephen Hawking', '1988', 'Non-fiction, Popular Science, Cosmology, Physics, Astronomy', '\"A Brief History of Time\" is Stephen Hawking\'s renowned popular science book. It lucidly explains complex concepts about the universe\'s origin, structure, and ultimate fate. Exploring topics like the Big Bang, black holes, and the nature of time, it opens the door to cosmic knowledge for everyone', 'Unlocking the Universe\'s Deepest Secrets: A Journey Through Space, Time, and Creation', 'Stephen Hawking\'s \"A Brief History of Time\" simplifies profound questions in cosmology and theoretical physics for the general reader, using minimal jargon. The book traces humanity\'s evolving understanding of the universe, from ancient ideas to Newton\'s and Einstein\'s theories. Hawking explains core concepts like the Big Bang, the formation and properties of black holes (including Hawking radiation), and the enigmatic nature of time. He also touches upon the uncertainty principle and the ongoing quest for a unified theory of everything to reconcile general relativity and quantum mechanics, introducing his own \"no-boundary proposal.\" Ultimately, it\'s an intellectual journey that encourages contemplation on humanity\'s relentless pursuit of knowledge, our place in the vast cosmos, and the ultimate secrets of creation.', 'The book further explores the enigmatic nature of time, discussing its \"arrows\" (thermodynamic, psychological, and cosmological) and posing questions about whether time truly has a beginning or an end, and if time travel is possible. Hawking touches upon the uncertainty principle from quantum mechanics, highlighting the inherent unpredictability at the subatomic level, and the ongoing quest for a unified theory of everything – a single theoretical framework that would reconcile general relativity (governing the large-scale universe) with quantum mechanics (governing the very small). He also introduces his own \"no-boundary proposal\" for the universe, which suggests a universe that is finite in imaginary time but without boundaries or a definite beginning in real time. Ultimately, \"A Brief History of Time\" is an intellectual journey that encourages readers to contemplate humanity\'s relentless pursuit of knowledge, our place in the vast cosmos, and the ultimate secrets at the heart of creation', '', 'A-Brief-History-of-Time-From-the-Big-Bang-to-Black-Holes-book.jpg'),
(3, 'Astrophysics for People in a Hurry', 'Astrophysics-for-People-in-a-Hurry', 'Neil deGrasse Tyson', '2017', 'Non-fiction, Popular Science, Astrophysics, Cosmology', '\"Astrophysics for People in a Hurry\" is a concise and accessible guide to the universe\'s most profound mysteries. Neil deGrasse Tyson expertly distills complex astrophysical concepts into bite-sized, engaging chapters, covering everything from the Big Bang and dark matter to black holes and the search for alien life. It\'s designed for busy readers who want to grasp the essentials of the cosmos without getting lost in jargon', 'Main Title: Cosmic Essentials: Your Express Ticket to Understanding the Universe', 'Neil deGrasse Tyson\'s \"Astrophysics for People in a Hurry\" offers a concise and accessible overview of the universe\'s most profound mysteries. The book simplifies complex astrophysical concepts, covering the Big Bang, the formation of fundamental particles, atoms, stars, and galaxies. Tyson also clarifies the role of light as a cosmic messenger and explores enigmatic components like dark matter and dark energy. Additionally, the book touches upon black holes and the search for extraterrestrial life, all presented with a witty and engaging tone that ignites curiosity and a thirst for cosmic knowledge.', 'Tuyệt vời! Dưới đây là thông tin về cuốn sách \"Astrophysics for People in a Hurry\" của Neil deGrasse Tyson:\n\nBook Title: Astrophysics for People in a Hurry\n\nAuthor: Neil deGrasse Tyson\n\nPublication Year: 2017\n\nGenre: Non-fiction, Popular Science, Astrophysics, Cosmology\n\nDescription: \"Astrophysics for People in a Hurry\" is a concise and accessible guide to the universe\'s most profound mysteries. Neil deGrasse Tyson expertly distills complex astrophysical concepts into bite-sized, engaging chapters, covering everything from the Big Bang and dark matter to black holes and the search for alien life. It\'s designed for busy readers who want to grasp the essentials of the cosmos without getting lost in jargon.\n\nMain Title: Cosmic Essentials: Your Express Ticket to Understanding the Universe\n\nMain Content\n\"Astrophysics for People in a Hurry\" offers a highly condensed yet comprehensive overview of the universe\'s fundamental workings and our current understanding of its origins and evolution. Tyson begins by exploring the very beginning of the cosmos with the Big Bang theory, detailing the initial moments when space, time, and matter came into existence, and how the universe rapidly expanded and cooled. He then delves into the building blocks of the universe, from fundamental particles like quarks and leptons to the formation of atoms, stars, and galaxies. The book illuminates the nature of light, explaining how its various wavelengths (from radio waves to gamma rays) serve as crucial messengers from distant cosmic events, allowing scientists to piece together the universe\'s history. Tyson also tackles the mysterious components of the cosmos that we cannot directly observe: dark matter and dark energy, which together constitute about 95% of the universe and remain some of the biggest puzzles in modern astrophysics.\n\nThe book further explores captivating phenomena like black holes, explaining their formation from massive stars and their incredible gravitational pull. Tyson also discusses the concept of exoplanets and the ongoing search for life beyond Earth, emphasizing the vastness and diversity of planetary systems. Throughout the book, he maintains a witty, engaging, and highly approachable tone, using vivid analogies to simplify complex ideas. He instills a sense of awe and wonder about the universe, highlighting humanity\'s continuous quest for knowledge and our unique place within the grand cosmic narrative. \"Astrophysics for People in a Hurry\" serves as an excellent primer for anyone curious about the universe but limited on time, providing essential cosmic literacy in an entertaining and digestible format', '', 'Astrophysics-for-People-in-a-Hurry-book.jpg'),
(4, 'The Stars: A New Way to See Them', 'The-Stars-A-New-Way-to-See-Them', 'H.A. Rey', '1952 (has been reissued and updated multiple times)', 'Non-fiction, Astronomy, Star Guide, Popular Science', '\"The Stars: A New Way to See Them\" is a classic guide to observing the night sky, renowned for its unique and easy-to-understand approach. H.A. Rey, the creator of Curious George, revolutionized star charts by redrawing constellations in a more intuitive way, making them easier for readers to identify and remember compared to complex traditional depictions. It\'s an ideal book for anyone new to astronomy who wants to learn about constellations simply and enjoyably', 'The Night Sky at Your Fingertips: Visually Exploring the Constellations', 'H.A. Rey\'s \"The Stars: A New Way to See Them\" stands out for its innovative method of helping readers identify and memorize constellations. Instead of complex traditional drawings, Rey redesigned constellation shapes to be simpler and more intuitive (e.g., Gemini as two people holding hands). The book provides seasonal star charts, guidance on orienting oneself, and how to find prominent stars. Beyond its innovative charts, it contains practical information on basic astronomy, explaining concepts like celestial coordinates and the apparent motion of stars, along with practical advice for observing the sky without a telescope. Although written in the mid-20th century, its excellent pedagogical approach and accurate information have made it a timeless reference for astronomy enthusiasts of all ages, especially beginners, encouraging them to discover the beauty of the night sky for themselves.', 'Beyond its innovative star charts, the book contains a wealth of practical and fascinating information on basic astronomy. Rey explains concepts such as celestial coordinates, the apparent motion of the stars, and how stars are named. He also offers practical advice on how to use star maps, how to observe without a telescope, and what to look for in the sky. Although written in the mid-20th century, the book\'s excellent pedagogical approach and the accuracy of its information have made \"The Stars: A New Way to See Them\" a timeless reference for astronomy enthusiasts of all ages, especially beginners. It actively encourages readers to go outside and discover the beauty and wonder of the night sky for themselves.', '', 'The-Stars-A-New-Way-to-See-Them-book.jpg');

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

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Plannets', NULL, NULL),
(2, 'Constellations', NULL, NULL),
(5, 'Observatories', NULL, NULL);

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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  `photo_4` varchar(255) NOT NULL,
  `photo_5` varchar(255) NOT NULL,
  `identification` text NOT NULL,
  `main_stars` text NOT NULL,
  `notable_features` text NOT NULL,
  `myths_meaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constellations`
--

INSERT INTO `constellations` (`id`, `name`, `slug`, `title`, `photo`, `photo_2`, `photo_3`, `photo_4`, `photo_5`, `identification`, `main_stars`, `notable_features`, `myths_meaning`) VALUES
(1, 'Orion (The Hunter)', 'Orion', 'Orion', 'orion-constellation.jpg', 'orion-constellation-2.jpg', 'orion-constellation-3.jpg', 'orion-constellation-4.jpg', '', 'This is a very bright constellation, easy to find in the winter sky (December - March). It\'s located near the celestial equator, so you can see it from most places on Earth. It looks like a hunter, clearly marked by Orion\'s Belt (three bright stars in a straight line)', 'Betelgeuse: A huge, red-orange star on the hunter\'s shoulder, estimated to be about 1,000 times bigger than our Sun.\r\nRigel: A brilliant blue-white star on the hunter\'s foot', 'The Orion Nebula (M42), a giant star-forming region about 1,344 light-years away. You can often see it with your naked eye as a fuzzy patch in dark skies', 'In Greek mythology, Orion was a great hunter. This constellation is also useful for finding nearby constellations'),
(2, 'Leo (The Lion)', 'Leo', 'Leo', 'leo-constellation.jpg', 'leo-constellation-2.jpg', 'leo-constellation-3.webp', 'leo-constellation-4.jpg', '', 'A bright constellation, especially noticeable in the spring sky (March - June) from the Northern Hemisphere. It looks like a reclining lion, clearly identified by the Sickle shape that forms its head and mane', 'Regulus: The brightest star, marking the lion\'s heart.\r\nDenebola: The second brightest star, found at the lion\'s tail', 'Notable Features: Home to several interesting galaxies, especially the Leo Triplet (M65, M66, NGC 3628), a group of three beautiful spiral galaxies', 'Myths & Meaning: One of the 12 Zodiac constellations. In Greek mythology, it represents the Nemean Lion, defeated by Hercules'),
(3, 'Ursa Major (The Great Bear)', 'Ursa-Major', 'Ursa Major', 'ursa-major-constellation.jpg', 'ursa-major-constellation-2.jpg', 'ursa-major-constellation-3.jpg', 'ursa-major-constellation-4.jpg', 'ursa-major-constellation-5.jpg', 'A large and bright constellation in the Northern Hemisphere, visible all year round (it\'s a circumpolar constellation). Its most famous part is the Big Dipper (also called the Plough), a group of seven stars forming a ladle or spoon shape', 'Dubhe & Merak: These two stars are \"pointer stars\" that help you easily find Polaris (the North Star).\r\n\r\nMizar & Alcor: A well-known double star pair in the dipper\'s \"handle\"', 'Includes the Owl Nebula (M97) and bright galaxies like Bode\'s Galaxy (M81) and the Cigar Galaxy (M82)', 'Linked to Callisto in Greek mythology. This constellation has been incredibly important for navigation for centuries because it helps people find true North'),
(4, 'Scorpius (The Scorpion)', 'Scorpius', 'Scorpius', 'scorpius-constellation.jpg', 'scorpius-constellation-2.jpg', 'scorpius-constellation-3.jpg', 'scorpius-constellation-4.jpg', '', 'A very bright and easily recognizable constellation, especially in the summer sky (June - September) from the Northern Hemisphere. It\'s located in the southern celestial hemisphere. It looks like a winding scorpion with a curved tail and a stinger', 'Antares: A supergiant red star, known as the \"heart of the Scorpion.\" It\'s one of the brightest stars in the night sky, about 700 times larger than our Sun', 'Contains many beautiful open star clusters like M6 (the Butterfly Cluster) and M7 (Ptolemy\'s Cluster). This area is also famous for its interesting dark nebulae', 'One of the 12 Zodiac constellations. It\'s connected to the myth of Orion\'s death, where the Scorpion killed the great hunter. This is why the two constellations never appear in the sky at the same time'),
(5, 'Cassiopeia (The Queen)', 'Cassiopeia', 'Cassiopeia', 'cassiopeia-constellation.jpg', 'cassiopeia-constellation-2.jpg', 'cassiopeia-constellation-3.jpg', 'cassiopeia-constellation-4.jpg', '', 'A bright constellation, easy to find in the Northern Hemisphere all year round (it\'s circumpolar). It\'s distinctly shaped like a large \"W\" or \"M\" (depending on the time of night). It appears opposite the North Star from the Big Dipper', 'The stars forming the W/M shape, like Schedar and Caph, are quite bright', 'Located within the Milky Way, Cassiopeia contains many open star clusters and nebulae, such as the Heart Nebula (IC 1805) and the Soul Nebula (IC 1848). It\'s also the location of Cassiopeia A, a powerful supernova remnan', 'In Greek mythology, Cassiopeia was a boastful queen punished by being placed in the sky, sometimes upside down. This constellation is also a useful landmark for finding other constellations and objects in the northern sky');

-- --------------------------------------------------------

--
-- Table structure for table `discovery`
--

CREATE TABLE `discovery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description_short` text NOT NULL,
  `title_details` text NOT NULL,
  `description_details` text NOT NULL,
  `content_1` text NOT NULL,
  `content_2` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `name_photo` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discovery`
--

INSERT INTO `discovery` (`id`, `title`, `slug`, `author`, `description_short`, `title_details`, `description_details`, `content_1`, `content_2`, `photo`, `photo_2`, `name_photo`, `created_at`) VALUES
(1, 'The Big Bang: Exploring the Origin of Our Universe', 'The-Big-Bang-Exploring-the-Origin-of-Our-Universe', 'Admin', 'Where did our universe begin? The Big Bang is the leading theory, describing the sudden expansion of space and time from an extremely hot, dense point 13.8 billion years ago. This event created everything from subatomic particles to galaxies, explaining the universe\'s start and evolution', 'The Big Bang Theory: The Beginning and Development of Our Universe', 'The Big Bang theory is the top scientific model that explains how our universe formed and grew. The term \'Big Bang\' was actually jokingly made up by astronomer Fred Hoyle in 1949, but it later became the official name for this theory. It describes the universe expanding from an incredibly hot, dense state, leading to the formation of all matter and cosmic structures we observe today.', 'Starting from a Singular Point\r\nAccording to the Big Bang theory, our universe began from an incredibly hot, dense, and tiny state about 13.8 billion years ago. At that moment, all the universe\'s energy and matter were thought to be concentrated in a \"singularity\" – a point with endless density and temperature. This wasn\'t an explosion in space, but rather the expansion of space itself, carrying matter and energy along with it.\r\n\r\nStages of Universe Development\r\nRight after the very beginning, the universe went through a series of rapid expansion and cooling phases. These included the Planck Epoch), the most mysterious stage where our current physics laws might not apply; the Inflationary Epoch, when the universe expanded incredibly fast, far exceeding the speed of light; the formation of subatomic particles, as basic particles like quarks and electrons began to form from energy; the formation of protons and neutrons, when quarks combined to make them; Big Bang Nucleosynthesis (from 3 to 20 minutes), where protons and neutrons joined to form the lightest atomic nuclei like hydrogen and helium, along with a tiny bit of lithium; the Recombination Era (around 380,000 years), when electrons combined with hydrogen and helium nuclei to form neutral atoms, making the universe transparent, and the leftover radiation is called the Cosmic Microwave Background (CMB); the Dark Ages (from 380,000 years to about 150 million years), a period where no stars or galaxies had formed, and the universe was mostly neutral hydrogen and helium gas; and finally, the formation of stars and galaxies (from about 150 million years ago to today), as gravity caused denser areas of matter to collapse and form the first stars, then galaxies and galaxy clusters.', 'Evidence Supporting the Big Bang Theory\r\nThe Big Bang theory is strongly supported by much powerful observational evidence. This includes the expansion of the universe (Hubble\'s Law), where galaxies are moving away from us, and those farther away are moving faster; the Cosmic Microwave Background (CMB), the \"afterglow\" from the early universe, discovered in 1964, which is the most convincing proof; the abundance of light elements, as the amounts of hydrogen and helium observed in the universe match the Big Bang theory\'s predictions; and the formation and distribution of large structures, as computer simulations can successfully recreate how galaxies and galaxy clusters formed and are spread out in the universe.\r\n\r\nUnanswered Questions\r\nWhile the Big Bang theory has been very successful, there are still some big unanswered questions. These include the nature of dark matter and dark energy, two components that make up most of the universe\'s energy and matter, but whose true nature remains a mystery; what happened before the Big Bang, as the theory doesn\'t explain what existed or occurred before that initial point; and how the universe will end, as its future is still not clearly determined.\r\n\r\nThe Big Bang theory continues to be a dynamic field of research, with scientists constantly searching for new evidence to better understand the origin and evolution of our universe.', 'discovery-bigbang-1.png', 'discovery-bigbang-2.jpg', 'The Big Bang Theory', '2025-07-16'),
(2, 'The Formation of Earth: How Our Home Planet Came to Be', 'The-Formation-of-Earth-How-Our-Home-Planet-Came-to-Be', 'Admin', 'The Formation of Earth: How Our Home Planet Came to Be\nHave you ever wondered how the planet we live on came into existence? Earth, this vibrant blue home, has a dramatic and fascinating origin story. It\'s not just a giant rock, but the result of billions of years of formation from cosmic dust and powerful collisions, gradually transforming into a world capable of supporting life', 'The Process of Earth\'s Formation: From Cosmic Dust to a Living Planet', 'Earth\'s formation history is closely linked to the birth of our Solar System, a process that spanned millions of years from a giant cloud of gas and dust. This chaotic, energetic period saw gravity pull material together, slowly building rocky planets like Earth through countless collisions and accretion over eons.', 'Beginning from the Solar Nebula\r\nAround 4.6 billion years ago, our Solar System, including Earth, began to form from a solar nebula – a massive cloud composed of gas (mostly hydrogen and helium from the Big Bang) and cosmic dust (heavier elements from dead stars). Under the influence of gravity, this cloud began to shrink and spin. Most of the material concentrated at the center, forming the proto-Sun.\r\n\r\nAccretion and Protoplanet Formation\r\nAs the solar nebula contracted and spun faster, the remaining material further out began to collide and stick together. Tiny dust particles clumped into pebbles, which then grew into larger rocky bodies called planetesimals. These planetesimals continued to collide and merge, forming protoplanets roughly the size of Mars. The early Earth was one of these protoplanets.\r\n\r\nThe Giant Impact and Moon Formation\r\nOne of the most significant events in Earth\'s formation was a giant collision with a Mars-sized object (named Theia) about 4.53 billion years ago. This impact not only increased Earth\'s mass but also ejected a huge amount of material into space. This material later came together to form our Moon. The collision also generated immense heat, causing Earth to become completely molten.', 'Layering and Earth\'s Structure Formation\r\nAs the molten Earth began to cool, heavier materials (like iron and nickel) sank to the center, forming Earth\'s core. Lighter materials (silicates) floated upwards, forming the mantle and eventually the solid outer crust. This process is called differentiation, creating the layered structure of Earth we know today.\r\n\r\nAtmosphere, Oceans, and the Dawn of Life\r\nInitially, Earth was a scorching hot planet with no air or water. However, over millions of years, volcanic activity released water vapor and other gases from within Earth, creating the primitive atmosphere. As Earth continued to cool, water vapor condensed and fell as continuous rain, forming the first oceans. Although the early atmosphere lacked oxygen, the presence of water and suitable conditions laid the groundwork for the first life to appear on Earth around 3.8 billion years ago.\r\n\r\nWhat We\'re Still Learning\r\nWhile scientists have a fairly clear picture of Earth\'s formation, many details still need to be explored. This includes the precise timing of events; we have estimates, but pinpointing the exact timing of each stage, especially the Moon-forming impact, remains a challenge. Details about the initial accretion process are also a mystery, as how tiny dust particles effectively stuck together to form larger bodies is still an area of research. Finally, there\'s the nature of the primitive atmosphere and oceans; the exact composition of the early air and water may have been very different from today\'s, and how they supported early life remains an open question.\r\n\r\nThe formation of Earth is a complex and captivating story, showing how our planet underwent incredible changes to become the home of life.', 'discovery-earth-1.jpg', 'discovery-earth-2.jpg', 'Formation of Earth', '2025-07-16'),
(3, 'Comets: Cosmic Snowballs on a Journey Through Our Solar System', 'Comets-Cosmic-Snowballs-on-a-Journey-Through-Our-Solar-System', 'Admin', 'Comets: Cosmic Snowballs on a Journey Through Our Solar System\r\nHave you ever gazed at the night sky and seen a dazzling streak of light with a glowing tail? Those are comets – mysterious and captivating wanderers that carry precious clues about the very beginning of our Solar System. Think of them as giant, icy time capsules, holding secrets from 4.6 billion years ago, patiently waiting to reveal their ancient stories as they approach the Sun', 'Comets: What They Are, Where They Come From, and Their Amazing Features\r\n', 'Comets are small, icy space travelers that orbit the Sun, famous for the brilliant, long tails they show off when they get close to our star. These \'dirty snowballs\' are essentially frozen remnants from the early solar system, whose ice vaporizes to create the stunning celestial display', 'What Are They Made Of?\r\n\r\nComets are often called \"dirty snowballs\" by scientists, which is a great way to imagine them. They are mostly made of frozen stuff: a lot of it is water ice, but also other frozen gases like carbon dioxide (the gas you breathe out), carbon monoxide, ammonia, and methane. Mixed in with all that ice are tiny dust particles, bits of rock, and even some organic compounds – the building blocks of life.\r\n\r\nThe solid center of a comet is called its nucleus. It\'s usually pretty small, from just a few hundred feet across to a few dozen miles. The surface of the nucleus is often very dark, so it doesn\'t reflect much sunlight.\r\n\r\nWhere Do They Come From?\r\n\r\nMost comets are thought to originate from two super-cold, distant neighborhoods at the very edge of our Solar System. The Kuiper Belt: This is a vast, icy disk located beyond Neptune\'s orbit, stretching far out from the Sun. It\'s home to short-period comets, which are comets that complete an orbit around the Sun in less than 200 years (like the famous Halley\'s Comet). The Oort Cloud: Imagine a gigantic, spherical cloud completely surrounding our entire Solar System, reaching incredibly far out into space. This is where long-period comets come from – those that take thousands, or even millions, of years to orbit the Sun.\r\n\r\nComets usually start their long journey toward the Sun when gravity from huge planets or other passing stars gives them a gentle nudge, pulling them out of their icy homes.', 'What Makes Them So Spectacular?\r\n\r\nWhen a comet travels closer to the Sun, the increasing heat causes the frozen materials in its nucleus to turn directly into gas (this is called sublimation, like dry ice). This process creates the dazzling features that make comets so special. The Coma: This is a fuzzy, glowing cloud of gas and dust that forms around the nucleus. It can become much, much larger than even our biggest planets! The Dust Tail: This tail is made of tiny dust particles that get pushed away by the sunlight. It\'s usually broad, curved, and appears a cloudy white. It always trails behind the comet\'s path. The Ion Tail (or Gas Tail): This tail is made of gas molecules that have lost an electron due to the Sun\'s powerful solar wind. It\'s typically straight, often has a blue tint, and always points directly away from the Sun, no matter which way the comet is moving.\r\n\r\nComets travel in very stretched-out (elliptical) orbits. They spend most of their time far away from the Sun as dormant icy chunks. But when they swing back close, that\'s when they put on their brilliant show!\r\n\r\nWhat Mysteries Do Comets Still Hold?\r\n\r\nEven with all our amazing progress in studying comets, scientists still have some big questions they\'re trying to crack. This includes what\'s inside the nucleus; it\'s really hard to study a comet\'s core directly because they are small and their icy bits evaporate easily. We want to know their exact makeup. Another question is whether comets brought water and life to Earth; one exciting idea is that comets might have delivered a lot of the water and even the necessary organic ingredients to early Earth, helping kickstart life. Finally, there\'s how many objects are in the Oort Cloud and where exactly are they; because the Oort Cloud is so incredibly far away, it\'s extremely difficult to directly see the objects within it.\r\n\r\nComets aren\'t just beautiful sights in our night sky; they are truly cosmic time capsules, holding vital information about how our Solar System began and how it has changed over billions of years.', 'discovery-comets-1.jpg', 'discovery-comets-2.jpg', 'Comets', '2025-07-16');

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
(7, '2025_07_11_033429_create_comments_table', 1),
(9, '2025_07_13_050629_create_categories_table', 2),
(10, '2025_07_13_053710_add_category_id_slug_image_is_published_to_posts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `observatories`
--

CREATE TABLE `observatories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `observatories` tinyint(1) NOT NULL,
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

INSERT INTO `observatories` (`id`, `name`, `slug`, `observatories`, `location`, `photo`, `photo_2`, `photo_3`, `photo_4`, `altitude_meters`, `established_year`, `managing_organization`, `main_instruments`, `primary_research_areas`, `public_access_info`) VALUES
(1, 'Mauna Kea Observatories (MKO)', 'Mauna-Kea-Observatories-(MKO)', 1, 'Mauna Kea summit, Hawaii, USA', 'Mauna-Kea-Observatory.jpg', 'Mauna-Kea-Observatory-2.jpg', 'Mauna-Kea-Observatory-3.jpg', 'Mauna-Kea-Observatory-4.jpg', '4,205 meters. Extremely high, offers excellent infrared observation and very sharp images due to stable atmosphere', 'First telescope began operating in 1970', 'A collection of ~13 observatories from various nations/organizations', 'Collection of giant telescopes (optical, infrared)', 'Broad, from exoplanets to cosmology. Discoveries here help us understand the universe\'s origin, how galaxies develop, and the search for life beyond Earth', 'Has a Visitor Information Station (VIS) at a lower elevation'),
(2, 'Paranal', 'Paranal', 0, 'Atacama Desert, Chile', 'Paranal-Observatory.jpg', 'Paranal-Observatory-2.jpg', 'Paranal-Observatory-3.jpg', 'Paranal-Observatory-4.jpg', '2,635 meters. Good height combined with extremely dry climate, ideal for both optical and infrared with nearly cloudless skies', 'Began operations in 1999', 'Run by ESO', 'Very Large Telescope (VLT), 4x 8.2-meter telescopes (can be combined)', 'Exoplanets, black holes, galaxies, cosmology. It\'s especially successful in directly imaging distant planets and tracking stars moving around the supermassive black hole at our galaxy\'s center', 'Offers free guided tours on Saturdays (registration required)'),
(3, 'Las Campanas (LCO)', 'Las-Campanas-(LCO)', 0, 'Atacama Desert, Chile', 'Las-Campanas-Observatory(LCO).webp', 'Las-Campanas-Observatory(LCO)-2.jpg', 'Las-Campanas-Observatory(LCO)-3.jpg', 'Las-Campanas-Observatory(LCO)-4.jpg', '2,400 meters. High desert location provides very dark skies and stable image quality', 'Began operating in 1969', 'Belongs to the Carnegie Institution for Science', 'Twin 6.5-meter Magellan Telescopes. Future home of Giant Magellan Telescope (GMT)', 'Galaxy formation, stellar variability, supernovae. They study how galaxies are formed, changes in stars, and powerful star explosions to understand the universe', 'Guided tours available on Saturdays (reservation required)'),
(5, 'Kitt Peak National (KPNO)', 'Kitt-Peak-National-(KPNO)', 0, 'Arizona, USA', 'Kitt-Peak-National-Observatory(KPNO).webp', 'Kitt-Peak-National-Observatory(KPNO)-2.jpg', 'Kitt-Peak-National-Observatory(KPNO)-3.jpg', 'Kitt-Peak-National-Observatory(KPNO)-4.jpg', '2,096 meters. Reasonable height with many clear nights and clean air, versatile for various observations', 'Founded in 1958', 'First U.S. national optical observatory, now part of NOIRLab', 'Over two dozen telescopes (Mayall 4m, WIYN 3.5m)', 'Near-Earth asteroids, dark matter, distant galaxies. KPNO helps find potentially hazardous objects near Earth and maps large structures in the universe to better understand dark matter distribution', 'Visitor Center open daily, with daytime tours and evening stargazing programs'),
(6, 'Palomar', 'Palomar', 0, 'California, USA', 'Palomar-Observatory.jpg', 'Palomar-Observatory-2.jpg', 'Palomar-Observatory-3.jpg', 'Palomar-Observatory-4.jpg', '1,712 meters. Reduces atmospheric blur and was known for good image quality when built', 'Operational since 1949', 'Owned by Caltech', 'Iconic 5.1-meter (200-inch) Hale Telescope', 'Asteroids, outer Solar System objects, supernovae, exoplanets. Palomar continues to explore planets and unusual objects within and beyond our solar system, as well as study bright star explosions', 'Self-guided tours of the 200-inch telescope area, on-site museum'),
(7, 'Cerro Tololo Inter-American (CTIO)', 'Cerro-Tololo-Inter-American-(CTIO)', 0, 'Cerro Tololo summit, Northern Chile', 'Cerro-Tololo-Inter-American-Observatory(CTIO).jpg', 'Cerro-Tololo-Inter-American-Observatory(CTIO)-2.jpg', 'Cerro-Tololo-Inter-American-Observatory(CTIO)-3.jpg', 'Cerro-Tololo-Inter-American-Observatory(CTIO)-4.jpg', '2,200 meters. Height combined with Chile\'s dry climate provides clear, stable skies, ideal for large surveys', 'Began operations in 1963', 'Part of NOIRLab, managed by the U.S. National Science Foundation (NSF)', '4-meter Victor M. Blanco Telescope, with DECam survey camera', 'Cosmology, dark energy, large-scale galaxy surveys. CTIO is especially crucial for studying \"dark energy\" and mapping galaxies across vast areas to understand the universe\'s expansion', 'Offers guided tours on specific Saturdays (reservations required)');

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
  `slug` varchar(255) NOT NULL,
  `title_short` text NOT NULL,
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

INSERT INTO `planets` (`id`, `name`, `slug`, `title_short`, `photo`, `photo_2`, `photo_3`, `photo_4`, `photo_extra`, `discovery_date`, `diameter_km`, `avg_distance_to_earth_km`, `avg_distance_to_sun_km`, `brief_intro_composition`) VALUES
(1, 'Earth', 'Earth', 'Our home! Earth is the only known planet to harbor life, thanks to the presence of liquid water on its surface and an oxygen-rich atmosphere. Earth has one Moon, which significantly influences tides and stabilizes its rotational axis', 'earth-planet.jpg', 'earth-planet-2.png', 'earth-planet-3.png', 'earth-planet-4.png', 'earth-planet-extra.png', 'Known since ancient times', '12,742 km', '0 km (we\'re on it!)', 'Approximately 149.6 million km', 'Earth is truly unique as the only planet known to harbor life. Its existence is supported by a perfectly balanced set of conditions: a breathable atmosphere containing about 78% Nitrogen and 21% Oxygen, and the abundant presence of liquid water across its surface. These elements, combined with its ideal distance from the Sun, create a \"Goldilocks zone\" for life to thrive. Earth\'s surface is dynamic, with oceans, continents, and active geological processes. Its internal structure consists of a silicate crust, a dynamic mantle that causes plate tectonics, a liquid outer core that generates Earth\'s protective magnetic field, and a solid inner core made of iron-nickel'),
(2, 'Mercury', 'Mercury', 'The smallest planet and closest to the Sun, Mercury is an arid world with extreme temperature swings between day and night. Its surface is heavily cratered, reminiscent of our Moon', 'mercury-planet.png', 'mercury-planet-2.png', 'mercury-planet-3.png', 'mercury-planet-4.png', 'mercury-planet-extra.jpg', 'Known since ancient times.', '4,879 km', 'Approximately 77 million km', 'Approximately 57.9 million km', 'Mercury is the smallest planet in our Solar System and the closest to the Sun. Its highly eccentric orbit takes it very close to the Sun (perihelion) and then much farther away (aphelion). The surface of Mercury, heavily pockmarked with craters resembling our Moon\'s, is a testament to billions of years of impacts. Due to its thin atmosphere, there\'s a dramatic temperature swing, with daytime temperatures soaring to 430°C (800°F) and nighttime temperatures plummeting to -180°C (-290°F). Its primary composition includes a large iron-nickel core, a silicate mantle and crust, and an extremely thin exosphere formed by atoms ejected from its surface by solar wind'),
(3, 'Venus', 'Venus', 'Often called Earth\'s \"sister planet\" in terms of size, Venus is actually a hellish world. With a thick carbon dioxide atmosphere and an intense greenhouse effect, it\'s the hottest planet in our Solar System, hot enough to melt lead', 'venus-planet.png', 'venus-planet-2.png', 'venus-planet-3.png', 'venus-planet-4.png', 'venus-planet-extra.png', 'Known since ancient times', '12,104 km', 'Approximately 41 million km', 'Approximately 108.2 million km', 'Often called Earth\'s \"sister planet\" due to their similar size and mass, Venus is anything but hospitable. It holds the title for the hottest planet in our Solar System, primarily because of a runaway greenhouse effect. Its incredibly dense atmosphere, primarily composed of about 96.5% Carbon dioxide and 3.5% Nitrogen, traps heat efficiently. This creates scorching surface temperatures hot enough to melt lead, and a crushing atmospheric pressure more than 90 times that of Earth\'s. Its surface is mainly volcanic rock, covered by vast plains formed by ancient lava flows, and internally, it has an iron-nickel core'),
(4, 'Mars', 'Mars', 'The \"Red Planet\" is famous for its distinct reddish hue, caused by iron oxide on its surface. Mars has two small moons and evidence suggesting liquid water existed in the past, making it a prime candidate in the search for extraterrestrial life', 'mars-planet.png', 'mars-planet-2.png', 'mars-planet-3.png', 'mars-planet-4.png', 'mars-planet-extra.jpg', 'Known since ancient times', '6,779 km', 'Approximately 78.3 million km', 'Approximately 227.9 million km', 'Commonly known as the \"Red Planet\" due to the distinctive rust-red hue of its iron oxide-rich soil, Mars has captivated humanity for centuries. It features polar ice caps, volcanoes, canyons, and evidence of ancient riverbeds, suggesting that liquid water once flowed freely on its surface. Mars has two small, irregularly shaped moons, Phobos and Deimos. Extensive missions have been sent to Mars, making it a primary focus for the search for past or present extraterrestrial life. Its very thin atmosphere is mostly Carbon dioxide, and internally, it has an iron, nickel, and sulfur core, along with a silicate mantle and crust. Water ice and dioxide ​ice are also found at its poles and beneath the surface'),
(5, 'Jupiter', 'Jupiter', 'The giant of our Solar System, Jupiter is the largest planet and a gas giant. It\'s notable for its Great Red Spot, a massive storm that has raged for centuries. Jupiter has a faint ring system and numerous moons, including four large and well-known Galilean moons', 'jupiter-planet.png', 'jupiter-planet-2.png', 'jupiter-planet-3.png', 'jupiter-planet-4.png', 'jupiter-planet-extra.jpg', 'Known since ancient times', '139,820 km', 'Approximately 628.7 million km', 'Approximately 778.5 million km', 'Jupiter is the largest planet in the Solar System, so massive that it accounts for more than 2.5 times the combined mass of all other planets. This gas giant is a spectacular sight with its prominent bands of clouds and the iconic \"Great Red Spot,\" a colossal anticyclonic storm that has raged for at least 350 years and is larger than Earth itself. Jupiter also boasts a complex system of rings and a multitude of moons, including the four Galilean moons (Io, Europa, Ganymede, and Callisto), which are worlds in themselves. It\'s primarily composed of about 90% Hydrogen and 10% Helium. Inside, immense pressure turns hydrogen into a liquid metallic form, and it\'s believed to have a small solid core of rock and metals'),
(6, 'Saturn', 'Saturn', 'Best known for its stunning and intricate system of icy rings, Saturn is also a gas giant. Its rings are not solid but made up of countless tiny ice and rock particles. Saturn also has a vast number of moons, with Titan being the second-largest moon in the Solar System', 'saturn-planet.png', 'saturn-planet-2.png', 'saturn-planet-3.png', 'saturn-planet-4.png', 'saturn-planet-extra.jpg', 'Known since ancient times', '116,460 km', 'Approximately 1.28 billion km', 'Approximately 1.43 billion km', 'Saturn is arguably the most recognizable planet, renowned for its stunning and intricate system of rings. These rings are not solid but are made up of billions of small particles, primarily water ice and rocky debris, ranging in size from specks of dust to mountains. As a gas giant, Saturn is predominantly composed of Hydrogen and Helium. It\'s also known for its many moons, including Titan, which has a dense atmosphere and liquid methane lakes, making it one of the most intriguing celestial bodies for astrobiological research. Internally, it has a relatively small but massive solid core of iron, nickel, and rocky materials. This core is surrounded by a layer of highly compressed liquid metallic hydrogen, followed by a layer of liquid hydrogen and helium. The outermost layer is its atmosphere, mainly composed of hydrogen and helium, with traces of methane and ammonia'),
(7, 'Uranus', 'Uranus', 'Another gas giant, Uranus has a distinctive blue color due to methane in its atmosphere. Its most peculiar feature is its nearly horizontal axial tilt, making it appear to \"roll\" along its orbit', 'uranus-planet.png', 'uranus-planet-2.png', 'uranus-planet-3.png', 'uranus-planet-4.png', 'uranus-planet-extra.jpg', ' March 13, 1781 by William Herschel', '50,724 km', 'Approximately 2.72 billion km', ' Approximately 2.88 billion km', 'This distant ice giant stands out due to its extreme axial tilt, causing it to essentially roll on its side as it orbits the Sun. This unique orientation results in peculiar seasons, with each pole experiencing 42 years of continuous sunlight followed by 42 years of darkness. Its distinctive blue-green color comes from the Methane in its atmosphere, which absorbs red light. Uranus has a faint system of rings and a collection of moons with diverse landscapes. Its atmosphere contains Hydrogen, Helium, and Methane. Beneath the atmosphere, Uranus has a thick liquid layer, often called the \"ice\" layer, composed of superheated and super-compressed water, Ammonia, and Methane. At its center, it has a smaller, solid core believed to consist of rock and ice'),
(8, 'Neptune', 'Neptune', 'The farthest and final planet in our Solar System (after Pluto\'s reclassification), Neptune is a deep blue ice giant. It\'s known for having the strongest winds ever recorded in the Solar System and possesses a large moon called Triton, which orbits in a retrograde direction', 'neptune-planet.png', 'neptune-planet-2.png', 'neptune-planet-3.png', 'neptune-planet-4.png', 'neptune-planet-extra.jpg', 'September 23, 1846 by Urbain Le Verrier, John Couch Adams, and Johann Gottfried Galle', '49,244 km', 'Approximately 4.34 billion km', 'Approximately 4.5 billion km', 'Neptune is the farthest planet from the Sun and another enigmatic ice giant. Despite its immense distance, it\'s known for having the strongest sustained winds in the Solar System, often reaching supersonic speeds. Its striking deep blue color, even more intense than Uranus\', is attributed to the Methane in its atmosphere along with Hydrogen and Helium. Neptune has a system of faint rings and 14 known moons, with Triton being the largest and most geologically active, exhibiting cryovolcanism. Neptune\'s internal structure includes a thick liquid layer, also known as the \"ice\" layer, primarily composed of superheated and super-compressed water, Ammonia, and Methane. At its center, it has a smaller, solid core believed to consist of rock and ice');

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

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name_video` varchar(255) NOT NULL,
  `genre` text NOT NULL,
  `source_video` text NOT NULL,
  `description_short` text NOT NULL,
  `channel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name_video`, `genre`, `source_video`, `description_short`, `channel`) VALUES
(1, 'Black Holes: Crash Course Astronomy #33', 'Popular Science, Education, Astronomy', 'https://www.youtube.com/embed/qZWPBKULkdQ?si=3xNauGOySAxxvOQw', 'Time and Light Eaters! Are you ready to discover how they\'re born from the death of colossal stars and what makes them so hauntingly bizarre?', 'CrashCourse'),
(2, 'Origins of the Universe 101 | National Geographic', 'Popular Science, Documentary, Cosmology', 'https://www.youtube.com/embed/HdPzOWlLrbE?si=GjSi8Fk2scgwB0s-', 'How Did the Universe Begin? Join National Geographic to unveil the mysteries of the very first moments of everything, exploring the incredible journey our cosmos has taken!', 'National Geographic'),
(3, 'Black Holes Explained – From Birth to Death', 'Popular Science, Education, Astrophysics', 'https://www.youtube.com/embed/e-P5IFTqB98?si=zXS5HWg_ix1o13A1', 'Black Holes Decoded: From Mysterious Origins to Unbelievable Endings! This video will take you deep inside these cosmic voids, revealing how they work and even how they might \"disappear\" from the universe!', 'Kurzgesagt – In a Nutshell'),
(4, 'The Beginning of Everything -- The Big Bang', 'Popular Science, Education, Cosmology', 'https://www.youtube.com/embed/wNDGgL73ihY?si=Qm5KTxnIRZ4kIcvj', 'The Big Bang: What Happened in the Universe\'s First Second? Don\'t miss this journey back in time to the very origin of everything, where space, time, and matter began our grand story!', 'Kurzgesagt – In a Nutshell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `discovery`
--
ALTER TABLE `discovery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- Indexes for table `observatories`
--
ALTER TABLE `observatories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

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
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `discovery`
--
ALTER TABLE `discovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
