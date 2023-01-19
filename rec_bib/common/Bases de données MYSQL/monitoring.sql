-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 jan. 2023 à 14:12
-- Version du serveur :  5.7.30-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monitoring`
--

-- --------------------------------------------------------

--
-- Structure de la table `z_apps`
--

CREATE TABLE `z_apps` (
  `id` int(11) NOT NULL,
  `code_app` varchar(3) DEFAULT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_apps`
--

INSERT INTO `z_apps` (`id`, `code_app`, `libelle`, `date_crea`, `cmt`) VALUES
(1, 'reb', 'Réservation en bibliothèque', '2022-07-13', '');

-- --------------------------------------------------------

--
-- Structure de la table `z_onglets`
--

CREATE TABLE `z_onglets` (
  `id` int(11) NOT NULL,
  `idapp` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `id_onglet_s` varchar(255) DEFAULT NULL,
  `rang` int(11) DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_onglets`
--

INSERT INTO `z_onglets` (`id`, `idapp`, `libelle`, `date_crea`, `id_onglet_s`, `rang`, `cmt`) VALUES
(1, 1, 'Réserver un livre', '2023-01-02', 'resalivre', 1, ''),
(2, 1, 'Gérer mes livres', '2022-07-13', 'meslivres', 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `z_ss_onglets`
--

CREATE TABLE `z_ss_onglets` (
  `id` int(11) NOT NULL,
  `idonglet` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `id_onglet_s` varchar(255) DEFAULT NULL,
  `rang` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_ss_onglets`
--

INSERT INTO `z_ss_onglets` (`id`, `idonglet`, `libelle`, `date_crea`, `id_onglet_s`, `rang`, `icon`, `cmt`) VALUES
(1, 1, 'Rechercher un livre', '2022-07-13', 'S211LookForBook', 1, 'search', ''),
(1, 2, 'Mes livres réservés', '2022-07-13', 'S311MyBooks', 1, 'book', ''),
(2, 1, 'Faire une demande', '2022-07-13', 'S221AskForBook', 2, 'question', ''),
(2, 2, 'Mes livres demandés', '2022-07-13', 'S321MyBooksAsked', 2, 'flask', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `z_apps`
--
ALTER TABLE `z_apps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `z_onglets`
--
ALTER TABLE `z_onglets`
  ADD PRIMARY KEY (`id`,`idapp`);

--
-- Index pour la table `z_ss_onglets`
--
ALTER TABLE `z_ss_onglets`
  ADD PRIMARY KEY (`id`,`idonglet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
