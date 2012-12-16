<?php /* Smarty version Smarty-3.1.12, created on 2012-12-16 07:19:25
         compiled from ".\templates\b_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:777450cd75fd792c88-02044161%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c987b9c0c6899800174ae395019344cf8de4c8b' => 
    array (
      0 => '.\\templates\\b_edit.html',
      1 => 1355571454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '777450cd75fd792c88-02044161',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cd75fd9b7f79_49987307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cd75fd9b7f79_49987307')) {function content_50cd75fd9b7f79_49987307($_smarty_tpl) {?><html>
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
<legend><strong>编辑单词</strong></legend>
<form>
<table>
 <tbody>
	<tr>
		<td align="right"><label for="word">单词</label></td>
		<td><input type="text" name="word" id="word" value="<?php echo $_smarty_tpl->tpl_vars['basic']->value['word'];?>
" readonly="readonly" /></td>
	</tr>
	<tr>
		<td align="right"><label for="phonogram">音标</label></td>
		<td><input type="text" name="phonogram" id="phonogram" value="<?php echo $_smarty_tpl->tpl_vars['basic']->value['phonogram'];?>
" /></td>
	</tr>
	<tr>
		<td align="right"><label for="oxford">牛津释义</label></td>
		<td><textarea id="oxford" name="oxford" rows="5" cols="61"><?php echo $_smarty_tpl->tpl_vars['basic']->value['oxford_def'];?>
</textarea></td>
	</tr>
	<tr>
		<td align="right"><label for="network">网络释义</label></td>
		<td><textarea id="network" name="network" rows="5" cols="61"><?php echo $_smarty_tpl->tpl_vars['basic']->value['network_def'];?>
</textarea>&nbsp;<span>*</span></td>
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
					anchor: 'b_edit',
					id: <?php echo $_smarty_tpl->tpl_vars['basic']->value['id'];?>
,
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