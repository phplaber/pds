<?php
/* 控制器 */
session_start();
require('../lib/mysql.class.php');
require('../Smarty/Smarty.class.php');
$db = require('../config.php');
$pds = new MysqlConnect($db['server'], $db['user'], $db['password'], $db['db'], $db['charset']);
$smarty = new Smarty;

// 查询所有单词的基本信息
if ($_GET['action'] == 'basic')
{
	// 实现分页(*每一次翻页，查询一次数据库*)
	$total = $pds->getNumbers($pds->query("SELECT * FROM pds_basic"));	// 记录总数
	$words_of_page = 8;	// 每页显示记录数
	$pagesum = ceil($total/$words_of_page);	// 总分页数
	$page = $_GET['page'];	// 当前页
	if(!isset($page) || $page > $pagesum || $page < 1)	$page=1;
	$r = $pds->query("SELECT * FROM pds_basic LIMIT ". ($page-1)*$words_of_page .",". $words_of_page);
	$count = $pds->getNumbers($r);
	$basic = array();
	for ($i=0; $i < $count; $i++)
	{
		$basic[$i] = $pds->fetchArray($r);
	}
	// notice: 更好的实践应该是将“分页显示”封装在一个类中。
	switch($pagesum)
	{
		case 1:
			$prenext = '<b>1</b>';
			break;

		case 2:
			if($page == 1)	$prenext = "<b>1</b>&nbsp;<a href='?action=basic&page=2'>2</a>";
			if($page == 2)	$prenext = "<a href='?action=basic&page=1'>1</a>&nbsp;<b>2</b>";
			break;

		case 3:
			if($page == 1)	$prenext = "<b>1</b>&nbsp;<a href='?action=basic&page=2'>2</a>&nbsp;<a href='?action=basic&page=3'>3</a>";
			if($page == 2)	$prenext = "<a href='?action=basic&page=1'>1</a>&nbsp;<b>2</b>&nbsp;<a href='?action=basic&page=3'>3</a>";
			if($page == 3)	$prenext = "<a href='?action=basic&page=1'>1</a>&nbsp;<a href='?action=basic&page=2'>2</a>&nbsp;<b>3</b>";
			break;

		default:
			if($page == 1)	$prenext = "Start&nbsp;Prev&nbsp;<b>1</b>&nbsp;<a href='?action=basic&page=2'>2</a>&nbsp;<a href='?action=basic&page=3'>3</a>&nbsp;<a href='?action=basic&page=2'>Next</a>&nbsp;<a href='?action=basic&page=".$pagesum."'>End</a>";
			if($page == 2)	$prenext = "<a href='?action=basic&page=1'>Start</a>&nbsp;<a href='?action=basic&page=1'>Prev</a>&nbsp;<a href='?action=basic&page=1'>1</a>&nbsp;<b>2</b>&nbsp;<a href='?action=basic&page=3'>3</a>&nbsp;<a href='?action=basic&page=3'>Next</a>&nbsp;<a href='?action=basic&page=".$pagesum."'>End</a>";
			if($page == 3)	$prenext = "<a href='?action=basic&page=1'>Start</a>&nbsp;<a href='?action=basic&page=2'>Prev</a>&nbsp;<a href='?action=basic&page=1'>1</a>&nbsp;<a href='?action=basic&page=2'>2</a>&nbsp;<b>3</b>&nbsp;<a href='?action=basic&page=4'>Next</a>&nbsp;<a href='?action=basic&page=".$pagesum."'>End</a>";
			if($page>3 && $page<$pagesum)	$prenext = "<a href='?action=basic&page=1'>Start</a>&nbsp;<a href='?action=basic&page=".($page-1)."'>Prev</a>&nbsp;<a href='?action=basic&page=1'>1</a>&nbsp;<a href='?action=basic&page=2'>2</a>&nbsp;<a href='?action=basic&page=3'>3</a>&nbsp;<a href='?action=basic&page=".($page+1)."'>Next</a>&nbsp;<a href='?action=basic&page=".$pagesum."'>End</a>";
			if($page == $pagesum)	$prenext = "<a href='?action=basic&page=1'>Start</a>&nbsp;<a href='?action=basic&page=".($page-1)."'>Prev</a>&nbsp;<a href='?action=basic&page=1'>1</a>&nbsp;<a href='?action=basic&page=2'>2</a>&nbsp;<a href='?action=basic&page=3'>3</a>&nbsp;Next&nbsp;End";
	}
	$smarty->assign("prenext", $prenext);
	$smarty->assign("basics", $basic);
	$smarty->display('basic.html');
}
// 查询所有单词的例句
elseif ($_GET['action'] == 'example')
{
	$total = $pds->getNumbers($pds->query("SELECT * FROM pds_example"));
	$examples_of_page = 30;	// 每页显示记录数
	$pagesum = ceil($total/$examples_of_page);	// 总分页数
	$page = $_GET['page'];	// 当前页
	if(!isset($page) || $page > $pagesum || $page < 1)	$page=1;
	$r = $pds->query("SELECT * FROM pds_example ORDER BY wid ASC LIMIT ". ($page-1)*$examples_of_page .",". $examples_of_page);
	$count = $pds->getNumbers($r);
	$example = array();
	for ($i=0; $i < $count; $i++)
	{
		$result = $pds->fetchArray($r);
		// 用单词替换单词id
		$word = $pds->fetchArray($pds->query("SELECT word FROM pds_basic WHERE id = " .$result['wid']));
		$result['wid'] = $word['word'];
		// 高亮显示例句中单词
		$word['word'] = strtolower($word['word']);
		$result['example_en'] = str_ireplace($word['word'], "<b style='color:green;'>{$word['word']}</b>", $result['example_en']);
		$example[$i] = $result;
	}
	switch($pagesum)
	{
		case 1:
			$prenext = '<b>1</b>';
			break;

		case 2:
			if($page == 1)	$prenext = "<b>1</b>&nbsp;<a href='?action=example&page=2'>2</a>";
			if($page == 2)	$prenext = "<a href='?action=example&page=1'>1</a>&nbsp;<b>2</b>";
			break;

		case 3:
			if($page == 1)	$prenext = "<b>1</b>&nbsp;<a href='?action=example&page=2'>2</a>&nbsp;<a href='?action=example&page=3'>3</a>";
			if($page == 2)	$prenext = "<a href='?action=example&page=1'>1</a>&nbsp;<b>2</b>&nbsp;<a href='?action=example&page=3'>3</a>";
			if($page == 3)	$prenext = "<a href='?action=example&page=1'>1</a>&nbsp;<a href='?action=example&page=2'>2</a>&nbsp;<b>3</b>";
			break;

		default:
			if($page == 1)	$prenext = "Start&nbsp;Prev&nbsp;<b>1</b>&nbsp;<a href='?action=example&page=2'>2</a>&nbsp;<a href='?action=example&page=3'>3</a>&nbsp;<a href='?action=example&page=2'>Next</a>&nbsp;<a href='?action=example&page=".$pagesum."'>End</a>";
			if($page == 2)	$prenext = "<a href='?action=example&page=1'>Start</a>&nbsp;<a href='?action=example&page=1'>Prev</a>&nbsp;<a href='?action=example&page=1'>1</a>&nbsp;<b>2</b>&nbsp;<a href='?action=example&page=3'>3</a>&nbsp;<a href='?action=example&page=3'>Next</a>&nbsp;<a href='?action=example&page=".$pagesum."'>End</a>";
			if($page == 3)	$prenext = "<a href='?action=example&page=1'>Start</a>&nbsp;<a href='?action=example&page=2'>Prev</a>&nbsp;<a href='?action=example&page=1'>1</a>&nbsp;<a href='?action=example&page=2'>2</a>&nbsp;<b>3</b>&nbsp;<a href='?action=example&page=4'>Next</a>&nbsp;<a href='?action=example&page=".$pagesum."'>End</a>";
			if($page>3 && $page<$pagesum)	$prenext = "<a href='?action=example&page=1'>Start</a>&nbsp;<a href='?action=example&page=".($page-1)."'>Prev</a>&nbsp;<a href='?action=example&page=1'>1</a>&nbsp;<a href='?action=example&page=2'>2</a>&nbsp;<a href='?action=example&page=3'>3</a>&nbsp;<a href='?action=example&page=".($page+1)."'>Next</a>&nbsp;<a href='?action=example&page=".$pagesum."'>End</a>";
			if($page == $pagesum)	$prenext = "<a href='?action=example&page=1'>Start</a>&nbsp;<a href='?action=example&page=".($page-1)."'>Prev</a>&nbsp;<a href='?action=example&page=1'>1</a>&nbsp;<a href='?action=example&page=2'>2</a>&nbsp;<a href='?action=example&page=3'>3</a>&nbsp;Next&nbsp;End";
	}
	$smarty->assign("prenext", $prenext);
	$smarty->assign("examples", $example);
	$smarty->display('example.html');
}
// 音频文件
elseif($_GET['action'] == 'audio')
{
	$dir = '../audio';
	$dirObj = dir($dir);
	$audio = array();
	//var_dump($dirObj);
	while ($file = $dirObj->read())
	{
		if ($file !== '.' && $file !== '..')
			$audio[] = $file;
	}
	$smarty->assign("audio", $audio);
	$smarty->display('audio.html');
}
// 处理音频文件上传
elseif ($_POST['anchor'] == 'upload')
{
	$audioDir = '../audio/';
	$audioName = $audioDir . basename($_FILES['audio']['name']);

	if (move_uploaded_file($_FILES['audio']['tmp_name'], $audioName))
	{
		// 刷新页面
		echo <<<JS
		<script type="text/javascript">
			var url = 'process.php?action=audio';
			location.href = url;
		</script>
JS;
	}
	else
		echo '<span style="color: #F00; font-weight: bold;">Upload file fail!</span>';
}
// [begin 新增单词]
elseif ($_GET['action'] == 'b_add')
{
	$smarty->display('b_add.html');
}
elseif ($_POST['anchor'] == 'b_add')
{
	$word = strtolower($_POST['word']);
	$phonogram = $_POST['phonogram'];
	$oxford = $_POST['oxford'];
	$network = $_POST['network'];
	
	$r = $pds->query("INSERT INTO pds_basic VALUES(null, '" .$word. "', '" .$phonogram. "', '" .$oxford. "', '" .$network. "')");
	if ($r) echo '新增成功';
}
// [end 新增单词]

