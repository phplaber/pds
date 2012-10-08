-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2012 年 10 月 08 日 14:45
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `pds`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `pds_basic`
-- 

CREATE TABLE `pds_basic` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `word` varchar(30) NOT NULL,
  `phonogram` varchar(30) NOT NULL,
  `oxford_def` varchar(255) NOT NULL,
  `network_def` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `pds_basic`
-- 

INSERT INTO `pds_basic` VALUES (1, 'python', '[ˈpaɪˌθɔn, -θən]', '<b>noun</b> [C] a large snake that kills animals by squeezing them very hard. 蟒蛇；蚺蛇；巨蟒', '1. 巨蟒<br/>2. Python（KK 英语发音：/''paɪθɑn/, DJ 英语发音：/ˈpaiθən/）是一种面向对象、直译式计算机程序设计语言，由Guido van Rossum于1989年底发明，第一个公开发行版发行于1991年。Python语法简捷而清晰，具有丰富和强大的类库。它常被昵称为胶水语言，它能够很轻松的把用其他语言制作的各种模块（尤其是C/C++）轻松地联结在一起。');
INSERT INTO `pds_basic` VALUES (2, 'perl', '', '<b>abbr</b>. 实际抽取与汇报语言（Practical Extraction and Reporting Language）', 'Perl语言');
INSERT INTO `pds_basic` VALUES (3, 'ruby', '[ˈru:bi]', '<b>noun</b> [C] a type of precious stone that is red 红宝石', 'n. 红宝石；红宝石色<br/>\r\nadj. 红宝石色的<br/>\r\n计算机语言：<br/>Ruby，一种为简单快捷的面向对象编程（面向对象程序设计）而创的脚本语言，在20世纪90年代由日本人松本行弘（まつもとゆきひろ/Yukihiro Matsumoto）开发，遵守GPL协议和Ruby License。它的灵感与特性来自于 Perl、Smalltalk、Eiffel、Ada 以及 Lisp 语言。由 Ruby 语言本身还发展出了JRuby（Java 平台）、IronRuby（.NET 平台）等其他平台的 Ruby 语言替代品。Ruby的作者于1993年2月24日开始编写Ruby，直至1995年12月才正式公开发布于fj（新闻组）。因为Perl发音与6月诞生石pearl（珍珠）相同，因此Ruby以7月诞生石ruby（红宝石）命名。');

-- --------------------------------------------------------

-- 
-- 表的结构 `pds_example`
-- 

CREATE TABLE `pds_example` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `wid` int(11) unsigned NOT NULL,
  `example_en` varchar(255) NOT NULL,
  `example_zh` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- 导出表中的数据 `pds_example`
-- 

INSERT INTO `pds_example` VALUES (1, 1, 'A giant python sure gave these folks a scare.', '这条巨蟒足以让村民大吃一惊。');
INSERT INTO `pds_example` VALUES (2, 1, 'I know. I accidentally set a python on my cousin dudley at the zoo once.', '我知道了，我是说，上次我曾无意中和我表哥达德利在动物园的时候放走了一条大蟒。');
INSERT INTO `pds_example` VALUES (3, 1, 'The python is more than a match for the alligator.', '蚺蛇要比鳄鱼厉害多了。');
INSERT INTO `pds_example` VALUES (4, 2, 'Perl quickly became the dominant language for cgi programming.', 'perl则迅速成为了CGI编程的主要语言。');
INSERT INTO `pds_example` VALUES (5, 2, 'Perl is an excellent language for text analysis.', 'perl是用于文本分析的一种出色语言。');
INSERT INTO `pds_example` VALUES (6, 3, 'Ruby is the most precious of precious stones.', '红宝石是宝石中的珍品。');
INSERT INTO `pds_example` VALUES (7, 3, 'She wears a ruby ring.', '她戴着只红宝石戒指。');
INSERT INTO `pds_example` VALUES (8, 3, 'Her ruby necklace brightened her face.', '红宝石项链照亮了她的脸庞。');
