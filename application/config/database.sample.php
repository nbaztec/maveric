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
	'default_driver' => 'mongodb',
	'default_config' => 'mongodb_fluenz',

	'configurations' => array(
		'mysql_test' => array(
			'mysql_charset' => 'utf8',
			'host'		=> 'localhost',
			'database'	=> 'debug',
			'username'	=> '',
			'password'	=> '',
		),

		'mongodb_fluenz' => array(
			'dsn'		=> '',
			'hostname'	=> 'localhost',
			'port'		=> 27017,
			'username'	=> '',
			'password'	=> '',
			'database'	=> 'fluenz',
			'options'	=> array(
				'write_concern'	=> 1,
				'fsync'			=> false,
				'timeout'		=> 30000
			),
		)
	)
);