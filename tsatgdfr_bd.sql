-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.19 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour tsatgdfr_bd
CREATE DATABASE IF NOT EXISTS `tsatgdfr_bd` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tsatgdfr_bd`;

-- Export de la structure de la table tsatgdfr_bd. albums
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `tournoi_id` int(11) DEFAULT NULL,
  `rencontre_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_albums_id_tournois` (`tournoi_id`),
  KEY `FK_albums_id_rencontres` (`rencontre_id`),
  CONSTRAINT `FK_albums_id_rencontres` FOREIGN KEY (`rencontre_id`) REFERENCES `rencontres` (`id`),
  CONSTRAINT `FK_albums_id_tournois` FOREIGN KEY (`tournoi_id`) REFERENCES `tournois` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.albums : ~7 rows (environ)
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` (`id`, `titre`, `description`, `tournoi_id`, `rencontre_id`, `created_at`, `updated_at`, `actif`, `slug`) VALUES
	(1, 'TOURNOI JEUNES 2018', 'description', NULL, NULL, '2018-06-12 10:54:46', '2018-06-12 10:54:46', 1, 'tournoi-jeunes-2018'),
	(2, 'TOURNOI ADULTES 2018', 'description', NULL, NULL, '2018-06-12 10:58:58', '2018-06-12 10:59:54', 1, 'tournoi-adultes-2018'),
	(3, 'je cree des albums', 'description', NULL, NULL, '2018-09-06 14:32:44', '2018-09-06 14:32:44', 1, 'je-cree-des-albums'),
	(6, 'testde moi', 'description', NULL, NULL, '2018-09-06 15:24:10', '2018-09-06 15:24:10', 1, 'testde-moi'),
	(7, 'test_album_kb', 'description', NULL, NULL, '2018-09-10 06:40:38', '2018-09-10 06:40:38', 1, 'test-album-kb'),
	(8, 'testtettetstt', 'description', NULL, NULL, '2018-09-11 14:45:17', '2018-09-11 14:45:17', 1, 'testtettetstt'),
	(9, 'testalbum lol', 'description', NULL, NULL, '2019-01-07 08:55:14', '2019-01-07 08:55:14', 1, 'testalbum-lol');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. comites
CREATE TABLE IF NOT EXISTS `comites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(255) NOT NULL DEFAULT '0',
  `ordre` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table tsatgdfr_bd.comites : ~2 rows (environ)
/*!40000 ALTER TABLE `comites` DISABLE KEYS */;
INSERT INTO `comites` (`id`, `statut`, `ordre`) VALUES
	(1, 'Président trucmuche', 4),
	(2, 'Vice Président', 2);
/*!40000 ALTER TABLE `comites` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. commentaires
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ANONYME',
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_commentaires_id_news` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.commentaires : 5 rows
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;
INSERT INTO `commentaires` (`id`, `contenu`, `titre`, `pseudo`, `news_id`, `created_at`, `updated_at`) VALUES
	(1, 'J\'ai vraiment aimé cet article, cool', 'Super article', 'admin admin', 5, '2018-09-05 12:57:50', '2018-09-05 12:57:50'),
	(2, 'C\'est mon 2e commentaire', '2e commentaire', 'admin admin', 5, '2018-09-05 12:58:39', '2018-09-05 12:58:39'),
	(3, 'sfsdfsdf', 'dsfsdf', 'admin admin', 5, '2019-01-07 16:37:57', '2019-01-07 16:37:57'),
	(4, 'jtujtyjuykky', 'hftygjfghjftghfghjfgh', 'admin admin', 5, '2019-01-07 16:38:17', '2019-01-07 16:38:17'),
	(5, 'dfgdfgfdg', 'fgg', 'admin admin', 6, '2019-01-08 12:40:34', '2019-01-08 12:40:34');
