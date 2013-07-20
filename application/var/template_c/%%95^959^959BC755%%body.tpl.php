<?php /* Smarty version 2.6.27, created on 2013-07-20 16:44:40
         compiled from body.tpl */ ?>
<div class="body">
	<div class="container">
		<p>A Generated Billing URL: <a href="#"><?php echo $this->_tpl_vars['url']->billing('abc.php'); ?>
</a></p>
		<div class="items">
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<?php echo $this->_tpl_vars['k']; ?>
 : <?php echo $this->_tpl_vars['v']; ?>
<br/>
			<?php endforeach; endif; unset($_from); ?>
		</div>
	</div>
</div>