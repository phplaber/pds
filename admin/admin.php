<?php
/* 后台脚本 */

session_start();
header('Content-Type: text/html; charset=utf-8');

if ($_POST['un'] == 'phplaber' && $_POST['pw'] == '19880210')
{
	$_SESSION['un'] = $_POST['un'];
	$_SESSION['pw'] = $_POST['pw'];
}

if ($_SESSION['un'] == 'phplaber' && $_SESSION['pw'] == '19880210')
{
?>
<html>
<head>
<title>PDS后台管理</title>
<link rel="stylesheet" href="./css/index.css" type="text/css" />
</head>

<body>
<div id="head">
	<h1><img src="./pds.gif" title="PDS" /></h1>
</div>
<div id="content">
<div id="menu">
<ul>
	<li><img src="point.png" />&nbsp;<a href="process.php?action=basic" target="rightframe">基本信息</a></li>
	<li><img src="point.png" />&nbsp;<a href="process.php?action=example" target="rightframe">遣词造句</a></li>
	<li><img src="point.png" />&nbsp;<a href="process.php?action=audio" target="rightframe">音频管理</a></li>
	<li class="exit"><a href="process.php?action=exit">退出</a></li>
</ul>
</div>
<div id="container">
	<iframe src="process.php" name="rightframe" width="100%" height="100%" frameborder="0"></iframe>
</div>
</div>
<div id="foot">
	<p>© <a href="http://phplaber.iteye.com/" style="text-decoration: none;">phplaber</a></p>
</div>
</body>
</html>
<?php
}
else
{
	exit('Bad login.');
}
?>