-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : ventouxiwephare.mysql.db
-- Généré le : jeu. 21 oct. 2021 à 10:34
-- Version du serveur : 5.6.50-log
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ventouxiwephare`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `author` varchar(191) DEFAULT NULL,
  `valid` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `post_id`, `author`, `valid`, `created_at`) VALUES
(38, 'Ceci est un commentaire', 0, 'test@test.fr', 0, '2021-10-05 10:37:09'),
(37, 'Ceci est un commentaire de test', 0, 'test@test.fr', 0, '2021-10-05 10:35:02'),
(36, 'test', 0, 'test@test.fr', 0, '2021-10-05 10:34:43'),
(35, 'bibi', 30, 'test@test.fr', 1, '2021-10-04 16:16:47'),
(10, 'Ceci est un commentaire de test', 30, 'test@test.fr', 1, '2021-09-02 14:27:15'),
(11, 'Ceci est un commentaire de test', 24, 'test@test.fr', 1, '2021-09-02 14:30:14'),
(12, 'Ceci est un commentaire', 24, 'test@test.fr', 1, '2021-09-02 14:30:26'),
(15, 'Ceci est un commentaire de test', 24, 'test@test.fr', 1, '2021-09-02 14:33:12'),
(16, 'Ceci est un commentaire', 24, 'test@test.fr', 1, '2021-09-02 14:33:28'),
(17, 'Ceci est un commentaire', 24, 'test@test.fr', 1, '2021-09-02 14:33:54'),
(18, 'Ceci est un commentaire de test', 2, 'test@test.fr', 1, '2021-09-02 14:51:33'),
(19, 'Ceci est un commentaire', 30, 'test@test.fr', 1, '2021-09-02 14:59:20'),
(20, 'C\'était un essai?', 26, 'test@test.fr', 1, '2021-09-02 15:31:40'),
(23, 'Ceci est un commentaire de test', 27, 'test@test.fr', 0, '2021-09-24 12:11:56'),
(24, 'test', 27, 'test@test.fr', 1, '2021-09-24 12:12:07'),
(27, 'Salut je viens discuter ', 35, 'test@test.fr', 1, '2021-10-04 14:56:15'),
(28, 'Hello', 35, 'test@test.fr', 0, '2021-10-04 14:57:10'),
(29, 'test', 35, 'test@test.fr', 0, '2021-10-04 15:00:38'),
(41, 'Je voulais savoir comment on peut ajouter un commentaire', 42, 'test@test.fr', 1, '2021-10-14 12:42:04'),
(32, 'Test', 35, 'test@test.fr', 0, '2021-10-04 15:02:35'),
(33, 'Ceci est un commentaire de test', 35, 'test@test.fr', 0, '2021-10-04 15:02:54'),
(34, 'Ceci est un commentaire de test', 35, 'test@test.fr', 1, '2021-10-04 15:03:07'),
(39, 'Ceci est un commentaire de test', 37, 'test@test.fr', 1, '2021-10-05 10:44:49'),
(40, 'Ceci est un commentaire de test', 30, 'test@test.fr', 1, '2021-10-07 13:06:45');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `log` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'test', 'test', 'test', 'test', NULL),
(2, 'test', ' test@gmail.com', 'Demande', 'Bonjour', NULL),
(27, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'rrr', NULL),
(28, 'Cyril Guittet', 'cyril@glanum.com', 'Message', 'Ceci est un message', NULL),
(29, 'Cyril Guittet', 'cyril@glanum.com', 'Message', 'Ceci est un message', NULL),
(30, 'Cyril Guittet', 'cyril@glanum.com', 'Message', 'Ceci est un message', NULL),
(31, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(32, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(33, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(34, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(35, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(37, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(38, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(39, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(41, 'Cyril Guittet', 'cyrilg8686@gmail.com', 'testSoma', 'ENVOI DE MAIL', NULL),
(42, 'Cyril Guittet', 'cyril@glanum.com', 'test', 'test', NULL),
(43, 'Cyril Guittet', 'cyril@glanum.com', 'réu', 'on est pret à le faire', NULL),
(65, 'Pierre Barbin', 'admin@glanum.com', 'eee', 'ttt', '2021-10-07 12:41:25');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon` text NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `id_statut` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `icon`, `content`, `photo`, `author`, `post_date`, `id_statut`, `id_user`) VALUES
(35, 'Programmation orientée objet', '', 'POO Venez discuter sur le sujet', 'ObjectOrientedProgramming-horizontal.jpg', 'Flaski', '2021-09-23 11:04:19', 1, 1),
(43, 'Téléchagement illégal', '', 'illégal', 'téléchargement.png', 'Flaski', '2021-10-14 12:44:46', 1, 1),
(30, 'News laravel 9', 'fab fa 500-px', 'Venez découvrir les nouveautés', 'téléchargement.png', 'Pierre', '2021-08-18 15:47:37', 1, 1),
(24, 'PHP', 'a', 'Le post porte sur PHP, venez discuter en direct sur les avancées de la technologie.', 'php.png', 'Flaski', '2021-08-17 17:00:33', 1, 1),
(25, 'Le développement Web', 'a', 'Le développement back end est une fonction très prisée dans l\'informatique . Du développement web au pur back end jusqu\'aux API et appels aux microservices, le développeur back end a quelques casquettes qu\'il doit maitriser.', 'back.jpg', 'Cyril', '2021-08-18 10:44:37', 1, 1),
(26, 'Javascript Party', 'try', 'https://changelog.com/jsparty', 'téléchargement (2).png', 'Flaski', '2021-08-18 11:16:37', 1, 1),
(27, 'Hacking - cyber sécurité', 'bbb', 'https://hellofuture.orange.com/fr/grand-format/la-cybersecurite-construire-une-societe-numerique-de-confiance/', 'cybersécurité.jpg', 'anonymous', '2021-08-18 14:20:07', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(10, 'Admin'),
(1, 'Member');

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `title`) VALUES
(1, 'publié'),
(2, 'modifié'),
(3, 'supprimé');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `nombre_commande` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT 'emoji.png',
  `role_id` int(11) DEFAULT NULL,
  `token_session` text NOT NULL,
  `token_expire` int(11) NOT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `country_code` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `last_name`, `first_name`, `address`, `postal_code`, `ville`, `nombre_commande`, `picture`, `role_id`, `token_session`, `token_expire`, `actif`, `created_at`, `country_code`) VALUES
