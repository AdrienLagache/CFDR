-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `app_user`;
CREATE TABLE `app_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `team_id` int(11) NOT NULL,
  `car` enum('Renault Sport Mégane R.S. RX','Peugeot 208 WRX','Audi S1 EKS RX Quattro','Renault Sport Clio R.S. RX','Ford Fiesta RXS Evo 5','Ford Fiesta Rallycross MK8','Mini Cooper SX1','Ford Fiesta Rallycross (STARD)','Seat Ibiza RX') NOT NULL,
  `points` int(11) DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `role` enum('admin','pilote') NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 0 COMMENT '0=absent, 1=présent',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

INSERT INTO `app_user` (`id`, `pseudo`, `team_id`, `car`, `points`, `password`, `email`, `role`, `availability`) VALUES
(1,	'Gachette',	1,	'Mini Cooper SX1',	150,	'$2y$10$K/Qb3vW.g5ak87q0UH6WBekaqC5dWjp6vC6R4TAcEBUho1fcqm4Om',	'lagacheadrien64@gmail.com',	'admin',	1),
(44,	'Equilox',	2,	'Seat Ibiza RX',	250,	'$2y$10$NLtHXLt9c5ijEiB9ds899er7HpnqtTFZPmdyEsz98/s2..rCBNI6q',	'',	'admin',	0);

DROP TABLE IF EXISTS `fall_season`;
CREATE TABLE `fall_season` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'numero de course',
  `flag` varchar(50) NOT NULL COMMENT 'drapeau du pays',
  `country` varchar(50) NOT NULL COMMENT 'pays d''accueil',
  `track` varchar(100) NOT NULL COMMENT 'nom du circuit',
  `date` varchar(50) NOT NULL COMMENT 'date de la course',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO `fall_season` (`id`, `flag`, `country`, `track`, `date`) VALUES
(23,	'Flag_of_Spain.png',	'Espagne',	'Barcelone-Catalunya',	'27 Septembre'),
(24,	'Flag_of_the_United_Kingdom.webp',	'Grande-Bretagne',	'Silverstone',	'4 Octobre'),
(25,	'Flag_of_Sweden.png',	'Suède',	'Höljes',	'11 Octobre'),
(26,	'Flag_of_Canada.png',	'Canada',	'Trois Rivières',	'19 Octobre');

DROP TABLE IF EXISTS `spring_season`;
CREATE TABLE `spring_season` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Le numéro de la course',
  `flag` varchar(150) NOT NULL COMMENT 'Le drapeau du pays',
  `country` varchar(50) NOT NULL COMMENT 'Le pays d''accueil',
  `track` varchar(100) NOT NULL COMMENT 'Le nom du circuit',
  `date` varchar(50) NOT NULL COMMENT 'La date de la course',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `spring_season` (`id`, `flag`, `country`, `track`, `date`) VALUES
(1,	'Flag_of_the_United_Arab_Emirates.png',	'Abu Dhabi',	'Yas Marina Circuit',	'28 Janvier'),
(2,	'Flag_of_Spain.png',	'Espagne',	'Barcelona Catalunya',	'10 Février'),
(3,	'Flag_of_Belgium.png',	'Belgique',	'Mettet',	'24 Février'),
(4,	'Flag_of_the_United_Kingdom.webp',	'Grande-Bretagne',	'Silverstone',	'10 Mars'),
(5,	'Flag_of_Norway.png',	'Norvège',	'Hell',	'24 Mars'),
(6,	'Flag_of_Sweden.png',	'Suède',	'Höljes',	'7 Avril'),
(7,	'Flag_of_Canada.png',	'Canada',	'Trois Rivières',	'21 Avril'),
(8,	'Flag_of_France.png',	'France',	'Lohéac',	'5 Mai'),
(9,	'Flag_of_Latvia.png',	'Lettonie',	'Riga',	'19 Mai'),
(10,	'Flag_of_South_Africa.png',	'Afrique du sud',	'Le Cap',	'2 Juin'),
(11,	'Flag_of_Germany.png',	'Allemagne',	'Estering',	'16 Juin'),
(12,	'Flag_of_Portugal.png',	'Portugal',	'Montalegre',	'30 Juin'),
(14,	'Flag_of_Belgium.png',	'asdf',	'assef',	'asdf');

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL COMMENT 'url logo constructeur',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `teams` (`id`, `name`, `manufacturer`) VALUES
(1,	'VBR-X',	'peugeot-logo.svg'),
(2,	'BRX 1',	'mini-logo.svg'),
(3,	'BRX 2',	'audi-logo.svg'),
(4,	'VBR-Y',	'seat-logo.svg'),
(5,	'RXite',	'mini-logo.svg'),
(8,	'Les loulous',	'ford-logo.svg');

-- 2023-07-21 15:41:22