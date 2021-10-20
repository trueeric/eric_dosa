CREATE TABLE `tbclassname_test` (
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Serial_No` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `Dep` varchar(255) DEFAULT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `Eclass` varchar(255) NOT NULL DEFAULT '',
  `CClass` varchar(255) DEFAULT NULL,
  `StdNo` varchar(255) DEFAULT NULL,
  `ClassSeat` varchar(255) DEFAULT NULL,
  `ClassLeader` smallint(3) unsigned DEFAULT NULL,
  `tutor_staff_code` smallint(4) unsigned DEFAULT NULL,
  `TutorName` varchar(255) DEFAULT NULL,
  `Memnum` tinyint(2) NOT NULL DEFAULT '0',
  `NightClass1` varchar(255) DEFAULT NULL COMMENT '夜自習1-4合班',
  `Nightclass_5` varchar(255) DEFAULT NULL COMMENT '夜自習周五',
  PRIMARY KEY (`Serial_No`),
  UNIQUE KEY `Indexeclass` (`Eclass`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;