<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 07 Oct 2015
 * Project: maveric
 *
 */
?>
<div class="row">
	<?php foreach ($data['topics'] as $h => $d): ?>
	<div class="col-md-4">
		<h2><?=$h?></h2>
		<p><?=$d?></p>
		<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
	</div>
	<?php endforeach ?>
</div>
