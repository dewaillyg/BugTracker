-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 mai 2023 à 11:23
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bugtracker`
--

-- --------------------------------------------------------

--
-- Structure de la table `bugtracker_members`
--

CREATE TABLE `bugtracker_members` (
  `id_members` int(6) UNSIGNED NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0 : admin\r\n1 : dev\r\n2 : tester'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bugtracker_members`
--

INSERT INTO `bugtracker_members` (`id_members`, `password`, `login`, `role`) VALUES
(1, '7c3cd9cfab5731174df865d7a337c9cdbc8313d2', 'admin', 0),
(2, '78b6678beeafa29ac108c584641ecdcfbb0b7eb6', 'john', 1),
(3, '03b8688d235e41a5654db7acd594eaf8531d60bc', 'douglas', 2),
(4, '484d1076bc7c69df8a91a25b63b2d824aab7be74', 'eren', 2),
(5, 'b3ae4f722a30578fac0191593f82a69346a877d0', 'laetitia', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bugtracker_members`
--
ALTER TABLE `bugtracker_members`
  ADD PRIMARY KEY (`id_members`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bugtracker_members`
--
ALTER TABLE `bugtracker_members`
  MODIFY `id_members` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
