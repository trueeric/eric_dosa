CREATE TABLE `eric_dosa_login` (
  `sn` mediumint(6) unsigned NOT NULL AUTO_INCREMENT ,
  `uid` mediumint(6) DEFAULT NULL COMMENT '登入uid',
  `login_time` datetime DEFAULT NULL COMMENT '點閱時間',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE `eric_dosa_tbsemi_firstday` (
  `sn` mediumint(4) unsigned NOT NULL AUTO_INCREMENT,
  `sch_year` smallint(3) unsigned DEFAULT NULL COMMENT '學年',
  `semi` tinyint(2) unsigned DEFAULT NULL COMMENT '學期',
  `first_day` date DEFAULT NULL COMMENT '學期首日日期',
  `recdate` date DEFAULT NULL COMMENT '入檔日期',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE `eric_dosa_staff_link` (
  `sn` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `uid` smallint(4) unsigned DEFAULT NULL COMMENT '登入uid',
  `staff_no` smallint(6) DEFAULT NULL COMMENT '員工編號',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE `eric_dosa_staff_jobtitle` (
  `sn` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `staff_no` smallint(4) unsigned DEFAULT NULL COMMENT '員工𦄒號',
  `staff_name` varchar(255) DEFAULT NULL COMMENT '員工姓名',
  `job_title` varchar(255) DEFAULT NULL COMMENT '職銜',
  `jbo_title_code` smallint(4) unsigned DEFAULT NULL COMMENT '職銜代碼',
  `eric_dosa_check` tinyint(3) unsigned DEFAULT NULL COMMENT '身份代碼',
  `tutor_cls_stdno` varchar(255) DEFAULT NULL COMMENT '員工姓名',
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE `eric_dosa_content`  (
  `sn` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `input_stdno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '登錄班級(學號)',
  `std_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '學生學號',
  `staff_no` smallint(4) UNSIGNED NULL DEFAULT NULL COMMENT '登錄人代碼',
  `item_no` smallint(4) UNSIGNED NULL DEFAULT NULL COMMENT '項目代碼',
  `item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '登記項目',
  `item_date` date NULL DEFAULT NULL COMMENT '登記日期',
  `item_time` datetime(0) NULL DEFAULT NULL COMMENT '登記時間',
  `period` tinyint(2) unsigned DEFAULT NULL COMMENT '節次',
  `cate_no` tinyint(3) UNSIGNED NULL DEFAULT NULL COMMENT '種類代碼',
  `eclass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `c_class` varchar(255) DEFAULT NULL COMMENT '中文班別',
  `seat` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cls_tr_name` varchar(255) DEFAULT NULL COMMENT '課堂老師姓名',
  `cls_tr_staffcode` varchar(255) DEFAULT NULL COMMENT '課堂老師代碼',
  `cancel_reg_staff_no` varchar(255) DEFAULT NULL COMMENT '註銷人員代碼',
  `cancel_reg_date` date NULL DEFAULT NULL COMMENT '註銷日期',
  PRIMARY KEY (`sn`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci



CREATE TABLE `eric_dosa_files_center` (
`files_sn` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '檔案流水號',
`col_name` varchar(255) NOT NULL default '' COMMENT '欄位名稱',
`col_sn` smallint(5) unsigned NOT NULL default 0 COMMENT '欄位編號',
`sort` smallint(5) unsigned NOT NULL default 0 COMMENT '排序',
`kind` enum('img','file') NOT NULL default 'img' COMMENT '檔案種類',
`file_name` varchar(255) NOT NULL default '' COMMENT '檔案名稱',
`file_type` varchar(255) NOT NULL default '' COMMENT '檔案類型',
`file_size` int(10) unsigned NOT NULL default 0 COMMENT '檔案大小',
`description` text NOT NULL COMMENT '檔案說明',
`counter` mediumint(8) unsigned NOT NULL default 0 COMMENT '下載人次',
`original_filename` varchar(255) NOT NULL default '' COMMENT '檔案名稱',
`hash_filename` varchar(255) NOT NULL default '' COMMENT '加密檔案名稱',
`sub_dir` varchar(255) NOT NULL default '' COMMENT '檔案子路徑',
PRIMARY KEY (`files_sn`)
) ENGINE=MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE `eric_dosa_classname` (
  `sn` mediumint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '流水號',
  `dep` varchar(255) DEFAULT NULL   COMMENT '部別',
  `grade` varchar(255) DEFAULT NULL COMMENT '年級',
  `eclass` varchar(255) NOT NULL DEFAULT '' COMMENT '英文班别',
  `c_class` varchar(255) DEFAULT NULL COMMENT '中文班别',
  `std_no` varchar(255) DEFAULT NULL COMMENT '班級學號',
  `class_seat` varchar(255) DEFAULT NULL COMMENT '班級座號索引',
  `tutor_staff_code` smallint(4) unsigned DEFAULT NULL COMMENT '導師員工編號',
  `tutor_name` varchar(255) DEFAULT NULL COMMENT '導師姓名',
   PRIMARY KEY (`SN`)
 ) ENGINE=MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;
