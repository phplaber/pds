<?php /* Smarty version Smarty-3.1.12, created on 2012-12-15 13:05:03
         compiled from ".\templates\example.html" */ ?>
<?php /*%%SmartyHeaderCode:1669150cc757fbba5c0-98254514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75dbf389a889ab153dbf855a7b17c0c07e76b770' => 
    array (
      0 => '.\\templates\\example.html',
      1 => 1355565163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1669150cc757fbba5c0-98254514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'examples' => 0,
    'key' => 0,
    'example' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cc757fd4fb91_77766531',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cc757fd4fb91_77766531')) {function content_50cc757fd4fb91_77766531($_smarty_tpl) {?><html>
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

span{
	color: #F00;}
</style>
</head>

<body>
<p class="add"><a href="process.php?action=e_add">新增</a></p>
<table width="100%" cellspacing="0" cellpadding="2">
 <tbody>
	<tr bgcolor="#00CD00">
		<th width="5%">编号</th>
		<th width="5%">ID</th>
		<th width="10%">单词</th>
		<th width="35%">例句</th>
		<th width="35%">翻译</th>
		<th width="10%">操作</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['example'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['example']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['examples']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['example']->key => $_smarty_tpl->tpl_vars['example']->value){
$_smarty_tpl->tpl_vars['example']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['example']->key;
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
	 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['example']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<?php if (($_smarty_tpl->tpl_vars['item']->value=='')&&($_smarty_tpl->tpl_vars['key']->value=='wid')){?>
			<td><span>Deleted</span></td>
		<?php }elseif($_smarty_tpl->tpl_vars['item']->value==''&&$_smarty_tpl->tpl_vars['key']->value=='example_zh'){?>
			<td>&nbsp;</td>
		<?php }else{ ?>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</td>
		<?php }?>
	 <?php } ?>
		<td align="center">
			<a href="process.php?action=e_edit&id=<?php echo $_smarty_tpl->tpl_vars['example']->value['id'];?>
">编辑</a>&nbsp;&nbsp;&nbsp;<a class="delete"
			href="process.php?action=e_delete&id=<?php echo $_smarty_tpl->tpl_vars['example']->value['id'];?>
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