(37, 'hello@hello.com', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 1626433471, 1, '2021-07-16 10:04:23', NULL),
(7, 'test@test.fr', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, '7cybersécurité.jpg', 10, 'fd3c4a64d24a', 1634211890, 1, NULL, NULL),
(34, 'bistrot@fidwell.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0', 0, 1, '2021-07-06 13:06:01', NULL),
(31, 'arnaud@glanum.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0', 0, 1, '2021-07-06 10:23:06', NULL),
(32, 'digital@glanum.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0', 0, 1, '2021-07-06 10:27:37', NULL),
(33, 'cyril@glanum.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0', 0, 1, '2021-07-06 13:02:00', NULL),
(41, 'leo@glanum.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1627035667leo@glanum.com', 1627039267, 1, '2021-07-23 12:18:53', NULL),
(40, 'leo@lefdp.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0', 0, 1, '2021-07-23 12:00:29', NULL),
(42, 'test@test.frrr', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0', 0, 1, '2021-09-02 11:40:40', NULL),
(43, 'cyril@gg.com', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, '43blueberry-1326154__340.webp', 1, '', 1630593189, 1, '2021-09-02 15:32:12', NULL),
(44, 'test@test.frr', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, '44image (2).png', 1, '1630589925test@test.frr', 1630593525, 1, '2021-09-02 15:38:39', NULL),
(45, 'test@test.fre', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, '45charte_aaaaaaaaaa_10-08-2021.jpg', 1, '', 1633614162, 1, '2021-10-07 14:42:35', NULL),
(46, 'test@test.fra', '70c881d4a26984ddce795f6f71817c9cf4480e79', NULL, NULL, NULL, NULL, NULL, NULL, '46charte_aaaaaaaaaa_10-08-2021.jpg', 1, '', 1633614509, 1, '2021-10-07 14:48:25', NULL);

-- --------------------------------------------------------

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_statut` (`id_statut`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