/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `traite` tinyint(1) NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.contacts : ~0 rows (environ)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. documents
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_document` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_documents_id_users` (`user_id`),
  CONSTRAINT `FK_documents_id_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.documents : ~0 rows (environ)
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. equipes
CREATE TABLE IF NOT EXISTS `equipes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.equipes : ~0 rows (environ)
/*!40000 ALTER TABLE `equipes` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipes` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. lien_utiles
CREATE TABLE IF NOT EXISTS `lien_utiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.lien_utiles : ~0 rows (environ)
/*!40000 ALTER TABLE `lien_utiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `lien_utiles` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.menus : ~7 rows (environ)
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` (`id`, `titre`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Le club', 'club', NULL, NULL),
	(2, 'Compétition', 'competition', NULL, NULL),
	(3, 'Infos Pratiques', 'info-pratique', NULL, NULL),
	(4, 'L\'enseignement', 'enseignement', NULL, NULL),
	(5, 'La galerie', 'galerie', NULL, NULL),
	(6, 'Les liens utiles', 'lien-utiles', NULL, NULL),
	(7, 'Contact', 'contact', NULL, NULL);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.migrations : ~38 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2018_03_16_160204_create_albums_table', 1),
	(2, '2018_03_16_160204_create_contacts_table', 1),
	(3, '2018_03_16_160204_create_documents_table', 1),
	(4, '2018_03_16_160204_create_equipes_table', 1),
	(5, '2018_03_16_160204_create_lien_utiles_table', 1),
	(6, '2018_03_16_160204_create_menus_table', 1),
	(7, '2018_03_16_160204_create_news_table', 1),
	(8, '2018_03_16_160204_create_partenaires_table', 1),
	(9, '2018_03_16_160204_create_photos_table', 1),
	(10, '2018_03_16_160204_create_rencontre_users_table', 1),
	(11, '2018_03_16_160204_create_rencontres_table', 1),
	(12, '2018_03_16_160204_create_sous_menus_table', 1),
	(13, '2018_03_16_160204_create_statuts_table', 1),
	(14, '2018_03_16_160204_create_tournois_table', 1),
	(15, '2018_03_16_160204_create_users_table', 1),
	(16, '2018_03_16_160207_add_foreign_keys_to_albums_table', 1),
	(17, '2018_03_16_160207_add_foreign_keys_to_documents_table', 1),
	(18, '2018_03_16_160207_add_foreign_keys_to_photos_table', 1),
	(19, '2018_03_16_160207_add_foreign_keys_to_rencontre_user_table', 1),
	(20, '2018_03_16_160207_add_foreign_keys_to_rencontres_table', 1),
	(21, '2018_03_16_160207_add_foreign_keys_to_sous_menus_table', 1),
	(22, '2018_03_16_160207_add_foreign_keys_to_tournois_table', 1),
	(23, '2018_03_16_160207_add_foreign_keys_to_users_table', 1),
	(24, '2018_03_28_062713_add_remember_token', 1),
	(25, '2018_03_28_132907_addOrderSousMenu', 1),
	(26, '2018_03_29_135558_addActifAlbum', 1),
	(27, '2018_03_29_150711_addAdversaireRencontre', 1),
	(28, '2018_03_29_151006_addNullableAlbumIdToRencontre', 1),
	(29, '2018_05_03_121204_addNullable_to_tournois', 1),
	(30, '2018_05_03_134741_addSlugToAlbum', 1),
	(31, '2018_05_03_134750_addSlugToPhoto', 1),
	(32, '2018_05_03_142006_addDescriptionToPartenaires', 1),
	(33, '2018_06_08_123920_creat_commentaires_table', 2),
	(34, '2018_06_08_124334_add_nb_commentaire_to_news', 2),
	(35, '2018_06_08_125622_add_ofreign_keys_to_commentaire', 2),
	(36, '2018_06_11_201353_add_url_to_news', 2),
	(37, '2018_06_12_134720_add_nullable_url_news', 3),
	(38, '2019_01_07_133255_create_accueil_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text COLLATE utf8mb4_unicode_ci,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nb_commentaire` int(11) DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'images/tennisjoueur3.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.news : ~2 rows (environ)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `contenu`, `titre`, `created_at`, `updated_at`, `nb_commentaire`, `url`) VALUES
	(6, '<p>blablabliblablo</p>', 'je test svp', '2018-09-12 15:42:39', '2018-09-12 15:42:39', NULL, NULL),
	(7, '<p>ezfzefzefzfefe<span style="font-family:Comic Sans MS,cursive">zefzefzefzefzef<img alt="" src="http://tennis.test/files/news/hebus_1920x1200_1543785075_1612.jpg" style="height:200px; width:320px" />tryc</span></p>', 'klzhefze', '2019-01-08 12:51:10', '2019-01-08 12:51:10', NULL, NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. partenaires
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.partenaires : ~3 rows (environ)
/*!40000 ALTER TABLE `partenaires` DISABLE KEYS */;
INSERT INTO `partenaires` (`id`, `nom`, `site`, `logo`, `tel`, `mail`, `adresse`, `cp`, `ville`, `created_at`, `updated_at`, `description`, `facebook`, `twitter`) VALUES
	(5, 'test kevinb', 'www.motoplanete.fr', 'files\\sponsor\\HugoProfil.jpg', '01 02 03 04 05', NULL, '11 rue de la moto', '39100', 'Motoville', '2019-01-08 08:10:03', '2019-01-08 08:10:03', 'descriptio', NULL, NULL),
	(6, 'Incroyable partenaire', 'www.unsitealeatoire.com', 'files\\album\\tournoi-2017\\47369266_263020691050741_2282650198700195840_n.jpg', '01 02 03 04 05', NULL, '11 avenue truc', '75002', 'TrucVille', '2019-01-08 10:06:17', '2019-01-08 10:06:17', 'supercool', NULL, NULL),
	(7, 'test kevinb', 'www.unsitealeatoire.com', 'files\\album\\testalbum-lol\\testimage.jpg', '01 02 03 04 05', NULL, '2 baker street', '92001', 'Ville', '2019-01-08 10:07:00', '2019-01-08 10:07:00', 'descriptio', NULL, NULL);
