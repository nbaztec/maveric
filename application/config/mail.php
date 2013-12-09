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

$config['email']['protocol'] = 'mail';

$config['email']['smtp'] = array(
	'port' => 25,
	'timeout' => 240,
	'keepalive' => true,
	'host' => 'smtp.sendgrid.net',
	'user' => 'nbaztec',
	'pass' => ''
);

$config['email']['charset'] = 'iso-8859-1';
$config['email']['mailtype'] = 'html';
$config['email']['wordwrap'] = true;
$config['email']['crlf'] = "\r\n";
$config['email']['newline'] = "\r\n";