// 删除单词
elseif ($_GET['action'] == 'b_delete')
{
	$id = $_GET['id'];
	$r = $pds->query("DELETE FROM pds_basic WHERE id = " .$id );
	if ($r) echo '<p style="font-size: 13px; font-weight: bold; color: green;">删除成功</p>';
}

// [begin 更新单词]
elseif ($_GET['action'] == 'b_edit')
{
	$id = $_GET['id'];
	$r = $pds->query("SELECT * FROM pds_basic WHERE id = " .$id );
	$basic = $pds->fetchArray($r);
	$smarty->assign("basic", $basic);
	$smarty->display('b_edit.html');
}
elseif ($_POST['anchor'] == 'b_edit')
{
	$id = $_POST['id'];
	$phonogram = $_POST['phonogram'];
	$oxford = $_POST['oxford'];
	$network = $_POST['network'];
	
	$r = $pds->query("UPDATE pds_basic SET phonogram = '" .$phonogram. "', oxford_def = '" .$oxford. "', network_def = '" .$network. "' WHERE id = {$id}");
	if ($r) echo '更新成功';
}
// [end 更新单词]

// 删除单词例句
elseif ($_GET['action'] == 'e_delete')
{
	$id = $_GET['id'];
	$r = $pds->query("DELETE FROM pds_example WHERE id = " .$id );
	if ($r) echo '<p style="font-size: 13px; font-weight: bold; color: green;">删除成功</p>';
}

