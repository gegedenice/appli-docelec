-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 09 Novembre 2016 à 18:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  'docelec'
--

-- --------------------------------------------------------

--
-- Structure de la table 'budget'
--

CREATE TABLE budget (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_ressource int(11) NOT NULL,
  prev_prix_devise_ht float(10,2) NOT NULL,
  prix_devise_ht float(10,2) NOT NULL,
  prev_taux_change float(10,2) NOT NULL,
  taux_change float(10,2) NOT NULL,
  prev_prix_euro_ht float(10,2) NOT NULL,
  prix_euro_ht float(10,2) NOT NULL,
  prev_taux_tva float(10,2) NOT NULL,
  taux_tva float(10,2) NOT NULL,
  prev_prix_ttc float(10,2) NOT NULL,
  prix_ttc float(10,2) NOT NULL,
  prev_taux_recup_tva float(10,2) NOT NULL,
  taux_recup_tva float(10,2) NOT NULL,
  prev_prix float(10,2) NOT NULL,
  prix float(10,2) NOT NULL,
  prev_comment text,
  comment text,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table 'budget'
--

INSERT INTO budget (id, id_ressource, prev_prix_devise_ht, prix_devise_ht, prev_taux_change, taux_change, prev_prix_euro_ht, prix_euro_ht, prev_taux_tva, taux_tva, prev_prix_ttc, prix_ttc, prev_taux_recup_tva, taux_recup_tva, prev_prix, prix, prev_comment, comment) VALUES
(2, 2, 20000.00, 23000.00, 1.60, 1.10, 26000.00, 25300.00, 20.00, 20.00, 31200.00, 30360.00, 22.68, 22.99, 30020.64, 29196.71, '', ''),
(3, 3, 25000.00, 30125.00, 1.20, 0.97, 30000.00, 29221.25, 20.00, 20.00, 36000.00, 35065.50, 22.67, 22.99, 34639.80, 33721.91, '', ''),
(4, 4, 10000.00, 11000.00, 1.00, 1.00, 10000.00, 11000.00, 20.00, 20.00, 12000.00, 13200.00, 0.00, 0.00, 12000.00, 13200.00, '', '');

--
-- Déclencheurs 'budget'
--
DROP TRIGGER IF EXISTS update_synthese_prix;
DELIMITER //
CREATE TRIGGER update_synthese_prix AFTER UPDATE ON budget
 FOR EACH ROW BEGIN

UPDATE synthese,budget SET synthese.prix = budget.prix WHERE synthese.id_ressource = budget.id_ressource;

UPDATE synthese,budget SET synthese.ratio_prix_telechargement = budget.prix / synthese.telechargements WHERE synthese.id_ressource = budget.id_ressource;

UPDATE synthese,budget SET synthese.diff_prev = budget.prix - budget.prev_prix WHERE synthese.id_ressource = budget.id_ressource;


END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table 'disciplines'
--

CREATE TABLE IF NOT EXISTS disciplines (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table 'disciplines'
--

INSERT INTO disciplines (id, nom) VALUES
(1, 'Chimie'),
(2, 'Physique'),
(3, 'Sociologie');

-- --------------------------------------------------------

--
-- Structure de la table 'ressources'
--

CREATE TABLE IF NOT EXISTS ressources (
  id int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  niveau varchar(20) NOT NULL,
  discipline int(11) NOT NULL,
  url varchar(50) DEFAULT NULL,
  login varchar(50) DEFAULT NULL,
  mdp varchar(50) DEFAULT NULL,
  mail varchar(50) DEFAULT NULL,
  comment text,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table 'ressources'
--

INSERT INTO ressources (id, nom, niveau, discipline, url, login, mdp, mail, comment) VALUES
(2, 'ACS', 'Recherche', 1, '', '', '', '', 'test'),
(3, 'AIP', 'Recherche', 2, '', '', '', '', ''),
(4, 'Socindex', 'Pedagogie', 3, '', '', '', '', '');

--
-- Déclencheurs 'ressources'
--
DROP TRIGGER IF EXISTS ajout;
DELIMITER //
CREATE TRIGGER ajout AFTER INSERT ON ressources
 FOR EACH ROW BEGIN

       INSERT INTO budget(id_ressource,taux_tva) VALUES (NEW.id,'20.00');

       INSERT INTO telechargements(id_ressource) VALUES (NEW.id);
       
       INSERT INTO synthese(id_ressource) VALUES (NEW.id);
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS delete;
DELIMITER //
CREATE TRIGGER delete AFTER DELETE ON ressources
 FOR EACH ROW BEGIN

       DELETE FROM budget WHERE id_ressource=OLD.Id;

       DELETE FROM telechargements WHERE id_ressource=OLD.Id;
       
        DELETE FROM synthese WHERE id_ressource=OLD.Id;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table 'synthese'
--

CREATE TABLE IF NOT EXISTS synthese (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_ressource int(11) NOT NULL,
  prix float(10,2) NOT NULL,
  diff_prev float(10,2) NOT NULL,
  telechargements int(11) NOT NULL,
  ratio_prix_telechargement float(10,2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table 'synthese'
--

INSERT INTO synthese (id, id_ressource, prix, diff_prev, telechargements, ratio_prix_telechargement) VALUES
(2, 2, 29196.71, -823.93, 2813, 10.38),
(3, 3, 33721.91, -917.89, 2514, 13.41),
(4, 4, 13200.00, 1200.00, 602, 21.93);

-- --------------------------------------------------------

--
-- Structure de la table 'telechargements'
--

CREATE TABLE IF NOT EXISTS telechargements (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_ressource int(11) NOT NULL,
  janvier int(11) NOT NULL,
  fevrier int(11) NOT NULL,
  mars int(11) NOT NULL,
  avril int(11) NOT NULL,
  mai int(11) NOT NULL,
  juin int(11) NOT NULL,
  juillet int(11) NOT NULL,
  aout int(11) NOT NULL,
  septembre int(11) NOT NULL,
  octobre int(11) NOT NULL,
  novembre int(11) NOT NULL,
  decembre int(11) NOT NULL,
  comment text,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table 'telechargements'
--

INSERT INTO telechargements (id, id_ressource, janvier, fevrier, mars, avril, mai, juin, juillet, aout, septembre, octobre, novembre, decembre, comment) VALUES
(2, 2, 10, 20, 30, 520, 254, 253, 20, 354, 204, 128, 562, 458, 'test'),
(3, 3, 125, 258, 300, 412, 214, 120, 60, 40, 251, 267, 269, 198, ''),
(4, 4, 52, 58, 36, 44, 54, 56, 32, 89, 14, 45, 54, 68, 'Stats non fiables');

--
-- Déclencheurs 'telechargements'
--
DROP TRIGGER IF EXISTS update_synthese_ydt;
DELIMITER //
CREATE TRIGGER update_synthese_ydt AFTER UPDATE ON telechargements
 FOR EACH ROW BEGIN

UPDATE synthese,telechargements SET synthese.telechargements = telechargements.janvier + telechargements.fevrier + telechargements.mars + telechargements.avril + telechargements.mai + telechargements.juin + telechargements.juillet + telechargements.aout + telechargements.septembre + telechargements.octobre + telechargements.novembre + telechargements.decembre WHERE telechargements.id_ressource = synthese.id_ressource;

UPDATE synthese SET ratio_prix_telechargement = prix / telechargements;

END
//
DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
