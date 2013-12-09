<?php

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your application root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
|
*/
$config['smarty'] = array(
	'caching'	=> 0,
	'debugging' => true,
	'compile_dir' => '',
	'template_dir' => '',

	'wrap'		=> true,			// Wrap header and footer
	'header'	=> 'common/header.tpl',
	'footer'	=> 'common/footer.tpl',
);
