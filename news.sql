-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 08:12 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `picture` varchar(255) NOT NULL,
  `archive` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`, `picture`, `archive`) VALUES
(1, 'Obavijest posjetiteljima Parka prirode Medvednica', 'Zadnjih nekoliko dana zabilježeni su napadi stršljena na podrucju Parka prirode Medvednica.\r\n\r\nStršljeni, iako nisu u Hrvatskoj zašti?eni imaju važnu ulogu u šumskom ekosustavu. Uz šišmiše zna?ajno doprinose prirodnom uništavanju kukaca – štetnika i tako doprinose održavanju prirodne ravnoteže. Stršljen (prije svega Vespa crabro) može se vrlo dobro braniti, prije svega ako brani leglo.\r\n\r\nOtrov stršljena je manje toksi?an od otrova osa, ali je sam ubod stršljena bolniji nego ubod manje ose jer imaju deblji i duži žalac, pa prodire u dublje u osjetljivije slojeve kože, dok otrov sadrži supstancu koja izaziva osje?aj pe?enja što rezultira osje?ajem ve?e boli. Iako ubod stršljena nije smrtonosan, alergi?ari su posebno ranjiva skupina koja treba biti na oprezu.\r\n\r\nU susretu sa stršljenom nije nikako preporu?ljivo lamatati rukama i bježati. Time ga razdražujemo, a onda je stršljen najopasniji. Treba biti miran i sabran i ?ekati da ode.\r\n\r\nIzvor: pp-medvednica.hr', '2025-01-12 19:08:16', '1-93.jpg', 'N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
