-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2020 at 06:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaireVrai`
--

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `courriel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_commander` date NOT NULL,
  `quantite` int(11) NOT NULL,
  `coupon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specification` text COLLATE utf8_unicode_ci NOT NULL,
  `urgent` tinyint(1) NOT NULL DEFAULT '0',
  `efface` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_produit`, `courriel`, `date_commander`, `quantite`, `coupon`, `specification`, `urgent`, `efface`) VALUES
(6, 6, 'a@b.c', '2020-06-03', 1, 'd6dnun6b79n', 'Du couleur bleu', 0, 0),
(10, 6, 'hey@b.ca', '2020-06-08', 6, 'jd8j9djs8h', '500 gb max', 0, 0),
(11, 6, 'ashwinsiva13@gmail.com', '2020-06-08', 5, 'letgocoupon', 'yup', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `noms` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_sortie` date NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `en_stock` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id_produit`, `noms`, `id_client`, `date_sortie`, `description`, `type`, `prix`, `en_stock`) VALUES
(6, 'IPHONE', 3, '2020-06-09', 'telephone de haute qualité', 'Premium', 20, 'oui');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Non recherché'),
(2, 'Marchandise'),
(3, 'Préférence client'),
(4, 'Commodité'),
(5, 'Niche'),
(6, 'Complémentaire'),
(7, 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `courriel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `identifiant`, `courriel`, `mot_de_passe`, `adresse`, `telephone`) VALUES
(3, 'Admin', 'Admin', 'admin@gmail.com', 'admin', '44 rue adminien', 5148369883),
(4, 'ashwin', 'ashwin', 'dhsajhgsa', 'ashwin', 'sdasaddasd', 21321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `commandes_ibfk_1` (`id_produit`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `produits_ibfk_1` (`id_client`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
