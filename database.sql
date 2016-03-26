Database
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.5051
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for scm_faq
CREATE DATABASE IF NOT EXISTS `scm_faq` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `scm_faq`;

-- Dumping structure for table scm_faq.answered_questions
CREATE TABLE IF NOT EXISTS `answered_questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `answer_id` int(10) unsigned NOT NULL,
  `status` enum('resolved','pending','obsolete','wrong_answer') NOT NULL DEFAULT 'pending',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_answered_questions_question` (`question_id`),
  KEY `fk_answered_questions_answer` (`answer_id`),
  CONSTRAINT `fk_answered_questions_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_answered_questions_answer` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.answered_questions_comments
CREATE TABLE IF NOT EXISTS `answered_questions_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answered_question_id` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_answered_questions_comments_answered_question` (`answered_question_id`),
  CONSTRAINT `fk_answered_questions_comments_answered_question` FOREIGN KEY (`answered_question_id`) REFERENCES `answered_questions` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer` longtext NOT NULL,
  `voted_up` smallint(5) unsigned NOT NULL DEFAULT '0',
  `voted_down` smallint(5) unsigned NOT NULL DEFAULT '0',
  `response_by_user_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.business_flows
CREATE TABLE IF NOT EXISTS `business_flows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL COMMENT 'This can be used for example in supplier order to assign the type client',
  `flow_name` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_business_flows_business_flow` (`parent_id`),
  CONSTRAINT `fk_business_flows_business_flow` FOREIGN KEY (`parent_id`) REFERENCES `business_flows` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.business_flow_questions
CREATE TABLE IF NOT EXISTS `business_flow_questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `business_flow_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_business_flow_questions_business_flow` (`business_flow_id`),
  KEY `fk_business_flow_questions_question` (`question_id`),
  CONSTRAINT `fk_business_flow_questions_business_flow` FOREIGN KEY (`business_flow_id`) REFERENCES `business_flows` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_business_flow_questions_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short_version_question` varchar(250) NOT NULL,
  `long_version_question` longtext,
  `asked_by_user_id` int(11) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.question_routes
CREATE TABLE IF NOT EXISTS `question_routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(10) unsigned NOT NULL,
  `route_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_question_routes_question` (`question_id`),
  KEY `fk_question_routes_route` (`route_id`),
  CONSTRAINT `fk_question_routes_question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_routes_route` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table scm_faq.routes
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_name` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

---------------------------------------------------------------------------------
