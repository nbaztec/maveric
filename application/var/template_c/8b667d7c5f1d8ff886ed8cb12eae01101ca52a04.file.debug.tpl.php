<?php /* Smarty version Smarty-3.1.14, created on 2013-07-19 14:56:33
         compiled from "G:\cloudaccess.net\platform\mycloudp\httpdocs\cloudaccess\maveric\application\views\templates\debug.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2023451e94a38722313-21537038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b667d7c5f1d8ff886ed8cb12eae01101ca52a04' => 
    array (
      0 => 'G:\\cloudaccess.net\\platform\\mycloudp\\httpdocs\\cloudaccess\\maveric\\application\\views\\templates\\debug.tpl',
      1 => 1374245755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2023451e94a38722313-21537038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e94a38a78867_78003467',
  'variables' => 
  array (
    'title' => 0,
    'url' => 0,
    'data' => 0,
    'k' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e94a38a78867_78003467')) {function content_51e94a38a78867_78003467($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	</head>
	<body>
	URL: <?php echo $_smarty_tpl->tpl_vars['url']->value->billing('abc.php');?>

	<?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value){
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["v"]->key;
?>
		<p><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</p>
	<?php } ?>
	</body>
</html><?php }} ?>