/*!40000 ALTER TABLE `partenaires` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_photos_id_albums` (`album_id`),
  CONSTRAINT `FK_photos_id_albums` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.photos : ~3 rows (environ)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `titre`, `description`, `album_id`, `created_at`, `updated_at`, `slug`) VALUES
	(1, 'CATEGORIE 12 ANS FEMININES', NULL, 1, '2018-06-12 10:56:44', '2018-06-12 10:56:44', 'categorie-12-ans-feminines'),
	(2, 'erreur', 'c\'est une erreur enfait', 3, '2018-09-06 14:33:16', '2018-09-06 14:33:16', 'erreur'),
	(3, 'testhugo', 'descr', 7, '2018-09-10 06:41:00', '2018-09-10 06:41:00', 'testhugo');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. rencontres
CREATE TABLE IF NOT EXISTS `rencontres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dte` date NOT NULL,
  `heure` datetime DEFAULT NULL,
  `lieu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `victoire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipe_id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `adversaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rencontres_id_equipes` (`equipe_id`),
  KEY `FK_rencontres_id_albums` (`album_id`),
  CONSTRAINT `FK_rencontres_id_albums` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`),
  CONSTRAINT `FK_rencontres_id_equipes` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.rencontres : ~0 rows (environ)
/*!40000 ALTER TABLE `rencontres` DISABLE KEYS */;
/*!40000 ALTER TABLE `rencontres` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. rencontre_users
CREATE TABLE IF NOT EXISTS `rencontre_users` (
  `valide` tinyint(1) NOT NULL,
  `resultat` tinyint(1) DEFAULT NULL,
  `score` text COLLATE utf8mb4_unicode_ci,
  `id` int(11) NOT NULL,
  `rencontre_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rencontre_user_id_rencontre` (`rencontre_id`),
  KEY `FK_user_rencontre_id_user` (`user_id`),
  CONSTRAINT `FK_rencontre_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_rencontre_user_id_rencontres` FOREIGN KEY (`rencontre_id`) REFERENCES `rencontres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.rencontre_users : ~0 rows (environ)
/*!40000 ALTER TABLE `rencontre_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `rencontre_users` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. sous_menus
CREATE TABLE IF NOT EXISTS `sous_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sous_menus_id_menu` (`menu_id`),
  CONSTRAINT `FK_sous_menus_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.sous_menus : ~19 rows (environ)
/*!40000 ALTER TABLE `sous_menus` DISABLE KEYS */;
INSERT INTO `sous_menus` (`id`, `titre`, `contenu`, `slug`, `menu_id`, `created_at`, `updated_at`, `ordre`) VALUES
	(1, 'Historique', '<p>C EST HISTOIRIQUE DU CLUB OUAIIIS</p>\r\n\r\n<p><img alt="" src="http://tennis.test/files/1489417405.jpg" style="height:443px; width:612px" /></p>', 'historique', 1, NULL, NULL, 1),
	(2, 'Le comité', NULL, 'comite', 1, NULL, NULL, 2),
	(3, 'Les installations', '<p>INSTALLATIONS INCHALLAH</p>\r\n\r\n<p><img alt="" src="http://tennis.test/files/album/soiree-tennis/optique.jpg" style="height:182px; width:242px" /></p>', 'installations', 1, NULL, NULL, 3),
	(4, 'Les partenaires', NULL, 'partenaires', 1, NULL, NULL, 4),
	(5, 'Tournoi', NULL, 'tournoi', 2, NULL, NULL, 1),
	(6, 'Equipes', NULL, 'equipe', 2, NULL, NULL, 2),
	(7, 'Arbitres', NULL, 'arbitres', 2, NULL, NULL, 3),
	(8, 'Résultats', NULL, 'resultats', 2, NULL, NULL, 4),
	(9, 'Les horaires', '<p>SALUT JE TEST OMG ADC 2K18 REPORT</p>\r\n\r\n<p><img alt="" src="http://tennis.test/files/album/tournoi-2018/Hydrangeas.jpg" style="height:768px; width:1024px" /></p>\r\n\r\n<p><img alt="" src="http://tennis.test/files/album/tournoi-jeunes-2018/3.jpg" style="height:360px; width:640px" /></p>', 'horaires', 3, NULL, NULL, 1),
	(10, 'Devenir membre', NULL, 'devenir-membre', 3, NULL, NULL, 2),
	(11, 'La réservation', NULL, 'reservations', 3, NULL, NULL, 3),
	(12, 'Tarifs', '<p>SALUT C EST MOI<img alt="" src="http://tennis.test/files/album/tournoi-2017/47352491_738377466533946_8651873891628613632_n.jpg" style="height:960px; width:720px" /></p>\r\n\r\n<p><img alt="" src="http://tennis.test/files/album/tournoi-2017/47094241_501192933704145_1646017835048108032_n.jpg" style="height:960px; width:720px" /></p>', 'tarifs', 3, NULL, NULL, 4),
	(13, 'Equipe pédagogique', 'plop', 'l-equipe-pedagogique', 4, NULL, NULL, 1),
	(14, 'Ecole de tennis', 'ploup', 'l-ecole-de-tennis', 4, NULL, NULL, 2),
	(15, 'Cours collectifs', 'plap', 'cours-colectifs', 4, NULL, NULL, 3),
	(16, 'Les stages', 'pif', 'les-stages', 4, NULL, NULL, 4),
	(17, 'Coordonnées', '<p>test</p>', 'coordonnees', 7, NULL, NULL, 1),
	(18, 'Nous contacter', NULL, 'contacter', 7, NULL, NULL, 2),
	(19, 'Plan d\'accès', NULL, 'plan', 7, NULL, NULL, 3);
