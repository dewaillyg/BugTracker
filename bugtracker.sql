-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 04 juin 2023 à 20:41
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

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
-- Structure de la table `sae203_members`
--

CREATE TABLE `sae203_members` (
  `id_members` int(6) UNSIGNED NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0 : admin\r\n1 : dev\r\n2 : tester',
  `id_dev` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sae203_members`
--

INSERT INTO `sae203_members` (`id_members`, `password`, `login`, `role`, `id_dev`) VALUES
(1, '7c3cd9cfab5731174df865d7a337c9cdbc8313d2', 'admin', 0, 0),
(2, '78b6678beeafa29ac108c584641ecdcfbb0b7eb6', 'john', 1, 1),
(3, '03b8688d235e41a5654db7acd594eaf8531d60bc', 'douglas', 2, 0),
(4, '484d1076bc7c69df8a91a25b63b2d824aab7be74', 'eren', 2, 0),
(5, 'b3ae4f722a30578fac0191593f82a69346a877d0', 'laetitia', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `sae203_tickets`
--

CREATE TABLE `sae203_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `id_dev` int(6) UNSIGNED NOT NULL,
  `severity` tinyint(4) NOT NULL,
  `description` varchar(512) NOT NULL,
  `user` varchar(50) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL COMMENT '0 : en attente\r\n1 : confirmé \r\n2 : en cours de traitement\r\n3 : terminé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sae203_tickets`
--

INSERT INTO `sae203_tickets` (`id`, `title`, `tag`, `date`, `id_dev`, `severity`, `description`, `user`, `status`) VALUES
(4, 'Bug d\'affichage', 'graphique', '2023-05-28 17:27:21', 2, 1, 'Nouveau bug d\'affichage suite à la nouvelle MAJ logiciel.', 'eren', 0),
(5, 'Bug d\'affichage', 'graphique', '2023-05-28 17:39:52', 0, 3, 'Nouveau bug d\'affichage suite à la nouvelle MAJ logiciel.', 'eren', 0),
(6, 'Communication Interne', 'reseau', '2023-05-28 17:43:02', 0, 1, 'Problème de connexion en interne entre les périphérique de la salle 4.', 'eren', 3),
(7, 'Bug Logiciel', 'developpement', '2023-05-28 18:27:48', 0, 5, 'Un bug au niveau du logiciel.', 'eren', 0),
(8, 'Son', 'developpement', '2023-05-28 18:28:12', 0, 2, 'Problème de son.', 'eren', 1),
(9, 'Bug logiciel', 'developpement', '2023-05-29 12:33:01', 0, 5, 'Un bug au niveau du nouveau logiciel.', 'eren', 1),
(10, 'Architecture', 'developpement', '2023-05-29 12:58:15', 2, 2, 'Problème suite à la nouvelle architecture mise en place.', 'douglas', 1),
(11, 'Bug de couleur', 'graphique', '2023-05-29 13:01:21', 1, 5, 'Problème de contraste au niveau de la fenêtre modale.', 'eren', 0),
(12, 'Connexion BDD', 'developpement', '2023-06-03 14:00:12', 0, 3, 'Bug de connexion à la base de données en travaillant localement.', 'eren', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sae203_members`
--
ALTER TABLE `sae203_members`
  ADD PRIMARY KEY (`id_members`),
  ADD KEY `id_dev` (`id_dev`);

--
-- Index pour la table `sae203_tickets`
--
ALTER TABLE `sae203_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dev` (`id_dev`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sae203_members`
--
ALTER TABLE `sae203_members`
  MODIFY `id_members` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sae203_tickets`
--
ALTER TABLE `sae203_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `sae203_tickets`
--
ALTER TABLE `sae203_tickets`
  ADD CONSTRAINT `sae203_tickets_ibfk_1` FOREIGN KEY (`id_dev`) REFERENCES `sae203_members` (`id_dev`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
