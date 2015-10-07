<?php

/*
|--------------------------------------------------------------------------
| Database Variables
|--------------------------------------------------------------------------
|
| 'host' = Set a hostname
| 'username' = Set to database username
|
*/

$config['database'] = array(
	'default_driver' => null,		// `mysqli` or `mongodb`
	'default_config' => null,		// Config name

	'configurations' => array(
		'mysql_test' => array(
			'mysql_charset' => 'utf8',
			'host'		=> 'localhost',
			'database'	=> '',
			'username'	=> '',
			'password'	=> '',
		),

		'mongodb_test' => array(
			'dsn'		=> '',
			'hostname'	=> 'localhost',
			'port'		=> 27017,
			'username'	=> '',
			'password'	=> '',
			'database'	=> '',
			'options'	=> array(
				'write_concern'	=> 1,
				'fsync'			=> false,
				'timeout'		=> 30000
			),
		)
	)
);