/*
Navicat MySQL Data Transfer

Source Server         : 01_ve26
Source Server Version : 50637
Source Host           : 192.168.1.26:3306
Source Database       : std_basic

Target Server Type    : MYSQL
Target Server Version : 50637
File Encoding         : 65001

Date: 2018-06-04 17:12:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbclassname
-- ----------------------------
DROP TABLE IF EXISTS `tbclassname`;
CREATE TABLE `tbclassname` (
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
