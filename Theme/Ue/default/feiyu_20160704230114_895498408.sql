/* This file is created by MySQLReback 2016-07-04 23:01:14 */
 /* 创建表结构 `think_ad` */
 DROP TABLE IF EXISTS `think_ad`;/* MySQLReback Separation */ CREATE TABLE `think_ad` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `creattime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_ad_list` */
 DROP TABLE IF EXISTS `think_ad_list`;/* MySQLReback Separation */ CREATE TABLE `think_ad_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `value` varchar(200) NOT NULL,
  `creattime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `creattime` (`creattime`),
  UNIQUE KEY `value` (`value`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_admin` */
 DROP TABLE IF EXISTS `think_admin`;/* MySQLReback Separation */ CREATE TABLE `think_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `logintime` varchar(200) NOT NULL,
  `loginip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_admin` */
 INSERT INTO `think_admin` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','','','0','0','1467644218','0.0.0.0');/* MySQLReback Separation */
 /* 创建表结构 `think_category` */
 DROP TABLE IF EXISTS `think_category`;/* MySQLReback Separation */ CREATE TABLE `think_category` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `module` varchar(15) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `linktop` int(10) DEFAULT NULL,
  `arrparentid` varchar(255) DEFAULT NULL,
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `arrchildid` mediumtext,
  `catname` varchar(30) NOT NULL,
  `style` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `parentdir` varchar(100) DEFAULT NULL,
  `catdir` varchar(30) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `items` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `setting` mediumtext NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sethtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `letter` varchar(30) DEFAULT NULL,
  `usable_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catid`),
  KEY `module` (`module`,`parentid`,`listorder`,`catid`),
  KEY `siteid` (`siteid`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_category` */
 INSERT INTO `think_category` VALUES ('72','0','page','0','0','0','80','0','0','','关于我们','about','','','','','','','0','0','','50','1','0','','1'),('73','0','news','0','0','0','81','0','0','','新闻资讯','news','','','','','','','0','0','','50','1','0','','1'),('74','0','page','0','0','0','82','0','0','','投资领域','investment','','','','','','','0','0','','50','1','0','','1'),('75','0','page','0','0','0','83','0','0','','企业文化','culture','','','','','','','0','0','','50','1','0','','1'),('76','0','page','0','0','0','84','0','0','','社会责任','responsibility','','','','','','','0','0','','50','1','0','','1'),('77','0','page','0','0','0','85','0','0','','发展战略','development','','','','','','','0','0','','50','1','0','','1'),('78','0','page','0','0','0','86','0','0','','人力资源','hr','','','','','','','0','0','','50','1','0','','1'),('79','0','page','0','0','0','87','0','0','','联系我们','contact','','','','','','','0','0','','50','1','0','','1'),('80','0','page','0','0','72','1','72','0','','公司简介','about','','','','','','','0','0','','1','1','0','','1'),('81','0','news','0','0','73','1','73','0','','公司新闻','news','','','','','','','0','0','','1','1','0','','1'),('82','0','page','0','0','74','102','74','0','','工业电气','investment','','','','','','','0','0','','1','1','0','','1'),('83','0','page','0','0','75','1','75','0','','文化理念','culture1','','','','','','','0','0','','1','1','0','','1'),('84','0','news','0','0','76','1','76','0','','员工关怀','responsibility','','','','','','','0','0','','1','1','0','','1'),('85','0','page','0','0','77','1','77','0','','发展战略','development','','','','','','','0','0','','1','1','0','','1'),('86','0','page','0','0','78','1','78','0','','人才理念','hr','','','','','','','0','0','','1','1','0','','1'),('87','0','page','0','0','79','1','79','0','','联系方式','contact','','','','','','','0','0','','1','1','0','','1'),('103','0','page','0','0','82','0','74','0','','飞宇重工','investment','','','','','','','0','0','','50','1','0','','1'),('88','0','page','0','0','72','0','72','0','','董事长致辞','about','','','','','','','0','0','','2','1','0','','1'),('89','0','page','0','0','72','0','72','0','','组织架构','about','','','','','','','0','0','','3','1','0','','1'),('90','0','news','0','0','72','0','72','0','','精英团队','about_td','','','','','','','0','0','','4','1','0','','1'),('91','0','news','0','0','72','0','72','0','','荣誉资质','about_ry','','','','','','','0','0','','5','1','0','','1'),('92','0','news','0','0','72','0','72','0','','领导关怀','about_gh','','','','','','','0','0','','6','1','0','','1'),('93','0','news','0','0','73','0','73','0','','行业新闻','news','','','','','','','0','0','','50','1','0','','1'),('94','0','news','0','0','73','0','73','0','','集团公告','news','','','','','','','0','0','','50','1','0','','1'),('96','0','news','0','0','73','0','73','0','','媒体播报','news','','','','','','','0','0','','50','1','0','','1'),('97','0','news','0','0','73','0','73','0','','交流合作','news_hz','','','','','','','0','0','','50','1','0','','1'),('98','0','page','0','0','74','105','74','0','','商业地产','investment','','','','','','','0','0','','2','1','0','','1'),('99','0','page','0','0','74','107','74','0','','实业投资','investment','','','','','','','0','0','','50','1','0','','1'),('100','0','page','0','0','74','0','74','0','','产业综合体','investment','','','','','','','0','0','','50','1','0','','1'),('101','0','page','0','0','82','0','74','0','','飞宇实业','investment','','','','','','','0','0','','2','1','0','','1'),('102','0','page','0','0','82','1','74','0','','平开集团','investment','','','','','','','0','0','','1','1','0','','1'),('104','0','page','0','0','82','0','74','0','','嘉宏实业','investment','','','','','','','0','0','','50','1','0','','1'),('105','0','page','0','0','98','1','74','0','','飞宇-平顶山国际汽贸城','investment','','','','','','','0','0','','50','1','0','','1'),('106','0','page','0','0','98','0','74','0','','飞宇-郑州五金机电市场','investment','','','','','','','0','0','','50','1','0','','1'),('107','0','page','0','0','99','1','74','0','','第三污水处理厂','investment','','','','','','','0','0','','50','1','0','','1'),('108','0','page','0','0','99','0','74','0','','红酒会所','investment','','','','','','','0','0','','50','1','0','','1'),('109','0','page','0','0','99','0','74','0','','南非','investment','','','','','','','0','0','','50','1','0','','1'),('110','0','page','0','0','75','0','75','0','','大事记','culture','','','','','','','0','0','','50','1','0','','1'),('111','0','news','0','0','76','0','76','0','','回报社会','responsibility','','','','','','','0','0','','2','1','0','','1'),('112','0','page','0','0','76','0','76','0','','社会责任观','responsibility1','','','','','','','0','0','','3','1','0','','1'),('113','0','news','0','0','77','0','77','0','','合作伙伴','development1','','','','','','','0','0','','50','1','0','','1');/* MySQLReback Separation */
 /* 插入数据 `think_category` */
 INSERT INTO `think_category` VALUES ('114','0','page','0','0','78','0','78','0','','社会招聘','hr','','','','','','','0','0','','50','1','0','','1');/* MySQLReback Separation */
 /* 插入数据 `think_category` */
 INSERT INTO `think_category` VALUES ('115','0','page','0','0','78','0','78','0','','员工培训','hr','','','','','','','0','0','','3','1','0','','1');/* MySQLReback Separation */
 /* 创建表结构 `think_catset_group` */
 DROP TABLE IF EXISTS `think_catset_group`;/* MySQLReback Separation */ CREATE TABLE `think_catset_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `catid` varchar(200) NOT NULL,
  `creattime` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_catset_list` */
 DROP TABLE IF EXISTS `think_catset_list`;/* MySQLReback Separation */ CREATE TABLE `think_catset_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `gid` int(20) NOT NULL,
  `catid` int(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `value` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` mediumtext,
  `img_title` varchar(200) DEFAULT NULL,
  `img_link` varchar(200) DEFAULT NULL,
  `text` mediumtext,
  `text_link` varchar(200) DEFAULT NULL,
  `creattime` int(20) NOT NULL,
  `orderlist` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_catset_list` */
 INSERT INTO `think_catset_list` VALUES ('1','0','0','img','index_banner','首页banner图片','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNalF2TWpBeE5qQTJNalF4TnpFME1ERmZOVEU1TG5CdVp3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmNHNW4lN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDNXJLZjZZQ2FMbkJ1WnclMjUzRCUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D%7C%7CMQ%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNalF2TWpBeE5qQTJNalF4TnpFME1ESmZOekV4TG5CdVp3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmNHNW4lN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDNkxDRDU2Q1VMbkJ1WnclMjUzRCUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466759646','0','1'),('8','80','80','img','about_banner','通用banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakV2TWpBeE5qQTJNakV4TmpRd05UUmZOVGcwTG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDWW1GdWJtVnlYekF6TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q1lXUmslN0NNUSUyNTNEJTI1M0Q%253D','','','','','1466498455','0','1'),('11','72','72','img','about_banner','关于我们banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakV2TWpBeE5qQTJNakV4TmpReU16VmZOek01TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDWW1GdWJtVnlYekF6TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q1lXUmslN0NNUSUyNTNEJTI1M0Q%253D','','','','','1466498557','0','1'),('12','73','73','img','new_banner','新闻资讯banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakV2TWpBeE5qQTJNakV4T0RNMU1EUmZOelExTG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDYm1WM2MySmhibTVsY2w4d015NXFjR2MlMjUzRCU3QyU3Q1lXUmslN0NNUSUyNTNEJTI1M0Q%253D','','','','','1466505306','0','1'),('14','101','101','img','inve_banner','投资领域banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TVRJM01EbGZOelUwTG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDTVMweE16RXhNall4U0ZKWE5UWXVhbkJuJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466566519','0','1'),('15','74','74','img','inve_banner','投资banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TVRNMk1UWmZNemd3TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDTVMweE16RXhNall4U0ZKWE5UWXVhbkJuJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466566579','0','1'),('16','75','75','img','cul_banner','企业文化banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TVRRM05UVmZOREV6TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDWW1GdWJtVnlOVjh3TXk1cWNHYyUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466567277','0','1'),('18','76','76','img','respon_banner','社会责任banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TkRFeE1EQmZOelV5TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDWW1GdWJtVnlObDh3TXk1cWNHYyUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466575861','0','1'),('19','77','77','img','develop_banner','发展战略','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TkRJeU5EWmZNekUzTG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDWW1GdWJtVnlOMTh3TXk1cWNHYyUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466576568','0','1'),('20','78','78','img','hr_banner','人才资源banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TnpFNE5UbGZNVFUzTG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDY21WdVkyRnBZbUZ1Ym1WeVh6QXpMbXB3WnclMjUzRCUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466587141','0','1'),('21','79','79','img','us_banner','联系我们banner','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzltWldsNWRTOW1hV3hsY3k4eE5qQTJNakl2TWpBeE5qQTJNakl4TnpRNU16TmZORFU0TG1wd1p3JTI1M0QlMjUzRCU3QyU3Q2RIbHdaUSUyNTNEJTI1M0QlN0NhVzFoWjJVdmFuQmxadyUyNTNEJTI1M0QlN0MlN0NibUZ0WlElMjUzRCUyNTNEJTdDWW1GdWJtVnlPRjh3TXk1cWNHYyUyNTNEJTdDJTdDWVdSayU3Q01RJTI1M0QlMjUzRA%253D%253D','','','','','1466588973','0','1');/* MySQLReback Separation */
 /* 插入数据 `think_catset_list` */
 INSERT INTO `think_catset_list` VALUES ('22','72','72','img','fff','fff','MA%253D%253D%7CXl5hcnJheV5iR2x1YXclMjUzRCUyNTNEJTdDYUhSMGNEb3ZMMnh2WTJGc2FHOXpkQzlvWlM5bWFXeGxjeTh4TmpBMk1qUXZNakF4TmpBMk1qUXhPRFUyTURsZk9ERXhMbkJ1WnclMjUzRCUyNTNEJTdDJTdDZEhsd1pRJTI1M0QlMjUzRCU3Q2FXMWhaMlV2Y0c1biU3QyU3Q2JtRnRaUSUyNTNEJTI1M0QlN0M1cHlxNXFDSDZhS1lMVEl1Y0c1biU3QyU3Q1lXUmslN0NNUSUyNTNEJTI1M0Q%253D','','','','','1466765770','0','1');/* MySQLReback Separation */
 /* 创建表结构 `think_hr` */
 DROP TABLE IF EXISTS `think_hr`;/* MySQLReback Separation */ CREATE TABLE `think_hr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) DEFAULT NULL,
  `salary` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `text` varchar(200) NOT NULL,
  `inputtime` int(10) NOT NULL,
  `style` varchar(20) NOT NULL,
  `workxz` varchar(20) NOT NULL COMMENT '工作性质',
  `workjy` varchar(25) NOT NULL COMMENT '工作经验',
  `study` varchar(25) NOT NULL COMMENT '最低学历',
  `number` int(10) NOT NULL COMMENT '招聘人数',
  `responsibilities` varchar(250) NOT NULL COMMENT '岗位职责',
  `ask` varchar(250) NOT NULL COMMENT '入职要求',
  `money` varchar(20) DEFAULT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `listorder` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_media` */
 DROP TABLE IF EXISTS `think_media`;/* MySQLReback Separation */ CREATE TABLE `think_media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `posids` int(10) DEFAULT NULL,
  `resource` text,
  `content` text,
  `listorder` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `inputtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `read` int(11) NOT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_member` */
 DROP TABLE IF EXISTS `think_member`;/* MySQLReback Separation */ CREATE TABLE `think_member` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `phpssouid` mediumint(8) unsigned NOT NULL,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `encrypt` char(6) NOT NULL,
  `nickname` char(20) NOT NULL,
  `reman` text NOT NULL,
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `lastdate` int(10) unsigned NOT NULL DEFAULT '0',
  `regip` char(15) NOT NULL DEFAULT '',
  `lastip` char(15) NOT NULL DEFAULT '',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0',
  `email` char(32) NOT NULL DEFAULT '',
  `groupid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `areaid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `amount` decimal(8,2) unsigned NOT NULL DEFAULT '0.00',
  `point` smallint(5) unsigned NOT NULL DEFAULT '0',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `message` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `vip` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `overduedate` int(10) unsigned NOT NULL DEFAULT '0',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '1',
  `connectid` char(40) NOT NULL DEFAULT '',
  `from` char(10) NOT NULL DEFAULT '',
  `mobile` char(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`(20)),
  KEY `phpssouid` (`phpssouid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_member_detail` */
 DROP TABLE IF EXISTS `think_member_detail`;/* MySQLReback Separation */ CREATE TABLE `think_member_detail` (
  `userid` int(20) NOT NULL,
  `headimgurl` varchar(200) DEFAULT NULL,
  `birthday` int(20) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_msg` */
 DROP TABLE IF EXISTS `think_msg`;/* MySQLReback Separation */ CREATE TABLE `think_msg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `channel` varchar(200) NOT NULL,
  `applytime` int(10) NOT NULL,
  `read` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_msg` */
 INSERT INTO `think_msg` VALUES ('16','dsaf','未填写','未填写','dsfa','','未填写','1466765379','0','0.0.0.0');/* MySQLReback Separation */
 /* 创建表结构 `think_news` */
 DROP TABLE IF EXISTS `think_news`;/* MySQLReback Separation */ CREATE TABLE `think_news` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(5) unsigned NOT NULL,
  `title` varchar(24) NOT NULL DEFAULT '',
  `style` char(24) NOT NULL DEFAULT '',
  `thumb` char(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` char(255) NOT NULL DEFAULT '',
  `posids` tinyint(1) unsigned DEFAULT '0',
  `url` char(100) NOT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(20) NOT NULL,
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `read` int(255) NOT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`,`listorder`,`id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  KEY `catid` (`catid`,`status`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('127','90','0','陈龙飞','','http://localhost/feiyu/files/160621/20160621145059_288.jpg','董事长','祖籍温州乐清市，现任河南飞宇控股（集团）有限公司董事长，河南省人大代表、平顶山市政...','0','','1','99','0','1','admin','1466491747','1466448540','<p>祖籍温州乐清市，现任河南飞宇控股有限公司董事长，河南省第十二届人大代表、平顶山市第七届政协常委、河南省浙江商会常务副会长、平顶山市温州商会名誉会长、新华区科技促进协会副理事长。</p>
<p>一、简介：来自温州乐清市的陈龙飞，在温商中被称为草根企业家，1970年出生的陈龙飞，早在1985年跟父辈就来到平顶山创业，从一个小小的电器个体工商户发展至目前拥有员工千余人，下属6家企业的一个大型企业，身为董事长的陈龙飞早已将触角伸向重工、机械、电气、电子、网游、房地产、投资等领域。</p>
<p>二、诚信经营：陈龙飞为人真诚不伪，诚信不欺，真实不妄，精诚不懈，他诚实并信守诺言，对员工、对朋友、对合作者、对关心和支持他事业的一切人士，对所有一切善良的人，待之以诚，用之以信。国无诚不兴，人无信不立；陈龙飞坚决反对无商不奸的歪理邪说，信守无信不立才是永远的真理，他坚信信是立身之本，更是立业之本。</p>
<p>三、投资项目：公司旗下产业有三大板块，第一是工业电气，目前全资公司有河南飞宇实业集团有限公司和平开电力设备集团有限公司；第二是商业地产，目前投资开发项目有：郑州-飞宇五金机电市场、平顶山-飞宇国际汽贸城、平顶山-新城区电力装备产业园等；第三是实业投资，目前投资有南非红酒、平顶山化工产业集聚区工业污水处理等项目。</p>
<p>四、公益事业：陈龙飞曾多次为市政府建设山顶公园和湛河治理工程及四川汶川灾区捐款，累计捐款金额达100多万元，同时向贫困灾区捐助了许多课桌、书籍等物品，救助贫困生达上百人。</p>
<p>陈龙飞在省委省政府领导的关心支持和帮助下，充分发挥温州人敢想、敢做、敢于创新的特点，努力把公司的各个项目建设成为温州人在中原地区的创新创业基地，为中原地区的经济建设和社会发展做出新的贡献。</p>
','57',''),('128','91','0','企业法人营业执照','','http://localhost/feiyu/files/160621/20160621151256_682.jpg','','1111...','0','','255','99','0','1','admin','1466493196','1466493196','','5',''),('129','91','0','组织机构代码证','','http://localhost/feiyu/files/160621/20160621151355_855.jpg','','22222...','0','','255','99','0','1','admin','1466493241','1466493241','','7',''),('130','92','0','省委常委、省委书记郭庚茂莅临飞','','http://localhost/feiyu/files/160621/20160621152257_605.jpg','','1...','0','','1','99','0','1','admin','1466493783','1466450580','<p>10月22日，河南省委常委、省委书记郭庚茂莅临飞宇控股旗下平开集团调研，郭书记对平开的发展给予充分的肯定并对集团未来寄予了厚望！郭书记一行激励了飞宇人，飞宇一定会再接再厉，全力付出投身河南的发展建设！</p>
<p>右二：河南省委书记郭庚茂；右一：平顶山市委书记陈建生；左二：平顶山市长张国伟；左一：飞宇控股董事长陈龙飞</p>','24',''),('131','81','0','热烈祝贺飞宇国际汽贸城盛大试营业','','','','4月21日，飞宇国际汽贸城举行了盛大的试营业开幕典礼、大学生创业孵化园授牌及佳田国际大酒店签约入驻，可谓三喜临门。河南飞宇投资控股有限公司总裁、飞宇国际汽贸城董事长陈荣跃，平顶山市人力资源和社会保障局局长付...','0','','1','99','0','1','admin','1466496829','1466453580','<p style=\"text-align: center; \"><img src=\"/feiyu/Uploads/160621/20160621182919_469.png\" style=\"letter-spacing: 0px; max-width: 100%;\"></p><p>4月21日，飞宇国际汽贸城举行了盛大的试营业开幕典礼、大学生创业孵化园授牌及佳田国际大酒店签约入驻，可谓三喜临门。河南飞宇投资控股有限公司总裁、飞宇国际汽贸城董事长陈荣跃，平顶山市人力资源和社会保障局局长付国文，高新区组织部部长徐战胜，高新区人力资源与社会保障局局长沈绪峰，平顶山市汽车服务业协会执行会长郭严强，郑州汽车服务业商会会长、郑州天荣汽配城总经理张东方，平顶山佳田国际大酒店总经理李皓出席了本次典礼。河南省汽车行业商会、河南省汽车摩托车服务业商会、郑州市机动车修配行业协会、平顶山市汽车行业协会、平顶山福建商会、平顶山温州商会代表以及平顶山晚报、中国平煤神马报、平顶山房产网、今日加油、发现传媒、千津传媒等各大媒体前往祝贺。</p><p><br></p>','14','');/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('133','92','0','123123123','','http://localhost/feiyu/files/160621/20160621175849_450.jpg','','123123123123','0','','255','99','0','1','admin','1466503134','1466503134','<p>123123123123123123</p>','2','');/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('134','93','0','西高院主办中国电器工业协会绝缘子避雷器分会六届二','','','','日前，由西高院主办的中国电器工业协会绝缘子避雷器分会六届二次会员大会在山东省临沂市召开。来自全国绝缘子避雷器行业的128个单位的160位代表参加了本次会议...','0','','255','99','0','1','admin','1466505152','1466505152','<p>日前，由西高院主办的中国电器工业协会绝缘子避雷器分会六届二次会员大会在山东省临沂市召开。来自全国绝缘子避雷器行业的128个单位的160位代表参加了本次会议。</p><p>工业和信息化部科技司张力超处长、国家能源局能源节约和科技装备司孙嘉弥副处长、国家电网公司科技部沈江副主任、中国机械工业联合会科技质量部何孔德高工、南方电网科学研究院高级专家蔡汉生、中国电器工业协会常务副会长杨启明等领导、专家出席大会并讲话。临沂市经信委主任王新生、临沂市兰山区副区长纪丙坤、协办单位山东合太恒科技股份有限公司董事长杨云铎出席了此次大会。挂靠在西高院的国家绝缘子避雷器质检中心避雷器检测室副主任李凡作了《从避雷器国家监督抽查实验看电阻片大电流冲击耐受性能》的报告。</p><p style=\"text-align: center; \"><img alt=\"\" src=\"http://www.feeyu.cn/uploads/allimg/131120/1_131120135854_1.jpg\" class=\"\"></p><p></p><p>大会通报了“中国电器工业协会绝缘子避雷器分会六届二次理事会纪要”，并且宣读了《中国电器工业协会绝缘子避雷器分会关于表彰2013年度先进会员单位的决定》，对10个先进会员单位予以表彰，并颁发了奖牌。大会书面报告了“2013年绝缘子避雷器分会工作总结及2014年工作要点”和“分会2013年1-8月经费收支情况”及“分会2014年经费收支预算”。</p><p><br></p>','2','');/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('135','94','0','零售O2O三个核心突破点','','','','在我的O2O从业和创业经历总结来分析，O2O在2014年即将实现三个核心突破点，从而真正实现线上电商平台和线下传统企业的融合，这种融合不仅有传统企业向上融合的努力，更重要的是线上电商企业向下的融合。这三个核心突破点分...','0','','255','99','0','1','admin','1466505248','1466505248','<p>在我的O2O从业和创业经历总结来分析，O2O在2014年即将实现三个核心突破点，从而真正实现线上电商平台和线下传统企业的融合，这种融合不仅有传统企业向上融合的努力，更重要的是线上电商企业向下的融合。这三个核心突破点分别是：</p><p>一、支付手段的统一：</p><p>无论在那个行业，一直以来线上和线下的支付手段都是分离的。线上从出现开始就在努力开发属于自己的支付手段。最早是C2C的在线支付，国外是Palpay，中国是支付宝。通过担保交易的方式使得在线支付手段被越来越多的消费者接受，从而引发电商的高速发展。后来C2B的出现则进一步从消费者出发设计了货到付款的支付手段，通过强调低价正品，一手交钱一手交货的模式使得网购的接受度普及得更快。在这两种主流电商模式下，中国网购份额在2013年已经逼近社会零售总额的8%!</p><p>以上两种支付手段也是随着一线城市刷卡的普及已经网上银行的普及同步推动的，而线下实体店的支付方式仍然以现金为主刷卡为辅。线上和线下支付手段一直处于平行方式，前者和银行直接连接，后者主要是银联POS机垄断。在这种情况下，线下企业在线上开展电商业务时只能分开来运营，因为它们必须遵循线上电商平台的支付方式，同时线下实体店也无法对接线上支付手段。</p><p>一方面是系统对接的复杂度，一方面是消费者由于安全和操作问题不可能通过店内提供的电脑进行在线支付，最后是那些开在商业地产大楼内的店中店也不可能对接线上支付手段，因为那些商业地产商不答应，这样会极大的损害它们的商业利益!显然线上的电商平台在支付方式上比线下支付手段对于消费者来说更快捷和安全，对于商家来说资金效率更高、成本更低。例如百货的集中POS收银对商家的扣点是10%～25%，回款周期60～90天，还是人工方式在回款让商家头疼不已;电商平台多数为5%，回款周期1～7天(视买家收货确认为准)，而且是系统自动结算。(B2C采购模式则和百货相近)</p><p>支付手段无法统一，O2O的线上线下融合就无法真正建立。于是像支付宝这样的在线支付工具着手开发支付宝POS，并希望渗透到线下的品牌商家，从而实现支付手段的统一，达到货款的统一管理。只是很遗憾，这种做法仍然侵害到商业地产商和银联的利益被强烈抵制。</p><p>实际上手机支付本来是可以实现线上和线下支付手段的统一，但运营商受限于体制和各种原因一直无法将手机支付大众化。或许微信的二维码微信支付可以温水煮青蛙，在消费者习惯培养形成后实现支付手段统一化，如果真是这样那微信确实可怕!</p><p>二、库存的同步：</p><p>这个突破点是建立在支付手段的统一上。现在线下实体店每销售一件商品通过POS和ERP或WMS管理系统，可以自动扣减库存。线上每销售一件商品也可以同样做到这一点，但是这两者并没有高效的融合，因为不仅线下渠道多样化，线上的销售平台和方式也呈现多样化。这样一来就增加了各个渠道和平台在系统对接的难度、高成本、准确度和及时性，所以到目前为止库存同步的问题一直没有得到很好地解决。</p><p>库存无法很好地同步使得商品管理只能分开，最终就是实体店退回变成库存，电商部分自建仓库又是一堆存货。或者是实体店货卖完了，却不知道电商仓库有多少货，也无法快速调配给各地实体店，反之亦然!由于库存无法同步，O2O中销售后检测最近库存地(实体店或仓库)以最低成本最短时间配送给消费者，产生售后也可以通过邮寄、到实体店或上门取货来实现的设计只能是美好的设想无法实现。</p><p>有什么方式可以更快更低成本地实现库存同步，或许可以把商家一端习惯的通过条形码改成商家和消费者都可以接受的二维码，实现线上线下共同的扫码购物，或许是一个好方式。</p><p>三、消费者的统一：</p><p>如何识别线下购物的人和回到家通过电脑、Pad、手机购物的是同一个人，这或许是许多商家很想知道的，因为这样一来才能做到真正的精准营销和提供线上线下一体化的会员服务，只是在现在的环境下，线下是无法轻易地让消费者提供其可供准确识别的信息，例如真实姓名、手机号或网络ID(微博微信号)，更别提家庭或单位地址了。而这些信息在网上却很容易获取，如何进行突破?单纯用促销激励政策或许对一部分消费者有效，但是对于所有消费者这部分想要统一几乎不太可能。</p><p></p><p>或许最后会像《少数派报告》的科幻电影一样，通过人脸或瞳孔识别摄像头判断是否同一个人的方式，来实现线下和线上消费者的统一。这听起来很科幻，但参加过深圳高交会和最近去过北京东直门来福士购物中心地下一楼体验过人脸识别摄像头和手势识别摄像头的朋友来说，实现消费者统一得到O2O的突破已经离我们很近很近了!&nbsp;</p><p><br></p>','0','');/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('136','96','0','河南一百度《企业家》专访飞宇控股总裁陈荣跃','','','','陈荣跃，飞宇控股集团总裁，河南平开电力设备集团有限公司任总裁、飞宇.平顶山国际汽贸城董事长兼总经理、飞宇.华中五金机电城董事长。另外还担任中国金融家俱乐部副会长一职。 他是温州乐清人，一名地地道道的浙江商人...','0','','255','99','0','1','admin','1466505357','1466505357','<p>陈荣跃，飞宇控股集团总裁，河南平开电力设备集团有限公司任总裁、飞宇.平顶山国际汽贸城董事长兼总经理、飞宇.华中五金机电城董事长。另外还担任中国金融家俱乐部副会长一职。</p><p>他是温州乐清人，一名地地道道的浙江商人。可他并没有温州炒房团那些泡沫、虚幻，不切实际，而是一步一脚印的点点积累，让企业在稳中发展。</p><p></p><p>众多的商业头衔，没有让陈荣跃成为不苟言笑的严肃商人。他热爱生活，唱歌，阅读、登山、旅游、红酒都是他的心头好。</p><p><br></p>','0',''),('137','97','0','河南贰仟家领导到飞宇汽贸城参观考察','','','','...','0','','255','99','0','1','admin','1466505695','1466505695','<p>9月12日，在平顶山飞宇国际汽贸城招商中心，迎来了贰仟家汽车服务股份有限公司总经理曹总、配件部总监刘总、润滑油总监郭总一行的参观考察。首先，在飞宇汽贸城招商中心曹总细细聆听了置业顾问对本项目的一一介绍，在介绍期间曹总频频点头称赞，对本项目的整体格局给予了充分的认可，并给出了很高的评价,随后又由飞宇汽贸城陈总一行陪同参观了工地现场及样板房。</p><p style=\"text-align: center; \"><img alt=\"\" src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113154045_1.jpg\"></p><p>贰仟家汽车服务股份有限公司始创于1988年，现拥有注册资金4100万元，员工800余名。公司主营业务：一站式汽车服务加盟连锁发展、汽车配件及用品配送、汽车百货超市、综合维修、物流服务等。公司在发展过程中，经历了“汽配专家”、“汽修专家”、“汽车专家”、“物流专家”等阶段。2007年，公司通过了ISO9001—2000服务质量认证。2007年，公司被评为“中国中部十大创新品牌”。2009年，公司被全国工商联汽车摩托车配件用品商会评为“中华一站式汽车服务名优企业”、“2009年度全国汽摩配用品市场信誉经销商”，被郑州市政府评为“郑州市优秀民营企业”，“贰仟家”被认定为“河南省著名商标”。</p><p>伴随着公司业务网络的拓展，2006年，贰仟家物流服务公司开业。 2000年开始，贰仟家开始了对新业态模式的探索，并逐步创立、完善了“贰仟家一站式汽车服务连锁”的新经营模式。</p><p>此次参观考察，曹总对飞宇国际汽贸城的认可与赞扬，有力推动了贰仟家汽车服务股份有限公司与飞宇国际汽贸城的战略合作步伐。</p><p></p><p style=\"text-align: center; \"><img alt=\"\" src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113154045_2.jpg\"></p><p><br></p>','2','');/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('138','84','0','庆祝“五一”','','http://localhost/feiyu/files/160622/20160622121042_103.jpg','','为了迎接“五一”国际劳动节，加强企业文化建设，增强企业凝聚力，丰富公司员工的业余生活，公司于今年4月25日在工会组织下举办了一场丰富多彩的运动会比赛。公司领导执...','0','','255','99','0','1','admin','1466568688','1466568688','<p>为了迎接“五一”国际劳动节，加强企业文化建设，增强企业凝聚力，丰富公司员工的业余生活，公司于今年4月25日在工会组织下举办了一场丰富多彩的运动会比赛。公司领导执行董事陈龙腾、董事长助理马俊国、总经理黄明星等出席了运动会，并视察了比赛情况。</p><p>当日下午13点左右，在工会主席黄忠丰带领下，各公司参赛员工列队整齐，严阵以待。在工会主席黄忠丰发表讲话并宣布比赛规则和纪律之后，比赛正式开始，各公司参赛员工饱含斗志、热情洋溢的参加了本次运动会。</p><p>本次运动会的比赛项目分为四项，包括男单、女单乒乓球比赛、羽毛球比赛、步调一致比赛和速递呼啦圈比赛。赛场上各公司员工比耐力、比速度、比技巧，你追我赶，勇往直前，坚持不懈，赢得现场的观众阵阵呐喊声和助威声。另外，本届运动会服务工作到位，后勤保障有力，裁判员和工作人员各司其职，以公平、公正、公开的原则保证了各项比赛的正常进行，并取得了运动成绩和精神文明的双丰收。</p><p>本次活动在下午17点左右落下帷幕，并由工会主席黄忠丰宣布了比赛成绩，综合管理部领导进行了颁发奖品仪式。最后在黄忠丰主席宣布运动会正式结束时，本次运动会在各公司员工的热烈掌声中圆满结束。</p><p>本届运动会是公司工会组织举办的首届职工运动会，也是展示职工精神风貌、推进职工精神文明建设的一次盛会，对加强公司干部职工之间的相互沟通、增进团结，以及对培养职工积极向上、顽强拼搏的精神具有重要意义。更重要的是增强了职工身体素质、增进团队凝聚力和战斗力，为公司进一步发展提供强有力的保障。</p><p style=\"text-align: center; \"><img src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113133056_1.jpg\" alt=\"\"></p><p style=\"text-align: center;\"><img src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113133056_2.jpg\" alt=\"\"></p><p style=\"text-align: center;\"><img src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113133056_3.jpg\" alt=\"\"></p><p style=\"text-align: center;\"><img src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113133056_4.jpg\" alt=\"\"></p><p></p><p style=\"text-align: center; \"><img src=\"http://www.feeyu.cn/uploads/allimg/131113/1_131113133056_5.jpg\" alt=\"\"></p><p><br></p>','1','');/* MySQLReback Separation */
 /* 插入数据 `think_news` */
 INSERT INTO `think_news` VALUES ('139','111','0','河南飞宇控股曾多次为市政府建设山顶公园和湛河治理','','http://localhost/feiyu/files/160622/20160622140709_792.png','','河南飞宇投资控股，曾多次为市政府建设山顶公园和湛河治理工程及四川汶川灾区捐款，累计捐款金额达100多万元，同时向贫困灾区捐助了许多课桌、书籍等物品，救助贫困生达...','0','','255','99','0','1','admin','1466575593','1466532360','<p style=\"text-align: center; \"><img alt=\"\" src=\"http://www.feeyu.cn/uploads/allimg/131115/1_131115173003_1.png\"></p><p></p><p>河南飞宇控股，曾多次为市政府建设山顶公园和湛河治理工程及四川汶川灾区捐款，累计捐款金额达100多万元，同时向贫困灾区捐助了许多课桌、书籍等物品，救助贫困生达上百人；2011年5月份为鲁山县林楼村新农村建设捐献变压器达40万元人民币，“八一”建军节前夕给新城区消防中队送慰问金3000元和慰问品、同时给新城区东王营村贫困生送6000元助学金，11月份给叶县连村镇后王村新农村建设捐献50万元人民币，2012年春节前夕又安排1万元去看望五户困难户和新城区东王营村小学。</p><p><br></p>','3',''),('140','113','0','平高集团','','http://localhost/feiyu/files/160622/20160622142542_189.jpg','','河南平高电气股份有限公司（股票代码600312）是全国高压开关行业首家通过中科院、科技部“双高”认证的高新技术企业，我国研制和生产高压、超高压、特高压开关及电站成套设备研发、制造基地，国家电工行业重大技术装备支柱企业，被评为 “全国500家最大电器制造企业”、“河南省工业企业20强”，“河南省优秀高新技术企业”，荣获“全国...','0','','255','99','0','1','admin','1466576745','1466576745','<p>河南平高电气股份有限公司（股票代码600312）是全国高压开关行业首家通过中科院、科技部“双高”认证的高新技术企业，我国研制和生产高压、超高压、特高压开关及电站成套设备研发、制造基地，国家电工行业重大技术装备支柱企业，被评为 “全国500家最大电器制造企业”、“河南省工业企业20强”，“河南省优秀高新技术企业”，荣获“全国‘五一’劳动奖状”、“全国精神文明先进单位”等荣誉称号。</p><p></p><p>平高电气是平高集团（原平顶山高压开关厂，始建于1970年）控股的上市公司，于2001年2月21日在上海证券交易所挂牌上市，2010年2月11日，国务院批复平高集团的股东由“平顶山市国有资产监督管理委员会”变更为“国网国际技术装备有限公司”，这标志着平高电气自此成为国家电网控股的四级子公司。平高电气厂区占地面积62万平方米，现有员工3753人，目前拥有七家控股或相对控股子公司（中日合资公司），八家分厂。合资公司河南平高东芝高压开关有限公司是平高电气与世界500强之一的日本东芝公司合资组建的世界一流的封闭式组合电器生产企业。</p><p><br></p>','4','');/* MySQLReback Separation */
 /* 创建表结构 `think_page` */
 DROP TABLE IF EXISTS `think_page`;/* MySQLReback Separation */ CREATE TABLE `think_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `style` varchar(200) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `description` text,
  `content` text NOT NULL,
  `updatetime` int(10) NOT NULL,
  `elete` int(10) NOT NULL,
  `read` int(255) NOT NULL,
  `listorder` int(255) DEFAULT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('38','80','','','这里填写个标题','','','<h1><font size=\"5\">鑫华必升科技有限公司<span style=\"color: inherit; font-family: inherit; line-height: 1.8;\">（下称</span><span style=\"line-height: 1.8;\">鑫华必升</span><span style=\"color: inherit; font-family: inherit; line-height: 1.8;\">）</span><span style=\"color: inherit; font-family: inherit;\">XINHUA WIN GROUP</span></font></h1>
			<p><br></p><p>鑫华必升科技有限公司，是一家外包的呼叫中心，从事CTI/CRM/电子商务相关产品研发、系统集成、软件出口及外协式呼叫中心运营企业。为客户提供多种电信模式的平台，其业务覆盖各个行业，现公司主要涉及政府机构的通知，某品牌电器的售后服务及技术支持，各种大型专业会议的邀请以及私人或办公用品的市场调研。</p><p><br></p><p>企业优势：&nbsp;</p><p><b>外协式呼叫中心是国内比较新兴的行业，属于朝阳行业之一；&nbsp;</b></p><p><b>强大的资源整合能力；
对于中国市场有非常深刻的认识和理解；&nbsp;</b></p><p><b>广泛的客户群及应用对象，有助于巩固和拓展我们自身的能力；&nbsp;</b></p><p><b>强大的投资者和广泛的战略合作伙伴。
</b><br></p><p><br></p>','1466758837','0','0','0',''),('39','88','','','这里填写个标题','','','<div class=\"about2Main\">
      <dl><dt><br><img src=\"/feiyu/Uploads/160621/20160621143814_164.jpg\" style=\"float:left;\" ><strong style=\"color: rgb(178, 38, 30); font-size: 16px;\">河南飞宇投资控股有限公司董事长</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style=\"color: rgb(3, 3, 3);\">陈龙飞</strong>
<img width=\"559\" height=\"3\" alt=\"\" src=\"/templets/fytz/images/bj_05.jpg\"></dt><dd>
<p>经过十年的磨砺和成长，一条巨龙从中原大地腾空而起！昨日的种种辉煌，打造了浑身钢筋铁骨；今天的华丽蜕变，成就了万分壮志雄心。河南飞宇投资控股有限公司作为一个拥有工业电气、商业地产和实业投资的优质企业，终于实现了从量变到质变的自我突破，成功地完成了集团公司的战略布局，使公司的发展走进了一个全新的时代。</p>
<p>厚积一纪而一朝勃发，虎踞中原以俯瞰九州大地。飞宇控股的发展战略，承载了十余年飞宇人拼搏的风雨历程，承载了近千名员工的创业激情，承载了以公司为家的几代飞宇人期盼产业腾飞的梦想！</p>
<p>我们深知任重而道远。在飞宇控股挂牌之日，我们就重点重申了一直以来秉承的“发展公司、实现自我、回报家人、回馈社会”的企业愿景；将“立足中原、辐射全国、走出亚洲、奔向世界、业务精专、诚信共赢”的理念作为经营发展的基本指导思想。我们随时随刻地提醒着自己：珍惜中原大地居之不易的发展环境，珍惜公司同仁血汗铸就的大好局面，珍惜不可多得的实现和提升自我价值的机会！</p>
<p>飞宇控股始终追求长期价值投资，与客户保持长期亲密的合作关系。除为企业发展提供成长资金外，还在吸纳优秀人才、建立现代企业制度、寻找战略合作伙伴、重组并购等方面为企业提供专业支持、经验和资源。重点关注先进制造、房地产开发等领域的拥有一流品牌的领先企业，覆盖初创期、成长期、成熟期的各个阶段，全程跟踪、全方位为企业成长排忧解难。</p>
<p>我们相信，在改革开放不断深入的大环境里，在党和各级政府部门的正确指引下，在社会各界和合作伙伴的支持与协作中，通过公司上下一如既往的努力奋斗，飞宇控股必将迎来更加美好的明天！</p>
</dd>       </dl>
<p>&nbsp;</p>
    </div><p><br></p>','1466491154','0','0','0',''),('40','89','','','这里填写个标题','','','<p><img src=\"/feiyu/Uploads/160621/20160621144114_874.jpg\" style=\"max-width:100%;\" class=\"clicked\"><br></p><p><br></p>','1466491277','0','0','0',''),('41','82','','','这里填写个标题','','','这里填写内容','1466506923','0','0','0','');/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('42','102','','','这里填写个标题','','','<p style=\"text-align: center;\"><a target=\"_blank\" href=\"http://www.fee-yu.com/index.asp\"><img alt=\"\" src=\"http://www.feeyu.cn/uploads/allimg/131129/1_131129124201_1.jpg\"></a></p><p>河南飞宇实业有限公司是一家专业生产制造GIS焊接铝合金壳体的民营企业。公司位于河南省宝丰县产业集聚区（原地址：郑州市新郑龙湖开发区），占地430亩，规划建筑面积22万㎡，总投资5亿元。毗邻宁洛高速和郑尧高速平顶山西出口，距平顶山火车站西站仅有2公里，交通十分便利。</p><p>公司于2006年成立，2007年正式投产，现有职工300余人，其中高级职称24名、中级职称60余名；拥有各类铆焊、机加工设备200余台，引进了纵缝自动焊，日本OTC、芬兰肯比、奥地利福尼斯、瑞士伊萨等进口名牌焊机，以及先进的镗车、车床，为保证焊接工艺与机加工件的精度提供了硬件保障。另外，公司还拥有SF6气体充气回收装置、SF6气体检测仪器、X射线探伤、水压试验、气密性试验和拉力试验等先进的检测设备，已形成铆焊、机加工、试验一体化的生产基地。</p><p>公司通过不断的努力探索，经过一次次的考验，于2008年顺利通过了ISO9001：2000国际质量体系认证，并与平高电气建立了战略合作伙伴关系，同时与平高东芝、韩国晓星、平高威海、上海华东、上海华通、中法依帕、德力西、明电舍、南阳金冠等国内外厂商建立了良好的供货合作关系。</p><p>飞宇实业在管理工作中，不断引进、吸收先进的管理工具和管理理念。在工作中追求“标准化、流程化、系统化、制度化、人文化”。</p><p></p><p>公司秉承“团结、诚信、创新、高效”的企业理念，以市场为导向，以质量求生存，以用户为中心，力求以优质的产品和完善的售后服务赢得市场。飞宇人团结一心，锐意拼搏，为将自身打造成为国内GIS壳体制造领域的明星企业而不懈努力。</p><p><br></p>','1466566069','0','0','0','');/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('43','101','','','这里填写个标题','','','这里填写内容','1466565775','0','0','0',''),('44','103','','','这里填写个标题','','','这里填写内容','1466565779','0','0','0',''),('45','104','','','这里填写个标题','','','这里填写内容','1466565782','0','0','0',''),('46','83','','','这里填写个标题','','','<p><img src=\"http://www.feeyu.cn/templets/fytz/images/linian_03.jpg\" alt=\"\"></p><p><b>1、企业愿景</b>——行业领先 基业长青</p><p><b>2、企业使命</b>——创造价值 服务社会 成就员工</p><p><b>3、企业精神</b>——用心成就梦想&nbsp;&nbsp;</p><p><b>4、企业价值观：</b></p><p><b>&nbsp; &nbsp; 4.1发展观</b>——稳健经营 效益优先 和谐发展</p><p><b>&nbsp; &nbsp; 4.2幸福观</b>——体面工作 体面生活</p><p><b>&nbsp; &nbsp; 4.3人才观</b>——德才兼备 以德为先 人尽其才</p><p><b>&nbsp; &nbsp; 4.4工作观</b>——专心 专业 专注</p>','1466567970','0','0','0','');/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('47','110','','','这里填写个标题','','','<div class=\"head-warp\">
        <div class=\"head\">
          <div class=\"nav-box\">
            <ul>
              <li class=\"cur\"></li>
            </ul>
          </div>
        </div>
      </div>
      <div class=\"main10\" style=\"min-height:100px;\">
        <div class=\"history\" style=\"height: 1000px; display: block;\">
    <div class=\"history-date\">
            <ul>
              <h2 class=\"first\" style=\"position: relative;\"><a href=\"#\">2013</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_ll\" style=\"display: block;\"> <p>公司顺利完成客户平高电气首批800干伏GIS产品合格交付</p>
<p>公司取得世标认证“35KV及以下电力变压器、高低压输变电成套设备、高压断路器的生产和服务及其所涉及场所的相关环境管理活动”证书和“中国国家强制性产品认证证书”</p>
<p>飞宇---平顶山国际汽贸城招商中心盛大开放选铺</p>
<p>飞宇---五金机电市场招商中心盛大开放选</p> </div>
                <div class=\"his_rr\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">2012</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_rr\" style=\"display: block;\"> <p>飞宇---浙江电气产业园正式筹建</p>
<p>公司成功中标冀北电力有限公司农网改造升级项目，第一批设备材料招标采购货物项目</p>
<p>飞宇---平顶山国际汽贸城展示中心正式开</p> </div>
                <div class=\"his_ll\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">2011</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_ll\" style=\"display: block;\"> <p>公司与平高东芝韩国晓星建立供货关系，并于年底以100%合格率顺利交付首批订单</p>
<p>中低压电气产业园正式交付使用并顺利投产</p>
<p>飞宇平顶山国际汽贸城正式筹</p> </div>
                <div class=\"his_rr\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">2010</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_rr\" style=\"display: block;\"> <p>公司顺利取得“中华人民共和国特种设备制造许可证”和“质量合格确认证书”</p>
<p>公司承接唐供丰润田富庄35kv输变电工程，即组合式的变电箱</p> </div>
                <div class=\"his_ll\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">2008</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_ll\" style=\"display: block;\"> <p>公司顺利通过ISO9001 2000国际质量体系认证</p>
<p>公司于平高威海建立客户合作关系并按时保质保量完成首批交</p> </div>
                <div class=\"his_rr\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">2007</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_rr\" style=\"display: block;\"> <p>公司成功生产制造第一批GIS焊接铝合金壳体，并以100%的合格率准时交付客户--平高电气股份有限公司</p> </div>
                <div class=\"his_ll\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">2003</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_ll\" style=\"display: block;\"> <p>公司正式投入生产工矿防爆产品</p> </div>
                <div class=\"his_rr\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div><div class=\"history-date\">
            <ul>
              <h2 class=\"\" style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both; position: relative;\"><a href=\"#\">1999</a></h2>
              <li style=\"margin-top: 0px; -webkit-animation: 2s ease 0ms both;\" class=\"bounceInDown\">
                <div class=\"his_rr\" style=\"display: block;\"> <p>公司成为平顶山市第一家煤气表生产厂家</p> </div>
                <div class=\"his_ll\" style=\"display: block;\"> </div>
              </li>
            </ul>
          </div>         
        </div>
      </div>','1466652394','0','0','0','');/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('48','84','','','这里填写个标题','','','这里填写内容','1466568528','0','0','0',''),('49','112','','','这里填写个标题','','','<p style=\"text-align: center; \"><img src=\"http://www.feeyu.cn/templets/fytz/images/shehui_07.jpg\" alt=\"\"></p><p></p><p>飞宇承诺成为一名负责和积极的企业公民，通过自主长信，不断改善经营，为社会发展做出贡献。飞宇坚信企业是社会的一个重要部分，并致力于与员工和当地社会一道改善人们工作和生活的质量。让员工成为企业的员工，让企业成为员工的企业。</p><p><br></p>','1466575981','0','0','0',''),('50','85','','','这里填写个标题','','','<p><img src=\"http://www.feeyu.cn/templets/fytz/images/fazhan_07.jpg\" alt=\"\"></p><p style=\"text-align: center; \"><img src=\"http://www.feeyu.cn/templets/fytz/images/fazhan_11.jpg\" alt=\"\"></p><p>&nbsp;</p><p><b>飞宇战略发展的三个阶段</b></p><p><b>◆ 起步壮大阶段（2003年——2010年）</b></p><p>特征：探索并积累了企业管理的丰富经验，为今后的发展奠定了坚实的基础，总结出了一套可移植的管理模式。</p><p><b>◆ 变革发展阶段（2010年——2013年）</b></p><p>特征：以无形资产盘活有形资产，在最短的时间里以最低的成本把规模做大，把企业做强。</p><p><b>◆ 品牌经营阶段（2014年—— ）</b></p><p><b>特征</b>：产品批量销往全球主要经济区域市场，品牌已经有了一定知名度、信誉度与美誉度。</p><p></p><p>2012年初，在确定企业发展思路时，公司明确地提出了将2012年作为“飞宇快速变革年”，全面提升管理水平。为了实现这一目标，飞宇集团制定了重建企业内部构架、提高企业竞争力等一系列整合方案，以确保“飞宇快速变革年”目标的实现。</p><p><br></p>','1466576632','0','0','0',''),('51','86','','','这里填写个标题','','','<p style=\"text-align: center; \"><img alt=\"\" src=\"http://www.feeyu.cn/templets/fytz/images/rencai_03.jpg\"></p><p>&nbsp;</p><p><b>人才观</b>——德才兼备 以德为先 人尽其才</p><p>释义：人才观是企业对人才的基本观点和选人用人的指导思想。“功以才成，业由才广”， 河南飞宇投资控股集团的发展，必须以人才为支撑，需要以“德才兼备、以德为先”的人才标准来选人用人，实现事得其人、人尽其才、才尽其用。</p><p>德才兼备，以德为先：集团优先选拔和任用德才兼备的人，在德才二者不可得兼时以德为先决、以德为前提，人才只有厚德于心，才能践信于行。</p><p></p><p>人尽其才：集团践行“以人为本”的管理理念，科学配置人力资源，充分发挥员工的智慧和才干，使人适其岗、才尽其用，使员工与集团同呼吸共命运、同成长共发展。</p><p><br></p>','1466587164','0','0','0','');/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('52','114','','','这里填写个标题','','','<p style=\"text-align: center;\"><img src=\"/feiyu/Uploads/160622/20160622172217_498.png\" style=\"text-align: left; max-width: 100%;\"></p><p style=\"text-align: center;\"><span style=\"line-height: 1.8;\">2012年12月19日下午2点，在河南平开电力设备集团有限公司主楼一楼培训室进行了一次别开生面的消防培训，担任此次培训讲师的是郑州市消防支队宣讲团资深讲师贾宗圣警官。培训中贾警官阐述了引发火灾的几个常见原因、火灾的种类以及灭火时注意事项等。并进行火灾实例分析，剖析目前发生火灾的主要因素。根据经验总结出目前发生案例最多的就是电气类的火灾，此类火灾大多是因为电源线老化、短路及设备超负荷运转引发。</span></p><p>贾宗圣警官以事实为例，指出公民消防意识淡薄，遇见问题盲目采取措施，反而适得其反，公民应具有最基本的消防意识。工厂职工应做到“三懂四会” “三懂”——①懂得本岗位生产过程中的火灾危险性:电气老化、短路、超负荷易发生电器火灾；使用易燃易爆液体、气体易发生火灾爆炸事故；使用可燃物遇有明火易发生火灾；②懂得预防火灾的措施，加强对电器设备、线路的检查维修保养，及时更换老化线路陈旧设备，加强消防安全岗位自查、及时整改火险隐患；③懂得灭火方法。</p><p>“四会”——①会报警，报警时要讲清起火地点的详细地址、着火部位、着火物、火势大小、是否有人员被困等情况；②会使用消防灭火器；③会扑灭初期之火；④会疏散自救。培训过程中贾警官还详细说明了公用型灭火器、家用型灭火器及救援工具的使用方法和注意事项。</p><p>“祸端常发于忽微，火灾面前，生命的存续就在于刹那。”每个人、每个家庭必须具备一定的消防安全设备的使用方法和相关的消防技能。贾宗圣警官特别提醒大家在日常生活中要正确使用液化气，一罐家用液化气相当于150公斤TNT炸药。讲到这里，现场顿时响起大家的惊呼声。</p><p></p><p>讲座最后，贾宗圣警官重申了“预防为主、防消结合”的消防宗旨，告诫大家在日常生活、工作中应定期排查消防安全隐患，掌握必要的消防安全知识。希望通过此次培训能够提高我们作为公民、员工、家庭成员一份子的消防安全意识。</p><p><br></p>','1466587344','0','0','0','');/* MySQLReback Separation */
 /* 插入数据 `think_page` */
 INSERT INTO `think_page` VALUES ('55','87','','','这里填写个标题','','','这里填写内容','1466766302','0','0','',''),('54','116','','','这里填写个标题','','','这里填写内容','1466588950','0','0','0','');/* MySQLReback Separation */
 /* 创建表结构 `think_product` */
 DROP TABLE IF EXISTS `think_product`;/* MySQLReback Separation */ CREATE TABLE `think_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `posids` int(10) DEFAULT NULL,
  `resource` text,
  `price` int(10) NOT NULL,
  `buyurl` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `option` mediumtext NOT NULL,
  `content` text,
  `listorder` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `inputtime` int(10) DEFAULT NULL,
  `updatetime` int(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `read` int(255) NOT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_sy` */
 DROP TABLE IF EXISTS `think_sy`;/* MySQLReback Separation */ CREATE TABLE `think_sy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `markup` int(11) NOT NULL DEFAULT '0',
  `marwz` int(10) NOT NULL DEFAULT '0',
  `newimg` varchar(200) NOT NULL,
  `waterpos` varchar(100) NOT NULL DEFAULT 'IMAGE_WATER_NORTHWEST',
  `diaphaneity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_sysconfig` */
 DROP TABLE IF EXISTS `think_sysconfig`;/* MySQLReback Separation */ CREATE TABLE `think_sysconfig` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(20) NOT NULL DEFAULT '',
  `info` varchar(100) NOT NULL DEFAULT '',
  `groupid` smallint(6) NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'string',
  `value` text,
  PRIMARY KEY (`varname`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=773 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 插入数据 `think_sysconfig` */
 INSERT INTO `think_sysconfig` VALUES ('2','cfg_cmspath','安装目录','2','string','/c2'),('3','cfg_cookie_encode','cookie加密码','2','string','7NhpkpEqXwdxG3wGSkmWNk6K1GSGDHo'),('4','cfg_indexurl','网页主页链接','1','string','http://localhost/he/'),('5','cfg_backup_dir','数据备份目录（在data目录内）','2','string','backupdata'),('7','cfg_webname','网站名称','1','string','禾和调解'),('8','cfg_mode','网站是否启用开发模式，开发模式填写Y','2','string','Y'),('9','cfg_start','是否请用初始化设置，启用填写Y,关闭填写任意字符','2','string','N'),('12','cfg_ddimg_width','缩略图默认宽度','3','number','240'),('13','cfg_ddimg_height','缩略图默认高度','3','number','180'),('15','cfg_imgtype','图片浏览器文件类型','3','string','jpg|gif|png'),('17','cfg_mediatype','允许的多媒体文件类型','3','bstring','swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov'),('18','cfg_specnote','专题的最大节点数','2','number','6'),('19','cfg_list_symbol','栏目位置的间隔符号','2','string',' > '),('22','cfg_keyword_replace','关键字替换(是/否)使用本功能会影响HTML生成速度','2','bool','Y'),('25','cfg_multi_site','(是/否)支持多站点，开启此项后附件、栏目连接、arclist内容启用绝对网址','2','bool','N'),('27','cfg_dede_log','(是/否)开启管理日志','2','bool','N'),('28','cfg_powerby','网站版权信息','1','bstring','Copyright 2013 GRE All Rights Reserved'),('769','cfg_footer','网站底部地址','3','string','河南省郑州市郑汴路与中州大道交叉口建业置地广场A座西单元29层   |   河南平顶山市新城区育英路北段1号院'),('33','cfg_ftp_host','FTP主机','2','string',''),('34','cfg_ftp_port','FTP端口','2','number','465'),('35','cfg_ftp_user','FTP用户名','2','string',''),('36','cfg_ftp_pwd','FTP密码','2','string',''),('37','cfg_ftp_root','网站根在FTP中的目录','2','string','/'),('38','cfg_ftp_mkdir','是否强制用FTP创建目录','2','bool','N'),('47','cfg_cli_time','服务器时区设置','2','number','8'),('65','cfg_theme','前台主题设置','1','string','default'),('66','cfg_album_col','图集多行多列样式默认列数','3','number','5'),('67','cfg_album_pagesize','图集多页多图每页显示最大数','3','number','12'),('69','cfg_album_ddwidth','图集默认缩略图大小','3','number','200'),('223','cfg_smtp_port','smtp服务器端口','2','string','465'),('221','cfg_sendmail_bysmtp','是否启用smtp方式发送邮件','2','bool','Y'),('222','cfg_smtp_server','smtp服务器','2','string','smtp.qq.com'),('224','cfg_smtp_usermail','SMTP服务器的用户邮箱','2','string','desdev@vip.qq.com'),('225','cfg_smtp_user','SMTP服务器的用户帐号','2','string','734534010@qq.com'),('226','cfg_smtp_password','SMTP服务器的用户密码','2','string','guo123654'),('707','cfg_allsearch_limit','网站全局搜索时间限制','2','string','1'),('710','cfg_keywords','站点默认关键字','1','string','调解，商业调解'),('711','cfg_description','站点描述','1','bstring','专业从事商业调解相关业务'),('712','cfg_beian','网站备案号','1','string','京ICP备14010640号'),('739','cfg_qk_uploadlit','异步上传缩略图(空间太不稳定的用户关闭此项)','3','bool','Y'),('763','web_tel','网站电话','3','string','18701415879'),('10','cfg_wap','网站是否启用Wap访问自动跳转模式，如果是请填写Y','2','string','Y'),('765','weibo','微博地址','3','string','http://weibo.com/3094895985/profile?topnav=1&wvr=5&from=company&user=1&sudaref=www.feeyu.cn&retcode=6102&is_all=1'),('766','tencent','腾讯微博','3','string','http://t.qq.com/feiyukonggu?pgv_ref=im.perinfo.perinfo.icon'),('767','renren','人人网','3','string','http://renren.com/'),('768','emailhr','邮件接收邮箱','3','string','web@cheerue.com'),('772','cfg_address','公司办公地址','1','string','北京市大兴区德林园');/* MySQLReback Separation */
 /* 创建表结构 `think_weixin` */
 DROP TABLE IF EXISTS `think_weixin`;/* MySQLReback Separation */ CREATE TABLE `think_weixin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appid` varchar(50) NOT NULL,
  `appsecret` varchar(100) NOT NULL,
  `settime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_wx_menu` */
 DROP TABLE IF EXISTS `think_wx_menu`;/* MySQLReback Separation */ CREATE TABLE `think_wx_menu` (
  `wxid` int(5) NOT NULL AUTO_INCREMENT,
  `wxname` varchar(50) NOT NULL,
  `wxcontent` text NOT NULL,
  `remarks` date NOT NULL,
  PRIMARY KEY (`wxid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;/* MySQLReback Separation */
 /* 创建表结构 `think_wx_user` */
 DROP TABLE IF EXISTS `think_wx_user`;/* MySQLReback Separation */ CREATE TABLE `think_wx_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `openid` varchar(100) NOT NULL,
  `subscribe` int(2) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `sex` int(2) NOT NULL,
  `language` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `headimgurl` varchar(250) NOT NULL,
  `subscribe_time` varchar(20) NOT NULL,
  `unionid` varchar(50) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `groupid` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;/* MySQLReback Separation */