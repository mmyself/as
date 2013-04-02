SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE IF NOT EXISTS `bidding` (
`bidding_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`bidding_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`bidding_date` date NOT NULL,
`bidding_user` int(11) unsigned DEFAULT NULL,
`bidding_name` text NOT NULL,
`bidding_title` text NOT NULL,
`bidding_teaser` text NOT NULL,
`bidding_text` text NOT NULL,
`bidding_url` varchar(128) NOT NULL,
PRIMARY KEY (`bidding_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `los` (
`los_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`los_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`los_bidding` int(11) unsigned DEFAULT NULL,
`los_name` text NOT NULL,
`los_title` text NOT NULL,
`los_teaser` text NOT NULL,
`los_text` text NOT NULL,
`los_url` varchar(128) NOT NULL,
PRIMARY KEY (`los_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `position` (
`position_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
`position_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`position_date` datetime NOT NULL,
`position_status` enum('new','approved','blocked') NOT NULL DEFAULT 'new',
`position_los` int(11) unsigned DEFAULT NULL,
`position_amount` int(11) unsigned DEFAULT NULL,
`position_title` text NOT NULL,
`position_teaser` text NOT NULL,
`position_text` text NOT NULL,
`position_url` varchar(128) NOT NULL,
`position_count` mediumint(8) unsigned NOT NULL,
PRIMARY KEY (`position_id`),
KEY `position_los` (`position_los`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tendering` (
`tendering_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`tendering_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`tendering_bidding` int(11) unsigned DEFAULT NULL,
`tendering_user` int(11) unsigned DEFAULT NULL,
`tendering_comment` text NOT NULL,
`tendering_price` float(8,2) unsigned DEFAULT NULL,
PRIMARY KEY (`tendering_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tendering_los` (
`tendering_los_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`tendering_los_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`tendering_los_bidding` int(11) unsigned DEFAULT NULL,
`tendering_los_user` int(11) unsigned DEFAULT NULL,
`tendering_los_comment` text NOT NULL,
`tendering_los_price` float(8,2) unsigned DEFAULT NULL,
PRIMARY KEY (`tendering_los_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tendering_position` (
`tendering_position_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`tendering_position_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`tendering_position_tendering` int(11) unsigned DEFAULT NULL,
`tendering_position_position` int(11) unsigned DEFAULT NULL,
`tendering_position_single_price` float(8,2) unsigned DEFAULT NULL,
`tendering_position_price` float(8,2) unsigned DEFAULT NULL,
`tendering_position_comment` text NOT NULL,
PRIMARY KEY (`tendering_position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`user_date` datetime NOT NULL,
`user_group` enum('guest','reader','editor','admin') NOT NULL DEFAULT 'reader',
`user_status` enum('approved','blocked') NOT NULL DEFAULT 'approved',
`user_name` varchar(64) NOT NULL,
`user_password` text NOT NULL,
`user_email` varchar(255) NOT NULL,
`user_website` varchar(255) NOT NULL,
`user_text` text NOT NULL,
`user_url` varchar(128) NOT NULL,
PRIMARY KEY (`user_id`),
UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


SET FOREIGN_KEY_CHECKS=1;