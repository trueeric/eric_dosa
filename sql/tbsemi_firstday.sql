/*
Navicat MySQL Data Transfer

Source Server         : mysql2_ro
Source Server Version : 50635
Source Host           : localhost:3306
Source Database       : studentaffair

Target Server Type    : MYSQL
Target Server Version : 50635
File Encoding         : 65001

Date: 2018-05-10 06:01:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbsemi_firstday
-- ----------------------------
DROP TABLE IF EXISTS `tbsemi_firstday`;
CREATE TABLE `tbsemi_firstday` (
  `sn` mediumint(4) unsigned NOT NULL AUTO_INCREMENT,
  `sch_year` smallint(3) unsigned DEFAULT NULL,
  `semi` tinyint(2) unsigned DEFAULT NULL,
  `first_day` date DEFAULT NULL,
  `recdate` date DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
