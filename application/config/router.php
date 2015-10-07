<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 07 Oct 2015
 * Project: maveric
 *
 */

/**
 * Pick from `route_method` or `route_class`
 * route_method: http://example.com/path/class/method
 * 					This will call the specified method() for the class
 * route_class:  http://example.com/path/class
 * 					This will call either the get(), post() or index() method of the class
 */
define('ROUTER', 'route_class');


// Error Handlers
function _mvc_dispatch_error($e)
{
	$d = new \sys\libraries\Display();
	$d->attach('Url', new \app\helpers\Url(), true);
	$d->view('errors/404.php', array('error' => $e), false, false);
	die();
}

/**
 * @param \Exception $e
 */
function _mvc_dispatch_exception($e)
{
	$err = '';
	if ($f = $e->getFile())
	{
		$err = $f.':'.$e->getLine().' > '.$e->getMessage();
	}

	$d = new \sys\libraries\Display();
	$d->attach('Url', new \app\helpers\Url(), true);
	$d->view('errors/500.php', array('error' => $err), false, false);
	die();
}