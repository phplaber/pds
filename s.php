<?php
	if(!trim($_GET['wd']))
	{
		header("Location: ./index.html");
		exit;
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>个人词典系统1.0</title>

<style type="text/css">
/* for IE */
body{
	text-align:center;}

/* for Mozilla */
#searchForm,#display{
	margin:30px auto;
	width:760px;
	text-align:left;}
	
#searchForm #wd{
    background: url("i2.png") no-repeat 0 0;
    border-color: #7B7B7B #B6B6B6 #B6B6B6 #7B7B7B;
    border-image: none;
    border-style: solid;
    border-width: 1px;
    font: 16px arial;
    height: 32px;
    margin-right: 5px;
    outline: medium none;
    overflow: hidden;
    padding: 5px 7px;
    vertical-align: top;
    width: 420px;}

#searchForm #st{
	background: url("i-1.0.0.png") repeat 0 0 #DDDDDD;
    border: 0 none;
    cursor: pointer;
    font-size: 14px;
    height: 32px;
    padding: 0;
    width: 95px;}

h2 span{
	font-size:13px;
	font-weight:normal;
	margin-left:20px;
	color:green;}

h2 span b{
	margin:0 5px;
	font-weight:normal;}

h2 span a{
	background:url("buttons.png") no-repeat -124px -4px;
	margin-top: -3px;
	opacity: 0.667;
	vertical-align: middle;
	display: inline-block;
    height: 21px;
    width: 21px;}

h2 span a:hover{
	background-color:#EBEBEB;
	opacity:0.9;}

ul.oxford,ul.network,ul.example{
	border-bottom: 1px solid #CCCCCC;
    font-size: 14px;
    list-style: none outside none;
	margin:0;
    margin-top: 50px;
    padding: 0 0 7px 10px;}

ul.oxford li,ul.network li,ul.example li{
	background: none repeat scroll 0 0 white;
    border: 1px solid #CCCCCC;
	border-bottom:none;
    color: #000000;
    font-weight: bold;
	cursor: pointer;
    display: inline;
    margin-right: -5px;
    padding: 6px 12px;
    position: relative;
	bottom: -2.5px;}

#display p{
	font-size:15px;
	line-height:23px;}

/* 找不到搜索关键词 */
#report{
	margin:10px auto;
	width:760px;
	text-align:left;}

#report p.wd{
	font-size:15px;
	font-family:Courier;}

#report p.nf{
	font-size:13px;
	font-family:Courier;}

#report strong{
	color:green;}

</style>
</head>

<body>
<!--搜索表单-->
<div id="searchForm">
<h3>个人词典系统1.0</h3>
<form name="sf" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" id="wd" name="wd" maxlength="50" /><span class="s"><input type="submit" id="st" value="搜索一下"></span>
</form>
</div>
<?php
	// 个人词典系统（PDS）
	require('mysql.class.php');
	$db = require('config.php');

	$pds = new MysqlConnect($db['server'], $db['user'], $db['password'], $db['db'], $db['charset']);
	// 查询搜索关键词对应id
	$result_id = $pds->fetchArray($pds->query("SELECT id FROM pds_basic WHERE word='".trim($_GET['wd'])."'"));
	if(!$result_id)
	{
		$report = <<<HTML
		<div id="report">
			<p class="wd">搜索 <strong>{$_GET['wd']}</strong> 的结果：</p>
			<p class="nf">没找到相关内容<br/>搜索建议： 使用更一般的关键词</p>
		</div>
HTML;
		echo $report;
		exit;
	}
	$wid = $result_id['id'];
	$result_basic = $pds->query("SELECT * FROM pds_basic WHERE id = {$wid}");
	// 查询关键词基本信息
	$basic = $pds->fetchArray($result_basic);
?>

<!--搜索结果-->
<div id="display">
<h2><?php echo $basic['word'];?><span>[英]<b lang="en" xml:lang="en"><?php echo $basic['phonogram'];?></b><a href="#" class="" title="Listen"></a></span></h2>
<ul class="oxford">
<li>牛津释义</li>
</ul>
<p><?php echo $basic['oxford_def']; ?></p>
<ul class="network">
<li>网络释义</li>
</ul>
<p><?php echo $basic['network_def']; ?></p>
<ul class="example">
<li>例句</li>
</ul>
<?php
	$result_example = $pds->query("SELECT example_en,example_zh FROM pds_example WHERE wid = {$wid}");
	$i = 1;
	// 循环列出例句
	while($example = $pds->fetchArray($result_example))
	{
		$basic['word'] = strtolower($basic['word']);
		$example['example_en'] = str_ireplace($basic['word'], "<b style='color:green;'>{$basic['word']}</b>", $example['example_en']);
		echo "<p>{$i}. {$example['example_en']}<br/>&nbsp;&nbsp;&nbsp;{$example['example_zh']}</p>";
		$i++;
	}
	$pds->close();
?> 
</div>
<script type="text/javascript" src="jquery-1.7.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("a").click(function(){
	$("embed").remove();
	$("body").append("<embed src='audio/<?php echo $basic['word'];?>.mp3' autostart='true' hidden='true' loop='false' />");
	});
});
</script>
</body>
</html>