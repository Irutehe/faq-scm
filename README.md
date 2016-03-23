# faq-scm
This is intended to be an open project for Symfony Framework

FAQ Bundle

Authentication will be LDAP based, with rights to write new issues/questions for everyone and rights to answer for support and admins(devs/qa)
Context based FAQ:
on every page there will be floating button that will start the faq in a popup (using UI bundle?)
every route should be part of a at least one business flow (availability, order, offers ...?bundles?). I think the best way to group this is by using tree logic. For pages like dashboard, administration there will be point 3.
the system will know from what route the FAQ was started and will show related FAQs
 A page where you can choose the business flow you need help with(should be easily accessible if not called first), however this should only be first page shown if the call was made from pages outside business flow(dashboard, administration tools ...)
A search field(string with regex) that should order results based on the selected flow, if any.
Results should be shown as a chat(question/issue vs. answer)
Possibility to add issues inside a flow
Once the issue is written the system should check for duplicates
Possibility to add use cases for each business flow(a kind of unit testing, ATF?) this needs more thinking, related with point 12.
Possibility to add text/html/video answers
Thumbs up or down on issues/answers with count
A wizard that will help narrow down the problem(example when adding an issue in Supplier Order flow: Have you Sent the orders? Y | Is the order confirmed? N | Write your issue here.)
The same wizard can be used to find context based answers instead of just typing it in the search field.
Ability to write both Business oriented answers/wizard and technical oriented answers and to show them in relation to current user.



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


Tasks:

Set up a floating form, to the right of the screen, with a search field, a + button(add), an ‘eye’ button(view), a tool button(only visible to admins)

Add functionality for + button:

    if user is not support, should be able to post a question
    input fields for entity of table questions: 
    question short
    question long
    validate entity:
    short question is mandatory
    save entity (questions):
    short question
    long question
    asked by user id
    created
    modified
    save entity (question_routes):
    question id
    route id
    v2 we want to have a validation that will search for nearly identical questions and ask the user if any of those questions are the same as his… linked to search

Add functionality for view button:

    view a list of questions posted for the current route with the following details:
    short question
    answer (trim with link to whole answer if longer than….)
    answer status
    number of thumbs up for answer
    number of thumbs down for answer
    for unanswered question there should be a + button(add answer) 
    this button will allow devs/support to answer questions. when pressed a pop-up form should display the following fields:
    answer - this should allow html
    validate entity (answers):
    answer is mandatory and should have more than 50 characters?
    save entity (answers)
    answer
    response by user id
    created
    modified
    save entity (answered_questions)
    answer_id
    question_id
    status - should be pending if just answered
    created
    modified
    v2 ability to upload documents(pdf, doc)/pictures (jpg)/movies (anything html5 compatible)

Add functionality for search field:

    we search for questions and answers with each submitted word return them and in the following order(we should develop some kind of score):
    questions answered in current route, the more thumbs up the higher the placement and with:
    status resolved
    status pending
    status obsolete
    status wrong answer
    questions unanswered in current route - do we want to have thumbs up or down for questions as well?
    questions in the parents of the current business flow
    display the results using the view layout point 3

 Add functionalities to admin tool button:
 
    this should be an admin only visible button
    import routes from app
    v2 define business flows tree
    administer questions



