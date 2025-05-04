-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 avr. 2025 à 00:11
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sportifydb2`
--

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `id_reclamation` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `answer`
--

INSERT INTO `answer` (`id`, `id_reclamation`, `id_admin`, `message`) VALUES
(1, 5, 69, 'rep1'),
(2, 5, 70, 'rep2'),
(3, 5, 69, 'des1'),
(4, 5, 69, 'des2'),
(6, 6, 69, 'zeze'),
(7, 6, 69, 'sss');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20250407112454', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entretient`
--

CREATE TABLE `entretient` (
  `id` int(11) NOT NULL,
  `id_rec_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `resultat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `event_date` datetime NOT NULL,
  `id_organizer` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `id_TeamA` int(11) NOT NULL,
  `id_TeamB` int(11) NOT NULL,
  `score_TeamA` int(11) NOT NULL,
  `score_TeamB` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `match_Time` datetime NOT NULL,
  `location_Match` varchar(255) NOT NULL,
  `id_tournoi` int(11) NOT NULL,
  `teamAName` varchar(255) DEFAULT NULL,
  `teamBName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matches`
--

INSERT INTO `matches` (`id`, `id_TeamA`, `id_TeamB`, `score_TeamA`, `score_TeamB`, `status`, `match_Time`, `location_Match`, `id_tournoi`, `teamAName`, `teamBName`) VALUES
(36, 75, 76, 0, 0, '', '2025-04-05 21:00:00', '', 9, 'Barcelona', 'Betis'),
(37, 77, 78, 0, 0, '', '2025-04-05 16:15:00', '', 9, 'Real Madrid', 'Valencia'),
(38, 79, 80, 0, 0, '', '2025-04-05 18:30:00', '', 9, 'Mallorca', 'Celta Vigo'),
(39, 81, 82, 0, 0, 'Finished', '2025-04-05 14:00:00', '', 9, 'Girona', 'Alaves'),
(40, 83, 84, 0, 0, '', '2025-04-06 14:00:00', 'Estadio de Gran Canaria', 9, 'Las Palmas', 'Real Sociedad'),
(41, 85, 86, 0, 0, '', '2025-04-06 21:00:00', 'Estadio de la Cerámica', 9, 'Villarreal', 'Ath Bilbao'),
(42, 87, 88, 0, 0, '', '2025-04-06 16:15:00', 'Estadio Ramón Sánchez Pizjuán', 9, 'Sevilla', 'Atl. Madrid'),
(43, 89, 90, 0, 0, '', '2025-04-06 18:30:00', 'Estadio Municipal José Zorrilla', 9, 'Valladolid', 'Getafe'),
(44, 91, 92, 0, 0, '', '2025-04-07 21:00:00', 'Estadio Municipal de Butarque', 9, 'Leganes', 'Osasuna'),
(45, 78, 87, 0, 0, '', '2025-04-11 21:00:00', 'Estadio de Mestalla', 9, 'Valencia', 'Sevilla'),
(46, 90, 83, 0, 0, '', '2025-04-12 16:15:00', 'Estadio Coliseum', 9, 'Getafe', 'Las Palmas'),
(47, 91, 75, 0, 0, '', '2025-04-12 21:00:00', 'Estadio Municipal de Butarque', 9, 'Leganes', 'Barcelona'),
(48, 84, 79, 0, 0, '', '2025-04-12 14:00:00', 'Reale Arena', 9, 'Real Sociedad', 'Mallorca'),
(49, 80, 93, 0, 0, '', '2025-04-12 18:30:00', 'Estadio Abanca-Balaídos', 9, 'Celta Vigo', 'Espanyol');

-- --------------------------------------------------------

--
-- Structure de la table `order_`
--

CREATE TABLE `order_` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity_order` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_panier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT 0.00,
  `status` varchar(33) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `priceproduct` decimal(10,0) NOT NULL,
  `stock` varchar(50) DEFAULT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `id_Team` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 1,
  `id_tournoi` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `draws` int(11) NOT NULL,
  `losses` int(11) NOT NULL,
  `goals_scored` int(11) NOT NULL,
  `goals_conceded` int(11) NOT NULL,
  `goal_difference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Nouveau'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `id_player`, `message`, `created_at`, `status`) VALUES
(2, 67, 'tttt', '2025-04-16 23:06:46', 'Résolu'),
(3, 69, 'test2', '2025-04-16 23:18:30', 'Nouveau'),
(4, 69, 'test2', '2025-04-16 23:18:48', 'Nouveau'),
(5, 69, 'aaa', '2025-04-16 23:44:15', 'Nouveau'),
(6, 69, 'abc', '2025-04-17 00:25:39', 'Nouveau'),
(7, 85, 'azyefagvcshqgv', '2025-04-23 19:34:29', 'Nouveau'),
(8, 85, 'vbhjhhihi', '2025-04-23 20:01:27', 'Nouveau');

-- --------------------------------------------------------

--
-- Structure de la table `recrutement`
--

CREATE TABLE `recrutement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `modeJeu` varchar(20) NOT NULL,
  `nombreJoueurs` int(11) NOT NULL,
  `logoPath` varchar(255) DEFAULT NULL,
  `idtournoi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE `tournoi` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `sportType` varchar(30) DEFAULT NULL,
  `format` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `nbEquipe` int(11) NOT NULL,
  `tournoiLocation` varchar(30) DEFAULT NULL,
  `id_organizer` int(11) NOT NULL,
  `reglements` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tournoi`
--

INSERT INTO `tournoi` (`id`, `nom`, `sportType`, `format`, `status`, `start_date`, `end_date`, `nbEquipe`, `tournoiLocation`, `id_organizer`, `reglements`) VALUES
(9, 'La Liga', NULL, NULL, NULL, '2025-04-05', '2025-04-12', 0, NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(30) NOT NULL,
  `profilepicture` varchar(255) DEFAULT NULL,
  `createdat` date NOT NULL,
  `updatedat` date NOT NULL,
  `id_team` int(11) DEFAULT NULL,
  `phonenumber` varchar(8) DEFAULT NULL,
  `dateofbirth` date NOT NULL DEFAULT '1970-01-01',
  `is_active` tinyint(1) DEFAULT NULL,
  `coachinglicense` varchar(15) DEFAULT NULL,
  `reset_code` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `reset_code_expiry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Favourite` tinyint(1) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `profilepicture`, `createdat`, `updatedat`, `id_team`, `phonenumber`, `dateofbirth`, `is_active`, `coachinglicense`, `reset_code`, `reset_code_expiry`, `Favourite`, `Rating`, `position`) VALUES
(67, 'aaaaaaaab', 'aaaaaaaaaaaa', 'aaaaaaaaaa@gmail.com', '$2y$13$9Thsaysu08z/mAmX7NMDge3MeG1H5g3cjKtbTmKEnU6UGqB.llaIq', 'Admin', '01557381-3379-459b-82d8-fd6532cc10d7-removalai-preview-67feb8fb8b726.png', '2025-04-16', '2025-04-16', NULL, '21322075', '2003-02-11', 1, NULL, 'c535cffbd8135f0de68324382486cf6f', '2025-04-16 16:00:31', NULL, NULL, NULL),
(69, 'aaaa', 'eeee', 'ggggg@gmail.com', '$2y$13$TnhNytbSbvsb79eOsKr5jeHseSMv80G58G254JxKey5fdcxOmI/hK', 'player', '7d1670c2303575f141a1feb7942e9aeb.jpg', '2025-04-16', '2025-04-16', NULL, NULL, '2025-04-16', 1, NULL, '', '2025-04-16 15:38:39', 0, NULL, NULL),
(70, 'zouhair', 'thawedi', 'thawedi@gmail.com', '$2y$13$xoFOcSeEOHZUN.X5w3smju/dQ.V.Pd.rIea0Ph/YFUj3qrjGj1e/K', 'player', 'linkedin-67ff727e9fe19.png', '2025-04-17', '2025-04-16', NULL, NULL, '2002-12-11', 1, NULL, '1bd996bf81066cf300dac21bbfe0aba5', '2025-04-16 16:00:47', NULL, NULL, NULL),
(71, 'firasaaaa', 'bensaleh', 'salehbensaleh11@gmail.com', '$2y$13$8cm6OFqES1XirTWookJXrOt4eHAJ28xSH0LwPJY21w3R09BvUCv.G', 'player', 'b08da041f86c2ece608bbc9dd526c265.png', '2025-04-16', '2025-04-16', NULL, NULL, '2001-01-16', 1, NULL, '', '2025-04-16 15:38:50', 0, NULL, NULL),
(72, 'azouz', 'azouz', 'azouz@gmail.com', '$2y$13$CMKghdjFWuX6tzGnJsXrK.9be/sWuiBHfqAmfoq7EqUakZQgmXG72', 'Admin', '481453895-657012706992349-3739269442232092880-n-67ff850cf1109.jpg', '2025-04-17', '2025-04-17', NULL, '21524521', '2003-12-11', 1, NULL, '686ce6092391b183dc43bafc52063224', '2025-04-16 16:00:37', NULL, NULL, NULL),
(73, 'jery', 'wizin', 'wizin.jery@gmail.com', '$2y$13$cuEotKhJXZmYSUYeFAKd4.I1W3v32fmBe7uE6yXjyW9BNV1ULSswe', 'Admin', '3a1246da-7749-4773-9a16-4e8c78282a9d-removalai-preview-67ff9a6a2a146.png', '2025-04-17', '2025-04-16', NULL, '25452542', '2003-02-11', 1, NULL, 'e21100d0acf20ba735678f0c892f976f', '2025-04-16 17:30:00', NULL, NULL, NULL),
(74, 'azer', 'azer', 'azeazeaze@player.com', '$2y$13$FCsngm9cSvcLujpB38Wyr.zsnWpuFzBoW8s2TOqZh6qZr19T388Rm', 'player', '420fc1d66f148aca1b15b3ab62bf32d0.png', '2025-04-16', '2025-04-16', NULL, NULL, '2025-04-16', 1, NULL, '', '2025-04-16 16:43:01', 0, NULL, NULL),
(75, 'azert', 'treza', 'azert@gmail.cooom', '$2y$13$QWf7cXPhOLmOLeHiv1IdpeeprSSrQZK9mT.CjykICK1fdIfYHpclW', 'organizer', '63d5a6e8a03cfade8b4f1c92522b3685.png', '2025-04-16', '2025-04-16', NULL, NULL, '2000-12-31', 1, 'wesh', '', '2025-04-16 16:53:41', 0, NULL, NULL),
(76, 'jeryyyyyjklmaaaaaaa', 'saleh', 'aaaaaaaa@gmail.com', '$2y$13$29ZwwvkIg55qGOa5n1NxougMqQ4ygr4x5u9gCAx2CnJ5uZ8zoxGQC', 'Admin', '2da139cf82ee1b2719033465a24dcf64.jpg', '2025-04-17', '2025-04-16', NULL, '25452542', '2003-12-11', 1, NULL, 'ffc43e00ea4518320b3662b42cf52c93', '2025-04-16 17:16:51', NULL, NULL, NULL),
(77, 'azertyuio', 'azertyui', 'azertyuiop@gmail.com', '$2y$13$FWHv89aKNwpUtjvB3FN.WexSmvLODwqnqO1a.h9uzNacxo5jdQXaC', 'Admin', 'c7df769e74d6c2312c594381016248d9.png', '2025-04-17', '2025-04-17', NULL, '12345678', '1998-01-12', 1, NULL, '8f26e8dbca1775e4e48b84baa7a14172', '2025-04-17 18:18:08', NULL, NULL, NULL),
(78, 'azertyu', 'azertyu', 'azrety@gmail.cooom', '$2y$13$0KArj3LouBajNw9QpolJj.2MeeW56W4L.yMVe9haJuIn0IxD5HJOm', 'Admin', NULL, '2025-04-17', '2025-04-17', NULL, NULL, '2001-07-12', 1, NULL, 'f8dd31bf72f5a7e4a83300cca89428c0', '2025-04-17 18:25:30', NULL, NULL, NULL),
(79, 'azeraaaaaaaa', 'azert', 'firas.eljary@esprit.tnn', NULL, 'Admin', NULL, '2025-04-17', '2025-04-16', NULL, NULL, '2001-04-08', 1, NULL, '5e064f8d69d3fde86972acf1aa7453cb', '2025-04-16 17:29:32', NULL, NULL, NULL),
(80, 'wezna', 'wizin', 'adminaa@gmail.com', '$2y$13$K4Y4qxLREWWLIEifIOsxDeFk6b8rKU.DMJYB3lak7LBH.3ET0DSVS', 'Admin', NULL, '2025-04-17', '2025-04-16', NULL, '34345434', '2003-12-11', 1, NULL, 'a0dcdc0ca1897c01a7e6ed004812bd3b', '2025-04-16 18:31:36', NULL, NULL, NULL),
(81, 'jery*', 'mohamedamein', 'ahmedjj@gmail.com', '$2y$13$FIJglIhLZCbAMlLXKOm6re8HlVSeBoi1tCm2R/IVdcofdDO1RlfXG', 'player', '97da854688db7b62406096eb49bde401.png', '2025-04-16', '2025-04-16', NULL, NULL, '2000-12-11', 1, NULL, '', '2025-04-16 19:33:28', 0, NULL, NULL),
(82, 'aaaaaaa', 'aaaaaaaaaaa', 'jery.wizin@gmil.com', '$2y$13$QwReXFyZs3F8RKmUZWGlwe3Iu4rl8ZARzBUWZdfHksae7PZ5U.hz2', 'Admin', 'd0416947c4cc06878cf460690bf8e068.png', '2025-04-17', '2025-04-17', NULL, '25523254', '2000-12-11', 1, NULL, '6d2acc8d0bb52bff8f7168bbcda8afc5', '2025-04-17 20:08:27', NULL, NULL, NULL),
(84, 'gggggaa', 'gggggg', 'gggggg@gmail.com', '$2y$13$HBRU5wFBXR.fYPw2hlb1weUOUt.1Gl2NT3fK9bKYHBlrx1KjLf6nO', 'organizer', '07d879d59b8d9431a9b86789a6b14a99.png', '2025-04-16', '2025-04-16', NULL, '53005612', '2000-02-05', 1, '15478545245', '', '2025-04-16 21:22:20', 0, NULL, NULL),
(85, 'rayen', 'sabri', 'stoustou419@gmail.com', '$2y$13$1zxq2QnpfJNSZxQQYHBh5.7ldGU0qx8mzGTzOlG8RhjJSW.DHTgRS', 'Admin', '6e8879fcfb1f57cd216958ec21e4f571.jpg', '2025-04-23', '2025-04-23', NULL, NULL, '2000-04-14', 1, '123424', '', '2025-04-23 21:31:51', 0, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reclamation` (`id_reclamation`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `entretient`
--
ALTER TABLE `entretient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E34739B4305E0476` (`id_rec_id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organizer` (`id_organizer`);

--
-- Index pour la table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_TeamA` (`id_TeamA`),
  ADD KEY `id_TeamB` (`id_TeamB`),
  ADD KEY `id_tournoi` (`id_tournoi`);

--
-- Index pour la table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_order_product` (`id_product`),
  ADD KEY `fk_order_panier` (`id_panier`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_panier_client` (`client_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Team` (`id_Team`),
  ADD KEY `id_tournoi` (`id_tournoi`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_player` (`id_player`);

--
-- Index pour la table `recrutement`
--
ALTER TABLE `recrutement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_player` (`id_player`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_team_tournoi` (`idtournoi`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organizer` (`id_organizer`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_team` (`id_team`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `entretient`
--
ALTER TABLE `entretient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `order_`
--
ALTER TABLE `order_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `recrutement`
--
ALTER TABLE `recrutement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entretient`
--
ALTER TABLE `entretient`
  ADD CONSTRAINT `FK_E34739B4305E0476` FOREIGN KEY (`id_rec_id`) REFERENCES `recrutement` (`id`);

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_organizer`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_`
--
ALTER TABLE `order_`
  ADD CONSTRAINT `fk_order_panier` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id`),
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order__ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
