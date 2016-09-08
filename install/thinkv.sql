-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 07 月 10 日 19:38
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `thinkpf`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_ad`
--

CREATE TABLE IF NOT EXISTS `think_ad` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `des` varchar(1000) DEFAULT NULL,
  `creattime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_admin`
--

CREATE TABLE IF NOT EXISTS `think_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `logintime` varchar(200) NOT NULL,
  `loginip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `think_admin`
--

INSERT INTO `think_admin` (`id`, `user`, `password`, `tel`, `name`, `pid`, `aid`, `logintime`, `loginip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 0, 0, '1467644218', '0.0.0.0');

-- --------------------------------------------------------

--
-- 表的结构 `think_ad_list`
--

CREATE TABLE IF NOT EXISTS `think_ad_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `img2` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `creattime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `creattime` (`creattime`),
  UNIQUE KEY `value` (`value`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13;

-- --------------------------------------------------------

--
-- 表的结构 `think_category`
--

CREATE TABLE IF NOT EXISTS `think_category` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `module` varchar(15) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `modelid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `linktop` int(10) DEFAULT NULL,
  `arrparentid` varchar(255) DEFAULT NULL,
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `arrchildid` mediumtext ,
  `catname` varchar(30) NOT NULL,
  `style` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `description` mediumtext ,
  `parentdir` varchar(100) DEFAULT NULL,
  `catdir` varchar(30) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `items` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `setting` mediumtext  ,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sethtml` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `letter` varchar(30) DEFAULT NULL,
  `usable_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`catid`),
  KEY `module` (`module`,`parentid`,`listorder`,`catid`),
  KEY `siteid` (`siteid`,`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- 转存表中的数据 `think_category`
--

INSERT INTO `think_category` (`catid`, `siteid`, `module`, `type`, `modelid`, `parentid`, `linktop`, `arrparentid`, `child`, `arrchildid`, `catname`, `style`, `image`, `keyword`, `description`, `parentdir`, `catdir`, `url`, `items`, `hits`, `setting`, `listorder`, `ismenu`, `sethtml`, `letter`, `usable_type`) VALUES
(117, 0, 'page', 0, 0, 0, 0, '0', 0, NULL, '测试栏目', 'about', '', '', '', NULL, NULL, '', 0, 0, '', 50, 1, 0, NULL, '1'),
(118, 0, 'page', 0, 0, 0, 0, '0', 0, NULL, '测试栏目二', 'about', '', '', '', NULL, NULL, '', 0, 0, '', 50, 1, 0, NULL, '1'),
(121, 0, 'page', 0, 0, 0, 0, '0', 0, NULL, 'dddd', 'about', '', '', '', NULL, NULL, '', 0, 0, '', 50, 1, 0, NULL, '1'),
(122, 0, 'media', 0, 0, 117, 0, '117', 0, NULL, 'dsfas', 'about_ry_detail', '', '', '', NULL, NULL, '', 0, 0, '', 50, 1, 0, NULL, '1');

-- --------------------------------------------------------

--
-- 表的结构 `think_catset_group`
--

CREATE TABLE IF NOT EXISTS `think_catset_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `des` varchar(200) DEFAULT NULL,
  `catid` varchar(200) NOT NULL,
  `creattime` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_catset_list`
--

CREATE TABLE IF NOT EXISTS `think_catset_list` (
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
  `orderlist` int(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_hr`
--

CREATE TABLE IF NOT EXISTS `think_hr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(200) DEFAULT NULL,
  `salary` varchar(200) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `text` varchar(200) DEFAULT NULL,
  `inputtime` int(10) NOT NULL,
  `style` varchar(20) DEFAULT NULL,
  `workxz` varchar(20) DEFAULT NULL COMMENT '工作性质',
  `workjy` varchar(25) DEFAULT NULL COMMENT '工作经验',
  `study` varchar(25) DEFAULT NULL COMMENT '最低学历',
  `number` int(10) DEFAULT NULL COMMENT '招聘人数',
  `responsibilities` varchar(250) DEFAULT NULL COMMENT '岗位职责',
  `ask` varchar(250) DEFAULT NULL COMMENT '入职要求',
  `money` varchar(20) DEFAULT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `listorder` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_media`
--

CREATE TABLE IF NOT EXISTS `think_media` (
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
  `read` int(11) NOT NULL DEFAULT '0',
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_member`
--

CREATE TABLE IF NOT EXISTS `think_member` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `phpssouid` mediumint(8) unsigned NOT NULL,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `encrypt` char(6) DEFAULT NULL,
  `nickname` char(20) DEFAULT NULL,
  `reman` text DEFAULT NULL,
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `lastdate` int(10) unsigned NOT NULL DEFAULT '0',
  `regip` char(15) NOT NULL DEFAULT '0 ',
  `lastip` char(15) NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_member_detail`
--

CREATE TABLE IF NOT EXISTS `think_member_detail` (
  `userid` int(20) NOT NULL,
  `headimgurl` varchar(200) DEFAULT NULL,
  `birthday` int(20) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_msg`
--

CREATE TABLE IF NOT EXISTS `think_msg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `channel` varchar(200) DEFAULT NULL,
  `applytime` int(10) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_news`
--

CREATE TABLE IF NOT EXISTS `think_news` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `typeid` smallint(5) unsigned NOT NULL,
  `title` varchar(24) NOT NULL DEFAULT '',
  `style` char(24) DEFAULT NULL,
  `thumb` char(100) DEFAULT NULL,
  `keywords` char(40) DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  `posids` tinyint(1) unsigned DEFAULT '0',
  `url` char(100) DEFAULT NULL,
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `sysadd` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(20) DEFAULT NULL,
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext,
  `read` int(255) NOT NULL DEFAULT '0',
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`,`listorder`,`id`),
  KEY `listorder` (`catid`,`status`,`listorder`,`id`),
  KEY `catid` (`catid`,`status`,`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=141 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_page`
--

CREATE TABLE IF NOT EXISTS `think_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `style` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `description` text,
  `content` text NOT NULL,
  `updatetime` int(10) NOT NULL,
  `elete` int(10) DEFAULT NULL,
  `read` int(255) NOT NULL DEFAULT '0',
  `listorder` int(255) DEFAULT NULL,
  `elite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_product`
--

CREATE TABLE IF NOT EXISTS `think_product` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_sy`
--

CREATE TABLE IF NOT EXISTS `think_sy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `markup` int(11) NOT NULL DEFAULT '0',
  `marwz` int(10) NOT NULL DEFAULT '0',
  `newimg` varchar(200) NOT NULL,
  `waterpos` varchar(100) NOT NULL DEFAULT 'IMAGE_WATER_NORTHWEST',
  `diaphaneity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_sysconfig`
--

CREATE TABLE IF NOT EXISTS `think_sysconfig` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(20) NOT NULL DEFAULT '',
  `info` varchar(100) NOT NULL DEFAULT '',
  `groupid` smallint(6) NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'string',
  `value` text,
  PRIMARY KEY (`varname`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=773 ;

--
-- 转存表中的数据 `think_sysconfig`
--

INSERT INTO `think_sysconfig` (`aid`, `varname`, `info`, `groupid`, `type`, `value`) VALUES
(2, 'cfg_cmspath', '安装目录', 2, 'string', '/c2'),
(3, 'cfg_cookie_encode', 'cookie加密码', 2, 'string', '7NhpkpEqXwdxG3wGSkmWNk6K1GSGDHo'),
(4, 'cfg_indexurl', '网页主页链接', 1, 'string', 'http://localhost/thinkv_p/'),
(5, 'cfg_backup_dir', '数据备份目录（在data目录内）', 2, 'string', 'backupdata'),
(7, 'cfg_webname', '网站名称', 1, 'string', '禾和调解'),
(8, 'cfg_mode', '网站是否启用开发模式，开发模式填写Y', 2, 'string', 'Y'),
(9, 'cfg_start', '是否请用初始化设置，启用填写Y,关闭填写任意字符', 2, 'string', 'N'),
(12, 'cfg_ddimg_width', '缩略图默认宽度', 3, 'number', '240'),
(13, 'cfg_ddimg_height', '缩略图默认高度', 3, 'number', '180'),
(15, 'cfg_imgtype', '图片浏览器文件类型', 3, 'string', 'jpg|gif|png'),
(17, 'cfg_mediatype', '允许的多媒体文件类型', 3, 'bstring', 'swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov'),
(18, 'cfg_specnote', '专题的最大节点数', 2, 'number', '6'),
(19, 'cfg_list_symbol', '栏目位置的间隔符号', 2, 'string', ' > '),
(22, 'cfg_keyword_replace', '关键字替换(是/否)使用本功能会影响HTML生成速度', 2, 'bool', 'Y'),
(25, 'cfg_multi_site', '(是/否)支持多站点，开启此项后附件、栏目连接、arclist内容启用绝对网址', 2, 'bool', 'N'),
(27, 'cfg_dede_log', '(是/否)开启管理日志', 2, 'bool', 'N'),
(28, 'cfg_powerby', '网站版权信息', 1, 'bstring', 'Copyright 2013 GRE All Rights Reserved'),
(769, 'cfg_footer', '网站底部地址', 3, 'string', '河南省郑州市郑汴路与中州大道交叉口建业置地广场A座西单元29层   |   河南平顶山市新城区育英路北段1号院'),
(33, 'cfg_ftp_host', 'FTP主机', 2, 'string', ''),
(34, 'cfg_ftp_port', 'FTP端口', 2, 'number', '465'),
(35, 'cfg_ftp_user', 'FTP用户名', 2, 'string', ''),
(36, 'cfg_ftp_pwd', 'FTP密码', 2, 'string', ''),
(37, 'cfg_ftp_root', '网站根在FTP中的目录', 2, 'string', '/'),
(38, 'cfg_ftp_mkdir', '是否强制用FTP创建目录', 2, 'bool', 'N'),
(47, 'cfg_cli_time', '服务器时区设置', 2, 'number', '8'),
(65, 'cfg_theme', '前台主题设置', 1, 'string', 'default'),
(66, 'cfg_album_col', '图集多行多列样式默认列数', 3, 'number', '5'),
(67, 'cfg_album_pagesize', '图集多页多图每页显示最大数', 3, 'number', '12'),
(69, 'cfg_album_ddwidth', '图集默认缩略图大小', 3, 'number', '200'),
(223, 'cfg_smtp_port', 'smtp服务器端口', 2, 'string', '465'),
(221, 'cfg_sendmail_bysmtp', '是否启用smtp方式发送邮件', 2, 'bool', 'Y'),
(222, 'cfg_smtp_server', 'smtp服务器', 2, 'string', 'smtp.qq.com'),
(224, 'cfg_smtp_usermail', 'SMTP服务器的用户邮箱', 2, 'string', 'desdev@vip.qq.com'),
(225, 'cfg_smtp_user', 'SMTP服务器的用户帐号', 2, 'string', '734534010@qq.com'),
(226, 'cfg_smtp_password', 'SMTP服务器的用户密码', 2, 'string', 'guo123654'),
(707, 'cfg_allsearch_limit', '网站全局搜索时间限制', 2, 'string', '1'),
(710, 'cfg_keywords', '站点默认关键字', 1, 'string', '调解，商业调解'),
(711, 'cfg_description', '站点描述', 1, 'bstring', '专业从事商业调解相关业务'),
(712, 'cfg_beian', '网站备案号', 1, 'string', '京ICP备14010640号'),
(739, 'cfg_qk_uploadlit', '异步上传缩略图(空间太不稳定的用户关闭此项)', 3, 'bool', 'Y'),
(763, 'web_tel', '网站电话', 3, 'string', '18701415879'),
(10, 'cfg_wap', '网站是否启用Wap访问自动跳转模式，如果是请填写Y', 2, 'string', 'Y'),
(765, 'weibo', '微博地址', 3, 'string', 'http://weibo.com/3094895985/profile?topnav=1&wvr=5&from=company&user=1&sudaref=www.feeyu.cn&retcode=6102&is_all=1'),
(766, 'tencent', '腾讯微博', 3, 'string', 'http://t.qq.com/feiyukonggu?pgv_ref=im.perinfo.perinfo.icon'),
(767, 'renren', '人人网', 3, 'string', 'http://renren.com/'),
(768, 'emailhr', '邮件接收邮箱', 3, 'string', 'web@cheerue.com'),
(772, 'cfg_address', '公司办公地址', 1, 'string', '北京市大兴区德林园'),
(1, 'logo', '网站logo', 1, 'string', 'http://localhost/thinkv_p/files/160710/20160710182647_249.png');

-- --------------------------------------------------------

--
-- 表的结构 `think_weixin`
--

CREATE TABLE IF NOT EXISTS `think_weixin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appid` varchar(50) NOT NULL,
  `appsecret` varchar(100) NOT NULL,
  `settime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_wx_menu`
--

CREATE TABLE IF NOT EXISTS `think_wx_menu` (
  `wxid` int(5) NOT NULL AUTO_INCREMENT,
  `wxname` varchar(50) NOT NULL,
  `wxcontent` text NOT NULL,
  `remarks` date NOT NULL,
  PRIMARY KEY (`wxid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `think_wx_user`
--

CREATE TABLE IF NOT EXISTS `think_wx_user` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