// [begin 新增单词例句]
elseif ($_GET['action'] == 'e_add')
{
	$smarty->display('e_add.html');
}
elseif ($_POST['anchor'] == 'e_add')
{
	$word = $_POST['word'];
	$example_en_1 = htmlspecialchars($_POST['example_en_1']);
	$example_zh_1 = htmlspecialchars($_POST['example_zh_1']);

	// 通过$word在pds_basic中找到对应id
	$tmp1 = $pds->query("SELECT id FROM pds_basic WHERE word = '" .$word. "' LIMIT 1");
	$tmp2 = $pds->fetchArray($tmp1);
	//var_dump($tmp2);exit;
	if (!$tmp2)
	{
		echo "单词{$word}不存在，请先新增单词。";
		exit;
	}
	$wid = $tmp2['id'];

	// 当example_en_2为空时，正常情况下example_en_3也应该为空。
	if ($_POST['example_en_2'] == '')
	{
		$r = $pds->query("INSERT INTO pds_example VALUES(null, '" .$wid. "', '" .$example_en_1. "', '" .$example_zh_1. "')");
		if ($r)	echo '新增成功';
	}
	else
	{
		$example_en_2 = htmlspecialchars($_POST['example_en_2']);
		$example_zh_2 = htmlspecialchars($_POST['example_zh_2']);
		if ($_POST['example_en_3'] == '')
		{
			$r1 = $pds->query("INSERT INTO pds_example VALUES(null, '" .$wid. "', '" .$example_en_1. "', '" .$example_zh_1. "')");
			$r2 = $pds->query("INSERT INTO pds_example VALUES(null, '" .$wid. "', '" .$example_en_2. "', '" .$example_zh_2. "')");
			if ($r1 && $r2)	echo '新增成功';
		}
		else
		{
			$example_en_3 = htmlspecialchars($_POST['example_en_3']);
			$example_zh_3 = htmlspecialchars($_POST['example_zh_3']);

			$r1 = $pds->query("INSERT INTO pds_example VALUES(null, '" .$wid. "', '" .$example_en_1. "', '" .$example_zh_1. "')");
			$r2 = $pds->query("INSERT INTO pds_example VALUES(null, '" .$wid. "', '" .$example_en_2. "', '" .$example_zh_2. "')");
			$r3 = $pds->query("INSERT INTO pds_example VALUES(null, '" .$wid. "', '" .$example_en_3. "', '" .$example_zh_3. "')");
			if ($r1 && $r2 && $r3)	echo '新增成功';
		}
	}

}
// [end 新增单词例句]

