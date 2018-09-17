-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 18 Septembre 2018 à 00:54
-- Version du serveur :  5.7.23-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `YesWeSell`
--

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `members`
--

INSERT INTO `members` (`id`, `name`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `shoes_description`
--

CREATE TABLE `shoes_description` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `shoes_description`
--

INSERT INTO `shoes_description` (`id`, `name`, `description`, `price`) VALUES
(2, 'Chaussures Checkerboard Classic', 'Chaussures basses sans lacets, les Classic Slip-On sont dotées de finitions élastiques sur les côtés et d\'un col rembourré pour plus de confort.', '65'),
(3, 'Chaussures en daim Authentic', 'Chaussures basses à lacets, les Authentic en daim de Vans arborent des coutures classiques et l\'étiquette de la marque. Elles reposent sur une semelle extérieure gaufrée pour une adhérence accrue.', '80'),
(4, 'Chaussures Sk8-Hi MTE', 'Sa semelle vulcanisée crantée offre une adhérence optimale tandis que son bout renforcé résiste à l\'usure. Un col rembourré vient aussi offrir davantage de confort.', '110'),
(5, 'Chaussures AVE Rapidweld Pro Lite', 'Équipée d\'une doublure intérieure Luxliner™ associée à sa construction Pro Vulc Lite, l\'AV Rapidweld Pro allie légèreté, sensibilité et durabilité.', '110');

-- --------------------------------------------------------

--
-- Structure de la table `shoes_image`
--

CREATE TABLE `shoes_image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_shoes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `shoes_image`
--

INSERT INTO `shoes_image` (`id`, `name`, `id_shoes`) VALUES
(1, 'img/1537184981basket1_blanc.png', 2),
(2, 'img/1537185028basket2_bleu.png', 3),
(3, 'img/1537185060basket3_beige.png', 4),
(4, 'img/1537185094basket4_blanc.png', 5);

-- --------------------------------------------------------

--
-- Structure de la table `shoes_size`
--

CREATE TABLE `shoes_size` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `id_shoes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `shoes_size`
--

INSERT INTO `shoes_size` (`id`, `size`, `id_shoes`) VALUES
(1, 39, 2),
(2, 40, 2),
(3, 41, 2),
(4, 42, 2),
(5, 43, 2),
(6, 44, 2),
(7, 39, 3),
(8, 40, 3),
(9, 41, 3),
(10, 42, 3),
(11, 43, 3),
(12, 44, 3),
(13, 39, 4),
(14, 40, 4),
(15, 41, 4),
(16, 42, 4),
(17, 43, 4),
(18, 44, 4),
(19, 39, 5),
(20, 40, 5),
(21, 41, 5),
(22, 42, 5),
(23, 43, 5),
(24, 44, 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shoes_description`
--
ALTER TABLE `shoes_description`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shoes_image`
--
ALTER TABLE `shoes_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shoes` (`id_shoes`);

--
-- Index pour la table `shoes_size`
--
ALTER TABLE `shoes_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_shoes` (`id_shoes`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `shoes_description`
--
ALTER TABLE `shoes_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `shoes_image`
--
ALTER TABLE `shoes_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `shoes_size`
--
ALTER TABLE `shoes_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `shoes_image`
--
ALTER TABLE `shoes_image`
  ADD CONSTRAINT `shoes_image_ibfk_1` FOREIGN KEY (`id_shoes`) REFERENCES `shoes_description` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `shoes_size`
--
ALTER TABLE `shoes_size`
  ADD CONSTRAINT `shoes_size_ibfk_1` FOREIGN KEY (`id_shoes`) REFERENCES `shoes_description` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