/*!40000 ALTER TABLE `sous_menus` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. statuts
CREATE TABLE IF NOT EXISTS `statuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.statuts : ~0 rows (environ)
/*!40000 ALTER TABLE `statuts` DISABLE KEYS */;
/*!40000 ALTER TABLE `statuts` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. tournois
CREATE TABLE IF NOT EXISTS `tournois` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dte_debut` date NOT NULL,
  `dte_fin` date NOT NULL,
  `dte_fin_inscription` date NOT NULL,
  `lien_site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actif` int(11) DEFAULT NULL,
  `resultat` text COLLATE utf8mb4_unicode_ci,
  `album_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tournois_id_albums` (`album_id`),
  CONSTRAINT `FK_tournois_id_albums` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.tournois : ~0 rows (environ)
/*!40000 ALTER TABLE `tournois` DISABLE KEYS */;
/*!40000 ALTER TABLE `tournois` ENABLE KEYS */;

-- Export de la structure de la table tsatgdfr_bd. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comite_id` int(11) DEFAULT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `est_arbitre` tinyint(1) NOT NULL DEFAULT '0',
  `est_joueur` tinyint(1) NOT NULL DEFAULT '0',
  `est_admin` tinyint(1) NOT NULL DEFAULT '0',
  `valider` tinyint(1) NOT NULL DEFAULT '0',
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_id_statuts` (`statut_id`),
  CONSTRAINT `FK_users_id_statuts` FOREIGN KEY (`statut_id`) REFERENCES `statuts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tsatgdfr_bd.users : ~4 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `comite_id`, `nom`, `prenom`, `email`, `telephone`, `password`, `commentaire`, `est_arbitre`, `est_joueur`, `est_admin`, `valider`, `photo`, `statut_id`, `created_at`, `updated_at`, `remember_token`) VALUES
	(1, 1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$d7I7.MfoDnGf6d1gctL0/eY1tUHSBx/cPRLEAzWn5TdOCcONbmlyq', NULL, 0, 0, 1, 1, NULL, NULL, NULL, '2019-01-14 13:23:09', 'sqp1bC6h8GD2qirIn8je4BMFlYhmbAFSYjbqTbeWHztKpfPxTYGMGPwnBoli'),
	(2, NULL, 'joueur', 'joueur', 'joueur@gmail.com', NULL, '$2y$10$7DQymTN6xEjaEhHRO96lP.N7PICnZfLJzqW9rTHH8dUTgqVBYaJeS', NULL, 0, 1, 0, 1, NULL, NULL, NULL, '2019-01-14 14:20:42', NULL),
	(3, 2, 'arbitre', 'arbitre', 'arbitre@gmail.com', NULL, '$2y$10$WUg8SRVPren5IG2n84kWsu6riIbZiqAqURkYhip5TSw5Jmn0oN116', NULL, 1, 0, 0, 1, NULL, NULL, NULL, '2019-01-14 14:11:29', NULL),
	(4, NULL, 'invite', 'invite', 'invite@gmail.com', NULL, '$2y$10$JUPJy3zlspd.tZHVvAQcouP4e/ZazJSPz8nPpTZB4BJ.jyx.Whwmm', NULL, 0, 0, 0, 1, NULL, NULL, NULL, '2019-01-16 15:15:36', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
tournois