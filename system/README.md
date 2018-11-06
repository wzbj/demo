#投票系统设计http://www.php.cn/code/26298.html
============================
##sql语句
=====================
1,新建系统配置表

CREATE TABLE `sysconfig` (

  `cid` int(11) NOT NULL auto_increment,

  `vote_name` varchar(45) NOT NULL,

  `dietime` date NOT NULL,

  `method` int(11) NOT NULL default '1',

  `description` varchar(800) NOT NULL default '',

  PRIMARY KEY  (`cid`)

) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

2,新建用户表

CREATE TABLE `users` (

  `cid` int(11) NOT NULL auto_increment,

  `username` varchar(40) NOT NULL,

  `passwd` varchar(45) NOT NULL,

  `admin` int(11) NOT NULL default '0',

  `isvote` int(11) NOT NULL default '0',

  PRIMARY KEY  (`cid`)

) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

3,新建投票题目表

CREATE TABLE `votename` (

  `cid` int(11) NOT NULL auto_increment,

  `question_name` varchar(200) NOT NULL,

  `votetype` int(11) NOT NULL default '0' COMMENT '0为单选\n1为多选',

  `sumvotenum` int(11) NOT NULL default '1',

  PRIMARY KEY  (`cid`)

) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

4,新建投票选项表

CREATE TABLE `voteoption` (

  `cid` int(11) NOT NULL auto_increment,

  `optionname` varchar(100) NOT NULL default '',

  `votenum` int(11) NOT NULL default '0',

  `upid` int(11) NOT NULL,

  PRIMARY KEY  (`cid`,`upid`),

  KEY `fk_voteoption_votename_idx` (`upid`)

) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

5,添加测试数据

INSERT INTO `sysconfig` VALUES ('1', '测试', '2019-01-31', '1', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试');