// [begin 更新单词例句]
elseif ($_GET['action'] == 'e_edit')
{
	$id = $_GET['id'];
	$r = $pds->query("SELECT * FROM pds_example WHERE id = " .$id );
	$example = $pds->fetchArray($r);
	$tmp1 = $pds->query("SELECT word FROM pds_basic WHERE id =". $example['wid']);
	$tmp2 = $pds->fetchArray($tmp1);
	$example['word'] = $tmp2['word'];
	$smarty->assign("example", $example);
	$smarty->display('e_edit.html');
}
elseif ($_POST['anchor'] == 'e_edit')
{
	$id = $_POST['id'];
	$example_en = htmlspecialchars($_POST['example_en']);
	$example_zh = htmlspecialchars($_POST['example_zh']);

	$r = $pds->query("UPDATE pds_example SET example_en = '" .$example_en. "', example_zh = '" .$example_zh. "' WHERE id = {$id}");
	if ($r) echo '更新成功';
}
// [end 更新单词例句]

// 注销退出
elseif ($_GET['action'] == 'exit')
{
	unset($_SESSION['un'], $_SESSION['pw']);
	echo <<<JS
		<script type="text/javascript">
			var url = './index.html';
			location.href = url;
		</script>
JS;
	exit;
}
// 后台首页
else
{
	$smarty->display('index.html');
}
?>