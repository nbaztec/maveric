<?php /* Smarty version 2.6.27, created on 2013-07-19 16:42:13
         compiled from debug.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
	</head>
	<body>
	A Generated Billing URL: <?php echo $this->_tpl_vars['url']->billing('abc.php'); ?>

	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
		<p><?php echo $this->_tpl_vars['k']; ?>
 : <?php echo $this->_tpl_vars['v']; ?>
</p>
	<?php endforeach; endif; unset($_from); ?>
	</body>
</html>