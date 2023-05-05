-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 juin 2022 à 23:01
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `registration`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(11) NOT NULL,
  `immob_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`user_id`, `immob_id`) VALUES
(1, 1),
(1, 3),
(1, 8),
(1, 11),
(2, 11),
(2, 13),
(2, 27),
(2, 28),
(4, 5),
(6, 1),
(6, 5),
(6, 6),
(6, 11),
(6, 13),
(7, 9),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 32);

-- --------------------------------------------------------

--
-- Structure de la table `immobilier2`
--

CREATE TABLE `immobilier2` (
  `id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `type` tinytext NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `surface` varchar(100) NOT NULL,
  `etat` varchar(100) NOT NULL,
  `tel` int(100) NOT NULL,
  `prix` varchar(100) NOT NULL,
  `commentaire` text NOT NULL,
  `transaction` text NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `immobilier2`
--

INSERT INTO `immobilier2` (`id`, `file_name`, `uploaded_on`, `status`, `type`, `lieu`, `surface`, `etat`, `tel`, `prix`, `commentaire`, `transaction`, `user`) VALUES
(1, 'appartemnt.jpg', '2022-06-10 11:30:07', '1', 'Appartement ', 'mostaganem 5juillet', '100m²', 'Biens', 783195323, '15000 ', 'appartement f3 troisième étage   à louer contacter moi pour plus d\'informations', 'à louer', 'mohamed12@gmail.com'),
(2, 'studiojpeg.jpeg', '2022-06-10 11:33:14', '1', 'studio', 'CENTRE VILLE MOSTAGENEM', '80m²', 'Biens', 783195323, '10 000 ', 'studio pour les étudiant qui habitant plut loin à leur maison bon prix à louer par mois ', 'à louer', 'mohamed12@gmail.com\r\n'),
(3, 'maison1.jpg', '2022-06-10 11:38:32', '1', 'villa', 'CENTRE VILLE MOSTAGENEM', '80m²', 'Biens', 783195323, '10000000 ', 'villa à vendre bien venu pour voir ', 'à vendre', 'mohamed12@gmail.com'),
(4, 'villa.jpg', '2022-06-10 11:39:22', '1', 'villa', 'CENTRE VILLE MOSTAGENEM', '80m²', 'Biens', 783195323, '10 000 000 ', 'venir et voir ', 'à vendre', 'mohamed12@gmail.com'),
(5, 'colocation.jpg', '2022-06-10 12:50:40', '1', 'colocation', 'cité el yassmin', '80m²', 'Biens', 678767876, '15000 ', 'colocation à louer ', 'à louer', 'yacine10@gmail.com'),
(6, 'appart.jpg', '2022-06-10 12:53:49', '1', 'Appartement', 'cité didouche mourade', '100m²', 'Biens', 556676766, '2000000 ', 'appartement à louer par année', 'à louer', 'hassiba82@gmail.com'),
(8, 'appartmt.jpg', '2022-06-13 22:06:08', '1', 'Appartement ', 'hay el hanae mostaganem', '60m²', 'Neuf', 556676766, '30 000 ', ' f3 cinquiéme étage \r\ncontacter moi ', 'à louer', 'yacine10@gmail.com'),
(9, 'maison1.jpg', '2022-06-15 15:23:09', '1', 'villa ', 'cité belle vu d\'aire mostaganem', '200m²', 'neuf et Acté avec livre de foncé ', 556676777, '20 000 000', 'vu de mére \r\nville calme \r\n\r\n', 'à vendre', 'yassmina04@gmail.com'),
(11, 'villa.jpg', '2022-06-16 22:40:46', '1', 'villa', 'cité salamandre en face masjid el Qouds ', '200m²', 'neuf et Acté avec livre de foncé', 783195323, '20 000 000', 'venir et voir\r\n', 'à vendre', 'yassmina04@gmail.com'),
(12, 'studiojpeg.jpeg', '2022-06-16 23:15:49', '1', 'studio', 'cité chemouma', '100m²', 'neuf et équiper', 556676766, '15000 ', 'bien  venu', 'à louer', 'yassmina04@gmail.com'),
(13, 'colocation.jpg', '2022-06-16 23:23:15', '1', 'colocation', 'cité el yassmin', '40m²', 'clean', 678767876, '50\r\n000 ', 'clean home ', 'à louer', 'yassmina04@gmail.com'),
(14, 'magasin.jpeg', '2022-06-17 15:43:58', '1', 'magasin', 'centre ville mostaganem', '100m²', 'neuf', 783496376, '40 000 ', 'magasin commerciale et bonne prix  ', 'à louer', 'amina1@gmail.com'),
(15, 'magasin.jpeg', '2022-06-19 20:57:00', '1', 'magasin', 'chrmouma', '200m²', 'Biens', 783195323, '150000000 ', 'magasin à vendre ou à louer pour différents type de commerces', 'à louer/à vendre', 'hassiba82@gmail.com'),
(16, 'villaa.jpeg', '2022-06-19 23:03:23', '1', 'villa', 'cité salamandre à coté masjid el Qouds', '200m²', 'neuf ', 678767876, '40000 ', 'villa situé à salamandre à louer par mois ', 'à louer', 'mohamed12@gmail.com'),
(18, 'studiojpeg.jpeg', '2022-06-19 23:47:48', '1', 'studio', 'mostaganem 5juillet', '100m²', 'neuf', 556676766, '15000 ', 'studio à louer soyez les bien venu ..', 'à louer', 'mohamed12@gmail.com'),
(20, 'aprt.jpeg', '2022-06-20 18:26:13', '1', 'Appartement', 'mostaganem 5juillet', '200m²', 'neuf', 556676766, '2000000', ' location par année bien venu pour voir l\'appartement ', 'à louer', 'yacine10@gmail.com'),
(27, 'appartemnt.jpg', '2022-06-20 20:56:59', '1', 'appartemnt ', 'mostaganem 5juillet', '200m²', 'neuf', 783195323, '30000.00 \r\n', 'appartement à louer', 'à louer', 'yacine10@gmail.com'),
(28, 'superbe-villa-algerie-1.jpg', '2022-06-20 22:54:30', '1', 'villa ', 'cité salamandre à coté masjid el Qouds', '150m²', 'neuf jamais habiter', 678767876, '10 000 000.00', 'venir et voir bien venu', 'à vendre', 'yacine10@gmail.com'),
(29, 'appart.jpg', '2022-06-21 11:39:48', '1', 'Appartement ', 'en face rond-point la douane  ', '80m²', 'neuf et équiper', 2147483647, '35000 ', 'appartemrnt f4 cartier calme venir et voir ', 'à louer', 'amina28@gmail.com'),
(30, 'Un-appartement-de-77-m2-astucieusement-optimise-pour-une-famille.jpg', '2022-06-24 19:29:58', '1', 'Appartement', 'mostaganem salamendre', '200m²', 'neuf', 678767876, '5 000 000 ', 'Appartement F3 Mostaganem Salamandre', 'à vendre', 'amina28@gmail.com'),
(32, 'Min_large.jpg', '2022-06-27 12:47:55', '1', 'Duplex', 'cité chemouma', '150m²', 'neuf jamais habiter', 556676766, '40000  ', 'Location duplex F6 cité chemouma ', 'à louer', 'amina28@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` tinytext NOT NULL,
  `prénom` tinytext NOT NULL,
  `date de naissance` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confpassword` varchar(100) NOT NULL,
  `numID` int(255) NOT NULL,
  `sexe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prénom`, `date de naissance`, `email`, `password`, `confpassword`, `numID`, `sexe`) VALUES
(1, 'Rayen', 'Mohamed', '1984-01-16', 'mohamed12@gmail.com', '309cd3800aacbd003ac36199fa537295', '309cd3800aacbd003ac36199fa537295', 1100196302, 'Homme'),
(2, 'Maamer', 'Yacine', '1990-01-16', 'yacine10@gmail.com', 'ef32927ac29584c2a3250028c2c456d7', 'ef32927ac29584c2a3250028c2c456d7', 1004005659, 'Homme'),
(3, 'benidriss', 'Fatimazohra', '1988-01-16', 'fatima45@gmail.com', 'b5d5f67b30809413156655abdda382a3', 'b5d5f67b30809413156655abdda382a3', 1007454655, 'Femme'),
(4, 'izza', 'hassiba', '2001-06-13', 'hassiba82@gmail.com', '33282725dda0b3cdf020ca4cde77ecbf', 'd8d73211b1bbde8548a4652abcf560e9', 1024340300, 'Femme'),
(6, 'lairech', 'sennia', '2001-11-13', 'sennia12@gmail.com', '5c0943ad36c78956235f7a00e953840a', '5c0943ad36c78956235f7a00e953840a', 2147483647, 'Femme'),
(7, 'Amzert', 'yassmina', '2001-10-04', 'yassmina04@gmail.com', '2734dfd72fddd64f86f2e4fac2c98494', '2734dfd72fddd64f86f2e4fac2c98494', 1001020323, 'Femme'),
(8, 'belayachi', 'Amina', '1994-03-28', 'amina28@gmail.com', '6f2c04fa3f9acdf381ee9439b6f91338', '6f2c04fa3f9acdf381ee9439b6f91338', 1001232002, 'Femme'),
(9, 'belayachi', 'Amina', '1994-03-28', 'amina16@gmail.com', '6f2c04fa3f9acdf381ee9439b6f91338', '6f2c04fa3f9acdf381ee9439b6f91338', 1001232002, 'Femme'),
(10, 'belayachi', 'Amina', '1994-03-28', 'amina1@gmail.com', '6f2c04fa3f9acdf381ee9439b6f91338', '6f2c04fa3f9acdf381ee9439b6f91338', 1001232002, 'Femme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`immob_id`),
  ADD KEY `immob_id` (`immob_id`);

--
-- Index pour la table `immobilier2`
--
ALTER TABLE `immobilier2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `immobilier2`
--
ALTER TABLE `immobilier2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
