<?php /* Smarty version Smarty-3.1.12, created on 2012-12-15 13:05:17
         compiled from ".\templates\e_add.html" */ ?>
<?php /*%%SmartyHeaderCode:3198450cc758d383d81-01262377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '269b2fbbf0cab784f3c0e09e020f3fe815db59b2' => 
    array (
      0 => '.\\templates\\e_add.html',
      1 => 1355565630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3198450cc758d383d81-01262377',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cc758d463f81_27796193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cc758d463f81_27796193')) {function content_50cc758d463f81_27796193($_smarty_tpl) {?><html>
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
<legend><strong>新增单词例句</strong></legend>
<form>
<table>
 <tbody>
	<tr>
		<td align="right"><label for="word">单词</label></td>
		<td><input type="text" name="word" id="word" />&nbsp;<span>*</span></td>
	</tr>
	<tr>
		<td align="right"><label for="example_en_1">例句</label></td>
		<td><textarea id="example_en_1" name="example_en_1" rows="3" cols="61"></textarea>&nbsp;<span>*</span></td>
	</tr>
	<tr>
		<td align="right"><label for="example_zh_1">翻译</label></td>
		<td><textarea id="example_zh_1" name="example_zh_1" rows="3" cols="61"></textarea></td>
	</tr>
	<tr style="display: none;">
		<td align="right"><label for="example_en_2">+ 例句</label></td>
		<td><textarea id="example_en_2" name="example_en_2" rows="3" cols="61"></textarea></td>
	</tr>
	<tr style="display: none;">
		<td align="right"><label for="example_zh_2">+ 翻译</label></td>
		<td><textarea id="example_zh_2" name="example_zh_2" rows="3" cols="61"></textarea></td>
	</tr>
	<tr style="display: none;">
		<td align="right"><label for="example_en_3">++ 例句</label></td>
		<td><textarea id="example_en_3" name="example_en_3" rows="3" cols="61"></textarea></td>
	</tr>
	<tr style="display: none;">
		<td align="right"><label for="example_zh_3">++ 翻译</label></td>
		<td><textarea id="example_zh_3" name="example_zh_3" rows="3" cols="61"></textarea></td>
	</tr>
	<tr>
		<td><input type="button" id="add" value="添加" /></td>
		<td><input type="button" id="save" value="提交" /></td>
	</tr>
 </tbody>
</table>
</form>
</fieldset>
<p id="info"></p>

<script type="text/javascript" src="../jquery-1.7.2.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$('#add').click(function(){
		$('tr').show();
		$(this).prop("disabled", true);	// 禁用按钮
	});
	
	$('#save').click(function(){
		if ($.trim($('#word').val()) == '')
		{
			$('#info').html('请填写单词！');
			$('#word').focus();
			return false;
		}
		else if ($.trim($('#example_en_1').val()) == '')
		{
			$('#info').html('请填写例句！');
			$('#example_en_1').focus();
			return false;
		}
		else
		{
			$.post(
				'process.php',
				{
					anchor: 'e_add',
					word: $.trim($('#word').val()),
					example_en_1: $.trim($('#example_en_1').val()), 
					example_en_2: $.trim($('#example_en_2').val()), 
					example_en_3: $.trim($('#example_en_3').val()),
					example_zh_1: $.trim($('#example_zh_1').val()), 
					example_zh_2: $.trim($('#example_zh_2').val()), 
					example_zh_3: $.trim($('#example_zh_3').val())
				},
				function(data)
				{
					$('fieldset').hide();
					$('#info').html(data);
					$('#info').css('color', 'green');
				}
			);
		}
	});
});
</script>
</body>
</html><?php }} ?>