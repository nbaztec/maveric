<div class="body">
	<div class="container">
		<p>A Generated Billing URL: <a href="#">{$url->billing('abc.php')}</a></p>
		<div class="items">
			{foreach from=$data key="k" item="v"}
				{$k} : {$v}<br/>
			{/foreach}
		</div>
	</div>
</div>