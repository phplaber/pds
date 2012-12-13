<?php /* Smarty version Smarty-3.1.12, created on 2012-12-13 11:54:04
         compiled from ".\templates\basic.html" */ ?>
<?php /*%%SmartyHeaderCode:973450c98086ed3cf1-26605238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ede3d4c2672b584c0d6fddec90202cd81cb2d21c' => 
    array (
      0 => '.\\templates\\basic.html',
      1 => 1355399596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '973450c98086ed3cf1-26605238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50c9808712f960_08593098',
  'variables' => 
  array (
    'basics' => 0,
    'basic' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c9808712f960_08593098')) {function content_50c9808712f960_08593098($_smarty_tpl) {?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
p.add a,a:visited{
	text-decoration: none;}

p.add a:hover{
	text-decoration: none;}

th, td{
	border: 1px solid #CCC;
	font-size: 13px;}
	
textarea{
	font-size: 13px;}
	
td a,a:visited{
	font-weight: bold;
	color: #9999CC;}

td a:hover{
	text-decoration: none;}

td a.delete:hover{
	background-color: #F00;
	color: #FFF;}
</style>
</head>

<body>
<p class="add"><a href="process.php?action=add">新增</a></p>
<table width="100%" cellspacing="0" cellpadding="2">
 <tbody>
	<tr bgcolor="#00CD00">
		<th width="3%">ID</th>
		<th width="10%">单词</th>
		<th width="10%">音标</th>
		<th width="29%">牛津释义</th>
		<th width="40%">网络释义</th>
		<th width="8%">操作</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['basic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['basic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['basics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['basic']->key => $_smarty_tpl->tpl_vars['basic']->value){
$_smarty_tpl->tpl_vars['basic']->_loop = true;
?>
	<tr>
	 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['basic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	 <!-- 为了使表格美观整齐，将“牛津释义”表格单元放在文本域中。-->
	 <?php if ($_smarty_tpl->tpl_vars['key']->value=="network_def"){?>
		<td><textarea rows="5" cols="61"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</textarea></td>
	 <?php }elseif($_smarty_tpl->tpl_vars['item']->value==''){?>
		<td>&nbsp;</td>	<!-- 保持表格完整性 -->
	 <?php }else{ ?>
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
	 <?php }?>
	 <?php } ?>
		<td>
			<a href="process.php?action=edit&id=<?php echo $_smarty_tpl->tpl_vars['basic']->value['id'];?>
">编辑</a>&nbsp;&nbsp;&nbsp;<a class="delete"
			href="process.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['basic']->value['id'];?>
">删除</a>
		</td>
	 </tr>
	<?php } ?>
 </tbody>
</table>

<script type="text/javascript" src="../jquery-1.7.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.delete').click(function(){
		return confirm('确定删除吗？');
	});
});
</script>
</body>
</html><?php }} ?>