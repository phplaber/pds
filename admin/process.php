<?php
/* 控制器 */
session_start();
require('../mysql.class.php');
require('../Smarty/Smarty.class.php');
$smarty = new Smarty;
$pds = new MysqlConnect('localhost', 'root', '19880210', 'pds', 'utf8');

// 查询所有单词的基本信息
if ($_GET['action'] == 'basic')
{
	$r = $pds->query("SELECT * FROM pds_basic");
	$count = $pds->getNumbers($r);
	$basic = array();
	for ($i=0; $i < $count; $i++)
	{
		$basic[$i] = $pds->fetchArray($r);
	}
	$smarty->assign("basics", $basic);
	$smarty->display('basic.html');
	
}
// 查询所有单词的基本例句
elseif ($_GET['action'] == 'example')
{
	$r = $pds->query("SELECT * FROM pds_example");
	while ($result = $pds->fetchArray($r))
	{
		print_r($result);
	}
}
// 展示“新增”表单
elseif ($_GET['action'] == 'add')
{
	$smarty->display('add.html');
}
// 向数据库写入“新增”表单提交数据
elseif ($_POST['anchor'] == 'add')
{
	$word = $_POST['word'];
	$phonogram = $_POST['phonogram'];
	$oxford = $_POST['oxford'];
	$network = $_POST['network'];
	
	$r = $pds->query("INSERT INTO pds_basic VALUES(null, '" .$word. "', '" .$phonogram. "', '" .$oxford. "', '" .$network. "')");
	if ($r) echo '新增成功';
}
// 删除单词
elseif ($_GET['action'] == 'delete')
{
	$id = $_GET['id'];
	$r = $pds->query("DELETE FROM pds_basic WHERE id = " .$id );
	if ($r) echo '<p style="font-size: 13px; font-weight: bold; color: green;">删除成功</p>';
}
// 编辑单词
elseif ($_GET['action'] == 'edit')
{
	$id = $_GET['id'];
	$r = $pds->query("SELECT * FROM pds_basic WHERE id = " .$id );
	$basic = $pds->fetchArray($r);
	//print_r($basic);exit;
	$smarty->assign("basic", $basic);
	$smarty->display('edit.html');
}
elseif ($_POST['anchor'] == 'edit')
{
	$id = $_POST['id'];
	$word = $_POST['word'];
	$phonogram = $_POST['phonogram'];
	$oxford = $_POST['oxford'];
	$network = $_POST['network'];
	
	$r = $pds->query("UPDATE pds_basic SET word = '" .$word. "', phonogram = '" .$phonogram. "', oxford_def = '" .$oxford. "', network_def = '" .$network. "' WHERE id = {$id}");
	if ($r) echo '更新成功';
}
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