<?php
/* 控制器 */
require('../mysql.class.php');
require('../Smarty/Smarty.class.php');
$smarty = new Smarty;
$pds = new MysqlConnect('localhost', 'root', '19880210', 'pds', 'utf8');

if ($_GET['action'] == 'basic')
{
	$r = $pds->query("SELECT * FROM pds_basic;");
	$count = $pds->getNumbers($r);
	$basic = array();
	for ($i=0; $i < $count; $i++)
	{
		$basic[$i] = $pds->fetchArray($r);
	}
	$smarty->assign("basics", $basic);
	$smarty->display('basic.html');
	
}
elseif ($_GET['action'] == 'example')
{
	$r = $pds->query("SELECT * FROM pds_example;");
	while ($result = $pds->fetchArray($r))
	{
		print_r($result);
	}
}
elseif ($_GET['action'] == 'add')
{

}
elseif ($_GET['action'] == 'delete')
{

}
elseif ($_GET['action'] == 'edit')
{

}
else
{
	$smarty->display('index.html');
}
?>