<?php /* Smarty version Smarty-3.1.12, created on 2012-12-16 08:28:29
         compiled from ".\templates\audio.html" */ ?>
<?php /*%%SmartyHeaderCode:1033550cd65fec66588-78979658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '761ef8d4dfef979e4643ce167ab1bb577da8c55d' => 
    array (
      0 => '.\\templates\\audio.html',
      1 => 1355646505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1033550cd65fec66588-78979658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cd65ff14e213_38780958',
  'variables' => 
  array (
    'audio' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cd65ff14e213_38780958')) {function content_50cd65ff14e213_38780958($_smarty_tpl) {?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
fieldset{
	font-size: 14px;}

ul{
	margin: 20px 0;
	list-style: none;}

li{
	padding: 7px 0;
	font-size: 15px;}

a,a:visited{
	text-decoration: none;}

a:hover{
	text-decoration: underline;}

span{
	font-size: 13px;
	color: #00CD00;}
</style>
</head>

<body>
<fieldset>
<legend><strong>音频文件管理</strong></legend>
<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['audio']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<li><img src="mp3.png" />&nbsp;<a href="../audio/<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a></li>
<?php } ?>
</ul>
<form method="post" action="process.php" enctype="multipart/form-data">
<input type="hidden" name="anchor" value="upload" />
<input type="file" name="audio" id="audio" />&nbsp;<input type="submit" value="上传" />&nbsp;<span>（tips: 在上传音频文件前，请确保文件名为对应单词）</span>
</form>
</fieldset>

</body>
</html><?php }} ?>