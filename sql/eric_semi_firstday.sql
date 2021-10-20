CREATE TABLE `tbsemi_firstday` (
  `sn` mediumint(4) unsigned NOT NULL AUTO_INCREMENT,
  `sch_year` smallint(3) unsigned DEFAULT NULL,
  `semi` tinyint(2) unsigned DEFAULT NULL,
  `first_day` date DEFAULT NULL,
  `recdate` date DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
