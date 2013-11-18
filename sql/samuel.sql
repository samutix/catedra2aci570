SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `categories` (`id`, `name`, `is_active`, `created`, `modified`) VALUES
(1, 'CakePHP', 1, '0000-00-00 00:00:00', '2013-11-16 19:16:22'),
(2, 'PHP', 1, '0000-00-00 00:00:00', '2013-11-16 18:19:08'),
(3, 'holi', 1, '2013-11-16 10:32:42', '2013-11-16 10:32:42'),
(4, 'Emprendedores', 1, '2013-11-16 19:26:07', '2013-11-16 19:26:07'),
(5, 'Donantes', 1, '2013-11-16 19:26:20', '2013-11-16 19:26:28');

CREATE TABLE IF NOT EXISTS `contributors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `reward_id` int(10) unsigned NOT NULL,
  `amount` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`reward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `contributors` (`id`, `user_id`, `reward_id`, `amount`, `created`, `modified`) VALUES
(1, 10, 1, 6.5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 12, 3, 6.99, '2013-11-17 00:04:32', '2013-11-17 00:06:23'),
(3, 11, 4, 1000, '2013-11-17 00:09:22', '2013-11-17 00:09:22');

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `messages` (`id`, `project_id`, `subject`, `message`, `created`, `modified`) VALUES
(1, 1, 'Hooli', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, '[ importante ] d:D', 'elorem dajkdflkcwrtmer', '2013-11-17 00:28:14', '2013-11-17 00:30:01');

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `viewed` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `notifications` (`id`, `message_id`, `user_id`, `viewed`, `created`, `modified`) VALUES
(1, 1, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 12, 1, '2013-11-17 00:51:49', '2013-11-17 00:51:49');

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `goat` float unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `category_id` (`category_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `projects` (`id`, `category_id`, `user_id`, `name`, `short_description`, `long_description`, `start_date`, `end_date`, `goat`, `is_active`, `created`, `modified`) VALUES
(1, 2, 10, 'Super proyecto', 'El mah proh', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-11-04', '2013-11-28', 100.25, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 11, 'holi', 'mini descripcion', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-11-16', '2033-01-31', 30.3, 1, '2013-11-16 19:09:35', '2013-11-16 19:15:50');

CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(10) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  `max_allowed` int(11) unsigned NOT NULL,
  `amount` float NOT NULL,
  `order` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `rewards` (`id`, `project_id`, `description`, `max_allowed`, `amount`, `order`, `created`, `modified`) VALUES
(1, 1, 'hi, this is a reward', 5, 1.3, 3.9, '2013-11-01 00:00:00', '2013-11-30 00:00:00'),
(3, 2, 'qwqewqqweewq', 123, 12.3, 6.9, '2013-11-16 22:21:34', '2013-11-16 22:22:38'),
(4, 1, 'dasda', 1, 12.12, 24.42, '2013-11-17 00:08:40', '2013-11-17 00:08:40');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `is_active`, `is_admin`, `created`, `modified`) VALUES
(10, 'elvis@elvis', 'efc7a7c9f4a115af752701943ec395a290657ccd', 'elvishjk', 'lindi', 1, 0, '2013-11-16 07:45:05', '2013-11-16 10:17:09'),
(11, 'hola@hola', 'd89c60ba810c80b23d29ec0661d007377fe97c8a', 'hola', 'chao', 1, 1, '2013-11-16 07:48:44', '2013-11-16 07:48:44'),
(12, 'chao@chao', '004f03533d9c15121bc1b88a83d20a765bb66924', 'chao', 'hola', 1, 0, '2013-11-16 07:50:10', '2013-11-16 19:16:37'),
(13, 'el@inactivofeo', '3d69e3db4713a3f6962ccf064ba41cfcd321324e', 'inactivo', 'lindiperofeo', 0, 0, '2013-11-17 00:03:27', '2013-11-17 00:03:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
