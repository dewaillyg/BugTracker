-- Adminer 4.8.1 MySQL 5.5.5-10.6.12-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `sae203_members`;
CREATE TABLE `sae203_members` (
  `id_members` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0 : admin\r\n1 : dev\r\n2 : tester',
  `id_dev` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_members`),
  KEY `id_dev` (`id_dev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sae203_members` (`id_members`, `password`, `login`, `role`, `id_dev`) VALUES
(1,	'7c3cd9cfab5731174df865d7a337c9cdbc8313d2',	'admin',	0,	0),
(2,	'78b6678beeafa29ac108c584641ecdcfbb0b7eb6',	'john',	1,	1),
(3,	'03b8688d235e41a5654db7acd594eaf8531d60bc',	'douglas',	2,	0),
(4,	'484d1076bc7c69df8a91a25b63b2d824aab7be74',	'eren',	2,	0),
(5,	'b3ae4f722a30578fac0191593f82a69346a877d0',	'laetitia',	1,	2);

DROP TABLE IF EXISTS `sae203_tickets`;
CREATE TABLE `sae203_tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `id_dev` int(6) unsigned NOT NULL,
  `severity` tinyint(4) NOT NULL,
  `description` varchar(512) NOT NULL,
  `user` varchar(50) NOT NULL,
  `status` int(10) unsigned NOT NULL COMMENT '0 : en attente1 : confirmé 2 : en cours de traitement3 : terminé',
  `dateMAJ` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_dev` (`id_dev`) USING BTREE,
  CONSTRAINT `sae203_tickets_ibfk_1` FOREIGN KEY (`id_dev`) REFERENCES `sae203_members` (`id_dev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sae203_tickets` (`id`, `title`, `tag`, `date`, `id_dev`, `severity`, `description`, `user`, `status`, `dateMAJ`) VALUES
(4,	'Bug d\'affichage',	'graphique',	'2023-05-28 17:27:21',	2,	1,	'Nouveau bug d\'affichage suite à la nouvelle MAJ logiciel.',	'eren',	0,	'2023-06-08 13:27:52'),
(5,	'Bug d\'affichage',	'graphique',	'2023-05-28 17:39:52',	1,	3,	'Nouveau bug d\'affichage suite à la nouvelle MAJ logiciel.',	'eren',	0,	'0000-00-00 00:00:00'),
(6,	'Communication Interne',	'reseau',	'2023-05-28 17:43:02',	1,	1,	'Problème de connexion en interne entre les périphérique de la salle 4.',	'eren',	1,	'2023-06-08 13:30:30'),
(7,	'Bug Logiciel',	'developpement',	'2023-05-28 18:27:48',	2,	3,	'Un bug au niveau du logiciel.',	'eren',	1,	'2023-06-08 14:37:05'),
(8,	'Son',	'developpement',	'2023-05-28 18:28:12',	0,	2,	'Problème de son.',	'eren',	1,	'0000-00-00 00:00:00'),
(9,	'Bug logiciel',	'developpement',	'2023-05-29 12:33:01',	0,	5,	'Un bug au niveau du nouveau logiciel.',	'eren',	1,	'0000-00-00 00:00:00'),
(10,	'Architecture',	'developpement',	'2023-05-29 12:58:15',	1,	2,	'Problème suite à la nouvelle architecture mise en place.',	'douglas',	0,	'2023-06-08 13:29:52'),
(11,	'Bug de couleur',	'graphique',	'2023-05-29 13:01:21',	1,	5,	'Problème de contraste au niveau de la fenêtre modale.',	'eren',	2,	'2023-06-08 13:30:14'),
(12,	'Connexion BDD',	'developpement',	'2023-06-03 14:00:12',	0,	3,	'Bug de connexion à la base de données en travaillant localement.',	'eren',	0,	'0000-00-00 00:00:00'),
(13,	'bug',	'reseau',	'2023-06-06 14:42:32',	0,	4,	'noueau bug après maj',	'eren',	0,	'0000-00-00 00:00:00'),
(14,	'aujourd\'hui',	'developpement',	'2023-06-06 14:43:10',	2,	3,	'gageagea',	'eren',	2,	'2023-06-08 13:29:57'),
(15,	'fafa',	'developpement',	'2023-06-06 15:24:43',	0,	0,	'fafa',	'eren',	0,	'0000-00-00 00:00:00'),
(16,	'geargaehaerhahea',	'graphique',	'2023-06-06 15:25:00',	0,	4,	'hae',	'eren',	0,	'0000-00-00 00:00:00'),
(17,	'bug réso 2023',	'developpement',	'2023-06-06 15:28:16',	0,	1,	'nouveau bug réso 2023\r\n',	'eren',	0,	'0000-00-00 00:00:00'),
(18,	'fafaf',	'developpement',	'2023-06-06 15:40:05',	1,	0,	'fafafa',	'eren',	2,	'2023-06-08 13:30:23'),
(19,	'blopblop',	'developpement',	'2023-06-06 15:40:40',	1,	5,	'bbb',	'eren',	3,	'2023-06-08 13:30:19'),
(20,	'Bug MAJ date',	'developpement',	'2023-06-08 12:07:49',	2,	3,	'Problème de mise à jour pour la date de résolution.',	'eren',	3,	'2023-06-08 13:30:00'),
(21,	'Bug lien a',	'developpement',	'2023-06-08 12:24:20',	1,	2,	'Bug avec le lien a.',	'eren',	3,	'2023-06-08 13:30:12'),
(22,	'Bug $_GET',	'developpement',	'2023-06-08 12:28:42',	1,	4,	'Nouveau bug, transmission variable.',	'eren',	3,	'0000-00-00 00:00:00'),
(23,	'fzfz',	'developpement',	'2023-06-08 15:03:39',	0,	0,	'fzfzf',	'eren',	0,	'0000-00-00 00:00:00'),
(24,	'bug dateMAJ',	'developpement',	'2023-06-08 15:04:26',	1,	1,	'SOucis à propos de la mise à jour de la date.',	'eren',	2,	'2023-06-08 15:07:30'),
(25,	'bqbqd',	'developpement',	'2023-06-08 15:07:55',	0,	0,	'bqfbqd',	'eren',	0,	'0000-00-00 00:00:00');

-- 2023-06-08 13:10:21
