-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2012 年 12 月 16 日 08:30
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `pds_basic`
-- 

INSERT INTO `pds_basic` VALUES (1, 'python', '[ˈpaɪˌθɔn,-θən]', '<b>noun</b> [C] a large snake that kills animals by squeezing them very hard. 蟒蛇；蚺蛇；巨蟒', '1. 巨蟒<br/>2. Python（KK 英语发音：[paɪθɑn], DJ 英语发音：[paiθən]）是一种面向对象、直译式计算机程序设计语言，由Guido van Rossum于1989年底发明，第一个公开发行版发行于1991年。Python语法简捷而清晰，具有丰富和强大的类库。它常被昵称为胶水语言，它能够很轻松的把用其他语言制作的各种模块（尤其是C/C++）轻松地联结在一起。');
INSERT INTO `pds_basic` VALUES (2, 'perl', '', '<b>abbr</b>. 实际抽取与汇报语言（Practical Extraction and Reporting Language）', 'Perl语言');
INSERT INTO `pds_basic` VALUES (3, 'ruby', '[ˈru:bi]', '<b>noun</b> [C] a type of precious stone that is red 红宝石', 'n. 红宝石；红宝石色<br/>\nadj. 红宝石色的<br/>\n计算机语言：<br/>Ruby，一种为简单快捷的面向对象编程（面向对象程序设计）而创的脚本语言，在20世纪90年代由日本人松本行弘（まつもとゆきひろ/Yukihiro Matsumoto）开发，遵守GPL协议和Ruby License。它的灵感与特性来自于 Perl、Smalltalk、Eiffel、Ada 以及 Lisp 语言。由 Ruby 语言本身还发展出了JRuby（Java 平台）、IronRuby（.NET 平台）等其他平台的 Ruby 语言替代品。Ruby的作者于1993年2月24日开始编写Ruby，直至1995年12月才正式公开发布于fj（新闻组）。因为Perl发音与6月诞生石pearl（珍珠）相同，因此Ruby以7月诞生石ruby（红宝石）命名。');
INSERT INTO `pds_basic` VALUES (4, 'shell', '[ʃel]', '<b>noun</b> [C] a hard covering that protects eggs,nuts and some animals. （蛋，坚果及某些动物的）壳', '在计算机科学中，Shell俗称壳（用来区别于核），是指“提供使用者使用界面”的软件（命令解析器）。它类似于DOS下的command.com。它接收用户命令，然后调用相应的应用程序。<br/>同时它又是一种程序设计语言。作为命令语言，它交互式解释和执行用户输入的命令或者自动地解释和执行预先设定好的一连串的命令；作为程序设计语言，它定义了各种变量和参数，并提供了许多在高阶语言中才具有的控制结构，包括循环和分支。');
INSERT INTO `pds_basic` VALUES (6, 'kernel', '[ˈkə:nəl]', '<b>noun</b> [C] the inner part of a nut or seed （坚果或种子内的）仁，核', 'Kernel 操作系统内核 操作系统内核是指大多数操作系统的核心部分。它由操作系统中用于管理存储器、文件、外设和系统资源的那些部分组成。操作系统内核通常运行进程，并提供进程间的通信。');
INSERT INTO `pds_basic` VALUES (10, 'gonna', '[ˈɡɔnə]', '(informal 非正式)a way of writing (going to) to show that sb is speaking in an informal way.', '（用于书面英语中表示going to的非正式发音形式）Gonna is used in written English to represent the words (going to) when they are pronounced informally.');
INSERT INTO `pds_basic` VALUES (11, 'stack', '[stæk]', '<b>noun</b> [C] a tidy pile of sth （整齐的）一叠，一堆，一摞', '栈（stack）在计算机科学中是限定仅在表尾进行插入或删除操作的线性表。栈是一种数据结构，它按照后进先出的原则存储数据，先进入的数据被压入栈底，最后的数据在栈顶，需要读数据的时候从栈顶开始弹出数据。栈是只能在某一端插入和删除的特殊线性表。用桶堆积物品，先堆进来的压在底下，随后一件一件往堆。取走时，只能从上面一件一件取。堆和取都在顶部进行，底部一般是不动的。栈就是一种类似桶堆积物品的数据结构，进行删除和插入的一端称栈顶，另一堆称栈底。插入一般称为进栈，删除则称为退栈。 栈也称为后进先出表。');
INSERT INTO `pds_basic` VALUES (12, 'compile', '[kəmˈpail]', '<b>verb</b> （计算机技术）to translate instructions from one computer language into another for a computer to understand （将一种计算机语言）编译（成另一种计算机语言）', '编译<br/> 1、利用编译程序从源语言编写的源程序产生目标程序的过程。<br/> 2、用编译程序产生目标程序的动作。 编译就是把高级语言变成计算机可以识别的2进制语言，计算机只认识1和0，编译程序把人们熟悉的语言换成2进制的。 <br/>编译程序把一个源程序翻译成目标程序的工作过程分为五个阶段：词法分析；语法分析；语义检查和中间代码生成；代码优化；目标代码生成。主要是进行词法分析和语法分析，又称为源程序分析，分析过程中发现有语法错误，给出提示信息。');
INSERT INTO `pds_basic` VALUES (13, 'interpreter', '[ɪnˈtɜ:prɪtə]', '<b>noun</b> [C] a person whose job is to translate what is saying immediately into another language 口译员；传译员', '解释器是能够执行用其他计算机语言编写的程序的系统软件，它是一种翻译程序。它的执行方式是一边翻译一边执行，因此其执行效率一般偏低，但是解释器的实现较为简单，而且编写源程序的高级语言可以使用更加灵活和富于表现力的语法。');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

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
INSERT INTO `pds_example` VALUES (9, 4, 'Secure remote management of the switch via secure shell (ssh) and ssl secure channel network protocols.', '安全的远程管理交换机通过安全Shell（SSH）和SSL安全通道网络协议。');
INSERT INTO `pds_example` VALUES (10, 4, 'That''s a fanlike shell.', '那是扇状的贝壳。');
INSERT INTO `pds_example` VALUES (11, 4, 'Do not throw confetti, and nut shell does not litter bags.', '不乱扔纸屑，不乱丢果壳和包装袋。');
INSERT INTO `pds_example` VALUES (12, 6, 'We must get at the kernel of the problem.', '我们必须抓住问题的核心。');
INSERT INTO `pds_example` VALUES (13, 6, 'Palm kernel oil and cottonseed oil.', '棕榈仁油和棉籽油。');
INSERT INTO `pds_example` VALUES (14, 6, 'The code associated with many standard networking services is integrated into the linux kernel.', '与码有关的许多标准连网服务进入linux内核被整合。');
INSERT INTO `pds_example` VALUES (22, 10, 'Then, what am I gonna do?', '那么，我该怎么办呢？');
INSERT INTO `pds_example` VALUES (23, 10, 'We will see what is gonna happen.', '我们将期待什么将要发生。');
INSERT INTO `pds_example` VALUES (24, 11, 'It is extremely difficult to programmatically handle a stack overflow.', '以编程方式处理堆栈溢出极为困难。');
INSERT INTO `pds_example` VALUES (25, 11, 'You will find a little stack of candles in reserve.', '你会发现一小堆备用蜡烛。');
INSERT INTO `pds_example` VALUES (26, 12, 'Lots of compile fixes for various platforms.', '为不同平台进行多个编译修复。');
INSERT INTO `pds_example` VALUES (27, 13, 'The shell is an interpreter.', 'shell是一个解释程序。');
INSERT INTO `pds_example` VALUES (28, 13, 'I wish to be an interpreter in the future.', '我以后想做口译员。');
INSERT INTO `pds_example` VALUES (29, 13, 'The perl interpreter has many options.', 'perl解释器有许多选项。');
