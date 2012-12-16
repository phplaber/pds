<?php /* Smarty version Smarty-3.1.12, created on 2012-12-16 07:12:24
         compiled from ".\templates\b_add.html" */ ?>
<?php /*%%SmartyHeaderCode:2754550cd74589e0e33-66326479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88bf2672810c5ed86e6f8d36608496532f5d9d5b' => 
    array (
      0 => '.\\templates\\b_add.html',
      1 => 1355547253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2754550cd74589e0e33-66326479',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cd7458a9bd83_73508236',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cd7458a9bd83_73508236')) {function content_50cd7458a9bd83_73508236($_smarty_tpl) {?><html>
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
					anchor: 'b_add',
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