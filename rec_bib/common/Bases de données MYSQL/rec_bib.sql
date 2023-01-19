-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 jan. 2023 à 14:13
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
-- Base de données : `rec_bib`
--

-- --------------------------------------------------------

--
-- Structure de la table `z_asked_books`
--

CREATE TABLE `z_asked_books` (
  `title` varchar(150) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `date_crea` date DEFAULT NULL,
  `cmt` varchar(4000) DEFAULT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_asked_books`
--

INSERT INTO `z_asked_books` (`title`, `iduser`, `qte`, `date_crea`, `cmt`, `etat`) VALUES
('A mots croisés', 1, 2, '2023-01-05', 'Je n\'ai pas trouvé ce livre dans la liste', 2),
('Babouches d\'Abou Kassem (les)', 1, 1, '2023-01-05', 'Je n\'ai pas de description pour ce livre', 1),
('Avec trois brins de laine', 1, 5, '2023-01-05', 'Édition 22/03/2014', 0),
('Boucle d\'or et les trois ours', 1, 2, '2023-01-05', 'Auteur : Celli Rose', 2),
('Comptines en trompe l\'œil', 1, 2, '2023-01-05', 'Auteur : Coran Pierre\r\n', 2);

-- --------------------------------------------------------

--
-- Structure de la table `z_books`
--

CREATE TABLE `z_books` (
  `id` int(11) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `idcategorie` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL,
  `date_edition` date DEFAULT NULL,
  `auteur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_books`
--

INSERT INTO `z_books` (`id`, `description`, `idcategorie`, `prix`, `titre`, `date_crea`, `cmt`, `date_edition`, `auteur`) VALUES
(1, 'Des', 1, 39, '10 contes de fantômes', '2023-01-04', 'contes_fantomes', '2010-01-27', 'Jacques Cassabois'),
(2, 'No description available', 1, 11, 'Grand sommeil (le)', '2023-01-05', 'grand_sommeil', '2001-11-10', 'Pommaux Yvan'),
(3, 'No description available', 1, 11, 'Grand sommeil et petits lits', '2023-01-05', 'no_photo', '2004-02-16', 'Zoboli Giovanna'),
(4, 'No description available', 1, 23, 'Grand voyage de Mademoiselle Prudence (le)', '2023-01-05', 'no_photo', '2015-08-10', 'Gastaut Charlotte'),
(5, 'No description available', 1, 16, 'Grande aventure du petit magicien (la)', '2023-01-05', 'grande_avent', '2001-06-07', 'Collectif'),
(6, 'No description available', 1, 17, 'Grande famille (la)', '2023-01-05', 'la_grande_famille', '2018-03-05', 'Bernstein Galia'),
(7, 'No description available', 1, 18, 'Grande fête dans la jungle (la)', '2023-01-05', 'no_photo', '2000-07-23', 'Colombet Julie'),
(8, 'No description available', 1, 19, 'Grande Flore', '2023-01-05', 'no_photo', '2003-07-22', 'Vaugelade Anaïs'),
(9, 'No description available', 1, 15, 'Grande méchante Lou (la)', '2023-01-05', 'no_photo', '2006-01-22', 'Joly Fanny'),
(10, 'No description available', 1, 19, 'Grande question (la)', '2023-01-05', 'no_photo', '2017-02-10', 'Erlbruch Wolf'),
(11, 'No description available', 1, 25, 'Grande Rivière (la)', '2023-01-05', 'no_photo', '2012-05-02', 'Rossi Annie'),
(12, 'No description available', 1, 20, 'Grande vague (la)', '2023-01-05', 'no_photo', '2017-08-15', 'Massenot Véronique'),
(13, 'No description available', 1, 12, 'Grand-mère arrose la lune', '2023-01-05', 'no_photo', '2007-05-06', 'Elias Jean'),
(14, 'No description available', 1, 14, 'Grand-mère Loup, y es-tu ?', '2023-01-05', 'no_photo', '2015-08-02', 'Brown Ken'),
(15, 'No description available', 1, 16, 'Grand-Pa', '2023-01-05', 'no_photo', '2009-03-11', 'Van de Velden Edward'),
(16, 'No description available', 1, 8, 'Grands explorateurs  (les)', '2023-01-05', 'no_photo', '2017-11-18', 'Durand Jean Benoit'),
(17, 'No description available', 1, 21, 'Grenouille à grosse bouche (la)', '2023-01-05', 'no_photo', '2014-12-19', 'Vidal Francine'),
(18, 'No description available', 1, 17, 'Gribouille en vadrouille', '2023-01-05', 'no_photo', '2017-11-09', 'Timmers Leo'),
(19, 'No description available', 1, 25, 'Gronouyot', '2023-01-05', 'no_photo', '2006-06-22', 'Servant Stéphane'),
(20, 'No description available', 1, 23, 'Gros chagrin', '2023-01-05', 'no_photo', '2012-10-05', 'Courgeon Rémi'),
(21, 'No description available', 1, 6, 'Gros cornichon', '2023-01-05', 'no_photo', '2013-06-13', 'Manceau Edouard'),
(22, 'No description available', 1, 21, 'Gros goûter (le)', '2023-01-05', 'no_photo', '2001-03-25', 'Servant Stéphane'),
(23, 'No description available', 1, 19, 'Gros mensonge (le)', '2023-01-05', 'no_photo', '2017-08-28', 'Darwiche Jihad'),
(24, 'No description available', 1, 14, 'Gros mot de Lili Bobo (le)', '2023-01-05', 'no_photo', '2010-04-07', 'Brami Elisabeth'),
(25, 'No description available', 1, 21, 'Gros mots (les)', '2023-01-05', 'no_photo', '2017-07-15', 'Mounié Didier'),
(26, 'No description available', 1, 12, 'Gros navet (le)', '2023-01-05', 'no_photo', '2013-11-25', 'Tolstoï Alexis'),
(27, 'No description available', 1, 11, 'Grosse bête de Monsieur Racine (la)', '2023-01-05', 'no_photo', '2002-09-11', 'Ungerer Tomi'),
(40, 'No description available', 1, 21, 'Guillevic', '2023-01-05', 'no_photo', '2022-09-15', 'Guillevic'),
(41, 'No description available', 1, 19, 'Gulliver', '2023-01-05', 'no_photo', '2011-09-20', 'Swift Jonathan'),
(42, 'No description available', 1, 9, 'Habits neufs du roi (les)', '2023-01-05', 'no_photo', '2003-10-14', 'Andersen Hans Christian'),
(43, 'No description available', 1, 8, 'Haïku, mon nounours', '2023-01-05', 'no_photo', '2014-03-22', 'Brulet Gilles'),
(44, 'No description available', 1, 10, 'Haïti mon pays', '2023-01-05', 'no_photo', '2017-07-07', 'Collectif écoliers haïtiens'),
(45, 'No description available', 1, 16, 'Hans le balourd', '2023-01-05', 'no_photo', '2003-07-02', 'Andersen Hans Christian'),
(46, 'No description available', 1, 6, 'Hansel et Gretel', '2023-01-05', 'no_photo', '2006-08-14', 'Grimm Jakob et Wilhelm'),
(47, 'No description available', 1, 10, 'Hansel et Gretel', '2023-01-05', 'no_photo', '2006-02-10', 'Grimm Jacob et Wilhelm'),
(48, 'No description available', 1, 23, 'Hareng saur (le)', '2023-01-05', 'no_photo', '2012-06-07', 'Cros Charles'),
(49, 'No description available', 1, 6, 'Haut les mains !', '2023-01-05', 'no_photo', '2019-09-24', 'Lhomme Sandrine'),
(50, 'No description available', 1, 6, 'Helena, Ivan et les oies', '2023-01-05', 'no_photo', '2021-12-17', 'Bloch Muriel'),
(51, 'No description available', 1, 18, 'Henry et la liberté', '2023-01-05', 'no_photo', '2014-12-14', 'Levine Ellen'),
(63, 'No description available', 1, 20, 'Histoire de Babar', '2023-01-05', 'no_photo', '2000-01-06', 'Brunhoff Jean de'),
(64, 'No description available', 1, 19, 'Histoire de trois oiseaux', '2023-01-05', 'no_photo', '2021-04-19', 'Munari Bruno'),
(72, 'No description available', 1, 23, 'Histoires au téléphone', '2023-01-05', 'no_photo', '2009-04-01', 'Rodari Gianni'),
(75, 'No description available', 1, 20, 'Histoires de géants et de cyclopes', '2023-01-05', 'no_photo', '2015-03-01', 'Collectif'),
(76, 'No description available', 1, 14, 'Histoires de Huey (les)', '2023-01-05', 'no_photo', '2022-12-28', 'Cameron Ann'),
(77, 'No description available', 1, 10, 'Histoires de Marcel (les)', '2023-01-05', 'no_photo', '2022-11-12', 'Browne Anthony'),
(89, 'No description available', 1, 17, 'Hommes en sucre (les)', '2023-01-05', 'no_photo', '2009-05-10', 'Rodari Gianni'),
(90, 'No description available', 1, 5, 'Horloger de l\'aube (l\')', '2023-01-05', 'no_photo', '2000-12-17', 'Heurté Yves'),
(98, 'No description available', 1, 24, 'Il était un petit navire', '2023-01-05', 'no_photo', '2007-06-18', 'Deneux Xavier'),
(99, 'No description available', 1, 16, 'Il était une chaise', '2023-01-05', 'no_photo', '2018-07-28', 'Heitz Bruno'),
(100, 'No description available', 1, 24, 'Il était une fois', '2023-01-05', 'no_photo', '2016-05-13', 'Domergue Agnès'),
(101, 'No description available', 1, 19, 'Il était une fois', '2023-01-05', 'no_photo', '2022-07-14', 'Lacombe Benjamin'),
(102, 'No description available', 1, 25, 'Il était une fois un roi et une rei…', '2023-01-05', 'no_photo', '2012-03-23', 'Jalbert Philippe'),
(103, 'No description available', 1, 13, 'Il fait nuit', '2023-01-05', 'no_photo', '2012-01-26', 'Dorémus Gaétan'),
(104, 'No description available', 1, 10, 'Il faudra', '2023-01-05', 'no_photo', '2002-12-20', 'Lenain Thierry'),
(105, 'No description available', 1, 23, 'Il faut délivrer Gaspard !', '2023-01-05', 'no_photo', '2009-12-22', 'Pennart Geoffroy de'),
(106, 'No description available', 1, 11, 'Il faut savoir dire non', '2023-01-05', 'no_photo', '2011-04-17', 'Doray Malika'),
(107, 'No description available', 1, 17, 'Il faut une fleur', '2023-01-05', 'no_photo', '2003-03-05', 'Rodari Gianni'),
(111, 'No description available', 1, 23, 'Il ne faut pas habiller les animaux', '2023-01-05', 'no_photo', '2018-11-18', 'Barrett Judi'),
(112, 'No description available', 1, 16, 'Il neige !', '2023-01-05', 'no_photo', '2014-06-13', 'Go Hyejin'),
(113, 'No description available', 1, 16, 'Il pleut des poèmes', '2023-01-05', 'no_photo', '2022-01-23', 'Henry Jean-Marie'),
(114, 'No description available', 1, 6, 'Il pleut, il mouille', '2023-01-05', 'no_photo', '2012-06-08', 'Beau Sandrine'),
(115, 'No description available', 1, 21, 'Il y a des heures qui durent longtemps', '2023-01-05', 'no_photo', '2009-08-06', 'Brami Elisabeth'),
(116, 'No description available', 1, 16, 'Il y a le monde', '2023-01-05', 'no_photo', '2018-08-05', 'Serres Alain'),
(129, 'No description available', 1, 18, 'Imagier des saisons', '2023-01-05', 'no_photo', '2022-09-27', 'Pittau Francesco'),
(134, 'No description available', 1, 13, 'Imagine', '2023-01-05', 'no_photo', '2015-08-20', 'Becker Aaron'),
(135, 'No description available', 1, 23, 'Impressionnisme entrée libre', '2023-01-05', 'no_photo', '2002-02-27', 'Sellier Marie'),
(142, 'No description available', 1, 23, 'Iota la vache', '2023-01-05', 'no_photo', '2002-04-16', 'Mercier Julie'),
(143, 'No description available', 1, 14, 'Iris des abysses', '2023-01-05', 'no_photo', '2014-03-03', 'Louzon Camille'),
(144, 'No description available', 1, 24, 'Isidor Suzor', '2023-01-05', 'no_photo', '2000-05-25', 'Poitras Anique'),
(145, 'No description available', 1, 17, 'Itak et la baleine', '2023-01-05', 'no_photo', '2000-11-22', 'Chèze Bernard'),
(146, 'No description available', 1, 16, 'Ita-Rose', '2023-01-05', 'no_photo', '2017-01-21', 'Causse Rolande'),
(147, 'No description available', 1, 21, 'Jaffabules', '2023-01-05', 'no_photo', '2016-09-26', 'Coran Pierre'),
(152, 'No description available', 1, 7, 'J\'ai le droit d\'être un enfant', '2023-01-05', 'no_photo', '2013-12-11', 'Serres Alain'),
(159, 'No description available', 1, 22, 'J\'aime, j\'aime pas', '2023-01-05', 'no_photo', '2019-08-19', 'Thévenet Séverine');

-- --------------------------------------------------------

--
-- Structure de la table `z_categories`
--

CREATE TABLE `z_categories` (
  `id` int(11) NOT NULL,
  `description` varchar(400) DEFAULT NULL,
  `date_crea` date DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `z_resa_books`
--

CREATE TABLE `z_resa_books` (
  `idbook` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `date_crea` date NOT NULL,
  `date_deb` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_resa_books`
--

INSERT INTO `z_resa_books` (`idbook`, `iduser`, `qte`, `date_crea`, `date_deb`, `date_fin`, `cmt`) VALUES
(1, 1, 1, '2023-01-09', '2023-01-13', '2023-01-28', 'Réservation'),
(2, 1, 1, '2023-01-09', '2023-01-15', '2023-02-01', 'Réservation'),
(3, 1, 1, '2023-01-09', '2023-01-20', '2023-01-25', 'Réservation'),
(6, 1, 1, '2023-01-09', '2023-01-09', '2023-01-31', 'Réservation');

-- --------------------------------------------------------

--
-- Structure de la table `z_stock_books`
--

CREATE TABLE `z_stock_books` (
  `id` int(11) NOT NULL,
  `stk` int(11) NOT NULL,
  `date_maj` date DEFAULT NULL,
  `cmt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `z_users`
--

CREATE TABLE `z_users` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '3' COMMENT '1=Admin,2 = superviseur, 3= operateur',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `z_users`
--

INSERT INTO `z_users` (`id`, `nom`, `prenom`, `contact`, `adresse`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'Taleb', 'Yacine', '+3370000000', 'France', 'yacinetaleb@gmail.com', 'c9ed97bf23e974aff4a875d08d2c3f0b', 1, '2022-07-07 11:00:06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `z_books`
--
ALTER TABLE `z_books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `z_categories`
--
ALTER TABLE `z_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `z_resa_books`
--
ALTER TABLE `z_resa_books`
  ADD PRIMARY KEY (`idbook`,`iduser`,`date_crea`);

--
-- Index pour la table `z_stock_books`
--
ALTER TABLE `z_stock_books`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
