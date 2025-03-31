-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 24 Mai 2016 à 14:39
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `medical`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_A` varchar(255) NOT NULL,
  `EMAIL_A` varchar(255) NOT NULL,
  `PASSWORD_A` varchar(255) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `NOM_A`, `EMAIL_A`, `PASSWORD_A`) VALUES
(1, 'Mr.Admin', 'admin@medico.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `chambre_id` int(11) NOT NULL AUTO_INCREMENT,
  `num_chambre` int(11) NOT NULL,
  `num_etage` int(11) NOT NULL,
  `etat_ocupation` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`chambre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`chambre_id`, `num_chambre`, `num_etage`, `etat_ocupation`, `description`) VALUES
(1, 1, 1, 0, 'info'),
(2, 2, 1, 0, 'info'),
(3, 3, 1, 0, 'info'),
(4, 4, 1, 0, 'info\r\n'),
(5, 5, 1, 0, 'info'),
(6, 6, 1, 0, 'info\r\n'),
(7, 7, 1, 0, 'info'),
(8, 8, 1, 0, 'info'),
(9, 9, 1, 0, 'info'),
(10, 10, 1, 0, 'info');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `ID_CONSULTATION` int(11) NOT NULL AUTO_INCREMENT,
  `PATIENT_ID` int(11) NOT NULL,
  `MEDECIN_ID` int(11) NOT NULL,
  `INFRMIERE_ID` int(11) NOT NULL,
  `DATE_C` date NOT NULL,
  `DESCRIPTION_C` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_CONSULTATION`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `consultation`
--

INSERT INTO `consultation` (`ID_CONSULTATION`, `PATIENT_ID`, `MEDECIN_ID`, `INFRMIERE_ID`, `DATE_C`, `DESCRIPTION_C`) VALUES
(1, 3, 3, 1, '2016-05-11', 'info'),
(2, 3, 3, 1, '2016-05-12', 'info');

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisation`
--

