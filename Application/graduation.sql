CREATE DATABASE /*!32312 IF NOT EXISTS*/`gt` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `gt`;
DROP TABLE IF EXISTS `gt_login`;
CREATE TABLE `gt_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `account` varchar(255) NOT NULL COMMENT '用户登录帐号',
  `userid` int(11) NOT NULL COMMENT '用户编号',
  `username` varchar(256) DEFAULT NULL COMMENT '显示名 realname',
  `password` varchar(32) NOT NULL COMMENT '用户登陆密码, MD5加密后的值',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '用户账号状态  0非active 1正常',
  `isdel` tinyint(3) NOT NULL DEFAULT '0' COMMENT '用户账号是否已删除 1-删除 0-未删除',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='用户登陆表';

DROP TABLE IF EXISTS `gt_user`;
CREATE TABLE `gt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(50) DEFAULT NULL COMMENT '用户名称',
  `email` varchar(255) DEFAULT NULL COMMENT '电子邮件',
  `selfintroduction` text COMMENT '自我介绍',
  `headerimageid` varchar(64) DEFAULT NULL COMMENT '头像 gt_image id',
  `gender` tinyint(1) DEFAULT '0' COMMENT '性别, 0保密 1男 2女',
  `credit` int(11) DEFAULT '0' COMMENT '积分',
  `star` int(11) DEFAULT '0' COMMENT '信用度',
  `lat` double DEFAULT '0' COMMENT '纬度',
  `lng` double DEFAULT '0' COMMENT '经度',
  `address` text DEFAULT NULL COMMENT '地址',
  `books` int(11) DEFAULT '0' COMMENT 'books 总数',
  `articles` int(11) DEFAULT '0' COMMENT 'books 总数',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp DEFAULT '0000-00-00' COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员状态 0禁用(禁用时该用户绑定的所有登录帐号都受限) 1启用',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除标记，1删除 0未删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1035 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `gt_user_img`;
CREATE TABLE `gt_user_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `userid` int(11) NOT NULL COMMENT '用户编号',
  `imgdata` text DEFAULT NULL COMMENT '地址',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp DEFAULT '0000-00-00' COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员状态 0禁用(禁用时该用户绑定的所有登录帐号都受限) 1启用',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除标记，1删除 0未删除',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=1035 DEFAULT CHARSET=utf8 COMMENT='用户头像数据';

CREATE TABLE `gt_user_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `userid` int(11) NOT NULL COMMENT '用户编号',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `content` text DEFAULT NULL COMMENT '文章内容',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp DEFAULT '0000-00-00' COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '文章状态 1-发表 0-草稿',
  `lat` double DEFAULT '0' COMMENT '纬度',
  `lng` double DEFAULT '0' COMMENT '经度',
  `address` text DEFAULT NULL COMMENT '地址',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除标记，1删除 0未删除',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `title` (`title`),
  KEY `status` (`status`),
  KEY  `lat` (`lat`),
  KEY  `lng` (`lng`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户文章';


DROP TABLE IF EXISTS `gt_user_books`;
CREATE TABLE `gt_user_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `userid` int(11) NOT NULL COMMENT '用户编号',
  `title` varchar(255) DEFAULT NULL COMMENT '书名',
  `coverid` int(11) DEFAULT NULL COMMENT '图书封面id',
  `author` varchar(50) DEFAULT NULL COMMENT '图书作者',
  `content` text DEFAULT NULL COMMENT '图书简介和书评 序列化存储',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '图书类型',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp DEFAULT '0000-00-00' COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图书状态 1-未借出 0－借出',
  `lat` double DEFAULT '0' COMMENT '纬度',
  `lng` double DEFAULT '0' COMMENT '经度',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除标记，1删除 0未删除',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `title` (`title`),
  KEY `author` (`author`),
  KEY `status` (`status`),
  KEY  `lat` (`lat`),
  KEY  `lng` (`lng`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户图书';

DROP TABLE IF EXISTS `gt_book_cover`;
CREATE TABLE `gt_book_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `bookid` int(11) NOT NULL COMMENT '图书编号',
  `userid` int(11) NOT NULL COMMENT '用户编号',
  `imgdata` text DEFAULT NULL COMMENT '地址',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp DEFAULT '0000-00-00' COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员状态 0禁用(禁用时该用户绑定的所有登录帐号都受限) 1启用',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除标记，1删除 0未删除',
  PRIMARY KEY (`id`),
  KEY `bookid` (`bookid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户头像数据';