# phpMyAdmin MySQL-Dump
# version 2.3.2
# http://www.phpmyadmin.net/ (download page)
#
# Host: localhost
# Generation Time: Oct 24, 2002 at 02:46 AM
# Server version: 3.23.47
# PHP Version: 4.1.1
# Database : `phpauth`
# --------------------------------------------------------

#
# Table structure for table `admin`
#

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL auto_increment,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;

#
# Dumping data for table `admin`
#

INSERT INTO `admin` (`ID`, `username`, `password`, `email`) VALUES (1, 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'me@mysite.com');
# --------------------------------------------------------

#
# Table structure for table `counter`
#

CREATE TABLE `counter` (
  `counter` text NOT NULL
) TYPE=MyISAM;

#
# Dumping data for table `counter`
#

INSERT INTO `counter` (`counter`) VALUES ('0');
# --------------------------------------------------------

#
# Table structure for table `daily_hits`
#

CREATE TABLE `daily_hits` (
  `date` text NOT NULL,
  `ip` text NOT NULL
) TYPE=MyISAM;

#
# Dumping data for table `daily_hits`
#

# --------------------------------------------------------

#
# Table structure for table `site_info`
#

CREATE TABLE `site_info` (
  `ID` int(11) NOT NULL auto_increment,
  `url` text NOT NULL,
  `site_name` text NOT NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;

#
# Dumping data for table `site_info`
#

INSERT INTO `site_info` (`ID`, `url`, `site_name`) VALUES (1, 'http://www.mysite.com', 'My Website');
# --------------------------------------------------------

#
# Table structure for table `users`
#

CREATE TABLE `users` (
  `ID` int(11) NOT NULL auto_increment,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `mailing_list` text NOT NULL,
  `date` text NOT NULL,
  `last_login` text NOT NULL,
  `pass` text NOT NULL,
  `login_code` text NOT NULL,
  PRIMARY KEY  (`ID`)
) TYPE=MyISAM;

#
# Dumping data for table `users`
#

INSERT INTO `users` (`ID`, `username`, `password`, `email`, `mailing_list`, `date`, `last_login`, `pass`, `login_code`) VALUES (1, 'user', '1a1dc91c907325c69271ddf0c944bc72', 'user@host.com', '0', '24/10/2002', '00/00/00', 'pass', '456user');
# --------------------------------------------------------

#
# Table structure for table `usersonline`
#

CREATE TABLE `usersonline` (
  `timestamp` int(15) NOT NULL default '0',
  `ip` varchar(40) NOT NULL default '',
  `file` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`timestamp`),
  KEY `ip` (`ip`),
  KEY `file` (`file`)
) TYPE=MyISAM;

#
# Dumping data for table `usersonline`
#

INSERT INTO `usersonline` (`timestamp`, `ip`, `file`) VALUES (1035423939, '127.0.0.1', 'Mailing List');