CREATE TABLE IF NOT EXISTS `hospitalisation` (
  `hospitalisation_id` int(11) NOT NULL AUTO_INCREMENT,
  `PATIENT_ID` int(11) NOT NULL,
  `n_chambre` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`hospitalisation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `hospitalisation`
--

INSERT INTO `hospitalisation` (`hospitalisation_id`, `PATIENT_ID`, `n_chambre`, `date_debut`, `date_fin`) VALUES
(1, 3, 1, '2016-05-06', '2016-05-20');

-- --------------------------------------------------------

--
-- Structure de la table `infirmiere`
--

CREATE TABLE IF NOT EXISTS `infirmiere` (
  `INFRMIERE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_I` varchar(255) NOT NULL,
  `EMAIL_I` varchar(255) NOT NULL,
  `PASSWORD_I` varchar(255) NOT NULL,
  `ADRESSE_I` varchar(255) NOT NULL,
  `MOBILE_I` varchar(255) NOT NULL,
  PRIMARY KEY (`INFRMIERE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `infirmiere`
--

INSERT INTO `infirmiere` (`INFRMIERE_ID`, `NOM_I`, `EMAIL_I`, `PASSWORD_I`, `ADRESSE_I`, `MOBILE_I`) VALUES
(1, 'Hamza', 'hamza@medico.com', '8950259507cd8ce2a99f8b94674f2b77', 'Tablat,Medea,Algerie', '0553783821'),
(2, 'Amar', 'amar@medico.com', '36341cbb9c5a51ba81e855523de49dfd', 'Tablat ,medea , algerie', '0552589592'),
(3, 'Rachid', 'rachid@medical.com', '0d2ece888a960b5f0351b27fea74e747', 'Medea, Algerie', '0553659874'),
(4, 'Bilal', 'bilal@medico.com', '5ae1c881ad1d8d750f15c232a3232379', 'Medea,Algerie', '0778986532');

-- --------------------------------------------------------

--
-- Structure de la table `inf_emp`
--

CREATE TABLE IF NOT EXISTS `inf_emp` (
  `inf_emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_I` varchar(255) NOT NULL,
  `DATE_emp` date NOT NULL,
  `TEMPS_d_emp` time NOT NULL,
  `TEMPS_f_emp` time NOT NULL,
  `DESCREPTION` varchar(255) NOT NULL,
  PRIMARY KEY (`inf_emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `inf_emp`
--

INSERT INTO `inf_emp` (`inf_emp_id`, `NOM_I`, `DATE_emp`, `TEMPS_d_emp`, `TEMPS_f_emp`, `DESCREPTION`) VALUES
(1, 'Hamza', '2016-05-24', '10:00:00', '16:00:00', 'info\r\n'),
(2, 'Hamza', '2016-05-20', '12:00:00', '05:00:00', 'info\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `MEDECIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SERVICE_ID` int(11) NOT NULL,
  `NOM_M` varchar(255) NOT NULL,
  `EMAIL_M` varchar(255) NOT NULL,
  `PASSWORD_M` varchar(255) NOT NULL,
  `ADRESSE_M` varchar(255) NOT NULL,
  `MOBILE_M` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  PRIMARY KEY (`MEDECIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`MEDECIN_ID`, `SERVICE_ID`, `NOM_M`, `EMAIL_M`, `PASSWORD_M`, `ADRESSE_M`, `MOBILE_M`, `profile`) VALUES
(1, 2, 'Dr.Ahmed', 'ahmed@medico.com', '9193ce3b31332b03f7d8af056c692b84', 'rue 1 nouvebre 1954,Medea, Algerie', '0665543265', 'info'),
(2, 0, 'Dr.Mohamed', 'mohamed@medico.com', '309cd3800aacbd003ac36199fa537295', 'Medea, Algerie', '0775786934', 'info'),
(3, 0, 'Dr.Fethi', 'fethi@medico.com', 'c7a75ed80463fa35c64e78dcf28312f0', 'Medea,Algerie', '0699345483', 'info');

-- --------------------------------------------------------

--
-- Structure de la table `med_emp`
--

CREATE TABLE IF NOT EXISTS `med_emp` (
  `med_emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_M` varchar(255) NOT NULL,
  `NOM_S` varchar(255) NOT NULL,
  `DATE_emp` date NOT NULL,
  `TEMPS_d_emp` time NOT NULL,
  `TEMPS_f_emp` time NOT NULL,
  `DESCREPTION` varchar(255) NOT NULL,
  PRIMARY KEY (`med_emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `med_emp`
--

INSERT INTO `med_emp` (`med_emp_id`, `NOM_M`, `NOM_S`, `DATE_emp`, `TEMPS_d_emp`, `TEMPS_f_emp`, `DESCREPTION`) VALUES
(1, 'Dr.Fethi', 'Analyse', '2016-05-23', '08:00:00', '12:45:00', 'OpÃ©ration'),
(2, 'Dr.Fethi', 'OpÃ©ration', '2016-05-25', '09:25:00', '13:00:00', 'assistance'),
(3, 'Dr.Fethi', 'OpÃ©ration', '2016-05-27', '08:00:00', '19:00:00', 'controle');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_depart` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`notification_id`, `titre`, `description`, `date_depart`, `date_fin`) VALUES
(1, 'info', 'info', '2016-05-25', '2016-05-25');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `PATIENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_P` varchar(255) NOT NULL,
  `EMAIL_P` varchar(255) NOT NULL,
  `PASSWORD_P` varchar(255) NOT NULL,
  `MOBILE_P` varchar(255) NOT NULL,
  `SEXE` varchar(255) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  PRIMARY KEY (`PATIENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`PATIENT_ID`, `NOM_P`, `EMAIL_P`, `PASSWORD_P`, `MOBILE_P`, `SEXE`, `DATE_NAISSANCE`) VALUES
(1, 'Reda', 'reda@medico.com', '3de86576bd3033b6d462cdd9e6c14c8a', '0552326598', 'male', '2016-05-01'),
(2, 'Asma', 'asma@medico.com', 'f93a40ec0518673f1242ab46b844d919', '0669251487', 'female', '1994-05-06'),
(3, 'Tarek', 'tarek@medico.com', '175076f9a90d14a4823d64c7728610ae', '0664665402', 'male', '1994-08-13'),
(4, 'Karim', 'karim@medico.com', '2167a6ac80340b69f3b05b800417d6c7', '0552545856', 'male', '1999-05-04'),
(5, 'Morad', 'morad@medico.com', '6dfb208f5d7cb1fc573a8171a507f776', '0778986545', 'male', '2001-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE IF NOT EXISTS `rapport` (
  `ID_RAPPORT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CONSULTATION` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `DESCRIPTION_R` varchar(255) NOT NULL,
  `DATE_RAPPORT` date NOT NULL,
  PRIMARY KEY (`ID_RAPPORT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rapport`
--

INSERT INTO `rapport` (`ID_RAPPORT`, `ID_CONSULTATION`, `TYPE`, `DESCRIPTION_R`, `DATE_RAPPORT`) VALUES
(1, 1, 'opÃ©ration', 'info', '2016-05-25'),
(2, 2, 'deces', 'info', '2016-05-27');

-- --------------------------------------------------------

--
-- Structure de la table `receptionniste`
--

CREATE TABLE IF NOT EXISTS `receptionniste` (
  `RECEPTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_R` varchar(255) NOT NULL,
  `EMAIL_R` varchar(255) NOT NULL,
  `PASSWORD_R` varchar(255) NOT NULL,
  `ADRESSE_R` varchar(255) NOT NULL,
  `MOBILE_R` varchar(255) NOT NULL,
  PRIMARY KEY (`RECEPTION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `receptionniste`
--

INSERT INTO `receptionniste` (`RECEPTION_ID`, `NOM_R`, `EMAIL_R`, `PASSWORD_R`, `ADRESSE_R`, `MOBILE_R`) VALUES
(2, 'Ayoub', 'ayoub@medico.com', '25ae1b3ee9c85bbfa4da149f286b20f2', 'Medea,Algerie', '0699336699');

-- --------------------------------------------------------

--
-- Structure de la table `rec_emp`
--

CREATE TABLE IF NOT EXISTS `rec_emp` (
  `rec_emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_R` varchar(255) NOT NULL,
  `DATE_emp` date NOT NULL,
  `TEMPS_d_emp` time NOT NULL,
  `TEMPS_f_emp` time NOT NULL,
  `DESCREPTION` varchar(255) NOT NULL,
  PRIMARY KEY (`rec_emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rec_emp`
--

INSERT INTO `rec_emp` (`rec_emp_id`, `NOM_R`, `DATE_emp`, `TEMPS_d_emp`, `TEMPS_f_emp`, `DESCREPTION`) VALUES
(1, 'Ayoub', '2016-05-23', '08:00:00', '16:00:00', 'info'),
(2, 'Ayoub', '2016-05-27', '08:00:00', '16:00:00', 'info\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `ID_REND_VOUS` int(11) NOT NULL AUTO_INCREMENT,
  `MEDECIN_ID` int(11) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  `ETAT` varchar(255) NOT NULL,
  `DATE` date NOT NULL,
  `TEMPS` time NOT NULL,
  PRIMARY KEY (`ID_REND_VOUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`ID_REND_VOUS`, `MEDECIN_ID`, `PATIENT_ID`, `ETAT`, `DATE`, `TEMPS`) VALUES
(1, 3, 3, 'demander', '2016-05-25', '09:00:00'),
(2, 3, 3, 'demander', '2016-05-14', '09:00:00'),
(3, 3, 3, 'accepter', '2016-05-28', '08:00:00'),
(4, 3, 3, 'demander', '2016-05-27', '15:25:00');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `SERVICE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_S` varchar(255) NOT NULL,
  `DESCRIPTION_S` varchar(255) NOT NULL,
  PRIMARY KEY (`SERVICE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`SERVICE_ID`, `NOM_S`, `DESCRIPTION_S`) VALUES
(1, 'Analyse', 'info'),
(2, 'OpÃ©ration', 'info'),
(3, 'Urgence', 'info');

-- --------------------------------------------------------

--
-- Structure de la table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `system_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_system` varchar(255) NOT NULL,
  `txt_align` varchar(255) NOT NULL,
  PRIMARY KEY (`system_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `system`
--

INSERT INTO `system` (`system_id`, `name_system`, `txt_align`) VALUES
(1, 'medico', 'left-to-right');
