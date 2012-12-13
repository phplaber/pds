<?php /* Smarty version Smarty-3.1.12, created on 2012-12-13 11:54:08
         compiled from ".\templates\add.html" */ ?>
<?php /*%%SmartyHeaderCode:1351150c980c8262729-30182636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc300e1297938577198494a6c6a6fd4f237144b4' => 
    array (
      0 => '.\\templates\\add.html',
      1 => 1355399619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1351150c980c8262729-30182636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c980c8342b62_34138867',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c980c8342b62_34138867')) {function content_50c980c8342b62_34138867($_smarty_tpl) {?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
fieldset{
	font-size: 14px;}

td, textarea{
	font-size: 13px;
	font-family: Courier;}

span{
	color: #F00;}

#info{
	color: #F00;
	font-size: 13px;
	font-weight: bold;}
</style>
</head>

<body>
<fieldset>
<legend><strong>新增单词</strong></legend>
<form>
<table>
 <tbody>
	<tr>
		<td align="right"><label for="word">单词</label></td>
		<td><input type="text" name="word" id="word" />&nbsp;<span>*</span></td>
	</tr>
	<tr>
		<td align="right"><label for="phonogram">音标</label></td>
		<td><input type="text" name="phonogram" id="phonogram" /></td>
	</tr>
	<tr>
		<td align="right"><label for="oxford">牛津释义</label></td>
		<td><textarea id="oxford" name="oxford" rows="5" cols="61"></textarea></td>
	</tr>
	<tr>
		<td align="right"><label for="network">网络释义</label></td>
		<td><textarea id="network" name="network" rows="5" cols="61"></textarea>&nbsp;<span>*</span></td>
	</tr>
	<tr>
		<td cols="2"><input type="button" id="save" value="提交" /></td>
	</tr>
 </tbody>
</table>
</form>
</fieldset>
<p id="info"></p>
</body>

<script type="text/javascript" src="../jquery-1.7.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('input:button').click(function(){
		if ($.trim($('#word').val()) == '')
		{
			$('#info').html('请填写单词！');
			$('#word').focus();
			return false;
		}
		else if ($.trim($('#network').val()) == '')
		{
			$('#info').html('请填写网络释义！');
			$('#network').focus();
			return false;
		}
		else
		{
			$.post(
				'process.php',
				{
					anchor: 'add',
					word: $.trim($('#word').val()),
					phonogram: $.trim($('#phonogram').val()),
					oxford: $.trim($('#oxford').val()),
					network: $.trim($('#network').val()),
				},
				function(data)
				{
					$('fieldset').hide();	// 隐藏表单
					$('#info').html(data);
					$('#info').css('color', 'green');
				}
			);
		}
	});
});
</script>
</html><?php }} ?>